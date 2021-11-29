<?php
     include "koneksi.php";

     $nomor = $_GET['nomor'];

     $sql = "select * from `detail transaksi` where id_trns = '$nomor' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($conn, $cari);

     $sql1 = "delete from `tabel transaksi` where kd_brg = '$data[id_trns]'";
     $cari1 = mysqli_query($conn, $sql1);

     $sql2 = "delete from `detail transaksi` where id_trns = '$nomor'";
     mysqli_query($conn, $sql2);
?>