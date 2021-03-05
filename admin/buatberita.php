<?php
require("../config/config.default.php");
require("../config/config.function.php");
	$exec = mysql_query("truncate berita");
	$beritaQ = mysql_query("SELECT * FROM ujian group by id_mapel ");
	while($berita= mysql_fetch_array($beritaQ)) {
		$sesi = mysql_num_rows(mysql_query("SELECT * FROM siswa group by sesi "));
		$ruangq = mysql_query("SELECT * FROM ruang");
		while($ruang=mysql_fetch_array($ruangq)){
			for ($i= 1; $i <=$sesi; $i++){
				
				$exec=mysql_query("insert into berita (id_mapel,sesi,ruang)values('$berita[id_mapel]','$i','$ruang[kode_ruang]')");
			}
		}	
	}
	;
	?>
	