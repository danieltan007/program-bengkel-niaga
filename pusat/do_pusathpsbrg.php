<?php
include "../koneksi.php";

$kode = $_POST['kode2'];

$sql1 = "delete from `tabel barang pusat` where kd_brg = '$kode'";
mysqli_query($conn, $sql1);
