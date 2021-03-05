-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.8-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for cbtcandy
CREATE DATABASE IF NOT EXISTS `cbtcandy` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cbtcandy`;

-- Dumping structure for table cbtcandy.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(10) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(10) NOT NULL,
  `sesi` varchar(10) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
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
  `tgl_ujian` varchar(20) NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.berita: ~6 rows (approximately)
DELETE FROM `berita`;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` (`id_berita`, `id_mapel`, `sesi`, `ruang`, `jenis`, `ikut`, `susulan`, `no_susulan`, `mulai`, `selesai`, `nama_proktor`, `nip_proktor`, `nama_pengawas`, `nip_pengawas`, `catatan`, `tgl_ujian`) VALUES
	(1, 5, '1', 'R1', 'PAT', '', '', '', '', '', '', '', '', '', '', ''),
	(2, 5, '2', 'R1', 'PAT', '', '', '', '', '', '', '', '', '', '', ''),
	(3, 5, '3', 'R1', 'PAT', '', '', '', '', '', '', '', '', '', '', ''),
	(4, 5, '1', 'R2', 'PAT', '', '', '', '', '', '', '', '', '', '', ''),
	(5, 5, '2', 'R2', 'PAT', '', '', '', '', '', '', '', '', '', '', ''),
	(6, 5, '3', 'R2', 'PAT', '', '', '', '', '', '', '', '', '', '', '');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.hasil_jawaban
