<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(DosenSeeder::class);
        $this->call(MagangSeeder::class);
        $this->call(FormMagangSeeder::class);
        $this->call(KknSeeder::class);
        $this->call(FormKknSeeder::class);
        $this->call(ProposalSeeder::class);
        $this->call(SkripsiSeeder::class);
        $this->call(PengumumanSeeder::class);
    }
}
