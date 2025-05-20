<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function lessons($id)
{
    return \App\Models\Lesson::where('subject_id', $id)->get();
}
}
