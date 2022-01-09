<style>
     body {
          font-size: 8px;
     }
</style>
<?php
include "koneksi.php";

$jbeli = $_POST['jbeli'];
$mbayar = $_POST['mbayar'];
$noktp = $_POST['noktp'];
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$total = $_POST['total'];
$sisa = abs($_POST['kembalian']);
$alamat = $_POST['alamat'];
$bayar = $_POST['bayar'];
$tgl = date('Y-m-d');

$sql1 = "select * from `daftar belanja temp`";
$dapat = mysqli_query($conn, $sql1);

if (mysqli_num_rows($dapat) < 1) { ?>
     <script>
          alert("Data gagal di proses! Silahkan coba lagi!");
          window.location.href = "kasir.php";
     </script>
<?php  } else { ?>
     <h3 align="center">Tiara Motor</h3>
     <p align="center">Jl Raya Ngabang, Ngabang, Kalimantan Barat</p>
     <br><br>
     Nama Pembeli: <?php echo $nama; ?><br>
     Tanggal : <?php echo $tgl; ?><br>
     Metode Pembayaran: Cicil
     <br>
     <hr>
     <table stlye="font-size:8px;" border=0 align="center">
          <?php
          while ($data = mysqli_fetch_array($dapat)) {
               $sql3 = "select * from `tabel barang pusat` where kd_brg = '$data[kd_brg]' ";
               $cek2 = mysqli_query($conn, $sql3);
               $data2 = mysqli_fetch_array($cek2);

               //kode det-001
               $query1 = "select max(id_trans) as maxkode from `detail transaksi`";
               $hasil2 = mysqli_query($conn, $query1);
               $data4 = mysqli_fetch_array($hasil2);
               $kodetrans2 = $data4['maxkode'];
               $ubah1 = (int) substr($kodetrans2, 4, 3);
               $ubah1++;
               $kodetrans2 = "DET-" . sprintf("%03s", $ubah1);

               $sql5 = "insert into `detail transaksi` 
               (tgl_trns, id_trans, kd_brg,  nm_brg, mrk_brg, jml_beli, hrg_brg, diskon, total_harga, status, korting) values 
               ('$tgl', '$kodetrans2', '$data[kd_brg]', '$data[nm_brg]', '$data[merek]', '$data[jml_brg]', '$data[st_hrg]', '$data[diskon]', '$data[t_hrg]', 'Cicil', '$data[korting]')";
               mysqli_query($conn, $sql5);

               //hitung jumlah keuntungan per barang
               $modal = (int)$data2['hrg_modal'];
               $kort = (int)$data['korting'] / (int)$data['jml_brg'];
               $jual = (int)$data['st_hrg'] - $kort;
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
               (`id_lap_jual`, `id_trns`, `tgl_jual`, `user`, `nm_brg`, `jasa`, `jumlah`, `harga_jual`, `modal_brg`, `profit_brg`) VALUES 
               ('$kodetrans3', '$kodetrans2', '$tgl', 'kasir 1', '$data[nm_brg]', 'jual barang', '$data[jml_brg]', '$jual', '$modal', '$profit')";
               mysqli_query($conn, $sql6);

               $brgbeli = (int)$data['jml_brg'];
               $brgstok = (int)$data2['stock_'];
               $sisastok = $brgstok - $brgbeli;

               $sql4 = "update `tabel barang pusat` set stock_toko = '$sisastok' where kd_brg = '$data[kd_brg]'";
               $cek3 = mysqli_query($conn, $sql4);
          ?>
               <tr>
                    <td colspan="4"><?php echo $data['nm_brg']; ?></td>
               </tr>
               <Tr>
                    <td><?php echo number_format($data['st_hrg']); ?></td>
                    <td><?php echo $data['jml_brg']; ?></td>
                    <td>-<?php echo $data['diskon']; ?>%</td>
                    <td><?php echo number_format($data['t_hrg']); ?></td>
               </Tr>
          <?php    }
          $sql = "insert into `tabel piutang` (noktp, nama, alamat, `no hp`, tgl_trns, t_hrg, sisa_byr, id_trns) values ('$noktp', '$nama', '$alamat', '$nohp', '$tgl', '$total', '$sisa' ,'$kodetrans2')";
          mysqli_query($conn, $sql);
          ?>
          <tr>
               <td>Total Harga</td>
               <td><?php echo number_format($total); ?></td>
          </tr>
          <tr>
               <td>Bayar</td>
               <td><?php echo number_format($bayar); ?></td>
          </tr>
          <tr>
               <td>Sisa Pembayaran</td>
               <td><?php echo number_format($sisa); ?></td>
          </tr>
     </table>
     <hr>
     <H4 align="center">Terima Kasih atas Belanjaan Anda</H4>
<?php
     $sql2 = "delete from `daftar belanja temp` ";
     mysqli_query($conn, $sql2);

     //buat id trans
     $query = "select max(id_trns) as maxkode from `tabel transaksi`";
     $hasil = mysqli_query($conn, $query);
     $data3 = mysqli_fetch_array($hasil);
     $kodetrans = $data3['maxkode'];
     $ubah = (int) substr($kodetrans, 4, 3);
     $ubah++;
     $kodetrans = "TRN-" . sprintf("%03s", $ubah);

     $sql4 = "insert into `tabel transaksi` (id_trns, tgl_trns, total_harga, status) values ('$kodetrans', '$tgl', '$total', '$mbayar')";
     mysqli_query($conn, $sql4);

     $sql8 = "delete from `daftar belanja temp`";
     mysqli_query($conn, $sql8);
}
?>

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