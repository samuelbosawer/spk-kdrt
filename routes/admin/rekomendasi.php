<?php

use App\Http\Controllers\Admin\RekomendasiController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(RekomendasiController::class)->group(function(){
        Route::get('[petugas', [RekomendasiController::class, 'index'])->name('[petugas');
        Route::get('[petugas/tambah', [RekomendasiController::class, 'create'])->name('[petugas.tambah');
        Route::get('[petugas/detail/{id}', [RekomendasiController::class, 'show'])->name('[petugas.detail');
        Route::delete('[petugas/{id}', [RekomendasiController::class, 'destroy'])->name('[petugas.hapus');
        Route::post('[petugas/store', [RekomendasiController::class, 'store'])->name('[petugas.store');
        Route::get('[petugas/{id}/ubah', [RekomendasiController::class, 'edit'])->name('[petugas.ubah');
        Route::put('[petugas/{id}', [RekomendasiController::class, 'update'])->name('[petugas.update');
    });
});
