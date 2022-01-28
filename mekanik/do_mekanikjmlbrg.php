<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_mekanik'];
$jml = (int)$_POST['jml'];
$kode = $_POST['kode'];

$sql0 = "select * from `barang mekanik temp` where kd_brg = '$kode' where user = '$user'";
$cari0 = mysqli_query($conn, $sql0);
$data0 = mysqli_fetch_array($cari0);

$sql = "select * from `tabel barang pusat` where kd_brg = '$kode' ";
$cari = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($cari);

//hitung total
$total = ((int)$data['hrg_jual'] * $jml) - (int)$data0['korting'];

$sql1 = "update `barang mekanik temp` set jml = '$jml', total = '$total' where kd_brg = '$kode' and user = '$user'";
mysqli_query($conn, $sql1);
