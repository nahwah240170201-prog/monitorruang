@extends('layouts.app')

@section('content')

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="min-h-screen p-3">

    <!-- BORDER LUAR -->
    <div class="w-full min-h-[97vh] flex overflow-hidden rounded-3xl">

        <!-- LEFT -->
        <div class="w-[41%] bg-[#eef2ff] relative px-10 py-10">

            <!-- Rectangle belakang -->
            <div class="absolute bottom-0 left-0 w-full h-[90px] bg-[#dde5ff]"></div>

            <div class="relative z-10">

                <!-- Heading -->
                <div class="max-w-[400px]">

                    <h2 class="text-[34px] leading-[44px] font-bold text-black mb-5">
                        Pantau Penggunaan Ruang &
                        Laboratorium Informatika
                        Secara Realtime
                    </h2>

                    <p class="text-[16px] text-gray-700 leading-[28px] mb-14">
                        Daftarkan akun Anda untuk mengelola status penggunaan
                        ruang kelas secara realtime
                    </p>

                </div>

                <!-- Info -->
                <div class="space-y-8">

                    <div>
                        <h3 class="font-semibold text-[18px] mb-1">
                            Data Akurat
                        </h3>

                        <p class="text-gray-700 text-[15px] leading-[26px]">
                            Status ruangan diperbarui otomatis setiap 30 detik
                        </p>
                    </div>

                    <div>
                        <h3 class="font-semibold text-[18px] mb-1">
                            Akses Mudah
                        </h3>

                        <p class="text-gray-700 text-[15px] leading-[26px]">
                            Mahasiswa dapat melihat informasi tanpa perlu login
                        </p>
                    </div>

                    <div>
                        <h3 class="font-semibold text-[18px] mb-1">
                            Aman & Terpercaya
                        </h3>

                        <p class="text-gray-700 text-[15px] leading-[26px]">
                            Data dijaga dengan aman dan dapat diandalkan
                        </p>
                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex-1 bg-[#fafafa] flex items-center justify-center px-8 py-10">

            <div class="bg-white w-full max-w-md rounded-3xl shadow-lg p-8">

                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-blue-600">
                        REGISTER
                    </h1>
                </div>

                {{-- ERROR --}}
                @if(session('error'))
                    <div class="bg-red-100 text-red-600 p-3 rounded-xl mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="/register" method="POST" class="space-y-5">
                    @csrf

                    <!-- NAMA -->
                    <div>
                        <label class="block mb-2 font-semibold">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="nama"
                            required
                            placeholder="Masukkan Nama"
                            class="w-full h-[54px] border border-gray-300 rounded-xl px-4 text-[15px] placeholder:text-gray-400 focus:outline-none focus:border-blue-500"
                        >
                    </div>

                    <!-- NIM -->
                    <div>
                        <label class="block mb-2 font-semibold">
                            NIM
                        </label>

                        <input
                            type="text"
                            name="nim_nidn"
                            required
                            placeholder="Masukkan NIM"
                            class="w-full h-[54px] border border-gray-300 rounded-xl px-4 text-[15px] placeholder:text-gray-400 focus:outline-none focus:border-blue-500"
                        >
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="block mb-2 font-semibold">
                            Password
                        </label>

                        <div class="relative">

                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                placeholder="Masukkan Password"
                                class="w-full h-[54px] border border-gray-300 rounded-xl px-4 pr-12 text-[15px] placeholder:text-gray-400 focus:outline-none focus:border-blue-500"
                            >

                            <!-- Eye Icon -->
                            <button 
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"
                            >
                                <i id="eyeIcon" class="fa-solid fa-eye"></i>
                            </button>

                        </div>
                    </div>

                    <!-- SEMESTER -->
                    <div>
                        <label class="block mb-2 font-semibold">
                            Semester
                        </label>

                        <select
                            id="semester"
                            name="semester"
                            onchange="updateKelas()"
                            class="w-full h-[54px] border border-gray-300 rounded-xl px-4 py-3 text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        >

                            <option value="">
                                -- Pilih Semester --
                            </option>

                            <option value="2">Semester 2</option>
                            <option value="4">Semester 4</option>
                            <option value="6">Semester 6</option>
                            <option value="8">Semester 8</option>

                        </select>
                    </div>

                    <!-- MATA KULIAH -->
                    <div>
                        <label class="block mb-3 font-semibold">
                            Mata Kuliah
                        </label>

                        <div class="border border-gray-300 rounded-xl px-4 pt-3 pb-4">

                            <div id="matkulContainer"
                                 class="grid grid-cols-1 gap-3 mb-3">

                            </div>

                        </div>
                    </div>

                    <!-- KELAS -->
                    <div class="mt-5">

                        <label class="block mb-3 font-semibold">
                            Pilih Kelas
                        </label>

                        <div class="border border-gray-300 rounded-xl px-4 pt-3 pb-4">

                            <div id="kelasContainer"
                                class="space-y-4">

                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition"
                    >
                        Register
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword() {

    const passwordInput = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");

    if (passwordInput.type === "password") {

        passwordInput.type = "text";

        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");

    } else {

        passwordInput.type = "password";

        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}

function updateKelas() {

    const semester = document.getElementById("semester").value;
    const container = document.getElementById("matkulContainer");

    container.innerHTML = "";

    let daftarMatkul = [];

    if (semester === "2") {

        daftarMatkul = [
            "ALGORITMA DAN STRUKTUR DATA I",
            "ALJABAR LINIER ELEMENTER",
            "ANALISIS DAN PERANCANGAN SISTEM",
            "KEMALKUSSALEHAN",
            "KEWARGANEGARAAN",
            "LOGIKA INFORMATIKA",
            "MATEMATIKA DISKRET",
            "TEKNOLOGI INFORMASI DAN KEWIRAUSAHAAN"
        ];
    }

    else if (semester === "4") {

        daftarMatkul = [
            "Data Mining",
            "Desain dan Analsis Algoritma",
            "Human Computer Interaction",
            "Internet Of Things",
            "Jaringan Komputer Fundamental",
            "Pemrograman Basis Data",
            "Pemrograman Web Lanjut"
        ];
    }

    else if (semester === "6") {

        daftarMatkul = [
            "BIG DATA",
            "FORENSIKA DIGITAL",
            "KECERDASAN KOMPUTASIONAL",
            "METODOLOGI PENELITIAN",
            "NATURAL LANGUAGE PROCESSING",
            "PENGOLAHAN SUARA",
        ];
    }

    else if (semester === "8") {

        daftarMatkul = [
            "Skripsi"
        ];
    }

    daftarMatkul.forEach(function(item) {

        container.innerHTML += `

            <label class="
                flex items-center gap-2
                border border-gray-300
                rounded-lg
                px-3 py-2
                cursor-pointer
                hover:bg-blue-50
                text-sm
            ">

                <input
                    type="checkbox"
                    name="matkul[]"
                    value="${item}"
                    onchange="updateKelasByMatkul()"
                    class="w-4 h-4 accent-blue-600"
                >

                <span class="text-gray-700 font-medium">
                    ${item}
                </span>

            </label>

        `;
    });

    document.getElementById("kelasContainer").innerHTML = "";
}

function updateKelasByMatkul() {

    const checkedMatkul = document.querySelectorAll('input[name="matkul[]"]:checked');

    const container = document.getElementById("kelasContainer");

    container.innerHTML = "";

    checkedMatkul.forEach(function(matkulItem) {

        const matkul = matkulItem.value;

        let kelas = [];

        if (matkul === "ALGORITMA DAN STRUKTUR DATA I") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6", "A7"];
        }

        else if (matkul === "ALJABAR LINIER ELEMENTER") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6", "A7"];
        }

        else if (matkul === "ANALISIS DAN PERANCANGAN SISTEM") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6", "A7"];
        }

        else if (matkul === "KEMALKUSSALEHAN") {
            kelas = ["A1", "A2", "A3"];
        }

        else if (matkul === "KEWARGANEGARAAN") {
            kelas = ["A1", "A2", "A3"];
        }

        else if (matkul === "LOGIKA INFORMATIKA") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6", "A7"];
        }

        else if (matkul === "MATEMATIKA DISKRET") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9"];
        }

        else if (matkul === "TEKNOLOGI INFORMASI DAN KEWIRAUSAHAAN") {
            kelas = ["A1", "A2", "A3"];
        }

        else if (matkul === "Data Mining") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9"];
        }

        else if (matkul === "Desain dan Analsis Algoritma") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6"];
        }

        else if (matkul === "Human Computer Interaction") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6"];
        }

        else if (matkul === "Internet Of Things") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9"];
        }

        else if (matkul === "Jaringan Komputer Fundamental") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6"];
        }

        else if (matkul === "Pemrograman Basis Data") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6"];
        }

        else if (matkul === "Pemrograman Web Lanjut") {
            kelas = ["A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9"];
        }

        else if (matkul === "BIG DATA") {
            kelas = ["A1", "A2", "A3"];
        }

        else if (matkul === "FORENSIKA DIGITAL") {
            kelas = ["A1", "A2", "A3"];
        }

        else if (matkul === "KECERDASAN KOMPUTASIONAL") {
            kelas = ["A1", "A2", "A3", "A4", "A5"];
        }

        else if (matkul === "METODOLOGI PENELITIAN") {
            kelas = ["A1", "A2", "A3", "A4"];
        }

        else if (matkul === "NATURAL LANGUAGE PROCESSING") {
            kelas = ["A1", "A2", "A3", "A4", "A5"];
        }

        else if (matkul === "PENGOLAHAN SUARA") {
            kelas = ["A1", "A2", "A3", "A4", "A5"];
        }

        else if (matkul === "Skripsi") {
            kelas = ["A1"];
        }

        

        let kelasHTML = `

            <div class="border border-gray-300 rounded-xl p-4">

                <h3 class="font-semibold text-blue-600 mb-3">
                    ${matkul}
                </h3>

                <div class="grid grid-cols-3 gap-3">
        `;

        kelas.forEach(function(item) {

            kelasHTML += `

                <label class="
                    flex items-center gap-2
                    border border-gray-300
                    rounded-lg
                    px-3 py-2
                    cursor-pointer
                    hover:bg-blue-50
                    text-sm
                ">

                    <input
                        type="radio"
                        name="kelas[${matkul}]"
                        value="${item}"
                        class="w-4 h-4 accent-blue-600"
                    >

                    <span class="text-gray-700 font-medium">
                        ${item}
                    </span>

                </label>

            `;
        });

        kelasHTML += `
                </div>
            </div>
        `;

        container.innerHTML += kelasHTML;

    });
}

</script>

@endsection