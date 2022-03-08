<?php
include "../koneksi.php";
session_start();
$user = $_SESSION['id_ecer'];
$sql = mysqli_query($conn, "SELECT `tabel retur temp`.`kd_temp`, `tabel retur temp`.`kd_brg`, `tabel barang pusat`.`nm_brg`, `tabel retur temp`.`jml_brg`, `tabel retur temp`.`hrg_brg`, `tabel retur temp`.`total_hrg` FROM `tabel retur temp` inner join `tabel barang pusat` on `tabel retur temp`.`kd_brg` = `tabel barang pusat`.`kd_brg` where `tabel retur temp`.`user` = '$user'");
?>
<table class="table table-bordered table-hover">
     <tr>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Total Harga</th>
          <th>Action</th>
     </tr>
     <?php
     while ($data = mysqli_fetch_array($sql)) {
          $link_delete = "<a href='do_kasirhpsretur.php?kode=" . $data['kd_brg'] . "' id='delretur' class='btn btn-danger'><i class='fa fa-close'></i> Hapus</a>";
          $jumlah = "<input type='number' style='width:60px;' value='" . $data['jml_brg'] . "' min='0' max='100' id='jml_brg-" . $data['kd_brg'] . "' name='jumlah'>";
     ?>
          <tr>
               <td><?= $data['nm_brg']; ?></td>
               <td><?= $jumlah ?></td>
               <td><?= $data['hrg_brg']; ?></td>
               <td><?= $data['total_hrg']; ?></td>
               <td><?= $link_delete ?></td>
          </tr>
     <?php
     }
     ?>
</table>