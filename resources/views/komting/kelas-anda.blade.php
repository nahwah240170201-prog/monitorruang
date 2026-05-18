@extends('layouts.komting')

@section('content')

<div class="flex justify-between items-center mb-7">

    <div>

        <h1 class="text-4xl font-bold text-gray-800">
            Kelas Anda
        </h1>

        <p class="text-gray-500 mt-2 text-lg">
            Informasi kelas dan mata kuliah yang Anda kelola.
        </p>

    </div>

</div>





<div class="bg-white rounded-[32px] shadow-sm border border-gray-100 p-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-800">
                Daftar Mata Kuliah
            </h2>

        </div>





        

    </div>





    <!-- TABLE -->
    <div class="overflow-hidden rounded-3xl border border-gray-100">

        <table class="w-full">

            <!-- HEAD -->
            <thead class="bg-[#f7f9ff]">

                <tr class="text-left text-gray-500">

                    <th class="px-7 py-5 font-semibold">
                        No
                    </th>

                    <th class="py-5 font-semibold">
                        Mata Kuliah
                    </th>

                    <th class="py-5 font-semibold text-[20px]">
                        Kelas
                    </th>

                    <th class="py-5 font-semibold text-[20px]">
                        Semester
                    </th>

                    <th class="py-5 font-semibold text-[20px]">
                        Status
                    </th>

                    <th class="py-5 font-semibold text-[20px] text-center">
                        Aksi
                    </th>

                </tr>

            </thead>





            <!-- BODY -->
            <tbody class="bg-white">

                @forelse(json_decode(Auth::user()->mata_kuliah ?? '[]') as $index => $matkul)

                <tr class="border-t border-gray-100 hover:bg-gray-50 transition">

                    <!-- NO -->
                    <td class="px-7 py-6 font-semibold text-gray-700">

                        {{ $index + 1 }}

                    </td>





                    <!-- MATKUL -->
                    <td class="py-6">

                        <h3 class="text-[22px] font-bold text-gray-800 uppercase">

                            {{ $matkul }}

                        </h3>

                    </td>





                    <!-- KELAS -->
                    <td class="py-6">

                        <span class="bg-blue-100 text-blue-600 font-semibold px-4 py-2 rounded-xl">

                            {{ Auth::user()->kelas }}

                        </span>

                    </td>





                    <!-- SEMESTER -->
                    <td class="py-6">

                        <span class="bg-green-100 text-green-600 font-semibold px-4 py-2 rounded-xl">

                            {{ Auth::user()->semester }}

                        </span>

                    </td>





                    <!-- STATUS -->
                    <td class="py-6">

                        <span class="bg-green-100 text-green-600 font-semibold px-4 py-2 rounded-xl inline-flex items-center gap-2">

                            <div class="w-2 h-2 rounded-full bg-green-500"></div>

                            Aktif

                        </span>

                    </td>





                    <!-- AKSI -->
                    <td class="py-6 text-center">

                        <a href="{{ route('update.status') }}"
                           class="inline-flex items-center gap-3 bg-[#f5f7ff] hover:bg-blue-50 text-blue-600 font-semibold px-5 py-3 rounded-2xl transition">

                            <i class="fa-solid fa-pen-to-square"></i>

                            <span>Update Status</span>

                            <i class="fa-solid fa-angle-right text-sm"></i>

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center py-16 text-gray-400 text-lg">

                        Belum ada mata kuliah

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>





    <!-- FOOTER -->
    <div class="flex justify-between items-center mt-7">

        <p class="text-gray-500 text-lg">

            Total
            {{ count(json_decode(Auth::user()->mata_kuliah ?? '[]')) }}
            mata kuliah

        </p>





        <a href="{{ route('update.status') }}"
           class="text-blue-600 font-semibold hover:text-blue-700 transition">

            Kelola Update Kelas →

        </a>

    </div>

</div>

@endsection