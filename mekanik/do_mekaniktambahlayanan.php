<?php
     include "../koneksi.php";
session_start();
     $jenis = $_POST['jenis'];
     $pilihan = $_POST['pilihan'];
     $toko = $_POST['toko'];
     $namabrg = $_POST['nbrg'];
     $hbrg = $_POST['hbrg'];
     $jmlbrg = $_POST['jmlbrg'];
     $thrg = (int)$_POST['thrg'];
     $ongkos = (int)$_POST['ongkos'];
     $tgl = date("Y-m-d");
$user = $_SESSION['id_mekanik'];

     if($pilihan  == 'toko')
     {
          $sql1 = "select * from `barang mekanik temp`";
          $cari1 = mysqli_query($conn, $sql1);
          
          while($data1 = mysqli_fetch_array($cari1))
          {
               //hitung total harga
               $totalharga = (int)$data1['total'] + (int)$ongkos;

          $sql = "select max(kd_temp) as maxkode from `daftar layanan temp` ";
               $cari = mysqli_query($conn, $sql);
               $data = mysqli_fetch_array($cari);
          $ubah = (int) substr(
               $data['kd_temp'],
               5,
               3
          );
          $ubah++;
          $kd_temp = "TEMP-" . sprintf("%03s", $ubah);

               $sql2 = "insert into `daftar layanan temp` 
               (kd_temp, kd_brg, nm_brg, ongkos, jenis, jml_brg, hrg_brg, total, sumber, subtotal, merek, diskon, korting, user) values 
               ('$kd_temp', '$data1[kd_brg]', '$data1[nm_brg]', '$ongkos', '$jenis', '$data1[jml]', '$data1[hrg_brg]', '$totalharga', 'stok toko', '$data1[total]' ,'$data1[mrk_brg]', '$data1[diskon]', '$data1[korting]', '$user')";
          mysqli_query($conn, $sql2);
          }

          $sql3 = "delete from `barang mekanik temp`";
          mysqli_query($conn, $sql3);
     }
     else if($pilihan == 'tokolain')
     {
     $sql = "select max(kd_temp) as maxkode from `daftar layanan temp` ";
          $cari = mysqli_query($conn, $sql);
          $data = mysqli_fetch_array($cari);
     $ubah = (int) substr($data['kd_temp'], 5, 3);
     $ubah++;
     $kd_temp = "TEMP-" . sprintf("%03s", $ubah);

          //hitung total harga
          $totalharga = $thrg + $ongkos;

     $sql2 = "insert into `daftar layanan temp` (kd_temp, kd_brg, nm_brg, ongkos, jenis, jml_brg, hrg_brg, total, sumber, subtotal, toko, merek, diskon, korting, user) values 
          ('$kd_temp', '0', '$namabrg', '$ongkos', '$jenis', '$jmlbrg', '$hbrg', '$totalharga', 'toko lain', '$thrg' , '$toko' ,'$data[mrk_brg]', '$data[diskon]', '0', '$user')";
          mysqli_query($conn, $sql2);

          $sql4 = "delete from `barang mekanik temp`";
          mysqli_query($conn, $sql4);
     }
     else if($pilihan == 'pembeli')

$sql = "select max(kd_temp) as maxkode from `daftar layanan temp` ";
          $cari = mysqli_query($conn, $sql);
          $data = mysqli_fetch_array($cari);
$ubah = (int) substr($data['kd_temp'], 5, 3);
$ubah++;
$kd_temp = "TEMP-" . sprintf("%03s", $ubah);

$sql2 = "insert into `daftar layanan temp` (kd_temp, kd_brg, nm_brg, ongkos, jenis, jml_brg, hrg_brg, total, sumber, subtotal, merek, diskon, korting, user) values ('$kd_temp', '0', '', '$ongkos', '$jenis', '0', '0', '$ongkos', 'pembeli', '0' ,'$data[mrk_brg]', '$data[diskon]', '0', '$user') ";
          mysqli_query($conn, $sql2);

          $sql3 = "delete from `barang mekanik temp`";
          mysqli_query($conn, $sql3);
     }
