<!doctype html>
<html lang="en">

<?php include("../koneksi.php"); ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- Font awesome-->
    <link href="../vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Icon W3 -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <title>SPK Pelayanan</title>

</head>

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
                    <a class="nav-item nav-link" href="kuesioner.php">Kuesioner</a>
                    <a class="nav-item nav-link" href="analisa.php">Hasil Analisa</a>
                    <a class="nav-item btn btn-danger tombol" href="../index.php">Logout</a>
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
                        <p>Halaman Staff/Pegawai Kuesioner</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row">
                    <div class="col-lg user">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Detail Responden</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['id'])) {
                                    $id    = $_GET['id'];
                                } else {
                                    die("Error. No ID Selected!");
                                }
                                $CR = mysqli_query($conn, "Select * from kriteria");
                                while ($C = mysqli_fetch_array($CR)) {
                                    $nCR[] = $C['kriteria'];
                                }
                                $data = mysqli_query($conn, "Select * from kuesioner where id = '$id'");
                                while ($d = mysqli_fetch_array($data)) {

                                    if ($d['C1'] == 5) {
                                        $pC1 = "Selalu";
                                    } else if ($d['C1'] == 4) {
                                        $pC1 = "Sering";
                                    } else if ($d['C1'] == 3) {
                                        $pC1 = "Kadang-kadang";
                                    } else if ($d['C1'] == 2) {
                                        $pC1 = "Tidak Pernah";
                                    } else if ($d['C1'] == 1) {
                                        $pC1 = "Sangat Tidak Pernah";
                                    }
                                    if ($d['C2'] == 5) {
                                        $pC2 = "Selalu";
                                    } else if ($d['C2'] == 4) {
                                        $pC2 = "Sering";
                                    } else if ($d['C2'] == 3) {
                                        $pC2 = "Kadang-kadang";
                                    } else if ($d['C2'] == 2) {
                                        $pC2 = "Tidak Pernah";
                                    } else if ($d['C2'] == 1) {
                                        $pC2 = "Sangat Tidak Pernah";
                                    }
                                    if ($d['C3'] == 5) {
                                        $pC3 = "Selalu";
                                    } else if ($d['C3'] == 4) {
                                        $pC3 = "Sering";
                                    } else if ($d['C3'] == 3) {
                                        $pC3 = "Kadang-kadang";
                                    } else if ($d['C3'] == 2) {
                                        $pC3 = "Tidak Pernah";
                                    } else if ($d['C3'] == 1) {
                                        $pC3 = "Sangat Tidak Pernah";
                                    }
                                    if ($d['C4'] == 5) {
                                        $pC4 = "Selalu";
                                    } else if ($d['C4'] == 4) {
                                        $pC4 = "Sering";
                                    } else if ($d['C4'] == 3) {
                                        $pC4 = "Kadang-kadang";
                                    } else if ($d['C4'] == 2) {
                                        $pC4 = "Tidak Pernah";
                                    } else if ($d['C4'] == 1) {
                                        $pC4 = "Sangat Tidak Pernah";
                                    }
                                    if ($d['C5'] == 5) {
                                        $pC5 = "Selalu";
                                    } else if ($d['C5'] == 4) {
                                        $pC5 = "Sering";
                                    } else if ($d['C5'] == 3) {
                                        $pC5 = "Kadang-kadang";
                                    } else if ($d['C5'] == 2) {
                                        $pC5 = "Tidak Pernah";
                                    } else if ($d['C5'] == 1) {
                                        $pC5 = "Sangat Tidak Pernah";
                                    }
                                    if ($d['C6'] == 5) {
                                        $pC6 = "Selalu";
                                    } else if ($d['C6'] == 4) {
                                        $pC6 = "Sering";
                                    } else if ($d['C6'] == 3) {
                                        $pC6 = "Kadang-kadang";
                                    } else if ($d['C6'] == 2) {
                                        $pC6 = "Tidak Pernah";
                                    } else if ($d['C6'] == 1) {
                                        $pC6 = "Sangat Tidak Pernah";
                                    }
                                    if ($d['C7'] == 5) {
                                        $pC7 = "Selalu";
                                    } else if ($d['C7'] == 4) {
                                        $pC7 = "Sering";
                                    } else if ($d['C7'] == 3) {
                                        $pC7 = "Kadang-kadang";
                                    } else if ($d['C7'] == 2) {
                                        $pC7 = "Tidak Pernah";
                                    } else if ($d['C7'] == 1) {
                                        $pC7 = "Sangat Tidak Pernah";
                                    }
                                    if ($d['C8'] == 5) {
                                        $pC8 = "Selalu";
                                    } else if ($d['C8'] == 4) {
                                        $pC8 = "Sering";
                                    } else if ($d['C8'] == 3) {
                                        $pC8 = "Kadang-kadang";
                                    } else if ($d['C8'] == 2) {
                                        $pC8 = "Tidak Pernah";
                                    } else if ($d['C8'] == 1) {
                                        $pC8 = "Sangat Tidak Pernah";
                                    }
                                ?>
                                    <tr>
                                        <td>Nama</td>
                                        <td><?php echo $d['responden'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pelayanan</td>
                                        <td><?php echo $d['alternatif'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jawaban Kuesioner</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $nCR[0] ?></td>
                                        <td><?php echo $pC1 ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $nCR[1] ?></td>
                                        <td><?php echo $pC2 ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $nCR[2] ?></td>
                                        <td><?php echo $pC3 ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $nCR[3] ?></td>
                                        <td><?php echo $pC4 ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $nCR[4] ?></td>
                                        <td><?php echo $pC5 ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $nCR[5] ?></td>
                                        <td><?php echo $pC6 ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $nCR[6] ?></td>
                                        <td><?php echo $pC7 ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $nCR[7] ?></td>
                                        <td><?php echo $pC8 ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <a class="btn btn-outline-primary btn-sm" href="kuesioner.php">Kembali</a>
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
</body>

</html>