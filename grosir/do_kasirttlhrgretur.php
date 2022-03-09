<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_grosir'];
$sql = mysqli_query($conn, "select sum(total_hrg) as total from `tabel retur temp` where user = '$user'");
$data = mysqli_fetch_array($sql);
echo $data['total'];
