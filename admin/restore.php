<?php
require("../config/config.default.php");
	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
	($id_pengawas==0) ? header('location:login.php'):null;

function restore($file) {
	global $rest_dir;
	$koneksi=mysql_connect("localhost","root","root");
	mysql_select_db("artikel",$koneksi);
	
	$nama_file	= $file['name'];
	$ukrn_file	= $file['size'];
	$tmp_file	= $file['tmp_name'];
	
	if ($nama_file == "")
	{
		echo "Fatal Error";
	}
	else
	{
		$alamatfile	= $rest_dir.$nama_file;
		$templine	= array();
		
		if (move_uploaded_file($tmp_file , $alamatfile))
		{
			
			$templine	= '';
			$lines		= file($alamatfile);

			foreach ($lines as $line)
			{
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
			 
				$templine .= $line;

				if (substr(trim($line), -1, 1) == ';'){
					mysql_query($templine); 
					$templine = '';
				}
			}
			echo "<center>Berhasil Restore Database, silahkan di cek.</center>";
		
		}else{
			echo "Proses upload gagal, kode error = " . $file['error'];
		}	
	}
	
}
?>