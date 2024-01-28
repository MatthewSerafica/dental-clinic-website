<?php

namespace App\Http\Controllers\AdminRole;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        try {
            $departments = Department::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->input('search');
                $query->where('departments', 'like', '%' . $search . '%');
            })
            ->orderBy($request->input('sort', 'id'), $request->input('direction', 'asc'))
            ->paginate(10);

            return Inertia::render('Admin/Departments/Index', compact('departments'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the department.');
        }  catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'An error occurred while retrieving courses. Please try again later.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'department' => 'required',
            ]);

            DB::beginTransaction();

            Department::create([
                'departments' => $request->department,
            ]);

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with('error', $errors[0]);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while saving the department.' . $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while creating the department. Some fields maybe empty or invalid.');
        }
        return redirect()->back()->with('success', 'Department successfuly created!');
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'department' => 'required',
            ]);

            DB::beginTransaction();

            $department = Department::findOrFail($request->id);
            $department->departments = $request->input('department');
            $department->save();

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with('error', $errors[0]);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while editing the department.' . $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while editing the department. Some fields maybe empty or invalid.');
        }
        return redirect()->back()->with('success', 'Department successfuly updated!');
    }

    public function destroy($id)
    {

        try {
            $department = Department::findOrFail($id);
            DB::beginTransaction();
            $department->delete();

            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Department not found.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while removing the department.');
        }
        return redirect()->back()->with('success', 'Department successfuly removed!');
    }
}
