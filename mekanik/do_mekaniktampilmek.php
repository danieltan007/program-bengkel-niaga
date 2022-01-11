<option value=""></option>
<?php
include "../koneksi.php";

$sql = "select * from `table mekanik`";
$cari = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_array($cari)) {
?>
     <option value="<?php echo $data['id_mekanik']; ?>"><?php echo $data['nm_mekanik']; ?></option>
<?php
}
?>