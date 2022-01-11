<style>
#cari {
     width: 200px;
     box-sizing: border-box;
     border: 2px solid #ccc;
     border-radius: 4px;
     font-size: 14px;
     background-outline-color: white;
     background-image: url('cari.png');
     background-position: 10px 10px; 
     background-size: 28px, 28px, auto;
     background-repeat: no-repeat;
     padding: 12px 20px 12px 0px;
     -webkit-transition: width 0.7s ease-in-out;
     transition: width 0.7s ease-in-out;
}

#cari:focus {
     width: 100%;
}

</style>

<div class="jumbotron">
     <h2 align="center">Daftar Mekanik</h2>
     <br>
     <table class="table table-striped table-borderless" cellpadding=2 cellspacing=2>
          <tr>
               <th>No KTP</th>
               <th>Nama</th>
               <th>Alamat</th>
               <th>No Hp</th>
          </tr>
          <tr>
               <td>xxxx</td>
               <td>xxxx</td>
               <td>xxxx</td>
               <td>xxxx</td>
               <td><button class="btn btn-success" name="edit" id="edit" data-toggle="modal" data-target="#editmekanik"><i class="fa fa-edit"></i> Edit</button></td>
               <td><button class="btn btn-danger" name="hapus" id="hapus" data-toggle="modal" data-target="#hapusmekanik"><i class="fa fa-close"></i> Hapus</button></td>
          </tr>
     </table>
</div>
<br>

<div class="jumbotron">
     <h2 align="center">Daftar Mekanik Baru</h2>
     <br>
     <form method="post" id="regis">
          <table class="table table-striped">
               <tr>
                    <td>No KTP</td>
                    <td><input type="number" maxlength="9999999999999999" name="noktp" id="noktp" autocomplete="off"></td>
                    <div class="error" id="noktpErr"></div>
               </tr>
               <tr>
                    <td>Nama Mekanik</td>
                    <td><input type="text" maxlength="50" name="nama" id="nama" autocomplete="off"></td>
                    <div class="error" id="mekErr"></div>
               </tr>
               <tr>
                    <td>Alamat Mekanik</td>
                    <td><input type="text" maxlength="100" required name="alamat" id="alamat" autocomplete="off"></td>
               </tr>
               <tr>
                    <td>No HP</td>
                    <td><input type="number" maxlength="999999999999" name="nohp" id="nohp" autocomplete="off"></td>
                    <div class="error" id="nohpErr"></div>
               </tr>
               <tr>
                    <td>Password Khusus</td>
                    <td><input type="password" maxlength="12" name="khusus" id="khusus"></td>
                    <div class="error" id="khususErr"></div>
               </tr>
          </table>
          <div align="center">
               <button class="btn btn-success" name="daftar" id="daftar">Daftar</button>
          </div>
     </form>
</div>

