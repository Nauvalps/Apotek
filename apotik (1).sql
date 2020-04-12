-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2020 pada 04.55
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kry` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_kry`, `pass`, `nama`, `alamat`, `no_hp`, `level`) VALUES
('admin', '0192023a7bbd73250516f069df18b500', 'Admin ', 'Jl. Perum Zamrud Blok R-4 No.16, RT.2/RW.12, Padurenan, Mustikajaya, Kota Bks, Jawa Barat 16340, Indonesia\r\nJl. Perum Zamrud Blok R-4 No.16, RT.2/RW.12, Padurenan, Mustikajaya, Kota Bks, Jawa Barat 16340, Indonesia', '089521638587', '1'),
('nauval', '0e56bae75829b6356d66bdfab62da3bd', 'nauvalpurnomo', 'jlana sadasdasdasdasda', '9809808', '2'),
('syahrul927', 'e10adc3949ba59abbe56e057f20f883e', 'Syahrul Ataufik', 'Perumahan Taman Alamanda Blok A16 No 28 R 06 RW 11 Tambun Utara Bekasi Timur', '0895333302590', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `kd_layanan` varchar(15) NOT NULL,
  `nama_lyn` varchar(20) NOT NULL,
  `harga_layanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`kd_layanan`, `nama_lyn`, `harga_layanan`) VALUES
('LN001', 'Cek Darah', 10000),
('LN002', 'Cek Gula', 15000),
('LN003', 'Cek Kolesterol', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_detail`
--

CREATE TABLE `layanan_detail` (
  `kd_nota` varchar(10) NOT NULL,
  `kd_layanan` varchar(15) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `pasien_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan_detail`
--

INSERT INTO `layanan_detail` (`kd_nota`, `kd_layanan`, `sub_total`, `pasien_id`) VALUES
('T002', 'LN001', 10000, 'PS001'),
('T005', 'LN001', 10000, 'PS001'),
('T005', 'LN002', 15000, 'PS001'),
('T003', 'LN002', 15000, 'PS002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` char(20) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'obat.jpg',
  `kd_obat` varchar(5) NOT NULL,
  `harga_obat` int(11) NOT NULL,
  `Stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`nama_obat`, `jenis_obat`, `gambar`, `kd_obat`, `harga_obat`, `Stock`) VALUES
('Mixagrip', 'Cair', 'obat.jpg', 'OB002', 9000, 97),
('Laserin', 'Tablet', 'obat.jpg', 'OB003', 8000, 98),
('Obat Nyamuk', 'Kapsul', 'obat.jpg', 'OB004', 8000, 98),
('Obat Batuk', 'Tablet', 'obat.jpg', 'OB007', 6500, 59),
('Vitacimin', 'Tablet', 'OB008.png', 'OB008', 1500, 178),
('Bodrex', 'Kapsul', 'OB009.jpg', 'OB009', 10000, 98);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_detail`
--

CREATE TABLE `obat_detail` (
  `id` int(11) NOT NULL,
  `kd_nota` varchar(15) NOT NULL,
  `kd_obat` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat_detail`
--

INSERT INTO `obat_detail` (`id`, `kd_nota`, `kd_obat`, `qty`, `sub_total`) VALUES
(1, 'T001', 'OB001', 1, 5000),
(2, 'T001', 'OB001', 1, 5000),
(3, 'T002', 'OB001', 1, 5000),
(4, 'T002', 'OB001', 1, 5000),
(5, 'T004', 'OB008', 10, 15000);

--
-- Trigger `obat_detail`
--
DELIMITER $$
CREATE TRIGGER `obat` AFTER INSERT ON `obat_detail` FOR EACH ROW BEGIN
UPDATE obat SET Stock=Stock-NEW.qty WHERE kd_obat = NEW.kd_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `pasien_id` varchar(15) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `keluhan` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`pasien_id`, `nama_pasien`, `tanggal_lahir`, `keluhan`, `no_hp`, `alamat`) VALUES
('PS001', 'Tegar', '1999-08-25', 'Selalu ngeluh ', '081234123131', 'Tambun                                         ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_nota` varchar(10) NOT NULL,
  `type_trans` int(11) NOT NULL,
  `id_ksr` varchar(10) NOT NULL,
  `tgl` datetime NOT NULL,
  `ttl` int(11) NOT NULL,
  `byr` int(11) NOT NULL,
  `kmbl` int(11) NOT NULL,
  `stst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kd_nota`, `type_trans`, `id_ksr`, `tgl`, `ttl`, `byr`, `kmbl`, `stst`) VALUES
('T001', 1, 'nauval', '2019-12-30 22:28:17', 10000, 10000, 0, 1),
('T002', 1, 'nauval', '2019-12-30 22:30:26', 10000, 10000, 0, 1),
('T003', 2, 'nauval', '2020-01-14 14:06:14', 15000, 20000, 5000, 1),
('T004', 1, 'nauval', '2020-01-15 00:15:29', 15000, 20000, 5000, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`kd_layanan`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indeks untuk tabel `obat_detail`
--
ALTER TABLE `obat_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`pasien_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_nota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `obat_detail`
--
ALTER TABLE `obat_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
