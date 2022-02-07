<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/doctor-list', [App\Http\Controllers\HomeController::class, 'doctor'])->name('doctor');
Route::get('/doctor-category/{id}', [App\Http\Controllers\HomeController::class, 'doctorCategory'])->name('doctor-category');
Route::get('/doctor/{id}', [App\Http\Controllers\HomeController::class, 'doctorDetails'])->name('doctor-detail');
Route::get('/hospital-list', [App\Http\Controllers\HomeController::class, 'hospital'])->name('hospital');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/review-store', [App\Http\Controllers\HomeController::class, 'storeReview'])->name('review-store');
