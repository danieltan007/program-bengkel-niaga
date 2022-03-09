<?php
include "../koneksi.php";
session_start();
$user = $_SESSION['id_grosir'];
$kode = $_GET['kode'];
$sql = mysqli_query($conn, "delete from `tabel retur temp` where kd_temp = '$kode' and user = '$user'");
