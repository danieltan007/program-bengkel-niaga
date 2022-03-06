<?php
session_start();
?>

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
          position: relative;
          background-color: white;
          /* background-image: url('cari.png'); */
          background-position: 10px 10px;
          background-size: 28px, 28px, auto;
          background-repeat: no-repeat;
          padding: 12px 20px 12px 50px;
          -webkit-transition: width 0.7s ease-in-out;
          transition: width 0.7s ease-in-out;
     }

     .icon::before {
          display: inline-block;
          text-rendering: auto;
          -webkit-font-smoothing: antialiased;
     }

     #cari::before {
          content: "\f002";
          font: var(--fa-font-solid);
          font-family: "Font Awesome 6 Free";
          font-weight: normal;
          font-style: normal;
          text-decoration: inherit;
          margin-right: 10px;
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
               <h2 align="center">Retur Barang</h2>
               <input type="text" name="cari" id="cari" placeholder="masukkan kode transaksi">
               <br><br>
               <div id="tampil_trans"></div>
          </div>
          <div class="col">
               <h2 align="center">Daftar Barang yang di Retur</h2>
               <br><br>
               <div id="daftar_retur"></div>
          </div>
     </div>
</div>

<script>
     $(document).ready(function() {
          $("#cari").keyup(function() {
               var cari = $("#cari").val();
               $.ajax({
                    type: "post",
                    url: "do_kasircariretur.php",
                    data: "cari=" + cari,
                    success: function(data) {
                         $("#tampil_trans").html(data)
                    }
               });
          });

          function tampil_barang() {
               $("#daftar_retur").load("do_kasirtampilbrgretur.php");
          }

          $(document).on("click", "a[id^='tambah-']", function(e) {
               e.preventDefault();
               let id = $(this).attr("id").substr(7, $(this).attr("id").length);

               $.ajax({
                    type: "get",
                    url: $(this).attr("href"),
                    data: "id=" + id,
                    success: function(data) {
                         tampil_barang();
                    }
               });
          });

          $(document).on("click", "a[id^='hapus-']", function(e) {
               e.preventDefault();
               let id = $(this).attr("id").substr(6, $(this).attr("id").length);

               $.ajax({
                    type: "get",
                    url: $(this).attr("href"),
                    data: "id=" + id,
                    success: function(data) {
                         tampil_barang();
                    }
               });
          });

     });
</script>