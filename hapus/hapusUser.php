<?php
include '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "delete from user where id='$id'");
header("location:../admin/kelolaUser.php?pesan=hapus");
