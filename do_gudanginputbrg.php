<?php
     include "koneksi.php";

     $tgl = date('Y-m-d');

     $sql = "insert into `tabel barang` (kd_brg, nm_brg, hrg_brg, mrk_brg, sto_brg, supp_brg) select * from `tabel barang temp`";
     mysqli_query($conn,$sql);
     echo mysqli_error($conn);

     $sql1 = "select * from `tabel barang temp`";
     $cari1 = mysqli_query($conn, $sql1);
     
     while($data1 = mysqli_fetch_array($cari1))
     {
          $sql2 = "insert into `laporan barang masuk` (tgl_dtg, kd_brg, nm_brg, mrk_brg, jml_brg) values ('$tgl', '$data1[kd_brg]', '$data1[nm_brg]' , '$data1[mrk_brg]', '$data1[sto_brg]') ";
          mysqli_query($conn, $sql2);
          echo mysqli_error($conn);

          $sql4 = "insert into `tabel barang pusat` 
          (kd_brg, nm_brg, mrk_brg, stock, supplier, hrg_modal, hrg_jual) values 
          ('$data1[kd_brg]', '$data1[nm_brg]', '$data1[mrk_brg]', '$data1[sto_brg]' ,'$data1[supp_brg]', '0', '$data1[hrg_brg]')";
          mysqli_query($conn, $sql4);
          echo mysqli_error($conn);
          
     }

     $sql3 = "delete from `tabel barang temp`";
     mysqli_query($conn, $sql3);
?>