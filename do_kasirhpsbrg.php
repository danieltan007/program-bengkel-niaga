<?php
     include "koneksi.php";

     $kode = $_POST['id'];

     $sql = "update `tabel barang` set sto_toko = '0' where kd_brg = '$kode'";
     mysqli_query($conn, $sql);
?>