<?php
     include "../koneksi.php";
     $namabrg = $_POST['editnama'];
     $merek = $_POST['ubahmerek'];
     $supp = $_POST['editsupp'];
     $stock = $_POST['editstok'];
     $harga = $_POST['edithrg'];
     $kode = $_POST['kode'];

     $sql = "update `tabel barang pusat` set nm_brg = '$namabrg', mrk_brg = '$merek', hrg_jual = '$harga', stock_toko = '$stock', supp_brg = '$supp' where kd_brg = '$kode'";
     mysqli_query($conn, $sql);

     if(mysqli_affected_rows($conn) < 1)
     {
          echo "Data gagal di edit! Silahkan coba lagi!";
     }
     else
     {
           echo "Data berhasil di edit!";
     }
