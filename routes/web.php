<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CourseController;

//auth part
Route::prefix('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

//manage users part 
Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/get-all-admins', [UserController::class, 'getAllAdmins'])->name('allAdmins');
    Route::get('/get-all-users', [UserController::class, 'getAllUsers'])->name('allUsers');
});

Route::prefix('course')->middleware(AuthMiddleware::class)->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('course.index');
    Route::get('/{id}/application-form', [CourseController::class, 'getApplication'])->name('course.application-form');
    Route::post('/application/{id}', [CourseController::class, 'postApplication'])->name('course.application');
    Route::get('/user-courses', [CourseController::class, 'userCourses'])->name('course.user-courses');
    Route::get('/{id}/show', [CourseController::class, 'show'])->name('course.show');
    
});
Route::delete('course/unassign/{id}', [CourseController::class , 'unassign'])->name('unassign');

//manage courses part
Route::prefix('course')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/store', [CourseController::class, 'store'])->name('course.store');
    Route::get('/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('/{id}/update', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/deleteCourse/{id}', [CourseController::class , 'deleteCourse'])->name('deleteCourse');


});

Route::get('/', function () {
    return view('dashboard');
})->middleware(AuthMiddleware::class)->name('dashboard');