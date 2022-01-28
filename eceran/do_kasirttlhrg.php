<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_ecer'];
$sql = "select sum(t_hrg) as total from `daftar belanja temp` where user = '$user'";
     $result = mysqli_query($conn, $sql);
     $data = mysqli_fetch_assoc($result);

     echo $data['total'];
