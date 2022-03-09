<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_grosir'];
$id = $_GET['id'];
$sql = mysqli_query($conn, "select * from `detail transaksi` where id_trans = '$id' ");
$data = mysqli_fetch_array($sql);
$jml_beli = $data['jml_beli'];
$hrg_brg = $data['hrg_brg'];
$total_harga = $data['total_harga'];

$sql5 = mysqli_query($conn, "select * from `tabel retur temp` where kd_trans = '$id' and user = '$user'");
if (mysqli_num_rows($sql5) >= 1) {
     exit();
} else {
     $sql3 = mysqli_query($conn, "select max(kd_temp) as maxkode from `tabel retur temp`");
     $data3 = mysqli_fetch_array($sql3);
     $kode = $data3['maxkode'];
     $noUrut = (int) substr($kode, 5, strlen($kode));
     $noUrut++;
     $kd_temp = "TEMP-" . sprintf("%03s", $noUrut);

     $sql4 = mysqli_query($conn, "insert into `tabel retur temp` values ('$kd_temp','$id','$jml_beli','$hrg_brg','$total_harga', '$user')");
}
