<?php
include "koneksi.php";

//baca tabel status untuk mode absensi
$sql_status = mysqli_query($konek, "SELECT * FROM status");
$data_status = mysqli_fetch_array($sql_status);
$mode_absen = $data_status['mode'];

// uji mode absen
$mode = "";
if ($mode_absen == 1)
    $mode = "Masuk";
else if ($mode_absen == 2)
    $mode = "Istirahat";
else if ($mode_absen == 3)
    $mode = "Kembali";
else if ($mode_absen == 4)
    $mode = "Pulang";

//baca tabel tmprfid
$baca_kartu = mysqli_query($konek, "SELECT * FROM tmprfid");
if (!$baca_kartu || mysqli_num_rows($baca_kartu) == 0) {
    // Handle ketika query tidak mengembalikan hasil atau tidak ada data yang sesuai
    $nokartu = "";
} else {
    // Ambil data kartu jika query berhasil mengembalikan hasil
    $data_kartu = mysqli_fetch_array($baca_kartu);
    $nokartu = $data_kartu['nokartu'];
}

?>

<div class="container-fluid" style="text-align: center">
    <?php if ($nokartu == "") { ?>
        <h3>Absen : <?php echo $mode ?> </h3>
        <h3> Silahkan Tempelkan Kartu RFID Anda</h3>
        <img src="images/rfid.png" style="width: 200px;"> <br>
        <img src="images/animasi2.gif">
    <?php } else {
        // cek nomer kartu RFID tersebut apakah terdaftar di tabel karyawan
        $cari_karyawan = mysqli_query($konek, "SELECT * FROM karyawan WHERE nokartu='$nokartu'");
        $jumlah_data = mysqli_num_rows($cari_karyawan);

        if ($jumlah_data == 0) {
            echo "<h1> Maaf! Kartu Tidak Dikenal</h1>";
        } else {
            //ambil data karyawan
            $data_karyawan = mysqli_fetch_array($cari_karyawan);
            $nama = $data_karyawan['nama'];

            //tanggal dan jam hari ini
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d');
            $jam = date('H:i:s');

            //cek di table absensi, apakah nomer kartu tersebut sudah ada sesuai tanggal saat ini. apabila belum ada, maka diangap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi
            $cari_absen = mysqli_query($konek, "SELECT * FROM absensi WHERE nokartu='$nokartu' AND tanggal='$tanggal'");
            //hitung jumlah datanya
            $jumlah_absen = mysqli_num_rows($cari_absen);
            if ($jumlah_absen == 0) {
                echo "<h1> Selamat Datang <br> $nama</h1>";
                mysqli_query($konek, "INSERT INTO absensi(nokartu, tanggal, jam_masuk) VALUES ('$nokartu', '$tanggal', '$jam')");
            } else {
                //update sesuai pilihan mode absen
                if ($mode_absen == 2) {
                    echo "<h1> Selamat Istirahat <br> $nama</h1>";
                    mysqli_query($konek, "UPDATE absensi SET jam_istirahat='$jam' WHERE nokartu='$nokartu' AND tanggal='$tanggal'");
                } else if ($mode_absen == 3) {
                    echo "<h1> Selamat Datang Kembali <br> $nama</h1>";
                    mysqli_query($konek, "UPDATE absensi SET jam_kembali='$jam' WHERE nokartu='$nokartu' AND tanggal='$tanggal'");
                } else if ($mode_absen == 4) {
                    echo "<h1> Selamat Jalan <br> $nama</h1>";
                    mysqli_query($konek, "UPDATE absensi SET jam_pulang='$jam' WHERE nokartu='$nokartu' AND tanggal='$tanggal'");
                }
            }
        }
    }
    // kosongkan tabel tmprfid
    mysqli_query($konek, "DELETE FROM tmprfid");
    ?>
</div>