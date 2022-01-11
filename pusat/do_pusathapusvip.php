<?php
include "../koneksi.php";

if (empty($_POST['pass'])) {
     exit("masukkan password!");
} else {
     $kode = $_POST['kode'];
     $cek = mysqli_query($conn, "DELETE FROM `tabel pelanggan vip` where id_vip = '$kode'");
     echo "berhasil menghapus data!";
}
