<?php

namespace App\Http\Controllers\AdminRole;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\DentalChart;
use App\Models\DentalExamination;
use App\Models\MedicalHistory;
use App\Models\School;
use App\Models\Service;
use App\Models\Student;
use App\Models\TreatmentRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

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

            return Inertia::render('Admin/Students/Index', compact('students', 'filters', 'schools'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the students.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_number' => ['required', 'digits:7'],
                'last_name' => ['required', 'string', 'regex:/^\D+$/'],
                'first_name' => ['required', 'string', 'regex:/^\D+$/'],
                'middle_name' => ['string', 'nullable', 'regex:/^\D+$/'],
                'sex' => ['required'],
                'address' => ['required'],
                'contact_number' => ['required', 'regex:/^09\d{9}$/'],
                'civil_status' => ['required'],
                'year' => ['required', 'string'],
                'age' => ['required', 'integer'],
                'birth_date' => ['required', 'date', 'after:12/31/1939', 'before:1/1/2007'],
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
            return redirect()->back()->with('error', 'An error occurred while creating the record. Some fields are maybe empty or invalid.');
        }
        return redirect()->back()->with('success', 'Student was recorded!')->with('message', $request->first_name . ' ' . $request->last_name . '\'s information has been recorded');
    }

    public function bulkStore(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:csv,txt'],
        ]);

        $path = $request->file('file')->getRealPath();
        $file = fopen($path, 'r');

        fgetcsv($file);

        DB::beginTransaction();

        try {
            $students = [];
            $medicalHistories = [];
            $dentalCharts = [];
            $dentalExaminations = [];
            $chunkSize = 1000; 

            while (($line = fgetcsv($file)) !== false) {
                $hashed_default_password = Hash::make('user!' . $line[0]);

                $user = User::create([
                    'name' => $line[1] . ', ' . $line[2],
                    'user_type' => 'student',
                    'email' => $line[0] . '@slu.edu.ph',
                    'password' => $hashed_default_password,
                ]);

                $students[] = [
                    'id_number' => $line[0],
                    'last_name' => $line[1],
                    'first_name' => $line[2],
                    'middle_name' => $line[3],
                    'sex' => $line[4],
                    'address' => $line[5],
                    'contact_number' => $line[6],
                    'civil_status' => $line[7],
                    'school' => $line[8],
                    'course' => $line[9],
                    'year' => $line[10],
                    'age' => $line[11],
                    'birth_date' => $line[12],
                    'user_id' => $user->id,
                ];


                $medicalHistories[] = [
                    'student_id' => $line[0],
                    'allergies' => 'none',
                    'diabetes' => 'none',
                    'blood_dyscrasia' => 'none',
                    'cns_disorder' => 'none',
                    'cardiovascular_disease' => 'none',
                    'tooth_related_surgery' => 'none',
                    'other_conditions' => 'none',
                ];

                $dentalCharts = array_merge($dentalCharts, array_map(function ($i) use ($line) {
                    return [
                        'student_id' => $line[0],
                        'tooth_type' => 1,
                        'tooth_number' => $i,
                    ];
                }, range(1, 52)));

                $dentalExaminations[] = [
                    'student_id' => $line[0],
                ];
                
                if (count($students) >= $chunkSize) {
                    $this->insertChunk($students, $medicalHistories, $dentalCharts, $dentalExaminations);
    
                    $students = [];
                    $medicalHistories = [];
                    $dentalCharts = [];
                    $dentalExaminations = [];
                }
            }

            $this->insertChunk($students, $medicalHistories, $dentalCharts, $dentalExaminations);

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
            return redirect()->back()->with('error', 'An error occurred while creating the records. Some fields are maybe empty or invalid.');
        }
        return redirect()->to(route('admin.student.index'))->with('success', 'Students were successfully recorded!');
    }

    private function insertChunk($students, $medicalHistories, $dentalCharts, $dentalExaminations)
    {
        Student::insert($students);
        $userIds = User::whereIn('id', array_column($students, 'user_id'))->pluck('id', 'id')->toArray();

        $students = array_map(function ($student) use ($userIds) {
            $student['user_id'] = $userIds[$student['user_id']];
            return $student;
        }, $students);

        MedicalHistory::insert($medicalHistories);
        DentalChart::insert($dentalCharts);
        DentalExamination::insert($dentalExaminations);
    }

    public function show($id)
    {
        try {
            $student = Student::with(['medicals', 'charts', 'examinations'])
                ->where('id', $id)->first();
            $treatments = TreatmentRecord::where('student_id', $student->id_number)
                ->with('dentist')
                ->paginate(10);
            $this->authorize('view', $student);
            $schools = School::all();
            $services = Service::all();


            return inertia('Admin/Students/Show', [
                'student' => $student,
                'medical' => $student->medicals,
                'treatment' => $treatments,
                'chart' => $student->charts,
                'exam' => $student->examinations,
                'schools' => $schools,
                'services' => $services,
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
                'contact_number' => ['required', 'regex:/^09\d{9}$/'],
                'civil_status' => ['required'],
                'school' => ['required', 'string'],
                'year' => ['required', 'string'],
                'age' => ['required', 'integer'],
                'birth_date' => ['required', 'date', 'after:12/31/1939', 'before:1/1/2041'],
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

    public function archive($id)
    {
        try {
            DB::beginTransaction();
            $student = Student::where('id', $id)->with('user')->first();
            $student->archived_at = now();
            $student->update();

            $student->medicals()->update([
                'archived_at' => now(),
            ]);
            $student->charts()->update([
                'archived_at' => now(),
            ]);
            $student->examinations()->update([
                'archived_at' => now(),
            ]);
            $student->treatments()->update([
                'archived_at' => now(),
            ]);

            $student->user->appointments()->update([
                'archived_at' => now(),
            ]);

            $student->user()->update([
                'is_active' => false,
            ]);

            DB::commit();
            return redirect()->to('/admin/student')
                ->with('success', 'Student record was archived!');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Record not found.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while archiving the student. ' . $e->getMessage());
        }
    }

    public function unarchive($id)
    {
        try {
            DB::beginTransaction();
            $student = Student::where('id', $id)->first();
            $student->archived_at = null;
            $student->update();

            $student->medicals()->update([
                'archived_at' => null,
            ]);
            $student->charts()->update([
                'archived_at' => null,
            ]);
            $student->examinations()->update([
                'archived_at' => null,
            ]);
            $student->treatments()->update([
                'archived_at' => null,
            ]);

            $student->user->appointments()->update([
                'archived_at' => null,
            ]);

            $student->user()->update([
                'is_active' => true,
            ]);


            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Record not found.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while unarchiving the student.');
        }
        return redirect()->back()->with('success', 'Student record was unarchived!');
    }

    public function check($id_number)
    {
        $student_exists = Student::where('id_number', $id_number)->exists();
        return response()->json(['exists' => $student_exists]);
    }

    public function destroy($id_number)
    {
        try {
            $email = $id_number . '@slu.edu.ph';
            $student = Student::find($id_number);
            $user = User::where('email', $email);
            $student->delete();
            $user->delete();

            return redirect()->back()
                ->with('success', 'Student was removed!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Record not found.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while removing the student.');
        }
    }
}
