<?php

use App\Http\Controllers\Web\V1\AbsencesController;
use App\Http\Controllers\Web\V1\AdminController;
use App\Http\Controllers\Web\V1\AuthController;
use App\Http\Controllers\Web\V1\DataController;
use App\Http\Controllers\Web\V1\EmployeeController;
use App\Http\Controllers\Web\V1\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/processLogin', [AuthController::class, 'processLogin'])->name('processLogin');

// home page route
Route::middleware('auth')->group(function () {
    Route::name('home.')->prefix('home')->group(function () {
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
        });
    });
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::post('/', 'store')->name('store');
            Route::put('/', 'update')->name('update');
        });
    });
    Route::name('employee.')->prefix('employee')->group(function () {
        Route::controller(EmployeeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::post('/', 'store')->name('store');
            Route::put('/', 'update')->name('update');
        });
    });
    Route::name('absences.')->prefix('absences')->group(function () {
        Route::controller(AbsencesController::class)->group(function () {
            Route::get('/', 'index')->name('index');
        });
    });
    Route::name('data.')->prefix('data')->group(function () {
        Route::controller(DataController::class)->group(function () {
            Route::get('/admin', 'dataAdmin')->name('dataAdmin');
            Route::get('/employee', 'dataEmployee')->name('employee');
        });
    });
});
