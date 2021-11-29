<?php
     include "koneksi.php";

     $nohp = $_POST['nohp'];

     $sql = "select * from `tabel pelanggan vip` where nohp = '$nohp' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_num_rows($cari);

     echo $data;
?>