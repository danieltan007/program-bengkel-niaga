<table class="table table-bordered table-striped">
     <thead>
          <tr>
               <th>Id</th>
               <th>Posisi</th>
               <th>Action</th>
          </tr>
     </thead>
     <tbody>
          <?php
          include "../koneksi.php";

          $sql = mysqli_query($conn, "select * from login where level != 'pusat' and level != 'gudang'");

          while ($data = mysqli_fetch_array($sql)) {
          ?>
               <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['level']; ?></td>
                    <td>
                         <a href="do_pusathapusakun.php?id=<?php echo $data['id']; ?>" id="hapusakun" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
               </tr>
          <?php
          }
          ?>
     </tbody>
</table>