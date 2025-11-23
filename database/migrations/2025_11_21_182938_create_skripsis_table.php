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
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->string('berkas')->nullable();
            $table->unsignedBigInteger('id_proposal');
            $table->string('status')->nullable();
            $table->text('keterangan')->nullable();

            // Relasi ke tabel proposal
            $table->foreign('id_proposal')
                ->references('id')
                ->on('proposals')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsis');
    }
};
