@extends('layouts.admin')

@section('content')

<div class="p-8">

    <!-- TITLE -->
    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-800">
            Data Komting
        </h1>

        <p class="text-gray-500 mt-2">
            Daftar pengguna yang sudah melakukan register.
        </p>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-sm overflow-hidden border border-gray-100">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50 border-b border-gray-100">

                    <tr class="text-left text-gray-500 text-sm">

                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">NIM</th>
                        <th class="px-6 py-4">Semester</th>
                        <th class="px-6 py-4">Mata Kuliah</th>
                        <th class="px-6 py-4">Kelas</th>
                        <th class="px-6 py-4">Register</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($users as $user)

                    <tr class="border-b border-gray-100 hover:bg-gray-50">

                        <td class="px-6 py-5">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-5 font-semibold text-gray-700">
                            {{ $user->nama }}
                        </td>

                        <td class="px-6 py-5">
                            {{ $user->nim_nidn }}
                        </td>

                        <td class="px-6 py-5">
                            Semester {{ $user->semester }}
                        </td>

                        <td class="px-6 py-5">

                            @php
                                $matkul = json_decode($user->matkul, true);
                            @endphp

                            @if($matkul)

                                <div class="flex flex-wrap gap-2">

                                    @foreach($matkul as $item)

                                        <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-xl text-xs">
                                            {{ $item }}
                                        </span>

                                    @endforeach

                                </div>

                            @endif

                        </td>

                        <td class="px-6 py-5">

                            @php
                                $kelas = json_decode($user->kelas, true);
                            @endphp

                            @if($kelas)

                                <div class="flex flex-wrap gap-2">

                                    @foreach($kelas as $mk => $kls)

                                        <span class="bg-green-50 text-green-600 px-3 py-1 rounded-xl text-xs">
                                            {{ $kls }}
                                        </span>

                                    @endforeach

                                </div>

                            @endif

                        </td>

                        <td class="px-6 py-5 text-gray-500 text-sm">
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-12 text-gray-400">

                            Belum ada data.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection