<?php
include "../koneksi.php";

$tgl = date('Y-m-d');

$sql1 = "select * from `tabel pusat temp`";
$cari1 = mysqli_query($conn, $sql1);

while ($data1 = mysqli_fetch_array($cari1)) {
     $sql2 = "insert into `laporan barang masuk` (tgl_dtg, kd_brg, nm_brg, mrk_brg, jml_brg) values ('$tgl', '$data1[kd_brg]', '$data1[nm_brg]' , '$data1[mrk_brg]', '$data1[sto_brg]') ";
     mysqli_query($conn, $sql2);

     $sql4 = "insert into `tabel barang pusat` 
          (`kd_brg`, `nm_brg`, `mrk_brg`, `stock_toko`, `stock_gudang`, `supplier`, `hrg_modal`, `hrg_jual`, hrg_jual2, hrg_jual3) values 
          ('$data1[kd_brg]', '$data1[nm_brg]', '$data1[mrk_brg]', 0,'$data1[sto_brg]' ,'$data1[supp_brg]', '$data1[hrg_modal]', '$data1[hrg_jual]', '$data1[hrg_jual2]', '$data1[hrg_jual3]')";
     mysqli_query($conn, $sql4);
}

$sql3 = "delete from `tabel pusat temp`";
mysqli_query($conn, $sql3);
