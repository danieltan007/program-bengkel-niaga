<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_grosir'];
$hrg = $_POST['hrg'];
$kode = $_POST['kode'];
$sql = mysqli_query($conn, "select * from `daftar grosir temp` where user = '$user'");
$data = mysqli_fetch_array($sql);
$jml = $data['jml_brg'];
$hrg_satuan = $data['st_hrg'];

$total = $jml * $hrg;
$sq12 = mysqli_query($conn, "update `daftar grosir temp` set st_hrg = '$hrg', t_hrg = '$total' where kd_brg = '$kode' and user = '$user'");
