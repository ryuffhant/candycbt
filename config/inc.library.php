<?php


function generate_uuid() {
	return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
		mt_rand( 0, 0xffff ),
		mt_rand( 0, 0x0fff ) | 0x4000,
		mt_rand( 0, 0x3fff ) | 0x8000,
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	);

	
}
 
function NewGuid($tabel, $inisial)
{
	$s = strtoupper(md5(uniqid(rand(), true)));
	$guidText = substr($s, 16, 4) . substr($s, 16, 4) . '-' . substr($s, 20);
	return $guidText;

	echo '\''.NewGuid().'\'';
}

function NewGuid1($tabel, $inisial)
{
	$s = strtoupper(md5(uniqid(rand(), true)));
	$guidText = substr($s, 0, 8) . '-' . substr($s, 8, 4) . '-' . substr($s, 12, 4) . '-' . substr($s, 16, 4) . '-' . substr($s, 20);
	return $guidText;

}


function NewGuid2($tabel, $inisial)
{
	$s = strtoupper(md5(uniqid(rand(), true)));
	$guidText = substr($s, 0, 8) . '-' . substr($s, 8, 4) . '-' . substr($s, 12, 4) . '-' . substr($s, 16, 4) . '-' . substr($s, 20);
	return $guidText;

}


function buatKode($tabel, $inisial)
{
	$struktur = mysqli_query($koneksi, 'SELECT * FROM ' . $tabel);
	$field = ((($___mysqli_tmp = mysqli_fetch_field_direct($struktur,  0)->name) && (!is_null($___mysqli_tmp))) ? $___mysqli_tmp : false);
	$panjang = mysql_field_prtlen($struktur, 0);
	$qry = mysqli_query($koneksi, 'SELECT MAX(' . $field . ') FROM ' . $tabel);
	$row = mysqli_fetch_array($qry);

	if ($row[0] == '0000') {
		$angka = 0;
	}
	else {
		$angka = substr($row[0], strlen($inisial));
	}

	++$angka;
	$angka = strval($angka);
	$tmp = '';
	$i = 1;

	while ($i <= $panjang - strlen($inisial) - strlen($angka)) {
		$tmp = $tmp . '';
		++$i;
	}

	return $inisial . $tmp . $angka;

}


function buatKode1($tabel, $inisial)
{
	$struktur = mysqli_query($koneksi, 'SELECT * FROM ' . $tabel);
	$field = ((($___mysqli_tmp = mysqli_fetch_field_direct($struktur,  0)->name) && (!is_null($___mysqli_tmp))) ? $___mysqli_tmp : false);
	$panjang = mysql_field_prtlen($struktur, 0);
	$qry = mysqli_query($koneksi, 'SELECT MAX(' . $field . ') FROM ' . $tabel);
	$row = mysqli_fetch_array($qry);

	if ($row[0] == '0000') {
		$angka = 0;
	}
	else {
		$angka = substr($row[0], strlen($inisial));
	}

	++$angka;
	$angka = strval($angka);
	$tmp = '';
	$i = 1;

	while ($i <= $panjang - strlen($inisial) - strlen($angka)) {
		$tmp = $tmp . '';
		++$i;
	}

	return $inisial . $tmp . $angka;

}

function buatKode2($tabel, $inisial)
{
	$struktur = mysqli_query($koneksi, 'SELECT * FROM ' . $tabel);
	$field = ((($___mysqli_tmp = mysqli_fetch_field_direct($struktur,  0)->name) && (!is_null($___mysqli_tmp))) ? $___mysqli_tmp : false);
	$panjang = mysql_field_prtlen($struktur, 0);
	$qry = mysqli_query($koneksi, 'SELECT MAX(' . $field . ') FROM ' . $tabel);
	$row = mysqli_fetch_array($qry);

	if ($row[0] == '') {
		$angka = '';
	}
	else {
		$angka = substr($row[0], strlen($inisial));
	}

	++$angka;
	$angka = strval($angka);
	$tmp = '';
	$i = 1;

	while ($i <= $panjang - strlen($inisial) - strlen($angka)) {
		$tmp = $tmp . '';
		++$i;
	}

	return $inisial . $tmp . $angka;
}




function InggrisTgl($tanggal)
{
	$tgl = substr($tanggal, 0, 2);
	$bln = substr($tanggal, 3, 2);
	$thn = substr($tanggal, 6, 4);
	$awal = $thn . '-' . $bln . '-' . $tgl;
	return $awal;
}

