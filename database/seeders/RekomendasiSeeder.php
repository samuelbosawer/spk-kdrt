<?php

namespace Database\Seeders;

use App\Models\Rekomendasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekomendasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rekomendasi::create([
            'tanggal_spk' => '2025-01-15',
            'pendampingan_kasus_id' => 1,
            'konversi_id' => 1,
            'nilai_tertinggi' => 'Kriteria A',
            'rekomendasi' => 90
        ]);

    }
}
