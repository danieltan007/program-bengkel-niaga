<table class="table table-borderless table-hover table-striped">
     <tr>
          <th>Nama</th>
          <th>Merk</th>
          <th>Stock</th>
          <th>Supplier</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
     </tr>

     <?php
     include "../koneksi.php";

     $sql = "select * from `tabel pusat temp`";
     $search = mysqli_query($conn, $sql);

     if (mysqli_affected_rows($conn) > 0) {
          while ($data = mysqli_fetch_array($search)) { ?>
               <tr>
                    <td><?php echo $data['nm_brg']; ?></td>
                    <td><?php echo $data['mrk_brg']; ?></td>
                    <td><?php echo $data['supp_brg']; ?></td>
                    <td><?php echo $data['sto_brg']; ?></td>
                    <td><?php echo $data['hrg_modal']; ?></td>
                    <td><?= $data['hrg_jual']; ?></td>
                    <td><a class="btn btn-danger" id="hapustemp" href="do_pusathapustemp.php?kode=<?php echo $data['kd_brg']; ?>"><i class="fa fa-close"></i> Hapus</a></td>
               </tr>
          <?php }
          ?>
</table>

<div align="center">
     <a class="btn btn-success" href="do_pusatinputbrg.php" id="inputbrg"><i class="fa fa-plus-circle"></i> Tambahkan ke stok</a>
</div>
<?php
     }
?>