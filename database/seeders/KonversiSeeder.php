<?php

namespace Database\Seeders;

use App\Models\Konversi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KonversiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nilai_gap' => 0,  'bobot_w' => 5],
            ['nilai_gap' => 1,  'bobot_w' => 4.5],
            ['nilai_gap' => -1, 'bobot_w' => 4],
            ['nilai_gap' => 2,  'bobot_w' => 3.5],
            ['nilai_gap' => -2, 'bobot_w' => 3],
            ['nilai_gap' => 3,  'bobot_w' => 2.5],
            ['nilai_gap' => -3, 'bobot_w' => 2],
            ['nilai_gap' => 4,  'bobot_w' => 1.5],
            ['nilai_gap' => -4, 'bobot_w' => 1],
            ['nilai_gap' => 0,  'bobot_w' => 5],   // duplikasi sesuai data
            ['nilai_gap' => 1,  'bobot_w' => 4.5], // duplikasi sesuai data
        ];

        foreach ($data as $item) {
            Konversi::create($item);
        }
    }
}
