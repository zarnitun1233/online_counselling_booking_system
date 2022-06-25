<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * API routes for AppointmentApiController
 */
//Route::group([], function () {
//    //Route::get('/students', [StudentApiController::class, 'index']);
//    //Route::get('/students/{id}', [StudentApiController::class, 'show']);
//    //Route::post('/mail', [StudentApiController::class, 'sendMailData']);
//    //Route::post('/students', [StudentApiController::class, 'store']);
//    //Route::get('/majors', [StudentApiController::class, 'getMajor']);
//    //Route::get('/majors/{id}', [StudentApiController::class, 'getMajorById']);
//    //Route::put('/students/update/{id}', [StudentApiController::class, 'update']);
//    //Route::delete('/students/delete/{id}', [StudentApiController::class, 'destroy']);
//    Route::get('/questions', [App\Http\Controllers\API\QuestionApiController::class, 'index']);
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
