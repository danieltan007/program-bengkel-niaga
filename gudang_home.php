<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
     .error {
          color: red;
     }

     #cari,
     #carimerek {
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

     #cari:focus,
     #carimerek:focus {
          width: 70%;
     }
</style>

<div class="jumbotron">
     <h2 align="center">Cek Stok Barang</h2>
     <br>
     Ketik Nama Barang &nbsp; <input type="text" placeholder="masukkan nama barang" name="cari" id='cari' autocomplete="off">
     <br><br>
     Filter berdasarkan
     <br><br>
     Merek : <select name="pilihmerek" id="pilihmerek">
     </select>
     <br><br>
     Supplier : <select name="pilihsup" id="pilihsup">
     </select>
     <br><br>
     <div id="tampil"></div>
</div>

<div class="jumbotron">
     <div class="row">
          <div class="col">
               <h2 align="center">Tambah Merek</h2>
               <form method="post" id="tambahmerek">
                    <br>
                    <table class="table table-borderless">
                         <tr>
                              <td>Nama Merek</td>
                              <td><input type="text" name="nmerek" id="nmerek"></td>
                         </tr>
                    </table>
                    <button class="btn btn-success" type="submit" name="tambah"><i class="fa fa-plus-circle"></i> Tambah</button>
               </form>
          </div>

          <div class="col">
               <h2 align="center">Edit/Hapus Merek</h2>
               <br>
               Cari Merek: &nbsp; <input type="text" placeholder="masukkan nama merek" name="carimerek" id='carimerek' autocomplete="off">
               <br><br>

               <div id="c-merek"></div>

               <div id="alert"></div>
          </div>
     </div>
</div>

<!--Input Barang Baru-->
<div class="jumbotron">
     <div class="row">
          <div class="col-6">
               <h2 align="center">Input Barang Baru</h2>
               <br>
               <form action="do_gudangtambahbrg.php" method="post" id="tambahbrg">
                    <table class="table table-borderless">
                         <tr>
                              <td>Nama Barang</td>
                              <td><input type="text" name="nm_brg" id="nm_brg" maxlength="50" autocomplete="off"></td>
                              <div class="error" id="nameErr"></div>
                         </tr>
                         <tr>
                              <td>Merek</td>
                              <td>
                                   <select name="mrk_brg" id="merek">
                                   </select>
                              </td>
                         </tr>
                         <tr>
                              <td>Stock Gudang</td>
                              <td><input type="number" name="sto_brg" id="sto_brg" autocomplete="off" min="0" max="999"></td>
                              <div class="error" id="stokErr"></div>
                         </tr>
                         <tr>
                              <td>Supplier</td>
                              <td>
                                   <select name="supp_brg" id="supp_brg">
                                   </select>
                              </td>
                         </tr>
                    </table>
                    <div align="center">
                         <button class="btn btn-success" name="tambah"><i class="fa fa-plus-circle"></i> Tambah</button>
                    </div>
               </form>
          </div>
          <div class="col-6">
               <h2 align="center">Daftar Item</h2>
               <br>
               <div id="tempbrg"></div>
          </div>
     </div>
</div>

<div class="modal fade" id="modaledit">
     <div class="modal-dialog">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
               </div>
               <form id="editbarang" method="post">
                    <!-- Modal body -->
                    <div class="modal-body">
                         <table class="table table-borderless">
                              <tr>
                                   <td>Password Akun</td>
                                   <td><input type="password" id="khusus" name="khusus"></td>
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
                                   <td><input type="text" name="editsupp" id="editsupp" maxlength="20"></td>
                              </tr>
                              <tr>
                                   <td>Stock</td>
                                   <td><input type="number" name="editstok" id="editstok" min="0"></td>
                              </tr>
                              <tr>
                                   <td>Harga</td>
                                   <td><input type="number" name="edithrg" id="edithrg" min="0"></td>
                                   <input type="hidden" name="kode" id="kode">
                              </tr>
                         </table>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                         <button class="btn btn-success" type="submit" id="ubah"><i class="fa fa-edit"></i> Ubah</button>
               </form>
               <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
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

               <!-- Modal body -->
               <div class="modal-body">
                    Apakah Anda yakin mau menghapus?
               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                    <button class="btn btn-success" type="submit" id="hapusbrg"><i class="fa fa-check"></i> Ya</button>
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
               </div>

          </div>
     </div>
</div>

<?php
include "koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM login where level = 'kasir'");
$data = mysqli_fetch_array($sql);
$pass = $data['pass'];
?>

