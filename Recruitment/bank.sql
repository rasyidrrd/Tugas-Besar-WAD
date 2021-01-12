-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2021 pada 01.38
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Jeff Bezos', 'jeff@gmail.com', '123', '2020-12-18 03:32:10', '2020-12-18 03:32:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vacancies_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pakta_integritas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahap_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `applications`
--

INSERT INTO `applications` (`id`, `vacancies_id`, `user_id`, `file_path`, `pakta_integritas`, `created_at`, `updated_at`, `alamat`, `nik`, `tanggal_lahir`, `no_hp`, `tahap_2`) VALUES
(1, 6, 3, 'images/cv/433-Article Text-1686-3-10-20191102 (1).pdf', 'images/pakta_user/373-Article Text-823-1-10-20180731.pdf', '2020-12-18 03:42:40', '2020-12-18 03:42:40', 'Jl. Haji Umar 15 Bojongsoang, Jawa Barat, Indonesia', '3314100000059', '12-18-2020', '08976543215', NULL),
(2, 6, 2, 'images/cv/987-1809-1-SM.pdf', 'images/pakta_user/120-117-1-PB.pdf', '2020-12-18 04:00:21', '2020-12-18 04:00:21', 'Jl. Haji Yusuf 88 Binjai, Sumatra Utara, Indonesia', '331410000000069', '07-12-1995', '08978693748', NULL),
(3, 7, 4, 'images/cv/964-2721-1-SM.pdf', 'images/pakta_user/Pengganti uas sisop.pdf', '2021-01-03 06:27:27', '2021-01-03 06:27:27', 'Jl. Cendrawasih 458, Ciwaruga, Bandung', '331314141115', '02-04-1998', '083567893747', NULL),
(5, 6, 5, 'images/cv/S__25534488.jpg', 'images/pakta_user/S__25534488.jpg', '2021-01-03 20:21:58', '2021-01-03 20:21:58', 'Jl. Mawar Tangerang Selatan', '32131231231231', '01-04-2021', '0812716216', NULL),
(7, 8, 4, 'images/cv/Task 14_Magazine Article (1).docx', 'images/pakta_user/Task 14_Magazine Article (1).docx', '2021-01-11 00:22:40', '2021-01-11 00:36:41', 'Jl. Mawar No. 154 Jakarta Selatan', '331234234234e', '01-11-2021', '083567893747', '01-14-2021'),
(8, 7, 6, 'images/cv/plagiarismdetector.pdf', 'images/pakta_user/plagiarismdetector.pdf', '2021-01-11 00:25:22', '2021-01-11 00:25:22', 'Jl Mawar No 154 Jakarta Selatan', '3314100000059', '01-11-2021', '0812716216', NULL),
(9, 8, 6, 'images/cv/Tugas 3 DWBI Big Data.pdf', 'images/pakta_user/Tugas 3 DWBI Big Data.pdf', '2021-01-11 00:35:40', '2021-01-11 00:36:53', 'Jl Popo No. 178 Jakarta Utara', '31231231231', '01-04-2021', '08976543215', '01-30-2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_12_08_183556_create_users_table', 1),
(2, '2020_12_08_183645_create_admins_table', 1),
(5, '2020_12_09_091316_create_vacancies_table', 2),
(7, '2020_12_09_120309_create_applications_table', 3),
(8, '2020_12_16_102034_update_table_vacancies', 4),
(9, '2020_12_16_153819_update_application_table', 5),
(11, '2020_12_16_154230_update_application_table_again', 6),
(12, '2021_01_04_183710_update_application_table_again_2', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Han Ji Pyeong', 'han@gmail.com', '123', '2020-12-18 03:29:29', '2020-12-18 03:29:29'),
(3, 'Maman Racing', 'maman@gmail.com', '123', '2020-12-18 03:31:26', '2020-12-18 03:31:26'),
(4, 'Nam Do San', 'nam@gmail.com', '123', '2021-01-03 06:20:33', '2021-01-03 06:20:33'),
(5, 'Remot AC', 'remot@gmail.com', '123', '2021-01-03 20:20:39', '2021-01-03 20:20:39'),
(6, 'Budi Sudarso', 'bs@gmail.com', '123', '2021-01-11 00:24:33', '2021-01-11 00:24:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vacancies`
--

CREATE TABLE `vacancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pakta_integritas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vacancies`
--

INSERT INTO `vacancies` (`id`, `title`, `description`, `due_date`, `file_path`, `image_path`, `created_at`, `updated_at`, `pakta_integritas`, `kuota`) VALUES
(6, 'FrontEnd Developer', 'As a Frontend Developer, your primary role is in developing user-facing web apps, with specific emphasis on user interface design. You are going to use library of internal UI components or create custom UI components. You will work with a small team and can switch team or projects depending on business needs. Together with UI Designer and UX Researcher, you are fully empowered to the design and mockup into well-researched apps, and of course you will consume backend API services.', '12-18-2020', 'images/requirement/964-2721-1-SM.pdf', 'images/cover/icon-3329995_960_720.jpg', '2020-12-18 03:36:27', '2020-12-18 03:39:32', 'images/pakta/964-2721-1-SM.pdf', 10),
(7, 'Business Analyst', 'Business analysts (BAs) are responsible for bridging the gap between IT and the business using data analytics to assess processes, determine requirements and deliver data-driven recommendations and reports to executives and stakeholders.', '01-03-2021', 'images/requirement/Format Jawaban TP Modul 2.docx', 'images/cover/download (1).png', '2021-01-03 06:13:54', '2021-01-03 06:13:54', 'images/pakta/FS 2019 INCO-dikonversi.docx', 5),
(8, 'Project Manager', 'A project manager is a professional in the field of project management. Project managers have the responsibility of the planning, procurement and execution of a project, in any undertaking that has a defined scope, defined start and a defined finish; regardless of industry.', '01-03-2021', 'images/requirement/Lecture Note 14.ppt', 'images/cover/download.jpg', '2021-01-03 06:15:02', '2021-01-03 06:15:02', 'images/pakta/Lecture Note 14.ppt', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_vacancies_id_foreign` (`vacancies_id`),
  ADD KEY `applications_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applications_vacancies_id_foreign` FOREIGN KEY (`vacancies_id`) REFERENCES `vacancies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
