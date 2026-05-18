@extends('layouts.komting')

@section('content')

<div class="bg-white rounded-3xl p-5 shadow-sm">

    <div class="flex justify-between items-center mb-5">

        <h1 class="text-2xl font-bold">
            Surat Peminjaman
        </h1>





        <div class="flex gap-3">

            <!-- BUKA PDF -->
            <a href="{{ asset('pdf/surat-peminjaman.pdf') }}"
               target="_blank"
               class="px-5 py-3 rounded-2xl bg-blue-600 text-white font-semibold">

               Buka PDF

            </a>

        </div>

    </div>





    <!-- PDF VIEW -->
    <iframe
        src="{{ asset('pdf/surat-peminjaman.pdf') }}"
        width="100%"
        height="900px"
        class="rounded-2xl border">
    </iframe>

</div>

@endsection