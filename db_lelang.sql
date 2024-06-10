-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 06:53 PM
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
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `image`, `created_at`) VALUES
(1, 'lelang1.png', '2024-06-09 15:39:04'),
(2, 'lelang2.png', '2024-06-09 15:39:04'),
(3, 'lelang3.png', '2024-06-09 15:39:14');

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
  `no_hp` varchar(20) NOT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `foto_kk` varchar(100) NOT NULL,
  `foto_diri` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Pendanda untuk melihat cara daftarnya',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nik`, `nama_customer`, `jenis_kelamin`, `alamat`, `no_hp`, `id_sales`, `foto_ktp`, `foto_kk`, `foto_diri`, `status`, `create_date`, `update_date`, `create_by`, `update_by`) VALUES
(1, '443536333435', 'Asep', '', 'subang', '866789567', 3, 'gudeg.jpeg', 'iphone-2.png', 'prambanan.jpeg', 1, '2024-06-07 00:09:43', '2024-06-07 00:09:43', '', ''),
(4, '366565653665', 'Gerin Sena Pratamasd', '', 'Dusun Cikembang\r\nDesa Bangunjaya, kec subang', '2147483647', 1, 'PLL-LCDINT1602-01.jpg', 'PLL-JAMDIG4R1.5KITNS-00.jpg', 'PLL-FAJACK-01-00.jpg', 2, '2024-06-07 00:09:43', '2024-06-07 00:09:43', '', ''),
(5, '8901234', 'Angga Saja', 'Laki-Laki', 'Ciamis', '085759854144', 1, '', '', '', 0, '2024-06-07 00:09:43', '2024-06-07 00:09:43', '', ''),
(6, '58878417', 'Kepin', 'laki-laki', 'Ciamis', '085759803544', 1, '', '', '', 2, '2024-06-07 00:09:43', '2024-06-07 00:09:43', '', ''),
(7, '1234', 'paseo', 'Perempuan', 'sds', '08574156565', 1, '', '', '', 0, '2024-06-07 00:09:43', '2024-06-07 00:09:43', '', ''),
(10, '323213', 'Samplesd', 'Laki-Laki', '', '233', 1, '5de6275e32a96.jpg', '68eddcea02ceb29abde1b1c752fa29eb.jpg', 'a.PNG', 0, '2024-06-07 00:09:43', '2024-06-07 01:03:25', '', 'Super Admin'),
(11, '98343948984', 'Cust 1', 'Laki-Laki', '-', '089988080', 1, '68eddcea02ceb29abde1b1c752fa29eb.jpg', '5de6275e32a96.jpg', 'a.PNG', 0, '2024-06-07 01:05:04', '2024-06-07 01:05:04', '10', NULL),
(12, '98343948984', 'Cust 1', 'Laki-Laki', '-', '089988080', 1, '68eddcea02ceb29abde1b1c752fa29eb.jpg', '5de6275e32a96.jpg', 'a.PNG', 0, '2024-06-07 01:05:04', '2024-06-07 01:05:04', '10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_halaman`
--

CREATE TABLE `tbl_halaman` (
  `id` int(11) NOT NULL,
  `nama_halaman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_halaman`
--

INSERT INTO `tbl_halaman` (`id`, `nama_halaman`) VALUES
(1, 'produk'),
(2, 'akun_sales'),
(3, 'pengajuan_harga');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`id`, `id_menu`, `nama`, `keterangan`, `tanggal`) VALUES
(1, 1, 'Super Admin', 'Super Admin mengupload banner', '2024-06-09 21:57:09'),
(2, 1, 'Super Admin', 'Super Admin menghapus banner', '2024-06-09 21:57:14'),
(3, 3, 'Super Admin', 'Super Admin mengupdate data info', '2024-06-09 22:01:15'),
(4, 11, 'Super Admin', 'Super Admin mengupdate data tentang kami', '2024-06-09 22:01:20'),
(5, 5, 'Super Admin', 'Super Admin menambah data kategori produk', '2024-06-10 00:34:40'),
(6, 5, 'Super Admin', 'Super Admin mengupdate data kategori produk', '2024-06-10 00:51:33'),
(7, 4, 'Super Admin', 'Super Admin menambah data produk', '2024-06-10 22:38:19'),
(8, 4, 'Super Admin', 'Super Admin menghapus data produk', '2024-06-10 22:39:02'),
(9, 4, 'Super Admin', 'Super Admin menambah data produk', '2024-06-10 22:39:53'),
(10, 4, 'Super Admin', 'Super Admin mengupdate data produk', '2024-06-10 23:26:10'),
(11, 4, 'Super Admin', 'Super Admin mengupdate data produk', '2024-06-10 23:27:02'),
(12, 4, 'Super Admin', 'Super Admin mengupdate data produk', '2024-06-10 23:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `id` int(11) NOT NULL,
  `telepon` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `maps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `telepon`, `email`, `alamat`, `maps`) VALUES
(1, 81111, 'test2@mail.com', 'Jl. Surapati 113-121, Cihaur Geulis, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40122', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15835.88918965466!2d108.5391041636467!3d-7.12920096213613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f6dec10eb39af%3A0x83f3782802159722!2sSDN%204%20Subang!5e0!3m2!1sid!2sid!4v1717005713741!5m2!1sid!2sid\" width=\"100%\" height=\"450\" style=\"border:0; border-radius:0.5rem;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

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
  `update_by` int(11) NOT NULL,
  `input_produk` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `status_show`, `icon_kategori`, `create_date`, `create_by`, `update_date`, `update_by`, `input_produk`) VALUES
(3, 'Rumah', 1, 'Artboard_8.png', '2024-02-25 21:05:56', 1, '0000-00-00 00:00:00', 0, NULL),
(4, 'Hotel dan villa', 1, 'Artboard_8.png', '2024-02-25 21:06:07', 1, '2024-02-28 22:48:12', 1, NULL),
(5, 'kendaraan', 1, '5de6275e32a96.jpg', '2024-06-10 00:34:40', 1, '2024-06-10 00:51:33', 1, '[{\"nama_input\":\"stnk\",\"tipe_data\":\"text\"},{\"nama_input\":\"tanggal_expired\",\"tipe_data\":\"date\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `nama_menu`) VALUES
(1, 'Banner'),
(2, 'Profil'),
(3, 'Info'),
(4, 'Produk'),
(5, 'Kategori produk'),
(6, 'Sales'),
(7, 'Permission'),
(8, 'Customer'),
(9, 'Akun Admin'),
(10, 'Pengajuan harga'),
(11, 'Tentang Kami'),
(12, 'Akun Sales');

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
(1, '2024-02-29 00:00:00', 1, 1, 1, 1000000, 2),
(2, '2024-03-01 00:00:00', 1, 1, 1, 100000, 2),
(3, '2024-03-04 00:00:00', 1, 1, 1, 2000000, 2),
(4, '2024-03-04 00:00:00', 10, 1, 1, 2000000, 2),
(5, '2024-03-03 20:56:52', 10, 1, 5, 1500000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_halaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`id`, `id_user`, `id_halaman`) VALUES
(1, 2, 1),
(2, 2, 2),
(6, 2, 3),
(7, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `hargaawal` int(11) NOT NULL,
  `deskripsi_produk` varchar(5000) NOT NULL,
  `info_penyelenggara` varchar(5000) NOT NULL,
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
  `update_by` int(11) NOT NULL,
  `detail_produk` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `id_kategori`, `nama_produk`, `hargaawal`, `deskripsi_produk`, `info_penyelenggara`, `durasi_iklan`, `status_show`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `gambar6`, `gambar7`, `gambar8`, `gambar9`, `gambar10`, `gambar11`, `gambar12`, `create_date`, `create_by`, `update_date`, `update_by`, `detail_produk`) VALUES
(1, 3, 'oli', 0, '<p>oli</p>', '', 2, 1, '7021228adf09729becef9e314e496122.PNG', '7d2380a3df120d3eb8b404601e2c2b53.jpg', '51287285e30ff43eb4adcf99eeb0c646.png', 'f37e6361e15b4ad45dc0877ffa8b5cbb.png', '071bf2a67ae58168007f46ddd7678bce.PNG', 'ca4c762d1a9569ca9e33cc0fa165018a.png', '73b3ed837d5ed4aea895ce20b16aa5cf.png', 'ac2d90adbc4198c6902742938cc52ff8.png', '96b1ef72d2c7c77f9c7c7f606e0cd643.jpg', 'dc5bbf665a29121ea239ed86953dc48a.png', 'abf1ba9ea787c146bb18565797422f02.png', 'c8f548def4f1a911b7698362750f1050.PNG', '2024-03-01 23:58:47', 2, '2024-03-02 01:48:22', 2, NULL),
(10, 3, 'Rumah', 0, '<p>rumah</p>', '', 2, 1, '2ddc350e9edaf8d9ada8b58d6d451ab6.jpg', '7d2380a3df120d3eb8b404601e2c2b53.jpg', '51287285e30ff43eb4adcf99eeb0c646.png', 'f37e6361e15b4ad45dc0877ffa8b5cbb.png', 'df80707fc60b1e9aef9273c9b237f291.jpg', 'ca4c762d1a9569ca9e33cc0fa165018a.png', '73b3ed837d5ed4aea895ce20b16aa5cf.png', 'ac2d90adbc4198c6902742938cc52ff8.png', '96b1ef72d2c7c77f9c7c7f606e0cd643.jpg', 'dc5bbf665a29121ea239ed86953dc48a.png', 'abf1ba9ea787c146bb18565797422f02.png', 'c8f548def4f1a911b7698362750f1050.PNG', '2024-03-01 23:58:47', 2, '2024-03-08 20:48:27', 1, NULL),
(11, 3, 'Rumah', 0, '<p>rumah</p>', '', 2, 1, '7021228adf09729becef9e314e496122.PNG', '7d2380a3df120d3eb8b404601e2c2b53.jpg', '51287285e30ff43eb4adcf99eeb0c646.png', 'f37e6361e15b4ad45dc0877ffa8b5cbb.png', '071bf2a67ae58168007f46ddd7678bce.PNG', 'ca4c762d1a9569ca9e33cc0fa165018a.png', '73b3ed837d5ed4aea895ce20b16aa5cf.png', 'ac2d90adbc4198c6902742938cc52ff8.png', '96b1ef72d2c7c77f9c7c7f606e0cd643.jpg', 'dc5bbf665a29121ea239ed86953dc48a.png', 'abf1ba9ea787c146bb18565797422f02.png', 'c8f548def4f1a911b7698362750f1050.PNG', '2024-03-04 23:58:47', 2, '2024-02-29 01:48:22', 2, NULL),
(12, 3, 'Contoh produk makanan', 0, '<p>deskripsi contoh produk</p>', 'test aja ya', 3, 1, '5a5e79556f1d93e7a539a840d634a3f5.JPG', '', '', '', '', '', '', '', '', '', '', '', '2024-03-03 20:45:51', 2, '2024-03-03 20:46:25', 1, NULL),
(13, 4, 'test ds', 0, '<p>sds</p>', 'Test ya saja', 232, 0, '473ab25182d7d5169a0b48fb7ef6e73f.jpeg', '', '', '', '', '', '', '', '', '', '', '', '2024-03-10 15:07:14', 1, '2024-03-10 15:08:07', 1, NULL),
(15, 5, 'Contoh', 100000, '', '-', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '2024-06-10 22:39:53', 1, '2024-06-10 23:27:36', 1, '{\"stnk\":\"no stnk\",\"tanggal_expired\":\"2024-06-10\"}');

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
  `no_hp` varchar(20) NOT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `foto_kk` varchar(100) NOT NULL,
  `foto_diri` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id_sales`, `nama_sales`, `jenis_kelamin`, `alamat`, `no_hp`, `foto_ktp`, `foto_kk`, `foto_diri`, `create_date`, `update_date`, `create_by`, `update_by`) VALUES
(1, 'Sales', 'Laki-Laki', 'Bandung', '085759803544', 'a.PNG', '5de6275e32a96.jpg', 'kebudayaan.jpg', '2024-06-07 00:11:41', '2024-06-07 00:11:41', '', ''),
(5, 'Sample data sales 2', 'Laki-Laki', 'Bandung', '085759803544', '', '', '', '2024-06-07 00:11:41', '2024-06-07 00:11:41', '', ''),
(6, 'sales baru edit', 'Laki-Laki', 'jl xxx nomor cxxxx', '098979909090', '', '', '', '2024-06-07 00:25:10', '2024-06-07 00:31:21', 'Super Admin', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tentangkami`
--

CREATE TABLE `tbl_tentangkami` (
  `id` int(11) NOT NULL,
  `visi_misi` text NOT NULL,
  `sejarah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tentangkami`
--

INSERT INTO `tbl_tentangkami` (`id`, `visi_misi`, `sejarah`) VALUES
(1, 'Menjadi flatform aplikasi lelang online yang bermartabat dan berdaulat', '<p>Kisah kami dimulai pada tahun 1971 di sepanjang jalan berbatu di Pasar Pike Place yang bersejarah di Seattle. Di sinilah Starbucks membuka toko pertamanya, menawarkan biji kopi segar, teh, dan rempah-rempah dari seluruh dunia untuk dibawa pulang oleh pelanggan kami. Nama kami terinspirasi oleh kisah klasik, “Moby-Dick,” yang membangkitkan tradisi pelaut para pedagang kopi masa awal.</p><p><br></p><p>            Sepuluh tahun kemudian, seorang pemuda New York bernama Howard Schultz berjalan melewati pintu ini dan terpesona dengan kopi Starbucks sejak tegukan pertamanya. Setelah bergabung dengan perusahaan tersebut pada tahun 1982, jalan berbatu yang berbeda akan membawanya ke penemuan lain. Dalam perjalanannya ke Milan pada tahun 1983 Howard pertama kali mengunjungi kedai kopi Italia, dan dia kembali ke Seattle dengan inspirasi untuk membawa kehangatan dan kesenian budaya kopi Italia ke Starbucks. Pada tahun 1987, kami mengganti celemek coklat kami dengan celemek hijau dan memulai babak berikutnya sebagai kedai kopi.</p><p><br></p><p>            Starbucks akan segera berekspansi ke Chicago dan Vancouver, Kanada, lalu ke California, Washington, DC, dan New York. Pada tahun 1996, kami akan melintasi Pasifik untuk membuka toko pertama kami di Jepang, diikuti oleh Eropa pada tahun 1998 dan Tiongkok pada tahun 1999. Selama dua dekade berikutnya, kami akan berkembang untuk menyambut jutaan pelanggan setiap minggunya dan menjadi bagian dari struktur perusahaan puluhan ribu lingkungan di seluruh dunia. Dalam segala hal yang kami lakukan, kami selalu berdedikasi pada Misi Kami: Dengan setiap cangkir, setiap percakapan, dengan setiap komunitas - kami memupuk kemungkinan tak terbatas dalam hubungan antar manusia.</p>');

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
(8, 'Sample data sales 2', 'sales2', 'default.png', '$2y$10$0PgCYxgYH3x9kLNm6xFCHeoYBkadNqt7Q1DZcvcio01moCyRMld2W', 3, 5, 1, '2024-02-29'),
(9, 'Admin2', 'admin2', 'default.png', '$2a$12$f6sFtY5FHZ.ftWogUTXvHe4NlPK4WC0xS.TaVQ6p5DxfeDty24BJq', 2, NULL, 1, '2024-03-02'),
(10, 'Sales1', 'sales', 'default.png', '$2y$10$utXNUhniVEXW100KV6Nm2emLuyrvss25uDyn13RMhHNxOe6.j8Xv2', 3, 1, 1, '2024-03-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_halaman`
--
ALTER TABLE `tbl_halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengajuanharga`
--
ALTER TABLE `tbl_pengajuanharga`
  ADD PRIMARY KEY (`id_pengajuanharga`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_tentangkami`
--
ALTER TABLE `tbl_tentangkami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_halaman`
--
ALTER TABLE `tbl_halaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pengajuanharga`
--
ALTER TABLE `tbl_pengajuanharga`
  MODIFY `id_pengajuanharga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_tentangkami`
--
ALTER TABLE `tbl_tentangkami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
