<style>
     body {
          font-size: 8px;
     }
</style>

<?php
include "../koneksi.php";
session_start();

$user = $_SESSION['id_grosir'];
// ! nnti mau di perbaiki lagi
$nama = $_POST['nama'];
$total = $_POST['total'];
$bayar = $_POST['bayar'];
$sisa = $_POST['kembalian'];
$tgl = date('Y-m-d');

$sql1 = "select * from `daftar grosir temp` where user = '$user'";
$dapat = mysqli_query($conn, $sql1);
?>

<head>
     <h3 align="center">Tiara Motor</h3>
     <p align="center">Jl Raya Ngabang, Ngabang, Kalimantan Barat</p>
     <br>
     Tanggal : <?php echo date('d-m-Y', strtotime($tgl)); ?><br>
     Metode Pembayaran: Lunas
     <br>
</head>
<hr>

<body>
     <table style="font-size:8px;" border=0 align="center">
          <?php
          while ($data = mysqli_fetch_array($dapat)) {
               $sql3 = "select * from `tabel barang pusat` where kd_brg = '$data[kd_brg]' ";
               $cek2 = mysqli_query($conn, $sql3);
               $data2 = mysqli_fetch_array($cek2);

               $brgbeli = (int)$data['jml_brg'];
               $brgstok = (int)$data2['stock_gudang'];
               $sisastok = $brgstok - $brgbeli;

               if (empty($sisastok)) {
                    $sisastok = 0;
               } else if ($sisastok < 0) {
                    exit("<script>
                              alert('Stock barang " . $data['nm_brg'] . " tidak mencukupi!');
                              window.location.href = 'kasir.php';
                         </script>");
               }

               $diskon = 0;
               //kode DET-001 detail transaksi
               $query1 = "select max(id_trans) as maxkode from `detail transaksi`";
               $hasil2 = mysqli_query($conn, $query1);
               $data4 = mysqli_fetch_array($hasil2);
               $kodetrans2 = $data4['maxkode'];
               $ubah1 = (int) substr($kodetrans2, 4, 3);
               $ubah1++;
               $kodetrans2 = "DET-" . sprintf("%03s", $ubah1);

               //hitung jumlah keuntungan per barang
               $modal = (int)$data2['hrg_modal'];
               $jual = (int)$data['st_hrg'];
               $profit = $jual - $modal;
               $diskon = ($data2['hrg_jual'] - $jual) / $data2['hrg_jual'] * 100;

               $sql5 = "insert into `detail transaksi` 
               (tgl_trns, id_trans, kd_brg, nm_brg, mrk_brg, jml_beli, hrg_brg, diskon, total_harga, status, korting) values 
               ('$tgl', '$kodetrans2', '$data[kd_brg]', '$data2[nm_brg]', '$data2[mrk_brg]', '$data[jml_brg]', '$data[st_hrg]', '$diskon', '$data[t_hrg]', 'Lunas', '0')";
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
               (`id_lap_jual`, `id_trns`, `tgl_jual`, `user`, `nm_brg`, `jasa`, `jumlah`, `harga_jual`, `modal_brg`, `profit_brg`) VALUES 
               ('$kodetrans3', '$kodetrans2', '$tgl', 'grosir', '$data2[nm_brg]', 'jual barang', '$data[jml_brg]', '$jual', '$modal', '$profit')";
               mysqli_query($conn, $sql6);

               $sql8 = mysqli_query($conn, "insert into `riwayat pembelian` values ('$kodetrans2', '$nama', 'grosir')");

               $sql4 = "update `tabel barang pusat` set stock_gudang = '$sisastok' where kd_brg = '$data[kd_brg]'";
               mysqli_query($conn, $sql4);

               echo print_r(mysqli_error_list($conn));
          ?>
               <tr>
                    <td colspan="4"><?php echo $data2['nm_brg']; ?></td>
               </tr>
               <tr>
                    <td><?php echo number_format($data['st_hrg']); ?></td>
                    <td>x <?php echo $data['jml_brg']; ?></td>
                    <td><?php echo number_format($data['t_hrg']); ?></td>
               </tr>
          <?php    }
          ?>
          <tr>
               <td>Nama Pembeli</td>
               <td><?= $nama; ?></td>
          </tr>
          <tr>
               <td>Total Harga</td>
               <td><?php echo number_format($total); ?></td>
          </tr>
          <tr>
               <td>Bayar</td>
               <td><?php echo number_format($bayar); ?></td>
          </tr>
          <tr>
               <td>Kembali</td>
               <td><?php echo number_format($sisa); ?></td>
          </tr>
     </table>
     <hr>
     <H4 align="center">Terima Kasih atas Belanjaan Anda</H4>
     <?php
     $sql2 = "delete from `daftar grosir temp` ";
     mysqli_query($conn, $sql2);

     //buat id trans TRN-001
     $query = "select max(id_trns) as maxkode from `tabel transaksi`";
     $hasil = mysqli_query($conn, $query);
     $data3 = mysqli_fetch_array($hasil);
     $kodetrans = $data3['maxkode'];
     $ubah = (int) substr($kodetrans, 4, 3);
     $ubah++;
     $kodetrans = "TRN-" . sprintf("%03s", $ubah);

     $sql4 = "insert into `tabel transaksi` (id_trns, tgl_trns, total_harga, status) values ('$kodetrans', '$tgl', '$total', 'lunas')";
     mysqli_query($conn, $sql4);

     ?>
</body>
<script type="text/javascript">
     alert("berhasil melakukan Pembayaran!");
     window.print();
     window.onafterprint = function(e) {
          closePrintView();
     }

     function closePrintView() {
          window.location.href = "kasir.php";
     }
</script>