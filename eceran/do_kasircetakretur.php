<div class="accordion" id="data-retur">
     <?php
     include "../koneksi.php";
     $awal = date('d-m-Y', strtotime($_POST['awal']));
     $akhir = date('d-m-Y', strtotime($_POST['akhir']));

     $sql = mysqli_query($conn, "select distinct(tgl_trans) as tgl from `tabel retur` where tgl_trans between '$awal' and '$akhir'");
     $no = 1;
     while ($data = mysqli_fetch_array($sql)) {
     ?>
          <div class="accordion-item">
               <h2 class="accordion-header" id="heading-<?= $no ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $no ?>" aria-expanded="true" aria-controls="collapse-<?= $no ?>">
                         <?= date('d-m-Y', strtotime($data['tgl'])) ?>
                    </button>
               </h2>
               <div id="collapse-<?= $no ?>" class="accordion-collapse collapse show" aria-labelledby="heading-<?= $no ?>" data-bs-parent="#data-retur">
                    <table class="table table-bordered table-hover">
                         <tr>
                              <th>Nama Barang</th>
                              <th>Merek</th>
                              <th>Jumlah</th>
                              <th>Harga</th>
                              <th>Total Harga</th>
                         </tr>
                         <?php
                         $sql2 = mysqli_query($conn, "SELECT `tabel barang pusat`.`nm_brg`, `tabel barang pusat`.`mrk_brg`, `tabel retur`.`jml_brg`, `tabel retur`.`hrg_brg`, `tabel retur`.`total_hrg` FROM `tabel retur` inner join `detail transaksi` on `detail transaksi`.`id_trans` = `tabel retur`.`kd_trans` inner join `tabel barang pusat` on `tabel barang pusat`.`kd_brg` = `detail transaksi`.`kd_brg` where `tabel retur`.`tgl_trans` = '$data[tgl]' ");
                         while ($data2 = mysqli_fetch_array($sql2)) {
                         ?>
                              <tr>
                                   <td><?= $data['nm_brg']; ?></td>
                                   <td><?= $data['mrk_brg']; ?></td>
                                   <td><?= $data['jml_brg']; ?></td>
                                   <td><?= $data['hrg_brg']; ?></td>
                                   <td><?= $data['total_hrg']; ?></td>
                              </tr>
                         <?php
                         }
                         ?>
                    </table>
               </div>
          <?php
     }
          ?>
          </div>
</div>