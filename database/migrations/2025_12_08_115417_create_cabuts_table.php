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
        Schema::create('cabuts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengaduan_masyarakat_id');
            $table->unsignedBigInteger('rekomendasi_id');
            $table->string('pilih_kasus');
            $table->string('alasan');

            // Relasi
            $table->foreign('pengaduan_masyarakat_id')
                ->references('id')->on('pengaduan_masyarakats');

            $table->foreign('rekomendasi_id')
                ->references('id')->on('rekomendasis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabuts');
    }
};
