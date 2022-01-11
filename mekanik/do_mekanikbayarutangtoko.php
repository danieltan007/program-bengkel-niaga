<?php
include "../koneksi.php";
$tgl = $_POST['tgl2'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jlh_brg = $_POST['jlh_brg'];
$total = $_POST['total'];
$bayar = $_POST['bayar'];
$nm_toko = $_POST['nm_toko'];
$sisa = $_POST['sisa'];
$cek = mysqli_query($conn, "SELECT * FROM `utang toko` where tgl_trns= '$tgl' and nm_brg = '$nama'"); 
if(mysqli_num_rows($cek) == 0){
echo 'Data tidak ditemukan.'; 
}else{
$lunas = $sisa - $bayar ;
if ($lunas > 0) {
	$update = mysqli_query($conn, "UPDATE `utang toko` SET tgl_trns='$tgl',nm_brg='$nama', hrg_brg='$harga',jml_brg='$jlh_brg', total_harga='$total', sisa_utang='$lunas', nm_toko='$nm_toko', ket='Belum Lunas' WHERE tgl_trns='$tgl' and nm_brg='$nama'");
	echo 'Utangmu belum lunas';
	} else if ($lunas <= 0){
	$update = mysqli_query($conn, "UPDATE `utang toko` SET tgl_trns='$tgl',nm_brg='$nama', hrg_brg='$harga',jml_brg='$jlh_brg', total_harga='$total', sisa_utang='$lunas', nm_toko='$nm_toko', ket='Lunas' WHERE tgl_trns='$tgl' and nm_brg='$nama'");
	echo 'Utangmu sudah lunas';
}
}
