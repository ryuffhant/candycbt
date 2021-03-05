<?php

require("../config/config.default.php");
require("../config/config.function.php");

$exec = mysqli_query($koneksi, "TRUNCATE berita");
$beritaQ = mysqli_query($koneksi, "SELECT * FROM ujian");
while ($berita = mysqli_fetch_array($beritaQ)) {
	$sesi = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa GROUP BY sesi"));
	$ruangq = mysqli_query($koneksi, "SELECT * FROM ruang");
	while ($ruang = mysqli_fetch_array($ruangq)) {
		for ($i = 1; $i <= $sesi; $i++) {
			$exec = mysqli_query($koneksi, "INSERT INTO berita (id_mapel,sesi,ruang,jenis)VALUES('$berita[id_mapel]','$i','$ruang[kode_ruang]','$berita[kode_ujian]')");
		}
	}
}
