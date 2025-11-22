<?php

use App\Http\Controllers\Admin\SkripsiController as Skripsi;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Skripsi::class)->group(function(){
        Route::get('skripsi', [Skripsi::class, 'index'])->name('skripsi');
        Route::get('skripsi/tambah', [Skripsi::class, 'create'])->name('skripsi.tambah');
        Route::get('skripsi/detail/{id}', [Skripsi::class, 'show'])->name('skripsi.detail');
        Route::delete('skripsi/{id}', [Skripsi::class, 'destroy'])->name('skripsi.hapus');
        Route::post('skripsi/store', [Skripsi::class, 'store'])->name('skripsi.store');
        Route::get('skripsi/{id}/ubah', [Skripsi::class, 'edit'])->name('skripsi.ubah');
        Route::put('skripsi/{id}', [Skripsi::class, 'update'])->name('skripsi.update');
    });
});
