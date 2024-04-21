<!-- Proses Penyimpanan -->

<?php
include "koneksi.php";

// Jika tombol simpan di klik
if (isset($_POST['btnSimpan'])) {
    //baca isi inputan form
    $nokartu = $_POST['nokartu'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    //simpan ke table karyawan
    $simpan = mysqli_query($konek, "insert into karyawan (nokartu, nama, alamat) VALUES ('$nokartu', '$nama', '$alamat')");

    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    //jika kembali ke data karyawan
    if ($simpan) {
        echo "
                <script>
                    alert('Tersimpan');
                    location.replace('datakaryawan.php');
                </script>   
            ";
    } else {
        echo "
                <script>
                    alert('Gagal Tersimpan');
                    location.replace('datakaryawan.php');
                </script>   
            ";
    }
}

// kosongkan tabel tmprfid
mysqli_query($konek, "delete from tmprfid");

?>



<!DOCTYPE html>
<html>

<head>
    <?php include "header.php"; ?>
    <title>Tambah Data Karyawan</title>

    <!-- pembacaan no kartu otomatis -->
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#norfid").load('nokartu.php')
            }, 0); // pembacaan file nokartu.php, tiap 1 detik = 1000
        });
    </script>
    <style>
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

    <!--isi -->
    <div class="container-fluid">
        <h3>Tambah Data Karyawan</h3>

        <!-- From input -->
        <form method="POST">
            <div id="norfid"></div>

            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Karyawan" class="form-control" style="width: 400px">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" class="form-control" style="width: 400px"></textarea>
            </div>

            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
        </form>
    </div>

    <?php include "footer.php" ?>


</body>

</html>