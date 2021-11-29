<?php
include "koneksi.php";
error_reporting();

if(empty($_POST['awal']) || empty($_POST['akhir']))
{
     echo "Masukkan Tanggal :";
}
else
{
     $awal = $_POST['awal'];
     $akhir = $_POST['akhir'];
     $sql = "select * from `tabel aktivitas` where tgl_akt between '$awal' and '$akhir' ";
     $cari = mysqli_query($conn,$sql);
?>
<table class="table table-striped">
	<tr>
   	  <th>Tanggal</th>
      <th>User</th>
      <th>Kegiatan</th>
      </tr>
<?php
while ($data = mysqli_fetch_array($cari))
{ ?>
     <tr>
          <td><?php echo $data['tgl_akt']; ?></td>
          <td><?php echo $data['user']; ?></td>
          <td><?php echo $data['kegiatan']; ?></td>  
     </tr>
     <?php 
}
?>
</table>
<?php
}
?>