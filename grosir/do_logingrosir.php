<?php
include "../koneksi.php";
session_start();

$id = $_POST['id'];
$pass = $_POST['pass'];

$sql = "select * from login where id = '$id' and pass = '$pass' and level = 'grosir'";
$cari = mysqli_query($conn, $sql);

if ($data = mysqli_fetch_array($cari) < 1) { ?>
     <script>
          alert("ID atau Password Salah!");
          window.location.href = "login_grosir.php";
     </script>
<?php     } else {
     $_SESSION['login grosir'] = "login";
     $_SESSION['id_grosir'] = $id;
?>
     <script>
          window.location.href = "kasir.php";
     </script>
<?php
}
?>