<div class="modal fade" id="editmekanik">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="#" method="post">
          <table class="table table-striped">
               <tr>
                    <td>Password</td>
                    <td><input type="password" id="khusus"></td>
               </tr>
               <tr>
                    <td>Masukkan Alasan</td>
                    <td><input type="text" name="alasan" id="alasan" maxlength="100"></td>
               </tr>
          </table>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Ubah</button> 
        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="hapusmekanik">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          Apakah Anda yakin mau menghapus?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Ya</button> 
        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
      </div>

    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    var error_khusus = false;
    var error_nama = false;
    var error_nohp = false;
    var error_noktp = false;

    $("#khusus").keyup(function()
    {
        check_khusus();
    })

    $("#nama").keyup(function()
    {
        check_nama();
    })

    $("#noktp").keyup(function()
    {
        check_noktp();
    })

    $("#nohp").keyup(function()
    {
        check_nohp();
    })

    function check_khusus(){
        $("#khusus").keyup(function(){
            var khusus = $("#khusus").val();
    
        if (khusus == 0)
        {
            $("#khususErr").html("masukkan password khusus");
            $("#khusus").css("outline-color", "red");
            error_khusus = true;
        }
        else if(khusus == "mekanik123")
        {
            $("#khususErr").html("");
            $("#khusus").css("outline-color", "green");
        }
        else
        {
            $("#khususErr").html("password khusus salah!");
            $("#khusus").css("outline-color", "red");
            error_khusus = true;
        }
    });
    };


    function check_nama(){
        $("#nama").keyup(function(){
            var nama = $("#nama").val();
            var pattern = /^[a-zA-Z ]*$/;

            if(nama == 0)
            {
                $("#namaErr").html("Masukkan nama anda");
                $("#nama").css("outline-color", "red");
                error_nama = true;
            } 
            else if(!pattern.test(nama))
            {
                $("#namaErr").html("hanya boleh nama dan spasi!");
                $("#nama").css("outline-color", "red");
                error_nama = true;
            }
            else if(nama.length < 6)
            {
                $("#namaErr").html("nama harus lebih dari 6 karakter!");
                $("#nama").css("outline-color", "red");
                error_nama = true;
            }
            else
            {
                $.ajax({
                    url: "",
                    type: "post",
                    data: "nama="+nama,
                    success: function(data)
                {
                    if(data==0)
                    {
                         $("#namaErr").html("nama tersedia");
                         $("#nama").css("outline-color", "green");                      
                    }
                    else
                    {
                         $("#namaErr").html("nama tidak tersedia");
                         $("#nama").css("outline-color", "red");
                         error_nama = true;
                    }
                },
                    });  
            }
        });
    };
     
     function check_nohp()
     {    
          $("#nohp").keyup(function(){
               nohp = $("#nohp").val();

               if (nohp == "0")
               {
                    $("#nohpErr").html("masukkan no hp mekanik");
                    $("#nohp").css("outline-color", "red");
                    error_nohp = true;
               }
               else if(nohp.length < 12)
               {
                    $("#nohpErr").html("no hp harus 12 digit");
                    $("#nohp").css("outline-color", "red");
                    error_nohp = true;
               }
               else
               {
                    $.ajax({
                    url: "",
                    type: "post",
                    data: "nohp="+nohp,
                    success: function(data)
                    {
                    if(data==0)
                    {
                         $("#nohpErr").html("nohp tersedia");
                         $("#nohp").css("outline-color", "green");                      
                    }
                    else
                    {
                         $("#nohpErr").html("nohp tidak tersedia");
                         $("#nohp").css("outline-color", "red");
                         error_nohp = true;
                    }
                    },
                         });
               }
          });
     };

     function check_noktp()
     {    
          $("#noktp").keyup(function(){
               noktp = $("#noktp").val();

               if (noktp == "0")
               {
                    $("#noktpErr").html("masukkan no ktp mekanik");
                    $("#noktp").css("outline-color", "red");
                    error_noktp = true;
               }
               else if(noktp.length < 16)
               {
                    $("#noktpErr").html("no hp harus 16 digit");
                    $("#noktp").css("outline-color", "red");
                    error_nohp = true;
               }
               else
               {
                    $.ajax({
                    url: "",
                    type: "post",
                    data: "noktp="+noktp,
                    success: function(data)
                    {
                    if(data==0)
                    {
                         $("#noktpErr").html("no ktp tersedia");
                         $("#noktp").css("outline-color", "green");                      
                    }
                    else
                    {
                         $("#noktpErr").html("no ktp tidak tersedia");
                         $("#noktp").css("outline-color", "red");
                         error_nohp = true;
                    }
                    },
                         });
               }
          });
     };

 $("#regis").submit(function()
    {
        if(error_khusus === false && error_nama === false && error_noktp === false && error_nohp === false)
        {
            alert("Registrasi Sukses!");
           // window.location.href="ajax 1.php";
            return true;
        }
        else
        {
            alert("Masukkan form dengan lengkap dan benar!");
            return false;
        }
    });
});
</script>