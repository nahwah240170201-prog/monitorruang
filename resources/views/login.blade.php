@extends('layouts.auth')

@section('content')

<div class="min-h-screen flex items-center justify-center px-5">

    <!-- CARD -->
    <div class="w-full max-w-[500px]
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
                Login
            </h1>

            <p class="text-gray-500 text-[15px] leading-relaxed">
                Komting dapat melakukan booking, pembatalan, dan monitoring ruangan melalui sistem ini.
            </p>

        </div>

        <!-- FORM -->
        <form action="/login" method="POST" class="space-y-6">
        @csrf

            <!-- NIM -->
            <div>

                <label class="block text-[15px] font-semibold mb-2 text-gray-700">
                    NIM
                </label>

                <input
                    type="text"
                    name="nim"
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
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
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

                    <!-- SHOW -->
                    <button
                        type="button"
                        onclick="togglePassword()"
                        class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-blue-600 transition"
                    >

                        <i id="eyeIcon" class="fa-regular fa-eye"></i>

                    </button>

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

                Login

            </button>

        </form>

        <!-- DIVIDER -->
        <div class="flex items-center gap-4 my-8">

            <div class="flex-1 h-[1px] bg-gray-200"></div>

            <span class="text-gray-400 text-[13px]">
                atau
            </span>

            <div class="flex-1 h-[1px] bg-gray-200"></div>

        </div>

        <!-- REGISTER -->
        <a href="{{ route('register') }}"
           class="w-full h-[56px]
                  rounded-2xl
                  border border-blue-200
                  bg-blue-50
                  text-blue-600
                  font-semibold
                  flex items-center justify-center
                  hover:bg-blue-100
                  transition">

            Belum punya akun? Register

        </a>

    </div>

</div>

<!-- SCRIPT -->
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