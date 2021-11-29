<?php
     include "koneksi.php";
     session_start();

     $id = $_POST['id'];
     $pass= $_POST['pass'];

     $sql = "select * from login where id = '$id' and pass = '$pass' and level = 'gudang'";
     $cari = mysqli_query($conn, $sql);

     if ($data = mysqli_fetch_array($cari) < 1)
          { ?>
               <script>
                    alert("ID atau Password Salah!");
                    window.location.href = "login_gudang.php";
               </script>
<?php     }
     else
          { 
               $_SESSION['login gudang'] = "login";
               ?>
               <script>
                    window.location.href = "gudang.php";
               </script>
<?php     
          }
?>