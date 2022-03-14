<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.bootstrap_4.min.css" integrity="sha512-2C6AmJKgt4B+bQc08/TwUeFKkq8CsBNlTaNcNgUmsDJSU1Fg+R6azDbho+ZzuxEkJnCjLZQMozSq3y97ZmgwjA==" crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js" integrity="sha512-qzgd5cYSZcosqpzpn7zF2ZId8f/8CHmFKZ8j7mU4OUXTNRd5g+ZHBPsgKEwoqxCtdQvExE5LprwwPAgoicguNg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
include "../koneksi.php";

                         $awal = date('Y-m-d', strtotime($_GET['awal']));
                         $akhir = date('Y-m-d', strtotime($_GET['akhir']));
$hariini = date("d-m-Y");

//hitung jumlah profit
$sql1 = "select sum(profit_brg) as jumlah from `laporan penjualan` where tgl_jual between '$awal' and '$akhir' ";
$simpan = mysqli_query($conn, $sql1);
$data1 = mysqli_fetch_array($simpan);

$sql = "select * from `laporan penjualan` where tgl_jual between '$awal' and '$akhir' ";
$cari = mysqli_query($conn, $sql);

?>
<h2 align="center">Laporan Penjualan</h2>
<br>
Periode Tanggal: <?php echo date("d-m-Y", strtotime($awal)); ?> sampai <?php echo date("d-m-Y", strtotime($akhir)); ?><br>
Dicetak pada tanggal: <?php echo $hariini; ?>
<br><br>
<table cellpadding="2" cellspacing="2" class="table table-bordered table-striped">
     <tr>
          <th>Tanggal</th>
          <th>User</th>
          <th>Barang</th>
          <th>Jasa</th>
          <th>Jumlah</th>
          <th>Total Harga</th>
          <th>Modal</th>
          <th>Profit</th>
     </tr>
     <?php
     while ($data = mysqli_fetch_array($cari)) { ?>
          <tr>
               <td><?php echo $data['tgl_jual']; ?></td>
               <td><?php echo $data['user']; ?></td>
               <td><?php echo $data['nm_brg']; ?></td>
               <td><?php echo $data['jasa']; ?></td>
               <td><?php echo $data['jumlah']; ?></td>
               <td><?php echo number_format($data['harga_jual']); ?></td>
               <td><?php echo number_format($data['modal_brg']); ?></td>
               <td><?php echo number_format($data['profit_brg']); ?></td>
          </tr>
     <?php
     }
     ?>
</table>
<br>
<p>Jumlah Keuntungan = <?php echo number_format($data1['jumlah']); ?></p>

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