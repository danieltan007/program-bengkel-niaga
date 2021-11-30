<?php
session_start();

if ($_SESSION['login kasir'] != "login") {
     header("location: login_kasir.php");
}
?>

<!DOCTYPE html>
<html>
<title>Kasir</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<link rel="icon" href="logo kasir.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.bootstrap_4.min.css" integrity="sha512-2C6AmJKgt4B+bQc08/TwUeFKkq8CsBNlTaNcNgUmsDJSU1Fg+R6azDbho+ZzuxEkJnCjLZQMozSq3y97ZmgwjA==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.combined.min.js" integrity="sha512-xFKr8IKEr6c+C4NJ5Ajbfy/vWg4LFD/jLUtY+hSO8WX1+eNAWEV4Rn9ovme8C+9DY7mD8XMQkO4qYYOjMAJOWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
     body {
          overflow-x: hidden;
     }

     * {
          box-sizing: border-box;
     }

     .col {
          float: left;
          /* width: 50%; */

     }

     .row:after {
          content: "";
          clear: both;
     }

     @media screen and (max-width:600px) {
          .col {
               width: 25%;
               display: block;
               margin-bottom: 20px;
               padding-bottom: 10px;
          }
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
     <nav class="navbar navbar-expand-md bg-primary navbar-light">
          <a class="navbar-brand" style="font-size:26px; padding-left:20px;"><i class="fa fa-credit-card"></i> KASIR</a>
          <ul class="nav">
               <li class="nav-item">
                    <a class="nav-link klik" id="home"><i class="fa fa-shopping-cart"></i> Transaksi</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link klik" id="laporan"><i class="fa fa-file-text"></i> Laporan</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link klik" id="stok_toko"><img src="box.ico" width="24" height="26"> Stok Toko</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link klik" id="cicil"><i class="fa fa-credit-card"></i> Belum Lunas</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" style="color:black;" href="logout_kasir.php"><i class="fa fa-sign-out"></i> Logout</a>
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
                         $(".tampil").load("kasir_home.php");
                    } else if (menu == "laporan") {
                         $(".tampil").load("kasir_laporan.php");
                    } else if (menu == "cicil") {
                         $(".tampil").load("kasir_cicil.php");
                    } else if (menu == "stok_toko") {
                         $(".tampil").load("kasir_stok.php");
                    }
               });

               $(".tampil").load("kasir_home.php");
          });
     </script>
</body>

</html>