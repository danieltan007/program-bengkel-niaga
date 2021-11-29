<div class="jumbotron">
     <h2 align="center">Cek Aktivitas Sistem</h2>
     <br><br>
     <form action="do_pusatcekakt.php" name="tampilcekakt" id="tampilcekakt" method="post">
          Pilih tanggal <i class="fa fa-calendar"></i> <input type="text" id="awal" name="awal" autocomplete="off"> &nbsp; sampai &nbsp;
          <i class="fa fa-calendar"></i> <input type="text" id="akhir" name="akhir" autocomplete="off"> &nbsp;
          <button class="btn btn-success" name="tampil" id="tampil"><i class="fa fa-eye"></i> Tampil</button>
     </form>
     <div id="show"></div>
     <br><br>
</div>

<script>
     $(document).ready(function() {
          $('input[id$=awal]').datepicker({
               dateFormat: 'yy-mm-dd'
          });
     });

     $(document).ready(function() {
          $('input[id$=akhir]').datepicker({
               dateFormat: 'yy-mm-dd'
          });

          $("#tampilcekakt").on("submit", function(e) {
               e.preventDefault();
               $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                         $("#show").html(data);
                    }
               });
          })
     });
</script>