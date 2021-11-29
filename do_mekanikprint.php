<?php
    include "koneksi.php";

    $awal = $_GET['awal'];
    $akhir = $_GET['akhir'];
    $tgl = date("d-m-Y");

    $sql = "select * from `laporan penjualan` where tgl_jual between '$awal' and '$akhir' and user = 'kasir 2' ";
    $cari = mysqli_query($conn,$sql);

?>
<h2 align="center">Laporan Penjualan Kasir Mekanik</h2>
<br>
Dicetak Tanggal: <?php echo $tgl; ?><br>
Periode Laporan = <?php echo $awal; ?> sampai <?php echo $akhir; ?>
<br><br>
<table cellpadding="2" cellspacing="2" border="1" align="center">
	<tr>
          <th>Tanggal</th> 
          <th>Reparasi</th>
          <th>Nama Barang</th>
          <th>Harga Barang</th>
          <th>Jumlah Barang</th>
          <th>Sumber Barang</th>
          <th>Nama Mekanik</th>
          <th>Ongkos</th>
          <th>Subtotal</th>
          <th>Total</th>
     </tr>
<?php
while ($data = mysqli_fetch_array($cari))
{ 
     $sql1 = "select * from `laporan pekerjaan mekanik` where `id_lap_jual` = '$data[id_lap_jual]'";
     $cari1 = mysqli_query($conn, $sql1);
     $data1 = mysqli_fetch_array($cari1);

     $namamekanik = $data1['nm_mknk'];

     $subtotal = (int)$data['jumlah'] * (int)$data['harga_jual'];
     ?>
     <tr>
          <td><?php echo $data['tgl_jual']; ?></td>
          <td><?php echo $data['jasa']; ?></td>
          <td><?php echo $data['nm_brg']; ?></td>
          <td><?php echo $data['harga_jual']; ?></td>
          <td><?php echo $data['jumlah']; ?></td>
          <td><?php echo $data['sumber']; ?></td>
          <td><?php echo $namamekanik; ?></td>
          <td><?php echo $data['ongkos']; ?></td>
          <td><?php echo $subtotal; ?></td>
          <td><?php echo $data['total_harga']; ?></td>
     </tr>
     <?php 
} ?>
</table>
<?php
    $sql2 = "select sum(total_harga) as total from `laporan penjualan` where tgl_jual between '$awal' and '$akhir' and user = 'kasir 2' ";
    $cari2 = mysqli_query($conn, $sql2);
    $data2 = mysqli_fetch_array($cari2);
?>
<br>
Total Profit : <?php echo $data2['total']; ?>

<script type="text/javascript">
	alert("berhasil melakukan print!");
	window.print();
	window.onafterprint = function(e)
	{
		closePrintView();
	}
	
	function closePrintView()
	{
		window.location.href = "mekanik.php";
	}
</script>