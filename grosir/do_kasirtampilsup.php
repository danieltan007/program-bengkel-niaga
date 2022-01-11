<option value=""></option>
<?php
include "../koneksi.php";

$sql = "select * from `tabel supplier`";
$cari = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_array($cari)) { ?>
     <option value="<?php echo $data['nm_supp']; ?>"><?php echo $data['nm_supp']; ?></option>
<?php
}
?>