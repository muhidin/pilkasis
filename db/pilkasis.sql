-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2017 at 03:17 PM
-- Server version: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pilkasis`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapemilihan`
--

CREATE TABLE `datapemilihan` (
  `idpemilihan` int(5) NOT NULL,
  `tipe` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `idpemilih` varchar(9) COLLATE latin1_general_ci DEFAULT NULL,
  `idkandidat` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `datapemilihan`
--

INSERT INTO `datapemilihan` (`idpemilihan`, `tipe`, `idpemilih`, `idkandidat`, `waktu`) VALUES
(1, 'Siswa', '1', '2', '2017-06-10 19:02:42'),
(2, 'Guru', '009', '1', '2017-06-11 04:58:43'),
(3, 'Siswa', '2', '2', '2017-06-12 11:47:33'),
(4, 'Guru', '161701002', '2', '2017-06-12 11:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(9) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `mengajar` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `memilih` varchar(1) NOT NULL,
  `aktif` enum('Y','T') NOT NULL DEFAULT 'T',
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `username`, `password`, `nama`, `jk`, `mengajar`, `email`, `hp`, `memilih`, `aktif`, `foto`) VALUES
('009', 'cahyo', '772c2161cb7137df9da9d3ad4d57b16f', 'Cahyo', 'L', 'TIK', 'cahyo@aja.deh', '088', '', 'Y', 'AYat Kursi dan tajwidnya.jpg'),
('010', 'Kosasih', 'cb2dd182b361be88c2b4d91e96ecb76a', 'Kosasih', '', 'PKN', '', '0898', '', 'Y', 'ai.png'),
('011', 'yusuf', 'dd2eb170076a5dec97cdbbbbff9a4405', 'Yusuf', '', 'PKN', '', '076', '', 'Y', 'chat1.png'),
('0123', 'dedi', 'c5897fbcc14ddcf30dca31b2735c3d7e', 'Dedi S', '', 'Biologi', '', '089', '', 'Y', 'AllahWithUs.jpg'),
('071001006', 'yoga', '807659cd883fc0a63f6ce615893b3558', 'Yoga P', '', 'English', 'yoga@deh.ah', '0889', '', 'Y', 'LaptopIsropin.jpg'),
('09876', 'fitri', '534a0b7aa872ad1340d0071cbfa38697', 'Fitro', '', 'KImia', '', '099', '', 'Y', '17309866_1297397137020730_2534770833228468758_n.jp'),
('1111', '1111', 'e27e7dc272acb241669f1ba3c6f6084f', 'Naufal Mumtaz Ramadhan', '', 'Matematika', 'naufal@mr.dong', '088', '', 'T', 'Mosque-3.svg'),
('111201003', 'ubay', '0e03189c41fa09c6750579dc9febc0b6', 'Abdullah Ubay Sidik', '', 'Ekonomi', 'ubay@gmail.com', '0817', '', 'Y', 'PembalasanSikucing.gif'),
('1234', '1234', 'e070b35738ad4148a1b82320d738da44', 'Muhidin Saimin', '', 'TIK', 'muhidinsaimin@gmail.com', '081297224622', '', 'Y', 'AllahWithUs.jpg'),
('161701001', 'nailah', '7d1834b54f1652fdc59f79c0dd46e137', 'Nailah Fauziyyah Tsabitah Az Zahra', '', 'Bahasa Sunda', 'nailah.fauziyyah@gmail.com', '081297224622', '', 'Y', '020520142098.jpg'),
('161701002', 'humam', '6f99cd6a204c61990e0abbe993988efe', 'Humam Al Labib', 'L', 'Matematika', 'humam.alabib@gmail.com', '081297224622', '', 'Y', 'logo.png'),
('161701004', 'dea', '96991368fec63c8a1bfc48a70010f84a', 'Dea', '', 'TIK', 'uoiu@aja.deh', '0812', '', 'Y', 'dasi.gif'),
('181901005', 'Ainul', 'ce4b2ca8c5ad544d636e745224eb95d5', 'Ainul Yaqi', '', 'Bahasa Arab', 'ainul@aja.deh', '08', '', 'Y', 'wallpaper-BlankOn-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `idkandidat` int(2) NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nokandidat` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `jumlahsuara` varchar(4) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `visi` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `misi` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','T') COLLATE latin1_general_ci NOT NULL DEFAULT 'T',
  `foto` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`idkandidat`, `username`, `password`, `nama`, `nokandidat`, `jumlahsuara`, `visi`, `misi`, `aktif`, `foto`) VALUES
