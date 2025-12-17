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
            'judul_pengaduan' => 'Kekerasan dalam rumah tangga',
            'nama_pengadu' => 'Mira Jikwa',
            'nama_korban' => 'Mira Jikwa',
            'nama_pelaku' => 'Garik Kogoya',
            'jk_korban' => 'Wanita',
            'lokasi_kejadian' => 'Timika',
            'deskripsi_singkat' => 'Pemukulan dibagian kepala belakang',
            'bukti_gambar' => '',
            'tanggal_kejadian' => '2025-01-01',
            'no_hp' => '081234567890',
            'user_id' => 4
        ]);


        PengaduanMasyarakat::create([
            'judul_pengaduan' => 'Kekerasan Dalam Rumah Tangga (KDRT)',
            'nama_pengadu' => 'Angel',
            'nama_korban' => 'Angel',
            'nama_pelaku' => 'Yohan Kambu',
            'jk_korban' => 'Wanita',
            'lokasi_kejadian' => 'Jayapura',
            'deskripsi_singkat' => 'Korban mengalami kekerasan fisik berupa pemukulan di bagian lengan dan punggung.',
            'bukti_gambar' => '',
            'tanggal_kejadian' => '2025-01-05',
            'no_hp' => '081234560001',
            'user_id' => 5
        ]);

        PengaduanMasyarakat::create([
            'judul_pengaduan' => 'Kekerasan Fisik oleh Pasangan',
            'nama_pengadu' => 'Julia',
            'nama_korban' => 'Julia',
            'nama_pelaku' => 'Riko Wenda',
            'jk_korban' => 'Wanita',
            'lokasi_kejadian' => 'Timika',
            'deskripsi_singkat' => 'Korban dipukul dan didorong hingga terjatuh saat terjadi pertengkaran.',
            'bukti_gambar' => '',
            'tanggal_kejadian' => '2025-01-10',
            'no_hp' => '081234560002',
            'user_id' => 6
        ]);

        PengaduanMasyarakat::create([
            'judul_pengaduan' => 'Penganiayaan terhadap Perempuan',
            'nama_pengadu' => 'Maria',
            'nama_korban' => 'Maria',
            'nama_pelaku' => 'Anton Tabuni',
            'jk_korban' => 'Wanita',
            'lokasi_kejadian' => 'Nabire',
            'deskripsi_singkat' => 'Korban mengalami kekerasan fisik berupa tamparan dan ancaman verbal.',
            'bukti_gambar' => '',
            'tanggal_kejadian' => '2025-01-15',
            'no_hp' => '081234560003',
            'user_id' => 7
        ]);

        PengaduanMasyarakat::create([
            'judul_pengaduan' => 'Kekerasan Psikis dan Fisik',
            'nama_pengadu' => 'Melan',
            'nama_korban' => 'Melan',
            'nama_pelaku' => 'Ferdy Pigay',
            'jk_korban' => 'Wanita',
            'lokasi_kejadian' => 'Timika',
            'deskripsi_singkat' => 'Korban mengalami tekanan psikis dan kekerasan fisik berupa cubitan dan pukulan.',
            'bukti_gambar' => '',
            'tanggal_kejadian' => '2025-01-20',
            'no_hp' => '081234560004',
            'user_id' => 8
        ]);
    }
}
