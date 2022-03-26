<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_ecer'];
$total_harga = $_POST['total_harga'];
$date = date('Y-m-d');
mysqli_autocommit($conn, false);
$sql = mysqli_query($conn, "select * from `tabel retur temp` where user = '$user'");
while ($data = mysqli_fetch_array($sql)) {
     $kode = $data['kd_trans'];
     $jml = $data['jml_brg'];
     $hrg = $data['hrg_brg'];
     $total = $data['total_hrg'];

     // cek apakah user menginput barangnya lebih dari jumlah yang ada di tabel detail transaksi
     $sql2 = mysqli_query($conn, "select * from `detail transaksi` where id_trans = '$kode'");
     $data2 = mysqli_fetch_array($sql2);
     $jml_beli = $data2['jml_beli'];
     $nama_brg = $data2['nm_brg'];
     $kd_brg = $data2['kd_brg'];
     
     if ($jml > $jml_beli) {
          mysqli_rollback($conn);
          exit("
               <script>
                    alert('Jumlah Barang " . $nama_brg . " tidak mencukupi!');
                    window.location.href = 'kasir.php';
               </script>");
     } else {
          $sql2 = mysqli_query($conn, "select max(kd_retur) as maxkode from `tabel retur`");
          $data2 = mysqli_fetch_array($sql2);
          $kd_retur = $data2['maxkode'];
          $noUrut = (int) substr($kd_retur, 4, strlen($kd_retur));
          $noUrut++;
          $kd_retur = "RTR-" . sprintf("%03s", $noUrut);

          $query3 = "insert into `tabel retur` values ('$kd_retur','$date','$kode','$jml','$hrg','$total')";
          $sql3 = mysqli_query($conn, $query3);
          $sql4 = mysqli_query($conn, "update `tabel barang pusat` set stock_gudang = stock_gudang + $jml where kd_brg = '$kd_brg'");
     }
}

if (mysqli_commit($conn)) {
     mysqli_query($conn, "delete from `tabel retur temp` where user = '$user'");
     echo 1;
} else {
     echo 2;
     mysqli_rollback($conn);
}
