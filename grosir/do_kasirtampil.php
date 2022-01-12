<table class="table table-striped" id="daftar" cellspacing=2 cellpadding=2>
     <tr>
          <th>Nama</th>
          <th>Pilih Level Harga</th>
          <th>jumlah</th>
          <th>Subtotal</th>
     </tr>

     <?php
     include "../koneksi.php";

     $sql = "SELECT `daftar grosir temp`.`kd_brg`, `tabel barang pusat`.`nm_brg`, `daftar grosir temp`.`jml_brg`, `daftar grosir temp`.`st_hrg`, `daftar grosir temp`.`t_hrg`, `tabel barang pusat`.`hrg_jual` FROM `daftar grosir temp` inner join `tabel barang pusat` on `daftar grosir temp`.`kd_brg` = `tabel barang pusat`.`kd_brg`";
     $search = mysqli_query($conn, $sql);

     if (mysqli_affected_rows($conn) > 0) {
          while ($data = mysqli_fetch_array($search)) {
               $link_delete = "<a href='do_kasirhpstemp.php?kode=" . $data['kd_brg'] . "' id='delbrg' class='btn btn-danger'><i class='fa fa-close'></i> Hapus</a>";
               $jumlah = "<input type='number' style='width:60px;' value='" . $data['jml_brg'] . "' min='0' max='100' id='jml_brg-" . $data['kd_brg'] . "' name='jumlah'>";
               $harga_lv2 = $data['hrg_jual'] * 0.9;
               $harga_lv3 = $data['hrg_jual'] * 0.8;
     ?>
               <tr>
                    <td><?php echo $data['nm_brg']; ?></td>
                    <td>
                         <select name="level_harga" id="level_harga-<?= $data['kd_brg'] ?>">
                              <option value="<?php echo $harga_lv2; ?>" <?php echo $data['st_hrg'] == $harga_lv2 ? "selected" : "" ?>><?= $harga_lv2 ?></option>
                              <option value="<?php echo $harga_lv3; ?>" <?php echo $data['st_hrg'] == $harga_lv3 ? "selected" : "" ?>><?= $harga_lv3 ?></option>
                         </select>
                    </td>
                    <td><?php echo $jumlah; ?></td>
                    <td><?php echo $data['t_hrg']; ?></td>
                    <td><?php echo $link_delete; ?></td>
               </tr>
     <?php
          }
     }
     ?>
</table>