@extends('layouts.komting')

@section('content')

<div class="w-full px-5 md:px-8 py-8 overflow-hidden">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-8">

        <div>
            <h1 class="text-[34px] font-bold text-gray-800 leading-tight">
                Jadwal Ruangan
            </h1>

            <p class="text-gray-500 text-[15px] mt-2 leading-relaxed">
                Informasi penggunaan ruang dan laboratorium informatika secara realtime.
                <br>
                Status ruangan akan berubah sesuai jadwal yang tersedia.
            </p>
        </div>

        <!-- DATE -->
        <div class="flex items-center gap-3">

            <a href="{{ route('jadwal.index', ['tanggal' => $prevDate]) }}"
               class="w-11 h-11 rounded-2xl bg-white border border-gray-200
                      flex items-center justify-center shadow-sm
                      hover:bg-blue-50 hover:border-blue-300 transition">

                <i class="fa-solid fa-chevron-left text-[13px] text-gray-600"></i>

            </a>

            <div class="bg-gradient-to-r from-blue-600 to-indigo-600
                        text-white px-6 py-3 rounded-2xl shadow-lg">

                <p class="text-[13px] opacity-80">
                    Jadwal Hari Ini
                </p>

                <h2 class="font-semibold text-[16px]">
                    {{ $tanggalFormatted }}
                </h2>

            </div>

            <a href="{{ route('jadwal.index', ['tanggal' => $nextDate]) }}"
               class="w-11 h-11 rounded-2xl bg-white border border-gray-200
                      flex items-center justify-center shadow-sm
                      hover:bg-blue-50 hover:border-blue-300 transition">

                <i class="fa-solid fa-chevron-right text-[13px] text-gray-600"></i>

            </a>

        </div>

    </div>


    <!-- HARI -->
    <div class="flex flex-wrap gap-3 mb-8">

        @foreach($hariList as $hari)

            <a href="{{ route('jadwal.index', ['tanggal' => $hari['date']]) }}"
               @class([
                    'px-5 h-11 rounded-2xl flex items-center justify-center
                     text-[14px] font-semibold transition-all duration-200',

                    'bg-blue-600 text-white shadow-lg shadow-blue-200 scale-105'
                        => $hari['active'],

                    'bg-white border border-gray-200 text-gray-600
                     hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200'
                        => !$hari['active']
               ])>

                {{ $hari['label'] }}

            </a>

        @endforeach

    </div>


    <!-- TABLE -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">

    <!-- HANYA TABEL YANG SCROLL -->
    <div class="overflow-x-auto">

        <table class="w-full min-w-[950px]">

                <!-- HEAD -->
<thead>

    <tr class="bg-gradient-to-r from-[#f8fbff] to-[#f5f7ff] border-b border-gray-200">

        <th class="px-6 py-5 bg-[#f5f7fb] border-r border-gray-100
text-left text-[12px] font-bold uppercase tracking-wider text-gray-500">
            Waktu
        </th>

        @php
        $urutan = array(
            'LAB INFORMATIKA 1' => 1,
            'LAB INFORMATIKA 2' => 2,
            'LAB INFORMATIKA 3' => 3,
            'LAB INFORMATIKA 4' => 4,
            'INF-RUANG KULIAH I' => 5,
            'INF-RUANG KULIAH II' => 6,
            'INF-RUANG KULIAH III' => 7,
            'INF-RUANG KULIAH IV' => 8,
            'INF-RUANG KULIAH V' => 9,
        );
        $daftarRuangan = $jadwal->pluck('ruangan')
            ->map(fn($r) => strtoupper(trim($r)))
             ->unique()
             ->sortBy(fn($r) => $urutan[$r] ?? 99)
             ->values();
        @endphp

        @foreach($daftarRuangan as $ruangan)

            <th class="px-6 py-5 text-center text-[13px] font-bold text-gray-500 uppercase">
                {{ $ruangan }}
            </th>

        @endforeach

    </tr>

</thead>


<!-- BODY -->
<tbody>

    @php
        $grouped = $jadwal->groupBy('waktu');
    @endphp

    @foreach($grouped as $waktu => $items)

    <tr class="border-b border-gray-100 hover:bg-[#fafcff] transition-all duration-200">

        <!-- JAM -->
        <td class="px-6 py-5 border-r border-gray-100 bg-[#fafbfc]">

            <span class="text-[13px] font-semibold text-gray-600 tracking-wide">
                {{ $waktu }}
            </span>

        </td>

        <!-- KOLOM RUANG -->
        @foreach($daftarRuangan as $ruangan)

            @php
                $item = $items->firstWhere('ruangan', $ruangan);
            @endphp

            <td class="px-5 py-5 text-center align-middle">

                @if($item)

                    <div class="h-[72px] flex flex-col justify-center
                                rounded-xl border px-3 py-2 shadow-sm
                                bg-red-50 border-red-200 text-red-700 shadow-red-100
                                hover:scale-[1.03] transition-all duration-200">

                        <p class="text-[12px] font-semibold leading-tight">
                            {{ $item->mata_kuliah }}
                        </p>

                        <p class="text-[11px] mt-0.5 opacity-70">
                            {{ $item->kelas }}
                        </p>

                    </div>

                @else

                    <!-- KOSONG -->
                    <div class="h-[72px] flex flex-col items-center justify-center
                                rounded-2xl border-2 border-dashed border-green-200
                                bg-green-50">

                        <div class="w-7 h-7 rounded-full bg-green-100
                                    flex items-center justify-center mb-2">

                            <i class="fa-solid fa-check text-green-600 text-[13px]"></i>

                        </div>

                        <p class="text-[10px] font-semibold text-green-700">
                            Ruangan Kosong
                        </p>

                    </div>

                @endif

            </td>

        @endforeach

    </tr>

    @endforeach

</tbody>

    <!-- LEGEND -->
    <div class="flex flex-wrap items-center gap-8 mt-7 px-6 pb-6">

        <div class="flex items-center gap-3">

    <div class="w-4 h-4 rounded-full bg-red-500"></div>

    <span class="text-[14px] text-gray-600 font-medium">
        Digunakan
    </span>

</div>

        <div class="flex items-center gap-3">

            <div class="w-4 h-4 rounded-full bg-green-500"></div>

            <span class="text-[14px] text-gray-600 font-medium">
                Kosong
            </span>

        </div>

       

    </div>

</div>

@endsection