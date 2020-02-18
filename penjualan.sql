-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2020 pada 04.59
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12


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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `satuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

<<<<<<< HEAD
INSERT INTO `barang` (`id`, `nama_barang`, `harga_jual`, `satuan`) VALUES
(1, 'Beras', 8000, 'Kg'),
(3, 'Beras Ketan', 8000, 'Kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detaildistribusi`
--

CREATE TABLE `detaildistribusi` (
  `iddist` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tglbarang` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
=======
INSERT INTO `barang` (`id`, `nama_barang`, `harga_jual`, `harga_beli`, `satuan`) VALUES
(1, 'Beras', 8000, 0, 'Kg'),
(3, 'Beras Ketan', 8000, 0, 'Kg');
>>>>>>> 5c25443b65c1d6eb648cd01c5e7f4264d2c84e0d

--
-- Dumping data untuk tabel `detaildistribusi`
--

INSERT INTO `detaildistribusi` (`iddist`, `idbarang`, `tglbarang`, `jumlah`, `subtotal`, `status`) VALUES
(1, 1, '2020-02-17', 8, 64000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpengadaan`
--

CREATE TABLE `detailpengadaan` (
  `idpengadaan` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `hargabeli` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailpengadaan`
--

INSERT INTO `detailpengadaan` (`idpengadaan`, `idbarang`, `hargabeli`, `jumlah`, `subtotal`) VALUES
(28, 1, 6000, 5, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailretur`
--

CREATE TABLE `detailretur` (
  `id_retur` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailretur`
--

<<<<<<< HEAD
INSERT INTO `detailretur` (`id_retur`, `id_barang`, `jumlah`, `status`) VALUES
(13, 1, 1, 0),
(13, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusi`
--

CREATE TABLE `distribusi` (
  `id` int(11) NOT NULL,
  `kodedistribusi` varchar(128) NOT NULL,
  `idcabang` int(11) NOT NULL,
  `tgldistribusi` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
=======
INSERT INTO `detailretur` (`id_retur`, `id_barang`, `jumlah`) VALUES
(2, 3, 1);
>>>>>>> 5c25443b65c1d6eb648cd01c5e7f4264d2c84e0d

--
-- Dumping data untuk tabel `distribusi`
--

INSERT INTO `distribusi` (`id`, `kodedistribusi`, `idcabang`, `tgldistribusi`, `total`) VALUES
(1, 'DS20021801', 10, '2020-02-18', 64000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id` int(11) NOT NULL,
  `Nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `Nama_kategori`) VALUES
(1, 'Alat Masak'),
(2, 'Alat Bersih'),
(3, 'Beras');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id` int(11) NOT NULL,
  `kodepengadaan` varchar(128) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `fotonota` varchar(256) DEFAULT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`id`, `kodepengadaan`, `tgl`, `total`, `fotonota`, `id_supplier`) VALUES
(28, 'PG20021300001', '2020-02-13', 0, '1', 0),
(29, 'PG20021400001', '0000-00-00', 0, '1', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE `retur` (
  `Id` int(11) NOT NULL,
  `koderetur` varchar(128) NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` varchar(128) NOT NULL,
  `ket_detail` varchar(128) DEFAULT NULL,
  `estimasi` int(11) NOT NULL,
  `total_retur` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `retur`
--

INSERT INTO `retur` (`Id`, `koderetur`, `id_pengadaan`, `id_supplier`, `tanggal`, `ket`, `ket_detail`, `estimasi`, `total_retur`, `status`) VALUES
(1, '', 28, 2, '2020-02-12', 'barang rusak', 'bau', 30, 1, 0),
(2, 'PG20021400001', 29, 0, '2020-02-18', '2', '1', 10, 0, 0),
(3, '', 0, 0, '0000-00-00', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tglstok` date NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok`
--

<<<<<<< HEAD
INSERT INTO `stok` (`id`, `idbarang`, `tglstok`, `stok`, `status`) VALUES
(1, 1, '2020-02-12', 1, 1),
(19, 1, '2020-02-17', 2, 1),
(20, 3, '2020-02-05', 20, 1),
(21, 3, '2020-02-01', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokcabang`
--

CREATE TABLE `stokcabang` (
  `id` int(11) NOT NULL,
  `idcabang` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tglbarang` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
=======
INSERT INTO `stok` (`id`, `idbarang`, `tglstok`, `stok`) VALUES
(1, 1, '0000-00-00', 0),
(2, 3, '2020-02-15', 1);
>>>>>>> 5c25443b65c1d6eb648cd01c5e7f4264d2c84e0d

--
-- Dumping data untuk tabel `stokcabang`
--

INSERT INTO `stokcabang` (`id`, `idcabang`, `idbarang`, `stok`, `tglbarang`, `status`) VALUES
(0, 10, 1, 8, '2020-02-17', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `Nama` varchar(128) NOT NULL,
  `Alamat` varchar(128) NOT NULL,
  `Telp` char(12) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `Nama`, `Alamat`, `Telp`, `email`) VALUES
(0, 'PT Sembako', 'Jl Juanda', '085336505990', 'sembako@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'admin', 'admin@gmail.com', '2.PNG', '$2y$10$rNAvPeUdlG/dKZMJqnDeD.yoDoJoWnrSX80CUEJ8H3aCa70ecVEEe', 1, 1, 1580701580);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 5),
(6, 1, 7),
(7, 1, 8),
(8, 2, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`) VALUES
(1, 'administrator', 'fas fa-fw fa-user-cog'),
(2, 'user', 'fas fas-fw fa-user-alt'),
(5, 'Datamaster', 'fas fa-fw fa-folder'),
(7, 'Dashboard', 'fas fa-fw fa-columns'),
(8, 'Pengadaan', 'fas fa-fw fa-asterisk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
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
(15, 8, 'Retur Barang', 'Retur', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
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
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Indeks untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_barang`
=======
-- Indexes for table `kategori_barang`
>>>>>>> 5c25443b65c1d6eb648cd01c5e7f4264d2c84e0d
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
<<<<<<< HEAD
-- AUTO_INCREMENT untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
=======
-- AUTO_INCREMENT for table `kategori_barang`
>>>>>>> 5c25443b65c1d6eb648cd01c5e7f4264d2c84e0d
--
ALTER TABLE `kategori_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `retur`
--
ALTER TABLE `retur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> 5c25443b65c1d6eb648cd01c5e7f4264d2c84e0d

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
