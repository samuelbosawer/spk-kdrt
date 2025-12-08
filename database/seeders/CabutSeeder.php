<?php

namespace Database\Seeders;

use App\Models\Cabut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Cabut::create([
            'pengaduan_masyarakat_id' => 1,
            'rekomendasi_id' => 1,
            'pilih_kasus' => 'Kekerasan Rumah Tangga',
            'alasan' => 'Kondisi fisik korban memburuk'
        ]);
    }
}
