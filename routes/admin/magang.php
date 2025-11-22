<?php

use App\Http\Controllers\Admin\MagangController as Magang;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Magang::class)->group(function(){
        Route::get('magang', [Magang::class, 'index'])->name('magang');
        Route::get('magang/tambah', [Magang::class, 'create'])->name('magang.tambah');
        Route::get('magang/detail/{id}', [Magang::class, 'show'])->name('magang.detail');
        Route::delete('magang/{id}', [Magang::class, 'destroy'])->name('magang.hapus');
        Route::post('magang/store', [Magang::class, 'store'])->name('magang.store');
        Route::get('magang/{id}/ubah', [Magang::class, 'edit'])->name('magang.ubah');
        Route::put('magang/{id}', [Magang::class, 'update'])->name('magang.update');
    });
});
