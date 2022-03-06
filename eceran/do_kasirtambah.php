<?php
     include "../koneksi.php";
session_start();

$user = $_SESSION['id_ecer'];
$kode = $_GET['kode'];

// cek apakah ada data duplikat
$sql2 = mysqli_query($conn, "select * from `daftar belanja temp` where kd_brg = '$kode' and user = '$user'");
if (mysqli_num_rows($sql2) >= 1) {
     $sql3 = mysqli_query($conn, "update `daftar belanja temp` set jml_brg = jml_brg + 1, t_hrg = st_hrg * jml_brg where kd_brg = '$kode' and user = '$user'");
} else {
     $sql2 = mysqli_query($conn, "select max(kd_temp) as maxkode from `daftar belanja temp`");
     $data2 = mysqli_fetch_array($sql2);
     $kd_temp = $data2['maxkode'];
     $ubah = (int) substr($kd_temp, 5, 3);
     $ubah++;
     $kd_temp = "TEMP-" . sprintf("%03s", $ubah);

     $sql = "select * from `tabel barang pusat` where kd_brg = '$kode' ";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($cari);

     $sql1 = "insert into `daftar belanja temp` (kd_temp, kd_brg, nm_brg, jml_brg, diskon, st_hrg, t_hrg, merek, korting, user) values ('$kd_temp', '$kode', '$data[nm_brg]', '1', '0', '$data[hrg_jual]', '$data[hrg_jual]', '$data[mrk_brg]', '0', '$user')";
     $input = mysqli_query($conn, $sql1);
}