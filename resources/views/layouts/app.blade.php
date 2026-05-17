<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Ruang</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body class="bg-[#f4f7fb] font-sans text-gray-800">

<div class="flex">

    <!-- SIDEBAR -->
    <aside class="fixed left-0 top-0 h-screen w-[255px] bg-white px-5 py-6 border-r border-gray-100">

        <!-- LOGO -->
        <div class="flex items-center gap-3 mb-12">

            <div class="w-[52px] h-[52px] rounded-2xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-[20px] shadow-lg">
                <i class="fa-solid fa-layer-group"></i>
            </div>

            <div>
                <h1 class="text-[24px] font-bold leading-none">
                    MonitorRuang
                </h1>

                <p class="text-[13px] text-gray-500 mt-1">
                    Informatika
                </p>
            </div>

        </div>

        <!-- MENU -->
        <nav class="space-y-2">

            <!-- DASHBOARD -->
            <a href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard')
                ? 'bg-blue-50 text-blue-600 font-semibold shadow-sm'
                : 'text-gray-500 hover:bg-gray-50 hover:text-blue-600'
            }} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

                <i class="fa-solid fa-house"></i>

                <span>Dashboard</span>
            </a>

            <!-- JADWAL -->
            <a href="{{ route('jadwal.index') }}"
            class="{{ request()->routeIs('jadwal.index')
                ? 'bg-blue-50 text-blue-600 font-semibold shadow-sm'
                : 'text-gray-500 hover:bg-gray-50 hover:text-blue-600'
            }} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

                <i class="fa-regular fa-calendar"></i>

                <span>Jadwal Hari Ini</span>
            </a>

            <!-- RUANGAN -->
            <a href="{{ route('daftar.ruangan') }}"
class="{{ request()->routeIs('daftar.ruangan')
    ? 'bg-blue-50 text-blue-600 font-semibold shadow-sm'
    : 'text-gray-500 hover:bg-gray-50 hover:text-blue-600'
}} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

    <i class="fa-solid fa-building"></i>

    <span>Daftar Ruangan</span>

</a>

            <!-- RUANG KOSONG -->
           <a href="{{ route('ruang.kosong') }}"
class="{{ request()->routeIs('ruang.kosong')
    ? 'bg-blue-50 text-blue-600 font-semibold shadow-sm'
    : 'text-gray-500 hover:bg-gray-50 hover:text-blue-600'
}} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

    <i class="fa-regular fa-file-lines"></i>

    <span>Ruang Kosong</span>

</a>
            <!-- TENTANG -->
            <a href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-500 hover:bg-gray-50 hover:text-blue-600 transition duration-200">

                <i class="fa-solid fa-circle-info"></i>

                <span>Tentang</span>
            </a>

        </nav>

        <!-- STATUS -->
        <div class="mt-12">

            <h2 class="text-[12px] font-bold text-gray-400 uppercase tracking-wider mb-5">
                Status Ruangan
            </h2>

            <div class="space-y-4">

                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    <span class="text-[15px] text-gray-600">Kosong</span>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                    <span class="text-[15px] text-gray-600">Digunakan</span>
                </div>


            </div>

        </div>

        <!-- CARD -->
        <div class="mt-12 bg-gradient-to-br from-[#f5f7ff] to-[#eef2ff] rounded-3xl p-5">

            <div class="flex items-center gap-3 mb-4">

                <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png"
                    class="w-14 h-14">

                <div>
                    <h3 class="font-bold text-[15px]">
                        Mahasiswa
                    </h3>

                    <p class="text-[13px] text-gray-500">
                        Public User
                    </p>
                </div>

            </div>

            <p class="text-[13px] text-gray-500 leading-relaxed">
                Anda sedang mengakses sebagai pengguna publik.
            </p>

        </div>

    </aside>

    <!-- MAIN -->
    <div class="ml-[255px] flex-1">

        <!-- NAVBAR -->
        <nav class="sticky top-0 z-40 bg-[#f4f7fb]/90 backdrop-blur-md px-10 py-6">

            <div class="bg-white rounded-3xl px-8 h-[82px] flex items-center justify-between shadow-sm">

                
                 <!-- DATE -->
                <div class="hidden md:flex items-center gap-4
            bg-[#f5f7ff]
            border border-blue-100
            px-5 py-3 rounded-2xl">

    <div class="w-11 h-11 rounded-xl bg-blue-100
                flex items-center justify-center
                text-blue-600">

        <i class="fa-regular fa-calendar-days"></i>

    </div>

    <div>

        <!-- TANGGAL -->
        <div id="tanggalRealtime"
             class="text-[14px] font-semibold text-gray-700">
        </div>

        <!-- JAM -->
        <div id="jamRealtime"
             class="text-[13px] text-gray-500 mt-1">
        </div>

    </div>

</div>
                

                <!-- RIGHT -->
                <div class="flex items-center gap-4">

                    <a href="/login"
                    class="px-6 h-[45px] rounded-2xl bg-[#eef3ff] text-blue-600 font-medium flex items-center hover:bg-blue-100 transition">

                        Login
                    </a>

                    <a href="/register"
                    class="px-7 h-[45px] rounded-2xl bg-blue-600 text-white font-semibold flex items-center shadow-md hover:bg-blue-700 transition">

                        Register
                    </a>

                </div>

            </div>

        </nav>

        <!-- CONTENT -->
        <main class="px-10 pb-10">

            @yield('content')

        </main>

    </div>

</div>
<script>

function updateDateTime() {

    const now = new Date();

    // HARI
    const hari = now.toLocaleDateString('id-ID', {
        weekday: 'long'
    });

    // TANGGAL
    const tanggal = now.toLocaleDateString('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });

    // JAM
    const jam = now.toLocaleTimeString('id-ID', {
        hour: '2-digit',
        minute: '2-digit',
    });

    // TAMPILKAN
    document.getElementById('tanggalRealtime').innerHTML =
        `${hari}, ${tanggal}`;

    document.getElementById('jamRealtime').innerHTML = jam;
}

// JALANKAN PERTAMA
updateDateTime();

// UPDATE TERUS
setInterval(updateDateTime, 1000);

</script>
</body>
</html>