<!doctype html>
<html lang="en">

<?php include("../koneksi.php"); ?>
<?php


?>

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
                        <h4>Hasil Analisa</h4>
                        <p>Halaman Administrator Hasil Analisa</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir -->
        <?php
        $dataKriteria = mysqli_query($conn, "Select * from kriteria");
        $jumlahKriteria = mysqli_num_rows($dataKriteria);
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-11 analisa">
                <?php
                $data = mysqli_query($conn, "Select * from ci where id = '1'");
                $d = mysqli_fetch_array($data);
                $ci = $d['nilai'];
                if ($ci <= 0.10) {
                ?>
                    <div class="row">
                        <div class="col-lg">
                            <table class="table" style="text-align: center;">
                                <h5>Matriks Keputusan</h5>
                                <thead>
                                    <tr>
                                        <td class="col-lg-2" rowspan="2">Alternatif</td>
                                        <td colspan="<?php echo $jumlahKriteria; ?>">Kriteria</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $data = mysqli_query($conn, "Select * from kriteria");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <td><?php echo $d['kode']; ?></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tr>
                                    <?php
                                    $data = mysqli_query($conn, "Select * from keputusan");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tbody>
                                            <td><?php echo $d['id_keputusan'] ?></td>
                                            <td><?php echo $d['C1'] ?></td>
                                            <td><?php echo $d['C2'] ?></td>
                                            <td><?php echo $d['C3'] ?></td>
                                            <td><?php echo $d['C4'] ?></td>
                                            <td><?php echo $d['C5'] ?></td>
                                            <td><?php echo $d['C6'] ?></td>
                                            <td><?php echo $d['C7'] ?></td>
                                            <td><?php echo $d['C8'] ?></td>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </table>

                            <!-- Mencari nilai total terhadap kriteria dari matriks perbandingan-->
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

                            <?php
                            ?>
                            <?php
                            $no = 1;
                            $var = 1;
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

                                // Menentukan bobot prefentif tiap kriteria
                                $bobot[] = ($normC1 + $normC2 +  $normC3 + $normC4 + $normC5 + $normC6 + $normC7 + $normC8) / (8);
                            }
                            ?>
                            <!-- Selesai -->


                            <table class="table" style="text-align: center;">
                                <h5>Matriks Normalisasi</h5>
                                <thead>
                                    <tr>
                                        <td class="col-lg-2" rowspan="2">Alternatif</td>
                                        <td colspan="<?php echo $jumlahKriteria; ?>">Kriteria</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $data = mysqli_query($conn, "Select * from kriteria");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <td><?php echo $d['kode']; ?></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tr>
                                    <!-- Menentukan Matriks normalisasi -->
                                    <?php


                                    $Cnilai = mysqli_query($conn, "Select max(C1) as maxC1,max(C2) as maxC2,max(C3) as maxC3,max(C4) as maxC4,max(C5) as maxC5,max(C6) as maxC6,max(C7) as maxC7,max(C8) as maxC8,
                                    min(C1) as minC1,min(C2) as minC2,min(C3) as minC3,min(C4) as minC4,min(C5) as minC5,min(C6) as minC6,min(C7) as minC7,min(C8) as minC8 from keputusan");
                                    $nilai = mysqli_fetch_array($Cnilai);
                                    $maxC1 = $nilai['maxC1'];
                                    $maxC2 = $nilai['maxC2'];
                                    $maxC3 = $nilai['maxC3'];
                                    $maxC4 = $nilai['maxC4'];
                                    $maxC5 = $nilai['maxC5'];
                                    $maxC6 = $nilai['maxC6'];
                                    $maxC7 = $nilai['maxC7'];
                                    $maxC8 = $nilai['maxC8'];
                                    $minC1 = $nilai['minC1'];
                                    $minC2 = $nilai['minC2'];
                                    $minC3 = $nilai['minC3'];
                                    $minC4 = $nilai['minC4'];
                                    $minC5 = $nilai['minC5'];
                                    $minC6 = $nilai['minC6'];
                                    $minC7 = $nilai['minC7'];
                                    $minC8 = $nilai['minC8'];

                                    $data = mysqli_query($conn, "Select * from keputusan");
                                    while ($d = mysqli_fetch_array($data)) {
                                        $kode = $d['id_keputusan'];
                                        $C1 = $d['C1'];
                                        $C2 = $d['C2'];
                                        $C3 = $d['C3'];
                                        $C4 = $d['C4'];
                                        $C5 = $d['C5'];
                                        $C6 = $d['C6'];
                                        $C7 = $d['C7'];
                                        $C8 = $d['C8'];

                                        $nC1 = mysqli_query($conn, "Select * from kriteria where kode ='C1'");
                                        while ($dC1 = mysqli_fetch_array($nC1)) {
                                            $tipe = $dC1['tipe'];
                                            if ($tipe == "benefit") {
                                                $nilaiC1 = $C1 / $maxC1;
                                            } else if ($tipe == "cost") {
                                                $nilaiC1 = $minC1 / $C1;
                                            }
                                        }
                                        $nC2 = mysqli_query($conn, "Select * from kriteria where kode ='C2'");
                                        while ($dC2 = mysqli_fetch_array($nC2)) {
                                            $tipe = $dC2['tipe'];
                                            if ($tipe == "benefit") {
                                                $nilaiC2 = $C2 / $maxC2;
                                            } else if ($tipe == "cost") {
                                                $nilaiC2 = $minC2 / $C2;
                                            }
                                        }
                                        $nC3 = mysqli_query($conn, "Select * from kriteria where kode ='C3'");
                                        while ($dC3 = mysqli_fetch_array($nC3)) {
                                            $tipe = $dC3['tipe'];
                                            if ($tipe == "benefit") {
                                                $nilaiC3 = $C3 / $maxC3;
                                            } else if ($tipe == "cost") {
                                                $nilaiC3 = $minC3 / $C3;
                                            }
                                        }
                                        $nC4 = mysqli_query($conn, "Select * from kriteria where kode ='C4'");
                                        while ($dC4 = mysqli_fetch_array($nC4)) {
                                            $tipe = $dC4['tipe'];
                                            if ($tipe == "benefit") {
                                                $nilaiC4 = $C4 / $maxC4;
                                            } else if ($tipe == "cost") {
                                                $nilaiC4 = $minC4 / $C4;
                                            }
                                        }
                                        $nC5 = mysqli_query($conn, "Select * from kriteria where kode ='C5'");
                                        while ($dC5 = mysqli_fetch_array($nC5)) {
                                            $tipe = $dC5['tipe'];
                                            if ($tipe == "benefit") {
                                                $nilaiC5 = $C5 / $maxC5;
                                            } else if ($tipe == "cost") {
                                                $nilaiC5 = $minC5 / $C5;
                                            }
                                        }
                                        $nC6 = mysqli_query($conn, "Select * from kriteria where kode ='C6'");
                                        while ($dC6 = mysqli_fetch_array($nC6)) {
                                            $tipe = $dC6['tipe'];
                                            if ($tipe == "benefit") {
                                                $nilaiC6 = $C6 / $maxC6;
                                            } else if ($tipe == "cost") {
                                                $nilaiC6 = $minC6 / $C6;
                                            }
                                        }
                                        $nC7 = mysqli_query($conn, "Select * from kriteria where kode ='C7'");
                                        while ($dC7 = mysqli_fetch_array($nC7)) {
                                            $tipe = $dC7['tipe'];
                                            if ($tipe == "benefit") {
                                                $nilaiC7 = $C7 / $maxC7;
                                            } else if ($tipe == "cost") {
                                                $nilaiC7 = $minC7 / $C7;
                                            }
                                        }
                                        $nC8 = mysqli_query($conn, "Select * from kriteria where kode ='C8'");
                                        while ($dC8 = mysqli_fetch_array($nC8)) {
                                            $tipe = $dC8['tipe'];
                                            if ($tipe == "benefit") {
                                                $nilaiC8 = $C8 / $maxC8;
                                            } else if ($tipe == "cost") {
                                                $nilaiC8 = $minC8 / $C8;
                                            }
                                        }
                                        // Menentukan nilai akhir dari tiap alternatif
                                        $hasil = ($nilaiC1 * $bobot[0]) + ($nilaiC2 * $bobot[1]) + ($nilaiC3 * $bobot[2]) + ($nilaiC4 * $bobot[3]) + ($nilaiC5 * $bobot[4]) + ($nilaiC6 * $bobot[5]) + ($nilaiC7 * $bobot[6]) + ($nilaiC8 * $bobot[7]);

                                        mysqli_query($conn, "update ranking set nilai = '$hasil' where kode_alternatif='$kode'");

                                    ?>
                                        <tbody>
                                            <td><?php echo $d['id_keputusan'] ?></td>
                                            <td><?php echo round($nilaiC1, 2); ?></td>
                                            <td><?php echo round($nilaiC2, 2); ?></td>
                                            <td><?php echo round($nilaiC3, 2); ?></td>
                                            <td><?php echo round($nilaiC4, 2); ?></td>
                                            <td><?php echo round($nilaiC5, 2); ?></td>
                                            <td><?php echo round($nilaiC6, 2); ?></td>
                                            <td><?php echo round($nilaiC7, 2); ?></td>
                                            <td><?php echo round($nilaiC8, 2); ?></td>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </table>

                            <table class="table" style="text-align: center;">
                                <h5>Perangkingan</h5>
                                <thead>
                                    <tr>
                                        <td>Kode</td>
                                        <td>Alternatif</td>
                                        <td>Hasil</td>
                                        <td>Peringkat</td>
                                    </tr>
                                </thead>
                                <tr>
                                    <!-- Mengurutkan nilai rank -->
                                    <?php
                                    $rank = 0;
                                    $data = mysqli_query($conn, "Select ranking.kode_alternatif as kodeAl, ranking.nilai as nilaiAl, alternatif.alternatif as namaAl from ranking inner join alternatif on ranking.kode_alternatif = alternatif.kode ORDER BY ranking.nilai DESC");
                                    while ($d = mysqli_fetch_array($data)) {
                                        $rank++;
                                        $kode = $d['kodeAl'];
                                        mysqli_query($conn, "update ranking set peringkat = '$rank' where kode_alternatif='$kode'");
                                    ?>
                                        <tbody>
                                            <td><?php echo $d['kodeAl'] ?></td>
                                            <td><?php echo $d['namaAl'] ?></td>
                                            <td><?php echo round($d['nilaiAl'], 2) ?></td>
                                            <td><?php echo $rank ?></td>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </table>

                            <!-- Membuat Grafik -->
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <h5> Grafik Pelayanan </h5>
                            <div style="width: 800px;margin: 0px auto;">
                                <canvas id="myChart"></canvas>
                            </div>

                            <script>
                                <?php
                                $data =  mysqli_query($conn, "select * from alternatif");
                                while ($d = mysqli_fetch_array($data)) {
                                    $kodeAlternatif[] = $d['kode'];
                                }
                                ?>
                                <?php
                                $data =  mysqli_query($conn, "select * from alternatif");
                                while ($d = mysqli_fetch_array($data)) {
                                    $kode = $d['kode'];

                                    $data1 = mysqli_query($conn, "select * from ranking where kode_alternatif='$kode'");
                                    while ($d1 = mysqli_fetch_array($data1)) {
                                        $nilaiAlternatif[] = $d1['nilai'];
                                    }
                                }
                                ?>
                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: <?php echo json_encode($kodeAlternatif); ?>,

                                        datasets: [{
                                            label: '',
                                            data: <?php echo json_encode($nilaiAlternatif); ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>

                            <?php
                            $data =  mysqli_query($conn, "select max(peringkat) as mxNilai, min(peringkat) as mnNilai from ranking");
                            $d = mysqli_fetch_array($data);
                            $mxNilai = $d['mxNilai'];
                            $minNilai = $d['mnNilai'];

                            $data1 = mysqli_query($conn, "Select ranking.nilai as nilaiAl, alternatif.alternatif as namaAl from ranking inner join alternatif on ranking.kode_alternatif = alternatif.kode where ranking.peringkat = '$minNilai'");
                            $d1 = mysqli_fetch_array($data1);
                            $namaTinggi = $d1['namaAl'];
                            $nilaiTinggi = $d1['nilaiAl'];

                            $data2 = mysqli_query($conn, "Select ranking.nilai as nilaiAl, alternatif.alternatif as namaAl from ranking inner join alternatif on ranking.kode_alternatif = alternatif.kode where ranking.peringkat = '$mxNilai'");
                            $d2 = mysqli_fetch_array($data2);
                            $namaRendah = $d2['namaAl'];
                            $nilaiRendah = $d2['nilaiAl'];
                            ?>

                            <p> Berdasarkan hasil analisa diatas, maka diperoleh tingkat pelayanan tertinggi yaitu <b><?php echo $namaTinggi; ?></b> dengan nilai <b><?php echo $nilaiTinggi; ?></b></br>
                                Sedangkan tingkat pelayanan terendah yaitu <b><?php echo $namaRendah; ?></b> dengan nilai <b><?php echo $nilaiRendah; ?></b>


                        </div>
                    </div>
                <?php
                } else {
                    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <h5>Nilai CR Kriteria Tidak Konsisten ! Silahkan perbaiki!</h5>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>