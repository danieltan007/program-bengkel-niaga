<?php
include '../koneksi.php';

$mrk_brg = $_POST['merek'];

$sql = "select * from `table merek` where mrk_brg = '$mrk_brg' ";
$cari = mysqli_query($conn,$sql);
$data = mysqli_num_rows($cari);


if($data>0)
{
	echo "data sudah terdaftar";
}
else 
{
	$query = "select max(kd_merk) as maxkode from `table merek`";
	$hasil = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($hasil);
	$kode = $data['maxkode'];
	$ubah = (int) substr($kode,4, 3);
	$ubah++;
	$kd_mrk = "MRK-".sprintf("%03s", $ubah);

	$query2 = "INSERT INTO `table merek` (kd_merk, mrk_brg) VALUES ('$kd_mrk', '$mrk_brg')";
	mysqli_query($conn, $query2);
	echo "data berhasil di input";
}
