<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('semesters')->insert([
            [
                'nama_semester' => 'Semester 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_semester' => 'Semester 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_semester' => 'Semester 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_semester' => 'Semester 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_semester' => 'Semester 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_semester' => 'Semester 6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_semester' => 'Semester 7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_semester' => 'Semester 8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}