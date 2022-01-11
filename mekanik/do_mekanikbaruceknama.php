<?php
include "../koneksi.php";

$nama = $_POST['nama'];

$sql = "select * from `table mekanik` where nm_mekanik = '$nama'";
$data = mysqli_num_rows(mysqli_query($conn, $sql));

echo $data;