function bulannya($bulan)
{
	switch ($bulan) {
	case '01':
		$bulan = 'Januari';
		break;

	case '02':
		$bulan = 'Februari';
		break;

	case '03':
		$bulan = 'Maret';
		break;

	case '04':
		$bulan = 'April';
		break;

	case '05':
		$bulan = 'Mei';
		break;

	case '06':
		$bulan = 'Juni';
		break;

	case '07':
		$bulan = 'Juli';
		break;

	case '08':
		$bulan = 'Agustus';
		break;

	case '09':
		$bulan = 'September';
		break;

	case '10':
		$bulan = 'Oktober';
		break;

	case '11':
		$bulan = 'November';
		break;

	case '12':
		$bulan = 'Desember';
		break;
	}
}

function IndonesiaTgl($tanggal)
{
	$tgl = substr($tanggal, 8, 2);
	$bln = substr($tanggal, 5, 2);
	$thn = substr($tanggal, 0, 4);
	$awal = $tgl . '-' . $bln . '-' . $thn;
	return $awal;
}

function IndonesiaTgl1($tanggal)
{
	$tgl = substr($tanggal, 8, 2);
	$bln = substr($tanggal, 5, 2);
	$bulan1 = bulannya($bln);
	$thn = substr($tanggal, 0, 4);
	$awal = $tgl . ' ' . $bulan1 . ' ' . $thn;
	return $awal;
}

function tgling($tanggal)
{
	$tgl = substr($tanggal, 8, 2);
	$bln = substr($tanggal, 5, 2);
	$thn = substr($tanggal, 0, 4);
	$awal = $bln . '/' . $tgl . '/' . $thn;
	return $awal;
}

function IngTgl($tanggal)
{
	$bln = substr($tanggal, 0, 2);
	$tgl = substr($tanggal, 3, 2);
	$thn = substr($tanggal, 6, 4);
	$awal = $thn . '-' . $bln . '-' . $tgl;
	return $awal;
}

function format_angka($angka)
{
	$hasil = number_format($angka, 0, ',', '.');
	return $hasil;
}

function form_tanggal($nama, $value = '')
{
	echo ' <input type=\'text\' name=\'' . $nama . '\' id=\'' . $nama . '\' size=\'9\' maxlength=\'20\' value=\'' . $value . '\'/>&nbsp;' . "\n\t" . '<img src=\'images/calendar-add-icon.png\' align=\'top\' style=\'cursor:pointer; margin-top:7px;\' alt=\'kalender\'onclick="displayCalendar(document.getElementById(\'' . $nama . '\'),\'dd-mm-yyyy\',this)"/>' . "\t\t\t\n\t";
}

function kodeahklak($kd)
{
	switch ($kd) {
	case 'A':
		$kd = 'Kedisiplinan';
		break;

	case 'B':
		$kd = 'Kebersihan';
		break;

	case 'C':
		$kd = 'Kerjasama';
		break;

	case 'D':
		$kd = 'Tanggungjawab';
		break;

	case 'E':
		$kd = 'Kesehatan';
		break;

	case 'F':
		$kd = 'Sopan santun';
		break;

	case 'G':
		$kd = 'Percaya diri';
		break;

	case 'H':
		$kd = 'Hubungan sosial';
		break;

	case 'I':
		$kd = 'Kejujuran';
		break;

	case 'J':
		$kd = 'Pelaksanaan ibadah ritual';
		break;
	}
}

function jurusanpanjang($kd)
{
	include '../library/inc.connection.php';
	$q = mysqli_query($koneksi, 'SELECT * FROM tabel_jurusan WHERE jurusan_id =\'' . $kd . '\'');
	$row = mysqli_fetch_assoc($q);
	$Rows = mysqli_num_rows($q);
	$kd = $row['nama_jurusan_sp'];

	if ($Rows < 1) {
		$kd = '-';
	}

	return $kd;
}

function jurusanpendek($nilai)
{
	include '../library/inc.connection.php';
	$q = mysqli_query($koneksi, 'SELECT * FROM tabel_jurusan WHERE jurusan_id =\'' . $kd . '\'');
	$row = mysqli_fetch_assoc($q);
	$Rows = mysqli_num_rows($q);
	$kd = $row['nama_jurusan_sp'];

	if ($Rows < 1) {
		$kd = '-';
	}

	return $kd;
}

function namakurikulum($kd)
{
	include '../library/inc.connection.php';
	$q = mysqli_query($koneksi, 'SELECT * FROM tabel_kurikulum WHERE kurikulum_id =\'' . $kd . '\'');
	$row = mysqli_fetch_assoc($q);
	$Rows = mysqli_num_rows($q);
	$kd = $row['nama_kurikulum'];

	if ($Rows < 1) {
		$kd = '-';
	}

	return $kd;
}


?>
