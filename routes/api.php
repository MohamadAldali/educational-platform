<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CourseControllerAPI;
use App\Http\Controllers\Api\LectureControllerAPI;
use App\Http\Controllers\Api\LoginController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/courses',[CourseControllerAPI::class,'index']);
Route::get('/courses/{id}',[CourseControllerAPI::class,'show']);
Route::post('/courses',[CourseControllerAPI::class,'store']);
Route::post('/courses/{id}',[CourseControllerAPI::class,'update']);
Route::post('/course/{id}',[CourseControllerAPI::class,'destroy']);

Route::get('/lectures/{id_co}',[LectureControllerAPI::class,'index']);
Route::get('/lectures/{id}',[LectureControllerAPI::class,'show']);
Route::post('/lectures',[LectureControllerAPI::class,'store']);
Route::post('/lectures/{id}',[LectureControllerAPI::class,'update']);
Route::post('/lecture/{id}',[LectureControllerAPI::class,'destroy']);


Route::post('/login',[LoginController::class,'login']);
