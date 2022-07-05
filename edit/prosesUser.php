<?php
include '../koneksi.php';

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

mysqli_query($conn, "update user set username = '$username', password = '$password', level = '$level' where id = '$id'");

header("location:../admin/kelolaUser.php?pesan=update");
