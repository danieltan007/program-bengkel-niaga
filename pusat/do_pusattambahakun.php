<?php
include "../koneksi.php";

$id = $_POST['id'];
$password = $_POST['password'];
$posisi = $_POST['posisi'];

$sql = mysqli_query($conn, "insert into login values ('', '$id', '$password', '$posisi')");
if (mysqli_affected_rows($conn) > 0) {
     echo 1;
} else {
     echo 2;
}
