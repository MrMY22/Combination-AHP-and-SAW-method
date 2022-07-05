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
                    <a class="nav-item nav-link active" href="../admin/dashboard.php">Beranda</a>
                    <a class="nav-item nav-link" href="../admin/kelolaUser.php">Kelola User</a>
                    <a class="nav-item nav-link" href="../admin/kuesioner.php">Kuesioner</a>
                    <a class="nav-item nav-link" href="../admin/alternatif.php">Alternatif</a>
                    <div class="dropdown">
                        <a class="nav-item nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" href="#">Analisa</a>
                        <div class="dropdown-menu isi-dropdown" aria-labelledby="dropdownMenuButton">
                            <a href="../admin/analisaKriteria.php" class="dropdown-item">Analisa Kriteria metode AHP</a>
                            <a href="../admin/analisa.php" class="dropdown-item">Hasil analisa metode SAW</a>
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
                        <h4>Kelola User</h4>
                        <p>Halaman Administrator Kelola User</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="row">
                    <div class="col-lg-4 akun">
                        <!-- Tambah User -->
                        <?php
                        if (isset($_POST['tombol'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $level = $_POST['level'];

                            mysqli_query($conn, "insert into user values ('','$username','$password','$level')");
                            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                              <div>
                                                  &nbsp; Data Berhasil ditambahkan!
                                              </div>
                                          </div>';
                        }
                        ?>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <span>Username</span>
                            <div class="input-group mb-3">
                                <input type="hidden" name="id" class="form-control">
                                <input type="text" name="username" class="form-control" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <span>Password</span>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <span>Level</span>
                            <div class="input-group mb-3">
                                <select class="form-control" name="level">
                                    <option>Administrator</option>
                                    <option>Staff/Pegawai</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" name="tombol" class="btn btn-primary btn-block">Tambahkan</button>
                                    *Silahkan diabaikan jika tidak ingin menambah data
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg user">
                        <?php
                        $id = $_GET['id'];
                        $data = mysqli_query($conn, "Select * from user where id='$id'");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <h5>Edit Data User</h5>
                            <form method="POST" action="prosesUser.php">
                                <span>Username</span>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>" class="form-control">
                                    <input type="text" name="username" value="<?php echo $d['username']; ?>" class="form-control" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <span>Password</span>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" value="<?php echo $d['password']; ?>" class="form-control" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <span>Level</span>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="level">
                                        <option readonly>Pilih Level</option>
                                        <option>Administrator</option>
                                        <option>Staff/Pegawai</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-outline-primary btn-sm" href="../admin/kelolaUser.php">Kembali</a>
                                        <button type="submit" class="btn btn-outline-warning btn-sm">Update</button>
                                    </div>
                                </div>
                            </form>
                        <?php
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