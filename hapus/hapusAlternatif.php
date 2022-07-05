<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "select kode from alternatif where id='$id'");
while ($d = mysqli_fetch_array($data)) {
    $kode = $d['kode'];
    mysqli_query($conn, "delete from keputusan where id_keputusan='$kode'");
    mysqli_query($conn, "delete from ranking where kode_alternatif='$kode'");
}
$query = mysqli_query($conn, "delete from alternatif where id='$id'");
header("location:../admin/alternatif.php?pesan=hapus");
