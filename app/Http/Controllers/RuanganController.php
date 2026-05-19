<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Ruangan;
use Carbon\Carbon;

class RuanganController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        $ruangan = Jadwal::all()->map(function ($item) use ($now) {

            [$start, $end] = explode(' - ', $item->waktu);

            $start = Carbon::createFromFormat('H:i', trim($start));
            $end = Carbon::createFromFormat('H:i', trim($end));

            $item->status = $now->between($start, $end)
                ? 'Digunakan'
                : 'Kosong';

            return $item;
        });

        return view('admin.data-ruangan', compact('ruangan'));
    }
}