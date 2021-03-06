<div class="jumbotron">
     <h2 align="center">Tambah Mekanik Baru</h2>
     <br>
     <form action="do_mekaniktambah.php" method="post" id="tambah-mekanik">
          <table class="table table-centered">
               <tr>
                    <td>Nama</td>
                    <td><input type="text" maxlength="50" id="nama" name="nama" autocomplete="off"></td>
                    <div class="error" id="namaErr">
               </tr>
               <tr>
                    <td>No KTP</td>
                    <td><input type="text" maxlength="16" id="noktp" name="noktp" autocomplete="off"></td>
                    <div class="error" id="ktpErr">
               </tr>
               <tr>
                    <td>No Hp</td>
                    <td><input type="text" maxlength="12" id="nohp" name="nohp" autocomplete="off"></td>
                    <div class="error" id="nohpErr">
               </tr>
               <tr>
                    <td>Password Khusus</td>
                    <td><input type="password" maxlength="50" id="khusus" name="khusus" autocomplete="off"></td>
                    <div class="error" id="khususErr">
               </tr>
          </table>
          <div align="center">
               <button class="btn btn-success" name="daftar"><i class="fa fa-plus-circle"></i> Tambah</button>
          </div>
     </form>
</div>
<br><br>
<div class="jumbotron">
     <h2 align="center">Daftar Mekanik</h2>
     <br>
     <div id="tampil"></div>
</div>

<?php
include "../koneksi.php";
                              session_start();
                              $id = $_SESSION['id_mekanik'];
                              $sql = mysqli_query($conn, "select * from login where id = '$id' and level = 'mekanik'");
$data = mysqli_fetch_array($sql);
$password = $data['pass'];
?>

<script>
     $(document).ready(function() {
          let error_nama = true;
          let error_ktp = true;
          let error_nohp = true;
          let error_khusus = true;
          let nama, pattern, nohp, khusus;
          let cek_khusus = "<?= $password ?>";

          $("#tampil").load("do_mekaniktampil.php");

          $(document).on("click", "a[id^='delete-']", function(e) {
               e.preventDefault();

               $.ajax({
                    type: "get",
                    url: $(this).attr("href"),
                    success: function(data) {
                         alert("berhasil hapus mekanik!");
                         $("#tampil").load("do_mekaniktampil.php");
                    },
               });
          });

          $("#nama").keyup(function() {
               var nama = $("#nama").val();
               var pattern = /^[a-zA-Z ]*$/;

               if (nama == 0) {
                    $("#namaErr").html("Masukkan nama mekanik");
                    $("#namaErr").css("color", "red");
                    $("#nama").css("outline-color", "red");
                    error_nama = true;
               } else if (!pattern.test(nama)) {
                    $("#namaErr").html("hanya boleh nama dan spasi!");
                    $("#nama").css("outline-color", "red");
                    $("#namaErr").css("color", "red");
                    error_nama = true;
               } else {
                    $.ajax({
                         url: "do_mekanikbaruceknama.php",
                         type: "post",
                         data: "nama=" + nama,
                         success: function(data) {
                              if (data == 0) {
                                   $("#namaErr").html("nama tersedia");
                                   $("#namaErr").css("color", "green");
                                   $("#nama").css("outline-color", "green");
                                   error_nama = false;
                              } else {
                                   $("#namaErr").html("nama tidak tersedia");
                                   $("#namaErr").css("color", "red");
                                   $("#nama").css("outline-color", "red");
                                   error_nama = true;
                              }
                         },
                    });
               }
          });

          $("#nohp").keyup(function() {
               nohp = $("#nohp").val();

               if (nohp == "0") {
                    $("#nohpErr").html("Masukkan no hp mekanik!");
                    $("#nohp").css("outline-color", "red");
                    $("#nohpErr").css("color", "red");
                    error_nohp = true;
               } else if (nohp.length < 12) {
                    $("#nohpErr").html("No hp harus 12 digit!");
                    $("#nohpErr").css("color", "red");
                    $("#nohp").css("outline-color", "red");
                    error_nohp = true;
               } else {
                    $.ajax({
                         url: "do_mekanikbarucekhp.php",
                         type: "post",
                         data: "nohp=" + nohp,
                         success: function(data) {
                              if (data == 0) {
                                   $("#nohpErr").html("nohp tersedia");
                                   $("#nohpErr").css("color", "green");
                                   $("#nohp").css("outline-color", "green");
                                   error_nohp = false;
                              } else {
                                   $("#nohpErr").css("color", "red");
                                   $("#nohpErr").html("nohp tidak tersedia");
                                   $("#nohp").css("outline-color", "red");
                                   error_nohp = true;
                              }
                         },
                    });
               }
          });

          $("#noktp").keyup(function() {
               noktp = $("#noktp").val();

               if (noktp == "0") {
                    $("#noktpErr").html("Masukkan No KTP mekanik!");
                    $("#noktp").css("outline-color", "red");
                    $("#noktpErr").css("color", "red");
                    error_noktp = true;
               } else if (noktp.length < 15) {
                    $("#noktpErr").html("No KTP harus 16 digit");
                    $("#noktp").css("outline-color", "red");
                    $("#noktpErr").css("color", "red");
                    error_noktp = true;
               } else {
                    $.ajax({
                         url: "do_mekanikbarucekktp.php",
                         type: "post",
                         data: "noktp=" + noktp,
                         success: function(data) {
                              if (data == 0) {
                                   $("#noktpErr").html("no ktp tersedia");
                                   $("#noktpErr").css("color", "green");
                                   $("#noktp").css("outline-color", "green");
                                   error_noktp = false;
                              } else {
                                   $("#noktpErr").html("no ktp tidak tersedia");
                                   $("#noktpErr").css("color", "red");
                                   $("#noktp").css("outline-color", "red");
                                   error_nohp = true;
                              }
                         },
                    });
               }
          });

          $("#khusus").keyup(function() {
               khusus = $("#khusus").val();

               if (khusus == "0") {
                    $("#khususErr").html("Masukkan password khusus!");
                    $("#khusus").css("outline-color", "red");
                    error_khusus = true;
               } else if (khusus == cek_khusus) {
                    error_khusus = false;
               } else {
                    error_khusus = true;
               }
          });

          $("#tambah-mekanik").submit(function(e) {
               e.preventDefault();

               if (error_nama == false && error_nohp == false && error_noktp == false && error_khusus == false) {
                    $.ajax({
                         url: $(this).attr("action"),
                         type: "post",
                         data: $(this).serialize(),
                         success: function(data) {
                              if (data == 1) {
                                   alert("berhasil tambah mekanik!");
                                   $("#nama").val("");
                                   $("#nohp").val("");
                                   $("#noktp").val("");
                                   $("#khusus").val("");
                                   $("#tampil").load("do_mekaniktampil.php");
                                   return true;
                              } else {
                                   alert("Gagal tambah mekanik! Silahkan coba lagi!");
                                   return false;
                              }
                         },
                    });
               } else {
                    alert("Mohon lengkapi data dengan benar!");
                    return false;
               }
          });
     });
</script>