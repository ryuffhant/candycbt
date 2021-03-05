<?php
	require("../config/config.default.php");
	require("../config/dis.php");
	session_destroy();
	header('location:index.php');
?>