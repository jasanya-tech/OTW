-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2022 pada 13.11
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `password` varchar(224) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Id_admin`, `email`, `nama`, `foto`, `password`, `jenis_kelamin`) VALUES
(1, 'admin@gmail.com', 'admin', 'default.jpg', '$2y$10$GdQVDcz27jBSChiIlVRwsucXGe/lfJ1SRquOIQ92p9QQi0Rlffdxe', 'laki-laki'),
(2, 'admin2@gmail.com', 'admin2', 'default.jpg', '$2y$10$3rvH/11mdh8.Zj0yUlzdtebaKqS27EnH8UZitwoDw.4pIju9nEvay', 'laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `tanggal_kunjungan`, `bukti_bayar`) VALUES
(2, 2, '2022-11-23', 'bukti_1669611080.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `fasilitas_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`fasilitas_id`, `image`, `title`) VALUES
(6, 'fasilitas_1669608990.jpg', 'Fasilitas 1'),
(7, 'fasilitas_1669609182.jpg', 'Fasilitas 2'),
(8, 'fasilitas_1669609672.jpg', 'Fasilitas 3'),
(9, 'fasilitas_1669609685.jpg', 'Fasilitas 4'),
(10, 'fasilitas_1669609698.jpg', 'Fasilitas 5'),
(11, 'fasilitas_1669609714.jpg', 'Fasilitas 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `Id_MP` int(11) NOT NULL,
  `jenis_pembayaran` varchar(10) NOT NULL,
  `no_account` varchar(20) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`Id_MP`, `jenis_pembayaran`, `no_account`, `logo`) VALUES
(1, 'BCA', '24089241224', 'bca.jpeg'),
(3, 'Paypal', '131445644', 'payp.png'),
(5, 'Gopay', '1198471491', 'gopay.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `Id_pengunjung` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(224) NOT NULL,
  `no_handphone` varchar(13) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `jenis_kelamin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`Id_pengunjung`, `nama`, `email`, `password`, `no_handphone`, `foto`, `jenis_kelamin`) VALUES
(1, 'pengunjung', 'pengunjung@gmail.com', '$2y$10$GdQVDcz27jBSChiIlVRwsucXGe/lfJ1SRquOIQ92p9QQi0Rlffdxe', '1234567890', 'default.jpg', 'l'),
(3, 'vina', 'vina@gmail.com', '$2y$10$8YtElGHyXBKGjVEPZYExFOu5ju4CE33DYk2FZDH33LmbqV8AfD.MK', '081234673738', 'default.jpg', 'p');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `Id_tiket` int(11) NOT NULL,
  `kategori_hari` varchar(15) NOT NULL,
  `harga` double NOT NULL,
  `jam_mulai_kunjungan` time NOT NULL,
  `jam_selesai_kunjungan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`Id_tiket`, `kategori_hari`, `harga`, `jam_mulai_kunjungan`, `jam_selesai_kunjungan`) VALUES
(1, 'Weekday', 70000, '07:00:00', '17:00:00'),
(2, 'Weekend', 100000, '06:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `qty` int(11) NOT NULL,
  `Id_transaksi` int(11) NOT NULL,
  `Total` double NOT NULL,
  `Tanggal_transaksi` varchar(10) NOT NULL,
  `Id_pengunjung` int(11) NOT NULL,
  `Id_MP` int(11) NOT NULL,
  `Id_admin` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Belum dikonfirmasi',
  `id_tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`qty`, `Id_transaksi`, `Total`, `Tanggal_transaksi`, `Id_pengunjung`, `Id_MP`, `Id_admin`, `status`, `id_tiket`) VALUES
(1, 2, 100000, '28-11-2022', 3, 5, 1, 'Terkonfirmasi', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`fasilitas_id`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`Id_MP`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`Id_pengunjung`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`Id_tiket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id_transaksi`),
  ADD KEY `Id_pengunjung` (`Id_pengunjung`),
  ADD KEY `Id_MP` (`Id_MP`),
  ADD KEY `Id_admin` (`Id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `fasilitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `Id_MP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `Id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `Id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`Id_pengunjung`) REFERENCES `pengunjung` (`Id_pengunjung`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`Id_MP`) REFERENCES `metode_pembayaran` (`Id_MP`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`Id_admin`) REFERENCES `admin` (`Id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
