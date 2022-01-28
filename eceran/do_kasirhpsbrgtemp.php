<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_ecer'];
     $kode = $_GET['kode'];

$sql = "delete from `tabel barang temp` where kd_brg = '$kode' where user = '$user'";
     mysqli_query($conn, $sql);
