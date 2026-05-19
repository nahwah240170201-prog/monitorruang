@extends('layouts.admin')

@section('content')

<div class="p-8">

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





        <!-- BUTTON -->
        <button
            class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 h-[52px] rounded-2xl font-semibold shadow-lg shadow-blue-200">

            + Tambah Data

        </button>

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

</div>

@endsection