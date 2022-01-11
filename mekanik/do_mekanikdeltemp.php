<?php
     include "../koneksi.php";

     $kode = $_GET['kode'];

     $sql = "delete from `daftar layanan temp` where kd_trns = '$kode' ";
     mysqli_query($conn, $sql);
