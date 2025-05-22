<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
class SubjectController extends Controller
{
    
    public function index()
    {
        return Subject::all();

    }

    public function store(StoreSubjectRequest $request)
    {
        $subject = Subject::create($request->validated());
        return response()->json($subject, 201);
    }


    public function show(Subject  $subject)
    {
        return $subject;

    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());
        return response()->json($subject);
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json(['message' => 'Subject deleted']);
    }
}
