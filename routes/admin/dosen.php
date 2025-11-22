<?php

use App\Http\Controllers\Admin\DosenController as Dosen;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Dosen::class)->group(function(){
        Route::get('dosen', [Dosen::class, 'index'])->name('dosen');
        Route::get('dosen/tambah', [Dosen::class, 'create'])->name('dosen.tambah');
        Route::get('dosen/detail/{id}', [Dosen::class, 'show'])->name('dosen.detail');
        Route::delete('dosen/{id}', [Dosen::class, 'destroy'])->name('dosen.hapus');
        Route::post('dosen/store', [Dosen::class, 'store'])->name('dosen.store');
        Route::get('dosen/{id}/ubah', [Dosen::class, 'edit'])->name('dosen.ubah');
        Route::put('dosen/{id}', [Dosen::class, 'update'])->name('dosen.update');
    });
});
