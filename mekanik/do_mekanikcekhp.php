<?php
     include "../koneksi.php";

     $nohp = $_POST['nohp'];

     $sql = "select * from `tabel piutang` where `no hp` = '$nohp'";
     $data = mysqli_num_rows(mysqli_query($conn, $sql));

     echo $data;
