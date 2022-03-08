<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_ecer'];
$id = $_GET['id'];
$sql = mysqli_query($conn, "select * from `detail transaksi` where id_trans = '$id' ");
$data = mysqli_fetch_array($sql);
$kd_brg = $data['kd_brg'];
$jml_beli = $data['jml_beli'];
$hrg_brg = $data['hrg_brg'];
$total_harga = $data['total_harga'];

$sql3 = mysqli_query($conn, "select max(kd_temp) as maxkode from `tabel retur temp`");
$data3 = mysqli_fetch_array($sql3);
$kode = $data3['maxkode'];
$noUrut = (int) substr($kode, 4, strlen($kode));
$noUrut++;
$kd_temp = "RTR" . sprintf("%03s", $noUrut);

$sql4 = mysqli_query($conn, "insert into `tabel retur temp` values ('$kd_temp','$kd_brg','$jml_beli','$hrg_brg','$total_harga')");
