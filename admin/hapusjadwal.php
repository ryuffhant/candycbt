<?php

require("../config/config.default.php");
require("../config/config.function.php");
	$kode=$_POST['kode'];
	
		$exec = mysql_query("DELETE FROM ujian WHERE id_ujian in (".$kode.")");
	
	if($exec){
		echo 1;
	}
	else{
		echo 0;
	}


	?>
	