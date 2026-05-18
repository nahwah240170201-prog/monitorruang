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


Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);




/*
|--------------------------------------------------------------------------
| JADWAL
|--------------------------------------------------------------------------
*/

Route::get('/jadwal', [JadwalController::class, 'index'])
    ->name('jadwal.index');


/*
|--------------------------------------------------------------------------
| DASHBOARD KOMTING
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-komting', function () {

    // 🔥 CEK LOGIN + ROLE
    if (!auth()->check() || auth()->user()->role !== 'komting') {
        return redirect('/login');
    }

    $jadwal = \App\Models\Jadwal::latest()->get();

    return view('dashboard-komting', [
        'jadwal' => $jadwal
    ]);

})->middleware('auth')->name('dashboard.komting');


/*
|--------------------------------------------------------------------------
| DAFTAR RUANGAN
|--------------------------------------------------------------------------
*/

Route::get('/daftar-ruangan', function () {

    $ruangan = Jadwal::select('ruangan', 'status')
        ->distinct()
        ->get();

    return view('daftar-ruangan', compact('ruangan'));

})->name('daftar.ruangan');


/*
|--------------------------------------------------------------------------
| RUANGAN
|--------------------------------------------------------------------------
*/


Route::get('/daftar-ruangan', function () {

    $ruangan = \App\Models\Jadwal::select('ruangan', 'status')
        ->distinct()
        ->get();

    return view('ruangan', compact('ruangan'));

})->name('daftar.ruangan');


/*
|--------------------------------------------------------------------------
| RUANGAN kosong
|--------------------------------------------------------------------------
*/
Route::get('/ruang-kosong', function () {

    $ruanganKosong = \App\Models\Jadwal::where('status', 'Kosong')
        ->select('ruangan', 'status')
        ->distinct()
        ->get();

    return view('ruang-kosong', compact('ruanganKosong'));

})->name('ruang.kosong');
/*
|--------------------------------------------------------------------------
| tentang
|--------------------------------------------------------------------------
*/
Route::get('/tentang', function () {

    return view('tentang');

})->name('tentang');