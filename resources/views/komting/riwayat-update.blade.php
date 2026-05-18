@extends('layouts.komting')

@section('content')

<div class="flex justify-between items-center mb-7">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Riwayat Update Ruangan
        </h1>

        <p class="text-gray-500 mt-1">
            Riwayat perubahan status ruangan perkuliahan
        </p>

    </div>

</div>





<div class="bg-white rounded-3xl shadow-sm p-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-7">
        Riwayat Update
    </h2>





    <div class="space-y-8">

        @forelse($riwayat as $item)

        <div class="flex gap-5">

            @if($item->status == 'Digunakan')

                <div class="w-1 rounded-full bg-blue-500"></div>

            @elseif($item->status == 'Kosong')

                <div class="w-1 rounded-full bg-green-500"></div>

            @else

                <div class="w-1 rounded-full bg-red-500"></div>

            @endif





            <div>

                <h3 class="text-2xl font-bold text-gray-800">

                    {{ $item->mata_kuliah }} - {{ $item->kelas }}

                </h3>





                <p class="text-gray-500 text-lg mt-1">

                    Status diubah menjadi

                    @if($item->status == 'Digunakan')

                        <span class="text-blue-600 font-medium">
                            Digunakan
                        </span>

                    @elseif($item->status == 'Kosong')

                        <span class="text-green-600 font-medium">
                            Kosong
                        </span>

                    @else

                        <span class="text-red-600 font-medium">
                            Dibatalkan
                        </span>

                    @endif

                </p>





                <p class="text-gray-400 mt-2">

                    {{ $item->updated_at->diffForHumans() }}

                </p>

            </div>

        </div>

        @empty

        <div class="text-center py-10 text-gray-400">

            Belum ada riwayat update

        </div>

        @endforelse

    </div>

</div>

@endsection