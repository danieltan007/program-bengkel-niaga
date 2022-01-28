<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_mekanik'];
     $kode = $_GET['kode'];

$sql = "delete from `daftar layanan temp` where kd_trns = '$kode' and user = '$user'";
     mysqli_query($conn, $sql);
