<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_mekanik'];
     $kode = $_GET['kode'];

$sql = "delete from `barang mekanik temp` where kd_brg = '$kode' and user = '$user'";
     mysqli_query($conn, $sql);
