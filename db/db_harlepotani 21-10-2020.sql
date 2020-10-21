-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 07:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_harlepotani`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `no` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_izincuti` date NOT NULL,
  `tgl_akhircuti` date NOT NULL,
  `alasan` varchar(150) NOT NULL,
  `waktudibuat` datetime NOT NULL,
  `terakhirdiubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`no`, `id_karyawan`, `tgl_izincuti`, `tgl_akhircuti`, `alasan`, `waktudibuat`, `terakhirdiubah`) VALUES
(1, 38, '2020-06-07', '2020-06-29', 'tabrakan dan bermasalah pada mata (lengkap surat dokter)', '2020-10-11 18:51:47', '2020-10-11 11:51:47'),
(2, 132, '2020-10-11', '2020-10-12', 'Melahirkan', '2020-10-13 15:13:00', '2020-10-16 12:24:16'),
(3, 140, '2020-10-13', '2020-12-14', 'Melahirkan', '2020-10-13 21:11:28', '2020-10-19 07:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti_res`
--

CREATE TABLE `tbl_cuti_res` (
  `no` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_izincuti` date NOT NULL,
  `tgl_akhircuti` date NOT NULL,
  `alasan` varchar(150) NOT NULL,
  `waktudibuat` datetime NOT NULL,
  `terakhirdiubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cuti_res`
--

INSERT INTO `tbl_cuti_res` (`no`, `id_karyawan`, `tgl_izincuti`, `tgl_akhircuti`, `alasan`, `waktudibuat`, `terakhirdiubah`) VALUES
(1, 282, '2020-10-19', '2020-10-20', 'ngetes saja', '2020-10-19 22:33:54', '2020-10-19 15:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hubkel`
--

CREATE TABLE `tbl_hubkel` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_karyawan_rel` int(11) NOT NULL,
  `hubungan` varchar(50) NOT NULL,
  `waktudibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `terakhirdiubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hubkel`
--

INSERT INTO `tbl_hubkel` (`id`, `id_karyawan`, `id_karyawan_rel`, `hubungan`, `waktudibuat`, `terakhirdiubah`) VALUES
(1, 1, 2, 'Saudara', '2020-10-13 16:56:21', '2020-10-13 09:56:21'),
(2, 276, 232, 'Saudara', '2020-10-16 18:36:24', '2020-10-16 11:36:24'),
(4, 6, 160, 'Abang Adik', '2020-10-16 18:40:26', '2020-10-16 11:40:26'),
(5, 2, 119, 'Sepupu', '2020-10-19 15:04:15', '2020-10-19 11:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hubkel_res`
--

CREATE TABLE `tbl_hubkel_res` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_karyawan_rel` int(11) NOT NULL,
  `relnama` varchar(100) NOT NULL,
  `relbagian` varchar(50) NOT NULL,
  `hubungan` varchar(50) NOT NULL,
  `waktudibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `terakhirdiubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hubkel_res`
--

INSERT INTO `tbl_hubkel_res` (`id`, `id_karyawan`, `id_karyawan_rel`, `relnama`, `relbagian`, `hubungan`, `waktudibuat`, `terakhirdiubah`) VALUES
(1, 282, 197, 'Sri Agustina Siregar', 'Pot - an', 'Saudara', '2020-10-19 22:32:12', '2020-10-19 15:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_infokaryawan`
--

CREATE TABLE `tbl_infokaryawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `status_nikah` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `waktudibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `terakhirdiubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_infokaryawan`
--

INSERT INTO `tbl_infokaryawan` (`id`, `id_karyawan`, `nama`, `jenis_kelamin`, `ttl`, `alamat`, `agama`, `status_nikah`, `no_hp`, `pendidikan`, `nik`, `waktudibuat`, `terakhirdiubah`) VALUES
(1, 1, 'Andika Tampubolon', 'Pria', 'Medan,13 Okt 1998', 'Jl.Letda Sujono no 1 Medan', 'Kristen', 'Lajang', '081260070428', 'SMKN 2 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:09:48'),
(2, 2, 'Arizona Saragih', 'Pria', 'Sipoldas,09 Sept 1987', 'Jl.RPH Pasar 1 lk 7 gg Family bar Mabar', 'Islam', 'Lajang', '081270600036', 'SMA KRAKATAU ', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(3, 3, 'Faisal Pribadi', 'Pria', 'Mabar,17 Juli 1999', 'Jl.Mangaan 8 lk 12 Mabar Hilir', 'Islam', 'Lajang', '083199773937', 'SMK SINAR HUSNI', '1271063108990005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(4, 4, 'Jemiin', 'Pria', 'Tegal Sari,01 Jan 1989', 'Selemak dusun 2 Jl.Jalaludin', 'Islam', 'Menikah', '085260906810', 'SMP MIFTAHUL ULUM', '1218092501890001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(5, 5, 'Juhari', 'Pria', 'Medan,23 Des 1992', 'Jl.RPH lk IX Mabar', 'Islam', 'Menikah', '081224238701', 'SMK SINAR HUSNI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(6, 6, 'Julfikar Rambe', 'Pria', 'Tapus Dolok,10 Mei 1994', 'Jl.Rph lk VII Mabar', 'Islam', 'Lajang', '085270268843', 'SMA N 1 TAPSEL', '1203221010910001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(7, 7, 'Maringan Marpaung', 'Pria', 'Medan,08 Oktober 1989', 'Sungai Mati gg Lama Labuhan  Deli', 'Kristen', 'Lajang', '082361155076', 'SMA PGRI 12 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(8, 8, 'M Munir', 'Pria', 'Medan,11 Juni 1974', 'Jl.RPH Lk.9 Mabar', 'Islam', 'Menikah', '081396218882', 'SMA PAB', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(9, 9, 'Muhammad Yusuf', 'Pria', '', '', 'Islam', '', '', '', '  ', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(10, 10, 'Nikko S', 'Pria', 'Taput,15 Agus 1966', 'Jl.Kawat I Gg.Turi Lk.19 Tj.Mulia hilir', 'Kristen', 'Menikah', '082365203209', 'SMAN TAPUT', '1271201508660004', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(11, 11, 'Riski Zuanda Dongoran', 'Pria', 'Medan,15 Agust 1999', 'Jl,haji Anif ', 'Kristen', 'Lajang', '085280546351', 'SMK MARISI', '1271061508990001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(12, 12, 'Tri Iswanto', 'Pria', 'Medan,03 Jul 1992', 'Jl.Marelan 5 Pasar 2 Barat', 'Islam', 'Menikah', '082351292580', 'SMA HARAPAN MEKAR', '1271120307920003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(13, 13, 'Ardesta Frasiandika', 'Pria', 'Mabar,11 Desember 2000', 'Jl.Marelan VII Lk 1 Pasar 1 Terjun', 'Islam', 'Lajang', '085372623735', 'SMK PAB 1 HELVETIA', '1271061112000001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(14, 14, 'Candra Siahaan', 'Pria', 'Medan,18 Mei 1991', 'Jl.Kawat III no 172 Tj.Mulia ', 'Kristen', 'Lajang', '082114493603', 'STM SILOAM MEDAN', '1271061805910001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(15, 15, 'Janris Kolam', 'Pria', 'Pangururan,11 Jan 1982', 'Jl.Pancing Lk.5 Mabar Hilir', 'Kristen', 'Menikah', '081376785323', 'SMK SILOAM', '1217081101820001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(16, 16, 'Kevin Pasaribu', 'Pria', 'Tj.Beringin 03 Okt 1997', 'Jl.Kawat VI gg Musyawarah', 'Kristen', 'Lajang', '-', 'SMK STABAT', '1205100310970002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(17, 17, 'Kiki Irawan', 'Pria', 'Medan,12 Okt 1988', 'Jl.Musyawrah gg lestari  dusun 6 Bandar Setia', 'Islam', 'Menikah', '081263147469', 'SMK TELADAN MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(18, 18, 'M. Syahrial', 'Pria', 'Medan, 19 Jul 1997', 'Jl. Mangaan IV Lingk II', 'Islam', 'Lajang', '081263085326', '', '1271061907970001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(19, 19, 'Rudi Harmoko', 'Pria', 'Mabar,09 Nov 1990', 'Jl.Mangaan 4 Lk,2 mabar', 'Islam', 'Menikah', '087869263049', 'SD', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(20, 20, 'Samuel N', 'Pria', 'Medan,28 Agus 1991', 'Blok J no 380 Lau bakeri', 'Kristen', 'Lajang', '085373133404', 'SMK DWIWARNA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(21, 21, 'Toharuddin Daulay', 'Pria', 'Siparau,07 Sep 1991', 'Jl.Rph lk VII Mabar', 'Islam', 'Menikah', '082367729188', 'S1 TEKNIK MESIN', '1271040709910007', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(22, 22, 'Albiner', 'Pria', 'L.Pakam, 27 Mar 1971', 'Jl.Mangaan I lk.IV Mabar Hilir', 'Kristen', 'Menikah', '082365091024', 'SMK PGRI L.PAKAM', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(23, 23, 'Berlinton Sinurat', 'Pria', 'Bangunsari,27 Feb 1994', 'Pasar 1 gg.Melati Mabar', 'Kristen', 'Lajang', '082132166119', 'SMA TRISAKTI LUBUK PAKAM', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(24, 24, 'Imanuel Situmorang', 'Pria', 'Dairi,05 Maret 1999', 'Jl.Taut lk I Kel Tangkahan', 'Kristen', 'Lajang', '082365302757', 'SMK N 5 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(25, 25, 'Jun Patar S', 'Pria', 'Batang terap,10 Jun 1976', 'Jl.Mangaan 1 lk 8 Mabar', 'Kristen', 'Menikah', '-', 'SMP TELADAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(26, 26, 'Lomo Tua', 'Pria', 'Medan,07 Okt 1987', 'Tanjung Mulia', 'Kristen', 'Menikah', '0822687005183', 'SMA KRAKATAU ', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(27, 27, 'Meiman Zebua', 'Pria', 'Medan,21 Mei 1992', 'lk 3 Pekan labuhan', 'Kristen', 'Lajang', '085280325892', 'SMK N 12 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(28, 28, 'Riki Sanjaya', 'Pria', 'Merdan,19 Des 1989', 'Mabar', 'Islam', 'Lajang', '085830880557', 'SMA ASUHAN JAYA MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(29, 29, 'Riski Samosir', 'Pria', 'Medan,29 Okt 2000', 'Jl.RPh gg am 2 Mabar', 'Kristen', 'Lajang', '081370523756', 'SMK YAPIM MABAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(30, 30, 'Sabar Napitu', 'Pria', 'Unjur,08 Januari 1995', 'Jl.Aluminium Raya kawat III', 'Kristen', 'Lajang', '087871533729', 'SMK HKBP SAMOSIR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(31, 31, 'Sendi Hermawan', 'Pria', 'Medan,20 Februari 2001', 'Jl.Kawat I Tanjung Mulia Hilir', 'Islam', 'Lajang', '082165339504', 'SMK SINAR HUSNI', '1271062002010001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(32, 32, 'Yusmadi', 'Pria', 'Medan,17 Des 1981', 'Pasar 5 Marelan', 'Islam', 'Menikah', '081264548597', 'SMP BINA SATRIA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(33, 33, 'Abdul Malik', 'Pria', 'Medan,01 Jul 1970', 'JlL.Marelan V Pasar 2 Gg Rukun', 'Islam', 'Menikah', '-', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(34, 34, 'Darwis', 'Pria', 'Medan,28 Agustus 1970', 'lk 25 Pekan Labuhan', 'Islam', 'Menikah', '082246186969', 'SMP', '1271132808700005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(35, 35, 'Ricardo Tampubolon', 'Pria', 'Deli Serdang,31 Oktober 1971', 'Jl.Rph lk X ', 'Islam', 'Menikah', '082311634479', 'SMP PGRI TINJOAN', '1271063110710002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(36, 36, 'Sakam', 'Pria', 'Medan,31 Des 1970', 'Lk.3 Pasar 2 Marelan', 'Islam', 'Menikah', '', 'SMA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(37, 37, 'Edi Kurniawan', 'Pria', '', '', 'Islam', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(38, 38, 'Agus Parsaulian Hutagalung', 'Pria', 'Medan,11 Agust 1992', 'Jl.Kawat III gg Padi no 55', 'Kristen', 'Menikah', '085277656264', 'SMA MARISI', '3216061108920011', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(39, 39, 'Albertian Imanuel', 'Pria', 'Medan,27 Jul 1998', 'Jl.Lumba Lumba 9 no 57 griya 2', 'Kristen', 'Lajang', '082361647850', 'SMA YAPIM MABAR', '12710627079800003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(40, 40, 'Ambri Syahputra', 'Pria', 'Medan,10 Apr 1994', 'Jl.RPH lk X Mabar', 'Islam', 'Kawin', '08153042099', 'SMK PANCA BUDI', '1271061004940002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(41, 41, 'Anggi Andriani', 'Wanita', 'KotaRantang,06 Jul 1995', 'Kota Rantang,Hamparan Perak', 'Islam', 'Menikah', '082381543372', 'SMK TARBIYAH ISLAMIAH', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(42, 42, 'Asnita', 'Wanita', 'Medan,31 Jul 1978', 'Jl.Mangaan 1 lk 6 no 51 Mabar', 'Islam', 'Menikah', '085276278073', 'SMA PAB PANCING', '1271067107780001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(43, 43, 'Astina R', 'Wanita', 'Hutalontung, 11 Jul 1970', 'Jl.Platina 1 Lk.16 Gg.Dahlia Titipapan', 'Kristen', 'Menikah', '082368840613', 'SMA PELITA MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(44, 44, 'Ayub Anuari', 'Pria', 'Purewodadi,07 Jan 1993', 'Jl.Pendawa no 30 Deli Sedang', 'Islam', 'lajang', '081269842105', 'SMA AMALIYAH MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(45, 45, 'Badurahman Bintang', 'Pria', 'Pancuran,26 Okt 1996', 'Jl.mangaan  Gg Bahagia 10', 'Islam', 'Lajang', '082364088239', 'SMK TEKHNIK DAIRI SIDIKALANG', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(46, 46, 'Berisman Nainggolan', 'Pria', 'Medan,08 Nov 1999', 'Jl.Pancing lk 5 Mabar', 'Kristen', 'Lajang', '081264404210', 'SMA MARISI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(47, 47, 'Bernita S', 'Wanita', 'Samosir,11 Apr 1970', 'Jl.RPH Lk 8 no 143 C Mabar', 'Kristen', 'Menikah', '082167523756', 'SMA NAINGGOLAN SAMOSIR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(48, 48, 'Desy F', 'Wanita', 'Medan,06 Agus 1982', 'Jl.Letda Sujono no 1 Bandar Selamat', 'Islam', 'Lajang', '085262778190', 'SMA JAMBI', '1271144608820002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(49, 49, 'Dina Irmayani', 'Wanita', 'Medan,29 Okt 1980', 'Jl.Letda Sujono no 1 Bandar Selamat', 'Islam', 'Lajang', '081375420219', 'SMK NEG 1 MEDAN', '1271146910800001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(50, 50, 'Dini Prisilia Syahfitri', 'Wanita', 'Medan,20 Mar 1997', 'Jl.Pancing gg Pribadi', 'Islam', 'Lajang', '081269721220', 'SMK TRITECH INFORMATIKA', '1271066003970006', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(51, 51, 'Eka Julianti', 'Wanita', 'Patumbak,08 Juli 1979', 'Jl.Mangaan  no 15 lk VI Mabar', 'Islam', 'Menikah', '081376145602', 'SMK SWASTA YPK', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(52, 52, 'Erlinawati Pinem', 'Wanita', 'Gunung Sayang,18 Mei 1971', 'Jl.RPH Lk.7 gg Keramat Mabar', 'Islam', 'Menikah', '085297969063', 'SMA YPEA MABAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(53, 53, 'Eniwati', 'Wanita', 'Mangkebaru,05 Mar 1973', 'Pasar 2 mabar ;lor wisnu lk 12', 'Islam', 'Menikah', '-', 'MADRASAH ALIYAH', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(54, 54, 'Erniati S', 'Wanita', 'Simalungun,15 Des 1972', 'Jl.RPH Lk.9 Gg.Melati no 35 D Mabar', 'Islam', 'Menikah', '-', 'SMP SIANTAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(55, 55, 'Tetty Siahaan', 'Wanita', 'Bahalak,11 Apri 73', 'Jl.Mangaan 1 lk 8 Mabar', 'Kristen', 'Menikah', '081377051224', 'SMP GOTONG ROYONG NAGOJOR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(56, 56, 'Fernando Banjarnahor', 'Pria', 'Bakara Pamonangan, 24 Feb 1999', '', 'Kristen', '', '082275920493', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(57, 57, 'Goki Lamhot', 'Pria', 'Medan,29 Sep 1998', 'Gg.Kramat Mabar', 'Kristen', 'Lajang', '082363179685', 'SMK NEG BINAAN MEDAN', '1272052909980002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(58, 58, 'Gabe Sagala', 'Pria', 'Taput,15 Okt 1973', 'JL.Pancing lk V Kel Mabar Hilir', 'Kristen', 'Menikah', '085362626966', 'SMEA SILOAM', '1271085510730003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(59, 59, 'Hendra Gunawan', 'Pria', 'Medan,02 Septemer 2000', 'Jl.Magaam 3 Lor wisnu', 'Islam', 'Lajang', '085767455361', 'SMA SINAR HUSNI', '1271060209000004', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(60, 60, 'Hendra Sinaga', 'Pria', 'Medan,4 Jun 1997', 'Jl.Platina 4 Gg Dame lk X', 'Kristen', 'Lajang', '081360167234', 'SMK SWASTA BUDI AGUNG', '127106040697009', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(61, 61, 'Herni Yusmanita', 'Wanita', 'Mabar,03 Oktober 1971', 'Mabar Pasar 3 Lorong jaya', 'Islam', 'Menikah', '081260257732', 'SD', '1271064310710001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(62, 62, 'Indri Agustina', 'Wanita', 'Mabar,31 Agust 1997', 'Jl.Mangaan I lk X ', 'Islam', 'Lajang', '087867548651', 'SMK PAB 2 HELVETIA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(63, 63, 'Iqbal', 'Pria', '', '', 'Islam', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(64, 64, 'Iwan Syahputra', 'Pria', 'Medan, 10 Okt 2001', 'JL. RPH Link. Musolah', 'Islam', 'Lajang', '0823-6149-', '', '1271060808010011', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(65, 65, 'Juan Pandiangan', 'Pria', 'Medan,25 Januari 2001', 'Jln.RPH gg Makmur Medan Deli', 'Kristen', 'Lajang', '083166979651', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(66, 66, 'Juni Abroham', 'Wanita', 'Kabanjahe,04 Jun 1994', 'Mabar', 'Kristen', 'Lajang', '082163602325', 'SMP NEG 33 TIGA PANAH', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(67, 67, 'Jumiati', 'Wanita', 'Labuhan Deli,11 Apr 1980', 'Jl.YP Hijau 1 lk 5 gg Kuini Labuhan Deli', 'Islam', 'Menikah', '085262265046', 'SMP N 8 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(68, 68, 'Junaita', 'Wanita', '', '', 'Islam', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(69, 69, 'Lasta Siburian', 'Wanita', 'Tobasa,25 Juli 1967', 'Jl.Mangaan IV lk II Mabar', 'Kristen', 'Menikah', '081362507061', '', '1271066507670006', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(70, 70, 'Leria S', 'Wanita', 'P.Siantar 04 mar 1983', 'Jl.Jaring Udang 1 lk 28 Medan Labuhan', 'Kristen', 'Menikah', '082160134488', 'SMK', '1271134403830003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(71, 71, 'Lina Simare mare', 'Wanita', 'DOLOK MERAWAN,27 Des 78', 'Jl.RPH gg Anugerah ', 'Kristen', 'Menikah', '', 'SMK P.SIANTAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(72, 72, 'Lindawati B', 'Wanita', 'Hutagodang,24 Jun 1971', 'Jl.RPH Lk 5 no 17 A Mabar', 'Islam', 'Menikah', '085227492206', 'SMP', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(73, 73, 'Linghet Wasita', 'Wanita', 'Samosir,31 Agus 1975', 'Jl.Mangaan 1 lk 9 Mabar', 'Kristen', 'Menikah', '081262442176', 'SMP SWSTA SIHOTANG', '1271067108750004', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(74, 74, 'M Yatim', 'Pria', 'Titipapan,29 Jul 1964', 'Jl.yos sudarso lk 4 km  13 no 53 Titipapan', 'Islam', 'Menikah', '087766488837', 'ALIYAH LABUHAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(75, 75, 'Mardiyah', 'Wanita', 'Medan,17 Des 1980', 'Lk.2 Batang Kilat Sei Mati', 'Islam', 'Belum', '085361558440', 'SMK YPK MABAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(76, 76, 'Maria Kristina', 'Wanita', 'Siantar,21 Sep 1977', 'Jl.Mangaan 1 lk 8 Mabar', 'Kristen', 'Menikah', '081370975905', 'SMA SURYA NUSANTARA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(77, 77, 'Mariana', 'Wanita', 'Belawan,05 April 1981', 'Jl.Hidayah lor mawar Belawan Sicanang', 'Islam', 'Menikah', '085261383739', 'SMP NEG 5 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(78, 78, 'Marito S', 'Wanita', 'LumbanTonga,10 Apr 1971', 'Jl.Kawat 3 lk 13 Tj.Mulia Hilir', 'Kristen', 'Menikah', '082166804517', 'SMEA NEG NAINGGOLAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(79, 79, 'Maya', 'Wanita', 'P.Siantar 06 Okt 1970', 'Jl.Rph Lk 7 mabar hilir', 'Islam', 'Menikah', '081260786102', 'SD', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(80, 80, 'Menti', 'Wanita', 'Barus,26 Des 1966', 'Jl.Mangaan 1 lk 6 gg Bahagia Mabar', 'Kristen', 'Menikah', '08126018624', 'SMP N 8 BARUS', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(81, 81, 'Mila Kesumawati', 'Wanita', 'Kotarantang,01 Jan 1980', 'Kampung Keluarga Kel Besar lk 8 Martubung', 'Islam', 'Menikah', '085261257548', 'MTS ', '1207244101800006', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(82, 82, 'Minhawaty S', 'Wanita', 'Buntumauli,22 Jul 1971', 'Jl.Mangaan 1 lk 8 gg Kartini Mabar', 'Kristen', 'Janda', '081376468953', 'SMA TELADAN T.TINGGI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(83, 83, 'Minta Nurhaida', 'Wanita', 'Laras,17 Nov 1974', 'Jl.Kawat 6 gg Musyawarah no 3c tj.Mulia Hilir', 'Kristen', 'Menikah', '-', 'SMA NEG SERBELAWAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(84, 84, 'Misnan', 'Pria', 'Kualalama,19 Okt 1977', 'Pasar 2 Barat Mrelan', 'Islam', 'Menikah', '081362135046', 'SMA PEMBANGUNAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(85, 85, 'Miswan Sularianto', 'Pria', 'Medan,23 Jul 1969', 'Jl.Mangaan I lk XI Mabar', 'Islam', 'Menikah', '082277222176', 'SMP MULIA DARMA', '1271062307690003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(86, 86, 'Monika S', 'Wanita', 'P.Gambar ,02 Agus 1973', 'JL.RPH LK 5 NO 6 Mabar', 'Kristen', 'Menikah', '081376679937', 'SME PEMBANGUNAN GALANG', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(87, 87, 'Muhammad Wahyu', 'Pria', '', '', 'Islam', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(88, 88, 'Nia Febriani Purba', 'Wanita', 'Medan,12 Jul 1997', 'Jl.Mangaan I LK VIII Mabar', 'Kristen', 'Lajang', '085270071108', 'SMA MARISI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(89, 89, 'Nurti S', 'Wanita', 'Sibolga,21 Jan 1971', 'Jl.Mangaan 1 Lk.9 Mabar', 'Kristen', 'Menikah', '081370376290', 'SMEA SIBOLGA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(90, 90, 'Paikem', 'Pria', 'Mabar,20 Apr 1973', 'Jl.RPH lk 10 Mabar Hilir', 'Islam', 'Menikah', '085262379994', 'SMP', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(91, 91, 'Posmaida Panjaitan', 'Wanita', 'P.Siantar, 05 Okt 1965', 'Jl.Tuar Indah 7 Blok 9 no 110 Griya Martubung', 'Kristen', 'Menikah', '081377281526', 'SMK NEG KIMIA MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(92, 92, 'Posmaida Gultom', 'Wanita', 'Batunadua,06 Sep 1995', 'Jl.mangaan I lk 8 Mabar', 'Kristen', 'Lajang', '082304472908', 'SMA GUNUNG KARMER', '1202136812940001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(93, 93, 'Ranti Bunga Saragih', 'Wanita', 'Banua,11 Apr 1976', 'Jl.Mangaan 1 Lk.11 Mabar', 'Kristen', 'Menikah', '085276987842', 'SMAN SERIBUDOLOK', '1271065104760003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(94, 94, 'Rasmiani Purba', 'Wanita', 'Belawan,11 Okt 1972', 'Jl.Platina 4 Lk.10 Gg Cinta Dame Titi Papan', 'Kristen', 'Menikah', '081265785340', 'SMA NEG SINDARAYA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(95, 95, 'Rasmida Tionar S', 'Wanita', 'L.Tolong 14 Jun 1975', 'Jl.Mangaan I lk XI Mabar', 'Kristen', 'Menikah', '-', 'SD', '1271065406750005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(96, 96, 'Riana Aruan', 'Wanita', 'Tanjung Balai,18 Sep 1969', 'Jl.Platina V LK XII Titi Papan', 'Kristen', 'Menikah', '-', 'SMP', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(97, 97, 'Ririn Ayu', 'Wanita', 'Mabar,30 Jul 1992', 'Jl.Marelan Lk 21 Rengas Pulau', 'Islam', 'Menikah', '082361576466', 'SMK PAB 2 HELVETIA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(98, 98, 'Risnawati Marpaung', 'Wanita', 'N Tongah,02 Des 1974', 'Jl.Platina 4 Gg.ganti Titi Papan', 'Islam', 'Menikah', '081370154026', 'SMA NEG 2 TEBING TINGGI', '1271134212740005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(99, 99, 'Rohani Sianturi', 'Wanita', 'Medan,05 Jul 1969', 'Jl.Mangaan 1 Lk 8 mabar', 'Kristen', 'Menikah', '', 'SMA LITTONGNIHUTA TAPUT', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(100, 100, 'Rosmerlin Gultom', 'Wanita', 'Ul;unihuta,07 Jan 1974', 'Jl.RPH no 74 Mabar', 'Islam', 'Janda', '-', 'SMA PANGARIBUAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(101, 101, 'Rosdiana Sinurat', 'Wanita', 'Patumbak,01 Mei 1974', 'Jl.pematang pasir Lk.6 Gg Pribadi Tj.Mulia', 'Kristen', 'Menikah', '085362471255', 'SMP N PATUMBAK', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(102, 102, 'Rosdiani Purba', 'Wanita', 'Medan,20 Apr 1971', 'Jl.RPH gg Benteng Lk 5 Mabar', 'Kristen', 'Menikah', '085361685365', 'SMEA TELADAN P.SIANTAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(103, 103, 'Sapri Wahyudi', 'Pria', 'Sukaramai,03 Desember 1994', 'Jl.Platina 3 lk 12 Kel Titi Papan', 'Islam', 'Lajang', '081378571050', 'SMA SEI BEJANGKAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(104, 104, 'Siti Fardiah', 'Wanita', 'Labuhan Deli,27 Mei 1970', 'Jl.P Sinabung lk VIII Bahari', 'Islam', 'Menikah', '082370725208', 'SMP NURANI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(105, 105, 'Siti Sriatun', 'Wanita', 'Belawan,28 Mei 1977', 'Dusun 1 gg Amal Hamparan Perak', 'Islam', 'Menikah', '085262963213', 'SD BELAWAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(106, 106, 'Sri Dewi Wahyuni', 'Wanita', 'Mabar,14 Sept 1978', 'Jl.Mangaan VIII Lk XII Mabar Hilir', 'Islam', 'Menikah', '082370801530', 'SMA SINAR HUSNI', '1271065409780001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(107, 107, 'Sri Suryani', 'Wanita', 'Medan,26 Nov 1976', 'Jl.Mangaan 1 no 25 lk XI Mabar', 'Islam', 'Janda', '081263031445', 'SMA PAB I HELVETIA', '1271066611760002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(108, 108, 'Sumini', 'Wanita', 'Medan,13 Des 1971', 'Jl.Mangaan 3 Lk 12 no 177 mabar', 'Islam', 'Janda', '087867540667', 'SD', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(109, 109, 'Suriani', 'Wanita', 'Sibunga bunga,29 Maret 1988', 'Jl.RPH no 95 lk VII', 'Islam', 'Menikah', '085275655632', 'SMK N 1 P.SIANTAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(110, 110, 'Suryani', 'Wanita', 'Medan,23 Agus 1984', 'Jl.Rph Lk 7 mabar hilir', 'Islam', 'Lajang', '085373454485', 'SMA UTAMA MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(111, 111, 'Susi Fauziah', 'Wanita', 'Medan,28 Sep 1977', 'Jl.Rph Lk 7 mabar hilir', 'Islam', 'Menikah', '081260561626', 'MAN 2 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(112, 112, 'Syailendra', 'Pria', 'Medan,21 April 1993', 'Jl.RPH lk 10 Mabar Hilir', 'Islam', 'Menikah', '-', 'SMK SWA BINA KARYA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(113, 113, 'Tiarma', 'Pria', 'Pahitme,01 Agus 1972', 'lk 2 pajak sore mabar', 'Islam', 'Menikah', '081361459362', 'SMP', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(114, 114, 'Unur Sibarani', 'Pria', 'Lumbanpea,09 Sep 1974', 'Sp.Martubung Rel', 'Kristen', 'Menikah', '081264399317', 'SMA PARSOBURAN', '1271134909740005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(115, 115, 'Wahyu Saputra', 'Pria', 'Medan,04 Jun 1976', 'Jl.Ibrahim UmaR  GG pendidikan no 9 B Medan', 'Islam', 'Menikah', '085277952651', 'MAN 2 MEDAN', '1271180406760002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(116, 116, 'Washil Jihad', 'Pria', 'Titi Papan,08 Nov 1990', 'Jl.Yos Sudarso km 12,5 Lk XI Titi Papan', 'Islam', 'Lajang', '081269245799', 'SMA YASPI LABUHAN DELI', '1271060811900002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(117, 117, 'Yeni Utari', 'Wanita', 'Medan,02 Okt 1998', 'Jl.RPH lk X Mabar', 'Islam', 'Lajang', '085296242057', 'SMK PANGERAN ANTASARI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(118, 118, 'Yenny Mas murni', 'Wanita', 'Bitaya,25 Apr 1990', 'Jl.Mangaan 1 gg sueb', 'Kristen', 'Lajang', '082363328322', 'SMK KRISTEN BNKP', '120404640490005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(119, 119, 'Yesika N', 'Wanita', 'B.Aceh, 20 Agus 1979', 'Jl.Letda Sujono no 1 Bandar Selamat;Kristen', 'Kristen', '085297204376', 'SMK N 6 MEDAN', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(120, 120, 'Ahmad Joki', 'Pria', 'Medan,12 Mei 1990', 'Jl.Benteng gg Syariah lk 5 Mabar Hilir', 'Islam', 'Lajang', '082277587141', 'SMA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(121, 121, 'Anggiat Gultom', 'Pria', 'Batunadua,27 Agust 1996', 'Jl.Mangaan I LK VI Mabar', 'Kristen', 'Lajang', '082165772499', 'SMA AMAL BAKTI', '1202132708960002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(122, 122, 'Deni Anggara', 'Pria', 'Medan,12 Feb 1993', 'Binjai', 'Islam', 'Lajang', '085830632973', 'SMKN 2 BINJAI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(123, 123, 'Fadli Nasution', 'Pria', 'Medan,.17 Mei 1993', 'Jl.Marelan VII gg Nangka ', 'Islam', 'Menikah', '081263810559', 'SMK SWASTA BUDI AGUNG', '1271121705930003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(124, 124, 'Hengki Sulaiman', 'Pria', 'Medan 29 Feb 1992', 'JL.RPH Mabar gg Bersama', 'Islam', 'Lajang', '081350511546', 'STM sinar Husni', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(125, 125, 'Muhammad Fajar', 'Pria', 'Medan,24 Mei 1998', 'Jl.M.Basyir I lk 31', 'Islam', 'Lajang', '085310273584', 'SMK HARAPAN MEKAR', '1271122405980002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(126, 126, 'Prayoga', 'Pria', 'Bulu cina,02 Maret 1994', 'Desa Militan Hamparan Perak', 'Islam', 'Lajang', '081262080935', 'SMA PELITA Bulu cina', '1207240302940006', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(127, 127, 'Riky Pradana', 'Pria', 'Selemak,23 Sept 1999', 'Dusun 2 Desa Selemak Hamparan Perak', 'Islam', 'Lajang', '-', 'SMK TARBIYAH ISLAMIAH', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(128, 128, 'Rozali', 'Pria', 'Sidikalang,30 Agust 1997', 'Jl.Rph Gg .Ginting', 'Kristen', 'Lajang', '081269039001', 'SMK HKBP SIDIKALANG', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(129, 129, 'Safari Dani', 'Pria', 'Medan,05 Agustus 1994', 'Jl.Karya gg Perdamaian lk v', 'Islam', 'Lajang', '82360307574', 'SMKN 1 TEBING TINGGI', '1271050508940002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(130, 130, 'Supratman', 'Pria', 'Kwala Bingai,01 Nov 1984', 'Jl.Kawat  4 Tj,Mulia', 'Islam', 'Menikah', '081265862855', 'SMA STABAT', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(131, 131, 'Yusriadi', 'Pria', 'Medan,03 Jun 1969', 'Jl.Mangaan 1 lk 8 Mabar', 'Islam', 'Menikah', '085370627242', 'SMK SATRIA SIMALUNGUN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(132, 132, 'Dewi Arumtika', 'Wanita', 'Medan,06 Agust 1992', 'Jl.Mangaan VIII lk XVI Lorong Jaya', 'Islam', 'Menikah', '082260755276', 'MADRASAH ALIYAH', '1271064608920006', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(133, 133, 'Dhea Novita', 'Wanita', 'Mabar,02 Nov 1999', 'Jl.Mangaan 8 lk I Mabar Hilir', 'Islam', 'Lajang', '085834968852', 'SMK PAB 2 HELVETIA', '1271064211990002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(134, 134, 'Erpelina', 'Wanita', 'Sarimatondang,14 Jun 1972', 'Jl.kawat 1 GG turi lk 19 Tj.Mulia Hilir', 'Kristen', 'Menikah', '085296431370', 'SMA SIANTAR', '1271205406720003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(135, 135, 'Suhendro', 'Pria', 'Klumpang,15 Jun 1982', 'Jl.mangaan lk IV Mabar Hilr', 'Islam', 'Menikah', '82366437780', 'SMP PAB 11', '1207241506820012', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(136, 136, 'Herna Yuslinda', 'Wanita', 'Mabar,25 Agustus 1973', 'Jl.RPH lk 9 Mabar', 'Islam', 'Menikah', '081393384760', 'SD', '1271066508730002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(137, 137, 'Muliana', 'Pria', 'Medan,20 Nov 1972', 'Jl.Mangaan 6 Lk.15 mabar', 'Islam', 'Menikah', '085262435158', 'SD', '1271066011720002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(138, 138, 'Murti Ningsih', 'Wanita', 'Kebun Kacang,21 Des 1967', 'Jl.Mangaan 1 lk 8 no 105 A mabar', 'Islam', 'Menikah', '081370997751', 'SMA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(139, 139, 'Novianti', 'Wanita', 'Belawan,10 Nov 1983', 'JL rph 110', 'Islam', 'Menikah', '081376074408', 'SMK YASPI LABUHAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(140, 140, 'Nurmawati', 'Wanita', 'T.Papan,06 Apr 1983', 'Jl.Platina Dalam V 46 AA', 'Islam', 'Janda', '[081360070582', 'SMK P.ANTASARI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(141, 141, 'Putra Bakti', 'Pria', 'Medan,07 Jun 1986', 'Jl.Platina 5 lk 12 no 106 Titi papan', 'Islam', 'Menikah', '083197947237', 'STM PAB I', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(142, 142, 'Ramayana Sinaga', 'Pria', 'Medan,18 Februari 1999', 'Jl.Mangaan  I lk 8 Mabar', 'Kristen', 'Lajang', '081271445806', 'SMK MARISI', '1271065802000002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(143, 143, 'Riama M', 'Pria', 'Gebang,05 Sep 1970', 'Jl.Mangaan lk 4 mabar', 'Kristen', 'Menikah', '082365091024', 'SMEA TANJUNG PURA', '1271064509700002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(144, 144, 'Rohunida Sabarni Purba', 'Pria', 'Medan,19 Sep 1967', 'Jl Lumba\"9 Griya Metropolis Blok E 57 Martubung', 'Kristen', 'Menikah', '082361647850', 'SMA NEG 7 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(145, 145, 'Sellah Lanti', 'Wanita', 'MEDAN,07 Oktober 1993', 'jl,Marelan Pasar 4 Barat gg sepakat ', 'Islam', 'Lajang', '081370525092', 'SMA NEG 16 MEDAN', '1271124710930002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(146, 146, 'Suci Salsabillah', 'Wanita', 'Mabar,23 Oktober 1999', 'Jl.RPH gg Sepakat ', 'Islam', 'Lajang', '085358934128', 'SMA LAKS MARTADINATA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(147, 147, 'Sulasmi', 'Wanita', 'Stabat,14 Apr 1972', 'Jl.mangaan I lk 6 Gg Bahagia no 30 Mabar', 'Islam', 'Menikah', '08126382308', 'SMA STABAT', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(148, 148, 'Tika Ardilla', 'Wanita', 'Medan,07 Okt 1996', 'Jl.Mangaan IV lk II Mabar', 'Islam', 'Menikah', '085260710284', 'SMK PAB 2 HELVETIA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(149, 149, 'Aris Purwanto', 'Pria', 'Selemak,06 Apr 1988', 'Dusun 4 Gg.mawar klumpang kampung', 'Islam', 'Menikah', '085761480783', 'SMA N 1 HAMPARAN PERAK', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(150, 150, 'Cindy Alvionita', 'Wanita', 'Kp.Banjar 24 Feb 1999', 'Jl.RPH lk X Mabar', 'Islam', 'Lajang', '083196370072', 'SMK NEG 1 TEBING TINGGI', '1218166402990002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(151, 151, 'Juraidah', 'Wanita', 'Helvetia,02 Jul 1970', 'Jl.RPH Gg.sepakat Mabar', 'Islam', 'Menikah', '082369786231', 'SMA PAB 6', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(152, 152, 'Lismawati', 'Wanita', 'Medan,07 Jun 1977', 'Jl.RPH lk 9 Mabar', 'Islam', 'Menikah', '0823650540967', 'SMK YPK MABAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(153, 153, 'Ruth Money', 'Wanita', 'Medan,16 Okt 1997', 'Jl.RPH gg Bersama no 248', 'Kristen', 'Lajang', '082166792125', 'SMK YAPIM', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(154, 154, 'Sri Maya', 'Wanita', 'Medan,18 Feb 1977', 'Jl.Pancing lk 5 Mabar', 'Islam', 'Menikah', '', 'SD', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(155, 155, 'Sumiani', 'Wanita', 'Mabar,21 Jan 1971', 'Jl.mangaan I lk 6 Gg Bahagia no 30 Mabar', 'Islam', 'Menikah', '085370627242', 'SD', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(156, 156, 'Sukarni', 'Wanita', 'Asahan,06 Sep 1971', 'Jl.RPH gg Pribadi lk 9 Mabar', 'Islam', 'Janda', '082370066473', 'SMA SIANTAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(157, 157, 'Trisnawaty', 'Wanita', 'Mabar,30 Nov 1975', 'Jl.Mangaan I lk 6 Mabar', 'Islam', 'Menikah', '087867276261', 'SMP', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(158, 158, 'Waini', 'Wanita', 'Mabar,01 Jan 1972', 'Jl.Mangaan 8 lk 1 no 86 Mabar Hilir', 'Islam', 'Menikah', '085373126773', 'SD', '1271064101720016', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(159, 159, 'Ernauli Sitorus', 'Wanita', 'DolokMasihul,26 Mei 1969', 'JL.RPH Gg Amal', 'Kristen', 'Menikah', '082160686133', 'SMA TEBING TINGGI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(160, 160, 'Gustina', 'Wanita', 'Medan,16 Agus 1968', 'Jl.RPH lk 7 Mabar', 'Islam', 'Menikah', '081284368433', 'SMA YPEA MABAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(161, 161, 'Halimah', 'Wanita', 'Belawan,12 Apr 1974', 'Lk.20 Rengas Pulau Medan Marelan', 'Islam', 'Menikah', '-', 'SMP', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(162, 162, 'Hermawati', 'Wanita', 'Cinta Raja,23 Mar 1973', 'lk 8 gg jagung pasar 4 Marelan', 'Islam', 'Menikah', '085296424488', 'SMA N STABAT', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(163, 163, 'Listasari', 'Wanita', 'Medan,09 Jan 1969', 'Jl.RPH Gg Family lk 6 Mabar', 'Islam', 'Menikah', '082369031569', 'SMEA N 3 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(164, 164, 'Mariani', 'Wanita', 'Medan,26 Mar 1981', 'Jl.Mangaan 3 lk 12 lor Rahayu Mabar', 'Islam', 'Menikah', '085371723623', 'SMP MABAR', '1271066603810005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(165, 165, 'Nana Asnita', 'Wanita', 'Mabar,26 Okt 1974', 'Jl.RPH Mabar', 'Islam', 'Menikah', '082362005990', 'SMA LAKS MARTADINATA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(166, 166, 'Nurlina', 'Wanita', 'Medan,28 Apr 1984', 'Jl.RPH lk 9 Mabar', 'Islam', 'Menikah', '081370794667', 'SMP BUDI AGUNG', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(167, 167, 'Nurhaini Hutahayan', 'Wanita', 'Tebing tinggi,23 Mei 1969', 'Tanjung Mulia gg banten', 'Kristen', 'Menikah', '082160771600', 'SMA BATANG TORU', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(168, 168, 'Rosmawati', 'Wanita', 'Belawan,26 Sep 1970', 'Jl.RPH lk 9 Mabar', 'Islam', 'Menikah', '085371527246', 'SMP', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(169, 169, 'Sri Rahayu Ningsih', 'Wanita', 'Medan,05 Mar 1972', 'Lk XII Titi Papan', 'Islam', 'Menikah', '082164245151', 'SMP PAB 6  L.PAKAM', '1271064503720006', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(170, 170, 'Suningsih', 'Wanita', 'Medan,13 Sep 1970', 'Jl.Rawe 4 lk 6 kel Tangkahan Medan Labuhan', 'Islam', 'Menikah', '085371323536', 'SMP', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(171, 171, 'Supri Yandika', 'Pria', 'Medan,04 Sep 1988', 'Jl.RPH lk 7 no 80 Mabar', 'Islam', 'Menikah', '085358995102', 'SMA PAB MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(172, 172, 'Andre Hidayat', 'Pria', '', '', 'Islam', '', '082368592357', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(173, 173, 'Agusman Z', 'Pria', 'Medan,19 Agus 1990', 'lk 3 Pekan labuhan', 'Kristen', 'Menikah', '083197789896', 'SMK EKA PRASETYA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(174, 174, 'Coki Bakkara', 'Pria', 'Medan,17 Agust 1997', 'Jl.RPH lk V no 6 Mabar Medan', 'Kristen', 'Lajang', '082165573019', 'SMA LAKS MARTADINATA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(175, 175, 'Halasan S', 'Pria', 'Belawan,17 Des 1971', 'Jl.Platina 4 Lk.10 Gg Cinta Dame Titi Papan', 'Kristen', 'Menikah', '081265785340', 'SMA N SERIBUDOLOK', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(176, 176, 'Lambok W T', 'Pria', 'Balige,14 Des 1973', 'Jl.RPH lk 5 Gg amal 3 mabar hilir', 'Kristen', 'Menikah', '', 'SMA TELADAN P.SIANTAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(177, 177, 'Rizky Mulia', 'Pria', 'Korajim,02 Jul 1993', 'gg Sepakat Mabar', 'Islam', 'Menikah', '-', 'STM TAMAN SISWA ', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(178, 178, 'Abdullah Ismail', 'Pria', 'Mabar,30 Mei 1993', 'Jl.Pancing 1 gg Manggis Martubung', 'Islam', 'Belum', '85761872926', 'SMK AL FATTAH', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(179, 179, 'Budi Kurniawan', 'Pria', 'Mabar,08 Okt 1985', 'Jl.Mangaan 3 lk 12 lor purnawirawan Mabar', 'Islam', 'Menikah', '081266877921', 'SMK BINAKARYA', '1271060810850003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(180, 180, 'Endang Hartati', 'Wanita', 'Medan,23 Jul 1967', 'Jl.Bersama', 'Islam', 'Menikah', '082360708883', 'SMEA PAB', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(181, 181, 'Evita Sari', 'Wanita', 'Tg.Mulia 12 Okt 1997', 'Jl.Kayu Putih gg Karya', 'Islam', 'Lajang', '0895611103341', 'SMK LAKS MARTADINATA', '1271065011970002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(182, 182, 'Fahmi Andrian', 'Pria', 'Perbaungan,12 Jun 1994', 'Jl.Selar lk 12 Belawan Bahagia', 'Islam', 'Menikah', '85761554537', 'SMK MULTIKARYA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(183, 183, 'Farida Hanum', 'Wanita', 'Medan,23 Nov 1982', 'Jl.Pancing 1 lk 4 Gg.Manggis no 133 Martubung', 'Islam', 'Menikah', '085277072962', 'SMK LAKS MARTADINATA', '1271136311820001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(184, 184, 'Helnivia Simamora', 'Wanita', 'Medan,16 Okt 1994', 'Jl.Kawat I LK XIX gg.Turi', 'Kristen', 'Lajang', '081375688182', 'SMK MARISI', '1271205610940004', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(185, 185, 'Maslina Bagariang', 'Wanita', 'Tarutung,13 Feb 1993', 'Jl.RPH Mabar', 'Kristen', 'Lajang', '085277978526', 'SMA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(186, 186, 'Melda Falentina Nainggolan', 'Wanita', 'Medan,14 Feb 1998', 'JL.Pancing lk V Kel Mabar Hilir', 'Kristen', 'Lajang', '085260212743', 'SMA BINA KARYA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(187, 187, 'Nesti Sriyani', 'Wanita', 'T.Mulia 16 Agus 1975', 'Jl.Kayu Putih lk 10 gg Karya no 21 T.Mulia', 'Islam', 'Menikah', '082370064262', 'SMA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(188, 188, 'Norti P', 'Wanita', 'Kaban Tengah,01 Sep 1974', 'Jl.RPH lk 7 Mabar', 'Kristen', 'Menikah', '085275609762', 'SMP SIDIKALANG', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(189, 189, 'Panji Syahputra', 'Pria', 'Medan,15 Nov 1991', 'Jl.Pancing V lk II', 'Islam', 'Menikah', '082166244124', 'SMK SINAR HUSNI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(190, 190, 'Pattianur Lubis', 'Pria', 'Natal,30 Apr 1982', 'Martubung,blok 11 tuar 1 no 75', 'Islam', 'Janda', '082169781404', 'SMP SIBOLGA', '1221077004820001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(191, 191, 'Ratna Sari', 'Wanita', 'Selemak,02 Maret 1998', 'Dusun II Jl.Jalaludin desa Selemak', 'Islam', 'Lajang', '082363556090', 'MA ISLAMIYAH HAMPARAN PERAK', '1207246203980004', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(192, 192, 'Rini Nilmia Andriani', 'Wanita', 'Medan,30 Mei 1995', 'Jl.RPH lk 7 Pasar 1 Mabar Medan deli', 'Islam', 'Menikah', '087887378028', 'SMK SWASTA PAB HELVETIA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(193, 193, 'Rio Rifaldi', 'Pria', 'Tanjung Parapat,20 Jan 1999', 'Jl.Mangaan 1 no 105 lk VIII', 'Islam', 'Lajang', '082273895435', 'SMK SWASTA SERBELAWAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(194, 194, 'Risnawaty', 'Wanita', 'Medan,05 Jul 1983', 'Jl.Marelan GG Safari', 'Islam', 'Janda', '-', 'SMA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(195, 195, 'Ryan', 'Pria', 'Kuala Simpang,08 Jun 1993', 'Mabar', 'Islam', 'Lajang', '085206134393', 'SMA ACEH TAMIANG', '1116060806930002', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(196, 196, 'Syahrial Prasetia', 'Pria', 'Medan,01 Mei 2000', 'Jln.Rawe VII lk IX Medan Labuhan', 'Islam', 'Lajang', '082176492941', 'SMK PAB I HELVETIA', '1271130105000006', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(197, 197, 'Sri Agustina Siregar', 'Wanita', 'Medan,20 Agust 1997', 'Mabar', 'Kristen', 'Lajang', '082274025255', 'SMK MARISI', '1271136008970001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(198, 198, 'Sri Wahyuni', 'Wanita', 'Medan,05 Apr 1984', 'Jl.Mangaan IV lk II Mabar', 'Islam', 'Janda', '085761739084', 'SMP', '1271064504840006', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(199, 199, 'Supandy', 'Pria', 'Medan,16 Agus 1967', 'Jl.Kawat 3 Gg.Bersama no 37 A tj.mulia', 'Islam', 'Menikah', '082364789847', 'SMA IKIP SIANTAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(200, 200, 'Sutrisno II', 'Pria', '', '', 'Islam', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(201, 201, 'Lili Harjanti', 'Wanita', 'Medan,07 Jan 1987', 'Jl.Platina 5 lk 12 Gg Kenangan Titipapan', 'Islam', 'Belum', '081264679324', 'SMA LAKS MARTADINATA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(202, 202, 'Suraida', 'Wanita', '', '', 'Islam', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(203, 203, 'Abdul Kadim', 'Pria', 'H.Perak 12 Sep 1972', 'Dusun 1 gg Amal Hamparan Perak', 'Islam', 'Menikah', '085262963213', 'SMA PGRI 12 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(204, 204, 'Alwan Paradis', 'Pria', 'Medan,28 Apr 1990', 'Jl.Datuk Rubiah lk 28 Medan Marelan', 'Islam', 'Lajang', '081260267244', 'SMK SINAR HUSNI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(205, 205, 'Agus Salim 2', 'Pria', 'Klumpang,27 Agust 1986', 'Hamparan Perak', 'Islam', 'Menikah', '082362032993', 'SMA BINA KARYA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(206, 206, 'Antoni Panjaitan', 'Pria', 'Medan,17 April 1997', 'Jl.Mangaan 1 gg sepakat', 'Kristen', 'Lajang', '081375450612', 'SMK SILAOM I MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(207, 207, 'Azhar Nugraha', 'Pria', 'Medan, 19 Mar 1987', 'Jl. Mangaan I Mabar I', 'Islam', 'Lajang', '08526640862', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(208, 208, 'Bagus Susilo', 'Pria', 'Medan,01 jan 1970', 'Jl.Putri Hijau Medan Barat', 'Islam', 'Menikah', '081260318960', 'SMA TUGAMA MEDAN', '1271040110170008', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(209, 209, 'Candra ', 'Pria', 'Medan,12 Jun 1982', 'Jl.Platina V LK XII Titi Papan', 'Islam', 'Menikah', '082363248476', 'SMK SINAR HUSNI', '1271061206820008', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(210, 210, 'Edison Bintang', 'Pria', 'S.Kalang,24 Feb 1994', 'Pasar 2 Mabar', 'Kristen', 'Lajang', '085359729828', 'SMA SIDIKALANG', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(211, 211, 'Eduard Siagian', 'Pria', 'Medan,14 Des 1998', 'jl.mangaan 3 lk 10', 'Kristen', 'Lajang', '081375450874', 'SMK MARKUS 2 ', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(212, 212, 'Febri Handa Simangunsong', 'Wanita', 'Belawan,23 Des 1998', 'Jl.Platina IV gg Cinta Dame Titi Papan', 'Kristen', 'Lajang', '', 'SMA', '1271082312980005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(213, 213, 'Feri Yohanes', 'Pria', 'Aek Nabara,11 Jan 1994', 'Bahgagia 10 Mabar', 'Kristen', 'Lajang', '082165306872', 'SMK YAPIM ', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(214, 214, 'Gabariel S', 'Pria', 'Kota Tua,20 Okt 1963', 'Jl.Kawat 3 GG.Mekar 5 lk 22 Tj.Mulia', 'Kristen', 'Menikah', '081264128894', 'SMA TAPSEL', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(215, 215, 'Gokdo Marbun', 'Pria', 'Barus,18 Agust 1995', 'Jl.Mangaan I Mabar', 'Kristen', 'Lajang', '081299693125', 'SMA NEG I ANDAM DEWI', '1276021808950001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(216, 216, 'Guruh Erra Bayu', 'Pria', 'Medan,06 Mar 1985', 'Jl.Jemadi gg Gembira no 21', 'Islam', 'Menikah', '082162128043', 'SMK NEG 1 PERCUT', '12771200603850004', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(217, 217, 'Hantus Pangtgabean', 'Pria', 'Simason,18 Nov 1975', 'JL.Bahagia 10 Mabar', 'Kristen', 'Menikah', '082160719199', 'SMP NEG PAHAE TAPUT', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(218, 218, 'Imanuel S', 'Pria', 'Kp.Tengah,29 Jul 1966', 'Jl.Mangaan 1 lk.8 Gg.akur no 48 E Mabar', 'Kristen', 'Menikah', '081361196641', 'SPG KATOLIK DELI MURNI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(219, 219, 'Johnni S', 'Pria', 'L.Pakam 23 Nov 1972', 'Jl.kawat III ujung gg Mekar 2', 'Kristen', 'Menikah', '081262085300', 'STM NEG L.PAKAM', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(220, 220, 'Jon Apriadi', 'Pria', 'Palembang/12 Apr 1971', 'Jl. Kapt. Rahmad Budin Lk. 08 Psr. V Marelan', 'Islam', 'Menikah', '085361679253', '', '1271061204710000', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(221, 221, 'Jon Winson Saragih', 'Pria', 'Buah Bolon,10 Apr 1976', 'Jl.RPH Mabar', 'Kristen', 'Menikah', '082361647850', 'SMA NEGERI RAYA', '1271061004760003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(222, 222, 'Lian Sinaga', 'Wanita', 'Medan,08 Agust 1996', 'Jl.PANTAI Timur Binjai', 'Kristen', 'Lajang', '082363310850', 'SMK MARISI', '1271020808960005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(223, 223, 'Maulana Ikhsan', 'Pria', 'Langsa,24 Okt 1994', 'Lau Dendang gg Anggrek Merah 5', 'Islam', 'Lajang', '085358717176', 'SMA TAMANSISWA ', '1218162410940001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(224, 224, 'Nanda Pratama', 'Pria', 'Medan,18 Februari 1998', 'Jl.Kawat III Tanjung Mulia Hilir', 'Islam', 'Lajang', '085361964464', 'SMK PAB 1', '1271061802980005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(225, 225, 'Razali', 'Pria', 'Belawan,06 Jan 1965', 'Jl.Stasiun c4 no 7 Belawan ', 'Islam', 'Menikah', '085275517171', 'SMA N LABUHAN DELI', '127108081650001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(226, 226, 'Roy Nando Sihombing', 'Pria', '', '', 'Kristen', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(227, 227, 'Simon Nainggolan', 'Pria', 'Medan,24 Nov 1990', 'Jl.Letda Sujono no 1 Bandar Selamat', 'Kristen', 'Lajang', '085213691379', 'SMA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(228, 228, 'Siswadi', 'Pria', 'Sampali.30 Sep 1971', 'Jl.Anugerah no 23 Sampali', 'Islam', 'Menikah', '08230440615', 'SMA SAMPALI', '1207263009710003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(229, 229, 'Sukamdi', 'Pria', 'Medan,25 Feb 1975', 'Pasar III Marelan', 'Islam', 'Menikah', '085207347610', 'SD', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(230, 230, 'Suriadi', 'Pria', 'Medan,18 Sept 1978', 'Jl.Sido mulyo no 37', 'Islam', 'Menikah', '-', 'STM SUTAN OLOAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(231, 231, 'Syaripin', 'Pria', 'B.Kuis,13 Agust 1968', 'Desa Percut dusun 7', 'Islam', 'Menikah', '085275748396', 'SMEA NEG 2 MEDAN', '12072613086800009', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(232, 232, 'Ade Arif', 'Pria', 'Medan,05 Agust 1988', 'Jl.RPH lk III', 'Islam', 'Menikah', '081260431898', 'SMA SINAR HUSNI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(233, 233, 'Ade Maisyarah', 'Pria', 'Medan,15 Mar 1988', 'Jl.RPH no 30 Mabar', 'Islam', 'Menikah', '082360708883', 'SMK BUDI AGUNG', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(234, 234, 'Ayu Lestari', 'Wanita', 'Korajim,27 Mei 2000', 'Jl.RPH Mabar lk X', 'Islam', 'Lajang', '081262416104', 'smk neg 1 t.timggi', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(235, 235, 'Eka Safitri', 'Wanita', 'Medan,02 Januari 1992', 'Jl.Pancing n0 47 Mabar Hilir', 'Islam', 'Janda', '', 'SMA BINA KARYA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(236, 236, 'Elva Susanti', 'Wanita', 'Medan,23 Sep 1976', 'Jl.RPH Mabar Hilir gg Bersama ', 'Islam', 'Janda', '-', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(237, 237, 'Ester Windu Lumban Raja', 'Wanita', 'Belawan, 09 Agust 1987', 'Jl. Pulau Ternate, Belawan', 'Kristen', '', '085275833190', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(238, 238, 'Hasanuddin', 'Pria', 'Selemak,18 Jan 1967', 'Jl.Jalaudin Dusun 2 Hamparan perak', 'Islam', 'Menikah', '081269392739', 'SD', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(239, 239, 'Henny Hajarini', 'Wanita', 'Medan,23 ju;l 1988', 'Jl.Aluminium 4 gg tawon', 'Islam', 'Menikah', '-', 'SMA KRAKATAU ', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(240, 240, 'Heru', 'Pria', 'Mabar,05 Mar 1988', 'Jl.Mangaan 1 lk 11 gg Kelinci', 'Islam', 'Menikah', '-', 'SMK SINAR HUSNI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(241, 241, 'Husin', 'Pria', 'Medan,01 Apr 1999', 'Jl.Kawat v lk XI Tanjung Mulia Hilir', 'Islam', 'Lajang', '085361088300', 'SMK SINAR HUSNI', '1271060104990003', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(242, 242, 'Ibnu Andrian', 'Pria', 'Medan,04 Jul 1998', 'Jl.Pancing I Martubung', 'Islam', 'Lajang', '082186936507', 'MAN 4 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(243, 243, 'Ika Lafenia Sembiring', 'Wanita', '', '', 'Kristen', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(244, 244, 'Iqbal Wahyudi', 'Pria', '', '', 'Islam', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(245, 245, 'Juni Triana', 'Wanita', 'Medan,24 Jun 77', 'Jl.Rawe 4 pasar 6 lk Martubung', 'Islam', 'Menikah', '081368000244', 'SMEA SINAR HUSNI', '1271126406760001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(246, 246, 'M.Frayuda', 'Pria', 'Medan,25 Jun 1997', 'Jl.Pancing I lk IV Martubung', 'Islam', 'Lajang', '085837693196', 'SMK BUDI AGUNG', '1271132506970005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(247, 247, 'M.Nugraha', 'Pria', 'Meda,17 Sep 1997', 'Gg.Manggis Lk 4 Medan Labuhan', 'Islam', 'Lajang', '082167340430', 'SMK NEG 13 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(248, 248, 'Meslam', 'Pria', 'Cimodong,05 Sep 1968', 'Pasar I Mabar Gg.Kelinci', 'Islam', 'Menikah', '081284368433', 'SMA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(249, 249, 'Nani Purwanti', 'Wanita', 'Klumpang,07 Nov 1983', 'Dusun II,Jl.Jalaudin Hamparan Perak', 'Islam', 'Menikah', '', 'SMA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(250, 250, 'Putra Nova', 'Pria', 'Medan,17 Nov 1990', 'JL.RPH Mabar gg Bersama', 'Islam', 'Lajang', '082216282954', 'STM PAB', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(251, 251, 'Putri Windari', 'Wanita', 'Medan,16 Desember 2000', 'Jl.RPH gg Mushollah lk IX Mabar', 'Islam', 'Lajang', '089690462190', 'SMA BINA KARYA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(252, 252, 'Ramayani', 'Wanita', 'Medan,11 Feb 1985', 'Dusun VII Jl.Bambu Helvetia', 'Islam', 'Menikah', '081376292057', 'SMA LAKS MARTADINATA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(253, 253, 'Ranita', 'Wanita', 'Medan,08 Feb 1978', 'Jl.Mangaan I lk VI Mabar', 'Islam', 'Menikah', '-', 'SD', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(254, 254, 'Rina Astuti', 'Wanita', 'Belawan,14 Des 1982', 'P.Sicanang blok 23', 'Islam', 'Menikah', '081339881613', 'SMK HARAPAN MEKAR', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(255, 255, 'Rusdiono', 'Pria', 'Medan,27 Agust 1974', 'Jl.Pancing I lk 4 gg manggis', 'Islam', 'Menikah', '082367703480', 'SMP ALWASLIYAH', '1271132708740001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(256, 256, 'Rusmiati', 'Wanita', 'Tanjung Beringin,28 Apr 1973', 'Mabar pasar 1 lk 7 ', 'Islam', 'Menikah', '-', 'SMP N 22 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(257, 257, 'Saridin', 'Pria', 'Sampali.30 Sep 1971', 'Jl.Mangaan I lk x Mabar', 'Islam', 'Menikah', '082369786231', 'SMP', '1207260107710007', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(258, 258, 'Sehati Girsang', 'Pria', 'Lumban Situngkir,24 Mar 78', 'Jl.Benteng gg Syariah lk 5 Mabar Hilir', 'Kristen', 'Menikah', '', 'SMK ADVEN SUMBUL', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(259, 259, 'Sri Utami', 'Wanita', 'Medan,17 Feb 1973', 'Jl.Mangaan I Gg Bahagia I lk 19', 'Islam', 'Menikah', '082168717624', 'SMEA YPK MABAR', '1271065702730001', '2020-10-05 17:05:44', '2020-10-05 10:05:44');
INSERT INTO `tbl_infokaryawan` (`id`, `id_karyawan`, `nama`, `jenis_kelamin`, `ttl`, `alamat`, `agama`, `status_nikah`, `no_hp`, `pendidikan`, `nik`, `waktudibuat`, `terakhirdiubah`) VALUES
(260, 260, 'Suhelmi', 'Pria', 'Tanjung Mulia,24 Jun 1975', 'Jl.kayu Putih lk X Tanjung Mulia Hilir', 'Islam', 'Menikah', '085358771585', 'SD', '12710664067500007', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(261, 261, 'Sutrisno', 'Pria', '', '', 'Islam', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(262, 262, 'Tawang Sri Rahayu', 'Pria', 'Medan,08 Mar 1986', 'Jl.Pasar I Mabar', 'Islam', 'Menikah', '081333256294', 'SMK BINA KARYA', '1271064803860005', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(263, 263, 'Tekun Situmorang', 'Pria', 'Lae Kumbi, 28 Okt 1994', 'Jl. Suryadi Psr. IV Mabar', 'Kristen', '', '081377312458', 'SMK NEGERI 2 TEBING TINGGI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(264, 264, 'Tengku Elfin', 'Pria', 'Denai Sarang Burung,21 Jul 1991', 'Dusun I Denai Sarang Burung Pantai Labu', 'Islam', 'Menikah', '-', 'SMK II SINAR HARAPAN', '1207322107910001', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(265, 265, 'Tiop Sihol  Gultom ', 'Pria', 'Lontung,28 Des 1990', 'Jl.Mangaan 1 lk 8 gg Kartini Mabar', 'Kristen', 'Menikah', '082363482943', 'SMA TAPUT', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(266, 266, 'Tuti Wardani', 'Wanita', 'Kebun Kacang,24 Feb 1977', 'Jl.Mangaan 4 Lk,2 mabar', 'Islam', 'Menikah', '085261322701', 'SMA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(267, 267, 'Yurilin Evida Butar Butar', 'Wanita', 'Medan,05 Mei 1999', 'Jl.Tuar INDah VII no 110 Griya Martubung', 'Kristen', 'Lajang', '-', 'SMA YAPIM MABAR', '1271134505990006', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(268, 268, 'Uci Angelina Siahaan', 'Wanita', 'Mabar,10 Agust 1997', 'Jl.mangaan 1 lk 8 Mabar', 'Kristen', 'Lajang', '081269107141', 'SMA MARISI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(269, 269, 'Vetty Handayani', 'Wanita', 'Medan,31 Des 1996', 'JL.Chaidir Kel Nelayan Indah', 'Islam', 'Belum', '082161053581', 'SMK SUTAN OLOAN MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(270, 270, 'Vinka', 'Wanita', 'Medan,23 Februari 1999', 'Jl.Rawe IV lk VI kel Tangkahan', 'Islam', 'Lajang', '08956012183337', 'SMK PAB 2 HELVETIA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(271, 271, 'Imam Nurhaidi', 'Pria', 'Medan,02 Feb 1992', 'Jl.Pancing 1 gg Mesjid martubung', 'Islam', 'Lajang', '081370980515', 'SMK N 5 MEDAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(272, 272, 'Mamuda', 'Pria', 'Batubara,31 Des 1983', 'Marelan Pasar II', 'Islam', 'Menikah', '-', 'SMP', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(273, 273, 'M Irpan', 'Pria', 'Medan,02 Jun 1991', 'Mabar', 'Islam', 'Lajang', '081396117119', 'SMA SINAR HUSNI', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(274, 274, 'M. Agung Mardika Putra', 'Pria', '', '', 'Islam', '', '', '', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(275, 275, 'Mustofha', 'Pria', 'Matondang,10 Feb 1991', 'Marelan Pasar II', 'Islam', 'Menikah', '-', 'MTS ALHAKIMIAH', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(276, 276, 'Razali', 'Pria', 'Pantaicermin,25 Jul 1978', 'Jl.RPH lk 5 gg Bahagia 2', 'Islam', 'Menikah', '085277316223', 'SMK MUSDAH PERBAUNGAN', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44'),
(277, 277, 'Sabam', 'Pria', 'Desa durian,10 Nov 1971', 'gg Amal', 'Kristen', 'Menikah', '-', 'SMA NEG TANJUNG MORAWA', '', '2020-10-05 17:05:44', '2020-10-05 10:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_infokaryawan_res`
--

CREATE TABLE `tbl_infokaryawan_res` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `badge` varchar(10) NOT NULL,
  `tgl_masukkerja` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `status_nikah` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `waktudibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_infokaryawan_res`
--

INSERT INTO `tbl_infokaryawan_res` (`id_karyawan`, `nama`, `bagian`, `badge`, `tgl_masukkerja`, `jenis_kelamin`, `ttl`, `alamat`, `agama`, `status_nikah`, `no_hp`, `pendidikan`, `nik`, `waktudibuat`) VALUES
(282, 'Santa Eria M. Silitonga', 'CL - III', '999', '2020-10-19', 'Wanita', 'Medan, 19 Oktober 1985', 'Jonggol', 'Kristen', 'Lajang', '081212121212', 'SMA PAB 1', '', '2020-10-19 14:41:54'),
(283, 'Siti Rahma', 'Sablon', '998', '2020-10-19', 'Wanita', 'Medan 19 Oktober 1985', 'Mabar', 'Islam', 'Menikah', '081212121212', 'SMA', '', '2020-10-19 16:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masterkaryawan`
--

CREATE TABLE `tbl_masterkaryawan` (
  `id_karyawan` int(11) NOT NULL,
  `tgl_masukkerja` date NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `badge` varchar(10) NOT NULL,
  `status` varchar(25) NOT NULL,
  `waktudibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `terakhirdiubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_masterkaryawan`
--

INSERT INTO `tbl_masterkaryawan` (`id_karyawan`, `tgl_masukkerja`, `bagian`, `badge`, `status`, `waktudibuat`, `terakhirdiubah`) VALUES
(1, '2017-11-22', 'B-Film', '173', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(2, '2018-01-09', 'B-Film', '027', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(3, '2017-11-22', 'B-Film', '152', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(4, '2014-03-14', 'B-Film', '029', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(5, '2019-01-08', 'B-Film', '049', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(6, '2019-04-26', 'B-Film', '032', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(7, '2014-12-18', 'B-Film', '240', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(8, '2007-03-22', 'B-Film', '088', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(9, '2019-02-20', 'B-Film', '224', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(10, '2006-10-16', 'B-Film', '041', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(11, '2018-08-07', 'B-Film', '260', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(12, '2015-05-06', 'B-Film', '150', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(13, '2019-11-28', 'Bengkel', '166', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(14, '2016-01-16', 'Bengkel', '253', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(15, '2012-07-03', 'Bengkel', '092', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(16, '2016-06-03', 'Bengkel', '156', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(17, '2014-09-18', 'Bengkel', '025', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(18, '2020-07-02', 'Bengkel', '222', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(19, '2009-10-05', 'Bengkel', '072', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(20, '2010-02-23', 'Bengkel', '085', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(21, '2018-08-26', 'Bengkel', '287', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(22, '2009-02-23', 'Boker', '146', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(23, '2016-03-19', 'Boker', '271', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(24, '2018-03-06', 'Boker', '', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(25, '2013-10-28', 'Boker', '266', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(26, '2014-01-22', 'Boker', '018', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(27, '2015-10-05', 'Boker', '149', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(28, '2014-10-13', 'Boker', '75', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(29, '2018-06-26', 'Boker', '312', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(30, '2019-05-10', 'Boker', '203', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(31, '2019-06-25', 'Boker', '133', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(32, '2007-06-18', 'Boker', '147', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(33, '2014-12-07', 'Clean', '030', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(34, '2019-06-27', 'Clean', '', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(35, '2017-03-16', 'Clean', '307', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(36, '2007-11-27', 'Clean', '124', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(37, '0000-00-00', 'Clean', '', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(38, '2015-10-26', 'CL - III', '143', 'Aktif', '2020-10-13 13:46:26', '2020-10-14 13:23:42'),
(39, '2017-07-12', 'CL - III', '44', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(40, '2017-04-05', 'CL - III', '053', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(41, '2017-02-10', 'CL - III', '299', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(42, '2007-03-12', 'CL - III', '011', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(43, '2008-06-02', 'CL - III', '208', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(44, '2014-01-09', 'CL - III', '006', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(45, '2017-04-03', 'CL - III', '223', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(46, '0000-00-00', 'CL - III', '066', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(47, '2012-02-14', 'CL - III', '165', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(48, '2011-08-03', 'CL - III', '019', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(49, '2007-04-24', 'CL - III', '110', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(50, '2017-03-10', 'CL - III', '148', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(51, '2019-09-05', 'CL - III', '87', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(52, '2009-06-28', 'CL - III', '111', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(53, '2006-07-27', 'CL - III', '288', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(54, '2008-06-02', 'CL - III', '119', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(55, '2016-01-12', 'CL - III', '262', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(56, '2018-03-21', 'CL - III', '', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(57, '2018-07-02', 'CL - III', '213', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(58, '2011-12-05', 'CL - III', '219', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(59, '2018-06-22', 'CL - III', '127', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(60, '2016-08-05', 'CL - III', '225', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(61, '2018-05-22', 'CL - III', '255', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(62, '2015-06-29', 'CL - III', '174', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(63, '2014-05-07', 'CL - III', '026', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(64, '2019-05-14', 'CL - III', '271', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(65, '2019-11-21', 'CL - III', '020', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(66, '2015-01-12', 'CL - III', '007', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(67, '2011-11-28', 'CL - III', '217', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(68, '2018-09-06', 'CL - III', '161', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(69, '2015-07-08', 'CL - III', '051', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(70, '2011-12-05', 'CL - III', '230', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(71, '2015-09-22', 'CL - III', '125', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(72, '2010-12-28', 'CL - III', '179', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(73, '2010-12-28', 'CL - III', '177', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(74, '2010-03-29', 'CL - III', '180', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(75, '2018-10-10', 'CL - III', '264', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(76, '2011-11-28', 'CL - III', '214', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(77, '2008-06-12', 'CL - III', '241', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(78, '2011-11-28', 'CL - III', '178', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(79, '2009-03-02', 'CL - III', '259', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(80, '2012-09-26', 'CL - III', '077', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(81, '2009-08-31', 'CL - III', '242', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(82, '2008-06-02', 'CL - III', '215', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(83, '2011-12-05', 'CL - III', '220', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(84, '2007-05-28', 'CL - III', '126', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(85, '2016-04-20', 'CL - III', '274', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(86, '2010-11-15', 'CL - III', '160', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(87, '2018-04-25', 'CL - III', '285', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(88, '2015-06-29', 'CL - III', '065', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(89, '2008-06-16', 'CL - III', '244', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(90, '2007-04-24', 'CL - III', '109', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(91, '2007-06-25', 'CL - III', '159', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(92, '2015-10-21', 'CL - III', '81', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(93, '2013-05-27', 'CL - III', '169', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(94, '2012-01-16', 'CL - III', '076', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(95, '2016-01-12', 'CL - III', '261', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(96, '2015-11-17', 'CL - III', '238', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(97, '2012-02-06', 'CL - III', '071', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(98, '2012-08-13', 'CL - III', '137', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(99, '2013-07-02', 'CL - III', '190', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(100, '2014-11-03', 'CL - III', '101', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(101, '2010-11-15', 'CL - III', '155', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(102, '2016-02-16', 'CL - III', '079', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(103, '2019-07-23', 'CL - III', '129', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(104, '2016-07-20', 'CL - III', '141', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(105, '2009-08-15', 'CL - III', '115', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(106, '2017-04-18', 'CL - III', '162', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(107, '2016-07-21', 'CL - III', '145', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(108, '2011-01-16', 'CL - III', '198', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(109, '2019-09-11', 'CL - III', '54', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(110, '2007-06-11', 'CL - III', '097', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(111, '2007-02-28', 'CL - III', '091', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(112, '2014-01-20', 'CL - III', '221', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(113, '2008-06-16', 'CL - III', '123', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(114, '2016-09-10', 'CL - III', '298', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(115, '2008-06-02', 'CL - III', '235', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(116, '2019-04-24', 'CL - III', '80', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(117, '2017-03-06', 'CL - III', '263', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(118, '2015-10-06', 'CL - III', '234', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(119, '2008-04-21', 'CL - III', '184', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(120, '2014-11-14', 'Gudang', '24', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(121, '2016-03-17', 'Gudang', '248', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(122, '2017-01-24', 'Gudang', '10', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(123, '2016-08-25', 'Gudang', '292', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(124, '2015-02-27', 'Gudang', '153', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(125, '2017-08-22', 'Gudang', '58', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(126, '2017-08-08', 'Gudang', '307', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(127, '2017-06-10', 'Gudang', '73', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(128, '2016-07-13', 'Gudang', '245', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(129, '2019-06-27', 'Gudang', '154', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(130, '2007-06-04', 'Gudang', '130', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(131, '2008-05-12', 'Gudang', '170', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(132, '2016-08-08', 'HD - Pot', '289', 'Aktif', '2020-10-13 13:46:26', '2020-10-14 13:23:42'),
(133, '2018-07-23', 'HD - Pot', '263', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(134, '2010-10-13', 'HD - Pot', '068', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(135, '2019-03-02', 'HD - Pot', '269', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(136, '2006-10-17', 'HD - Pot', '052', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(137, '2009-11-29', 'HD - Pot', '187', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(138, '2009-11-29', 'HD - Pot', '186', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(139, '2012-10-25', 'HD - Pot', '142', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(140, '2008-06-09', 'HD - Pot', '243', 'Cuti', '2020-10-13 13:46:26', '2020-10-13 14:11:28'),
(141, '2008-10-11', 'HD - Pot', '008', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(142, '2018-02-09', 'HD - Pot', '031', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(143, '2011-01-07', 'HD - Pot', '182', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(144, '2010-08-16', 'HD - Pot', '004', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(145, '2018-08-02', 'HD - Pot', '122', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(146, '2018-02-10', 'HD - Pot', '089', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(147, '2007-05-16', 'HD - Pot', '112', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(148, '2018-07-17', 'HD - Pot', '151', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(149, '2010-04-29', 'In - Bag', '258', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(150, '2016-10-31', 'In - Bag', '062', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(151, '2008-07-21', 'In - Bag', '211', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(152, '2008-07-21', 'In - Bag', '139', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(153, '2016-02-02', 'In - Bag', '144', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(154, '2008-08-11', 'In - Bag', '140', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(155, '2012-08-29', 'In - Bag', '083', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(156, '2015-05-25', 'In - Bag', '191', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(157, '2008-04-15', 'In - Bag', '201', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(158, '2008-02-25', 'In - Bag', '163', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(159, '2015-03-10', 'Jahitan', '113', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(160, '2006-12-05', 'Jahitan', '074', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(161, '2015-03-10', 'Jahitan', '118', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(162, '2008-04-07', 'Jahitan', '157', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(163, '2011-01-16', 'Jahitan', '114', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(164, '2008-02-25', 'Jahitan', '164', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(165, '2014-10-13', 'Jahitan', '046', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(166, '2014-10-13', 'Jahitan', '035', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(167, '2015-03-10', 'Jahitan', '120', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(168, '2006-10-17', 'Jahitan', '057', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(169, '2016-04-01', 'Jahitan', '022', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(170, '2011-01-16', 'Jahitan', '209', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(171, '2012-11-01', 'Jahitan', '236', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(172, '2019-06-20', 'Packing', '', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(173, '2011-01-05', 'Packing', '015', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(174, '2016-07-16', 'Packing', '056', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(175, '2012-09-25', 'Packing', '116', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(176, '2006-10-16', 'Packing', '040', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(177, '2018-02-26', 'Packing', '206', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(178, '2011-12-12', 'Pot - an', '239', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(179, '2006-12-04', 'Pot - an', '059', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(180, '2015-02-02', 'Pot - an', '107', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(181, '2016-08-29', 'Pot - an', '297', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(182, '2015-08-22', 'Pot - an', '203', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(183, '2012-09-03', 'Pot - an', '099', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(184, '2016-08-29', 'Pot - an', '294', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(185, '2015-03-19', 'Pot - an', '205', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(186, '2016-07-15', 'Pot - an', '265', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(187, '2008-10-07', 'Pot - an', '131', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(188, '2011-12-12', 'Pot - an', '256', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(189, '2016-08-29', 'Pot - an', '293', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(190, '2017-02-21', 'Pot - an', '094', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(191, '2019-08-06', 'Pot - an', '128', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(192, '2019-04-24', 'Pot - an', '50', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(193, '2018-01-29', 'Pot - an', '098', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(194, '2015-05-28', 'Pot - an', '218', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(195, '2016-07-15', 'Pot - an', '286', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(196, '2019-05-06', 'Pot - an', '194', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(197, '2018-06-26', 'Pot - an', '313', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(198, '2017-02-14', 'Pot - an', '231', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(199, '2013-10-07', 'Pot - an', '034', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(200, '2017-08-07', 'Pot - an', '100', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(201, '2006-12-04', 'QC', '061', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(202, '2017-02-14', 'QC', '012', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(203, '2007-04-04', 'Reifen', '105', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(204, '2016-03-21', 'Reifen', '084', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(205, '2016-04-19', 'Reifen', '273', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(206, '2017-01-25', 'Reifen', '275', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(207, '2017-09-06', 'Reifen', '095', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(208, '2008-02-25', 'Reifen', '057', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(209, '2017-02-07', 'Reifen', '090', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(210, '2016-08-05', 'Reifen', '189', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(211, '0000-00-00', 'Reifen', '014', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(212, '0000-00-00', 'Reifen', '', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(213, '2015-05-05', 'Reifen', '070', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(214, '2011-10-17', 'Reifen', '102', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(215, '2016-08-05', 'Reifen', '183', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(216, '2016-10-24', 'Reifen', '60', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(217, '2015-06-29', 'Reifen', '202', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(218, '2010-03-01', 'Reifen', '117', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(219, '2008-07-14', 'Reifen', '250', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(220, '2017-11-09', 'Reifen', '082', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(221, '2016-05-04', 'Reifen', '086', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(222, '2016-03-11', 'Reifen', '013', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(223, '2014-04-14', 'Reifen', '21', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(224, '2017-01-19', 'Reifen', '246', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(225, '2007-06-18', 'Reifen', '135', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(226, '2017-07-18', 'Reifen', '252', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(227, '2016-03-11', 'Reifen', '270', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(228, '2007-04-04', 'Reifen', '104', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(229, '2008-10-20', 'Reifen', '172', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(230, '2016-04-20', 'Reifen', '47', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(231, '2016-05-10', 'Reifen', '272', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(232, '2008-06-02', 'Sablon', '226', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(233, '2016-01-16', 'Sablon', '251', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(234, '2018-04-25', 'Sablon', '103', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(235, '2020-02-08', 'Sablon', '23', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(236, '2015-03-23', 'Sablon', '210', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(237, '2019-08-06', 'Sablon', '43', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(238, '2008-06-02', 'Sablon', '229', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(239, '2010-08-07', 'Sablon', '067', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(240, '2014-08-18', 'Sablon', '093', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(241, '2018-05-22', 'Sablon', '192', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(242, '2015-08-21', 'Sablon', '167', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(243, '2018-09-10', 'Sablon', '278', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(244, '0000-00-00', 'Sablon', '', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(245, '2012-09-26', 'Sablon', '228', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(246, '2016-06-09', 'Sablon', '279', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(247, '2018-07-04', 'Sablon', '206', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(248, '2006-10-30', 'Sablon', '038', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(249, '2015-02-02', 'Sablon', '108', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(250, '2015-05-19', 'Sablon', '45', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(251, '2019-08-09', 'Sablon', '175', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(252, '2015-03-19', 'Sablon', '197', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(253, '2016-06-09', 'Sablon', '282', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(254, '2015-05-14', 'Sablon', '168', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(255, '2015-05-19', 'Sablon', '200', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(256, '2015-05-14', 'Sablon', '181', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(257, '2019-06-25', 'Sablon', '132', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(258, '2012-02-27', 'Sablon', '005', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(259, '2015-03-17', 'Sablon', '193', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(260, '2008-04-07', 'Sablon', '185', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(261, '2006-10-16', 'Sablon', '039', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(262, '2016-06-14', 'Sablon', '121', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(263, '2020-06-20', 'Sablon', '213', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(264, '2016-10-17', 'Sablon', '017', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(265, '2016-06-10', 'Sablon', '284', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(266, '2016-06-10', 'Sablon', '283', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(267, '2018-11-14', 'Sablon', '', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(268, '0000-00-00', 'Sablon', '306', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(269, '2015-03-17', 'Sablon', '195', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(270, '2019-08-09', 'Sablon', '175', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(271, '2015-05-13', 'Tusutan', '158', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(272, '2015-01-19', 'Tusutan', '37', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(273, '2011-07-26', 'Tusutan', '188', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(274, '0000-00-00', 'Tusutan', '302', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(275, '2015-02-12', 'Tusutan', '134', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(276, '2015-05-12', 'Tusutan', '122', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26'),
(277, '2009-02-02', 'Tusutan', '009', 'Aktif', '2020-10-13 13:46:26', '2020-10-13 06:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resign`
--

CREATE TABLE `tbl_resign` (
  `no` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_resign` date NOT NULL,
  `alasan` varchar(150) NOT NULL,
  `waktudibuat` datetime NOT NULL,
  `terakhirdiubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_resign`
--

INSERT INTO `tbl_resign` (`no`, `id_karyawan`, `tgl_resign`, `alasan`, `waktudibuat`, `terakhirdiubah`) VALUES
(1, 282, '2020-04-03', 'Karena ingin program hamil', '2020-10-19 21:56:45', '2020-10-19 14:56:45'),
(7, 283, '2020-05-06', 'Ikut Suami pindah ke Aceh', '2020-10-20 19:58:47', '2020-10-20 12:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sp`
--

CREATE TABLE `tbl_sp` (
  `no` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_sp` date NOT NULL,
  `jenissp` varchar(3) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `waktudibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `terakhirdiubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sp`
--

INSERT INTO `tbl_sp` (`no`, `id_karyawan`, `tgl_sp`, `jenissp`, `keterangan`, `waktudibuat`, `terakhirdiubah`) VALUES
(5, 115, '2020-07-14', 'I', 'kelalaian kerja karena kurang memahami informasi yang diterima', '2020-10-03 23:37:37', '2020-10-03 16:37:37'),
(6, 263, '2020-07-14', 'I', 'mencetak bahan terlalu banyak dari yang ditentukan', '2020-10-03 23:41:25', '2020-10-03 16:41:25'),
(9, 116, '2020-04-02', 'III', 'merokok di area lokasi kerja terlihat oleh Pimpinan Otani', '2020-10-05 16:24:28', '2020-10-19 08:02:26'),
(15, 115, '2020-10-19', 'II', 'ngetes', '2020-10-19 21:37:56', '2020-10-19 14:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sp_res`
--

CREATE TABLE `tbl_sp_res` (
  `no` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_sp` date NOT NULL,
  `jenissp` varchar(3) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `waktudibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `terakhirdiubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sp_res`
--

INSERT INTO `tbl_sp_res` (`no`, `id_karyawan`, `tgl_sp`, `jenissp`, `keterangan`, `waktudibuat`, `terakhirdiubah`) VALUES
(1, 282, '2020-10-19', 'I', 'ngetes', '2020-10-19 22:32:43', '2020-10-19 15:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `waktudibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `terakhirdiubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `waktudibuat`, `terakhirdiubah`) VALUES
(1, 'admin', '12345', '2020-10-14 13:13:05', '2020-10-14 13:23:31'),
(2, 'hrd', '123hrd', '2020-10-14 13:13:05', '2020-10-14 13:12:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_cuti_res`
--
ALTER TABLE `tbl_cuti_res`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_hubkel`
--
ALTER TABLE `tbl_hubkel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hubkel_res`
--
ALTER TABLE `tbl_hubkel_res`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_infokaryawan`
--
ALTER TABLE `tbl_infokaryawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_infokaryawan_res`
--
ALTER TABLE `tbl_infokaryawan_res`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_masterkaryawan`
--
ALTER TABLE `tbl_masterkaryawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_resign`
--
ALTER TABLE `tbl_resign`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_sp`
--
ALTER TABLE `tbl_sp`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_sp_res`
--
ALTER TABLE `tbl_sp_res`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cuti_res`
--
ALTER TABLE `tbl_cuti_res`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_hubkel`
--
ALTER TABLE `tbl_hubkel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_hubkel_res`
--
ALTER TABLE `tbl_hubkel_res`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_infokaryawan`
--
ALTER TABLE `tbl_infokaryawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `tbl_masterkaryawan`
--
ALTER TABLE `tbl_masterkaryawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `tbl_resign`
--
ALTER TABLE `tbl_resign`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_sp`
--
ALTER TABLE `tbl_sp`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_sp_res`
--
ALTER TABLE `tbl_sp_res`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
