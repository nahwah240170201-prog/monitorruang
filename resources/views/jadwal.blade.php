@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 md:px-8 py-8">

    <!-- HEADER -->
    <div class="mb-7">

        <h1 class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">
            Jadwal Ruangan
        </h1>

        <p class="text-gray-500 text-sm md:text-[15px] leading-relaxed">
            Informasi penggunaan ruang dan laboratorium informatika secara realtime.
            <br>
            Data dapat berubah sewaktu-waktu.
        </p>

    </div>

    <!-- TOP BAR -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">

        <!-- DATE -->
        <div class="flex items-center gap-3">

            <a href="{{ route('jadwal.index', ['tanggal' => $prevDate]) }}"
               class="w-9 h-9 rounded-xl border border-gray-200 bg-white flex items-center justify-center
                      hover:bg-blue-50 hover:border-blue-300 transition">

                <i class="fa-solid fa-chevron-left text-[12px] text-gray-600"></i>

            </a>

            <div class="bg-white border border-gray-200 rounded-xl px-5 h-9 flex items-center shadow-sm">

                <span class="text-[14px] font-semibold text-gray-700">
                    {{ $tanggalFormatted }}
                </span>

            </div>

            <a href="{{ route('jadwal.index', ['tanggal' => $nextDate]) }}"
               class="w-9 h-9 rounded-xl border border-gray-200 bg-white flex items-center justify-center
                      hover:bg-blue-50 hover:border-blue-300 transition">

                <i class="fa-solid fa-chevron-right text-[12px] text-gray-600"></i>

            </a>

        </div>

    </div>

    <!-- DAY SELECTOR -->
    <div class="flex flex-wrap gap-3 mb-8">

        @foreach($hariList as $hari)

            <a href="{{ route('jadwal.index', ['tanggal' => $hari['date']]) }}"
               @class([
                    'px-5 h-10 rounded-full flex items-center text-sm font-medium transition-all',
                    'bg-blue-600 text-white shadow-md shadow-blue-200' => $hari['active'],
                    'bg-white border border-gray-200 text-gray-600 hover:bg-blue-50 hover:text-blue-600' => !$hari['active']
               ])>

                {{ $hari['label'] }}

            </a>

        @endforeach

    </div>

    <!-- TABLE CARD -->
    <div class="bg-white border border-gray-200 rounded-3xl overflow-hidden shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1000px]">

                <!-- TABLE HEAD -->
                <thead>

                    <tr class="bg-[#f8faff] border-b border-gray-100">

                        <th class="px-6 py-5 text-left text-[13px] font-semibold text-gray-500">
                            Waktu
                        </th>

                        <th class="px-6 py-5 text-left text-[13px] font-semibold text-gray-500">
                            Ruang A1
                        </th>

                        <th class="px-6 py-5 text-left text-[13px] font-semibold text-gray-500">
                            Ruang A2
                        </th>

                        <th class="px-6 py-5 text-left text-[13px] font-semibold text-gray-500">
                            Ruang A3
                        </th>

                        <th class="px-6 py-5 text-left text-[13px] font-semibold text-gray-500">
                            Lab 1
                        </th>

                        <th class="px-6 py-5 text-left text-[13px] font-semibold text-gray-500">
                            Lab 2
                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    @foreach($jadwal as $slot)

                    <tr class="border-b border-gray-100 hover:bg-gray-50/40 transition">

                        <!-- JAM -->
                        <td class="px-6 py-6">

                            <div class="bg-blue-50 border border-blue-100 rounded-xl px-4 py-2 inline-block">

                                <span class="text-[13px] font-semibold text-blue-700">
                                    {{ $slot['waktu'] }}
                                </span>

                            </div>

                        </td>

                        <!-- RUANG -->
                        @foreach(['ruang_a1','ruang_a2','ruang_a3','lab_1','lab_2'] as $kolom)

                        <td class="px-6 py-5">

                            @if(!empty($slot[$kolom]))

                                @php $item = $slot[$kolom]; @endphp

                                @php
                                    $colors = [
                                        'teal' => 'bg-teal-50 border-teal-200 text-teal-700',
                                        'blue' => 'bg-blue-50 border-blue-200 text-blue-700',
                                        'indigo' => 'bg-indigo-50 border-indigo-200 text-indigo-700',
                                        'purple' => 'bg-purple-50 border-purple-200 text-purple-700',
                                        'sky' => 'bg-sky-50 border-sky-200 text-sky-700',
                                    ];

                                    $cls = $colors[$item['warna']] ?? $colors['blue'];
                                @endphp

                                <div class="min-w-[130px] rounded-2xl border px-4 py-3 {{ $cls }}">

                                    <p class="text-[13px] font-semibold leading-snug">
                                        {{ $item['mata_kuliah'] }}
                                    </p>

                                    <p class="text-[12px] mt-1 opacity-80">
                                        {{ $item['kelas'] }}
                                    </p>

                                </div>

                            @else

                                <div class="flex justify-center">

                                    <span class="text-gray-300 text-lg">
                                        —
                                    </span>

                                </div>

                            @endif

                        </td>

                        @endforeach

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <!-- LEGEND -->
    <div class="flex flex-wrap items-center gap-6 mt-6">

        <div class="flex items-center gap-2">

            <span class="w-3 h-3 rounded-full bg-blue-100 border border-blue-300"></span>

            <span class="text-sm text-gray-500">
                Digunakan
            </span>

        </div>

        <div class="flex items-center gap-2">

            <span class="w-3 h-3 rounded-full bg-teal-100 border border-teal-300"></span>

            <span class="text-sm text-gray-500">
                Kosong
            </span>

        </div>

    </div>

</div>

@endsection