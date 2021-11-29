<?php
     include "koneksi.php";

     $bayar = (int)$_POST['jmlbyr'];
     $kode = $_POST['kode'];
     $sisa = (int)$_POST['sisabyr'];

     //hitung sisa cicilan
     $sisacicil = $sisa - $bayar;

     if($sisacicil > 0)
     {
          $sql1 = "update `tabel piutang` set sisa_byr = '$sisacicil' where noktp = '$kode'";
          mysqli_query($conn, $sql1);
          echo $sisacicil;
     }
     else if ($sisacicil <= 0)
     {
          $sql = mysqli_query($conn, "select * form `tabel piutang` where noktp = '$kode'");
		$data = mysqli_fetch_array($sql);

		$update = mysqli_query($conn, "update `detail transaksi` set status = 'lunas' where id_trns = '$data[id_trns]' ");
          $delete = mysqli_query($conn, "DELETE FROM `tabel piutang` where noktp = '$kode'");
          
          echo $sisacicil;
     }
?>