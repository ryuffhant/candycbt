<?php
require("../config/config.default.php");
require("../config/config.function.php");
$idu = $_POST['id'];
$mapelQ = mysql_query("SELECT * from jawaban where id_ujian='$idu' ");

while ($jawab = mysql_fetch_array($mapelQ)) {
	$exec = mysql_query("insert into hasil_jawaban (id_siswa,id_mapel,id_soal,jawaban,jenis,esai,nilai_esai,ragu,id_ujian)values('$jawab[id_siswa]','$jawab[id_mapel]','$jawab[id_soal]','$jawab[jawaban]','$jawab[jenis]','$jawab[esai]','$jawab[nilai_esai]','$jawab[ragu]','$jawab[id_ujian]')");
}
$exec = mysql_query("delete from jawaban where id_ujian='$idu' ");
