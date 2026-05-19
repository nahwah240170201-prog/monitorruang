<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{

    public function store(Request $request)
    {

        Booking::create([

            'nama' => auth()->user()->nama,

            'kelas' => auth()->user()->kelas,

            'jenis_booking' => $request->jenis_booking,

            'mata_kuliah' => $request->mata_kuliah,

            'alasan' => $request->alasan,

            'hari' => $request->hari,

            'jam_mulai' => $request->jam_mulai,

            'jam_selesai' => $request->jam_selesai,

            'ruangan' => $request->ruangan,

            'catatan' => $request->catatan,

            // STATUS OTOMATIS
            'status' => 'Digunakan',

        ]);

        return redirect()
            ->route('surat.booking')
            ->with('success', 'Data booking berhasil disimpan!');
    }





    // RIWAYAT BOOKING
    public function riwayat()
    {

        $riwayat = Booking::latest()->get();

        return view(
            'komting.riwayat-update',
            compact('riwayat')
        );
    }

}