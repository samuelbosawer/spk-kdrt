<?php

use App\Http\Controllers\Admin\PendampinganController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(PendampinganController::class)->group(function(){
        Route::get('[PendampinganCon', [PendampinganController::class, 'index'])->name('[PendampinganCon');
        Route::get('[PendampinganCon/tambah', [PendampinganController::class, 'create'])->name('[PendampinganCon.tambah');
        Route::get('[PendampinganCon/detail/{id}', [PendampinganController::class, 'show'])->name('[PendampinganCon.detail');
        Route::delete('[PendampinganCon/{id}', [PendampinganController::class, 'destroy'])->name('[PendampinganCon.hapus');
        Route::post('[PendampinganCon/store', [PendampinganController::class, 'store'])->name('[PendampinganCon.store');
        Route::get('[PendampinganCon/{id}/ubah', [PendampinganController::class, 'edit'])->name('[PendampinganCon.ubah');
        Route::put('[PendampinganCon/{id}', [PendampinganController::class, 'update'])->name('[PendampinganCon.update');
    });
});
