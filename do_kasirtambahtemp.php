<?php
     include "koneksi.php";
     $kode = $_GET['kode'];

     $sql1 = "insert into `tabel barang temp` (kd_brg, nm_brg, hrg_brg, mrk_brg, sto_brg, supp_brg) select kd_brg, nm_brg, hrg_brg, mrk_brg, sto_toko, supp_brg from `tabel barang` where kd_brg = '$kode' ";
     $input = mysqli_query($conn, $sql1);
?>