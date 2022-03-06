<?php
     include "../koneksi.php";

     $id = "%".$_POST['id']."%";
     $sql = mysqli_query($conn, "select * from transaksi where kd_trans like '$id' ");
