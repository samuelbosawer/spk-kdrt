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
            'judul_pengaduan' => 'KDRT',
            'nama_pengadu' => 'Mira Jikwa',
            'nama_korban' => 'Mira Jikwa',
            'nama_pelaku' => 'Garik Kogoya',
            'jk_korban' => 'Wanita',
            'lokasi_kejadian' => 'Timika, Papua',
            'deskripsi_singkat' => 'Pemukulan dibagian kepala belakang',
            'bukti_gambar' => '',
            'tanggal_kejadian' => '2025-01-01',
            'no_hp' => '081234567890',
            'user_id' => 4
        ]);
    }
}
