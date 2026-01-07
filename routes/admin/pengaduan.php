<?php

use App\Http\Controllers\Admin\PengaduanController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(PengaduanController::class)->group(function(){
        Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
        Route::get('pengaduan/tambah', [PengaduanController::class, 'create'])->name('pengaduan.tambah')->middleware(['auth','role.custom:masyarakat']);
        Route::get('pengaduan/detail/{id}', [PengaduanController::class, 'show'])->name('pengaduan.detail');
        Route::delete('pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.hapus')->middleware(['auth','role.custom:masyarakat']);
        Route::post('pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store')->middleware(['auth','role.custom:masyarakat']);
        Route::get('pengaduan/{id}/ubah', [PengaduanController::class, 'edit'])->name('pengaduan.ubah')->middleware(['auth','role.custom:masyarakat']);
        Route::put('pengaduan/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update')->middleware(['auth','role.custom:masyarakat']);
    });
});
