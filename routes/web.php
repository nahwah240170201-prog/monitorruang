<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Jadwal;

Route::get('/', function () {

    $jadwal = Jadwal::latest()->get();

    return view('dashboard', [
        'tanggal' => now()->translatedFormat('l, d F Y'),
        'jam' => now()->format('H:i'),
        'jadwal' => $jadwal,
    ]);
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function () {
    return view('login');
});