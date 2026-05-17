@extends('layouts.app')

@section('content')

<div class="w-full px-5 md:px-8 py-8 overflow-hidden">

    <!-- HEADER -->
    <div class="mb-8">

        <h1 class="text-[34px] font-bold text-gray-800">
            Tentang Sistem
        </h1>

        <p class="text-gray-500 text-[15px] mt-2 leading-relaxed">
            Informasi mengenai sistem monitoring penggunaan ruang
            dan laboratorium informatika.
        </p>

    </div>


    <!-- ABOUT -->
    <div class="bg-white rounded-[32px] border border-gray-100 overflow-hidden shadow-sm">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 p-8 md:p-12">

            <!-- TEXT -->
            <div>

                <h2 class="text-[42px] md:text-[50px] font-bold text-[#0b1437] mb-8 leading-tight">
                    Monitor Ruang
                </h2>

                <p class="text-[17px]
                          md:text-[20px]
                          text-gray-700
                          leading-[38px]
                          mb-7">

                    MonitorRuang Informatika adalah aplikasi monitoring penggunaan ruang kelas dan laboratorium informatika secara realtime.

                </p>

                <p class="text-[17px]
                          md:text-[20px]
                          text-gray-700
                          leading-[38px]">

                    Aplikasi ini membantu mahasiswa mengetahui ketersediaan ruangan, serta memudahkan komting dalam mengelola status penggunaan ruangan agar proses perkuliahan menjadi lebih teratur dan efisien.

                </p>

            </div>


            <!-- IMAGE -->
            <div class="flex items-center justify-center">

              <img src="https://cdn-icons-png.flaticon.com/512/3652/3652191.png"
     class="w-full max-w-[430px] drop-shadow-xl">
            </div>

        </div>


        <!-- FITUR -->
        <div class="border-t border-gray-100 p-6 md:p-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                <!-- CARD -->
                <div class="border border-gray-100 rounded-3xl p-6">

                    <div class="w-16 h-16
                                rounded-2xl
                                bg-blue-50
                                flex items-center justify-center
                                text-blue-600 text-[28px]
                                mb-5">

                        <i class="fa-regular fa-clock"></i>

                    </div>

                    <h3 class="text-[24px] font-bold text-blue-600 mb-3">
                        Realtime
                    </h3>

                    <p class="text-[15px] text-gray-700 leading-[30px]">
                        Informasi status ruangan diperbarui secara realtime setiap saat.
                    </p>

                </div>


                <!-- CARD -->
                <div class="border border-gray-100 rounded-3xl p-6">

                    <div class="w-16 h-16
                                rounded-2xl
                                bg-green-50
                                flex items-center justify-center
                                text-green-600 text-[28px]
                                mb-5">

                        <i class="fa-solid fa-shield-heart"></i>

                    </div>

                    <h3 class="text-[24px] font-bold text-green-600 mb-3">
                        Akurat
                    </h3>

                    <p class="text-[15px] text-gray-700 leading-[30px]">
                        Data jadwal dan status ruangan akurat sesuai informasi terbaru.
                    </p>

                </div>


                


                <!-- CARD -->
                <div class="border border-gray-100 rounded-3xl p-6">

                    <div class="w-16 h-16
                                rounded-2xl
                                bg-orange-50
                                flex items-center justify-center
                                text-orange-500 text-[28px]
                                mb-5">

                        <i class="fa-solid fa-chart-column"></i>

                    </div>

                    <h3 class="text-[24px] font-bold text-orange-500 mb-3">
                        Efisien
                    </h3>

                    <p class="text-[15px] text-gray-700 leading-[30px]">
                        Mempermudah pencarian ruangan kosong dan mengurangi bentrok jadwal.
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- PANDUAN -->
    <div class="bg-white rounded-[32px]
                border border-gray-100
                p-8 md:p-10 mt-7 shadow-sm">

        <h2 class="text-[34px] md:text-[42px] font-bold text-[#0b1437] mb-10">
            Panduan Penggunaan
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            <!-- MAHASISWA -->
            <div>

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16
                                rounded-2xl
                                bg-blue-50
                                flex items-center justify-center
                                text-blue-600 text-[26px]">

                        <i class="fa-solid fa-user-graduate"></i>

                    </div>

                    <h3 class="text-[28px] font-bold text-gray-800">
                        Untuk Mahasiswa
                    </h3>

                </div>

                <div class="space-y-5 text-[16px] text-gray-700 leading-[32px]">

                    <p>1. Buka aplikasi MonitorRuang Informatika.</p>

                    <p>2. Lihat daftar ruangan dan status penggunaan.</p>

                    <p>3. Pilih ruangan kosong sesuai kebutuhan.</p>

                </div>

            </div>


            <!-- KOMTING -->
            <div>

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16
                                rounded-2xl
                                bg-orange-50
                                flex items-center justify-center
                                text-orange-500 text-[26px]">

                        <i class="fa-solid fa-user-group"></i>

                    </div>

                    <h3 class="text-[28px] font-bold text-gray-800">
                        Untuk Komting
                    </h3>

                </div>

                <div class="space-y-5 text-[16px] text-gray-700 leading-[32px]">

                    <p>1. Login menggunakan akun komting.</p>

                    <p>2. Kelola jadwal dan status ruangan kelas.</p>

                    <p>3. Perbarui informasi ruangan secara realtime.</p>

                </div>

            </div>

        </div>

    </div>


    <!-- FOOTER -->
    <div class="text-center text-gray-400 text-[14px] py-8">

        © {{ date('Y') }} MonitorRuang Informatika. All rights reserved.

    </div>

</div>

@endsection