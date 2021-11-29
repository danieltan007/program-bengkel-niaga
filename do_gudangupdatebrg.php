<?php
     include "koneksi.php";
     
     $sql = "select * from `update barang temp`"; 
     $cari = mysqli_query($conn,$sql);                 
     $date = date("d-m-Y");
     $date2 = date("Y-m-d");
?>
<h2 align="center">Laporan Barang Masuk</h2>
          <br>
          Tanggal: <?php echo $date; ?>
          <br><br>
<table align="center" border="1" cellpadding="2" cellspacing="2">
     <tr>
          <th>Nama Barang</th>
          <th>Merek</th>
          <th>Harga Barang</th>
          <th>Stock Masuk</th>
          <th>Stock Total</th>
     </tr>
<?php
     while($data = mysqli_fetch_array($cari))
     {
          $sql2 = "select * from `tabel barang` where kd_brg = '$data[kd_brg]' ";
          $data2 = mysqli_fetch_array(mysqli_query($conn, $sql2));

          //hitung tambahan stock
          $baru = (int)$data['sto_brg'];
          $lama = (int)$data2['sto_brg'];
          $tambahan = $baru + $lama;

          $sql1 = "update `tabel barang` set sto_brg = '$tambahan' where kd_brg = '$data[kd_brg]' ";
          mysqli_query($conn, $sql1);

          $sql0 = "update `tabel barang pusat` set stock = '$tambahan' where kd_brg = '$data[kd_brg]'";
          mysqli_query($conn, $sql0);

          $sql2 = "insert into `laporan barang masuk` (tgl_dtg, kd_brg, nm_brg, mrk_brg, jml_brg) values ('$date2', '$data[kd_brg]', '$data[nm_brg]', '$data[mrk_brg]', '$data[sto_brg]')";
          mysqli_Query($conn, $sql2);
          ?>
     <tr>
          <td><?php echo $data['nm_brg']; ?></td>
          <td><?php echo $data['mrk_brg']; ?></td>
          <td><?php echo $data['hrg_brg']; ?></td>
          <td><?php echo $baru; ?></td>
          <td><?php echo $tambahan; ?></td>
     </tr>
<?php          
     }

     $sql3 = "delete from `update barang temp`";
     mysqli_query($conn, $sql3);
?>
</table>

<script type="text/javascript">
	window.print();
	window.onafterprint = function(e)
	{
		closePrintView();
	}
	
	function closePrintView()
	{
		window.location.href = "gudang.php";
	}
</script>