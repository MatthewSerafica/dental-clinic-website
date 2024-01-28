<?php

namespace App\Http\Controllers\AdminRole;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\School;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index($id)
    {
        try {
            $courses = Course::where('school_id', $id)->get();

            if ($courses->isEmpty()) {
                return response()->json(['message' => 'No courses found for the given school ID'], 404);
            }

            return response()->json($courses);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'An error occurred while retrieving courses. Please try again later.'], 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $schools = School::all();
            $query = Course::with('school');

            if ($request->filled('search')) {
                $searchTerm = $request->input('search');
                $query->where(function ($query) use ($searchTerm) {
                    $query->where('course', 'like', '%' . $searchTerm . '%');
                });
            }

            $courses = $query->paginate(10);

            return Inertia::render('Admin/Courses/Index', [
                'courses' => $courses,
                'schools' => $schools,
                'page' => $courses->currentPage(),
                'perPage' => $courses->perPage(),
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the courses.');
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'An error occurred while retrieving courses. Please try again later.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'school' => 'required',
                'course' => 'required',
            ]);

            DB::beginTransaction();

            Course::create([
                'school_id' => $request->school,
                'course' => $request->course,
            ]);

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with('error', $errors[0]);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while saving the course.' . $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while creating the course. Some fields maybe empty or invalid.');
        }

        return redirect()->back()->with('success', 'Course successfuly created!');
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'course' => 'required',
                'school' => 'required',
            ]);

            DB::beginTransaction();

            $course = Course::findOrFail($request->id);
            $course->course = $request->input('course');
            $course->school_id = $request->input('school');
            $course->save();

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with('error', $errors[0]);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while editing the course.' . $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while editing the course. Some fields maybe empty or invalid.');
        }

        return redirect()->back()->with('success', 'Course successfuly updated!');
    }

    public function destroy($id)
    {

        try {
            $Course = Course::findOrFail($id);
            DB::beginTransaction();
            $Course->delete();

            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Department not found.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while removing the department.');
        }

        return redirect()->back()->with('success', 'Course successfuly removed!');
    }
}
