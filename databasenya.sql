-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 02:20 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisurvey`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` varchar(15) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`, `telpon`, `status`) VALUES
('JRS001', 'Madrasah Aliyah Zainul Hasan', '0336828172', 'aktif'),
('JRS002', 'SMK Hafsa Zainul Hasan', '0336957102', 'aktif'),
('JRS003', 'SMA Hafsah Zainul Hasan', '0336957390', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapping_pengajar`
--

CREATE TABLE `tbl_mapping_pengajar` (
  `id_mapping` varchar(32) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_jurusan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajar`
--

CREATE TABLE `tbl_pengajar` (
  `nip` varchar(30) NOT NULL,
  `id_jurusan` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telpon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajar`
--

INSERT INTO `tbl_pengajar` (`nip`, `id_jurusan`, `nama`, `kelamin`, `alamat`, `telpon`) VALUES
('6481726', 'JRS001', 'Dewi Mudrika', 'P', 'Probolinggo', '-'),
('8273612', 'JRS001', 'Hamka', 'L', 'Probolinggo', '-'),
('9827381', 'JRS001', 'Agus Supriyanto', 'L', 'Probolinggo', '-'),
('4629320', 'JRS001', 'Nurul Faizah', 'P', 'Probolinggo', '-'),
('1934953', 'JRS001', 'Abdur Rosyid', 'L', 'Probolinggo', '-'),
('9287478', 'JRS001', 'Ainur Rofik Sofa', 'P', 'Probolinggo', '-'),
('9174730', 'JRS001', 'Nilna Hasanati', 'P', 'Probolinggo', '-'),
('6293749', 'JRS001', 'Harsono', 'L', 'Probolinggo', '-'),
('1628364', 'JRS001', 'Siti Nur Kholifah', 'P', 'Probolinggo', '-'),
('8273913', 'JRS001', 'Susilatul Thubisi', 'P', 'Probolinggo', '-'),
('7162934', 'JRS001', 'Muhajir', 'L', 'Probolinggo', '-'),
('3639294', 'JRS001', 'Nur Amida Kriana', 'P', 'Probolinggo', '-'),
('9164027', 'JRS001', 'Abdullah', 'L', 'Probolinggo', '-'),
('9120082', 'JRS001', 'Siti Umil Mukminah', 'P', 'Probolinggo', '-'),
('7823212', 'JRS001', 'Syamsul Arifin', 'L', 'Probolinggo', '-'),
('4628192', 'JRS001', 'Parahita Paradipta', 'P', 'Probolinggo', '-'),
('1234698', 'JRS001', 'Siti Nur Kumala', 'P', 'Probolinggo', '-'),
('6253912', 'JRS001', 'Syamsuddin', 'L', 'Probolinggo', '-'),
('3528192', 'JRS001', 'Hubbul Wathan', 'L', 'Probolinggo', '-'),
('2965937', 'JRS001', 'Ulfa Umami', 'P', 'Probolinggo', '-'),
('5838291', 'JRS001', 'Helmi', 'L', 'Probolinggo', '-'),
('2564920', 'JRS001', 'Novilia Tilawatil Laili', 'P', 'Probolinggo', '-'),
('2846593', 'JRS001', 'Aminuddin Sasi', 'L', 'Probolinggo', '-'),
('4689093', 'JRS001', 'Moh Holil', 'L', 'Probolinggo', '-'),
('7123976', 'JRS001', 'Didik', 'L', 'Probolinggo', '-'),
('9188323', 'JRS001', 'Syaiful Arifin', 'L', 'Probolinggo', '-'),
('9156723', 'JRS003', 'Budi Wardana', 'L', 'Probolinggo', '-'),
('9875543', 'JRS002', 'Eva Heti Wahyuni', 'P', 'Probolinggo', '-'),
('5566778', 'JRS003', 'Moh Imron', 'L', 'Probolinggo', '-'),
('1233213', 'JRS003', 'Devan Aditya', 'L', 'Probolinggo', '-'),
('6287919', 'JRS003', 'Evin Hayuwilianti', 'P', 'Probolinggo', '-'),
('5342719', 'JRS003', 'Harisul Islam', 'L', 'Probolinggo', '-'),
('9632936', 'JRS003', 'Eva Ardianah', 'P', 'Probolinggo', '-'),
('1926482', 'JRS003', 'Samsul Arifin', 'L', 'Probolinggo', '-'),
('7463819', 'JRS003', 'Atik Yuliana', 'P', 'Probolinggo', '-'),
('4441116', 'JRS003', 'Nurman Samsudi', 'L', 'Probolinggo', '-'),
('6661118', 'JRS003', 'Yusuf Nasyruddin', 'L', 'Probolinggo', '-'),
('9871236', 'JRS003', 'Tommy Anwary', 'L', 'Probolinggo', '-'),
('6419182', 'JRS003', 'Atiqatul Maula', 'P', 'Probolinggo', '-'),
('9473726', 'JRS003', 'Didik Hartono', 'L', 'Probolinggo', '-'),
('9176155', 'JRS003', 'Tjatur Martanto', 'L', 'Probolinggo', '-'),
('8455282', 'JRS003', 'Vina Agustin', 'P', 'Probolinggo', '-'),
('1118880', 'JRS003', 'Ainul Yaqin', 'L', 'Probolinggo', '-'),
('7603300', 'JRS003', 'Khusnul Khotimah', 'P', 'Probolinggo', '-'),
('4550022', 'JRS003', 'Wahed Efendi', 'L', 'Probolinggo', '-'),
('3009836', 'JRS003', 'Akhmad Iskandar', 'L', 'Probolinggo', '-'),
('1100882', 'JRS003', 'Nurul Yakin', 'L', 'Probolinggo', '-'),
('2202602', 'JRS003', 'Ahmad Muhibbul Firdaus', 'L', 'Probolinggo', '-'),
('8402610', 'JRS003', 'Abdul Mufid', 'L', 'Probolinggo', '-'),
('9902760', 'JRS003', 'Hasan', 'L', 'Probolinggo', '-'),
('1237027', 'JRS003', 'Musleh', 'L', 'Probolinggo', '-'),
('5673333', 'JRS002', 'Aninatul Baidiyah', 'P', 'Probolinggo', '-'),
('7299926', 'JRS002', 'Binta Muthia izqi', 'P', 'Probolinggo', '-'),
('1236788', 'JRS002', 'Rosita Dewi', 'P', 'Probolinggo', '-'),
('9997255', 'JRS002', 'Tutik Hidayati', 'P', 'Probolinggo', '-'),
('1166992', 'JRS002', 'Sulaiman B', 'L', 'Probolinggo', '-'),
('8854888', 'JRS002', 'Andi Jauharil', 'L', 'Probolinggo', '-'),
('9990001', 'JRS002', 'Mirojul Umami', 'P', 'Probolinggo', '-'),
('1188800', 'JRS002', 'Andhika Dwi Anggara', 'L', 'Probolinggo', '-'),
('2879000', 'JRS002', 'Yulianti', 'P', 'Probolinggo', '-'),
('6662300', 'JRS001', 'Tatok Kamarudin', 'L', 'Probolinggo', '-'),
('1000277', 'JRS001', 'Susilawati', 'P', 'Probolinggo', '-'),
('5502882', 'JRS001', 'Abdul Abad', 'L', 'Probolinggo', '-'),
('3330030', 'JRS001', 'Muhammad Saleh', 'L', 'Probolinggo', '-'),
('3330377', 'JRS001', 'Moh Kholili', 'L', 'Probolinggo', '-'),
('4779890', 'JRS001', 'Nur Azmi', 'P', 'Probolinggo', '-'),
('3364992', 'JRS001', 'Agung Hari Utomo', 'L', 'Probolinggo', '-'),
('8266682', 'JRS001', 'Moch. Hofili', 'L', 'Probolinggo', '-'),
('1827678', 'JRS002', 'Mohammad', 'L', 'Probolinggo', '-'),
('1003002', 'JRS002', 'Rohma', 'P', 'Probolinggo', '-'),
('1111112', 'JRS002', 'Sulaiman Bakir', 'L', 'Probolinggo', '-'),
('1112638', 'JRS002', 'Rina Wulandari', 'P', 'Probolinggo', '-'),
('1625382', 'JRS002', 'Mufid Efendi', 'L', 'Probolinggo', '-'),
('2222347', 'JRS002', 'Jhon Tri Jaya', 'L', 'Probolinggo', '-'),
('2237888', 'JRS002', 'M. Badik', 'L', 'Probolinggo', '-'),
('3378266', 'JRS002', 'Moh. Syahroni', 'L', 'Probolinggo', '-'),
('4028022', 'JRS002', 'Amelia', 'P', 'Probolinggo', '-'),
('4481908', 'JRS002', 'Dwi Helmi Aprilian', 'P', 'Probolinggo', '-'),
('5553618', 'JRS002', 'Alvian Agung', 'L', 'Probolinggo', '-'),
('9000012', 'JRS002', 'Herdian Ulfawati', 'P', 'Probolinggo', '-'),
('6677192', 'JRS002', 'Aminuddin Sasi', 'L', 'Probolinggo', '-'),
('9716777', 'JRS002', 'Tatok Kamarudin', 'L', 'Probolinggo', '-'),
('9911622', 'JRS002', 'Moh Holil', 'L', 'Probolinggo', '-'),
('8877661', 'JRS002', 'Susilawati', 'P', 'Probolinggo', '-'),
('9166772', 'JRS002', 'Abdul Abad', 'L', 'Probolinggo', '-'),
('4445551', 'JRS002', 'Didik', 'L', 'Probolinggo', '-'),
('9991223', 'JRS002', 'Muhammad Saleh', 'L', 'Probolinggo', '-'),
('9111822', 'JRS002', 'Moh Kholili', 'L', 'Probolinggo', '-'),
('1177255', 'JRS002', 'Nur Azmi', 'P', '-', ''),
('5553627', 'JRS002', 'Syaiful Arifin', 'L', 'Probolinggo', '-'),
('8833621', 'JRS002', 'Agung Hari Utomo', 'L', 'Probolinggo', '-'),
('7118827', 'JRS002', 'Moch. Hofili', 'L', 'Probolinggo', '-'),
('5172226', 'JRS003', 'Eva Heti Wahyuni', 'P', 'Probolinggo', '-'),
('7111921', 'JRS003', 'Abdul Munib', 'L', 'Probolinggo', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `id_permission` varchar(32) NOT NULL,
  `nama_permission` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekap_survey`
--

CREATE TABLE `tbl_rekap_survey` (
  `id_jurusan` varchar(15) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tahun_akademik` varchar(4) NOT NULL,
  `semester_akademik` varchar(6) NOT NULL,
  `A1` tinyint(1) NOT NULL,
  `A2` tinyint(1) NOT NULL,
  `A3` tinyint(1) NOT NULL,
  `A4` tinyint(1) NOT NULL,
  `A5` tinyint(1) NOT NULL,
  `A6` tinyint(1) NOT NULL,
  `A7` tinyint(1) NOT NULL,
  `A8` tinyint(1) NOT NULL,
  `A9` tinyint(1) NOT NULL,
  `A10` tinyint(1) NOT NULL,
  `B1` tinyint(1) NOT NULL,
  `B2` tinyint(1) NOT NULL,
  `B3` tinyint(1) NOT NULL,
  `B4` tinyint(1) NOT NULL,
  `B5` tinyint(1) NOT NULL,
  `B6` tinyint(1) NOT NULL,
  `B7` tinyint(1) NOT NULL,
  `B8` tinyint(1) NOT NULL,
  `C1` tinyint(1) NOT NULL,
  `C2` tinyint(1) NOT NULL,
  `C3` tinyint(1) NOT NULL,
  `C4` tinyint(1) NOT NULL,
  `C5` tinyint(1) NOT NULL,
  `C6` tinyint(1) NOT NULL,
  `D1` tinyint(1) NOT NULL,
  `D2` tinyint(1) NOT NULL,
  `D3` tinyint(1) NOT NULL,
  `D4` tinyint(1) NOT NULL,
  `D5` tinyint(1) NOT NULL,
  `D6` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rekap_survey`
--

INSERT INTO `tbl_rekap_survey` (`id_jurusan`, `nip`, `tahun_akademik`, `semester_akademik`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, `A9`, `A10`, `B1`, `B2`, `B3`, `B4`, `B5`, `B6`, `B7`, `B8`, `C1`, `C2`, `C3`, `C4`, `C5`, `C6`, `D1`, `D2`, `D3`, `D4`, `D5`, `D6`) VALUES
('JRS001', '8402610', '1718', 'genap', 3, 2, 3, 5, 2, 2, 2, 5, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4, 3, 4, 5, 4, 4, 4, 5, 4, 2, 5, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun_ajaran`
--

CREATE TABLE `tbl_tahun_ajaran` (
  `id_tahun_ajaran` varchar(10) NOT NULL,
  `detail` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahun_ajaran`
--

INSERT INTO `tbl_tahun_ajaran` (`id_tahun_ajaran`, `detail`) VALUES
('1516', '2015/2016'),
('1617', '2016/2017'),
('1718', '2017/2018'),
('1819', '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(32) NOT NULL,
  `id_jurusan` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_jurusan`, `nama`, `username`, `password`, `no_hp`, `level`, `status`) VALUES
('USR001', 'JRS002', 'Rozi,S.Kom', 'BRK002', 'admin', '087294028472', 'admin', 'aktif'),
('USR002', 'JRS002', 'Drs.Suwito Latief,M.Pd', 'HJR074', 'ketua', '087262826381', 'ketua', 'aktif'),
('USR003', 'JRS001', 'Mulyadi Hermawan', 'JUD098', 'surveyor', '086251726000', 'surveyor', 'aktif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
