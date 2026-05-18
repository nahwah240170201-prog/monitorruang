@extends('layouts.komting')

@section('content')

<div class="flex min-h-screen bg-gray-100">

    <!-- CONTENT -->
    <main class="flex-1 p-8">

        <div class="bg-white rounded-3xl shadow-sm p-8">

            <div class="mb-8">

                <h1 class="text-4xl font-bold">
                    Daftar Ruangan
                </h1>

                <p class="text-gray-500 mt-2">
                    Status realtime ruang kelas dan laboratorium informatika.
                </p>

            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="border-b text-left text-gray-500">

                            <th class="py-4">No</th>
                            <th>Ruangan</th>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($ruangan as $item)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->ruangan }}
                            </td>

                            <td>
                                {{ $item->mata_kuliah ?? '-' }}
                            </td>

                            <td>
                                {{ $item->kelas ?? '-' }}
                            </td>

                            <td>

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

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>

@endsection