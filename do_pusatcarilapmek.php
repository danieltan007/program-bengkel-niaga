<?php
include "koneksi.php";
error_reporting();

if(empty($_POST['awal2']) || empty($_POST['akhir2']))
{
     echo "Masukkan Tanggal :";
}
else
{
     $awal = $_POST['awal2'];
     $akhir = $_POST['akhir2'];
     $sql = "select * from `laporan pekerjaan mekanik` where tgl between '$awal' and '$akhir' order by id_mekanik asc ";
     $cari = mysqli_query($conn,$sql);
?>
<table class="table table-striped table-hover">
	<tr>
          <th>Tanggal</th>
          <th>Nama Mekanik</th>
          <th>Reparasi</th>
     </tr>
<?php
     while ($data = mysqli_fetch_array($cari))
     { ?>
          <tr>
               <td><?php echo $data['tgl']; ?></td>
               <td><?php echo $data['nm_mknk']; ?></td>
               <td><?php echo $data['reparasi']; ?></td>  
          </tr>
          <?php 
     }
?>
</table>
<?php
}
?>

<h4 align="center">Pemberian Bonus Mekanik</h4>
<br>
<form method="post" action ="do_pusatberikanbonus.php?awal=<?php echo $awal; ?>&akhir=<?php echo $akhir; ?>" id="bonusmekanik">
     <table class="table table-borderless">
          <tr>
               <td>Mekanik 1</td>
               <td><input type="number" name="bonus1" min="0"></td>
          </tr>
          <tr>
               <td>Mekanik 2</td>
               <td><input type="number" name="bonus2" min="0"></td>
          </tr>
     </table>
     <div align="center">
          <button class="btn btn-success" name="bonus"><i class="fa fa-money"></i> Berikan Bonus</button>
     </div>
</form>  