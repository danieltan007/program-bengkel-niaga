<?php
session_start();
?>

<style>
     .error {
          color: red;
     }
</style>

<div class="jumbotron">
     <h2 align="center">Tambah Kasir</h2>
     <br>

     <form action="do_pusattambahakun.php" method="post" id="tambahkasir">
          <table class="table table-borderless">
               <tr>
                    <td>Id</td>
                    <td><input type="text" name="id" id="id" class="form-control" minlength="4" required placeholder="masukkan id"></td>
                    <div class="error" id="id_error"></div>
               </tr>
               <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id="password" minlength="4" class="form-control" required placeholder="masukkan password"></td>
               </tr>
               <tr>
                    <td>Posisi</td>
                    <td>
                         <select name="posisi" id="posisi" class="form-select">
                              <option value="ecer">kasir ecer</option>
                              <option value="grosir">kasir grosir</option>
                              <option value="mekanik">kasir mekanik</option>
                         </select>
                    </td>
               <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-success" name="tambah" id="tambah"><i class="fa fa-plus"></i> Tambah</button></td>
               </tr>
          </table>
     </form>
</div>

<br><br>

<div class="jumbotron">
     <h2 align="center">Daftar Kasir</h2>
     <br>
     <div id="tampil"></div>
</div>

<script>
     $(document).ready(function() {
          let id_regex = /^[a-zA-Z]$/;
          let errId = true;

          $("#id").keyup(function() {
               let id = $("#id").val();
               if (id.match(id_regex)) {
                    $("#id_error").html("");
                    $.ajax({
                         type: "post",
                         url: "do_pusatcekid.php",
                         data: {
                              id: id
                         },
                         success: function(data) {
                              if (data == 1) {
                                   $("#id").css("border-color", "red");
                                   $("#id_error").html("id sudah ada");
                                   errId = true;
                              } else {
                                   $("#id").css("border-color", "green");
                                   $("#id_error").html("id tersedia!");
                                   errId = false;
                              }
                         }
                    });
               } else {
                    $("#id_error").html("id harus huruf");
                    errId = true;
               }
          });

          $("#hapusakun").click(function(e) {
               e.preventDefault();
               $.ajax({
                    type: "get",
                    url: $(this).serialize(),
                    success: function(data) {
                         alert("Data berhasil di hapus!");
                         $("#tampil").load("do_pusattampilkasir.php");
                    }
               });
          });

          $(document).on('submit', '#tambahkasir', function(e) {
               e.preventDefault();
               if (errId === false) {
                    $.ajax({
                         url: 'do_pusattambahakun.php',
                         type: 'POST',
                         data: $(this).serialize(),
                         success: function(data) {
                              if (data == 1) {
                                   alert("Berhasil tambah akun!");
                                   $("#id").val("");
                                   $("#password").val("");
                              } else {
                                   alert("Gagal tambah akun! Silahkan coba lagi!");
                              }
                         }
                    });
               } else {
                    alert("Cek kembali data yang Anda masukkan!");
                    return false;
               }
          });
     });
</script>