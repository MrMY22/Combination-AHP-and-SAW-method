<?php
include '../koneksi.php';

$id = $_GET['id'];


$data1 = mysqli_query($conn, "select alternatif from kuesioner where id='$id'");
$d1 = mysqli_fetch_array($data1);
$alternatif = $d1['alternatif'];

$query = mysqli_query($conn, "delete from kuesioner where id='$id'");
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
header("location:../admin/kuesioner.php?pesan=sukses");
