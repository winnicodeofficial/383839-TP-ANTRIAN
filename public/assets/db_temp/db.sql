-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Mar 2024 pada 21.04
-- Versi server: 8.0.30
-- Versi PHP: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_testing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_antrians`
--

CREATE TABLE `data_antrians` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_antrian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poli_id` bigint UNSIGNED NOT NULL,
  `dokter_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dianogsas`
--

CREATE TABLE `data_dianogsas` (
  `id` bigint UNSIGNED NOT NULL,
  `no_rm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dianogsa` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dokters`
--

CREATE TABLE `data_dokters` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jadwalprakteks`
--

CREATE TABLE `data_jadwalprakteks` (
  `id` bigint UNSIGNED NOT NULL,
  `dokter_id` bigint UNSIGNED NOT NULL,
  `poli_id` bigint UNSIGNED NOT NULL,
  `jadwal_praktek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_oper` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jenispasiens`
--

CREATE TABLE `data_jenispasiens` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kunjungs`
--

CREATE TABLE `data_kunjungs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_daftar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `poli_id` bigint UNSIGNED NOT NULL,
  `dianogsa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasiens`
--

CREATE TABLE `data_pasiens` (
  `id` bigint UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_pasiens`
--

INSERT INTO `data_pasiens` (`id`, `nik`, `nama`, `nama_kk`, `alamat`, `tanggal_lahir`, `usia`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, '29292822829292992', 'Muhamad Widyantoro', 'widy', 'kebumen', '2024-03-18', '28', '02827272727', '2024-03-03 19:51:02', '2024-03-03 19:51:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_polis`
--

CREATE TABLE `data_polis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rekaps`
--

CREATE TABLE `data_rekaps` (
  `id` bigint UNSIGNED NOT NULL,
  `no_rm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_daftar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dianogsa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_rekaps`
--

INSERT INTO `data_rekaps` (`id`, `no_rm`, `no_daftar`, `nama_pasien`, `alamat`, `tanggal_lahir`, `usia`, `no_hp`, `status_pasien`, `dianogsa`, `created_at`, `updated_at`) VALUES
(1, '111222', 'REG-0202', 'widy', 'kebumen', '2011-05-19', '13', '02827272727', 'lama', 'mati', '2024-03-03 18:47:38', '2024-03-03 18:47:38');

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
(5, '2024_02_06_172717_create_data_pasien_table', 1),
(6, '2024_02_06_212637_create_data_poli_table', 1),
(7, '2024_02_06_221000_create_data_dokter_table', 1),
(8, '2024_02_06_224935_create_data_jadwalpraktek_table', 1),
(9, '2024_02_07_103820_create_data_data_kunjung_table', 1),
(10, '2024_02_21_042357_create_data_jenis_pasien_table', 1),
(11, '2024_02_22_175745_create_data_antrian_table', 1),
(12, '2024_02_27_130907_create_data_rekap_table', 1),
(13, '2024_03_04_010439_create_data_dianogsa_table', 2);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `alamat`, `nip`, `jabatan`, `level`, `status_pegawai`, `pendidikan`, `unit_kerja`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'ARFAN', 'uji@test.com', 'Kebumen', '19191918', 'staff', 'Petugas', 'ASN', 'S2', 'PUKESMAS PREMBUN', '2024-02-21 04:31:45', '$2y$10$qYy4LqN/oRVkorQn.etsyeLtKz3CuQzKS./mA.mI8fWz1MTZTo3.u', NULL, '2024-02-21 04:31:45', '2024-02-21 04:31:45'),
(8, 'Admin', 'admin@admin.com', 'Kebumen', '19191919', 'Kepala', 'admin', 'ASN', 'S2', 'PUKESMAS PREMBUN', '2024-02-21 04:31:45', '$2y$10$qYy4LqN/oRVkorQn.etsyeLtKz3CuQzKS./mA.mI8fWz1MTZTo3.u', NULL, '2024-02-21 04:31:45', '2024-02-21 04:31:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_antrians`
--
ALTER TABLE `data_antrians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_antrians_nomor_antrian_unique` (`nomor_antrian`),
  ADD KEY `data_antrians_poli_id_foreign` (`poli_id`),
  ADD KEY `data_antrians_dokter_id_foreign` (`dokter_id`);

--
-- Indeks untuk tabel `data_dianogsas`
--
ALTER TABLE `data_dianogsas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_dokters`
--
ALTER TABLE `data_dokters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_jadwalprakteks`
--
ALTER TABLE `data_jadwalprakteks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_jadwalprakteks_poli_id_foreign` (`poli_id`),
  ADD KEY `data_jadwalprakteks_dokter_id_foreign` (`dokter_id`);

--
-- Indeks untuk tabel `data_jenispasiens`
--
ALTER TABLE `data_jenispasiens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kunjungs`
--
ALTER TABLE `data_kunjungs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_kunjungs_poli_id_foreign` (`poli_id`);

--
-- Indeks untuk tabel `data_pasiens`
--
ALTER TABLE `data_pasiens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_polis`
--
ALTER TABLE `data_polis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_rekaps`
--
ALTER TABLE `data_rekaps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT untuk tabel `data_antrians`
--
ALTER TABLE `data_antrians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_dianogsas`
--
ALTER TABLE `data_dianogsas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_dokters`
--
ALTER TABLE `data_dokters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_jadwalprakteks`
--
ALTER TABLE `data_jadwalprakteks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_jenispasiens`
--
ALTER TABLE `data_jenispasiens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_kunjungs`
--
ALTER TABLE `data_kunjungs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pasiens`
--
ALTER TABLE `data_pasiens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_polis`
--
ALTER TABLE `data_polis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_rekaps`
--
ALTER TABLE `data_rekaps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_antrians`
--
ALTER TABLE `data_antrians`
  ADD CONSTRAINT `data_antrians_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `data_dokters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_antrians_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `data_polis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_jadwalprakteks`
--
ALTER TABLE `data_jadwalprakteks`
  ADD CONSTRAINT `data_jadwalprakteks_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `data_dokters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_jadwalprakteks_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `data_polis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_kunjungs`
--
ALTER TABLE `data_kunjungs`
  ADD CONSTRAINT `data_kunjungs_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `data_polis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
