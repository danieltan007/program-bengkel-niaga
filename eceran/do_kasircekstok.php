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
          <th>Harga Barang</th>
     </tr>
     <?php
     if (mysqli_num_rows($search) > 0) {
          while ($data = mysqli_fetch_array($search)) {
               // $edit = '<a class="btn btn-success" style="color:white" data-role="edit" data-id="' . $data['kd_brg'] . '"><i class="fa fa-edit"></i> Edit</a>';
               // $hapus = '<a class="btn btn-danger" style="color:white" data-role="hapus" data-id="' . $data['kd_brg'] . '"><i class="fa fa-close"></i> Hapus</a>';
     ?>
               <tr id="<?php echo $data['kd_brg']; ?>">
                    <td data-target="nama"><?php echo $data['nm_brg']; ?></td>
                    <td data-target="merek"><?php echo $data['mrk_brg']; ?></td>
                    <td data-target="supp"><?php echo $data['supplier']; ?></td>
                    <td data-target="stok"><?php echo $data['stock_toko']; ?></td>
                    <td data-target="hrg"><?php echo $data['hrg_jual']; ?></td>
                    <!-- <td><?php echo $edit; ?></td> -->
                    <!-- <td><?php echo $hapus; ?></td> -->
               </tr>
          <?php } ?>
</table>
<?php
     } else {
          echo "data tidak ada!";
     }
