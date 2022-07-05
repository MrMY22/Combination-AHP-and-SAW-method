<?php
include '../koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$alternatif = $_POST['alternatif'];

mysqli_query($conn, "update alternatif set kode = '$kode', alternatif = '$alternatif' where id = '$id'");

header("location:../admin/alternatif.php?pesan=update");
