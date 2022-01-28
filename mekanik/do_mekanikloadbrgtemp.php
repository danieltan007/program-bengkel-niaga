<td colspan="2">
     <div class="container">
          <h4 align="center">Daftar Barang</h4>
          <table class="table table-sm">
               <tr>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>jumlah</th>
                    <th>Diskon</th>
                    <th>Korting</th>
                    <th>Harga</th>
                    <th>Total</th>
               </tr>
               <?php
               include "../koneksi.php";
               session_start();

               $user = $_SESSION['id_mekanik'];
               $sql = "select * from `barang mekanik temp`";
               $cari = mysqli_query($conn, $sql);

               while ($data = mysqli_fetch_array($cari)) {
                    $delete = '<a class="btn btn-danger" id="delete-' . $data['kd_brg'] . '" href="do_mekanikdelbrgtemp.php?kode=' . $data['kd_brg'] . '"><i class="fa fa-times"></i> delete</a>';
               ?>
                    <tr>
                         <td><?php echo $data['nm_brg']; ?></td>
                         <td><?php echo $data['mrk_brg']; ?></td>
                         <td><input type="number" style="width:50px;" value="<?php echo $data['jml']; ?>" id="jml-<?php echo $data['kd_brg']; ?>"></td>
                         <td><input type="number" style="width:50px;" value="<?php echo $data['diskon']; ?>" id="disc-<?php echo $data['kd_brg']; ?>"></td>
                         <td><input type="number" style="width:50px;" value="<?php echo $data['korting']; ?>" id="kort-<?php echo $data['kd_brg']; ?>"></td>
                         <td><?php echo $data['hrg_brg']; ?></td>
                         <td><?php echo $data['total']; ?></td>
                         <td><?php echo $delete ?></td>
                    </tr>
               <?php
               }
               ?>
          </table>
     </div>
</td>