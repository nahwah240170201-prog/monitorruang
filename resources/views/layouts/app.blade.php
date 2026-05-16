<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Monitor Kelas</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body class="bg-[#f5f5f5] font-sans">

<!-- NAVBAR -->
<!-- NAVBAR -->
<nav class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-md shadow-sm z-50 border-b border-gray-200">

    <div class="max-w-[1400px] mx-auto px-10 h-[78px] flex items-center justify-between">

        <!-- LOGO -->
        <div class="flex items-center gap-3">

            <div class="w-[42px] h-[42px] rounded-xl bg-blue-600 flex items-center justify-center text-white text-[18px] shadow-md">
                <i class="fa-solid fa-layer-group"></i>
            </div>

            <div>

                <h1 class="text-[20px] font-bold text-gray-800 leading-none">
                    MONITOR RUANG
                </h1>

                <p class="text-[12px] text-gray-500 mt-1">
                    Sistem Monitoring Kelas
                </p>

            </div>

        </div>

        <!-- MENU -->
        <div class="flex items-center gap-4">

            <a href="/"
                class="px-5 h-[42px] flex items-center rounded-lg text-[15px] font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                Home
            </a>
            <a href="{{ route('jadwal.index') }}">
                Jadwal
            </a>
            <a href="#"
                class="px-5 h-[42px] flex items-center rounded-lg text-[15px] font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                Tentang
            </a>

            <!-- LOGIN -->
            <a href="/login"
                class="px-5 h-[42px] flex items-center rounded-lg text-[15px] font-medium bg-[#eef3ff] text-blue-600 hover:bg-blue-100 transition">
                Login
            </a>

            <!-- REGISTER -->
            <a href="/register"
                class="px-6 h-[42px] flex items-center rounded-lg text-[15px] font-semibold bg-blue-600 hover:bg-blue-700 text-white shadow-md transition">
                Register
            </a>

        </div>

    </div>

</nav>

<!-- CONTENT -->
<div class="pt-[85px]">

    @yield('content')

</div>

</body>
</html>