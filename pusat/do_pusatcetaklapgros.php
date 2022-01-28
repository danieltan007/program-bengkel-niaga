<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.bootstrap_4.min.css" integrity="sha512-2C6AmJKgt4B+bQc08/TwUeFKkq8CsBNlTaNcNgUmsDJSU1Fg+R6azDbho+ZzuxEkJnCjLZQMozSq3y97ZmgwjA==" crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js" integrity="sha512-qzgd5cYSZcosqpzpn7zF2ZId8f/8CHmFKZ8j7mU4OUXTNRd5g+ZHBPsgKEwoqxCtdQvExE5LprwwPAgoicguNg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<div class="accordion" id="data-trans">
     <?php
     include "../koneksi.php";

     if (empty($_GET['awal']) || empty($_GET['akhir'])) {
          echo "Masukkan Tanggal Transaksi!";
     } else {
     ?> <?php
          $tglawal = $_GET['awal'];
          $tglakhir = $_GET['akhir'];

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
</div>
</div>
<script type="text/javascript">
     // alert("berhasil melakukan print!");
     window.print();
     window.onafterprint = function(e) {
          closePrintView();
     }

     function closePrintView() {
          window.location.href = "pusat.php";
     }
</script>