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
        Schema::create('pengaduan_masyarakats', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pengaduan');
            $table->string('nama_pengadu');
            $table->string('nama_korban');
            $table->string('nama_pelaku')->nullable();
            $table->string('jk_korban')->nullable();
            $table->string('lokasi_kejadian');
            $table->text('deskripsi_singkat')->nullable();
            $table->string('bukti_gambar')->nullable();
            $table->date('tanggal_kejadian');
            $table->string('no_hp')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('user_id'); // default = 4

            // relasi ke user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan_masyarakats');
    }
};
