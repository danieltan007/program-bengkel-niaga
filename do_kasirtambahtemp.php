<?php
     include "koneksi.php";
     $kode = $_GET['kode'];

$sql1 = "insert into `tabel barang temp` (kd_brg, nm_brg, hrg_brg, mrk_brg, sto_brg, supp_brg) select kd_brg, nm_brg, hrg_jual, mrk_brg, stock_toko, supplier from `tabel barang pusat` where kd_brg = '$kode' ";
     $input = mysqli_query($conn, $sql1);
?>