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
     $sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' and supp_brg = '$sup' ";
     $search = mysqli_query($conn, $sql);
} else {
     $sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' and mrk_brg = '$merek' and supp_brg = '$sup' ";
     $search = mysqli_query($conn, $sql);
}

?>
<table id="daftarbarang" class='tablesorter-bootstrap table table-hover'>
     <thead class="thead-dark">
          <tr>
               <th>Nama</th>
               <th>Harga Lv 2</th>
               <th>Harga Lv 3</th>
               <th>Merek</th>
               <th>Stock Toko</th>
               <th>Stock Gudang</th>
               <th>Supplier</th>
          </tr>
     </thead>
     <tbody>
          <?php
          if (mysqli_num_rows($search) > 0) {
               while ($data = mysqli_fetch_array($search)) {
                    $tambah = "<a id='tambahbrg' class='btn btn-success' href='do_kasirtambah.php?kode=" . $data['kd_brg'] . "'><i class='fa fa-plus-circle'></i> Tambah</a>";
                    // kurangin harga jual 10% di lv2, 20% di lv3
                    $harga_lv2 = $data['hrg_jual'] * 0.9;
                    $harga_lv3 = $data['hrg_jual'] * 0.8;
          ?>
                    <tr>
                         <td><?php echo $data["nm_brg"]; ?></td>
                         <td><?php echo $harga_lv2; ?></td>
                         <td><?php echo $harga_lv3; ?></td>
                         <td><?php echo $data["mrk_brg"]; ?></td>
                         <td><?php echo $data["stock_toko"]; ?></td>
                         <td><?php echo $data["stock_gudang"]; ?></td>
                         <td><?php echo $data['supplier']; ?></td>
                         <td><?php echo $tambah; ?></td>
                    </tr>
               <?php } ?>
     </tbody>
</table>
<?php
          } else {
               echo "data tidak ada!";
          }
?>

<script>
     $(function() {
          $("#daftarbarang").tablesorter({
               theme: "boostrap",
          });
     });
</script>