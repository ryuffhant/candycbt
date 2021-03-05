<!DOCTYPE html>
<?php
	require("../config/config.default.php");
	require("../config/config.function.php");
	$cekdb = mysql_query('select 1 from `pengawas` LIMIT 1');
	if($cekdb==false){
		header("Location: ../install.php");
	}
	
	$ceks = mysql_fetch_array(mysql_query("select * from setting"));
	
	$namaaplikasi = $ceks['aplikasi'];
	$namasekolah = $ceks['sekolah'];
	
	if(isset($_POST['submit'])) {
		
				
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = mysql_query("SELECT * FROM pengawas WHERE username='$username'");
		
		$cek = mysql_num_rows($query);
		$user = mysql_fetch_array($query);
		
		
		if($cek <> 0 ) {
			
			if($user['level']=='admin'){
			
				if(!password_verify($password,$user['password']) ) {
					$info = info("Password salah!","NO");
				} else {
					$_SESSION['id_pengawas'] = $user['id_pengawas'];
					$_SESSION['level']='admin';
					header('location:.');
				}
			}elseif($user['level']=='guru'){
			
				if($password==$user['password'] ) {
					$_SESSION['id_pengawas'] = $user['id_pengawas'];
					$_SESSION['level']='guru';
					header('location:.');
					
				} else {
					$info = info("Password salah!","NO");
				}	
			}
		
			
		}elseif($cek==0 or $cekguru==0){
			echo "<script>alert('Pengguna tidak terdaftar');</script>";
		}
		
	}
							
	?>
<html lang="en">
<head>
	<title>Candy CBT V<?php echo $setting['versi']; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../dist/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../plugins/font-awesome/css/font-awesome.css">

	
	<link rel="stylesheet" type="text/css" href="../plugins/animate/animate.min.css">

	<link rel="stylesheet" type="text/css" href="../dist/bootstrap/css/util.css">
	<link rel="stylesheet" type="text/css" href="../dist/bootstrap/css/main.css">
<!--===============================================================================================-->
<style>
.judul{
		position: absolute;
		right:20px;
		top: 20px;
		z-index: 2;
		color: #000;
	}
	.logo{
		position: absolute;
		left:20px;
		top: 20px;
		z-index: 2;
		color: #000;
		 -webkit-filter: drop-shadow(5px 5px 5px #222);
  filter: drop-shadow(5px 5px 5px #222);
		
	}
	.wrap-login100-form-btn {
    display: block;
    position: relative;
    z-index: 1;
    border-radius: 0px;
    overflow: hidden;
}
	</style>
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
		<div class='judul'>Support By <a href="http://candy.smkhsagung.sch.id" class="txt2 hov1">
										<b>Candy CBT</b> V<?php echo $setting['versi']; ?>
									</a></div>
		<div class='logo hidden-xs'><img class='img img-responsive' style='max-width:250px;' src="<?php echo "$homeurl/$setting[logo]";?>" width='200'></div>
			<div class="login100-more" style="background-image: url('back2.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50" style="background-image: url('acs.jpg');">
				<form action='' method='post' class="validate-form">
					<span class="animated flipInX login100-form-title p-b-59">
					<?php echo	$namaaplikasi; ?>
					</span>
					
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Username...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>
					
					
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name='submit' class="login100-form-btn">
								Login Masuk
							</button>
						</div>

						
					</div>
				</form>
				
			</div>
			
		</div>
	</div>

	<script src='../plugins/jQuery/jquery-3.2.1.min.js'></script>
	<script src='../dist/bootstrap/js/bootstrap.min.js'></script>

	<script src="../plugins/jQuery/main.js"></script>

</body>
</html>