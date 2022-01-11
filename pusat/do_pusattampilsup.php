<?php
include "../koneksi.php";
?>
<table class="table table-striped">
     <tr>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No HP</th>
     </tr>
     <?php
     $sql = "select * from `tabel supplier`";
     $cek = mysqli_query($conn, $sql);

     while ($data = mysqli_fetch_array($cek)) {
          $hapus = '<button class="btn btn-danger" name="hpssup-' . $data['id_supp'] . '" id="hpssup"><i class="fa fa-close"></i> Hapus</button>';
     ?>
          <tr>
               <td><?php echo $data['nm_supp'] ?></td>
               <td><?php echo $data['alm_supp'] ?></td>
               <td><?php echo $data['nohp_supp'] ?></td>
               <td><?php echo $hapus; ?></td>
          </tr>
     <?php
     }
     ?>
</table>