<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function store(Request $request)
    {

        // nanti data booking bisa disimpan ke database di sini

        return redirect()->route('surat.booking');

    }

}