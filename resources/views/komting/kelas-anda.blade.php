@extends('layouts.komting')

@section('content')

<div class="flex justify-between items-center mb-7">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Kelas Anda
        </h1>

        <p class="text-gray-500 mt-1">
            Informasi kelas dan mata kuliah komting
        </p>

    </div>

</div>





<div class="bg-white rounded-3xl shadow-sm p-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-7">
        Detail Kelas
    </h2>





    <div class="grid grid-cols-3 gap-6 mb-8">

        <!-- KELAS -->
        <div class="bg-blue-50 rounded-2xl p-6">

            <p class="text-gray-500 text-sm mb-2">
                Kelas
            </p>

            <h2 class="text-3xl font-bold text-blue-600">

                {{ Auth::user()->kelas }}

            </h2>

        </div>





        <!-- SEMESTER -->
        <div class="bg-green-50 rounded-2xl p-6">

            <p class="text-gray-500 text-sm mb-2">
                Semester
            </p>

            <h2 class="text-3xl font-bold text-green-600">

                {{ Auth::user()->semester }}

            </h2>

        </div>





        <!-- TOTAL MATKUL -->
        <div class="bg-red-50 rounded-2xl p-6">

            <p class="text-gray-500 text-sm mb-2">
                Total Mata Kuliah
            </p>

            <h2 class="text-3xl font-bold text-red-600">

                {{ count(json_decode(Auth::user()->mata_kuliah ?? '[]')) }}

            </h2>

        </div>

    </div>





    <div>

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Mata Kuliah
        </h2>





        <div class="space-y-4">

            @forelse(json_decode(Auth::user()->mata_kuliah ?? '[]') as $matkul)

            <div class="bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4">

                <p class="text-lg font-semibold text-gray-700">

                    {{ $matkul }}

                </p>

            </div>

            @empty

            <div class="text-center py-10 text-gray-400">

                Belum ada mata kuliah

            </div>

            @endforelse

        </div>

    </div>

</div>

@endsection