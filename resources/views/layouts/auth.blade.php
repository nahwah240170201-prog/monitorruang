<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Monitor Ruang</title>

    @vite('resources/css/app.css')

    <!-- ICON -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body class="bg-[#f4f7fb] font-sans min-h-screen">

    <!-- BACK BUTTON -->
    <a href="/"
       class="fixed top-6 left-6 z-50
              w-[48px] h-[48px]
              rounded-2xl
              bg-white
              shadow-md
              border border-gray-200
              flex items-center justify-center
              text-gray-600
              hover:bg-blue-600
              hover:text-white
              transition">

        <i class="fa-solid fa-arrow-left"></i>

    </a>

    <!-- CONTENT -->
    <div class="min-h-screen">

        @yield('content')

    </div>

</body>
</html>