<?php
include "../koneksi.php";

if(empty($_POST['khusus']))
{
     exit("masukkan password!"); 
}
else
{
	$kode = $_POST['kode'];
	$bayar = $_POST['byr'];
	$sisa = $_POST['sisa_byr'];
	$cek = mysqli_query($conn, "SELECT * FROM `tabel piutang` where noktp = '$kode'"); 

	$lunas = $sisa - $bayar;
	if ($lunas > 0) 
	{
		$sql1 = "update `tabel piutang` set sisa_byr = '$lunas' where noktp = '$kode' ";
		mysqli_query($conn, $sql1);

		echo $lunas;
	} 
	else if ($lunas <= 0)
	{
		$sql = mysqli_query($conn, "select * form `tabel piutang` where noktp = '$kode'");
		$data = mysqli_fetch_array($sql);

		$update = mysqli_query($conn, "update `detail transaksi` set status = 'lunas' where id_trns = '$data[id_trns]' ");
		$delete = mysqli_query($conn, "DELETE FROM `tabel piutang` where noktp = '$kode'");

		echo $lunas;
	}
}
