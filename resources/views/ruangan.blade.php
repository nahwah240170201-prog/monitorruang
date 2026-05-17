@extends('layouts.app')

@section('content')

<div class="flex min-h-screen bg-gray-100">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg p-5">

        <div>

            <div class="mb-10">

                <h1 class="text-2xl font-bold text-blue-600">
                    MonitorRuang
                </h1>

                <p class="text-gray-500 text-sm">
                    Informatika
                </p>

            </div>


            <!-- MENU -->
            <nav class="space-y-3">

                <a href="/"
                   class="flex items-center gap-3 text-gray-700 hover:bg-gray-100 px-4 py-3 rounded-xl">

                    Dashboard

                </a>


                <a href="/ruangan"
                   class="flex items-center gap-3 bg-blue-100 text-blue-600 px-4 py-3 rounded-xl font-semibold">

                    Daftar Ruangan

                </a>

            </nav>



            <!-- STATUS -->
            <div class="mt-10">

                <h2 class="text-gray-400 text-sm font-bold mb-4 uppercase">
                    Status Ruangan
                </h2>

                <div class="space-y-3">

                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <span>Kosong</span>
                    </div>


                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                        <span>Digunakan</span>
                    </div>

                </div>

            </div>

        </div>

    </aside>



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
                            <th>Nama Ruangan</th>
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

                                @if($item->status == 'Digunakan')

                                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-xl text-sm">
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