<?php

namespace App\Http\Controllers\DentistRole;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Student;
use App\Models\TreatmentRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TreatmentRecordController extends Controller
{
    public function store(Request $request, $id)
    {
        try {
            $student = Student::where('id_number', $id)->first();
            $employee = Employee::where('id_number', $id)->first();  
    
            $request->validate([
                'date' => ['required', 'date'],
                'time_in' => ['required'],
                'service_rendered' => ['required', 'string'],
                'clinical_findings' => ['required', 'string'],
                'diagnosis' => ['required', 'string'],
                'prescription' => ['required', 'string'],
                'remarks' => ['required', 'string'],
                'time_out' => ['required'],
            ]);

            $treatmentData = [
                'date' => $request->date,
                'time_in' => $request->time_in,
                'service_rendered' => $request->service_rendered,
                'clinical_findings' => $request->clinical_findings,
                'diagnosis' => $request->diagnosis,
                'prescription' => $request->prescription,
                'remarks' => $request->remarks,
                'time_out' => $request->time_out,
            ];
            if ($student) {
                $treatmentData['student_id'] = $student->id_number;
                $treatmentData['dentist_id'] = Auth::user()->id;
                $student->treatments()->create($treatmentData);
            } elseif ($employee) {
                $treatmentData['employee_id'] = $employee->id_number;
                $treatmentData['dentist_id'] = Auth::user()->id;
                $employee->treatments()->create($treatmentData);
            } else {
                return redirect()->back()->with('error', 'Invalid ID');
            }
        
            return redirect()->back()->with('success', 'Treatment Successfully Recorded');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->with('error', 'The treatment record already exist.');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the student.');
            }
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Some fields are empty or invalid.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the record.');
        }
    }


    public function update(Request $request, $record_id)
    {
        try {
            $treatmentRecord  = TreatmentRecord::where('record_id', $record_id)->first();
            $request->validate([
                'date' => '',
                'time_in' => '',
                'service_rendered' => '',
                'clinical_findings' => '',
                'diagnosis' => '',
                'prescription' => '',
                'remarks' => '',
                'time_out' => '',
            ]);

            $treatmentData = [
                'date' => $request->date,
                'time_in' => $request->time_in,
                'service_rendered' => $request->service_rendered,
                'clinical_findings' => $request->clinical_findings,
                'diagnosis' => $request->diagnosis,
                'prescription' => $request->prescription,
                'remarks' => $request->remarks,
                'time_out' => $request->time_out,
            ];

            $treatmentRecord->update($treatmentData);

            return redirect()->back()->with('success', 'Treatment Record Updated!');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->with('error', 'The treatment record already exist.');
            } else {
                return redirect()->back()->with('error', 'An error occurred while saving the student.');
            }
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Some fields are empty or invalid.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the record.');
        }
    }

    public function destroy(TreatmentRecord $treatment)
    {
        $treatment->delete();

        return redirect()->back()->with('success', 'Record was removed!');
    }
}
