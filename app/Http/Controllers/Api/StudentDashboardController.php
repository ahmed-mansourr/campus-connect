<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;

class StudentDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        
        $subjects = $user->subjects()->with('lessons')->get()->map(function ($subject) {
            return [
                'id' => $subject->id,
                'name' => $subject->name,
                'view_lessons_link' => route('api.subject.lessons', ['id' => $subject->id]),
            ];
        });

        $totalLessons = Lesson::whereIn('subject_id', $user->subjects->pluck('id'))->count();
        $completedLessons = $user->completedLessons()->count();
        $badges = $user->badges()->count();
        $progress = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100, 2) : 0;

        return response()->json([
            'name' => $user->name,
            'profile_image_url' => $user->profile_image_url ?? null,
            'enrolled_subjects' => $subjects,
            'progress' => [
                'lessons_completed' => $completedLessons,
                'total_lessons' => $totalLessons,
                'badges_earned' => $badges,
                'progress_percentage' => $progress,
            ],
        ]);
    }
}