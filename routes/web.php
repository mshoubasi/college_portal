<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\GradeController;

// login route
Route::post('/admin/login', [AuthController::class, 'login'])->name('login');

// admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');
    // student
    Route::get('/admin/students',[StudentController::class, 'index'])->name('students');
    Route::get('/admin/students/{id}',[StudentController::class, 'studentDetails'])->name('student.details');
    Route::get('/admin/student/add', [StudentController::class, 'addStudent'])->name('student.add');
    Route::post('/admin/student/add', [StudentController::class, 'storeStudent'])->name('student.store');
    // major
    Route::get('/admin/majors',[MajorController::class, 'index'])->name('majors');
    Route::get('/admin/major/add', [MajorController::class, 'addMajor'])->name('major.add');
    Route::post('/admin/major/add', [MajorController::class, 'storeMajor'])->name('major.store');
    Route::delete('/admin/major/{id}', [MajorController::class,'deleteMajor'])->name('major.delete');
    Route::get('/admin/majors/{id}', [MajorController::class, 'majorDetails'])->name('major.details');
    // subject
    Route::post('/admin/majors/{id}/subject', [SubjectController::class, 'addSubject'])->name('major.add.subject');
    Route::post('/admin/students/{id}/subject/{subjectId}/grades', [GradeController::class, 'addGrade'])->name('add.grade');
    //search
    Route::get('/admin/search',[StudentController::class, 'search'])->name('search');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/admin/login', 'admin.login')->name('login-view');
Route::get('/search', [SearchController::class, 'search'])->name('results.search');

