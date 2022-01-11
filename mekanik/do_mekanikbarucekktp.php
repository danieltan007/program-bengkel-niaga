<?php
include "../koneksi.php";

$noktp = $_POST['noktp'];

$sql = "select * from `table mekanik` where no_ktp = '$noktp'";
$data = mysqli_num_rows(mysqli_query($conn, $sql));

echo $data;
