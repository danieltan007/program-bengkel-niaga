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
     <h2 align="center">Daftar Transaksi Belum Lunas</h2>
     <br>
     Cari nama &nbsp; <input tpye="text" maxlength="50" name="cari" autocomplete="off" id="cari">
     <br><br>
     <div id="tampil"></div>
</div>

<div class="modal fade" id="modalcicil">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      
     <form id="editbayar" method="post">
      <!-- Modal body -->
      <div class="modal-body">
          <table class="table table-borderless">
               <tr>
                    <td>Sisa Pembayaran</td>
                    <td><input type="number" name="sisabyr" id="sisabyr" readonly></td>
               </tr>
               <tr>
                    <td>Jumlah Pembayaran</td>
                    <td><input type="number" name="jmlbyr" id="jmlbyr" min="0"></td>
                    <input type="hidden" name="kode" id="kode">
               </tr>
        </table>
    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
          <button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Ubah</button> 
     </form>
          <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
    </div>
          
  </div>
</div>
</div>

<script>
$(document).ready(function(){
     $("#cari").on('keyup', function(){
          var cari =  $("#cari").val();
          $.ajax({
               type: "post",
               url: "do_kasircaricicil.php",
               data : {cari: cari},
               dataType: "text",
               success: function(data)
               {
                    $("#tampil").html(data);
               }
          });
     });

     var id="";
     $(document).on("click","a[data-role='bayarcicil']", function(e){
          e.preventDefault();
          id = $(this).attr('id').substr(8,8);
          var sisa = $("#"+id).children("td[data-target=sisa]").text();
          kode = $(this).attr('name');
          console.log(kode);
          $("#sisabyr").val(sisa);
          $("#kode").val(kode);
          $('#modalcicil').modal('toggle');
     });

     function reset(){
          $("#jmlbyr").val('');
     }

     $("#editbayar").submit(function(e){
          e.preventDefault();
          $.ajax({
               url: "do_kasirbayarcicilan.php",
               data : $(this).serialize(),
               type: $(this).attr('method'),
               success: function(data)
               {
                    alert("Berhasil melakukan pembayaran!");
                    $('#modalcicil').modal('toggle');
                    
                    if(data == 0)
                    {
                         $("#tampil").load("do_kasircaricicil.php");
                    }
                    else
                    {
                         $("#"+id).children("td[data-target=sisa]").text(data);
                    }
                    reset();
               },
          });
     });

      $('#modalcicil').on('shown.bs.modal', function () {
          $("#jmlbyr").focus();
      });
});
</script>