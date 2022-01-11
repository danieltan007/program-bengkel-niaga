<?php
include "../koneksi.php";
error_reporting(0);

$cari = $_POST['cari'];
$sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' ";
$search = mysqli_query($conn, $sql);
?>
<table class='table table-hover table-striped'>
     <tr>
          <th>Nama</th>
          <th>Merek</th>
          <th>Supplier</th>
          <th>Stock Toko</th>
          <th>Harga Lv 2</th>
          <th>Harga Lv 3</th>
     </tr>
     <?php
     if (mysqli_num_rows($search) > 0) {
          while ($data = mysqli_fetch_array($search)) {
               $harga_lv2 = $data['hrg_jual'] * 0.9;
               $harga_lv3 = $data['hrg_jual'] * 0.8;
     ?>
               <tr>
                    <td><?php echo $data['nm_brg']; ?></td>
                    <td><?php echo $data['mrk_brg']; ?></td>
                    <td><?php echo $data['supplier']; ?></td>
                    <td><?php echo $data['stock_toko']; ?></td>
                    <td><?php echo $harga_lv2; ?></td>
                    <td><?php echo $harga_lv3; ?></td>
               </tr>
          <?php } ?>
</table>
<?php
     } else {
          echo "data tidak ada!";
     }
