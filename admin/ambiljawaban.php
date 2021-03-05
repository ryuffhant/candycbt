<?php
require("../config/config.default.php");
require("../config/config.function.php");
$idu = $_POST['id'];
$mapelQ = mysqli_query($koneksi, "SELECT * from jawaban WHERE id_ujian='$idu' ");

while ($jawab = mysqli_fetch_array($mapelQ)) {
	$exec = mysqli_query($koneksi, "INSERT INTO hasil_jawaban (id_siswa,id_mapel,id_soal,jawaban,jenis,esai,nilai_esai,ragu,id_ujian)VALUES('$jawab[id_siswa]','$jawab[id_mapel]','$jawab[id_soal]','$jawab[jawaban]','$jawab[jenis]','$jawab[esai]','$jawab[nilai_esai]','$jawab[ragu]','$jawab[id_ujian]')");
}
$exec = mysqli_query($koneksi, "DELETE FROM jawaban WHERE id_ujian='$idu'");