<script>
     $(document).ready(function() {
          var error_harga = false;
          var error_nama = false;
          var error_khusus = false;
          var error_stock = false;
          let password_akun = "<?php echo $pass; ?>";

          $("#hrg_brg").keyup(function() {
               check_harga();
          })

          $("#nm_brg").keyup(function() {
               check_nama();
          })

          $("#sto_brg").keyup(function() {
               check_stock();
          })

          $("#khusus").focusin(function() {
               check_khusus();
               error_khusus = true;
          })

          function check_harga() {
               $("#hrg_brg").keyup(function() {
                    var harga = $("#hrg_brg").val();

                    if (harga == 0) {
                         $("#hargaErr").html("Masukkan harga barang!");
                         $("#hrg_brg").css("outline-color", "red");
                         error_harga = true;
                    } else {
                         $("#hargaErr").html("");
                         $("#hrg_brg").css("outline-color", "green");
                         error_harga = false;
                    }
               });
          };

          function check_stock() {
               $("#sto_brg").keyup(function() {
                    var stock = $("#sto_brg").val();

                    if (stock == 0) {
                         $("#stokErr").html("Masukkan stock anda");
                         $("#sto_brg").css("outline-color", "red");
                         error_stock = true;
                    }
                    // else if (stock < 10) {
                    //      $("#stokErr").html("stock minimal 10 barang!");
                    //      $("#sto_brg").css("outline-color", "red");
                    //      error_stock = true;
                    // } 
                    else {
                         $("#stokErr").html("");
                         $("#sto_brg").css("outline-color", "green");
                         error_stock = false;
                    }
               })
          };

          function check_nama() {
               $("#nm_brg").keyup(function() {
                    var nama = $("#nm_brg").val();
                    var pattern = /^[a-zA-Z0-9., ]*$/;

                    if (nama == 0) {
                         $("#nameErr").html("Masukkan nama barang");
                         $("#nm_brg").css("outline-color", "red");
                         error_nama = true;
                    } else if (!pattern.test(nama)) {
                         $("#nameErr").html("Masukkan nama barang dengan benar!");
                         $("#nm_brg").css("outline-color", "red");
                         error_nama = true;
                    } else if (nama.length < 6) {
                         $("#nameErr").html("Nama barang harus lebih dari 6 karakter!");
                         $("#nm_brg").css("outline-color", "red");
                         error_nama = true;
                    } else {
                         $.ajax({
                              url: "do_gudangceknama.php",
                              type: "post",
                              data: "nama=" + nama,
                              success: function(data) {
                                   if (data == 0) {
                                        $("#nameErr").html("nama tersedia");
                                        $("#nm_brg").css("outline-color", "green");
                                        error_nama = false;
                                   } else {
                                        $("#nameErr").html("nama tidak tersedia");
                                        $("#nm_brg").css("outline-color", "red");
                                        error_nama = true;
                                   }
                              },
                         });
                    }
               });
          };

          function check_khusus() {
               $("#khusus").on("keyup", function() {
                    khusus = $("#khusus").val();
                    if (khusus == 0) {
                         $("#khususErr").html("Masukkan password akun Anda!");
                         $("#khusus").css("outline-color", "red");
                         $("#khususErr").css("color", "red");
                         error_khusus = true;
                    } else if (khusus != password_akun) {
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

          $("#pilihmerek").load("do_gudangtampilmerek.php");
          $("#pilihsup").load("do_gudangtampilsupp.php");

          var pilihmerek = "";
          var cari = "";
          var pilihsup = "";

          $("#pilihsup").on('change', function() {
               pilihsup = $("#pilihsup").val();
               $.ajax({
                    type: "post",
                    url: "do_gudangtampilbrg.php",
                    data: {
                         cari: cari,
                         merek: pilihmerek,
                         sup: pilihsup
                    },
                    dataType: "text",
                    success: function(data) {
                         $("#tampil").html(data);
                    }
               });
          });

          $("#pilihmerek").on('change', function() {
               pilihmerek = $("#pilihmerek").val();
               $.ajax({
                    type: "post",
                    url: "do_gudangtampilbrg.php",
                    data: {
                         cari: cari,
                         merek: pilihmerek,
                         sup: pilihsup
                    },
                    dataType: "text",
                    success: function(data) {
                         $("#tampil").html(data);
                    }
               });
          });


          $("#cari").keyup(function() {
               cari = $("#cari").val();
               $.ajax({
                    url: "do_gudangtampilbrg.php",
                    data: {
                         cari: cari,
                         merek: pilihmerek,
                         sup: pilihsup
                    },
                    type: 'post',
                    success: function(data) {
                         $("#tampil").html(data);
                    },
               });
          });

          $("#tambahmerek").submit(function(e) {
               var merek = $("#nmerek").val();
               e.preventDefault();
               $.ajax({
                    url: "do_gudangtambahmerek.php",
                    data: {
                         merek: merek
                    },
                    type: 'post',
                    success: function(data) {
                         alert(data);
                    },
               });
          });

          var edit = "";
          $("#carimerek").keyup(function() {
               var nmerek = $("#carimerek").val();
               $.ajax({
                    url: "do_gudangcarimerek.php",
                    data: {
                         nmerek: nmerek
                    },
                    type: 'post',
                    success: function(data) {
                         $("#c-merek").html(data);
                    },
               });
          });

          $(document).on("keyup", "input[id^='dmerek-']", function() {
               $("#alert").html("");

               $(document).on("blur", "input[id^='dmerek-']", function() {
                    edit = $(this).val();

                    $(document).on("click", "a[data-id^='edit-']", function(e) {
                         e.preventDefault();
                         $.ajax({
                              url: $(this).attr('href'),
                              type: 'get',
                              data: {
                                   edit: edit
                              },
                              success: function() {
                                   $("#alert").html("data berhasil di update!");
                                   $("#c-merek").load("do_gudangcarimerek.php");
                              },
                         });
                    });
               });
          });

          $(document).on("click", "a[data-id^='hapus-']", function(e) {
               e.preventDefault();
               $.ajax({
                    url: $(this).attr('href'),
                    type: 'get',
                    success: function() {
                         $("#c-merek").load("do_gudangcarimerek.php");
                         $("#alert").html("data berhasil di delete!");
                    },
               });
          });

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
               $('#modaledit').modal({
                    focus: true
               });
          });

          $('#modaledit').on('shown.bs.modal', function() {
               $('#khusus').focus();
          });

          $('#modalhapus').on('shown.bs.modal', function() {
               $('#khusus').focus();
          });

          var kodebrg = "";
          $(document).on("click", "a[data-role='hapus']", function() {
               $('#modalhapus').modal('toggle');
               kodebrg = $(this).data("id");
          });

          $("#hapusbrg").on("click", function(e) {
               e.preventDefault();
               $.ajax({
                    url: "do_gudanghapusbrg.php",
                    type: 'post',
                    data: {
                         id: kodebrg
                    },
                    success: function() {
                         alert("data berhasil di hapus!");
                         $('#modalhapus').modal('toggle');
                         $("#tampil").load("do_gudangtampilbrg.php");
                    },
               });
          });

          $("#editbarang").on("submit", function(e) {
               var id = $("#kode").val();
               var nama = $("#editnama").val();
               var merek = $("#ubahmerek").val();
               var supp = $("#editsupp").val();
               var stok = $("#editstok").val();
               var hrg = $("#edithrg").val();

               e.preventDefault();

               if (error_khusus === false) {
                    $.ajax({
                         url: "do_gudangeditbrg.php",
                         data: $(this).serialize(),
                         type: 'post',
                         success: function() {
                              alert("Data berhasil diubah!");
                              $("#" + id).children("td[data-target=nama]").text(nama);
                              $("#" + id).children("td[data-target=merek]").text(merek);
                              $("#" + id).children("td[data-target=supp]").text(supp);
                              $("#" + id).children("td[data-target=stok]").text(stok);
                              $("#" + id).children("td[data-target=hrg]").text(hrg);
                              $('#modaledit').modal('toggle');
                         },
                    });
                    return true;
               } else {
                    alert("isi data dengan benar!");
                    return false;
               }
          });

          $("#merek").load("do_gudangtampilmerek.php");

          $("#ubahmerek").load("do_gudangtampilmerek.php");

          $("#supp_brg").load("do_gudangtampilsupp.php");

          $("#tambahbrg").submit(function(e) {
               if (error_stock === false && error_nama === false) {
                    e.preventDefault();
                    $.ajax({
                         url: $(this).attr('action'),
                         data: $(this).serialize(),
                         type: 'post',
                         success: function(data) {
                              update();
                         },
                    });
                    return true;
               } else {
                    alert("Masukkan data dengan benar!");
                    return false;
               }
          });

          $(document).on("click", "#hapustemp", function(e) {
               e.preventDefault();
               $.ajax({
                    url: $(this).attr('href'),
                    type: 'get',
                    success: function() {
                         update();
                    }
               });
          });

          // update();

          function update() {
               $("#tempbrg").load("do_gudangtampiltemp.php");
          };

          $(document).on("click", "#input", function(e) {
               e.preventDefault();
               $.ajax({
                    url: $(this).attr('href'),
                    success: function() {
                         alert("data berhasil di input!");
                         update();
                    }
               });
          });
     });
</script>