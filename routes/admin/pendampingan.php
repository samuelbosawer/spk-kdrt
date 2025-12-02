<?php

use App\Http\Controllers\Admin\PendampinganController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(PendampinganController::class)->group(function(){
        Route::get('pendampingan', [PendampinganController::class, 'index'])->name('pendampingan');
        Route::get('pendampingan/tambah', [PendampinganController::class, 'create'])->name('pendampingan.tambah');
        Route::get('pendampingan/detail/{id}', [PendampinganController::class, 'show'])->name('pendampingan.detail');
        Route::delete('pendampingan/{id}', [PendampinganController::class, 'destroy'])->name('pendampingan.hapus');
        Route::post('pendampingan/store', [PendampinganController::class, 'store'])->name('pendampingan.store');
        Route::get('pendampingan/{id}/ubah', [PendampinganController::class, 'edit'])->name('pendampingan.ubah');
        Route::put('pendampingan/{id}', [PendampinganController::class, 'update'])->name('pendampingan.update');
    });
});
