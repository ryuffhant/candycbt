<?php
require("../config/config.default.php");
require("../config/config.function.php");
require("../config/functions.crud.php");
$idnilai = $_POST['id'];
$nilai = fetch($koneksi, 'nilai', array('id_nilai' => $idnilai));
$idm = $nilai['id_mapel'];
$ids = $nilai['id_siswa'];
$idu = $nilai['kode_ujian'];
$iduj = $nilai['id_ujian'];
$where = array(
	'id_mapel' => $idm,
	'id_siswa' => $ids,
	'kode_ujian' => $idu
);
$where2 = array(
	'id_mapel' => $idm,
	'id_siswa' => $ids,
	'id_ujian' => $iduj
);
$benar = $salah = 0;
$mapel = fetch($koneksi, 'mapel', array('id_mapel' => $idm));
$siswa = fetch($koneksi, 'siswa', array('id_siswa' => $ids));
$ceksoal = select($koneksi, 'soal', array('id_mapel' => $idm, 'jenis' => 1));
$ceksoalesai = select($koneksi, 'soal', array('id_mapel' => $idm, 'jenis' => 2));
$arrayjawab = array();
$arrayjawabesai = array();
foreach ($ceksoalesai as $getsoalesai) {
	$w2 = array(
		'id_siswa' => $ids,
		'id_mapel' => $idm,
		'id_soal' => $getsoalesai['id_soal'],
		'jenis' => 2
	);
	$getjwb2 = fetch($koneksi, 'jawaban', $w2);
	$arrayjawabesai[$getjwb2['id_soal']] = $getjwb2['esai'];
}
foreach ($ceksoal as $getsoal) {
	$w = array(
		'id_siswa' => $ids,
		'id_mapel' => $idm,
		'id_soal' => $getsoal['id_soal'],
		'jenis' => 1
	);

	$cekjwb = rowcount($koneksi, 'jawaban', $w);
	if ($cekjwb <> 0) {
		$getjwb = fetch($koneksi, 'jawaban', $w);
		$arrayjawab[$getjwb['id_soal']] = $getjwb['jawaban'];
		($getjwb['jawaban'] == $getsoal['jawaban']) ? $benar++ : $salah++;
	} else {
		$salah++;
	}
}
$bagi = $mapel['jml_soal'] / 100;
$skor = $benar / $bagi;
$data = array(
	'ujian_selesai' => $datetime,
	'jml_benar' => $benar,
	'jml_salah' => $salah,
	'skor' => $skor,
	'total' => $skor,
	'online' => 0,
	'jawaban' => serialize($arrayjawab),
	'jawaban_esai' => serialize($arrayjawabesai)
);
update($koneksi, 'nilai', $data, $where);
echo mysqli_error($koneksi);
delete($koneksi, 'jawaban', $where2);
//delete($koneksi, 'pengacakopsi', $where2);
