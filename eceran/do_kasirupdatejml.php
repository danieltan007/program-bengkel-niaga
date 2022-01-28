<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_ecer'];
$kode = $_POST['kode'];
$jml = $_POST['jml'];

$sql1 = "select * from `daftar belanja temp` where kd_brg = '$kode' and user = '$user'";
$find = mysqli_query($conn, $sql1);
$data = mysqli_fetch_array($find);

$sql2 = "select * from `tabel barang pusat` where kd_brg = '$kode'";
$find2 = mysqli_query($conn, $sql2);
$data2 = mysqli_fetch_array($find2);

//perhitungan diskon
$diskon = (int)$data['diskon'];
$harga = (int)$data2['hrg_jual'];
$jmldiskon = ($diskon / 100) * $harga;
$hdiskon = (int)$harga - $jmldiskon;
$tharga = $hdiskon * (int)$jml - (int)$data['korting'];

$sql = "update `daftar belanja temp` set jml_brg = '$jml', t_hrg = '$tharga' where kd_brg = '$kode' and user = '$user'";
$cari = mysqli_query($conn, $sql);
