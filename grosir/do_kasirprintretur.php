<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
$awal = date('d-m-Y', strtotime($_GET['awal']));
$akhir = date('d-m-Y', strtotime($_GET['akhir']));
?>

<h2 align="center">Laporan Barang Retur Grosir</h2>
<h4 align="center">Periode <?= $awal; ?> Sampai <?= $akhir; ?></h4>
<br>
Tanggal Cetak : <?= date('d-m-Y'); ?>
<br><br>

<div class="accordion" id="data-retur">
     <?php
     include "../koneksi.php";
     $awal = date('Y-m-d', strtotime($_GET['awal']));
     $akhir = date('Y-m-d', strtotime($_GET['akhir']));

     $sql = mysqli_query($conn, "select distinct(`tabel retur`.tgl_trans) as tgl from `tabel retur` inner join `riwayat pembelian` on `tabel retur`.`kd_trans` = `riwayat pembelian`.`id_trans` where `tabel retur`.tgl_trans between '$awal' and '$akhir' and `riwayat pembelian`.`tipe` = 'grosir'");
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
                         $sql2 = mysqli_query($conn, "SELECT `tabel barang pusat`.`nm_brg`, `tabel barang pusat`.`mrk_brg`, `tabel retur`.`jml_brg`, `tabel retur`.`hrg_brg`, `tabel retur`.`total_hrg` FROM `tabel retur` inner join `detail transaksi` on `detail transaksi`.`id_trans` = `tabel retur`.`kd_trans` inner join `tabel barang pusat` on `tabel barang pusat`.`kd_brg` = `detail transaksi`.`kd_brg` inner join `riwayat pembelian` on `riwayat pembelian`.id_trans = `tabel retur`.kd_trans where `tabel retur`.`tgl_trans` = '$data[tgl]' and `riwayat pembelian`.`tipe` = 'grosir'");
                         $sql3 = mysqli_query($conn, "select sum(total_hrg) as total from `tabel retur` inner join `riwayat pembelian` on `tabel retur`.`kd_trans` = `riwayat pembelian`.`id_trans` where `tabel retur`.tgl_trans = '$data[tgl]' and `riwayat pembelian`.`tipe` = 'grosir'");
                         $data3 = mysqli_fetch_array($sql3);
                         $total = $data3['total'];

                         while ($data2 = mysqli_fetch_array($sql2)) {
                         ?>
                              <tr>
                                   <td><?= $data2['nm_brg']; ?></td>
                                   <td><?= $data2['mrk_brg']; ?></td>
                                   <td><?= $data2['jml_brg']; ?></td>
                                   <td><?= number_format($data2['hrg_brg']); ?></td>
                                   <td><?= number_format($data2['total_hrg']); ?></td>
                              </tr>
                         <?php
                         }
                         ?>
                         <tr>
                              <td colspan="4">Total</td>
                              <td><?= number_format($total) ?></td>
                         </tr>
                    </table>
               </div>
          <?php
     }
          ?>
          </div>
</div>

<?php
$sql4 = mysqli_query($conn, "select sum(total_hrg) as total from `tabel retur` inner join `riwayat pembelian` on `tabel retur`.`kd_trans` = `riwayat pembelian`.`id_trans` where tgl_trans between '$awal' and '$akhir' and `riwayat pembelian`.`tipe` = 'grosir'");
$data4 = mysqli_fetch_array($sql4);
$total_retur = $data4['total'];
?>
<br>
Total Retur : <?= number_format($total_retur) ?>

<script type="text/javascript">
     alert("berhasil melakukan print!");
     window.print();
     window.onafterprint = function(e) {
          closePrintView();
     }

     function closePrintView() {
          window.location.href = "kasir.php";
     }
</script>