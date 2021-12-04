<style>
     #cari {
          width: 250px;
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
          width: 70%;
     }
</style>

<div class="jumbotron">
     <h2 align="center">Cek Barang</h2>
     <br>
     <form action="do_pusatcetakbarang.php" method="post">
          Nama Barang : &nbsp;<input type="text" name="cari" id="cari">
          <br><br>
          Filter berdasarkan<br><br>
          Merek : <select name="pilihmerek" id="pilihmerek">
          </select>
          <br><br>
          Supplier : <select name="pilihsup" id="pilihsup">
          </select>
          <br><br>
          <button type="submit" class="btn btn-success" name="cetakbrg"><i class="fa fa-print"></i> Cetak Daftar Barang</button>
          &nbsp;&nbsp;&nbsp;
          <button type="button" class="btn btn-primary" id="updatehrg"><i class="fa fa-money"></i> Update Harga Barang</button>
          <br><br>
     </form>

     <div id="hasil"></div>

     <div class="modal fade" id="modaledit">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title">Konfirmasi</h4>
                    </div>
                    <form id="editbarang" method="post" action="do_pusatmodaledit.php">
                         <div class="modal-body">
                              <table class="table table-borderless">
                                   <tr>
                                        <td>Password Akun</td>
                                        <td><input type="password" id="khusus" name="khusus" required></td>
                                        <div class="error" id="khususErr"></div>
                                   </tr>
                                   <tr>
                                        <td>Nama Barang </td>
                                        <td><input type="text" name="editnama" id="editnama" maxlength="50"></td>
                                   </tr>
                                   <tr>
                                        <td>Merek</td>
                                        <td><select name="ubahmerek" id="ubahmerek"></select></td>
                                   </tr>
                                   <tr>
                                        <td>Supplier</td>
                                        <td><select name="editsupp" id="editsupp"></select></td>
                                   </tr>
                                   <tr>
                                        <td>Stock</td>
                                        <td><input type="number" name="editstok" id="editstok" min="0"></td>
                                   </tr>
                                   <tr>
                                        <td>Harga Modal</td>
                                        <td><input type="number" name="modal" id="modal" min="0"></td>
                                        <input type="hidden" name="kode" id="kode">
                                   </tr>
                                   <tr>
                                        <td>Harga Jual</td>
                                        <td><input type="number" name="hrgjual" id="hrgjual" min="0"></td>
                                   </tr>
                              </table>
                         </div>
                         <!-- Modal footer -->
                         <div class="modal-footer">
                              <button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Ubah</button>
                    </form>
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
               </div>
          </div>
     </div>
</div>
</div>
</div>

<div class="modal fade" id="modalhapus">
     <div class="modal-dialog">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
               </div>

               <form action="do_pusatupdatehrg.php" id="hapusbrg" method="post">
                    <!-- Modal body -->
                    <div class="modal-body">
                         Apakah Anda yakin mau menghapus?
                         <br><br>
                         Masukkan Password <input type="password" name="khusus2" id="khusus2" required>
                         <input type="hidden" name="kode2" id="kode2">
                         <div class="error" id="khususErr2"></div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                         <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Ya</button>
               </form>
               <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
          </div>

     </div>
</div>
</div>
</div>

<!-- modal edit harga massal -->
<div class="modal fade" id="modal_edithrg">
     <div class="modal-dialog">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">Update Harga Barang Massal</h4>
               </div>

               <form action="do_pusatupdatehrg.php" id="edit_hrg" method="post">
                    <!-- Modal body -->
                    <div class="modal-body">
                         <table class="table table-borderless">
                              <tr>
                                   <td>Password Akun</td>
                                   <td><input type="password" id="khusus3" name="khusus3" required></td>
                                   <div class="error" id="khususErr3"></div>
                              </tr>
                              <tr>
                                   <td>Persentase Penambahan Harga Jual</td>
                                   <td><input type="number" name="tambahan" id="tambahan" min="0" placeholder="masukkan angka saja (15)" required></td>
                              </tr>
                         </table>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                         <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Ya</button>
               </form>
               <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
          </div>
     </div>
</div>
</div>
</div>

<?php
include 'koneksi.php';
$sql = mysqli_query($conn, "select * from login where level = 'pusat'");
$data = mysqli_fetch_array($sql);
$pass = $data['pass'];
?>

