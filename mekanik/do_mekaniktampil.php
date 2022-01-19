<table id="caribarang" class="tablesorter-bootstrap table table-hover">
     <thead class="thead-dark">
          <tr>
               <th>Nama</th>
               <th>No KTP</th>
               <th>No HP</th>
          </tr>
     </thead>
     <?php
     include "../koneksi.php";

     $sql = mysqli_query($conn, "select * from `table mekanik`");
     while ($data = mysqli_fetch_array($sql)) {
          $delete = '<a class="btn btn-danger" id="delete-' . $data['id_mekanik'] . '" href="do_mekanikhapusmek.php?kode=' . $data['id_mekanik'] . '"><i class="fa fa-times"></i> Hapus</a>';
     ?>
          <tbody>
               <tr>
                    <td><?= $data['nm_mekanik']; ?></td>
                    <td><?= $data['no_ktp']; ?></td>
                    <td><?= $data['no_hp']; ?></td>
                    <td><?= $delete; ?></td>
               </tr>
          </tbody>
     <?php
     }

     ?>
</table>