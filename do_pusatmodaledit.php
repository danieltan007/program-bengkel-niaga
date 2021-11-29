<?php
     include "koneksi.php";

     $namabrg = $_POST['editnama'];
     $merek = $_POST['ubahmerek'];
     $supp = $_POST['editsupp'];
     $stock = $_POST['editstok'];
     $modal = $_POST['modal'];
     $hrgjual = $_POST['hrgjual'];
     $kode = $_POST['kode'];

     $sql = "update `tabel barang pusat` set nm_brg = '$namabrg', mrk_brg = '$merek', hrg_jual = '$hrgjual', stock = '$stock', supplier = '$supp', hrg_modal = '$modal' where kd_brg = '$kode'";
     mysqli_query($conn, $sql);

     $sql1 = "update `tabel barang` set nm_brg = '$namabrg', mrk_brg = '$merek', hrg_brg = '$hrgjual', sto_brg = '$stock', supp_brg = '$supp' where kd_brg = '$kode'";
     mysqli_query($conn, $sql1);

     echo "data berhasil di ubah!";
?>