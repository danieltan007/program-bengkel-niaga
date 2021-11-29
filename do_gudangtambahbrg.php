<?php

include 'koneksi.php';
$nm_brg           		= $_POST['nm_brg'];
$mrk_brg       		= $_POST['mrk_brg'];
$sto_brg         		= $_POST['sto_brg'];
$supp_brg         		= $_POST['supp_brg'];
$hrg_brg				= $_POST['hrg_brg'];

$query = "select max(kd_brg) as maxkode from `tabel barang`";
$hasil = mysqli_query($conn,$query);
$data = mysqli_fetch_array($hasil);
$kode = $data['maxkode'];
$ubah = (int) substr($kode,4, 3);

$query2 = "select max(kd_brg) as maxkode from `tabel barang temp`";
$hasil2 = mysqli_query($conn,$query2);
$data2 = mysqli_fetch_array($hasil2);
$kode2 = $data2['maxkode'];
$ubah2 = (int) substr($kode2,4, 3);


if($ubah2 < $ubah)
{
     $ubah++;
     $kd_brg = "BRG-".sprintf("%03s", $ubah);
}
else
{
     $ubah2++;
     $kd_brg = "BRG-".sprintf("%03s", $ubah2);
}

$query2 = "INSERT INTO `tabel barang temp` (kd_brg, nm_brg, mrk_brg, sto_brg, supp_brg, hrg_brg) VALUES ('$kd_brg','$nm_brg','$mrk_brg','$sto_brg','$supp_brg','$hrg_brg')";
mysqli_query($conn, $query2);

?>