-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 04:55 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simba_iain`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` varchar(5) NOT NULL,
  `NAMA_ADMIN` varchar(50) NOT NULL,
  `PASSWORD_ADMIN` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `PASSWORD_ADMIN`) VALUES
('A0001', 'ADMIN1', 'ADMIN1'),
('A0002', 'ADMIN2', 'ADMIN2');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `ID_BANK` varchar(3) NOT NULL,
  `NAMA_BANK` varchar(10) NOT NULL,
  `NO_REK` varchar(16) NOT NULL,
  `NAMA_REK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`ID_BANK`, `NAMA_BANK`, `NO_REK`, `NAMA_REK`) VALUES
('001', 'BNI', '576454501', 'NUR HADI (BNI)'),
('002', 'BRI', '623501017464531', 'NUR HADI (BRI)'),
('003', 'mandiri', '6754232381711', 'NUR HADI (mandiri)');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `ID_BAYAR` varchar(21) NOT NULL,
  `ID_DAFTAR` varchar(20) NOT NULL,
  `ID_BANK` varchar(3) NOT NULL,
  `TGL_BAYAR` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `ID_DAFTAR` varchar(20) NOT NULL,
  `ID_JENIS_LOMBA` varchar(5) NOT NULL,
  `ID_USER` varchar(5) NOT NULL,
  `ID_RAYON` varchar(5) NOT NULL,
  `ID_ADMIN` varchar(5) NOT NULL,
  `NPSN` varchar(8) NOT NULL,
  `TGL_DAFTAR` datetime NOT NULL,
  `SURAT_REKOM` varchar(50) NOT NULL,
  `FILE_ABSTRAK` varchar(50) DEFAULT NULL,
  `STATUS_REKOM` varchar(19) NOT NULL,
  `STATUS_FILE` varchar(11) NOT NULL,
  `STATUS_BAYAR` varchar(19) NOT NULL,
  `TOTAL_BAYAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_daftar`
--

CREATE TABLE `detail_daftar` (
  `ID_DAFTAR` varchar(20) NOT NULL,
  `NISN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_lomba`
--

CREATE TABLE `jenis_lomba` (
  `ID_JENIS_LOMBA` varchar(5) NOT NULL,
  `NAMA_LOMBA` varchar(20) NOT NULL,
  `BIAYA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_lomba`
--

INSERT INTO `jenis_lomba` (`ID_JENIS_LOMBA`, `NAMA_LOMBA`, `BIAYA`) VALUES
('J0001', 'OLIMPIADE', 75000),
('J0002', 'Sains Produk', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `ID_RAYON` varchar(5) NOT NULL,
  `NAMA_RAYON` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rayon`
--

INSERT INTO `rayon` (`ID_RAYON`, `NAMA_RAYON`) VALUES
('R0001', 'JEMBER'),
('R0002', 'BANYUWANGI'),
('R0003', 'PROBOLINGGO');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `NPSN` varchar(8) NOT NULL,
  `NAMA_SEKOLAH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`NPSN`, `NAMA_SEKOLAH`) VALUES
('20523774', 'SMP KRISTEN CAHAYA'),
('20523780', 'SMP ASY SYAFAAH'),
('20523884', 'SMPN 11 JEMBER'),
('20523891', 'SMPN 3 JEMBER'),
('20523895', 'SMPN 9 JEMBER'),
('20523914', 'SMP NURIS JEMBER'),
('20523926', 'SMP MOCH. SROEDJI JEMBER'),
('20548797', 'SMPN 14 JEMBER'),
('20548921', 'SMPS INKLUSI TPA JEMBER'),
('20548926', 'SMP KH. AGUS SALIM'),
('20554189', 'SMP DARUL HIKMAH'),
('20556102', 'SMP ISLAM TERPADU AL-GHOZALI JEMBER'),
('20581594', 'MTSS UNGGULAN NURIS'),
('20581595', 'MTSS ANNIDHOM'),
('20581596', 'MTSS AKBAR'),
('20581597', 'MTSS AKHLAKUL KARIMAH'),
('20581598', 'MTSS SA. PP. AL - MUSLIHUN'),
('69773560', 'SMPS PELITA HATI NATIONAL PLUS SCHOOL'),
('69904132', 'SMPS ISLAM DARUL ISTIQOMAH SUMBERSARI'),
('69929338', 'SMPS ADH DHUHA');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NISN` varchar(10) NOT NULL,
  `NAMA_SISWA` varchar(50) NOT NULL,
  `TEMPAT_LAHIR` varchar(30) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `JENIS_KELAMIN` varchar(9) NOT NULL,
  `ALAMAT` varchar(50) NOT NULL,
  `FOTO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NISN`, `NAMA_SISWA`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `ALAMAT`, `FOTO`) VALUES
