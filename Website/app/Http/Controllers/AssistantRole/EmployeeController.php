<?php

namespace App\Http\Controllers\AssistantRole;

use App\Http\Controllers\Controller;
use App\Models\DentalChart;
use App\Models\DentalExamination;
use App\Models\Department;
use App\Models\MedicalHistory;
use App\Models\Employee;
use Exception;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $employees = Employee::query()
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
                    if ($request->input('sex') !== 'all') {
                        $query->where('sex', $request->input('sex'));
                    }
                })
                ->when($request->filled('employee_type'), function ($query) use ($request) {
                    $employeeType = $request->input('employee_type');
                    if ($employeeType === 'teaching') {
                        $query->where('department', '!=', 'Non-teaching');
                    } elseif ($employeeType === 'non-teaching') {
                        $query->where('department', 'Non-teaching');
                    }
                })
                ->orderBy($request->input('sort', 'id_number'), $request->input('direction', 'asc'))
                ->paginate(10)
                ->withQueryString();

            $filters = $request->only(['search', 'sex', 'employee_type']);

            $departments = Department::all();

            return Inertia::render('Assistant/Employees/Index', compact('employees', 'filters', 'departments'));
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Model not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Query exception.'], 500);
        } catch (Exception $e) {
            return response()->json(['message' => 'An error occurred.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'id_number' => 'required|string',
                'last_name' => 'required|string|regex:/^[^\s].*/',
                'first_name' => 'required|string|regex:/^[^\s].*/',
                'middle_name' => 'string|nullable|regex:/^[^\s].*/',
                'sex' => 'required',
                'address' => ['required', 'regex:/^[a-zA-Z\d\s,-]+$/'],
                'contact_number' => ['required', 'regex:/^09\d{9}$/'],
                'civil_status' => 'required',
                'department' => 'required',
                'age' => 'required',
                'birth_date' => 'required|date'
            ]);

            DB::beginTransaction();

            $hashed_random_password = Hash::make('user!' . str_replace(' ', '', $request->id_number));

            $user = User::create([
                'name' => $request->last_name . ', ' . $request->first_name,
                'user_type' => 'employee',
                'email' => $request->email,
                'password' => $hashed_random_password,
            ]);

            $employeeType = $request->department === 'Non-teaching' ? 'non-teaching' : 'teaching';

            Employee::create([
                'id_number' => $request->id_number,
                'employee_type' => $employeeType,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'sex' => $request->sex,
                'address' => $request->address,
                'contact_number' => $request->contact_number,
                'civil_status' => $request->civil_status,
                'department' => $request->department,
                'age' => $request->age,
                'birth_date' => $request->birth_date,
                'user_id' => $user->id,
            ]);

            MedicalHistory::create([
                'employee_id' => $request->id_number,
                'allergies' => $request->allergies,
                'diabetes' => $request->diabetes,
                'blood_dyscrasia' => $request->blood_dyscrasia,
                'cns_disorder' => $request->cns_disorder,
                'cardiovascular_disease' => $request->cardiovascular_disease,
                'tooth_related_surgery' => $request->tooth_related_surgery,
                'other_conditions' => $request->other_conditions
            ]);

            for ($i = 1; $i < 53; $i++) {
                $dental_data = [
                    [
                        'employee_id' => $request->id_number,
                        'tooth_type' => 1,
                        'tooth_number' => $i,
                    ],
                ];
                DentalChart::insert($dental_data);
            }

            DentalExamination::create([
                'employee_id' => $request->id_number,
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
                return redirect()->back()->with('error', 'An error occurred while saving the employee.');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while updating the record. Some fields maybe empty or invalid.');
        }

        return redirect()->back()->with('success', 'Employee was recorded!')->with('message', $request->first_name . ' ' . $request->last_name . '\'s information has been recorded');
    }

    public function show($id)
    {
        try {
            $employee = Employee::with(['medicals', 'charts', 'examinations', 'user'])
                ->where('id', $id)->first();
            $this->authorize('view', $employee);
            $departments = Department::all();

            return inertia('Assistant/Employees/Show', [
                'employee' => $employee,
                'medical' => $employee->medicals,
                'departments' => $departments,
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->to('/employees')->with('error', 'Employee not found');
        } catch (Exception $e) {
            return redirect()->to('/employees')->with('error', 'An error occured');
        }
    }

    public function update(Request $request, $id_number)
    {
        try {
            DB::beginTransaction();
            $employee = Employee::where('id_number', $id_number)->firstOrFail();
            $medical = MedicalHistory::where('employee_id', $id_number)->firstOrFail();
            $user = $employee->user;
            $request->validate([
                'id_number' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'first_name' => ['required', 'string'],
                'middle_name' => ['nullable', 'string'],
                'sex' => ['required'],
                'address' => ['required'],
                'contact_number' => ['required'],
                'civil_status' => ['required'],
                'department' => ['string'],
                'age' => ['integer'],
                'birth_date' => ['required', 'date', 'after:1/1/1970', 'before:1/1/2006'],
            ]);

            $user->fill($request->only([
                'email',
            ]))->update();

            $employee->fill($request->only([
                'id_number',
                'last_name',
                'first_name',
                'middle_name',
                'sex',
                'address',
                'contact_number',
                'civil_status',
                'department',
                'age',
                'birth_date',
            ]))->update();

            $medical->fill($request->only([
                'allergies',
                'diabetes',
                'blood_dyscrasia',
                'cns_disorder',
                'cardiovascular_disease',
                'tooth_related_surgery',
                'other_conditions',
            ]))->update();

            $employeeType = $request->department === 'Non-teaching' ? 'non-teaching' : 'teaching';
            $employee->employee_type = $employeeType;
            $employee->updated_by = Auth::user()->name;
            $employee->update();

            if ($employee->wasChanged('first_name') || $employee->wasChanged('last_name')) {
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
                return redirect()->back()->with('error', 'The ID number already exist.');
            } else {
                return redirect()->back()->with('error', 'An error occurred while updating the employee.');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while updating the record. Some fields maybe empty or invalid.');
        }

        return redirect()->back()->with('success', 'Personal details updated!');
    }

    public function check($id_number)
    {
        $employee_exists = Employee::where('id_number', $id_number)->exists();
        return response()->json(['exists' => $employee_exists]);
    }
}
