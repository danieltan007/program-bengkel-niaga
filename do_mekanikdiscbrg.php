<?php
     include "koneksi.php";

     $diskon = (int)$_POST['diskon'];
     $kode = $_POST['kode'];

     $sql2 = "select * from `tabel barang` where kd_brg = '$kode'";
     $cari2 = mysqli_query($conn, $sql2);
     $data2 = mysqli_fetch_array($cari2);

     //hitung diskon
     $jmldisc = (int)$data2['hrg_brg'] * ($diskon/100);
     $hrgfin = (int)$data2['hrg_brg'] - $jmldisc;

     $sql = "select * from `barang mekanik temp` where kd_brg = '$kode' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($cari);

      //hitung total harga
     $total = $hrgfin * (int)$data['jml'] - $data['korting'];

     $sql1 = "update `barang mekanik temp` set diskon = '$diskon', total = '$total', hrg_brg = '$hrgfin' where kd_brg = '$kode' ";
     mysqli_query($conn, $sql1);
?>