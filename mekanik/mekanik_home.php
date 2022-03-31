<style>
     #cari {
          width: 200px;
          box-sizing: border-box;
          border: 2px solid #ccc;
          border-radius: 4px;
          font-size: 14px;
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

     .error {
          color: red;
     }
</style>

<div class="jumbotron">
     <div class="row">
          <div class="col">
               <h2 align="center">Input Layanan</h2>
               <br>
               <form action="do_mekaniktambahlayanan.php" id="tambahpelayanan" method="post">
                    <table class="table table-striped" cellpadding=2 cellspacing=2>
                         <tr>
                              <td>Jenis Reparasi</td>
                              <td><input type="text" maxlength="40" id="jenis" name="jenis" autocomplete="off"></td>
                         </tr>
                         <tr>
                              <td>Pilihan Barang</td>
                              <td>
                                   <select name="pilihan" id="pilihan">
                                        <option value="toko">Dari Toko</option>
                                        <option value="tokolain">Dari Luar</option>
                                        <option value="pembeli">Dari Pembeli</option>
                                   </select>
                              </td>
                         </tr>
                         <tr id="caribarangtoko" style="display:;">
                              <td>Cari Barang</td>
                              <td><input type="text" id="cari" autocomplete="off" placeholder="masukkan nama atau merek"></td>
                         </tr>

                         <tr id="hasilcaritoko" style="display:;"></tr>
                         <tr id="barangtersimpan" style="display:;"></tr>

                         <tr id="tokolain" style="display:none">
                              <td>Nama Toko</td>
                              <td><input type="text" id="toko" name="toko" maxlength="20" autocomplete="off"></td>
                         </tr>
                         <tr id="tokolain2" style="display:none">
                              <td>Nama Barang</td>
                              <td><input type="text" id="nbrg" name="nbrg" autocomplete="off"></td>
                         </tr>
                         <tr id="tokolain3" style="display:none">
                              <td>Harga Barang</td>
                              <td><input type="number" min="0" max="99999999" name="hbrg" id="hbrg"></td>
                         </tr>
                         <tr id="tokolain4" style="display:none">
                              <td>Jumlah Barang</td>
                              <td><input type="number" min="0" max="99999999" name="jmlbrg" id="jmlbrg"></td>
                         </tr>
                         <tr id="tokolain5" style="display:none">
                              <td>Total Harga</td>
                              <td><input type="number" min="0" max="99999999" name="thrg" id="thrg" value=""></td>
                         </tr>
                    </table>
                    <div align="center">
                         <button class="btn btn-success" type="submit" name="tambahlayanan"><i class="fa fa-plus-circle"></i> Tambah</button>
                    </div>
               </form>
          </div>
          <div class="col">
               <h2 align="center">Daftar Layanan</h2>
               <br>
               <div id="daftarlayanan"></div>

               <form action="" method="post" id="layanan">
                    <table class="table table-borderless">
                         <tr>
                              <td>Metode Pembayaran</td>
                              <td><select name="mbayar" id="mbayar">
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
                              <td>Nama Pelanggan</td>
                              <td><input type="text" name="nama" id="nama" maxlength="50" autocomplete="off"></td>
                              <div class="error" id="namaErr"></div>
                         </tr>
                         <tr class="belumlunas3" style="display:none">
                              <td>Alamat</td>
                              <td><input type="text" name="alamat" id="alamat" maxlength="50" autocomplete="off"></td>
                              <div class="error" id="alamatErr"></div>
                         </tr>
                         <tr class="belumlunas4" style="display:none">
                              <td>Nomor Hp/WA</td>
                              <td><input type="text" name="nohp" id="nohp" maxlength="12" autocomplete="off"></td>
                              <div class="error" id="nohpErr"></div>
                         </tr>
                         <tr>
                              <td>Pilih Mekanik</td>
                              <td><select name="mekanik" id="mekanik">
                                   </select>
                              </td>
                              <div class="error" id="mekanikErr"></div>
                         </tr>
                         <tr>
                              <td>Ongkos Mekanik</td>
                              <td><input type="number" name="ongkos" id="ongkos" required></td>
                         </tr>
                         <tr>
                              <td>Total Harga</td>
                              <td><input type="number" id="total" name="total" readonly></td>
                         </tr>
                         <tr>
                              <td>Bayar</td>
                              <td><input type="number" name="bayar" id="bayar" min="0"></td>
                              <div class="error" id="bayarErr"></div>
                         </tr>
                         <tr>
                              <td>Kembali</td>
                              <td><input type="number" name="kembali" id="kembali" readonly></td>
                              <div class="error" id="kembaliErr"></div>
                         </tr>
                    </table>
                    <div align="center">
                         <button class="btn btn-success" name="proses" type="submit"><i class="fa fa-money"></i> Bayar</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     $(document).ready(function() {
          var pilihan;
          var barang;

          $("#ongkos").change(function() {
               var ongkos = $("#ongkos").val();

               if (ongkos == 0 || ongkos == "") {
                    ongkos = 0;
                    totalharga();
               }
               var total = $("#total").val();
               var jumlah = parseInt(ongkos) + parseInt(total);
               $("#total").val(jumlah);
          });

          $("#bayar").on("keyup", function() {
               var harga = $("#total").val();
               var bayar = $("#bayar").val();
               var kembalian = parseInt(bayar) - parseInt(harga);

               $("#kembali").val(kembalian);
          });

          $("#pilihan").on("change", function() {
               barang = $("#pilihan").val();

               if (barang == "pembeli") {
                    $("#tokolain").css("display", "none");
                    $("#tokolain2").css("display", "none");
                    $("#tokolain3").css("display", "none");
                    $("#tokolain4").css("display", "none");
                    $("#tokolain5").css("display", "none");
                    $("#caribarangtoko").css("display", "none");
                    $("#hasilcaritoko").css("display", "none");
                    $("#barangtersimpan").css("display", "none");
               } else if (barang == "tokolain") {
                    $("#tokolain").css("display", "");
                    $("#tokolain2").css("display", "");
                    $("#tokolain3").css("display", "");
                    $("#tokolain4").css("display", "");
                    $("#tokolain5").css("display", "");
                    $("#caribarangtoko").css("display", "none");
                    $("#hasilcaritoko").css("display", "none");
                    $("#barangtersimpan").css("display", "none");
               } else if (barang == "toko") {
                    $("#tokolain").css("display", "none");
                    $("#tokolain2").css("display", "none");
                    $("#tokolain3").css("display", "none");
                    $("#tokolain4").css("display", "none");
                    $("#tokolain5").css("display", "none");
                    $("#caribarangtoko").css("display", "");
                    $("#hasilcaritoko").css("display", "");
                    $("#barangtersimpan").css("display", "");
               }
          });

          $("#mbayar").on("change", function() {
               pilihan = $("#mbayar").val();

               if (pilihan == "cicil") {
                    $(".belumlunas").css("display", "");
                    $(".belumlunas2").css("display", "");
                    $(".belumlunas3").css("display", "");
                    $(".belumlunas4").css("display", "");
                    check_nama();
                    check_nohp();
                    check_alamat();
                    check_noktp();
                    check_bayar();
               } else if (pilihan == "lunas") {
                    $(".belumlunas").css("display", "none");
                    $(".belumlunas2").css("display", "none");
                    $(".belumlunas3").css("display", "none");
                    $(".belumlunas4").css("display", "none");
                    check_bayar();
                    check_kembalian();
               } else {
                    $(".belumlunas").css("display", "");
                    $(".belumlunas2").css("display", "");
                    $(".belumlunas3").css("display", "");
                    $(".belumlunas4").css("display", "");
               }
          });

          $("#cari").keyup(function() {
               var cari = $("#cari").val();
               $.ajax({
                    type: "post",
                    url: "do_mekanikcaribrg.php",
                    data: {
                         cari: cari
                    },
                    success: function(data) {
                         $("#hasilcaritoko").html(data);
                    }
               });
          });

          $(document).on("click", "a[id^='tambah-']", function(e) {
               e.preventDefault();
               $.ajax({
                    type: "get",
                    url: $(this).attr('href'),
                    success: function(data) {
                         refresh();
                    }
               });
          });

          $(document).on("change", "input[id^='jml-']", function(e) {
               var jml = $(this).val();
               var kode = $(this).attr('id').substr(4, $(this).attr("id").length);
               $.ajax({
                    type: "post",
                    url: "do_mekanikjmlbrg.php",
                    data: {
                         jml: jml,
                         kode: kode
                    },
                    success: function() {
                         refresh();
                    }
               });
          });

          $(document).on("change", "input[id^='disc-']", function(e) {
               var diskon = $(this).val();
               var kode = $(this).attr('id').substr(5, $(this).attr("id").length);
               $.ajax({
                    type: "post",
                    url: "do_mekanikdiscbrg.php",
                    data: {
                         diskon: diskon,
                         kode: kode
                    },
                    success: function() {
                         refresh();
                    }
               });
          });

          $(document).on("change", "input[id^='kort-']", function() {
               var kode3 = $(this).attr("id").substr(5, $(this).attr("id").length);
               var korting = $(this).val();
               $.ajax({
                    type: 'post',
                    url: "do_mekanikkortbrg.php",
                    data: {
                         kode3: kode3,
                         korting: korting
                    },
                    success: function() {
                         refresh();
                    }
               });
          });

          refresh();

          function refresh() {
               $("#barangtersimpan").load("do_mekanikloadbrgtemp.php");
          }

          update();

          function update() {
               $("#daftarlayanan").load("do_mekaniktampillayanan.php");
          }

          totalharga();

          function totalharga() {
               $.get("do_mekanikttlhrg.php", function(data) {
                    $("#total").val(data);
               });
          }

          $("#jmlbrg").keyup(function() {
               var hrg = parseInt($("#hbrg").val());
               var jbrg = parseInt($("#jmlbrg").val());
               var tharga = hrg * jbrg;

               $("#thrg").val(tharga);
          })


          $("#tambahpelayanan").submit(function(e) {
               e.preventDefault();
               $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function() {
                         update();
                         refresh();
                         totalharga();
                    }
               })
          });

          $(document).on("click", "a[id^='delete-']", function(e) {
               e.preventDefault();
               $.ajax({
                    url: $(this).attr('href'),
                    type: 'get',
                    success: function() {
                         refresh();
                    }
               })
          });

          $(document).on("click", "a[id^='hapus-']", function(e) {
               e.preventDefault();
               $.ajax({
                    url: $(this).attr('href'),
                    type: 'get',
                    success: function() {
                         update();
                         totalharga();
                    }
               });
          });

          $("#mekanik").load("do_mekaniktampilmek.php");

          var error_nama = false;
          var error_nohp = false;
          var error_noktp = false;
          var error_kembali = false;
          var error_bayar = false;
          var error_alamat = false;
          var error_mbayar = false;

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
                         $("#namaErr").css("color", "red");
                         $("#nama").css("outline-color", "red");
                         error_nama = true;
                    } else if (!pattern.test(nama)) {
                         $("#namaErr").html("hanya boleh nama dan spasi!");
                         $("#namaErr").css("color", "red");
                         $("#nama").css("outline-color", "red");
                         error_nama = true;
                    } else {
                         $.ajax({
                              url: "do_mekanikceknama.php",
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
                         $("#nohp").css("outline-color", "red");
                         $("#nohpErr").css("color", "red");
                         error_nohp = true;
                    } else if (nohp.length < 12) {
                         $("#nohpErr").css("color", "red");
                         $("#nohpErr").html("No hp harus 12 digit!");
                         $("#nohp").css("outline-color", "red");
                         error_nohp = true;
                    } else {
                         $.ajax({
                              url: "do_mekanikcekhp.php",
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
                              url: "do_mekanikcekktp.php",
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
                    var cek = $("#kembali").val();
                    if (cek >= 0) {
                         $("#kembali").css("outline-color", "green");
                         $("#kembaliErr").html("");
                         error_kembali = false;
                    } else {
                         $("#kembali").css("outline-color", "red");
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

                    if (alamat == "") {
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

          $("#layanan").submit(function(e) {
               //e.preventDefault();

               if (pilihan == "cicil") {
                    if (error_nama === false && error_noktp === false && error_nohp === false && error_bayar === false && error_alamat === false && error_mbayar === false) {
                         $("#layanan").attr("action", "do_mekanikpelayanancicil.php");
                         return true;
                    } else {
                         alert("Masukkan form dengan lengkap dan benar!");
                         return false;
                    }
               } else if (pilihan == "lunas") {
                    if (error_bayar === false && error_mbayar === false && error_kembali === false) {
                         $("#layanan").attr("action", "do_mekanikpelayananlunas.php");
                         return true;
                    } else {
                         alert("Masukkan form dengan lengkap dan benar!");
                         return false;
                    }
               }
          });
     });
</script>