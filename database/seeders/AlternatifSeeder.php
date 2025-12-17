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

        $nilai = [
            3,
            4,
            2,
            1,
        ];

        foreach ($data as $key => $item) {
            Alternatif::create([
                'alternatif' => $item,
                'nilai_ideal_alternatif' => $nilai[$key],
            ]);
        }
    }
}
