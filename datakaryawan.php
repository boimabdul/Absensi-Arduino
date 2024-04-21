<!DOCTYPE html>
<html>

<head>
    <?php include "header.php"; ?>
    <title>Data Karyawan</title>

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
        <h3> Data Karyawan </h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: rgb(71, 169, 146); color: white;">
                    <th style="width: 10px; text-align:center">No.</th>
                    <th style="width: 200px; text-align:center">No.Kartu</th>
                    <th style="width: 400px; text-align:center">Nama</th>
                    <th style="text-align:center">Alamat</th>
                    <th style="width: 100px; text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Koneksi ke database
                include "koneksi.php";

                //baca data karyawan
                $sql = mysqli_query($konek, "select * from karyawan");
                $no = 0;
                while ($data = mysqli_fetch_array($sql)) {

                    $no++;

                ?>
                    <tr>
                        <td> <?php echo $no; ?></td>
                        <td> <?php echo $data['nokartu']; ?></td>
                        <td> <?php echo $data['nama']; ?></td>
                        <td> <?php echo $data['alamat']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> | <a href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- tombol tambah data karyawan -->
        <a href="tambah.php"> <button class="btn btn-primary">Tambah data Karyawan</button></a>
    </div>

    <?php include "footer.php" ?>

</body>

</html>