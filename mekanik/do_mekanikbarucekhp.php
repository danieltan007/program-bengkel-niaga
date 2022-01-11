<?php
include "../koneksi.php";

$nohp = $_POST['nohp'];

$sql = "select * from `table mekanik` where `no_hp` = '$nohp'";
$data = mysqli_num_rows(mysqli_query($conn, $sql));

echo $data;
