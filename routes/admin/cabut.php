<?php

use App\Http\Controllers\Admin\CabutController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(CabutController::class)->group(function(){
        Route::get('cabut-laporan', [CabutController::class, 'index'])->name('cabut-laporan');
        Route::get('cabut-laporan/tambah', [CabutController::class, 'create'])->name('cabut-laporan.tambah');
        Route::get('cabut-laporan/detail/{id}', [CabutController::class, 'show'])->name('cabut-laporan.detail');
        Route::delete('cabut-laporan/{id}', [CabutController::class, 'destroy'])->name('cabut-laporan.hapus');
        Route::post('cabut-laporan/store', [CabutController::class, 'store'])->name('cabut-laporan.store');
        Route::get('cabut-laporan/{id}/ubah', [CabutController::class, 'edit'])->name('cabut-laporan.ubah');
        Route::put('cabut-laporan/{id}', [CabutController::class, 'update'])->name('cabut-laporan.update');
    });
});
