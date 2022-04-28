<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('profile-setting', [UserController::class, 'show'])->name('profile');

    Route::resource('informasi', InformationController::class)->parameter('informasi', 'information');
    Route::resource('admin', UserController::class)->parameter('admin', 'user');

    Route::prefix('datatables')->group(function () {
        Route::get('informasi', [InformationController::class, 'datatable'])->name('informasi.datatable');
        Route::get('admin', [UserController::class, 'datatable'])->name('admin.datatable');
    });
});
