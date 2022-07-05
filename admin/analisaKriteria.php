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
                        <h4>Analisa Kriteria</h4>
                        <p>Halaman Administrator Analisa Kriteria</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row">
                    <div class="col-lg user">
                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "update") {
                                echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                            <div>
                                                &nbsp; Data berhasil Di Update!
                                            </div>
                                        </div>';
                            }
                        }
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Kriteria</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($conn, "Select * from kriteria");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?php echo $d['kode'] ?></td>
                                        <td><?php echo $d['kriteria'] ?></td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-sm" href="../lihat/lihatKriteria.php?id=<?php echo $d['id']; ?>">Lihat</a>
                                            <a class="btn btn-outline-warning btn-sm" href="../edit/EditKriteria.php?id=<?php echo $d['id']; ?>">Edit</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row">
                    <div class="col-lg akun">
                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "sukses") {
                                echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                            <div>
                                                &nbsp; Data berhasil Dihapus!
                                            </div>
                                        </div>';
                            }
                        }
                        ?>
                        <!-- Input Perbandingan -->
                        <?php
                        if (isset($_POST['tombol'])) {
                            $kriteria1 = $_POST['banding1'];
                            $kriteria2 = $_POST['banding2'];
                            $level = $_POST['level'];
                            $nilai1 = 0;
                            $nilai2 = 0;

                            if ($level == 9) {
                                $nilai1 = 9.00;
                                $nilai2 = 0.11;
                            } else if ($level == 8) {
                                $nilai1 = 8.00;
                                $nilai2 = 0.13;
                            } else if ($level == 7) {
                                $nilai1 = 7.00;
                                $nilai2 = 0.14;
                            } else if ($level == 6) {
                                $nilai1 = 6.00;
                                $nilai2 = 0.17;
                            } else if ($level == 5) {
                                $nilai1 = 5.00;
                                $nilai2 = 0.20;
                            } else if ($level == 4) {
                                $nilai1 = 4.00;
                                $nilai2 = 0.25;
                            } else if ($level == 3) {
                                $nilai1 = 3.00;
                                $nilai2 = 0.33;
                            } else if ($level == 2) {
                                $nilai1 = 2.00;
                                $nilai2 = 0.5;
                            } else if ($level == 1) {
                                $nilai1 = 1.00;
                                $nilai2 = 1.00;
                            }
                            mysqli_query($conn, "update perbandingan set $kriteria2 = '$nilai1' where id_perbandingan='$kriteria1'");
                            mysqli_query($conn, "update perbandingan set $kriteria1 = '$nilai2' where id_perbandingan='$kriteria2'");
                            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                              <div>
                                                  &nbsp; Data Berhasil ditambahkan!
                                              </div>
                                          </div>';
                        }
                        ?>

                        <!-- Perhitungan -->
                        <?php
                        $totalC1 = 0;
                        $totalC2 = 0;
                        $totalC3 = 0;
                        $totalC4 = 0;
                        $totalC5 = 0;
                        $totalC6 = 0;
                        $totalC7 = 0;
                        $totalC8 = 0;

                        $data = mysqli_query($conn, "Select * from perbandingan");
                        while ($d = mysqli_fetch_array($data)) {
                            $totalC1 += $d['C1'];
                            $totalC2 += $d['C2'];
                            $totalC3 += $d['C3'];
                            $totalC4 += $d['C4'];
                            $totalC5 += $d['C5'];
                            $totalC6 += $d['C6'];
                            $totalC7 += $d['C7'];
                            $totalC8 += $d['C8'];
                        }
                        ?>
                        <!-- Selesai -->
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <select class="form-control col-lg-1" name="banding1">
                                    <?php
                                    $no = 1;
                                    $data = mysqli_query($conn, "Select * from kriteria");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <option><?php echo $d['kode'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>&nbsp;&nbsp;&nbsp;
                                <select class="form-control" name="level">
                                    <option value="9">9 - Satu elemen mutlak penting daripada elemen lainnya</option>
                                    <option value="8">8 - Elemen antara elemen Pertimbangan yang saling berdekatan</option>
                                    <option value="7">7 - Satu elemen jelas lebih mutlak penting daripada elemen lainnya</option>
                                    <option value="6">6 - Elemen antara elemen Pertimbangan yang saling berdekatana</option>
                                    <option value="5">5 - Elemen yang satu lebih penting daripada yang lainnya</option>
                                    <option value="4">4 - Elemen antara elemen Pertimbangan yang saling berdekatan</option>
                                    <option value="3">3 - Elemen yang satu sedikit lebih penting daripada elemen lainnya</option>
                                    <option value="2">2 - Elemen antara elemen Pertimbangan yang saling berdekatan</option>
                                    <option value="1">1 - Kedua elemen sama pentingnya</option>
                                </select>&nbsp;&nbsp;&nbsp;
                                <select class="form-control col-lg-1" name="banding2">
                                    <?php
                                    $no = 1;
                                    $data = mysqli_query($conn, "Select * from kriteria");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <option><?php echo $d['kode'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>&nbsp;&nbsp;
                                <button type="submit" name="tombol" class="btn btn-primary btn-block col-lg-1">Simpan</button>
                            </div>
                        </form>

                        <table class="table">
                            <h5>Matriks Perbandingan</h5>
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kriteria</th>
                                    <?php
                                    $no = 1;
                                    $data = mysqli_query($conn, "Select * from kriteria");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <th scope="col"><?php echo $d['kode']; ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($conn, "Select * from perbandingan");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?php echo $d['id_perbandingan'] ?></td>
                                        <td><?php echo $d['C1'] ?></td>
                                        <td><?php echo $d['C2'] ?></td>
                                        <td><?php echo $d['C3'] ?></td>
                                        <td><?php echo $d['C4'] ?></td>
                                        <td><?php echo $d['C5'] ?></td>
                                        <td><?php echo $d['C6'] ?></td>
                                        <td><?php echo $d['C7'] ?></td>
                                        <td><?php echo $d['C8'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <th scope="row" colspan="2" style="text-align: center;">Jumlah</th>
                                    <td><?php echo $totalC1; ?></td>
                                    <td><?php echo $totalC2; ?></td>
                                    <td><?php echo $totalC3; ?></td>
                                    <td><?php echo $totalC4; ?></td>
                                    <td><?php echo $totalC5; ?></td>
                                    <td><?php echo $totalC6; ?></td>
                                    <td><?php echo $totalC7; ?></td>
                                    <td><?php echo $totalC8; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <h5>Matriks Normalisasi</h5>
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kriteria</th>
                                    <?php
                                    $no = 1;
                                    $data = mysqli_query($conn, "Select * from kriteria");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <th scope="col"><?php echo $d['kode']; ?></th>
                                    <?php
                                    }
                                    ?>
                                    <th scope="col">Rata-rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Mencari nilai  rata2
                                $no = 1;
                                $var = 0;
                                $data = mysqli_query($conn, "Select * from perbandingan");
                                while ($d = mysqli_fetch_array($data)) {
                                    $normC1 = $d['C1'] / $totalC1;
                                    $normC2 = $d['C2'] / $totalC2;
                                    $normC3 = $d['C3'] / $totalC3;
                                    $normC4 = $d['C4'] / $totalC4;
                                    $normC5 = $d['C5'] / $totalC5;
                                    $normC6 = $d['C6'] / $totalC6;
                                    $normC7 = $d['C7'] / $totalC7;
                                    $normC8 = $d['C8'] / $totalC8;

                                    $rata[] = ($normC1 + $normC2 + $normC3 + $normC4 + $normC5 + $normC6 + $normC7 + $normC8) / (8);

                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?php echo $d['id_perbandingan'] ?></td>
                                        <td><?php echo round($normC1, 2); ?></td>
                                        <td><?php echo round($normC2, 2); ?></td>
                                        <td><?php echo round($normC3, 2); ?></td>
                                        <td><?php echo round($normC4, 2); ?></td>
                                        <td><?php echo round($normC5, 2); ?></td>
                                        <td><?php echo round($normC6, 2); ?></td>
                                        <td><?php echo round($normC7, 2); ?></td>
                                        <td><?php echo round($normC8, 2); ?></td>
                                        <td><?php echo round($rata[$var++], 2); ?></td>
                                    </tr>



                                <?php
                                }
                                ?>

                                <?php
                                // Mencari nilai hasil kali dari matriks perbandingan dgn nilai rata2 matriks normalisasi
                                $no = 1;
                                $data = mysqli_query($conn, "Select * from perbandingan");
                                while ($d = mysqli_fetch_array($data)) {

                                    $kali[] = ($d['C1'] * $rata[0]) + ($d['C2'] * $rata[1]) + ($d['C3'] * $rata[2]) + ($d['C4'] * $rata[3]) + ($d['C5'] * $rata[4]) + ($d['C6'] * $rata[5]) + ($d['C7'] * $rata[6]) + ($d['C8'] * $rata[7]);
                                }
                                ?>

                            </tbody>

                        </table>
                        <?php
                        $bagi1 = $kali[0] / $rata[0];
                        $bagi2 = $kali[1] / $rata[1];
                        $bagi3 = $kali[2] / $rata[2];
                        $bagi4 = $kali[3] / $rata[3];
                        $bagi5 = $kali[4] / $rata[4];
                        $bagi6 = $kali[5] / $rata[5];
                        $bagi7 = $kali[6] / $rata[6];
                        $bagi8 = $kali[7] / $rata[7];

                        $lamda = ($bagi1 + $bagi2 + $bagi3 + $bagi4 + $bagi5 + $bagi6 + $bagi7 + $bagi8) / (8);
                        $hasilLamda = round($lamda, 2);
                        $CI = ($lamda - 8) / (8 - 1);
                        $hasilCI = round($CI, 2);
                        $IR = 1.41;

                        $CR = $CI / $IR;
                        $hasilCR = round($CR, 2);
                        mysqli_query($conn, "update ci set nilai = '$CR' where id='1'");

                        echo "<h5>Nilai lamda = $hasilLamda </h5>";
                        echo "<h5>Nilai CI = $hasilCI </h5>";
                        echo "<h5>Nilai IR = $IR </h5>";
                        echo "<h5>Nilai CR = $hasilCR </h5>";
                        if ($hasilCR <= 0.10) {
                            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                  <h5>Nilai CR Kriteria Konsisten !</h5>
                          </div>';
                        } else {
                            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                <h5>Nilai CR Kriteria Tidak Konsisten ! Silahkan perbaiki!</h5>
                            </div>';
                        }


                        ?>
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