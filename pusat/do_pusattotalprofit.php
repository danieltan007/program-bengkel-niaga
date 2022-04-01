<?php
include "../koneksi.php";

$awal = date('Y-m-d', strtotime($_POST['awal4']));
$akhir = date('Y-m-d', strtotime($_POST['akhir4']));

$sql = mysqli_query($conn, "select sum(profit_brg) as profit_eceran from `laporan penjualan` where tgl_jual between '$awal' and '$akhir' ");
$data = mysqli_fetch_array($sql);
$profit_eceran = $data['profit_eceran'];

$sql2 = mysqli_query($conn, "select sum(profit_brg) as profit_grosir from `laporan penjualan` where not EXISTS (select id_trns from `riwayat pembelian` where `laporan penjualan`.`id_trns` = `riwayat pembelian`.`id_trans`) and tgl_jual BETWEEN '$awal' and '$akhir'");
$data2 = mysqli_fetch_array($sql2);
$profit_grosir = $data2['profit_grosir'];

$total = $profit_eceran + $profit_grosir;

?>

<h3>Total Keuntungan</h3>
<p>Periode <?= date('d-m-Y', strtotime($awal)); ?> Sampai <?= date('d-m-Y', strtotime($akhir)); ?></p>
<table class="table table-bordered">
     <tr>
          <th>Profit Eceran</th>
          <th>Profit Grosir</th>
          <th>Total Profit</th>
     </tr>
     <tr>
          <td><?php echo number_format($profit_eceran); ?></td>
          <td><?php echo number_format($profit_grosir); ?></td>
          <td><?php echo number_format($total); ?></td>
     </tr>