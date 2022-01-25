<div class="accordion" id="data-trans">
     <?php
     include "../koneksi.php";

     if (empty($_POST['awal3']) || empty($_POST['akhir3'])) {
          echo "Masukkan Tanggal Transaksi!";
     } else {
     ?> <?php
          $tglawal = $_POST['awal3'];
          $tglakhir = $_POST['akhir3'];

          $sql = "select DISTINCT(`detail transaksi`.`tgl_trns`) from `detail transaksi` inner join `tabel transaksi grosir` on `detail transaksi`.`id_trans` = `tabel transaksi grosir`.`id_trans` where `detail transaksi`.`tgl_trns` BETWEEN '$tglawal' and '$tglakhir'";
          $cek = mysqli_query($conn, $sql);
          $no = 1;
          $children = 1;

          while ($data = mysqli_fetch_array($cek)) {
               $tgl_trans = $data['tgl_trns'];
          ?>
               <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-<?= $no ?>">
                         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $no ?>" aria-expanded="true" aria-controls="collapse-<?= $no ?>">
                              <?= date('d-m-Y', strtotime($tgl_trans)) ?>
                         </button>
                    </h2>
                    <?php
                    $sql2 = mysqli_query($conn, "select DISTINCT(`tabel transaksi grosir`.`nama`) from `tabel transaksi grosir` inner join `detail transaksi` on `detail transaksi`.`id_trans` = `tabel transaksi grosir`.`id_trans` where `detail transaksi`.`tgl_trns` = '$tgl_trans'");
                    ?>
                    <div id="collapse-<?= $no ?>" class="accordion-collapse collapse show" aria-labelledby="heading-<?= $no ?>" data-bs-parent="#data-trans">
                         <div class="accordion-body">
                              <?php
                              while ($data2 = mysqli_fetch_array($sql2)) {
                                   $nama = $data2['nama'];
                                   $sql3 = mysqli_query($conn, "select * from `detail transaksi` inner join `tabel transaksi grosir` on `detail transaksi`.`id_trans` = `tabel transaksi grosir`.`id_trans` where `tabel transaksi grosir`.`nama` = '$nama'");
                              ?>
                                   <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-<?= $no ?>-<?= $children ?>">
                                             <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $no ?>-<?= $children; ?>" aria-expanded="true" aria-controls="collapse-<?= $no ?>-<?= $children; ?>">
                                                  <?= $data2['nama']; ?>
                                             </button>
                                        </h2>
                                        <div id="collapse-<?= $no ?>-<?= $children; ?>" class="accordion-collapse collapse show" aria-labelledby="heading-<?= $no ?>-<?= $children; ?>" data-bs-parent="#heading-<?= $no; ?>">
                                             <div class="accordion-body">
                                                  <table class="table table-striped">
                                                       <tr>
                                                            <th>Nama Barang</th>
                                                            <th>Merk</th>
                                                            <th>Jumlah</th>
                                                            <th>Harga</th>
                                                            <th>Diskon (%)</th>
                                                            <th>Total Harga</th>
                                                       </tr>
                                                       <?php
                                                       while ($data3 = mysqli_fetch_array($sql3)) {
                                                       ?>
                                                            <tr>
                                                                 <td><?php echo $data3['nm_brg'] ?></td>
                                                                 <td><?php echo $data3['mrk_brg'] ?></td>
                                                                 <td><?php echo $data3['jml_beli'] ?></td>
                                                                 <td><?php echo number_format($data3['hrg_brg']) ?></td>
                                                                 <td><?php echo $data3['diskon'] ?></td>
                                                                 <td><?php echo number_format($data3['total_harga']) ?></td>
                                                            </tr>
                                                       <?php
                                                       }
                                                       ?>
                                                  </table>
                                             </div>
                                        </div>
                                   </div>
                              <?php
                                   $children++;
                              }
                              ?>
                         </div>
                    </div>
          <?php
               $no++;
          }
     }
          ?>
               </div>