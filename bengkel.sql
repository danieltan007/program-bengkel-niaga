-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2022 at 04:38 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u371956714_tiaramotor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang mekanik temp`
--

CREATE TABLE `barang mekanik temp` (
  `kd_temp` varchar(12) NOT NULL DEFAULT 'TEMP-001',
  `kd_brg` varchar(20) NOT NULL,
  `nm_brg` text NOT NULL,
  `mrk_brg` text NOT NULL,
  `jml` int(11) NOT NULL,
  `diskon` int(3) NOT NULL,
  `korting` int(12) NOT NULL,
  `hrg_brg` int(11) NOT NULL,
  `total` int(12) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar belanja temp`
--

CREATE TABLE `daftar belanja temp` (
  `kd_temp` varchar(12) NOT NULL DEFAULT 'TEMP-001',
  `kd_brg` varchar(20) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `jml_brg` int(7) NOT NULL,
  `diskon` int(3) NOT NULL,
  `korting` int(9) NOT NULL,
  `st_hrg` int(16) NOT NULL,
  `t_hrg` int(16) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daftar grosir temp`
--

CREATE TABLE `daftar grosir temp` (
  `kd_temp` varchar(12) NOT NULL DEFAULT 'TEMP-001',
  `kd_brg` varchar(25) NOT NULL,
  `jml_brg` int(4) NOT NULL,
  `st_hrg` int(10) NOT NULL,
  `t_hrg` int(10) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daftar layanan temp`
--

CREATE TABLE `daftar layanan temp` (
  `kd_temp` varchar(12) NOT NULL DEFAULT 'TEMP-001',
  `kd_brg` varchar(25) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `diskon` int(3) NOT NULL,
  `korting` int(12) NOT NULL,
  `jenis` text NOT NULL,
  `jml_brg` int(4) NOT NULL,
  `hrg_brg` int(16) NOT NULL,
  `subtotal` int(12) NOT NULL,
  `total` int(16) NOT NULL,
  `sumber` text NOT NULL,
  `toko` text NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail transaksi`
--

CREATE TABLE `detail transaksi` (
  `tgl_trns` date NOT NULL,
  `id_trans` varchar(12) NOT NULL,
  `kd_brg` varchar(20) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
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
('2021-03-17', 'DET-026', 'BRG-005', 'Ban Tubles', 'Honda', 5, 12250, 2, 250, 61000, 'Cicil'),
('2022-01-17', 'DET-027', '1DY-E740', 'AS GEAR DEPAN JUPITE', 'DENSHIN', 1, 24000, 20, 0, 24000, 'Lunas'),
('2022-01-20', 'DET-028', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHIN', 1, 60000, 0, 0, 60000, 'Lunas'),
('2022-01-20', 'DET-029', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHIN', 1, 60000, 0, 0, 60000, 'Cicil'),
('2022-01-23', 'DET-030', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHINa', 2, 54000, 10, 0, 108000, 'Lunas'),
('2022-01-24', 'DET-031', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHINa', 10, 48000, 20, 0, 480000, 'Lunas'),
('2022-01-24', 'DET-032', 'BRG-183', 'test12312', 'DENSHINa', 15, 32000, 20, 0, 320000, 'Lunas'),
('2022-01-24', 'DET-033', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHINa', 1, 54000, 10, 0, 54000, 'Lunas'),
('2022-01-24', 'DET-034', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHINa', 1, 54000, 10, 0, 54000, 'Lunas'),
('2022-01-24', 'DET-035', 'BRG-183', 'test12312', 'DENSHINa', 1, 36000, 10, 0, 36000, 'Lunas'),
('2022-03-06', 'DET-036', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHINa', 2, 54000, 10, 0, 108000, 'Lunas'),
('2022-03-06', 'DET-037', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 2, 50000, 0, 0, 100000, 'Lunas'),
('2022-03-18', 'DET-038', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHINa', 2, 60000, 0, 0, 120000, 'Lunas'),
('2022-03-18', 'DET-039', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 60000, 0, 0, 60000, 'Lunas'),
('2022-03-18', 'DET-040', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 1, 50000, 0, 0, 50000, 'Lunas'),
('2022-03-18', 'DET-041', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 100000, 0, 0, 100000, 'Lunas'),
('2022-03-18', 'DET-042', '23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'TOKAIDO', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-043', '24130-05220-000T', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'TOKAIDO', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-044', '24130-09G00-000T', 'AS GEAR DEPAN SMASH TYPE S', 'TOKAIDO', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-045', '24130-20G00F', 'AS GEAR DEPAN SHOGUN 125SP 25T TYPE S', 'FUKUYAMA', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-046', '24130-30A20F', 'AS GEAR DEPAN SHOGUN 110 30T TYPE S', 'FUKUYAMA', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-047', '2JG-17421-00F', 'AS GEAR DEPAN FORCE-1 TYPE Y', 'FUKUYAMA', 1, 80000, 20, 0, 80000, 'Lunas'),
('2022-03-18', 'DET-048', '2JG-17421-00T', 'AS GEAR DEPAN ALFA TYPE Y', 'TOKAIDO', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-049', '3C1-17402-00F', 'AS GEAR DEPAN VIXION TYPE Y', 'FUKUYAMA', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-050', '4ST-17402-00F', 'AS GEAR DEPAN JUPITER/CRYPTON TYPE Y', 'FUKUYAMA', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-051', '5TP-17402-00F', 'AS GEAR DEPAN JUPITER Z 33T TYPE Y', 'FUKUYAMA', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-052', 'BRG-175', 'FORK GEAR', 'ASPIRA', 1, 18000, 0, 0, 18000, 'Lunas'),
('2022-03-18', 'DET-053', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHINa', 2, 60000, 0, 0, 120000, 'Lunas'),
('2022-03-18', 'DET-054', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 58800, 2, 0, 58800, 'Lunas'),
('2022-03-18', 'DET-055', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 100000, 0, 0, 100000, 'Lunas'),
('2022-03-18', 'DET-056', '24130-20G00F', 'AS GEAR DEPAN SHOGUN 125SP 25T TYPE S', 'FUKUYAMA', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-057', '5TP-17402-00F', 'AS GEAR DEPAN JUPITER Z 33T TYPE Y', 'FUKUYAMA', 1, 0, 0, 0, 0, 'Lunas'),
('2022-03-18', 'DET-058', 'BRG-178', 'test123123', 'DENSHINa', 1, 50000, 0, 0, 50000, 'Lunas'),
('2022-03-23', 'DET-059', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 60000, 0, 0, 60000, 'Lunas'),
('2022-03-23', 'DET-060', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 1, 50000, 0, 0, 50000, 'Lunas'),
('2022-03-23', 'DET-061', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 100000, 0, 0, 100000, 'Lunas'),
('2022-03-23', 'DET-062', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'DENSHINa', 1, 60000, 0, 0, 80000, 'lunas'),
('2022-03-29', 'DET-063', '2JG-17421-00F', 'AS GEAR DEPAN FORCE-1 TYPE Y', 'FUKUYAMA', 1, 90000, 10, 5000, 85000, 'lunas'),
('2022-03-30', 'DET-064', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 1, 45000, 10, 2000, 43000, 'Lunas'),
('2022-03-30', 'DET-065', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 30000, 50, 2000, 28000, 'Lunas'),
('2022-03-30', 'DET-066', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 90000, 10, 2000, 88000, 'Lunas'),
('2022-03-30', 'DET-067', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 60000, 0, 0, 60000, 'lunas'),
('2022-03-30', 'DET-068', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 1, 50000, 0, 0, 50000, 'lunas'),
('2022-03-30', 'DET-069', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 100000, 0, 0, 100000, 'lunas'),
('2022-03-30', 'DET-070', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 10, 48000, 20, 0, 480000, 'Lunas'),
('2022-03-30', 'DET-071', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 10, 50000, 50, 0, 500000, 'Lunas'),
('2022-03-30', 'DET-072', 'BRG-187', 'asdas', 'DENSHINa', 10, 40000, 20, 0, 400000, 'Lunas'),
('2022-03-30', 'DET-073', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 51000, 15, 0, 51000, 'Lunas'),
('2022-03-30', 'DET-074', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 80000, 20, 0, 80000, 'Lunas'),
('2022-03-30', 'DET-075', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 48000, 20, 0, 48000, 'Lunas'),
('2022-03-30', 'DET-076', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 50000, 50, 0, 50000, 'Lunas'),
('2022-03-30', 'DET-077', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 51000, 15, 0, 51000, 'Lunas'),
('2022-03-30', 'DET-078', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 51000, 15, 0, 51000, 'Lunas'),
('2022-03-30', 'DET-079', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 80000, 20, 0, 80000, 'Lunas'),
('2022-03-30', 'DET-080', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 60000, 0, 0, 60000, 'Lunas'),
('2022-03-30', 'DET-081', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 100000, 0, 0, 100000, 'Lunas'),
('2022-03-30', 'DET-082', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 54000, 10, 0, 54000, 'Lunas'),
('2022-03-30', 'DET-083', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 90000, 10, 0, 90000, 'Lunas'),
('2022-03-30', 'DET-084', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 60000, 0, 0, 60000, 'lunas'),
('2022-03-30', 'DET-085', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 100000, 0, 0, 100000, 'lunas'),
('2022-03-30', 'DET-086', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 2, 50000, 50, 0, 100000, 'Lunas'),
('2022-03-30', 'DET-087', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 48000, 20, 0, 96000, 'Lunas'),
('2022-03-30', 'DET-088', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 1, 42500, 15, 0, 42500, 'Lunas'),
('2022-03-30', 'DET-089', '23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'FUKUYAMA', 1, 15000, 25, 0, 15000, 'Lunas'),
('2022-03-30', 'DET-090', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 51000, 15, 0, 51000, 'lunas'),
('2022-03-30', 'DET-091', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 80000, 20, 0, 80000, 'lunas'),
('2022-03-30', 'DET-092', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 10, 45000, 10, 0, 450000, 'Cicil'),
('2022-03-30', 'DET-093', '23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'FUKUYAMA', 10, 19000, 5, 0, 190000, 'Cicil'),
('2022-03-31', 'DET-094', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 1, 45000, 10, 0, 45000, 'Lunas'),
('2022-03-31', 'DET-095', '23221-KFL-860T', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'FUKUYAMA', 1, 80000, 20, 0, 80000, 'Lunas'),
('2022-03-31', 'DET-096', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 28350, 10, 0, 28350, 'Lunas'),
('2022-03-31', 'DET-097', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 28350, 10, 0, 28350, 'Lunas'),
('2022-03-31', 'DET-098', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 28350, 10, 0, 28350, 'Lunas'),
('2022-03-31', 'DET-099', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 28350, 10, 0, 28350, 'Lunas'),
('2022-03-31', 'DET-100', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 28350, 10, 0, 28350, 'Lunas'),
('2022-03-31', 'DET-101', 'BRG-175', 'FORK GEAR', 'ASPIRA', 1, 9450, 0, 5000, 4450, 'Lunas'),
('2022-03-31', 'DET-102', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 31500, 0, 0, 31500, 'lunas'),
('2022-03-31', 'DET-103', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 2, 42000, 0, 0, 84000, 'lunas'),
('2022-03-31', 'DET-104', '23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'FUKUYAMA', 2, 15750, 0, 0, 31500, 'lunas'),
('2022-03-31', 'DET-105', '24130-05220-000T', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'FUKUYAMA', 2, 78750, 0, 0, 157500, 'lunas'),
('2022-03-31', 'DET-106', '2JG-17421-00F', 'AS GEAR DEPAN FORCE-1 TYPE Y', 'FUKUYAMA', 2, 52500, 0, 0, 105000, 'lunas'),
('2022-03-31', 'DET-107', 'BRG-178', 'test123123', 'DENSHINa', 1, 21000, 0, 0, 21000, 'lunas'),
('2022-03-31', 'DET-108', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 2, 51000, -62, 0, 102000, 'Lunas'),
('2022-03-31', 'DET-109', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 1, 45000, -7, 0, 45000, 'Lunas'),
('2022-03-31', 'DET-110', '23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'FUKUYAMA', 1, 19000, -21, 0, 19000, 'Lunas'),
('2022-03-31', 'DET-111', '24130-05220-000T', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'FUKUYAMA', 1, 96000, -22, 0, 96000, 'Lunas'),
('2022-03-31', 'DET-112', 'BRG-186', 'Rosta', 'DENSHINa', 1, 93000, -77, 0, 93000, 'Lunas'),
('2022-03-31', 'DET-113', 'BRG-187', 'asdas', 'DENSHINa', 1, 45000, -186, 0, 45000, 'Lunas'),
('2022-03-31', 'DET-114', 'BRG-191', 'sikat gigi', 'FUKUYAMA', 1, 20900, -184, 0, 20900, 'Lunas'),
('2022-03-31', 'DET-115', 'BRG-193', 'Teriyaki', 'ASPIRA', 1, 72000, -37, 0, 72000, 'Lunas'),
('2022-03-31', 'DET-116', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 2, 51000, -62, 0, 102000, 'Lunas'),
('2022-03-31', 'DET-117', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 2, 45000, -7, 0, 90000, 'Lunas'),
('2022-03-31', 'DET-118', '23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'FUKUYAMA', 2, 19000, -21, 0, 38000, 'Lunas'),
('2022-03-31', 'DET-119', '24130-05220-000T', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'FUKUYAMA', 1, 96000, -22, 0, 96000, 'Lunas'),
('2022-03-31', 'DET-120', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 2, 48000, -52, 0, 96000, 'Lunas'),
('2022-03-31', 'DET-121', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 2, 42500, -1, 0, 85000, 'Lunas'),
('2022-03-31', 'DET-122', '23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'FUKUYAMA', 2, 19000, -21, 0, 38000, 'Lunas'),
('2022-03-31', 'DET-123', '24130-05220-000T', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'FUKUYAMA', 1, 96000, -22, 0, 192000, 'Lunas'),
('2022-03-31', 'DET-124', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 1, 31500, 0, 0, 31500, 'Cicil'),
('2022-03-31', 'DET-125', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 1, 42000, 0, 0, 42000, 'Cicil');

-- --------------------------------------------------------

--
-- Table structure for table `laporan barang keluar`
--

CREATE TABLE `laporan barang keluar` (
  `tgl_kirim` date NOT NULL,
  `kd_brg` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
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
('2020-09-22', 'BRG-028', 'Ban Racing 125', 'Hrd', 10),
('2022-01-16', '1DY-E7402-', 'AS GEAR DEPAN JU', 'DENSHIN', 12),
('2022-01-18', '1DY-E7402-00T', 'AS GEAR DEPAN JU', 'DENSHIN', 32),
('2022-01-18', '23221-GN5-910D', 'AS GEAR DEPAN SU', 'DENSHIN', 34),
('2022-01-18', '1DY-E7402-00T', 'AS GEAR DEPAN JU', 'DENSHIN', -32),
('2022-01-18', '23221-GN5-910D', 'AS GEAR DEPAN SU', 'DENSHIN', -3),
('2022-01-18', '23221-GN5-910D', 'AS GEAR DEPAN SU', 'DENSHIN', 3),
('2022-01-18', '1DY-E7402-00T', 'AS GEAR DEPAN JU', 'DENSHIN', 30),
('2022-03-18', 'BRG-183', 'test12312', 'DENSHINa', 2),
('2022-03-30', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 20),
('2022-03-30', 'BRG-182', 'test12312', 'FUKUYAMA', 20),
('2022-03-30', 'BRG-188', 'gigi kopling', 'Asera', 20),
('2022-03-30', 'BRG-187', 'asdas', 'DENSHINa', 51),
('2022-03-30', 'BRG-188', 'gigi kopling', 'Asera', 50),
('2022-03-30', 'BRG-182', 'test12312', 'FUKUYAMA', 100),
('2022-03-30', 'BRG-189', 'tesiting', 'Sunflower', 20),
('2022-03-30', 'BRG-190', 'repsol', 'ASPIRA', 10),
('2022-03-30', '23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'FUKUYAMA', 50),
('2022-03-30', '24130-05220-000T', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'FUKUYAMA', 50);

-- --------------------------------------------------------

--
-- Table structure for table `laporan barang masuk`
--

CREATE TABLE `laporan barang masuk` (
  `tgl_dtg` date NOT NULL,
  `kd_brg` varchar(20) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
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
('2022-01-07', 'BRG-177', '011111 SPRING FR FORK', 'ASPIRA', 30),
('2022-01-17', 'BRG-178', 'test123123', 'DENSHIN', 22),
('2022-01-17', 'BRG-180', 'test12312', 'DENSHIN', 22),
('2022-01-17', 'BRG-182', 'test12312', 'DENSHIN', 21),
('2022-01-17', 'BRG-183', 'test12312', 'DENSHIN', 21),
('2022-01-18', '1DY-E7402-', 'AS GEAR DEPAN JU', 'DENSHIN', 15),
('2022-01-18', '23221-GN5-', 'AS GEAR DEPAN SU', 'DENSHIN', 16),
('2022-01-18', '1DY-E7402-', 'AS GEAR DEPAN JU', 'DENSHIN', 20),
('2022-01-18', '23221-GN5-', 'AS GEAR DEPAN SU', 'DENSHIN', 20),
('2022-01-18', '1DY-E7402-00T', 'AS GEAR DEPAN JU', 'DENSHIN', 20),
('2022-01-18', '23221-GN5-910D', 'AS GEAR DEPAN SU', 'DENSHIN', 20),
('2022-03-18', 'BRG-184', 'test1122', 'FUKUYAMA', 50),
('2022-03-18', 'BRG-185', 'Tistis12', 'Lily', 50),
('2022-03-18', 'BRG-178', 'test123123', 'DENSHINa', 50),
('2022-03-27', 'BRG-186', 'Rosta', 'DENSHINa', 50),
('2022-03-29', 'BRG-187', 'asdas', 'DENSHINa', 121),
('2022-03-30', 'BRG-188', 'gigi kopling', 'Asera', 120),
('2022-03-30', 'BRG-189', 'tesiting', 'Sunflower', 100),
('2022-03-30', 'BRG-190', 'repsol', 'ASPIRA', 50),
('2022-03-30', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 10),
('2022-03-30', 'BRG-191', 'sikat gigi', 'FUKUYAMA', 150),
('2022-03-30', 'BRG-192', 'teflon', 'ASPIRA', 150),
('2022-03-30', 'BRG-193', 'Teriyaki', 'ASPIRA', 50),
('2022-03-30', 'BRG-194', 'oli samping', 'ASPIRA', 20),
('2022-03-30', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 20),
('2022-03-30', '23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'FUKUYAMA', 50),
('2022-03-31', 'BRG-195', 'busi', 'Lotus', 100),
('2022-03-31', 'BRG-196', 'as geear', 'Asera', 100),
('2022-03-31', '23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 5),
('2022-03-31', '23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 74),
('2022-03-31', '23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'FUKUYAMA', 95),
('2022-03-31', '24130-05220-000T', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'FUKUYAMA', 100),
('2022-03-31', '24130-30A20F', 'AS GEAR DEPAN SHOGUN 110 30T TYPE S', 'FUKUYAMA', 100),
('2022-03-31', '2JG-17421-00F', 'AS GEAR DEPAN FORCE-1 TYPE Y', 'FUKUYAMA', 1),
('2022-03-31', '2JG-17421-00T', 'AS GEAR DEPAN ALFA TYPE Y', 'TOKAIDO', 0),
('2022-03-31', '4ST-17402-00F', 'AS GEAR DEPAN JUPITER/CRYPTON TYPE Y', 'FUKUYAMA', 0),
('2022-03-31', '5TP-17402-00F', 'AS GEAR DEPAN JUPITER Z 33T TYPE Y', 'FUKUYAMA', 0),
('2022-03-31', 'BRG-175', 'FORK GEAR', 'ASPIRA', 10),
('2022-03-31', 'BRG-186', 'Rosta', 'DENSHINa', 50),
('2022-03-31', 'BRG-187', 'asdas', 'DENSHINa', 60),
('2022-03-31', 'BRG-191', 'sikat gigi', 'FUKUYAMA', 150),
('2022-03-31', 'BRG-193', 'Teriyaki', 'ASPIRA', 50),
('2022-03-31', 'BRG-194', 'oli samping', 'ASPIRA', 20);

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
('LMK-029', 'MEK-001', 'LAP-037', '2020-09-22', 'daniel', 'Ganti Ban'),
('LMK-030', 'MEK-001', 'LAP-086', '2022-03-23', 'daniel', 'aasd'),
('LMK-031', 'MEK-001', 'LAP-087', '2022-03-29', 'Kartono', ''),
('LMK-032', 'MEK-001', 'LAP-091', '2022-03-30', 'Kartono', 'Perbaiki'),
('LMK-033', 'MEK-001', 'LAP-092', '2022-03-30', 'Kartono', 'Perbaiki'),
('LMK-034', 'MEK-001', 'LAP-093', '2022-03-30', 'Kartono', 'Perbaiki'),
('LMK-035', 'MEK-002', 'LAP-108', '2022-03-30', 'Dewanto', ''),
('LMK-036', 'MEK-002', 'LAP-109', '2022-03-30', 'Dewanto', ''),
('LMK-037', 'MEK-001', 'LAP-114', '2022-03-30', 'Kartono', 'ganti oli'),
('LMK-038', 'MEK-001', 'LAP-115', '2022-03-30', 'Kartono', 'ganti oli'),
('LMK-039', 'MEK-002', 'LAP-126', '2022-03-31', 'Dewanto', 'ganti oli'),
('LMK-040', 'MEK-002', 'LAP-127', '2022-03-31', 'Dewanto', 'ganti oli'),
('LMK-041', 'MEK-002', 'LAP-128', '2022-03-31', 'Dewanto', 'ganti oli'),
('LMK-042', 'MEK-002', 'LAP-129', '2022-03-31', 'Dewanto', 'ganti oli'),
('LMK-043', 'MEK-002', 'LAP-130', '2022-03-31', 'Dewanto', 'ganti oli'),
('LMK-044', 'MEK-002', 'LAP-131', '2022-03-31', 'Dewanto', 'ganti oli');

-- --------------------------------------------------------

--
-- Table structure for table `laporan penjualan`
--

CREATE TABLE `laporan penjualan` (
  `id_lap_jual` varchar(10) NOT NULL DEFAULT 'LAP-001',
  `id_trns` varchar(10) NOT NULL,
  `tgl_jual` date NOT NULL,
  `user` varchar(15) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
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
('LAP-038', 'DET-026', '2021-03-17', 'kasir 1', 'Ban Tubles', 'jual barang', 5, 12200, 0, 0, 0, 12200, ''),
('LAP-039', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN JUPITER Z1 TYPE Y', 'jual barang', 2, 13500, 0, 0, 15000, -1500, ''),
('LAP-040', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 2, 14400, 0, 0, 18000, -3600, ''),
('LAP-041', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN JUPITER Z1 TYPE Y', 'jual barang', 2, 27000, 0, 0, 15000, 12000, ''),
('LAP-042', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 2, 32400, 0, 0, 18000, 14400, ''),
('LAP-043', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN JUPITER Z1 TYPE Y', 'jual barang', 2, 27000, 0, 0, 15000, 12000, ''),
('LAP-044', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 32400, 0, 0, 18000, 14400, ''),
('LAP-045', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN JUPITER Z1 TYPE Y', 'jual barang', 1, 27000, 0, 0, 15000, 12000, ''),
('LAP-046', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 28800, 0, 0, 18000, 10800, ''),
('LAP-047', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN JUPITER Z1 TYPE Y', 'jual barang', 1, 27000, 0, 0, 15000, 12000, ''),
('LAP-048', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 28800, 0, 0, 18000, 10800, ''),
('LAP-049', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN JUPITER Z1 TYPE Y', 'jual barang', 1, 27000, 0, 0, 15000, 12000, ''),
('LAP-050', 'DET-027', '2022-01-14', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 32400, 0, 0, 18000, 14400, ''),
('LAP-051', 'DET-027', '2022-01-17', 'grosir', 'AS GEAR DEPAN JUPITER Z1 TYPE Y', 'jual barang', 1, 24000, 0, 0, 15000, 9000, ''),
('LAP-052', 'DET-028', '2022-01-20', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 60000, 0, 0, 30000, 30000, ''),
('LAP-053', 'DET-029', '2022-01-20', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 60000, 0, 0, 30000, 30000, ''),
('LAP-054', 'DET-030', '2022-01-23', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 2, 54000, 0, 0, 30000, 24000, ''),
('LAP-055', 'DET-031', '2022-01-24', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 10, 48000, 0, 0, 30000, 18000, ''),
('LAP-056', 'DET-032', '2022-01-24', 'grosir', 'test12312', 'jual barang', 15, 32000, 0, 0, 20000, 12000, ''),
('LAP-057', 'DET-033', '2022-01-24', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 54000, 0, 0, 30000, 24000, ''),
('LAP-058', 'DET-034', '2022-01-24', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 54000, 0, 0, 30000, 24000, ''),
('LAP-059', 'DET-035', '2022-01-24', 'grosir', 'test12312', 'jual barang', 1, 36000, 0, 0, 20000, 16000, ''),
('LAP-060', 'DET-036', '2022-03-06', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 2, 54000, 0, 0, 30000, 24000, ''),
('LAP-061', 'DET-037', '2022-03-06', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 2, 50000, 0, 0, 40000, 10000, ''),
('LAP-062', 'DET-038', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 2, 60000, 0, 0, 30000, 30000, ''),
('LAP-063', 'DET-039', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 60000, 0, 0, 30000, 30000, ''),
('LAP-064', 'DET-040', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 50000, 0, 0, 40000, 10000, ''),
('LAP-065', 'DET-041', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 100000, 0, 0, 50000, 50000, ''),
('LAP-066', 'DET-042', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-067', 'DET-043', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-068', 'DET-044', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SMASH TYPE S', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-069', 'DET-045', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SHOGUN 125SP 25T TYPE S', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-070', 'DET-046', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SHOGUN 110 30T TYPE S', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-071', 'DET-047', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN FORCE-1 TYPE Y', 'jual barang', 1, 80000, 0, 0, 50000, 30000, ''),
('LAP-072', 'DET-048', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN ALFA TYPE Y', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-073', 'DET-049', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN VIXION TYPE Y', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-074', 'DET-050', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN JUPITER/CRYPTON TYPE Y', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-075', 'DET-051', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN JUPITER Z 33T TYPE Y', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-076', 'DET-052', '2022-03-18', 'kasir 1', 'FORK GEAR', 'jual barang', 1, 18000, 0, 0, 9000, 9000, ''),
('LAP-077', 'DET-053', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 2, 60000, 0, 0, 30000, 30000, ''),
('LAP-078', 'DET-054', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 58800, 0, 0, 30000, 28800, ''),
('LAP-079', 'DET-055', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 100000, 0, 0, 50000, 50000, ''),
('LAP-080', 'DET-056', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN SHOGUN 125SP 25T TYPE S', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-081', 'DET-057', '2022-03-18', 'kasir 1', 'AS GEAR DEPAN JUPITER Z 33T TYPE Y', 'jual barang', 1, 0, 0, 0, 0, 0, ''),
('LAP-082', 'DET-058', '2022-03-18', 'kasir 1', 'test123123', 'jual barang', 1, 50000, 0, 0, 20000, 30000, ''),
('LAP-083', 'DET-059', '2022-03-23', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 60000, 0, 0, 30000, 30000, ''),
('LAP-084', 'DET-060', '2022-03-23', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 50000, 0, 0, 40000, 10000, ''),
('LAP-085', 'DET-061', '2022-03-23', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 100000, 0, 0, 50000, 50000, ''),
('LAP-086', 'DET-062', '2022-03-23', 'kasir 2', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'aasd', 1, 60000, 5000, 80000, 30000, 30000, 'stok toko'),
('LAP-087', 'DET-063', '2022-03-29', 'kasir 2', 'AS GEAR DEPAN FORCE-1 TYPE Y', '', 1, 85000, 5000, 85000, 50000, 35000, 'stok toko'),
('LAP-088', 'DET-064', '2022-03-30', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 43000, 0, 0, 40000, 3000, ''),
('LAP-089', 'DET-065', '2022-03-30', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 28000, 0, 0, 30000, -2000, ''),
('LAP-090', 'DET-066', '2022-03-30', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 88000, 0, 0, 50000, 38000, ''),
('LAP-091', 'DET-067', '2022-03-30', 'kasir 2', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'Perbaiki', 1, 60000, 5000, 60000, 30000, 30000, 'stok toko'),
('LAP-092', 'DET-068', '2022-03-30', 'kasir 2', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'Perbaiki', 1, 50000, 0, 50000, 40000, 10000, 'stok toko'),
('LAP-093', 'DET-069', '2022-03-30', 'kasir 2', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'Perbaiki', 1, 100000, 0, 100000, 50000, 50000, 'stok toko'),
('LAP-094', 'DET-070', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 10, 48000, 0, 0, 30000, 18000, ''),
('LAP-095', 'DET-071', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 10, 50000, 0, 0, 50000, 0, ''),
('LAP-096', 'DET-072', '2022-03-30', 'grosir', 'asdas', 'jual barang', 10, 40000, 0, 0, 15000, 25000, ''),
('LAP-097', 'DET-073', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 51000, 0, 0, 30000, 21000, ''),
('LAP-098', 'DET-074', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 80000, 0, 0, 50000, 30000, ''),
('LAP-099', 'DET-075', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 48000, 0, 0, 30000, 18000, ''),
('LAP-100', 'DET-076', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 50000, 0, 0, 50000, 0, ''),
('LAP-101', 'DET-077', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 51000, 0, 0, 30000, 21000, ''),
('LAP-102', 'DET-078', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 51000, 0, 0, 30000, 21000, ''),
('LAP-103', 'DET-079', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 80000, 0, 0, 50000, 30000, ''),
('LAP-104', 'DET-080', '2022-03-30', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 60000, 0, 0, 30000, 30000, ''),
('LAP-105', 'DET-081', '2022-03-30', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 100000, 0, 0, 50000, 50000, ''),
('LAP-106', 'DET-082', '2022-03-30', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 54000, 0, 0, 30000, 24000, ''),
('LAP-107', 'DET-083', '2022-03-30', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 90000, 0, 0, 50000, 40000, ''),
('LAP-108', 'DET-084', '2022-03-30', 'kasir 2', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', '', 1, 60000, 1000, 60000, 30000, 30000, 'stok toko'),
('LAP-109', 'DET-085', '2022-03-30', 'kasir 2', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', '', 1, 100000, 0, 100000, 50000, 50000, 'stok toko'),
('LAP-110', 'DET-086', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 2, 50000, 0, 0, 50000, 0, ''),
('LAP-111', 'DET-087', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 48000, 0, 0, 30000, 18000, ''),
('LAP-112', 'DET-088', '2022-03-30', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 42500, 0, 0, 40000, 2500, ''),
('LAP-113', 'DET-089', '2022-03-30', 'kasir 1', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'jual barang', 1, 15000, 0, 0, 15000, 0, ''),
('LAP-114', 'DET-090', '2022-03-30', 'kasir 2', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ganti oli', 1, 51000, 5000, 51000, 30000, 21000, 'stok toko'),
('LAP-115', 'DET-091', '2022-03-30', 'kasir 2', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'ganti oli', 1, 80000, 0, 80000, 50000, 30000, 'stok toko'),
('LAP-116', 'DET-092', '2022-03-30', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 10, 45000, 0, 0, 40000, 5000, ''),
('LAP-117', 'DET-093', '2022-03-30', 'grosir', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'jual barang', 10, 19000, 0, 0, 15000, 4000, ''),
('LAP-118', 'DET-094', '2022-03-31', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 45000, 0, 0, 40000, 5000, ''),
('LAP-119', 'DET-095', '2022-03-31', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 80000, 0, 0, 50000, 30000, ''),
('LAP-120', 'DET-096', '2022-03-31', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 28350, 0, 0, 30000, -1650, ''),
('LAP-121', 'DET-097', '2022-03-31', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 28350, 0, 0, 30000, -1650, ''),
('LAP-122', 'DET-098', '2022-03-31', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 28350, 0, 0, 30000, -1650, ''),
('LAP-123', 'DET-099', '2022-03-31', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 28350, 0, 0, 30000, -1650, ''),
('LAP-124', 'DET-100', '2022-03-31', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 28350, 0, 0, 30000, -1650, ''),
('LAP-125', 'DET-101', '2022-03-31', 'kasir 1', 'FORK GEAR', 'jual barang', 1, 4450, 0, 0, 9000, -4550, ''),
('LAP-126', 'DET-102', '2022-03-31', 'kasir 2', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ganti oli', 1, 31500, 100000, 31500, 30000, 1500, 'stok toko'),
('LAP-127', 'DET-103', '2022-03-31', 'kasir 2', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'ganti oli', 2, 42000, 0, 84000, 40000, 2000, 'stok toko'),
('LAP-128', 'DET-104', '2022-03-31', 'kasir 2', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'ganti oli', 2, 15750, 0, 31500, 15000, 750, 'stok toko'),
('LAP-129', 'DET-105', '2022-03-31', 'kasir 2', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'ganti oli', 2, 78750, 0, 157500, 75000, 3750, 'stok toko'),
('LAP-130', 'DET-106', '2022-03-31', 'kasir 2', 'AS GEAR DEPAN FORCE-1 TYPE Y', 'ganti oli', 2, 52500, 0, 105000, 50000, 2500, 'stok toko'),
('LAP-131', 'DET-107', '2022-03-31', 'kasir 2', 'test123123', 'ganti oli', 1, 21000, 0, 21000, 20000, 1000, 'stok toko'),
('LAP-132', 'DET-108', '2022-03-31', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 2, 51000, 0, 0, 30000, 21000, ''),
('LAP-133', 'DET-109', '2022-03-31', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 45000, 0, 0, 40000, 5000, ''),
('LAP-134', 'DET-110', '2022-03-31', 'grosir', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'jual barang', 1, 19000, 0, 0, 15000, 4000, ''),
('LAP-135', 'DET-111', '2022-03-31', 'grosir', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'jual barang', 1, 96000, 0, 0, 75000, 21000, ''),
('LAP-136', 'DET-112', '2022-03-31', 'grosir', 'Rosta', 'jual barang', 1, 93000, 0, 0, 50000, 43000, ''),
('LAP-137', 'DET-113', '2022-03-31', 'grosir', 'asdas', 'jual barang', 1, 45000, 0, 0, 15000, 30000, ''),
('LAP-138', 'DET-114', '2022-03-31', 'grosir', 'sikat gigi', 'jual barang', 1, 20900, 0, 0, 7000, 13900, ''),
('LAP-139', 'DET-115', '2022-03-31', 'grosir', 'Teriyaki', 'jual barang', 1, 72000, 0, 0, 50000, 22000, ''),
('LAP-140', 'DET-116', '2022-03-31', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 2, 51000, 0, 0, 30000, 21000, ''),
('LAP-141', 'DET-117', '2022-03-31', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 2, 45000, 0, 0, 40000, 5000, ''),
('LAP-142', 'DET-118', '2022-03-31', 'grosir', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'jual barang', 2, 19000, 0, 0, 15000, 4000, ''),
('LAP-143', 'DET-119', '2022-03-31', 'grosir', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'jual barang', 1, 96000, 0, 0, 75000, 21000, ''),
('LAP-144', 'DET-120', '2022-03-31', 'grosir', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 2, 48000, 0, 0, 30000, 18000, ''),
('LAP-145', 'DET-121', '2022-03-31', 'grosir', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 2, 42500, 0, 0, 40000, 2500, ''),
('LAP-146', 'DET-122', '2022-03-31', 'grosir', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'jual barang', 2, 19000, 0, 0, 15000, 4000, ''),
('LAP-147', 'DET-123', '2022-03-31', 'grosir', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'jual barang', 1, 96000, 0, 0, 75000, 21000, ''),
('LAP-148', 'DET-124', '2022-03-31', 'kasir 1', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'jual barang', 1, 31500, 0, 0, 30000, 1500, ''),
('LAP-149', 'DET-125', '2022-03-31', 'kasir 1', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'jual barang', 1, 42000, 0, 0, 40000, 2000, '');

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
('', 'grosir1', 'grosir1tiara', 'grosir'),
('gudang\r\n', 'gudang', 'gudangtiara', 'Gudang'),
('kasir\r\n', 'kasir', 'kasirtiara', 'ecer'),
('', 'kasir1', 'kasir1tiara', 'ecer'),
('mekanik', 'mekanik', 'mekaniktiara', 'mekanik'),
('', 'mekanik1', 'mekanik1tiara', 'mekanik'),
('pusat', 'pusat', 'pusattiara', 'pusat');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat pembelian`
--

CREATE TABLE `riwayat pembelian` (
  `id_trans` varchar(12) CHARACTER SET latin1 NOT NULL,
  `nama` text NOT NULL COMMENT 'nama utk grosir, kode untuk eceran',
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat pembelian`
--

INSERT INTO `riwayat pembelian` (`id_trans`, `nama`, `tipe`) VALUES
('DET-031', 'daniel tan', 'grosir'),
('DET-032', 'daniel tan', 'grosir'),
('DET-033', 'asdasd', 'grosir'),
('DET-034', 'bunga', 'grosir'),
('DET-035', 'bunga', 'grosir'),
('DET-036', '2203060001', 'eceran'),
('DET-037', '2203060001', 'eceran'),
('DET-041', '2203180001', 'eceran'),
('DET-047', '2203180001', 'eceran'),
('DET-053', '2203180001', 'eceran'),
('DET-054', '2203180001', 'eceran'),
('DET-055', '2203180001', 'eceran'),
('DET-058', '2203180001', 'eceran'),
('DET-059', '2203230001', 'eceran'),
('DET-060', '2203230001', 'eceran'),
('DET-061', '2203230001', 'eceran'),
('DET-064', '2203300001', 'eceran'),
('DET-065', '2203300001', 'eceran'),
('DET-066', '2203300001', 'eceran'),
('DET-078', 'danieltan', 'grosir'),
('DET-079', 'rendi', 'grosir'),
('DET-080', '2203300001', 'eceran'),
('DET-081', '2203300001', 'eceran'),
('DET-082', '2203300001', 'eceran'),
('DET-083', '2203300001', 'eceran'),
('DET-086', 'dendi', 'grosir'),
('DET-087', 'dendi', 'grosir'),
('DET-088', '2203300001', 'eceran'),
('DET-089', '2203300001', 'eceran'),
('DET-092', 'resti', 'grosir'),
('DET-093', 'resti', 'grosir'),
('DET-094', 'riana', 'grosir'),
('DET-095', 'riana', 'grosir'),
('DET-096', '2203310001', 'eceran'),
('DET-097', '2203310001', 'eceran'),
('DET-098', '2203310001', 'eceran'),
('DET-099', '2203310001', 'eceran'),
('DET-100', '2203310001', 'eceran'),
('DET-108', 'sutoyo', 'grosir'),
('DET-109', 'sutoyo', 'grosir'),
('DET-110', 'sutoyo', 'grosir'),
('DET-111', 'sutoyo', 'grosir'),
('DET-112', 'sutoyo', 'grosir'),
('DET-113', 'sutoyo', 'grosir'),
('DET-114', 'sutoyo', 'grosir'),
('DET-115', 'sutoyo', 'grosir'),
('DET-116', 'sugiono', 'grosir'),
('DET-117', 'sugiono', 'grosir'),
('DET-118', 'sugiono', 'grosir'),
('DET-119', 'sugiono', 'grosir'),
('DET-120', 'dimas', 'grosir'),
('DET-121', 'dimas', 'grosir'),
('DET-122', 'dimas', 'grosir'),
('DET-123', 'dimas', 'grosir');

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
  `hrg_jual` int(12) NOT NULL,
  `hrg_jual2` int(12) NOT NULL,
  `hrg_jual3` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel barang pusat`
--

INSERT INTO `tabel barang pusat` (`kd_brg`, `nm_brg`, `mrk_brg`, `stock_toko`, `stock_gudang`, `supplier`, `hrg_modal`, `hrg_jual`, `hrg_jual2`, `hrg_jual3`) VALUES
('23221-GN5-914T', 'AS GEAR DEPAN SUPRA/GRAND/PRIMA TYPE H', 'ASPIRA', 43, 41, 'PT MENTARI PRIMA SEMESTA KALBAR', 30000, 31500, 51000, 48000),
('23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 'DENSHINa', 15, 150, 'Hijau Merah Sejati', 40000, 42000, 45000, 42500),
('23221-KWB-600T', 'AS GEAR DEPAN REVO ABSOLUTE TYPE H', 'FUKUYAMA', 69, 203, 'PT MENTARI PRIMA SEMESTA KALBAR', 15000, 15750, 19000, 18600),
('24130-05220-000T', 'AS GEAR DEPAN THUNDER 125 NEW TYPE S', 'FUKUYAMA', 69, 204, 'kelabu', 75000, 78750, 96000, 90000),
('24130-30A20F', 'AS GEAR DEPAN SHOGUN 110 30T TYPE S', 'FUKUYAMA', 22, 107, '', 0, 0, 0, 0),
('2JG-17421-00F', 'AS GEAR DEPAN FORCE-1 TYPE Y', 'FUKUYAMA', 17, 2, 'PT MENTARI PRIMA SEMESTA KALBAR', 50000, 52500, 0, 0),
('2JG-17421-00T', 'AS GEAR DEPAN ALFA TYPE Y', 'TOKAIDO', 23, 6, '', 0, 0, 0, 0),
('4ST-17402-00F', 'AS GEAR DEPAN JUPITER/CRYPTON TYPE Y', 'FUKUYAMA', 26, 6, '', 0, 0, 0, 0),
('5TP-17402-00F', 'AS GEAR DEPAN JUPITER Z 33T TYPE Y', 'FUKUYAMA', 25, 11, '', 0, 0, 0, 0),
('BRG-175', 'FORK GEAR', 'ASPIRA', 0, 26, 'PT MENTARI PRIMA SEMESTA KALBAR', 9000, 9450, 0, 0),
('BRG-176', 'SPRING FR FORK', 'ASPIRA', 0, 30, 'PT MENTARI PRIMA SEMESTA KALBAR', 300000, 315000, 0, 0),
('BRG-177', '011111 SPRING FR FORK', 'ASPIRA', 0, 30, 'PT MENTARI PRIMA SEMESTA KALBAR', 300000, 315000, 0, 0),
('BRG-178', 'test123123', 'DENSHINa', 18, 52, 'PT MENTARI PRIMA SEMESTA KALBAR', 20000, 21000, 0, 0),
('BRG-180', 'test12312', 'DENSHINa', 0, 22, 'PT MENTARI PRIMA SEMESTA KALBAR', 20000, 21000, 0, 0),
('BRG-182', 'test12312', 'FUKUYAMA', 0, 0, 'PT MENTARI PRIMA SEMESTA KALBAR', 20000, 21000, 36000, 34000),
('BRG-183', 'test12312', 'DENSHINa', 0, 10, 'PT MENTARI PRIMA SEMESTA KALBAR', 20000, 21000, 35000, 32000),
('BRG-184', 'test1122', 'FUKUYAMA', 0, 50, 'PT MENTARI PRIMA SEMESTA KALBAR', 25000, 26250, 33250, 31500),
('BRG-185', 'Tistis12', 'Lotus', 0, 50, 'PT MENTARI PRIMA SEMESTA KALBAR', 30000, 31500, 42500, 40000),
('BRG-186', 'Rosta', 'DENSHINa', 0, 99, 'PT MENTARI PRIMA SEMESTA KALBAR', 50000, 52500, 93000, 90000),
('BRG-187', 'asdas', 'DENSHINa', 0, 119, 'Hijau Merah Sejati', 15000, 15750, 45000, 40000),
('BRG-188', 'gigi kopling', 'Asera', 0, 50, 'Hijau Merah Sejati', 0, 0, 0, 0),
('BRG-189', 'tesiting', 'Sunflower', 0, 80, 'PT MENTARI PRIMA SEMESTA KALBAR', 50000, 52500, 63000, 59500),
('BRG-190', 'repsol', 'ASPIRA', 0, 40, 'kelabu', 0, 0, 0, 0),
('BRG-191', 'sikat gigi', 'FUKUYAMA', 0, 299, 'Hijau Merah Sejati', 7000, 7350, 20900, 20460),
('BRG-192', 'teflon', 'ASPIRA', 0, 150, 'Hijau Merah Sejati', 50000, 52500, 71250, 67500),
('BRG-193', 'Teriyaki', 'ASPIRA', 0, 99, 'Hijau Merah Sejati', 50000, 52500, 72000, 67500),
('BRG-194', 'oli samping', 'ASPIRA', 0, 40, 'Hijau Merah Sejati', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel barang temp`
--

CREATE TABLE `tabel barang temp` (
  `kd_brg` varchar(20) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
  `hrg_brg` int(12) NOT NULL,
  `mrk_brg` varchar(20) NOT NULL,
  `sto_brg` int(12) NOT NULL,
  `supp_brg` text NOT NULL,
  `user` varchar(20) NOT NULL
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
  `nm_brg` varchar(100) NOT NULL,
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

--
-- Dumping data for table `tabel piutang`
--

INSERT INTO `tabel piutang` (`id_trns`, `noktp`, `nama`, `alamat`, `no hp`, `tgl_trns`, `t_hrg`, `sisa_byr`) VALUES
('DET-125', '2342324234234234', 'erwerwerw', 'dfsdfsdfsds', '131231231231', '2022-03-31', 73500, 63500),
('DET-093', '4321432143214321', 'resti', 'samping jalan', '787878787878', '2022-03-30', 640000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel pusat temp`
--

CREATE TABLE `tabel pusat temp` (
  `kd_brg` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_brg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sto_brg` int(5) NOT NULL,
  `hrg_modal` int(50) NOT NULL,
  `hrg_jual` int(50) NOT NULL,
  `hrg_jual2` int(12) NOT NULL,
  `hrg_jual3` int(12) NOT NULL,
  `supp_brg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrk_brg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel retur`
--

CREATE TABLE `tabel retur` (
  `kd_retur` varchar(20) NOT NULL DEFAULT 'RTR-001',
  `tgl_trans` date NOT NULL,
  `kd_trans` varchar(25) CHARACTER SET latin1 NOT NULL,
  `jml_brg` int(4) NOT NULL,
  `hrg_brg` int(11) NOT NULL,
  `total_hrg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel retur`
--

INSERT INTO `tabel retur` (`kd_retur`, `tgl_trans`, `kd_trans`, `jml_brg`, `hrg_brg`, `total_hrg`) VALUES
('RTR-001', '2022-03-11', 'DET-036', 2, 54000, 108000),
('RTR-002', '2022-03-11', 'DET-037', 2, 50000, 100000),
('RTR-003', '2022-03-23', 'DET-038', 1, 60000, 60000),
('RTR-004', '2022-03-23', 'DET-039', 1, 60000, 60000),
('RTR-005', '2022-03-23', 'DET-040', 1, 50000, 50000),
('RTR-006', '2022-03-23', 'DET-041', 1, 100000, 100000),
('RTR-007', '2022-03-23', 'DET-031', 5, 48000, 240000),
('RTR-008', '2022-03-23', 'DET-032', 5, 32000, 160000),
('RTR-009', '2022-03-30', 'DET-038', 1, 60000, 60000),
('RTR-010', '2022-03-30', 'DET-039', 1, 60000, 60000),
('RTR-011', '2022-03-30', 'DET-047', 1, 80000, 80000),
('RTR-012', '2022-03-30', 'DET-034', 1, 54000, 54000),
('RTR-013', '2022-03-30', 'DET-034', 1, 54000, 54000),
('RTR-014', '2022-03-30', 'DET-035', 1, 36000, 36000),
('RTR-015', '2022-03-30', 'DET-035', 1, 36000, 36000),
('RTR-016', '2022-03-30', 'DET-064', 1, 45000, 43000),
('RTR-017', '2022-03-30', 'DET-064', 1, 45000, 43000),
('RTR-018', '2022-03-30', 'DET-064', 1, 45000, 43000),
('RTR-019', '2022-03-30', 'DET-038', 2, 60000, 120000),
('RTR-020', '2022-03-30', 'DET-086', 1, 50000, 50000),
('RTR-021', '2022-03-30', 'DET-038', 1, 60000, 60000),
('RTR-022', '2022-03-30', 'DET-061', 1, 100000, 100000),
('RTR-023', '2022-03-30', 'DET-092', 5, 45000, 225000),
('RTR-024', '2022-03-31', 'DET-093', 5, 19000, 95000),
('RTR-025', '2022-03-31', 'DET-096', 1, 28350, 28350),
('RTR-026', '2022-03-31', 'DET-097', 1, 28350, 28350),
('RTR-027', '2022-03-31', 'DET-098', 1, 28350, 28350),
('RTR-028', '2022-03-31', 'DET-101', 1, 9450, 4450),
('RTR-029', '2022-03-31', 'DET-096', 1, 28350, 28350),
('RTR-030', '2022-03-31', 'DET-097', 1, 28350, 28350),
('RTR-031', '2022-03-31', 'DET-098', 1, 28350, 28350),
('RTR-032', '2022-03-31', 'DET-101', 1, 9450, 4450),
('RTR-033', '2022-03-31', 'DET-099', 1, 28350, 28350),
('RTR-034', '2022-03-31', 'DET-100', 1, 28350, 28350),
('RTR-035', '2022-03-31', 'DET-096', 1, 28350, 28350),
('RTR-036', '2022-03-31', 'DET-097', 1, 28350, 28350),
('RTR-037', '2022-03-31', 'DET-098', 1, 28350, 28350),
('RTR-038', '2022-03-31', 'DET-101', 1, 9450, 4450),
('RTR-039', '2022-03-31', 'DET-099', 1, 28350, 28350),
('RTR-040', '2022-03-31', 'DET-100', 1, 28350, 28350),
('RTR-041', '2022-03-31', 'DET-096', 1, 28350, 28350),
('RTR-042', '2022-03-31', 'DET-097', 1, 28350, 28350),
('RTR-043', '2022-03-31', 'DET-098', 1, 28350, 28350),
('RTR-044', '2022-03-31', 'DET-101', 1, 9450, 4450),
('RTR-045', '2022-03-31', 'DET-099', 1, 28350, 28350),
('RTR-046', '2022-03-31', 'DET-100', 1, 28350, 28350),
('RTR-047', '2022-03-31', 'DET-089', 1, 15000, 15000),
('RTR-048', '2022-03-31', 'DET-088', 1, 42500, 42500),
('RTR-049', '2022-03-31', 'DET-083', 1, 90000, 90000),
('RTR-050', '2022-03-31', 'DET-082', 1, 54000, 54000),
('RTR-051', '2022-03-31', 'DET-081', 1, 100000, 100000),
('RTR-052', '2022-03-31', 'DET-089', 1, 15000, 15000),
('RTR-053', '2022-03-31', 'DET-088', 1, 42500, 42500),
('RTR-054', '2022-03-31', 'DET-083', 1, 90000, 90000),
('RTR-055', '2022-03-31', 'DET-082', 1, 54000, 54000),
('RTR-056', '2022-03-31', 'DET-081', 1, 100000, 100000),
('RTR-057', '2022-03-31', 'DET-089', 1, 15000, 15000),
('RTR-058', '2022-03-31', 'DET-088', 1, 42500, 42500),
('RTR-059', '2022-03-31', 'DET-083', 1, 90000, 90000),
('RTR-060', '2022-03-31', 'DET-082', 1, 54000, 54000),
('RTR-061', '2022-03-31', 'DET-081', 1, 100000, 100000),
('RTR-062', '2022-03-31', 'DET-089', 1, 15000, 15000),
('RTR-063', '2022-03-31', 'DET-088', 1, 42500, 42500),
('RTR-064', '2022-03-31', 'DET-083', 1, 90000, 90000),
('RTR-065', '2022-03-31', 'DET-082', 1, 54000, 54000),
('RTR-066', '2022-03-31', 'DET-081', 1, 100000, 100000),
('RTR-067', '2022-03-31', 'DET-089', 1, 15000, 15000),
('RTR-068', '2022-03-31', 'DET-089', 1, 15000, 15000),
('RTR-069', '2022-03-31', 'DET-042', 1, 0, 0),
('RTR-070', '2022-03-31', 'DET-043', 1, 0, 0),
('RTR-071', '2022-03-31', 'DET-044', 1, 0, 0),
('RTR-072', '2022-03-31', 'DET-045', 1, 0, 0),
('RTR-073', '2022-03-31', 'DET-046', 1, 0, 0),
('RTR-074', '2022-03-31', 'DET-049', 1, 0, 0),
('RTR-075', '2022-03-31', 'DET-048', 1, 0, 0),
('RTR-076', '2022-03-31', 'DET-050', 1, 0, 0),
('RTR-077', '2022-03-31', 'DET-056', 1, 0, 0),
('RTR-078', '2022-03-31', 'DET-051', 1, 0, 0),
('RTR-079', '2022-03-31', 'DET-057', 1, 0, 0),
('RTR-080', '2022-03-31', 'DET-089', 1, 15000, 15000),
('RTR-081', '2022-03-31', 'DET-042', 1, 0, 0),
('RTR-082', '2022-03-31', 'DET-043', 1, 0, 0),
('RTR-083', '2022-03-31', 'DET-044', 1, 0, 0),
('RTR-084', '2022-03-31', 'DET-045', 1, 0, 0),
('RTR-085', '2022-03-31', 'DET-046', 1, 0, 0),
('RTR-086', '2022-03-31', 'DET-049', 1, 0, 0),
('RTR-087', '2022-03-31', 'DET-048', 1, 0, 0),
('RTR-088', '2022-03-31', 'DET-050', 1, 0, 0),
('RTR-089', '2022-03-31', 'DET-056', 1, 0, 0),
('RTR-090', '2022-03-31', 'DET-051', 1, 0, 0),
('RTR-091', '2022-03-31', 'DET-057', 1, 0, 0),
('RTR-092', '2022-03-31', 'DET-089', 1, 15000, 15000),
('RTR-093', '2022-03-31', 'DET-042', 1, 0, 0),
('RTR-094', '2022-03-31', 'DET-043', 1, 0, 0),
('RTR-095', '2022-03-31', 'DET-044', 1, 0, 0),
('RTR-096', '2022-03-31', 'DET-045', 1, 0, 0),
('RTR-097', '2022-03-31', 'DET-046', 1, 0, 0),
('RTR-098', '2022-03-31', 'DET-049', 1, 0, 0),
('RTR-099', '2022-03-31', 'DET-048', 1, 0, 0),
('RTR-100', '2022-03-31', 'DET-050', 1, 0, 0),
('RTR-101', '2022-03-31', 'DET-056', 1, 0, 0),
('RTR-102', '2022-03-31', 'DET-051', 1, 0, 0),
('RTR-103', '2022-03-31', 'DET-057', 1, 0, 0),
('RTR-104', '2022-03-31', 'DET-089', 1, 15000, 15000),
('RTR-105', '2022-03-31', 'DET-042', 1, 0, 0),
('RTR-106', '2022-03-31', 'DET-043', 1, 0, 0),
('RTR-107', '2022-03-31', 'DET-044', 1, 0, 0),
('RTR-108', '2022-03-31', 'DET-045', 1, 0, 0),
('RTR-109', '2022-03-31', 'DET-046', 1, 0, 0),
('RTR-110', '2022-03-31', 'DET-049', 1, 0, 0),
('RTR-111', '2022-03-31', 'DET-048', 1, 0, 0),
('RTR-112', '2022-03-31', 'DET-050', 1, 0, 0),
('RTR-113', '2022-03-31', 'DET-056', 1, 0, 0),
('RTR-114', '2022-03-31', 'DET-051', 1, 0, 0),
('RTR-115', '2022-03-31', 'DET-057', 1, 0, 0),
('RTR-116', '2022-03-31', 'DET-038', 1, 60000, 60000),
('RTR-117', '2022-03-31', 'DET-064', 1, 45000, 43000),
('RTR-118', '2022-03-31', 'DET-065', 1, 30000, 28000),
('RTR-119', '2022-03-31', 'DET-065', 1, 30000, 28000),
('RTR-120', '2022-03-31', 'DET-065', 1, 30000, 30000),
('RTR-121', '2022-03-31', 'DET-065', 1, 30000, 30000),
('RTR-122', '2022-03-31', 'DET-066', 1, 90000, 88000),
('RTR-123', '2022-03-31', 'DET-038', 1, 60000, 60000),
('RTR-124', '2022-03-31', 'DET-089', 1, 15000, 15000),
('RTR-125', '2022-03-31', 'DET-042', 1, 0, 0),
('RTR-126', '2022-03-31', 'DET-043', 1, 0, 0),
('RTR-127', '2022-03-31', 'DET-044', 1, 0, 0),
('RTR-128', '2022-03-31', 'DET-045', 1, 0, 0),
('RTR-129', '2022-03-31', 'DET-046', 1, 0, 0),
('RTR-130', '2022-03-31', 'DET-049', 1, 0, 0),
('RTR-131', '2022-03-31', 'DET-048', 1, 0, 0),
('RTR-132', '2022-03-31', 'DET-050', 1, 0, 0),
('RTR-133', '2022-03-31', 'DET-056', 1, 0, 0),
('RTR-134', '2022-03-31', 'DET-051', 1, 0, 0),
('RTR-135', '2022-03-31', 'DET-042', 1, 0, 0),
('RTR-136', '2022-03-31', 'DET-042', 1, 0, 0),
('RTR-137', '2022-03-31', 'DET-043', 1, 0, 0),
('RTR-138', '2022-03-31', 'DET-044', 1, 0, 0),
('RTR-139', '2022-03-31', 'DET-045', 1, 0, 0),
('RTR-140', '2022-03-31', 'DET-046', 1, 0, 0),
('RTR-141', '2022-03-31', 'DET-033', 1, 54000, 54000),
('RTR-142', '2022-03-31', 'DET-078', 1, 51000, 51000),
('RTR-143', '2022-03-31', 'DET-078', 1, 51000, 51000),
('RTR-144', '2022-03-31', 'DET-078', 1, 51000, 51000),
('RTR-145', '2022-03-31', 'DET-086', 1, 50000, 50000),
('RTR-146', '2022-03-31', 'DET-038', 2, 60000, 120000),
('RTR-147', '2022-04-01', 'DET-038', 1, 60000, 60000),
('RTR-148', '2022-04-01', 'DET-042', 1, 0, 0),
('RTR-149', '2022-04-01', 'DET-043', 1, 0, 0),
('RTR-150', '2022-04-01', 'DET-044', 1, 0, 0),
('RTR-151', '2022-04-01', 'DET-045', 1, 0, 0),
('RTR-152', '2022-04-01', 'DET-046', 1, 0, 0),
('RTR-153', '2022-04-01', 'DET-048', 1, 0, 0),
('RTR-154', '2022-04-01', 'DET-050', 1, 0, 0),
('RTR-155', '2022-04-01', 'DET-051', 1, 0, 0),
('RTR-156', '2022-04-01', 'DET-049', 1, 0, 0),
('RTR-157', '2022-04-01', 'DET-056', 1, 0, 0),
('RTR-158', '2022-04-01', 'DET-057', 1, 0, 0),
('RTR-159', '2022-04-01', 'DET-125', 1, 42000, 42000),
('RTR-160', '2022-04-01', 'DET-124', 1, 31500, 31500),
('RTR-161', '2022-04-01', 'DET-101', 1, 9450, 4450),
('RTR-162', '2022-04-01', 'DET-039', 1, 60000, 60000),
('RTR-163', '2022-04-01', 'DET-052', 1, 18000, 18000),
('RTR-164', '2022-04-01', 'DET-040', 1, 50000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel retur temp`
--

CREATE TABLE `tabel retur temp` (
  `kd_temp` varchar(10) NOT NULL DEFAULT 'TEMP-001',
  `kd_trans` varchar(25) CHARACTER SET latin1 NOT NULL,
  `jml_brg` int(4) NOT NULL,
  `hrg_brg` int(10) NOT NULL,
  `total_hrg` int(10) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel retur temp`
--

INSERT INTO `tabel retur temp` (`kd_temp`, `kd_trans`, `jml_brg`, `hrg_brg`, `total_hrg`, `user`) VALUES
('TEMP-017', 'DET-086', 1, 50000, 50000, 'grosir1'),
('TEMP-036', 'DET-042', 1, 0, 0, 'kasir1'),
('TEMP-037', 'DET-043', 1, 0, 0, 'kasir1'),
('TEMP-038', 'DET-044', 1, 0, 0, 'kasir1'),
('TEMP-039', 'DET-045', 1, 0, 0, 'kasir1'),
('TEMP-040', 'DET-046', 1, 0, 0, 'kasir1'),
('TEMP-041', 'DET-094', 1, 45000, 45000, 'grosir'),
('TEMP-042', 'DET-095', 1, 80000, 80000, 'grosir');

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
('SUP-003', 'PT MENTARI PRIMA SEMESTA KALBAR', 'JL ARTERIA SUPADIO NO 8 PONTIANAK', '081297077782'),
('SUP-004', 'Hijau Merah Sejati', 'samping jalan', '080808080808'),
('SUP-005', 'kelabu', 'pelangiiiiii', '121212112121'),
('SUP-006', 'mentaridj', 'suprapto no 30 ', '081292828888');

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

--
-- Dumping data for table `tabel transaksi`
--

INSERT INTO `tabel transaksi` (`id_trns`, `tgl_trns`, `total_harga`, `status`) VALUES
('TRN-001', '2022-01-14', 55800, 'lunas'),
('TRN-002', '2022-01-14', 118800, 'lunas'),
('TRN-003', '2022-01-14', 86400, 'lunas'),
('TRN-004', '2022-01-14', 55800, 'lunas'),
('TRN-005', '2022-01-14', 55800, 'lunas'),
('TRN-006', '2022-01-14', 59400, 'lunas'),
('TRN-007', '2022-01-17', 24000, 'lunas'),
('TRN-008', '2022-01-19', 0, 'lunas'),
('TRN-009', '2022-01-20', 60000, 'lunas'),
('TRN-010', '2022-01-20', 60000, 'cicil'),
('TRN-011', '2022-01-23', 108000, 'lunas'),
('TRN-012', '2022-01-24', 800000, 'lunas'),
('TRN-013', '2022-01-24', 90000, 'lunas'),
('TRN-014', '2022-01-25', 0, 'lunas'),
('TRN-015', '2022-01-25', 0, 'lunas'),
('TRN-016', '2022-03-06', 208000, 'lunas'),
('TRN-017', '2022-03-18', 208800, 'lunas'),
('TRN-018', '2022-03-23', 210000, 'lunas'),
('TRN-019', '2022-03-23', 80000, 'lunas'),
('TRN-020', '2022-03-29', 85000, 'lunas'),
('TRN-021', '2022-03-30', 159000, 'lunas'),
('TRN-022', '2022-03-30', 210000, 'lunas'),
('TRN-023', '2022-03-30', 1380000, 'lunas'),
('TRN-024', '2022-03-30', 131000, 'lunas'),
('TRN-025', '2022-03-30', 98000, 'lunas'),
('TRN-026', '2022-03-30', 51000, 'lunas'),
('TRN-027', '2022-03-30', 51000, 'lunas'),
('TRN-028', '2022-03-30', 80000, 'lunas'),
('TRN-029', '2022-03-30', 160000, 'lunas'),
('TRN-030', '2022-03-30', 144000, 'lunas'),
('TRN-031', '2022-03-30', 160000, 'lunas'),
('TRN-032', '2022-03-30', 196000, 'lunas'),
('TRN-033', '2022-03-30', 57500, 'lunas'),
('TRN-034', '2022-03-30', 136555, 'lunas'),
('TRN-035', '2022-03-30', 640000, 'cicil'),
('TRN-036', '2022-03-31', 125000, 'lunas'),
('TRN-037', '2022-03-31', 32800, 'lunas'),
('TRN-038', '2022-03-31', 541611, 'lunas'),
('TRN-039', '2022-03-31', 492900, 'lunas'),
('TRN-040', '2022-03-31', 411000, 'lunas'),
('TRN-041', '2022-03-31', 73500, 'cicil');

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

--
-- Dumping data for table `table mekanik`
--

INSERT INTO `table mekanik` (`id_mekanik`, `nm_mekanik`, `no_hp`, `no_ktp`) VALUES
('MEK-001', 'Kartono', '123123123112', '1234123412341234'),
('MEK-002', 'Dewanto', '121212121212', '1234123412341234'),
('MEK-003', 'Rocky', '123123123123', '4321432143214321');

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
('MRK-001', 'DENSHINa'),
('MRK-002', 'FUKUYAMA'),
('MRK-005', 'ASPIRA'),
('MRK-006', 'Sunflower'),
('MRK-007', 'Lotus'),
('MRK-008', 'Asera'),
('MRK-009', 'Dettol'),
('MRK-010', 'daihatsu'),
('MRK-011', 'surya');

-- --------------------------------------------------------

--
-- Table structure for table `update barang temp`
--

CREATE TABLE `update barang temp` (
  `kd_brg` varchar(20) NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
  `hrg_brg` int(12) NOT NULL,
  `mrk_brg` text NOT NULL,
  `sto_brg` int(8) NOT NULL,
  `supp_brg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update barang temp`
--

INSERT INTO `update barang temp` (`kd_brg`, `nm_brg`, `hrg_brg`, `mrk_brg`, `sto_brg`, `supp_brg`) VALUES
('23221-KFL-860D', 'AS GEAR DEPAN SUPRA FIT NEW/REVO TYPE H', 42000, 'DENSHINa', 148, 'Hijau Merah Sejati'),
('BRG-191', 'sikat gigi', 7350, 'FUKUYAMA', 300, 'Hijau Merah Sejati'),
('BRG-194', 'oli samping', 0, 'ASPIRA', 40, 'Hijau Merah Sejati');

-- --------------------------------------------------------

--
-- Table structure for table `utang toko`
--

CREATE TABLE `utang toko` (
  `kd_utg` varchar(8) NOT NULL DEFAULT 'UTG-001',
  `tgl_trns` date NOT NULL,
  `nm_brg` varchar(100) NOT NULL,
  `hrg_brg` int(16) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `nm_toko` varchar(40) NOT NULL,
  `ket` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang mekanik temp`
--
ALTER TABLE `barang mekanik temp`
  ADD PRIMARY KEY (`kd_temp`);

--
-- Indexes for table `daftar belanja temp`
--
ALTER TABLE `daftar belanja temp`
  ADD PRIMARY KEY (`kd_temp`);

--
-- Indexes for table `daftar grosir temp`
--
ALTER TABLE `daftar grosir temp`
  ADD PRIMARY KEY (`kd_temp`);

--
-- Indexes for table `daftar layanan temp`
--
ALTER TABLE `daftar layanan temp`
  ADD PRIMARY KEY (`kd_temp`);

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
-- Indexes for table `riwayat pembelian`
--
ALTER TABLE `riwayat pembelian`
  ADD PRIMARY KEY (`id_trans`);

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
-- Indexes for table `tabel pusat temp`
--
ALTER TABLE `tabel pusat temp`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `tabel retur`
--
ALTER TABLE `tabel retur`
  ADD PRIMARY KEY (`kd_retur`),
  ADD KEY `cek kode trans` (`kd_trans`);

--
-- Indexes for table `tabel retur temp`
--
ALTER TABLE `tabel retur temp`
  ADD PRIMARY KEY (`kd_temp`),
  ADD KEY `kode_transaksi` (`kd_trans`);

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat pembelian`
--
ALTER TABLE `riwayat pembelian`
  ADD CONSTRAINT `cek kode` FOREIGN KEY (`id_trans`) REFERENCES `detail transaksi` (`id_trans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel retur`
--
ALTER TABLE `tabel retur`
  ADD CONSTRAINT `cek kode trans` FOREIGN KEY (`kd_trans`) REFERENCES `detail transaksi` (`id_trans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel retur temp`
--
ALTER TABLE `tabel retur temp`
  ADD CONSTRAINT `kode_transaksi` FOREIGN KEY (`kd_trans`) REFERENCES `detail transaksi` (`id_trans`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
