<style>
    .error{
        color: red;
    }
</style>

<div class="jumbotron">
     <h2 align="center">Tambah Supplier</h2>
     <br>
     <form action="do_pusattambahsupp.php" name="tambah" id="tambah" method="post">
          <table class="table table-striped">
               <tr>
                    <td>Nama Supplier</td>
                    <td><Input type="text" maxlength="50" id="nama" name="nama" autocomplete="off"></td>
                    <div class="error" id="nameErr"></div>
               </tr>
               <tr>
                    <td>Alamat Supplier</td>
                    <td><Input type="text" maxlength="100" style="width:400px;" id="alamat" name="alamat" autocomplete="off"></td>
                    <div class="error" id="alamatErr"></div>
               </tr>
               <tr>
                    <td>No HP Supplier</td>
                    <td><Input type="number" id="nohp" name="nohp" autocomplete="off"></td>
                    <div class="error" id="nohpErr"></div>
               </tr>
          </table>
          <div align="center">
               <button class="btn btn-success" name="daftar" value="daftar"><i class="fa fa-plus-circle"></i> Tambah Supplier</button>
          </div>
     </form>
</div>
<br>
<div class="jumbotron">
     <h2 align="center">Daftar Supplier</h2>
     <br>
     <div id="tampilsupp"></div>
</div>

<div class="modal fade" id="myModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Apakah Anda yakin menghapus supplier ini?
        <br><br>
        Masukkan Password &nbsp; <input type="password" id="pass" name="pass">
        <div class="error" id="passErr"></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
		<button class="btn btn-success" id="confirm"><i class="fa fa-check"> Ya</i></button>
        <button class="btn btn-danger" id="tutup" data-dismiss="modal"><i class="fa fa-close"> Tidak </i></button>
      </div>

    </div>
  </div>
</div> 

<script>
$(document).ready(function(){
    var error_nohp = false;
    var error_alamat = false;
    var error_nama = false;
    var error_password = false;
    var pass = "";

    $("#nohp").keyup(function()
    {
        check_nohp();
    });

    $("#nama").keyup(function()
    {
        check_nama();
    });

    $("#alamat").keyup(function()
    {
        check_alamat();
    });

    $("#pass").keyup(function()
    {
        check_pass();
    });

    function check_nohp(){
        $("#nohp").keyup(function(){
        var nohp = $("#nohp").val();
    
        if (nohp == 0)
        {
            $("#nohpErr").html("masukkan nohp");
            $("#nohp").css("outline-color", "red");
            $("#nohpErr").css("color", "red");
            error_nohp = true;
        }
        else if(nohp.length < 12)
        {
            $("#nohpErr").html("nohp minimal 12 digit!");
            $("#nohpErr").css("color", "red");
            $("#nohp").css("outline-color", "red");
            error_nohp = true;
        }
        else
        {
            $.ajax({
                url: "do_pusatceknohpsup.php",
                type: "post",
                data: "nohp="+nohp,
                success: function(data){
                    if(data == 0)
                    {
                        $("#nohpErr").html("nohp tersedia");
                        $("#nohpErr").css("color", "green");
                        $("#nohp").css("outline-color","green");  
                        error_nohp = false;       
                    }
                    else
                    { 
                        $("#nohpErr").html("nohp tidak tersedia");
                        $("#nohpErr").css("color", "red");
                        $("#nohp").css("outline-color", "red");
                        error_nohp = true;
                    }
                },
            });
        }
    });
    };

    function check_alamat(){
     $("#alamat").keyup(function(){
        var alamat = $("#alamat").val();

        if(alamat == 0)
        {
            $("#alamatErr").html("Masukkan alamat!");
            $("#alamat").css("outline-color", "red");
            error_alamat = true;
        }
        else if(alamat.length < 10)
        {
            $("#alamatErr").html("alamat minimal 10 karakter!");
            $("#alamat").css("outline-color", "red");
            error_alamat = true;
        }
        else
        {
            $("#alamatErr").html("");
            $("#alamat").css("outline-color", "green");
            error_alamat = false;
        }
     });
    };

    function check_nama(){
        $("#nama").keyup(function(){
            var nama = $("#nama").val();
            var pattern = /^[a-zA-Z ]*$/;

            if(nama == 0)
            {
                $("#nameErr").html("Masukkan nama supplier");
                $("#nameErr").css("color", "red");
                $("#nama").css("outline-color", "red");
                error_nama = true;
            } 
            else if(!pattern.test(nama))
            {
                $("#nameErr").html("hanya boleh nama dan spasi!");
                $("#nameErr").css("color", "red");
                $("#nama").css("outline-color", "red");
                error_nama = true;
            }
            else if(nama.length < 6)
            {
                $("#nameErr").html("nama harus lebih dari 6 karakter!");
                $("#nama").css("outline-color", "red");
                $("#nameErr").css("color", "red");
                error_nama = true;
            }
            else
            {
                $.ajax({
                    url: "do_pusatceknamasup.php",
                    type: "post",
                    data: "nama="+nama,
                    success: function(data)
                    {
                    if(data==0)
                        {
                            $("#nameErr").html("nama tersedia");
                            $("#nameErr").css("color", "green");
                            $("#nama").css("outline-color", "green");      
                            error_nama = false;                
                        }
                        else
                        {
                            $("#nameErr").html("nama tersedia");
                            $("#nameErr").css("color", "red");
                            $("#nama").css("outline-color", "red");
                            error_nama = true;
                        }
                    },
                });  
            }
        });
    };
     
    function check_pass(){
        $("#pass").on("keyup", function(){
            pass = $("#pass").val();

            if(pass == 0)
            {
                $("#passErr").html("Masukkan password akun Anda!");
                $("#pass").css("outline-color", "red");
                $("#passErr").css("color", "red");
                error_password = true;
            }
            else if(pass != "danieltan")
            {
                $("#passErr").html("Password Salah!");
                $("#pass").css("outline-color", "red");
                $("#passErr").css("color", "red");
                error_password = true;
            }
            else
            {
                $("#passErr").html("");
                $("#pass").css("outline-color", "green");
                error_password = false;
            }
        });
    }

    $("#tampilsupp").load("do_pusattampilsup.php"); 

    var kode = "";

    $(document).on("click","button[name^='hpssup-']", function(){
        kode = $(this).attr("name").substr(7,14);
        $("#myModal").modal('toggle');
    });

    $("#confirm").on("click", function(){
        if(error_password === false)
        {        
            $.ajax({
                url : "do_pusathapussupp.php",
                data: {kode:kode, pass:pass},
                type: 'post',
                success: function()
                {
                    $("#tampilsupp").load("do_pusattampilsup.php");
                    $("#myModal").modal('toggle');
                    resetform();
                },
            });
            return true;
        }
        else
        {
            alert("Masukkan password!");
            return false;
        }
    });

    function resetform()
    {
        $('[name=pass]').val('');
    }

    $("#tambah").on("submit", function(e){
        if(error_nohp === false && error_alamat === false && error_nama === false)
            {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    type: $(this).attr("method"),
                    success: function()
                    {
                        alert("data berhasil masuk!");
                        $("#tampilsupp").load("do_pusattampilsup.php");
                    }
                });
                return true;
            }
            else
            {
                alert("Masukkan data dengan benar!");
                return false;
            }
    });  

    $('#myModal').on('shown.bs.modal', function () {
          $("#pass").focus();
    });
});
</script>