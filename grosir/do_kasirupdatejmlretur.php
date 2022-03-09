<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_grosir'];
$kode = $_POST['kode'];
$jml = $_POST['jml'];

$sql = mysqli_query($conn, "update `tabel retur temp` set jml_brg = '$jml', total_hrg = '$jml' * hrg_brg where kd_temp = '$kode' and user = '$user'");
