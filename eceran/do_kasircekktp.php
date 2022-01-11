<?php
     include "../koneksi.php";

     $noktp = $_POST['noktp'];

     $sql = "select * from `tabel piutang` where noktp = '$noktp'";
     $data = mysqli_num_rows(mysqli_query($conn, $sql));

     echo $data;
