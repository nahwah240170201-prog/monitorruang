<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mata_kuliahs')->insert([

            [
                'semester_id' => 2,
                'kode' => 'INF0623',
                'nama_mk' => 'ALGORITMA DAN STRUKTUR DATA I',
                'sks' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'semester_id' => 2,
                'kode' => 'INF0723',
                'nama_mk' => 'ALJABAR LINIER ELEMENTER',
                'sks' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'semester_id' => 2,
                'kode' => 'INF0823',
                'nama_mk' => 'ANALISIS DAN PERANCANGAN SISTEM',
                'sks' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}