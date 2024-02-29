-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 11:57 AM
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
-- Database: `db_lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `nik` varchar(250) NOT NULL,
  `nama_customer` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'Pendanda untuk melihat cara daftarnya'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nik`, `nama_customer`, `jenis_kelamin`, `alamat`, `no_hp`, `id_sales`, `status`) VALUES
(1, '443536333435', 'Asep', 'laki-laki', 'subang', 866789567, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL,
  `status_show` int(11) NOT NULL,
  `icon_kategori` varchar(250) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `status_show`, `icon_kategori`, `create_date`, `create_by`, `update_date`, `update_by`) VALUES
(3, 'Sample Kategori', 1, 'Artboard 11.png', '2024-02-25 21:05:56', 1, '0000-00-00 00:00:00', 0),
(4, 'Kategori Contoh', 1, 'Artboard 13.png', '2024-02-25 21:06:07', 1, '2024-02-28 22:48:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuanharga`
--

CREATE TABLE `tbl_pengajuanharga` (
  `id_pengajuanharga` int(11) NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_approve` int(11) NOT NULL COMMENT 'Untuk penanda pengajuan harga tampil di landing page'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuanharga`
--

INSERT INTO `tbl_pengajuanharga` (`id_pengajuanharga`, `tanggal_pengajuan`, `id_produk`, `id_sales`, `id_customer`, `harga`, `status_approve`) VALUES
(1, '2024-02-29 00:00:00', 1, 1, 1, 1000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `deskripsi_produk` varchar(5000) NOT NULL,
  `durasi_iklan` int(11) NOT NULL,
  `status_show` int(11) NOT NULL,
  `gambar1` varchar(500) NOT NULL,
  `gambar2` varchar(500) NOT NULL,
  `gambar3` varchar(500) NOT NULL,
  `gambar4` varchar(500) NOT NULL,
  `gambar5` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `id_kategori`, `nama_produk`, `deskripsi_produk`, `durasi_iklan`, `status_show`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `create_date`, `create_by`, `update_date`, `update_by`) VALUES
(1, 4, 'Oli', '<p>test</p>', 3, 1, '', '', '', '', '', '2024-02-28 22:35:15', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `id_sales` int(11) NOT NULL,
  `nama_sales` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id_sales`, `nama_sales`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
(1, 'Sample data sales', 'Laki-Laki', 'Bandung', '085759803544'),
(5, 'Sample data sales 2', 'Laki-Laki', 'Bandung', '085759803544');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(130) NOT NULL,
  `username` varchar(50) NOT NULL,
  `image` varchar(130) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `sales_id` int(11) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `image`, `password`, `role_id`, `sales_id`, `is_active`, `tanggal_daftar`) VALUES
(1, 'Super Admin', 'superadmin', 'default.png', '$2a$12$Jrr3LkXySuUKIDTBhm0eKu3kKpuFgULxoDeH6GlBbSVcbTti9MODe', 1, NULL, 1, '2021-01-01'),
(2, 'Admin', 'admin', 'default.png', '$2a$12$f6sFtY5FHZ.ftWogUTXvHe4NlPK4WC0xS.TaVQ6p5DxfeDty24BJq', 2, NULL, 1, '2024-02-28'),
(8, 'Sample data sales 2', 'sales2', 'default.png', '$2y$10$0PgCYxgYH3x9kLNm6xFCHeoYBkadNqt7Q1DZcvcio01moCyRMld2W', 3, 5, 1, '2024-02-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pengajuanharga`
--
ALTER TABLE `tbl_pengajuanharga`
  ADD PRIMARY KEY (`id_pengajuanharga`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengajuanharga`
--
ALTER TABLE `tbl_pengajuanharga`
  MODIFY `id_pengajuanharga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
