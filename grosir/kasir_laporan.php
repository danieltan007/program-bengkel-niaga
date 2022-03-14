<div class="jumbotron">
     <h2 align="center">Cetak Laporan Penjualan</h2>
     <br><br>

     <form action="do_kasircetaklap.php" method="post" id="cetaklaporan">
          Pilih Tanggal &nbsp; <input type="text" name="awal" id="awal" required autocomplete="off"> Sampai <input type="text" id="akhir" name="akhir" autocomplete="off" required>&nbsp;&nbsp;
          <button class="btn btn-success" name="cari"><i class="fa fa-eye"></i> Tampilkan</button>
     </form>
     <br>
     <div id="tampil2"></div>
</div>

<script>
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

     $(document).ready(function() {
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
     })
</script>