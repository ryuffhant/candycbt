-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Okt 2019 pada 05.03
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbtcandy25`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `sesi` varchar(10) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `ikut` varchar(10) DEFAULT NULL,
  `susulan` varchar(10) DEFAULT NULL,
  `no_susulan` text DEFAULT NULL,
  `mulai` varchar(10) DEFAULT NULL,
  `selesai` varchar(10) DEFAULT NULL,
  `nama_proktor` varchar(50) DEFAULT NULL,
  `nip_proktor` varchar(50) DEFAULT NULL,
  `nama_pengawas` varchar(50) DEFAULT NULL,
  `nip_pengawas` varchar(50) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tgl_ujian` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_jawaban`
--

CREATE TABLE `hasil_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `jawaban` char(1) NOT NULL,
  `jenis` int(1) NOT NULL,
  `esai` text DEFAULT NULL,
  `nilai_esai` int(5) DEFAULT NULL,
  `ragu` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `jawaban` char(1) NOT NULL,
  `jenis` int(1) NOT NULL,
  `esai` text DEFAULT NULL,
  `nilai_esai` int(5) NOT NULL DEFAULT 0,
  `ragu` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama`, `status`) VALUES
('PAT', 'Penilaian Akhir Tahun', 'aktif'),
('PH', 'Penilaian Harian', 'tidak'),
('PTS', 'Penilaian Tengah Semester', 'tidak'),
('UKK', 'Uji Kompetensi Kejuruan', 'tidak'),
('USBN', 'Ujian Nasionan Berstandar Nasional', 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `level`, `nama`) VALUES
('XIITKJ', 'XII', 'XIITKJ'),
('XIITKR', 'XII', 'XIITKR'),
('XIITP', 'XII', 'XIITP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `kode_level` varchar(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`kode_level`, `keterangan`) VALUES
('XII', 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `text` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `id_siswa`, `type`, `text`, `date`) VALUES
(1, 1, 'login', 'masuk', '2019-09-15 19:52:36'),
(2, 1, 'logout', 'keluar', '2019-09-15 19:52:43'),
(3, 5, 'login', 'masuk', '2019-09-15 20:57:26'),
(4, 1, 'login', 'masuk', '2019-09-15 21:27:06'),
(5, 2, 'login', 'masuk', '2019-10-21 14:16:29'),
(6, 2, 'testongoing', 'sedang ujian', '2019-10-21 14:16:42'),
(7, 2, 'testongoing', 'sedang ujian', '2019-10-21 14:16:42'),
(8, 4, 'login', 'masuk', '2019-10-21 14:22:07'),
(9, 4, 'testongoing', 'sedang ujian', '2019-10-21 14:22:12'),
(10, 4, 'testongoing', 'sedang ujian', '2019-10-21 14:22:12'),
(11, 2, 'logout', 'keluar', '2019-10-21 14:31:57'),
(12, 4, 'logout', 'keluar', '2019-10-21 14:32:45'),
(13, 2, 'login', 'masuk', '2019-10-21 14:33:03'),
(14, 2, 'testongoing', 'sedang ujian', '2019-10-21 14:33:08'),
(15, 2, 'testongoing', 'sedang ujian', '2019-10-21 14:33:08'),
(16, 2, 'logout', 'keluar', '2019-10-21 14:46:07'),
(17, 4, 'login', 'masuk', '2019-10-21 14:46:13'),
(18, 4, 'testongoing', 'sedang ujian', '2019-10-21 14:46:17'),
(19, 4, 'testongoing', 'sedang ujian', '2019-10-21 14:46:17'),
(20, 4, 'logout', 'keluar', '2019-10-21 14:48:26'),
(21, 5, 'login', 'masuk', '2019-10-21 14:48:33'),
(22, 5, 'testongoing', 'sedang ujian', '2019-10-21 14:48:36'),
(23, 5, 'testongoing', 'sedang ujian', '2019-10-21 14:48:36'),
(24, 1, 'login', 'masuk', '2019-10-22 09:23:55'),
(25, 1, 'testongoing', 'sedang ujian', '2019-10-22 09:24:22'),
(26, 1, 'testongoing', 'sedang ujian', '2019-10-22 09:24:22'),
(27, 1, 'testongoing', 'sedang ujian', '2019-10-22 09:38:59'),
(28, 1, 'testongoing', 'sedang ujian', '2019-10-22 09:38:59'),
(29, 1, 'testongoing', 'sedang ujian', '2019-10-22 09:40:28'),
(30, 1, 'testongoing', 'sedang ujian', '2019-10-22 09:40:28'),
(31, 1, 'testongoing', 'sedang ujian', '2019-10-22 09:52:00'),
(32, 1, 'testongoing', 'sedang ujian', '2019-10-22 09:52:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_log` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `ipaddress` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `idpk` varchar(10) NOT NULL,
  `idguru` varchar(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jml_soal` int(5) NOT NULL,
  `jml_esai` int(5) NOT NULL,
  `tampil_pg` int(5) NOT NULL,
  `tampil_esai` int(5) NOT NULL,
  `bobot_pg` int(5) NOT NULL,
  `bobot_esai` int(5) NOT NULL,
  `level` varchar(5) NOT NULL,
  `opsi` int(1) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(2) NOT NULL,
  `statusujian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `idpk`, `idguru`, `nama`, `jml_soal`, `jml_esai`, `tampil_pg`, `tampil_esai`, `bobot_pg`, `bobot_esai`, `level`, `opsi`, `kelas`, `date`, `status`, `statusujian`) VALUES
