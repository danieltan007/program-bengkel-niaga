<?php
session_start();

if ($_SESSION['login mekanik'] != "login") {
     header("location: login_mekanik.php");
}
?>

<!DOCTYPE html>
<html>
<title>Mekanik</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="logo mekanik.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.bootstrap_4.min.css" integrity="sha512-2C6AmJKgt4B+bQc08/TwUeFKkq8CsBNlTaNcNgUmsDJSU1Fg+R6azDbho+ZzuxEkJnCjLZQMozSq3y97ZmgwjA==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js" integrity="sha512-qzgd5cYSZcosqpzpn7zF2ZId8f/8CHmFKZ8j7mU4OUXTNRd5g+ZHBPsgKEwoqxCtdQvExE5LprwwPAgoicguNg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
     .error {
          color: red;
     }

     body {
          overflow-x: hidden;
     }

     * {
          box-sizing: border-box;
     }

     .row:after {
          content: "";
          clear: both;
     }

     li a {
          display: block;
          font-size: 16px;
          color: black;
          text-align: center;
          padding: 0px;
     }

     ul li a:hover,
     ul li a.hoverover {
          cursor: pointer;
          color: #fff;
     }

     li a:hover {
          background-color: #0000FF;
          transition: 0.5s ease;
     }
</style>
</head>

<body>
     <nav class="navbar navbar-expand-md bg-primary">
          <a class="navbar-brand" style="font-size:26px; padding-left:20px;"><i class="fa fa-wrench"></i> KASIR MEKANIK</a>
          <ul class="nav">
               <li class="nav-item">
                    <a class="nav-link klik" id="home"><i class="fa fa-shopping-cart"></i> Transaksi</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link klik" id="laporan"><i class="fa fa-file-text"></i> Laporan</a>
               </li>
               <!-- <li class="nav-item">
               <a class="nav-link klik" id="utang"><i class="fa fa-credit-card"></i> Utang Toko</a>
          </li> -->
               <li class="nav-item">
                    <a class="nav-link klik" id="cicil"><i class="fa fa-credit-card"></i> Belum Lunas</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link klik" id="tambah"><i class="fa fa-users"></i> Tambah Mekanik</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" style="color:black;" href="logout_mekanik.php"><i class="fa fa-sign-out"></i> Logout</a>
               </li>
          </ul>
     </nav>

     <div class="tampil">

     </div>

     <script>
          $(document).ready(function() {
               $(".klik").click(function() {
                    var menu = $(this).attr('id');
                    if (menu == "home") {
                         $(".tampil").load("mekanik_home.php");
                    } else if (menu == "laporan") {
                         $(".tampil").load("mekanik_laporan.php");
                    } else if (menu == "tambah") {
                         $(".tampil").load("mekanik_tambah.php");
                    }
                    // else if(menu == "utang")
                    // {
                    //      $(".tampil").load("mekanik_utang.php");
                    // } 
                    else if (menu == "cicil") {
                         $(".tampil").load("mekanik_cicil.php");
                    }
               });

               $(".tampil").load("mekanik_home.php");
          });
     </script>
</body>

</html>