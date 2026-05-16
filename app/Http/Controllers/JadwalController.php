<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal dari query string, default hari ini
        $tanggal = $request->query('tanggal', Carbon::today()->toDateString());
        $carbon   = Carbon::parse($tanggal);

        // Navigasi prev / next
        $prevDate = $carbon->copy()->subDay()->toDateString();
        $nextDate = $carbon->copy()->addDay()->toDateString();

        // Format tampilan: "13 mei 2026"
        Carbon::setLocale('id');
        $tanggalFormatted = strtolower($carbon->translatedFormat('j F Y'));

        // Daftar hari dalam minggu (Sen–Jum) pada minggu yang aktif
        $startOfWeek = $carbon->copy()->startOfWeek(Carbon::MONDAY);
        $hariLabels  = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'];
        $hariList    = [];

        for ($i = 0; $i < 5; $i++) {
            $day = $startOfWeek->copy()->addDays($i);
            $hariList[] = [
                'label'  => $hariLabels[$i],
                'date'   => $day->toDateString(),
                'active' => $day->toDateString() === $carbon->toDateString(),
            ];
        }

        // --- Data Jadwal (hardcoded / sesuaikan dengan DB Anda) ---
        $jadwal = $this->getJadwal($carbon->toDateString());

        return view('jadwal', compact(
            'tanggal',
            'tanggalFormatted',
            'prevDate',
            'nextDate',
            'hariList',
            'jadwal'
        ));
    }

    /**
     * Ambil data jadwal berdasarkan tanggal.
     * Ganti bagian ini dengan query Eloquent / DB sesuai struktur database Anda.
     */
    private function getJadwal(string $tanggal): array
    {
        // Contoh data statis (sesuai desain Figma)
        // Warna: card-teal, card-blue, card-purple, card-indigo, card-sky
        $data = [
            [
                'waktu'   => '08.00 - 10.30',
                'ruang_a1' => ['mata_kuliah' => 'Pemrograman Web', 'kelas' => 'IF - 2A', 'warna' => 'card-teal'],
                'ruang_a2' => null,
                'ruang_a3' => ['mata_kuliah' => 'Matematika',       'kelas' => 'IF - 3C', 'warna' => 'card-teal'],
                'lab_1'    => null,
                'lab_2'    => ['mata_kuliah' => 'IOT',              'kelas' => 'IF - 3B', 'warna' => 'card-blue'],
            ],
            [
                'waktu'   => '10.40 - 13.10',
                'ruang_a1' => ['mata_kuliah' => 'Basis Data',       'kelas' => 'IF - 2B', 'warna' => 'card-teal'],
                'ruang_a2' => ['mata_kuliah' => 'Algoritma',        'kelas' => 'IF - 3A', 'warna' => 'card-blue'],
                'ruang_a3' => null,
                'lab_1'    => ['mata_kuliah' => 'HCI',              'kelas' => 'IF - 4C', 'warna' => 'card-blue'],
                'lab_2'    => ['mata_kuliah' => 'Jaringan Komputer', 'kelas' => 'IF - 4B', 'warna' => 'card-indigo'],
            ],
            [
                'waktu'   => '14.00 - 16.30',
                'ruang_a1' => null,
                'ruang_a2' => null,
                'ruang_a3' => ['mata_kuliah' => 'Desain Analisis',  'kelas' => 'IF - 4A', 'warna' => 'card-teal'],
                'lab_1'    => null,
                'lab_2'    => null,
            ],
        ];

        return $data;
    }
}