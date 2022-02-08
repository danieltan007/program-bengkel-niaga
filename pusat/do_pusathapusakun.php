<?php
include "../koneksi.php";
$id = $_GET['id'];

$sql = mysqli_query($conn, "delete from login where id = '$id'");
