<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/',[AuthController::class,'loadLoginPage']);
Route::get('/registration/form',[AuthController::class,'loadRegisterForm']);
Route::post('/register/user',[AuthController::class,'registerUser'])->name('registerUser');

Route::get('/login/form',[AuthController::class,'loadLoginPage']);

Route::post('/login/user',[AuthController::class,'LoginUser'])->name('LoginUser');

Route::get('/logout',[AuthController::class,'LogoutUser']);

Route::get('/forgot/password',[AuthController::class,'forgotPassword']);

Route::post('/forgot',[AuthController::class,'forgot'])->name('forgot');

Route::get('/reset/password',[AuthController::class,'loadResetPassword']);

Route::post('/reset/user/password',[AuthController::class,'ResetPassword'])->name('ResetPassword');

Route::get('/404',[AuthController::class,'load404']);



Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/home',[AdminController::class,'loadHomePage']);
    Route::get('/admin/profile',[AdminController::class,'loadProfile']);
});

// student
Route::group(['middleware' => 'student'], function(){
    Route::get('/student/home',[StudentController::class,'loadHomePage']);
    Route::get('/profile',[StudentController::class,'loadProfile']);
});

// lecturer
Route::group(['middleware' => 'lecturer'], function(){
    Route::get('/lecturer/home',[TeacherController::class,'loadHomePage']);
    Route::get('/lecturer/profile',[TeacherController::class,'loadProfile']);
});


