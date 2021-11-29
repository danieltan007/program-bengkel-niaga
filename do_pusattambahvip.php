<?php
	include "koneksi.php";
	$nama   = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$nohp   = $_POST['nohp'];

	//kode VIP-001
	$query = "select max(id_vip) as maxkode from `tabel pelanggan vip`";
	$hasil = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($hasil);
	$kodetrans = $data['maxkode'];
	$ubah = (int) substr($kodetrans,4, 3);
	$ubah++;
	$kodetrans = "VIP-".sprintf("%03s", $ubah);
			
	$insert = mysqli_query($conn, "INSERT INTO `tabel pelanggan vip`(id_vip, nm_plgn, alm_plgn, nohp) VALUES('$kodetrans','$nama','$alamat','$nohp')") or die(mysqli_error());
	$input = mysqli_affected_rows($conn);

	if($input > 0)
	{?>
		<script>
			alert("Data berhasil terinput!");
			window.location.href = "pusat.php";
		</script>
<?php	}
	else
	{?>
		<script>
			alert("Data gagal terinput! Silahkan coba lagi!");
			window.location.href = "pusat.php";
		</script>
<?php	}
?>
