<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <title>SPK Pelayanan</title>

</head>
<?php
include '../koneksi.php';
session_start();
if ($_SESSION['status'] != "admin") {
    header("location:../index.php?pesan=belum_login");
}
?>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <img class="img" src="../img/pelayanan.png">
        </div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">SPK Pelayanan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="dashboard.php">Beranda</a>
                    <a class="nav-item nav-link" href="kelolaUser.php">Kelola User</a>
                    <a class="nav-item nav-link" href="kuesioner.php">Kuesioner</a>
                    <a class="nav-item nav-link" href="alternatif.php">Alternatif</a>
                    <div class="dropdown">
                        <a class="nav-item nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" href="#">Analisa</a>
                        <div class="dropdown-menu isi-dropdown" aria-labelledby="dropdownMenuButton">
                            <a href="analisaKriteria.php" class="dropdown-item">Analisa Kriteria metode AHP</a>
                            <a href="analisa.php" class="dropdown-item">Hasil analisa metode SAW</a>
                        </div>
                    </div>
                    <a class="nav-item btn btn-danger tombol" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 info-panel">
                <div class="row">
                    <div class="col-lg">
                        <img src="">
                        <h4>Beranda</h4>
                        <p>Halaman Utama Administrator</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11 panel">
                <div class="row">
                    <div class="col-lg">
                        <h3>Selamat Datang, Administrator <br> di Sistem Pendukung Keputusan Tingkat Pelayanan Pada Puskesmas dengan kombinasi Metode AHP (Analytical Hierarchy Process) dan SAW (Simple Additive Weighting)</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
</body>

</html>