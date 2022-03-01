<?php
session_start();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
     .error {
          color: red;
     }

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
          width: 100%;
     }

     #daftar {
          left: 60px;
          position: inherit;
     }
</style>

<div class="container">
     <div class="row">
          <div class="col">
               <h2 align="center">Transaksi</h2>
               <br>
               <input type="text" placeholder="masukkan nama barang" autocomplete="off" id="cari">
               <br><br>
               Filter berdasarkan<br><br>
               Merek : <select name="pilihmerek" id="pilihmerek">
               </select>
               <br><br>
               Supplier : <select name="pilihsup" id="pilihsup">
               </select>
               <br><br>
               <div id="hasil">
               </div>
               <br>
          </div>
          <div class="col">
               <h2 align="center">Daftar Belanja</h2>
               <br>
               <div id="tampil"></div>
               <br>
               <form method="post" action="" id="kasirbayar">
                    <table class="table table-borderless" style="left:50px; position:inherit;">
                         <tr>
                              <td>Metode Pembayaran</td>
                              <td>
                                   <select name="mbayar" id="mbayar">
                                        <option value=""></option>
                                        <option value="lunas">Lunas</option>
                                        <option value="cicil">Belum Lunas</option>
                                   </select>
                              </td>
                              <div class="error" id="mbayarErr"></div>
                         </tr>
                         <tr class="belumlunas" style="display:none">
                              <td>No KTP</td>
                              <td><input type="number" name="noktp" id="noktp" maxlength="9999999999999999" autocomplete="off"></td>
                              <div class="error" id="noktpErr"></div>
                         </tr>
                         <tr class="belumlunas2" style="display:none">
                              <td>Nama</td>
                              <td><input type="text" name="nama" id="nama" maxlength="50" autocomplete="off"></td>
                              <div class="error" id="namaErr"></div>
                         </tr>
                         <tr class="belumlunas3" style="display:none">
                              <td>Nomor Hp/WA</td>
                              <td><input type="text" name="nohp" id="nohp" maxlength="12" autocomplete="off"></td>
                              <div class="error" id="nohpErr"></div>
                         </tr>
                         <tr class="belumlunas4" style="display:none">
                              <td>Alamat</td>
                              <td><input type="text" name="alamat" id="alamat" maxlength="100" autocomplete="off"></td>
                              <div class="error" id="alamatErr"></div>
                         </tr>
                         <tr>
                              <td>Total Harga</td>
                              <td><input type="number" id="total" name="total" readonly></td>
                         </tr>
                         <tr>
                              <td>Bayar</td>
                              <td><input type="number" id="bayar" name="bayar"></td>
                              <div class="error" id="bayarErr"></div>
                         </tr>
                         <tr>
                              <td>Kembali</td>
                              <td><input type="number" name="kembalian" id="kembalian" autocomplete="off"></td>
                              <div class="error" id="kembaliErr"></div>
                         </tr>
                    </table>
                    <div align="center">
                         <button class="btn btn-success" type="submit" id="proses" name="proses"><i class="fa fa-money"></i> Bayar</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<div class="container">
     <h2 align="center">Tampilkan Transaksi</h2>
     <br>
     <form action="do_kasirtampiltrans.php" method="post" id="tampiltransaksi">
          Pilih Tanggal <input type="text" id="awal" name="awal" autocomplete="off"> &nbsp; sampai &nbsp; <input type="text" id="akhir" name="akhir" autocomplete="off"> &nbsp;
          <button class="btn btn-info" name="tampil"><i class="fa fa-eye"></i> Tampilkan</button>
     </form>
     <br>
     <div id="tampil_trans"></div>
</div>

