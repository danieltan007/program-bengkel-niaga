<?php
include "../koneksi.php";

$awal = $_GET['awal'];
$akhir = $_GET['akhir'];
$hariini = date("d-m-Y");

//hitung jumlah profit
$sql1 = "select count(profit_brg) as jumlah from `laporan penjualan` where tgl_jual between '$awal' and '$akhir' ";
$simpan = mysqli_query($conn, $sql1);
$data1 = mysqli_fetch_array($simpan);

$sql = "select * from `laporan penjualan` where tgl_jual between '$awal' and '$akhir' ";
$cari = mysqli_query($conn, $sql);

?>
<h2 align="center">Laporan Penjualan</h2>
<br>
Periode Tanggal: <?php echo $awal; ?> sampai <?php echo $akhir; ?><br>
Dicetak pada tanggal: <?php echo $hariini; ?>
<br>
<table border="1" cellpadding="2" cellspacing="2">
     <tr>
          <th>Tanggal</th>
          <th>User</th>
          <th>Barang</th>
          <th>Jasa</th>
          <th>Jumlah</th>
          <th>Total Harga</th>
          <th>Modal</th>
          <th>Profit</th>
     </tr>
     <?php
     while ($data = mysqli_fetch_array($cari)) { ?>
          <tr>
               <td><?php echo $data['tgl_jual']; ?></td>
               <td><?php echo $data['user']; ?></td>
               <td><?php echo $data['nm_brg']; ?></td>
               <td><?php echo $data['jasa']; ?></td>
               <td><?php echo $data['jumlah']; ?></td>
               <td><?php echo $data['harga_jual']; ?></td>
               <td><?php echo $data['modal_brg']; ?></td>
               <td><?php echo $data['profit_brg']; ?></td>
          </tr>
     <?php
     }
     ?>
</table>
<br>
<p>Jumlah Keuntungan = <?php echo $data1['jumlah']; ?></p>