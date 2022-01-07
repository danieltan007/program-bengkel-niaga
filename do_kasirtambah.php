<?php
     include "koneksi.php";
     $kode = $_GET['kode'];

     $sql = "select * from `tabel barang pusat` where kd_brg = '$kode' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($cari);

     $sql1 = "insert into `daftar belanja temp` (kd_brg, nm_brg, jml_brg, diskon, st_hrg, t_hrg, merek, korting) values ('$kode', '$data[nm_brg]', '1', '0', '$data[hrg_jual]', '$data[hrg_jual]', '$data[mrk_brg]', '0')";
     $input = mysqli_query($conn, $sql1);
?>