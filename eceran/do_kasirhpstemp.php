<?php
     include "../koneksi.php";

     $kode = $_GET['kode'];

     $sql = "delete from `daftar belanja temp` where kd_brg = '$kode'";
     mysqli_query($conn, $sql);
