<!DOCTYPE html>
<html>

<head>
    <?php include "header.php"; ?>
    <title>Menu Utama</title>
    <style>
        /* Gaya untuk teks */
        h1 {
            font-family: 'Roboto', Arial, sans-serif;
            /* Menggunakan font Roboto jika tersedia, jika tidak, gunakan Arial, dan terakhir gunakan font generic sans-serif */
            font-size: 36px;
            font-weight: bold;
            color: #333;
            /* Warna teks */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Efek bayangan teks */
        }

        /* Gaya untuk footer */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            /* Warna latar belakang footer */
            padding: 10px 0;
            /* Padding atas dan bawah footer */
            text-align: center;
            font-family: 'Hel

        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <!-- Isi -->
    <div class="container-fluid" style="padding-top: 10%; text-align: center">
        <h1>
            SELAMAT DATANG <br>
            PENERAPAN SENSOR RFID RC522 DAN NODEMCU ESP8266 <br>
            UNTUK ALAT PRESENSI KARYAWAN BERBASIS WEB PADA <br>
            PT TERATAI VALASINDO
        </h1>
    </div>

    <?php include "footer.php" ?>
</body>

</html>