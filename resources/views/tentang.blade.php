<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MonitorRuang Informatika</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#f5f7fb] font-sans">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <div class="w-[290px] bg-white border-r border-gray-200 flex flex-col justify-between">

        <div>

            <!-- LOGO -->
            <div class="px-6 pt-7 pb-5 border-b border-gray-100">

                <div class="flex items-center gap-4">

                    <div class="w-[58px] h-[58px]
                                rounded-2xl
                                bg-gradient-to-br from-blue-500 to-blue-700
                                flex items-center justify-center
                                text-white text-[24px]
                                shadow-lg shadow-blue-200">

                        <i class="fa-solid fa-school"></i>

                    </div>

                    <div>

                        <h1 class="text-[32px] font-bold text-blue-600 leading-none">
                            MonitorRuang
                        </h1>

                        <p class="text-[15px] text-gray-600 mt-1">
                            Informatika
                        </p>

                    </div>

                </div>

            </div>

            <!-- MENU -->
            <div class="px-5 py-6 space-y-3">

                <!-- DASHBOARD -->
                <a href="#"
                   class="flex items-center gap-4
                          px-4 py-4
                          rounded-2xl
                          text-gray-700
                          hover:bg-blue-50
                          transition">

                    <i class="fa-solid fa-house text-[20px]"></i>

                    <span class="text-[17px] font-medium">
                        Dashboard
                    </span>

                </a>

                <!-- JADWAL -->
                <a href="#"
                   class="flex items-center gap-4
                          px-4 py-4
                          rounded-2xl
                          text-gray-700
                          hover:bg-blue-50
                          transition">

                    <i class="fa-regular fa-calendar text-[20px]"></i>

                    <span class="text-[17px] font-medium">
                        Jadwal Hari Ini
                    </span>

                </a>

                <!-- RUANGAN -->
                <a href="#"
                   class="flex items-center gap-4
                          px-4 py-4
                          rounded-2xl
                          text-gray-700
                          hover:bg-blue-50
                          transition">

                    <i class="fa-solid fa-border-all text-[20px]"></i>

                    <span class="text-[17px] font-medium">
                        Daftar Ruangan
                    </span>

                </a>

                <!-- TENTANG -->
                <a href="#"
                   class="flex items-center gap-4
                          px-4 py-4
                          rounded-2xl
                          bg-[#eef3ff]
                          text-blue-600">

                    <i class="fa-regular fa-circle-info text-[20px]"></i>

                    <span class="text-[17px] font-medium">
                        Tentang
                    </span>

                </a>

            </div>

            <!-- STATUS -->
            <div class="px-6 mt-5">

                <div class="border-t border-gray-200 pt-8">

                    <h3 class="text-gray-400
                               uppercase
                               tracking-[2px]
                               text-[15px]
                               font-semibold
                               mb-6">

                        Status Ruangan

                    </h3>

                    <div class="space-y-6">

                        <div class="flex items-center gap-4">

                            <div class="w-5 h-5 rounded-full bg-green-500"></div>

                            <span class="text-[18px] text-gray-700">
                                Kosong
                            </span>

                        </div>

                        <div class="flex items-center gap-4">

                            <div class="w-5 h-5 rounded-full bg-blue-500"></div>

                            <span class="text-[18px] text-gray-700">
                                Digunakan
                            </span>

                        </div>

                        <div class="flex items-center gap-4">

                            <div class="w-5 h-5 rounded-full bg-red-500"></div>

                            <span class="text-[18px] text-gray-700">
                                Dibatalkan
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- PROFILE -->
        <div class="p-5">

            <div class="border border-gray-200 rounded-3xl p-5">

                <div class="flex items-center gap-4 mb-4">

                    <div class="w-14 h-14
                                rounded-2xl
                                bg-blue-50
                                flex items-center justify-center
                                text-blue-600 text-[24px]">

                        <i class="fa-solid fa-users"></i>

                    </div>

                    <div>

                        <h3 class="font-bold text-[22px] text-gray-800">
                            Mahasiswa
                        </h3>

                        <p class="text-[15px] text-gray-500">
                            Public User
                        </p>

                    </div>

                </div>

                <p class="text-[17px] text-gray-700 leading-[34px]">
                    Mahasiswa tidak perlu login untuk melihat informasi ruangan secara realtime.
                </p>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-7">

        <!-- TOP -->
        <div class="flex justify-end items-center mb-6">

            <div class="flex items-center gap-4 text-gray-700 text-[20px]">

                <i class="fa-regular fa-clock"></i>

                <span>
                    Jumat, 24 Mei 2024
                </span>

                <span>
                    09:30
                </span>

            </div>

        </div>

        <!-- CARD ABOUT -->
        <div class="bg-white rounded-[32px] border border-gray-100 overflow-hidden">

            <div class="grid grid-cols-2 gap-10 p-12">

                <!-- TEXT -->
                <div>

                    <h1 class="text-[50px] font-bold text-[#0b1437] mb-8">
                        Tentang Aplikasi
                    </h1>

                    <p class="text-[23px]
                              text-gray-700
                              leading-[50px]
                              mb-8">

                        MonitorRuang Informatika adalah aplikasi monitoring penggunaan ruang kelas dan laboratorium informatika secara realtime.

                    </p>

                    <p class="text-[23px]
                              text-gray-700
                              leading-[50px]">

                        Aplikasi ini membantu mahasiswa mengetahui ketersediaan ruangan, serta memudahkan dosen dan komting dalam mengelola status penggunaan ruangan.

                    </p>

                </div>

                <!-- IMAGE -->
                <div class="flex items-center justify-center">

                    <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png"
                         class="w-full max-w-[600px]">

                </div>

            </div>

            <!-- FITUR -->
            <div class="border-t border-gray-100 p-6">

                <div class="grid grid-cols-4 gap-5">

                    <!-- CARD -->
                    <div class="border border-gray-100 rounded-3xl p-7">

                        <div class="w-20 h-20
                                    rounded-full
                                    bg-blue-50
                                    flex items-center justify-center
                                    text-blue-600 text-[34px]
                                    mb-6">

                            <i class="fa-regular fa-clock"></i>

                        </div>

                        <h3 class="text-[28px] font-bold text-blue-600 mb-4">
                            Realtime
                        </h3>

                        <p class="text-[18px] text-gray-700 leading-[35px]">
                            Informasi status ruangan diperbarui secara realtime setiap 30 detik.
                        </p>

                    </div>

                    <!-- CARD -->
                    <div class="border border-gray-100 rounded-3xl p-7">

                        <div class="w-20 h-20
                                    rounded-full
                                    bg-green-50
                                    flex items-center justify-center
                                    text-green-600 text-[34px]
                                    mb-6">

                            <i class="fa-solid fa-shield-heart"></i>

                        </div>

                        <h3 class="text-[28px] font-bold text-green-600 mb-4">
                            Akurat
                        </h3>

                        <p class="text-[18px] text-gray-700 leading-[35px]">
                            Data jadwal dan status ruangan akurat sesuai informasi terbaru.
                        </p>

                    </div>

                    <!-- CARD -->
                    <div class="border border-gray-100 rounded-3xl p-7">

                        <div class="w-20 h-20
                                    rounded-full
                                    bg-purple-50
                                    flex items-center justify-center
                                    text-purple-600 text-[34px]
                                    mb-6">

                            <i class="fa-solid fa-users"></i>

                        </div>

                        <h3 class="text-[28px] font-bold text-purple-600 mb-4">
                            Kolaboratif
                        </h3>

                        <p class="text-[18px] text-gray-700 leading-[35px]">
                            Dosen dan komting dapat berkolaborasi menjaga informasi ruangan.
                        </p>

                    </div>

                    <!-- CARD -->
                    <div class="border border-gray-100 rounded-3xl p-7">

                        <div class="w-20 h-20
                                    rounded-full
                                    bg-orange-50
                                    flex items-center justify-center
                                    text-orange-500 text-[34px]
                                    mb-6">

                            <i class="fa-solid fa-chart-column"></i>

                        </div>

                        <h3 class="text-[28px] font-bold text-orange-500 mb-4">
                            Efisien
                        </h3>

                        <p class="text-[18px] text-gray-700 leading-[35px]">
                            Mempermudah pencarian ruangan kosong dan mengurangi bentrok.
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- PANDUAN -->
        <div class="bg-white rounded-[32px]
                    border border-gray-100
                    p-10 mt-7">

            <h2 class="text-[42px] font-bold text-[#0b1437] mb-10">
                Panduan Penggunaan
            </h2>

            <div class="grid grid-cols-3 gap-10">

                <!-- MAHASISWA -->
                <div>

                    <div class="flex items-center gap-4 mb-8">

                        <div class="w-16 h-16
                                    rounded-full
                                    bg-blue-50
                                    flex items-center justify-center
                                    text-blue-600 text-[28px]">

                            <i class="fa-solid fa-user-graduate"></i>

                        </div>

                        <h3 class="text-[28px] font-bold text-gray-800">
                            Untuk Mahasiswa
                        </h3>

                    </div>

                    <div class="space-y-6 text-[18px] text-gray-700">

                        <p>1. Buka aplikasi MonitorRuang Informatika.</p>
                        <p>2. Lihat daftar ruangan dan statusnya.</p>
                        <p>3. Pilih ruangan kosong sesuai kebutuhan.</p>

                    </div>

                </div>

                <!-- DOSEN -->
                <div>

                    <div class="flex items-center gap-4 mb-8">

                        <div class="w-16 h-16
                                    rounded-full
                                    bg-green-50
                                    flex items-center justify-center
                                    text-green-600 text-[28px]">

                            <i class="fa-solid fa-user-tie"></i>

                        </div>

                        <h3 class="text-[28px] font-bold text-gray-800">
                            Untuk Dosen
                        </h3>

                    </div>

                    <div class="space-y-6 text-[18px] text-gray-700">

                        <p>1. Login menggunakan NIDN dan password.</p>
                        <p>2. Lihat jadwal kelas yang Anda ajar.</p>
                        <p>3. Ubah status ruangan jika ada perubahan.</p>

                    </div>

                </div>

                <!-- KOMTING -->
                <div>

                    <div class="flex items-center gap-4 mb-8">

                        <div class="w-16 h-16
                                    rounded-full
                                    bg-orange-50
                                    flex items-center justify-center
                                    text-orange-500 text-[28px]">

                            <i class="fa-solid fa-user-group"></i>

                        </div>

                        <h3 class="text-[28px] font-bold text-gray-800">
                            Untuk Komting
                        </h3>

                    </div>

                    <div class="space-y-6 text-[18px] text-gray-700">

                        <p>1. Login menggunakan akun komting.</p>
                        <p>2. Lihat kelas yang menjadi tanggung jawab Anda.</p>
                        <p>3. Ubah status ruangan kelas Anda.</p>

                    </div>

                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <div class="text-center text-gray-500 text-[18px] py-8">
            © 2024 MonitorRuang Informatika. All rights reserved.
        </div>

    </div>

</div>

</body>
</html>