<?php
session_start();
?>
<div class="jumbotron">
     <h2 align="center">Laporan Penjualan Eceran</h2>
     <br>
     <form action="do_pusatcarilappenj.php" name="tampillappenj" id="tampillappenj" method="post">
          <table class="table table-borderless">
               <tr>
                    <td>Pilih Tanggal &nbsp;<i class="fa fa-calendar"></i> <input type="text" id="awal" name="awal" autocomplete="off"> &nbsp; sampai &nbsp; <i class="fa fa-calendar"></i> <input type="text" id="akhir" name="akhir" autocomplete="off"> &nbsp; <button type="submit" class="btn btn-success" name="tampil" id="tampil"><i class="fa fa-eye"></i> Tampil</button></td>
               </tr>
          </table>
     </form>
     <div id="show"></div>
</div>
<br><br>

<div class="jumbotron">
     <h2 align="center">Laporan Penjualan Grosir</h2>
     <br>
     <form action="do_pusatcarilappenjgros.php" name="tampillappenjgros" id="tampillappenjgros" method="post">
          <table class="table table-borderless">
               <tr>
                    <td>Pilih Tanggal &nbsp;<i class="fa fa-calendar"></i> <input type="text" id="awal3" name="awal3" autocomplete="off"> &nbsp; sampai &nbsp; <i class="fa fa-calendar"></i> <input type="text" id="akhir3" name="akhir3" autocomplete="off"> &nbsp; <button type="submit" class="btn btn-success" name="tampil3" id="tampil3"><i class="fa fa-eye"></i> Tampil</button></td>
               </tr>
          </table>
     </form>
     <div id="show3"></div>
</div>
<br><br>

<div class="jumbotron">
     <h2 align="center">Laporan Pekerjaan Mekanik</h2>
     <br>
     <form action="do_pusatcarilapmek.php" name="tampillapmek" id="tampillapmek" method="post">
          Pilih Tanggal &nbsp;<i class="fa fa-calendar"></i> <input type="text" id="awal2" name="awal2" autocomplete="off"> &nbsp; sampai &nbsp;
          <i class="fa fa-calendar"></i> <input type="text" id="akhir2" name="akhir2" autocomplete="off"> &nbsp;
          <button type="submit" class="btn btn-success" name="tampil2" id="tampil2"><i class="fa fa-eye"></i> Tampil</button>
     </form>
     <br>
     <div id="show2"></div>
</div>

<br><br>

<div class="jumbotron">

</div>


<script type="text/javascript">
     $(document).ready(function() {
          $("#awal, #awal2, #awal3").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown",
               maxDate: 0,
          });

          $("#akhir, #akhir2, #akhir3").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown",
               maxDate: 0,
          });

          $("#tampillappenj").on("submit", function(e) {
               e.preventDefault();
               $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                         $("#show").html(data);
                    }
               });
          });

          $("#tampillappenjgros").on("submit", function(e) {
               e.preventDefault();
               $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                         $("#show3").html(data);
                    }
               });
          });

          $("#tampillapmek").on("submit", function(e) {
               e.preventDefault();
               $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                         $("#show2").html(data);
                    }
               });
          });
     });
</script>