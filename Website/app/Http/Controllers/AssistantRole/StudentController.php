<?php

namespace App\Http\Controllers\AssistantRole;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\DentalChart;
use App\Models\DentalExamination;
use App\Models\MedicalHistory;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        try {
            $students = Student::query()
                ->with(['treatments' => function ($query) {
                    $query->latest('updated_at');
                }])
                ->whereNull('archived_at')
                ->when($request->filled('search'), function ($query) use ($request) {
                    $search = $request->input('search');
                    $query->where('id_number', 'like', '%' . $search . '%')
                        ->orWhere('last_name', 'like', '%' . $search . '%')
                        ->orWhere('first_name', 'like', '%' . $search . '%');
                })
                ->when($request->filled('sex'), function ($query) use ($request) {
                    $sex = $request->input('sex');
                    $query->where('sex', $sex);
                })
                ->when($request->filled('school'), function ($query) use ($request) {
                    $school = $request->input('school');
                    $query->where('school', $school);
                })
                ->orderBy($request->input('sort', 'id_number'), $request->input('direction', 'asc'))
                ->paginate(10)
                ->withQueryString();

            $filters = $request->only(['search', 'sex']);

            $schools = School::all();

            return inertia('Assistant/Student/Index', compact('students', 'filters', 'schools'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the students.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_number' => ['required', 'digits:7'],
                'last_name' => ['required', 'string', 'regex:/^[^\s]/'],
                'first_name' => ['required', 'string', 'regex:/^[^\s]/'],
                'middle_name' => ['string', 'nullable', 'regex:/^[^\s]/'],
                'sex' => ['required'],
                'address' => ['required', 'regex:/^[a-zA-Z\d\s,-]+$/'],
                'contact_number' => ['required', 'regex:/^09\d{9}$/'],
                'civil_status' => ['required'],
                'year' => ['string'],
                'age' => ['integer'],
                'birth_date' => ['required', 'date'],
            ]);

            DB::beginTransaction();

            $hashed_random_password = Hash::make('user!' . $request->id_number);
            $course = Course::where('id', $request->course_id)->value('course');

            $user = User::create([
                'name' => $request->last_name . ', ' . $request->first_name,
                'user_type' => 'student',
                'email' => $request->id_number . '@slu.edu.ph',
                'password' => $hashed_random_password,
            ]);

            Student::create([
                'id_number' => $request->id_number,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'sex' => $request->sex,
                'address' => $request->address,
                'contact_number' => $request->contact_number,
                'civil_status' => $request->civil_status,
                'school' => $request->school,
                'course' => $course,
                'year' => $request->year,
                'age' => $request->age,
                'birth_date' => $request->birth_date,
                'user_id' => $user->id,
            ]);

            MedicalHistory::create([
                'student_id' => $request->id_number,
                'allergies' => $request->allergies,
                'diabetes' => $request->diabetes,
                'blood_dyscrasia' => $request->blood_dyscrasia,
                'cns_disorder' => $request->cns_disorder,
                'cardiovascular_disease' => $request->cardiovascular_disease,
                'tooth_related_surgery' => $request->tooth_related_surgery,
                'other_conditions' => $request->other_conditions,
            ]);

            for ($i = 1; $i < 53; $i++) {
                $dental_data[] = [
                    'student_id' => $request->id_number,
                    'tooth_type' => 1,
                    'tooth_number' => $i,
                ];
            }
            DentalChart::insert($dental_data);

            DentalExamination::create([
                'student_id' => $request->id_number,
            ]);

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with('error', $errors[0]);
        } catch (QueryException $e) {
            DB::rollBack();
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->with('error', 'The ID number already exist.');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the student.' . $e->getMessage());
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while updating the record. Some fields maybe empty or invalid.');
        }
        return redirect()->back()->with('success', 'Student was recorded!')->with('message', $request->first_name . ' ' . $request->last_name . '\'s information has been recorded');
    }

    public function show($id)
    {
        try {
            $student = Student::with('medicals')
                ->where('id', $id)->first();
            $schools = School::all();

            return inertia('Assistant/Student/Show', [
                'student' => $student,
                'medical' => $student->medicals,
                'schools' => $schools,
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Record not found.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the student.');
        }
    }

    public function update(Request $request, $id_number)
    {
        try {
            DB::beginTransaction();
            $student = Student::where('id_number', $id_number)->first();
            $medical = $student->medicals;
            $user = $student->user;

            $request->validate([
                'id_number' => ['required', 'digits:7'],
                'last_name' => ['required', 'string'],
                'first_name' => ['required', 'string'],
                'middle_name' => ['string', 'nullable'],
                'sex' => ['required'],
                'address' => ['required'],
                'contact_number' => ['required'],
                'civil_status' => ['required'],
                'school' => ['string'],
                'year' => ['string'],
                'age' => ['integer'],
                'birth_date' => ['required', 'date'],
            ]);

            $student->fill($request->only([
                'id_number',
                'last_name',
                'first_name',
                'middle_name',
                'sex',
                'address',
                'contact_number',
                'civil_status',
                'school',
                'year',
                'age',
                'birth_date',
            ]))->update();

            $student->course = $request->course_name;
            $student->updated_by = Auth::user()->name;
            $student->update();

            $medical->fill($request->only([
                'allergies',
                'diabetes',
                'blood_dyscrasia',
                'cns_disorder',
                'cardiovascular_disease',
                'tooth_related_surgery',
                'other_conditions',
            ]))->update();


            if ($student->wasChanged('id_number')) {
                $user->email = $request->input('id_number') . '@slu.edu.ph';
                $user->update();
            }

            if ($student->wasChanged('first_name') || $student->wasChanged('last_name')) {
                $user->name = $request->last_name . ', ' . $request->first_name;
                $user->update();
            }
            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Record not found.');
        } catch (ValidationException $e) {
            DB::rollBack();
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with('error', $errors[0]);
        } catch (QueryException $e) {
            DB::rollBack();
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->with('error', 'The ID Number already exist.');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the student.');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while updating the record. Some fields maybe empty or invalid.');
        }
        return redirect()->back()->with('success', 'Personal details updated!');
    }

    public function check($id_number)
    {
        $student_exists = Student::where('id_number', $id_number)->exists();
        return response()->json(['exists' => $student_exists]);
    }
}
