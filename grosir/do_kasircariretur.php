<div class="accordion" id="data-trans">
     <?php
     include "../koneksi.php";
     $cari = "%" . $_POST['cari'] . "%";
     $sql = "select distinct nama from `riwayat pembelian` where not EXISTS (select kd_retur from `tabel retur` where `riwayat pembelian`.`id_trans` = `tabel retur`.`kd_trans`) and `riwayat pembelian`.`nama` like '$cari' and `riwayat pembelian`.tipe = 'grosir'";
     $cek = mysqli_query($conn, $sql);
     $no = 1;

     while ($data = mysqli_fetch_array($cek)) {
     ?>
          <div class="accordion-item">
               <h2 class="accordion-header" id="heading-<?= $no ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $no ?>" aria-expanded="true" aria-controls="collapse-<?= $no ?>">
                         <?= $data['nama'] ?>
                    </button>
               </h2>
               <?php
               $sql2 = mysqli_query($conn, "select `riwayat pembelian`.`id_trans`, `detail transaksi`.`kd_brg`, `detail transaksi`.`nm_brg`, `detail transaksi`.`jml_beli`, `detail transaksi`.`hrg_brg`, `detail transaksi`.`total_harga` from `riwayat pembelian` inner join `detail transaksi` on `riwayat pembelian`.`id_trans` = `detail transaksi`.`id_trans` where `riwayat pembelian`.`nama` = '$data[nama]' and `riwayat pembelian`.`tipe` = 'grosir'");
               ?>
               <div id="collapse-<?= $no ?>" class="accordion-collapse collapse show" aria-labelledby="heading-<?= $no ?>" data-bs-parent="#data-trans">
                    <div class="accordion-body">
                         <table class="table table-bordered">
                              <tr>
                                   <th>Nama Barang</th>
                                   <th>Jumlah</th>
                                   <th>Harga Barang</th>
                                   <th>Total Harga</th>
                                   <th>Action</th>
                              </tr>
                              <?php
                              while ($data2 = mysqli_fetch_array($sql2)) {
                                   $nama = $data2['nm_brg'];
                                   $jml_beli = $data2['jml_beli'];
                                   $hrg_brg = $data2['hrg_brg'];
                                   $total = $data2['total_harga'];
                              ?>
                                   <tr>
                                        <td><?= $nama ?></td>
                                        <td><?= $jml_beli ?></td>
                                        <td><?= number_format($hrg_brg) ?></td>
                                        <td><?= number_format($total) ?></td>
                                        <td>
                                             <a href="do_kasirpilihretur.php?id=<?= $data2['id_trans'] ?>" id="tambah-<?= $data2['id_trans']; ?>" class="btn btn-success">Pilih Barang</a>
                                        </td>
                                   </tr>
                              <?php
                              }
                              ?>
                         </table>
                    </div>
               </div>
          <?php
          $no++;
     }
          ?>
          </div>