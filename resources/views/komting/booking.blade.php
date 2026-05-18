@extends('layouts.komting')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-7">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Booking Ruangan
        </h1>

        <p class="text-gray-500 mt-1">
            Booking ruangan kosong untuk kebutuhan kelas dan perkuliahan
        </p>

    </div>

</div>





<div class="grid grid-cols-3 gap-6">

    <!-- FORM -->
    <div class="col-span-2 bg-white rounded-3xl shadow-sm p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-7">
            Form Booking
        </h2>

        <form action="#" method="POST" class="space-y-6">

            @csrf

            <!-- JENIS BOOKING -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Jenis Booking
                </label>

                <select
                    id="jenisBooking"
                    onchange="toggleBookingFields()"
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                    <option value="">
                        Pilih Jenis Booking
                    </option>

                    <option value="pergantian">
                        Pergantian Mata Kuliah
                    </option>

                    <option value="seminar">
                        Seminar
                    </option>

                    <option value="rapat">
                        Rapat
                    </option>

                    <option value="workshop">
                        Workshop
                    </option>

                    <option value="lainnya">
                        Lainnya
                    </option>

                </select>

            </div>





            <!-- FIELD PERGANTIAN -->
            <div id="fieldPergantian" class="hidden space-y-6">

                <!-- MATKUL -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Mata Kuliah
                    </label>

                    <select
                        class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                        <option>
                            Pilih Mata Kuliah
                        </option>

                        @foreach(json_decode(Auth::user()->mata_kuliah ?? '[]') as $matkul)

                            <option>
                                {{ $matkul }}
                            </option>

                        @endforeach

                    </select>

                </div>





                <!-- KELAS -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kelas
                    </label>

                    <input
                        type="text"
                        value="{{ Auth::user()->kelas }}"
                        readonly
                        class="w-full h-[56px] rounded-2xl border border-gray-200 bg-gray-100 px-5">

                </div>

            </div>





            <!-- FIELD ALASAN -->
            <div id="fieldAlasan" class="hidden">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Alasan Booking
                </label>

                <input
                    type="text"
                    placeholder="Contoh: Seminar, rapat organisasi, workshop, dll"
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

            </div>





            <!-- HARI -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Hari
                </label>

                <select
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>

                </select>

            </div>





            <!-- JAM -->
            <div class="grid grid-cols-2 gap-5">

                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Jam Mulai
                    </label>

                    <input
                        type="time"
                        class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                </div>





                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Jam Selesai
                    </label>

                    <input
                        type="time"
                        class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                </div>

            </div>





            <!-- RUANGAN -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Pilih Ruangan
                </label>

                <select
                    class="w-full h-[56px] rounded-2xl border border-gray-200 bg-[#f9fbff] px-5 focus:outline-none focus:border-blue-500">

                    <option>LAB INFORMATIKA 1</option>
                    <option>LAB INFORMATIKA 2</option>
                    <option>RUANG KULIAH III</option>

                </select>

            </div>





            <!-- CATATAN -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Catatan
                </label>

                <textarea
                    rows="4"
                    placeholder="Tambahkan catatan booking..."
                    class="w-full rounded-2xl border border-gray-200 bg-[#f9fbff] p-5 focus:outline-none focus:border-blue-500"></textarea>

            </div>





            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full h-[56px] rounded-2xl bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold hover:scale-[1.01] transition shadow-lg shadow-blue-200">

                Booking Ruangan

            </button>

        </form>

    </div>





    <!-- SIDE -->
    <div class="space-y-6">

        <!-- INFO -->
        <div class="bg-white rounded-3xl shadow-sm p-6">

            <h2 class="text-2xl font-bold text-gray-800 mb-5">
                Informasi Komting
            </h2>

            <div class="space-y-4">

                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Nama
                    </span>

                    <span class="font-semibold">
                        {{ Auth::user()->nama }}
                    </span>

                </div>





                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Kelas
                    </span>

                    <span class="font-semibold text-blue-600">
                        {{ Auth::user()->kelas }}
                    </span>

                </div>





                <div class="flex justify-between">

                    <span class="text-gray-500">
                        Semester
                    </span>

                    <span class="font-semibold text-green-500">
                        {{ Auth::user()->semester }}
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>





<script>

function toggleBookingFields() {

    const jenis =
        document.getElementById('jenisBooking').value;

    const fieldPergantian =
        document.getElementById('fieldPergantian');

    const fieldAlasan =
        document.getElementById('fieldAlasan');





    if (jenis === 'pergantian') {

        fieldPergantian.classList.remove('hidden');
        fieldAlasan.classList.add('hidden');

    } else if (jenis !== '') {

        fieldPergantian.classList.add('hidden');
        fieldAlasan.classList.remove('hidden');

    } else {

        fieldPergantian.classList.add('hidden');
        fieldAlasan.classList.add('hidden');

    }

}

</script>

@endsection