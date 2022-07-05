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
            <div class="col-lg-11 akun">
                <div class="row">
                    <!-- Tambah kuesioner -->
                    <?php

                    if (isset($_POST['tombol'])) {
                        $responden = $_POST['responden'];
                        $alternatif = $_POST['alternatif'];
                        $C1 = $_POST['C1'];
                        $C2 = $_POST['C2'];
                        $C3 = $_POST['C3'];
                        $C4 = $_POST['C4'];
                        $C5 = $_POST['C5'];
                        $C6 = $_POST['C6'];
                        $C7 = $_POST['C7'];
                        $C8 = $_POST['C8'];

                        mysqli_query($conn, "insert into kuesioner values ('','$responden','$alternatif','$C1','$C2','$C3','$C4','$C5','$C6','$C7','$C8')");


                        $totalC1 = 0;
                        $totalC2 = 0;
                        $totalC3 = 0;
                        $totalC4 = 0;
                        $totalC5 = 0;
                        $totalC6 = 0;
                        $totalC7 = 0;
                        $totalC8 = 0;

                        $data = mysqli_query($conn, "Select * from kuesioner where alternatif = '$alternatif'");
                        while ($d = mysqli_fetch_array($data)) {
                            $totalC1 += $d['C1'];
                            $totalC2 += $d['C2'];
                            $totalC3 += $d['C3'];
                            $totalC4 += $d['C4'];
                            $totalC5 += $d['C5'];
                            $totalC6 += $d['C6'];
                            $totalC7 += $d['C7'];
                            $totalC8 += $d['C8'];

                            mysqli_query($conn, "update keputusan set C1='$totalC1', C2='$totalC2', C3='$totalC3', C4='$totalC4', C5='$totalC5', C6='$totalC6', C7='$totalC7', C8='$totalC8' where id_keputusan  = '$alternatif'");
                        }
                    }
                    ?>
                    <?php
                    $data = mysqli_query($conn, "select * from alternatif");
                    while ($d = mysqli_fetch_array($data)) {
                        $kode = $d['kode'];

                        $data1 = mysqli_query($conn, "Select responden from kuesioner where alternatif = '$kode'");
                        $jumlah = mysqli_num_rows($data1);
                    ?>
                        <div class="col-lg">
                            <div class="card" style="height: 120px;">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $d['alternatif'] ?></h6>
                                    <p class="card-text"><?php echo $jumlah ?> Responden</p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row">
                    <div class="col-lg-3 akun">
                        <h5>Keterangan : </h5>
                        <p>SP = Sangat Puas</p>
                        <p>P = Puas</p>
                        <p>CP = Cukup Puas</p>
                        <p>TP = Tidak Puas</p>
                        <p>STP = Sangat Tidak Puas</p>
                    </div>
                    <div class="col-lg kuesioner">
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
                            if ($_GET['pesan'] == "berhasil") {
                                echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                  <div>
                                      &nbsp; Data Berhasil ditambahkan!
                                  </div>
                              </div>';
                            }
                        }
                        ?>




                        <form method="POST" action="" enctype="multipart/form-data">
                            <h5> Responden </h5>
                            <div class="input-group mb-3">
                                <input type="text" name="responden" class="form-control" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-sitemap"></span>
                                    </div>
                                </div>
                            </div>
                            <h5> Alternatif </h5>
                            <div class="input-group mb-3">
                                <select class="form-control" name="alternatif">
                                    <?php
                                    $data = mysqli_query($conn, "Select * from alternatif ");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <option value="<?php echo $d['kode']; ?>"><?php echo $d['alternatif']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <table class="table">
                                <thead style="background-color: gray; text-align: center; color:white;">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kriteria</th>
                                        <th scope="col">SP</th>
                                        <th scope="col">P</th>
                                        <th scope="col">CP</th>
                                        <th scope="col">TP</th>
                                        <th scope="col">STP</th>
                                    </tr>
                                </thead>

                                <?php
                                $no = 1;
                                $data1 = mysqli_query($conn, "Select * from kriteria ");
                                while ($d1 = mysqli_fetch_array($data1)) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="text-align: center;"><?php echo $no++ ?></th>
                                            <td><?php echo $d1['kriteria'] ?></td>
                                            <td align="center"><input type="radio" name="<?php echo $d1['kode'] ?>" value="5" required></td>
                                            <td align="center"><input type="radio" name="<?php echo $d1['kode'] ?>" value="4" required></td>
                                            <td align="center"><input type="radio" name="<?php echo $d1['kode'] ?>" value="3" required></td>
                                            <td align="center"><input type="radio" name="<?php echo $d1['kode'] ?>" value="2" required></td>
                                            <td align="center"><input type="radio" name="<?php echo $d1['kode'] ?>" value="1" required></td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" name="tombol" class="btn btn-primary btn-block">Simpan</button>
                                </div>
                            </div>
                        </form>
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
                                    <th scope="col">No</th>
                                    <th scope="col">Responden</th>
                                    <th scope="col">Pelayanan</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($conn, "Select kuesioner.responden as nama,kuesioner.id as idKuesioner, alternatif.alternatif as pelayanan from kuesioner inner join alternatif on kuesioner.alternatif = alternatif.kode");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?php echo $d['nama'] ?></td>
                                        <td><?php echo $d['pelayanan'] ?></td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-sm" href="lihatResponden.php?id=<?php echo $d['idKuesioner']; ?>">Lihat</a>
                                            <a class="btn btn-outline-danger btn-sm" href="hapusResponden.php?id=<?php echo $d['idKuesioner']; ?>">Hapus</a>
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
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
</body>

</html>