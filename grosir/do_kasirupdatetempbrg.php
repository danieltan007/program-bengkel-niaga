<?php
     include "../koneksi.php";

     $kode = $_POST['kode'];
     $jml = $_POST['jml'];

     $sql = "update `tabel barang temp` set sto_brg = '$jml' where kd_brg = '$kode'";
     $cari = mysqli_query($conn, $sql);
