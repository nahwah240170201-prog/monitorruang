@extends('layouts.app')

@section('content')

<div class="w-full px-5 md:px-8 py-8 overflow-hidden">

    <!-- HEADER -->
    <div class="mb-8">

        <h1 class="text-[34px] font-bold text-gray-800">
            Ruangan Kosong
        </h1>

        <p class="text-gray-500 text-[15px] mt-2 leading-relaxed">
            Daftar ruangan dan laboratorium yang sedang tersedia.
        </p>

    </div>


    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

        @foreach($ruanganKosong as $item)

        <div class="bg-white border border-gray-200 rounded-3xl
                    px-6 py-5 shadow-sm hover:shadow-md
                    transition duration-300">

            <!-- TOP -->
            <div class="flex items-center justify-between mb-5">

                <div class="flex items-center gap-4">

                    <!-- ICON -->
                    <div class="w-14 h-14 rounded-2xl
                                bg-green-50 text-green-600
                                flex items-center justify-center">

                        <i class="fa-solid fa-building text-[20px]"></i>

                    </div>

                    <!-- INFO -->
                    <div>

                        <h2 class="text-[20px] font-bold text-gray-800">
                            {{ $item->ruangan }}
                        </h2>

                        <p class="text-[13px] text-gray-400 mt-1">
                            Gedung Informatika
                        </p>

                    </div>

                </div>


                <!-- STATUS -->
                <div class="px-4 py-2 rounded-2xl
                            bg-green-50 border border-green-200">

                    <span class="text-[12px] font-semibold text-green-700">
                        Kosong
                    </span>

                </div>

            </div>


            <!-- BOTTOM -->
            <div class="flex items-center justify-between pt-4 border-t border-gray-100">

                <div>

                    <p class="text-[12px] text-gray-400">
                        Tersedia Sampai
                    </p>

                    <h3 class="text-[15px] font-semibold text-gray-700 mt-1">
                        16.30 WIB
                    </h3>

                </div>


                <div class="w-10 h-10 rounded-xl
                            bg-blue-50 text-blue-600
                            flex items-center justify-center">

                    <i class="fa-regular fa-clock"></i>

                </div>

            </div>

        </div>

        @endforeach

    </div>


    <!-- EMPTY -->
    @if(count($ruanganKosong) == 0)

    <div class="bg-white border border-gray-200 rounded-3xl
                p-14 text-center mt-5">

        <div class="w-20 h-20 mx-auto rounded-full
                    bg-red-50 text-red-500
                    flex items-center justify-center mb-5">

            <i class="fa-solid fa-xmark text-[28px]"></i>

        </div>

        <h2 class="text-[24px] font-bold text-gray-700 mb-2">
            Tidak Ada Ruangan Kosong
        </h2>

        <p class="text-gray-500 text-[15px]">
            Semua ruangan sedang digunakan.
        </p>

    </div>

    @endif

</div>

@endsection