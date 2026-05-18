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
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {

    auth()->logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');

})->name('logout');


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
/*
|--------------------------------------------------------------------------
| DASHBOARD KOMTING
|--------------------------------------------------------------------------
*/

Route::get('/dashboard-komting', function () {

    $jadwal = Jadwal::latest()->get();

    return view('komting.dashboard-komting', [
        'jadwal' => $jadwal
    ]);

})->middleware('auth')->name('dashboard.komting');


Route::get('/daftar-ruangan', function () {

    $ruangan = Jadwal::select('ruangan', 'status')
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
/*
|--------------------------------------------------------------------------
| booking
|--------------------------------------------------------------------------
*/
Route::get('/booking', function () {
    return view('komting.booking');
})->name('booking.ruangan');

/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
*/

Route::get('/update-status', function () {

    $jadwal = Jadwal::all();

    return view('komting.update-status', compact('jadwal'));

})->name('update.status');

Route::get('/komting/jadwal', function () {

    $jadwal = Jadwal::all();

    return view('komting.jadwal', compact('jadwal'));

})->name('komting.jadwal');


Route::get('/komting/ruangan', function () {

    $ruangan = Jadwal::select('ruangan', 'status')
        ->distinct()
        ->get();

    return view('komting.ruangan', compact('ruangan'));

})->name('komting.daftar.ruangan');


Route::get('/komting/ruang-kosong', function () {

    $ruanganKosong = Jadwal::where('status', 'Kosong')
        ->select('ruangan', 'status')
        ->distinct()
        ->get();

    return view('komting.ruang-kosong', compact('ruanganKosong'));

})->name('komting.ruang.kosong');
/*
|--------------------------------------------------------------------------
| pdf
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\BookingController;

Route::post('/booking',
    [BookingController::class, 'store'])
    ->name('booking.store');

Route::get('/booking/{id}/pdf',
    [BookingController::class, 'downloadPdf'])
    ->name('booking.pdf');

/*
|--------------------------------------------------------------------------
| RIWAYAT UPDATE
|--------------------------------------------------------------------------
*/

Route::get('/riwayat-update', function () {

    $riwayat = \App\Models\Jadwal::latest()->get();

    return view('komting.riwayat-update', compact('riwayat'));

})->name('riwayat.ruangan');