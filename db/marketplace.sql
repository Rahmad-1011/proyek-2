-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 04:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Makanan Kering', 'makanan-kering', '2022-01-04 05:46:04', '2022-01-09 16:17:31'),
(2, 'Makanan Basah', 'makanan-basah', '2022-01-04 05:46:12', '2022-01-09 16:17:41'),
(3, 'Aksesoris', 'aksesoris', '2022-01-04 05:46:20', '2022-01-09 16:17:47'),
(4, 'Baju dan Kain', 'baju-dan-kain', '2022-01-04 05:47:09', '2022-01-09 16:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(10) NOT NULL,
  `produk_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `bintang` int(10) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `parent` int(10) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `produk_id`, `user_id`, `bintang`, `konten`, `parent`, `bukti`, `created_at`, `updated_at`) VALUES
(21, 25, 24, NULL, 'Ape kau pa pe pa pe', 16, NULL, '2022-07-26 10:07:05', '2022-07-26 10:07:05'),
(22, 29, 16, 5, 'Bajunya bagus banget bang', 0, 'app/images/bukti/pesanan/-1658918489-1RKdC.webp', '2022-07-27 03:41:29', '2022-07-27 03:41:29'),
(23, 29, 25, NULL, 'terima kasih supportnya', 22, NULL, '2022-07-27 03:42:18', '2022-07-27 03:42:18'),
(24, 28, 16, 4, 'gelangnya bagus banget', 0, 'app/images/bukti/pesanan/-1658919302-tqVEA.jpg', '2022-07-27 03:55:02', '2022-07-27 03:55:02'),
(25, 28, 25, NULL, 'terima kasih supportnya', 24, NULL, '2022-07-27 03:57:58', '2022-07-27 03:57:58'),
(26, 31, 16, 4, 'Enak banget masih segar', 0, 'app/images/bukti/pesanan/-1658919509-dgYhu.jpg', '2022-07-27 03:58:29', '2022-07-27 03:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tarif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id`, `nama`, `tarif`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Kojek', '10000', '2022-06-30 11:03:56', '2022-06-30 11:03:56', NULL),
(3, 'OkJon', '10000', '2022-07-10 06:02:06', '2022-07-10 06:02:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_06_16_120225_create_provinces_table', 1),
(5, '2022_06_16_120505_create_cities_table', 1),
(6, '2022_06_16_120623_create_couriers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `kode_asal` varchar(255) DEFAULT NULL,
  `kode_tujuan` varchar(255) DEFAULT NULL,
  `kurir_id` int(10) DEFAULT NULL,
  `tarif` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `atas_nama` varchar(255) DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama`, `atas_nama`, `nomor`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'DANA', 'Rahmad Ardianto', '0895702460425', 'app/images/pembayaran/-1641302551-82BYL.jpg', '2022-01-04 06:22:31', '2022-07-03 19:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah_harga` int(10) DEFAULT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `nama_penerima` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `berat` varchar(255) DEFAULT NULL,
  `pembayaran_id` int(10) DEFAULT NULL,
  `kurir_id` int(10) DEFAULT NULL,
  `no_hp` char(15) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `tanggal`, `jumlah_harga`, `total_harga`, `nama_penerima`, `alamat`, `berat`, `pembayaran_id`, `kurir_id`, `no_hp`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(66, 16, '2022-07-27', 80000, 90000, 'Rahmad Ardianto', 'jl. gusti hamzah, kelurahan kauman, kecamatan benua kayong', NULL, 1, 1, '0895702460425', 'app/images/pesanan/66-1658918399-BeATQ.webp', 6, '2022-07-27 03:37:15', '2022-07-27 03:43:39'),
(67, 16, '2022-07-27', 20000, 30000, 'Andi', 'jl. gusti hamzah, kelurahan kauman, kecamatan benua kayong', NULL, 1, 1, '0895322316876', 'app/images/pesanan/67-1658918777-zzxEE.jpg', 6, '2022-07-27 03:44:14', '2022-07-27 03:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id` int(10) NOT NULL,
  `pesanan_id` int(10) DEFAULT NULL,
  `produk_id` int(10) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `jumlah_harga` int(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id`, `pesanan_id`, `produk_id`, `jumlah`, `jumlah_harga`, `status`, `bukti`, `catatan`, `created_at`, `updated_at`) VALUES
(75, 66, 29, 1, 80000, 6, 'app/images/bukti/pesanan/75-1658918489-eC6Du.webp', NULL, '2022-07-27 03:37:15', '2022-07-27 03:43:39'),
(76, 67, 28, 2, 10000, 6, 'app/images/bukti/pesanan/76-1658919302-nUbF5.jpg', NULL, '2022-07-27 03:44:14', '2022-07-27 03:57:08'),
(77, 67, 31, 1, 10000, 6, 'app/images/bukti/pesanan/77-1658919509-T75el.jpg', NULL, '2022-07-27 03:44:26', '2022-07-27 04:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `berat` int(10) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_kategori` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `berat`, `stok`, `harga`, `foto`, `deskripsi`, `id_kategori`, `user_id`, `created_at`, `updated_at`) VALUES
(28, 'Gelang Tangan Tali', 100, 198, 5000, 'app/images/produk/-1658916195-e5vva.jpg', '<p>Gelang terbuat dari tali</p><p>Stok sangat terbatas teman-teman.</p><p>Silahkan dipesan</p>', 3, 25, '2022-07-27 03:03:17', '2022-07-27 03:46:17'),
(29, 'Baju Kaos', 100, 249, 80000, 'app/images/produk/-1658916337-KMdBI.webp', '<p>Baju kece nih gaes</p><p>Mari dibeli, terbuat dari bahan kualitas bagus</p>', 3, 25, '2022-07-27 03:05:37', '2022-07-27 03:39:59'),
(30, 'Baju Kemeja Pantai Kece', 100, 250, 100000, 'app/images/produk/-1658916872-O9DnF.webp', '<p>Baju kemeja pantai kece nih gaesssss.</p><p>Mari kenakan baju keren ini sekaranggg</p>', 4, 25, '2022-07-27 03:14:32', '2022-07-27 03:14:32'),
(31, 'Tempoyak', 500, 24, 10000, 'app/images/produk/-1658917061-x7hQe.jpg', '<p>Tempoyak baru, durian sukadana nihh.......</p>', 2, 26, '2022-07-27 03:17:42', '2022-07-27 03:46:17'),
(32, 'Lempok Durian Asli', 200, 50, 20000, 'app/images/produk/-1658917174-ypADD.jpg', '<p>Dijamin enak, dari durian sukadana nih bos kuuuuu</p>', 2, 26, '2022-07-27 03:19:34', '2022-07-27 03:19:34'),
(33, 'Amplang kemasan 250g', 250, 200, 12000, 'app/images/produk/-1658917356-lAMP9.jpg', '<p>Dari ikan tenggiri asli, bukan ikan teri ya.</p>', 1, 24, '2022-07-27 03:22:36', '2022-07-27 03:22:36'),
(34, 'Amplang kemasan 500g', 500, 200, 20000, 'app/images/produk/-1658917405-7hvXQ.jpg', '<p>Kemasan lebih besar dan lebih hemat</p>', 1, 24, '2022-07-27 03:23:25', '2022-07-27 03:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(10) NOT NULL,
  `kode_asal` varchar(255) DEFAULT NULL,
  `kode_tujuan` varchar(255) DEFAULT NULL,
  `tarif` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `kode_asal`, `kode_tujuan`, `tarif`, `created_at`, `updated_at`) VALUES
(1, 'BK', 'BK', 5000, '2022-07-21 08:10:08', '2022-07-21 08:10:08'),
(2, 'BK', 'DP', 10000, '2022-07-21 08:11:50', '2022-07-21 08:11:50'),
(3, 'DP', 'DP', 5000, '2022-07-21 08:12:02', '2022-07-21 08:12:02'),
(4, 'DP', 'BK', 10000, '2022-07-21 08:12:13', '2022-07-21 08:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `no_hp` char(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_asal` varchar(255) DEFAULT NULL,
  `nama_pemilik_toko` varchar(255) DEFAULT NULL,
  `pembayaran_nama` varchar(255) DEFAULT NULL,
  `pembayaran_nomor` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `remember_token`, `level`, `no_hp`, `foto`, `alamat`, `kode_asal`, `nama_pemilik_toko`, `pembayaran_nama`, `pembayaran_nomor`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
(14, 'Admin', 'admin@gmail.com', '$2y$10$80fDj5gdZyoKhb/l/rryfO9kad783qyI86uxq3eCngtzizvfrZ4HO', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-09 12:30:23', '2022-01-09 12:30:23'),
(16, 'Rahmad', 'rahmadardianto69@gmail.com', '$2y$10$qvJB6G00nuVai/4lH10KiOB/tGrbtABZ/Gq7Z3NZvMCPbvKOEFIJm', NULL, 2, '0895702460425', 'app/images/user/16-1657387674-AtrrD.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-09 12:54:19', '2022-07-10 11:07:11'),
(24, 'Toko Baru Oleh-oleh', 'email@gmail.com', '$2y$10$Bmvak6W3zHEm.I4kD3kLTOGyV2xjjfTJkNzSt8RqXB5suIg62IkxO', NULL, 1, '0895702460425', 'app/images/user/24-1658917222-9SOSf.png', 'Jl Gusti Hamzah', 'BK', NULL, 'DANA / Toko Baru', '0895322316876', NULL, '2022-06-16 05:51:45', '2022-07-27 03:20:22'),
(25, 'Store Oleh-oleh', 'store@gmail.com', '$2y$10$pMsCQW72PASeCCpo9a0QFOyKwlr9q8rkfCKqV0PiulrlkVbac.DvK', NULL, 1, '080808880808', 'app/images/user/25-1658916746-OpFEC.png', 'Jl. Gusti Hamzah Kauman', NULL, NULL, 'DANA / Angah', '080808880808', NULL, '2022-07-03 03:43:35', '2022-07-27 03:12:26'),
(26, 'toko', 'toko1@gmail.com', '$2y$10$/OLH9kNb4jAzmJk2uELLDOVvY2egE1yprt2CSYbzCX2QZWT.deBge', NULL, 1, '08909909090', 'app/images/user/26-1658916963-sTN8x.png', 'Sepakat, delta pawan', NULL, NULL, 'DANA / Andak', '08909909090', NULL, '2022-07-09 09:07:37', '2022-07-27 03:16:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
