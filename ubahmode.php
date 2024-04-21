<?php
include "koneksi.php";

// Baca mode absensi terakhir
$mode = mysqli_query($konek, "SELECT * FROM status");
$data_mode = mysqli_fetch_array($mode);
$mode_absen = $data_mode['mode'];

// Status terakhir kemudian ditambah
$mode_absen++;
if ($mode_absen > 4) {
    $mode_absen = 1;
}

// Simpan mode absen di tabel status dengan cara update
$simpan = mysqli_query($konek, "UPDATE status SET mode='$mode_absen'");
if ($simpan) {
    echo "Berhasil";
} else {
    echo "Gagal";
}
