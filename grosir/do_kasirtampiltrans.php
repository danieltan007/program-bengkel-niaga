<?php
include "../koneksi.php";

if (empty($_POST['awal']) || empty($_POST['akhir'])) {
     echo "Masukkan Tanggal Transaksi!";
} else {
?>
     <table class="table table-striped">
          <tr>
               <th>Tanggal</th>
               <th>Nama Barang</th>
               <th>Merk</th>
               <th>Jumlah</th>
               <th>Harga</th>
               <th>Diskon (%)</th>
               <th>Total Harga</th>
          </tr>
          <?php
          $tglawal = $_POST['awal'];
          $tglakhir = $_POST['akhir'];

          $sql = "select * from `detail transaksi` where tgl_trns between '$tglawal' and '$tglakhir'";
          $cek = mysqli_query($conn, $sql);

          while ($data = mysqli_fetch_array($cek)) {
          ?>
               
               <tr>
                    <td><?php echo $data['tgl_trns'] ?></td>
                    <td><?php echo $data['nm_brg'] ?></td>
                    <td><?php echo $data['mrk_brg'] ?></td>
                    <td><?php echo $data['jml_beli'] ?></td>
                    <td><?php echo $data['hrg_brg'] ?></td>
                    <td><?php echo $data['diskon'] ?></td>
                    <td><?php echo $data['total_harga'] ?></td>
               </tr>
     <?php
          }
     }
     ?>
     </table>