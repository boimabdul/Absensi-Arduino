<?php
include "koneksi.php";

//baca Id data yang akan di hapus
$id = $_GET['id'];

//hapus data
$hapus = mysqli_query($konek, "delete from karyawan where id='$id'");

//jika berhasil terhapus tampilkan tepas terhapus
//kemudiaan kembal ke data karyawaan
if ($hapus) {
    echo "
            <script>
                alert('Terhapus');
                location.replace('datakaryawan.php');
            </script>   
        ";
} else {
    echo "
            <script>
                alert('Gagal Terhapus');
                location.replace('datakaryawan.php');
            </script>   
        ";
}
