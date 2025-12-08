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
        Schema::create('petugas_pendampings', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->nullable();
            $table->string('nama_petugas');
            $table->string('jk')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->unsignedBigInteger('user_id');

            // Relasi
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas_pendampings');
    }
};
