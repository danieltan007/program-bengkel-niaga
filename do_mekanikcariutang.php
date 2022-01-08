<html>
<?php
include("koneksi.php");
error_reporting();

if (empty($_POST['awal']) || empty($_POST['akhir'])) {
     echo "Masukkan Tanggal :";
} else {
     $awal = $_POST['awal'];
     $akhir = $_POST['akhir'];
     $sql = "select * from `utang toko` where tgl_trns between '$awal' and '$akhir' ";
     $cari = mysqli_query($conn, $sql);

?>
     <table class="table table-striped">
          <tr>
               <th>Tanggal</th>
               <th>Nama Barang</th>
               <th>Harga Barang</th>
               <th>Jumlah Barang</th>
               <th>Total Harga</th>
               <th>Sisa Utang</th>
               <th>Nama Toko</th>
               <th>Keterangan</th>
          </tr>
          <?php
          while ($data = mysqli_fetch_array($cari)) {
          ?>
               <tr>
                    <td><?php echo $data['tgl_trns'] ?></td>
                    <td><?php echo $data['nm_brg'] ?></td>
                    <td><?php echo $data['hrg_brg'] ?></td>
                    <td><?php echo $data['jml_brg'] ?></td>
                    <td><?php echo $data['total_harga'] ?></td>
                    <td><?php echo $data['sisa_utang'] ?></td>
                    <td><?php echo $data['nm_toko'] ?></td>
                    <td><?php echo $data['ket'] ?></td>
                    <td><?php echo ' <a href="do_mekanikcariutang.php?tgl=' . $data['tgl_trns'] . '">'; ?><button class="btn btn-success" name="bayar" data-toggle="modal" data-target="#bayarutang"><i class="fa fa-money"></i> Bayar</button></a></td>
                    <td><button class="btn btn-info" name="edit" data-toggle="modal" data-target="#editutang"><i class="fa fa-edit"></i> Edit</button></td>
                    <td><input type="hidden" value="<?php echo $data['tgl_trns']; ?>" name="tgl" id="tgl"></td>
               </tr>
          <?php
          }
          ?>
     </table>
<?php
}
?>
<div class="modal fade" id="editutang">
     <div class="modal-dialog">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                    <form action="#" method="post">
                         <table class="table table-striped">
                              <tr>
                                   <td>Password</td>
                                   <td><input type="password" id="khusus"></td>
                              </tr>
                              <tr>
                                   <td>Masukkan Alasan</td>
                                   <td><input type="text" name="alasan" id="alasan" maxlength="100"></td>
                              </tr>
                         </table>
                    </form>
               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                    <button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Ubah</button>
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
               </div>

          </div>
     </div>
</div>

<div class="modal fade" id="bayarutang">
     <div class="modal-dialog">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">Pembayaran Utang</h4>
               </div>

               <?php
               $tgl = $_GET['tgl'];
               $sql = mysqli_query($conn, "SELECT * FROM `utang toko` WHERE tgl_trns='$tgl'"); // query untuk memilih entri data dengan nilai nim terpilih
               if (mysqli_num_rows($sql) == 0) {
               } else {
                    $data = mysqli_fetch_assoc($sql);
               ?>
                    <!-- Modal body -->
                    <div class="modal-body">
                         <form action="do_mekanikbayarutangtoko.php" method="post">
                              <table class="table table-striped">
                                   <tr>
                                        <td>Tanggal</td>
                                        <td><input type="text" value="<?php echo $data['tgl_trns']; ?>" name="tgl2" id="tgl2"></td>
                                   </tr>
                                   <tr>
                                        <td>Nama Barang</td>
                                        <td><input type="text" value="<?php echo $data['nm_brg'] ?>" name="nama" id="nama" maxlength="100"></td>
                                   </tr>
                                   <tr>
                                        <td>Harga</td>
                                        <td><input type="text" value="<?php echo $data['hrg_brg'] ?>" name="harga" id="harga" maxlength="100"></td>
                                   </tr>
                                   <tr>
                                        <td>Jumlah Barang</td>
                                        <td><input type="text" value="<?php echo $data['jml_brg'] ?>" name="jlh_brg" id="jlh_brg" maxlength="100"></td>
                                   </tr>
                                   <tr>
                                        <td>Total</td>
                                        <td><input type="text" value="<?php echo $data['total_harga'] ?>" name="total" id="total" maxlength="100"></td>
                                   </tr>
                                   <tr>
                                        <td>Sisa Utang</td>
                                        <td><input type="text" value="<?php echo $data['sisa_utang'] ?>" name="sisa" id="sisa" maxlength="100"></td>
                                   </tr>
                                   <tr>
                                        <td>Nama Toko</td>
                                        <td><input type="text" value="<?php echo $data['nm_toko'] ?>" name="nm_toko" id="nm_toko" maxlength="100"></td>
                                   </tr>
                                   <tr>
                                        <td>Bayar Utang</td>
                                        <td><input type="text" name="bayar" id="bayar" maxlength="100"></td>
                                   </tr>
                              </table>
                         <?php
                    }
                         ?>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                         <?php echo '<a href="do_mekanikbayarutangtoko.php">;' ?><button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Bayar</button></a>
                         <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
                    </div>
          </div>
     </div>
</div>
</form>

</html>