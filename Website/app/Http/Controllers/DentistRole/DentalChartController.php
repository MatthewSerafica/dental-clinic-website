<?php

namespace App\Http\Controllers\DentistRole;

use App\Http\Controllers\Controller;
use App\Models\DentalChart;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DentalChartController extends Controller
{
    public function update(Request $request)
    {
        try {
            $request->validate([
                'teeth.*.id' => 'required|exists:dental_charts,chart_id',
                'teeth.*.classObject' => 'required|array',
                'teeth.*.classObject.*' => 'required|string',
                'teeth.*.condition1' => 'nullable|string',
                'teeth.*.condition2' => 'nullable|string',
            ]);

            $chartsData = $request->teeth;

            DB::transaction(function () use ($chartsData) {
                foreach ($chartsData as $chartData) {
                    $tooth = DentalChart::findOrFail($chartData['id']);
                    $object = $chartData['classObject'];

                    $tooth->update([
                        'mesial' => $object['topClass'],
                        'buccal' => $object['leftClass'],
                        'distal' => $object['bottomClass'],
                        'lingual' => $object['rightClass'],
                        'occlusal' => $object['centerClass'],
                        'condition_one' => $chartData['condition1'],
                        'condition_two' => $chartData['condition2'],
                    ]);
                }
            });
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error occurred while updating Dental Chart');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Dental Chart');
        }
        return redirect()->back()->with('success', 'Dental Chart updated successfully');
    }
}
