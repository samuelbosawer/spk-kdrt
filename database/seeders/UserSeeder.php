<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   

        $user = User::create([
            'nama' => 'Staf',
            'alamat' => 'Sentani',
            'no_hp' => '082198159714',
            'email' => 'staf@master.com',
            'password' =>  bcrypt('staf@master.com'),
            'jenis_kelamin' => '',

        ]);
        $user->assignRole('staf');



        $user = User::create([
            'nama' => 'Mahasiswa 1',
            'alamat' => 'Sentani',
            'no_hp' => '082198159711',
            'email' => 'mahasiswa1@gmail.com',
            'password' =>  bcrypt('mahasiswa1@gmail.com'),
            'jenis_kelamin' => '',

        ]);
        $user->assignRole('mahasiswa');
          $user = User::create([
            'nama' => 'Mahasiswa 2',
            'alamat' => 'Sentani',
            'no_hp' => '082198159712',
            'email' => 'mahasiswa2@gmail.com',
            'password' =>  bcrypt('mahasiswa2@gmail.com'),
            'jenis_kelamin' => '',

        ]);
        $user->assignRole('mahasiswa');


        $user = User::create([
            'nama' => 'KAPRODI',
            'alamat' => 'Sentani',
            'no_hp' => '082198159721',
            'email' => 'kaprodi@gmail.com',
            'password' =>  bcrypt('kaprodi@gmail.com'),
            'jenis_kelamin' => '',

        ]);
        $user->assignRole('kaprodi');
    }
}
