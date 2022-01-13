<?php
     include "../koneksi.php";

     $nama = $_POST['nama'];
     $alamat = $_POST['alamat'];
     $nohp = $_POST['nohp'];
     $noktp = $_POST['noktp'];

     //kode MEK-001
     $query1 = "select max(id_mekanik) as maxkode from `table mekanik`";
     $hasil2 = mysqli_query($conn, $query1);
     $data4 = mysqli_fetch_array($hasil2);
     $kd_mekanik = $data4['maxkode'];
     $ubah1 = (int) substr($kd_mekanik, 4, 3);
     $ubah1++;
     $kd_mekanik = "MEK-" . sprintf("%03s", $ubah1);

     $sql = mysqli_query($conn, "insert into `table mekanik` values ('$kd_mekanik', '$nama', '$nohp', '$noktp') ");
     
?>