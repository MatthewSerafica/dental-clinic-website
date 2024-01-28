<?php

namespace App\Http\Controllers\AdminRole;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        try {
            $archivedRecords = $this->getArchivedStudents()->concat($this->getArchivedEmployees());

            $searchQuery = $request->input('search');
            if ($searchQuery) {
                $archivedRecords = $archivedRecords->filter(function ($record) use ($searchQuery) {
                    return $record->id_number && stripos($record->id_number, $searchQuery) !== false ||
                        $record->last_name && stripos($record->last_name, $searchQuery) !== false ||
                        $record->first_name && stripos($record->first_name, $searchQuery) !== false;
                });
            }

            $archivedRecords = $archivedRecords->when($request->filled('sex'), function ($query) use ($request) {
                return $query->where('sex', $request->input('sex'));
            });

            $archivedRecords = $archivedRecords->when($request->filled('patientType'), function ($query) use ($request) {
                $modelType = $request->input('patientType');
                return $query->filter(function ($record) use ($modelType) {
                    if ($modelType === 'student' && $record instanceof Student) {
                        return true;
                    } elseif ($modelType === 'employee' && $record instanceof Employee) {
                        return true;
                    }
                    return false;
                });
            });

            $perPage = 10;
            $currentPage = $request->input('page', 1);
            $options = ['path' => '/admin/archives'];
            $archivedRecords = $this->paginate($archivedRecords,$perPage, $currentPage, $options);

            return inertia('Admin/Archive/Index', [
                'archivedRecords' => $archivedRecords,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('error', 'An error occurred while retrieving archived records.');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', 'An error occurred while retrieving archived records.');
        }
    }


    private function getArchivedStudents()
    {
        return Student::whereNotNull('archived_at')->with('user')->get();
    }

    private function getArchivedEmployees()
    {
        return Employee::whereNotNull('archived_at')->with('user')->get();
    }

    private function paginate($items, $perPage, $page, $options)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
