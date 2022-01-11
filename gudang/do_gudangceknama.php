<?php
     include "../koneksi.php";

     $nama = $_POST['nama'];

$sql = "select * from `tabel barang pusat` where nm_brg = '$nama' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_num_rows($cari);

     echo $data;
