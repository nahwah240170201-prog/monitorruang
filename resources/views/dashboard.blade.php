<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MonitorRuang</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg p-5 flex flex-col justify-between">

        <div>
            <div class="mb-10">
                <h1 class="text-2xl font-bold text-blue-600">
                    MonitorRuang
                </h1>
                <p class="text-gray-500 text-sm">
                    Informatika
                 </p>
            </div>

            <nav class="space-y-3">

                <a href="#"
                   class="flex items-center gap-3 bg-blue-100 text-blue-600 px-4 py-3 rounded-xl font-semibold">
                    Dashboard
                </a>

                <a href="#"
                   class="flex items-center gap-3 text-gray-700 hover:bg-gray-100 px-4 py-3 rounded-xl">
                    Jadwal Hari Ini
                </a>

                <a href="#"
                   class="flex items-center gap-3 text-gray-700 hover:bg-gray-100 px-4 py-3 rounded-xl">
                    Daftar Ruangan
                </a>

                <a href="#"
                   class="flex items-center gap-3 text-gray-700 hover:bg-gray-100 px-4 py-3 rounded-xl">
                   Ruang Kosong
                </a>

            </nav>

            <div class="mt-10">
                <h2 class="text-gray-400 text-sm font-bold mb-4 uppercase">
                    Status Ruangan
                </h2>

                <div class="space-y-3">

                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <span>Kosong</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                        <span>Digunakan</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <span>Dibatalkan</span>
                    </div>

                </div>
            </div>
        </div>


        <!-- USER CARD -->
        <div class="bg-gray-50 rounded-2xl p-4 border mt-10">
            <h3 class="font-bold text-lg mb-1">
                Mahasiswa
            </h3>

            <p class="text-gray-500 text-sm mb-4">
                Public User
            </p>

            <div class="bg-blue-50 text-blue-600 text-sm rounded-xl p-3">
                Tidak perlu login untuk melihat informasi ruangan.
            </div>
        </div>

    </aside>


    <!-- CONTENT -->
    <main class="flex-1 p-6">

        <!-- TOPBAR -->
        <div class="flex justify-end mb-5">
            <div class="text-gray-600">
                Jumat, 24 Mei 2024 &nbsp;&nbsp; 09:30
            </div>
        </div>


        <!-- HERO -->
        <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

            <div class="flex justify-between items-center">

                <div>
                    <h1 class="text-4xl font-bold mb-3">
                        Selamat Datang!
                    </h1>

                    <p class="text-gray-500 text-lg">
                        Pantau penggunaan ruang dan laboratorium informatika secara realtime.
                    </p>
                </div>

                <div>
                    <img src="https://cdn-icons-png.flaticon.com/512/1048/1048941.png"
                         class="w-52 opacity-90">
                </div>

            </div>


            <!-- CARD STATISTIK -->
             <div class="grid grid-cols-4 gap-5 mt-10">

                <div class="bg-blue-50 rounded-2xl p-6">
                    <p class="text-gray-500 mb-2">Total Ruangan</p>
                    <h2 class="text-5xl font-bold text-blue-600">25</h2>
                </div>

                <div class="bg-green-50 rounded-2xl p-6">
                    <p class="text-green-600 mb-2">Ruang Kosong</p>
                    <h2 class="text-5xl font-bold text-green-600">8</h2>
                </div>

                <div class="bg-indigo-50 rounded-2xl p-6">
                    <p class="text-indigo-600 mb-2">Digunakan</p>
                    <h2 class="text-5xl font-bold text-indigo-600">14</h2>
                </div>

                <div class="bg-red-50 rounded-2xl p-6">
                    <p class="text-red-600 mb-2">Dibatalkan</p>
                    <h2 class="text-5xl font-bold text-red-600">3</h2>
                 </div>

            </div>

        </div>


        <!-- MAIN GRID -->
        <div class="grid grid-cols-3 gap-6">

            <!-- TABLE -->
            <div class="col-span-2 bg-white rounded-3xl shadow-sm p-6">

                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">
                        Jadwal Hari Ini
                    </h2>

                    <button class="bg-blue-50 text-blue-600 px-5 py-2 rounded-xl">
                        Lihat Semua Jadwal
                    </button>
                </div>

                <table class="w-full">
                    <thead>
                        <tr class="text-left text-gray-500 border-b">
                            <th class="py-3">Waktu</th>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                            <th>Ruangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4">08:00 - 09:40</td>
                            <td>Pemrograman Web</td>
                            <td>IF-2A</td>
                            <td>Lab 1</td>
                            <td>
                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-xl text-sm">
                                    Digunakan
                                </span>
                            </td>
                        </tr>

                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4">10:00 - 11:40</td>
                            <td>Basis Data</td>
                            <td>IF-2B</td>
                            <td>Ruang A1</td>
                            <td>
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-xl text-sm">
                                    Kosong
                                </span>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="py-4">13:00 - 14:40</td>
                            <td>Struktur Data</td>
                            <td>IF-2C</td>
                            <td>Lab 2</td>
                            <td>
                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-xl text-sm">
                                    Dibatalkan
                                </span>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>


            <!-- SIDE CONTENT -->
            <div class="space-y-6">

                <div class="bg-white rounded-3xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-2xl font-bold">
                            Ruang Kosong
                        </h2>
                    </div>

                    <div class="space-y-4">

                        <div class="flex justify-between border-b pb-3">
                            <span>Lab 1</span>
                            <span class="text-gray-500">Gedung B Lt.2</span>
                        </div>

                        <div class="flex justify-between border-b pb-3">
                            <span>Ruang A1</span>
                            <span class="text-gray-500">Gedung A Lt.1</span>
                        </div>

                        <div class="flex justify-between border-b pb-3">
                            <span>Lab 2</span>
                            <span class="text-gray-500">Gedung B Lt.2</span>
                        </div>

                    </div>
                </div>


                <div class="bg-white rounded-3xl shadow-sm p-6">

                    <h2 class="text-2xl font-bold mb-4">
                        Informasi
                    </h2>

                    <p class="text-gray-500 leading-relaxed">
                        Untuk perubahan status ruangan, hubungi dosen atau komting kelas terkait.
                    </p>

                </div>

            </div>

        </div>

       </main>

</div>

</body>
</html>

