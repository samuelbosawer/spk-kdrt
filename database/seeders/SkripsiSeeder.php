<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skripsis')->insert([
            [
                'berkas'       => 'skripsi_samuel.pdf',
                'id_proposal'  => 1, // sesuaikan dengan proposal yang sudah ada
                'status'       => 'Belum Selesai',
                'keterangan'   => 'Bab 1–3 selesai, menunggu revisi dosen pembimbing'
            ],
            [
                'berkas'       => null,
                'id_proposal'  => 2,
                'status'       => 'Selesai',
                'keterangan'   => 'Skripsi sudah disidangkan dan dinyatakan lulus'
            ],
        ]);
    }
}
