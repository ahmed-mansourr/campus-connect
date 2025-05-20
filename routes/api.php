<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\StudentDashboardController;
use App\Http\Controllers\Api\SubjectController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);


Route::get('/student/dashboard', [StudentDashboardController::class, 'index']);


