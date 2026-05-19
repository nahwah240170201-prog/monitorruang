@extends('layouts.admin')

@section('content')

<div class="p-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Semester Akademik
            </h1>

            <p class="text-gray-500 mt-2">
                Informasi semester dan kalender akademik perkuliahan.
            </p>

        </div>

    </div>





    <!-- PILIH SEMESTER -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 mb-8">

        <label class="block text-sm font-semibold text-gray-700 mb-3">
            Pilih Semester
        </label>

        <select
            id="semesterSelect"
            onchange="changeSemester()"
            class="w-[300px] h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

            <option value="genap">
                Semester Genap
            </option>

            <option value="ganjil">
                Semester Ganjil
            </option>

        </select>

    </div>





    <!-- CONTENT GENAP -->
    <div id="contentGenap">

        <!-- CARD -->
        <div class="grid grid-cols-4 gap-5 mb-8">

            <div class="bg-blue-50 rounded-3xl p-6">

                <p class="text-blue-600 text-sm mb-2">
                    Semester Aktif
                </p>

                <h2 class="text-3xl font-bold text-blue-700">
                    Genap
                </h2>

            </div>





            <div class="bg-green-50 rounded-3xl p-6">

                <p class="text-green-600 text-sm mb-2">
                    Tahun Akademik
                </p>

                <h2 class="text-3xl font-bold text-green-700">
                    2025/2026
                </h2>

            </div>





            <div class="bg-purple-50 rounded-3xl p-6">

                <p class="text-purple-600 text-sm mb-2">
                    Status
                </p>

                <h2 class="text-3xl font-bold text-purple-700">
                    Aktif
                </h2>

            </div>





            <div class="bg-orange-50 rounded-3xl p-6">

                <p class="text-orange-600 text-sm mb-2">
                    Mata Kuliah
                </p>

                <h2 class="text-3xl font-bold text-orange-700">
                    24
                </h2>

            </div>

        </div>





        <!-- KALENDER -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-8">
                Kalender Akademik
            </h2>

            <div class="space-y-5">

                <div class="flex justify-between items-center border-b pb-4">

                    <div>

                        <h3 class="font-semibold text-gray-800">
                            Awal Perkuliahan
                        </h3>

                        <p class="text-gray-500 text-sm">
                            Semester dimulai
                        </p>

                    </div>

                    <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-xl text-sm font-semibold">
                        12 Februari 2026
                    </span>

                </div>





                <div class="flex justify-between items-center border-b pb-4">

                    <div>

                        <h3 class="font-semibold text-gray-800">
                            Ujian Tengah Semester
                        </h3>

                        <p class="text-gray-500 text-sm">
                            Pelaksanaan UTS
                        </p>

                    </div>

                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl text-sm font-semibold">
                        15 April 2026
                    </span>

                </div>





                <div class="flex justify-between items-center border-b pb-4">

                    <div>

                        <h3 class="font-semibold text-gray-800">
                            Ujian Akhir Semester
                        </h3>

                        <p class="text-gray-500 text-sm">
                            Pelaksanaan UAS
                        </p>

                    </div>

                    <span class="bg-red-100 text-red-600 px-4 py-2 rounded-xl text-sm font-semibold">
                        20 Juni 2026
                    </span>

                </div>





                <div class="flex justify-between items-center">

                    <div>

                        <h3 class="font-semibold text-gray-800">
                            Libur Semester
                        </h3>

                        <p class="text-gray-500 text-sm">
                            Akhir semester
                        </p>

                    </div>

                    <span class="bg-green-100 text-green-600 px-4 py-2 rounded-xl text-sm font-semibold">
                        1 Juli 2026
                    </span>

                </div>

            </div>

        </div>

    </div>





    <!-- CONTENT GANJIL -->
    <div id="contentGanjil" class="hidden">

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-14 text-center">

            <div class="w-24 h-24 mx-auto rounded-full bg-orange-100 flex items-center justify-center text-orange-500 text-5xl mb-6">

                <i class="fa-solid fa-folder-open"></i>

            </div>

            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Semester Ganjil
            </h2>

            <p class="text-gray-500 text-lg leading-relaxed">

                Data semester ganjil belum tersedia. <br>
                Silakan gunakan semester genap terlebih dahulu.

            </p>

        </div>

    </div>

</div>





<script>

function changeSemester() {

    const semester =
        document.getElementById('semesterSelect').value;

    const genap =
        document.getElementById('contentGenap');

    const ganjil =
        document.getElementById('contentGanjil');





    if (semester === 'genap') {

        genap.classList.remove('hidden');
        ganjil.classList.add('hidden');

    }

    else {

        genap.classList.add('hidden');
        ganjil.classList.remove('hidden');

    }

}

</script>

@endsection