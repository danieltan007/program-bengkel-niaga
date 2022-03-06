<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_mekanik'];
$kode = $_GET['kode'];

$sql2 = mysqli_query($conn, "select * from `barang mekanik temp` where kd_brg = '$kode' and user = '$user'");
if (mysqli_num_rows($sql2) >= 1) {
     $sql3 = mysqli_query($conn, "update `barang mekanik temp` set jml = jml + 1, total = hrg_brg * jml where kd_brg = '$kode' and user = '$user'");
} else {
     $sql2 = mysqli_query($conn, "select max(kd_temp) as maxkode from `barang mekanik temp`");
     $data2 = mysqli_fetch_array($sql2);
     $kd_temp = $data2['maxkode'];
     $ubah = (int) substr($kd_temp, 5, 3);
     $ubah++;
     $kd_temp = "TEMP-" . sprintf("%03s", $ubah);

     $sql1 = "select * from `tabel barang pusat` where kd_brg = '$kode'";
     $cari = mysqli_query($conn, $sql1);
     $data1 = mysqli_fetch_array($cari);

     $sql = "insert into `barang mekanik temp` (kd_temp, kd_brg, nm_brg, mrk_brg, jml, hrg_brg, total, diskon, korting, user) values ('$kd_temp', '$data1[kd_brg]', '$data1[nm_brg]', '$data1[mrk_brg]', 1, '$data1[hrg_jual]', '$data1[hrg_jual]', 0 ,0, '$user') ";
     mysqli_query($conn, $sql);
}