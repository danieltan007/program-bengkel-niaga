<?php
     include "koneksi.php";
     error_reporting();
     
if(empty($_POST['awal']) || empty($_POST['akhir']))
{
     echo "Masukkan Tanggal Transaksi!";
}
else
{
     ?>
     <table class="table table-hover table-striped">
     <tr>
          <th>Tanggal Transaksi</th>
          <th>Nama Barang</th>
          <th>Merek Barang</th>
          <th>Jumlah Barang</th>
     </tr>
<?php
     $awal = $_POST['awal'];
     $akhir = $_POST['akhir'];

     $sql = "select * from `laporan barang keluar` where tgl_kirim between '$awal' and '$akhir' ";
     $cari = mysqli_query($conn, $sql);

     while($data = mysqli_fetch_array($cari))
     {
?>
     <tr>
          <td><?php echo $data['tgl_kirim']; ?></td>
          <td><?php echo $data['nm_brg']; ?></td>
          <td><?php echo $data['mrk_brg']; ?></td>
          <td><?php echo $data['jml_brg']; ?></td>
     </tr>
<?php
     }
?>
</table>
<br>
<div align="center">
     <a class="btn btn-info" href="do_gudangprintlapbrg.php?awal=<?php echo $awal; ?>&akhir=<?php echo $akhir; ?>"><i class="fa fa-print"></i> Print</a>
</div>
<?php
}
?>