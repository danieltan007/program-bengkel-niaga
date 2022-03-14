<?php
include("../koneksi.php");
error_reporting();

if (empty($_POST['awal']) || empty($_POST['akhir'])) {
     echo "Masukkan Tanggal :";
} else {
     $awal = date('Y-m-d', strtotime($_POST['awal']));
     $akhir = date('Y-m-d', strtotime($_POST['akhir']));
     $print = "<a class='btn btn-success' href='do_mekanikprint.php?awal=$awal&akhir=$akhir'><i class='fa fa-print'></i> Cetak Laporan</a> ";

     $sql = "select * from `laporan penjualan` where tgl_jual between '$awal' and '$akhir' and user = 'kasir 2' ";
     $cari = mysqli_query($conn, $sql);

?>
     <table class="table table-striped table-hover">
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
          while ($data = mysqli_fetch_array($cari)) {
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
     echo $print;
}
?>