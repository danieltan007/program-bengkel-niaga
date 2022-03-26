<?php
     include "../koneksi.php";

     $nama = $_POST['nama'];

$sql = "select * from `riwayat pembelian` where nama = '$nama'";
     $data = mysqli_num_rows(mysqli_query($conn, $sql));
if ($data > 0) {
     echo 1;
} else {
     echo 0;
}
