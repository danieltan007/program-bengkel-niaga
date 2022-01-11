<table class="table table-striped">
     <tr>
          <th>Tanggal</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No HP</th>
          <th>Harga</th>
          <th>Sisa Pembayaran</th>
     </tr>
     <?php
     include "../koneksi.php";
     error_reporting(0);

     $cari = $_POST['cari'];
     $sql = "select * from `tabel piutang` where nama like '%$cari%' ";
     $search = mysqli_query($conn, $sql);
     $i = 1;
     if (mysqli_num_rows($search) > 0) {
          while ($data = mysqli_fetch_array($search)) {
               $cicilan = "<a id='cicilan-$i' class='btn btn-info' style='color:white' data-role='bayarcicil' name='" . $data['noktp'] . "'><i class='fa fa-credit-card'></i> Bayar Cicilan</a>";
     ?>
               <tr id=<?php echo $i; ?>>
                    <td><?php echo $data["tgl_trns"]; ?></td>
                    <td><?php echo $data["nama"]; ?></td>
                    <td><?php echo $data["alamat"]; ?></td>
                    <td><?php echo $data["no hp"]; ?></td>
                    <td><?php echo number_format($data["t_hrg"]); ?></td>
                    <td data-target="sisa"><?php echo $data["sisa_byr"]; ?></td>
                    <td><?php echo $cicilan; ?></td>
               </tr>
          <?php
               $i++;
          } ?>
</table>
<?php
     } else {
          echo "data tidak ada!";
     }
?>