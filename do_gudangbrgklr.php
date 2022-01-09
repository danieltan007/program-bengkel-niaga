<?php
include "koneksi.php";

$tgl1 = date('d-m-Y');
$tgl2 = date('Y-m-d');
$total = 0;
?>
<h2 align="center">Data Barang Keluar</h2>
Tanggal cetak: <?php echo $tgl1 ?>
<br><br>

<table align="center" border="1" cellpadding="2" cellspacing="2">
     <tr>
          <th>Nama Barang</th>
          <th>Merek</th>
          <th>Jumlah Barang</th>
          <th>Harga Satuan</th>
          <th>Sub Total</th>
     </tr>

     <?php
     $sql1 = "select * from `update barang temp`";
     $cari = mysqli_query($conn, $sql1);

     while ($data = mysqli_fetch_array($cari)) {
          $sql = "insert into `laporan barang keluar` (tgl_kirim, kd_brg, nm_brg, mrk_brg, jml_brg) values ('$tgl2', '$data[kd_brg]', '$data[nm_brg]', '$data[mrk_brg]', '$data[sto_brg]')";
          mysqli_query($conn, $sql);

          $sql2 = "select * from `tabel barang pusat` where kd_brg = '$data[kd_brg]'";
          $cari2 = mysqli_query($conn, $sql2);
          $data2 = mysqli_fetch_array($cari2);

          //hitung total harga
          $hrgbrg = (int)$data2['hrg_jual'];
          $jml = (int)$data['sto_brg'];
          $subtotal = $hrgbrg * $jml;
          $total = $total + $subtotal;

          //hitung pengurangan stok
          $stoklama  = (int)$data2['stock_gudang'];
          $keluar = (int)$data['sto_brg'];
          $stokbaru = $stoklama - $keluar;

          //update barang
          $sql3 = "update `tabel barang pusat` set stock_gudang = '$stokbaru' where kd_brg = '$data[kd_brg]' ";
          mysqli_query($conn, $sql3);
     ?>
          <tr>
               <td><?php echo $data['nm_brg']; ?></td>
               <td><?php echo $data['mrk_brg']; ?></td>
               <td><?php echo $data['sto_brg']; ?></td>
               <td><?php echo number_format($data['hrg_brg']); ?></td>
               <td><?php echo number_format($subtotal); ?></td>
          </tr>
     <?php
     }

     $sql3 = "delete from `update barang temp`";
     mysqli_query($conn, $sql3);
     ?>
     <tr>
          <td colspan="4">Total Harga</td>
          <td><?php echo number_format($total); ?></td>
     </tr>
</table>
<br>
<p align="center">Jangan lupa untuk mengecek kembali barang nya</p>

<script type="text/javascript">
     window.print();
     window.onafterprint = function(e) {
          closePrintView();
     }

     function closePrintView() {
          window.location.href = "gudang.php";
     }
</script>