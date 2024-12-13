-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2020 at 02:06 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `no_hp`) VALUES
(4, 'admin', '202cb962ac59075b964b07152d234b70', 'yana', '081234567890');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_admin`, `id_aduan`, `isi`) VALUES
(3, 1, 2, 'Tolong berantas premanisme terorganisir di pasar induk caringin,berupa jual paksa rokok,minuman kemasan,plastik ,dll.Kemungkinan pengurus pasar pun terlibat dan ada bekingnya'),
(4, 1, 3, 'Setiap malam jam 12an sampai jam 2 pagi selalu ada trek2n balapan liar di jalan 123 tepatnya......'),
(5, 1, 17, 'd'),
(6, 1, 15, 'd'),
(7, 1, 17, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_hasil`
--

CREATE TABLE `lampiran_hasil` (
  `id_lamp_hasil` int(11) NOT NULL,
  `id_hasil` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lampiran_hasil`
--

INSERT INTO `lampiran_hasil` (`id_lamp_hasil`, `id_hasil`, `nama_file`, `ket`) VALUES
(2, 2, 'log3.png', 'Begal di Malik Raya'),
(3, 3, 'bbb.png', 'Balapan liar setiap jam 12:00 malam'),
(4, 17, 'LOGO_STMIK_1-removebg-preview.png', 'pebacokan'),
(5, 15, 'LOGO_STMIK_1-removebg-preview.png', 'pebacokan'),
(6, 17, 'LOGO_STMIK_1-removebg-preview.png', 'pebacokan');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_pengaduan`
--

CREATE TABLE `lampiran_pengaduan` (
  `id_lamp_aduan` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lampiran_pengaduan`
--

INSERT INTO `lampiran_pengaduan` (`id_lamp_aduan`, `id_aduan`, `nama_file`, `ket`) VALUES
(3, 8, 'penampang geologicc (2).jpg', 'Pencurian di Jl..'),
(7, 10, 'IMG_20161201_201610.jpg', 'pebacokan'),
(9, 1, 'abb.png', 'dd'),
(10, 11, 'IMG_20170609_214843.jpg', 'pencabulan'),
(11, 13, 'LOGO_STMIK_1-removebg-preview.png', 'Pencurian di Jl..'),
(12, 17, 'LOGO_STMIK_1-removebg-preview.png', 'pebacokan'),
(13, 15, 'LOGO_STMIK_1-removebg-preview.png', 'pebacokan'),
(14, 14, 'LOGO_STMIK_1-removebg-preview.png', 'Pencurian di Jl..'),
(15, 17, 'LOGO_STMIK_1-removebg-preview.png', 'pebacokan'),
(16, 17, 'LOGO_STMIK_1-removebg-preview.png', 'pebacokan');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_aduan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_aduan` date NOT NULL,
  `judul_aduan` varchar(100) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `alamat_kejadian` text NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `berkas` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_aduan`, `id_admin`, `nama`, `nik`, `no_hp`, `email`, `tgl_aduan`, `judul_aduan`, `kategori`, `kecamatan`, `kelurahan`, `alamat_kejadian`, `waktu`, `isi`, `berkas`, `status`) VALUES
(2, 1, 'Sri Rejekiana', '74712203950001', '082123453333', 'yn@gmail.com', '2020-04-19', 'Begal di Malik Raya', 'Begal', 'Mandonga', 'Korumba', 'Jl. H. Abdul Silondae No.107 A', '18-04-2020, 21.44', 'Tolong berantas premanisme terorganisir di pasar induk caringin,berupa jual paksa rokok,minuman kemasan,plastik ,dll.Kemungkinan pengurus pasar pun terlibat dan ada bekingnya', 'log3.png', 'Selesai'),
(3, 1, 'Ee', '7471102233440002', '088822223333', 'ee@gmail.com', '2020-04-20', 'Balapan liar setiap jam 12:00 malam', 'Lainnya', 'Kendari Barat', 'Kemaraya', 'Jl. 123', 'Setiap malam', 'Setiap malam jam 12an sampai jam 2 pagi selalu ada trek2n balapan liar di jalan 123 tepatnya......', 'bbb.png', 'Selesai'),
(6, 1, 'abc', '123', '1214', 'abc@gmail.com', '2020-08-05', 'Pembunuhan di Jl..', 'Pembunuhan', 'Mandonga', 'erf', 'arg', '12 Agustus 2020', 'gsfLIf', 'sulawesi.jpg', 'Diproses'),
(10, 1, 'yanna', '123455678999', '0813456789', 'abc@gmail.com', '2020-08-07', 'pebacokan', 'Penganiayaan', 'Mandonga', 'dhfhufeju', 'jln saranani', '03 austus 2020', 'Telah tejadi pebacokan dijlan sarani', 'IMG_20161201_201610.jpg', 'Diproses'),
(11, 0, 'Ranika', '7470123445677', '0822345678', 'ranika@gmail.co', '2020-08-09', 'Pencurian', 'Pencurian', 'Abeli', 'Pencurian kacamata', 'Jln komba komba', '09 agustus 2020', 'Telah terjadi pencurian kacamata dan pake live', 'IMG-20200807-WA0015.jpeg', 'Diproses'),
(13, 0, 'Ika rahmatika', '7471098767890', '085246499867', 'ikkarahmatika@yaho.com', '2020-08-09', 'Pelecehan seksual', 'Asusila', 'Kendari', 'Kendari caddi', 'Jl yos sudarso', '9-8-2020', 'Telah terjadi pelecehan seksual ', '66402661-DCA4-4EF6-B834-AB09B45EE7E6.jpeg', 'Diproses'),
(15, 1, 'Yana', '123455678999', '081354568204', 'rejekianasri@gmail.com', '2020-08-27', 'Pesta Narkoba', 'Narkoba', 'Kambu', 'Kambu', 'Jl..', '09 austus 2020', 'qqqq', 'LOGO_STMIK_1-removebg-preview.png', 'Diproses'),
(16, 0, 'Baba', '74133448990001', '0822196328', 'bela.@gmail.com', '2020-08-27', 'Maling kotak amal', 'Pencurian', 'Puuwatu', 'Puuawatu', 'Jln.yusuf', '26-08-2020', 'Tels terja pencurian kotak amsl di mesjid jln. Yusuf puwatu', '1598502060225331072084.jpg', 'Menunggu Verifikasi'),
(21, 0, 'Yana', '123', '12345', 'yana@gmail.com', '2020-08-27', 'Penganiayaan Istri', 'KDRT', 'Kambu', 'Kambu', 'Jl. abc', '2020-08-27', 'aaaaaaaaaa', 'LOGO_STMIK_1-removebg-preview.png', 'Diproses'),
(22, 1, 'rejeki', '74709987654321', '081354568294', 'rejekianasri@gmail.com', '2020-08-27', 'maling ayam', 'Pencurian', 'Kadia', 'mandonga', 'jln abdullah silondae', '2020-08-27', 'telah terjadi malinf ayam', '20170509_141650.jpg', 'Selesai'),
(24, 1, 'Henny', '07312456765', '08114095089', 'henny1089@gmail.com', '2020-08-28', 'penguntit', 'Lainnya', 'Mandonga', 'Kambu', 'Jl.Saranani', '2020-08-28', 'Terdapat penguntit yg telah mengganggu selama 2 hari', 'image.jpg', 'Selesai'),
(26, 0, 'Lili', '71517182929', '019182827', 'bela.@gmail.com', '2020-08-28', 'Da goso ambil tempe ku', 'Lainnya', 'Kadia', 'Kadia', 'Kadia', '2020-08-28', 'Maling makanan', '1598588786597-1764001177.jpg', 'Menunggu Verifikasi'),
(27, 1, 'Ardiya', '7413344899023', '0856123455', 'toyib@gmail.com', '2020-08-29', 'Maling sendal swalow', 'Pencurian', 'Kendari', 'Kendari', 'Kendari', '2020-08-29', 'Pencurian sendal jempit swalow', '1598669274295-1764001177.jpg', 'Diproses'),
(28, 0, 'Alam', '747612345678910', '081354568204', 'rejekianasri@gmail.com', '2020-09-10', 'Tabrak Lari', 'Tabrak Lari', 'Kadia', 'Mandonga', 'Jln kancil', '2020-09-10', 'Telah terjadi pencurian', 'IMG-20200909-WA0012.jpeg', 'Selesai'),
(29, 1, 'Alam', '747612345678910', '081354568204', 'rejekianasri@gmail.com', '2020-09-10', 'Pencurian ', 'Pencurian', 'Kadia', 'Mandonga', 'Jln kancil', '2020-09-10', 'Telah terjadi pencurian', 'IMG-20200909-WA0012.jpeg', 'Diproses'),
(30, 1, 'Henny Lagi', '74002109800', '08114095089', 'henny1089@gmail.com', '2020-09-10', 'Jambret', 'Pencurian', 'Mandonga', 'Mandonga', 'Jl. Abd. Silondae', '2020-09-10', 'telah terjadi penjabretan', 'BFE6B48A-C32F-4007-B4D8-38B66F52F2BE.jpeg', 'Ditolak'),
(32, 1, 'La Kunti', '12345678', '08811223344', 'kuntilanak@gmail.com', '2020-09-19', 'Penghinaan di facebook', 'Cyber Crime', 'Kendari', 'Kendari', 'Jl. mmm', '2020-09-19', 'Tolong pak saya dihina', '16004775719751591119211.jpg', 'Diproses'),
(33, 1, 'Nina', '75555555555', '085444333222', 'ninabobo@gmail.com', '2020-09-19', 'Pemberi harapan palsu', 'Penipuan', 'Kendari Barat', 'Lahundape', 'Jllll', '2020-09-19', 'Php', '1600477805093154942122.jpg', 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_aduan`, `nik`) VALUES
(1, 18, '123'),
(2, 19, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `lampiran_hasil`
--
ALTER TABLE `lampiran_hasil`
  ADD PRIMARY KEY (`id_lamp_hasil`);

--
-- Indexes for table `lampiran_pengaduan`
--
ALTER TABLE `lampiran_pengaduan`
  ADD PRIMARY KEY (`id_lamp_aduan`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_aduan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lampiran_hasil`
--
ALTER TABLE `lampiran_hasil`
  MODIFY `id_lamp_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lampiran_pengaduan`
--
ALTER TABLE `lampiran_pengaduan`
  MODIFY `id_lamp_aduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_aduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