(5, 'semua', '41', 'KIMIA', 30, 0, 30, 0, 100, 0, 'semua', 5, 'a:1:{i:0;s:5:\"semua\";}', '2019-09-15 08:17:50', '1', 0),
(6, 'TKJ', '51', 'BING', 100, 0, 100, 0, 100, 0, 'semua', 3, 'a:1:{i:0;s:5:\"semua\";}', '2019-10-21 05:55:21', '1', NULL),
(7, 'semua', '51', 'MTK', 100, 0, 100, 0, 100, 0, 'semua', 3, 'a:1:{i:0;s:5:\"semua\";}', '2019-10-21 05:57:01', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `nama_mapel`) VALUES
('BING', 'BAHASA INGGRIS'),
('KIMIA', 'KIMIA'),
('MTK', 'MATEMATIKA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kode_ujian` varchar(30) NOT NULL,
  `ujian_mulai` varchar(20) NOT NULL,
  `ujian_berlangsung` varchar(20) DEFAULT NULL,
  `ujian_selesai` varchar(20) DEFAULT NULL,
  `jml_benar` int(10) DEFAULT NULL,
  `jml_salah` int(10) DEFAULT NULL,
  `nilai_esai` varchar(10) DEFAULT NULL,
  `skor` varchar(10) DEFAULT NULL,
  `total` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `ipaddress` varchar(20) NOT NULL,
  `hasil` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengacak`
--

CREATE TABLE `pengacak` (
  `id_pengacak` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` longtext NOT NULL,
  `id_esai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengacakopsi`
--

CREATE TABLE `pengacakopsi` (
  `id_pengacak` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` longtext NOT NULL,
  `id_esai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawas`
--

CREATE TABLE `pengawas` (
  `id_pengawas` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat_jalan` varchar(255) DEFAULT NULL,
  `rt_rw` varchar(8) DEFAULT NULL,
  `dusun` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `kode_pos` int(6) DEFAULT NULL,
  `nuptk` varchar(20) DEFAULT NULL,
  `bidang_studi` varchar(50) DEFAULT NULL,
  `jenis_ptk` varchar(50) DEFAULT NULL,
  `tgs_tambahan` varchar(50) DEFAULT NULL,
  `status_pegawai` varchar(50) DEFAULT NULL,
  `status_aktif` varchar(20) DEFAULT NULL,
  `status_nikah` varchar(20) DEFAULT NULL,
  `sumber_gaji` varchar(30) DEFAULT NULL,
  `ahli_lab` varchar(10) DEFAULT NULL,
  `nama_ibu` varchar(40) DEFAULT NULL,
  `nama_suami` varchar(50) DEFAULT NULL,
  `nik_suami` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `keahlian_isyarat` varchar(10) DEFAULT NULL,
  `kewarganegaraan` varchar(10) DEFAULT NULL,
  `npwp` varchar(16) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengawas`
--

INSERT INTO `pengawas` (`id_pengawas`, `nip`, `nama`, `jabatan`, `username`, `password`, `level`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `email`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kode_pos`, `nuptk`, `bidang_studi`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `sumber_gaji`, `ahli_lab`, `nama_ibu`, `nama_suami`, `nik_suami`, `pekerjaan`, `tmt`, `keahlian_isyarat`, `kewarganegaraan`, `npwp`, `foto`) VALUES
(9, '-', 'administrator', '', 'admin', '$2y$10$3fVC8VJfm8ElEv6PNLT2R.XalOF.sFq7TOgJE54p5KQm2oL/0N1Im', 'admin', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(41, '-', 'Pajar Sidik Nurfakhri', '', 'pajarsidikn', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(42, '-', 'Guru 2', '', 'guru2', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(43, '-', 'Guru 3', '', 'guru3', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(44, '-', 'Guru 4', '', 'guru4', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(45, '-', 'Guru 5', '', 'guru5', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(46, '-', 'Guru 6', '', 'guru6', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(47, '-', 'Guru 7', '', 'guru7', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(48, '-', 'Guru 8', '', 'guru8', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(49, '-', 'Guru 9', '', 'guru9', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(50, '-', 'Ruli Syahruli, S.Pd', '', 'ruli', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(51, '-', 'Agus Prasetyo, S.Pd', '', 'agus', '123456', 'guru', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(5) NOT NULL,
  `type` varchar(30) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `user` int(3) NOT NULL,
  `text` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `type`, `judul`, `user`, `text`, `date`) VALUES
(1, 'internal', 'aaaaa', 9, '<p>aaaaaaaaaaaaaaaaa</p>', '2019-10-22 02:49:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pk`
--

CREATE TABLE `pk` (
  `id_pk` varchar(10) NOT NULL,
  `program_keahlian` varchar(50) NOT NULL,
  `kode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pk`
--

INSERT INTO `pk` (`id_pk`, `program_keahlian`, `kode`) VALUES
('TKJ', 'TKJ', ''),
('TKR', 'TKR', ''),
('TP', 'TP', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `kode_ruang` varchar(10) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`kode_ruang`, `keterangan`) VALUES
('R1', 'R1'),
('R2', 'R2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `savsoft_options`
--

CREATE TABLE `savsoft_options` (
  `oid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `q_option_match` varchar(1000) DEFAULT NULL,
  `score` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `savsoft_qbank`
--

CREATE TABLE `savsoft_qbank` (
  `qid` int(11) NOT NULL,
  `question_type` varchar(100) NOT NULL DEFAULT 'Multiple Choice Single Answer',
  `question` text NOT NULL,
  `description` text NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `no_time_served` int(11) NOT NULL DEFAULT 0,
  `no_time_corrected` int(11) NOT NULL DEFAULT 0,
  `no_time_incorrected` int(11) NOT NULL DEFAULT 0,
  `no_time_unattempted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `server`
--

CREATE TABLE `server` (
  `kode_server` varchar(20) NOT NULL,
  `nama_server` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `server`
--

INSERT INTO `server` (`kode_server`, `nama_server`, `status`) VALUES
('R1', 'SERVER R1', 'aktif'),
('R2', 'SERVER R2', 'aktif'),
('ONLINE', 'ONLINE', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi`
--

CREATE TABLE `sesi` (
  `kode_sesi` varchar(10) NOT NULL,
  `nama_sesi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sesi`
--

INSERT INTO `sesi` (`kode_sesi`, `nama_sesi`) VALUES
('1', '1'),
('2', '2'),
('3', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session_time` varchar(10) NOT NULL,
  `session_hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `aplikasi` varchar(100) NOT NULL,
  `kode_sekolah` varchar(10) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `jenjang` varchar(5) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `web` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` text NOT NULL,
  `header` text NOT NULL,
  `header_kartu` text NOT NULL,
  `nama_ujian` text NOT NULL,
  `versi` varchar(10) NOT NULL,
  `ip_server` varchar(100) NOT NULL,
  `waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_setting`, `aplikasi`, `kode_sekolah`, `sekolah`, `jenjang`, `kepsek`, `nip`, `alamat`, `kecamatan`, `kota`, `telp`, `fax`, `web`, `email`, `logo`, `header`, `header_kartu`, `nama_ujian`, `versi`, `ip_server`, `waktu`) VALUES
(1, 'SMK HS AGUNG', 'K123', 'SMK HS AGUNG', 'SMK', 'Dedi Baidillah, S.Pd, M.Pd', '-', 'IO : 503.15/015/IV/SK-SMK/BPMPPT/2013; NPSN: 69787351 ; NSS : 402022210005<br />\r\nJL.Buyut Kaipah .Pulo Bambu Karang Bahagia Kec.Karang Bahagia Kab. Bekasi <br />\r\n', 'Karang Bahagia', 'Bekasi', '021 123 123 123', '', 'smkhsagung.sch.id', 'smkhsagung@gmail.com', 'dist/img/logo6.png', 'YAYASAN SOFIA MUJAHIDA UTAMA', 'KARTU PESERTA\nUJIAN SEKOLAH BERBASIS KOMPUTER', 'UJIAN SEKOLAH BERSTANDAR NASIONAL', '2.5', 'http://192.168.0.200/candycbt', 'Asia/Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` varchar(11) NOT NULL,
  `idpk` varchar(10) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `no_peserta` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL,
  `ruang` varchar(10) NOT NULL,
  `sesi` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `kebutuhan_khusus` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `dusun` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kode_pos` int(10) DEFAULT NULL,
  `jenis_tinggal` varchar(100) DEFAULT NULL,
  `alat_transportasi` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `skhun` int(11) DEFAULT NULL,
  `no_kps` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(150) DEFAULT NULL,
  `tahun_lahir_ayah` int(4) DEFAULT NULL,
  `pendidikan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `penghasilan_ayah` varchar(100) DEFAULT NULL,
  `nohp_ayah` varchar(15) DEFAULT NULL,
  `nama_ibu` varchar(150) DEFAULT NULL,
  `tahun_lahir_ibu` int(4) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `penghasilan_ibu` varchar(100) DEFAULT NULL,
  `nohp_ibu` int(15) DEFAULT NULL,
  `nama_wali` varchar(150) DEFAULT NULL,
  `tahun_lahir_wali` int(4) DEFAULT NULL,
  `pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `angkatan` int(5) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `idpk`, `nis`, `no_peserta`, `nama`, `level`, `ruang`, `sesi`, `username`, `password`, `foto`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kebutuhan_khusus`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kode_pos`, `jenis_tinggal`, `alat_transportasi`, `hp`, `email`, `skhun`, `no_kps`, `nama_ayah`, `tahun_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nohp_ayah`, `nama_ibu`, `tahun_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `nohp_ibu`, `nama_wali`, `tahun_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `angkatan`, `nisn`) VALUES
(1, 'XIITP', 'TP', '151610041', '12-248-001-8', 'Ade Saputra', 'XII', 'R1', 1, 'hs001', 'ps001', 'siswa.png', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(2, 'XIITP', 'TP', '151610043', '12-248-002-7', 'Ahmad Fauzi', 'XII', 'R1', 1, 'hs002', 'ps002', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(3, 'XIITP', 'TP', '151610044', '12-248-003-6', 'Ahmad Fauzi', 'XII', 'R1', 1, 'hs003', 'ps003', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(4, 'XIITP', 'TP', '151610045', '12-248-004-5', 'Ahmad Juliansyah', 'XII', 'R1', 1, 'hs004', 'ps004', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(5, 'XIITP', 'TP', '151610047', '12-248-005-4', 'Algi Julian', 'XII', 'R1', 1, 'hs005', 'ps005', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(6, 'XIITP', 'TP', '151610048', '12-248-006-3', 'Anas Aditya', 'XII', 'R1', 1, 'hs006', 'ps006', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(7, 'XIITP', 'TP', '151610049', '12-248-007-2', 'Andre Irawan', 'XII', 'R1', 1, 'hs007', 'ps007', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(8, 'XIITP', 'TP', '151610042', '12-248-008-9', 'Andrian Al Viansyah', 'XII', 'R1', 1, 'hs008', 'ps008', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(9, 'XIITP', 'TP', '151610050', '12-248-009-8', 'Andrian Maulana', 'XII', 'R1', 1, 'hs009', 'ps009', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(10, 'XIITP', 'TP', '151610051', '12-248-010-7', 'Bambang Reza Umbara', 'XII', 'R1', 1, 'hs010', 'ps010', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(11, 'XIITP', 'TP', '151610052', '12-248-011-6', 'Ferdi Hasan', 'XII', 'R1', 1, 'hs011', 'ps011', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(12, 'XIITP', 'TP', '151610053', '12-248-012-5', 'Guntur Adthia Bagaskara', 'XII', 'R1', 1, 'hs012', 'ps012', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(13, 'XIITP', 'TP', '151610055', '12-248-013-4', 'Harun Syahroji Iqmal', 'XII', 'R1', 2, 'hs013', 'ps013', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(14, 'XIITP', 'TP', '151610054', '12-248-014-3', 'Haryadi Sajali', 'XII', 'R1', 2, 'hs014', 'ps014', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(15, 'XIITP', 'TP', '151610057', '12-248-015-2', 'Ismail', 'XII', 'R1', 2, 'hs015', 'ps015', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(16, 'XIITP', 'TP', '151610062', '12-248-016-9', 'Muchtar Gana', 'XII', 'R1', 2, 'hs016', 'ps016', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(17, 'XIITP', 'TP', '151610058', '12-248-017-8', 'Muhamad Abdul Rahman', 'XII', 'R1', 2, 'hs017', 'ps017', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(18, 'XIITP', 'TP', '151610063', '12-248-018-7', 'Muhamad Ali Hapijudin', 'XII', 'R1', 2, 'hs018', 'ps018', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(19, 'XIITP', 'TP', '151610065', '12-248-019-6', 'Muhamad Rizal', 'XII', 'R1', 2, 'hs019', 'ps019', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(20, 'XIITP', 'TP', '151610066', '12-248-020-5', 'Muhammad Niji Yuki Huda Sabillah', 'XII', 'R1', 2, 'hs020', 'ps020', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(21, 'XIITP', 'TP', '151610059', '12-248-021-4', 'Muhammad Ogi Prayoga S.', 'XII', 'R1', 2, 'hs021', 'ps021', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(22, 'XIITP', 'TP', '151610067', '12-248-022-3', 'Niko', 'XII', 'R1', 2, 'hs022', 'ps022', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(23, 'XIITP', 'TP', '151610068', '12-248-023-2', 'Rahma Ahmada', 'XII', 'R1', 2, 'hs023', 'ps023', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(24, 'XIITP', 'TP', '151610070', '12-248-024-9', 'Renaldi', 'XII', 'R1', 2, 'hs024', 'ps024', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(25, 'XIITP', 'TP', '151610069', '12-248-025-8', 'Renaldi', 'XII', 'R1', 2, 'hs025', 'ps025', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(26, 'XIITP', 'TP', '151610072', '12-248-026-7', 'Rico Dwi Addrian Fattah', 'XII', 'R1', 2, 'hs026', 'ps026', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(27, 'XIITP', 'TP', '151610073', '12-248-027-6', 'Riki Riyanto', 'XII', 'R1', 2, 'hs027', 'ps027', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(28, 'XIITP', 'TP', '151610074', '12-248-028-5', 'Riki S', 'XII', 'R1', 2, 'hs028', 'ps028', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(29, 'XIITP', 'TP', '151610075', '12-248-029-4', 'Rudi Hartono', 'XII', 'R1', 2, 'hs029', 'ps029', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(30, 'XIITP', 'TP', '151610076', '12-248-030-3', 'Saipul Anwar', 'XII', 'R1', 3, 'hs030', 'ps030', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(31, 'XIITP', 'TP', '151610077', '12-248-031-2', 'Satya Pratama', 'XII', 'R1', 3, 'hs031', 'ps031', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(32, 'XIITP', 'TP', '151610078', '12-248-032-9', 'Sutrisno', 'XII', 'R1', 3, 'hs032', 'ps032', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(33, 'XIITP', 'TP', '151610079', '12-248-033-8', 'Syarif', 'XII', 'R1', 3, 'hs033', 'ps033', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(34, 'XIITP', 'TP', '151610081', '12-248-034-7', 'Yobi Pratama', 'XII', 'R1', 3, 'hs034', 'ps034', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(35, 'XIITKR', 'TKR', '151610083', '12-248-035-6', 'Adittiya', 'XII', 'R1', 3, 'hs035', 'ps035', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(36, 'XIITKR', 'TKR', '151610084', '12-248-036-5', 'Aef saefullah EDK', 'XII', 'R1', 3, 'hs036', 'ps036', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(37, 'XIITKR', 'TKR', '151610085', '12-248-037-4', 'Ahmad', 'XII', 'R1', 3, 'hs037', 'ps037', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(38, 'XIITKR', 'TKR', '151610086', '12-248-038-3', 'Ahmad dani', 'XII', 'R1', 3, 'hs038', 'ps038', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(39, 'XIITKR', 'TKR', '151610089', '12-248-039-2', 'Amar', 'XII', 'R1', 3, 'hs039', 'ps039', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(40, 'XIITKR', 'TKR', '151610090', '12-248-040-9', 'Andi', 'XII', 'R1', 3, 'hs040', 'ps040', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(41, 'XIITKR', 'TKR', '151610091', '12-248-041-8', 'Anggi Julian Purnama', 'XII', 'R1', 3, 'hs041', 'ps041', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(42, 'XIITKR', 'TKR', '151610092', '12-248-042-7', 'Ardiansyah', 'XII', 'R1', 3, 'hs042', 'ps042', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(43, 'XIITKR', 'TKR', '151610093', '12-248-043-6', 'Aryanto', 'XII', 'R1', 3, 'hs043', 'ps043', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(44, 'XIITKR', 'TKR', '151610094', '12-248-044-5', 'Awaludin', 'XII', 'R1', 3, 'hs044', 'ps044', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(45, 'XIITKR', 'TKR', '151610096', '12-248-045-4', 'Dede Ahmad Pauji', 'XII', 'R1', 3, 'hs045', 'ps045', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(46, 'XIITKR', 'TKR', '151610099', '12-248-046-3', 'Egi Ariansyah', 'XII', 'R1', 3, 'hs046', 'ps046', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(47, 'XIITKR', 'TKR', '151610100', '12-248-047-2', 'Erdin', 'XII', 'R1', 3, 'hs047', 'ps047', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(48, 'XIITKR', 'TKR', '151610101', '12-248-048-9', 'Fajar Ramadhan', 'XII', 'R1', 3, 'hs048', 'ps048', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(49, 'XIITKR', 'TKR', '151610102', '12-248-049-8', 'Fiky Zulfikar', 'XII', 'R1', 3, 'hs049', 'ps049', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(50, 'XIITKR', 'TKR', '151610103', '12-248-050-7', 'Habibi', 'XII', 'R1', 3, 'hs050', 'ps050', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(51, 'XIITKR', 'TKR', '151610104', '12-248-051-6', 'Handriyansyah Wijaya', 'XII', 'R1', 3, 'hs051', 'ps051', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(52, 'XIITKR', 'TKR', '151610128', '12-248-052-5', 'Herlangga Supardi', 'XII', 'R1', 3, 'hs052', 'ps052', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(53, 'XIITKR', 'TKR', '151610106', '12-248-053-4', 'Ibnu Mujahidin', 'XII', 'R1', 3, 'hs053', 'ps053', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(54, 'XIITKR', 'TKR', '151610107', '12-248-054-3', 'Kasan Wijaya Kusuma', 'XII', 'R1', 3, 'hs054', 'ps054', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(55, 'XIITKR', 'TKR', '151610109', '12-248-055-2', 'Muhamad Aldi Ardiansyah', 'XII', 'R1', 3, 'hs055', 'ps055', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(56, 'XIITKR', 'TKR', '151610108', '12-248-056-9', 'Muhammad Sutrisno', 'XII', 'R1', 1, 'hs056', 'ps056', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(57, 'XIITKR', 'TKR', '151610110', '12-248-057-8', 'Muhammad Ramdan', 'XII', 'R1', 1, 'hs057', 'ps057', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(58, 'XIITKR', 'TKR', '151610111', '12-248-058-7', 'Nur Arifin', 'XII', 'R1', 1, 'hs058', 'ps058', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(59, 'XIITKR', 'TKR', '151610112', '12-248-059-6', 'Riyo Wijaya', 'XII', 'R1', 1, 'hs059', 'ps059', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(60, 'XIITKR', 'TKR', '151610113', '12-248-060-5', 'Rizal Maulana Aziz', 'XII', 'R1', 1, 'hs060', 'ps060', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(61, 'XIITKR', 'TKR', '151610114', '12-248-061-4', 'Robi Darwis', 'XII', 'R1', 1, 'hs061', 'ps061', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(62, 'XIITKR', 'TKR', '151610115', '12-248-062-3', 'Roni Sahroni', 'XII', 'R1', 1, 'hs062', 'ps062', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(63, 'XIITKR', 'TKR', '151610117', '12-248-063-2', 'Saemi Al Rasyid', 'XII', 'R1', 1, 'hs063', 'ps063', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(64, 'XIITKR', 'TKR', '151610118', '12-248-064-9', 'Said Abdullah', 'XII', 'R1', 1, 'hs064', 'ps064', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(65, 'XIITKR', 'TKR', '151610119', '12-248-065-8', 'Saripudin', 'XII', 'R1', 1, 'hs065', 'ps065', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(66, 'XIITKR', 'TKR', '151610123', '12-248-066-7', 'Ahmad Faisal', 'XII', 'R1', 1, 'hs066', 'ps066', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(67, 'XIITKR', 'TKR', '151610124', '12-248-067-6', 'Aksal Sobari', 'XII', 'R1', 1, 'hs067', 'ps067', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(68, 'XIITKR', 'TKR', '151610125', '12-248-068-5', 'Alfian', 'XII', 'R1', 1, 'hs068', 'ps068', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(69, 'XIITKR', 'TKR', '151610126', '12-248-069-4', 'Arsad sopian', 'XII', 'R1', 1, 'hs069', 'ps069', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(70, 'XIITKR', 'TKR', '151610127', '12-248-070-3', 'Dede Maulana', 'XII', 'R1', 1, 'hs070', 'ps070', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(71, 'XIITKR', 'TKR', '151610129', '12-248-071-2', 'Junaedi', 'XII', 'R1', 1, 'hs071', 'ps071', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(72, 'XIITKR', 'TKR', '151610168', '12-248-072-9', 'Muhamad Fikri Fahmi Kurniadi', 'XII', 'R1', 1, 'hs072', 'ps072', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(73, 'XIITKR', 'TKR', '151610130', '12-248-073-8', 'Muhamad Kevin Fadli Fauzi', 'XII', 'R1', 2, 'hs073', 'ps073', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(74, 'XIITKR', 'TKR', '151610132', '12-248-074-7', 'Muhamad Rifki Saputra', 'XII', 'R1', 2, 'hs074', 'ps074', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(75, 'XIITKR', 'TKR', '151610133', '12-248-075-6', 'Padrul Cahyadi', 'XII', 'R1', 2, 'hs075', 'ps075', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(76, 'XIITKR', 'TKR', '151610169', '12-248-076-5', 'Pentin Alamsyah', 'XII', 'R1', 2, 'hs076', 'ps076', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(77, 'XIITKR', 'TKR', '151610134', '12-248-077-4', 'Sobri Saputra', 'XII', 'R1', 2, 'hs077', 'ps077', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(78, 'XIITKR', 'TKR', '151610135', '12-248-078-3', 'Sukendar', 'XII', 'R1', 2, 'hs078', 'ps078', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(79, 'XIITKR', 'TKR', '151610120', '12-248-079-2', 'Teguh Nur Sidik', 'XII', 'R1', 2, 'hs079', 'ps079', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(80, 'XIITKR', 'TKR', '151610136', '12-248-080-9', 'Tubagus M. Al-Fajri', 'XII', 'R1', 2, 'hs080', 'ps080', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(81, 'XIITKR', 'TKR', '151610166', '12-248-081-8', 'Wahyu Pratama', 'XII', 'R1', 2, 'hs081', 'ps081', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(82, 'XIITKR', 'TKR', '151610172', '12-248-082-7', 'Wahyudin AZ.', 'XII', 'R1', 2, 'hs082', 'ps082', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(83, 'XIITKR', 'TKR', '151610138', '12-248-083-6', 'Wiro Sugianto', 'XII', 'R1', 2, 'hs083', 'ps083', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(84, 'XIITKR', 'TKR', '151610121', '12-248-084-5', 'Yogi Priyogo', 'XII', 'R1', 2, 'hs084', 'ps084', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(85, 'XIITKR', 'TKR', '151610139', '12-248-085-4', 'Yuda Saputra', 'XII', 'R1', 2, 'hs085', 'ps085', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(86, 'XIITKR', 'TKR', '151610140', '12-248-086-3', 'Yuwanda Musyaddir', 'XII', 'R1', 2, 'hs086', 'ps086', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(87, 'XIITKJ', 'TKJ', '151610001', '12-248-087-2', 'Anggi Gian Sapitri', 'XII', 'R1', 1, 'hs087', 'ps087', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(88, 'XIITKJ', 'TKJ', '151610002', '12-248-088-9', 'Cindy Apriana', 'XII', 'R1', 1, 'hs088', 'ps088', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(89, 'XIITKJ', 'TKJ', '151610003', '12-248-089-8', 'Dwi Lestari', 'XII', 'R1', 1, 'hs089', 'ps089', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(90, 'XIITKJ', 'TKJ', '151610004', '12-248-090-7', 'Ebih', 'XII', 'R1', 1, 'hs090', 'ps090', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(91, 'XIITKJ', 'TKJ', '151610005', '12-248-091-6', 'Elis Saeti Nuraeni', 'XII', 'R1', 3, 'hs091', 'ps091', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(92, 'XIITKJ', 'TKJ', '151610006', '12-248-092-5', 'Euis Susilawati', 'XII', 'R1', 3, 'hs092', 'ps092', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(93, 'XIITKJ', 'TKJ', '151610007', '12-248-093-4', 'Fahmi arni', 'XII', 'R1', 3, 'hs093', 'ps093', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(94, 'XIITKJ', 'TKJ', '151610008', '12-248-094-3', 'Fitri Widiasari', 'XII', 'R1', 3, 'hs094', 'ps094', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(95, 'XIITKJ', 'TKJ', '151610009', '12-248-095-2', 'Gaby Cantika Oktavia', 'XII', 'R1', 3, 'hs095', 'ps095', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(96, 'XIITKJ', 'TKJ', '151610010', '12-248-096-9', 'Haena Hermawati Yuningsih', 'XII', 'R1', 3, 'hs096', 'ps096', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(97, 'XIITKJ', 'TKJ', '151610011', '12-248-097-8', 'Karlina', 'XII', 'R1', 3, 'hs097', 'ps097', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(98, 'XIITKJ', 'TKJ', '151610012', '12-248-098-7', 'Kurniawati', 'XII', 'R1', 3, 'hs098', 'ps098', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(99, 'XIITKJ', 'TKJ', '151610013', '12-248-099-6', 'Ladina al zannah chandra', 'XII', 'R1', 3, 'hs099', 'ps099', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(100, 'XIITKJ', 'TKJ', '151610014', '12-248-100-5', 'Laras Ayu Asmanih', 'XII', 'R1', 3, 'hs100', 'ps100', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(101, 'XIITKJ', 'TKJ', '151610015', '12-248-101-4', 'Lastri Septriani', 'XII', 'R1', 3, 'hs101', 'ps101', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(102, 'XIITKJ', 'TKJ', '151610016', '12-248-102-3', 'Lisah Fitri Kurnia', 'XII', 'R1', 3, 'hs102', 'ps102', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(103, 'XIITKJ', 'TKJ', '151610018', '12-248-103-2', 'Lutfi Wisti Nandasari', 'XII', 'R2', 3, 'hs103', 'ps103', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(104, 'XIITKJ', 'TKJ', '151610019', '12-248-104-9', 'Maya Karmanih', 'XII', 'R2', 3, 'hs104', 'ps104', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(105, 'XIITKJ', 'TKJ', '151610020', '12-248-105-8', 'Mayang Sari', 'XII', 'R2', 3, 'hs105', 'ps105', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(106, 'XIITKJ', 'TKJ', '151610021', '12-248-106-7', 'Mayang Sari Wati', 'XII', 'R2', 3, 'hs106', 'ps106', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(107, 'XIITKJ', 'TKJ', '151610022', '12-248-107-6', 'Megawati', 'XII', 'R2', 1, 'hs107', 'ps107', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(108, 'XIITKJ', 'TKJ', '151610023', '12-248-108-5', 'Narsih Agus Priyanti', 'XII', 'R2', 1, 'hs108', 'ps108', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(109, 'XIITKJ', 'TKJ', '151610024', '12-248-109-4', 'Nuraina', 'XII', 'R2', 1, 'hs109', 'ps109', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(110, 'XIITKJ', 'TKJ', '151610025', '12-248-110-3', 'Pita Kaputri', 'XII', 'R2', 1, 'hs110', 'ps110', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(111, 'XIITKJ', 'TKJ', '151610026', '12-248-111-2', 'Putri Ayu Lestari', 'XII', 'R2', 1, 'hs111', 'ps111', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(112, 'XIITKJ', 'TKJ', '151610027', '12-248-112-9', 'Putri Hagita', 'XII', 'R2', 1, 'hs112', 'ps112', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(113, 'XIITKJ', 'TKJ', '151610028', '12-248-113-8', 'Rasti', 'XII', 'R2', 1, 'hs113', 'ps113', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(114, 'XIITKJ', 'TKJ', '151610029', '12-248-114-7', 'Rizky Khofifah', 'XII', 'R2', 1, 'hs114', 'ps114', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(115, 'XIITKJ', 'TKJ', '151610030', '12-248-115-6', 'Sahroni', 'XII', 'R2', 1, 'hs115', 'ps115', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(116, 'XIITKJ', 'TKJ', '151610031', '12-248-116-5', 'Samah Maesaroh', 'XII', 'R2', 1, 'hs116', 'ps116', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(117, 'XIITKJ', 'TKJ', '151610032', '12-248-117-4', 'Sarmila Febyola Putri', 'XII', 'R2', 1, 'hs117', 'ps117', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(118, 'XIITKJ', 'TKJ', '151610033', '12-248-118-3', 'Silpi Damayanti', 'XII', 'R2', 1, 'hs118', 'ps118', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(119, 'XIITKJ', 'TKJ', '151610034', '12-248-119-2', 'Siti Kartini', 'XII', 'R2', 1, 'hs119', 'ps119', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(120, 'XIITKJ', 'TKJ', '151610035', '12-248-120-9', 'Siti Masitoh', 'XII', 'R2', 1, 'hs120', 'ps120', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(121, 'XIITKJ', 'TKJ', '151610036', '12-248-121-8', 'Suci Selawati', 'XII', 'R2', 2, 'hs121', 'ps121', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(122, 'XIITKJ', 'TKJ', '151610037', '12-248-122-7', 'Tania Pratika', 'XII', 'R2', 2, 'hs122', 'ps122', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(123, 'XIITKJ', 'TKJ', '151610038', '12-248-123-6', 'Tarsimah D.', 'XII', 'R2', 2, 'hs123', 'ps123', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(124, 'XIITKJ', 'TKJ', '151610039', '12-248-124-5', 'Trisna Shalamshah', 'XII', 'R2', 2, 'hs124', 'ps124', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, ''),
(125, 'XIITKJ', 'TKJ', '151610040', '12-248-125-4', 'Yoga Maulana Atmaja', 'XII', 'R2', 2, 'hs125', 'ps125', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', 0, '', '', '', '', '', 0, '', '', '', 0, '', 0, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nomor` int(5) NOT NULL,
  `soal` longtext NOT NULL,
  `jenis` int(1) NOT NULL,
  `pilA` longtext NOT NULL,
  `pilB` longtext NOT NULL,
  `pilC` longtext NOT NULL,
  `pilD` longtext NOT NULL,
  `pilE` longtext NOT NULL,
  `jawaban` varchar(1) NOT NULL,
  `file` text DEFAULT NULL,
  `file1` text DEFAULT NULL,
  `fileA` text DEFAULT NULL,
  `fileB` text DEFAULT NULL,
  `fileC` text DEFAULT NULL,
  `fileD` text DEFAULT NULL,
  `fileE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_mapel`, `nomor`, `soal`, `jenis`, `pilA`, `pilB`, `pilC`, `pilD`, `pilE`, `jawaban`, `file`, `file1`, `fileA`, `fileB`, `fileC`, `fileD`, `fileE`) VALUES
(1, 5, 1, '<p>Narkotika adalah zat atau obat yang berasal dari tanaman atau bukan tanaman baik sintetis maupun semi sintetis yang dapat menyebabkan penurunan atau perubahan kesadaran, hilangnya rasa, mengurangi sampai menghilangkan rasa nyeri, dan dapat menimbulkan ketergantungan.<br />Golongan narkotika yang hanya dapat digunakan untuk kepentingan pengembangan ilmu pengetahuan dan dilarang digunakan untuk kepentingan lainnya adalah golongan&hellip;</p>', 1, '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', '<p>5</p>', 'A', '', '', '', '', '', '', ''),
(2, 5, 2, 'Perhatikan pernyataan di bawah ini :<br />1. Sediaan yang mempunyai konsistensi seperti mentega, tidak mencair pada suhu biasa tetapi mudah dioleskan tanpa memakai tenaga<br />2. Sediaan yang banyak mengandung air, mudah diserap kulit. Suatu tipe yang dapat dicuci dengan air.<br />3. Sediaan yang mengandung lebih dari 50% zat padat (serbuk). Merupakan sediaan yang berfunsi penutup atau pelindung bagian kulit yang diberi.<br />4. Sediaan yang mengandung persentase tinggi lilin (waxes), sehingga konsistensinya lebih keras<br />5. Sediaan yang umumnya cair dan mengandung sedikit atau tanpa lilin digunakan terutama pada membran mukosa sebagai pelicin atau basis. Biasanya terdiri dari campuran sederhana minyak dan lemak dengan titik lebur yang rendah<br />Berdasarkan informasi di atas, sediaan pada nomor 3, adalah sediaan :', 1, 'Kream', 'Pasta', 'Unguentum', 'Gel', 'Cerata', 'B', '', '', '', '', '', '', ''),
(3, 5, 3, 'Terdapat obat-obat dibawah ini :<br />&bull; Obat kontrasepsi : Linestrenol<br />&bull; Obat saluran cerna : Antasid dan Sedativ/Spasmodik<br />&bull; Obat mulut dan tenggorokan : Hexetidine<br />&bull; Bacitracin, Clindamicin, Flumetason, dll.<br />&bull; Ranitidin , Asam fusidat, Alupurinol, dll<br />Obat obat tersebut memiliki lingkaran berwana merah, walaupun demikian dapat di beli tanpa menggunakan resep dokter. Termasuk golongan apakah obat obat tersebut :', 1, 'Obat bebas terbatas', 'Obat generik', 'Obat wajib apotek', 'Obat tradisional', 'Obat paten', 'C', '', '', '', '', '', '', ''),
(4, 5, 4, 'Dibawah ini adalah sediaan mengenai kapsul :<br />1. Bentuknya menarik dan praktis<br />2. Menutupi bau dan rasa yang tidak enak dari obat yang ada di dalamnya.<br />3. Dapat digunakan untuk zat yang mudah menguap<br />4. Mudah ditelan dibanding tablet<br />5. Dapat dibagi-bagi<br />Yang termasuk ke dalam keuntungan kapsul adalah :', 1, '1,2,3', '1,2,4', '2,3,4', '2,3,5', '3,4,5', 'B', '', '', '', '', '', '', ''),
(5, 5, 5, 'Sampah dibuang pada tanah yang rendah. Pembuangan sampah ini hanya cocok untuk sampah rubbish, sedangkan sampah jenis garbage dapat menimbulkan bau yang kurang sedap serta bersarangnya serangga dan tikus.<br />Cara pembuangan sampah jenis gabage dilakukan dengan cara :', 1, 'Individual incineration', 'Composting', 'Recycling', 'Pulverization', 'Land fill', 'E', '', '', '', '', '', '', ''),
(6, 5, 6, 'Penanganan masalah pencemaran lingkungan perlu dilakukan sedini mungkin. Upaya yang dilakukan dalam penanganan pencemaran berupa limbah, yaitu dengan pengelompokkan limbah berdasarkan :', 1, 'Jenis dan dampaknya', 'Sifat dan jenisnya', 'Dampak dan karakteristiknya', 'Sifat dan karakterisiiknya', 'Wujud dan jenisnya', 'D', '', '', '', '', '', '', ''),
(7, 5, 7, 'Setiap tahun pemerintah indonesia melaksanakan pekan imunisasi nasional, dalam hal ini setiap balita diberikan vaksin agar dapat meningkatkan kekebalan terhadap suatu penyakit. Sistem imunitas vaksin dalam memberi kekebalan pada tubuh termasuk ke dalam kekebalan&hellip;', 1, 'Kekebalan alami', 'Kekebalan adaptif humoral', 'Kekebalan adaptif dengan perantara sel', 'Kekebalan buatan aktif', 'Kekebalan buatan pasif', 'D', '', '', '', '', '', '', ''),
(8, 5, 8, 'Alat Pelindung Diri (APD) yaitu satu alat yang memiliki kekuatan membuat perlindungan seorang yang manfaatnya mengisolasi beberapa atau semua badan dari potensi bahaya ditempat kerja. Alat yang berperan sebagai penyaring hawa yang dihirup saat bekerja ditempat dengan kwalitas hawa jelek (contoh berdebu, beracun, dll) adalah :', 1, 'Safety Glasses', 'Ear Plug', 'Face Shield', 'Safety Helmet', 'Masker', 'E', '', '', '', '', '', '', ''),
(9, 5, 9, 'Berdasarkan simbol-simbol klasifikasi bahan kimia yang berbahaya, secara berturut-turut arti dari simbol di atas adalah :', 1, 'Korosif, beracun, iritasi', 'Racun, iritasi, karsinogenik', 'Mudah meledak, beracun, korosif', 'Pengoksidasi, berbahaya bagi lingkungan, karsinogenik', 'Karsinogenik, beracun, iritasi', 'E', 'DDK-K13-9.jpg', '', '', '', '', '', ''),
(10, 5, 10, 'Usaha Kesehatan Gigi Sekolah (UKGS) dilaksanakan oleh perawat gigi sekolah dibawah pengawasan dokter. Penyakit dan kelainan yang menjadi perhatian ialah kebersihan mulut dan gigi, caries dentis, penyakit periodental, bibir sumbing dan celah langit maupun tumor dalam mulut. Diantara kegiatan UKGS adalah penambalan pada gigi yang berlubang.<br />Dibawah ini salah satu penyebab gigi berlubang adalah :', 1, 'Kebiasaan menghisap jari', 'Kebiasaan menggigit pensil', 'Makan terlalu manis dan plak', 'Benturan keras pada gigi', 'Faktor genetika', 'C', '', '', '', '', '', '', ''),
(11, 5, 11, 'Cara mengidentifikasi sediaan farmasi dengan golongan obat tradisional ialah dengan memperhatikan lambang atau logo pada kemasan produk. Kemasan obat golongan Fitofarmaka ditandai dengan lambang ciri-ciri berikut &hellip;.&nbsp;', 1, 'jari-jari daun 3 pasang terletak dalam lingkaran terletak ditepi kemasan', 'lingkaran bulat berwarna biru dengan garis tepi berwarna hitam dengan dasar berwarna putih', 'jari-jari daun yang kemudian membentuk bintang terletak dalam lingkaran', 'lingkaran berwarna putih di dalamnya terdapat palang medali berwarna merah', 'logo berupa ranting daun terletak dalam lingkaran warna dicetak de&not;ngan warna hijau diatas dasar warna putih', 'C', '', '', '', '', '', '', ''),
(12, 5, 12, 'Cara mengidentifikasi sediaan farmasi dengan golongan berbeda menurut Undang-undang Nomor 5 Tahun 1997 ialah dengan memperhatikan lambang atau logo pada kemasan produk. Kemasan untuk obat bebas ditandai dengan lambang &hellip;&nbsp;', 1, 'lingkaran bulat berwarna hijau de&not;ngan garis tepi warna hitam', 'lingkaran bulat berwarna biru dengan garis tepi berwarna hitam', 'lingkaran bulat berwarna merah dengan garis tepi berwarna hitam de&not;ngan huruf K yang menyentuh garis tepi', 'lingkaran berwarna putih di dalamnya terdapat palang medali berwarna merah', 'logo dan tulisan &ldquo;JAMU&rdquo; Logo berupa ranting daun terletak dalam lingkaran warna dicetak de&not;ngan warna hijau yang menyolok dan kontras', 'A', '', '', '', '', '', '', ''),
(13, 5, 13, 'Seorang Siswi sewaktu melakukan praktikum di laboratorium kimia terjadi kecelakaan dan mengalami luka bakar akibat terkena bahan kimia yang bersifat asam. Pertolongan pertama yang dapat dilakukan adalah &hellip;.', 1, 'diberikan larutan bikarbonat 1% lalu cuci dengan air', 'dicuci dengan air kemudian dibersihkan dengan fosfor', 'dicuci dengan air kemudian dengan asam cuka encer (1:15)', 'dibilas dengan air, kemudian dioles dengan krim', 'direndam dengan pinset, kemudian rendam dengan tembaga sulfat', 'A', '', '', '', '', '', '', ''),
(14, 5, 14, 'Di Indonesia, pemahaman publik tentang manfaat, penggunaan, juga dampak dari penggunaan antibiotik masih lemah. Ini menjadi persoalan serius karena tingkat penggunaan antibiotik di Indonesia sudah cukup memperihatinkan. Penggunaan antibiotik yang tidak tepat menyebabkan bakteri, virus dan parasit lainnya secara bertahap kehilangan kepekaan terhadap obat yang sebelumnya membunuh mereka. Kondisi kehilangan kepekaan terhadap obat ini termasuk kedalam kondisi :', 1, 'Kekebalan aktif alami', 'Kekebalan aktif buatan', 'Kekebalan pasif', 'Resistensi', 'Autoimun', 'D', '', '', '', '', '', '', ''),
(15, 5, 15, 'Beberapa jenis gizi memegang peranan dalam pembentukan sel darah merah (hemopoiesis) . bila pembentukan sel darah merah terganggu dapat menimbulkan gejala diantaranya adalah cepat lelah, napas pendek, denyut jantung kencang, susa buang air besar, nafsu makan kurang, kepala pusing, mata berkunag-kunang, serta pucat pada wajah, bibir, telapak tangan, telapak kaki, kuku, dan lipatan pelupuk mata sebelah dalam. Gejala penyakit ini di sebabkan karena ...', 1, 'Kurang energy protein', 'Kurang Vitamin A', 'Kurang Iodium', 'Kurang Besi', 'Kurang Vit B12', 'D', '', '', '', '', '', '', ''),
(16, 5, 16, 'Bagian resep di atas yang menerangkan tentang tanggal dan tempat resep dibuat adalah&hellip;', 1, 'Inscription', 'Subcriptio', 'Invocatio', 'Praecriptio', 'Signatura', 'A', 'DDK-K13-16.jpg', '', '', '', '', '', ''),
(17, 5, 17, 'Cara membersihkan semua peralatan bekas pakai di laboratorium adalah &hellip;', 1, 'menggunakan larutan detergen dengan cara merendam selama 10 menit', 'menggunakan larutan klorin 0,5% + larutan pembersih lantai 1 sendok makan', 'menggunakan air steril secukupnya dengan cara direndam selama 20 menit', 'menggunakan desinfektan larutan klorin dengan cara direndam selama 30 menit', 'menggunakan desinfektan larutan klorin 0,5% dengan cara direndam selama 20-30 menit', 'E', '', '', '', '', '', '', ''),
(18, 5, 18, 'Secara berkala seorang bidan selalu melakukan pemeriksaan janin pada ibu hamil. Untuk melakukan pemeriksaan awal hal yang pertama dilakukan adalah mendengarkan detak jantung janin. Alat yang digunakan untuk mendengarkan detak denyut jantung janin tersebut adalah disebut&hellip;', 1, 'Thermoimeter', 'Sphygmomanometer', 'Stethoscope monoaural', 'Blood transfusion set', 'Infusion set', 'C', '', '', '', '', '', '', ''),
(19, 5, 19, 'Suatu tablet alergi (4 mg/tablet) dengan aturan pakai untuk dewasa sehari 3-4 kali 1 tablet, aturan pakai ini diberikan berdasarkan petunjuk umum pengobatan yang tidak mengikat namun dijadikan patokan pengobatan. Dosis (takaran) tersebut termasuk .&hellip;', 1, 'Dosis lazim', 'Dosis letal', 'Dosis maksimal', 'Dosis terapi', 'Dosis toksik', 'A', '', '', '', '', '', '', ''),
(20, 5, 20, 'Vitamin yang berperan penting dalam pembentukan eritrosit dan dapat menimbulkan anemia jika tubuh kekurangan adalah&hellip;', 1, 'Asam pantotenat', 'Asam folat', 'Asam nikotin', 'Kolin dan biotin', 'Niasin', 'B', '', '', '', '', '', '', ''),
(21, 5, 21, 'Bedak alergi merupakan sediaan berupa serbuk ringan yang digunakan secara topikal pada permukaan kulit misalnya untuk mengobati gatal dan biang keringat. Bedak alergi tersebut termasuk &hellip;.', 1, 'Pulveres', 'Pulvis adspersorius', 'Pulvis dentifricius', 'Pulvis effervescent', 'Pulvis strernutatorius', 'B', '', '', '', '', '', '', ''),
(22, 5, 22, 'Tujuan umum dari usaha kesehatan sekolah adalah mempertinggi nilai promotif, preventif,kuratif serta rehabilitasi anak-anak sekolah dan lingkungannya sehingga didapatkan anak-anak yang sehat jasmani, rohani dan sosialnya<br />Di bawah ini yang termasuk ke dalam tindakan kuratif di sekolah adalah&hellip;', 1, 'pemberantasan penyakit menular', 'memberi pengobatan setelah diagnosa ditegakkan', 'menciptakan keadaan lingkungan yang sehat', 'pengambilan sampel darah', 'perawatan gigi', 'B', '', '', '', '', '', '', ''),
(23, 5, 23, 'Penyakit yang pernah menyerang masyakarat kembali mewabah di Indonesia, ditandai dengan panas lebih kurang 380 C, untuk tingkat lanjut muncul pseudomembran putih keabuan yang tidak mudah lepas , terjadi pembengkakan kelenjar leher, sesak nafas disertai bunyi, mudah berdarah di faring, laring atau tonsil. <br />Kementerian Kesehatan bahkan sudah menetapkan status kejadian luar biasa (KLB) karena telah memakan puluhan korban jiwa setidaknya di 20 provinsi. Jenis penyakit tersebut adalah&hellip;', 1, 'Campak', 'Pes', 'Difteri', 'Pertussis', 'Rabies', 'C', '', '', '', '', '', '', ''),
(24, 5, 24, 'Berikut ini merupakan contoh penyakit menular : <br />1. Cacar <br />2. Difteri <br />3. Kolera <br />4. Morbili <br />5. Pes <br />6. TBC <br />Penyakit yang tergolong karantina adalah &hellip;.', 1, '1,2,3', '1,2,5', '1,3,4', '2,4,5', '1,3,6', 'E', '', '', '', '', '', '', ''),
(25, 5, 25, 'Penyakit yang secara alamiah dijumpai pada hewan vertebrata yang bisa ditularkan ke manusia adalah&hellip;.', 1, 'campak', 'dengue', 'polio', 'rabies', 'tifus', 'D', '', '', '', '', '', '', ''),
(26, 5, 26, 'Kasus leptospirosis banyak terjadi di daerah yang sering terjadi bencana banjir. Selama tahun 2003-2007 kasus leptospirosis terbanyak adalah DKI Jakarta, tahun 2008 terbanyak dilaporkan di DI Jogjakarta yaitu 125 kasus, Jawa tengah 72 kasus, DKI Jakarta 37 kasus dan Jawa Timur 29 kasus. Kejadian tersebut merupakan jenis epidemiologi tingkat&hellip;&hellip;', 1, 'Epidemi', 'Pandemi', 'Endemi', 'Sporadik', 'Epidemologi', 'C', '', '', '', '', '', '', ''),
(27, 5, 27, 'Tujuan Pengaturan psikotropika menurut UU no 35 tahun 2009, yaitu&hellip;<br />1) Menjamin ketersediaan guna kepentingan pelayanan kesehatan<br />2) Merencanakan kebutuhan perbekalan farmasi secara optimal<br />3) Mencegah terjadinya penyalahgunaan psikotropika<br />4) Memudahkan pencarian dan pengawasan<br />5) Memberantas peredaran gelap psikotropika<br />6) Sirkulasi udara yang baik', 1, '1,2,3 benar', '2,3,4 benar', '3,4,5 benar', '4,5,6 benar', '1,3,5 benar', 'E', '', '', '', '', '', '', ''),
(28, 5, 28, 'Obat Zetamol memiliki nomor kode regristrasi: DBL8527900237A1<br />Berdasarkan kode regristrasinya, maka obat tersebut termasuk kedalam golongan obat &nbsp;', 1, 'Obat paten dengan golongan obat bebas terbatas yang diproduksi di dalam negeri', 'Obat paten dengan golongan obat bebas yang diproduksi di dalam negeri', 'Obat paten dengan golongan obat bebas yang diproduksi di luar negeri', 'Obat generik dengan golongan obat bebas yang diproduksi di luar negeri', 'Obat generik dengan golongan obat keras yang diproduksi di luar negeri', 'B', '', '', '', '', '', '', ''),
(29, 5, 29, 'Kasus penggerebekan Industri Saus berbahaya di Kota Bandung harus menjadi momen pembelajaran serius bagi pemerintah dan masyarakat. Industri yang telah beroperasi selama puluhan tahun ini diidentifikasi menggunakan pewarna tekstil dan beberapa bahan kimia berbahaya<br />Berikut ini terdapat beberapa bahanpewarna :<br />1) Rhodamin B<br />2) Kurkumin <br />3) Magenta<br />4) Chorine<br />5) Auramine<br />6) Klorofil <br />Yang termasuk ke dalam zat warna yang berbahaya adalah&hellip;', 1, '1,3,5', '2,4,6', '1,2,3', '4,5,6', '1,4,5', 'A', '', '', '', '', '', '', ''),
(30, 5, 30, 'Tata cara pendaftaran obat generic hanya dapat dilakukan dengan sertifikat CPOB yang dibuktikan dengan sertifikat CPOB dan wajib memenuhi&hellip;', 1, 'Spesifikasi baku dan persyaratan mutu', 'Mutu yang baik', 'Logo obat generik', 'Kemasannya sudah baku', 'Cara pembuatan obat yang baik', 'A', '', '', '', '', '', '', ''),
(31, 5, 31, 'Alat pernafasan yang terletak di kerongkongan, tersusun dari tulang rawan yang berbentuk cincin, dinding sebelah dalamnya terdapat selaput lendir dan silia, berfungsi menahan dan mengeluarkan kotoran agar tidak masuk paru-paru jika kotoran tersebut tidak mampu ditangkap oleh cairan dari laring. Alat pernapasan yang dimaksud adalah.....', 1, 'Alveolus', 'Bronchioles', 'Bronchus', 'Trachea', 'Tenggorokan', 'D', '', '', '', '', '', '', ''),
(32, 5, 32, 'Hidung dapat mencium berbagai macam bau karena di dalam rongga hidung terdapat ...', 1, 'Sel-sel saraf penunjang', 'Sel olfaktorius', 'Sel basah', 'Serabut saraf pembau', 'Selaput lender', 'D', '', '', '', '', '', '', ''),
(33, 5, 33, 'Dalam system pencernaan, organ yang di tandai dengan angka 2 adalah...', 1, 'Usus dua belas jari', 'Kolon desendens', 'Kolon transversum', 'Kolon asendens', 'Rectum', 'D', 'DDK-K13-33.jpg', '', '', '', '', '', ''),
(34, 5, 34, 'Makanan yang dapat dirasakan bagian-bagian pada lidah depan, pinggir depan dan belakang berturut-turut adalah ...', 1, 'Pahit, asam, manis', 'Asam, manis, pahit', 'Manis, asin, pahit', 'Manis, asam, asin', 'Manis, asam, pahit', 'C', '', '', '', '', '', '', ''),
(35, 5, 35, 'Pada struktur organ jantung, simbol yang di tunjukkan huruf Y adalah :', 1, 'Aorta', 'Serambi kanan', 'Serambi kiri', 'Bilik kanan', 'Bilik kiri', 'E', 'DDK-K13-35.jpg', '', '', '', '', '', ''),
(36, 5, 36, 'Gangguan ritme berupa kelainan dalam frekwensi (kecepatan) denyut jantung karena serambil (atrium) dan bilik (ventrikel) berdenyut lebih cepat (tachycardia) atau lebih lambat (bradycardia) dari normal. Dapat pula karena terjadinya kekacauan dalam ritme (irama) denyutan jantung, misalnya vibrasi (flutter), getaran (fibrilasi) ataupun extrasistole. Kondisi tersebut termasuk ke dalam&hellip;', 1, 'Angina Pectoris', 'Infark jantung', 'Aritmia', 'Dekompenasi Jantung', 'Shock', 'C', '', '', '', '', '', '', ''),
(37, 5, 37, 'Perbedaan pembuluh nadi (arteri) dengan pembuluh balik (vena) yang benar adalah nomor..', 1, '1,2', '1,3', '2,3', '3,4', '1,4', 'E', 'DDK-K13-37.jpg', '', '', '', '', '', ''),
(38, 5, 38, 'Aliran darah pada peredaran darah kecil melalui &hellip;', 1, 'Jantung &ndash; aorta &ndash; paru-paru &ndash; seluruh tubuh &ndash; jantung', 'Jantung &ndash; aorta &ndash; seluruh tubuh &ndash; arteri pulmonalis &ndash; jantung', 'Jantung &ndash; seluruh tubuh &ndash; paru-paru &ndash; arteri pulmonalis &ndash; jantung', 'Jantung &ndash; arteri pulmonalis &ndash; paru-paru &ndash; vena pulmonalis &ndash; jantung', 'Jantung &ndash; vena pulmonalis &ndash; paru-paru - arteri pulmonalis &ndash; jantung', 'D', '', '', '', '', '', '', ''),
(39, 5, 39, 'Pada organ ginjal, lokasi yang ditunjukkan huruf B adalah :', 1, 'Cortex', 'Medulla', 'Renal artery', 'Major calyx', 'Ureter', 'A', 'DDK-K13-39.jpg', '', '', '', '', '', ''),
(40, 5, 40, 'Organ yang berfungsi sebagai penampung urine yang disalurkan oleh ureter dari ginjal, ketika sudah full maka dengan kerja sistim syaraf seseorang akan diperintahkan untuk segera mengelurkan urine tersebut. <br />Organ dengan fungsi tersebut tersebut adalah..', 1, 'Ginjal', 'Kandung kemih', 'Ureter', 'Uretra', 'Vena renalis', 'B', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(6) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `masa_berlaku` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id_token`, `token`, `time`, `masa_berlaku`) VALUES
(1, 'NMNWDY', '2019-10-21 06:17:50', '00:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(5) NOT NULL,
  `id_pk` varchar(10) NOT NULL,
  `id_guru` int(5) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `kode_ujian` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jml_soal` int(5) NOT NULL,
  `jml_esai` int(5) NOT NULL,
  `bobot_pg` int(5) NOT NULL,
  `opsi` int(1) NOT NULL,
  `bobot_esai` int(5) NOT NULL,
  `tampil_pg` int(5) NOT NULL,
  `tampil_esai` int(5) NOT NULL,
  `lama_ujian` int(5) NOT NULL,
  `tgl_ujian` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `waktu_ujian` time DEFAULT NULL,
  `selesai_ujian` time DEFAULT NULL,
  `level` varchar(5) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `sesi` varchar(1) NOT NULL,
  `acak` int(1) NOT NULL,
  `token` int(1) NOT NULL,
  `status` int(3) NOT NULL,
  `hasil` int(2) NOT NULL,
  `kkm` varchar(128) DEFAULT NULL,
  `ulang` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `hasil_jawaban`
--
ALTER TABLE `hasil_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`kode_level`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `pengacak`
--
ALTER TABLE `pengacak`
  ADD PRIMARY KEY (`id_pengacak`);

--
-- Indeks untuk tabel `pengacakopsi`
--
ALTER TABLE `pengacakopsi`
  ADD PRIMARY KEY (`id_pengacak`);

--
-- Indeks untuk tabel `pengawas`
--
ALTER TABLE `pengawas`
  ADD PRIMARY KEY (`id_pengawas`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `pk`
--
ALTER TABLE `pk`
  ADD PRIMARY KEY (`id_pk`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- Indeks untuk tabel `savsoft_options`
--
ALTER TABLE `savsoft_options`
  ADD PRIMARY KEY (`oid`);

--
-- Indeks untuk tabel `savsoft_qbank`
--
ALTER TABLE `savsoft_qbank`
  ADD PRIMARY KEY (`qid`);

--
-- Indeks untuk tabel `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`kode_sesi`);

--
-- Indeks untuk tabel `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_jawaban`
--
ALTER TABLE `hasil_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengacak`
--
ALTER TABLE `pengacak`
  MODIFY `id_pengacak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengacakopsi`
--
ALTER TABLE `pengacakopsi`
  MODIFY `id_pengacak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengawas`
--
ALTER TABLE `pengawas`
  MODIFY `id_pengawas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `savsoft_options`
--
ALTER TABLE `savsoft_options`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `savsoft_qbank`
--
ALTER TABLE `savsoft_qbank`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
