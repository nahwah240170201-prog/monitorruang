@extends('layouts.app')

@section('content')

<div class="w-full px-6 md:px-10 py-10">

    <!-- HEADER -->
    <div class="mb-10">

        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 tracking-tight">
            Ruangan Kosong
        </h1>

        <p class="text-gray-500 text-lg mt-3">
            Daftar ruangan dan laboratorium yang sedang tersedia
        </p>

    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-8">

        @foreach($ruanganKosong as $ruangan)

        @php
            $jadwalBerikutnya = $jadwalHariIni
                ->filter(fn($j) => strtoupper(trim($j->ruangan)) === $ruangan
                    && $j->jam_mulai > $now->format('H:i:s'))
                ->sortBy('jam_mulai')
                ->first();
        @endphp

        <div class="group relative overflow-hidden rounded-[32px]
                    bg-white border border-gray-200
                    shadow-sm hover:shadow-2xl
                    transition-all duration-500
                    hover:-translate-y-1">

            <!-- BACKGROUND EFFECT -->
            <div class="absolute top-0 right-0 w-40 h-40
                        bg-gradient-to-br from-green-100 to-transparent
                        rounded-full blur-3xl opacity-60">
            </div>

            <div class="relative p-8">

                <!-- TOP -->
                <div class="flex items-start justify-between mb-8">

                    <div class="flex items-center gap-5">

                        <!-- ICON -->
                        <div class="w-20 h-20 rounded-3xl
                                    bg-gradient-to-br from-green-500 to-emerald-600
                                    text-white shadow-lg
                                    flex items-center justify-center">

                            @if(str_contains($ruangan, 'LAB'))
                                <i class="fa-solid fa-flask text-3xl"></i>
                            @else
                                <i class="fa-solid fa-building text-3xl"></i>
                            @endif

                        </div>

                        <!-- INFO -->
                        <div>

                            <h2 class="text-2xl font-bold text-gray-800 leading-tight">
                                {{ $ruangan }}
                            </h2>

                            <p class="text-base text-gray-400 mt-2">
                                Gedung Informatika
                            </p>

                        </div>

                    </div>

                    <!-- STATUS -->
                    <div class="px-5 py-2 rounded-2xl
                                bg-green-100 border border-green-200">

                        <span class="text-sm font-bold text-green-700">
                            Kosong
                        </span>

                    </div>

                </div>

                <!-- MIDDLE -->
                <div class="rounded-3xl bg-gray-50 p-6 mb-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-400 mb-2">
                                Status Ruangan
                            </p>

                            <h3 class="text-2xl font-bold text-gray-800">

                                @if($jadwalBerikutnya)
                                    Digunakan Jam
                                    {{ \Carbon\Carbon::parse($jadwalBerikutnya->jam_mulai)->format('H.i') }}
                                @else
                                    Tersedia Saat Ini
                                @endif

                            </h3>

                        </div>

                        <div class="w-16 h-16 rounded-2xl
                                    bg-blue-100 text-blue-600
                                    flex items-center justify-center">

                            <i class="fa-regular fa-clock text-2xl"></i>

                        </div>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-2 text-green-600">

                        <div class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></div>

                        <span class="font-semibold text-sm">
                            Sedang Tersedia
                        </span>

                    </div>

                    

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <!-- EMPTY -->
    @if(count($ruanganKosong) == 0)

    <div class="bg-white border border-gray-200
                rounded-[32px] p-16 text-center mt-10 shadow-sm">

        <div class="w-24 h-24 mx-auto rounded-full
                    bg-red-100 text-red-500
                    flex items-center justify-center mb-6">

            <i class="fa-solid fa-xmark text-4xl"></i>

        </div>

        <h2 class="text-3xl font-bold text-gray-700 mb-3">
            Tidak Ada Ruangan Kosong
        </h2>

        <p class="text-gray-500 text-lg">
            Semua ruangan sedang digunakan saat ini.
        </p>

    </div>

    @endif

</div>

@endsection