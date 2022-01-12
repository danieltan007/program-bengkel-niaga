<?php
include "../koneksi.php";

$kode = $_POST['kode'];
$jml = $_POST['jml'];

$sql1 = "select * from `daftar grosir temp` where kd_brg = '$kode'";
$find = mysqli_query($conn, $sql1);
$data = mysqli_fetch_array($find);

$harga = $data['st_hrg'];
$tharga = $jml * $harga;

$sql = "update `daftar grosir temp` set jml_brg = '$jml', t_hrg = '$tharga' where kd_brg = '$kode'";
$cari = mysqli_query($conn, $sql);
