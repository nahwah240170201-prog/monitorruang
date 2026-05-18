@extends('layouts.komting')

@section('content')

<div class="bg-white rounded-3xl shadow-sm p-10">

    <div class="flex justify-between items-center mb-10">

        <h1 class="text-3xl font-bold text-gray-800">
            Surat Peminjaman Ruangan
        </h1>





        <div class="flex gap-3">

            <!-- DOWNLOAD -->
            <button
                onclick="downloadPDF()"
                class="px-5 h-[48px] rounded-2xl bg-blue-600 text-white font-semibold">

                Download PDF

            </button>





            <!-- PRINT -->
            <button
                onclick="window.print()"
                class="px-5 h-[48px] rounded-2xl bg-green-600 text-white font-semibold">

                Print

            </button>

        </div>

    </div>





    <!-- SURAT -->
    <div id="suratArea" class="border rounded-3xl p-10">

        <div class="text-center mb-10">

            <h2 class="text-2xl font-bold">
                SURAT PEMINJAMAN RUANGAN
            </h2>

            <p class="text-gray-500 mt-2">
                MonitorRuang
            </p>

        </div>





        <table class="w-full text-[16px]">

            <tr class="h-[45px]">
                <td class="w-[250px]">Nama</td>
                <td>: Fulan</td>
            </tr>

            <tr class="h-[45px]">
                <td>Kelas</td>
                <td>: TI-3A</td>
            </tr>

            <tr class="h-[45px]">
                <td>Jenis Booking</td>
                <td>: Seminar</td>
            </tr>

            <tr class="h-[45px]">
                <td>Alasan</td>
                <td>: Seminar AI</td>
            </tr>

            <tr class="h-[45px]">
                <td>Hari</td>
                <td>: Senin</td>
            </tr>

            <tr class="h-[45px]">
                <td>Jam</td>
                <td>: 08:00 - 10:00</td>
            </tr>

            <tr class="h-[45px]">
                <td>Ruangan</td>
                <td>: LAB INFORMATIKA 1</td>
            </tr>

        </table>





        <div class="mt-16">

            <p>
                Demikian surat peminjaman ruangan ini dibuat
                untuk digunakan sebagaimana mestinya.
            </p>

        </div>





        <div class="flex justify-end mt-20">

            <div class="text-center">

                <p>Medan, 07 November 2025</p>

                <div class="h-[90px]"></div>

                <p class="font-semibold">
                    Fulan
                </p>

            </div>

        </div>

    </div>

</div>





<script>

function downloadPDF() {

    const element =
        document.getElementById('suratArea');

    html2pdf().from(element).save('surat-booking.pdf');

}

</script>





<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

@endsection