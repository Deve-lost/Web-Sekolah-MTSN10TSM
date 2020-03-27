-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2019 pada 17.05
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtsn_10tsm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_induk`
--

CREATE TABLE `buku_induk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_ke` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ayah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ibu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_ortu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sekolah`
--

CREATE TABLE `data_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_kepsek` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_sekolah`
--

INSERT INTO `data_sekolah` (`id`, `judul`, `nm_kepsek`, `deskripsi`, `image`, `user_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Profile Sekolah  MTSN 10 Tasikmalaya', NULL, '<p>Madrasah Tsanawiyah Negeri 10 Tasikmalaya terletak di Komp. Pesantren Cintawana, Desa Cikunten, Kecamatan Singaparna, Kabupaten Tasikmalaya. Madrasah Tsanawiyah Negeri 10 Tasikmalaya berdiri di area Luas Tanah seluas ± 5.400 m2.</p><p>Pembukaan dan penegerian MTSN 10 Tasikmalaya ditetapkan dengan keputusan Mentri Agama Republik Indonesia Nomor 515 A Tahun 1995 Tertanggal 25 November 1995 Tentang Pembukaan dan Penegerian Beberapa Madrasah.</p>', '/photos/1/Profile Sekolah/K21 (2).jpg', 1, 'profile-sekolah-mtsn-10-tasikmalaya', '2019-07-20 07:50:24', '2019-07-20 07:50:24'),
(2, 'Visi Misi Dan Tujuan MTSN 10 Tasikmalaya', NULL, '<p>Visi Dan Misi</p><p>Visi Madrasah :&nbsp;</p><p>“Terwujudnya madrasah yang Berkualitas, Prestatif, Takwa, Akhlakul Karimah Santun Dan Islami (Berprestasi)”</p><p>Misi Madrasah :&nbsp;</p><ol><li>Mengembangkan proses pembelajaran yang berkualitas, aktif, kreatif dan menyenangkan.</li><li>Menumbuhkembangkan profesionalisme dalam melaksanakan tugas.</li><li>Meningkatkan implementasi dan takwa warga madrasah terhadap Allah SWT dalam kegiatan sehari hari.</li><li>Menumbuhkan penghayatan dan pengalaman terhadap ajaran agama islam dan budaya bangsa.</li><li>Mewujudkan nuansa Islami dalam semua aspek, baik di dalam maupun di luar madrasah.</li><li>Membangkitkan minat belajar dan berlatih untuk mencapai prestasi yang unggul.</li><li>Melengkapi sarana dan prasarana yang ada.</li><li>Menanamkan Akhlaqul karimah secara terpadu dan mengamalkannya dalam kehidupan sehari hari.</li></ol><p>Tujuan Madrasah :</p><ol><li>Meningkatkan kompetesi guru yang memenuhi standar kelayakan dalam persiapan dalam pelaksanaan kurikulum madrasah (kurma).</li><li>Meningkatkan kema­­mpuan siswa untuk mengembangkan potensi diri sejalan dengan perkembangan ilmu pengetahuan berdasarkan jiwa islami.</li><li>Perbaikan sarana prasarana yang memadai.</li><li>Meningkatkan kegiatan Ekstrakulikuler yang dapat menumnuhkan kreativitas dan kepedulian sosial.</li><li>Meningkatkan prestasi bidang olahraga dan seni ditingkat kabupaten.</li></ol>', '/photos/1/Profile Sekolah/K1E.jpeg', 1, 'visi-misi-dan-tujuan-mtsn-10-tasikmalaya', '2019-07-20 07:51:49', '2019-07-20 07:51:49'),
(3, 'Sambutan Kepala Sekolah', 'H.Ade Yuyu Sopyudin,S,Ag.M,Si', '<p>Puji syukur kita ucapkan kehadirat Alloh Swt yang telah memberikan kita banyak nikmat, sehingga dengan nikmat tersebut kita dapat beraktifitas dalam rangka mengabdikan diri dan mencari ridho Allah SWT. Sholawat beserta salam senantiasa kita sampaikan kepada Rosulullah SAW sang penerang dunia dan penyelamat umat.</p><p>Semoga dengan adanya website ini bisa menjadi media penyampai informasi yang lengkap bagi para peserta didik, guru, karyawan, orangtua/wali siswa serta masyarakat pada umumnya. Dengan website ini diharapkan mampu meningkatkan kualitas madrasah menuju “Madrasah yang Berkualitas, Prestatif, Takwa, Akhlakul Karimah Santun Dan Islami (Berprestasi)”.</p>', '/photos/1/Profile Sekolah/kepsek.jpeg', 1, 'sambutan-kepala-sekolah', '2019-07-20 07:52:45', '2019-07-20 07:52:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nig` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `nilai`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 90, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_31_072939_create_guru_table', 1),
(4, '2019_05_31_073216_create_siswa_table', 1),
(5, '2019_05_31_073514_create_mapelsiswa_table', 1),
(6, '2019_05_31_073805_create_mapel_table', 1),
(7, '2019_05_31_073912_create_berita_table', 1),
(8, '2019_05_31_074033_create_pengumuman_table', 1),
(9, '2019_05_31_074245_create_gallery_table', 1),
(10, '2019_05_31_085432_create_datasekolah_table', 1),
(11, '2019_05_31_090612_create_prestasi_table', 1),
(12, '2019_06_01_014814_create_bukuinduk_table', 1),
(13, '2019_06_02_053921_create_modul_table', 1),
(14, '2019_06_02_060646_create_testimoni_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `kategori` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(191) NOT NULL,
  `thumbnail` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `judul`, `deskripsi`, `image`, `user_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Periode Tahun 2018', '<ol><li>Juara 3 Olympiade Fisika (sekabupaten Tasikmalaya)</li><li>Juara 1 puisi (sekabupaten Tasikmalaya)</li><li>Juara 1 kejuaraan silat antara pelajar Kls A (Sepulau jawa)</li><li>Juara 2 KategoriTGR tunggal putra Kejuaraan Silat antar Pelajar</li><li>Juara 2 Kls F (Sepulau Jawa) SLTP Edwin Surya Putra</li></ol>', '/photos/1/Prestasi/45517211_308430433324994_8404158740843986944_n.jpg', 1, 'periode-tahun-2018', '2019-07-20 07:57:12', '2019-07-20 07:57:12'),
(2, 'Periode Tahun 2018/2019', '<ol><li>Juara 2 Putra LT II Kwartir Ranting Singaparna</li><li>Juara 3 Putri LT II Kwartir Ranting Singaparna</li><li>Pionering PA</li><li>Lambang Negara Pa</li><li>Sandi &amp; semaphore Pa</li><li>Menaksir Pa</li><li>Tata kelola lingkungan Pa</li><li>Folksong PA</li><li>Permainan</li><li>Kompas dan arah angin PA</li><li>PPGD PA</li><li>Lambang Negara Pi•LBBT PI</li><li>Menaksir PI</li><li>Tahfid PI</li><li>Kompas dan arah mata angin</li><li>Tata Kelola PI</li><li>Keseragaman</li><li>Lomba Puisi sejawa Barat Terbuka</li><li>Tasyakut Milad I Pesantren Terpadu QM Tahun 2018-09-18</li><li>Juara Harapan 1</li><li>Lomba MQk Sejabar, Tasyakut Milad I Pesantren Terpadu QM Tahun 2018-09-18</li><li>Juara Umum 3 Lomba Peringatan HUT RI-73 tingkat SMP/MTs</li><li>PKS, Batalyon Sukapura 2018</li><li>Juara Harapan 1 Olyimpiade PKS tingkat STP EDGE GYMNASTIC</li><li>Kompi Gegerhanjuang</li><li>Juara Harapan 2 Lomba&nbsp; Baca Puisi tingkat SMP/MTs&nbsp; Sederajat</li><li>Sejawa Barat Terbuka Tasyakur Milad 1 PST Terpadu Qoshrul Muhajirin Th 2018-11-09</li></ol>', '/photos/1/Prestasi/45880187_1764970850279306_6722321325223837696_n.jpg', 1, 'periode-tahun-2018-2019', '2019-07-20 07:58:33', '2019-07-20 07:58:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `quotes` text,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id`, `user_id`, `title`, `quotes`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Selamat Datang Di Website MTSN 1O TASIKMALAYA', '“Terwujudnya madrasah yang Berkualitas, Prestatif, Takwa, Akhlakul Karimah Santun Dan Islami (Berprestasi)”', '/photos/1/slide/guru.jpg', '2019-07-20 07:54:31', '2019-07-20 07:54:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni_alumni`
--

CREATE TABLE `testimoni_alumni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lulusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `password`, `remember_token`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Nonoy Royani', 'developer', '$2y$10$VGDjMlg2QxivNza0CMXohOMzPr7oO40kmDi1WhEp9lyfjYiK/kK3a', 'K8SehmouNMXLRrrzhTlNSfOAJgdxUtSVrNrXj88wBevyHxAwiRMRjAv8Hm5Z', '', '2019-06-03 00:27:12', '2019-07-20 06:16:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_induk`
--
ALTER TABLE `buku_induk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_sekolah`
--
ALTER TABLE `data_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni_alumni`
--
ALTER TABLE `testimoni_alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku_induk`
--
ALTER TABLE `buku_induk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_sekolah`
--
ALTER TABLE `data_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `testimoni_alumni`
--
ALTER TABLE `testimoni_alumni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
