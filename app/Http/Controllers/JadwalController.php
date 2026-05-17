<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Jadwal;

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

        // 🔥 AMBIL DATA DARI DATABASE (TABLE jadwals)
        $jadwal = Jadwal::orderBy('waktu')->get();

        return view('jadwal', compact(
            'tanggal',
            'tanggalFormatted',
            'prevDate',
            'nextDate',
            'hariList',
            'jadwal'
        ));
    }
}