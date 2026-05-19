@extends('layouts.admin')

@section('content')

<div class="p-8">

    <!-- HEADER -->
   <!-- HEADER -->
<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-gray-800">
            Data Mata Kuliah
        </h1>

        <p class="text-gray-500 mt-2">
            Kelola data mata kuliah dan dosen pengampu.
        </p>

    </div>





    <!-- RIGHT ACTION -->
    <div class="flex items-center gap-4">

        <!-- SEARCH -->
        <div class="relative">

            <input
                type="text"
                placeholder="Cari mata kuliah..."
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

            + Tambah Data

        </button>

    </div>

</div>





    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <!-- HEAD -->
                <thead class="bg-gray-50 border-b border-gray-100">

                    <tr class="text-left text-gray-500 text-sm">

                        <th class="px-6 py-5">No</th>
                        <th class="px-6 py-5">Semester</th>
                        <th class="px-6 py-5">Kelas</th>
                        <th class="px-6 py-5">Mata Kuliah</th>
                        <th class="px-6 py-5">Dosen</th>
                        <th class="px-6 py-5">SKS</th>
                        <th class="px-6 py-5 text-center">Aksi</th>

                    </tr>

                </thead>





                <!-- BODY -->
                <tbody>

                    <!-- DATA -->
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition">

                        <td class="px-6 py-5">
                            1
                        </td>

                        <td class="px-6 py-5">

                            <span class="bg-purple-50 text-purple-600 px-4 py-2 rounded-xl text-sm font-medium">
                                Semester 4
                            </span>

                        </td>

                        <td class="px-6 py-5">
                            A1
                        </td>

                        <td class="px-6 py-5 font-semibold text-gray-700">
                            Pemrograman Web Lanjut
                        </td>

                        <td class="px-6 py-5">
                            Fulan, S.Kom
                        </td>

                        <td class="px-6 py-5">

                            <span class="bg-blue-50 text-blue-600 px-4 py-2 rounded-xl text-sm font-medium">
                                3 SKS
                            </span>

                        </td>





                        <!-- AKSI -->
                        <td class="px-6 py-5">

                            <div class="flex items-center justify-center gap-3">

                                <!-- EDIT -->
                                <button
                                    class="w-10 h-10 rounded-xl bg-yellow-50 text-yellow-600 hover:bg-yellow-100 transition">

                                    <i class="fa-solid fa-pen"></i>

                                </button>





                                <!-- DELETE -->
                                <button
                                    class="w-10 h-10 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </div>

                        </td>

                    </tr>





                    <!-- EMPTY -->
                    {{-- 
                    <tr>

                        <td colspan="7"
                            class="text-center py-12 text-gray-400">

                            Belum ada data mata kuliah.

                        </td>

                    </tr>
                    --}}

                </tbody>

            </table>

        </div>

    </div>
    <!-- MODAL -->
<div id="modalTambah"
     class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-2xl rounded-3xl p-8 shadow-2xl">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-7">

            <div>

                <h2 class="text-3xl font-bold text-gray-800">
                    Tambah Mata Kuliah
                </h2>

                <p class="text-gray-500 mt-1">
                    Tambahkan data mata kuliah dan dosen pengampu
                </p>

            </div>





            <!-- CLOSE -->
            <button onclick="closeModal()"
                    class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-red-100 hover:text-red-600 transition">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>





        <!-- FORM -->
        <form class="space-y-6">

            <!-- SEMESTER -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Semester
                </label>

                <select
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                    <option>
                        Pilih Semester
                    </option>

                    <option>
                        Semester 2
                    </option>

                    <option>
                        Semester 4
                    </option>

                    <option>
                        Semester 6
                    </option>

                    <option>
                        Semester 8
                    </option>

                </select>

            </div>





            <!-- KELAS -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Kelas
                </label>

                <input
                    type="text"
                    placeholder="Contoh: A1"
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

            </div>





            <!-- MATA KULIAH -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Mata Kuliah
                </label>

                <input
                    type="text"
                    placeholder="Masukkan mata kuliah"
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

            </div>





            <!-- DOSEN -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Dosen
                </label>

                <input
                    type="text"
                    placeholder="Masukkan nama dosen"
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

            </div>





            <!-- SKS -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    SKS
                </label>

                <select
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                    <option>
                        Pilih SKS
                    </option>

                    <option>
                        2 SKS
                    </option>

                    <option>
                        3 SKS
                    </option>

                    <option>
                        4 SKS
                    </option>

                </select>

            </div>





            <!-- BUTTON -->
            <div class="flex gap-4 pt-3">

                <button
                    type="button"
                    onclick="closeModal()"
                    class="flex-1 h-[54px] rounded-2xl bg-gray-100 hover:bg-gray-200 transition font-semibold text-gray-700">

                    Batal

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