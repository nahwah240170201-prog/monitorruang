<?php

use Illuminate\Support\Facades\Route;
use App\Models\Jadwal;
use App\Models\Ruangan;

Route::get('/', function () {

    $totalRuangan = Ruangan::count();

    $ruangKosong = Jadwal::where('status', 'Kosong')->count();

    $digunakan = Jadwal::where('status', 'Digunakan')->count();

    $dibatalkan = Jadwal::where('status', 'Dibatalkan')->count();

    $jadwals = Jadwal::latest()->get();

    return view('dashboard', compact(
        'totalRuangan',
        'ruangKosong',
        'digunakan',
        'dibatalkan',
        'jadwals'
    ));
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/register', [AuthController::class, 'register']);