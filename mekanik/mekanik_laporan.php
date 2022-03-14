<?php include("../koneksi.php"); ?>

<div class="jumbotron">
     <h2 align="center">Laporan Penjualan</h2>
     <br>
     <form action="do_mekanikcetaklap.php" name="cetaklaporan" id="cetaklaporan" method="post">
          Pilih tanggal &nbsp;
          <input type="text" name="awal" id="awal" autocomplete="off" required> &nbsp;&nbsp; sampai &nbsp;&nbsp; <input type="text" autocomplete="off" name="akhir" id="akhir" required> &nbsp;&nbsp;
          <button class="btn btn-success" name="tampilkan"><i class="fa fa-eye"></i> Tampilkan</button>
          <br><br>
     </form>
     <div id="tampil2"></div>
</div>
<script>
     $(document).ready(function() {
          $("#awal, #akhir").datepicker();
          $("#awal").datepicker("option", {
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown",
               dateFormat: "dd-m-yy"
          });

          $("#akhir").datepicker("option", {
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown",
               dateFormat: "dd-m-yy",
               maxDate: "0",
          });

          $("#cetaklaporan").on("submit", function(e) {
               e.preventDefault();
               $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                         $("#tampil2").html(data);
                    }
               });
          });
     });
</script>