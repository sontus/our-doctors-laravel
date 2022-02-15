<?php
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChamberController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\HospitalController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\UsersController;
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
Route::get('/search-doctor',[App\Http\Controllers\HomeController::class, 'search_doctor'])->name('doctor-search');
Route::post('/doctor-register',[App\Http\Controllers\HomeController::class, 'doctor_register'])->name('doctor-register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/review-store', [App\Http\Controllers\HomeController::class, 'storeReview'])->name('review-store');

Route::group(['prefix'=>'admin','middleware' => 'auth'],function (){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('users',UsersController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('hospital',HospitalController::class);
    Route::get('/gtDist/{id?}', [HospitalController::class,'getDistrictByDivision'])->name('gtDist');
    Route::get('/gtUpz/{id?}', [HospitalController::class,'getUpazillaByDistrict'])->name('gtUpz');
    Route::resource('chamber',ChamberController::class);
    Route::resource('doctor',DoctorController::class);
    Route::resource('review',ReviewController::class);
});
Route::get('clear-all-developer', function () {
    Artisan::call('storage:link');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');

    return redirect()->back();
});
