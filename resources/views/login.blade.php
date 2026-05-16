<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MonitorRuang</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white w-full max-w-md p-8 rounded-3xl shadow-sm">

        <div class="text-center mb-8">

            <h1 class="text-3xl font-bold text-blue-600">
                MonitorRuang
            </h1>

            <p class="text-gray-500 mt-2">
                Login untuk mengakses dashboard
            </p>

        </div>

        <form action="/login" method="POST" class="space-y-5">

            @csrf

            <div>
                <label class="block mb-2 font-semibold">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition"
            >
                Login
            </button>

        </form>

        <p class="text-center text-gray-500 mt-6">
            Belum punya akun?

            <a href="/register" class="text-blue-600 font-semibold">
                Register
            </a>
        </p>

    </div>

</body>
</html>