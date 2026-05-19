<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body class="bg-[#f4f7fb] font-sans text-gray-800">

<div class="flex">

    <!-- SIDEBAR -->
    <aside class="fixed left-0 top-0 h-screen w-[255px] bg-[#0f172a] px-5 py-6 border-r border-slate-800">

        <!-- LOGO -->
        <div class="flex items-center gap-3 mb-12">

            <div class="w-[52px] h-[52px] rounded-2xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-[20px] shadow-lg">
                <i class="fa-solid fa-layer-group"></i>
            </div>

            <div>
                <h1 class="text-[24px] font-bold leading-none text-white">
                    MonitorRuang
                </h1>

                <p class="text-[13px] text-slate-400 mt-1">
                    Dashboard Admin
                </p>
            </div>

        </div>

       
        <!-- MENU -->
<nav class="space-y-2">

    <!-- DASHBOARD -->
    <a href="{{ route('dashboard.admin') }}"
    class="{{ request()->routeIs('dashboard.admin')
        ? 'bg-cyan-500/15 text-cyan-400 font-semibold'
        : 'text-slate-300 hover:bg-slate-800 hover:text-cyan-400'
    }} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

        <i class="fa-solid fa-house"></i>

        <span>Dashboard</span>

    </a>





   <!-- DATA KOMTING -->
<a href="{{ route('admin.komting') }}"
class="{{ request()->routeIs('admin.komting')
    ? 'bg-cyan-500/15 text-cyan-400 font-semibold'
    : 'text-slate-300 hover:bg-slate-800 hover:text-cyan-400'
}} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

    <i class="fa-solid fa-users"></i>

    <span>Data user</span>

</a>





    <!-- DATA RUANGAN -->
<a href="{{ route('admin.ruangan') }}"
class="{{ request()->routeIs('admin.ruangan')
    ? 'bg-cyan-500/15 text-cyan-400 font-semibold'
    : 'text-slate-300 hover:bg-slate-800 hover:text-cyan-400'
}} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

    <i class="fa-solid fa-building"></i>

    <span>Data Ruangan</span>

</a>

<a href="{{ route('admin.matkul') }}"
class="{{ request()->routeIs('admin.matkul')
    ? 'bg-cyan-500/15 text-cyan-400 font-semibold'
    : 'text-slate-300 hover:bg-slate-800 hover:text-cyan-400'
}} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

    <i class="fa-solid fa-book"></i>

    <span>Data Mata Kuliah</span>

</a>


<!-- MANAJEMEN JADWAL -->
<a href="{{ route('admin.jadwal') }}"
class="{{ request()->routeIs('admin.jadwal')
    ? 'bg-cyan-500/15 text-cyan-400 font-semibold'
    : 'text-slate-300 hover:bg-slate-800 hover:text-cyan-400'
}} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

    <i class="fa-solid fa-calendar-days"></i>

    <span>Manajemen Jadwal</span>

</a>


    <!-- DIVIDER -->
    <div class="pt-4 pb-2">

        <p class="text-[11px] uppercase tracking-widest text-slate-500 font-bold px-4">
            Sistem Akademik
        </p>

    </div>





    
    <!-- SEMESTER AKADEMIK -->
<a href="{{ route('admin.semester') }}"
class="{{ request()->routeIs('admin.semester')
    ? 'bg-cyan-500/15 text-cyan-400 font-semibold'
    : 'text-slate-300 hover:bg-slate-800 hover:text-cyan-400'
}} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

    <i class="fa-solid fa-graduation-cap"></i>

    <span>Semester Akademik</span>

</a>





   <!-- RIWAYAT -->
<a href="{{ route('admin.riwayat') }}"
class="{{ request()->routeIs('admin.riwayat')
    ? 'bg-cyan-500/15 text-cyan-400 font-semibold'
    : 'text-slate-300 hover:bg-slate-800 hover:text-cyan-400'
}} flex items-center gap-3 px-4 py-3 rounded-2xl transition duration-200">

    <i class="fa-solid fa-clock-rotate-left"></i>

    <span>Riwayat Penggunaan</span>

</a>

</nav>

        <!-- STATUS -->
        <div class="mt-12">

            <h2 class="text-[12px] font-bold text-slate-500 uppercase tracking-wider mb-5">
                Status Ruangan
            </h2>

            <div class="space-y-4">

                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    <span class="text-[15px] text-slate-300">Kosong</span>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                    <span class="text-[15px] text-slate-300">Digunakan</span>
                </div>

            </div>

        </div>

        

    </aside>

    <!-- MAIN -->
    <div class="ml-[255px] flex-1">

        <!-- NAVBAR -->
        <nav class="sticky top-0 z-40 bg-[#f4f7fb]/90 backdrop-blur-md px-10 py-6">

            <div class="bg-white rounded-3xl px-8 h-[82px] flex items-center justify-between">

                <!-- DATE -->
                <div class="hidden md:flex items-center gap-4
                    bg-cyan-50
                    border border-cyan-100
                    px-5 py-3 rounded-2xl">

                    <div class="w-11 h-11 rounded-xl bg-cyan-100
                                flex items-center justify-center
                                text-cyan-600">

                        <i class="fa-regular fa-calendar-days"></i>

                    </div>

                    <div>

                        <div id="tanggalRealtime"
                             class="text-[14px] font-semibold text-gray-700">
                        </div>

                        <div id="jamRealtime"
                             class="text-[13px] text-gray-500 mt-1">
                        </div>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="flex items-center gap-4">

                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">

    @csrf

    <button
        type="button"
        onclick="confirmLogout()"
        class="px-7 h-[45px] rounded-2xl bg-red-500 text-white font-semibold flex items-center shadow-md hover:bg-red-600 transition">

        Logout

    </button>

</form>

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

    const hari = now.toLocaleDateString('id-ID', {
        weekday: 'long'
    });

    const tanggal = now.toLocaleDateString('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });

    const jam = now.toLocaleTimeString('id-ID', {
        hour: '2-digit',
        minute: '2-digit',
    });

    document.getElementById('tanggalRealtime').innerHTML =
        `${hari}, ${tanggal}`;

    document.getElementById('jamRealtime').innerHTML = jam;
}

updateDateTime();

setInterval(updateDateTime, 1000);

function confirmLogout() {

    Swal.fire({
        title: 'Logout?',
        text: 'Apakah Anda yakin ingin logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal'
    }).then((result) => {

        if (result.isConfirmed) {
            document.getElementById('logoutForm').submit();
        }

    });

}
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>