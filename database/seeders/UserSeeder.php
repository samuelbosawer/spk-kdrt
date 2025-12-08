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
            'email' => 'admindinas@master.com',
            'password' =>  bcrypt('admindinas@master.com'),

        ]);

               $user->assignRole('admindinas');

         $user = User::create([
            'email' => 'petugas@master.com',
            'password' =>  bcrypt('petugas@master.com'),

        ]);
        $user->assignRole('petugas');

        
         $user = User::create([
            'email' => 'kepaladinas@master.com',
            'password' =>  bcrypt('kepaladinas@master.com'),

        ]);

        $user->assignRole('kepaladinas');

          $user = User::create([
            'email' => 'jiko@gmail.com',
            'password' =>  bcrypt('jiko@gmail.com'),

        ]);
        $user->assignRole('masyrakat');

        



       
        
    }
}
