<?php
include "koneksi.php";
$tglawal = $_GET['awal'];
$tglakhir = $_GET['akhir'];
$bonus1 = $_POST['bonus1'];
$bonus2 = $_POST['bonus2'];

$sql1 = "INSERT INTO `tabel bonus` (`id_mekanik`, `nm_mekanik`, `periode awal`, `periode akhir`, `jumlah_bonus`) VALUES ('MEK-001', 'test', '$tglawal', '$tglakhir', '$bonus1'), ('MEK-002', 'test2', '$tglawal', '$tglakhir', '$bonus2')";
$input = mysqli_query($conn, $sql1);
$data = mysqli_affected_rows($conn);

if ($data>0)
{?>
    <script>
      alert("data berhasil disimpan!");
      window.location.href = "pusat.php";
    </script>
<?php }
else
{ ?>
    <script>
      alert("Data gagal disimpan! Silahkan coba lagi!");
      window.location.href = "pusat.php";
    </script>
<?php }
?>