(1, 'kandidat1', '8f23e4acba1b7f45423b930e7cfadbd0', 'Tuan dan Puan', '2', '2', 'Mejadikan sekolah ini sebagai sekolah SMA Favorit karena OSIS-nya', '<ol><li>Tahun ini harus haji semua pengurus OSISnya</li><li>\r\nMenjadikan bla..bla...</li><li>\r\njadinya hahahaha</li><li>\r\napa yah</li><li>\r\nbukan deh</li></ol>', 'Y', '411.jpg'),
(2, 'muhidin', 'c0f6e70583525a8a265e19de06d6bff8', 'Muhidin', '1', '4', 'Menjadikan sebagai OSIS terbaik sekota Depok', '<ol><li>Membuat pengajian rutin</li><li>\nMengundang pembicara kaliber nasional per 3 bulan ke acara OSIS</li><li>lain-lain</li></ol>', 'Y', 'AllahWithUs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(2) NOT NULL,
  `kelas` varchar(7) CHARACTER SET latin1 NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `kelas`, `jumlah`) VALUES
(1, '10.1', 29),
(2, '10.2', 31),
(3, '10.3', 12),
(4, 'satu', 21),
(5, '11IPS', 25),
(7, '11IPA01', 25);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hakakses` varchar(15) NOT NULL,
  `aktif` enum('Y','T') NOT NULL DEFAULT 'T',
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `username`, `password`, `nama`, `jabatan`, `hp`, `email`, `hakakses`, `aktif`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Web Pilkasis', 'Administrator', '081297224622', 'muhidinsaimin@gmail.com', 'Admin', 'Y', 'muhidin.jpg'),
(8, 'humam', 'c3ec0f7b054e729c5a716c8125839829', 'Humam Al Labib', 'Siswa', '-', 'humam.alabib@gmail.com', 'Admin', 'Y', 'AllahWithUs.jpg'),
(9, 'sma', 'a289fa4252ed5af8e3e9f9bee545c172', 'SMA Pro', 'sma', 'sma', 'sma@pro.id', 'Admin', 'Y', 'dasi.gif'),
(10, 'dea', '96991368fec63c8a1bfc48a70010f84a', 'hhghjjgj', 'ghjg', 'hjgjhg', 'ghhjg@kj.hk', 'Magang', 'T', 'AYat Kursi dan tajwidnya.jpg'),
(11, 'siakoe', '6d9a3b288d05321b95419a1f9afb6f49', 'Siakoe', 'Big Boss', '081297224622', 'siakoe@dong.ah', 'Magang', 'Y', 'suratname.png'),
(12, 'Rahmat', '22edede458f67b60c14ae50be5b15f37', 'Muhammad Rahmat', 'Bos', '081', 'rah@mat.m', 'Magang', 'Y', 'duit.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(9) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tempatlahir` varchar(30) NOT NULL,
  `tanggallahir` date NOT NULL,
  `idkelas` varchar(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `aktif` enum('Y','T') NOT NULL DEFAULT 'T',
  `memilih` varchar(1) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `username`, `password`, `nama`, `jk`, `tempatlahir`, `tanggallahir`, `idkelas`, `email`, `hp`, `aktif`, `memilih`, `foto`) VALUES
('1', 'nmr', '3acc04fb854f7a377e9d3656df8e99f1', 'Naufal Mumtaz Ramadhan', 'L', 'Jepara', '2001-12-06', '1', 'naufal.mr@gmail.com', '0822', 'Y', '', 'IMG_20160813_092446.jpg'),
('121212', '121212', '17afe9ec472cd0ff881c276d1125de58', 'mahmudin', 'L', 'Jepara', '2001-05-07', '1', '', '', 'T', '', ''),
('2', 'humam', '6f99cd6a204c61990e0abbe993988efe', 'Humam Al Labib', 'L', 'Jepara', '2003-12-30', '4', 'humam.alabib@gmail.com', '0812', 'Y', '', 'WorkshopDepicta2017.jpg'),
('3', 'bita', 'e2a00a6481b4654ff0e35325780a0d10', 'Nailah Fauziyyah Tsabitah Az Zahra', 'P', 'Depok', '2009-05-11', '5', 'nailah.fauziyyah@gmail.com', '000', 'Y', '', '170320152325.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapemilihan`
--
ALTER TABLE `datapemilihan`
  ADD PRIMARY KEY (`idpemilihan`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`idkandidat`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `pengguna` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapemilihan`
--
ALTER TABLE `datapemilihan`
  MODIFY `idpemilihan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `idkandidat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
