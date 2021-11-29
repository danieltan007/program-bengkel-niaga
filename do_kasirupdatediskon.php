<?php
     include "koneksi.php";

     $kode = $_POST['kode2'];
     $diskon = $_POST['diskon'];

     $sql1 = "select * from `daftar belanja temp` where kd_brg = '$kode'";
     $find = mysqli_query($conn,$sql1);
     $data = mysqli_fetch_array($find);

     $sql2 = "select * from `tabel barang` where kd_brg = '$kode'";
     $find2 = mysqli_query($conn,$sql2);
     $data2 = mysqli_fetch_array($find2);

     //perhitungan
     $jml = (int)$data['jml_brg'];
     $harga = (int)$data2['hrg_brg'];
     $jmldiskon = ($diskon/100) * $harga;
     $hdiskon = (int)$harga - $jmldiskon;
     $tharga = $hdiskon * (int)$jml - (int)$data['korting'];

     $sql = "update `daftar belanja temp` set diskon = '$diskon', t_hrg = '$tharga', st_hrg = '$hdiskon' where kd_brg = '$kode'";
     $cari = mysqli_query($conn, $sql);

?>