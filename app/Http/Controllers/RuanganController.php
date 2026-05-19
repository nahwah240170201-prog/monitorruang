<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = MataKuliah::with('semester')->get();

        return view('ruangan', compact('ruangan'));
    }
}