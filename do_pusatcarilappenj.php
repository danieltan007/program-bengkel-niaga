<?php
include "koneksi.php";
error_reporting();

if (empty($_POST['awal']) || empty($_POST['akhir'])) {
     echo "Masukkan Tanggal";
} else {
     $awal = $_POST['awal'];
     $akhir = $_POST['akhir'];
     $sql = "select * from `laporan penjualan` where tgl_jual between '$awal' and '$akhir' ";
     $cari = mysqli_query($conn, $sql);

     $print = "<div align='center'><a class='btn btn-info' style='width:200px;' href='do_pusatcetaklap.php?awal=$awal&akhir=$akhir'><i class='fa fa-print'></i> Print</a></div> ";
?>
     <table class="table table-striped">
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
                    <td><?php echo $data['total_harga']; ?></td>
                    <td><?php echo $data['modal_brg']; ?></td>
                    <td><?php echo $data['profit_brg']; ?></td>
               </tr>
          <?php
          }
          ?>
     </table>
<?php
}
echo $print;
?>