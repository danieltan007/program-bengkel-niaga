<?php
     include "koneksi.php";
     error_reporting(0);
     $merk = $_POST['nmerek'];

     $sql = "select * from `table merek` where mrk_brg like '%$merk%'";
     $cari = mysqli_query($conn, $sql);
     ?>

     <table class="table table-striped">
          <tr>
               <th>Nama Merek</th>
          </tr>
<?php
     while($data = mysqli_fetch_array($cari))
     {
          $edit = '<a class="btn btn-info" href="do_gudangeditmerek.php?kode='.$data['kd_merk'].'" name="editmerek" data-id="edit-'.$data['kd_merk'].'"><i class="fa fa-edit"></i> Edit</a>';
          $hapus = '<a class="btn btn-danger" href="do_gudanghapusmerek.php?kode='.$data['kd_merk'].'" name="hapusmerek" data-id="hapus-'.$data['kd_merk'].'"><i class="fa fa-close"></i> Hapus</a>';
          ?>
          <tr>
               <td><input type="text" name="dmerek" id="dmerek-<?php echo $data['kd_merk']; ?>" value="<?php echo $data['mrk_brg']; ?>"></td>
               <td><?php echo $edit ?></td>
               <td><?php echo $hapus ?></td>
          </tr>
<?php    }
?>