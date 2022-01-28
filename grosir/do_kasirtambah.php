<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_grosir'];
     $kode = $_GET['kode'];

     $sql = "select * from `tabel barang pusat` where kd_brg = '$kode' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($cari);

$hrg = $data['hrg_jual'] * 0.9;
$sql1 = "insert into `daftar grosir temp` (kd_brg, jml_brg,  st_hrg, t_hrg, user) values ('$kode', '1', '$hrg', '$hrg', '$user')";
     $input = mysqli_query($conn, $sql1);
