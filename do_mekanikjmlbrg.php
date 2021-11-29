<?php
     include "koneksi.php";

     $jml = (int)$_POST['jml'];
     $kode = $_POST['kode'];

     $sql0 = "select * from `barang mekanik temp` where kd_brg = '$kode' ";
     $cari0 = mysqli_query($conn, $sql);
     $data0 = mysqli_fetch_array($cari0);

     $sql = "select * from `tabel barang` where kd_brg = '$kode' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($cari);

     //hitung total
     $total = ((int)$data['hrg_brg'] * $jml) - (int)$data0['korting'];

     $sql1 = "update `barang mekanik temp` set jml = '$jml', total = '$total' where kd_brg = '$kode' ";
     mysqli_query($conn, $sql1);
?>