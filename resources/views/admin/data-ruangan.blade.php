@extends('layouts.admin')

@section('content')

<div class="p-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Manajemen Ruangan
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola ruangan, kelas, dan status penggunaan.
            </p>

        </div>





        <!-- SEARCH + BUTTON -->
        <div class="flex items-center gap-4">

            <!-- SEARCH -->
            <input type="text"
                   placeholder="Cari kelas / ruangan..."
                   class="h-[52px] w-[260px] rounded-2xl border border-gray-200 px-5
                          focus:outline-none focus:border-blue-500">

            <!-- BUTTON -->
            <button
                onclick="openModal()"
                class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 h-[52px] rounded-2xl font-semibold shadow-lg shadow-blue-200">

                + Tambah Data

            </button>

        </div>

    </div>





    @if(session('success'))

    <div class="mb-5 bg-green-100 text-green-700 px-5 py-4 rounded-2xl">

        {{ session('success') }}

    </div>

    @endif





    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <!-- HEAD -->
                <thead class="bg-gray-50 border-b border-gray-100">

                    <tr class="text-left text-gray-500 text-sm">

                        <th class="px-6 py-5">No</th>
                        <th class="px-6 py-5">Ruangan</th>
                        <th class="px-6 py-5">Kelas</th>
                        <th class="px-6 py-5">Status</th>
                        <th class="px-6 py-5 text-center">Aksi</th>

                    </tr>

                </thead>





                <!-- BODY -->
                <tbody>

                    @forelse($ruangan as $item)

                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition">

                        <td class="px-6 py-5">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-5 font-semibold text-gray-700">
                            {{ $item->ruangan }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $item->kelas ?? '-' }}
                        </td>

                        <td class="px-6 py-5">

                            @if($item->status == 'Digunakan')

                                <span class="bg-red-50 text-red-600 px-4 py-2 rounded-xl text-sm font-medium">
                                    Digunakan
                                </span>

                            @else

                                <span class="bg-green-50 text-green-600 px-4 py-2 rounded-xl text-sm font-medium">
                                    Kosong
                                </span>

                            @endif

                        </td>





                        <!-- AKSI -->
                        <td class="px-6 py-5">

                            <div class="flex items-center justify-center gap-3">

                                <!-- EDIT -->
                                <button
                                    onclick="openEditModal()"
                                    class="w-10 h-10 rounded-xl bg-yellow-50 text-yellow-600 hover:bg-yellow-100 transition">

                                    <i class="fa-solid fa-pen"></i>

                                </button>





                                <!-- DELETE -->
                                <button
                                    onclick="openDeleteModal()"
                                    class="w-10 h-10 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-12 text-gray-400">

                            Belum ada data ruangan.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>





    <!-- MODAL TAMBAH -->
    <div id="modalTambah"
         class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

        <div class="bg-white w-full max-w-2xl rounded-3xl p-8 shadow-2xl">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-7">

                <div>

                    <h2 class="text-3xl font-bold text-gray-800">
                        Tambah Ruangan
                    </h2>

                    <p class="text-gray-500 mt-1">
                        Tambahkan data ruangan dan status penggunaan
                    </p>

                </div>





                <!-- CLOSE -->
                <button onclick="closeModal()"
                        class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-red-100 hover:text-red-600 transition">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>





            <!-- FORM -->
            <form action="#"
                  method="POST"
                  class="space-y-6">

                @csrf

                <!-- RUANGAN -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Ruangan
                    </label>

                    <input
                        type="text"
                        name="ruangan"
                        placeholder="Contoh: LAB INFORMATIKA 1"
                        class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                </div>





                <!-- KELAS -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kelas
                    </label>

                    <input
                        type="text"
                        name="kelas"
                        placeholder="Contoh: TI-1A"
                        class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                </div>





                <!-- STATUS -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                        <option value="Kosong">
                            Kosong
                        </option>

                        <option value="Digunakan">
                            Digunakan
                        </option>

                    </select>

                </div>





                <!-- BUTTON -->
                <div class="flex gap-4 pt-3">

                    <button
                        type="button"
                        onclick="closeModal()"
                        class="flex-1 h-[54px] rounded-2xl bg-gray-100 hover:bg-gray-200 transition font-semibold text-gray-700">

                        Cancel

                    </button>





                    <button
                        type="submit"
                        class="flex-1 h-[54px] rounded-2xl bg-blue-600 hover:bg-blue-700 transition text-white font-semibold shadow-lg shadow-blue-200">

                        Simpan Data

                    </button>

                </div>

            </form>

        </div>

    </div>





    <!-- MODAL DELETE -->
    <div id="modalDelete"
         class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

        <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-2xl">

            <div class="text-center">

                <div class="w-20 h-20 mx-auto rounded-full bg-red-100 flex items-center justify-center mb-5">

                    <i class="fa-solid fa-trash text-red-600 text-3xl"></i>

                </div>

                <h2 class="text-2xl font-bold text-gray-800">
                    Hapus Data?
                </h2>

                <p class="text-gray-500 mt-3">
                    Apakah anda yakin ingin menghapus data ruangan ini?
                </p>

            </div>





            <!-- BUTTON -->
            <div class="flex gap-4 mt-8">

                <!-- CANCEL -->
                <button
                    onclick="closeDeleteModal()"
                    class="flex-1 h-[52px] rounded-2xl bg-gray-100 hover:bg-gray-200 transition font-semibold text-gray-700">

                    Cancel

                </button>





                <!-- DELETE -->
                <button
                    class="flex-1 h-[52px] rounded-2xl bg-red-600 hover:bg-red-700 transition text-white font-semibold">

                    Ya, Hapus

                </button>

            </div>

        </div>

    </div>





    <!-- MODAL EDIT -->
    <div id="modalEdit"
         class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

        <div class="bg-white w-full max-w-2xl rounded-3xl p-8 shadow-2xl">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-7">

                <div>

                    <h2 class="text-3xl font-bold text-gray-800">
                        Edit Ruangan
                    </h2>

                    <p class="text-gray-500 mt-1">
                        Update data ruangan dan status penggunaan
                    </p>

                </div>





                <!-- CLOSE -->
                <button onclick="closeEditModal()"
                        class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-red-100 hover:text-red-600 transition">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>





            <!-- FORM -->
            <form class="space-y-6">

                <!-- RUANGAN -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Ruangan
                    </label>

                    <input
                        type="text"
                        value="LAB INFORMATIKA 1"
                        class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                </div>





                <!-- KELAS -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kelas
                    </label>

                    <input
                        type="text"
                        value="TI-1A"
                        class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                </div>





                <!-- STATUS -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Status
                    </label>

                    <select
                        class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                        <option>
                            Kosong
                        </option>

                        <option selected>
                            Digunakan
                        </option>

                    </select>

                </div>





                <!-- BUTTON -->
                <div class="flex gap-4 pt-3">

                    <!-- CANCEL -->
                    <button
                        type="button"
                        onclick="closeEditModal()"
                        class="flex-1 h-[54px] rounded-2xl bg-gray-100 hover:bg-gray-200 transition font-semibold text-gray-700">

                        Cancel

                    </button>





                    <!-- UPDATE -->
                    <button
                        type="button"
                        onclick="confirmUpdate()"
                        class="flex-1 h-[54px] rounded-2xl bg-blue-600 hover:bg-blue-700 transition text-white font-semibold shadow-lg shadow-blue-200">

                        Update Data

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





function openDeleteModal() {

    document.getElementById('modalDelete')
        .classList.remove('hidden');

    document.getElementById('modalDelete')
        .classList.add('flex');
}

function closeDeleteModal() {

    document.getElementById('modalDelete')
        .classList.add('hidden');

    document.getElementById('modalDelete')
        .classList.remove('flex');
}





function openEditModal() {

    document.getElementById('modalEdit')
        .classList.remove('hidden');

    document.getElementById('modalEdit')
        .classList.add('flex');
}

function closeEditModal() {

    document.getElementById('modalEdit')
        .classList.add('hidden');

    document.getElementById('modalEdit')
        .classList.remove('flex');
}





function confirmUpdate() {

    alert('Apakah anda yakin untuk update data?');
}

</script>

@endsection