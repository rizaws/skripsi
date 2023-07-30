-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Jul 2023 pada 09.00
-- Versi server: 8.0.30
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int UNSIGNED NOT NULL,
  `id_siswa` int NOT NULL,
  `ket` enum('M','I','S','A','T') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `id_siswa`, `ket`, `tgl`, `created_at`, `updated_at`) VALUES
(15, 3, 'M', '2023-06-22', NULL, NULL),
(23, 3, 'M', '2023-06-21', NULL, NULL),
(42, 3, 'M', '2023-06-28', NULL, NULL),
(43, 3, 'I', '2023-06-29', NULL, NULL),
(45, 3, 'M', '2023-07-02', NULL, NULL),
(46, 5, 'M', '2023-07-01', NULL, NULL),
(47, 6, 'I', '2023-07-01', NULL, NULL),
(48, 7, 'I', '2023-07-01', NULL, NULL),
(49, 9, 'M', '2023-07-20', NULL, NULL),
(50, 10, 'M', '2023-07-20', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_guru`
--

CREATE TABLE `absen_guru` (
  `id_absen_guru` int NOT NULL,
  `id_guru` int NOT NULL,
  `tgl` date NOT NULL,
  `ket` enum('M','I','S','A','T') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `absen_guru`
--

INSERT INTO `absen_guru` (`id_absen_guru`, `id_guru`, `tgl`, `ket`) VALUES
(3, 18, '2023-07-24', 'I'),
(4, 19, '2023-07-24', 'M'),
(9, 20, '2023-07-24', 'M'),
(10, 18, '2023-07-23', 'M'),
(11, 19, '2023-07-23', 'M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_mapel`
--

CREATE TABLE `absen_mapel` (
  `id_absen_mapel` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_mapel` int NOT NULL,
  `tgl` date NOT NULL,
  `ket` enum('M','A') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `absen_mapel`
--

INSERT INTO `absen_mapel` (`id_absen_mapel`, `id_siswa`, `id_mapel`, `tgl`, `ket`) VALUES
(3, 10, 6, '2023-07-24', 'M'),
(4, 9, 6, '2023-07-24', 'M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int NOT NULL,
  `id_siswa` int NOT NULL,
  `melanjutkan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_lulus` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_ekskul`
--

CREATE TABLE `anggota_ekskul` (
  `id_anggota_ekskul` int UNSIGNED NOT NULL,
  `id_siswa` int NOT NULL,
  `id_ekskul` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota_ekskul`
--

INSERT INTO `anggota_ekskul` (`id_anggota_ekskul`, `id_siswa`, `id_ekskul`, `created_at`, `updated_at`) VALUES
(3, 7, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekskul`
--

CREATE TABLE `ekskul` (
  `id_ekskul` int UNSIGNED NOT NULL,
  `nm_ekskul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_pembina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ekskul`
--

INSERT INTO `ekskul` (`id_ekskul`, `nm_ekskul`, `nm_pembina`, `created_at`, `updated_at`) VALUES
(1, 'Pramuka', 'Alfred Ridel', NULL, NULL),
(4, 'Futsal', 'Testing', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int UNSIGNED NOT NULL,
  `nm_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mapel` int NOT NULL,
  `posisi` enum('kepsek','guru','wali') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nm_guru`, `nip`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `id_mapel`, `posisi`, `email`, `created_at`, `updated_at`) VALUES
(18, 'Ismail Marjuki', '1001', 'L', 'Banjarmasin', '1990-01-01', 'HKSN', 4, 'kepsek', 'ismail@gmail.com', NULL, NULL),
(19, 'Fatus\'adiah', '1002', 'P', 'Banjarmasin', '1879-10-02', 'Saka Permai', 5, 'wali', 'fatus@gmail.com', NULL, NULL),
(20, 'Yani Rahman', '1003', 'L', 'Banjarmasin', '2023-07-25', 'Belitung', 3, 'wali', 'yani@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id_hari` int UNSIGNED NOT NULL,
  `nm_hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id_hari`, `nm_hari`, `created_at`, `updated_at`) VALUES
(1, 'Senin', NULL, NULL),
(2, 'Selasa', NULL, NULL),
(3, 'Rabu', NULL, NULL),
(4, 'Kamis', NULL, NULL),
(5, 'Jum\'at', NULL, NULL),
(6, 'Sabtu', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalmapel`
--

CREATE TABLE `jadwalmapel` (
  `id_jadwalmapel` int UNSIGNED NOT NULL,
  `id_mapel` int NOT NULL,
  `id_kelas` int NOT NULL,
  `id_hari` int NOT NULL,
  `id_jam` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwalmapel`
--

INSERT INTO `jadwalmapel` (`id_jadwalmapel`, `id_mapel`, `id_kelas`, `id_hari`, `id_jam`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 1, 5, NULL, NULL),
(5, 1, 1, 1, 7, NULL, NULL),
(6, 5, 1, 1, 8, NULL, NULL),
(7, 5, 1, 1, 10, NULL, NULL),
(8, 7, 1, 2, 1, NULL, NULL),
(9, 6, 1, 1, 1, NULL, NULL),
(10, 2, 1, 1, 2, NULL, NULL),
(11, 3, 1, 1, 4, NULL, NULL),
(12, 6, 1, 2, 2, NULL, NULL),
(13, 4, 1, 6, 1, NULL, NULL),
(14, 4, 6, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_belajar`
--

CREATE TABLE `jam_belajar` (
  `id_jam_belajar` int UNSIGNED NOT NULL,
  `dari` time NOT NULL,
  `sampai` time NOT NULL,
  `ket` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jam_belajar`
--

INSERT INTO `jam_belajar` (`id_jam_belajar`, `dari`, `sampai`, `ket`, `created_at`, `updated_at`) VALUES
(1, '07:15:00', '07:55:00', 1, NULL, NULL),
(2, '07:55:00', '08:35:00', 2, NULL, NULL),
(3, '08:35:00', '09:05:00', 3, NULL, NULL),
(4, '09:05:00', '09:45:00', 4, NULL, NULL),
(5, '09:45:00', '10:25:00', 5, NULL, NULL),
(6, '10:25:00', '10:40:00', 6, NULL, NULL),
(7, '10:40:00', '11:20:00', 7, NULL, NULL),
(8, '11:20:00', '12:00:00', 8, NULL, NULL),
(9, '12:00:00', '13:15:00', 9, NULL, NULL),
(10, '13:15:00', '14:00:00', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `kelas` int NOT NULL,
  `huruf` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_guru` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `huruf`, `id_guru`, `created_at`, `updated_at`) VALUES
(5, 9, 'A', 20, NULL, NULL),
(6, 7, 'A', 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int UNSIGNED NOT NULL,
  `nm_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nm_mapel`, `created_at`, `updated_at`) VALUES
(1, 'Matematika dsa', NULL, NULL),
(2, 'Fisika jjojojoououo', NULL, NULL),
(3, 'Kimia', NULL, NULL),
(4, 'Agama Islam', NULL, NULL),
(5, 'IPA', NULL, NULL),
(6, 'Bahasa Inggris', NULL, NULL),
(7, 'Bahasa Indonesia', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_08_121332_testing_table', 1),
(6, '2023_06_19_033016_siswa_table', 2),
(7, '2023_06_19_052252_kelas_table', 2),
(8, '2023_06_21_025507_absen_table', 3),
(9, '2023_06_21_025912_mapel_table', 3),
(10, '2023_06_22_130517_jadwalmapel_table', 4),
(11, '2023_06_22_132521_hari_table', 5),
(12, '2023_06_22_133935_jampelajaran_table', 6),
(13, '2023_06_23_122504_guru_table', 7),
(14, '2023_06_25_131322_nilai_siswa_table', 8),
(15, '2023_06_26_131908_ekskul_table', 9),
(16, '2023_06_26_133127_anggota_ekskul_table', 9),
(17, '2023_06_28_121742_prestasi_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int UNSIGNED NOT NULL,
  `id_siswa` int NOT NULL,
  `id_guru` int DEFAULT '0',
  `id_mapel` int NOT NULL,
  `id_kelas` int NOT NULL,
  `nilai` double NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_guru`, `id_mapel`, `id_kelas`, `nilai`, `ket`, `semester`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 4, 1, 10, 'bagus', 0, NULL, NULL),
(2, 3, 0, 6, 1, 9, 'lumayan', 0, NULL, NULL),
(3, 9, 0, 5, 6, 100, 'Bagus', 0, NULL, NULL),
(4, 10, 0, 5, 6, 90, 'Bagus perlu ditingkatkan', 0, NULL, NULL),
(15, 9, 0, 4, 6, 10, 'Bagus', 0, NULL, NULL),
(16, 10, 0, 4, 6, 8, 'Bagus', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int UNSIGNED NOT NULL,
  `id_siswa` int NOT NULL,
  `prestasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int NOT NULL,
  `semester` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nisn` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_ayah` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_ibu` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lulus` enum('T','Y') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `id_kelas`, `tgl_lahir`, `tempat_lahir`, `jenis_kelamin`, `nm_ayah`, `nm_ibu`, `email`, `no_telp`, `alamat`, `lulus`, `tahun_ajaran`, `urutan`, `created_at`, `updated_at`) VALUES
(9, '230001', 'Uwais Al Faruq', '6', '2022-07-30', 'Banjarmasin', 'L', 'Nanda Wahyudi', 'Giseva Apriliasiwi', 'nandw567@gmail.com', '085751609104', 'Tembikar kanan', 'T', '2023', 230001, NULL, NULL),
(10, '230002', 'Sumayyah', '6', '2022-02-02', 'Banjarmasin', 'P', 'Khairudin', 'Nakay', 'rizaldi@gmail.com', '08781231231', 'Simpang belitung', 'T', '2023', 23230002, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int NOT NULL,
  `dari` year NOT NULL,
  `sampai` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `dari`, `sampai`) VALUES
(1, '2023', '2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tes`
--

CREATE TABLE `tes` (
  `user_id` int NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tes`
--

INSERT INTO `tes` (`user_id`, `image`) VALUES
(1, '1688087848.png'),
(1, '1688089129.png'),
(1, '1688089187.png'),
(1, '1688089829.png'),
(1, '1688090005.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin', 'presiden@gmail.com', NULL, '$2y$10$VQcGKHiC21omQwWRYXNrpeAMsAt7V8jQq1iyw46OinjBQQ5qHx0Jy', 'vvEfXY7aTYuKTUsGXHP8kYzUtNAnJRdlbxcJJMne6cZDrMYr5zd4P7ROsmh0', '2023-06-16 06:57:50', '2023-06-16 06:57:50'),
(14, 'Uwais Al Faruq', '230001', 'siswa', 'nandw567@gmail.com', NULL, '$2y$10$GO6Lnk.OTHbPY.bXQbOPe.e3oUz/SDt6t8pnzythLyXsM/0kTUl2q', NULL, NULL, NULL),
(15, 'Rizaldi', '230002', 'siswa', 'rizaldi@gmail.com', NULL, '$2y$10$aUyZfpslfBmCRqOXdH7bEOLFlpq5K4JQjfNHejx6Ip63P4mxhR75u', NULL, NULL, NULL),
(16, 'Ismail Marjuki', '1001', 'kepsek', 'ismail@gmail.com', NULL, '$2y$10$pgc1ZVVwNxJFHKRdFZV67.aZhJ0iQuqoMpQ7Wpdht0/TViTZh1aCe', NULL, NULL, NULL),
(17, 'Fatus\'adiah', '1002', 'wali', 'fatus@gmail.com', NULL, '$2y$10$mUzLzxWUY8nk0rJsFkIlYugdH4uMFa561hzMePvjVdRKVvW4g2No.', NULL, NULL, NULL),
(18, 'Yani Rahman', '1003', 'wali', 'yani@gmail.com', NULL, '$2y$10$emVAdv.Iq9ncC/BFc3rvlevPH2BbnGL07i4.6.DrH1.8e4Xb/v/wi', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  ADD PRIMARY KEY (`id_absen_guru`);

--
-- Indeks untuk tabel `absen_mapel`
--
ALTER TABLE `absen_mapel`
  ADD PRIMARY KEY (`id_absen_mapel`);

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indeks untuk tabel `anggota_ekskul`
--
ALTER TABLE `anggota_ekskul`
  ADD PRIMARY KEY (`id_anggota_ekskul`);

--
-- Indeks untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `jadwalmapel`
--
ALTER TABLE `jadwalmapel`
  ADD PRIMARY KEY (`id_jadwalmapel`);

--
-- Indeks untuk tabel `jam_belajar`
--
ALTER TABLE `jam_belajar`
  ADD PRIMARY KEY (`id_jam_belajar`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

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
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  MODIFY `id_absen_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `absen_mapel`
--
ALTER TABLE `absen_mapel`
  MODIFY `id_absen_mapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `anggota_ekskul`
--
ALTER TABLE `anggota_ekskul`
  MODIFY `id_anggota_ekskul` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id_ekskul` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jadwalmapel`
--
ALTER TABLE `jadwalmapel`
  MODIFY `id_jadwalmapel` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jam_belajar`
--
ALTER TABLE `jam_belajar`
  MODIFY `id_jam_belajar` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
