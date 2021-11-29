<td colspan="2">
     <div class="container">
          <table id="caribarang" class="tablesorter-bootstrap table table-hover">
          <thead class="thead-dark">
               <tr>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Stock</th>
                    <th>Harga</th>
               </tr>
          </thead>
          <tbody>
          
<?php
     include "koneksi.php";
     $cari = $_POST['cari'];

     $sql = "select * from `tabel barang` where nm_brg like '%$cari%' or mrk_brg like '%$cari%'";
     $search = mysqli_query($conn, $sql);

     while($data = mysqli_fetch_array($search))
     {
          $tambah = '<a class="btn btn-success" id="tambah-'.$data['kd_brg'].'" href="do_mekaniktambahbrg.php?kode='.$data['kd_brg'].'"><i class="fa fa-plus-circle"></i> tambah</a>';
          ?>
          <tr>
               <td><?php echo $data['nm_brg']; ?></td>
               <td><?php echo $data['mrk_brg']; ?></td>
               <td><?php echo $data['sto_toko']; ?></td>
               <td><?php echo $data['hrg_brg']; ?></td>
               <td><?php echo $tambah ?></td>
          </tr>
<?php
     }
?>
          </tbody>
          </table>
     </div>
</td>

<script>
     $(function() {
          $("#caribarang").tablesorter({
               theme : "boostrap",
          });
     });
</script>