<?php
     include "koneksi.php";

     $sql2 = "select * from `tabel barang temp`";
     $cari2 = mysqli_query($conn, $sql2);
     
     while ($data2=mysqli_fetch_array($cari2))
     {
          $sql = "select * from `tabel barang` where kd_brg = '$data2[kd_brg]'";
          $cari = mysqli_query($conn, $sql);
          $data = mysqli_fetch_array($cari);

          //hitung tambahan stok
          $tambahan = (int)$data2['sto_brg'] + (int)$data['sto_toko'];
          $kurang = (int)$data['sto_brg'] - (int)$data2['sto_brg'];

          $sql3 = "update `tabel barang` set sto_toko = '$tambahan', sto_brg = '$kurang' where kd_brg = '$data[kd_brg]'";
          mysqli_query($conn, $sql3);
     }

     $sql1 = "delete from `tabel barang temp`";
     mysqli_query($conn, $sql1);
?>