<?php
     include "koneksi.php";

     $tambahan = (int)$_POST['tambah'];
     $kode = $_POST['kode'];

     $sql1 = "select * from `tabel barang pusat` where kd_brg = '$kode' ";
     $data1 = mysqli_fetch_array(mysqli_query($conn, $sql1));

     //hitung stock
     $now = (int)$data1['sto_brg'];
     $stock = $now + $tambahan;

     $sql = "update `update barang temp` set sto_brg = $stock where kd_brg = '$kode'";
     mysqli_query($conn, $sql);
?>