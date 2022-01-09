<?php
include 'koneksi.php';

$kode = $_GET['kode'];

$sql0 = "select * from `table merek` where kd_merk = '$kode'";
$cari0 = mysqli_query($conn, $sql0);
$data = mysqli_fetch_array($cari0);

$edit = $data['mrk_brg'];

$sql = "delete from `table merek` where kd_merk = '$kode'";
$cari = mysqli_query($conn, $sql);

$sql3 = "update `tabel barang pusat` set mrk_brg = '' where mrk_brg = '$edit'";
mysqli_query($conn, $sql3);
