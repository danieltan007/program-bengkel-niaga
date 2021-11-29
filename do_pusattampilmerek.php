<option></option>
<?php
     include "koneksi.php";

     $sql = "select * from `table merek`";
     $cari = mysqli_Query($conn, $sql);

     while($data=mysqli_fetch_array($cari))
     {
          ?>
          <option value="<?php echo $data['mrk_brg']; ?>"><?php echo $data['mrk_brg']; ?></option>
<?php
     }
?>