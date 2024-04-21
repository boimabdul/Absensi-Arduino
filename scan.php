<!DOCTYPE html>
<html>

<head>
    <?php include "header.php"; ?>
    <title>Scan Kartu</title>

    <!-- scanning membaca kartu RFID -->
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#cekkartu").load('bacakartu.php')
            }, 2000);
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
    <div class="container-fluid" style="padding-top: 10%;">

        <div id="cekkartu"></div>
    </div>


    <?php include "footer.php" ?>


</body>

</html>