<table class="table table-striped" id="daftar" cellspacing=2 cellpadding=2>
     <tr>
          <th>Nama</th>
          <th>Harga</th>
          <th>jumlah</th>
          <th>diskon (%)</th>
          <th>korting</th>
          <th>Subtotal</th>
     </tr>

<?php
     include "koneksi.php";

     $sql = "select * from `daftar belanja temp`";
     $search = mysqli_query($conn, $sql);
     
if (mysqli_affected_rows($conn) > 0)
{     
     while($data = mysqli_fetch_array($search))
     { 
     $link_delete = "<a href='do_kasirhpstemp.php?kode=".$data['kd_brg']."' id='delbrg' class='btn btn-danger'><i class='fa fa-close'></i> Hapus</a>";
     $jumlah = "<input type='number' style='width:60px;' value='".$data['jml_brg']."' min='0' max='100' id='jml_brg-".$data['kd_brg']."' name='jumlah'>";
     $diskon = "<input type='number' style='width:60px;' value='".$data['diskon']."' min='0' max='100' id='diskon-".$data['kd_brg']."' name='diskon'>";
     $korting = "<input type='number' style='width:60px;' value='".$data['korting']."' min='0' max='100' id='korting-".$data['kd_brg']."' name='diskon'>";
          ?>
          <tr>
          <td><?php echo $data['nm_brg']; ?></td>
          <td><?php echo $data['st_hrg']; ?></td>
          <td><?php echo $jumlah; ?></td>
          <td><?php echo $diskon; ?></td>
          <td><?php echo $korting; ?></td>
          <td><?php echo $data['t_hrg']; ?></td>
          <td><?php echo $link_delete; ?></td>
     </tr>
<?php   
}
}
?>
</table>