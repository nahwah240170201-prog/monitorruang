@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <!-- HEADER -->
    <div>
        <h1 class="text-4xl font-bold text-gray-800">
            Dashboard Admin
        </h1>

        <p class="text-gray-500 mt-2 text-base">
            Monitoring ruangan & aktivitas secara realtime
        </p>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-4 gap-6">

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-gray-400 text-base">Total Ruangan</p>
            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                {{ $totalRuangan }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-gray-400 text-base">Digunakan</p>
            <h2 class="text-4xl font-bold text-red-500 mt-2">
                {{ $digunakan }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-gray-400 text-base">Kosong</p>
            <h2 class="text-4xl font-bold text-green-500 mt-2">
                {{ $kosong }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm">
            <p class="text-gray-400 text-base">Total Booking</p>
            <h2 class="text-4xl font-bold text-purple-600 mt-2">
                {{ $totalBooking }}
            </h2>
        </div>

    </div>

    <!-- CONTENT GRID -->
    <div class="grid grid-cols-3 gap-6">

        <!-- JADWAL -->
        <div class="col-span-2 bg-white p-6 rounded-3xl shadow-sm">

            <h2 class="text-2xl font-bold text-gray-800 mb-5">
                Jadwal Terbaru
            </h2>

            <table class="w-full text-base">

                <thead class="text-left text-gray-500 border-b">
                    <tr>
                        <th class="py-4">Waktu</th>
                        <th>Mata Kuliah</th>
                        <th>Ruangan</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($jadwal as $item)

                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-4">
                            {{ $item->jam_mulai }} - {{ $item->jam_selesai }}
                        </td>
                        <td>{{ $item->mata_kuliah }}</td>
                        <td>{{ $item->ruangan }}</td>
                        <td>
                            @if($item->status == 'Digunakan')
                                <span class="text-red-600 font-semibold">
                                    Digunakan
                                </span>
                            @else
                                <span class="text-green-600 font-semibold">
                                    Kosong
                                </span>
                            @endif
                        </td>
                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- RIWAYAT -->
        <div class="bg-white p-6 rounded-3xl shadow-sm">

            <h2 class="text-2xl font-bold text-gray-800 mb-5">
                Aktivitas Terbaru
            </h2>

            <div class="space-y-4 text-base">

                @foreach($riwayat as $item)

                <div class="border-l-4 border-blue-500 pl-4">
                    <p class="font-semibold text-gray-700 text-base">
                        {{ $item->ruangan }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $item->status }}
                    </p>
                </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection