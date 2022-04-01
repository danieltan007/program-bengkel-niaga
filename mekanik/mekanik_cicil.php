<style>
     #cari {
          width: 300px;
          box-sizing: border-box;
          border: 2px solid #ccc;
          border-radius: 4px;
          font-size: 16px;
          background-color: white;
          background-image: url('cari.png');
          background-position: 10px 10px;
          background-size: 28px, 28px, auto;
          background-repeat: no-repeat;
          padding: 12px 20px 12px 50px;
          -webkit-transition: width 0.7s ease-in-out;
          transition: width 0.7s ease-in-out;
     }

     #cari:focus {
          width: 80%;
     }
</style>

<div class="jumbotron">
     <h2 align="center">Daftar Transaksi Belum Lunas</h2>
     <br>
     Cari nama &nbsp; <input tpye="text" maxlength="50" name="cari" id="cari">
     <br><br>
     <div id="hasil"></div>
</div>

<div class="modal fade" id="modalcicil">
     <div class="modal-dialog">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">Lakukan Pembayaran</h4>
               </div>
               <form id="pelunasan" method="post" action="do_mekanikbayarutang.php">
                    <!-- Modal body -->
                    <div class="modal-body">
                         <table class="table table-borderless">
                              <tr>
                                   <td>Password Akun</td>
                                   <td><input type="password" id="khusus" name="khusus" required></td>
                                   <div class="error" id="khususErr"></div>
                              </tr>
                              <tr>
                                   <td>Sisa Pembayaran</td>
                                   <td><input type="number" name="sisabyr" id="sisabyr" min="0"></td>
                              </tr>
                              <tr>
                                   <td>Bayar</td>
                                   <td><input type="number" name="byr" id="byr" min="0"></td>
                                   <input type="hidden" name="kode" id="kode">
                              </tr>
                         </table>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                         <button class="btn btn-success" type="submit"><i class="fa fa-credit-card"></i> Bayar</button>
               </form>
               <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-close"></i>Close</button>
          </div>

     </div>
</div>
</div>

<?php
include "../koneksi.php";
session_start();
$id = $_SESSION['id_mekanik'];
$sql = mysqli_query($conn, "SELECT * FROM login where id = '$id' and level = 'mekanik'");
$data = mysqli_fetch_array($sql);
$pass = $data['pass'];
?>
<script>
     $(document).ready(function() {
          var error_khusus = false;

          $("#khusus").keyup(function() {
               check_khusus();
          })

          function check_khusus() {
               $("#khusus").on("keyup", function() {
                    var khusus = $("#khusus").val();

                    if (khusus == 0) {
                         $("#khususErr").html("Masukkan password akun Anda!");
                         $("#khusus").css("outline-color", "red");
                         $("#khususErr").css("color", "red");
                         error_khusus = true;
                    } else if (khusus != <?= $pass; ?>) {
                         $("#khususErr").html("Password Salah!");
                         $("#khusus").css("outline-color", "red");
                         $("#khususErr").css("color", "red");
                         error_khusus = true;
                    } else {
                         $("#khususErr").html("");
                         $("#khusus").css("outline-color", "green");
                         error_khusus = false;
                    }
               });
          }

          $("#cari").on('keyup', function() {
               var cari = $("#cari").val();
               $.ajax({
                    type: "post",
                    url: "do_mekaniktampilnama.php",
                    data: {
                         cari: cari
                    },
                    dataType: "text",
                    success: function(data) {
                         $("#hasil").html(data);
                    }
               });
          });

          $(document).on("click", "a[data-role^='cicil']", function(e) {
               var kode = $(this).data('id');
               var sisabyr = $("#" + kode).children("td[data-target=sisabyr]").text();

               $("#kode").val(kode);
               $("#sisabyr").val(sisabyr);
               $("#modalcicil").modal('toggle');
          });

          $('#modalcicil').on('shown.bs.modal', function() {
               $("#khusus").focus();
          });

          $("#pelunasan").submit(function(e) {
               var id = $("#kode").val();

               e.preventDefault();
               if (error_khusus === false) {
                    $.ajax({
                         type: $(this).attr('method'),
                         url: $(this).attr('action'),
                         data: $(this).serialize(),
                         success: function(data) {
                              alert("berhasil melakukan pembayaran");
                              $("#modalcicil").modal('toggle');
                              if (data == 0) {
                                   $("#hasil").load("do_mekaniktampilnama.php");
                              } else {
                                   $('#' + id).children("td[data-target=sisabyr]").text(data);;
                              }
                         }
                    });
                    return true;
               } else {
                    alert("isi data dengan benar!");
                    return false;
               }
          });
     });
</script>