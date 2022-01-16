<form action="do_gudangupdatebrg.php" method="post" id="updatebrg">
     <table class="table table-borderless table-striped">
          <tr>
               <th>Nama</th>
               <th>Merek</th>
               <th>Supplier</th>
               <th>Stock</th>
               <!-- <th>Harga</th> -->
          </tr>
          <?php
          include "../koneksi.php";
          $sql = "select * from `update barang temp`";
          $cari = mysqli_query($conn, $sql);

          while ($data = mysqli_fetch_array($cari)) { ?>
               <tr>
                    <td><?php echo $data['nm_brg']; ?></td>
                    <td><?php echo $data['mrk_brg']; ?></td>
                    <td><?php echo $data['supp_brg']; ?></td>
                    <td><input type="number" id="stockbrg-<?php echo $data['kd_brg']; ?>" value="<?php echo $data['sto_brg']; ?>"></td>
                    <!-- <td><?php echo $data['hrg_brg']; ?></td> -->

                    <td><a class="btn btn-danger" href="do_gudanghpsupdate.php?kode=<?php echo $data['kd_brg']; ?>" id="hapus-<?php echo $data['kd_brg']; ?>"><i class="fa fa-close"></i> Hapus</a></td>
               </tr>
          <?php } ?>
     </table>
     <br>
     <div align="center">
          <button class="btn btn-success" type="submit"><i class="fa fa-plus-circle"></i> Tambahkan ke stok</button>
     </div>
</form>