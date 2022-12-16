-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2022 pada 18.47
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelimask`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(250) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `alamat`) VALUES
(1, 'Sekolah Vokasi IPB University Jl. Kumbang No.14, RT.02/RW.06, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128 a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentangkami`
--

CREATE TABLE `tentangkami` (
  `id` int(11) NOT NULL,
  `isi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tentangkami`
--

INSERT INTO `tentangkami` (`id`, `isi`) VALUES
(1, 'Website ini dibuat untuk masyarakat Sekolah Vokasi IPB untuk melihat lokasi pengumpulan sampah masker. Website ini juga diisi oleh informasi-informasi penting mengenai bahayanya limbah masker dan solusi yang ingin kami tawarkan untuk menanggulangi pembludakan limbah masker di area Sekolah Vokasi IPB. Solusi kami dalam penanggulangan membludaknya limbah masker adalah dengan membuat satu pengumpulan limbah masker di area Sekolah Vokasi IPB, lalu limbah yang telah terkumpul akan salurkan langsung ke bank sampah yang berada di sekitar Kota Bogor.'),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, ''),
(32, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin1', 'admin1107'),
(2, 'admin2', 'd57c24f744286bb254cc106d216aa2d5'),
(3, 'admin3', '3eec31b68b74bfc3d92f1c44f66845ad'),
(4, 'admin4', '30418c33fa9e2e8df76e6b69b12d4fc5'),
(6, 'admin5', 'admin5'),
(7, 'kukuh', 'kukuh'),
(8, 'gilang', 'gilang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_artikel`
--

CREATE TABLE `t_artikel` (
  `id_artikel` int(250) NOT NULL,
  `judul` varchar(300) DEFAULT NULL,
  `gambar` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_artikel`
--

INSERT INTO `t_artikel` (`id_artikel`, `judul`, `gambar`) VALUES
(29, 'Cara Mengolah Limbah Masker Yang Baik dan Benar', '504-art-4.png'),
(31, '6 Dampak Limbah Masker Medis yang Mengintai Selama Pandemik COVID-19', '971-bahaya_limbah.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sampah`
--

CREATE TABLE `t_sampah` (
  `id_sampah` int(250) NOT NULL,
  `minggu_ke` varchar(250) NOT NULL,
  `jumlah_masker` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_sampah`
--

INSERT INTO `t_sampah` (`id_sampah`, `minggu_ke`, `jumlah_masker`) VALUES
(1, '1', '10'),
(2, '2', '25'),
(4, '3', '21'),
(6, '4', '6'),
(8, '5', '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `tentangkami`
--
ALTER TABLE `tentangkami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `t_artikel`
--
ALTER TABLE `t_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `t_sampah`
--
ALTER TABLE `t_sampah`
  ADD PRIMARY KEY (`id_sampah`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tentangkami`
--
ALTER TABLE `tentangkami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_artikel`
--
ALTER TABLE `t_artikel`
  MODIFY `id_artikel` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `t_sampah`
--
ALTER TABLE `t_sampah`
  MODIFY `id_sampah` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
