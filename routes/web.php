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

    $totalRuangan = Jadwal::distinct('ruangan')->count('ruangan');

    $ruangKosong = Jadwal::where('status', 'Kosong')
        ->distinct('ruangan')
        ->count('ruangan');

    $digunakan = Jadwal::where('status', 'Digunakan')
        ->distinct('ruangan')
        ->count('ruangan');

    $listRuangKosong = Jadwal::where('status', 'Kosong')
        ->select('ruangan', 'status')
        ->distinct()
        ->take(3)
        ->get();

    return view('dashboard', [

        'tanggal' => now()->translatedFormat('l, d F Y'),
        'jam' => now()->format('H:i'),
        'jadwal' => $jadwal,

        'totalRuangan' => $totalRuangan,
        'ruangKosong' => $ruangKosong,
        'digunakan' => $digunakan,
        'listRuangKosong' => $listRuangKosong,

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
| JADWAL (USER)
|--------------------------------------------------------------------------
*/

Route::get('/jadwal', function () {

    $tanggal = request('tanggal')
        ? \Carbon\Carbon::parse(request('tanggal'))
        : now();

    $tanggal->locale('id');

    $hariIndonesia = $tanggal->translatedFormat('l');

    $jadwal = \App\Models\Jadwal::where('hari', $hariIndonesia)->get();

    $urutan = [
        'LAB INFORMATIKA 1' => 1,
        'LAB INFORMATIKA 2' => 2,
        'LAB INFORMATIKA 3' => 3,
        'LAB INFORMATIKA 4' => 4,
        'INF-RUANG KULIAH I' => 5,
        'INF-RUANG KULIAH II' => 6,
        'INF-RUANG KULIAH III' => 7,
        'INF-RUANG KULIAH IV' => 8,
        'INF-RUANG KULIAH V' => 9,
    ];

    $ruangan = \App\Models\Jadwal::all()
        ->pluck('ruangan')
        ->map(fn($r) => strtoupper(trim($r)))
        ->unique()
        ->sortBy(fn($r) => $urutan[$r] ?? 99)
        ->values();

    $waktuList = \App\Models\Jadwal::select('waktu')
        ->distinct()
        ->pluck('waktu');

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

    $jadwal = Jadwal::latest()->get();

    return view('komting.dashboard-komting', [
        'jadwal' => $jadwal
    ]);

})->middleware('auth')->name('dashboard.komting');

/*
|--------------------------------------------------------------------------
| DAFTAR RUANGAN
|--------------------------------------------------------------------------
*/

Route::get('/daftar-ruangan', function () {

    $ruangan = Jadwal::select(
        'ruangan',
        'mata_kuliah',
        'kelas',
        'status'
    )
    ->distinct()
    ->get();

    return view('ruangan', compact('ruangan'));

})->name('daftar.ruangan');

/*
|--------------------------------------------------------------------------
| KOMTING JADWAL (FIXED - NO DUPLICATE ROUTE)
|--------------------------------------------------------------------------
*/

Route::get('/komting/jadwal', function () {

    $tanggal = request('tanggal')
        ? \Carbon\Carbon::parse(request('tanggal'))
        : now();

    $tanggal->locale('id');

    $hariIndonesia = $tanggal->translatedFormat('l');

    $jadwal = \App\Models\Jadwal::where('hari', $hariIndonesia)->get();

    $urutan = [
        'LAB INFORMATIKA 1' => 1,
        'LAB INFORMATIKA 2' => 2,
        'LAB INFORMATIKA 3' => 3,
        'LAB INFORMATIKA 4' => 4,
        'INF-RUANG KULIAH I' => 5,
        'INF-RUANG KULIAH II' => 6,
        'INF-RUANG KULIAH III' => 7,
        'INF-RUANG KULIAH IV' => 8,
        'INF-RUANG KULIAH V' => 9,
    ];

    $ruangan = \App\Models\Jadwal::all()
        ->pluck('ruangan')
        ->map(fn($r) => strtoupper(trim($r)))
        ->unique()
        ->sortBy(fn($r) => $urutan[$r] ?? 99)
        ->values();

    $hariList = [];

    for ($i = 0; $i < 5; $i++) {
        $date = now()->startOfWeek()->addDays($i);

        $hariList[] = [
            'label' => $date->translatedFormat('D'),
            'date' => $date->format('Y-m-d'),
            'active' => $date->format('Y-m-d') == $tanggal->format('Y-m-d'),
        ];
    }

    return view('komting.jadwal', [
        'jadwal' => $jadwal,
        'ruangan' => $ruangan,
        'hariList' => $hariList,
        'tanggalFormatted' => $tanggal->translatedFormat('l, d F Y'),
        'prevDate' => $tanggal->copy()->subDay()->format('Y-m-d'),
        'nextDate' => $tanggal->copy()->addDay()->format('Y-m-d'),
    ]);

})->name('komting.jadwal');

/*
|--------------------------------------------------------------------------
| (LANJUTAN TETAP SAMA)
|--------------------------------------------------------------------------
*/

Route::get('/ruang-kosong', function () {

    $ruanganKosong = Jadwal::where('status', 'Kosong')
        ->select('ruangan', 'status')
        ->distinct()
        ->get();

    return view('ruang-kosong', compact('ruanganKosong'));

})->name('ruang.kosong');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/booking', function () {
    return view('komting.booking');
})->name('booking.ruangan');

Route::get('/update-status', function () {

    $jadwal = Jadwal::all();

    return view('komting.update-status', compact('jadwal'));

})->name('update.status');

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

Route::get('/riwayat-update', function () {

    $riwayat = Jadwal::latest()->get();

    return view('komting.riwayat-update', compact('riwayat'));

})->name('riwayat.ruangan');

use App\Http\Controllers\BookingController;

Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store');

Route::get('/surat-booking', function () {
    return view('komting.surat-booking');
})->name('surat.booking');

Route::get('/kelas-anda', function () {
    return view('komting.kelas-anda');
})->name('kelas.anda');