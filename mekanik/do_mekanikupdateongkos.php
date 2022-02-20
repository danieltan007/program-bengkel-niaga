<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_mekanik'];
     $kode = $_POST['kode'];
     $ongkos = (int)$_POST['ongkos'];

$sql = "select * from `daftar layanan temp` where kd_trns = '$kode' and user = '$user' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($cari);

     //hitung ulang total harga
     $total = ((int)$data['jml_brg'] * (int)$data['hrg_brg']) + $ongkos - (int)$data['korting'];

//update data
$sql1 = "update `daftar layanan temp` set ongkos ='$ongkos', total = '$total' where kd_trns = '$kode' and user = '$user'";
     mysqli_query($conn, $sql1);
