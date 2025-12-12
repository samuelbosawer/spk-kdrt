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
            $table->unsignedBigInteger('tanggal_pendampingan');
            $table->unsignedBigInteger('petugas_pendamping_id');
            $table->unsignedBigInteger('pengaduan_masyarakat_id');
            $table->unsignedBigInteger('alternatif_id');
            $table->unsignedBigInteger('kriteria_id');

            $table->string('penilaian_kasus');

            // Foreign Keys
            $table->foreign('petugas_pendamping_id')->references('id')->on('petugas_pendampings')->onDelete('cascade');;
            $table->foreign('pengaduan_masyarakat_id')->references('id')->on('pengaduan_masyarakats');
            $table->foreign('alternatif_id')->references('id')->on('alternatifs');
            $table->foreign('kriteria_id')->references('id')->on('kriterias');

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
