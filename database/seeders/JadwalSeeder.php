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
                'hari'        => 'senin',
                'jam_mulai'   => '08:00:00',
                'jam_selesai' => '10:30:00',
                'mata_kuliah' => 'Pemrograman Web Lanjut',
                'kelas'       => 'A3',
                'ruangan'     => 'LAB INFORMATIKA 1',
                'status'      => 'Digunakan',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'hari'        => 'selasa',
                'jam_mulai'   => '08:00:00',
                'jam_selesai' => '10:30:00',
                'mata_kuliah' => 'Internet Of Things',
                'kelas'       => 'A3',
                'ruangan'     => 'LAB INFORMATIKA 4',
                'status'      => 'Digunakan',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'hari'        => 'selasa',
                'jam_mulai'   => '10:40:00',
                'jam_selesai' => '13:10:00',
                'mata_kuliah' => 'Aljabar Linier Elementer',
                'kelas'       => 'A4',
                'ruangan'     => 'INF-RUANG KULIAH II',
                'status'      => 'Digunakan',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

        ]);
    }
}