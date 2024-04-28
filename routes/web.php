<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TimelineController;
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


Route::get('/', function() {
    return redirect()->route('auth.login');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function() {

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

});

Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'common.user'], function() {
        
        Route::get('/home', [UserController::class, 'home'])->name('home');

    });

    Route::group(['middleware' => 'super.admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {

        Route::get('/home', [SuperAdminController::class, 'home'])->name('home');

        Route::group(['prefix' => 'employees', 'as' => 'employees.'], function() {

            Route::get('/add', [EmployeeController::class, 'addEmployee'])->name('add');
            Route::post('/processAdition', [EmployeeController::class, 'processAditionEmployee'])->name('processAdition');

        });

        Route::group(['prefix' => 'timelines', 'as' => 'timelines.'], function() {

            Route::get('/', [TimelineController::class, 'index'])->name('index');

            Route::get('/view/{id}', [TimelineController::class, 'viewTimeline'])->name('view');

            Route::get('/add', [TimelineController::class, 'addTimeline'])->name('add');
            Route::post('/store', [TimelineController::class, 'storeTimeline'])->name('store');

        });

    });

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});

Route::fallback(function() {
    abort(404);
});
