<?php
     include "koneksi.php";
     error_reporting(0);

     $cari = $_POST['cari'];
     $merek = $_POST['merek'];
     $sup = $_POST['sup'];

     if($merek == "" && $sup == "")
     {
          $sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' ";
          $search = mysqli_query($conn, $sql);
     }
     else if($merek != "" && $sup == "")
     {
          $sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' and mrk_brg = '$merek' ";
          $search = mysqli_query($conn, $sql);
     }
     else if($merek == "" && $sup != "")
     {
          $sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' and supplier = '$sup' ";
          $search = mysqli_query($conn, $sql);
     }
     else
     {
          $sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' and mrk_brg = '$merek' and supplier = '$sup' ";
          $search = mysqli_query($conn, $sql);
     }
?>
     <table class="table table-striped">
          <tr>
               <th>Nama Barang</th>
               <th>Merek</th>
               <th>Stock</th>
               <th>Supplier</th>
               <th>Harga Modal</th>
               <th>Harga Jual</th>
               <th>Profit</th>
          </tr>
<?php
if(mysqli_num_rows($search) > 0)
{
     while($data = mysqli_fetch_array($search))
     {   
          $profit = (int)$data['hrg_jual'] - (int)$data['hrg_modal'];
          $edit = "<a class='btn btn-success' style='color:white' data-role='editmodal' data-id='".$data['kd_brg']."' ><i class='fa fa-edit'></i> Edit Barang</a>";
          $delete = "<a class='btn btn-danger' style='color:white' data-role='hapusmodal' data-id='".$data['kd_brg']."' ><i class='fa fa-times'></i> Hapus Barang</a>"
          ?>      
     <tr id="<?php echo $data['kd_brg']; ?>">
          <td data-target="nm_brg"><?php echo $data["nm_brg"]; ?></td>
          <td data-target="mrk_brg"><?php echo $data["mrk_brg"]; ?></td>
          <td data-target="stock"><?php echo $data["stock"]; ?></td>
          <td data-target="supplier"><?php echo $data["supplier"]; ?></td>
          <td data-target="hrg_modal"><?php echo $data["hrg_modal"]; ?></td>
          <td data-target="hrg_jual"><?php echo $data["hrg_jual"]; ?></td>
          <td data-target="profit"><?php echo $profit; ?></td>
          <td><?php echo $edit; ?></td>
          <td><?php echo $delete; ?></td>
     </tr>
     <?php } ?>
     </table>
     <?php
}
else
{
     echo "data tidak ada!";
}
