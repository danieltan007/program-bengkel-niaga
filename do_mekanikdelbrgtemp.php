<?php
     include "koneksi.php";

     $kode = $_GET['kode'];

     $sql = "delete from `barang mekanik temp` where kd_brg = '$kode'";
     mysqli_query($conn, $sql);

     echo $sql;
?>