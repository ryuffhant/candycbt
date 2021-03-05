<?php
require("../config/config.default.php");
require("../config/config.function.php");
	$idmapel=$_POST['id'];
	$mapelQ = mysql_query("SELECT * from jawaban where id_mapel='$idmapel' ");
	
	while($jawab=mysql_fetch_array($mapelQ)){
		$exec=mysql_query("insert into hasil_jawaban (id_siswa,id_mapel,id_soal,jawaban,jenis,esai,nilai_esai,ragu)values('$jawab[id_siswa]','$jawab[id_mapel]','$jawab[id_soal]','$jawab[jawaban]','$jawab[jenis]','$jawab[esai]','$jawab[nilai_esai]','$jawab[ragu]')");
										  
	}
	$exec=mysql_query("delete from jawaban where id_mapel='$idmapel' ");
	?>
	