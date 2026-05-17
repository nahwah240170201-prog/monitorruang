<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SemesterSeeder::class,
            JadwalSeeder::class,

            KelasSeeder::class,
            MataKuliahSeeder::class,
            SemesterSeeder::class,
        ]);
    }
}