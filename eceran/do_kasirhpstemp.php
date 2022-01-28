<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_ecer'];
     $kode = $_GET['kode'];

$sql = "delete from `daftar belanja temp` where kd_brg = '$kode' and user = '$user'";
     mysqli_query($conn, $sql);
