-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 10:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang mekanik temp`
--

CREATE TABLE `barang mekanik temp` (
  `kd_brg` varchar(11) NOT NULL,
  `nm_brg` text NOT NULL,
  `mrk_brg` text NOT NULL,
  `jml` int(11) NOT NULL,
  `diskon` int(3) NOT NULL,
  `korting` int(12) NOT NULL,
  `hrg_brg` int(11) NOT NULL,
  `total` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar belanja temp`
--

CREATE TABLE `daftar belanja temp` (
  `kd_brg` varchar(8) NOT NULL,
  `nm_brg` varchar(20) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `jml_brg` int(7) NOT NULL,
  `diskon` int(3) NOT NULL,
  `korting` int(9) NOT NULL,
  `st_hrg` int(16) NOT NULL,
  `t_hrg` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar belanja temp`
--

INSERT INTO `daftar belanja temp` (`kd_brg`, `nm_brg`, `merek`, `jml_brg`, `diskon`, `korting`, `st_hrg`, `t_hrg`) VALUES
('1DY-E740', 'AS GEAR DEPAN JUPITE', 'DENSHIN', 1, 0, 0, 15000, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `daftar grosir temp`
--

CREATE TABLE `daftar grosir temp` (
  `kd_brg` varchar(25) NOT NULL,
  `jml_brg` int(4) NOT NULL,
  `st_hrg` int(10) NOT NULL,
  `t_hrg` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daftar layanan temp`
--

CREATE TABLE `daftar layanan temp` (
  `kd_trns` int(5) NOT NULL,
  `kd_brg` varchar(12) NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `diskon` int(3) NOT NULL,
  `korting` int(12) NOT NULL,
  `ongkos` int(16) NOT NULL,
  `jenis` text NOT NULL,
  `jml_brg` int(4) NOT NULL,
  `hrg_brg` int(16) NOT NULL,
  `subtotal` int(12) NOT NULL,
  `total` int(16) NOT NULL,
  `sumber` text NOT NULL,
  `toko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar layanan temp`
--

INSERT INTO `daftar layanan temp` (`kd_trns`, `kd_brg`, `nm_brg`, `merek`, `diskon`, `korting`, `ongkos`, `jenis`, `jml_brg`, `hrg_brg`, `subtotal`, `total`, `sumber`, `toko`) VALUES
(1, '1DY-E7402-0', 'AS GEAR DEPAN JUPITER Z1 TYPE Y', 'DENSHIN', 0, 0, 0, 'gani oli', 1, 20000, 20000, 20000, 'stok toko', ''),
(2, '23221-GN5-9', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHIN', 0, 0, 0, 'gani oli', 1, 50000, 50000, 50000, 'stok toko', ''),
(3, '23221-KFL-8', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 0, 0, 0, 'gani oli', 1, 100000, 100000, 100000, 'stok toko', ''),
(4, '2JG-17421-0', 'AS GEAR DEPAN FORCE-1 TYPE Y', 'FUKUYAMA', 0, 0, 0, 'gani oli', 1, 100000, 100000, 100000, 'stok toko', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail transaksi`
--

CREATE TABLE `detail transaksi` (
  `tgl_trns` date NOT NULL,
  `id_trans` varchar(12) NOT NULL,
  `kd_brg` varchar(8) NOT NULL,
  `nm_brg` varchar(20) NOT NULL,
  `mrk_brg` text NOT NULL,
  `jml_beli` int(4) NOT NULL,
  `hrg_brg` int(12) NOT NULL,
  `diskon` int(3) NOT NULL,
  `korting` int(12) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail transaksi`
--

INSERT INTO `detail transaksi` (`tgl_trns`, `id_trans`, `kd_brg`, `nm_brg`, `mrk_brg`, `jml_beli`, `hrg_brg`, `diskon`, `korting`, `total_harga`, `status`) VALUES
('0000-00-00', 'DET-001', '', 'ban tubeless 12', 'astrea', 1, 0, 0, 0, 130000, 'lunas'),
('2020-09-02', 'DET-002', '', 'ban tubeless 12', 'astrea', 1, 0, 0, 0, 120000, 'lunas'),
('2020-09-03', 'DET-003', '', 'test', 'astrea', 1, 0, 0, 0, 100000, 'lunas'),
('2020-09-03', 'DET-004', '', 'test', 'astrea', 1, 0, 0, 0, 100000, 'cicil'),
('2020-09-03', 'DET-005', '', 'test', 'astrea', 1, 0, 0, 0, 110000, 'cicil'),
('2020-09-04', 'DET-006', 'BRG-002', 'ban tubeless 12', 'astrea', 2, 100000, 0, 0, 200000, 'lunas'),
('2020-09-04', 'DET-007', 'BRG-001', 'test', 'astrea', 2, 80000, 0, 0, 160000, 'Lunas'),
('2020-09-08', 'DET-008', 'BRG-004', 'Ban Tubles', 'astronout', 1, 12000, 0, 0, 62000, 'lunas'),
('2020-09-09', 'DET-009', '0', '', '', 0, 0, 0, 0, 20000, 'cicil'),
('2020-09-09', 'DET-010', '0', '', '', 0, 0, 0, 0, 500000, 'cicil'),
('2020-09-13', 'DET-011', 'BRG-015', 'Iphone XRR', 'astronout', 1, 49400, 5, 400, 49000, 'Lunas'),
('2020-09-14', 'DET-012', 'BRG-017', 'Pil Estasy', 'astronout', 15, 33750, 25, 250, 506000, 'Lunas'),
('2020-09-14', 'DET-013', 'BRG-018', 'Pil Sabu sabu', 'astronout', 2, 40500, 19, 6000, 75000, 'Cicil'),
('2020-09-14', 'DET-014', 'BRG-020', 'Pil Kejang kejang', 'test', 5, 44850, 31, 250, 224000, 'Lunas'),
('2020-09-14', 'DET-015', 'BRG-019', 'Pil Harapan', 'test', 10, 52250, 5, 500, 522000, 'Cicil'),
('2020-09-22', 'DET-016', 'BRG-028', 'Ban Racing 125', 'Hrd', 1, 112500, 10, 2500, 110000, 'Lunas'),
('2020-09-22', 'DET-017', 'BRG-028', 'Ban Racing 125', 'Hrd', 1, 125000, 0, 0, 125000, 'Cicil'),
('2020-09-22', 'DET-018', 'BRG-028', 'Ban Racing 125', 'Hrd', 1, 125000, 0, 0, 125000, 'Lunas'),
('2020-09-22', 'DET-019', 'BRG-028', 'Ban Racing 125', 'Hrd', 1, 125000, 0, 0, 125000, 'Cicil'),
('2020-09-22', 'DET-020', 'BRG-005', 'Ban Tubles', 'Honda', 1, 11250, 10, 1250, 25000, 'lunas'),
('2020-09-22', 'DET-021', 'BRG-022', 'Ban luarr swalloww', 'swallow', 1, 270400, 20, 70400, 210000, 'cicil'),
('2020-09-22', 'DET-022', '0', 'Ban Tubeless', '', 2, 125000, 0, 0, 260000, 'lunas'),
('2020-09-22', 'DET-023', '0', 'Ban Racing 123', '', 2, 150000, 0, 0, 315000, 'cicil'),
('2020-09-22', 'DET-024', '0', '', '', 0, 0, 0, 0, 10000, 'lunas'),
('2020-09-22', 'DET-025', '0', '', '', 0, 0, 0, 0, 15000, 'cicil'),
('2021-03-17', 'DET-026', 'BRG-005', 'Ban Tubles', 'Honda', 5, 12250, 2, 250, 61000, 'Cicil');

-- --------------------------------------------------------

--
-- Table structure for table `laporan barang keluar`
--

CREATE TABLE `laporan barang keluar` (
  `tgl_kirim` date NOT NULL,
  `kd_brg` varchar(12) CHARACTER SET utf8mb4 NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `mrk_brg` varchar(20) NOT NULL,
  `jml_brg` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan barang keluar`
--

INSERT INTO `laporan barang keluar` (`tgl_kirim`, `kd_brg`, `nm_brg`, `mrk_brg`, `jml_brg`) VALUES
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 50),
('2020-08-27', 'BRG-002', 'test', 'top two', 50),
('2020-08-27', 'BRG-003', 'test2', 'top two', 100),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 250),
('2020-08-27', 'BRG-004', 'Ban Tubles', 'Rapstronout', 125),
('2020-08-27', 'BRG-005', 'Ban Tubles', 'Honda', 25),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 50),
('2020-08-27', 'BRG-005', 'Ban Tubles', 'Honda', 15),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 50),
('2020-08-27', 'BRG-002', 'test', 'top two', 50),
('2020-08-27', 'BRG-003', 'test2', 'top two', 100),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 250),
('2020-08-27', 'BRG-004', 'Ban Tubles', 'Rapstronout', 125),
('2020-08-27', 'BRG-005', 'Ban Tubles', 'Honda', 25),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 50),
('2020-08-27', 'BRG-005', 'Ban Tubles', 'Honda', 15),
('2020-08-28', 'BRG-001', 'ban tubeless', 'astrea', 20),
('2020-08-28', 'BRG-004', 'Ban Tubles', 'Rapstronout', 5),
('2020-08-28', 'BRG-001', 'ban tubeless', 'astrea', 15),
('2020-08-28', 'BRG-002', 'test', 'top two', 20),
('2020-08-28', 'BRG-001', 'ban tubeless', 'astrea', 20),
('2020-08-28', 'BRG-002', 'test', 'top two', 20),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 50),
('2020-08-27', 'BRG-002', 'test', 'top two', 50),
('2020-08-27', 'BRG-003', 'test2', 'top two', 100),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 250),
('2020-08-27', 'BRG-004', 'Ban Tubles', 'Rapstronout', 125),
('2020-08-27', 'BRG-005', 'Ban Tubles', 'Honda', 25),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 50),
('2020-08-27', 'BRG-005', 'Ban Tubles', 'Honda', 15),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 50),
('2020-08-27', 'BRG-002', 'test', 'top two', 50),
('2020-08-27', 'BRG-003', 'test2', 'top two', 100),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 250),
('2020-08-27', 'BRG-004', 'Ban Tubles', 'Rapstronout', 125),
('2020-08-27', 'BRG-005', 'Ban Tubles', 'Honda', 25),
('2020-08-27', 'BRG-001', 'ban tubeless', 'astrea', 50),
('2020-08-27', 'BRG-005', 'Ban Tubles', 'Honda', 15),
('2020-08-28', 'BRG-001', 'ban tubeless', 'astrea', 20),
('2020-08-28', 'BRG-004', 'Ban Tubles', 'Rapstronout', 5),
('2020-08-28', 'BRG-001', 'ban tubeless', 'astrea', 15),
('2020-08-28', 'BRG-002', 'test', 'top two', 20),
('2020-08-28', 'BRG-001', 'ban tubeless', 'astrea', 20),
('2020-08-28', 'BRG-002', 'test', 'top two', 20),
('2020-09-04', 'BRG-012', 'apalah', 'Yamaha12', 10),
('2020-09-13', 'BRG-015', 'Iphone XRR', 'astronout', 12),
('2020-09-22', 'BRG-028', 'Ban Racing 125', 'Hrd', 10);

-- --------------------------------------------------------

--
-- Table structure for table `laporan barang masuk`
--

CREATE TABLE `laporan barang masuk` (
  `tgl_dtg` date NOT NULL,
  `kd_brg` varchar(12) NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `mrk_brg` varchar(30) NOT NULL,
  `jml_brg` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan barang masuk`
--

INSERT INTO `laporan barang masuk` (`tgl_dtg`, `kd_brg`, `nm_brg`, `mrk_brg`, `jml_brg`) VALUES
('2020-09-03', 'BRG-050', 'Oli Mantap Mantap', 'Tav', 150),
('2020-09-13', 'BRG-015', 'Iphone XRR', 'astronout', 50),
('2020-09-14', 'BRG-016', 'Data sembarang', 'Apple', 50),
('2020-09-14', 'BRG-017', 'Pil Estasy', 'Narkoboy', 250),
('2020-09-14', 'BRG-016', 'Data sembarang', 'Apple', 75),
('2020-09-14', 'BRG-018', 'Barang Baru 01', 'Apple', 50),
('2020-09-14', 'BRG-018', 'Pil Sabu sabu', 'astronout', 125),
('2020-09-14', 'BRG-019', 'Pil Harapan', 'Apple', 75),
('2020-09-14', 'BRG-020', 'Pil Kejang kejang', 'test', 75),
('2020-09-14', 'BRG-021', 'Pil geleng geleng', 'test', 850),
('2020-09-14', 'BRG-021', 'Pil geleng gelen', 'test', 425),
('2020-09-19', 'BRG-022', 'Ban luarr swalloww', 'test', 5),
('2020-09-19', 'BRG-023', 'Irc 275-17', 'test', 5),
('2020-09-19', 'BRG-024', 'ban 250', 'irc', 900),
('2020-09-19', 'BRG-025', 'ban27517', 'irc', 500),
('2020-09-19', 'BRG-026', 'ban909018', 'swallow', 500),
('2020-09-19', 'BRG-027', 'ban27517spr', 'evo', 500),
('2020-09-22', 'BRG-028', 'Ban Racing 125', 'Hrd', 30),
('2020-09-22', 'BRG-028', 'Ban Racing 125', 'Hrd', 30),
('2022-01-06', 'BRG-175', 'katrol sepeda motor', 'honda', 10),
('2022-01-07', 'BRG-176', 'dfyfytfyfytf', 'FUKUYAMA', 80),
('2022-01-07', 'BRG-175', 'FORK GEAR', 'ASPIRA', 12),
('2022-01-07', 'BRG-176', 'SPRING FR FORK', 'ASPIRA', 30),
('2022-01-07', 'BRG-177', '011111 SPRING FR FORK', 'ASPIRA', 30);

-- --------------------------------------------------------

--
-- Table structure for table `laporan kasir mekanik`
--

CREATE TABLE `laporan kasir mekanik` (
  `tgl_trns` date NOT NULL,
  `nm_beli` varchar(50) NOT NULL,
  `reparasi` varchar(50) NOT NULL,
  `sumber_brg` varchar(50) NOT NULL,
  `id_mknk` int(6) NOT NULL,
  `nm_mknk` varchar(50) NOT NULL,
  `hrg_trns` int(16) NOT NULL,
  `ongkos` int(16) NOT NULL,
  `t_harga` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan pekerjaan mekanik`
--

CREATE TABLE `laporan pekerjaan mekanik` (
  `kd_lap` varchar(10) NOT NULL,
  `id_mekanik` varchar(7) NOT NULL,
  `id_lap_jual` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `nm_mknk` text NOT NULL,
  `reparasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan pekerjaan mekanik`
--

INSERT INTO `laporan pekerjaan mekanik` (`kd_lap`, `id_mekanik`, `id_lap_jual`, `tgl`, `nm_mknk`, `reparasi`) VALUES
('LMK-008', 'MEK-001', 'LAP-008', '2020-09-03', 'daniel', 'ganti oli'),
('LMK-022', 'MEK-001', 'LAP-022', '2020-09-08', 'daniel', 'ganti oli'),
('LMK-023', 'MEK-001', 'LAP-023', '2020-09-09', 'daniel', 'ganti ban'),
('LMK-024', 'MEK-001', 'LAP-032', '2020-09-22', 'daniel', 'Ganti ban'),
('LMK-025', 'MEK-002', 'LAP-033', '2020-09-22', 'dino', 'Ganti Ban'),
('LMK-026', 'MEK-001', 'LAP-034', '2020-09-22', 'daniel', 'Ganti Ban'),
('LMK-027', 'MEK-002', 'LAP-035', '2020-09-22', 'dino', 'Ganti Ban'),
('LMK-028', 'MEK-001', 'LAP-036', '2020-09-22', 'daniel', 'Ganti Ban'),
('LMK-029', 'MEK-001', 'LAP-037', '2020-09-22', 'daniel', 'Ganti Ban');

-- --------------------------------------------------------

--
-- Table structure for table `laporan penjualan`
--

CREATE TABLE `laporan penjualan` (
  `id_lap_jual` varchar(10) NOT NULL DEFAULT 'LAP-001',
  `id_trns` varchar(10) NOT NULL,
  `tgl_jual` date NOT NULL,
  `user` varchar(15) NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `jasa` varchar(50) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga_jual` int(12) NOT NULL,
  `ongkos` int(12) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `modal_brg` int(12) NOT NULL,
  `profit_brg` int(12) NOT NULL,
  `sumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan penjualan`
--

INSERT INTO `laporan penjualan` (`id_lap_jual`, `id_trns`, `tgl_jual`, `user`, `nm_brg`, `jasa`, `jumlah`, `harga_jual`, `ongkos`, `total_harga`, `modal_brg`, `profit_brg`, `sumber`) VALUES
('LAP-002', 'DET-002', '2020-08-01', 'kasir 2', 'test', 'ganti oli', 1, 20000, 50000, 70000, 60000, 10000, 'stok toko'),
('LAP-003', 'DET-003', '2020-08-03', 'kasir 2', 'ban tubeless 12', 'ganti ban dalam', 1, 100000, 15000, 115000, 90000, 25000, 'Toko'),
('LAP-004', 'DET-004', '2020-08-03', 'kasir 1', 'ban tubeless', 'jualan', 2, 25000, 0, 0, 20000, 5000, ''),
('LAP-005', 'DET-001', '2020-08-29', 'kasir 1', 'test', 'jual barang', 1, 80000, 0, 0, 0, 80000, ''),
('LAP-006', 'DET-001', '0000-00-00', 'kasir 1', 'test', 'jual barang', 4, 80000, 0, 0, 0, 80000, ''),
('LAP-007', 'DET-001', '0000-00-00', 'kasir 1', 'ban tubeless 12', 'jual barang', 2, 100000, 0, 0, 0, 100000, ''),
('LAP-008', 'DET-001', '0000-00-00', 'kasir 1', 'test', 'jual barang', 3, 76000, 0, 0, 0, 76000, ''),
('LAP-009', 'DET-001', '0000-00-00', 'kasir 1', 'ban tubeless 12', 'jual barang', 3, 95000, 0, 0, 0, 95000, ''),
('LAP-010', 'DET-006', '0000-00-00', 'kasir 1', 'test', 'jual barang', 3, 76000, 0, 0, 0, 76000, ''),
('LAP-011', 'DET-006', '0000-00-00', 'kasir 1', 'ban tubeless 12', 'jual barang', 3, 95000, 0, 0, 0, 95000, ''),
('LAP-012', 'DET-006', '0000-00-00', 'kasir 1', 'test', 'jual barang', 3, 76000, 0, 0, 0, 76000, ''),
('LAP-013', 'DET-006', '0000-00-00', 'kasir 1', 'ban tubeless 12', 'jual barang', 3, 95000, 0, 0, 0, 95000, ''),
('LAP-014', 'DET-006', '0000-00-00', 'kasir 1', 'test', 'jual barang', 3, 76000, 0, 0, 0, 76000, ''),
('LAP-015', 'DET-006', '0000-00-00', 'kasir 1', 'ban tubeless 12', 'jual barang', 3, 95000, 0, 0, 0, 95000, ''),
('LAP-016', 'DET-006', '2020-09-04', 'kasir 1', 'test', 'jual barang', 1, 80000, 0, 0, 0, 80000, ''),
('LAP-017', 'DET-006', '2020-09-04', 'kasir 1', 'ban tubeless 12', 'jual barang', 1, 99000, 0, 0, 0, 99000, ''),
('LAP-018', 'DET-006', '2020-09-04', 'kasir 1', 'test', 'jual barang', 2, 80000, 0, 0, 0, 80000, ''),
('LAP-019', 'DET-006', '2020-09-04', 'kasir 1', 'ban tubeless 12', 'jual barang', 2, 100000, 0, 0, 0, 100000, ''),
('LAP-020', 'DET-007', '2020-09-04', 'kasir 1', 'test', 'jual barang', 2, 80000, 0, 0, 0, 80000, ''),
('LAP-021', 'DET-008', '0000-00-00', 'kasir 1', 'ban tubeless 12', 'jual barang', 10, 100000, 0, 0, 0, 100000, ''),
('LAP-022', 'DET-008', '2020-09-08', 'kasir 2', 'Ban Tubles', 'ganti oli', 1, 12000, 50000, 62000, 0, 12000, 'stok toko'),
('LAP-023', 'DET-011', '2020-09-13', 'kasir 1', 'Iphone XRR', 'jual barang', 1, 49400, 0, 0, 0, 49400, ''),
('LAP-024', 'DET-012', '2020-09-14', 'kasir 1', 'Pil Estasy', 'jual barang', 15, 33750, 0, 0, 0, 33750, ''),
('LAP-025', 'DET-013', '2020-09-14', 'kasir 1', 'Pil Sabu sabu', 'jual barang', 2, 40500, 0, 0, 0, 40500, ''),
('LAP-026', 'DET-014', '2020-09-14', 'kasir 1', 'Pil Kejang kejang', 'jual barang', 5, 44850, 0, 0, 0, 44850, ''),
('LAP-027', 'DET-015', '2020-09-14', 'kasir 1', 'Pil Harapan', 'jual barang', 10, 52250, 0, 0, 0, 52250, ''),
('LAP-028', 'DET-016', '2020-09-22', 'kasir 1', 'Ban Racing 125', 'jual barang', 1, 110000, 0, 0, 0, 110000, ''),
('LAP-029', 'DET-017', '2020-09-22', 'kasir 1', 'Ban Racing 125', 'jual barang', 1, 125000, 0, 0, 0, 125000, ''),
('LAP-030', 'DET-018', '2020-09-22', 'kasir 1', 'Ban Racing 125', 'jual barang', 1, 125000, 0, 0, 0, 125000, ''),
('LAP-031', 'DET-019', '2020-09-22', 'kasir 1', 'Ban Racing 125', 'jual barang', 1, 125000, 0, 0, 0, 125000, ''),
('LAP-032', 'DET-020', '2020-09-22', 'kasir 2', 'Ban Tubles', 'Ganti ban', 1, 10000, 15000, 25000, 0, 10000, 'stok toko'),
('LAP-033', 'DET-021', '2020-09-22', 'kasir 2', 'Ban luarr swalloww', 'Ganti Ban', 1, -70400, 10000, 210000, 0, -70400, 'stok toko'),
('LAP-034', 'DET-022', '2020-09-22', 'kasir 2', 'Ban Tubeless', 'Ganti Ban', 2, 250000, 10000, 260000, 0, 10000, 'toko lain'),
('LAP-035', 'DET-023', '2020-09-22', 'kasir 2', 'Ban Racing 123', 'Ganti Ban', 2, 300000, 15000, 315000, 0, 15000, 'toko lain'),
('LAP-036', 'DET-024', '2020-09-22', 'kasir 2', '', 'Ganti Ban', 0, 0, 10000, 10000, 0, 0, 'pembeli'),
('LAP-037', 'DET-025', '2020-09-22', 'kasir 2', '', 'Ganti Ban', 0, 0, 15000, 15000, 0, 0, 'pembeli'),
('LAP-038', 'DET-026', '2021-03-17', 'kasir 1', 'Ban Tubles', 'jual barang', 5, 12200, 0, 0, 0, 12200, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `nama` text NOT NULL,
  `id` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`nama`, `id`, `pass`, `level`) VALUES
('grosir', 'grosir', 'grosirtiara', 'grosir'),
('gudang\r\n', 'gudang', 'gudangtiara', 'Gudang'),
('kasir\r\n', 'kasir', 'kasirtiara', 'kasir'),
('mekanik', 'mekanik', 'mekaniktiara', 'mekanik'),
('pusat', 'pusat', 'pusattiara', 'pusat');

-- --------------------------------------------------------

--
-- Table structure for table `tabel barang pusat`
--

CREATE TABLE `tabel barang pusat` (
  `kd_brg` varchar(25) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
  `mrk_brg` varchar(20) NOT NULL,
  `stock_toko` int(5) NOT NULL,
  `stock_gudang` int(5) NOT NULL,
  `supplier` text NOT NULL,
  `hrg_modal` int(12) NOT NULL,
  `hrg_jual` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel barang pusat`
--

INSERT INTO `tabel barang pusat` (`kd_brg`, `nm_brg`, `mrk_brg`, `stock_toko`, `stock_gudang`, `supplier`, `hrg_modal`, `hrg_jual`) VALUES
('1DY-E7402-00T', 'AS GEAR DEPAN JUPITER Z1 TYPE Y', 'DENSHIN', 1, 20, 'PT HONDA', 15000, 15000),
('23221-GN5-910D', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHIN', 1, 21, 'PT HONDA', 18000, 18000),
('23221-GN5-910F', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'FUKUYAMA', 1, 20, '', 10000, 10000),
('23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHIN', 10, 20, 'PT MENTARI PRIMA SEMESTA KALBAR', 30000, 30000),
('23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHIN', 5, 20, '', 0, 0),
('23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 10, 20, 'PT MENTARI PRIMA SEMESTA KALBAR', 50000, 50000),
('23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'TOKAIDO', 3, 20, '', 0, 0),
('24130-05220-000T', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'TOKAIDO', 2, 20, '', 0, 0),
('24130-09G00-000T', 'AS GEAR DEPAN SMASH TYPE S', 'TOKAIDO', 2, 20, '', 0, 0),
('24130-20G00F', 'AS GEAR DEPAN SHOGUN 125SP 25T TYPE S', 'FUKUYAMA', 13, 20, '', 0, 0),
('24130-30A20F', 'AS GEAR DEPAN SHOGUN 110 30T TYPE S', 'FUKUYAMA', 3, 20, '', 0, 0),
('2JG-17421-00F', 'AS GEAR DEPAN FORCE-1 TYPE Y', 'FUKUYAMA', 1, 20, 'PT MENTARI PRIMA SEMESTA KALBAR', 50000, 50000),
('2JG-17421-00T', 'AS GEAR DEPAN ALFA TYPE Y', 'TOKAIDO', 4, 20, '', 0, 0),
('3C1-17402-00F', 'AS GEAR DEPAN VIXION TYPE Y', 'FUKUYAMA', 2, 20, '', 0, 0),
('4ST-17402-00F', 'AS GEAR DEPAN JUPITER/CRYPTON TYPE Y', 'FUKUYAMA', 7, 20, '', 0, 0),
('5TP-17402-00F', 'AS GEAR DEPAN JUPITER Z 33T TYPE Y', 'FUKUYAMA', 7, 20, '', 0, 0),
('BRG-175', 'FORK GEAR', 'ASPIRA', 0, 12, 'PT MENTARI PRIMA SEMESTA KALBAR', 9000, 10000),
('BRG-176', 'SPRING FR FORK', 'ASPIRA', 0, 30, 'PT MENTARI PRIMA SEMESTA KALBAR', 300000, 500000),
('BRG-177', '011111 SPRING FR FORK', 'ASPIRA', 0, 30, 'PT MENTARI PRIMA SEMESTA KALBAR', 300000, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel barang temp`
--

CREATE TABLE `tabel barang temp` (
  `kd_brg` varchar(8) NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `hrg_brg` int(12) NOT NULL,
  `mrk_brg` varchar(20) NOT NULL,
  `sto_brg` int(12) NOT NULL,
  `supp_brg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel bonus`
--

CREATE TABLE `tabel bonus` (
  `id_mekanik` varchar(8) NOT NULL,
  `nm_mekanik` text NOT NULL,
  `periode awal` date NOT NULL,
  `periode akhir` date NOT NULL,
  `jumlah_bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel bonus`
--

INSERT INTO `tabel bonus` (`id_mekanik`, `nm_mekanik`, `periode awal`, `periode akhir`, `jumlah_bonus`) VALUES
('mek-001', 'test', '2020-07-01', '2020-07-09', 20000),
('mek-002', 'test2', '2020-07-01', '2020-07-09', 500000),
('mek-001', 'test', '2020-07-01', '2020-07-09', 20000),
('mek-002', 'test2', '2020-07-01', '2020-07-09', 500000),
('mek-001', 'test', '2020-07-01', '2020-07-09', 20000),
('mek-002', 'test2', '2020-07-01', '2020-07-09', 500000),
('mek-001', 'test', '2020-07-01', '2020-07-09', 20000),
('mek-002', 'test2', '2020-07-01', '2020-07-09', 500000),
('MEK-001', 'test', '2020-09-01', '2020-09-22', 50000),
('MEK-002', 'test2', '2020-09-01', '2020-09-22', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel laporan`
--

CREATE TABLE `tabel laporan` (
  `tgl_rpt` date NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `jml_beli` int(16) NOT NULL,
  `hrg_brg` int(16) NOT NULL,
  `t_hrg` int(16) NOT NULL,
  `user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel pelanggan vip`
--

CREATE TABLE `tabel pelanggan vip` (
  `id_vip` varchar(8) NOT NULL DEFAULT 'VIP-001',
  `nm_plgn` varchar(16) NOT NULL,
  `alm_plgn` varchar(50) NOT NULL,
  `nohp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel piutang`
--

CREATE TABLE `tabel piutang` (
  `id_trns` varchar(12) NOT NULL,
  `noktp` varchar(16) NOT NULL,
  `nama` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no hp` varchar(12) NOT NULL,
  `tgl_trns` date NOT NULL,
  `t_hrg` int(12) NOT NULL,
  `sisa_byr` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel pusat temp`
--

CREATE TABLE `tabel pusat temp` (
  `kd_brg` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_brg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sto_brg` int(5) NOT NULL,
  `hrg_modal` int(50) NOT NULL,
  `hrg_jual` int(50) NOT NULL,
  `supp_brg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrk_brg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel supplier`
--

CREATE TABLE `tabel supplier` (
  `id_supp` varchar(8) NOT NULL DEFAULT 'SUP-001',
  `nm_supp` varchar(50) NOT NULL,
  `alm_supp` varchar(50) NOT NULL,
  `nohp_supp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel supplier`
--

INSERT INTO `tabel supplier` (`id_supp`, `nm_supp`, `alm_supp`, `nohp_supp`) VALUES
('SUP-003', 'PT MENTARI PRIMA SEMESTA KALBAR', 'JL ARTERIA SUPADIO NO 8 PONTIANAK', '081297077782');

-- --------------------------------------------------------

--
-- Table structure for table `tabel transaksi`
--

CREATE TABLE `tabel transaksi` (
  `id_trns` varchar(8) NOT NULL DEFAULT 'TRN-001',
  `tgl_trns` date NOT NULL,
  `total_harga` int(12) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table mekanik`
--

CREATE TABLE `table mekanik` (
  `id_mekanik` varchar(8) NOT NULL,
  `nm_mekanik` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `no_ktp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table merek`
--

CREATE TABLE `table merek` (
  `kd_merk` varchar(8) NOT NULL DEFAULT 'MRK-001',
  `mrk_brg` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table merek`
--

INSERT INTO `table merek` (`kd_merk`, `mrk_brg`) VALUES
('MRK-001', 'DENSHIN'),
('MRK-002', 'FUKUYAMA'),
('MRK-005', 'ASPIRA');

-- --------------------------------------------------------

--
-- Table structure for table `update barang temp`
--

CREATE TABLE `update barang temp` (
  `kd_brg` varchar(10) NOT NULL,
  `nm_brg` varchar(16) NOT NULL,
  `hrg_brg` int(12) NOT NULL,
  `mrk_brg` text NOT NULL,
  `sto_brg` int(8) NOT NULL,
  `supp_brg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utang toko`
--

CREATE TABLE `utang toko` (
  `kd_utg` varchar(8) NOT NULL DEFAULT 'UTG-001',
  `tgl_trns` date NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `hrg_brg` int(16) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `nm_toko` varchar(20) NOT NULL,
  `ket` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang mekanik temp`
--
ALTER TABLE `barang mekanik temp`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `daftar belanja temp`
--
ALTER TABLE `daftar belanja temp`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `daftar grosir temp`
--
ALTER TABLE `daftar grosir temp`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `daftar layanan temp`
--
ALTER TABLE `daftar layanan temp`
  ADD PRIMARY KEY (`kd_trns`);

--
-- Indexes for table `detail transaksi`
--
ALTER TABLE `detail transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `laporan barang keluar`
--
ALTER TABLE `laporan barang keluar`
  ADD KEY `kode barang` (`kd_brg`);

--
-- Indexes for table `laporan pekerjaan mekanik`
--
ALTER TABLE `laporan pekerjaan mekanik`
  ADD PRIMARY KEY (`kd_lap`),
  ADD KEY `id_lap_jual` (`id_lap_jual`);

--
-- Indexes for table `laporan penjualan`
--
ALTER TABLE `laporan penjualan`
  ADD PRIMARY KEY (`id_lap_jual`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel barang pusat`
--
ALTER TABLE `tabel barang pusat`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `tabel barang temp`
--
ALTER TABLE `tabel barang temp`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `tabel pelanggan vip`
--
ALTER TABLE `tabel pelanggan vip`
  ADD PRIMARY KEY (`id_vip`);

--
-- Indexes for table `tabel piutang`
--
ALTER TABLE `tabel piutang`
  ADD PRIMARY KEY (`noktp`);

--
-- Indexes for table `tabel supplier`
--
ALTER TABLE `tabel supplier`
  ADD PRIMARY KEY (`id_supp`);

--
-- Indexes for table `tabel transaksi`
--
ALTER TABLE `tabel transaksi`
  ADD PRIMARY KEY (`id_trns`);

--
-- Indexes for table `table mekanik`
--
ALTER TABLE `table mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `table merek`
--
ALTER TABLE `table merek`
  ADD PRIMARY KEY (`kd_merk`);

--
-- Indexes for table `update barang temp`
--
ALTER TABLE `update barang temp`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `utang toko`
--
ALTER TABLE `utang toko`
  ADD PRIMARY KEY (`kd_utg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
