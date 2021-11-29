<!DOCTYPE html>
<html>
   <title>Login Mekanik</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<style>
body{
 overflow-x: hidden;
}

*{
 box-sizing: border-box;
}

.col{
 float:left;
 width: 25%;
 flex: 25%;
 padding: 10px;
 margin: 40px;
}

.row:after{
 content:"";
 clear:both;
}

@media screen and (max-width:600px){
 .col{
  width: 25%;
  display: block;
  margin-bottom:20px;
  padding-bottom: 10px;
 }
}

</style>
</head>
<body>
<h2 align="center">Login Mekanik</h2>
<br>

<form action="do_loginmekanik.php" method="post">
     <table class="table-striped" align="center" cellpadding=6 cellspacing=5>
          <tr>
               <td>ID</td>
               <td><input type="text" id="id" maxlength="16" autocomplete="off" name="id"></td>
          </tr>
          <tr>
               <td>Password</td>
               <td><input type="password" id="pass" maxlength="16" name="pass"></td>
          </tr>
     </table>
     <br>
     <div align="center">
          <button class="btn btn-success" name="submit">Login</button>
     </div>
</form>

<script>

</script>
</body>
</html>