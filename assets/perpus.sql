-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 11:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(15) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `jaskel` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_hp` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `name`, `email`, `jaskel`, `alamat`, `no_hp`) VALUES
('AG001', '111', 'devvanpka055@gmail.com', 'Laki-laki', 'Kalipuro', '11188'),
('AG002', 'Bagus', 'devvan022@gmail.com', 'Perempuan', 'Banyuwangi', '098xxx'),
('AG003', 'Devvan1', 'devvanpka021@gmail.com', 'Laki-laki', 'Kalipuro', '11188'),
('AG004', 'Devvan', 'devvanpka021@gmail.com', 'Perempuan', 'Kalipuro', '11188');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(15) NOT NULL,
  `id_pengarang` int(15) NOT NULL,
  `id_penerbit` int(15) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `tahun_terbit` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_pengarang`, `id_penerbit`, `judul_buku`, `jumlah`, `tahun_terbit`) VALUES
('BK001', 17, 9, 'Bagus', 0, 2021),
('BK002', 17, 9, 'Bahasa Indonesia', 0, 2021),
('BK003', 17, 9, 'Bahasa Inggris', 69, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `name_penerbit` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `name_penerbit`) VALUES
(9, 'Ke 2');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` int(11) NOT NULL,
  `name_pengarang` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `name_pengarang`) VALUES
(17, 'Devvan');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `Id_buku` varchar(15) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_kembalikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_anggota`, `Id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_kembalikan`) VALUES
(1, 'AG001', 'BK001', '2021-05-09', '2021-05-16', '2021-05-09'),
(2, 'AG001', 'BK001', '2021-05-10', '2021-05-17', '2021-05-25'),
(3, 'AG001', 'BK001', '2021-05-10', '2021-05-17', '2021-05-25'),
(4, 'AG001', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(5, 'AG001', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(6, 'AG001', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(7, 'AG002', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(8, 'AG002', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(9, 'AG001', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(10, 'AG001', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(11, 'AG003', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(12, 'AG001', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(13, 'AG001', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(14, 'AG002', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25'),
(15, 'AG004', 'BK003', '2021-05-25', '2021-06-01', '2021-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pm` varchar(15) NOT NULL,
  `id_buku` varchar(15) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pm`, `id_buku`, `name`, `email`, `tgl_kembali`, `tgl_pinjam`) VALUES
('PM001', 'BK003', 'Devvan', '', '2021-06-01', '2021-05-25');

--
-- Triggers `pinjam`
--
DELIMITER $$
CREATE TRIGGER `jml_after_pinjam` AFTER INSERT ON `pinjam` FOR EACH ROW UPDATE buku SET buku.jumlah = buku.jumlah -1 WHERE buku.id_buku = new.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Admin Perpus', 'adminperpus@gmail.com', 'default.jpg', '$2y$10$78AcXeDyq/P5wHpHCLpXGe.fW/X50Z7.A3iAN8ZCs8FxC6lmnENk2', 1, 1, 1621899495),
(2, 'Petugas Perpus', 'petugasperpus@gmail.com', 'default.jpg', '$2y$10$OBJJYXEaxzpoZpPyAPkziObZ7y2OSyCX8a0mDH.JUrOszlJB4FBxW', 2, 1, 1621899531);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id_pengarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
