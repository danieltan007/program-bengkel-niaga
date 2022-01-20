<style>
     #cari,
     #caribarang {
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

     #cari:focus,
     #caribarang:focus {
          width: 70%;
     }
</style>

<div class="jumbotron">
     <div class="row">
          <div class="col-6">
               <h2 align="center">Restock Barang</h2>
               <br>
               Cari Barang <input type="text" id="caribarang" maxlength="50">
               <br><br>
               <div id="barang"></div>
          </div>
          <div class="col-6">
               <h2 align="center">Daftar Item</h2>
               <br>
               <div id="daftaritem"></div>
          </div>
     </div>
</div>

<div class="jumbotron">
     <div class="table-centered">
          <h2 align="center">Cek Stok Toko</h2>
          <br>
          &nbsp; Nama Barang &nbsp; <input type="text" id="cari" placeholder="masukkan nama barang" id="cari">
          <br><br>
          <div class="hasil"></div>
     </div>
</div>


<div class="modal fade" id="modalhapus">
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
                    <button class="btn btn-success" type="submit" id="hapusbrg"><i class="fa fa-check"></i> Ya</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
               </div>

          </div>
     </div>
</div>

<?php
include "../koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM login where level = 'kasir'");
$data = mysqli_fetch_array($sql);
$pass = $data['pass'];
?>

<script>
     $(document).ready(function() {
          let password_akun = "<?php echo $pass; ?>";
          $("#sup").load("do_kasirtampilsup.php");
          $("#sup2").load("do_kasirtampilsup.php");
          $("#merek").load("do_kasirtampilmrk.php");
          $("#editsupp").load("do_kasirtampilsup.php");
          $("#ubahmerek").load("do_kasirtampilmrk.php");

          var error_khusus = false;

          $("#khusus").keyup(function() {
               check_khusus();
          });

          $("#cari").on('keyup', function() {
               var cari = $("#cari").val();
               $.ajax({
                    type: "post",
                    url: "do_kasircekstok.php",
                    data: {
                         cari: cari
                    },
                    dataType: "text",
                    success: function(data) {
                         $(".hasil").html(data);
                    }
               });
          });

          $("#caribarang").on('keyup', function() {
               var cari = $("#caribarang").val();
               $.ajax({
                    type: "post",
                    url: "do_kasircaribrg.php",
                    data: {
                         cari: cari
                    },
                    dataType: "text",
                    success: function(data) {
                         $("#barang").html(data);
                    }
               });

               $(document).on("click", "#tambahbrg", function(e) {
                    e.preventDefault();
                    $.ajax({
                         type: 'get',
                         url: $(this).attr("href"),
                         success: function(data) {
                              update();
                         },
                    });
               });
          });

          update();

          function update() {
               $("#daftaritem").load("do_kasirstoktemp.php");
          };

          function reset() {
               $("#khusus").val('');
          }

          $(document).on("click", "a[data-role='edit']", function() {
               var id = $(this).data('id');
               var nama = $("#" + id).children("td[data-target=nama]").text();
               var merek = $("#" + id).children("td[data-target=merek]").text();
               var supp = $("#" + id).children("td[data-target=supp]").text();
               var stok = $("#" + id).children("td[data-target=stok]").text();
               var hrg = $("#" + id).children("td[data-target=hrg]").text();

               $("#editnama").val(nama);
               $("#ubahmerek").val(merek);
               $("#editsupp").val(supp);
               $("#editstok").val(stok);
               $("#edithrg").val(hrg);
               $("#kode").val(id);
               $('#modaledit').modal('toggle');
          });

          var kodebrg = "";
          $(document).on("click", "a[data-role='hapus']", function() {
               $('#modalhapus').modal('toggle');
               kodebrg = $(this).data("id");
          });

          $("#hapusbrg").on("click", function(e) {
               e.preventDefault();
               $.ajax({
                    url: "do_kasirhpsbrg.php",
                    type: 'post',
                    data: {
                         id: kodebrg
                    },
                    success: function() {
                         alert("data berhasil di hapus!");
                         $('#modalhapus').modal('toggle');
                         $(".hasil").load("do_kasircekstok.php");
                    },
               });
          });

          $(document).on("change", "input[id^='jml_brg-']", function() {
               var kode = $(this).attr("id").substr(8, $(this).attr("id").length);
               var jml = $(this).val();
               $.ajax({
                    type: 'post',
                    url: "do_kasirupdatetempbrg.php",
                    data: {
                         kode: kode,
                         jml: jml
                    },
                    success: function() {
                         update();
                    }
               });
          });

          $(document).on("click", "a[id^='delbrg-']", function(e) {
               e.preventDefault();

               var kode = $(this).attr("id").substr(7, $(this).attr("id").length);
               $.ajax({
                    type: 'get',
                    url: $(this).attr('href'),
                    success: function() {
                         update();
                    }
               });
          });

          function check_khusus() {
               $("#khusus").on("keyup", function() {
                    var khusus = $("#khusus").val();

                    if (khusus == 0) {
                         $("#khususErr").html("Masukkan password akun Anda!");
                         $("#khusus").css("outline-color", "red");
                         $("#khususErr").css("color", "red");
                         error_khusus = true;
                    } else if (khusus != password_akun) {
                         error_khusus = true;
                    } else {
                         error_khusus = false;
                    }
               });
          }

          $(document).on("click", "#simpanbrg", function() {
               $.ajax({
                    url: "do_kasirsimpanbrg.php",
                    type: 'post',
                    success: function(data) {
                         if (data == 1) {
                              alert("data berhasil masuk");
                              update();
                         } else if (data == 2) {
                              alert("Data gagal masuk! Silahkan coba lagi!");
                         } else {
                              alert(data);
                         }
                    },
               });
          });

          $('#modalhapus').on('shown.bs.modal', function() {
               $('#khusus').focus();
          });
     });
</script>