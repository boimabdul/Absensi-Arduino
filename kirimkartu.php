<?php
include "koneksi.php";

//baca nomer kartu
$nokartu = $_GET['nokartu'];
// kosongkan tabel tmprfid
mysqli_query($konek, "delete from tmprfid");

//simpan nomer kartu yang baru ke table rmfid
$simpan = mysqli_query($konek, "insert into tmprfid(nokartu)values('$nokartu')");
if ($simpan)
    echo "Berhasil";
else
    echo "Gagal";
