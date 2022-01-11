<?php

include '../koneksi.php';

$kode = $_GET['kode'];
$mrk_brg = $_GET['edit'];

if (isset($mrk_brg)) {
     $sql3 = "select * from `table merek` where kd_merk = '$kode' ";
     $cari3 = mysqli_query($conn, $sql3);
     $data3 = mysqli_fetch_array($cari3);
     $mrkbefore = $data3['mrk_brg'];

     $sql = "update `table merek` set mrk_brg = '$mrk_brg' where kd_merk = '$kode' ";
     $cari = mysqli_query($conn, $sql);

     $sql5 = "update `tabel barang pusat` set mrk_brg = '$mrk_brg' where mrk_brg = '$mrkbefore'";
     mysqli_query($conn, $sql5);
} else {
     exit("data gagal di ubah!");
}
