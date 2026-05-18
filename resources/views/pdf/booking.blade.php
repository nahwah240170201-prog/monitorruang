<!DOCTYPE html>
<html>
<head>

    <title>Surat Booking</title>

    <style>

        body{
            font-family: sans-serif;
            padding:40px;
        }

        h1{
            text-align:center;
        }

        table{
            width:100%;
            margin-top:30px;
        }

        td{
            padding:8px;
        }

    </style>

</head>

<body>

    <h1>SURAT PEMINJAMAN RUANGAN</h1>

    <table>

        <tr>
            <td>Nama</td>
            <td>: {{ $booking->nama }}</td>
        </tr>

        <tr>
            <td>Kelas</td>
            <td>: {{ $booking->kelas }}</td>
        </tr>

        <tr>
            <td>Jenis Booking</td>
            <td>: {{ $booking->jenis_booking }}</td>
        </tr>

        <tr>
            <td>Mata Kuliah</td>
            <td>: {{ $booking->mata_kuliah }}</td>
        </tr>

        <tr>
            <td>Alasan</td>
            <td>: {{ $booking->alasan }}</td>
        </tr>

        <tr>
            <td>Hari</td>
            <td>: {{ $booking->hari }}</td>
        </tr>

        <tr>
            <td>Jam</td>
            <td>: {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
        </tr>

        <tr>
            <td>Ruangan</td>
            <td>: {{ $booking->ruangan }}</td>
        </tr>

    </table>





    <br><br><br>

    <p>
        Demikian surat peminjaman ruangan ini dibuat
        untuk digunakan sebagaimana mestinya.
    </p>

</body>
</html>