<?php
require("../config/config.default.php");
	require("../config/config.function.php");
	$exec = mysql_query("UPDATE setting set header_kartu='$_POST[jawab]' where id_setting='1'");
	?>
	