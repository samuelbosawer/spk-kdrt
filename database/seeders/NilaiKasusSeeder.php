<?php

namespace Database\Seeders;

use App\Models\NilaiKasus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiKasusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // K1
            [1, 1, 4],
            [1, 2, 3],
            [1, 3, 2],
            [1, 4, 3],

            // K2
            [2, 1, 5],
            [2, 2, 2],
            [2, 3, 1],
            [2, 4, 2],

            // K3
            [3, 1, 5],
            [3, 2, 4],
            [3, 3, 3],
            [3, 4, 4],

            // K4
            [4, 1, 1],
            [4, 2, 2],
            [4, 3, 2],
            [4, 4, 1],

            // K5
            [5, 1, 5],
            [5, 2, 5],
            [5, 3, 1],
            [5, 4, 2],
        ];

        foreach ($data as $item) {
            NilaiKasus::create([
                'pengaduan_masyarakat_id' => $item[0],
                'alternatif_id' => $item[1],
                'nilai_kasus' => $item[2],
            ]);
        }
    }
}
