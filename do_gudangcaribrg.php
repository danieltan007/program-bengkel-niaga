<?php
include "koneksi.php";

$cari = $_POST['cari'];
$sql = "select * from `tabel barang pusat` where nm_brg like '%$cari%' ";
$cari = mysqli_query($conn, $sql);
?>

<table class="table table-striped">
	<tr>
		<th>Nama Barang</th>
		<th>Merek</th>
		<th>Supplier</th>
		<th>Stock</th>
		<th>Harga</th>
	</tr>

	<?php
	while ($data = mysqli_fetch_array($cari)) {
		$tambah = '<a class="btn btn-success" id="tambahitem" style="color:white" href="do_gudangtambahupdate.php?kode=' . $data['kd_brg'] . '"><i class="fa fa-plus-circle"></i> Tambah</a>';
	?>
		<tr id="<?php echo $data['kd_brg']; ?>">
			<td data-target="nama"><?php echo $data['nm_brg']; ?></td>
			<td data-target="merek"><?php echo $data['mrk_brg']; ?></td>
			<td data-target="supp"><?php echo $data['supplier']; ?></td>
			<td data-target="stok"><?php echo $data['stock_gudang']; ?></td>
			<td data-target="hrg"><?php echo $data['hrg_jual']; ?></td>
			<td><?php echo $tambah; ?></td>
		</tr>
	<?php }
	?>
</table>