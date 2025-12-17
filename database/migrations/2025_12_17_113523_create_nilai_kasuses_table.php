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
        Schema::create('nilai_kasuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengaduan_masyarakat_id');
            $table->unsignedBigInteger('alternatif_id');
            $table->string('nilai_kasus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_kasuses');
    }
};
