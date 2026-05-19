<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = MataKuliah::orderBy('semester_id')
            ->orderBy('nama_mk')
            ->orderBy('kelas')
            ->get();

        return view('ruangan', compact('ruangan'));
    }
}