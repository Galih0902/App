-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2023 pada 20.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` varchar(25) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`) VALUES
(27, '11', 'INV-63015119', 5, 'HP Spectre X-360', 1, 7850000),
(28, '11', 'INV-3112547', 4, 'Baju Kemeja Wanita', 1, 150000),
(29, '11', 'INV-109111603', 5, 'HP Spectre X-360', 1, 7850000);

--
-- Trigger `cart`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `cart` FOR EACH ROW BEGIN
	UPDATE product SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Sepatu Converse', 'Sepatu Santai Pria Converse', 'Shoes', 100000, 7, 'sepatu.jpg'),
(2, 'Sepatu New Era', 'Sepatu Santai Pria New Era', 'Shoes', 300000, 13, 'era.jpg'),
(4, 'Baju Kemeja Wanita', 'Kemeja Style Modis Wanita', 'T-Shirt', 150000, 0, 'baju.jpg'),
(5, 'HP Spectre X-360', 'Laptop HP Spectre X-360', 'Electronic', 7850000, 0, 'image624ea5989d1e8.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `order_id` char(30) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL,
  `city` varchar(255) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `ekspedisi` varchar(100) NOT NULL,
  `tracking_id` varchar(30) NOT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `payment_limit` datetime DEFAULT NULL,
  `status` varchar(2) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`order_id`, `id_user`, `name`, `email`, `alamat`, `mobile_phone`, `city`, `kode_pos`, `payment_method`, `ekspedisi`, `tracking_id`, `transaction_time`, `payment_limit`, `status`, `gambar`) VALUES
('INV-109111603', '11', 'Galih', 'galihiniom@gmail.com', 'jermal 3', '082294415157', 'Medan', '227722', 'Direct Bank Transfer', 'JNE', '1082418862684', '2023-06-10 11:11:59', '2023-06-11 11:11:59', '0', NULL),
('INV-3112547', '11', 'Galih', 'galihiniom@gmail.com', 'Pintu Padang 2', '082294415157', 'Pangkal Pinang', '129890', 'Direct Bank Transfer', 'JNE', '56337465812', '2023-06-10 00:41:44', '2023-06-11 00:41:44', '0', NULL),
('INV-63015119', '11', 'Galih', 'galihiniom@gmail.com', 'padang sidempuan', '082294415157', 'Asahan', '227711', 'Direct Bank Transfer', 'J&T Express', '411996280043', '2023-06-10 00:25:13', '2023-06-11 00:25:13', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `level`, `avatar`, `address`) VALUES
(6, 'Helpdesk Shoppify', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'user.png', ''),
(11, 'Galih', 'galihiniom@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', 'user.png', 'Medan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
