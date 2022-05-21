<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\RequirementsController;
use App\Http\Controllers\RequirementsListController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register' => true,
    'reset' => true,
    'verify' => true,
]);

Route::get('activate', [RegisterController::class, 'verify'])->name('activate');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('profile-setting', [UserController::class, 'show'])->name('profile');

    Route::resource('informasi', InformationController::class)->parameter('informasi', 'information');
    Route::resource('download', DownloadController::class)->parameter('download', 'download');
    Route::resource('admin', UserController::class)->parameter('admin', 'user');
    Route::resource('service', ServiceController::class)->parameter('service', 'service');
    Route::resource('requirements', RequirementsController::class)->parameter('requirements', 'requirements');
    Route::resource('requirements-list', RequirementsListController::class)->parameter('requirements-list', 'requirements-list');
    Route::resource('signature', SignatureController::class)->parameter('signature', 'signature');

    Route::prefix('datatables')->group(function () {
        Route::get('informasi', [InformationController::class, 'datatable'])->name('informasi.datatable');
        Route::get('download', [DownloadController::class, 'datatable'])->name('download.datatable');
        Route::get('admin', [UserController::class, 'datatable'])->name('admin.datatable');
        Route::get('service', [ServiceController::class, 'datatable'])->name('service.datatable');
        Route::get('requirements', [RequirementsController::class, 'datatable'])->name('requirements.datatable');
        Route::get('requirements-list', [RequirementsListController::class, 'datatable'])->name('requirements-list.datatable');
        Route::get('signature', [SignatureController::class, 'datatable'])->name('signature.datatable');
    });
});
