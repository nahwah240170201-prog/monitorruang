@extends('layouts.admin')

@section('content')

<div class="p-8">

    <!-- TITLE -->
    <!-- HEADER -->
<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-gray-800">
            Manajemen Jadwal Kuliah
        </h1>

        <p class="text-gray-500 mt-2">
            Kelola jadwal mata kuliah dan penggunaan ruangan.
        </p>

    </div>





    <!-- RIGHT ACTION -->
    <div class="flex items-center gap-4">

        <!-- SEARCH -->
        <div class="relative">

            <input
                type="text"
                placeholder="Cari jadwal..."
                class="w-[280px] h-[52px]
                       rounded-2xl
                       border border-gray-200
                       bg-white
                       pl-12 pr-5
                       focus:outline-none
                       focus:border-blue-500">

            <i class="fa-solid fa-magnifying-glass
                      absolute left-5 top-1/2 -translate-y-1/2
                      text-gray-400"></i>

        </div>





        <!-- BUTTON -->
        <button
            onclick="openModal()"
            class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 h-[52px] rounded-2xl font-semibold shadow-lg shadow-blue-200">

            + Tambah Jadwal

        </button>

    </div>

</div>





    @if(session('success'))

    <div class="mb-5 bg-green-100 text-green-700 px-5 py-4 rounded-2xl">

        {{ session('success') }}

    </div>

    @endif








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
    <!-- MODAL -->
<div id="modalTambah"
     class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-4xl rounded-3xl p-8 shadow-2xl">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-3xl font-bold text-gray-800">
                    Tambah Jadwal Kuliah
                </h2>

                <p class="text-gray-500 mt-1">
                    Tambahkan jadwal penggunaan ruangan perkuliahan
                </p>

            </div>


            <!-- CLOSE -->
            <button onclick="closeModal()"
                    class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-red-100 hover:text-red-600 transition">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>

        <!-- FORM -->
        <form action="{{ route('admin.jadwal.store') }}"
              method="POST"
              class="grid grid-cols-2 gap-6">

            @csrf

            <!-- HARI -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Hari
                </label>

                <select
                    name="hari"
                    required
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                    <option value="">
                        Pilih Hari
                    </option>

                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>

                </select>

            </div>





            <!-- KELAS -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Kelas
                </label>

                <input
                    type="text"
                    name="kelas"
                    required
                    placeholder="Contoh: A1"
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

            </div>





            <!-- JAM MULAI -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Jam Mulai
                </label>

                <input
                    type="time"
                    name="jam_mulai"
                    required
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

            </div>





            <!-- JAM SELESAI -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Jam Selesai
                </label>

                <input
                    type="time"
                    name="jam_selesai"
                    required
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

            </div>





            <!-- MATA KULIAH -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Mata Kuliah
                </label>

                <input
                    type="text"
                    name="mata_kuliah"
                    required
                    placeholder="Masukkan mata kuliah"
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

            </div>





            <!-- RUANGAN -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Ruangan
                </label>

                <select
                    name="ruangan"
                    required
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                    <option value="">
                        Pilih Ruangan
                    </option>

                    <option>
                        LAB INFORMATIKA 1
                    </option>

                    <option>
                        LAB INFORMATIKA 2
                    </option>

                    <option>
                        INF-RUANG KULIAH III
                    </option>

                </select>

            </div>





            <!-- BUTTON -->
            <div class="col-span-2 flex gap-4 pt-3">

                <button
                    type="button"
                    onclick="closeModal()"
                    class="flex-1 h-[56px] rounded-2xl bg-gray-100 hover:bg-gray-200 transition font-semibold text-gray-700">

                    Batal

                </button>





                <button
                    type="submit"
                    class="flex-1 h-[56px] rounded-2xl bg-blue-600 hover:bg-blue-700 transition text-white font-semibold shadow-lg shadow-blue-200">

                    Simpan Jadwal

                </button>

            </div>

        </form>

    </div>

</div>

</div>
<script>

function openModal() {

    document.getElementById('modalTambah')
        .classList.remove('hidden');

    document.getElementById('modalTambah')
        .classList.add('flex');
}

function closeModal() {

    document.getElementById('modalTambah')
        .classList.add('hidden');

    document.getElementById('modalTambah')
        .classList.remove('flex');
}

</script>
@endsection