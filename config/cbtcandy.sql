-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 09:32 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `candycbt3`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `sesi` varchar(10) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `ikut` varchar(10) NOT NULL,
  `susulan` varchar(10) NOT NULL,
  `no_susulan` text NOT NULL,
  `mulai` varchar(10) NOT NULL,
  `selesai` varchar(10) NOT NULL,
  `nama_proktor` varchar(50) NOT NULL,
  `nip_proktor` varchar(50) NOT NULL,
  `nama_pengawas` varchar(50) NOT NULL,
  `nip_pengawas` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `tgl_ujian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_jawaban`
--

CREATE TABLE `hasil_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` char(1) NOT NULL,
  `jenis` int(1) NOT NULL,
  `esai` text NOT NULL,
  `nilai_esai` int(5) NOT NULL,
  `ragu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` char(1) NOT NULL,
  `jenis` int(1) NOT NULL,
  `esai` text NOT NULL,
  `nilai_esai` int(5) NOT NULL,
  `ragu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `kode_level` varchar(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `text` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_log` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `ipaddress` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_log`, `id_siswa`, `ipaddress`, `date`) VALUES
(6, 5, '', '2019-03-26 04:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
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
  `kelas` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(2) NOT NULL,
  `statusujian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `ujian_mulai` varchar(20) NOT NULL,
  `ujian_berlangsung` varchar(20) NOT NULL,
  `ujian_selesai` varchar(20) NOT NULL,
  `jml_benar` int(10) NOT NULL,
  `jml_salah` int(10) NOT NULL,
  `nilai_esai` varchar(10) NOT NULL,
  `skor` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `ipaddress` varchar(20) NOT NULL,
  `hasil` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengacak`
--

CREATE TABLE `pengacak` (
  `id_pengacak` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` longtext NOT NULL,
  `id_esai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengacak`
--

