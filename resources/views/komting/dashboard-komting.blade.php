@extends('layouts.komting')

@section('content')

<!-- TOPBAR CONTENT -->
<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard Komting
        </h1>

        <p class="text-gray-500 mt-1">
            Monitor penggunaan ruangan dan update status kelas realtime
        </p>

    </div>

</div>





<!-- HERO -->
<div class="bg-white rounded-3xl shadow-sm p-8 mb-7">

    <div class="flex justify-between items-center">

        <div>

            <h2 class="text-4xl font-bold mb-4 text-gray-800">
                Halo, {{ Auth::user()->nama }} 👋
            </h2>

            <p class="text-gray-500 text-lg leading-relaxed max-w-2xl">

                Gunakan dashboard ini untuk memantau jadwal kelas dan
                memperbarui status ruangan secara realtime.

            </p>

        </div>


        <div>

        <img
    src="https://cdn-icons-png.flaticon.com/512/3652/3652191.png"
    class="w-70 opacity-90">

        </div>

    </div>

</div>





<!-- INFO CARD -->
<div class="grid grid-cols-3 gap-6 mb-7">

    <!-- KELAS -->
<div>

<a href="{{ route('kelas.anda') }}" class="block">

    <div class="bg-white rounded-3xl p-6 shadow-sm hover:shadow-md transition cursor-pointer">

        <p class="text-gray-400 text-sm mb-2">
            Kelas
        </p>

        <h2 class="text-3xl font-bold text-blue-600">
            {{ Auth::user()->kelas }}
        </h2>

    </div>

</a>

</div>

    <!-- SEMESTER -->
    <div class="bg-white rounded-3xl p-6 shadow-sm">

        <p class="text-gray-400 text-sm mb-2">
            Semester
        </p>

        <h2 class="text-3xl font-bold text-green-500">
            {{ Auth::user()->semester }}
        </h2>

    </div>

    <!-- TOTAL MATKUL -->
    <div class="bg-white rounded-3xl p-6 shadow-sm">

        <p class="text-gray-400 text-sm mb-2">
            Mata Kuliah
        </p>

        <h2 class="text-3xl font-bold text-red-500">

            {{ count(json_decode(Auth::user()->mata_kuliah ?? '[]')) }}

        </h2>

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

        <!-- MATA KULIAH -->
        <div class="bg-white rounded-3xl shadow-sm p-6">

            <h2 class="text-2xl font-bold mb-5 text-gray-800">
                Kelas
            </h2>

            <div class="space-y-3">

                @foreach(json_decode(Auth::user()->mata_kuliah ?? '[]') as $matkul)

                    <div class="bg-blue-50 text-blue-600 px-4 py-3 rounded-2xl font-medium">

                        {{ $matkul }}

                    </div>

                @endforeach

            </div>

        </div>





        
        <!-- RIWAYAT -->
<a href="{{ route('riwayat.ruangan') }}" class="block">

<div class="bg-white rounded-3xl shadow-sm p-6 hover:shadow-md transition" id="riwayat">

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

            </div>

        </div>

    </div>

</div>

@endsection