@extends('layouts.admin')

@section('content')

<div class="p-8">

    <!-- TITLE -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Manajemen Ruangan
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola ruangan, kelas, dan status penggunaan.
            </p>

        </div>

        <!-- SEARCH BAR (KANAN ATAS) -->
        <div>

            <input type="text"
                   placeholder="Cari kelas / ruangan..."
                   class="h-[48px] w-[260px] rounded-2xl border border-gray-200 px-5
                          focus:outline-none focus:border-blue-500">

        </div>

    </div>





    @if(session('success'))

    <div class="mb-5 bg-green-100 text-green-700 px-5 py-4 rounded-2xl">

        {{ session('success') }}

    </div>

    @endif





    <!-- TABLE RUANGAN (MODEL JADWAL STYLE) -->
    <div class="bg-white rounded-3xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr class="text-left text-gray-500 text-sm">

                        <th class="px-6 py-4">Ruangan</th>
                        <th class="px-6 py-4">Kelas</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Aksi</th>

                    </tr>

                </thead>





                <tbody>

                    @forelse($ruangan as $item)

                    <tr class="border-b border-gray-100 hover:bg-gray-50">

                        <td class="px-6 py-5 font-semibold">
                            {{ $item->ruangan }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $item->kelas ?? '-' }}
                        </td>

                        <td class="px-6 py-5">

                            @if($item->status == 'Digunakan')
                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-xl text-sm">
                                    Digunakan
                                </span>
                            @else
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-xl text-sm">
                                    Kosong
                                </span>
                            @endif

                        </td>

                        <td class="px-6 py-5">

                            <button class="bg-yellow-400 text-white px-4 py-2 rounded-xl text-sm">
                                Edit
                            </button>

                            <button class="bg-red-500 text-white px-4 py-2 rounded-xl text-sm">
                                Hapus
                            </button>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4"
                            class="text-center py-10 text-gray-400">

                            Belum ada data ruangan

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection