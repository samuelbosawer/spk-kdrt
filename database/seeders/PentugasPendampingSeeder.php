<?php

namespace Database\Seeders;

use App\Models\PentugasPendamping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PentugasPendampingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       PentugasPendamping::create([
            'nip' => '1234567890',
            'nama_petugas' => 'William Mote',
            'jk' => 'Pria',
            'alamat' => 'Timika, Papua Tengah',
            'no_hp' => '081234567890',
            'user_id' => 2,
        ]);

         PentugasPendamping::create([
            'nip' => '1234567890',
            'nama_petugas' => 'William K',
            'jk' => 'Pria',
            'alamat' => 'Timika, Papua Tengah',
            'no_hp' => '081234567890',
            'user_id' => 9,
        ]);
    }
}
