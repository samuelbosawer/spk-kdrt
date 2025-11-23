<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        DB::table('dosens')->insert([
            'nama_depan'    => 'Hasrul',
            'nama_belakang' => null,
            'alamat'        => 'Jayapura, Papua',
            'no_hp'         => '081234567899',
            'jenis_kelamin' => 'L',
            'tempat_lahir'  => 'Makassar',
            'tanggal_lahir' => '1985-03-14',
            'user_id'       => 4,
        ]);
    }
}
