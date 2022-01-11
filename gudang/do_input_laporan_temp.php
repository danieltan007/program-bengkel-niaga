<?php

include '../koneksi.php';
// menyimpan data kedalam variabel
//$kd_brg           		= $_POST['kd_brg '];
$nm_brg           		= $_POST['nm_brg'];
$mrk_brg       			= $_POST['mrk_brg'];
$ktrg_brg  				= $_POST['ktrg_brg'];
$sto_brg         		= $_POST['sto_brg'];
$supp_brg         		= $_POST['supp_brg'];
$hrg_brg				= $_POST['hrg_brg'];

$sql = "select * from `tabel input laporan temp` where nm_brg = '$nm_brg'";
$cari = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($cari);


if ($data > 0) {
	echo "data sudah terdaftar";
} else {
	$query = "select max(kd_brg) as maxkode from `tabel input laporan temp`";
	$hasil = mysqli_query($conn, $query);
	$data = mysqli_fetch_array($hasil);
	$kode = $data['maxkode'];
	$ubah = (int) substr($kode, 3, 3);
	$ubah++;
	$kd_brg = "KD-" . sprintf("%03s", $ubah);

	$query2 = "INSERT INTO `tabel input laporan temp` (kd_brg,nm_brg,mrk_brg,ktrg_brg,sto_brg,supp_brg,hrg_brg) VALUES ('$kd_brg','$nm_brg','$mrk_brg','$ktrg_brg','$sto_brg','$supp_brg','$hrg_brg')";
	mysqli_query($conn, $query2);
	echo "data berhasil di input";
	header('Location: gudang.php');
}
