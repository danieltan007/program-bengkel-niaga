<?php
include "../koneksi.php";

$id = $_POST['id'];
$sql = mysqli_query($conn, "select * from login where id = '$id'");

if ($data = mysqli_fetch_array($sql)) {
     echo 2;
} else {
     echo 1;
}
