
/*---------------------------------------------------------------
  SQL DB BACKUP 16.10.2019 17:53 
  HOST: localhost
  DATABASE: cbtcandy25
  TABLES: *
  ---------------------------------------------------------------*/

/*---------------------------------------------------------------
  TABLE: `berita`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `berita` VALUES   ('1','1','1','R1','PTS','2','0','N;','14:00','15:00','Pajar Sidik N','2011-09-929091','Nur Rohman','2019-02909-2909','tertib','2019-10-15');

/*---------------------------------------------------------------
  TABLE: `hasil_jawaban`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `hasil_jawaban`;
CREATE TABLE `hasil_jawaban` (
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
INSERT INTO `hasil_jawaban` VALUES   ('31','88','1','14','1','B','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('32','88','1','21','1','A','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('33','88','1','13','1','B','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('34','88','1','17','1','A','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('35','88','1','23','1','B','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('36','88','1','35','1','B','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('37','88','1','7','1','B','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('38','88','1','9','1','A','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('39','88','1','36','1','B','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('40','88','1','30','1','C','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('41','88','1','18','1','C','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('42','88','1','10','1','C','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('43','88','1','1','1','B','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('44','88','1','4','1','A','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('45','88','1','32','1','C','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('46','88','1','12','1','C','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('47','88','1','20','1','A','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('48','88','1','6','1','C','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('49','88','1','5','1','C','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('50','88','1','19','1','C','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('51','88','1','38','1','A','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('52','88','1','2','1','C','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('53','88','1','24','1','B','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('54','88','1','40','1','A','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('55','88','1','11','1','A','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('56','88','1','22','1','C','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('57','88','1','25','1','B','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('58','88','1','33','1','A','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('59','88','1','26','1','B','1','','0','0');
INSERT INTO `hasil_jawaban` VALUES ('60','88','1','31','1','C','1','','0','0');

/*---------------------------------------------------------------
  TABLE: `jawaban`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `jawaban`;
CREATE TABLE `jawaban` (
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
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;
INSERT INTO `jawaban` VALUES   ('1','84','1','40','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('2','84','1','39','1','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('3','84','1','38','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('4','84','1','37','1','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('5','84','1','36','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('6','84','1','35','1','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('7','84','1','34','1','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('8','84','1','33','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('9','84','1','32','1','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('10','84','1','31','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('11','84','1','30','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('12','84','1','29','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('13','84','1','28','1','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('14','84','1','27','1','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('15','84','1','26','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('16','84','1','25','1','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('17','84','1','24','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('18','84','1','23','1','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('19','84','1','22','1','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('20','84','1','21','1','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('21','84','1','20','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('22','84','1','19','1','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('23','84','1','18','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('24','84','1','17','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('25','84','1','16','1','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('26','84','1','15','1','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('27','84','1','14','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('28','84','1','13','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('29','84','1','12','1','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('30','84','1','11','1','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('31','84','1','26','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('32','84','1','28','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('33','84','1','3','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('34','84','1','34','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('35','84','1','31','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('36','84','1','39','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('37','84','1','37','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('38','84','1','15','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('39','84','1','8','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('40','84','1','2','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('41','84','1','25','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('42','84','1','33','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('43','84','1','11','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('44','84','1','16','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('45','84','1','29','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('46','84','1','22','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('47','84','1','27','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('48','84','1','40','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('49','84','1','24','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('50','84','1','32','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('51','84','1','23','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('52','84','1','10','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('53','84','1','9','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('54','84','1','17','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('55','84','1','12','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('56','84','1','5','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('57','84','1','18','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('58','84','1','4','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('59','84','1','38','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('60','84','1','14','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('61','85','1','6','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('62','85','1','14','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('63','85','1','17','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('64','85','1','30','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('65','85','1','35','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('66','85','1','18','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('67','85','1','13','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('68','85','1','19','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('69','85','1','10','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('70','85','1','36','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('71','85','1','4','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('72','85','1','7','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('73','85','1','5','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('74','85','1','12','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('75','85','1','21','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('76','85','1','20','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('77','85','1','9','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('78','85','1','23','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('79','85','1','32','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('80','85','1','38','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('81','85','1','1','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('82','85','1','15','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('83','85','1','40','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('84','85','1','24','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('85','85','1','29','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('86','85','1','22','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('87','85','1','16','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('88','85','1','33','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('89','85','1','11','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('90','85','1','2','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('91','86','1','8','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('92','86','1','39','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('93','86','1','37','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('94','86','1','28','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('95','86','1','34','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('96','86','1','3','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('97','86','1','15','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('98','86','1','27','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('99','86','1','16','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('100','86','1','29','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('101','86','1','31','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('102','86','1','26','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('103','86','1','33','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('104','86','1','25','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('105','86','1','22','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('106','86','1','11','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('107','86','1','40','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('108','86','1','24','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('109','86','1','2','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('110','86','1','38','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('111','86','1','19','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('112','86','1','5','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('113','86','1','6','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('114','86','1','20','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('115','86','1','12','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('116','86','1','32','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('117','86','1','4','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('118','86','1','1','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('119','86','1','10','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('120','86','1','18','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('121','88','1','3','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('122','88','1','15','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('123','88','1','21','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('124','88','1','22','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('125','88','1','24','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('126','88','1','28','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('127','88','1','32','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('128','88','1','4','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('129','88','1','7','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('130','88','1','8','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('131','88','1','9','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('132','88','1','11','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('133','88','1','16','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('134','88','1','18','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('135','88','1','25','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('136','88','1','35','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('137','88','1','6','4','B','1','','0','0');
INSERT INTO `jawaban` VALUES ('138','88','1','10','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('139','88','1','17','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('140','88','1','23','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('141','88','1','33','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('142','88','1','34','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('143','88','1','2','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('144','88','1','19','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('145','88','1','20','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('146','88','1','26','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('147','88','1','27','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('148','88','1','29','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('149','88','1','31','4','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('150','88','1','36','4','C','1','','0','0');
INSERT INTO `jawaban` VALUES ('152','90','3','41','5','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('153','90','3','42','5','E','1','','0','0');
INSERT INTO `jawaban` VALUES ('154','90','3','43','5','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('155','90','3','44','5','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('156','90','3','45','5','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('157','90','3','46','5','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('158','90','3','47','5','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('159','90','3','48','5','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('160','90','3','49','5','A','1','','0','0');
INSERT INTO `jawaban` VALUES ('161','90','3','50','5','A','1','','0','0');

/*---------------------------------------------------------------
  TABLE: `jenis`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `id_jenis` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `jenis` VALUES   ('PAT','Penilaian Akhir Tahun','tidak');
INSERT INTO `jenis` VALUES ('PH','Penilaian Harian','tidak');
INSERT INTO `jenis` VALUES ('PTS','Penilaian Tengah Semester','aktif');
INSERT INTO `jenis` VALUES ('USBN','Ujian Nasionan Berstandar Nasional','tidak');

/*---------------------------------------------------------------
  TABLE: `kelas`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` varchar(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `kelas` VALUES   ('XIITKJ','XII','XIITKJ');
INSERT INTO `kelas` VALUES ('XIITKR','XII','XIITKR');
INSERT INTO `kelas` VALUES ('XIITP','XII','XIITP');
INSERT INTO `kelas` VALUES ('XITKJA','XI','XITKJA');
INSERT INTO `kelas` VALUES ('XITKJB','XI','XITKJB');
INSERT INTO `kelas` VALUES ('XITKJC','XI','XITKJC');
INSERT INTO `kelas` VALUES ('XITKRA','XI','XITKRA');
INSERT INTO `kelas` VALUES ('XITKRB','XI','XITKRB');
INSERT INTO `kelas` VALUES ('XITPA','XI','XITPA');
INSERT INTO `kelas` VALUES ('XITPB','XI','XITPB');
INSERT INTO `kelas` VALUES ('XTKJA','X','XTKJA');
INSERT INTO `kelas` VALUES ('XTKJB','X','XTKJB');
INSERT INTO `kelas` VALUES ('XTKJC','X','XTKJC');
INSERT INTO `kelas` VALUES ('XTKJD','X','XTKJD');
INSERT INTO `kelas` VALUES ('XTKRA','X','XTKRA');
INSERT INTO `kelas` VALUES ('XTKRB','X','XTKRB');
INSERT INTO `kelas` VALUES ('XTKRC','X','XTKRC');
INSERT INTO `kelas` VALUES ('XTPA','X','XTPA');
INSERT INTO `kelas` VALUES ('XTPB','X','XTPB');
INSERT INTO `kelas` VALUES ('XTPC','X','XTPC');

/*---------------------------------------------------------------
  TABLE: `level`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `kode_level` varchar(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `level` VALUES   ('X','X');
INSERT INTO `level` VALUES ('XI','XI');
INSERT INTO `level` VALUES ('XII','XII');

/*---------------------------------------------------------------
  TABLE: `log`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `text` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
INSERT INTO `log` VALUES   ('1','84','login','masuk','2019-10-14 21:47:07');
INSERT INTO `log` VALUES ('2','84','testongoing','sedang ujian','2019-10-14 21:47:16');
INSERT INTO `log` VALUES ('3','84','testongoing','sedang ujian','2019-10-14 21:47:17');
INSERT INTO `log` VALUES ('4','84','logout','keluar','2019-10-15 02:38:57');
INSERT INTO `log` VALUES ('5','84','logout','keluar','2019-10-15 02:39:02');
INSERT INTO `log` VALUES ('6','84','login','masuk','2019-10-15 02:41:41');
INSERT INTO `log` VALUES ('7','84','testongoing','sedang ujian','2019-10-15 02:41:56');
INSERT INTO `log` VALUES ('8','84','testongoing','sedang ujian','2019-10-15 02:41:56');
INSERT INTO `log` VALUES ('9','84','logout','keluar','2019-10-15 02:56:21');
INSERT INTO `log` VALUES ('10','85','login','masuk','2019-10-15 02:56:35');
INSERT INTO `log` VALUES ('11','85','testongoing','sedang ujian','2019-10-15 02:56:45');
INSERT INTO `log` VALUES ('12','85','testongoing','sedang ujian','2019-10-15 02:56:46');
INSERT INTO `log` VALUES ('13','85','logout','keluar','2019-10-15 03:04:31');
INSERT INTO `log` VALUES ('14','86','login','masuk','2019-10-15 03:04:43');
INSERT INTO `log` VALUES ('15','86','testongoing','sedang ujian','2019-10-15 03:04:54');
INSERT INTO `log` VALUES ('16','86','testongoing','sedang ujian','2019-10-15 03:04:56');
INSERT INTO `log` VALUES ('17','86','logout','keluar','2019-10-15 03:06:03');
INSERT INTO `log` VALUES ('18','88','login','masuk','2019-10-15 03:06:15');
INSERT INTO `log` VALUES ('19','88','testongoing','sedang ujian','2019-10-15 03:06:20');
INSERT INTO `log` VALUES ('20','88','testongoing','sedang ujian','2019-10-15 03:06:21');
INSERT INTO `log` VALUES ('21','89','login','masuk','2019-10-15 06:33:33');
INSERT INTO `log` VALUES ('22','90','login','masuk','2019-10-16 16:50:14');
INSERT INTO `log` VALUES ('23','90','testongoing','sedang ujian','2019-10-16 16:50:22');
INSERT INTO `log` VALUES ('24','90','testongoing','sedang ujian','2019-10-16 16:50:22');
INSERT INTO `log` VALUES ('25','90','testongoing','sedang ujian','2019-10-16 17:21:00');
INSERT INTO `log` VALUES ('26','90','testongoing','sedang ujian','2019-10-16 17:21:00');

/*---------------------------------------------------------------
  TABLE: `login`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `ipaddress` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
INSERT INTO `login` VALUES   ('16','90','','2019-10-16 16:50:14');

/*---------------------------------------------------------------
  TABLE: `mapel`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `mapel`;
CREATE TABLE `mapel` (
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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(2) NOT NULL,
  `statusujian` int(11) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
INSERT INTO `mapel` VALUES   ('1','semua','51','KIMIA','40','0','30','0','100','0','semua','3','a:1:{i:0;s:5:\"semua\";}','2019-10-13 02:35:02','1','0');
INSERT INTO `mapel` VALUES ('3','semua','52','AGAMA','10','0','10','0','100','0','semua','5','a:1:{i:0;s:5:\"semua\";}','2019-10-16 16:44:02','1','0');

/*---------------------------------------------------------------
  TABLE: `mata_pelajaran`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `mata_pelajaran`;
CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `mata_pelajaran` VALUES   ('AGAMA','AGAMA');
INSERT INTO `mata_pelajaran` VALUES ('KIMIA','KIMIA');

/*---------------------------------------------------------------
  TABLE: `nilai`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `nilai`;
CREATE TABLE `nilai` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
INSERT INTO `nilai` VALUES   ('1','1','1','83','PAT','2019-10-10 19:28:37','2019-10-10 19:29:56','2019-10-10 19:29:55','7','23','','23.33','23.33','0','127.0.0.1','1');
INSERT INTO `nilai` VALUES ('2','1','1','88','PAT','2019-10-13 02:13:49','2019-10-13 02:14:31','2019-10-13 02:14:30','6','24','','20.00','20.00','0','::1','1');
INSERT INTO `nilai` VALUES ('3','1','1','84','PAT','2019-10-14 21:47:16','2019-10-14 22:13:27','2019-10-14 22:13:26','2','28','','6.67','6.67','0','::1','1');
INSERT INTO `nilai` VALUES ('4','4','1','84','PTS','2019-10-15 02:41:56','2019-10-15 02:54:21','2019-10-15 02:54:20','6','24','','20.00','20.00','0','::1','1');
INSERT INTO `nilai` VALUES ('5','4','1','85','PTS','2019-10-15 02:56:45','2019-10-15 03:04:22','2019-10-15 03:04:21','7','23','','23.33','23.33','0','::1','1');
INSERT INTO `nilai` VALUES ('6','4','1','86','PTS','2019-10-15 03:04:54','2019-10-15 03:05:59','2019-10-15 03:05:58','5','25','','16.67','16.67','0','::1','1');
INSERT INTO `nilai` VALUES ('7','4','1','88','PTS','2019-10-15 03:06:20','2019-10-15 03:09:50','2019-10-15 03:09:49','7','23','','23.33','23.33','0','::1','1');
INSERT INTO `nilai` VALUES ('9','5','3','90','PTS','2019-10-16 17:21:00','2019-10-16 17:22:22','2019-10-16 17:22:21','4','6','','40.00','40.00','0','::1','1');

/*---------------------------------------------------------------
  TABLE: `pengacak`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `pengacak`;
CREATE TABLE `pengacak` (
  `id_pengacak` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` longtext NOT NULL,
  `id_esai` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pengacak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*---------------------------------------------------------------
  TABLE: `pengacakopsi`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `pengacakopsi`;
CREATE TABLE `pengacakopsi` (
  `id_pengacak` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_soal` longtext NOT NULL,
  `id_esai` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pengacak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*---------------------------------------------------------------
  TABLE: `pengawas`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `pengawas`;
CREATE TABLE `pengawas` (
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
INSERT INTO `pengawas` VALUES   ('9','-','administrator','','admin','$2y$10$3fVC8VJfm8ElEv6PNLT2R.XalOF.sFq7TOgJE54p5KQm2oL/0N1Im','admin','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('41','-','Pajar Sidik Nurfakhri','','pajarsidikn','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('42','-','Guru 2','','guru2','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('43','-','Guru 3','','guru3','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('44','-','Guru 4','','guru4','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('45','-','Guru 5','','guru5','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('46','-','Guru 6','','guru6','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('47','-','Guru 7','','guru7','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('48','-','Guru 8','','guru8','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('49','-','Guru 9','','guru9','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('50','-','Ruli Syahruli, S.Pd','','ruli','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('51','-','Agus Prasetyo, S.Pd','','agus','123456','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');
INSERT INTO `pengawas` VALUES ('52','100014','Abdul Azis','','guru10','guru10','guru','','','0000-00-00','','','','','','','','','','0','','','','','','','','','','','','','','0000-00-00','','','','');

/*---------------------------------------------------------------
  TABLE: `pengumuman`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `pengumuman`;
CREATE TABLE `pengumuman` (
  `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `user` int(3) NOT NULL,
  `text` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*---------------------------------------------------------------
  TABLE: `pk`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `pk`;
CREATE TABLE `pk` (
  `id_pk` varchar(10) NOT NULL,
  `program_keahlian` varchar(50) NOT NULL,
  `kode` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `pk` VALUES   ('TKJ','TKJ','');
INSERT INTO `pk` VALUES ('TKR','TKR','');
INSERT INTO `pk` VALUES ('TP','TP','');

/*---------------------------------------------------------------
  TABLE: `ruang`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `ruang`;
CREATE TABLE `ruang` (
  `kode_ruang` varchar(10) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `ruang` VALUES   ('R1','R1');

/*---------------------------------------------------------------
  TABLE: `savsoft_options`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `savsoft_options`;
CREATE TABLE `savsoft_options` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `q_option_match` varchar(1000) DEFAULT NULL,
  `score` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*---------------------------------------------------------------
  TABLE: `savsoft_qbank`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `savsoft_qbank`;
CREATE TABLE `savsoft_qbank` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` varchar(100) NOT NULL DEFAULT 'Multiple Choice Single Answer',
  `question` text NOT NULL,
  `description` text NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `no_time_served` int(11) NOT NULL DEFAULT '0',
  `no_time_corrected` int(11) NOT NULL DEFAULT '0',
  `no_time_incorrected` int(11) NOT NULL DEFAULT '0',
  `no_time_unattempted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*---------------------------------------------------------------
  TABLE: `server`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `server`;
CREATE TABLE `server` (
  `kode_server` varchar(20) NOT NULL,
  `nama_server` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `server` VALUES   ('R1','SERVER R1','aktif');
INSERT INTO `server` VALUES ('R2','SERVER R2','aktif');
INSERT INTO `server` VALUES ('ONLINE','ONLINE','aktif');

/*---------------------------------------------------------------
  TABLE: `sesi`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `sesi`;
CREATE TABLE `sesi` (
  `kode_sesi` varchar(10) NOT NULL,
  `nama_sesi` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_sesi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `sesi` VALUES   ('1','1');

/*---------------------------------------------------------------
  TABLE: `session`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_time` varchar(10) NOT NULL,
  `session_hash` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*---------------------------------------------------------------
  TABLE: `setting`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
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
INSERT INTO `setting` VALUES   ('1','SMK HS AGUNG','K123','SMK HS AGUNG','SMK','Dedi Baidillah, S.Pd, M.Pd','-','IO : 503.15/015/IV/SK-SMK/BPMPPT/2013; NPSN: 69787351 ; NSS : 402022210005<br />\r\nJL.Buyut Kaipah .Pulo Bambu Karang Bahagia Kec.Karang Bahagia Kab. Bekasi <br />\r\n','Karang Bahagia','Bekasi','021 123 123 123','','smkhsagung.sch.id','smkhsagung@gmail.com','dist/img/logo6.png','YAYASAN SOFIA MUJAHIDA UTAMA','KARTU PESERTA\nUJIAN SEKOLAH BERBASIS KOMPUTER','Penilaian Tengah Semester','2.5','http://192.168.0.200/candycbt','Asia/Jakarta');

/*---------------------------------------------------------------
  TABLE: `siswa`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
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
  `nisn` varchar(50) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=632 DEFAULT CHARSET=latin1;
INSERT INTO `siswa` VALUES   ('1','XIITKJ','TKJ','171810061','171810061','ADELANI RIZKY FAUZI','XII','R1','1','171810061','171810061','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('2','XIITKJ','TKJ','171810062','171810062','AMILIA PUTRI','XII','R1','1','171810062','171810062','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('3','XIITKJ','TKJ','171810063','171810063','AMELIA PUTRI','XII','R1','1','171810063','171810063','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('4','XIITKJ','TKJ','171810064','171810064','ANDI','XII','R1','1','171810064','171810064','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('5','XIITKJ','TKJ','171810065','171810065','DEWI SUSILOWATI NINGSIH','XII','R1','1','171810065','171810065','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('6','XIITKJ','TKJ','171810090','171810090','DWI PUSPA MAHARANI','XII','R1','1','171810090','171810090','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('7','XIITKJ','TKJ','171810066','171810066','FARHAN RAMDHANI','XII','R1','1','171810066','171810066','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('8','XIITKJ','TKJ','171810067','171810067','FITRI WULANDARI','XII','R1','1','171810067','171810067','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('9','XIITKJ','TKJ','171810068','171810068','FITRIA ANGRAENI','XII','R1','1','171810068','171810068','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('10','XIITKJ','TKJ','171810086','171810086','GUNAWAN ARDIANSYAH','XII','R1','1','171810086','171810086','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('11','XIITKJ','TKJ','171810091','171810091','HAIDAR ALI SIBAGUS HIDAYAT','XII','R1','1','171810091','171810091','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('12','XIITKJ','TKJ','171810070','171810070','INTAN NUR AENI','XII','R1','1','171810070','171810070','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('13','XIITKJ','TKJ','171810072','171810072','KIKI RAHMAT','XII','R1','1','171810072','171810072','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('14','XIITKJ','TKJ','171810094','171810094','LILA NOVILETA','XII','R1','1','171810094','171810094','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('15','XIITKJ','TKJ','171810073','171810073','MUHAMAD VICKY MAULANA','XII','R1','1','171810073','171810073','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('16','XIITKJ','TKJ','171810074','171810074','NABILAH','XII','R1','1','171810074','171810074','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('17','XIITKJ','TKJ','171810075','171810075','NILAS SUSILAWATI','XII','R1','1','171810075','171810075','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('18','XIITKJ','TKJ','171810076','171810076','NUR LAILA HUSNA','XII','R1','1','171810076','171810076','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('19','XIITKJ','TKJ','171810077','171810077','PUZI ASTUTI','XII','R1','1','171810077','171810077','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('20','XIITKJ','TKJ','171810078','171810078','PUTRI OKTAVIANI','XII','R1','1','171810078','171810078','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('21','XIITKJ','TKJ','171810085','171810085','RATNA TRIANA PUSPITA','XII','R1','1','171810085','171810085','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('22','XIITKJ','TKJ','171810079','171810079','RIANI TRI HAPSARI','XII','R1','1','171810079','171810079','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('23','XIITKJ','TKJ','171810080','171810080','SINDI YANI','XII','R1','1','171810080','171810080','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('24','XIITKJ','TKJ','171810081','171810081','SINTA BELA B','XII','R1','1','171810081','171810081','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('25','XIITKJ','TKJ','171810093','171810093','SITI ROBIATUL ADAWIYAH','XII','R1','1','171810093','171810093','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('26','XIITKJ','TKJ','171810082','171810082','YANTI PRIHATINI','XII','R1','1','171810082','171810082','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('27','XIITKR','TKR','171810034','171810034','AGGI SAPUTRA','XII','R1','1','171810034','171810034','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('28','XIITKR','TKR','171810037','171810037','ANTON SAPUTRA','XII','R1','1','171810037','171810037','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('29','XIITKR','TKR','171810039','171810039','ERWIN WIDIANSYAH','XII','R1','1','171810039','171810039','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('30','XIITKR','TKR','171810040','171810040','FAILHAM HANAFI','XII','R1','1','171810040','171810040','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('31','XIITKR','TKR','171810041','171810041','GUNAWAN MAOLANA PUTRA','XII','R1','1','171810041','171810041','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('32','XIITKR','TKR','171810042','171810042','HAFIZ FATURROHMAN','XII','R1','1','171810042','171810042','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('33','XIITKR','TKR','171810043','171810043','JAYA LAKSANA','XII','R1','1','171810043','171810043','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('34','XIITKR','TKR','171810044','171810044','JEKI SAPUTRA','XII','R1','1','171810044','171810044','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('35','XIITKR','TKR','171810045','171810045','MAHENDRA WIJAYA','XII','R1','1','171810045','171810045','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('36','XIITKR','TKR','171810092','171810092','MAULANA SYAHRI ROMADON','XII','R1','1','171810092','171810092','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('37','XIITKR','TKR','171810046','171810046','MUHAMAD RIVAN','XII','R1','1','171810046','171810046','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('38','XIITKR','TKR','171810047','171810047','MUHAMAD YUSUP','XII','R1','1','171810047','171810047','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('39','XIITKR','TKR','171810048','171810048','MUHAMMAD REZA SYAHVAHLEVI','XII','R1','1','171810048','171810048','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('40','XIITKR','TKR','171810049','171810049','MUHAMMAD SAHLAN','XII','R1','1','171810049','171810049','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('41','XIITKR','TKR','171810051','171810051','MULYANA YUSUP','XII','R1','1','171810051','171810051','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('42','XIITKR','TKR','171810052','171810052','RAHMAT HIDAYAT','XII','R1','1','171810052','171810052','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('43','XIITKR','TKR','171810083','171810083','RICKI BAHTIAR','XII','R1','1','171810083','171810083','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('44','XIITKR','TKR','171810053','171810053','SAM AMINUDIN','XII','R1','1','171810053','171810053','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('45','XIITKR','TKR','171810054','171810054','SAMSUL BAHRI','XII','R1','1','171810054','171810054','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('46','XIITKR','TKR','171810055','171810055','SUPARDI','XII','R1','1','171810055','171810055','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('47','XIITKR','TKR','171810056','171810056','SYAWALUDDIN PRATAMA','XII','R1','1','171810056','171810056','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('48','XIITKR','TKR','171810057','171810057','TEGUH SUTRISNA','XII','R1','1','171810057','171810057','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('49','XIITKR','TKR','171810058','171810058','TOMI','XII','R1','1','171810058','171810058','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('50','XIITKR','TKR','171810059','171810059','WILDAN SYAHPUTRA','XII','R1','1','171810059','171810059','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('51','XIITKR','TKR','171810060','171810060','YOGA ADITAMA','XII','R1','1','171810060','171810060','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('52','XIITP','TP','171810002','171810002','AHMAD SAPEIH','XII','R1','1','171810002','171810002','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('53','XIITP','TP','171810003','171810003','AHMAD SURIKI','XII','R1','1','171810003','171810003','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('54','XIITP','TP','171810004','171810004','AHMAD YANI','XII','R1','1','171810004','171810004','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('55','XIITP','TP','171810005','171810005','AKBAR DALAS RAMADHAN','XII','R1','1','171810005','171810005','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('56','XIITP','TP','171810006','171810006','ALDI ALFIAN ','XII','R1','1','171810006','171810006','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('57','XIITP','TP','171810007','171810007','ANGGANI','XII','R1','1','171810007','171810007','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('58','XIITP','TP','171810009','171810009','ARYA PUTRA PAMUNGKAS','XII','R1','1','171810009','171810009','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('59','XIITP','TP','171810010','171810010','BAGUS PRIBADI','XII','R1','1','171810010','171810010','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('60','XIITP','TP','171810011','171810011','BAYU MARUTO','XII','R1','1','171810011','171810011','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('61','XIITP','TP','171810012','171810012','DARMA KUSUMA JAYA','XII','R1','1','171810012','171810012','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('62','XIITP','TP','171810013','171810013','DIKI PURNOMO SAPUTRA','XII','R1','1','171810013','171810013','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('63','XIITP','TP','171810014','171810014','DIKI RAMADHAN','XII','R1','1','171810014','171810014','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('64','XIITP','TP','171810015','171810015','DWIKI DARMAWAN','XII','R1','1','171810015','171810015','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('65','XIITP','TP','171810016','171810016','FIKIH RIZKI','XII','R1','1','171810016','171810016','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('66','XIITP','TP','171810018','171810018','HERI SAPUTRA','XII','R1','1','171810018','171810018','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('67','XIITP','TP','171810019','171810019','HERUDIN','XII','R1','1','171810019','171810019','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('68','XIITP','TP','171810020','171810020','IMAM HANAFI','XII','R1','1','171810020','171810020','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('69','XIITP','TP','171810021','171810021','INDRA NUR SEJATI','XII','R1','1','171810021','171810021','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('70','XIITP','TP','171810022','171810022','JAKARIA','XII','R1','1','171810022','171810022','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('71','XIITP','TP','171810023','171810023','JENAL','XII','R1','1','171810023','171810023','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('72','XIITP','TP','171810024','171810024','JULIAN SYAPUTRA ILBAS','XII','R1','1','171810024','171810024','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('73','XIITP','TP','171810026','171810026','MUHAMMAD REZA ','XII','R1','1','171810026','171810026','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('74','XIITP','TP','171810027','171810027','PRAMUDIKA YUDA HERMAWAN','XII','R1','1','171810027','171810027','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('75','XIITP','TP','171810029','171810029','RUKMA PERWIRA','XII','R1','1','171810029','171810029','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('76','XIITP','TP','171810030','171810030','SAIFUL RAMADHAN','XII','R1','1','171810030','171810030','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('77','XIITP','TP','171810031','171810031','SARIPUDIN','XII','R1','1','171810031','171810031','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('78','XIITP','TP','171810032','171810032','USMAN SUMANTRI','XII','R1','1','171810032','171810032','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('79','XIITP','TP','171810033','171810033','WIJAYA SAPUTRA','XII','R1','1','171810033','171810033','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('80','XITKJA','TKJ','181910001','181910001','ADELIA PUTRI','XI','R1','1','181910001','181910001','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('81','XITKJA','TKJ','181910002','181910002','ANI NURHAYATI','XI','R1','1','181910002','181910002','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('82','XITKJA','TKJ','181910003','181910003','ANIS MARCELIA','XI','R1','1','181910003','181910003','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('83','XITKJA','TKJ','181910004','181910004','ARIPAH','XI','R1','1','181910004','181910004','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('84','XITKJA','TKJ','181910005','181910005','AYU NURSAFITRI','XI','R1','1','181910005','181910005','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('85','XITKJA','TKJ','181910006','181910006','DAHLIA AMELIA','XI','R1','1','181910006','181910006','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('86','XITKJA','TKJ','181910007','181910007','DIANA LESTARI DEWI','XI','R1','1','181910007','181910007','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('87','XITKJA','TKJ','181910008','181910008','FAISAL HIDAYAT','XI','R1','1','181910008','181910008','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('88','XITKJA','TKJ','181910009','181910009','FAJAR MAULANA SIDIK','XI','R1','1','181910009','181910009','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('89','XITKJA','TKJ','181910010','181910010','HIDAYATULLOH','XI','R1','1','181910010','181910010','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('90','XITKJA','TKJ','181910011','181910011','HILMA HILATUL HASANAH','XI','R1','1','181910011','181910011','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('91','XITKJA','TKJ','181910012','181910012','IKAH PUSPITA SARI','XI','R1','1','181910012','181910012','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('92','XITKJA','TKJ','181910013','181910013','ISMA AYU AGUSTIN','XI','R1','1','181910013','181910013','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('93','XITKJA','TKJ','181910014','181910014','KARINA INDRIYANA','XI','R1','1','181910014','181910014','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('94','XITKJA','TKJ','181910015','181910015','KARTIKA ','XI','R1','1','181910015','181910015','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('95','XITKJA','TKJ','181910016','181910016','LUKMAN','XI','R1','1','181910016','181910016','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('96','XITKJA','TKJ','181910017','181910017','MAEMUNAH','XI','R1','1','181910017','181910017','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('97','XITKJA','TKJ','181910018','181910018','MARSINAH','XI','R1','1','181910018','181910018','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('98','XITKJA','TKJ','181910019','181910019','MELI UTAMI','XI','R1','1','181910019','181910019','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('99','XITKJA','TKJ','181910020','181910020','MUHAMAD IBROHIM SAPUTRA','XI','R1','1','181910020','181910020','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('100','XITKJA','TKJ','181910021','181910021','NADIAH SALAMAH','XI','R1','1','181910021','181910021','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('101','XITKJA','TKJ','181910022','181910022','NELLY NELLY SHA','XI','R1','1','181910022','181910022','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('102','XITKJA','TKJ','181910023','181910023','NON ITA JAYA','XI','R1','1','181910023','181910023','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('103','XITKJA','TKJ','181910024','181910024','NOVI','XI','R1','1','181910024','181910024','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('104','XITKJA','TKJ','181910025','181910025','NUR AZIZAH','XI','R1','1','181910025','181910025','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('105','XITKJA','TKJ','181910026','181910026','NURMALIA','XI','R1','1','181910026','181910026','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('106','XITKJA','TKJ','181910027','181910027','PAUSIAH EROS','XI','R1','1','181910027','181910027','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('107','XITKJA','TKJ','181910028','181910028','REFI MELLIA','XI','R1','1','181910028','181910028','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('108','XITKJA','TKJ','181910029','181910029','RIKA PUTRI PERTIWI','XI','R1','1','181910029','181910029','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('109','XITKJA','TKJ','181910030','181910030','SANDRINA MALAKIANO','XI','R1','1','181910030','181910030','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('110','XITKJA','TKJ','181910031','181910031','SELFI FEBRIYANTI','XI','R1','1','181910031','181910031','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('111','XITKJA','TKJ','181910032','181910032','SIMAH RAHMAWATI','XI','R1','1','181910032','181910032','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('112','XITKJA','TKJ','181910033','181910033','SINDI AGUSTIN','XI','R1','1','181910033','181910033','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('113','XITKJA','TKJ','181910034','181910034','SISKA','XI','R1','1','181910034','181910034','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('114','XITKJA','TKJ','181910036','181910036','YUNITA','XI','R1','1','181910036','181910036','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('115','XITKJB','TKJ','181910037','181910037','ALDA PERMADANI','XI','R1','1','181910037','181910037','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('116','XITKJB','TKJ','181910038','181910038','ALINA ARIANTI','XI','R1','1','181910038','181910038','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('117','XITKJB','TKJ','181910039','181910039','ANNISA SALSABILA','XI','R1','1','181910039','181910039','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('118','XITKJB','TKJ','181910040','181910040','CIKA ROSSINTA','XI','R1','1','181910040','181910040','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('119','XITKJB','TKJ','181910041','181910041','DHANDI APRISNA','XI','R1','1','181910041','181910041','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('120','XITKJB','TKJ','181910042','181910042','DINA NUR KHUMAIROH','XI','R1','1','181910042','181910042','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('121','XITKJB','TKJ','181910043','181910043','EKA DUWI AGUSTINA','XI','R1','1','181910043','181910043','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('122','XITKJB','TKJ','181910044','181910044','HANIFAH ISMAIL','XI','R1','1','181910044','181910044','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('123','XITKJB','TKJ','181910234','181910234','IEQBAL RIZKIE RAMADHAN','XI','R1','1','181910234','181910234','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('124','XITKJB','TKJ','181910046','181910046','KARLIN','XI','R1','1','181910046','181910046','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('125','XITKJB','TKJ','181910047','181910047','KARLINAH','XI','R1','1','181910047','181910047','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('126','XITKJB','TKJ','181910048','181910048','LEDYANTI','XI','R1','1','181910048','181910048','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('127','XITKJB','TKJ','181910049','181910049','LESTI LISTIAWATI','XI','R1','1','181910049','181910049','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('128','XITKJB','TKJ','181910050','181910050','M ABDULLAH AZZAM','XI','R1','1','181910050','181910050','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('129','XITKJB','TKJ','181910051','181910051','MAIMUNAH','XI','R1','1','181910051','181910051','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('130','XITKJB','TKJ','181910052','181910052','MARIA ULFAH','XI','R1','1','181910052','181910052','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('131','XITKJB','TKJ','181910053','181910053','MAULANA ABDUL AZIS','XI','R1','1','181910053','181910053','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('132','XITKJB','TKJ','181910054','181910054','MULKOYAH SUKMA P','XI','R1','1','181910054','181910054','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('133','XITKJB','TKJ','181910055','181910055','NABILA SAFITRI','XI','R1','1','181910055','181910055','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('134','XITKJB','TKJ','181910056','181910056','NEVI SURYANENGSIH','XI','R1','1','181910056','181910056','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('135','XITKJB','TKJ','181910057','181910057','NINA ROSALINA','XI','R1','1','181910057','181910057','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('136','XITKJB','TKJ','181910058','181910058','NISSA AULIYA FITRI','XI','R1','1','181910058','181910058','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('137','XITKJB','TKJ','181910059','181910059','PUTRI AISAH SABILA','XI','R1','1','181910059','181910059','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('138','XITKJB','TKJ','181910060','181910060','PUTRI AMELIA','XI','R1','1','181910060','181910060','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('139','XITKJB','TKJ','181910061','181910061','RIANA OKTAVIANI','XI','R1','1','181910061','181910061','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('140','XITKJB','TKJ','181910062','181910062','SEPTYA NINGSIH','XI','R1','1','181910062','181910062','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('141','XITKJB','TKJ','181910063','181910063','SITI MASITOH','XI','R1','1','181910063','181910063','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('142','XITKJB','TKJ','181910064','181910064','SITI NAISYAH','XI','R1','1','181910064','181910064','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('143','XITKJB','TKJ','181910065','181910065','SUMARNI PRATIWI','XI','R1','1','181910065','181910065','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('144','XITKJB','TKJ','181910066','181910066','SYIFA AULIA RAHMADANI','XI','R1','1','181910066','181910066','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('145','XITKJC','TKJ','181910067','181910067','ADINDA PUTRI KOSASIH','XI','R1','1','181910067','181910067','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('146','XITKJC','TKJ','181910068','181910068','ANGGI PUSPITA SARI','XI','R1','1','181910068','181910068','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('147','XITKJC','TKJ','181910069','181910069','ANISA FITRI ','XI','R1','1','181910069','181910069','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('148','XITKJC','TKJ','181910070','181910070','ANISSAH','XI','R1','1','181910070','181910070','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('149','XITKJC','TKJ','181910071','181910071','ANITA RAHAYU','XI','R1','1','181910071','181910071','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('150','XITKJC','TKJ','181910072','181910072','CIKAL SEKAR PALUPI','XI','R1','1','181910072','181910072','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('151','XITKJC','TKJ','181910073','181910073','DESTYANA NURFADILAH','XI','R1','1','181910073','181910073','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('152','XITKJC','TKJ','181910074','181910074','ENCAH MARDILAH','XI','R1','1','181910074','181910074','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('153','XITKJC','TKJ','181910075','181910075','FITRIAH ROIDATUL AIS','XI','R1','1','181910075','181910075','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('154','XITKJC','TKJ','181910076','181910076','FLANDYLAN RUI','XI','R1','1','181910076','181910076','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('155','XITKJC','TKJ','181910077','181910077','IDA ROYANIH','XI','R1','1','181910077','181910077','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('156','XITKJC','TKJ','181910078','181910078','INTAN PUSPITA SARI','XI','R1','1','181910078','181910078','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('157','XITKJC','TKJ','181910079','181910079','IRAWATI DEWI','XI','R1','1','181910079','181910079','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('158','XITKJC','TKJ','181910233','181910233','KIZS MAHLENA','XI','R1','1','181910233','181910233','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('159','XITKJC','TKJ','181910080','181910080','MARLINAH','XI','R1','1','181910080','181910080','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('160','XITKJC','TKJ','181910081','181910081','MIRA PURNAMA','XI','R1','1','181910081','181910081','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('161','XITKJC','TKJ','181910082','181910082','NOVIE SARDI SAFITRI','XI','R1','1','181910082','181910082','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('162','XITKJC','TKJ','181910084','181910084','PUSPA PUSPITA','XI','R1','1','181910084','181910084','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('163','XITKJC','TKJ','181910085','181910085','PUTRI AMARWATI','XI','R1','1','181910085','181910085','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('164','XITKJC','TKJ','181910086','181910086','RENITA','XI','R1','1','181910086','181910086','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('165','XITKJC','TKJ','181910087','181910087','RIFDA NABILAH','XI','R1','1','181910087','181910087','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('166','XITKJC','TKJ','181910088','181910088','ROVYANSYAH','XI','R1','1','181910088','181910088','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('167','XITKJC','TKJ','181910089','181910089','SAFITRI YANI','XI','R1','1','181910089','181910089','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('168','XITKJC','TKJ','181910090','181910090','SELY','XI','R1','1','181910090','181910090','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('169','XITKJC','TKJ','181910091','181910091','SITI FATIMAH','XI','R1','1','181910091','181910091','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('170','XITKJC','TKJ','181910092','181910092','SITI KARMILAH','XI','R1','1','181910092','181910092','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('171','XITKJC','TKJ','181910093','181910093','SITI MASITOH','XI','R1','1','181910093','181910093','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('172','XITKJC','TKJ','181910094','181910094','SUSAN IRAWATI','XI','R1','1','181910094','181910094','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('173','XITKJC','TKJ','181910095','181910095','SYA\'DIYAH','XI','R1','1','181910095','181910095','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('174','XITKJC','TKJ','181910096','181910096','WIDIA','XI','R1','1','181910096','181910096','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('175','XITKJC','TKJ','181910097','181910097','YANTI SAFITRI','XI','R1','1','181910097','181910097','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('176','XITKJC','TKJ','181910098','181910098','YULIA STELLA ISTININGTYAS','XI','R1','1','181910098','181910098','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('177','XITKJC','TKJ','181910099','181910099','ZAHRA RAHMAYANTI','XI','R1','1','181910099','181910099','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('178','XITKJC','TKJ','181910236','181910236','SINTA ALIYANA DEWI','XI','R1','1','181910236','181910236','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('179','XITKRA','TKR','181910172','181910172','ABDUL AZIZ','XI','R1','1','181910172','181910172','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('180','XITKRA','TKR','181910173','181910173','ADE SUTRISNA','XI','R1','1','181910173','181910173','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('181','XITKRA','TKR','181910174','181910174','ADI SAPUTRA','XI','R1','1','181910174','181910174','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('182','XITKRA','TKR','181910175','181910175','AHMAD PAUZY','XI','R1','1','181910175','181910175','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('183','XITKRA','TKR','181910176','181910176','AHMAD SARPUJI','XI','R1','1','181910176','181910176','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('184','XITKRA','TKR','181910177','181910177','AJI PANGESTU','XI','R1','1','181910177','181910177','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('185','XITKRA','TKR','181910178','181910178','DEDE DARMANTO','XI','R1','1','181910178','181910178','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('186','XITKRA','TKR','181910179','181910179','DEDE LATIF','XI','R1','1','181910179','181910179','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('187','XITKRA','TKR','181910180','181910180','DENI SETIAWAN','XI','R1','1','181910180','181910180','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('188','XITKRA','TKR','181910181','181910181','DWI SAPUTRA','XI','R1','1','181910181','181910181','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('189','XITKRA','TKR','181910182','181910182','FAJAR FIRMANSYAH','XI','R1','1','181910182','181910182','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('190','XITKRA','TKR','181910183','181910183','HENDRA DARMAWAN','XI','R1','1','181910183','181910183','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('191','XITKRA','TKR','181910184','181910184','HERI SAPUTRA','XI','R1','1','181910184','181910184','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('192','XITKRA','TKR','181910185','181910185','JUMA DERMAWAN','XI','R1','1','181910185','181910185','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('193','XITKRA','TKR','181910186','181910186','KARYADI','XI','R1','1','181910186','181910186','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('194','XITKRA','TKR','181910187','181910187','M ALI RAPI','XI','R1','1','181910187','181910187','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('195','XITKRA','TKR','181910188','181910188','M ARIF FADILAH','XI','R1','1','181910188','181910188','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('196','XITKRA','TKR','181910189','181910189','M RIAN ALFANDI','XI','R1','1','181910189','181910189','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('197','XITKRA','TKR','181910190','181910190','M. HAMDAN','XI','R1','1','181910190','181910190','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('198','XITKRA','TKR','181910191','181910191','MUHAMAD SUHANDA','XI','R1','1','181910191','181910191','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('199','XITKRA','TKR','181910192','181910192','MUHAMMAD IQBAL K','XI','R1','1','181910192','181910192','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('200','XITKRA','TKR','181910193','181910193','NABAWI','XI','R1','1','181910193','181910193','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('201','XITKRA','TKR','181910194','181910194','NANDIH','XI','R1','1','181910194','181910194','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('202','XITKRA','TKR','181910195','181910195','NARMAN','XI','R1','1','181910195','181910195','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('203','XITKRA','TKR','181910196','181910196','NURWAHIDIN','XI','R1','1','181910196','181910196','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('204','XITKRA','TKR','181910197','181910197','ODING','XI','R1','1','181910197','181910197','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('205','XITKRA','TKR','181910198','181910198','RADI SAPUTRA','XI','R1','1','181910198','181910198','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('206','XITKRA','TKR','181910199','181910199','RAHMATUSUZUD','XI','R1','1','181910199','181910199','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('207','XITKRA','TKR','181910200','181910200','RUDI SUPRIYATNA','XI','R1','1','181910200','181910200','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('208','XITKRA','TKR','181910201','181910201','SAHRUL HARYANTO','XI','R1','1','181910201','181910201','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('209','XITKRA','TKR','181910202','181910202','SAIPUL MUKTI','XI','R1','1','181910202','181910202','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('210','XITKRA','TKR','181910203','181910203','SUGIANTO','XI','R1','1','181910203','181910203','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('211','XITKRA','TKR','181910204','181910204','SYAHDA ACHMAD BACHTIAR','XI','R1','1','181910204','181910204','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('212','XITKRA','TKR','181910205','181910205','TEGAR PERMANA ','XI','R1','1','181910205','181910205','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('213','XITKRA','TKR','181910206','181910206','USANDI SAPUTRA','XI','R1','1','181910206','181910206','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('214','XITKRA','TKR','181910207','181910207','WAHYUDI RIYANTO','XI','R1','1','181910207','181910207','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('215','XITKRB','TKR','181910208','181910208','ADE MAULANA','XI','R1','1','181910208','181910208','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('216','XITKRB','TKR','181910209','181910209','AFIF DEVAJI','XI','R1','1','181910209','181910209','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('217','XITKRB','TKR','181910210','181910210','AHMAD FAISAL','XI','R1','1','181910210','181910210','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('218','XITKRB','TKR','181910211','181910211','ALDI BAEHAQI','XI','R1','1','181910211','181910211','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('219','XITKRB','TKR','181910212','181910212','APRIANSYAH ABDILLAH','XI','R1','1','181910212','181910212','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('220','XITKRB','TKR','181910214','181910214','BAGUS KARAHMAT','XI','R1','1','181910214','181910214','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('221','XITKRB','TKR','181910215','181910215','DEDE KURNIAWAN','XI','R1','1','181910215','181910215','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('222','XITKRB','TKR','181910216','181910216','DENI','XI','R1','1','181910216','181910216','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('223','XITKRB','TKR','181910217','181910217','DIMAS AFRIANSYAH','XI','R1','1','181910217','181910217','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('224','XITKRB','TKR','181910218','181910218','FAHRU ROJI AKBAR','XI','R1','1','181910218','181910218','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('225','XITKRB','TKR','181910219','181910219','FAJAR SUSENO','XI','R1','1','181910219','181910219','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('226','XITKRB','TKR','181910220','181910220','KESSA MAHARDHIKA PRIANTO','XI','R1','1','181910220','181910220','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('227','XITKRB','TKR','181910221','181910221','M. HILMI FATHU RAHMAN','XI','R1','1','181910221','181910221','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('228','XITKRB','TKR','181910222','181910222','M. IQBAL','XI','R1','1','181910222','181910222','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('229','XITKRB','TKR','181910223','181910223','MUHAMMAD ERLANGGA','XI','R1','1','181910223','181910223','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('230','XITKRB','TKR','181910224','181910224','MUHAMAD HAMZAH NUR A','XI','R1','1','181910224','181910224','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('231','XITKRB','TKR','181910225','181910225','MUHAMAD SAMSUL FAJRI','XI','R1','1','181910225','181910225','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('232','XITKRB','TKR','181910226','181910226','RAFI RAMADHAN AKHWAL','XI','R1','1','181910226','181910226','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('233','XITKRB','TKR','181910228','181910228','RIZKI DWI ANDIKA','XI','R1','1','181910228','181910228','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('234','XITKRB','TKR','181910229','181910229','SAIPUL ANWAR','XI','R1','1','181910229','181910229','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('235','XITKRB','TKR','181910231','181910231','TOTONG INDA','XI','R1','1','181910231','181910231','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('236','XITKRB','TKR','181910232','181910232','YOGA PAMUNGKAS','XI','R1','1','181910232','181910232','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('237','XITKRB','TKR','181910235','181910235','YONGKI PRASTIYO RAHARJO','XI','R1','1','181910235','181910235','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('238','XITPA','TP','181910100','181910100','ADE GUNAWAN','XI','R1','1','181910100','181910100','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('239','XITPA','TP','181910101','181910101','ADITYA RAHMAT HIDAYAT','XI','R1','1','181910101','181910101','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('240','XITPA','TP','181910102','181910102','AGUNG SAPUTRA','XI','R1','1','181910102','181910102','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('241','XITPA','TP','181910103','181910103','AHMED ZONATAN','XI','R1','1','181910103','181910103','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('242','XITPA','TP','181910104','181910104','ALWI SYIHAB','XI','R1','1','181910104','181910104','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('243','XITPA','TP','181910105','181910105','AMIR','XI','R1','1','181910105','181910105','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('244','XITPA','TP','181910106','181910106','ANDRI GUNAWAN','XI','R1','1','181910106','181910106','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('245','XITPA','TP','181910107','181910107','ARBA FAUZI HAKIM','XI','R1','1','181910107','181910107','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('246','XITPA','TP','181910108','181910108','ARMAN MAULANA','XI','R1','1','181910108','181910108','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('247','XITPA','TP','181910109','181910109','DA\'I SINDU YANTO','XI','R1','1','181910109','181910109','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('248','XITPA','TP','181910111','181910111','GURUH APRIYANA','XI','R1','1','181910111','181910111','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('249','XITPA','TP','181910112','181910112','JAKARIA ','XI','R1','1','181910112','181910112','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('250','XITPA','TP','181910113','181910113','LUCKY HERMANSAH','XI','R1','1','181910113','181910113','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('251','XITPA','TP','181910114','181910114','M ABDUL ADI YASIN','XI','R1','1','181910114','181910114','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('252','XITPA','TP','181910115','181910115','M HENDRIANSYAH','XI','R1','1','181910115','181910115','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('253','XITPA','TP','181910116','181910116','M SOLEHUDIN','XI','R1','1','181910116','181910116','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('254','XITPA','TP','181910117','181910117','M. BACHRUL ULUM','XI','R1','1','181910117','181910117','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('255','XITPA','TP','181910118','181910118','MAULANA INDRA KOMARA','XI','R1','1','181910118','181910118','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('256','XITPA','TP','181910119','181910119','MUHAMAD AL RIFQI','XI','R1','1','181910119','181910119','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('257','XITPA','TP','181910120','181910120','MUHAMAD RIDWAN','XI','R1','1','181910120','181910120','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('258','XITPA','TP','181910121','181910121','MUHAMAD YUNUS','XI','R1','1','181910121','181910121','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('259','XITPA','TP','181910122','181910122','NIKO DIANTURI','XI','R1','1','181910122','181910122','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('260','XITPA','TP','181910123','181910123','RAKA ANDIKA ','XI','R1','1','181910123','181910123','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('261','XITPA','TP','181910124','181910124','RAMDAN','XI','R1','1','181910124','181910124','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('262','XITPA','TP','181910125','181910125','RENDI ANDRIANSYAH','XI','R1','1','181910125','181910125','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('263','XITPA','TP','181910126','181910126','RIFKI ALFAREZ','XI','R1','1','181910126','181910126','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('264','XITPA','TP','181910127','181910127','ROBBY AL FAREZEL','XI','R1','1','181910127','181910127','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('265','XITPA','TP','181910128','181910128','RONI TRI','XI','R1','1','181910128','181910128','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('266','XITPA','TP','181910129','181910129','SARMAN','XI','R1','1','181910129','181910129','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('267','XITPA','TP','181910130','181910130','SHANTANU YAZI','XI','R1','1','181910130','181910130','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('268','XITPA','TP','181910131','181910131','SUHADI SUTRISNA','XI','R1','1','181910131','181910131','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('269','XITPA','TP','181910132','181910132','SUTRISNA','XI','R1','1','181910132','181910132','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('270','XITPA','TP','181910133','181910133','TOPAN SAEPUL B','XI','R1','1','181910133','181910133','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('271','XITPA','TP','181910134','181910134','UJANG AGUS','XI','R1','1','181910134','181910134','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('272','XITPA','TP','181910135','181910135','VERI HERMAWAN','XI','R1','1','181910135','181910135','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('273','XITPB','TP','181910136','181910136','ABDUL KARIM','XI','R1','1','181910136','181910136','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('274','XITPB','TP','181910137','181910137','ADBULAH ABDUL WAHAB','XI','R1','1','181910137','181910137','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('275','XITPB','TP','181910138','181910138','ACEP SUNANDAR','XI','R1','1','181910138','181910138','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('276','XITPB','TP','181910139','181910139','AGUNG RAHMAT','XI','R1','1','181910139','181910139','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('277','XITPB','TP','181910140','181910140','AGUNG SUHENDAR','XI','R1','1','181910140','181910140','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('278','XITPB','TP','181910141','181910141','AHMAD FERY','XI','R1','1','181910141','181910141','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('279','XITPB','TP','181910142','181910142','AHMAD KHAFI','XI','R1','1','181910142','181910142','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('280','XITPB','TP','181910143','181910143','AJI JAYA SAPUTRA','XI','R1','1','181910143','181910143','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('281','XITPB','TP','181910144','181910144','ANGGI MAULANA','XI','R1','1','181910144','181910144','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('282','XITPB','TP','181910146','181910146','AZHAR AL MUKHORI','XI','R1','1','181910146','181910146','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('283','XITPB','TP','181910147','181910147','AZZAR ASWAD','XI','R1','1','181910147','181910147','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('284','XITPB','TP','181910148','181910148','BAGAS INGJAGAT','XI','R1','1','181910148','181910148','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('285','XITPB','TP','181910149','181910149','BAYU FITRIYADI','XI','R1','1','181910149','181910149','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('286','XITPB','TP','181910150','181910150','DIMAS AL-KAHFI','XI','R1','1','181910150','181910150','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('287','XITPB','TP','181910151','181910151','DION DUMADI','XI','R1','1','181910151','181910151','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('288','XITPB','TP','181910152','181910152','HASANUDIN','XI','R1','1','181910152','181910152','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('289','XITPB','TP','181910153','181910153','INDRA JULIYANTO E','XI','R1','1','181910153','181910153','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('290','XITPB','TP','181910154','181910154','IRDAN ARDIANSYAH','XI','R1','1','181910154','181910154','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('291','XITPB','TP','181910155','181910155','JAKARIA','XI','R1','1','181910155','181910155','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('292','XITPB','TP','181910156','181910156','MUHAMAD ADHA LUBIS','XI','R1','1','181910156','181910156','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('293','XITPB','TP','181910157','181910157','MUHAMAD NASIR','XI','R1','1','181910157','181910157','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('294','XITPB','TP','181910158','181910158','M. AJI ANAFI','XI','R1','1','181910158','181910158','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('295','XITPB','TP','181910159','181910159','MUHAMAD FAJRI','XI','R1','1','181910159','181910159','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('296','XITPB','TP','181910160','181910160','MUHAMAD ZAELANI','XI','R1','1','181910160','181910160','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('297','XITPB','TP','181910162','181910162','JUNAEDI ALFADILAH','XI','R1','1','181910162','181910162','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('298','XITPB','TP','181910164','181910164','RAIHAN MAULANA','XI','R1','1','181910164','181910164','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('299','XITPB','TP','181910165','181910165','RAJU','XI','R1','1','181910165','181910165','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('300','XITPB','TP','181910166','181910166','RENDI','XI','R1','1','181910166','181910166','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('301','XITPB','TP','181910167','181910167','RIZALDI ANDI YUSUF','XI','R1','1','181910167','181910167','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('302','XITPB','TP','181910168','181910168','RIZKI AZIS ARISENO','XI','R1','1','181910168','181910168','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('303','XITPB','TP','181910169','181910169','RIZKY SAPUTRA','XI','R1','1','181910169','181910169','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('304','XITPB','TP','181910170','181910170','SAHRUL BAHTIAR','XI','R1','1','181910170','181910170','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('305','XITPB','TP','181910171','181910171','YUSUP SURYA MAHENDRA','XI','R1','1','181910171','181910171','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('306','XTKJA','TKJ','192010001','192010001','Aan Aprilia','X','R1','1','192010001','192010001','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('307','XTKJA','TKJ','192010002','192010002','Adinda Putri','X','R1','1','192010002','192010002','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('308','XTKJA','TKJ','192010003','192010003','Adriano','X','R1','1','192010003','192010003','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('309','XTKJA','TKJ','192010004','192010004','Alysha Nurhidayah S.','X','R1','1','192010004','192010004','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('310','XTKJA','TKJ','192010005','192010005','Ani Agustina','X','R1','1','192010005','192010005','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('311','XTKJA','TKJ','192010006','192010006','Bagas Ariesma T','X','R1','1','192010006','192010006','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('312','XTKJA','TKJ','192010007','192010007','Chantika Adya Nur Qolbi','X','R1','1','192010007','192010007','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('313','XTKJA','TKJ','192010008','192010008','Dela Sanjaya','X','R1','1','192010008','192010008','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('314','XTKJA','TKJ','192010009','192010009','Desi','X','R1','1','192010009','192010009','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('315','XTKJA','TKJ','192010010','192010010','Dewi Wulansari','X','R1','1','192010010','192010010','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('316','XTKJA','TKJ','192010011','192010011','Dwi Itsna Aulia','X','R1','1','192010011','192010011','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('317','XTKJA','TKJ','192010012','192010012','Erlina','X','R1','1','192010012','192010012','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('318','XTKJA','TKJ','192010013','192010013','Fitria Sri Rahayu','X','R1','1','192010013','192010013','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('319','XTKJA','TKJ','192010014','192010014','Inggit Saraswati Nur Ain','X','R1','1','192010014','192010014','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('320','XTKJA','TKJ','192010015','192010015','Laita Kaumia','X','R1','1','192010015','192010015','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('321','XTKJA','TKJ','192010016','192010016','Maulidia Fitria','X','R1','1','192010016','192010016','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('322','XTKJA','TKJ','192010017','192010017','Mulyanah','X','R1','1','192010017','192010017','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('323','XTKJA','TKJ','192010018','192010018','Nasya Agisya Sehah Nasution','X','R1','1','192010018','192010018','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('324','XTKJA','TKJ','192010019','192010019','Nopi Nuralia','X','R1','1','192010019','192010019','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('325','XTKJA','TKJ','192010020','192010020','Nurul Awulia','X','R1','1','192010020','192010020','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('326','XTKJA','TKJ','192010021','192010021','Puput Melati','X','R1','1','192010021','192010021','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('327','XTKJA','TKJ','192010022','192010022','Putri Ningsih','X','R1','1','192010022','192010022','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('328','XTKJA','TKJ','192010023','192010023','Putri Sintia Mawadah','X','R1','1','192010023','192010023','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('329','XTKJA','TKJ','192010024','192010024','Rami Fitriyani','X','R1','1','192010024','192010024','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('330','XTKJA','TKJ','192010025','192010025','Ridho Ramadhani','X','R1','1','192010025','192010025','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('331','XTKJA','TKJ','192010026','192010026','Riska Handayani','X','R1','1','192010026','192010026','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('332','XTKJA','TKJ','192010027','192010027','Selvi Aulia Sari','X','R1','1','192010027','192010027','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('333','XTKJA','TKJ','192010028','192010028','Sindi Hermansyah','X','R1','1','192010028','192010028','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('334','XTKJA','TKJ','192010029','192010029','Siti Nur Fadilah','X','R1','1','192010029','192010029','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('335','XTKJA','TKJ','192010030','192010030','Siti Nurul Alfia','X','R1','1','192010030','192010030','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('336','XTKJA','TKJ','192010031','192010031','Sri Rizki Amelia','X','R1','1','192010031','192010031','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('337','XTKJA','TKJ','192010032','192010032','Susilawati Dewi','X','R1','1','192010032','192010032','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('338','XTKJA','TKJ','192010033','192010033','Tinah','X','R1','1','192010033','192010033','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('339','XTKJA','TKJ','192010034','192010034','Widia Nuraeni','X','R1','1','192010034','192010034','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('340','XTKJA','TKJ','192010035','192010035','Wulandari','X','R1','1','192010035','192010035','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('341','XTKJA','TKJ','192010036','192010036','Yesa Kartika','X','R1','1','192010036','192010036','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('342','XTKJB','TKJ','192010037','192010037','Abdul Mazid','X','R1','1','192010037','192010037','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('343','XTKJB','TKJ','192010038','192010038','Alfina Damayanti','X','R1','1','192010038','192010038','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('344','XTKJB','TKJ','192010039','192010039','Andini Supandi','X','R1','1','192010039','192010039','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('345','XTKJB','TKJ','192010040','192010040','Asih Susilawati','X','R1','1','192010040','192010040','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('346','XTKJB','TKJ','192010041','192010041','Bintang Agustina','X','R1','1','192010041','192010041','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('347','XTKJB','TKJ','192010042','192010042','Cicih Okhtapia','X','R1','1','192010042','192010042','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('348','XTKJB','TKJ','192010043','192010043','Delia Puspita Wati','X','R1','1','192010043','192010043','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('349','XTKJB','TKJ','192010044','192010044','Desti Salsavira','X','R1','1','192010044','192010044','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('350','XTKJB','TKJ','192010045','192010045','Dimas Nurkharisman Triyanto','X','R1','1','192010045','192010045','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('351','XTKJB','TKJ','192010046','192010046','Elisah','X','R1','1','192010046','192010046','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('352','XTKJB','TKJ','192010047','192010047','Euis Faradilla','X','R1','1','192010047','192010047','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('353','XTKJB','TKJ','192010048','192010048','Indah Sari','X','R1','1','192010048','192010048','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('354','XTKJB','TKJ','192010049','192010049','Intan Avrilia Melani','X','R1','1','192010049','192010049','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('355','XTKJB','TKJ','192010050','192010050','Janes Cintya','X','R1','1','192010050','192010050','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('356','XTKJB','TKJ','192010051','192010051','Julia Agustin','X','R1','1','192010051','192010051','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('357','XTKJB','TKJ','192010052','192010052','Lilis','X','R1','1','192010052','192010052','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('358','XTKJB','TKJ','192010053','192010053','M.Faisal Zumhari','X','R1','1','192010053','192010053','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('359','XTKJB','TKJ','192010054','192010054','Mega Lestari','X','R1','1','192010054','192010054','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('360','XTKJB','TKJ','192010055','192010055','Mutiara Hati','X','R1','1','192010055','192010055','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('361','XTKJB','TKJ','192010056','192010056','Natasya Septiani','X','R1','1','192010056','192010056','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('362','XTKJB','TKJ','192010057','192010057','Novia Kristin','X','R1','1','192010057','192010057','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('363','XTKJB','TKJ','192010058','192010058','Nyai Kesih ','X','R1','1','192010058','192010058','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('364','XTKJB','TKJ','192010059','192010059','Putra Pratama','X','R1','1','192010059','192010059','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('365','XTKJB','TKJ','192010060','192010060','Putri Suryati','X','R1','1','192010060','192010060','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('366','XTKJB','TKJ','192010061','192010061','Ranah Sri Rahayu','X','R1','1','192010061','192010061','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('367','XTKJB','TKJ','192010062','192010062','Rika Riyani','X','R1','1','192010062','192010062','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('368','XTKJB','TKJ','192010063','192010063','Rohayati','X','R1','1','192010063','192010063','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('369','XTKJB','TKJ','192010064','192010064','Septiana Balqis','X','R1','1','192010064','192010064','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('370','XTKJB','TKJ','192010065','192010065','Siti Fatmawati','X','R1','1','192010065','192010065','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('371','XTKJB','TKJ','192010066','192010066','Somihlia','X','R1','1','192010066','192010066','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('372','XTKJB','TKJ','192010067','192010067','Tarnih','X','R1','1','192010067','192010067','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('373','XTKJB','TKJ','192010068','192010068','Tiya Yunita','X','R1','1','192010068','192010068','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('374','XTKJB','TKJ','192010069','192010069','Widiyawati','X','R1','1','192010069','192010069','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('375','XTKJB','TKJ','192010070','192010070','Wulan Nurul Fadilah','X','R1','1','192010070','192010070','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('376','XTKJB','TKJ','192010071','192010071','Wulandari','X','R1','1','192010071','192010071','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('377','XTKJB','TKJ','192010072','192010072','Yulia Citra Komala Dewi','X','R1','1','192010072','192010072','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('378','XTKJC','TKJ','192010073','192010073','Abelia Fitri','X','R1','1','192010073','192010073','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('379','XTKJC','TKJ','192010074','192010074','Andara Nurolivia','X','R1','1','192010074','192010074','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('380','XTKJC','TKJ','192010075','192010075','Atalia Salsabila','X','R1','1','192010075','192010075','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('381','XTKJC','TKJ','192010076','192010076','Bulan Safitri','X','R1','1','192010076','192010076','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('382','XTKJC','TKJ','192010077','192010077','Cahaya Jihan','X','R1','1','192010077','192010077','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('383','XTKJC','TKJ','192010078','192010078','Cindy Aulia Azmi','X','R1','1','192010078','192010078','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('384','XTKJC','TKJ','192010079','192010079','Delima','X','R1','1','192010079','192010079','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('385','XTKJC','TKJ','192010080','192010080','Devia','X','R1','1','192010080','192010080','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('386','XTKJC','TKJ','192010081','192010081','Dini Apriliani','X','R1','1','192010081','192010081','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('387','XTKJC','TKJ','192010082','192010082','Ellis','X','R1','1','192010082','192010082','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('388','XTKJC','TKJ','192010083','192010083','Evita Febriyanti','X','R1','1','192010083','192010083','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('389','XTKJC','TKJ','192010084','192010084','Indah Sulastri','X','R1','1','192010084','192010084','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('390','XTKJC','TKJ','192010085','192010085','Intan Chantika Septiani','X','R1','1','192010085','192010085','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('391','XTKJC','TKJ','192010086','192010086','Karlita Nanda Prasetya','X','R1','1','192010086','192010086','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('392','XTKJC','TKJ','192010087','192010087','Lisa Rahmawati','X','R1','1','192010087','192010087','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('393','XTKJC','TKJ','192010088','192010088','Melani','X','R1','1','192010088','192010088','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('394','XTKJC','TKJ','192010089','192010089','Nadia Vega','X','R1','1','192010089','192010089','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('395','XTKJC','TKJ','192010090','192010090','Neneng Anjarwati','X','R1','1','192010090','192010090','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('396','XTKJC','TKJ','192010091','192010091','Nur Aisah','X','R1','1','192010091','192010091','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('397','XTKJC','TKJ','192010092','192010092','Piola Putri Alfiani','X','R1','1','192010092','192010092','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('398','XTKJC','TKJ','192010093','192010093','Putri','X','R1','1','192010093','192010093','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('399','XTKJC','TKJ','192010094','192010094','Rahmad Ardiansyah','X','R1','1','192010094','192010094','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('400','XTKJC','TKJ','192010095','192010095','Rani Wulandari','X','R1','1','192010095','192010095','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('401','XTKJC','TKJ','192010096','192010096','Rika Sartika','X','R1','1','192010096','192010096','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('402','XTKJC','TKJ','192010097','192010097','Santi Susilawati','X','R1','1','192010097','192010097','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('403','XTKJC','TKJ','192010098','192010098','Shela Agustin','X','R1','1','192010098','192010098','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('404','XTKJC','TKJ','192010099','192010099','Siti Habibah','X','R1','1','192010099','192010099','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('405','XTKJC','TKJ','192010100','192010100','Siti Nuraini','X','R1','1','192010100','192010100','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('406','XTKJC','TKJ','192010101','192010101','Sonia','X','R1','1','192010101','192010101','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('407','XTKJC','TKJ','192010102','192010102','Sumi Asih','X','R1','1','192010102','192010102','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('408','XTKJC','TKJ','192010103','192010103','Tegar Pribadi','X','R1','1','192010103','192010103','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('409','XTKJC','TKJ','192010104','192010104','Vevi Pratiwi','X','R1','1','192010104','192010104','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('410','XTKJC','TKJ','192010105','192010105','Wulan Handayani','X','R1','1','192010105','192010105','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('411','XTKJC','TKJ','192010106','192010106','Yanti','X','R1','1','192010106','192010106','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('412','XTKJC','TKJ','192010107','192010107','Yunita Rahmania','X','R1','1','192010107','192010107','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('413','XTKJD','TKJ','192010108','192010108','Cindy Medika Sari','X','R1','1','192010108','192010108','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('414','XTKJD','TKJ','192010109','192010109','Della Puspita Sari','X','R1','1','192010109','192010109','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('415','XTKJD','TKJ','192010110','192010110','Dewi Lestari','X','R1','1','192010110','192010110','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('416','XTKJD','TKJ','192010111','192010111','Diyan Puspita Dewi','X','R1','1','192010111','192010111','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('417','XTKJD','TKJ','192010112','192010112','Endah Puspitasari','X','R1','1','192010112','192010112','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('418','XTKJD','TKJ','192010113','192010113','Fina Komariah','X','R1','1','192010113','192010113','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('419','XTKJD','TKJ','192010114','192010114','Ine Lestari','X','R1','1','192010114','192010114','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('420','XTKJD','TKJ','192010115','192010115','Intan Nur Aini','X','R1','1','192010115','192010115','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('421','XTKJD','TKJ','192010116','192010116','Kiki Prasetyo','X','R1','1','192010116','192010116','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('422','XTKJD','TKJ','192010117','192010117','Mira','X','R1','1','192010117','192010117','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('423','XTKJD','TKJ','192010118','192010118','Nardila Oktaviana','X','R1','1','192010118','192010118','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('424','XTKJD','TKJ','192010119','192010119','Nola Belia Putri','X','R1','1','192010119','192010119','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('425','XTKJD','TKJ','192010120','192010120','Nur Faizah','X','R1','1','192010120','192010120','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('426','XTKJD','TKJ','192010121','192010121','Pitriyani Nurhayati','X','R1','1','192010121','192010121','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('427','XTKJD','TKJ','192010122','192010122','Putri Mayang Sari','X','R1','1','192010122','192010122','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('428','XTKJD','TKJ','192010123','192010123','Putri Rahayu NF','X','R1','1','192010123','192010123','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('429','XTKJD','TKJ','192010124','192010124','Putri Santia Nurjanah','X','R1','1','192010124','192010124','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('430','XTKJD','TKJ','192010125','192010125','Rahmadini','X','R1','1','192010125','192010125','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('431','XTKJD','TKJ','192010126','192010126','Ratih Alawiyah','X','R1','1','192010126','192010126','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('432','XTKJD','TKJ','192010127','192010127','Ririh Rahmawati','X','R1','1','192010127','192010127','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('433','XTKJD','TKJ','192010128','192010128','Selomita Diana','X','R1','1','192010128','192010128','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('434','XTKJD','TKJ','192010129','192010129','Sindi Aulia','X','R1','1','192010129','192010129','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('435','XTKJD','TKJ','192010130','192010130','Siti Maryati','X','R1','1','192010130','192010130','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('436','XTKJD','TKJ','192010131','192010131','Siti Nur Hazizah','X','R1','1','192010131','192010131','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('437','XTKJD','TKJ','192010132','192010132','Siti Nurdela','X','R1','1','192010132','192010132','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('438','XTKJD','TKJ','192010133','192010133','Sri Astuti','X','R1','1','192010133','192010133','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('439','XTKJD','TKJ','192010134','192010134','Suci Indah Khori','X','R1','1','192010134','192010134','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('440','XTKJD','TKJ','192010135','192010135','Suryanih','X','R1','1','192010135','192010135','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('441','XTKJD','TKJ','192010136','192010136','Tiara Amelia','X','R1','1','192010136','192010136','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('442','XTKJD','TKJ','192010137','192010137','Vito Sidik Al-ghaniyy','X','R1','1','192010137','192010137','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('443','XTKJD','TKJ','192010138','192010138','Yasinta Harum Sari','X','R1','1','192010138','192010138','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('444','XTKRA','TKR','192010231','192010231','Abdul Azis','X','R1','1','192010231','192010231','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('445','XTKRA','TKR','192010232','192010232','Abdul Komar','X','R1','1','192010232','192010232','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('446','XTKRA','TKR','192010233','192010233','Ahmad Al Bawi','X','R1','1','192010233','192010233','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('447','XTKRA','TKR','192010234','192010234','Aldi','X','R1','1','192010234','192010234','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('448','XTKRA','TKR','192010235','192010235','Alpin','X','R1','1','192010235','192010235','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('449','XTKRA','TKR','192010236','192010236','Andrian Muh. F','X','R1','1','192010236','192010236','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('450','XTKRA','TKR','192010237','192010237','Anggi','X','R1','1','192010237','192010237','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('451','XTKRA','TKR','192010238','192010238','Asri Rosul Muttaqin','X','R1','1','192010238','192010238','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('452','XTKRA','TKR','192010239','192010239','Dicky Umbara','X','R1','1','192010239','192010239','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('453','XTKRA','TKR','192010240','192010240','Dimas Saputra','X','R1','1','192010240','192010240','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('454','XTKRA','TKR','192010241','192010241','Enriko','X','R1','1','192010241','192010241','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('455','XTKRA','TKR','192010242','192010242','Fahrul rozi','X','R1','1','192010242','192010242','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('456','XTKRA','TKR','192010243','192010243','Habil Maulana Rakasiwi','X','R1','1','192010243','192010243','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('457','XTKRA','TKR','192010244','192010244','Hertono','X','R1','1','192010244','192010244','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('458','XTKRA','TKR','192010245','192010245','Imar','X','R1','1','192010245','192010245','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('459','XTKRA','TKR','192010246','192010246','Jepri Dauri Daud','X','R1','1','192010246','192010246','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('460','XTKRA','TKR','192010247','192010247','Kusnadi','X','R1','1','192010247','192010247','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('461','XTKRA','TKR','192010248','192010248','Muhamad Sajili','X','R1','1','192010248','192010248','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('462','XTKRA','TKR','192010249','192010249','Muhammad Danu Rahman','X','R1','1','192010249','192010249','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('463','XTKRA','TKR','192010250','192010250','Muh. Raffa al-farizqi','X','R1','1','192010250','192010250','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('464','XTKRA','TKR','192010251','192010251','Muhammad Rizki Abdullah','X','R1','1','192010251','192010251','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('465','XTKRA','TKR','192010252','192010252','Muslin','X','R1','1','192010252','192010252','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('466','XTKRA','TKR','192010253','192010253','Natrom','X','R1','1','192010253','192010253','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('467','XTKRA','TKR','192010254','192010254','Rafly Ramadhan','X','R1','1','192010254','192010254','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('468','XTKRA','TKR','192010255','192010255','Ridwan Maulana Firdaus','X','R1','1','192010255','192010255','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('469','XTKRA','TKR','192010256','192010256','Rio Setiawan','X','R1','1','192010256','192010256','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('470','XTKRA','TKR','192010257','192010257','Rudi','X','R1','1','192010257','192010257','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('471','XTKRA','TKR','192010258','192010258','Saja','X','R1','1','192010258','192010258','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('472','XTKRA','TKR','192010259','192010259','Sugih Sutisna','X','R1','1','192010259','192010259','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('473','XTKRA','TKR','192010260','192010260','Syahrul Dwi Harza','X','R1','1','192010260','192010260','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('474','XTKRA','TKR','192010261','192010261','Wandi Febiyanto','X','R1','1','192010261','192010261','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('475','XTKRA','TKR','192010262','192010262','Yogi Pradana Putra','X','R1','1','192010262','192010262','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('476','XTKRA','TKR','192010263','192010263','Yusup Yulian','X','R1','1','192010263','192010263','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('477','XTKRB','TKR','192010264','192010264','Abdul paqih','X','R1','1','192010264','192010264','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('478','XTKRB','TKR','192010265','192010265','Abdul Rohim','X','R1','1','192010265','192010265','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('479','XTKRB','TKR','192010266','192010266','Ahmad Fadli','X','R1','1','192010266','192010266','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('480','XTKRB','TKR','192010267','192010267','Alfan Abdul Hadi','X','R1','1','192010267','192010267','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('481','XTKRB','TKR','192010268','192010268','Anang Saputra','X','R1','1','192010268','192010268','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('482','XTKRB','TKR','192010269','192010269','Ariq Arkana Sutandi','X','R1','1','192010269','192010269','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('483','XTKRB','TKR','192010270','192010270','Dani Herlangga','X','R1','1','192010270','192010270','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('484','XTKRB','TKR','192010271','192010271','Didi Sanjaya','X','R1','1','192010271','192010271','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('485','XTKRB','TKR','192010272','192010272','Dimas Andrean','X','R1','1','192010272','192010272','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('486','XTKRB','TKR','192010273','192010273','Egi','X','R1','1','192010273','192010273','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('487','XTKRB','TKR','192010274','192010274','Fadli Apriyayi Senja','X','R1','1','192010274','192010274','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('488','XTKRB','TKR','192010275','192010275','Fajar Gussandi','X','R1','1','192010275','192010275','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('489','XTKRB','TKR','192010276','192010276','Hardiansyah','X','R1','1','192010276','192010276','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('490','XTKRB','TKR','192010277','192010277','Hijabullah Bisma Tawassula','X','R1','1','192010277','192010277','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('491','XTKRB','TKR','192010278','192010278','Indra Dwi Aryanto','X','R1','1','192010278','192010278','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('492','XTKRB','TKR','192010279','192010279','Karnadi','X','R1','1','192010279','192010279','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('493','XTKRB','TKR','192010280','192010280','M. Ikbal','X','R1','1','192010280','192010280','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('494','XTKRB','TKR','192010281','192010281','Muhamad Ivan Kurniawan','X','R1','1','192010281','192010281','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('495','XTKRB','TKR','192010282','192010282','Muhamad Wasim','X','R1','1','192010282','192010282','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('496','XTKRB','TKR','192010283','192010283','Muhammad Fauzi Nurhakiki','X','R1','1','192010283','192010283','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('497','XTKRB','TKR','192010284','192010284','Muhammad Rafli Arrasid','X','R1','1','192010284','192010284','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('498','XTKRB','TKR','192010285','192010285','Muhammad Rizki Mulyana','X','R1','1','192010285','192010285','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('499','XTKRB','TKR','192010286','192010286','Nalih Ari Setiadi','X','R1','1','192010286','192010286','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('500','XTKRB','TKR','192010287','192010287','Pebriansyah','X','R1','1','192010287','192010287','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('501','XTKRB','TKR','192010288','192010288','Rafli Setiawan Zulkarnain','X','R1','1','192010288','192010288','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('502','XTKRB','TKR','192010289','192010289','Rijal Umami','X','R1','1','192010289','192010289','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('503','XTKRB','TKR','192010290','192010290','Rio Febrian','X','R1','1','192010290','192010290','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('504','XTKRB','TKR','192010291','192010291','Rizki Aditia Saputra','X','R1','1','192010291','192010291','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('505','XTKRB','TKR','192010292','192010292','Saripudin Abdulah','X','R1','1','192010292','192010292','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('506','XTKRB','TKR','192010293','192010293','Suhadiman Riyadi','X','R1','1','192010293','192010293','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('507','XTKRB','TKR','192010294','192010294','Tarmizi Tahir','X','R1','1','192010294','192010294','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('508','XTKRB','TKR','192010295','192010295','Yoga Prasetio','X','R1','1','192010295','192010295','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('509','XTKRB','TKR','192010296','192010296','Yuda Muzaki Hafidz','X','R1','1','192010296','192010296','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('510','XTKRC','TKR','192010297','192010297','Abdul Gofar','X','R1','1','192010297','192010297','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('511','XTKRC','TKR','192010298','192010298','Aditiya Wahyudi','X','R1','1','192010298','192010298','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('512','XTKRC','TKR','192010299','192010299','Ahmad Riski Febriansyah','X','R1','1','192010299','192010299','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('513','XTKRC','TKR','192010300','192010300','Ali','X','R1','1','192010300','192010300','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('514','XTKRC','TKR','192010301','192010301','Arya Adi Pangga','X','R1','1','192010301','192010301','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('515','XTKRC','TKR','192010302','192010302','Deni Maulana','X','R1','1','192010302','192010302','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('516','XTKRC','TKR','192010303','192010303','Diki Prastio','X','R1','1','192010303','192010303','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('517','XTKRC','TKR','192010304','192010304','Endis Sudrajat','X','R1','1','192010304','192010304','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('518','XTKRC','TKR','192010305','192010305','Fahmi Alpharizi','X','R1','1','192010305','192010305','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('519','XTKRC','TKR','192010306','192010306','George Giovani','X','R1','1','192010306','192010306','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('520','XTKRC','TKR','192010307','192010307','Helmi Ade Saputra','X','R1','1','192010307','192010307','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('521','XTKRC','TKR','192010308','192010308','Iksan Rojikin','X','R1','1','192010308','192010308','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('522','XTKRC','TKR','192010309','192010309','Indra Saputra','X','R1','1','192010309','192010309','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('523','XTKRC','TKR','192010310','192010310','Komarudin','X','R1','1','192010310','192010310','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('524','XTKRC','TKR','192010311','192010311','M. Laji','X','R1','1','192010311','192010311','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('525','XTKRC','TKR','192010312','192010312','Mahmud Al Buchori','X','R1','1','192010312','192010312','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('526','XTKRC','TKR','192010313','192010313','Muhamad Nurdin','X','R1','1','192010313','192010313','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('527','XTKRC','TKR','192010314','192010314','Muhamad Yusuf','X','R1','1','192010314','192010314','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('528','XTKRC','TKR','192010315','192010315','Muhammad Purwo Hadi Santoso','X','R1','1','192010315','192010315','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('529','XTKRC','TKR','192010316','192010316','Muhammad Radi','X','R1','1','192010316','192010316','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('530','XTKRC','TKR','192010317','192010317','Muhammad Reza Alpian','X','R1','1','192010317','192010317','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('531','XTKRC','TKR','192010318','192010318','Mulyadi','X','R1','1','192010318','192010318','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('532','XTKRC','TKR','192010319','192010319','Nasan Basri','X','R1','1','192010319','192010319','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('533','XTKRC','TKR','192010320','192010320','Radi','X','R1','1','192010320','192010320','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('534','XTKRC','TKR','192010321','192010321','Rendi Abdul Zali','X','R1','1','192010321','192010321','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('535','XTKRC','TKR','192010322','192010322','Rizki Syaiful Bahri','X','R1','1','192010322','192010322','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('536','XTKRC','TKR','192010323','192010323','Saipul Bahri','X','R1','1','192010323','192010323','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('537','XTKRC','TKR','192010324','192010324','Saripudin Saputra','X','R1','1','192010324','192010324','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('538','XTKRC','TKR','192010326','192010326','Tarsidi','X','R1','1','192010326','192010326','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('539','XTKRC','TKR','192010327','192010327','Yoga Saputra','X','R1','1','192010327','192010327','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('540','XTKRC','TKR','192010328','192010328','Yusup Khaerul Ananda','X','R1','1','192010328','192010328','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('541','XTKRC','TKR','192010329','192010329','Zaki Mubarak','X','R1','1','192010329','192010329','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('542','XTKRC','TKR','192010330','192010330','Sahrul Gunawan','X','R1','1','192010330','192010330','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('543','XTPA','TP','192010139','192010139','Abdul Azis','X','R1','1','192010139','192010139','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('544','XTPA','TP','192010140','192010140','Ahmad Rifai','X','R1','1','192010140','192010140','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('545','XTPA','TP','192010141','192010141','Akbar Maulana','X','R1','1','192010141','192010141','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('546','XTPA','TP','192010142','192010142','Aldi Gilang Saputra','X','R1','1','192010142','192010142','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('547','XTPA','TP','192010143','192010143','Alpin Nurhakim','X','R1','1','192010143','192010143','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('548','XTPA','TP','192010145','192010145','Antum Darozatun','X','R1','1','192010145','192010145','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('549','XTPA','TP','192010146','192010146','Dhimas Sandityar Rifani','X','R1','1','192010146','192010146','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('550','XTPA','TP','192010147','192010147','Dicki Priadi','X','R1','1','192010147','192010147','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('551','XTPA','TP','192010148','192010148','Erlangga Pramudya Alkautsar','X','R1','1','192010148','192010148','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('552','XTPA','TP','192010149','192010149','Fahri Ramadani','X','R1','1','192010149','192010149','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('553','XTPA','TP','192010150','192010150','Hassan Bachri Wirayudha','X','R1','1','192010150','192010150','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('554','XTPA','TP','192010151','192010151','Ilham','X','R1','1','192010151','192010151','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('555','XTPA','TP','192010152','192010152','Ivan','X','R1','1','192010152','192010152','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('556','XTPA','TP','192010153','192010153','Jaya','X','R1','1','192010153','192010153','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('557','XTPA','TP','192010154','192010154','Landi Darmadi','X','R1','1','192010154','192010154','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('558','XTPA','TP','192010155','192010155','Muhamad Fahri Fauzi','X','R1','1','192010155','192010155','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('559','XTPA','TP','192010157','192010157','Muhammad Abdul Rico Syafei','X','R1','1','192010157','192010157','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('560','XTPA','TP','192010158','192010158','Muhammad Riyan Saputra','X','R1','1','192010158','192010158','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('561','XTPA','TP','192010159','192010159','Muhammad Yudha San Firdaus','X','R1','1','192010159','192010159','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('562','XTPA','TP','192010160','192010160','Prayogi Sastra Adiraja','X','R1','1','192010160','192010160','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('563','XTPA','TP','192010161','192010161','Rendi Ardiansyah','X','R1','1','192010161','192010161','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('564','XTPA','TP','192010162','192010162','Rendi Wijaya Kusuma','X','R1','1','192010162','192010162','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('565','XTPA','TP','192010163','192010163','Rio Agustian','X','R1','1','192010163','192010163','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('566','XTPA','TP','192010164','192010164','Rizki Ramadhan','X','R1','1','192010164','192010164','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('567','XTPA','TP','192010165','192010165','Rohmatullah','X','R1','1','192010165','192010165','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('568','XTPA','TP','192010166','192010166','Ryan Restiawan','X','R1','1','192010166','192010166','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('569','XTPA','TP','192010167','192010167','Septian','X','R1','1','192010167','192010167','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('570','XTPA','TP','192010168','192010168','Suhendra','X','R1','1','192010168','192010168','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('571','XTPA','TP','192010169','192010169','Wahyu Winata','X','R1','1','192010169','192010169','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('572','XTPA','TP','192010170','192010170','Warjaya','X','R1','1','192010170','192010170','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('573','XTPB','TP','192010171','192010171','Abdul Yogi','X','R1','1','192010171','192010171','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('574','XTPB','TP','192010172','192010172','Ahmad Rifa\'i','X','R1','1','192010172','192010172','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('575','XTPB','TP','192010173','192010173','Akmalludin Alfarizi','X','R1','1','192010173','192010173','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('576','XTPB','TP','192010174','192010174','Alfin Syahyana','X','R1','1','192010174','192010174','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('577','XTPB','TP','192010175','192010175','Alvin Candra Dita','X','R1','1','192010175','192010175','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('578','XTPB','TP','192010176','192010176','Angga','X','R1','1','192010176','192010176','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('579','XTPB','TP','192010177','192010177','Ardiyansyah','X','R1','1','192010177','192010177','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('580','XTPB','TP','192010178','192010178','Dimas Andrean','X','R1','1','192010178','192010178','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('581','XTPB','TP','192010179','192010179','Padli','X','R1','1','192010179','192010179','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('582','XTPB','TP','192010180','192010180','Farid Ardiansyah','X','R1','1','192010180','192010180','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('583','XTPB','TP','192010181','192010181','Herdi Hidayat','X','R1','1','192010181','192010181','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('584','XTPB','TP','192010182','192010182','Irfan Maulana','X','R1','1','192010182','192010182','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('585','XTPB','TP','192010183','192010183','Ivan Setiawan','X','R1','1','192010183','192010183','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('586','XTPB','TP','192010184','192010184','Kandi Hermawan','X','R1','1','192010184','192010184','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('587','XTPB','TP','192010185','192010185','Miftah Khoirudin Nur','X','R1','1','192010185','192010185','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('588','XTPB','TP','192010186','192010186','Muhammad Farhan Al Koya','X','R1','1','192010186','192010186','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('589','XTPB','TP','192010188','192010188','Muhammad Arendi','X','R1','1','192010188','192010188','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('590','XTPB','TP','192010189','192010189','Muhammad Rizki Agustian','X','R1','1','192010189','192010189','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('591','XTPB','TP','192010190','192010190','Muharama','X','R1','1','192010190','192010190','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('592','XTPB','TP','192010191','192010191','Nur Fajar','X','R1','1','192010191','192010191','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('593','XTPB','TP','192010192','192010192','Rahmat Hidayat','X','R1','1','192010192','192010192','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('594','XTPB','TP','192010193','192010193','Rendi Triyanto','X','R1','1','192010193','192010193','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('595','XTPB','TP','192010194','192010194','Rian Wiranto','X','R1','1','192010194','192010194','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('596','XTPB','TP','192010195','192010195','Rio Kusnadi','X','R1','1','192010195','192010195','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('597','XTPB','TP','192010196','192010196','Rizki Wahyudi ','X','R1','1','192010196','192010196','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('598','XTPB','TP','192010197','192010197','Roy Hanavi','X','R1','1','192010197','192010197','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('599','XTPB','TP','192010198','192010198','Sandi Irawan','X','R1','1','192010198','192010198','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('600','XTPB','TP','192010199','192010199','Subandi','X','R1','1','192010199','192010199','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('601','XTPB','TP','192010200','192010200','Tasman Bagas','X','R1','1','192010200','192010200','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('602','XTPB','TP','192010201','192010201','Yaris Riyaldi','X','R1','1','192010201','192010201','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('603','XTPC','TP','192010202','192010202','Ado Saputra','X','R1','1','192010202','192010202','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('604','XTPC','TP','192010203','192010203','Ahmad Zarkasih','X','R1','1','192010203','192010203','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('605','XTPC','TP','192010204','192010204','Aldi','X','R1','1','192010204','192010204','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('606','XTPC','TP','192010205','192010205','Alpian','X','R1','1','192010205','192010205','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('607','XTPC','TP','192010206','192010206','Andi Juandi','X','R1','1','192010206','192010206','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('608','XTPC','TP','192010207','192010207','Anjas Saputra','X','R1','1','192010207','192010207','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('609','XTPC','TP','192010208','192010208','Bayu Samudra','X','R1','1','192010208','192010208','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('610','XTPC','TP','192010209','192010209','Eky Maulana Prayoga','X','R1','1','192010209','192010209','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('611','XTPC','TP','192010210','192010210','Fahri Alpharizi','X','R1','1','192010210','192010210','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('612','XTPC','TP','192010211','192010211','Ferdiansyah','X','R1','1','192010211','192010211','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('613','XTPC','TP','192010212','192010212','Ikbal','X','R1','1','192010212','192010212','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('614','XTPC','TP','192010213','192010213','Ishak Tabah Maulana','X','R1','1','192010213','192010213','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('615','XTPC','TP','192010214','192010214','Jamar Maulana','X','R1','1','192010214','192010214','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('616','XTPC','TP','192010215','192010215','Khoirul Fadillah','X','R1','1','192010215','192010215','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('617','XTPC','TP','192010216','192010216','Miftahul Khoiri Rifki','X','R1','1','192010216','192010216','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('618','XTPC','TP','192010217','192010217','Muhamad Ikbal Maulana','X','R1','1','192010217','192010217','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('619','XTPC','TP','192010218','192010218','Muhamad Wandi Alfirdaus','X','R1','1','192010218','192010218','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('620','XTPC','TP','192010219','192010219','Muhammad Riski Pauji','X','R1','1','192010219','192010219','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('621','XTPC','TP','192010220','192010220','Muhamad Surya Aji','X','R1','1','192010220','192010220','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('622','XTPC','TP','192010222','192010222','Rendi Wijaya','X','R1','1','192010222','192010222','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('623','XTPC','TP','192010223','192010223','Ridwan','X','R1','1','192010223','192010223','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('624','XTPC','TP','192010224','192010224','Rizki Mahesah','X','R1','1','192010224','192010224','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('625','XTPC','TP','192010225','192010225','Rizky Abiyanto','X','R1','1','192010225','192010225','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('626','XTPC','TP','192010226','192010226','Ruli Agustina','X','R1','1','192010226','192010226','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('627','XTPC','TP','192010227','192010227','Satria Rama Hermawan','X','R1','1','192010227','192010227','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('628','XTPC','TP','192010228','192010228','Subandi','X','R1','1','192010228','192010228','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('629','XTPC','TP','192010229','192010229','Ubay Ardiansyah','X','R1','1','192010229','192010229','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('630','XTPC','TP','192010230','192010230','Warfan Hidayat','X','R1','1','192010230','192010230','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');
INSERT INTO `siswa` VALUES ('631','XTPC','TP','192010331','192010331','Candra Wijaya','X','R1','1','192010331','192010331','','','','0000-00-00','','','','','','','','','0','','','','','0','','','0','','','','','','0','','','','0','','0','','','','0','');

/*---------------------------------------------------------------
  TABLE: `soal`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `soal`;
CREATE TABLE `soal` (
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
  `file` text,
  `file1` text,
  `fileA` text,
  `fileB` text,
  `fileC` text,
  `fileD` text,
  `fileE` text,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
INSERT INTO `soal` VALUES   ('1','1','1','Pengambilan endapan partikel padat dengan jalan melewatkan air limbah ke dalam lapisan yang berpori, disebut...','1','Activated sludge','Setting','Trickling filter','Flotation','Filtration','E','','','','','','','');
INSERT INTO `soal` VALUES ('2','1','2','Larutan gula 3% (m) dengan laju alir 1000 kg/jam akan dipekatkan menjadi 25% (m) didalam evaporator. Air yang harus diuapkan...','1','120 kg/jam','200 kg/jam','420 kg/jam','880 kg/jam','920 kg/jam','D','','','','','','','');
INSERT INTO `soal` VALUES ('3','1','3','Campuran cairan benzene &ndash; toluene didistilasi dalam menara fraksionasi, dimana umpan benzene-toluena yang terdistilasi memberikan komposisi distillate, xD = 0,95 dan komposisi bottom, xw = 0,10. Berdasarkan grafik untuk penentuan perbandingan refluks minimum ( minimum reflux ratio), Rm, diperoleh x&rsquo;=0,45 dan y&rsquo; =0,070. Besarnya perbandingan refluks minimum adalah&hellip;','1','0,50','0,80','1,25','1,80','2,80','A','','','','','','','');
INSERT INTO `soal` VALUES ('4','1','4','Jenis filter yang digunakan untuk filtrasi jernih (Clarifyng Filtration), terutama untuk penanganan awal air minum atau untuk pembuatan air keperluan pabrik digunakan...','1','Filter spiral','Filter pasir','Filter pelat','Filter hisap','Filter putar','B','','','','','','','');
INSERT INTO `soal` VALUES ('5','1','5','Parameter limbah cair yang sangat berbahaya dinyatakan oleh...','1','DO dan BOD besar','DO besar dan COD kecil','DO dan BOD kecil','DO besar dan BOD kecil','BOD dan COD kecil','E','','','','','','','');
INSERT INTO `soal` VALUES ('6','1','6','Reaksi yang terdapat pada operasi absorpsi adalah...','1','Zn + HCI&nbsp; --&gt;&nbsp; ZnCl<sub>2</sub> + H<sub>2</sub>','Zn + CuSO<sub>4</sub>&nbsp; --&gt;&nbsp; &nbsp;ZnSO<sub>4 </sub>+ Cu','RSO<sub>3</sub>H + CaCl<sub>2</sub> <sub>&nbsp;--&gt;&nbsp; &nbsp;</sub>(RSO<sub>3</sub>)<sub>2</sub>Ca + HCl','NaOH +HCI --&gt; NaCl + H<sub>2</sub>O','CaC<sub>2</sub> + H<sub>2</sub>O&nbsp; --&gt; C<sub>2</sub>H<sub>2</sub> + Ca(OH)<sub>2</sub>','C','','','','','','','');
INSERT INTO `soal` VALUES ('7','1','7','Aplikasi operasi distilasi banyak dipakai di industri...','1','Farmasi','Minyak bumi','Minuman','Minyak hewani','Minyak nabati','B','','','','','','','');
INSERT INTO `soal` VALUES ('8','1','8','Gas karbondioksida yang terdapat di udara dengan kadar 50% diabsorpsi dengan air sehingga kadarnya menjadi 30%. jika laju alir udara 5L/dt dan laju alir air bebas Ca. 10% O<sub>2</sub>10L/dt, maka kadar CO<sub>2</sub>di dalam air adalah...','1','12,5%','15,5%','25%','30%','','B','','','','','','','');
INSERT INTO `soal` VALUES ('9','1','9','Larutan gula hasil proses evaporasi dapat ditentukan berat jenisnya dalam derajat...','1','API','Brix','Baume','Twaddel','Mesh','B','','','','','','','');
INSERT INTO `soal` VALUES ('10','1','10','Dibawah ini senyawa yang dapat menyublim adalah...','1','Natrium clorida','Asam clorida','Amonium klorida','Kalium klorida','Lithium klorida','C','','','','','','','');
INSERT INTO `soal` VALUES ('11','1','11','Campuran yang terdiri dari 30% (m) benzana dan 70% (m) toluena didistilasi secara kontinyu sehingga diproduk atas mengandung 80% (m) benzena, sedangkan di produk bawah 5% (m). Jika laju alir umpan 1 ton/jam, maka laju alir produk atas..','1','222,4 kg/jam','333,4 kg/jam','411,8 kg/jam','588,2 kg/jam','666,6 kg/jam','B','','','','','','','');
INSERT INTO `soal` VALUES ('12','1','12','Dua zat yang dicampur cenderung memilki sifat tidak saling larut, maka pada proses pencampuran harus...','1','Dilakukan secara laminar','Ditambahkan asam kuat','Ditambah basa kuat','Dilengkapi dengan baffle/perintang aliran','Ditambahkan zat pengemulasi','E','','','','','','','');
INSERT INTO `soal` VALUES ('13','1','13','Jenis alat pencampur seperti gambar di bawah cocok untuk...','1','Pencampuran liquid-gas','Pencampuran gas-gas','Pencampuran solid-gas','Pencampuran solid-solid','Pencampuran liquid-solid','E','DASAR_TEKNIK_KIMIA_K13_13.jpg','','','','','','');
INSERT INTO `soal` VALUES ('14','1','14','Pada suatu industri gula pasir, pengujian kualitas produk gula yang dihasilkan diantaranya adalah penetuan kadar sakarosa yang merupakan senyawa dengan optis aktif dan digunakan alat...','1','Water content apparatus','High perfomance liquid chromatography','Refractomer','Water distillation apparatus','Polarimeter','E','','','','','','','');
INSERT INTO `soal` VALUES ('15','1','15','Jahe sebanyak 10 kg diekstraksi dengan 10 L alcohol (&rho;=0,85 g/ml), jika setelah proses ekstraksi diperoleh 10,5 L alcohol (&rho;=0,90 g/ml),maka kadar ekstrak didalam jahe adalah&hellip;','1','9,5 %','12,5 %','14,5 %','17,5 %','20,5 %','A','','','','','','','');
INSERT INTO `soal` VALUES ('16','1','16','Tuti akan membuat 100mL larutan alkohol 5% dengan mencampur larutan alkohol 2% dan 7%. Berapakah dari larutan alkohol 2% dan 7% yang digunakan?','1','50mL dan 50mL','40mL dan 60mL','30mL dan 70mL','45mL dan 55mL','20mL dan 80mL','B','','','','','','','');
INSERT INTO `soal` VALUES ('17','1','17','Jenis alat pengaduk seperti gambar dibawah ini adalah...','1','Turbin','dayung','Propeller','Globe impeller','Padlle','C','DASAR_TEKNIK_KIMIA_K13_17.jpg','','','','','','');
INSERT INTO `soal` VALUES ('18','1','18','Kebakaran kelas B menurut nasional national free protection asosiation (NFPA) antara lain kebakaran yang dapat diakibatkan oleh terbakarnya...','1','Plastik,kertas,dan karet','Etanol,dietil eter,dan N-heksana','Hot plate,etanol,sodium','Kertas,etanol,dan sodium','Magnesium, heating &ndash; mantle, plastik','B','','','','','','','');
INSERT INTO `soal` VALUES ('19','1','19','Pada proses pengomposan, laju metabolisme yang menetukan laju biodegradasi limbah/sampah tergantung pada faktor-faktor rekayasa antara lain penerima elektron (electron aseptor) yang dalam respirasi anaerobik diperlukan...','1','Oksigen','Ion karbonat','Ion nitrat','Metana','Asam sulfida','D','','','','','','','');
INSERT INTO `soal` VALUES ('20','1','20','Jika diindustri kimia terjadi kebakaran yang di akibatkan oleh percikan api yang berasal dari hotplate stire, maka alat pemadam kebakaran yang cocok menurut natioanl free protection asosiation (NFPA) untuk memadamkan api tersebut adalah...','1','Blanket fire','Water','Foam','Sand','Carbon dioksida','D','','','','','','','');
INSERT INTO `soal` VALUES ('21','1','21','Jenis pompa yang umum digunakan oleh suatu pabrik/industri adalah pompa&hellip;','1','Centrifugal','Rotary','Reciprocating','Torak','Plunger','A','','','','','','','');
INSERT INTO `soal` VALUES ('22','1','22','Suatu larutan dalam air mengandung 46% gliserol (Mr. = 92) pada temperature 93oC. Tekanan uap air murni pada 93oC adalah 597 mmHg. Jika Mr. Air dianggap = 18, tekanan uap gliserol diabaikan, dan larutan dianggap dapat mengikuti hukum Roult, maka besarnya tekanan uap air pada keadaan kesetimbangan adalah&hellip; mmHg.','1','512','515','521','551','567','A','','','','','','','');
INSERT INTO `soal` VALUES ('23','1','23','Di industri, soda abu dapat di buat dengan proses Solvay, yang menggunakan bahan baku garam dapur, batu kapur dan batubara atau kokas.penetuan kadar soda abu yang dihasilkan dilakukan dengan menggunakan larutan standar asam, dan dikenal dengan metoda&hellip;','1','alkali metri','argentometri','asidimetri','yodometri','oksidimetri','C','','','','','','','');
INSERT INTO `soal` VALUES ('24','1','24','Operasi distilasi dapat dilakukan untuk memperoleh kembali aseton dari aliran limbah cair (air). Umpan mengandung aseton sebanyak 40% massa. Komponen produk aseton yang diinginkan memiliki kemurnian minimal 90% massa dan jumlah aseton yang terikut pada komponen produk bawah 10%. Umpan berada pada temperature 20<sup>o</sup>C. Jika laju alir umpan 100kg/jam, maka laju alir produk bawah adalah&hellip;','1','62,5 kg/jam','70,5 kg/jam','75,5 kg/jam','87,5 kg/jam','90,5 kg/jam','A','','','','','','','');
INSERT INTO `soal` VALUES ('25','1','25','16. Sebuah pipa kaca mempunyai diameter luas 6 cm dan diameter dalam 3 cm. Dipakai untuk megalirkan fluida pada suhu 400 K dan diharapkan bagian luar pipa 300 K. Hitung panas yang hilang melewati pipa jika panjang pipa 0,693 m. (Kkaca = 0,35 W/mK dan In 2= 0,693) adalah&hellip;','1','110 W','220 W','330 W','440 W','550 W','B','','','','','','','');
INSERT INTO `soal` VALUES ('26','1','26','Sebuah dinding tebalnya 5 cm berukuran 100 cm2 dipakai pada suhu 100 &ndash; 200 K. dinding terbuat dari kaolin dengan harga k=0,25 W/mK. Panas yang melewati dinding adalah &hellip;','1','0,005','0,05','0,5','5','500','D','','','','','','','');
INSERT INTO `soal` VALUES ('27','1','27','Pada suatu proses netralisasi ,untuk menetralkan 50 ml NaOH 0,1 M diperlukan asam sulfat 0,1 M sebanyak&hellip;','1','0,5 ml','5 ml','50 ml','100 ml','200 ml','D','','','','','','','');
INSERT INTO `soal` VALUES ('28','1','28','Suatu fluida cair mengalir dalam sebuah pipa berdiameter dalam 20 cm. Kecepatan aliran fluida tersebut 1 m/s. Debit aliran fluida dalam pipa tersebut adalah &hellip; ( m3/jam ). (&pi; = 3,14 )','1','0,0314','0,314','1,884','314','18.84','A','','','','','','','');
INSERT INTO `soal` VALUES ('29','1','29','Steam dengan suhu 250oC masuk evaporator digunakan untuk menguapkan suatu bahan sehingga menjadi pekat. Bila suhu steam keluar dari evaporator adalah 150oC maka penurunan suhu steam bila dinyatakan dalam derajat Kelvin adalah &hellip;','1','523 K','473 K','423 K','373 K','273 K','D','','','','','','','');
INSERT INTO `soal` VALUES ('30','1','30','Pada ekstraksi kemiri dengan ekstraksi soxchlet dengan pelarut N Heksana ternyata mi nyak kemiri yang didapat mempunyai densitas 0,7625 g/ml, yang artinya lebih kecil daripada densitas minyak kemiri SNI 01-4462-1998, yaitu 0,9240 pada temperature 30-70<sup>o</sup> hal ini belum memenuhi standar nasional , penyebab hal tersebut diperkirakan &hellip;','1','Suhu pemanas terlalu rendah','Terlalu banyak penggunaan pelarut','Pemanasan terlalu lama','Suhu air pendingin terlalu rendah','Masih bercampur dengan pelarut','E','','','','','','','');
INSERT INTO `soal` VALUES ('31','1','31','Perhatikan beberapa jenis mikroba berikut!<br />1) Rhizopus oryzae<br />2) Saccharomyces cerevisiae<br />3) Acetobacter xylinum<br />4) Aspergillus oryzae<br />5) Lactobacillus casei<br />Jenis jamur yang dapat dimanfaatkan dalam proses industri adalah....','1','1, 2, 3','1, 2, 4','1, 3, 5','2, 3, 5','3, 4, 5','D','','','','','','','');
INSERT INTO `soal` VALUES ('32','1','32','Suatu senyawa direaksikan dengan beberapa pereaksi dan diperoleh data sebagai berikut :<br />1) direaksikan dengan larutan Fehling menghasilkan endapan merah bata,<br />2) direaksikan dengan larutan Tollens menghasilkan endapan berwarna perak,<br />3) direaksikan dengan larutan kalium dikromat menghasilkan senyawa bersifat asam,<br />Berdasarkan data hasil analisis, senyawa karbon tersebut mengandung gugus fungsi &hellip;.','1','aldehid','alkohol','keton','ester','eter','A','','','','','','','');
INSERT INTO `soal` VALUES ('33','1','33','Berikut adalah jumlah koloni bakteri pada pemeriksaan suatu sampel air minum :<br />\n<table>\n<tbody>\n<tr>\n<td width=\"110\">\n<p>Pengenceran</p>\n</td>\n<td width=\"106\">\n<p>Cawan I</p>\n</td>\n<td width=\"95\">\n<p>Cawan II</p>\n</td>\n</tr>\n<tr>\n<td width=\"110\">\n<p>10<sup>-2</sup></p>\n</td>\n<td width=\"106\">\n<p>220</p>\n</td>\n<td width=\"95\">\n<p>300</p>\n</td>\n</tr>\n<tr>\n<td width=\"110\">\n<p>10<sup>-3</sup></p>\n</td>\n<td width=\"106\">\n<p>20</p>\n</td>\n<td width=\"95\">\n<p>30</p>\n</td>\n</tr>\n</tbody>\n</table>\n<p>Besarnya angka lempeng total untuk sampel tersebut adalah...cfu/mL</p>','1','250 x 10<sup>2</sup>','255 x 10<sup>2</sup>','260 x 10<sup>2</sup>','500 x 10<sup>2</sup>','520 x 10<sup>2</sup>','C','','','','','','','');
INSERT INTO `soal` VALUES ('34','1','34','Perhatikan beberapa teknik sterilisasi berikut!<br />1) pemijaran <br />2) udara panas<br />3) tyndalisasi<br />4) penyaringan/filtrasi<br />5) uap panas bertekanan<br />Teknik sterilisasi yang tepat digunakan untuk produk susu, enzim dan antibiotik agar tidak rusak adalah....','1','1 dan 2','1 dan 3','3 dan 4','3 dan 5','2 dan 5','C','','','','','','','');
INSERT INTO `soal` VALUES ('35','1','35','Berikut merupakan beberapa persyaratan penyimpanan bahan kimia<br />1) Ruangan dingin, kering dan berventilasi<br />2) Disediakan pemadam kebakaran tipe CO2 atau dry powder<br />Syarat di atas merupakan persyaratan penyimpanan bahan kimia golongan....','1','reaktif terhadap asam','reaktif terhadap air','mudah meledak','mudah terbakar','oksidator','B','','','','','','','');
INSERT INTO `soal` VALUES ('36','1','36','Penanganan yang harus dilakukan jika seseorang memecahkan termometer raksa ketika sedang bekerja di laboratorium adalah....','1','membersihkan dengan lap dan air bersih','membersihkan dengan lap dan asam cuka','menutup pecahan termometer menggunakan serbuk Na2CO3','menutup pecahan termometer menggunakan tepung sulfur','membersihkan dengan tisue atau lap kering kemudian membakarnya','D','','','','','','','');
INSERT INTO `soal` VALUES ('37','1','37','Sebanyak 1 mL sampel asam cuka komersial dengan massa jenis 1,05 gr/mL diambil kemudian diencerkan hingga volume 25 mL. Selanjutnya sampel hasil pengenceran dititrasi dan membutuhkan 30,0 mL larutan NaOH 0,10 M untuk mencapai titik akhir titrasi. Kadar asam asetat (Mr: 60) yang terdapat dalam sampel tersebut adalah... %.','1','0,58','1,71','5,80','15,80','17,10','E','','','','','','','');
INSERT INTO `soal` VALUES ('38','1','38','Identifikasi kation golongan I dalam suatu sampel limbah memberikan data sebagai berikut:<br />\n<ul>\n<li>Penambahan HCl menghasilkan endapan berwarna putih</li>\n<li>Penambahan K2CrO4 pada filtrat air panas hasil penyaringan menghasilkan endapan berwarna kuning</li>\n<li>Penambahan amonia pada residu hasil penyaringan melarutkan seluruh endapan</li>\n<li>Penambahan HNO3 pada filtrat setelah penambahan amonia menghasilkan endapan berwarna putih</li>\n</ul>\n<br />Berdasarkan data analisis tersebut, kation golongan I yang terdapat dalam sampel adalah....','1','Ag+','Hg+','Pb2+','Ag+ dan Pb2+','Ag+ dan Hg+','D','','','','','','','');
INSERT INTO `soal` VALUES ('39','1','39','Massa asam oksalat dihidrat yang harus ditimbang untuk membuat larutan asam oksalat 0,2 M sebanyak 500 mL adalah ... gr. (Diketahui Ar C:12; Ar O:16; Ar H:1)','1','0,63','1,26','6,30','9,00','12,60','E','','','','','','','');
INSERT INTO `soal` VALUES ('40','1','40','Tahapan yang dilakukan untuk mengendapkan sulfat dengan metode gravimetri secara berurutan dan benar adalah ....<br />Berikut ini merupakan langkah kerja dalam analisis gravimetri:<br />\n<ol>\n<li>Menambahkan larutan pengasam asam klorida</li>\n<li>Mencuci endapan menggunakan akuades panas</li>\n<li>Mencuci endapan menggunakan asam nitrat encer</li>\n<li>Menyaring endapan, mengeringkan, memijarkan dan menimbang hingga bobot tetap</li>\n<li>Menambahkan larutan BaCl2</li>\n<li>Menambahkan larutan NaOH</li>\n<li>Menimbang sampel</li>\n</ol>','1','7-1-5-2-4','7-1-5-3-4','7-1-6-2-4','7-1-6-3-4','7-1-6-5-4','D','','','','','','','');
INSERT INTO `soal` VALUES ('41','3','1','<p>Soal no 1 ..</p>\r\n<p>a. aaaaa</p>\r\n<p>b. bbbbb</p>\r\n<p>c. cccccc</p>\r\n<p>d. ddddd</p>\r\n<p>e. eeeee</p>','1','','','','','','A','','','','','','','');
INSERT INTO `soal` VALUES ('42','3','2','<p>Soal no 2 ..</p>\r\n<p>a. aaaaa</p>\r\n<p>b. bbbbb</p>\r\n<p>c. cccccc</p>\r\n<p>d. ddddd</p>\r\n<p>e. eeeee</p>','1','','','','','','A','','','','','','','');
INSERT INTO `soal` VALUES ('43','3','3','<p>Soal no 3 ..</p>\r\n<p>a. aaaaa</p>\r\n<p>b. bbbbb</p>\r\n<p>c. cccccc</p>\r\n<p>d. ddddd</p>\r\n<p>e. eeeee</p>','1','','','','','','A','','','','','','','');
INSERT INTO `soal` VALUES ('44','3','4','<p>Soal no 4 ..</p>\r\n<p>a. aaaaa</p>\r\n<p>b. bbbbb</p>\r\n<p>c. cccccc</p>\r\n<p>d. ddddd</p>\r\n<p>e. eeeee</p>','1','','','','','','A','','','','','','','');
INSERT INTO `soal` VALUES ('45','3','5','<p>Soal no 5 ..</p>\r\n<p>a. aaaaa</p>\r\n<p>b. bbbbb</p>\r\n<p>c. cccccc</p>\r\n<p>d. ddddd</p>\r\n<p>e. eeeee</p>','1','','','','','','A','','','','','','','');
INSERT INTO `soal` VALUES ('46','3','6','<p>Soal no 6 ..</p>\r\n<p>a. aaaaa</p>\r\n<p>b. bbbbb</p>\r\n<p>c. cccccc</p>\r\n<p>d. ddddd</p>\r\n<p>e. eeeee</p>','1','','','','','','B','','','','','','','');
INSERT INTO `soal` VALUES ('47','3','7','<p>Soal no 7 ..</p>\r\n<p>a. aaaaa</p>\r\n<p>b. bbbbb</p>\r\n<p>c. cccccc</p>\r\n<p>d. ddddd</p>\r\n<p>e. eeeee</p>','1','','','','','','B','','','','','','','');
INSERT INTO `soal` VALUES ('48','3','8','<p>Soal no 8 ..</p>\r\n<p>a. aaaaa</p>\r\n<p>b. bbbbb</p>\r\n<p>c. cccccc</p>\r\n<p>d. ddddd</p>\r\n<p>e. eeeee</p>','1','','','','','','B','','','','','','','');
INSERT INTO `soal` VALUES ('49','3','9','<p>Soal no 9 ..</p>\r\n<p>a. aaaaa</p>\r\n<p>b. bbbbb</p>\r\n<p>c. cccccc</p>\r\n<p>d. ddddd</p>\r\n<p>e. eeeee</p>','1','','','','','','B','','','','','','','');
INSERT INTO `soal` VALUES ('50','3','10','<p>Soal no 10 ..</p>\r\n<p>a. aaaaa</p>\r\n<p>b. bbbbb</p>\r\n<p>c. cccccc</p>\r\n<p>d. ddddd</p>\r\n<p>e. eeeee</p>','1','','','','','','B','','','','','','','');

/*---------------------------------------------------------------
  TABLE: `token`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `id_token` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(6) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `masa_berlaku` time NOT NULL,
  PRIMARY KEY (`id_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `token` VALUES   ('1','LSQFLW','2019-09-15 15:06:40','00:15:00');

/*---------------------------------------------------------------
  TABLE: `ujian`
  ---------------------------------------------------------------*/
DROP TABLE IF EXISTS `ujian`;
CREATE TABLE `ujian` (
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
INSERT INTO `ujian` VALUES   ('5','semua','52','3','PTS','AGAMA','10','0','100','5','0','10','0','20','2019-10-16 11:00:00','2019-10-16 19:00:00','11:00:00','00:00:00','semua','a:1:{i:0;s:5:\"semua\";}','1','1','0','1','1','','0');
