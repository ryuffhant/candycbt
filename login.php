<?php
	require("config/config.default.php");
	$cekdb = mysql_query('select 1 from `pengawas` LIMIT 1');
	if($cekdb==false){
		header("Location: install.php");
	}
	
	
	
	
	?>
<!DOCTYPE html>
		<html>
			<head>
				<meta charset='utf-8'/>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'/>
				<title>Login | <?php echo $setting['aplikasi']; ?></title>
				<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'/>
				<link rel='stylesheet' href='dist/bootstrap/css/bootstrap.min.css'/>
				
				<link rel='stylesheet' href='dist/css/AdminLTE.min.css'/>
				<link rel='stylesheet' href='dist/css/skins/skin-blue.min.css'/>
				<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">
				<link rel="stylesheet" href="plugins/animate/animate.min.css">
				<link rel='stylesheet' href='<?php echo $homeurl; ?>/plugins/sweetalert2/dist/sweetalert2.min.css'>
 
  
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">

<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="?" class="animated bounce delay-1s navbar-brand" style="padding:5px 15px;"><image src="<?php echo $homeurl.'/'.$setting['logo'];?>" height='40px'></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"><i class="fa fa-home"></i><b> SISWA<b> Login <span class="sr-only">(current)</span></a></li>
           
          </ul>
         
        </div>
      </div>
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper" style="background:url(admin/background.jpg);background-size: cover;">
  
    <div class="container">
      <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
          CBT CANDY
          <small>Computer Base Test</small>
        </h1>
        
      </section>

      <!-- Main content -->
      <section class="content">
			<div class='row'>	  
			<div class="animated flipInX login-box" >
			  <div class="login-logo">
				<a href="#"><b>Login |</b> Siswa</a>
			  </div>
			  <!-- /.login-logo -->
			  <div class="  login-box-body" style='border-radius:8px'>
			  
				 <p class="login-box-msg"><b>Jangan Lupa Berdoa Sebelum Ujian</b></p>

				<form id="formlogin" action="ceklogin.php" method="post">
				  <div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Username" autocomplete='off' required>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<input type="password" name="password" id="pass" class="form-control" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				  </div>
				 
				  <div class="row">
					<div class="col-xs-6">
					<div class="col-md-12">
					  <div class="checkbox icheck">
						<label>
						  <input type="checkbox" onclick="showpass()"> Show Password
						</label>
					  </div>
					  </div>
					</div>
					<!-- /.col -->
					<div class="col-xs-6">
					  <button type="submit" name="submit" class="btn btn-primary btn-raised btn-block btn-flat">Masuk</button>
					</div>
					<!-- /.col -->
				  </div>
				</form>

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
        <b><?php echo "$setting[sekolah] support by Candy CBT";?></b>
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
<script src='<?php echo $homeurl; ?>/plugins/sweetalert2/dist/sweetalert2.min.js'></script>
<script>
				$(document).ready(function() {
					$('#formlogin').submit(function(e) {
						var homeurl;
						homeurl = '<?php echo $homeurl; ?>';
						 e.preventDefault();
							$.ajax({
								type: 'POST',
								url: $(this).attr('action'),
								data: $(this).serialize(),
								success: function(data) {
									if(data=="ok"){
										console.log('sukses');
										window.location = homeurl;
									}
									if(data=="nopass"){
										swal({
										  position: 'top-end',
										  type: 'warning',
										  title: 'Password Salah',
										  showConfirmButton: false,
										  timer: 1500
										});
									}
									if(data=="td"){
										swal({
										  position: 'top-end',
										  type: 'warning',
										  title: 'Siswa tidak terdaftar',
										  showConfirmButton: false,
										  timer: 1500
										});
									}
									if(data=="nologin"){
										swal({
										  position: 'top-end',
										  type: 'warning',
										  title: 'Siswa sudah aktif',
										  showConfirmButton: false,
										  timer: 1500
										});
									}
									
								}
							})
							return false;
					 });
					 
				});
				
				function showpass() {
					  var x = document.getElementById("pass");
					  if (x.type === "password") {
						x.type = "text";
					  } else {
						x.type = "password";
					  }
					}
</script>
	
	
</body>
</html>
