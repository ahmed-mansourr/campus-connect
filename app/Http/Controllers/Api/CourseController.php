<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    public function index()
    {
        return Course::with('subject')->get();
    }
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());
    return response()->json($course, 201);
    }

    public function show(Course $course)
    {
        return $course->load('subject');
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
    return response()->json($course);
    }

    public function destroy(Course $course)
    {
    $course->delete();
        return response()->json(['message' => 'Course deleted']);
    }
}
