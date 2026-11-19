-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2026 pada 11.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lectures`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `kode_matkul` varchar(20) NOT NULL,
  `sks` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`ID`, `nama_matkul`, `kode_matkul`, `sks`, `lecture_id`) VALUES
(1, 'Pemrograman Web', 'IF101', 3, 1),
(2, 'Basis Data', 'IF102', 3, 1),
(3, 'Struktur Data', 'IF103', 3, 2),
(4, 'Pemrograman Berorientasi Objek', 'IF104', 3, 2),
(5, 'Jaringan Komputer', 'IF105', 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lectures`
--

CREATE TABLE `lectures` (
  `ID` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `NIDN` varchar(20) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `joindate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lectures`
--

INSERT INTO `lectures` (`ID`, `nama`, `NIDN`, `phone`, `joindate`) VALUES
(1, 'Ahmad Fauzi', '0012058501', '081234567890', '2020-01-15'),
(2, 'Budi Santoso', '0021087802', '081298765432', '2019-08-20'),
(3, 'Citra Lestari', '0031099003', '085712345678', '2021-03-10'),
(4, 'Dedi Kurniawan', '0042068204', '087812345678', '2018-06-05'),
(5, 'Eka Pratama', '0051078805', '082112345678', '2022-09-12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `lecture_id` (`lecture_id`);

--
-- Indeks untuk tabel `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lectures`
--
ALTER TABLE `lectures`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
