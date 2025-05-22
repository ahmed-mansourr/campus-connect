<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\StudentDashboardController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LessonController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);


Route::get('/student/dashboard', [StudentDashboardController::class, 'index']);
Route::apiResource('courses', CourseController::class);
Route::apiResource('lessons', LessonController::class);
Route::apiResource('subjects', SubjectController::class);


