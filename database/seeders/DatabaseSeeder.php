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
<<<<<<< HEAD
=======
            KelasSeeder::class,
            MataKuliahSeeder::class,
            SemesterSeeder::class,
>>>>>>> 521cb72cda8249e311bc079e9d7237cc65a41bda
        ]);
    }
}