INSERT INTO `pengacak` (`id_pengacak`, `id_siswa`, `id_mapel`, `id_soal`, `id_esai`) VALUES
(4, 90, 1, '4,5,6,1,2,3,7,8,9,10,', '13,14,15,12,11,'),
(6, 1, 3, '51,57,58,54,59,55,56,52,60,53,', '61,62,63,64,65,'),
(7, 0, 3, '51,57,58,54,59,55,56,52,60,53,', '61,62,63,64,65,'),
(9, 3, 3, '86,76,103,85,71,94,97,70,88,89,68,101,87,102,93,92,99,95,83,75,82,67,84,80,77,91,96,73,81,104,100,98,90,69,66,74,72,105,78,79,', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengacakopsi`
--

CREATE TABLE `pengacakopsi` (
  `id_pengacak` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` longtext NOT NULL,
  `id_esai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengacakopsi`
--

INSERT INTO `pengacakopsi` (`id_pengacak`, `id_siswa`, `id_mapel`, `id_soal`, `id_esai`) VALUES
(1, 108, 4, 'D,A,B,C,E,E,B,D,C,A,E,C,B,D,A,D,C,B,E,A,E,D,A,B,C,E,B,D,C,A,A,E,C,B,D,C,D,E,B,A,A,C,B,E,D,B,E,A,C,D,', '111,112,113,114,115,'),
(2, 87, 2, 'C,B,D,E,A,D,C,B,A,E,A,B,D,C,E,D,E,B,C,A,A,B,D,E,C,C,D,E,B,A,D,E,A,B,C,C,D,E,A,B,C,D,B,E,A,B,C,D,A,E,A,E,B,D,C,D,E,A,C,B,C,E,A,B,D,C,A,D,E,B,E,B,C,A,D,B,C,A,D,E,C,A,E,B,D,A,E,B,D,C,C,D,E,B,A,D,C,E,A,B,C,B,D,E,A,B,A,D,E,C,D,E,A,B,C,C,A,E,D,B,A,E,B,D,C,', ''),
(3, 88, 2, 'E,A,D,C,B,C,A,D,E,B,E,B,C,D,A,B,E,D,C,A,B,C,E,A,D,E,D,B,A,C,C,A,E,B,D,E,C,B,D,A,B,A,C,E,D,B,A,E,C,D,B,D,C,A,E,B,D,C,E,A,B,C,E,A,D,B,D,C,E,A,B,D,C,A,E,E,D,A,B,C,E,B,D,C,A,A,D,C,B,E,B,A,D,E,C,A,C,D,B,E,D,B,A,E,C,A,B,E,C,D,C,A,D,B,E,C,E,B,A,D,B,A,D,E,C,', ''),
(4, 90, 1, 'B,E,D,A,C,E,D,B,C,A,B,E,D,C,A,E,D,C,B,A,B,A,E,C,D,E,C,A,B,D,A,C,B,D,E,C,B,A,D,E,D,A,E,B,C,A,D,E,C,B,', '13,14,15,12,11,'),
(5, 1, 3, '', ''),
(6, 1, 3, 'A,C,B,D,E,C,E,A,B,D,E,C,D,A,B,C,E,D,B,A,E,B,A,C,D,C,D,A,B,E,D,A,C,E,B,C,D,A,E,B,D,A,B,E,C,C,E,A,B,D,', '61,62,63,64,65,'),
(7, 0, 3, 'B,E,D,C,A,E,D,C,B,A,B,A,E,C,D,E,C,A,B,D,A,C,B,D,E,C,B,A,D,E,D,A,E,B,C,A,D,E,C,B,C,D,A,E,B,E,B,A,C,D,', '61,62,63,64,65,'),
(9, 3, 3, 'B,E,C,A,D,C,B,A,D,E,C,D,B,E,A,B,A,C,E,D,A,E,D,B,C,D,B,A,E,C,E,B,A,D,C,A,C,B,E,D,D,B,C,A,E,A,D,C,E,B,A,C,B,E,D,D,B,A,C,E,C,E,B,D,A,E,A,C,D,B,E,C,D,A,B,C,A,D,E,B,B,D,C,E,A,E,D,B,A,C,C,A,B,D,E,B,C,A,D,E,A,C,B,E,D,C,B,D,A,E,B,C,E,D,A,E,C,B,A,D,A,B,C,D,E,B,E,C,A,D,D,C,E,B,A,E,C,A,B,D,B,C,D,E,A,C,E,B,A,D,E,B,C,A,D,C,E,D,B,A,E,A,B,C,D,B,E,A,C,D,D,B,C,E,A,D,B,E,A,C,A,E,D,C,B,D,B,C,E,A,C,E,D,B,A,C,E,A,D,B,', ''),
(10, 62, 11, 'D,B,A,C,E,D,C,B,E,A,C,E,D,A,B,C,A,E,D,B,A,D,C,E,B,A,B,C,D,E,E,D,C,A,B,A,E,B,D,C,E,D,A,B,C,A,D,C,B,E,E,B,D,C,A,D,A,B,C,E,E,A,C,D,B,B,C,E,D,A,D,A,B,E,C,A,C,D,E,B,A,B,E,C,D,E,D,A,B,C,A,C,B,E,D,C,E,B,D,A,C,E,B,D,A,E,C,D,B,A,E,D,A,B,C,B,C,D,E,A,E,C,D,B,A,C,A,D,B,E,C,D,E,B,A,C,D,A,E,B,B,C,E,A,D,C,E,D,B,A,A,B,D,E,C,E,A,C,B,D,D,C,E,B,A,E,D,C,A,B,D,B,E,A,C,D,B,E,A,C,C,A,E,D,B,A,B,D,C,E,C,E,D,A,B,C,A,E,D,B,', ''),
(13, 3, 14, 'B,A,D,C,C,B,D,A,C,D,B,A,A,D,C,B,D,A,C,B,C,A,B,D,A,B,C,D,B,C,D,A,A,D,B,C,A,B,C,D,B,A,D,C,B,D,A,C,A,B,D,C,C,A,B,D,D,C,B,A,C,B,D,A,C,D,B,A,D,B,A,C,D,C,B,A,B,A,D,C,D,C,A,B,A,D,C,B,C,D,B,A,A,B,C,D,D,A,B,C,B,D,A,C,D,B,C,A,A,B,D,C,A,D,C,B,C,D,B,A,C,D,A,B,C,A,B,D,B,C,D,A,C,D,B,A,B,C,A,D,C,D,B,A,C,D,A,B,B,A,D,C,C,B,D,A,D,C,A,B,', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengawas`
--

CREATE TABLE `pengawas` (
  `id_pengawas` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat_jalan` varchar(255) NOT NULL,
  `rt_rw` varchar(8) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kode_pos` int(6) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `bidang_studi` varchar(50) NOT NULL,
  `jenis_ptk` varchar(50) NOT NULL,
  `tgs_tambahan` varchar(50) NOT NULL,
  `status_pegawai` varchar(50) NOT NULL,
  `status_aktif` varchar(20) NOT NULL,
  `status_nikah` varchar(20) NOT NULL,
  `sumber_gaji` varchar(30) NOT NULL,
  `ahli_lab` varchar(10) NOT NULL,
  `nama_ibu` varchar(40) NOT NULL,
  `nama_suami` varchar(50) NOT NULL,
  `nik_suami` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `tmt` date NOT NULL,
  `keahlian_isyarat` varchar(10) NOT NULL,
  `kewarganegaraan` varchar(10) NOT NULL,
  `npwp` varchar(16) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengawas`
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
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(5) NOT NULL,
  `type` varchar(30) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `user` int(3) NOT NULL,
  `text` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pk`
--

CREATE TABLE `pk` (
  `id_pk` varchar(10) NOT NULL,
  `program_keahlian` varchar(50) NOT NULL,
  `kode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `kode_ruang` varchar(10) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_options`
--

CREATE TABLE `savsoft_options` (
  `oid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `q_option_match` varchar(1000) DEFAULT NULL,
  `score` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `savsoft_qbank`
--

CREATE TABLE `savsoft_qbank` (
  `qid` int(11) NOT NULL,
  `question_type` varchar(100) NOT NULL DEFAULT 'Multiple Choice Single Answer',
  `question` text NOT NULL,
  `description` text NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `no_time_served` int(11) NOT NULL DEFAULT '0',
  `no_time_corrected` int(11) NOT NULL DEFAULT '0',
  `no_time_incorrected` int(11) NOT NULL DEFAULT '0',
  `no_time_unattempted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE `server` (
  `kode_server` varchar(20) NOT NULL,
  `nama_server` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`kode_server`, `nama_server`, `status`) VALUES
('R1', 'SERVER R1', 'aktif'),
('R2', 'SERVER R2', 'aktif'),
('ONLINE', 'ONLINE', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `sesi`
--

CREATE TABLE `sesi` (
  `kode_sesi` varchar(10) NOT NULL,
  `nama_sesi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session_time` varchar(10) NOT NULL,
  `session_hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session_time`, `session_hash`) VALUES
(1, '1447610188', '$2y$10$dt9BTs7FlTXgpactflaXPOSVWrs.wurWsKBGv18JkzolJmHZOj.B.');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
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
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `aplikasi`, `kode_sekolah`, `sekolah`, `jenjang`, `kepsek`, `nip`, `alamat`, `kecamatan`, `kota`, `telp`, `fax`, `web`, `email`, `logo`, `header`, `header_kartu`, `nama_ujian`, `versi`, `ip_server`, `waktu`) VALUES
(1, 'SMK HS AGUNG', 'K123', 'SMK HS AGUNG', 'SMP', 'Dedi Baidillah, S.Pd, M.Pd', '-', 'IO : 503.15/015/IV/SK-SMK/BPMPPT/2013; NPSN: 69787351 ; NSS : 402022210005<br />\r\nJL.Buyut Kaipah .Pulo Bambu Karang Bahagia Kec.Karang Bahagia Kab. Bekasi <br />\r\n', 'Karang Bahagia', 'Bekasi', '021 123 123 123', '', 'smkhsagung.sch.id', 'smkhsagung@gmail.com', 'dist/img/logo43.png', 'YAYASAN SOFIA MUJAHIDA UTAMA', 'KARTU PESERTA\nUJIAN SEKOLAH BERBASIS KOMPUTER', 'UJIAN SEKOLAH BERSTANDAR NASIONAL', '2.4', 'http://192.168.0.200/candycbt', 'Asia/Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
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
  `foto` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kebutuhan_khusus` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `jenis_tinggal` varchar(100) NOT NULL,
  `alat_transportasi` varchar(100) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `skhun` int(11) NOT NULL,
  `no_kps` varchar(50) NOT NULL,
  `nama_ayah` varchar(150) NOT NULL,
  `tahun_lahir_ayah` int(4) NOT NULL,
  `pendidikan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `penghasilan_ayah` varchar(100) NOT NULL,
  `nohp_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(150) NOT NULL,
  `tahun_lahir_ibu` int(4) NOT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `penghasilan_ibu` varchar(100) NOT NULL,
  `nohp_ibu` int(15) NOT NULL,
  `nama_wali` varchar(150) NOT NULL,
  `tahun_lahir_wali` int(4) NOT NULL,
  `pendidikan_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(100) NOT NULL,
  `penghasilan_wali` varchar(50) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `nisn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
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
  `file` text,
  `file1` text,
  `fileA` text,
  `fileB` text,
  `fileC` text,
  `fileD` text,
  `fileE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(6) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `masa_berlaku` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id_token`, `token`, `time`, `masa_berlaku`) VALUES
(1, 'ZRYESS', '2019-03-21 16:38:15', '00:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(5) NOT NULL,
  `id_pk` varchar(10) NOT NULL,
  `id_guru` int(5) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jml_soal` int(5) NOT NULL,
  `jml_esai` int(5) NOT NULL,
  `bobot_pg` int(5) NOT NULL,
  `bobot_esai` int(5) NOT NULL,
  `tampil_pg` int(5) NOT NULL,
  `tampil_esai` int(5) NOT NULL,
  `lama_ujian` int(5) NOT NULL,
  `tgl_ujian` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `waktu_ujian` time NOT NULL,
  `selesai_ujian` time NOT NULL,
  `level` varchar(5) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `sesi` varchar(1) NOT NULL,
  `acak` int(1) NOT NULL,
  `token` int(1) NOT NULL,
  `status` int(3) NOT NULL,
  `hasil` int(2) NOT NULL,
  `proktor` varchar(30) NOT NULL,
  `pengawas` varchar(30) NOT NULL,
  `nip_pengawas` varchar(30) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `hasil_jawaban`
--
ALTER TABLE `hasil_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`kode_level`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pengacak`
--
ALTER TABLE `pengacak`
  ADD PRIMARY KEY (`id_pengacak`);

--
-- Indexes for table `pengacakopsi`
--
ALTER TABLE `pengacakopsi`
  ADD PRIMARY KEY (`id_pengacak`);

--
-- Indexes for table `pengawas`
--
ALTER TABLE `pengawas`
  ADD PRIMARY KEY (`id_pengawas`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `pk`
--
ALTER TABLE `pk`
  ADD PRIMARY KEY (`id_pk`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- Indexes for table `savsoft_options`
--
ALTER TABLE `savsoft_options`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `savsoft_qbank`
--
ALTER TABLE `savsoft_qbank`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`kode_sesi`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_jawaban`
--
ALTER TABLE `hasil_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengacak`
--
ALTER TABLE `pengacak`
  MODIFY `id_pengacak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengacakopsi`
--
ALTER TABLE `pengacakopsi`
  MODIFY `id_pengacak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengawas`
--
ALTER TABLE `pengawas`
  MODIFY `id_pengawas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savsoft_options`
--
ALTER TABLE `savsoft_options`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savsoft_qbank`
--
ALTER TABLE `savsoft_qbank`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
