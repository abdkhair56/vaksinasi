<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backoffice\Auth\LoginController;
use App\Http\Controllers\Backoffice\Dashboard\DashboardController;

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

Route::group([ 'prefix' => 'login', 'as' => 'login.' ], function () {
    Route::get('backoffice', [LoginController::class, 'index'])->name('index');
    Route::post('backoffice-login', [LoginController::class, 'execute'])->name('execute');
});

Route::group(['middleware' => 'auth'], function(){
    Route::group([ 'prefix' => 'logout', 'as' => 'logout.' ], function () {
        Route::get('', [LoginController::class, 'logout'])->name('index');
    });
    Route::group([ 'prefix' => 'dashboard', 'as' => 'dashboard'], function () {
        Route::get('', [DashboardController::class, 'index'])->name('index');
    });
});
