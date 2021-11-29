<?php
     include "koneksi.php";

     $kode = $_GET['kode'];

     $sql = "insert into `update barang temp` (kd_brg, nm_brg, hrg_brg, mrk_brg, sto_brg, supp_brg) select kd_brg, nm_brg, hrg_brg, mrk_brg, sto_brg, supp_brg from `tabel barang` where kd_brg = '$kode' ";
     mysqli_query($conn,$sql);
?>