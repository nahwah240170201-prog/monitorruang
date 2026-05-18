@extends('layouts.komting')

@section('content')

<div class="flex justify-between items-center mb-7">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Update Status Ruangan
        </h1>

        <p class="text-gray-500 mt-1">
            Ubah status ruangan sesuai kondisi realtime perkuliahan
        </p>

    </div>

</div>





<div class="bg-white rounded-3xl shadow-sm p-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-7">
        Jadwal Hari Ini
    </h2>

    <table class="w-full">

        <thead>

            <tr class="border-b text-left text-gray-500">

                <th class="py-4">Waktu</th>
                <th>Mata Kuliah</th>
                <th>Kelas</th>
                <th>Ruangan</th>
                <th>Status</th>
                <th>Update</th>

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

                    <form action="#" method="POST" class="flex gap-3">

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

                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 rounded-xl text-sm font-medium transition">

                            Simpan

                        </button>

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

@endsection