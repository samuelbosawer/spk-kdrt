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
        Schema::create('magangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_magang')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('semester')->nullable();
            $table->string('sk')->nullable();     // No SK / file SK
            $table->text('ket')->nullable();
             $table->unsignedBigInteger('dosen_id'); // Relasi ke tabel dosens
            $table->string('status')->nullable();
            $table->foreign('dosen_id')
                  ->references('id')->on('dosens')
                  ->onDelete('cascade');      // Keterangan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magangs');
    }
};
