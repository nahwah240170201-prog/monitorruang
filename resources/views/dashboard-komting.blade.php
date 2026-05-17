@extends('layouts.app')

@section('content')

<div class="flex min-h-screen bg-gray-100">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-white shadow-xl p-5 flex flex-col justify-between">

        <div>

            <!-- LOGO -->
            <div class="mb-10">

                <h1 class="text-3xl font-bold text-blue-600">
                    MonitorRuang
                </h1>

                <p class="text-gray-500 text-sm mt-1">
                    Dashboard Komting Informatika
                </p>

            </div>



            <!-- MENU -->
            <nav class="space-y-3">

                <a href="#"
                   class="flex items-center gap-3 bg-blue-100 text-blue-600 px-4 py-3 rounded-2xl font-semibold">

                    Dashboard

                </a>


                <a href="#jadwal"
                   class="flex items-center gap-3 text-gray-700 hover:bg-gray-100 px-4 py-3 rounded-2xl">

                    Jadwal & Update Status

                </a>


                <a href="#riwayat"
                   class="flex items-center gap-3 text-gray-700 hover:bg-gray-100 px-4 py-3 rounded-2xl">

                    Riwayat Update

                </a>


                <a href="#"
                   class="flex items-center gap-3 text-gray-700 hover:bg-gray-100 px-4 py-3 rounded-2xl">

                    Ruang Kosong

                </a>

            </nav>



            <!-- STATUS -->
            <div class="mt-10">

                <h2 class="text-gray-400 text-sm font-bold mb-4 uppercase">
                    Status Ruangan
                </h2>


                <div class="space-y-4">

                    <div class="flex items-center gap-3">

                        <div class="w-3 h-3 rounded-full bg-green-500"></div>

                        <span class="text-gray-700">
                            Kosong
                        </span>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-3 h-3 rounded-full bg-blue-500"></div>

                        <span class="text-gray-700">
                            Digunakan
                        </span>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-3 h-3 rounded-full bg-red-500"></div>

                        <span class="text-gray-700">
                            Dibatalkan
                        </span>

                    </div>

                </div>

            </div>

        </div>



        <!-- USER CARD -->
        <div class="bg-blue-50 rounded-3xl p-5 border border-blue-100 mt-10">

            <div class="flex items-center justify-between mb-4">

                <div>

                    <h3 class="font-bold text-lg text-blue-700">
                        {{ Auth::user()->name }}
                    </h3>

                    <p class="text-sm text-gray-500">
                        Komting Kelas
                    </p>

                </div>

            </div>


            <div class="bg-white rounded-2xl p-3 text-sm text-gray-600 mb-4">

                Kamu dapat mengubah status ruangan sesuai kondisi kelas realtime.

            </div>


            <!-- LOGOUT -->
            <form action="/logout" method="POST">

                @csrf

                <button
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl font-semibold transition">

                    Logout

                </button>

            </form>

        </div>

    </aside>





    <!-- CONTENT -->
    <main class="flex-1 p-8">

        <!-- TOPBAR -->
        <div class="flex justify-between items-center mb-6">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">
                    Dashboard Komting
                </h1>

                <p class="text-gray-500 mt-1">
                    Monitor penggunaan ruangan dan update status kelas realtime
                </p>

            </div>


            <div class="bg-white px-5 py-3 rounded-2xl shadow-sm text-gray-600 font-medium">

                {{ now()->translatedFormat('l, d F Y') }}
                &nbsp;&nbsp;
                {{ now()->format('H:i') }}

            </div>

        </div>





        <!-- HERO -->
        <div class="bg-white rounded-3xl shadow-sm p-8 mb-7">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-4xl font-bold mb-4 text-gray-800">
                        Halo, {{ Auth::user()->name }} 👋
                    </h2>

                    <p class="text-gray-500 text-lg leading-relaxed max-w-2xl">

                        Gunakan dashboard ini untuk memantau jadwal kelas dan
                        memperbarui status ruangan secara realtime.

                    </p>

                </div>


                <div>

                    <img
                        src="https://cdn-icons-png.flaticon.com/512/1048/1048941.png"
                        class="w-56 opacity-90">

                </div>

            </div>

        </div>





        <!-- MAIN GRID -->
        <div class="grid grid-cols-3 gap-6">

            <!-- TABLE -->
            <div class="col-span-2 bg-white rounded-3xl shadow-sm p-6" id="jadwal">

                <div class="flex justify-between items-center mb-6">

                    <h2 class="text-2xl font-bold text-gray-800">
                        Jadwal & Update Status
                    </h2>

                </div>



                <table class="w-full">

                    <thead>

                        <tr class="border-b text-left text-gray-500">

                            <th class="py-4">Waktu</th>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                            <th>Ruangan</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>



                    <tbody>

                        @forelse($jadwal as $item)

                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="py-5">
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


                            <td>

                                <form action="#" method="POST">

                                    @csrf

                                    <select
                                        class="border rounded-xl px-3 py-2 text-sm focus:outline-none">

                                        <option>
                                            Digunakan
                                        </option>

                                        <option>
                                            Kosong
                                        </option>

                                        <option>
                                            Dibatalkan
                                        </option>

                                    </select>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-10 text-gray-400">

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

                    <h2 class="text-2xl font-bold mb-5 text-gray-800">
                        Ruang Kosong
                    </h2>


                    <div class="space-y-4">

                        <div class="flex justify-between border-b pb-3">

                            <span>
                                LAB INFORMATIKA 1
                            </span>

                            <span class="text-green-500 font-medium">
                                Kosong
                            </span>

                        </div>


                        <div class="flex justify-between border-b pb-3">

                            <span>
                                INF-RUANG KULIAH III
                            </span>

                            <span class="text-green-500 font-medium">
                                Kosong
                            </span>

                        </div>


                        <div class="flex justify-between">

                            <span>
                                LAB INFORMATIKA 2
                            </span>

                            <span class="text-green-500 font-medium">
                                Kosong
                            </span>

                        </div>

                    </div>

                </div>





                <!-- RIWAYAT -->
                <div class="bg-white rounded-3xl shadow-sm p-6" id="riwayat">

                    <h2 class="text-2xl font-bold mb-5 text-gray-800">
                        Riwayat Update
                    </h2>


                    <div class="space-y-5">

                        <div class="border-l-4 border-blue-500 pl-4">

                            <p class="font-semibold text-gray-700">
                                BIG DATA - A1
                            </p>

                            <p class="text-sm text-gray-500">
                                Status diubah menjadi Digunakan
                            </p>

                            <p class="text-xs text-gray-400 mt-1">
                                10 menit lalu
                            </p>

                        </div>


                        <div class="border-l-4 border-red-500 pl-4">

                            <p class="font-semibold text-gray-700">
                                NLP - A2
                            </p>

                            <p class="text-sm text-gray-500">
                                Status diubah menjadi Dibatalkan
                            </p>

                            <p class="text-xs text-gray-400 mt-1">
                                1 jam lalu
                            </p>

                        </div>


                        <div class="border-l-4 border-green-500 pl-4">

                            <p class="font-semibold text-gray-700">
                                FORENSIKA DIGITAL - A3
                            </p>

                            <p class="text-sm text-gray-500">
                                Status diubah menjadi Kosong
                            </p>

                            <p class="text-xs text-gray-400 mt-1">
                                Kemarin
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

@endsection