@extends('layouts.app')

@section('content')

<div class="min-h-screen p-3">

    <!-- BORDER LUAR -->
    <div class="w-full min-h-[97vh] flex overflow-hidden">

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
        <div class="flex-1 bg-[#fafafa] flex items-center justify-center">

            <!-- Rectangle Card -->
            <div class="w-[620px] bg-white border border-gray-300 rounded-2xl px-12 py-12 shadow-sm">

                <!-- Title -->
                <div class="text-center mb-10">

                    <h1 class="text-[50px] font-bold  text-blue-600">
                        LOGIN
                    </h1>


                </div>

                <!-- FORM -->
                <form class="space-y-6">

                    <!-- NIM -->
                    <div>

                        <label class="block text-[16px] font-medium mb-2">
                            NIM 
                        </label>

                        <div class="relative">

                            <input
                                type="text"
                                required
                                placeholder="Masukkan NIM "
                                class="w-full h-[54px] border border-gray-300 rounded-xl px-4 text-[15px] focus:outline-none focus:border-blue-500"
                            >

                        </div>

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="block text-[16px] font-medium mb-2">
                            Password
                        </label>

                        <div class="relative">

                            <input
                                id="password"
                                type="password"
                                placeholder="Masukkan password"
                                class="w-full h-[54px] border border-gray-300 rounded-xl px-4 pr-12 text-[15px] focus:outline-none focus:border-blue-500"
                            >

                            <!-- ICON SHOW -->
                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"
                            >
                                <i id="eyeIcon" class="fa-regular fa-eye"></i>
                            </button>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="w-full h-[55px] rounded-xl bg-blue-600 hover:bg-blue-700 transition text-white text-[16px] font-semibold"
                    >
                        Login
                    </button>

                </form>

                <!-- Divider -->
                <div class="flex items-center gap-4 my-8">

                    <div class="flex-1 h-[1px] bg-gray-300"></div>

                    <span class="text-gray-400 text-[14px]">
                        atau
                    </span>

                    <div class="flex-1 h-[1px] bg-gray-300"></div>

                </div>

                <!-- Register -->
                <button
                    class="w-full h-[55px] border-2 border-blue-600 rounded-xl text-blue-600 text-[15px] font-medium hover:bg-blue-50 transition"
                >
                    Belum punya akun? Register di sini
                </button>

                <!-- INFO -->
                <div class="mt-8 bg-[#eef3ff] rounded-xl px-5 py-4">

                    <p class="text-[15px] font-medium mb-3">
                        Akses untuk:
                    </p>

                    <ul class="list-disc pl-6 text-[14px] text-gray-700 space-y-1">
                        <li>Komting</li>
                       
                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- SCRIPT SHOW PASSWORD -->
<script>
    function togglePassword() {

        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>

@endsection