@extends('layouts.app')

@section('content')

<div class="flex min-h-screen">

    <!-- CONTENT -->
    <main class="flex-1 p-6">

        <!-- TOPBAR -->
        <div class="flex justify-between items-center mb-5">


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

                    <img src="https://cdn-icons-png.flaticon.com/512/3652/3652191.png"
                         class="w-70 opacity-90">

                </div>

            </div>



            <!-- CARD STATISTIK -->
            <div class="grid grid-cols-4 gap-5 mt-10">

                <div class="bg-blue-50 rounded-2xl p-6">

                    <p class="text-gray-500 mb-2">
                        Total Ruangan
                    </p>

                    <h2 class="text-5xl font-bold text-blue-600">
                        25
                    </h2>

                </div>


                <div class="bg-green-50 rounded-2xl p-6">

                    <p class="text-green-600 mb-2">
                        Ruang Kosong
                    </p>

                    <h2 class="text-5xl font-bold text-green-600">
                        8
                    </h2>

                </div>


                <div class="bg-indigo-50 rounded-2xl p-6">

                    <p class="text-indigo-600 mb-2">
                        Digunakan
                    </p>

                    <h2 class="text-5xl font-bold text-indigo-600">
                        14
                    </h2>

                </div>


                <div class="bg-red-50 rounded-2xl p-6">

                    <p class="text-red-600 mb-2">
                        Dibatalkan
                    </p>

                    <h2 class="text-5xl font-bold text-red-600">
                        3
                    </h2>

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

                        @forelse ($jadwal as $item)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="py-4">
                                    {{ $item->waktu }}
                                </td>

                                <td>
                                    {{ $item->mata_kuliah }}
                                </td>

                                <td>
                                    {{ $item->kelas }}
                                </td>

                                <td>
                                    {{ $item->ruangan }}
                                </td>

                                <td>

                                    @if($item->status == 'Digunakan')

                                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-xl text-sm">
                                            Digunakan
                                        </span>

                                    @elseif($item->status == 'Kosong')

                                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-xl text-sm">
                                            Kosong
                                        </span>

                                    @else

                                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-xl text-sm">
                                            Dibatalkan
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center py-10 text-gray-400">
                                    Belum ada jadwal
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>



            <!-- SIDE CONTENT -->
            <div class="space-y-6">

                <!-- RUANG KOSONG -->
                <div class="bg-white rounded-3xl shadow-sm p-6">

                    <div class="flex justify-between items-center mb-5">

                        <h2 class="text-2xl font-bold">
                            Ruang Kosong
                        </h2>

                    </div>


                    <div class="space-y-4">

                        <div class="flex justify-between border-b pb-3">

                            <span>Lab 1</span>

                            <span class="text-gray-500">
                                Gedung B Lt.2
                            </span>

                        </div>


                        <div class="flex justify-between border-b pb-3">

                            <span>Ruang A1</span>

                            <span class="text-gray-500">
                                Gedung A Lt.1
                            </span>

                        </div>


                        <div class="flex justify-between border-b pb-3">

                            <span>Lab 2</span>

                            <span class="text-gray-500">
                                Gedung B Lt.2
                            </span>

                        </div>

                    </div>

                </div>



                <!-- INFORMASI -->
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

@endsection