('1000000001', 'SISWA OLIMPIADE 1', 'JEMBER', '0000-00-00', 'LAKI LAKI', 'JEMBER BARAT', 'foto1.jpg'),
('1000000002', 'SISWA OLIMPIADE 2', 'JEMBER', '0000-00-00', 'LAKI LAKI', 'JEMBER BARAT', 'foto2.jpg'),
('1000000003', 'SISWA OLIMPIADE 3', 'JEMBER', '0000-00-00', 'LAKI LAKI', 'JEMBER BARAT', 'foto3.jpg'),
('1000000004', 'SISWA OLIMPIADE 4', 'JEMBER', '0000-00-00', 'LAKI LAKI', 'JEMBER BARAT', 'foto4.jpg'),
('1000000005', 'SISWA OLIMPIADE 5', 'JEMBER', '0000-00-00', 'LAKI LAKI', 'JEMBER BARAT', 'foto5.jpg'),
('1000000006', 'SISWA OLIMPIADE 6', 'JEMBER', '0000-00-00', 'LAKI LAKI', 'JEMBER BARAT', 'foto6.jpg'),
('1000000007', 'SISWA OLIMPIADE 7', 'JEMBER', '0000-00-00', 'LAKI LAKI', 'JEMBER BARAT', 'foto7.jpg'),
('1000000008', 'SISWA OLIMPIADE 8', 'JEMBER', '0000-00-00', 'LAKI LAKI', 'JEMBER BARAT', 'foto8.jpg'),
('1000000009', 'SISWA OLIMPIADE 9', 'JEMBER', '0000-00-00', 'LAKI LAKI', 'JEMBER BARAT', 'foto9.jpg'),
('1000000010', 'SISWA OLIMPIADE 10', 'JEMBER', '0000-00-00', 'LAKI LAKI', 'JEMBER BARAT', 'foto10.jpg'),
('2000000001', 'SISWA SP 1', 'BANYUWANGI', '0000-00-00', 'PEREMPUAN', 'BANYUWANGI UTARA', 'foto11.jpg'),
('2000000002', 'SISWA SP 2', 'BANYUWANGI', '0000-00-00', 'PEREMPUAN', 'BANYUWANGI UTARA', 'foto12.jpg'),
('2000000003', 'SISWA SP 3', 'BANYUWANGI', '0000-00-00', 'PEREMPUAN', 'BANYUWANGI UTARA', 'foto13.jpg'),
('2000000004', 'SISWA SP 4', 'BANYUWANGI', '0000-00-00', 'PEREMPUAN', 'BANYUWANGI UTARA', 'foto14.jpg'),
('2000000005', 'SISWA SP 5', 'BANYUWANGI', '0000-00-00', 'PEREMPUAN', 'BANYUWANGI UTARA', 'foto15.jpg'),
('2000000006', 'SISWA SP 6', 'BANYUWANGI', '0000-00-00', 'PEREMPUAN', 'BANYUWANGI UTARA', 'foto16.jpg'),
('2000000007', 'SISWA SP 7', 'BANYUWANGI', '0000-00-00', 'PEREMPUAN', 'BANYUWANGI UTARA', 'foto17.jpg'),
('2000000008', 'SISWA SP 8', 'BANYUWANGI', '0000-00-00', 'PEREMPUAN', 'BANYUWANGI UTARA', 'foto18.jpg'),
('2000000009', 'SISWA SP 9', 'BANYUWANGI', '0000-00-00', 'PEREMPUAN', 'BANYUWANGI UTARA', 'foto19.jpg'),
('2000000010', 'SISWA SP 10', 'BANYUWANGI', '0000-00-00', 'PEREMPUAN', 'BANYUWANGI UTARA', 'foto20.jpg'),
('3333333333', 'bum', 'bum', '2020-01-02', 'LAKI LAKI', 'gumukmas', '225e0c608c85b430.16182402.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` varchar(5) NOT NULL,
  `NAMA_USER` varchar(50) NOT NULL,
  `EMAIL_USER` varchar(50) NOT NULL,
  `PASSWORD_USER` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `EMAIL_USER`, `PASSWORD_USER`) VALUES
