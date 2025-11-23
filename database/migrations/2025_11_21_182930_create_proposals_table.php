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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
           $table->string('judul');
            $table->string('berkas')->nullable();
            $table->string('status')->nullable();
            $table->date('tgl')->nullable();
            $table->unsignedBigInteger('id_mahasiswa');

            // Relasi ke tabel mahasiswa
            $table->foreign('id_mahasiswa')
                  ->references('id')
                  ->on('mahasiswas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
