<?php
     include "../koneksi.php";

$sql = "select sum(t_hrg) as total from `daftar grosir temp`";
     $result = mysqli_query($conn, $sql);
     $data = mysqli_fetch_assoc($result);

     echo $data['total'];
