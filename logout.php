<?php
	require("config/config.default.php");
	require("config/dis.php");
	(isset($_SESSION['id_siswa'])) ? $id_siswa = $_SESSION['id_siswa'] : $id_siswa = 0;
	($id_siswa<>0) ? mysql_query("INSERT INTO log (id_siswa,type,text,date) VALUES ('$id_siswa','logout','keluar','$tanggal $waktu')"):null;
	session_destroy();
	header('location:'.$homeurl);
?>