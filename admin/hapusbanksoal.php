<?php

require("../config/config.default.php");
require("../config/config.function.php");
	$kode=$_POST['kode'];
	
		$exec = mysql_query("DELETE a.*, b.* FROM mapel a JOIN soal b ON a.id_mapel = b.id_mapel WHERE a.id_mapel in (".$kode."')");
		$exec = mysql_query("DELETE FROM soal WHERE id_mapel in (".$kode.")");
		$exec = mysql_query("DELETE FROM mapel  WHERE id_mapel in (".$kode.")");
	
	if($exec){
		echo 1;
	}
	else{
		echo 0;
	}


	?>
	