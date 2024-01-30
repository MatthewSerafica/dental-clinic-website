<?php

namespace App\Http\Controllers\AdminRole;

use App\Http\Controllers\Controller;
use App\Models\DentalExamination;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DentalExaminationController extends Controller
{
    public function update(Request $request, $exam_id)
    {
        try {
            $exam = DentalExamination::where('exam_id', $exam_id)->first();

            $sanitizedData = $request->only([
                'debris_tooth_stain',
                'calcular_deposits',
                'gingivitis',
                'periodontal_pocket',
                'orthodontic_treatment',
            ]);

            $exam->update($sanitizedData);

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Dental examination not found.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the dental examination.');
        }

        return redirect()->back()->with('success', 'Oral Health Condition Updated!');
    }
}
