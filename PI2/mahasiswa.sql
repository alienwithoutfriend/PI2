-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Apr 2021 pada 07.22
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrak_mk`
--

CREATE TABLE `kontrak_mk` (
  `mk_id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `waktu_absen` time NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_absen`
--

INSERT INTO `tbl_absen` (`id`, `mhs_id`, `matakuliah_id`, `waktu_absen`, `status`) VALUES
(1, 4, 2, '08:30:00', 'ABSEN'),
(2, 2, 3, '08:00:00', 'ABSEN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id`, `nama`, `semester`, `alamat`, `no_tlp`, `email`) VALUES
(2, 'AGUS PERMADI', 4, 'KLAYAN', '08977553636', 'agus@gmail.com'),
(4, 'ACHMAD DANIAL M', 4, 'VILLA INTAN', '087831401860', 'ahmaddanilmubarok@gmail.com'),
(5, 'LUTHFI', 4, 'SUMBER', '860686750860', 'luthfi@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id` int(11) NOT NULL,
  `nama_mk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id`, `nama_mk`) VALUES
(1, 'PEMOGRAMAN INTERNET 1'),
(2, 'RPL - AGILE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `nim` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `tugas` int(11) DEFAULT NULL,
  `na` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`nim`, `nama`, `uts`, `uas`, `tugas`, `na`, `status`) VALUES
(2019114020, 'ACHMAD DANIAL M', 90, 95, 100, 94, 'LULUS'),
(2019114024, 'AGUS PERMADI', 90, 80, 100, 97, 'LULUS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontrak_mk`
--
ALTER TABLE `kontrak_mk`
  ADD KEY `mk_id` (`mk_id`),
  ADD KEY `mhs_id` (`mhs_id`);

--
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mhs_id_3` (`mhs_id`),
  ADD UNIQUE KEY `matakuliah_id_3` (`matakuliah_id`),
  ADD KEY `mhs_id` (`mhs_id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`),
  ADD KEY `mhs_id_2` (`mhs_id`),
  ADD KEY `matakuliah_id_2` (`matakuliah_id`),
  ADD KEY `mhs_id_4` (`mhs_id`),
  ADD KEY `matakuliah_id_4` (`matakuliah_id`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kontrak_mk`
--
ALTER TABLE `kontrak_mk`
  ADD CONSTRAINT `kontrak_mk_ibfk_1` FOREIGN KEY (`mk_id`) REFERENCES `tbl_matakuliah` (`id`),
  ADD CONSTRAINT `kontrak_mk_ibfk_2` FOREIGN KEY (`mhs_id`) REFERENCES `tbl_mahasiswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD CONSTRAINT `tbl_absen_ibfk_1` FOREIGN KEY (`mhs_id`) REFERENCES `tbl_mahasiswa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
