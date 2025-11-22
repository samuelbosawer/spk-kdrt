<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('home');


        require_once 'admin/prodi.php'; 
        require_once 'admin/mahasiswa.php';
        require_once 'admin/dosen.php';
        require_once 'admin/magang.php';
        require_once 'admin/formmagang.php';
        require_once 'admin/formkkn.php';
        require_once 'admin/kkn.php';
        require_once 'admin/proposal.php';
        require_once 'admin/skripsi.php';
        require_once 'admin/pengumuman.php';
    });
});
