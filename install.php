<?php
require("config/config.default.php");
require("config/config.function.php");
if (!$pilihdb) {
  $ket='disabled';
  $ket2='';
}else{
  $ket='';
  $ket2='disabled';
 
}
if(isset($_POST['buat'])) {
$nama_db = "candycbtv23";
 mysql_query("create database $nama_db;");
 header('location:admin/login.php');
}
if(isset($_POST['buat2'])) {
	
	$filename = 'config/candycbtv23.sql';

	$templine = ''; 

	$lines = file($filename);

	foreach ($lines as $line){

	if (substr($line, 0, 2) == '--' || $line == '')
		continue;
		$templine .= $line;

		if (substr(trim($line), -1, 1) == ';')
		{
			mysql_query($templine);
			$templine = '';
		}
	}
  header('location:admin/login.php');
}	
	
	?>
	
<!DOCTYPE html>
		<html>
			<head>
				<meta charset='utf-8'/>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'/>
				<title>Installasi Candy CBT</title>
				<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'/>
				<link rel='stylesheet' href='dist/bootstrap/css/bootstrap.min.css'/>
				
				<link rel='stylesheet' href='dist/css/AdminLTE.min.css'/>
				<link rel='stylesheet' href='dist/css/skins/skin-blue.min.css'/>
				
			
				<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">
				<link rel="stylesheet" href="plugins/animate/animate.min.css">
				<!-- Material Design -->
				<link rel="stylesheet" href="dist/css/bootstrap-material-design.min.css">
				<link rel="stylesheet" href="dist/css/ripples.min.css">
				<link rel="stylesheet" href="dist/css/MaterialAdminLTE.min.css">
				
 
  
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav" >

<div class="wrapper">
 <header class="main-header">
    <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="?" class="animated bounce navbar-brand" style="padding:5px 15px;"><b>CANDY</b> CBT</a>
         
        </div>

       
      </div>
    </nav>
  </header>
  
  <!-- Full Width Column -->
  <div class="content-wrapper" style="background:url(admin/background.jpg);">
  
    <div class="container">
      <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1 class='animated bounce'>
         <b> CBT CANDY</b>
          <small>Computer Base Test</small>
        </h1>
        
      </section>

      <!-- Main content -->
      <section class="content">
<div class='row'>	
<div class="animated tada delay-1s login-logo" style='font-size:50px;margin-top:12%;'>
    <a href="">WELCOME TO <b>CANDY</b>CBT</a>
  </div>  
<div class="animated flipInX login-box" style='margin-top:1%;'>
   
  <!-- /.login-logo -->
  <div class="  login-box-body">
  <p class="login-box-msg"><b>Database Belum Terbentuk Silahkan Klik Tombol dibawah Untuk membuat database</b></p>
	<div class="row">
        
        <!-- /.col -->
        <div class="col-xs-12">
			<form action='' method='post'>
				<button name='buat' class="btn btn-primary btn-raised  btn-block" <?php echo $ket2 ?>>1. Buat</button>
			</form>
			<form action='' method='post'>
				<button name='buat2' class="btn btn-danger btn-raised  btn-block" <?php echo $ket ?>>2. Import</button>
			</form>
        </div>
        <!-- /.col -->
      </div>
  </div>
  <!-- /.login-box-body -->
</div>
</div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer hidden-xs navbar-fixed-bottom">
    <div class="container">
	<div class="pull-left ">
        <b>Candy CBT @ 2019</b>
      </div>
      <div class="pull-right ">
        <b>Version</b> 2.3
      </div>
     <strong></strong>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3.1.1 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="dist/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/material.min.js"></script>
<script src="dist/js/ripples.min.js"></script>
	

</body>
</html>
