<?php
include "../koneksi.php";
$cari = $_POST['cari'];
$merek = $_POST['merek'];
$sup = $_POST['sup'];

if ($merek == "" && $sup == "") {
     $sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' ";
     $search = mysqli_query($conn, $sql);
} else if ($merek != "" && $sup == "") {
     $sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' and mrk_brg = '$merek' ";
     $search = mysqli_query($conn, $sql);
} else if ($merek == "" && $sup != "") {
     $sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' and supplier = '$sup' ";
     $search = mysqli_query($conn, $sql);
} else {
     $sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' and mrk_brg = '$merek' and supplier = '$sup' ";
     $search = mysqli_query($conn, $sql);
}
?>

<table id="caribarang" class="table table-striped tablesorter-bootstrap">
     <thead class="thead-dark">
          <tr>
               <th>Nama Barang</th>
               <th>Merek</th>
               <th>Supplier</th>
               <th>Stock</th>
               <!-- <th>Harga</th> -->
          </tr>
     </thead>
     <tbody>

          <?php
          while ($data = mysqli_fetch_array($search)) {
               $edit = '<a class="btn btn-success" style="color:white" data-role="edit" data-id="' . $data['kd_brg'] . '"><i class="fa fa-edit"></i> Edit</a>';
               $hapus = '<a class="btn btn-danger" style="color:white" data-role="hapus" data-id="' . $data['kd_brg'] . '"><i class="fa fa-close"></i> Hapus</a>';
          ?>
               <tr id="<?php echo $data['kd_brg']; ?>">
                    <td data-target="nama"><?php echo $data['nm_brg']; ?></td>
                    <td data-target="merek"><?php echo $data['mrk_brg']; ?></td>
                    <td data-target="supp"><?php echo $data['supplier']; ?></td>
                    <td data-target="stok"><?php echo $data['stock_gudang']; ?></td>
                    <!-- <td data-target="hrg"><?php echo $data['hrg_jual']; ?></td> -->
                    <td><?php echo $edit; ?></td>
                    <td><?php echo $hapus; ?></td>
               </tr>
          <?php }
          ?>
     </tbody>
</table>

<script>
     $(function() {
          $("#caribarang").tablesorter({
               theme: "boostrap",
          });
     });
</script>