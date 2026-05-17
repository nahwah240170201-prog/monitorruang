@extends('layouts.auth')

@section('content')

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="min-h-screen flex items-center justify-center px-5 py-8 bg-[#fafafa]">

    <div class="w-full max-w-[520px]
                bg-white
                rounded-[32px]
                shadow-xl shadow-blue-100/40
                border border-gray-100
                px-10 py-12">

        <!-- LOGO -->
        <div class="flex justify-center mb-4">

            <div class="w-[78px] h-[78px]
                        rounded-[26px]
                        bg-gradient-to-br from-blue-500 to-blue-700
                        flex items-center justify-center
                        text-white text-[32px]
                        shadow-lg shadow-blue-200">

                <i class="fa-solid fa-layer-group"></i>

            </div>

        </div>

        <!-- TITLE -->
        <div class="text-center mb-10">

            <h1 class="text-[45px] font-bold text-blue-800 mb-2">
                Register
            </h1>

            <p class="text-gray-500 text-[15px] leading-relaxed">
                Buat akun untuk mengakses sistem monitoring ruang dan laboratorium informatika.
            </p>

        </div>

        {{-- ERROR --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-600 p-3 rounded-2xl mb-5">
                {{ session('error') }}
            </div>
        @endif

        <form action="/register" method="POST" class="space-y-6">
            @csrf

            <!-- NAMA -->
            <div>

                <label class="block text-[15px] font-semibold mb-2 text-gray-700">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    required
                    placeholder="Masukkan Nama"
                    class="w-full h-[56px]
                           rounded-2xl
                           border border-gray-200
                           bg-[#f9fbff]
                           px-5
                           text-[15px]
                           focus:outline-none
                           focus:border-blue-500
                           focus:bg-white
                           transition"
                >

            </div>

            <!-- NIM -->
            <div>

                <label class="block text-[15px] font-semibold mb-2 text-gray-700">
                    NIM
                </label>

                <input
                    type="text"
                    name="nim_nidn"
                    required
                    placeholder="Masukkan NIM"
                    class="w-full h-[56px]
                           rounded-2xl
                           border border-gray-200
                           bg-[#f9fbff]
                           px-5
                           text-[15px]
                           focus:outline-none
                           focus:border-blue-500
                           focus:bg-white
                           transition"
                >

            </div>

            <!-- PASSWORD -->
            <div>

                <label class="block text-[15px] font-semibold mb-2 text-gray-700">
                    Password
                </label>

                <div class="relative">

                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        placeholder="Masukkan Password"
                        class="w-full h-[56px]
                               rounded-2xl
                               border border-gray-200
                               bg-[#f9fbff]
                               px-5 pr-14
                               text-[15px]
                               focus:outline-none
                               focus:border-blue-500
                               focus:bg-white
                               transition"
                    >

                    <button
                        type="button"
                        onclick="togglePassword()"
                        class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-blue-600 transition"
                    >

                        <i id="eyeIcon" class="fa-regular fa-eye"></i>

                    </button>

                </div>

            </div>

            <!-- SEMESTER -->
            <div>

                <label class="block text-[15px] font-semibold mb-2 text-gray-700">
                    Semester
                </label>

                <select
                    id="semester"
                    name="semester"
                    onchange="updateKelas()"
                    class="w-full h-[56px]
                           rounded-2xl
                           border border-gray-200
                           bg-[#f9fbff]
                           px-5
                           text-[15px]
                           text-gray-500
                           focus:outline-none
                           focus:border-blue-500
                           focus:bg-white
                           transition"
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

                <label class="block text-[15px] font-semibold mb-3 text-gray-700">
                    Mata Kuliah
                </label>

                <div class="border border-gray-200 rounded-2xl bg-[#f9fbff] px-4 pt-4 pb-5 max-h-[320px] overflow-y-auto">

                    <div id="matkulContainer"
                         class="grid grid-cols-1 gap-3">

                    </div>

                </div>

            </div>

            <!-- KELAS -->
            <div>

                <label class="block text-[15px] font-semibold mb-3 text-gray-700">
                    Pilih Kelas
                </label>

                <div class="border border-gray-200 rounded-2xl bg-[#f9fbff] px-4 pt-4 pb-5">

                    <div id="kelasContainer"
                         class="space-y-4">

                    </div>

                </div>

            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full h-[56px]
                       rounded-2xl
                       bg-gradient-to-r from-blue-600 to-blue-700
                       hover:scale-[1.01]
                       transition
                       text-white
                       text-[16px]
                       font-semibold
                       shadow-lg shadow-blue-200"
            >

                Register

            </button>

        </form>

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
            "PENGOLAHAN SUARA"
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
                flex items-center gap-3
                border border-gray-300
                rounded-xl
                px-4 py-3
                cursor-pointer
                hover:bg-blue-50
                text-sm
                bg-white
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

            <div class="border border-gray-300 rounded-2xl p-4 bg-white">

                <h3 class="font-semibold text-blue-600 mb-4">
                    ${matkul}
                </h3>

                <div class="grid grid-cols-3 gap-3">
        `;

        kelas.forEach(function(item) {

            kelasHTML += `

                <label class="
                    flex items-center gap-2
                    border border-gray-300
                    rounded-xl
                    px-3 py-3
                    cursor-pointer
                    hover:bg-blue-50
                    text-sm
                    bg-[#f9fbff]
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