<div class="accordion" id="data-trans">
     <?php
     include "../koneksi.php";

     if (empty($_POST['awal']) || empty($_POST['akhir'])) {
          echo "Masukkan Tanggal Transaksi!";
     } else {
     ?> <?php
          $tglawal = $_POST['awal'];
          $tglakhir = $_POST['akhir'];

          $sql = "select distinct(tgl_trns) from `detail transaksi` where tgl_trns between '$tglawal' and '$tglakhir'";
          $cek = mysqli_query($conn, $sql);
          $no = 1;

          while ($data = mysqli_fetch_array($cek)) {
               $tgl_trans = $data['tgl_trns'];
          ?>
               <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-<?= $no ?>">
                         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $no ?>" aria-expanded="true" aria-controls="collapse-<?= $no ?>">
                              <?= date('d-m-Y', strtotime($tgl_trans)) ?>
                         </button>
                    </h2>
                    <div id="collapse-<?= $no ?>" class="accordion-collapse collapse show" aria-labelledby="heading-<?= $no ?>" data-bs-parent="#data-trans">
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
                                   $sql2 = mysqli_query($conn, "select * from `detail transaksi` where tgl_trns = '$tgl_trans' ");
                                   while ($data2 = mysqli_fetch_array($sql2)) {
                                   ?>
                                        <tr>
                                             <td><?php echo $data2['nm_brg'] ?></td>
                                             <td><?php echo $data2['mrk_brg'] ?></td>
                                             <td><?php echo $data2['jml_beli'] ?></td>
                                             <td><?php echo $data2['hrg_brg'] ?></td>
                                             <td><?php echo $data2['diskon'] ?></td>
                                             <td><?php echo $data2['total_harga'] ?></td>
                                        </tr>
                                   <?php
                                   }
                                   ?>
                              </table>
                         </div>
                    </div>
               </div>
     <?php
               $no++;
          }
     }
     ?>
</div>