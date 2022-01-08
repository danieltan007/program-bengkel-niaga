<?php
     include "koneksi.php";

     $kode = $_GET['kode'];

     $sql1 = "select * from `tabel barang pusat` where kd_brg = '$kode'";
     $cari = mysqli_query($conn, $sql1);
     $data1 = mysqli_fetch_array($cari);

     $sql = "insert into `barang mekanik temp` (kd_brg, nm_brg, mrk_brg, jml, hrg_brg, total, diskon, korting) values ('$data1[kd_brg]', '$data1[nm_brg]', '$data1[mrk_brg]', 1, '$data1[hrg_jual]', '$data1[hrg_jual]', 0 ,0) ";
     mysqli_query($conn, $sql);
?>