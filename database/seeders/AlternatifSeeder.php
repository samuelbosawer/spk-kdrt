<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'P2TP2A (Pusat Pelayanan Terpadu Pemberdayaan Perempuan dan Anak)',
            'Polisi',
            'Pengadilan',
            'Kekeluargaan',
        ];

        foreach ($data as $item) {
            Alternatif::create([
                'alternatif' => $item,
                'nilai_ideal_alternatif' => 0.5,
            ]);
        }
    }
}
