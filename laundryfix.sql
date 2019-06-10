-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2019 pada 20.03
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundryfix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuci`
--

CREATE TABLE `cuci` (
  `no_transaksi` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED DEFAULT NULL,
  `kd_pakaian` int(10) UNSIGNED DEFAULT NULL,
  `nama_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_cucian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `berat_pakaian` int(10) UNSIGNED NOT NULL,
  `jenis_pengharum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_pelayanan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paket` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(10) UNSIGNED NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cuci`
--

INSERT INTO `cuci` (`no_transaksi`, `id_customer`, `kd_pakaian`, `nama_customer`, `no_telp`, `alamat`, `jenis_cucian`, `berat_pakaian`, `jenis_pengharum`, `jenis_pelayanan`, `paket`, `harga`, `tgl_terima`, `tgl_selesai`) VALUES
(1, 1, 1, 'Eros', '088811112222', 'Depok', 'Baju', 1, 'Lavender', 'Cuci', 'Reguler', 6000, '2019-05-02', '2019-05-05'),
(2, 2, 1, 'Daniel', '087873941697', 'Sudirman', 'Baju', 1, 'Lavender', 'Cuci + Setrika', 'Reguler', 8000, '2019-05-02', '2019-05-05'),
(5, 5, 1, 'Daniel', '087873941697', 'Jatijajar', 'Baju', 1, 'Lavender', 'Cuci', 'Reguler', 6000, '2019-05-02', '2019-05-05'),
(6, 6, 1, 'Fattah', '087873941632', 'Jatijajar', 'Celana', 1, 'Rose', 'Cuci', 'Express', 10000, '2019-05-03', '2019-05-04'),
(7, 7, 1, 'Daniel', '087873941697', 'Sudirman', 'Baju', 1, 'Lavender', 'Cuci + Setrika', 'Reguler', 8000, '2019-06-11', '2019-06-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(10) UNSIGNED NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id_customer`, `nama_customer`, `alamat`, `no_telp`) VALUES
(1, 'Eros', 'Depok', '088811112222'),
(2, 'Daniel', 'Sudirman', '087873941697'),
(3, '', '', ''),
(4, 'd', 'd', '7'),
(5, 'Daniel', 'Jatijajar', '087873941697'),
(6, 'Fattah', 'Jatijajar', '087873941632'),
(7, 'Daniel', 'Sudirman', '087873941697');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2019_04_02_154939_create_table_customer', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakaian`
--

CREATE TABLE `pakaian` (
  `kd_pakaian` int(10) UNSIGNED NOT NULL,
  `jenis_cucian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `berat_pakaian` int(10) UNSIGNED NOT NULL,
  `jenis_pengharum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_pelayanan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paket` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pakaian`
--

INSERT INTO `pakaian` (`kd_pakaian`, `jenis_cucian`, `berat_pakaian`, `jenis_pengharum`, `jenis_pelayanan`, `paket`, `harga`) VALUES
(1, 'Baju', 1, 'Lavender', 'Cuci', 'Reguler', 6000),
(2, 'Baju', 1, 'Lavender', 'Cuci + Setrika', 'Reguler', 8000),
(3, 'Baju', 0, 'Lavender', 'Cuci', 'Reguler', 0),
(4, 'Baju', 0, 'Lavender', 'Cuci', 'Reguler', 0),
(5, 'Baju', 1, 'Lavender', 'Cuci', 'Reguler', 6000),
(6, 'Celana', 1, 'Rose', 'Cuci', 'Express', 10000),
(7, 'Baju', 1, 'Lavender', 'Cuci + Setrika', 'Reguler', 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Rio Christian', 'daniel41697@gmail.com', '$2y$12$PIyiHeR5BDSwwjUD8tA8NuoXxYY9ecA0OARz/rTVGl31HsmPTrV6G', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'eros', 'eros@gmail.com', '$2y$10$CvGS3r2cbXP7ueY9brixcesAUq.esLTupUn.VxOhuqTOm9gWvE9rK', NULL, '2019-05-02 18:01:26', '2019-05-02 18:01:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuci`
--
ALTER TABLE `cuci`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `cuci_id_customer_foreign` (`id_customer`),
  ADD KEY `cuci_kd_pakaian_foreign` (`kd_pakaian`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`kd_pakaian`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cuci`
--
ALTER TABLE `cuci`
  MODIFY `no_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pakaian`
--
ALTER TABLE `pakaian`
  MODIFY `kd_pakaian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cuci`
--
ALTER TABLE `cuci`
  ADD CONSTRAINT `cuci_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuci_kd_pakaian_foreign` FOREIGN KEY (`kd_pakaian`) REFERENCES `pakaian` (`kd_pakaian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
