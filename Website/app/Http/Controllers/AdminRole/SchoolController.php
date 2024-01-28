<?php

namespace App\Http\Controllers\AdminRole;

use App\Http\Controllers\Controller;
use App\Models\School;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        try {
            $schools = School::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->input('search');
                $query->where('school', 'like', '%' . $search . '%');
            })
            ->orderBy($request->input('sort', 'id'), $request->input('direction', 'asc'))
            ->paginate(10);
            return Inertia::render('Admin/Schools/Index', [
                'schools' => $schools,
                'page' => $schools->currentPage(),
                'perPage' => $schools->perPage()
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the school.');
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'An error occurred while retrieving courses. Please try again later.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'school' => 'required',
            ]);

            DB::beginTransaction();

            School::create([
                'school' => $request->school,
            ]);

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with('error', $errors[0]);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while saving the school.' . $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while creating the school. Some fields maybe empty or invalid.');
        }

        return redirect()->back()->with('success', 'School successfuly created!');
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'school' => 'required',
            ]);

            DB::beginTransaction();

            $school = School::findOrFail($request->id);
            $school->school = $request->input('school');
            $school->save();

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with('error', $errors[0]);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while editing the school.' . $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while editing the school. Some fields maybe empty or invalid.');
        }

        return redirect()->back()->with('success', 'School successfuly updated!');
    }

    public function destroy($id)
    {

        try {
            $school = School::findOrFail($id);
            DB::beginTransaction();
            $school->delete();

            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'School not found.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while removing the school.');
        }

        return redirect()->back()->with('success', 'School successfuly removed!');
    }
}
