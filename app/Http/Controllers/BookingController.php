<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{

    public function store(Request $request)
    {

        $booking = Booking::create([

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

        ]);

        return redirect()
            ->route('booking.pdf', $booking->id);

    }





    public function downloadPdf($id)
    {

        $booking = Booking::findOrFail($id);

        $pdf = Pdf::loadView(
            'pdf.booking',
            compact('booking')
        );

        return $pdf->download('surat-booking.pdf');

    }

}