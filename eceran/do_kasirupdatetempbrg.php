<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_ecer'];
     $kode = $_POST['kode'];
     $jml = $_POST['jml'];

$sql = "update `tabel barang temp` set sto_brg = '$jml' where kd_brg = '$kode' and user = '$user'";
     $cari = mysqli_query($conn, $sql);
