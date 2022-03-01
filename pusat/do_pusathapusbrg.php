<?php
include "../koneksi.php";

$kode = $_POST['kode2'];
$sql = mysqli_query($conn, "delete from `tabel barang pusat` where kd_brg = '$kode' ");
if (mysqli_affected_rows($conn) > 0) {
     echo 1;
} else {
     echo 2;
}
