-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2024 pada 15.36
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `nik` varchar(250) NOT NULL,
  `nama_customer` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `foto_kk` varchar(100) NOT NULL,
  `foto_diri` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Pendanda untuk melihat cara daftarnya'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nik`, `nama_customer`, `jenis_kelamin`, `alamat`, `no_hp`, `id_sales`, `foto_ktp`, `foto_kk`, `foto_diri`, `status`) VALUES
(1, '443536333435', 'Asep', 'laki-laki', 'subang', '866789567', 3, '', '', '', 1),
(4, '366565653665', 'Gerin Sena Pratamasd', '', 'Dusun Cikembang\r\nDesa Bangunjaya, kec subang', '2147483647', 1, 'PLL-LCDINT1602-01.jpg', 'PLL-JAMDIG4R1.5KITNS-00.jpg', 'PLL-FAJACK-01-00.jpg', 2),
(5, '8901234', 'Angga Saja', 'Laki-Laki', 'Ciamis', '085759854144', 1, '', '', '', 0),
(6, '58878417', 'Kepin', 'laki-laki', 'Ciamis', '085759803544', 1, '', '', '', 2),
(7, '1234', 'paseo', 'Perempuan', 'sds', '08574156565', 1, '', '', '', 0),
(10, '323213', 'Samplesd', 'Laki-Laki', '', '233', 1, 'PLL-JAMDIG4R1.5-00.jpg', 'PLL-JQMP5008-00.jpg', 'PLL-HPF810-00.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_halaman`
--

CREATE TABLE `tbl_halaman` (
  `id` int(11) NOT NULL,
  `nama_halaman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_halaman`
--

INSERT INTO `tbl_halaman` (`id`, `nama_halaman`) VALUES
(1, 'produk'),
(2, 'akun_sales'),
(3, 'pengajuan_harga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
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
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `status_show`, `icon_kategori`, `create_date`, `create_by`, `update_date`, `update_by`) VALUES
(3, 'Rumah', 1, 'Artboard_8.png', '2024-02-25 21:05:56', 1, '0000-00-00 00:00:00', 0),
(4, 'Hotel dan villa', 1, 'Artboard_8.png', '2024-02-25 21:06:07', 1, '2024-02-28 22:48:12', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuanharga`
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
-- Dumping data untuk tabel `tbl_pengajuanharga`
--

INSERT INTO `tbl_pengajuanharga` (`id_pengajuanharga`, `tanggal_pengajuan`, `id_produk`, `id_sales`, `id_customer`, `harga`, `status_approve`) VALUES
(1, '2024-02-29 00:00:00', 1, 1, 1, 1000000, 2),
(2, '2024-03-01 00:00:00', 1, 1, 1, 100000, 2),
(3, '2024-03-04 00:00:00', 1, 1, 1, 2000000, 2),
(4, '2024-03-04 00:00:00', 10, 1, 1, 2000000, 2),
(5, '2024-03-03 20:56:52', 10, 1, 5, 1500000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_halaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_permission`
--

INSERT INTO `tbl_permission` (`id`, `id_user`, `id_halaman`) VALUES
(1, 2, 1),
(2, 2, 2),
(6, 2, 3),
(7, 9, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `hargaawal` int(11) NOT NULL,
  `deskripsi_produk` varchar(5000) NOT NULL,
  `durasi_iklan` int(11) NOT NULL,
  `status_show` int(11) NOT NULL,
  `gambar1` varchar(500) NOT NULL,
  `gambar2` varchar(500) NOT NULL,
  `gambar3` varchar(500) NOT NULL,
  `gambar4` varchar(500) NOT NULL,
  `gambar5` varchar(500) NOT NULL,
  `gambar6` varchar(255) DEFAULT NULL,
  `gambar7` varchar(255) DEFAULT NULL,
  `gambar8` varchar(255) DEFAULT NULL,
  `gambar9` varchar(255) DEFAULT NULL,
  `gambar10` varchar(255) DEFAULT NULL,
  `gambar11` varchar(255) DEFAULT NULL,
  `gambar12` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `id_kategori`, `nama_produk`, `hargaawal`, `deskripsi_produk`, `durasi_iklan`, `status_show`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `gambar6`, `gambar7`, `gambar8`, `gambar9`, `gambar10`, `gambar11`, `gambar12`, `create_date`, `create_by`, `update_date`, `update_by`) VALUES
(1, 3, 'oli', 0, '<p>oli</p>', 2, 1, '7021228adf09729becef9e314e496122.PNG', '7d2380a3df120d3eb8b404601e2c2b53.jpg', '51287285e30ff43eb4adcf99eeb0c646.png', 'f37e6361e15b4ad45dc0877ffa8b5cbb.png', '071bf2a67ae58168007f46ddd7678bce.PNG', 'ca4c762d1a9569ca9e33cc0fa165018a.png', '73b3ed837d5ed4aea895ce20b16aa5cf.png', 'ac2d90adbc4198c6902742938cc52ff8.png', '96b1ef72d2c7c77f9c7c7f606e0cd643.jpg', 'dc5bbf665a29121ea239ed86953dc48a.png', 'abf1ba9ea787c146bb18565797422f02.png', 'c8f548def4f1a911b7698362750f1050.PNG', '2024-03-01 23:58:47', 2, '2024-03-02 01:48:22', 2),
(10, 3, 'Rumah', 0, '<p>rumah</p>', 2, 1, '2ddc350e9edaf8d9ada8b58d6d451ab6.jpg', '7d2380a3df120d3eb8b404601e2c2b53.jpg', '51287285e30ff43eb4adcf99eeb0c646.png', 'f37e6361e15b4ad45dc0877ffa8b5cbb.png', 'df80707fc60b1e9aef9273c9b237f291.jpg', 'ca4c762d1a9569ca9e33cc0fa165018a.png', '73b3ed837d5ed4aea895ce20b16aa5cf.png', 'ac2d90adbc4198c6902742938cc52ff8.png', '96b1ef72d2c7c77f9c7c7f606e0cd643.jpg', 'dc5bbf665a29121ea239ed86953dc48a.png', 'abf1ba9ea787c146bb18565797422f02.png', 'c8f548def4f1a911b7698362750f1050.PNG', '2024-03-01 23:58:47', 2, '2024-03-08 20:48:27', 1),
(11, 3, 'Rumah', 0, '<p>rumah</p>', 2, 1, '7021228adf09729becef9e314e496122.PNG', '7d2380a3df120d3eb8b404601e2c2b53.jpg', '51287285e30ff43eb4adcf99eeb0c646.png', 'f37e6361e15b4ad45dc0877ffa8b5cbb.png', '071bf2a67ae58168007f46ddd7678bce.PNG', 'ca4c762d1a9569ca9e33cc0fa165018a.png', '73b3ed837d5ed4aea895ce20b16aa5cf.png', 'ac2d90adbc4198c6902742938cc52ff8.png', '96b1ef72d2c7c77f9c7c7f606e0cd643.jpg', 'dc5bbf665a29121ea239ed86953dc48a.png', 'abf1ba9ea787c146bb18565797422f02.png', 'c8f548def4f1a911b7698362750f1050.PNG', '2024-03-04 23:58:47', 2, '2024-02-29 01:48:22', 2),
(12, 3, 'Contoh', 0, '<p>deskripsi contoh produk</p>', 3, 1, '5a5e79556f1d93e7a539a840d634a3f5.JPG', '', '', '', '', '', '', '', '', '', '', '', '2024-03-03 20:45:51', 2, '2024-03-03 20:46:25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Sales');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `id_sales` int(11) NOT NULL,
  `nama_sales` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `foto_kk` varchar(100) NOT NULL,
  `foto_diri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sales`
--

INSERT INTO `tbl_sales` (`id_sales`, `nama_sales`, `jenis_kelamin`, `alamat`, `no_hp`, `foto_ktp`, `foto_kk`, `foto_diri`) VALUES
(1, 'Sales', 'Laki-Laki', 'Bandung', '085759803544', 'PLL-JAMDIG4R1.5-00.jpg', 'PLL-MAJACK-01-00.jpg', 'PLL-HPF810-00.jpg'),
(5, 'Sample data sales 2', 'Laki-Laki', 'Bandung', '085759803544', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
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
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `image`, `password`, `role_id`, `sales_id`, `is_active`, `tanggal_daftar`) VALUES
(1, 'Super Admin', 'superadmin', 'default.png', '$2a$12$Jrr3LkXySuUKIDTBhm0eKu3kKpuFgULxoDeH6GlBbSVcbTti9MODe', 1, NULL, 1, '2021-01-01'),
(2, 'Admin', 'admin', 'default.png', '$2a$12$f6sFtY5FHZ.ftWogUTXvHe4NlPK4WC0xS.TaVQ6p5DxfeDty24BJq', 2, NULL, 1, '2024-02-28'),
(8, 'Sample data sales 2', 'sales2', 'default.png', '$2y$10$0PgCYxgYH3x9kLNm6xFCHeoYBkadNqt7Q1DZcvcio01moCyRMld2W', 3, 5, 1, '2024-02-29'),
(9, 'Admin2', 'admin2', 'default.png', '$2a$12$f6sFtY5FHZ.ftWogUTXvHe4NlPK4WC0xS.TaVQ6p5DxfeDty24BJq', 2, NULL, 1, '2024-03-02'),
(10, 'Sales1', 'sales', 'default.png', '$2y$10$utXNUhniVEXW100KV6Nm2emLuyrvss25uDyn13RMhHNxOe6.j8Xv2', 3, 1, 1, '2024-03-03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tbl_halaman`
--
ALTER TABLE `tbl_halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_pengajuanharga`
--
ALTER TABLE `tbl_pengajuanharga`
  ADD PRIMARY KEY (`id_pengajuanharga`);

--
-- Indeks untuk tabel `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_halaman`
--
ALTER TABLE `tbl_halaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuanharga`
--
ALTER TABLE `tbl_pengajuanharga`
  MODIFY `id_pengajuanharga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
