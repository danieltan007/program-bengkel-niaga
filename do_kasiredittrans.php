<?php
     include "koneksi.php";

     $nomor = $_GET['nomor'];
     $jmlbrg = $_POST['jml_beli'];
     $diskon = $_POST['diskon'];
     
     $sql = "select * from `detail transaksi` where nomor = '$nomor' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($conn, $cari);
     $id_trans = $data['id_trns'];

     //cari barang
     $sql1 = "select * from `tabel barang` where kd_brg = '$data[kd_brg]' ";
     $cari1 = mysqli_query($conn, $sql1);
     $data1 = mysqli_fetch_array($conn, $cari1);

     //perhitungan
     $harga = (int)$data1['hrg_brg'];
     $jmldiskon = ($diskon/100) * $harga;
     $hdiskon = (int)$harga - $jmldiskon;
     $tharga = $hdiskon * (int)$jmlbrg;

     //masukkan yang baru
     $sql2 = "update `detail transaksi` set (jml_beli = '$jmlbrg', diskon = '$diskon', hrg_brg = '$hdiskon', total_harga = '$tharga') where nomor = '$nomor' ";
     mysqli_query($conn, $sql2);

     //update di tabel transaksi
     $sql3 = "select sum(total_harga) as total from `detail transaksi` where nomor = '$nomor' ";
     $cari2 = mysqli_query($conn, $sql3);
     $data2 = mysqli_fetch_array($cari2);

     $sql4 = "update `tabel transaksi` set (total_harga = '$data2[total]') where id_trns = '$id_trans' ";
     mysqli_query($conn, $sql4);

?>