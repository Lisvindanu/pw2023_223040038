-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2023 at 03:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int NOT NULL,
  `gambar` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` char(200) DEFAULT NULL,
  `brand` char(200) DEFAULT NULL,
  `harga` decimal(10,3) DEFAULT NULL,
  `detail` char(200) DEFAULT NULL,
  `kategori` varchar(200) DEFAULT NULL,
  `kategori_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `gambar`, `nama`, `brand`, `harga`, `detail`, `kategori`, `kategori_id`) VALUES
(1, '647770adc82e5.jpg', 'a', 'b', 11.000, 'c', 'ayam', NULL),
(2, '64758f56a23dd.jpg', 'sepatup', 'naiki', 20000.000, 'ori', 'ayam', NULL),
(3, '6464a7082dad0.jpg', 'afat', 'babi', 100000.000, 'Sepatu Olahraga Lari Marathon', NULL, NULL),
(4, '646a6f417464b.jpg', 'Danu', 'goreng', 100000.000, 'Sepatu Olahraga Lari Marathon', NULL, NULL),
(5, '646a70067af55.jpg', 'Danu', 'goreng', 100000.000, 'zelda', NULL, NULL),
(6, '646a70678c7cd.jpg', 'baju', 'goreng', 100000.000, 'Sepatu Olahraga Lari Marathon', NULL, NULL),
(7, '646a767da277b.jpg', 'Danu', 'babi', 100000.000, 'zelda', 'ayam', 1),
(8, '646ab86edc519.jpg', 'Tono', 'goreng', 100000.000, 'zelda', 'babi', 2),
(9, '64728fe60173e.jpeg', 'aaaa', 'ss', 12222.000, 'dd', 'dd', 3),
(10, '6474eaf255279.png', 'Danu', 'goreng', 10.000, 'Sepatu Olahraga Lari Marathon', 'ayam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'ayam'),
(2, 'babi'),
(3, 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `kategori_id` int DEFAULT NULL,
  `jumlah` int NOT NULL,
  `lunas` tinyint(1) DEFAULT '0',
  `total_harga` int DEFAULT NULL,
  `harga` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `user_id`, `item_id`, `kategori_id`, `jumlah`, `lunas`, `total_harga`, `harga`) VALUES
(5, 16, 1, NULL, 1, 1, NULL, NULL),
(6, 16, 8, 2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `total_harga` decimal(10,3) DEFAULT NULL,
  `tanggal_pembayaran` datetime DEFAULT CURRENT_TIMESTAMP,
  `total_pembayaran` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `user_id`, `total_harga`, `tanggal_pembayaran`, `total_pembayaran`) VALUES
(33, 18, 12222.000, '2023-05-28 09:22:08', 12222.000),
(34, 18, 100000.000, '2023-05-28 09:23:53', 100000.000),
(35, 18, 100000.000, '2023-05-28 09:26:42', 100000.000),
(36, 15, 0.000, '2023-05-29 09:40:56', 0.000),
(37, 15, 0.000, '2023-05-29 09:41:07', 0.000),
(38, 15, 0.000, '2023-05-29 09:41:39', 0.000),
(39, 15, 0.000, '2023-05-29 09:41:53', 0.000),
(40, 15, 0.000, '2023-05-29 09:42:49', 0.000),
(41, 19, 100000.000, '2023-05-29 09:43:23', 100000.000),
(42, 20, 100000.000, '2023-05-29 11:31:55', 100000.000),
(43, 20, 100000.000, '2023-05-29 11:36:09', 100000.000),
(44, 20, 0.000, '2023-05-29 11:38:17', 0.000),
(45, 20, 0.000, '2023-05-29 11:38:28', 0.000),
(46, 20, 0.000, '2023-05-29 03:18:32', 0.000),
(47, 20, 0.000, '2023-05-29 03:42:07', 0.000),
(48, 20, 100000.000, '2023-05-29 03:46:25', 100000.000),
(49, 15, 0.000, '2023-05-29 10:48:46', 0.000),
(50, 15, 100000.000, '2023-05-30 01:10:42', 100000.000),
(51, 15, 0.000, '2023-05-30 01:11:13', 0.000),
(52, 4, 10.000, '2023-05-30 01:12:18', 10.000),
(53, 15, 0.000, '2023-05-31 12:04:53', 0.000),
(54, 15, 100000.000, '2023-05-31 12:05:56', 100000.000),
(55, 15, 12222.000, '2023-06-01 07:43:24', 12222.000),
(56, 15, 112222.000, '2023-06-01 07:44:06', 112222.000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(3, 'hedi', '$2y$10$08ks9y7rEgDbbOyUqRto7.AIm7emEQwwCkafpY01H7uj0PSscnQpa', 'user'),
(4, 'lisvindanu', '$2y$10$8ZitzIvizTzKyRskappOR.1yQwdpOoLwQfquHt83bXtWdnc6zLi0m', 'admin'),
(5, 'doni', '$2y$10$eeXFCqyX1JDe2yZQpN3.w.2rc82QzHhpnrD0wZPIS.ik0xvu.TnT.', 'user'),
(6, 'dragnell', '$2y$10$q3qEllbtE844oH1bBc1.jOH46sl6m/QV/BQE2XjLzjfseEei9QjVq', 'user'),
(7, 'pakih', '$2y$10$eKoz9KgrSLB6TXrTPXFWiOXdEQoKQtyJaucEF4W3XpSjf7wNm4MEu', 'user'),
(8, 'unad', '$2y$10$Y2hGsTCAud0eR5ZIfvMrueSaRTzDyVmVDoD5RMRpj2O52sHD0Nzpy', 'user'),
(9, 'pandu', '$2y$10$wyRv3TpIHnle55SAmviZB.Bi6lu0Jc6N3X1Tt4NuFDoWWfzKh.0H2', 'user'),
(10, 'unaddgacor', '$2y$10$oqFScCIRcGliUNGGR9ayeuLoEtK.oRKmXOqud9vmVDEz4lqxVkiP6', 'user'),
(11, 'unaddgacor1', '$2y$10$KvTExxJ0dgojS0INMb8r2OcMP0.Etf1O2uax7DJJcQVqabI2.6cfi', 'user'),
(12, 'q', '$2y$10$2XQmgOXjuouRKagftlLmOuTs56tXyRgcUxEnI5FHqCvagcxlMpmKS', 'user'),
(13, 'und1', '$2y$10$yIRV7gOOCynjqcIGe9iW7.p63zH3yzZfD3WUyVa//i6SPtnxTnW.i', 'user'),
(14, 'unad12', '$2y$10$xKCC/MPubtJQiVHqzij1POh.KNhATjXzgR/5jfEY75ssznZDqyOke', 'admin'),
(15, 'a', '$2y$10$/IpzhG/4ksKt.d6YGdwiW.Bh2TsrgsjvdEQdODzZ9QR/8lgTzKfiC', 'user'),
(16, 'as', '$2y$10$HFDQePCm5wmY4eljJmCIX.8XznpRVoQQvIsAgphucnzLHlZJkluWq', 'user'),
(17, 's', '$2y$10$dM9Dtl1O/naeoy6PhOBIXuzXLG7DWHqbvgSlcXKzLTgrRFlVSzCea', 'user'),
(18, 'pp', '$2y$10$V/qR/9Fn9yOFq0QDsCRw2OmpvZ130RvPZqXhd7BSMXJzkhxVpRIZC', 'user'),
(19, 't', '$2y$10$bRH97mFQUS91kjxcQbzK2e0oLQ/FgoOCTNaja2Vv2.Br3zvfueHFW', 'user'),
(20, 'ahmad', '$2y$10$1dclEpbrigQgZsGFnVNuN.S9Qgx87ee5bDFV1KAouQWBPHjccokha', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_users` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_pembayaran_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
