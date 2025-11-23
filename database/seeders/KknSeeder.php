<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KknSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kkns')->insert([
            'nama_kkn'      => 'KKN Tematik UMPAPUA',
            'tahun'         => 2025,            // ganti dari tanggal → tahun
            'status'        => 'Diajukan',
            'sk'            => 'SK-KKN-2025-001',
        ]);
    }
}
