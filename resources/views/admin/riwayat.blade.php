@extends('layouts.admin')

@section('content')

<div class="p-2">

    <!-- TITLE -->
    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-800">
            Riwayat Penggunaan
        </h1>

        <p class="text-gray-500 mt-2">
            Riwayat booking ruangan yang pernah dilakukan komting.
        </p>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-sm overflow-hidden border border-gray-100">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50 border-b border-gray-100">

                    <tr class="text-left text-gray-500 text-sm">

                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Jenis</th>
                        <th class="px-6 py-4">Mata Kuliah</th>
                        <th class="px-6 py-4">Kelas</th>
                        <th class="px-6 py-4">Ruangan</th>
                        <th class="px-6 py-4">Hari</th>
                        <th class="px-6 py-4">Jam</th>
                        <th class="px-6 py-4">Tanggal Booking</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($booking as $item)

                    <tr class="border-b border-gray-100 hover:bg-gray-50">

                        <td class="px-6 py-5">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-5 font-semibold text-gray-700">
                            {{ $item->nama }}
                        </td>

                        <td class="px-6 py-5">

                            <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-xl text-xs">

                                {{ $item->jenis_booking }}

                            </span>

                        </td>

                        <td class="px-6 py-5">
                            {{ $item->mata_kuliah ?? '-' }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $item->kelas ?? '-' }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $item->ruangan }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $item->hari }}
                        </td>

                        <td class="px-6 py-5">

                            {{ $item->jam_mulai }}
                            -
                            {{ $item->jam_selesai }}

                        </td>

                        <td class="px-6 py-5 text-gray-500 text-sm">
                            {{ $item->created_at->format('d M Y') }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="9"
                            class="text-center py-12 text-gray-400">

                            Belum ada riwayat penggunaan.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection