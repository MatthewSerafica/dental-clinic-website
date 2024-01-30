<?php

namespace App\Http\Controllers\AssistantRole;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

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
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving courses. Please try again later.'], 500);
        }
    }
}