<script>
     $(document).ready(function() {
          var pilihan;
          var jbayar;

          $("#mbayar").change(function() {
               pilihan = $("#mbayar").val();
               cek();
          });

          $("#jbeli").change(function() {
               jbayar = $("#jbeli").val();
               cek();
          });

          function cek() {
               if (pilihan == "cicil") {
                    $(".belumlunas").css("display", "");
                    $(".belumlunas2").css("display", "");
                    $(".belumlunas3").css("display", "");
                    $(".belumlunas4").css("display", "");
                    check_nama();
                    check_nohp();
                    check_noktp();
                    check_bayar();
               } else if (pilihan == "lunas") {
                    $(".belumlunas").css("display", "none");
                    $(".belumlunas2").css("display", "none");
                    $(".belumlunas3").css("display", "none");
                    $(".belumlunas4").css("display", "none");
                    check_bayar();
                    check_kembalian();
               }
          }

          $("#pilihmerek").load("do_kasirtampilmrk.php");
          $("#pilihsup").load("do_kasirtampilsup.php");

          var pilihmerek = "";
          var cari = "";
          var pilihsup = "";

          $("#pilihsup").on('change', function() {
               pilihsup = $("#pilihsup").val();
               $.ajax({
                    type: "post",
                    url: "do_kasircari.php",
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
                    url: "do_kasircari.php",
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
               cari = $("#cari").val();
               $.ajax({
                    type: "post",
                    url: "do_kasircari.php",
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

               $(document).on("click", "#tambahbrg", function(e) {
                    e.preventDefault();
                    $.ajax({
                         type: 'get',
                         url: $(this).attr('href'),
                         success: function(data) {
                              update();
                              totalharga();
                         },
                    });
               });
          });

          update();

          function update() {
               $("#tampil").load("do_kasirtampil.php");
          };

          $(document).on("change", "input[id^='jml_brg-']", function() {
               var kode = $(this).attr("id").substr(8, $(this).attr("id").length);
               var jml = $(this).val();
               $.ajax({
                    type: 'post',
                    url: "do_kasirupdatejml.php",
                    data: {
                         kode: kode,
                         jml: jml
                    },
                    success: function() {
                         update();
                         totalharga();
                    }
               });
          });

          $(document).on("change", "input[id^='diskon-']", function() {
               var kode2 = $(this).attr("id").substr(7, $(this).attr("id").length);
               var diskon = $(this).val();
               $.ajax({
                    type: 'post',
                    url: "do_kasirupdatediskon.php",
                    data: {
                         kode2: kode2,
                         diskon: diskon
                    },
                    success: function() {
                         totalharga();
                         update();
                    }
               });
          });

          $(document).on("change", "input[id^='korting-']", function() {
               var kode3 = $(this).attr("id").substr(8, $(this).attr("id").length);
               var korting = $(this).val();
               $.ajax({
                    type: 'post',
                    url: "do_kasirupdatekorting.php",
                    data: {
                         kode3: kode3,
                         korting: korting
                    },
                    success: function() {
                         totalharga();
                         update();
                    }
               });
          });

          $(document).on("click", "#delbrg", function(e) {
               e.preventDefault();
               $.ajax({
                    type: 'get',
                    url: $(this).attr('href'),
                    success: function(data) {
                         update();
                         totalharga();
                    }
               });
          });

          totalharga();

          function totalharga() {
               $.get("do_kasirttlhrg.php", function(data) {
                    $("#total").val(data);
               });
          }

          $("#bayar").on("keyup", function() {
               var harga = $("input[name='total']").val();
               var bayar = $("input[name='bayar']").val();
               var kembalian = parseInt(bayar) - parseInt(harga);

               $("#kembalian").val(kembalian);
          });

          var error_nama = false;
          var error_nohp = false;
          var error_noktp = false;
          var error_kembali = false;
          var error_bayar = false;
          var error_alamat = false;
          var error_mbayar = false;
          // var error_jbeli = false;

          function check_mbayar() {
               $("#mbayar").on("change", function() {
                    if (pilihan == "") {
                         $("#mbayarErr").html("pilih metode bayar!");
                         $("#mbayar").css("outline-color", "red");
                         error_mbayar = true;
                    } else {
                         $("#mbayarErr").html("");
                         $("#mbayar").css("outline-color", "green");
                         error_mbayar = false;
                    }
               });
          };

          function check_nama() {
               $("#nama").keyup(function() {
                    var nama = $("#nama").val();
                    var pattern = /^[a-zA-Z ]*$/;

                    if (nama == 0) {
                         $("#namaErr").html("Masukkan nama anda");
                         $("#nama").css("outline-color", "red");
                         $("#namaErr").css("color", "red");
                         error_nama = true;
                    } else if (!pattern.test(nama)) {
                         $("#namaErr").html("hanya boleh nama dan spasi!");
                         $("#nama").css("outline-color", "red");
                         $("#namaErr").css("color", "red");
                         error_nama = true;
                    } else {
                         $.ajax({
                              url: "do_kasirceknama.php",
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
          };

          function check_nohp() {
               $("#nohp").keyup(function() {
                    nohp = $("#nohp").val();

                    if (nohp == "0") {
                         $("#nohpErr").html("Masukkan no hp pembeli!");
                         $("#nohpErr").css("outline-color", "red");
                         $("#nohp").css("outline-color", "red");
                         error_nohp = true;
                    } else if (nohp.length < 12) {
                         $("#nohpErr").html("No hp harus 12 digit!");
                         $("#nohpErr").css("outline-color", "red");
                         $("#nohp").css("outline-color", "red");
                         error_nohp = true;
                    } else {
                         $.ajax({
                              url: "do_kasircekhp.php",
                              type: "post",
                              data: "nohp=" + nohp,
                              success: function(data) {
                                   if (data == 0) {
                                        $("#nohpErr").html("nohp tersedia");
                                        $("#nohpErr").css("outline-color", "green");
                                        $("#nohp").css("outline-color", "green");
                                        error_nohp = false;
                                   } else {
                                        $("#nohpErr").html("nohp tidak tersedia");
                                        $("#nohpErr").css("outline-color", "red");
                                        $("#nohp").css("outline-color", "red");
                                        error_nohp = true;
                                   }
                              },
                         });
                    }
               });
          };

          function check_noktp() {
               $("#noktp").keyup(function() {
                    noktp = $("#noktp").val();

                    if (noktp == "0") {
                         $("#noktpErr").html("Masukkan No KTP pembeli!");
                         $("#noktpErr").css("color", "red");
                         $("#noktp").css("outline-color", "red");
                         error_noktp = true;
                    } else if (noktp.length < 15) {
                         $("#noktpErr").html("No KTP harus 16 digit");
                         $("#noktpErr").css("color", "red");
                         $("#noktp").css("outline-color", "red");
                         error_noktp = true;
                    } else {
                         $.ajax({
                              url: "do_kasircekktp.php",
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
          };

          function check_kembalian() {
               $("#bayar").on("keyup", function() {
                    var cek = $("#kembalian").val();
                    if (cek >= 0) {
                         $("#kembalian").css("outline-color", "green");
                         $("#kembaliErr").html("");
                         error_kembali = false;
                    } else {
                         $("#kembalian").css("outline-color", "red");
                         $("#kembaliErr").html("Kembalian tidak boleh mines!");
                         error_kembali = true;
                    }
               });
          }

          function check_bayar() {
               $("#bayar").on("keyup", function() {
                    var cek_bayar = $("#bayar").val();
                    if (cek_bayar >= 0) {
                         $("#bayar").css("outline-color", "green");
                         $("#bayarErr").html("");
                         error_bayar = false;
                    } else {
                         $("#bayar").css("outline-color", "red");
                         $("#bayarErr").html("Masukkan nilai bayar!");
                         error_bayar = true;
                    }
               });
          }

          function check_alamat() {
               $("#alamat").on("keyup", function() {
                    var alamat = $("#alamat").val();

                    if (alamat == "0") {
                         $("#alamatErr").html("Masukkan alamat pembeli!");
                         $("#alamat").css("outline-color", "red");
                         error_alamat = true;
                    } else {
                         $("#alamatErr").html("");
                         $("#alamat").css("outline-color", "green");
                         error_alamat = false;
                    }
               })
          }

          $("#kasirbayar").submit(function(e) {
               if (pilihan == "cicil") {
                    if (error_nama === false && error_noktp === false && error_nohp === false && error_bayar === false && error_alamat === false && error_mbayar === false) {
                         $("#kasirbayar").attr("action", "do_kasircicil.php");
                         return true;
                    } else {
                         alert("Masukkan form dengan lengkap dan benar!");
                         return false;
                    }
               } else if (pilihan == "lunas") {
                    if (error_bayar === false && error_kembali === false && error_mbayar === false) {
                         $("#kasirbayar").attr("action", "do_kasirlunas.php");
                         return true;
                    } else {
                         alert("Masukkan form dengan lengkap dan benar!");
                         return false;
                    }
               }
          });

          $("#tampiltransaksi").on("submit", function(e) {
               e.preventDefault();
               $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                         $("#tampil_trans").html(data);
                    }
               });
          });
     });

     $('input[id$=awal]').datepicker({
          dateFormat: 'yy-mm-dd'
     });

     $('input[id$=akhir]').datepicker({
          dateFormat: 'yy-mm-dd'
     });
</script>