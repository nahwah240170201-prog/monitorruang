<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MonitorRuang</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white w-full max-w-md rounded-3xl shadow-lg p-8">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-blue-600">
            Register
        </h1>

        <p class="text-gray-500 mt-2">
            Register akun dosen atau komting
        </p>
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

            <input type="text"
                   name="nama"
                   class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                   required>
        </div>

        <!-- NIM/NIDN -->
        <div>
            <label class="block mb-2 font-semibold">
                NIM / NIDN
            </label>

            <input type="text"
                   name="nim_nidn"
                   class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                   required>
        </div>

        <!-- PASSWORD -->
        <div>
            <label class="block mb-2 font-semibold">
                Password
            </label>

            <input type="password"
                   name="password"
                   class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                   required>
        </div>

        <!-- ROLE -->
        <div>
            <label class="block mb-2 font-semibold">
                Role
            </label>

            <select name="role"
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <option value="">-- Pilih Role --</option>

                <option value="dosen">
                    Dosen
                </option>

                <option value="komting">
                    Komting
                </option>

            </select>
        </div>

        <!-- KELAS -->
        <div>
            <label class="block mb-2 font-semibold">
                Kelas
            </label>

            <select name="kelas"
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

                <option value="">-- Pilih Kelas --</option>

                <option value="IF-2A">IF-2A</option>
                <option value="IF-2B">IF-2B</option>
                <option value="IF-2C">IF-2C</option>

            </select>
        </div>

        <!-- BUTTON -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition">

            Register
        </button>

    </form>

</div>

</body>
</html>