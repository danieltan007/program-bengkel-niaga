<link rel="stylesheet" href="https://code.highcharts.com/highcharts.js">
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
     <h1 align="center">Restock Barang</h1>
     <br><br>
     <div class="row">
          <div class="col-6">
               <h3 align="center">Cari Barang</h3>
               <br>
               <input type="text" id="cari" name="cari" maxlength="50" autocomplete="off">
               <br><br>
               <div id="tampilbrg"></div>
          </div>

          <div class="col-6">
               <h3 align="center">Daftar Item</h3>
               <br>
               <div id="daftar-item"></div>
          </div>
     </div>
</div>

<div class="jumbotron">
     <h2 align="center">Laporan Barang Masuk</h2>
     <br><br>
     <form action="do_gudanglapmsk.php" id="laporanmsk" method="post">
          Masukkan tanggal
          &nbsp; <input type="text" name="awal" id="awal" autocomplete="off"> &nbsp;
          Sampai &nbsp; <input type="text" id="akhir" name="akhir" autocomplete="off"> &nbsp;&nbsp;

          <button class="btn btn-success" name="cari"><i class="fa fa-eye"></i> Tampilkan</button>
     </form>

     <br><br>

     <div id="tampil_lap"></div>
</div>
<script>
     $(document).ready(function() {
          $("#cari").on('keyup', function() {
               var cari = $("#cari").val();
               $.ajax({
                    type: "post",
                    url: "do_gudangcaribrg.php",
                    data: {
                         cari: cari
                    },
                    dataType: "text",
                    success: function(data) {
                         $("#tampilbrg").html(data);
                    }
               });
          });

          tampil();

          function tampil() {
               $("#daftar-item").load("do_gudangdaftaritem.php");
          }

          $(document).on("click", "a[id^='tambahitem']", function(e) {
               e.preventDefault();
               $.ajax({
                    type: "get",
                    url: $(this).attr('href'),
                    success: function(data) {
                         tampil();
                    }
               });
          });

          $(document).on("click", "a[id^='hapus-']", function(e) {
               e.preventDefault();
               $.ajax({
                    url: $(this).attr('href'),
                    type: 'get',
                    success: function() {
                         tampil();
                    }
               });
          });

          $(document).on("change", "input[id^='stockbrg-']", function() {
               var tambah = $(this).val();
               var kode = $(this).attr("id").substr(9, $(this).attr("id").length);

               $.ajax({
                    url: "do_gudangupdatestock.php",
                    type: 'post',
                    data: {
                         tambah: tambah,
                         kode: kode
                    },
                    success: function() {
                         tampil();
                    }
               });
          });

          $('input[id$=awal]').datepicker({
               dateFormat: 'yy-mm-dd'
          });

          $('input[id$=akhir]').datepicker({
               dateFormat: 'yy-mm-dd'
          });

          $(document).ready(function() {
               $("#laporanmsk").on("submit", function(e) {
                    e.preventDefault();
                    $.ajax({
                         url: $(this).attr('action'),
                         type: $(this).attr('method'),
                         data: $(this).serialize(),
                         success: function(data) {
                              $("#tampil_lap").html(data);
                         }
                    });
               });
          });
     });
</script>