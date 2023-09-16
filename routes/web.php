<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CourseController;
use \App\Http\Controllers\LectureController;
use \App\Http\Controllers\CertificateController;
use \App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin',function(){
    return view('layouts.admin');
});

Route::resource('user', UserController::class);
Route::resource('course', CourseController::class)->middleware('Student');
Route::resource('lecture', LectureController::class)->middleware('Student');
Route::resource('certificate', CertificateController::class)->middleware('Student');
Route::resource('work', WorkController::class)->middleware('Student');


Route::post('/lecture/ubdatemarck', [CourseController::class, 'ubdate_marck'])->name('lecture.ubdatemarck');
Route::get('/lecture/showAddUser/{id}', [CourseController::class, 'showAddUser'])->name('lecture.showAddUser');
Route::post('/lecture/saveAddUser/{id}', [CourseController::class, 'saveAddUser'])->name('lecture.saveAddUser');
Route::post('/lecture/saveDeleteUser/{id}', [CourseController::class, 'saveDeleteUser'])->name('lecture.saveDeleteUser');
Route::get('/lecture/is_attend/{id}', [LectureController::class, 'is_attend'])->name('is_attend');


Route::post('/storeImage/{id}',[UserController::class,'storeImage'])->name('photo.save');
Route::post('/destroyImage/{id}',[UserController::class,'destroyImage'])->name('photo.destroy');









