<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->query('tanggal', Carbon::today()->toDateString());
        $carbon  = Carbon::parse($tanggal);

        $prevDate = $carbon->copy()->subDay()->toDateString();
        $nextDate = $carbon->copy()->addDay()->toDateString();

        Carbon::setLocale('id');
        $tanggalFormatted = strtolower($carbon->translatedFormat('j F Y'));

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

        $namaHari = [
            'Monday'    => 'senin',
            'Tuesday'   => 'selasa',
            'Wednesday' => 'rabu',
            'Thursday'  => 'kamis',
            'Friday'    => 'jumat',
        ];

        $hariIni = $namaHari[$carbon->englishDayOfWeek] ?? '';

        $jadwal = Jadwal::whereRaw('LOWER(hari) = ?', [$hariIni])
                        ->orderBy('jam_mulai')
                        ->get();

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