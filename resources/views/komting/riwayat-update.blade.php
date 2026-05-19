@extends('layouts.komting')

@section('content')

<div class="flex justify-between items-center mb-7">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Riwayat Penggunaan Ruangan
        </h1>

        <p class="text-gray-500 mt-1">
            Riwayat perubahan status ruangan perkuliahan
        </p>

    </div>

</div>





<div class="bg-white rounded-3xl shadow-sm p-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-7">
        Riwayat Anda
    </h2>





    <div class="overflow-x-auto">

    <table class="w-full border-collapse">

        <tr class="bg-gray-100 text-gray-700 text-left">

    <th class="p-4 rounded-l-2xl">
        Jenis Booking
    </th>

    <th class="p-4">
        Detail Booking
    </th>

    <th class="p-4">
        Ruangan
    </th>

    <th class="p-4">
        Jadwal
    </th>

    <th class="p-4">
        Status
    </th>

    <th class="p-4 rounded-r-2xl">
        Waktu Update
    </th>

</tr>





        <!-- BODY -->
        <tbody class="divide-y divide-gray-100">

            @forelse($riwayat as $item)

            <tr class="hover:bg-gray-50 transition">

    <!-- JENIS -->
    <td class="p-4 text-gray-700 font-semibold">

        {{ ucfirst($item->jenis_booking) }}

    </td>





    <!-- DETAIL BOOKING -->
    <td class="p-4">

        @if($item->jenis_booking == 'pergantian')

            <div class="font-semibold text-gray-800">

                {{ $item->mata_kuliah }}

            </div>

            <div class="text-sm text-gray-500 mt-1">

                {{ $item->kelas }}

            </div>

        @else

            <div class="font-semibold text-gray-700">

                {{ $item->alasan }}

            </div>

        @endif

    </td>





    <!-- RUANGAN -->
    <td class="p-4 text-gray-600">

        {{ $item->ruangan }}

    </td>





    <!-- JADWAL -->
    <td class="p-4 text-gray-600">

        {{ $item->hari }}

        <br>

        <span class="text-sm text-gray-400">

            {{ $item->jam_mulai }}
            -
            {{ $item->jam_selesai }}

        </span>

    </td>





    <!-- STATUS -->
    <td class="p-4">

        @if($item->status == 'Digunakan')

            <span class="px-4 py-2 rounded-xl bg-red-100 text-red-600 text-sm font-semibold">

                Digunakan

            </span>

        @elseif($item->status == 'Dibatalkan')

            <span class="px-4 py-2 rounded-xl bg-gray-200 text-gray-700 text-sm font-semibold">

                Dibatalkan

            </span>

        @endif

    </td>





    <!-- UPDATE -->
    <td class="p-4 text-gray-400 text-sm">

        {{ $item->updated_at->diffForHumans() }}

    </td>

</tr>

            @empty

            <tr>

                <td colspan="6" class="text-center py-10 text-gray-400">

                    Belum ada riwayat booking

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

    </div>

</div>


@endsection