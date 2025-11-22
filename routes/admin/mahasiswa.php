<?php

use App\Http\Controllers\Admin\MahasiswaController as Mahasiswa;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Mahasiswa::class)->group(function(){
        Route::get('mahasiswa', [Mahasiswa::class, 'index'])->name('mahasiswa');
        Route::get('mahasiswa/tambah', [Mahasiswa::class, 'create'])->name('mahasiswa.tambah');
        Route::get('mahasiswa/detail/{id}', [Mahasiswa::class, 'show'])->name('mahasiswa.detail');
        Route::delete('mahasiswa/{id}', [Mahasiswa::class, 'destroy'])->name('mahasiswa.hapus');
        Route::post('mahasiswa/store', [Mahasiswa::class, 'store'])->name('mahasiswa.store');
        Route::get('mahasiswa/{id}/ubah', [Mahasiswa::class, 'edit'])->name('mahasiswa.ubah');
        Route::put('mahasiswa/{id}', [Mahasiswa::class, 'update'])->name('mahasiswa.update');
    });
});
