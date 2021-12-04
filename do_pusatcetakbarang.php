<?php
include "koneksi.php";
$date = date('d-m-Y');

$cari = $_POST['cari'];
$merek = $_POST['pilihmerek'];
$sup = $_POST['pilihsup'];

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
<H2 align="center">Daftar Barang</H2>
<br>
Tanggal Cetak: <?php echo $date; ?>
<br><br>

<table cellpadding=2 cellspacing=3 border=1>
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
     if (mysqli_num_rows($search) > 0) {
          while ($data = mysqli_fetch_array($search)) {
               $profit = (int)$data['hrg_jual'] - (int)$data['hrg_modal'];
     ?>
               <tr>
                    <td><?php echo $data["nm_brg"]; ?></td>
                    <td><?php echo $data["mrk_brg"]; ?></td>
                    <td><?php echo $data["stock_gudang"]; ?></td>
                    <td><?php echo $data["supplier"]; ?></td>
                    <td><?php echo number_format($data["hrg_modal"]); ?></td>
                    <td><?php echo number_format($data["hrg_jual"]); ?></td>
                    <td><?php echo number_format($profit); ?></td>
               </tr>
     <?php
          }
     }
     ?>
</table>

<script type="text/javascript">
     alert("berhasil melakukan print!");
     window.print();
     window.onafterprint = function(e) {
          closePrintView();
     }

     function closePrintView() {
          window.location.href = "pusat.php";
     }
</script>