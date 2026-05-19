@extends('layouts.admin')

@section('content')

<div class="p-8">

    <!-- TITLE -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Manajemen Jadwal Kuliah
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola jadwal mata kuliah dan penggunaan ruangan.
            </p>

        </div>

    </div>





    @if(session('success'))

    <div class="mb-5 bg-green-100 text-green-700 px-5 py-4 rounded-2xl">

        {{ session('success') }}

    </div>

    @endif





    <!-- FORM -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Tambah Jadwal
        </h2>

        <form action="{{ route('admin.jadwal.store') }}"
              method="POST"
              class="grid grid-cols-4 gap-5">

            @csrf

            <select
                name="hari"
                required
                class="h-[56px] rounded-2xl border border-gray-200 px-4">

                <option value="">Pilih Hari</option>

                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>

            </select>





            <input
                type="time"
                name="jam_mulai"
                required
                class="h-[56px] rounded-2xl border border-gray-200 px-4">





            <input
                type="time"
                name="jam_selesai"
                required
                class="h-[56px] rounded-2xl border border-gray-200 px-4">





            <input
                type="text"
                name="mata_kuliah"
                placeholder="Mata Kuliah"
                required
                class="h-[56px] rounded-2xl border border-gray-200 px-4">





            <input
                type="text"
                name="kelas"
                placeholder="Kelas"
                required
                class="h-[56px] rounded-2xl border border-gray-200 px-4">





            <select
                name="ruangan"
                required
                class="h-[56px] rounded-2xl border border-gray-200 px-4">

                <option value="">Pilih Ruangan</option>

                <option>LAB INFORMATIKA 1</option>
                <option>LAB INFORMATIKA 2</option>
                <option>INF-RUANG KULIAH III</option>

            </select>





            <button
                type="submit"
                class="col-span-2 h-[56px] rounded-2xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">

                Tambah Jadwal

            </button>

        </form>

    </div>





    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr class="text-left text-gray-500 text-sm">

                        <th class="px-6 py-4">Hari</th>
                        <th class="px-6 py-4">Waktu</th>
                        <th class="px-6 py-4">Mata Kuliah</th>
                        <th class="px-6 py-4">Kelas</th>
                        <th class="px-6 py-4">Ruangan</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Aksi</th>

                    </tr>

                </thead>





                <tbody>

                    @forelse($jadwal as $item)

                    <tr class="border-b border-gray-100 hover:bg-gray-50">

                        <td class="px-6 py-5">
                            {{ $item->hari }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $item->waktu }}
                        </td>

                        <td class="px-6 py-5 font-semibold">
                            {{ $item->mata_kuliah }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $item->kelas }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $item->ruangan }}
                        </td>

                        <td class="px-6 py-5">

                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-xl text-sm">

                                {{ $item->status }}

                            </span>

                        </td>

                        <td class="px-6 py-5">

                            <a href="{{ route('admin.jadwal.delete', $item->id) }}"
                               class="bg-red-500 text-white px-4 py-2 rounded-xl text-sm">

                                Hapus

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-10 text-gray-400">

                            Belum ada jadwal

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection