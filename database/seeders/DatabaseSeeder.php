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
        $this->call(PentugasPendampingSeeder::class);
        $this->call(AlternatifSeeder::class);
        $this->call(KriteriaSeeder::class);
        $this->call(KonversiSeeder::class);
        $this->call(PengaduanMasyrakatSeeder::class);
        
    }
}
