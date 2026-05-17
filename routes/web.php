<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Models\Jadwal;

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $jadwal = Jadwal::latest()->get();

    return view('dashboard', [
        'tanggal' => now()->translatedFormat('l, d F Y'),
        'jam' => now()->format('H:i'),
        'jadwal' => $jadwal,
    ]);
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
})->name('login');


/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

<<<<<<< HEAD
Route::get('/login', function () {
    return view('login');
});
=======

/*
|--------------------------------------------------------------------------
| JADWAL
|--------------------------------------------------------------------------
*/

Route::get('/jadwal', [JadwalController::class, 'index'])
    ->name('jadwal.index');
>>>>>>> 7a518aff31ae1135628f74fe31640d294b0b1f5c
