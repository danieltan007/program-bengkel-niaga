<table class="table table-striped">
     <tr>
          <th>Jenis</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Korting</th>
          <th>Subtotal</th>
          <th>Sumber</th>
          <th>Ongkos</th>
          <th>Total</th>
     </tr>
     <?php
     include "../koneksi.php";

     $sql = "select * from `daftar layanan temp`";
     $cari = mysqli_query($conn, $sql);

     while ($data = mysqli_fetch_array($cari)) {
          $delete = "<a class='btn btn-danger' href='do_mekanikdeltemp.php?kode=$data[kd_trns]' id='hapus-$data[kd_trns]'><i class='fa fa-close'></i></a>"
     ?>
          <tr>
               <td><?php echo $data['jenis']; ?></td>
               <td><?php echo $data['hrg_brg']; ?></td>
               <td><?php echo $data['jml_brg']; ?></td>
               <td><?php echo $data['korting']; ?></td>
               <td><?php echo $data['subtotal']; ?></td>
               <td><?php echo $data['sumber']; ?></td>
               <td><input type="number" style="width:80px;" id="ongkos-<?php echo $data['kd_trns']; ?>" max="9999999" value="<?php echo $data['ongkos']; ?>"></td>
               <td><?php echo $data['total']; ?></td>
               <td><?php echo $delete; ?></td>
          </tr>
     <?php
     }
     ?>
</table>