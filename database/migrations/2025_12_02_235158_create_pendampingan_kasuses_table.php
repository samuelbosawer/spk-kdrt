<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendampingan_kasuses', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_pendampingan');
            $table->string('petugas_pendamping_id');
            $table->string('pengaduan_masyarakat_id');
           
            $table->string('bukti')->nullable();
            $table->string('keterangan')->nullable();

            // // Foreign Keyspetugas_pendampings
            // $table->foreign('petugas_pendamping_id')->references('id')->on('pentugas_pendampings');
            // $table->foreign('pengaduan_masyarakat_id')->references('id')->on('pengaduan_masyarakats');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendampingan_kasuses');
    }
};
