<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_grosir'];
     $kode = $_GET['kode'];

$sql = "delete from `daftar grosir temp` where kd_brg = '$kode' and user = '$user'";
     mysqli_query($conn, $sql);
