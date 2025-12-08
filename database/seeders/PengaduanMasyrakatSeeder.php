<?php

namespace Database\Seeders;

use App\Models\PengaduanMasyarakat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaduanMasyrakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PengaduanMasyarakat::create([
            'nama_pengadu' => 'Samuel Bosawer',
            'nama_korban' => 'Nama Korban',
            'nama_pelaku' => 'Nama Pelaku',
            'jk_korban' => 'Pria',
            'lokasi_kejadian' => 'Jayapura, Papua',
            'deskripsi_singkat' => 'Kejadian singkat yang dilaporkan.',
            'bukti_gambar' => '',
            'tanggal_kejadian' => '2025-01-01',
            'no_hp' => '081234567890',
            'user_id' => 4
        ]);
    }
}
