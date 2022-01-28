<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_ecer'];
$sql2 = "select * from `tabel barang temp`";
$cari2 = mysqli_query($conn, $sql2);

while ($data2 = mysqli_fetch_array($cari2)) {
     $sql = "select * from `tabel barang pusat` where kd_brg = '$data2[kd_brg]'";
     $cari = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($cari);

     //hitung tambahan stok
     $tambahan = (int)$data2['sto_brg'] + (int)$data['stock_toko'];
     $kurang =  (int)$data['stock_gudang'] - (int)$data2['sto_brg'];

     if (empty($kurang)) {
          $kurang = 0;
     } else if ($kurang < 0) {
          exit("Stock barang " . $data['nm_brg'] . " tidak mencukupi");
     }

     $sql3 = "update `tabel barang pusat` set stock_toko = '$tambahan', stock_gudang = '$kurang' where kd_brg = '$data[kd_brg]'";
     mysqli_query($conn, $sql3);
}

$sql1 = "delete from `tabel barang temp` where user = '$user'";
mysqli_query($conn, $sql1);

if (mysqli_affected_rows($conn) > 0) {
     echo 1;
} else {
     echo 2;
}
