<!DOCTYPE html>
<html>
<title>Sistem Bengkel - Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="home.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
          width: 25%;
          flex: 25%;
          padding: 10px;
          margin: 40px;
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
</style>
</head>

<body>
     <h2 align="center" style="padding-top:20px;">Selamat Datang, Pilih Sistem yang Ingin Anda Pakai</h2>
     <br><br>
     <div class="container">
          <div class="row" align="center">
               <div class="col-6">
                    <img src="pusat.png" style="width:25%">
                    <div class="container">
                         <h4>PUSAT</h4>
                         <br>
                         <a href="login_pusat.php" class="btn btn-success">Masuk</a>
                    </div>
               </div>
               <div class="col-6">
                    <img src="gudang.png" style="width:25%; height:131px;">
                    <div class="container">
                         <h4>GUDANG</h4>
                         <br>
                         <a href="login_gudang.php" class="btn btn-success">Masuk</a>
                    </div>
               </div>
               <div class="col">
                    <img src="kasir.png" style="width:25%">
                    <div class="container">
                         <h4>KASIR</h4>
                         <br>
                         <a href="login_kasir.php" class="btn btn-success">Masuk</a>
                    </div>
               </div>
               <div class="col">
                    <img src="mekanik.png" style="width:25%; height:119px;">
                    <div class="container">
                         <h4>KASIR MEKANIK</h4>
                         <br>
                         <a href="login_mekanik.php" class="btn btn-success">Masuk</a>
                    </div>
               </div>
          </div>
     </div>
</body>

</html>