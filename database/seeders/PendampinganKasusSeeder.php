<?php

namespace Database\Seeders;

use App\Models\PendampinganKasus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendampinganKasusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          PendampinganKasus::create([
            'tanggal_pendampingan' => 20250101,
            'petugas_pendamping_id' => 1,
            'pengaduan_masyarakat_id' => 1,
            'alternatif_id' => 1,
            'kriteria_id' => 1,
            'penilaian_kasus' => 'Layak Ditindaklanjuti'
        ]);

        PendampinganKasus::create([
            'tanggal_pendampingan' => 20250102,
            'petugas_pendamping_id' => 1,
            'pengaduan_masyarakat_id' => 1,
            'alternatif_id' => 1,
            'kriteria_id' => 1,
            'penilaian_kasus' => 'Tidak Urgen'
        ]);
    }
}
