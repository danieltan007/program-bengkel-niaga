<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_ecer'];
$kode = $_GET['kode'];

$sql = mysqli_query($conn, "select * from `tabel barang pusat` where kd_brg = '$kode'");
$data = mysqli_fetch_array($sql);

$sql1 = "insert into `tabel barang temp` values ('$data[kd_brg]', '$data[nm_brg]', '$data[hrg_jual]', '$data[mrk_brg]', 0, '$data[supplier]', '$user')";
echo "sql1 : $sql1";
$input = mysqli_query($conn, $sql1);