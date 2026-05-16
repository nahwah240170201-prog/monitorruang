<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jadwals')->insert([

            [
                'waktu' => '08:00 - 09:40',
                'mata_kuliah' => 'Pemrograman Web',
                'kelas' => 'IF-2A',
                'ruangan' => 'Lab 1',
                'status' => 'Digunakan',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'waktu' => '10:00 - 11:40',
                'mata_kuliah' => 'Basis Data',
                'kelas' => 'IF-2B',
                'ruangan' => 'Ruang A1',
                'status' => 'Kosong',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'waktu' => '13:00 - 14:40',
                'mata_kuliah' => 'Struktur Data',
                'kelas' => 'IF-2C',
                'ruangan' => 'Lab 2',
                'status' => 'Kosong',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}