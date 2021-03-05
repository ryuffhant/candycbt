<?php
include_once "aku.php";
error_reporting(0);
		
	session_start();
    session_cache_expire(0);
    session_cache_limiter(0);
	set_time_limit(0);
	
	(isset($_SESSION['id_user'])) ? $id_user = $_SESSION['id_user'] : $id_user = 0;
	
	// $ref = $_SERVER['HTTP_REFERER'];
	$uri = $_SERVER['REQUEST_URI'];
	$pageurl = explode("/",$uri);
	if($uri=='/') {
		$homeurl = "http://".$_SERVER['HTTP_HOST'];
		(isset($pageurl[1])) ? $pg = $pageurl[1] : $pg = '';
		(isset($pageurl[2])) ? $ac = $pageurl[2] : $ac = '';
		(isset($pageurl[3])) ? $id = $pageurl[3] : $id = 0;
	} else {
		$homeurl = "http://".$_SERVER['HTTP_HOST']."/".$pageurl[1];
		(isset($pageurl[2])) ? $pg = $pageurl[2] : $pg = '';
		(isset($pageurl[3])) ? $ac = $pageurl[3] : $ac = '';
		(isset($pageurl[4])) ? $id = $pageurl[4] : $id = 0;
	}
	// $ref = $_SERVER['HTTP_REFERER'];
	// $uri = $_SERVER['REQUEST_URI'];
	// $pageurl = explode("/",$uri);
	
		// $homeurl = "http://".$_SERVER['HTTP_HOST'];
		// (isset($pageurl[1])) ? $pg = $pageurl[1] : $pg = '';
		// (isset($pageurl[2])) ? $ac = $pageurl[2] : $ac = '';
		// (isset($pageurl[3])) ? $id = $pageurl[3] : $id = 0;
	
	require "config.database.php";
	$host = $host;
	$user = $user;
	$pass = $pass;
	$debe = $debe;
	
	
	$koneksi=mysql_connect($host,$user,$pass) or die(mysql_error());
	$pilihdb=mysql_select_db($debe,$koneksi);
	$setting = mysql_fetch_array(mysql_query("SELECT * FROM setting WHERE id_setting='1'"));
	$sess = mysql_fetch_array(mysql_query("SELECT * FROM session WHERE id='1'"));
	date_default_timezone_set($setting['waktu']);
	$no = $jam = $mnt = $dtk = 0;
	$info = '';
	$waktu = date('H:i:s');
	$tanggal = date('Y-m-d');
	$datetime = date('Y-m-d H:i:s');
	
$copyright='Candy CBT';	
	
if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape')){
	$browser = 'Netscape';
} else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox')){
	$browser = 'Firefox';
} else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome')){
	$browser = 'Chrome';
} else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera')){
	$browser = 'Opera';
} else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')){
	$browser = 'Internet Explorer';
} else $browser = 'Other';	
							
?>