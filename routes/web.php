<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backoffice\Auth\LoginController;
use App\Http\Controllers\Backoffice\Dashboard\DashboardController;
use App\Http\Controllers\Backoffice\ProvinceController;
use App\Http\Controllers\Backoffice\CitiesController;
use App\Http\Controllers\Backoffice\VaccinationController;
use App\Http\Controllers\Backoffice\HealthFacilitiesController;
use App\Http\Controllers\Backoffice\ReportController;
use App\Http\Controllers\Backoffice\UserController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
   });
});

Route::group([ 'prefix' => 'login', 'as' => 'login.' ], function () {
    Route::get('backoffice', [LoginController::class, 'index'])->name('index');
    Route::post('backoffice-login', [LoginController::class, 'execute'])->name('execute');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user-add', [UserController::class, 'create'])->name('user.create');
    Route::post('/user-store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user-update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user-destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user-data', [UserController::class, 'data'])->name('user.data.index');

    Route::get('/provinces', [ProvinceController::class, 'index'])->name('provinces.index');
    Route::get('/provinces-add', [ProvinceController::class, 'create'])->name('provinces.create');
    Route::post('/provinces-store', [ProvinceController::class, 'store'])->name('provinces.store');
    Route::get('/provinces-edit/{id}', [ProvinceController::class, 'edit'])->name('provinces.edit');
    Route::put('/provinces-update/{id}', [ProvinceController::class, 'update'])->name('provinces.update');
    Route::delete('/provinces-destroy/{id}', [ProvinceController::class, 'destroy'])->name('provinces.destroy');
    Route::get('/provinces-data', [ProvinceController::class, 'data'])->name('provinces.data.index');

    Route::get('/cities', [CitiesController::class, 'index'])->name('cities.index');
    Route::get('/cities-add', [CitiesController::class, 'create'])->name('cities.create');
    Route::post('/cities-store', [CitiesController::class, 'store'])->name('cities.store');
    Route::get('/cities-edit/{id}', [CitiesController::class, 'edit'])->name('cities.edit');
    Route::put('/cities-update/{id}', [CitiesController::class, 'update'])->name('cities.update');
    Route::delete('/cities-destroy/{id}', [CitiesController::class, 'destroy'])->name('cities.destroy');
    Route::get('/cities-data', [CitiesController::class, 'data'])->name('cities.data.index');

    Route::get('/vaccination', [VaccinationController::class, 'index'])->name('vaccination.index');
    Route::get('/vaccination-add', [VaccinationController::class, 'create'])->name('vaccination.create');
    Route::post('/vaccination-store', [VaccinationController::class, 'store'])->name('vaccination.store');
    Route::get('/vaccination-edit/{id}', [VaccinationController::class, 'edit'])->name('vaccination.edit');
    Route::put('/vaccination-update/{id}', [VaccinationController::class, 'update'])->name('vaccination.update');
    Route::delete('/vaccination-destroy/{id}', [VaccinationController::class, 'destroy'])->name('vaccination.destroy');
    Route::get('/vaccination-data', [VaccinationController::class, 'data'])->name('vaccination.data.index');

    Route::get('/health-facilities', [HealthFacilitiesController::class, 'index'])->name('health-facilities.index');
    Route::get('/health-facilities-add', [HealthFacilitiesController::class, 'create'])->name('health-facilities.create');
    Route::post('/health-facilities-store', [HealthFacilitiesController::class, 'store'])->name('health-facilities.store');
    Route::get('/health-facilities-edit/{id}', [HealthFacilitiesController::class, 'edit'])->name('health-facilities.edit');
    Route::put('/health-facilities-update/{id}', [HealthFacilitiesController::class, 'update'])->name('health-facilities.update');
    Route::delete('/health-facilities-destroy/{id}', [HealthFacilitiesController::class, 'destroy'])->name('health-facilities.destroy');
    Route::get('/health-facilities-data', [HealthFacilitiesController::class, 'data'])->name('health-facilities.data.index');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    
});
