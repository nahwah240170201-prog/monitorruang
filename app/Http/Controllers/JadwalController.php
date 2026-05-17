<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal
        $tanggal = $request->query('tanggal', Carbon::today()->toDateString());

        $carbon = Carbon::parse($tanggal);

        // Prev & next
        $prevDate = $carbon->copy()->subDay()->toDateString();
        $nextDate = $carbon->copy()->addDay()->toDateString();

        // Format tanggal Indonesia
        Carbon::setLocale('id');

        $tanggalFormatted = strtolower(
            $carbon->translatedFormat('j F Y')
        );

        // Hari Senin - Jumat
        $startOfWeek = $carbon->copy()->startOfWeek(Carbon::MONDAY);

        $hariLabels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'];

        $hariList = [];

        for ($i = 0; $i < 5; $i++) {

            $day = $startOfWeek->copy()->addDays($i);

            $hariList[] = [
                'label' => $hariLabels[$i],
                'date' => $day->toDateString(),
                'active' => $day->toDateString() === $carbon->toDateString(),
            ];
        }

        // Data jadwal
        $jadwal = $this->getJadwal();

        return view('jadwal', compact(
            'tanggal',
            'tanggalFormatted',
            'prevDate',
            'nextDate',
            'hariList',
            'jadwal'
        ));
    }

    private function getJadwal(): array
    {
        return [

            [
                'waktu' => '08.00 - 10.30',

                'ruang_a1' => [
                    'mata_kuliah' => 'Pemrograman Web',
                    'kelas' => 'IF - 2A',
                    'warna' => 'red',
                ],

                'ruang_a2' => null,

                'ruang_a3' => [
                    'mata_kuliah' => 'Matematika',
                    'kelas' => 'IF - 3C',
                    'warna' => 'red',
                ],

                'lab_1' => null,

                'lab_2' => [
                    'mata_kuliah' => 'IOT',
                    'kelas' => 'IF - 3B',
                    'warna' => 'red',
                ],
            ],

            [
                'waktu' => '10.40 - 13.10',

                'ruang_a1' => [
                    'mata_kuliah' => 'Basis Data',
                    'kelas' => 'IF - 2B',
                    'warna' => 'red',
                ],

                'ruang_a2' => [
                    'mata_kuliah' => 'Algoritma',
                    'kelas' => 'IF - 3A',
                    'warna' => 'red',
                ],

                'ruang_a3' => null,

                'lab_1' => [
                    'mata_kuliah' => 'HCI',
                    'kelas' => 'IF - 4C',
                    'warna' => 'red',
                ],

                'lab_2' => [
                    'mata_kuliah' => 'Jaringan Komputer',
                    'kelas' => 'IF - 4B',
                    'warna' => 'red',
                ],
            ],

            [
                'waktu' => '14.00 - 16.30',

                'ruang_a1' => null,

                'ruang_a2' => null,

                'ruang_a3' => [
                    'mata_kuliah' => 'Desain Analisis',
                    'kelas' => 'IF - 4A',
                    'warna' => 'red',
                ],

                'lab_1' => null,

                'lab_2' => null,
            ],

        ];
    }
}