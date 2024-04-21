<?php
include "koneksi.php";

// Lakukan query untuk mengambil data dari tabel tmprfid
$sql = mysqli_query($konek, "SELECT * FROM tmprfid");

// Periksa apakah query berhasil dieksekusi dan hasilnya tidak kosong
if ($sql && mysqli_num_rows($sql) > 0) {
    // Ambil data pertama dari hasil query
    $data = mysqli_fetch_array($sql);
    // Ambil nilai nokartu
    $nokartu = $data['nokartu'];
} else {
    // Jika tidak ada data dalam tabel tmprfid, atur nilai nokartu menjadi string kosong
    $nokartu = "";
}
?>

<div class="form-group">
    <label>No.Kartu</label>
    <!-- Pastikan untuk menghindari XSS menggunakan htmlspecialchars -->
    <input type="text" name="nokartu" id="nokartu" placeholder="tempelkan kartu rfid anda" class="form-control" style="width: 200px" value="<?php echo htmlspecialchars($nokartu); ?>">
</div>