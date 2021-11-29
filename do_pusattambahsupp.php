<?php
	include "koneksi.php";
	$nama   = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$nohp   = $_POST['nohp'];

	//kode SUP-001
	$query = "select max(id_supp) as maxkode from `tabel supplier`";
	$hasil = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($hasil);
	$kodetrans = $data['maxkode'];
	$ubah = (int) substr($kodetrans,4, 3);
	$ubah++;
	$kodetrans = "SUP-".sprintf("%03s", $ubah);
			
	$insert = mysqli_query($conn, "INSERT INTO `tabel supplier`(id_supp, nm_supp, alm_supp, nohp_supp) VALUES('$kodetrans','$nama','$alamat','$nohp')") or die(mysqli_error());
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
