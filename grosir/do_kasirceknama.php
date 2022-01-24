<?php
     include "../koneksi.php";

     $nama = $_POST['nama'];

$sql = "select * from `tabel transaksi grosir` where nama = '$nama'";
     $data = mysqli_num_rows(mysqli_query($conn, $sql));

     echo $data;
