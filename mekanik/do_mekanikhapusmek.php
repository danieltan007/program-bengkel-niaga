<?php
include "../koneksi.php";

$kd_mekanik = $_GET['kode'];

$sql = "delete from table_mekanik where kd_mekanik='$kd_mekanik'";
$query = mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
     echo 1;
} else {
     echo 2;
}
