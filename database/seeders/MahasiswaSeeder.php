<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'nama_depan'     => 'Samuel',
                'nama_belakang'  => 'Bosawer',
                'semester'       => '5',
                'alamat'         => 'Jayapura, Papua',
                'no_hp'          => '081234567890',
                'jenis_kelamin'  => 'L',
                'tempat_lahir'   => 'Wamena',
                'tanggal_lahir'  => '2000-05-12',
                'user_id'        => 2,
              
            ],
            [
                'nama_depan'     => 'Maria',
                'nama_belakang'  => 'Yoku',
                'semester'       => '3',
                'alamat'         => 'Sentani, Papua',
                'no_hp'          => '082345678901',
                'jenis_kelamin'  => 'P',
                'tempat_lahir'   => 'Jayapura',
                'tanggal_lahir'  => '2001-09-20',
                'user_id'        => 3,
            ],
        ]);
    }
}
