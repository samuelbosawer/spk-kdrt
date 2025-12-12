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
        Schema::create('rekomendasis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_spk');
            $table->unsignedBigInteger('pendampingan_kasus_id');
            $table->unsignedBigInteger('konversi_id');
            $table->string('nilai_tertinggi');
            $table->integer('rekomendasi');

            // Relasi
            $table->foreign('pendampingan_kasus_id')
                  ->references('id')
                  ->on('pendampingan_kasuses')
                  ->onDelete('cascade');

   



            $table->foreign('konversi_id')
                  ->references('id')
                  ->on('konversis')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasis');
    }
};
