<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\adminUsersController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TimetableController;




// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');



Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('usersView');
Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('users.create');
Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('users.store');
Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');



// // web.php
// Route::get('/admin/students', [AdminController::class, 'manageStudents'])->name('students');
// Route::get('/admin/students/create', [AdminController::class, 'createStudent'])->name('students.create');
// Route::post('/admin/students', [AdminController::class, 'storeStudent'])->name('students.store');

Route::resource('students', AdminStudentController::class);
// Route::resource('admin', adminUsersController::class);

Route::resource('classes', ClassController::class);
Route::resource('teachers', TeacherController::class);


Route::resource('courses', CourseController::class);

Route::resource('attendances', AttendanceController::class);


// Route::middleware(['auth'])->group(function () {
    Route::resource('messages', MessageController::class);
// });


Route::resource('timetables', TimetableController::class);
