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

    $hariIni = now()->locale('id')->translatedFormat('l');

    $jadwal = Jadwal::where('hari', $hariIni)->get();

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

Route::get('/jadwal', function () {

    $tanggal = request('tanggal')
        ? \Carbon\Carbon::parse(request('tanggal'))
        : now();

    $tanggal->locale('id');

    $hariIndonesia = $tanggal->translatedFormat('l');

    $jadwal = \App\Models\Jadwal::where('hari', $hariIndonesia)->get();

    // ambil semua ruangan unik dari database
    $ruangan = \App\Models\Jadwal::select('ruangan')
        ->distinct()
        ->pluck('ruangan');

    // ambil semua waktu unik
    $waktuList = \App\Models\Jadwal::select('waktu')
        ->distinct()
        ->pluck('waktu');

    // hari navbar
    $hariList = [];

    for ($i = 0; $i < 5; $i++) {

        $date = now()->startOfWeek()->addDays($i);

        $hariList[] = [
            'label' => $date->translatedFormat('D'),
            'date' => $date->format('Y-m-d'),
            'active' => $date->format('Y-m-d') == $tanggal->format('Y-m-d'),
        ];
    }

    return view('jadwal', [

        'jadwal' => $jadwal,

        'ruangan' => $ruangan,

        'waktuList' => $waktuList,

        'hariList' => $hariList,

        'tanggalFormatted' => $tanggal->translatedFormat('l, d F Y'),

        'prevDate' => $tanggal->copy()->subDay()->format('Y-m-d'),

        'nextDate' => $tanggal->copy()->addDay()->format('Y-m-d'),

    ]);

})->name('jadwal.index');

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

    $ruangan = \App\Models\Jadwal::select('ruangan', 'status')
        ->distinct()
        ->get();

    return view('ruangan', compact('ruangan'));

})->name('daftar.ruangan');


/*
|--------------------------------------------------------------------------
| RUANG KOSONG
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
| TENTANG
|--------------------------------------------------------------------------
*/

Route::get('/tentang', function () {

    return view('tentang');

})->name('tentang');