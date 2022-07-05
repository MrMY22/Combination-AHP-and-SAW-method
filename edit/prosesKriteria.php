<?php
include '../koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$kriteria = $_POST['kriteria'];
$tipe = $_POST['tipe'];

mysqli_query($conn, "update kriteria set kode = '$kode', kriteria = '$kriteria', tipe = '$tipe' where id = '$id'");

header("location:../admin/analisaKriteria.php?pesan=update");
