<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['kode' => 'C1', 'kriteria' => 'Kekerasan Fisik', 'jenis_faktor' => 'Core', 'bobot' => 0.35],
            ['kode' => 'C2', 'kriteria' => 'Kekerasan Psikologis', 'jenis_faktor' => 'Core', 'bobot' => 0.30],
            ['kode' => 'C3', 'kriteria' => 'Kekerasan Seksual', 'jenis_faktor' => 'Secondary', 'bobot' => 0.20],
            ['kode' => 'C4', 'kriteria' => 'Penelantaran Ekonomi', 'jenis_faktor' => 'Secondary', 'bobot' => 0.15],
        ];

        foreach ($data as $item) {
            Kriteria::create($item);
        }
    }
}
