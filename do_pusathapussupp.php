<?php
include "koneksi.php";

if(empty($_POST['pass']))
{
     exit("masukkan password!"); 
}
else
{
     $kode = $_POST['kode'];
     $cek = mysqli_query($conn, "DELETE FROM `tabel supplier` where id_supp = '$kode'"); 
     echo "berhasil menghapus data!";
}
