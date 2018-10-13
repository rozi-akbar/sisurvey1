-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 02:23 AM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
