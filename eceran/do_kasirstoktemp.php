<table class="table table-striped" id="daftar" cellspacing=2 cellpadding=2>
     <tr>
          <th>Nama</th>
          <th>Harga</th>
          <th>Merek</th>
          <th>Supplier</th>
          <th>Tambahan Stok</th>
     </tr>

     <?php
     include "../koneksi.php";
     session_start();

     $user = $_SESSION['id_ecer'];
     $sql = "select * from `tabel barang temp` where user = '$user' ";
     $search = mysqli_query($conn, $sql);

     if (mysqli_affected_rows($conn) > 0) {
          while ($data = mysqli_fetch_array($search)) {
               $link_delete = "<a href='do_kasirhpsbrgtemp.php?kode=" . $data['kd_brg'] . "' id='delbrg-" . $data['kd_brg'] . "' class='btn btn-danger'><i class='fa fa-close'></i> Hapus</a>";
               $jumlah = "<input type='number' style='width:60px;' value='" . $data['sto_brg'] . "' min='0' max='100' id='jml_brg-" . $data['kd_brg'] . "' name='jumlah'>";
     ?>
               <tr>
                    <td><?php echo $data['nm_brg']; ?></td>
                    <td><?php echo $data['hrg_brg']; ?></td>
                    <td><?php echo $data['mrk_brg']; ?></td>
                    <td><?php echo $data['supp_brg']; ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td><?php echo $link_delete; ?></td>
               </tr>
     <?php
          }
     }
     ?>
</table>

<div align="center">
     <button class="btn btn-success" id="simpanbrg"><i class="fa fa-archive"></i> Simpan</button>
</div>