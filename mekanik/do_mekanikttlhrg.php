<?php
     include "../koneksi.php";

     $sql = "select sum(total) as total from `daftar layanan temp`";
     $result = mysqli_query($conn, $sql);
     $data = mysqli_fetch_assoc($result);

     echo $data['total'];
