<?php
     include "../koneksi.php";

     $nama = $_POST['nama'];

     $sql = "select * from `tabel supplier` where nm_supp = '$nama' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_num_rows($cari);

     echo $data;
