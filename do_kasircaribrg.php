<?php
     include "koneksi.php";

     $cari = $_POST['cari'];
     $sql = "select * from `tabel barang` where nm_brg like '%$cari%' ";
     $search = mysqli_query($conn, $sql);
?>
     <table class='table table-hover table-striped'>
          <tr>
               <th>Nama</th>
               <th>Harga</th>
               <th>Merek</th>
               <th>Stock Toko</th>
               <th>Stock Gudang</th>
          </tr>
<?php
if(mysqli_num_rows($search) > 0)
{
     while($data = mysqli_fetch_array($search))
     {   
          $tambah = "<a id='tambahbrg' class='btn btn-success' href='do_kasirtambahtemp.php?kode=".$data['kd_brg']."'><i class='fa fa-plus-circle'></i> Tambah</a>";
          ?>      
     <tr>
          <td><?php echo $data["nm_brg"]; ?></td>
          <td><?php echo $data["hrg_brg"]; ?></td>
          <td><?php echo $data["mrk_brg"]; ?></td>
          <td><?php echo $data["sto_toko"]; ?></td>
          <td><?php echo $data["sto_brg"]; ?></td>
          <td><?php echo $tambah; ?></td>
     </tr>
     <?php } ?>
     </table>
     <?php
}
else
{
     echo "data tidak ada!";
}
?>