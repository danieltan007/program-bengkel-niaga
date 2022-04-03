<style>
     body {
          font-size: 8px;
     }
</style>

<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_mekanik'];
$total = $_POST['total'];
$bayar = $_POST['bayar'];
$sisa = $_POST['kembali'];
$mekanik = $_POST['mekanik'];
$ongkos = $_POST['ongkos'];

$tgl = date('Y-m-d');

$sql1 = "select * from `daftar layanan temp` where user = '$user'";
$cari = mysqli_query($conn, $sql1);

if (mysqli_num_rows($cari) < 1) { ?>
     <script>
          alert("Data gagal di proses! Silahkan coba lagi!");
          window.location.href = "mekanik.php";
     </script>
<?php  } else { ?>
     <h3 align="center">Tiara Motor</h3>
     <p align="center">Jl Raya Ngabang, Ngabang, Kalimantan Barat</p>
     <br><br>
     Tanggal : <?php echo $tgl; ?><br>
     Metode Pembayaran: Lunas
     <br>
     <hr>
     <table stlye="font-size:8px;" border=1 align="center" cellspacing="2" cellpadding="2">
          <tr>
               <td colspan="2">Jasa</td>
               <td colspan="2">Nama Barang</td>
          </tr>
          <?php
          while ($data = mysqli_fetch_array($cari)) {
               if ($data['sumber'] == 'stok toko') {
                    $sql3 = "select * from `tabel barang pusat` where kd_brg = '$data[kd_brg]' ";
                    $cek2 = mysqli_query($conn, $sql3);
                    $data2 = mysqli_fetch_array($cek2);

                    //update stok
                    $brgbeli = (int)$data['jml_brg'];
                    $brgstok = (int)$data2['stock_toko'];
                    $sisastok = $brgstok - $brgbeli;

                    if (empty($sisastok)) {
                         $sisastok = 0;
                    } else if ($sisastok < 0) {
                         exit("Stock barang " . $data['nm_brg'] . " tidak mencukupi");
                    }

                    //kode det-001
                    $query1 = "select max(id_trans) as maxkode from `detail transaksi`";
                    $hasil2 = mysqli_query($conn, $query1);
                    $data4 = mysqli_fetch_array($hasil2);
                    $kodetrans2 = $data4['maxkode'];
                    $ubah1 = (int) substr($kodetrans2, 4, 3);
                    $ubah1++;
                    $kodetrans2 = "DET-" . sprintf("%03s", $ubah1);

                    $sql5 = "insert into `detail transaksi` 
                    (id_trans, nm_brg, mrk_brg, jml_beli, diskon, total_harga, tgl_trns, status, hrg_brg, kd_brg, korting) values 
                    ('$kodetrans2', '$data[nm_brg]', '$data[merek]', '$data[jml_brg]', '$data[diskon]', '$data[total]', '$tgl', 'lunas', '$data[hrg_brg]', '$data[kd_brg]', '$data[korting]')";
                    mysqli_query($conn, $sql5);

                    //hitung jumlah keuntungan per barang
                    $modal = (int)$data2['hrg_modal'];
                    $kort = (int)$data['korting'] / (int)$data['jml_brg'];
                    $jual = (int)$data['hrg_brg'] - $kort;
                    $profit = $jual - $modal;

                    //kode LAP-001 laporan penjualan
                    $query2 = "select max(id_lap_jual) as maxkode from `laporan penjualan`";
                    $hasil3 = mysqli_query($conn, $query2);
                    $data5 = mysqli_fetch_array($hasil3);
                    $kodetrans3 = $data5['maxkode'];
                    $ubah2 = (int) substr($kodetrans3, 4, 3);
                    $ubah2++;
                    $kodetrans3 = "LAP-" . sprintf("%03s", $ubah2);

                    $sql6 = "INSERT INTO `laporan penjualan` 
                    (`id_lap_jual`, `id_trns`, `tgl_jual`, `user`, `nm_brg`, `jasa`, `jumlah`, `harga_jual`, `modal_brg`, `profit_brg`, sumber, total_harga, ongkos) VALUES 
                    ('$kodetrans3', '$kodetrans2', '$tgl', 'kasir 2', '$data[nm_brg]', '$data[jenis]', '$data[jml_brg]', '$jual', '$modal', '$profit', '$data[sumber]', '$data[total]', '$ongkos')";
                    mysqli_query($conn, $sql6);
                    $ongkos = 0;

                    $sql4 = "update `tabel barang pusat` set stock_toko = '$sisastok' where kd_brg = '$data[kd_brg]'";
                    mysqli_query($conn, $sql4);

                    //masukkan pekerjaan mekanik
                    $sql9 = "select * from `table mekanik` where id_mekanik = '$mekanik'";
                    $cari9 = mysqli_query($conn, $sql9);
                    $data9 = mysqli_fetch_array($cari9);

                    //kode lap kerja mekanik LMK-001
                    $sql10 = "select max(kd_lap) as maxkode from `laporan pekerjaan mekanik`";
                    $cari10 = mysqli_query($conn, $sql10);
                    $data10 = mysqli_fetch_array($cari10);
                    $kodetrans10 = $data10['maxkode'];
                    $ubah10 = (int) substr($kodetrans10, 4, 3);
                    $ubah10++;
                    $kodetrans10 = "LMK-" . sprintf("%03s", $ubah10);

                    $sql8 = "insert into `laporan pekerjaan mekanik` 
                    (kd_lap, id_mekanik, tgl, nm_mknk, reparasi, id_lap_jual) values 
                    ('$kodetrans10', '$mekanik', '$tgl', '$data9[nm_mekanik]', '$data[jenis]', '$kodetrans3')";
                    mysqli_query($conn, $sql8);
               } else if ($data['sumber'] == 'toko lain') {
                    //kode DET-001
                    $query1 = "select max(id_trans) as maxkode from `detail transaksi`";
                    $hasil2 = mysqli_query($conn, $query1);
                    $data4 = mysqli_fetch_array($hasil2);
                    $kodetrans2 = $data4['maxkode'];
                    $ubah1 = (int) substr($kodetrans2, 4, 3);
                    $ubah1++;
                    $kodetrans2 = "DET-" . sprintf("%03s", $ubah1);

                    $sql5 = "insert into `detail transaksi` 
                    (id_trans, nm_brg, mrk_brg, jml_beli, diskon, total_harga, tgl_trns, status, hrg_brg, kd_brg, korting) values 
                    ('$kodetrans2', '$data[nm_brg]', '', '$data[jml_brg]', '0', '$data[total]', '$tgl', 'lunas', '$data[hrg_brg]', '$data[kd_brg]', '$data[korting]')";
                    mysqli_query($conn, $sql5);

                    //kode LAP-001 laporan penjualan
                    $query2 = "select max(id_lap_jual) as maxkode from `laporan penjualan`";
                    $hasil3 = mysqli_query($conn, $query2);
                    $data5 = mysqli_fetch_array($hasil3);
                    $kodetrans3 = $data5['maxkode'];
                    $ubah2 = (int) substr($kodetrans3, 4, 3);
                    $ubah2++;
                    $kodetrans3 = "LAP-" . sprintf("%03s", $ubah2);

                    $sql6 = "INSERT INTO `laporan penjualan` 
                    (`id_lap_jual`, `id_trns`, `tgl_jual`, `user`, `nm_brg`, `jasa`, `jumlah`, `harga_jual`, `modal_brg`, `profit_brg`, sumber, total_harga, ongkos) VALUES 
                    ('$kodetrans3', '$kodetrans2', '$tgl', 'kasir 2', '$data[nm_brg]', '$data[jenis]', '$data[jml_brg]', '$data[subtotal]', '0', '0', '$data[sumber]', '$data[total]', '$ongkos')";
                    mysqli_query($conn, $sql6);
                    $ongkos = 0;

                    //masukkan pekerjaan mekanik
                    $sql9 = "select * from `table mekanik` where id_mekanik = '$mekanik'";
                    $cari9 = mysqli_query($conn, $sql9);
                    $data9 = mysqli_fetch_array($cari9);

                    //kode lap kerja mekanik LMK-001
                    $sql10 = "select max(kd_lap) as maxkode from `laporan pekerjaan mekanik`";
                    $cari10 = mysqli_query($conn, $sql10);
                    $data10 = mysqli_fetch_array($cari10);
                    $kodetrans10 = $data10['maxkode'];
                    $ubah10 = (int) substr($kodetrans10, 4, 3);
                    $ubah10++;
                    $kodetrans10 = "LMK-" . sprintf("%03s", $ubah10);

                    $sql8 = "insert into `laporan pekerjaan mekanik` 
                    (kd_lap, id_mekanik, tgl, nm_mknk, reparasi, id_lap_jual) values 
                    ('$kodetrans10', '$mekanik', '$tgl', '$data9[nm_mekanik]', '$data[jenis]', '$kodetrans3')";
                    mysqli_query($conn, $sql8);
               } else if ($data['sumber'] == 'pembeli') {
                    //kode det-001
                    $query1 = "select max(id_trans) as maxkode from `detail transaksi`";
                    $hasil2 = mysqli_query($conn, $query1);
                    $data4 = mysqli_fetch_array($hasil2);
                    $kodetrans2 = $data4['maxkode'];
                    $ubah1 = (int) substr($kodetrans2, 4, 3);
                    $ubah1++;
                    $kodetrans2 = "DET-" . sprintf("%03s", $ubah1);

                    $sql5 = "insert into `detail transaksi` 
                    (id_trans, nm_brg, mrk_brg, jml_beli, diskon, total_harga, tgl_trns, status, hrg_brg, kd_brg, korting) values 
                    ('$kodetrans2', '$data[nm_brg]', '$data[merek]', '$data[jml_brg]', '$data[diskon]', '$data[total]', '$tgl', 'lunas', '$data[hrg_brg]', '$data[kd_brg]', '$data[korting]')";
                    mysqli_query($conn, $sql5);

                    //kode LAP-001 laporan penjualan
                    $query2 = "select max(id_lap_jual) as maxkode from `laporan penjualan`";
                    $hasil3 = mysqli_query($conn, $query2);
                    $data5 = mysqli_fetch_array($hasil3);
                    $kodetrans3 = $data5['maxkode'];
                    $ubah2 = (int) substr($kodetrans3, 4, 3);
                    $ubah2++;
                    $kodetrans3 = "LAP-" . sprintf("%03s", $ubah2);

                    $sql6 = "INSERT INTO `laporan penjualan` 
                    (`id_lap_jual`, `id_trns`, `tgl_jual`, `user`, `nm_brg`, `jasa`, `jumlah`, `harga_jual`, `modal_brg`, `profit_brg`, sumber, total_harga, ongkos) VALUES 
                    ('$kodetrans3', '$kodetrans2', '$tgl', 'kasir 2', '$data[nm_brg]', '$data[jenis]', '$data[jml_brg]', '$data[subtotal]', '0', '0', '$data[sumber]', '$data[total]', '$ongkos')";
                    mysqli_query($conn, $sql6);
                    $ongkos = 0;

                    //masukkan pekerjaan mekanik
                    $sql9 = "select * from `table mekanik` where id_mekanik = '$mekanik'";
                    $cari9 = mysqli_query($conn, $sql9);
                    $data9 = mysqli_fetch_array($cari9);

                    //kode lap kerja mekanik LMK-001
                    $sql10 = "select max(kd_lap) as maxkode from `laporan pekerjaan mekanik`";
                    $cari10 = mysqli_query($conn, $sql10);
                    $data10 = mysqli_fetch_array($cari10);
                    $kodetrans10 = $data10['maxkode'];
                    $ubah10 = (int) substr($kodetrans10, 4, 3);
                    $ubah10++;
                    $kodetrans10 = "LMK-" . sprintf("%03s", $ubah10);

                    $sql8 = "insert into `laporan pekerjaan mekanik` 
                    (kd_lap, id_mekanik, tgl, nm_mknk, reparasi, id_lap_jual) values 
                    ('$kodetrans10', '$mekanik', '$tgl', '$data9[nm_mekanik]', '$data[jenis]', '$kodetrans3')";
                    mysqli_query($conn, $sql8);
               }
          ?>
               <tr>
                    <td colspan="2"><?php echo $data['jenis']; ?></td>
                    <td colspan="2"><?php echo $data['nm_brg']; ?></td>
               </tr>
               <Tr>
                    <td><?php echo "subtotal : " . number_format($data['subtotal']); ?></td>
                    <td><?php echo "jumlah barang : " . $data['jml_brg']; ?></td>
                    <td>-<?php echo "diskon : " . $data['diskon']; ?>%</td>
                    <td><?php echo "total : " . number_format($data['total']); ?></td>
               </Tr>
               <br><br>
          <?php    }
          ?>
          <tr>
               <td colspan="2">Total Harga</td>
               <td colspan="2"><?php echo number_format($total); ?></td>
          </tr>
          <tr>
               <td colspan="2">Bayar</td>
               <td colspan="2"><?php echo number_format($bayar); ?></td>
          </tr>
          <tr>
               <td colspan="2">Kembalian</td>
               <td colspan="2"><?php echo number_format($sisa); ?></td>
          </tr>
     </table>
     <hr>
     <H4 align="center">Terima Kasih atas Belanjaan Anda</H4>
<?php
     $sql2 = "delete from `daftar layanan temp` where user = '$user' ";
     mysqli_query($conn, $sql2);

     //buat id trans
     $query = "select max(id_trns) as maxkode from `tabel transaksi`";
     $hasil = mysqli_query($conn, $query);
     $data3 = mysqli_fetch_array($hasil);
     $kodetrans = $data3['maxkode'];
     $ubah = (int) substr($kodetrans, 4, 3);
     $ubah++;
     $kodetrans = "TRN-" . sprintf("%03s", $ubah);

     $sql4 = "insert into `tabel transaksi` (id_trns, tgl_trns, total_harga, status) values ('$kodetrans', '$tgl', '$total', 'lunas')";
     mysqli_query($conn, $sql4);
}
?>

<script type="text/javascript">
     alert("berhasil melakukan Pembayaran!");
     window.print();
     window.onafterprint = function(e) {
          closePrintView();
     }

     function closePrintView() {
          window.location.href = "mekanik.php";
     }
</script>