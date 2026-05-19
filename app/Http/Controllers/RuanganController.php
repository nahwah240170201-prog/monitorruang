<?php

namespace App\Http\Controllers;


use App\Models\MataKuliah;
use App\Models\Jadwal;
use App\Models\Ruangan;
use Carbon\Carbon;


class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = MataKuliah::orderBy('semester_id')
            ->orderBy('nama_mk')
            ->orderBy('kelas')
            ->get();

        return view('admin.data-ruangan', compact('ruangan'));
    }
}