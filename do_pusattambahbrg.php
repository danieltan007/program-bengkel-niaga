<?php

include 'koneksi.php';
$nm_brg   = $_POST['nm_brg'];
$mrk_brg  = $_POST['mrk_brg'];
$sto_brg  = $_POST['sto_brg'];
$supp_brg = $_POST['supp_brg'];
$hrg_jual = $_POST['input_jual'];
$hrg_beli = $_POST['input_modal'];

$query = "select max(kd_brg) as maxkode from `tabel barang pusat`";
$hasil = mysqli_query($conn, $query);
$data = mysqli_fetch_array($hasil);
$kode = $data['maxkode'];
$ubah = (int) substr($kode, 4, 3);

$query2 = "select max(kd_brg) as maxkode from `tabel pusat temp`";
$hasil2 = mysqli_query($conn, $query2);
$data2 = mysqli_fetch_array($hasil2);
$kode2 = $data2['maxkode'];
$ubah2 = (int) substr($kode2, 4, 3);

print_r(mysqli_error($conn));
if ($ubah2 < $ubah) {
     $ubah++;
     $kd_brg = "BRG-" . sprintf("%03s", $ubah);
} else {
     $ubah2++;
     $kd_brg = "BRG-" . sprintf("%03s", $ubah2);
}

$query2 = "INSERT INTO `tabel pusat temp` (kd_brg, nm_brg, mrk_brg, sto_brg, supp_brg, hrg_modal, hrg_jual) VALUES ('$kd_brg','$nm_brg','$mrk_brg','$sto_brg','$supp_brg','$hrg_beli' ,'$hrg_jual')";
mysqli_query($conn, $query2);
if (mysqli_affected_rows($conn) > 0) {
     echo "berhasil";
} else {
     echo "Gagal";
}
