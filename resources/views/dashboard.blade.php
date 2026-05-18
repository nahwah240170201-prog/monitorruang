@extends('layouts.app')

@section('content')

<div class="flex min-h-screen">

    <!-- CONTENT -->
    <main class="flex-1 p-6">

        <!-- HERO -->
        <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

            <div class="flex justify-between items-center">

                <div>

                    <h1 class="text-4xl font-bold mb-3">
                        Selamat Datang!
                    </h1>

                    <p class="text-gray-500 text-lg leading-relaxed">
                        Lihat informasi penggunaan ruangan dan laboratorium informatika secara realtime. <br>
                        Mahasiswa dapat memantau status ruangan, melihat jadwal kelas, <br>
                        dan mengetahui ketersediaan ruang yang kosong.

                        <br><br>

                        Untuk melakukan booking ruangan atau membatalkan kelas, <br>
                        silakan register dan login sebagai komting.
                    </p>

                </div>

                <div>

                    <img src="https://cdn-icons-png.flaticon.com/512/3652/3652191.png"
                         class="w-70 opacity-90">

                </div>

            </div>



            <!-- CARD STATISTIK -->
            <div class="grid grid-cols-3 gap-5 mt-10">

                <!-- TOTAL RUANGAN -->
                <div class="bg-purple-50 rounded-2xl p-6 border border-purple-100">

                    <p class="text-purple-600 mb-2 font-medium">
                        Total Ruangan
                    </p>

                    <h2 class="text-5xl font-bold text-purple-600">
                        {{ $totalRuangan }}
                    </h2>

                </div>


                <!-- RUANG KOSONG -->
                <div class="bg-green-50 rounded-2xl p-6 border border-green-100">

                    <p class="text-green-600 mb-2 font-medium">
                        Ruang Kosong
                    </p>

                    <h2 class="text-5xl font-bold text-green-600">
                        {{ $ruangKosong }}
                    </h2>

                </div>


                <!-- DIGUNAKAN -->
                <div class="bg-red-50 rounded-2xl p-6 border border-red-100">

                    <p class="text-red-600 mb-2 font-medium">
                        Digunakan
                    </p>

                    <h2 class="text-5xl font-bold text-red-600">
                        {{ $digunakan }}
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

                    <a href="{{ route('jadwal.index') }}"
                       class="bg-blue-50 text-blue-600 px-5 py-2 rounded-xl hover:bg-blue-100 transition">

                        Lihat Jadwal

                    </a>

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

                                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-xl text-sm font-medium">
                                            Digunakan
                                        </span>

                                    @elseif($item->status == 'Kosong')

                                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-xl text-sm font-medium">
                                            Kosong
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
                <a href="{{ route('ruang.kosong') }}" class="block">

                    <div class="bg-white rounded-3xl shadow-sm p-6 hover:shadow-md transition">

                        <h2 class="text-2xl font-bold mb-5 text-gray-800">
                            Ruang Kosong
                        </h2>


                        <div class="space-y-4">

                            @forelse($listRuangKosong as $ruang)

                                <div class="flex justify-between border-b pb-3">

                                    <span>
                                        {{ $ruang->ruangan }}
                                    </span>

                                    <span class="text-green-500 font-medium">
                                        {{ $ruang->status }}
                                    </span>

                                </div>

                            @empty

                                <div class="text-gray-400">
                                    Tidak ada ruang kosong
                                </div>

                            @endforelse

                        </div>

                    </div>

                </a>



                <!-- TENTANG -->
                <a href="{{ route('tentang') }}" class="block">

                    <div class="bg-white rounded-3xl shadow-sm p-6 hover:shadow-md transition">

                        <h2 class="text-2xl font-bold mb-4">
                            Tentang
                        </h2>

                        <p class="text-gray-500 leading-relaxed">
                            MonitorRuang Informatika merupakan aplikasi yang digunakan untuk memantau penggunaan ruang kelas dan laboratorium informatika secara realtime.
                        </p>

                    </div>

                </a>

            </div>

        </div>

    </main>

</div>

@endsection