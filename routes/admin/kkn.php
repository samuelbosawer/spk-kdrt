<?php

use App\Http\Controllers\Admin\KknController as Kkn;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(Kkn::class)->group(function(){
        Route::get('kkn', [Kkn::class, 'index'])->name('kkn');
        Route::get('kkn/tambah', [Kkn::class, 'create'])->name('kkn.tambah');
        Route::get('kkn/detail/{id}', [Kkn::class, 'show'])->name('kkn.detail');
        Route::delete('kkn/{id}', [Kkn::class, 'destroy'])->name('kkn.hapus');
        Route::post('kkn/store', [Kkn::class, 'store'])->name('kkn.store');
        Route::get('kkn/{id}/ubah', [Kkn::class, 'edit'])->name('kkn.ubah');
        Route::put('kkn/{id}', [Kkn::class, 'update'])->name('kkn.update');
    });
});
