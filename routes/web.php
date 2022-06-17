<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\JenisKegiatanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\N1n01Controller;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\RequirementsController;
use App\Http\Controllers\RequirementsListController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\UserController;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
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

    Route::prefix('permohonan')->group(function () {
        Route::get('/layanan', [PermohonanController::class, 'firstView'])->name('permohonan.first-view');
        Route::post('/layanan', [PermohonanController::class, 'firstSubmit'])->name('permohonan.first-submit');
        Route::get('/pemohon/{service}', [PermohonanController::class, 'secondView'])->name('permohonan.second-view');
        Route::post('/pemohon/{service}', [PermohonanController::class, 'secondSubmit'])->name('permohonan.second-submit');
        Route::get('/data-new/{service}/{applicant}', [PermohonanController::class, 'thirdView'])->name('permohonan.third-view-new');
        // Route::get('/data/{service}/{applicant}/{id}', [PermohonanController::class, 'thirdView'])->name('permohonan.third-view');
        Route::get('/data/{service}/{applicant}/{id?}', [PermohonanController::class, 'thirdView'])->name('permohonan.third-view');
        // Route::post('/data/{id}', [PermohonanController::class, 'thirdSubmit'])->name('permohonan.third-submit');

        Route::resource('n1n01', N1n01Controller::class);

        Route::post('upload-syarat/{service}', [FileController::class, 'upload'])->name('upload');
    });

    Route::resource('applicant', ApplicantController::class);

    Route::resource('member', MemberController::class)->except(['create', 'store', 'show'])->parameter('member', 'user');
    Route::resource('informasi', InformationController::class)->parameter('informasi', 'information');
    Route::resource('download', DownloadController::class)->parameter('download', 'download');
    Route::resource('admin', UserController::class)->parameter('admin', 'user');
    Route::resource('service', ServiceController::class)->parameter('service', 'service');
    Route::resource('requirements', RequirementsController::class)->parameter('requirements', 'requirements');
    Route::resource('requirements-list', RequirementsListController::class)->parameter('requirements-list', 'requirements-list');
    Route::resource('signature', SignatureController::class)->parameter('signature', 'signature');

    Route::prefix('datatables')->group(function () {
        Route::get('member', [MemberController::class, 'datatable'])->name('member.datatable');
        Route::get('informasi', [InformationController::class, 'datatable'])->name('informasi.datatable');
        Route::get('download', [DownloadController::class, 'datatable'])->name('download.datatable');
        Route::get('admin', [UserController::class, 'datatable'])->name('admin.datatable');
        Route::get('service', [ServiceController::class, 'datatable'])->name('service.datatable');
        Route::get('requirements', [RequirementsController::class, 'datatable'])->name('requirements.datatable');
        Route::get('requirements-list', [RequirementsListController::class, 'datatable'])->name('requirements-list.datatable');
        Route::get('signature', [SignatureController::class, 'datatable'])->name('signature.datatable');

        Route::get('draft', [DraftController::class, 'datatable'])->name('draft.datatable');
    });
});

Route::prefix('wilayah-administratif')->group(function () {
    Route::get('provinsi', function () {
        return Province::all();
    })->name('provinsi');

    Route::get('kabupaten/{province_id}', function ($province_id) {
        return City::where('province_id', $province_id)->get();
    })->name('kabupaten');

    Route::get('kecamatan/{city_id}', function ($city_id) {
        return District::where('city_id', $city_id)->get();
    })->name('kecamatan');

    Route::get('kelurahan/{district_id}', function ($district_id) {
        return Village::where('district_id', $district_id)->get();
    })->name('kelurahan');
});

Route::get('kelurahan-sda/{kecamatan_id}', function ($kecamatan_id) {
    return Village::where('district_id', $kecamatan_id)->get();
})->name('kelurahan-sda.by_kecamatan');

Route::get('jenis-kegiatan/{kegiatan}', [JenisKegiatanController::class, 'showByKegiatanId'])->name('jenis-kegiatan.by_kegiatan');