<script>
     $(document).ready(function() {
          let password = "<?php echo $pass; ?>";
          var error_khusus = false;
          var error_khusus2 = false;
          let error_khusus3 = false;

          $("#khusus").focusin(function() {
               check_khusus();
               error_khusus = true;
          })

          function check_khusus() {
               $("#khusus").on("keyup", function() {
                    khusus = $("#khusus").val();
                    if (khusus == 0) {
                         $("#khususErr").html("Masukkan password akun Anda!");
                         $("#khusus").css("outline-color", "red");
                         $("#khususErr").css("color", "red");
                         error_khusus = true;
                    } else if (khusus != password) {
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

          $("#khusus2").focusin(function() {
               check_khusus2();
               error_khusus2 = true;
          })

          function check_khusus2() {
               $("#khusus2").on("keyup", function() {
                    khusus2 = $("#khusus2").val();
                    if (khusus2 == 0) {
                         $("#khususErr2").html("Masukkan password akun Anda!");
                         $("#khusus2").css("outline-color", "red");
                         $("#khususErr").css("color", "red");
                         error_khusus2 = true;
                    } else if (khusus2 != password) {
                         $("#khususErr2").html("Password Salah!");
                         $("#khusus2").css("outline-color", "red");
                         $("#khususErr2").css("color", "red");
                         error_khusus2 = true;
                    } else {
                         $("#khususErr2").html("");
                         $("#khusus2").css("outline-color", "green");
                         error_khusus2 = false;
                    }
               });
          }

          $("#pilihmerek").load("do_pusattampilmerek.php");
          $("#pilihsup").load("do_pusattampilsupp.php");

          var pilihmerek = "";
          var cari = "";
          var pilihsup = "";

          $("#pilihsup").on('change', function() {
               pilihsup = $("#pilihsup").val();
               $.ajax({
                    type: "post",
                    url: "do_pusatcekbrg.php",
                    data: {
                         cari: cari,
                         merek: pilihmerek,
                         sup: pilihsup
                    },
                    dataType: "text",
                    success: function(data) {
                         $("#hasil").html(data);
                    }
               });
          });

          $("#pilihmerek").on('change', function() {
               pilihmerek = $("#pilihmerek").val();
               $.ajax({
                    type: "post",
                    url: "do_pusatcekbrg.php",
                    data: {
                         cari: cari,
                         merek: pilihmerek,
                         sup: pilihsup
                    },
                    dataType: "text",
                    success: function(data) {
                         $("#hasil").html(data);
                    }
               });
          });

          $("#cari").on('keyup', function() {
               var cari = $("#cari").val();
               $.ajax({
                    type: "post",
                    url: "do_pusatcekbrg.php",
                    data: {
                         cari: cari,
                         merek: pilihmerek,
                         sup: pilihsup
                    },
                    dataType: "text",
                    success: function(data) {
                         $("#hasil").html(data);
                    }
               })
          });

          $("#ubahmerek").load("do_pusattampilmerek.php");

          $("#editsupp").load("do_pusattampilsupp.php");

          $(document).on("click", "a[data-role='editmodal']", function() {
               var id = $(this).data('id');
               var nama = $("#" + id).children("td[data-target=nm_brg]").text();
               var merek = $("#" + id).children("td[data-target=mrk_brg]").text();
               var supp = $("#" + id).children("td[data-target=supplier]").text();
               var stok = $("#" + id).children("td[data-target=stock]").text();
               var modal = $("#" + id).children("td[data-target=hrg_modal]").text();
               var jual = $("#" + id).children("td[data-target=hrg_jual]").text();

               $("#editnama").val(nama);
               $("#ubahmerek").val(merek);
               $("#editsupp").val(supp);
               $("#editstok").val(stok);
               $("#modal").val(modal);
               $("#hrgjual").val(jual)
               $("#kode").val(id);

               $("#modaledit").modal('toggle');
          });

          $('#modaledit').on('shown.bs.modal', function() {
               $('#khusus').focus();
          });

          $('#modalhapus').on('shown.bs.modal', function() {
               $('#khusus2').focus();
          });

          $("#editbarang").submit(function(e) {
               e.preventDefault();

               var id = $("#kode").val();
               var nama = $("#editnama").val();
               var merek = $("#ubahmerek").val();
               var supp = $("#editsupp").val();
               var stok = $("#editstok").val();
               var modal = $("#modal").val();
               var jual = $("#hrgjual").val();
               var profit = parseInt(jual) - parseInt(modal);

               if (error_khusus === false) {
                    $.ajax({
                         url: $(this).attr('action'),
                         data: $(this).serialize(),
                         type: 'post',
                         success: function(data) {
                              alert(data);
                              $("#" + id).children("td[data-target=nm_brg]").text(nama);
                              $("#" + id).children("td[data-target=mrk_brg]").text(merek);
                              $("#" + id).children("td[data-target=supplier]").text(supp);
                              $("#" + id).children("td[data-target=stock]").text(stok);
                              $("#" + id).children("td[data-target=hrg_modal]").text(modal);
                              $("#" + id).children("td[data-target=hrg_jual]").text(jual);
                              $("#" + id).children("td[data-target=profit]").text(profit);
                              $("#khusus").text("");
                              $('#modaledit').modal('toggle');
                         },
                    });
                    return true;
               } else {
                    alert("isi data dengan benar!");
                    return false;
               }
          });

          $(document).on("click", "a[data-role='hapusmodal']", function() {
               $("#modalhapus").modal('toggle');
               var id2 = $(this).data('id');
               $("#kode2").val(id2);
          });

          $("#hapusbrg").submit(function(a) {
               a.preventDefault();

               if (error_khusus2 === false) {
                    $.ajax({
                         url: $(this).attr('action'),
                         type: 'post',
                         data: $(this).serialize(),
                         success: function() {
                              alert("data barang berhasil di hapus!");
                              $("#hasil").load("do_pusatcekbrg.php");
                              $('#modalhapus').modal('toggle');
                         }
                    });
               } else {
                    alert("isi data dengan benar!");
                    return false;
               }
          });

          $("#updatehrg").on("click", function() {
               $("#modal_edithrg").modal('toggle');
          });

          $("#khusus3").keyup(function() {
               var khusus3 = $("#khusus3").val();
               if (khusus3 != password) {
                    $("#khususErr3").html("isi data dengan benar!");
                    $("#khususErr3").css("color", "red");
                    error_khusus3 = true;
               } else {
                    $("#khususErr3").html("");
                    error_khusus3 = false;
               }
          });

          $("#edit_hrg").submit(function(a) {
               a.preventDefault();
               $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                         if (data == "berhasil!") {
                              alert("data berhasil di ubah!");
                              $("#hasil").load("do_pusatcekbrg.php");
                              $('#modal_edithrg').modal('toggle');
                         } else if (data == "gagal!") {
                              alert("data gagal di ubah!");
                              // $('#modal_edithrg').modal('toggle');
                         }
                    }
               });
          });
     });
</script>