<?php
include "../koneksi.php";

$awal = $_GET['awal'];
$akhir = $_GET['akhir'];
?>

<h2 align="center">Laporan Barang Masuk</h2>
<h4 align="center">Di Cetak: <?php echo date('d-m-Y'); ?></h4>
<br><br>
Periode: <?php echo $awal; ?> sampai <?php echo $akhir; ?>
<br><br>
<table align="center" border="1" cellpadding="2" cellspacing="2">
     <tr>
          <th>Tanggal Transaksi</th>
          <th>Nama Barang</th>
          <th>Merek Barang</th>
          <th>Jumlah Barang</th>
     </tr>
     <?php
     $sql = "select * from `laporan barang masuk` where tgl_dtg between '$awal' and '$akhir' ";
     $cari = mysqli_query($conn, $sql);

     $sql1 = "select sum(jml_brg) as jumlah from `laporan barang masuk` where tgl_dtg between '$awal' and '$akhir' ";
     $cari2 = mysqli_query($conn, $sql1);
     $data2 = mysqli_fetch_array($cari2);

     while ($data = mysqli_fetch_array($cari)) {
     ?>
          <tr>
               <td><?php echo $data['tgl_dtg']; ?></td>
               <td><?php echo $data['nm_brg']; ?></td>
               <td><?php echo $data['mrk_brg']; ?></td>
               <td><?php echo $data['jml_brg']; ?></td>
          </tr>
     <?php
     }
     ?>
</table>
<br>
Jumlah Barang Masuk : <?php echo $data2['jumlah']; ?>

<script type="text/javascript">
     window.print();
     window.onafterprint = function(e) {
          closePrintView();
     }

     function closePrintView() {
          window.location.href = "gudang.php";
     }
</script>