CREATE TABLE IF NOT EXISTS `hasil_jawaban` (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `jawaban` char(1) NOT NULL,
  `jenis` int(1) NOT NULL,
  `esai` text NOT NULL,
  `nilai_esai` int(5) NOT NULL,
  `ragu` int(1) NOT NULL,
  PRIMARY KEY (`id_jawaban`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.hasil_jawaban: ~0 rows (approximately)
DELETE FROM `hasil_jawaban`;
/*!40000 ALTER TABLE `hasil_jawaban` DISABLE KEYS */;
/*!40000 ALTER TABLE `hasil_jawaban` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.jawaban
CREATE TABLE IF NOT EXISTS `jawaban` (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `jawaban` char(1) NOT NULL,
  `jenis` int(1) NOT NULL,
  `esai` text NOT NULL,
  `nilai_esai` int(5) NOT NULL,
  `ragu` int(1) NOT NULL,
  PRIMARY KEY (`id_jawaban`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.jawaban: ~0 rows (approximately)
DELETE FROM `jawaban`;
/*!40000 ALTER TABLE `jawaban` DISABLE KEYS */;
/*!40000 ALTER TABLE `jawaban` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.jenis: ~4 rows (approximately)
DELETE FROM `jenis`;
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` (`id_jenis`, `nama`, `status`) VALUES
	('PAT', 'Penilaian Akhir Tahun', 'aktif'),
	('PH', 'Penilaian Harian', 'aktif'),
	('PTS', 'Penilaian Tengah Semester', 'aktif'),
	('USBN', 'Ujian Nasionan Berstandar Nasional', '');
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` varchar(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.kelas: ~0 rows (approximately)
DELETE FROM `kelas`;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` (`id_kelas`, `level`, `nama`) VALUES
	('XIITP', 'XII', 'XIITP');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.level
CREATE TABLE IF NOT EXISTS `level` (
  `kode_level` varchar(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.level: ~0 rows (approximately)
DELETE FROM `level`;
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` (`kode_level`, `keterangan`) VALUES
	('XII', 'XII');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.log
CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `text` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.log: ~4 rows (approximately)
DELETE FROM `log`;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`id_log`, `id_siswa`, `type`, `text`, `date`) VALUES
	(1, 1, 'login', 'masuk', '2019-09-15 19:52:36'),
	(2, 1, 'logout', 'keluar', '2019-09-15 19:52:43'),
	(3, 5, 'login', 'masuk', '2019-09-15 20:57:26'),
	(4, 1, 'login', 'masuk', '2019-09-15 21:27:06');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.login
CREATE TABLE IF NOT EXISTS `login` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `ipaddress` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.login: ~3 rows (approximately)
DELETE FROM `login`;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id_log`, `id_siswa`, `ipaddress`, `date`) VALUES
	(5, 3, '', '2019-09-13 04:53:29'),
	(7, 5, '', '2019-09-15 20:57:27'),
	(8, 1, '', '2019-09-15 21:27:07');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.mapel
CREATE TABLE IF NOT EXISTS `mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
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
  `statusujian` int(11) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.mapel: ~0 rows (approximately)
DELETE FROM `mapel`;
/*!40000 ALTER TABLE `mapel` DISABLE KEYS */;
INSERT INTO `mapel` (`id_mapel`, `idpk`, `idguru`, `nama`, `jml_soal`, `jml_esai`, `tampil_pg`, `tampil_esai`, `bobot_pg`, `bobot_esai`, `level`, `opsi`, `kelas`, `date`, `status`, `statusujian`) VALUES
	(5, 'semua', '41', 'KIMIA', 30, 0, 30, 0, 100, 0, 'semua', 5, 'a:1:{i:0;s:5:"semua";}', '2019-09-15 15:17:50', '1', 0);
/*!40000 ALTER TABLE `mapel` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.mata_pelajaran
CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `kode_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.mata_pelajaran: ~10 rows (approximately)
DELETE FROM `mata_pelajaran`;
/*!40000 ALTER TABLE `mata_pelajaran` DISABLE KEYS */;
INSERT INTO `mata_pelajaran` (`kode_mapel`, `nama_mapel`) VALUES
	('BINDO', 'BAHASA INDONESIA'),
	('BING', 'BAHASA INGGRIS'),
	('FISIKA', 'FISIKA'),
	('KIMIA', 'KIMIA'),
	('MTK', 'MATEMATIKA'),
	('PAI', 'PENDIDIKAN AGAMA ISLAM'),
	('PJOK', 'PENJASKES'),
	('PKN', 'PENDIDIKAN KEWARGANEGARAAN'),
	('PRODTKJ', 'PRODUKTIF TKJ'),
	('SEJINDO', 'SEJARAH INDONESIA');
/*!40000 ALTER TABLE `mata_pelajaran` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujian` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kode_ujian` varchar(30) NOT NULL,
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
  `hasil` int(2) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.nilai: ~0 rows (approximately)
DELETE FROM `nilai`;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.pengacak
CREATE TABLE IF NOT EXISTS `pengacak` (
  `id_pengacak` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` longtext NOT NULL,
  `id_esai` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pengacak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.pengacak: ~0 rows (approximately)
DELETE FROM `pengacak`;
/*!40000 ALTER TABLE `pengacak` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengacak` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.pengacakopsi
CREATE TABLE IF NOT EXISTS `pengacakopsi` (
  `id_pengacak` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` longtext NOT NULL,
  `id_esai` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pengacak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.pengacakopsi: ~0 rows (approximately)
DELETE FROM `pengacakopsi`;
/*!40000 ALTER TABLE `pengacakopsi` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengacakopsi` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.pengawas
CREATE TABLE IF NOT EXISTS `pengawas` (
  `id_pengawas` int(11) NOT NULL AUTO_INCREMENT,
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
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pengawas`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.pengawas: ~12 rows (approximately)
DELETE FROM `pengawas`;
/*!40000 ALTER TABLE `pengawas` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `pengawas` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.pengumuman
CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `user` int(3) NOT NULL,
  `text` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.pengumuman: ~0 rows (approximately)
DELETE FROM `pengumuman`;
/*!40000 ALTER TABLE `pengumuman` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengumuman` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.pk
CREATE TABLE IF NOT EXISTS `pk` (
  `id_pk` varchar(10) NOT NULL,
  `program_keahlian` varchar(50) NOT NULL,
  `kode` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.pk: ~0 rows (approximately)
DELETE FROM `pk`;
/*!40000 ALTER TABLE `pk` DISABLE KEYS */;
/*!40000 ALTER TABLE `pk` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.ruang
CREATE TABLE IF NOT EXISTS `ruang` (
  `kode_ruang` varchar(10) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.ruang: ~0 rows (approximately)
DELETE FROM `ruang`;
/*!40000 ALTER TABLE `ruang` DISABLE KEYS */;
INSERT INTO `ruang` (`kode_ruang`, `keterangan`) VALUES
	('R1', 'R1');
/*!40000 ALTER TABLE `ruang` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.savsoft_options
CREATE TABLE IF NOT EXISTS `savsoft_options` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `q_option_match` varchar(1000) DEFAULT NULL,
  `score` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table cbtcandy.savsoft_options: ~0 rows (approximately)
DELETE FROM `savsoft_options`;
/*!40000 ALTER TABLE `savsoft_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `savsoft_options` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.savsoft_qbank
CREATE TABLE IF NOT EXISTS `savsoft_qbank` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` varchar(100) NOT NULL DEFAULT 'Multiple Choice Single Answer',
  `question` text NOT NULL,
  `description` text NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `no_time_served` int(11) NOT NULL DEFAULT 0,
  `no_time_corrected` int(11) NOT NULL DEFAULT 0,
  `no_time_incorrected` int(11) NOT NULL DEFAULT 0,
  `no_time_unattempted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table cbtcandy.savsoft_qbank: ~0 rows (approximately)
DELETE FROM `savsoft_qbank`;
/*!40000 ALTER TABLE `savsoft_qbank` DISABLE KEYS */;
/*!40000 ALTER TABLE `savsoft_qbank` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.server
CREATE TABLE IF NOT EXISTS `server` (
  `kode_server` varchar(20) NOT NULL,
  `nama_server` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.server: ~3 rows (approximately)
DELETE FROM `server`;
/*!40000 ALTER TABLE `server` DISABLE KEYS */;
INSERT INTO `server` (`kode_server`, `nama_server`, `status`) VALUES
	('R1', 'SERVER R1', 'aktif'),
	('R2', 'SERVER R2', 'aktif'),
	('ONLINE', 'ONLINE', 'aktif');
/*!40000 ALTER TABLE `server` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.sesi
CREATE TABLE IF NOT EXISTS `sesi` (
  `kode_sesi` varchar(10) NOT NULL,
  `nama_sesi` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_sesi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.sesi: ~0 rows (approximately)
DELETE FROM `sesi`;
/*!40000 ALTER TABLE `sesi` DISABLE KEYS */;
INSERT INTO `sesi` (`kode_sesi`, `nama_sesi`) VALUES
	('1', '1');
/*!40000 ALTER TABLE `sesi` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.session
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_time` varchar(10) NOT NULL,
  `session_hash` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.session: ~0 rows (approximately)
DELETE FROM `session`;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
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
  `waktu` varchar(50) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.setting: ~0 rows (approximately)
DELETE FROM `setting`;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id_setting`, `aplikasi`, `kode_sekolah`, `sekolah`, `jenjang`, `kepsek`, `nip`, `alamat`, `kecamatan`, `kota`, `telp`, `fax`, `web`, `email`, `logo`, `header`, `header_kartu`, `nama_ujian`, `versi`, `ip_server`, `waktu`) VALUES
	(1, 'SMK HS AGUNG', 'K123', 'SMK HS AGUNG', 'SMK', 'Dedi Baidillah, S.Pd, M.Pd', '-', 'IO : 503.15/015/IV/SK-SMK/BPMPPT/2013; NPSN: 69787351 ; NSS : 402022210005<br />\r\nJL.Buyut Kaipah .Pulo Bambu Karang Bahagia Kec.Karang Bahagia Kab. Bekasi <br />\r\n', 'Karang Bahagia', 'Bekasi', '021 123 123 123', '', 'smkhsagung.sch.id', 'smkhsagung@gmail.com', 'dist/img/logo6.png', 'YAYASAN SOFIA MUJAHIDA UTAMA', 'KARTU PESERTA\nUJIAN SEKOLAH BERBASIS KOMPUTER', 'UJIAN SEKOLAH BERSTANDAR NASIONAL', '2.5', 'http://192.168.0.200/candycbt', 'Asia/Jakarta');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.siswa: ~10 rows (approximately)
DELETE FROM `siswa`;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `idpk`, `nis`, `no_peserta`, `nama`, `level`, `ruang`, `sesi`, `username`, `password`, `foto`) VALUES
	(1, 'XIITP', 'TP', '151610041', '12-248-001-8', 'Ade Saputra', 'XII', 'R1', 1, 'hs001', 'ps001', 'siswa1.png'),
	(2, 'XIITP', 'TP', '151610043', '12-248-002-7', 'Ahmad Fauzi', 'XII', 'R1', 1, 'hs002', 'ps002', 'siswa1.png'),
	(3, 'XIITP', 'TP', '151610044', '12-248-003-6', 'Ahmad Fauzi', 'XII', 'R1', 1, 'hs003', 'ps003', 'siswa1.png'),
	(4, 'XIITP', 'TP', '151610045', '12-248-004-5', 'Ahmad Juliansyah', 'XII', 'R1', 1, 'hs004', 'ps004', 'siswa1.png'),
	(5, 'XIITP', 'TP', '151610047', '12-248-005-4', 'Algi Julian', 'XII', 'R1', 1, 'hs005', 'ps005', 'siswa1.png'),
	(6, 'XIITP', 'TP', '151610048', '12-248-006-3', 'Anas Aditya', 'XII', 'R1', 1, 'hs006', 'ps006', 'siswa1.png'),
	(7, 'XIITP', 'TP', '151610049', '12-248-007-2', 'Andre Irawan', 'XII', 'R1', 1, 'hs007', 'ps007', 'siswa1.png'),
	(8, 'XIITP', 'TP', '151610042', '12-248-008-9', 'Andrian Al Viansyah', 'XII', 'R1', 1, 'hs008', 'ps008', 'siswa1.png'),
	(9, 'XIITP', 'TP', '151610050', '12-248-009-8', 'Andrian Maulana', 'XII', 'R1', 1, 'hs009', 'ps009', 'siswa1.png'),
	(10, 'XIITP', 'TP', '151610051', '12-248-010-7', 'Bambang Reza Umbara', 'XII', 'R1', 1, 'hs010', 'ps010', 'siswa1.png');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.soal
CREATE TABLE IF NOT EXISTS `soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
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
  `fileE` text DEFAULT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.soal: ~5 rows (approximately)
DELETE FROM `soal`;
/*!40000 ALTER TABLE `soal` DISABLE KEYS */;
INSERT INTO `soal` (`id_soal`, `id_mapel`, `nomor`, `soal`, `jenis`, `pilA`, `pilB`, `pilC`, `pilD`, `pilE`, `jawaban`, `file`, `file1`, `fileA`, `fileB`, `fileC`, `fileD`, `fileE`) VALUES
	(51, 5, 1, ' Untuk mengatasi masalah sampah plastik, pemerintah telah menerapkan undang-undang yang berisi pengaturan penggunaan plastik. Salah satu pengaturan tersebut adalah pengenaan cukai kemasan plastik.  Diharapkan dengan pengaturan tersebut penggunaan kemasan plastik dapat berkurang. <br>Makna istilah <i>cukai</i> pada paragraf  tersebut adalah&hellip; .', 1, '&amp;amp;nbsp;', '&amp;amp;nbsp;', ' Pajak', ' Denda', ' Barang', 'C', '', '', '15695193622.png', '15695193621.png', '', '', ''),
	(52, 5, 2, ' Cermati teks berita berikut! <br>Ide pokok teks tersebut adalah ....', 1, ' perkembangan media yang mempengaruhi cara mengonsumsi makanan', ' fungsi buku menu masakan dalam kehidupan masyarakat', ' peranan instagram dalam bidang kuliner bagi masyarakat saat ini', ' peranan media televisi dalam bidang kuliner Indonesia', ' pengaruh media sosial dalam bidang kuliner pada masa lalu', 'A', '15695193622.png', '', '', '', '', '', ''),
	(53, 5, 3, ' Penelitian dua desa di kawasan Gunung Kendeng Pati Jawa Tengah, menemukan 32 jenis capung, 55 jenis kupu-kupu dan 64 jenis burung. Identifikasi jenis satwa ini membuktikan keanekaragaman hayati di kawasan Kendeng masih baik. Aneka capung dan kupu-kupu mengidentifikasikan jernihnya mata air dan aliran sungai di Kendeng. Temuan aneka burung menunjukkan harmoni kekayaan keanekaragaman hayati masih terjaga. <br>Simpulan paragraf tersebut adalah&hellip; .', 1, ' Jenis-jenis serangga seperti capung dan kupu-kupu masih dapat hidup di daerah pegunungan di sekitar  Kendeng Utara.', ' Identifikasi jenis burung menunjukkan bahwa masyarakat di kawasan Pegunungan Kendeng suka berburu hewan liar.', ' Penemuan jenis-jenis capung, kupu-kupu dan burung menunjukkan bahwa keanekaragaman hayati di Pegunungan Kendeng masih terjaga.', ' Hamoni kekayaan keanekaragaman hayati di kawasan Pegunugan Kendeng sudah mulai rusak  dan hanya menyisakan aneka jenis burung.', ' Penelitian di desa kawasan Pegunungan Kendeng Pati Jawa Tengah telah berhasil mengidentifikasi tingkat kejernihan air di desa tersebut.', 'C', '', '', '', '', '', '', ''),
	(54, 5, 4, ' (1) Salah satu penyebab terjadinya unjuk rasa karena ketidakpercayaan terhadap pelaksanaan berbagai aturan. (2)Para pengunjuk rasa tidak menemukan pelampiasan atas ketidakpastian yang dirasakannya. (3) Tekanan amarah yang tidak menemukan celah untuk keluar akhirnya menjadi amuk masa. (4) Hal-hal tersebut mengakibatkan berbagai unjuk rasa sering berujung pada anarkisme massa jika aspirasi mereka tidak tersalurkan. (5) Mereka ingin reaksi mereka diperhatikan. <br>Kalimat yang tidak menunjukkan hubungan sebab akibat adalah kalimat nomor .... ', 1, ' (1) &amp;amp; (3)', ' (2) &amp;amp; (3)', ' (3) &amp;amp; (4)', ' (2) &amp;amp; (5)', ' (1) &amp;amp; (5)', 'C', '', '', '', '', '', '', ''),
	(55, 5, 5, ' Buah tomat merupakan buah yang sarat khasiat. Buah tomat dapat mencegah penyakit  kekurangan vitamin. Di samping itu juga mencegah kanker prostat,kanker usus besar, dan kanker paru-paru. Hasil penelitian menunjukkan tomat dapat mengobati gangguan pencernaan, diare, kolera, dan serangan empedu. Selain kaya manfaat, tomat juga lezat disantap. Bahkan sebagai sesuatu diracik menjadi makanan yang mampu membius para penikmatnya. Di Perancis tomat disebut apel cinta. Jika ingin sehat dan  bebas dari kanker cobalah rutin mengonsumsi &ldquo;Si apel cinta&rdquo;. <br>Ringkasan yang tepat dari bacaan tersebut di atas adalah&hellip; .', 1, ' Tomat adalah buah yang berkhasiat dan lezat untuk disantap.', ' Buah tomat atau apel cinta dapat mencegah penyakit kanker.', ' Buah tomat sarat khasiat, kaya manfaat bagi penderita penyakit.', ' Buah tomat selain mencegah dan mengobati berbagai penyakit, juga lezat', ' Buah tomat kaya vitamin, kaya manfaat, juga lezat sebagai bumbu masakan dan minuman.', 'D', '', '', '', '', '', '', '');
/*!40000 ALTER TABLE `soal` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.token
CREATE TABLE IF NOT EXISTS `token` (
  `id_token` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(6) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `masa_berlaku` time NOT NULL,
  PRIMARY KEY (`id_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.token: ~0 rows (approximately)
DELETE FROM `token`;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
INSERT INTO `token` (`id_token`, `token`, `time`, `masa_berlaku`) VALUES
	(1, 'LSQFLW', '2019-09-15 15:06:40', '00:15:00');
/*!40000 ALTER TABLE `token` ENABLE KEYS */;

-- Dumping structure for table cbtcandy.ujian
CREATE TABLE IF NOT EXISTS `ujian` (
  `id_ujian` int(5) NOT NULL AUTO_INCREMENT,
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
  `waktu_ujian` time NOT NULL,
  `selesai_ujian` time NOT NULL,
  `level` varchar(5) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `sesi` varchar(1) NOT NULL,
  `acak` int(1) NOT NULL,
  `token` int(1) NOT NULL,
  `status` int(3) NOT NULL,
  `hasil` int(2) NOT NULL,
  `kkm` varchar(128) NOT NULL,
  `ulang` int(2) NOT NULL,
  PRIMARY KEY (`id_ujian`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table cbtcandy.ujian: ~0 rows (approximately)
DELETE FROM `ujian`;
/*!40000 ALTER TABLE `ujian` DISABLE KEYS */;
INSERT INTO `ujian` (`id_ujian`, `id_pk`, `id_guru`, `id_mapel`, `kode_ujian`, `nama`, `jml_soal`, `jml_esai`, `bobot_pg`, `opsi`, `bobot_esai`, `tampil_pg`, `tampil_esai`, `lama_ujian`, `tgl_ujian`, `tgl_selesai`, `waktu_ujian`, `selesai_ujian`, `level`, `kelas`, `sesi`, `acak`, `token`, `status`, `hasil`, `kkm`, `ulang`) VALUES
	(12, 'semua', 41, 5, 'PAT', 'KIMIA', 30, 0, 100, 5, 0, 30, 0, 60, '2019-09-15 16:00:00', '2019-09-15 18:00:00', '16:00:00', '00:00:00', 'semua', 'a:1:{i:0;s:5:"semua";}', '1', 1, 0, 1, 1, '70', 3);
/*!40000 ALTER TABLE `ujian` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
