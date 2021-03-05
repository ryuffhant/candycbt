<?php
require("../config/config.default.php");
$id_level = $_POST['level'];
		// Buat query untuk menampilkan data kota dengan provinsi tertentu (sesuai yang dipilih user pada form)
		$sql = mysql_query("SELECT * FROM kelas WHERE level='".$id_level."'");
		echo "<option value='semua'>Semua Kelas</option>";
		while($data=mysql_fetch_array($sql)){
		 echo "<option value='$data[id_kelas]'>$data[id_kelas]</option>";
		}
?>