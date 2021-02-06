-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2021 pada 00.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `level` int(1) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `telp`, `level`, `aktif`) VALUES
(1, 'Admin Didik Setiawan', 'admin', '$2y$10$.tcZ7gxbLDkYoB/LR4nNpuHYZ.X1.UfUpq0Fm./VPAhKXG3Ws8Cgi', '085806021328', 1, 1),
(2, 'Didik versi petugas', 'petugas', '$2y$10$sCaK9cxf/WHkDz83w926XuR0j2LLprD8Cw2IW.uX5DQMn5OwZvXMq', '082331771144', 2, 1),
(5, 'M. Hakim', 'petugas2', '$2y$10$9vYmDTdg2k6xjzKmRwe1HuMkEbhANU3dzgwSVwc2J/i9BKorsIY.G', '082337889765', 2, 1),
(6, 'Aditya Ramadhan', 'petugas3', '$2y$10$0WfutqucmLI3DWZo1w4Cf.t2O7746K9kmANT.vYdtBrm2TBQhrdle', '081654321234', 1, 1),
(7, 'Amelia Safitri', 'petugas4', '$2y$10$Vu4qftq9W6vSL5mDudHLOui9G8SXU/Uzm4DY1h97bCGN2IFWtGIpu', '082334556778', 2, 1),
(8, 'Yeni Putriana', 'petugas5', '$2y$10$OzkiWMgET7ZIVq.XtP7lquQ/zflqdOnOluDjwsSofaIqnDEiGiWBC', '082654321234', 2, 1),
(9, 'Budi Utomo', 'petugas6', '$2y$10$95xt86nWXHJMtJgAbp1kA.vlSjJp/8v.JbnLFFftbihZCR0KGBKUW', '082331771140', 2, 1),
(10, 'Dimas April Wahyudi', 'petugas7', '$2y$10$49ZLsgDOI9REjhVhP6QDOelpUyf4hMeW/isthnJeUGMJszEqcSlYG', '082331779886', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `tgl_bergabung` int(11) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_masyarakat`, `nik`, `nama`, `username`, `password`, `telp`, `tgl_bergabung`, `aktif`) VALUES
(1, '99872427', 'Didik setiawan', 'didik', '$2y$10$8rSNwI7T9B0y62p7kBf.auWolhnW3haBI21WnYnK292ZzxB.VB5LG', '085330986412', 1612344272, 1),
(6, '006633998', 'didiksetya', 'dicks', '$2y$10$qmJP6vWD8JiLZfGfD8lTNuVjVNwx359QMkStqvp/gjTCZrqs8DPZa', '086775442339', 1612400970, 1),
(7, '097623167', 'ahmad adiem', 'ahdim', '$2y$10$tVjY1aYf4KFbA6XIk9uwle0Ps8ydRsqsSVwgpYZoEpnO19zeHFVii', '085346823019', 1612428713, 1),
(8, '887253897', 'siti badriah', 'sibad', '$2y$10$P50eL8kYMA44yBf8WkhmvOZHsN0rUI.k48bTnOdXU4AbPLSpdAlqy', '081445772313', 1612428845, 1),
(9, '996251786', 'wawan ahmad', 'wamad', '$2y$10$ju2wG6QM/gasz5N/QeNWbuMh4PtJ3Gg1vIwcAjHFxVGOCJxoD9Jta', '085332779885', 1612428969, 1),
(10, '876223654', 'wildhan nur', 'wilnur', '$2y$10$pBwQnBrKoIXg3QVHT2Chj./yyGIdMklOIKxVTjwXjVyxjiJM0S9ru', '082775389076', 1612429015, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_masyarakat` int(15) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `id_masyarakat`, `isi_pengaduan`, `foto`, `status`, `tanggal`) VALUES
(1612504691, 7, 'Banjir di desa wanorejo', 'anjir.jpeg', 1, '2021-02-05'),
(1612504834, 1, 'Kebakaran Hutan di hutan jati lor', 'kebakaran.jpeg', 1, '2021-02-05'),
(1612504948, 1, 'Pencurian motor di depan toko emas adi djaya terekam cctv', 'curianmotor.jpeg', 1, '2021-02-05'),
(1612505206, 10, 'Jalan rusak di  timur terminal giwangan', 'jlnrusak.jpeg', 1, '2021-02-05'),
(1612505290, 10, 'Longsor di tebing bukit sinar jaya', 'longsor.jpeg', 1, '2021-02-05'),
(1612515778, 7, 'Kecelakaan Lalu Lintas di jalan lintas selatan', 'kecelakaan.jpeg', 0, '2021-02-05'),
(1612515818, 7, 'Kebakaran hutan pinus', 'kebakaran1.jpeg', 0, '2021-02-05'),
(1612515992, 9, 'Jalan rusak di utara jembatan kalibata', 'jlnrusak1.jpeg', 0, '2021-02-05'),
(1612516081, 9, 'Pelaku begal terekam cctv', 'curianmotor1.jpeg', 1, '2021-02-05'),
(1612516216, 10, 'Kecelakaan maut depan kontor polda jatim', 'kecelakaan1.jpeg', 0, '2021-02-05'),
(1612516326, 1, 'Jalan Rusak di Jl kartini no 20', 'jlnrusak2.jpeg', 0, '2021-02-05'),
(1612516374, 1, 'Kecelakaan maut 1 orang tewas di timur lippo plaza', 'kecelakaan2.jpeg', 0, '2021-02-05'),
(1612547456, 8, 'Kecelakaan lalu lintas di depan pohon jati keramat', 'kecelakaan3.jpeg', 0, '2021-02-06'),
(1612554734, 1, 'Mungkin ada yang minat PC Gaming Asus ROG bisa pc saya', 'Asus_ROG_Zephyrus_G14_1.jpg', 0, '2021-02-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tanggapan`
--

CREATE TABLE `tb_tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `isi_tanggapan` text NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tanggapan`
--

INSERT INTO `tb_tanggapan` (`id_tanggapan`, `id_pengaduan`, `isi_tanggapan`, `id_admin`) VALUES
(1612508216, 1612504948, 'Ok gan nanti saya laporkan ke pihak kepolisian', 1),
(1612508894, 1612504948, 'ini hoax gan', 1),
(1612509114, 1612504948, 'Saya tadi melihatnya dan ternyata ini nyata', 5),
(1612509416, 1612505206, 'Nanti saya koordinir dengan kepala desa', 5),
(1612512073, 1612504691, 'Nanti saya kirimkan tim basarnas untuk misi penyelamatan', 1),
(1612513277, 1612505290, 'sudah ada tim banser di sana jadi jangan khawatir', 1),
(1612515634, 1612504834, 'Tim penjinak si jago merah sudah otw', 6),
(1612517929, 1612516081, 'Sudah saya kirimkan tim penyidik', 1),
(1612523965, 1612516374, 'polisi akan segera datang', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indeks untuk tabel `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
