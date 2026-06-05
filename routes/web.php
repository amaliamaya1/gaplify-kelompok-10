<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\DiagnosticTestController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    $role = auth()->user()->role;
    if ($role === 'admin') return redirect()->route('admin.dashboard');
    if ($role === 'teacher') return redirect()->route('teacher.dashboard');
    return redirect()->route('student.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/notifications', function () {
        return view('notifications.index');
    })->name('notifications.index');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', UserManagementController::class);
    Route::resource('topics', TopicController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('materials', MaterialController::class);
});

// Teacher Routes
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('dashboard');
    Route::get('/students', [TeacherDashboardController::class, 'students'])->name('students');
    Route::get('/students/{id}', [TeacherDashboardController::class, 'detailStudent'])->name('students.detail');
    Route::get('/students/{id}/analysis', [TeacherDashboardController::class, 'studentAnalysis'])->name('students.analysis');
});

// Student Routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/diagnostic-test', [DiagnosticTestController::class, 'index'])->name('test.index');
    Route::get('/diagnostic-test/start', [DiagnosticTestController::class, 'start'])->name('test.start');
    Route::post('/diagnostic-test/submit', [DiagnosticTestController::class, 'submit'])->name('test.submit');
    Route::get('/analysis', [AnalysisController::class, 'index'])->name('analysis.index');
    Route::get('/analysis/{attempt_id}', [AnalysisController::class, 'result'])->name('analysis.result');
    Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
    Route::get('/recommendations/{material}', [RecommendationController::class, 'show'])->name('recommendations.show');
});

require __DIR__.'/auth.php';
