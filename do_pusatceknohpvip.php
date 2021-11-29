<?php
     include "koneksi.php";

     $nohp = $_POST['nohp'];

     $sql = "select * from `tabel supplier` where nohp_supp = '$nohp' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_num_rows($cari);

     echo $data;
?>