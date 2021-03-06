-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 05:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga_jual`, `satuan`) VALUES
(1, 'Beras', 8000, 'Kg'),
(3, 'Beras Ketan', 8000, 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `detaildistribusi`
--

CREATE TABLE `detaildistribusi` (
  `iddist` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tglbarang` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detaildistribusi`
--

INSERT INTO `detaildistribusi` (`iddist`, `idbarang`, `tglbarang`, `jumlah`, `subtotal`, `status`) VALUES
(1, 1, '2020-02-01', 8, 80000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detailpengadaan`
--

CREATE TABLE `detailpengadaan` (
  `idpengadaan` int(11) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `hargabeli` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailpengadaan`
--

INSERT INTO `detailpengadaan` (`idpengadaan`, `idbarang`, `hargabeli`, `jumlah`, `subtotal`, `status`) VALUES
(1, 1, 10000, 1234, 12340000, 1),
(2, 1, 10000, 80, 800000, 1),
(3, 1, 10000, 20, 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detailretur`
--

CREATE TABLE `detailretur` (
  `id_retur` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailretur`
--

INSERT INTO `detailretur` (`id_retur`, `id_barang`, `jumlah`, `status`) VALUES
(13, 1, 1, 0),
(13, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `id` int(11) NOT NULL,
  `kodedistribusi` varchar(128) NOT NULL,
  `idcabang` int(11) NOT NULL,
  `tgldistribusi` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`id`, `kodedistribusi`, `idcabang`, `tgldistribusi`, `total`) VALUES
(1, 'wertgyhjkl.;', 10, '2020-02-12', 852025);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id` int(11) NOT NULL,
  `Nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `Nama_kategori`) VALUES
(1, 'Alat Masak'),
(2, 'Alat Bersih'),
(3, 'Beras');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id` int(11) NOT NULL,
  `kodepengadaan` varchar(128) DEFAULT NULL,
  `idsup` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `fotonota` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id`, `kodepengadaan`, `idsup`, `tgl`, `total`, `fotonota`) VALUES
(1, 'PG20021601', 2, '2020-02-16', 12340000, 'PG20021601'),
(2, 'PG20021602', 2, '2020-02-16', 800000, 'PG20021602'),
(3, 'PG20021603', 2, '2020-02-16', 200000, 'PG20021603.jpg'),
(4, 'PG20021604', 2, '2020-02-01', 753, NULL),
(5, 'PG20021605', 2, '2020-02-02', 9652, NULL),
(6, 'PG20021606', 2, '2020-02-03', 7520, NULL),
(7, 'PG20021607', 2, '2020-02-04', 25896, NULL),
(8, 'PG20021608', 2, '2020-02-05', 555555, NULL),
(9, 'PG20021609', 2, '2020-02-06', 66165165, NULL),
(10, 'PG200216010', 2, '2020-02-07', 1551151, NULL),
(11, 'PG200216011', 2, '2020-02-08', 963, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `Id` int(11) NOT NULL,
  `koderetur` varchar(128) NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` varchar(128) NOT NULL,
  `ket_detail` varchar(128) DEFAULT NULL,
  `estimasi` int(11) NOT NULL,
  `total_retur` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`Id`, `koderetur`, `id_pengadaan`, `tanggal`, `ket`, `ket_detail`, `estimasi`, `total_retur`, `status`) VALUES
(13, 'PG20021601', 2, '2020-02-01', '1', '', 5, 0, 0),
(14, 'RT20021700001', 2, '2020-02-20', '2', '-', 30, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tglstok` date DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `idbarang`, `tglstok`, `stok`, `status`) VALUES
(1, 1, '2020-02-12', 1, 1),
(19, 1, '2020-02-17', 10, 1),
(20, 3, '2020-02-01', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stokcabang`
--

CREATE TABLE `stokcabang` (
  `id` int(11) NOT NULL,
  `idcabang` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tglbarang` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `Nama` varchar(128) NOT NULL,
  `Alamat` varchar(128) NOT NULL,
  `Telp` char(12) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `Nama`, `Alamat`, `Telp`, `email`) VALUES
(2, 'PT Sembako', 'Jl Juanda', '085336505990', 'sembako@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `telp` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `alamat`, `telp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'admin', 'admin@gmail.com', '', NULL, '2.PNG', '$2y$10$rNAvPeUdlG/dKZMJqnDeD.yoDoJoWnrSX80CUEJ8H3aCa70ecVEEe', 1, 1, 1580701580),
(10, 'cabang2', 'cabang2@gmail.com', 'jl.cabang2', '088888882', 'default.jpg', '$2y$10$quAcwMv2xsd7rR9MxfO3X.2lOiaDbNCd1QDN/MNsB1hQhb/Xqqd72', 2, 1, 1581850149);

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
(3, 2, 2),
(4, 1, 3),
(5, 1, 5),
(6, 1, 7),
(7, 1, 8),
(8, 2, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`) VALUES
(1, 'administrator', 'fas fa-fw fa-user-cog'),
(2, 'user', 'fas fas-fw fa-user-alt'),
(5, 'Datamaster', 'fas fa-fw fa-folder'),
(7, 'Dashboard', 'fas fa-fw fa-columns'),
(8, 'Pengadaan', 'fas fa-fw fa-asterisk'),
(9, 'Distribusi', 'fas fa-fw fa-folder'),
(10, 'Retur', 'fas fa-fw fa-window-restore'),
(11, 'Stok', 'fas fa-fw fa-cart');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `is_active`) VALUES
(2, 2, 'My Profile', 'user', 1),
(3, 1, 'Menu Management', 'menu', 1),
(4, 1, 'Submenu Management', 'menu/submenu', 1),
(5, 1, 'Role', 'admin/role', 1),
(6, 2, 'Edit Profile', 'user/edit', 1),
(7, 2, 'Change Password', 'user/changepassword', 1),
(12, 5, 'Supplier', 'Supplier', 1),
(13, 5, 'Barang', 'Barang', 1),
(14, 8, 'Pengadaan', 'Pengadaan', 1),
(15, 8, 'Laporan Pengadaan', 'Pengadaan/laporan', 1),
(16, 5, 'Cabang', 'Cabang', 1),
(17, 9, 'Distribusi Cabang', 'Distribusi', 1),
(18, 10, 'Retur Barang', 'Retur', 1),
(19, 10, 'Laporan Retur', 'Retur/laporan', 1),
(20, 11, 'Stok', 'Stok', 1),
(21, 9, 'Laporan Distribusi', 'Distribusi/laporan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(2, 'umairdesain@gmail.com', '2.6119356858088e76', 1580992951),
(3, 'annisaelfira19@gmail.com', '1.0658226525474e77', 1581050717),
(4, 'umairdesain@gmail.com', '5.0597123477954e76', 1581058962),
(5, 'haf@gmail.com', 'a79d8775a55d63ad5f87e95b8a1a902df80e763a11fa8bbff91fdeb4a04976ee', 1581483306),
(6, 'umairdesain@gmail.com', 'c0c08f9f737172e9b98959b1274245a8607d0d32959f8d2e7e94288bb9311557', 1581483700);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
