<?php
     session_start();

       if($_SESSION['login pusat']!="login")
     {
          header("location: login_pusat.php");
     }
?>
<!DOCTYPE html>
<html>
   <title>Pusat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="logo pusat.png">
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
body{
 overflow-x: hidden;
}

*{
 box-sizing: border-box;
}

.col{
 float:left;
 width: 50%;
 flex: 50%;
 padding: 10px;
}

.row:after{
 content:"";
 clear:both;
}

li a{
 display:block;
 font-size: 16px;
 color:black;
 text-align:center;
 padding:0px;
}

ul li a:hover,
ul li a.hoverover{	
	cursor: pointer;	
	color:#fff;
}

li a:hover{
 background-color:#0000FF;
 transition: 0.5s ease;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-md  bg-primary">
     <a class="navbar-brand" style="font-size:26px; padding-left:20px;"><img src="pusat.png" width="30" height="30"> PUSAT</a>
     <ul class="nav">
          <li class="nav-item">
               <a class="nav-link klik" id="home"><i class="fa fa-file-text"></i> Laporan</a>
          </li>
          <li class="nav-item">
               <a class="nav-link klik" id="stock"><i class="fa fa-dropbox"></i> Barang</a>
          </li>
          <li class="nav-item">
               <a class="nav-link klik" id="supplier"><i class="fa fa-users"></i> Supplier</a>
          </li>
          <li class="nav-item">
               <a class="nav-link klik" id="vip"><img src="crown.svg" width="22" height="27"> Pelanggan VIP</a>
          </li>
          <!-- <li class="nav-item">
               <a class="nav-link klik" id="aktivitas"><i class="fa fa-clock-o"></i> Aktivitas</a>
          </li> -->
          <li class="nav-item">
               <a class="nav-link" style="color:black;" href="logout_pusat.php"><i class="fa fa-sign-out"></i> Logout</a>
          </li>
     </ul>
</nav>

<div class="tampil">

</div>

<script>
     $(document).ready(function()
     {
          $(".klik").click(function()
          {
               var menu = $(this).attr('id');
               if(menu == "home")
               {
                    $(".tampil").load("pusat_home.php");
               } else if(menu == "stock")
               {
                    $(".tampil").load("pusat_stock.php");
               } else if(menu == "supplier")
               {
                    $(".tampil").load("pusat_supplier.php");
               } else if(menu == "vip")
               {
                    $(".tampil").load("pusat_vip.php");
               } else if(menu == "aktivitas")
               {
                    $(".tampil").load("pusat_aktivitas.php");
               }
          });

          $(".tampil").load("pusat_home.php");
     });
</script>
</body>
</html>