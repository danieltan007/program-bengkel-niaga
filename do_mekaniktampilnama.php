<?php
     include "koneksi.php";

     $cari = $_POST['cari'];
     $sql = "select * from `tabel piutang` where nama like '%$cari%' ";
     $search = mysqli_query($conn, $sql);
?>
     <table class="table table-striped">
          <tr>
               <th>Tanggal</th>
               <th>No KTP</th>
               <th>Nama</th>
               <th>Alamat</th>
               <th>No HP</th>
               <th>Total Harga</th>
               <th>Sisa Pembayaran</th>
          </tr>
<?php
if(mysqli_num_rows($search) > 0)
{
     while($data = mysqli_fetch_array($search))
     {  
          $cicilan = '<a class="btn btn-info" style="color:white" data-role="cicil" data-id="'.$data['noktp'].'"]><i class="fa fa-credit-card"></i> Bayar Cicilan</a>';
?>      
     <tr id="<?php echo $data['noktp']; ?>">
          <td data-target="tgl"><?php echo $data["tgl_trns"]; ?></td>
          <td><?php echo $data['noktp']; ?></td>
          <td data-target="nama"><?php echo $data["nama"]; ?></td>
          <td data-target="alamat"><?php echo $data["alamat"]; ?></td>
          <td data-target="nohp"><?php echo $data["no hp"]; ?></td>
          <td data-target="t_hrg"><?php echo $data["t_hrg"]; ?></td>
          <td data-target="sisabyr"><?php echo $data["sisa_byr"]; ?></td>
          <td><?php echo $cicilan; ?></td>
          <td></td>
     </tr>
<?php 
     } 
?>
     </table>
<?php
}
else
{
     echo "data tidak ada!";
}

?>