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

            
        </div>


        <!-- HARI -->
        


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

                            <th class="px-6 py-5 text-center text-[13px] font-bold text-gray-500 uppercase">
                                Ruang A1
                            </th>

                            <th class="px-6 py-5 text-center text-[13px] font-bold text-gray-500 uppercase">
                                Ruang A2
                            </th>

                            <th class="px-6 py-5 text-center text-[13px] font-bold text-gray-500 uppercase">
                                Ruang A3
                            </th>

                            <th class="px-6 py-5 text-center text-[13px] font-bold text-gray-500 uppercase">
                                Lab 1
                            </th>

                            <th class="px-6 py-5 text-center text-[13px] font-bold text-gray-500 uppercase">
                                Lab 2
                            </th>

                        </tr>

                    </thead>


                    <!-- BODY -->
                    <tbody>

                        @foreach($jadwal as $slot)

                        <tr class="border-b border-gray-100 hover:bg-[#fafcff] transition-all duration-200">

                            <!-- JAM -->
                            <td class="px-6 py-5 border-r border-gray-100 bg-[#fafbfc]">

        <span class="text-[13px] font-semibold text-gray-600 tracking-wide">
            {{ $slot['waktu'] }}
        </span>

    </td>
                            


                            <!-- KOLOM -->
                            @foreach(['ruang_a1','ruang_a2','ruang_a3','lab_1','lab_2'] as $kolom)

                            <td class="px-5 py-5 text-center align-middle">

                                @if(!empty($slot[$kolom]))

                                        @php
        $item = $slot[$kolom];

        $colors = [

            'red' =>
                'bg-red-50 border-red-200 text-red-700 shadow-red-100',

            'green' =>
                'bg-green-50 border-green-200 text-green-700 shadow-green-100',

        ];

        $cls = $colors[$item['warna']] ?? '';

    @endphp


                                <div class="h-[72px] flex flex-col justify-center
                                            rounded-xl border px-3 py-2 shadow-sm
                                                hover:scale-[1.03] transition-all duration-200 {{ $cls }}">

                                        <p class="text-[12px] font-semibold leading-tight">
                                            {{ $item['mata_kuliah'] }}
                                        </p>

                                    <p class="text-[11px] mt-0.5 opacity-70">
                                            {{ $item['kelas'] }}
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

                </table>

            </div>

        </div>


        <!-- LEGEND -->
        <div class="flex flex-wrap items-center gap-8 mt-7">

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