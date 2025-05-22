<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;

class LessonController extends Controller
{
 
    public function index()
    {
        return Lesson::with('course')->get();
    }

    public function store(StoreLessonRequest $request)
    {
        $lesson = Lesson::create($request->validated());
        return response()->json($lesson, 201);
    }

   
    public function show(Lesson $lesson)
    {
        return Lesson::load('course');
    }

    
    public function update(UpdateLessonRequest $request,  Lesson $lesson)
    {
        $lesson->update($request->validated());
        return response()->json($lesson);
    }

    
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return response()->json(['message' => 'Lesson deleted']);
    }
}
