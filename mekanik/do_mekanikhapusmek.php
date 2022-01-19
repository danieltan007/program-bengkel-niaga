<?php
include "../koneksi.php";

$kd_mekanik = $_GET['kode'];

$sql = "delete from `table mekanik` where id_mekanik = '$kd_mekanik'";
$query = mysqli_query($conn, $sql);
