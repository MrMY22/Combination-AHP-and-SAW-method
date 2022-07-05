<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "select kode from kriteria where id='$id'");
while ($d = mysqli_fetch_array($data)) {
    $kode = $d['kode'];
    mysqli_query($conn, "alter table kuesioner drop $kode");
}
$query = mysqli_query($conn, "delete from kriteria where id='$id'");
header("location:../admin/kriteria.php?pesan=sukses");
