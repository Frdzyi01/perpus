-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Des 2023 pada 19.04
-- Versi server: 5.7.33
-- Versi PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@admin.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(125) NOT NULL,
  `kategori_buku` varchar(125) NOT NULL,
  `penerbit` varchar(125) NOT NULL,
  `pengarang` varchar(125) NOT NULL,
  `tahun_terbit` varchar(125) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `judul_buku_baik` varchar(20) NOT NULL,
  `judul_buku_rusak` varchar(20) NOT NULL,
  `jumlah_buku_tersedia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `id_buku`, `judul_buku`, `kategori_buku`, `penerbit`, `pengarang`, `tahun_terbit`, `isbn`, `judul_buku_baik`, `judul_buku_rusak`, `jumlah_buku_tersedia`) VALUES
(11, '1', '1', '1', '1', '1', '1', '1', '9', '11', '100'),
(12, '12', 'belajar php', 'test', 'riyan', 'riyan', '2023', '2399', '100', '100', '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `Nisn` int(35) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `Jenis_Kelamin` varchar(35) NOT NULL,
  `Agama` varchar(35) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Nomor_Telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `Nama_Lengkap`, `Nisn`, `kelas`, `Jenis_Kelamin`, `Agama`, `Alamat`, `Nomor_Telepon`) VALUES
(12, 'binsiatang', 213, 'VII', 'Laki-Laki', 'Islam', 'depok', '0812188110188'),
(13, 'titi', 10291, '', 'Laki-Laki', 'Islam', 'dpk', '1111000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kembali`
--

CREATE TABLE `tabel_kembali` (
  `id` int(11) NOT NULL,
  `kode_peminjaman` int(200) NOT NULL,
  `nama_siswa` text NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `tujuan_pinjam` varchar(255) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tenggat_pengembalian` date NOT NULL,
  `jumlah_buku_dipinjam` varchar(255) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `jumlah_buku_dikembalikan` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pinjam`
--

CREATE TABLE `tabel_pinjam` (
  `id` int(11) NOT NULL,
  `nama_siswa` text NOT NULL,
  `jenis_kelamin` text,
  `kelas` varchar(50) NOT NULL,
  `kode_peminjaman` int(200) NOT NULL,
  `judul_buku` text NOT NULL,
  `penerbit` varchar(125) NOT NULL,
  `pengarang` varchar(125) NOT NULL,
  `tahun_terbit` varchar(125) NOT NULL,
  `tujuan_pinjam` text NOT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `jumlah_buku_dipinjam` int(11) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tabel_pinjam`
--

INSERT INTO `tabel_pinjam` (`id`, `nama_siswa`, `jenis_kelamin`, `kelas`, `kode_peminjaman`, `judul_buku`, `penerbit`, `pengarang`, `tahun_terbit`, `tujuan_pinjam`, `tanggal_peminjaman`, `tanggal_pengembalian`, `jumlah_buku_dipinjam`, `status`) VALUES
(13, 'titi', 'Laki-Laki', 'VII', 39191729, '1', '1', '1', '1', 'Membaca Buku', '1111-11-11', '2222-02-11', 100, 'Belum dikembalikan'),
(14, 'binsiatang', 'Laki-Laki', 'VII', 73018908, '', '', '', '', 'Meminjam Buku', '2000-02-02', '2000-02-04', 101, 'Belum dikembalikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `id` int(11) NOT NULL,
  `Nama_Lengkap` varchar(255) NOT NULL,
  `Nisn` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `Jenis_Kelamin` varchar(255) NOT NULL,
  `Agama` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Nomor_Telepon` varchar(255) NOT NULL,
  `Tanggal_Pendaftaran` varchar(255) NOT NULL,
  `Tanggal_Ubah` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_kembali`
--
ALTER TABLE `tabel_kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_pinjam`
--
ALTER TABLE `tabel_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tabel_kembali`
--
ALTER TABLE `tabel_kembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_pinjam`
--
ALTER TABLE `tabel_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
