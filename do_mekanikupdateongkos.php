<?php
     include "koneksi.php";

     $kode = $_POST['kode'];
     $ongkos = (int)$_POST['ongkos'];

     $sql = "select * from `daftar layanan temp` where kd_trns = '$kode'";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($cari);

     //hitung ulang total harga
     $total = ((int)$data['jml_brg'] * (int)$data['hrg_brg']) + $ongkos - (int)$data['korting'];

     //update data
     $sql1 = "update `daftar layanan temp` set ongkos ='$ongkos', total = '$total' where kd_trns = '$kode' ";
     mysqli_query($conn, $sql1);
?>