('U0001', 'USER1', 'user1@gmail.com', '9f693771ca12c43759045cdf4295e9f5'),
('U0002', 'USER2', 'user2@gmail.com', '009ab43667ea90b50b741d89cbf76f1b'),
('U0003', 'USER3', 'user3@gmail.com', 'c5b111077f75f96c354597ce99437fa8'),
('U0004', 'USER4', 'user4@gmail.com', 'ddfba1f666f3f4fbfb597e0d42bff4bd'),
('U0005', 'USER5', 'user5@gmail.com', '69754ab7990c71b7725a42a41c0922d7'),
('U0006', 'USER6', 'user6@gmail.com', 'c12b152e68b6937084505a135f2dd0fb'),
('U0007', 'USER7', 'user7@gmail.com', '9c8b4ffdc260b8060de21342277a060c'),
('U0008', 'USER8', 'user8@gmail.com', '640bb8dd6fec92d8a5d1cbf73d81dc22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`ID_BANK`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`ID_BAYAR`),
  ADD KEY `ID_DAFTAR` (`ID_DAFTAR`,`ID_BANK`),
  ADD KEY `ID_BANK` (`ID_BANK`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`ID_DAFTAR`),
  ADD KEY `ID_JENIS_LOMBA` (`ID_JENIS_LOMBA`,`ID_USER`,`ID_RAYON`,`ID_ADMIN`,`NPSN`),
  ADD KEY `ID_ADMIN` (`ID_ADMIN`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_RAYON` (`ID_RAYON`),
  ADD KEY `NPSN` (`NPSN`);

--
-- Indexes for table `detail_daftar`
--
ALTER TABLE `detail_daftar`
  ADD KEY `ID_DAFTAR` (`ID_DAFTAR`,`NISN`),
  ADD KEY `NISN` (`NISN`);

--
-- Indexes for table `jenis_lomba`
--
ALTER TABLE `jenis_lomba`
  ADD PRIMARY KEY (`ID_JENIS_LOMBA`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`ID_RAYON`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`NPSN`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NISN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`ID_DAFTAR`) REFERENCES `daftar` (`ID_DAFTAR`),
  ADD CONSTRAINT `bayar_ibfk_2` FOREIGN KEY (`ID_BANK`) REFERENCES `bank` (`ID_BANK`);

--
-- Constraints for table `daftar`
--
ALTER TABLE `daftar`
  ADD CONSTRAINT `daftar_ibfk_1` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`),
  ADD CONSTRAINT `daftar_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `daftar_ibfk_3` FOREIGN KEY (`ID_RAYON`) REFERENCES `rayon` (`ID_RAYON`),
  ADD CONSTRAINT `daftar_ibfk_4` FOREIGN KEY (`NPSN`) REFERENCES `sekolah` (`NPSN`),
  ADD CONSTRAINT `daftar_ibfk_5` FOREIGN KEY (`ID_JENIS_LOMBA`) REFERENCES `jenis_lomba` (`ID_JENIS_LOMBA`);

--
-- Constraints for table `detail_daftar`
--
ALTER TABLE `detail_daftar`
  ADD CONSTRAINT `detail_daftar_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `siswa` (`NISN`),
  ADD CONSTRAINT `detail_daftar_ibfk_2` FOREIGN KEY (`ID_DAFTAR`) REFERENCES `daftar` (`ID_DAFTAR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
