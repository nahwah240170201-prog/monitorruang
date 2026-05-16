<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 9; $i++) {

            DB::table('kelas')->insert([
                'mata_kuliah_id' => 1,
                'nama_kelas' => 'A' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}