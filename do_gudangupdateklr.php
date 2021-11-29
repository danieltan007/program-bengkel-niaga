<?php
     include "koneksi.php";

     $kode = $_POST['kode'];
     $kurang = $_POST['kurang'];

     $sql = "update `update barang temp` set sto_brg = '$kurang' where kd_brg = '$kode' ";
     mysqli_query($conn, $sql);

     echo $sql;
?>