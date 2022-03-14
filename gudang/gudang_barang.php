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
          width: 80%;
     }
</style>

<div class="jumbotron">
     <h2 align="center">Data Barang Keluar</h2>
     <br>
     Cek Barang &nbsp; <input type="text" placeholder="masukkan nama barang" name="cari" id='cari' autocomplete="off">
     <br>
     <div id="tampilbrg"></div>

     <br><br>

     <h2 align="center">Daftar Barang</h2>
     <br>
     <div id="brgkeluar"></div>
</div>

<div class="jumbotron">
     <h2 align="center">Laporan Barang Keluar</h2>
     <br><br>
     <form action="do_gudanglapklr.php" id="laporanklr" method="post">
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

          update();

          function update() {
               $("#brgkeluar").load("do_gudangtampilklr.php");
          }

          $(document).on("click", "a[id^='hapus-']", function(e) {
               e.preventDefault();
               $.ajax({
                    url: $(this).attr('href'),
                    type: 'get',
                    success: function() {
                         update();
                    }
               });
          });

          $(document).on("change", "input[id^='stockbrg-']", function() {
               var kurang = $(this).val();
               var kode = $(this).attr("id").substr(9, $(this).attr("id").length);
               $.ajax({
                    url: "do_gudangupdateklr.php",
                    type: 'post',
                    data: {
                         kurang: kurang,
                         kode: kode
                    },
                    success: function() {
                         update();
                    }
               });
          });

          $(document).on("click", "a[id^='tambahitem']", function(e) {
               e.preventDefault();
               $.ajax({
                    type: "get",
                    url: $(this).attr('href'),
                    success: function(data) {
                         update();
                    }
               });
          });

          $("#awal, #akhir").datepicker();

          $("#awal, #akhir").datepicker("option", {
               changeYear: true,
               changeMonth: true,
               showAnim: "slideDown",
               dateformat: "dd-mm-yy",
               maxDate: 0,
          });

          $(document).ready(function() {
               $("#laporanklr").on("submit", function(e) {
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