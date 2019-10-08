<?php
	require("config/config.default.php");
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$siswaQ = mysql_query("SELECT * FROM siswa WHERE username='$username'");
		if($username<>"" and $password<>""){
		if(mysql_num_rows($siswaQ)==0) {
			echo "td";
		} else {
			$siswa = mysql_fetch_array($siswaQ);
			$ceklogin=mysql_num_rows(mysql_query("select * from login where id_siswa='$siswa[id_siswa]'"));
			
				if($password<>$siswa['password']) {
					echo "nopass";
				} else {
					if($ceklogin==0){
						$_SESSION['id_siswa'] = $siswa['id_siswa'];
						mysql_query("INSERT INTO log (id_siswa,type,text,date) VALUES ('$siswa[id_siswa]','login','masuk','$tanggal $waktu')");
						mysql_query("INSERT INTO login (id_siswa) VALUES ('$siswa[id_siswa]')");
						echo "ok";
					}else{
						echo "nologin";
					}
				}
			
		}
		}
