<?php
     include "koneksi.php";

     $awal = $_GET['tglawal'];
     $akhir = $_GET['tglakhir'];
     $tgl = date('d-m-Y');

     $sql = "select * from `detail transaksi` where tgl_trns between '$awal' and '$akhir'";
     $cek = mysqli_query($conn, $sql);
?>
     <h2 align="center">Laporan Penjualan Kasir</h2>
<br>
Tanggal Cetak: <?php echo $tgl; ?>
<br>
Periode: <?php echo $awal; ?> sampai <?php echo $akhir; ?>
<br><br>
     <table align="center" border="1" cellspacing="2" cellpadding="2">
          <tr>
               <th>Tanggal</th>
               <th>Nama Barang</th>
               <th>Merk</th>
               <th>Jumlah</th>
               <th>Harga</th>
               <th>Diskon (%)</th>
               <th>Total Harga</th>
               <th>Status</th>
          </tr>
<?php     
     while($data = mysqli_fetch_array($cek))
     {

          ?>
          <tr>
               <td><?php echo $data['tgl_trns']; ?></td>
               <td><?php echo $data['nm_brg']; ?></td>
               <td><?php echo $data['mrk_brg']; ?></td>
               <td><?php echo $data['jml_beli']; ?></td>
               <td><?php echo number_format($data['hrg_brg']); ?></td>
               <td><?php echo $data['diskon']; ?></td>
               <td><?php echo number_format($data['total_harga']); ?></td>
               <td><?php echo $data['status']; ?></td>
          </tr>
<?php
     }

     $sql2 = "select sum(total_harga) as total from `detail transaksi` where tgl_trns between '$awal' and '$akhir' ";
     $data2 = mysqli_fetch_array(mysqli_query($conn, $sql2));
?>
     </table>
<br>
Total Profit : <?php echo number_format($data2['total']); ?>


<script type="text/javascript">
	alert("berhasil melakukan print!");
	window.print();
	window.onafterprint = function(e)
	{
		closePrintView();
	}
	
	function closePrintView()
	{
		window.location.href = "kasir.php";
	}
</script>