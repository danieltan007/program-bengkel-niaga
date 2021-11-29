<?php
include "koneksi.php";

$tambahan = $_POST['tambahan'] / 100;
$sql = mysqli_query($conn, "update `tabel barang pusat` set hrg_jual = hrg_modal + (hrg_modal * $tambahan)");

if (mysqli_affected_rows($conn) > 0) {
     echo "berhasil!";
} else {
     echo "gagal!";
}
