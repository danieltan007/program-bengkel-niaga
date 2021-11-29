<?php include "koneksi.php"; ?>
<div class="jumbotron">
     <h2 align="center">Utang Toko</h2>
     <br>
	<form action="do_mekanikcariutang.php" name ="cariutang" id="cariutang" method="post">
     Pilih Tanggal &nbsp; <input type="text" name="awal" id="awal" autocomplete="off"> Sampai <input type="text" name="akhir" id="akhir" autocomplete="off">&nbsp;&nbsp;
     <button class="btn btn-success" name="cari"><i class="fa fa-eye"></i> Tampilkan</button>
     <br><br>
	 </form>
	<div id="hasil"></div>
</div>

<script>
$(document).ready(function () {
     $('input[id$=awal]').datepicker({
          dateFormat: 'yy-mm-dd'
     });

     $('input[id$=akhir]').datepicker({
     dateFormat: 'yy-mm-dd'
     });

     $("#cariutang").on("submit", function(e){
          e.preventDefault();
          $.ajax({
               type: $(this).attr('method'),
               url: $(this).attr('action'),
               data: $(this).serialize(),
               success: function(data){
               $("#hasil").html(data);
               }
               });
          });
     });
</script>