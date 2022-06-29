<?php

use Illuminate\Support\Facades\Route;

//login logout register
Route::get('login', [App\Http\Controllers\Auth\AuthController::class, 'index'])->name('login');
Route::post('post-login', [App\Http\Controllers\Auth\AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [App\Http\Controllers\Auth\AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [App\Http\Controllers\Auth\AuthController::class, 'postRegistration'])->name('register.post'); 
Route::post('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

//Route for UserController
Route::get('/counsellors-list', [App\Http\Controllers\User\UserController::class, 'counsellor_list'])->name('counsellors-index');
Route::get('/counsellors-detail/{id}', [App\Http\Controllers\User\UserController::class, 'profile'])->name('counsellors-detail');

//Route for AppointmentController
Route::get('/appointment-create/{id}', [App\Http\Controllers\Appointment\AppointmentController::class, 'create'])->name('appointment-create');
Route::post('/appointment-store/{id}', [App\Http\Controllers\Appointment\AppointmentController::class, 'store'])->name('appointment-store');
Route::get('/appointments', [App\Http\Controllers\Appointment\AppointmentController::class, 'index'])->name('appointments-index');
Route::get('/appointments-decision/{id}', [App\Http\Controllers\Appointment\AppointmentController::class, 'decision'])->name('appointments-decision');

//Route for QuestionController
Route::get('/questions', function () {
    return view("question.index");
})->name('question.index');
Route::post('/questions-store', [App\Http\Controllers\Question\QuestionController::class, 'store'])->name('questions.store');
