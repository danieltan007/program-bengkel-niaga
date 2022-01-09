<?php
     include "koneksi.php";

     $kode = $_POST['kode3'];
     $korting = $_POST['korting'];

     $sql2 = "select * from `tabel barang pusat` where kd_brg = '$kode'";
     $cari2 = mysqli_query($conn, $sql2);
     $data2 = mysqli_fetch_array($cari2);

     $sql = "select * from `barang mekanik temp` where kd_brg = '$kode' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($cari);

     //hitung diskon
     $jmldisc = (int)$data2['hrg_jual'] * ($data['diskon']/100);
     $hrgfin = (int)$data2['hrg_jual'] - $jmldisc;

      //hitung total harga
     $total = $hrgfin * (int)$data['jml'] - $korting;

     $sql1 = "update `barang mekanik temp` set korting = '$korting', total = '$total' where kd_brg = '$kode' ";
     mysqli_query($conn, $sql1);
