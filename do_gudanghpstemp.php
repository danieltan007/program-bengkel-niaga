<?php
include "koneksi.php";

$id = $_POST['id'];

$sql = "delete from `tabel barang pusat` where kd_brg = '$id'";
mysqli_query($conn, $sql);
