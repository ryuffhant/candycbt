<?php
include_once "../config/mysql-shim.php";

require("../config/config.default.php");
require("../config/config.function.php");
require("../config/functions.crud.php");
require("../config/excel_reader2.php");
(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
($id_pengawas == 0) ? header('location:login.php') : null;
$pengawas = mysql_fetch_array(mysql_query("SELECT * FROM pengawas  WHERE id_pengawas='$id_pengawas'"));

(isset($_GET['pg'])) ? $pg = $_GET['pg'] : $pg = '';
(isset($_GET['ac'])) ? $ac = $_GET['ac'] : $ac = '';
($pg == 'banksoal' && $ac == 'input') ? $sidebar = 'sidebar-collapse' : $sidebar = '';
($pg == 'nilai' && $ac == 'lihat') ? $sidebar = 'sidebar-collapse' : $sidebar = '';
$nilai = mysql_num_rows(mysql_query("SELECT * FROM nilai"));
$soal = mysql_num_rows(mysql_query("SELECT * FROM mapel"));
$siswa = mysql_num_rows(mysql_query("SELECT * FROM siswa"));
$ruang = mysql_num_rows(mysql_query("SELECT * FROM ruang"));
$kelas = mysql_num_rows(mysql_query("SELECT * FROM kelas"));
$mapel = mysql_num_rows(mysql_query("SELECT * FROM mata_pelajaran"));
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Administrator | <?= $setting['aplikasi'] ?></title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel='shortcut icon' href='<?= $homeurl ?>/favicon.ico' />
	<link rel='stylesheet' href='<?= $homeurl ?>/dist/bootstrap/css/bootstrap.min.css' />

	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/font-awesome/css/font-awesome.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/select2/select2.min.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/dist/css/AdminLTE.min.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/dist/css/skins/skin-green.min.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/jQueryUI/jquery-ui.css'>
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/iCheck/square/green.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'>
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/datatables/dataTables.bootstrap.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/datatables/extensions/Select/css/select.bootstrap.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/animate/animate.min.css'>
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/datetimepicker/jquery.datetimepicker.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/notify/css/notify-flat.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/sweetalert2/dist/sweetalert2.min.css'>
	<script src='<?= $homeurl ?>/plugins/tinymce/tinymce.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/jQuery/jquery-3.1.1.min.js'></script>

	<style>
		@font-face {
			font-family: 'tulisan_keren';
			src: url('../dist/fonts/poppins/Poppins-Light.ttf');
		}

		@font-face {
			font-family: 'OCR A Extended';
			font-style: normal;
			font-weight: normal;
			src: local('OCR A Extended'), url('OCRAEXT_2.woff') format('woff');
		}

		body {
			font-family: 'tulisan_keren';
			font-size: 13px;
			line-height: 1.42857143;
			color: #000;
		}

		.sidebar-menu>li>a {
			padding: 5px 5px 5px 10px;
			display: block;
		}

		.skin-green .main-header .navbar {
			background-color: #02948d;
		}

		.bg-green {
			background-color: #02948d;
		}

		.loader {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url('../dist/img/octo.gif') 50% 50% no-repeat rgb(249, 249, 249);
			opacity: .8;
		}

		.skin-red .sidebar a {
			color: #b1c9f5;
		}

		.form-control {
			border-radius: 0;
			box-shadow: none;
			border-color: #afc2e8;
		}

		.box-header {

			background: #d81b60;
		}

		.box-header .box-title {
			color: #fff;
		}

		.box-header {
			color: #fff;
		}

		thead {
			background-color: #4cf5a7;

		}

		thead:hover {
			background-color: #92fbca;
		}

		.table-striped>tbody>tr:nth-of-type(odd) {
			background-color: #ddfdeb;
		}

		.info-box-number {
			display: block;
			font-weight: bold;
			font-size: 30px;
			color: #fff;
		}
	</style>
	<!-- <style type='text/css' media='print'>
		.page {
			-webkit-transform: rotate(-90deg);
			-moz-transform: rotate(-90deg);
			filter: 'progid:DXImageTransform.Microsoft.BasicImage(rotation=3)';
		}
	</style> -->
</head>

<body class='hold-transition skin-green sidebar-mini fixed <?= $sidebar ?>'>
	<div id='pesan'></div>
	<div class='loader'></div>
	<div class='wrapper'>
		<header class='main-header'>
			<a href='?' class='logo' style='background-color:#02948d'>
				<span class='animated bounce logo-mini'>
					<img src="<?= $homeurl . '/' . $setting['logo'] ?>" height="30px">
				</span>
				<span class='animated bounce logo-lg'>
					<img src="<?= $homeurl . '/' . $setting['logo'] ?>" height="40px">
				</span>
			</a>
			<nav class='navbar navbar-static-top' role='navigation'>
				<a href='#' class='sidebar-toggle' data-toggle='offcanvas' role='button'>
					<span class='sr-only'>Toggle navigation</span>
				</a>
				<div class='navbar-custom-menu'>
					<ul class='nav navbar-nav'>
						<li class='dropdown user user-menu'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
								<img src='<?= $homeurl ?>/dist/img/avatar-6.png' class='user-image' alt='+'>
								<span class='hidden-xs'><?= $pengawas['nama'] ?> &nbsp; <i class='fa fa-caret-down'></i></span>
							</a>
							<ul class='dropdown-menu'>
								<li class='user-header'>
									<?php
									if ($pengawas['level'] == 'admin') :
										echo "<img src='$homeurl/dist/img/avatar-6.png' class='img-circle' alt='User Image'>";
									elseif ($pengawas['level'] == 'guru') :
										if ($pengawas['foto'] <> '') {
											echo "<img src='$homeurl/foto/fotoguru/$pengawas[foto]' class='img-circle' alt='User Image'>";
										} else {
											echo "<img src='$homeurl/dist/img/avatar-6.png' class='img-circle' alt='User Image'>";
										}
									endif
									?>
									<p>
										<?= $pengawas['nama'] ?>
										<small>NIP. <?= $pengawas['nip'] ?></small>
									</p>
								</li>
								<li class='user-footer'>
									<div class='pull-left'>
										<?php
										if ($pengawas['level'] == 'admin') :
											echo "<a href='?pg=pengaturan' class='btn btn-sm btn-default btn-flat'><i class='fa fa-gear'></i> Pengaturan</a>";
										elseif ($pengawas['level'] == 'guru') :
											echo "<a href='?pg=editguru' class='btn btn-sm btn-default btn-flat'><i class='fa fa-gear'></i> Edit Profil</a>";
										endif
										?>
									</div>
									<div class='pull-right'>
										<a href='logout.php' class='btn btn-sm btn-default btn-flat'><i class='fa fa-sign-out'></i> Keluar</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<aside class='main-sidebar'>
			<section class='sidebar'>
				<div class='user-panel'>
					<div class='pull-left image'>
						<?php
						if ($pengawas['level'] == 'admin') :
							echo " <img src='$homeurl/dist/img/avatar-6.png' class='img-circle' style='border:3px solid white; max-width:60px' alt='+'>";
						elseif ($pengawas['level'] == 'guru') :
							if ($pengawas['foto'] <> '') {
								echo " <img src='$homeurl/foto/fotoguru/$pengawas[foto]' class='img-circle' style='border:2px solid yellow; max-width:60px' alt='+'>";
							} else {
								echo " <img src='$homeurl/dist/img/avatar-6.png' class='img-circle' style='border:2px solid yellow; max-width:60px' alt='+'>";
							}
						endif
						?>
					</div>
					<div class='pull-left info' style='left:65px'>
						<p><?= $pengawas['nama']; ?></p>
						<a href='#'><i class='fa fa-circle text-green'></i> <?= $pengawas['level']; ?></a>
					</div>
				</div>
				<ul class=' sidebar-menu tree data-widget=' tree>
					<li><a href='?'><img src='../dist/img/svg/home.svg' width='30'> <span>Dashboard</span></a></li>
					<?php if ($pengawas['level'] == 'admin') : ?>
						<li class=' treeview'>
							<a href='#'>
								<img src='../dist/img/svg/data_master.svg' width='30'>
								<span>Data Master</span>
								<span class='pull-right-container'>
									<i class='glyphicon glyphicon-plus pull-right'></i>
								</span>
							</a>
							<ul class='treeview-menu'>
								<li><a href='?pg=importmaster'><i class='fa fa-upload'></i> <span>Import Data Master</span><span class='pull-right-container'><small class='label pull-right bg-green'>new</small></span></a></li>
								<li><a href='?pg=matapelajaran'><i class='fa  fa-circle-o text-teal'></i> <span> Data Mata Pelajaran</span></a></li>
								<li><a href='?pg=jenisujian'><i class='fa  fa-circle-o text-teal'></i> <span> Data Jenis Ujian</span></a></li>

								<?php if ($setting['jenjang'] == 'SMK') : ?>
									<li><a href='?pg=pk'><i class='fa  fa-circle-o text-teal'></i> <span> Data Jurusan</span></a></li>
								<?php endif ?>

								<li><a href='?pg=kelas'><i class='fa  fa-circle-o text-teal'></i> <span> Data Kelas</span></a></li>
								<li><a href='?pg=ruang'><i class='fa  fa-circle-o text-teal'></i> <span> Data Ruangan</span></a></li>
								<li><a href='?pg=level'><i class='fa  fa-circle-o text-teal'></i> <span> Data Level</span></a></li>
								<li><a href='?pg=sesi'><i class='fa  fa-circle-o text-teal'></i> <span> Data Sesi</span></a></li>
							</ul>
						</li>
						<li class='treeview'><a href='?pg=siswa'><img src='../dist/img/svg/siswa_ujian.svg' width='30'> <span>Peserta Ujian</span></a></li>

						<li><a href='?pg=banksoal'><img src='../dist/img/svg/briefcase.svg' width='30'> <span> Bank Soal</span></a></li>
						<li><a href='?pg=jadwal'><img src='../dist/img/svg/jadwal_ujian.svg' width='30'> <span> Jadwal Ujian</span></a></li>
						<li class='treeview'>
							<a href='#'><img src='../dist/img/svg/survey.svg' width='30'><span> UBK</span><span class='pull-right-container'> <i class='glyphicon glyphicon-plus pull-right'></i> </span></a>
							<ul class='treeview-menu'>
								<li><a href='?pg=status'><i class='fa  fa-circle-o text-teal'></i> <span> Status Peserta</span></a></li>
								<li><a href='?pg=reset'><i class='fa  fa-circle-o text-teal'></i> <span> Reset Login</span></a></li>
								<li><a href='?pg=token'><i class='fa  fa-circle-o text-teal'></i> <span> Rilis Token</span></a></li>
								<li><a href='?pg=susulan'><i class='fa  fa-circle-o text-teal'></i> <span> Belum Ujian</span></a></li>
								<li><a href='?pg=filemanager'><i class='fa  fa-circle-o text-teal'></i> <span> File manager</span></a></li>
							</ul>
						</li>
						<li class='treeview'>
							<a href='#'><img src='../dist/img/svg/document.svg' width='30'><span> Nilai </span><span class='pull-right-container'> <i class='glyphicon glyphicon-plus pull-right'></i> </span></a>
							<ul class='treeview-menu'>
								<li><a href='?pg=nilai'><i class='fa  fa-circle-o text-teal'></i> <span> Hasil Nilai</span></a></li>
								<li><a href='?pg=semuanilai'><i class='fa  fa-circle-o text-teal'></i> <span>Semua Nilai</span></a></li>
								<li><a href='?pg=dataujian'><i class='fa  fa-circle-o text-teal'></i> <span>Data Ujian</span></a></li>
							</ul>
						</li>
						<li class='treeview'>
							<a href='#'><img src='../dist/img/svg/print.svg' width='30'><span> Cetak </span><span class='pull-right-container'> <i class='glyphicon glyphicon-plus pull-right'></i> </span></a>
							<ul class='treeview-menu'>
								<li><a href='?pg=absen'><i class='fa  fa-circle-o text-teal'></i> <span> Daftar Hadir</span></a></li>
								<li><a href='?pg=kartu'><i class='fa  fa-circle-o text-teal'></i> <span> Cetak Kartu</span></a></li>
								<li><a href='?pg=berita'><i class='fa  fa-circle-o text-teal'></i> <span> Berita Acara</span></a></li>
							</ul>
						</li>

						<li class='treeview'><a href='?pg=pengumuman'><img src='../dist/img/svg/advertising.svg' width='30'> <span> Pengumuman</span></a></li>
						<li class='treeview'>
							<a href='#'><img src='../dist/img/svg/manajemen_user.svg' width='30'> <span>Manajemen User</span><span class='pull-right-container'> <i class='glyphicon glyphicon-plus pull-right'></i> </span></a>
							<ul class='treeview-menu'>
								<li><a href='?pg=pengawas'><i class='fa  fa-circle-o text-teal'></i> <span>Data Administrator</span></a></li>
								<li><a href='?pg=guru'><i class='fa  fa-circle-o text-teal'></i> <span>Data Guru</span></a></li>
							</ul>
						</li>
						<li class='treeview'><a href='?pg=pengaturan'><img src='../dist/img/svg/services.svg' width='30'> <span>Pengaturan</span></a></li>
					<?php endif ?>
					<?php if ($pengawas['level'] == 'guru') : ?>
						<li class='treeview'><a href='?pg=siswa'><img src='../dist/img/svg/manager.svg' width='30'> <span>Peserta Ujian</span></a></li>
						<li><a href='?pg=editguru'><img src='../dist/img/svg/businessman.svg' width='30'> <span>Profil Saya</span></a></li>
						<li><a href='?pg=banksoal'><img src='../dist/img/svg/briefcase.svg' width='30'> <span>Bank Soal</span></a></li>
						<li><a href='?pg=jadwal'><img src='../dist/img/svg/planner.svg' width='30'> <span> Jadwal Ujian</span></a></li>
						<li class='treeview'>
							<a href='#'><img src='../dist/img/svg/survey.svg' width='30'><span> UBK</span><span class='pull-right-container'> <i class='glyphicon glyphicon-plus pull-right'></i> </span></a>
							<ul class='treeview-menu'>
								<li><a href='?pg=status'><i class='fa  fa-circle-o text-teal'></i> <span> Status Peserta</span></a></li>
								<li><a href='?pg=reset'><i class='fa  fa-circle-o text-teal'></i> <span> Reset Login</span></a></li>
							</ul>
						</li>
						<li><a href='?pg=nilai'><img src='../dist/img/svg/like.svg' width='30'> <span>Hasil Nilai</span></a></li>
					<?php endif ?>
					<?php
					if ($setting['jenjang'] == 'SMK') {
						$jenjang = 'SMK/SMA/MA';
					} elseif ($setting['jenjang'] == 'SMP') {
						$jenjang = 'SMP/MTS';
					} else {
						$jenjang = 'SD/MI';
					}
					?>
					<li><a class='btn btn-block' style='background-color:#02948d' href='logout.php'><b><img src='../dist/img/svg/cancel.svg' width='30'> Keluar</b></a></li>
				</ul><!-- /.sidebar-menu -->
			</section>
		</aside>

		<div class='content-wrapper' style='background-image: url(backgroun.jpg);background-size: cover;'>
			<section class='content-header'>
				<h1 style='text-shadow: 2px 2px 4px #827e7e;'>
					&nbsp;<span class='hidden-xs'><?= $setting['aplikasi'] . '-' . $jenjang ?></span>
				</h1>
				<div style='float:right; margin-top:-37px'>
					<button class='btn  btn-flat  bg-purple' style="font-family:'OCR A Extended';font-weight:normal;"><i class='fa fa-calendar'></i> <?= buat_tanggal('D, d M Y') ?></button>
					<button class='btn  btn-flat  bg-maroon'><span id='waktu' style="font-family:'OCR A Extended';font-weight:normal;"><?= $waktu ?></span></button>
				</div>
				<div class='breadcrumb'></div>
			</section>
			<section class='content'>
				<?php if ($pg == '') : ?>
					<?php
						$testongoing = mysql_num_rows(mysql_query("SELECT * FROM nilai WHERE ujian_mulai!='' AND ujian_selesai=''"));
						$testdone = mysql_num_rows(mysql_query("SELECT * FROM nilai WHERE ujian_mulai!='' AND ujian_selesai!=''"));

						if ($siswa <> 0) {
							$testongoing_per = (1000 / $siswa) * $testongoing;
							$testongoing_per = number_format($testongoing_per, 2, '.', '');
							$testongoing_per = str_replace('.00', '', $testongoing_per);
							$testdone_per = (1000 / $siswa) * $testdone;
							$testdone_per = number_format($testdone_per, 2, '.', '');
							$testdone_per = str_replace('.00', '', $testdone_per);
						} else {
							$testongoing_per = $testdone_per = 0;
						}
						?>
					<?php if ($pengawas['level'] == 'admin') : ?>
						<div class=' row'>
							<div class='  col-md-8'>
								<div class='animated swing col-md-4'>
									<a href='?pg=nilai'>
										<div class='info-box bg-yellow'>
											<span class='info-box-icon bg-yellow'><img src='../dist/img/svg/inspection.svg'></span>
											<div class='info-box-content'>
												<span class='info-box-text'>NILAI</span>
												<span class='info-box-number'><?= $nilai ?></span>
											</div><!-- /.info-box-content -->
										</div>
									</a><!-- /.info-box -->
								</div>
								<div class='animated swing col-md-4'>
									<a href='?pg=banksoal'>
										<div class='info-box bg-aqua'>
											<span class='info-box-icon bg-aqua'><img src='../dist/img/svg/briefcase.svg'></span>
											<div class='info-box-content '>
												<span class='info-box-text'>SOAL</span>
												<span class='info-box-number'><?= $soal ?></span>
											</div><!-- /.info-box-content -->
										</div>
									</a><!-- /.info-box -->
								</div>
								<div class='animated swing col-md-4'>
									<a href='?pg=siswa'>
										<div class='info-box bg-green'>
											<span class='info-box-icon bg-green'><img src='../dist/img/svg/siswa_ujian.svg' width="80%"></span>
											<div class='info-box-content'>
												<span class='info-box-text'>SISWA</span>
												<span class='info-box-number'><?= $siswa ?></span>
											</div><!-- /.info-box-content -->
										</div>
									</a><!-- /.info-box -->
								</div>
								<div class='animated swing col-md-4'>
									<a href='?pg=kelas'>
										<div class='info-box bg-navy'>
											<span class='info-box-icon bg-navy'><img src='../dist/img/svg/organization.svg'></span>
											<div class='info-box-content'>
												<span class='info-box-text'>KELAS</span>
												<span class='info-box-number'><?= $kelas ?></span>
											</div><!-- /.info-box-content -->
										</div>
									</a><!-- /.info-box -->
								</div>
								<div class='animated swing col-md-4'>
									<a href='?pg=matapelajaran'>
										<div class='info-box bg-purple'>
											<span class='info-box-icon bg-purple'><img src='../dist/img/svg/graduation_cap.svg'></span>
											<div class='info-box-content'>
												<span class='info-box-text'>MATA PELAJARAN</span>
												<span class='info-box-number'><?= $mapel ?></span>
											</div><!-- /.info-box-content -->
										</div>
									</a><!-- /.info-box -->
								</div>
								<div class='animated swing col-md-4'>
									<a href='?pg=ruang'>
										<div class='info-box bg-maroon'>
											<span class='info-box-icon bg-maroon'><img src='../dist/img/svg/library.svg'></span>
											<div class='info-box-content'>
												<span class='info-box-text'>RUANGAN</span>
												<span class='info-box-number'><?= $ruang ?></span>
											</div><!-- /.info-box-content -->
										</div>
									</a><!-- /.info-box -->
								</div>
								<div class='animated flipInX col-md-12'>
									<div class='box box-solid direct-chat direct-chat-warning'>
										<div class='box-header with-border'>
											<h3 class='box-title'><img src='../dist/img/svg/advertising.svg' width='30'> </i>
												Pengumuman
											</h3>
											<div class='box-tools pull-right'>

												<a href='?pg=<?= $pg ?>&ac=clearpengumuman' class='btn btn-sm bg-maroon' title='Bersihkan Pengumuman'><i class='fa fa-trash-o'></i></a>
											</div>
										</div><!-- /.box-header -->
										<div class='box-body'>
											<div id='pengumuman'>
												<p class='text-center'>
													<br /><i class='fa fa-spin fa-circle-o-notch'></i> Loading....
												</p>
											</div>
										</div><!-- /.box-body -->
									</div><!-- /.box -->
								</div>
							</div>
							<div class='animated flipInX col-md-4'>
								<div class='box box-solid direct-chat direct-chat-warning'>
									<div class='box-header with-border'>
										<h3 class='box-title'><i class='fa fa-history'></i> Log Aktifitas</h3>
										<div class='box-tools pull-right'>
											<a href='?pg=<?= $pg ?>&ac=clearlog' class='btn btn-sm btn-flat bg-maroon' title='Bersihkan Log'><i class='fa fa-trash-o'></i></a>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<div id='log-list'>
											<p class='text-center'>
												<br /><i class='fa fa-spin fa-circle-o-notch'></i> Loading....
											</p>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
						</div>
					<?php endif ?>
					<?php
						if ($ac == 'clearlog') {
							mysql_query("TRUNCATE log");
							jump('?');
						}
						if ($ac == 'clearpengumuman') {
							mysql_query("TRUNCATE pengumuman");
							jump('?');
						}
						?>
					<?php if ($pengawas['level'] == 'guru') : ?>
						<div class='row'>
							<div class='col-md-8'>
								<div class='box box-solid direct-chat direct-chat-warning'>
									<div class='box-header with-border'>
										<h3 class='box-title'><i class='fa fa-bullhorn'></i> Pengumuman
										</h3>
										<div class='box-tools pull-right'></div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<div id='pengumuman'>
											<p class='text-center'>
												<br /><i class='fa fa-spin fa-circle-o-notch'></i> Loading....
											</p>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							<div class='col-md-4'>
								<div class='box box-solid '>
									<div class='box-body'>
										<strong><i class='fa fa-building-o'></i> <?= $setting['sekolah'] ?></strong><br />
										<?= $setting['alamat'] ?><br /><br />
										<strong><i class='fa fa-phone'></i> Telepon</strong><br />
										<?= $setting['telp'] ?><br /><br />
										<strong><i class='fa fa-fax'></i> Fax</strong><br />
										<?= $setting['fax'] ?><br /><br />
										<strong><i class='fa fa-globe'></i> Website</strong><br />
										<?= $setting['web'] ?><br /><br />
										<strong><i class='fa fa-at'></i> E-mail</strong><br />
										<?= $setting['email'] ?><br />
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
						</div>
					<?php endif ?>
				<?php elseif ($pg == 'dataserver') : ?>
					<?php include 'serverlokal.php'; ?>
				<?php elseif ($pg == 'dataujian') : ?>
					<?php include 'dataujian.php'; ?>
				<?php elseif ($pg == 'filemanager') : ?>
					<iframe width='100%' height='550' frameborder='0' src='ifm.php'>
					</iframe>
				<?php elseif ($pg == 'matapelajaran') : ?>
					<?php
						cek_session_admin();
						$pesan = '';
						if (isset($_POST['simpanmapel'])) {
							$kode = str_replace(' ', '', $_POST['kodemapel']);
							$nama = addslashes($_POST['namamapel']);
							$cek = mysql_num_rows(mysql_query("SELECT * FROM mata_pelajaran WHERE kode_mapel='$kode'"));
							if ($cek == 0) {
								$exec = mysql_query("INSERT INTO mata_pelajaran (kode_mapel,nama_mapel)value('$kode','$nama')");
								$pesan = "<div class='alert alert-success alert-dismissible'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
									<i class='icon fa fa-info'></i>
									Data Berhasil ditambahkan ..</div>";
							} else {
								$pesan = "<div class='alert alert-warning alert-dismissible'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
									<i class='icon fa fa-info'></i>
									Maaf Kode Mapel Sudah ada !</div>";
							}
						}
						if (isset($_POST['importmapel'])) {
							$file = $_FILES['file']['name'];
							$temp = $_FILES['file']['tmp_name'];
							$ext = explode('.', $file);
							$ext = end($ext);
							if ($ext <> 'xls') {
								$info = info('Gunakan file Ms. Excel 93-2007 Workbook (.xls)', 'NO');
							} else {
								$data = new Spreadsheet_Excel_Reader($temp);
								$hasildata = $data->rowcount($sheet_index = 0);
								$sukses = $gagal = 0;
								for ($i = 2; $i <= $hasildata; $i++) {
									$kode = addslashes($data->val($i, 2));
									$nama = addslashes($data->val($i, 3));
									$kode = str_replace(' ', '', $kode);
									$nama = addslashes($nama);
									$cek = mysql_num_rows(mysql_query("select * from mata_pelajaran where kode_mapel='$kode'"));
									if ($kode <> '' and $nama <> '') {
										if ($cek == 0) {
											$exec = mysql_query("INSERT INTO mata_pelajaran (kode_mapel,nama_mapel) VALUES ('$kode','$nama')");
											($exec) ? $sukses++ : $gagal++;
										}
									} else {
										$gagal++;
									}
								}
								$total = $hasildata - 1;
								$info = info("Berhasil: $sukses | Gagal: $gagal | Dari: $total", 'OK');
							}
						}
						?>
					<div class='row'>
						<div class='col-md-12'><?= $pesan ?></div>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'>Mata Pelajaran</h3>
									<div class='box-tools pull-right btn-group'>
										<button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahmapel'><i class='fa fa-check'></i> Tambah Mapel</button>
										<button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#importmapel'><i class='fa fa-upload'></i> Import Mapel</button>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<div class='table-responsive'>
										<table id='tablemapel' class='table table-bordered table-striped'>
											<thead>
												<tr>
													<th width='5px'>#</th>
													<th>Kode Mapel</th>
													<th>Mata Pelajaran</th>
												</tr>
											</thead>
											<tbody>
												<?php $mapelQ = mysql_query("SELECT * FROM mata_pelajaran ORDER BY nama_mapel ASC"); ?>
												<?php while ($mapel = mysql_fetch_array($mapelQ)) : ?>
													<?php $no++; ?>
													<tr>
														<td><?= $no ?></td>
														<td><?= $mapel['kode_mapel'] ?></td>
														<td><?= $mapel['nama_mapel'] ?></td>
													</tr>
												<?php endwhile ?>
											</tbody>
										</table>
									</div>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
						<div class='modal fade' id='tambahmapel' style='display: none;'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header bg-blue'>
										<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
										<h3 class='modal-title'>Tambah Mata Pelajaran</h3>
									</div>
									<div class='modal-body'>
										<form action='' method='post'>
											<div class='form-group'>
												<label>Kode Mapel</label>
												<input type='text' name='kodemapel' class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Nama Pelajaran</label>
												<input type='text' name='namamapel' class='form-control' required='true' />
											</div>
											<div class='modal-footer'>
												<div class='box-tools pull-right btn-group'>
													<button type='submit' name='simpanmapel' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
													<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class='modal fade' id='importmapel' style='display: none;'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header bg-blue'>
										<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
										<h3 class='modal-title'>Tambah Mata Pelajaran</h3>
									</div>
									<div class='modal-body'>
										<form action='' method='post' enctype='multipart/form-data'>
											<div class='form-group'>
												<label>Pilih File</label>
												<input type='file' name='file' class='form-control' required='true' />
											</div>
											<p>
												Sebelum meng-import pastikan file yang akan anda import sudah dalam bentuk Ms. Excel 97-2003 Workbook (.xls) dan format penulisan harus sesuai dengan yang telah ditentukan. <br />
											</p>

											<a href='importdatamapel.xls'><i class='fa fa-file-excel-o'></i> Download Format</a>

											<div class='modal-footer'>
												<div class='box-tools pull-right btn-group'>
													<button type='submit' name='importmapel' class='btn btn-sm btn-flat btn-success'><i class='fa fa-upload'></i> Simpan</button>
													<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php elseif ($pg == 'token') : ?>
					<?php
						if (isset($_POST['generate'])) {
							function create_random($length)
							{
								$data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
								$string = '';
								for ($i = 0; $i < $length; $i++) {
									$pos = rand(0, strlen($data) - 1);
									$string .= $data{
										$pos};
								}
								return $string;
							}
							$token = create_random(6);
							$now = date('Y-m-d H:i:s');
							$cek = mysql_num_rows(mysql_query("SELECT * FROM token"));
							if ($cek <> 0) {
								$query = mysql_fetch_array(mysql_query("SELECT time FROM token"));
								$time = $query['time'];
								$tgl = buat_tanggal('H:i:s', $time);
								$exec = mysql_query("UPDATE token SET token='$token', time='$now' where id_token='1'");
							} else {
								$exec = mysql_query("INSERT INTO token (token,masa_berlaku) VALUES ('$token','00:15:00')");
							}
						}
						$token = mysql_fetch_array(mysql_query("select token from token"))
						?>
					<div class='row'>
						<form action='' method='post'>
							<div class='col-md-6'>
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'> Generate</h3>
										<div class='box-tools pull-right'></div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<div class='col-xs-12'>
											<div class='small-box bg-aqua'>
												<div class='inner'>
													<h3><span name='token' id='isi_token'><?= $token['token'] ?></span></h3>
													<p>Token Tes</p>
												</div>
												<div class='icon'>
													<i class='fa fa-barcode'></i>
												</div>
											</div>
											<button name='generate' class='btn btn-block btn-flat bg-maroon'>Generate</button>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
						</form>
						<div class='col-md-6'>
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'> Data Token</h3>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<div class='table-responsive'>
										<table class='table table-bordered table-striped'>
											<thead>
												<tr>
													<th width='5px'></th>
													<th>Token</th>
													<th>Waktu Generate</th>
													<th>Masa Berlaku</th>
												</tr>
											</thead>
											<tbody>
												<?php $tokenku = mysql_query("SELECT * FROM token "); ?>
												<?php while ($token = mysql_fetch_array($tokenku)) : ?>
													<?php $no++; ?>
													<tr>
														<td><?= $no ?></td>
														<td><?= $token['token'] ?></td>
														<td><?= $token['time'] ?></td>
														<td><?= $token['masa_berlaku'] ?></td>
													</tr>
												<?php endwhile ?>
											</tbody>
										</table>
									</div>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
					</div>
				<?php elseif ($pg == 'pengumuman') : ?>
					<?php
						cek_session_admin();
						if (isset($_POST['simpanpengumuman'])) {
							$exec = mysql_query("INSERT INTO pengumuman (judul,text,user,type) VALUES ('$_POST[judul]','$_POST[pengumuman]','$pengawas[id_pengawas]','$_POST[tipe]')");
							if (!$exec) {
								$info = info("Gagal menyimpan!", "NO");
							} else {
								jump("?pg=$pg");
							}
						}
						?>
					<div class='row'>
						<form action='' method='post'>
							<div class='col-md-6'>
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'> Tulis Pengumuman</h3>
										<div class='box-tools pull-right'>
											<button type='submit' name='simpanpengumuman' class='btn btn-sm btn-flat btn-success'><i class='fa fa-pencil-square-o'></i> Simpan</button>
											<a href='?pg=<?= $pg ?>' class='btn btn-sm bg-maroon'><i class='fa fa-times'></i></a>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<div class='col-sm-12'>
											<div class='form-group'>
												<label>Judul </label>
												<input type='text' class='form-control' name='judul' placeholder='Judul' required>
											</div>
										</div>
										<div class='col-sm-12'>
											<div class='form-group'>
												<label>Jenis Pengumuman </label><br>
												<input type='radio' name='tipe' value='internal' checked> <span class='text-green'><b>guru</b></span> &nbsp; &nbsp;&nbsp;<input type='radio' name='tipe' value='eksternal'> <span class='text-blue'><b>siswa</b></span>
											</div>
										</div>
										<div class='col-sm-12'>
											<div class='form-group'>
												<label>Informasi Pengumuman </label>
												<textarea id='txtpengumuman' name='pengumuman' class='form-control'></textarea>
											</div>
										</div><!-- /.box-body -->
									</div><!-- /.box -->
								</div>
							</div>
						</form>
						<div class='col-md-6'>
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'> Pengumuman</h3>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<div class='table-responsive'>
										<table id='example1' class='table table-bordered table-striped'>
											<thead>
												<tr>
													<th width='5px'></th>
													<th>Pengumuman</th>
													<th>Untuk</th>
													<th width='60px'></th>
												</tr>
											</thead>
											<tbody>
												<?php $pengumumanq = mysql_query("SELECT * FROM pengumuman ORDER BY date DESC"); ?>
												<?php while ($pengumuman = mysql_fetch_array($pengumumanq)) : ?>
													<?php $no++; ?>
													<tr>
														<td><?= $no ?></td>
														<td><?= $pengumuman['judul'] ?></td>
														<td>
															<?php if ($pengumuman['type'] == 'eksternal') : ?>
																<small class='label bg-blue'>siswa</label>
																<?php else : ?>
																	<small class='label bg-green'>guru</label>
																	<?php endif ?>
														</td>
														<td align='center'>
															<div class='btn-group'>
																<a><button class='btn bg-maroon btn-flat btn-xs' data-toggle='modal' data-target="#hapus<?= $pengumuman['id_pengumuman'] ?>"><i class='fa fa-trash-o'></i></button></a>
															</div>
														</td>
													</tr>
													<?php $info = info("Anda yakin akan menghapus pengumuman ini ?"); ?>
													<?php
															if (isset($_POST['hapus'])) {
																$exec = mysql_query("DELETE FROM pengumuman WHERE id_pengumuman = '$_REQUEST[idu]'");
																(!$exec) ? info("Gagal menyimpan", "NO") : jump("?pg=$pg");
															}
															?>
													<div class='modal fade' id="hapus<?= $pengumuman['id_pengumuman'] ?>" style='display: none;'>
														<div class='modal-dialog'>
															<div class='modal-content'>
																<div class='modal-header bg-maroon'>
																	<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																	<h3 class='modal-title'>Hapus Pengumuman</h3>
																</div>
																<div class='modal-body'>
																	<form action='' method='post'>
																		<input type='hidden' id='idu' name='idu' value="<?= $pengumuman['id_pengumuman'] ?>" />
																		<div class='callout '>
																			<h4><?= $info ?></h4>
																		</div>
																		<div class='modal-footer'>
																			<div class='box-tools pull-right btn-group'>
																				<button type='submit' name='hapus' class='btn btn-sm bg-maroon'><i class='fa fa-trash-o'></i> Hapus</button>
																				<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
												<?php endwhile ?>
											</tbody>
										</table>
									</div>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
					</div>
					<script>
						tinymce.init({
							selector: '#txtpengumuman',
							plugins: [
								'advlist autolink lists link image charmap print preview hr anchor pagebreak',
								'searchreplace wordcount visualblocks visualchars code fullscreen',
								'insertdatetime media nonbreaking save table contextmenu directionality',
								'emoticons template paste textcolor colorpicker textpattern imagetools uploadimage paste'
							],

							toolbar: 'bold italic fontselect fontsizeselect | alignleft aligncenter alignright bullist numlist  backcolor forecolor | emoticons code | imagetools link image paste ',
							fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
							paste_data_images: true,
							paste_as_text: true,
							images_upload_handler: function(blobInfo, success, failure) {
								success('data:' + blobInfo.blob().type + ';base64,' + blobInfo.base64());
							},
							image_class_list: [{
								title: 'Responsive',
								value: 'img-responsive'
							}],
						});
					</script>
				<?php elseif ($pg == 'guru') : ?>
					<?php cek_session_admin(); ?>
					<div class='row'>
						<div class='col-md-8'>
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'>Manajemen Guru</h3>
									<div class='box-tools pull-right btn-group'>
										<a href='?pg=importguru' class='btn btn-sm btn-flat btn-success'><i class='fa fa-upload'></i> Import Guru</a>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<div class='table-responsive'>
										<table id='example1' class='table table-bordered table-striped'>
											<thead>
												<tr>
													<th width='5px'>#</th>
													<th>NIP</th>
													<th>Nama</th>
													<th>Username</th>
													<th>Password</th>
													<th>Level</th>
													<th width=60px></th>
												</tr>
											</thead>
											<tbody>
												<?php $guruku = mysql_query("SELECT * FROM pengawas where level='guru' ORDER BY nama ASC"); ?>
												<?php while ($pengawas = mysql_fetch_array($guruku)) : ?>
													<?php $no++; ?>
													<tr>
														<td><?= $no ?></td>
														<td><? +$pengawas['nip'] ?></td>
														<td><?= $pengawas['nama'] ?></td>
														<td><small class='label bg-purple'><?= $pengawas['username'] ?></small></td>
														<td><small class='label bg-blue'><?= $pengawas['password'] ?></small></td>
														<td><?= $pengawas['level'] ?></td>
														<td style="text-align:center">
															<div class='btn-group'>
																<a href="?pg=<?= $pg ?>&ac=edit&id=<?= $pengawas['id_pengawas'] ?>"> <button class='btn btn-flat btn-xs btn-warning'><i class='fa fa-pencil-square-o'></i></button></a>
																<a href="?pg=<?= $pg ?>&ac=hapus&id=<?= $pengawas['id_pengawas'] ?>"> <button class='btn btn-flat btn-xs bg-maroon'><i class='fa fa-trash-o'></i></button></a>
															</div>
														</td>
													</tr>
												<?php endwhile ?>
											</tbody>
										</table>
									</div>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
						<div class='col-md-4'>
							<?php if ($ac == '') : ?>
								<?php
										if (isset($_POST['submit'])) {
											$nip = $_POST['nip'];
											$nama = $_POST['nama'];
											$nama = str_replace("'", "&#39;", $nama);
											$username = $_POST['username'];
											$pass1 = $_POST['pass1'];
											$pass2 = $_POST['pass2'];

											$cekuser = mysql_num_rows(mysql_query("SELECT * FROM pengawas WHERE username='$username'"));
											if ($cekuser > 0) {
												$info = info("Username $username sudah ada!", "NO");
											} else {
												if ($pass1 <> $pass2) {
													$info = info("Password tidak cocok!", "NO");
												} else {
													$password = $pass1;
													$exec = mysql_query("INSERT INTO pengawas (nip,nama,username,password,level) VALUES ('$nip','$nama','$username','$password','guru')");
													(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
												}
											}
										}
										?>
								<form action='' method='post'>
									<div class='box box-solid'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Tambah</h3>
											<div class='box-tools pull-right btn-group'>
												<button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
											</div>
										</div><!-- /.box-header -->
										<div class='box-body'>
											<?= $info; ?>
											<div class='form-group'>
												<label>NIP</label>
												<input type='text' name='nip' class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Nama</label>
												<input type='text' name='nama' class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Username</label>
												<input type='text' name='username' class='form-control' required='true' />
											</div>

											<div class='form-group'>
												<div class='row'>
													<div class='col-md-6'>
														<label>Password</label>
														<input type='password' name='pass1' class='form-control' required='true' />
													</div>
													<div class='col-md-6'>
														<label>Ulang Password</label>
														<input type='password' name='pass2' class='form-control' required='true' />
													</div>
												</div>
											</div>
										</div><!-- /.box-body -->
									</div><!-- /.box -->
								</form>
							<?php elseif ($ac == 'edit') : ?>
								<?php
										$id = $_GET['id'];
										$value = mysql_fetch_array(mysql_query("SELECT * FROM pengawas WHERE id_pengawas='$id'"));
										if (isset($_POST['submit'])) {
											$nip = $_POST['nip'];
											$nama = $_POST['nama'];
											$nama = str_replace("'", "&#39;", $nama);
											$username = $_POST['username'];
											$pass1 = $_POST['pass1'];
											$pass2 = $_POST['pass2'];

											if ($pass1 <> '' and $pass2 <> '') {
												if ($pass1 <> $pass2) {
													$info = info("Password tidak cocok!", "NO");
												} else {
													$password = $pass1;
													$exec = mysql_query("UPDATE pengawas SET nip='$nip',nama='$nama',username='$username',password='$password',level='guru' WHERE id_pengawas='$id'");
												}
											} else {
												$exec = mysql_query("UPDATE pengawas SET nip='$nip',nama='$nama',username='$username',level='guru' WHERE id_pengawas='$id'");
											}
											(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
										}
										?>
								<form action='' method='post'>
									<div class='box box-solid'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Edit</h3>
											<div class='box-tools pull-right btn-group'>
												<button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
												<a href='?pg=<?= $pg ?>' class='btn btn-sm bg-maroon' title='Batal'><i class='fa fa-times'></i></a>
											</div>
										</div><!-- /.box-header -->
										<div class='box-body'>
											<?= $info ?>
											<div class='form-group'>
												<label>NIP</label>
												<input type='text' name='nip' value="<?= $value['nip'] ?>" class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Nama</label>
												<input type='text' name='nama' value="<?= $value['nama'] ?>" class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Username</label>
												<input type='text' name='username' value="<?= $value['username'] ?>" class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<div class='row'>
													<div class='col-md-6'>
														<label>Password</label>
														<input type='password' name='pass1' class='form-control' />
													</div>
													<div class='col-md-6'>
														<label>Ulang Password</label>
														<input type='password' name='pass2' class='form-control' />
													</div>
												</div>
											</div>
										</div><!-- /.box-body -->
									</div><!-- /.box -->
								</form>
							<?php elseif ($ac == 'hapus') : ?>
								<?php
										$id = $_GET['id'];
										$info = info("Anda yakin akan menghapus pengawas ini?");
										if (isset($_POST['submit'])) {
											$exec = mysql_query("DELETE FROM pengawas WHERE id_pengawas='$id'");
											(!$exec) ? $info = info("Gagal menghapus!", "NO") : jump("?pg=$pg");
										}
										?>
								<form action='' method='post'>
									<div class='box box-danger'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Hapus</h3>
											<div class='box-tools pull-right btn-group'>
												<button type='submit' name='submit' class='btn btn-sm bg-maroon'><i class='fa fa-trash-o'></i> Hapus</button>
												<a href='?pg=$pg' class='btn btn-sm btn-default' title='Batal'><i class='fa fa-times'></i></a>
											</div>
										</div><!-- /.box-header -->
										<div class='box-body'>
											<?= $info ?>
										</div><!-- /.box-body -->
									</div><!-- /.box -->
								</form>
							<?php endif ?>
						</div>
					</div>
				<?php elseif ($pg == 'beritaacara') : ?>
					<?php if ($pengawas['level'] == 'admin') : ?>
						<?php
								$idberita = $_GET['id'];
								$sqlx = mysql_query("SELECT * FROM berita a LEFT JOIN mapel b ON a.id_mapel=b.id_mapel LEFT JOIN mata_pelajaran c ON b.nama=c.kode_mapel WHERE a.id_berita='$idberita'");
								$ujian = mysql_fetch_array($sqlx);
								$kodeujian = mysql_fetch_array(mysql_query("SELECT * FROM jenis WHERE id_jenis='$ujian[jenis]'"));
								$hari = buat_tanggal('D', $ujian['tgl_ujian']);
								$tanggal = buat_tanggal('d', $ujian['tgl_ujian']);
								// $bulan = buat_tanggal('F', $ujian['tgl_ujian']);
								$bulan = bulan_indo($ujian['tgl_ujian']);
								$tahun = buat_tanggal('Y', $ujian['tgl_ujian']);
								if (date('m') >= 7 and date('m') <= 12) {
									$ajaran = date('Y') . "/" . (date('Y') + 1);
								} elseif (date('m') >= 1 and date('m') <= 6) {
									$ajaran = (date('Y') - 1) . "/" . date('Y');
								}
								?>
						<div class='row'>
							<div class='col-md-12'>
								<div class='box box-solid'>
									<div class='box-header'>
										<h3 class='box-title'>Preview Berita Acara</h3>
										<div class='box-tools pull-right btn-group'>
											<button onclick="frames['printberita'].print()" class='btn btn-sm btn-flat btn-success'><i class='fa fa-print'></i> Print</button>
											<iframe name='printberita' src='beritaacara.php?id=<?= $idberita ?>' style='border:none;width:1px;height:1px;'></iframe>
										</div>
									</div>
									<div class='box-body' style='background:#c3c3c3;  height:1275px;'>
										<div class='table-responsive'>
											<div style='background:#fff; width:80%; margin:0 auto; padding:35px; height:90%;'>
												<!-- <table border='0' width='100%'> -->
												<table style="width:100%">
													<tr>
														<td rowspan='4' width='120' align='center'>
															<img src='../foto/tut.jpg' width='80'>
														</td>
														<td colspan='2' align='center'>
															<font size='+1'>
																<b>BERITA ACARA PELAKSANAAN</b>
															</font>
														</td>
														<td rowspan='7' width='120' align='center'><img src='../<?= $setting['logo'] ?>' width='65'></td>
													</tr>
													<tr>
														<td colspan='2' align='center'>
															<font size='+1'><b> <?= strtoupper($kodeujian['nama']) ?></b></font>
														</td>
													</tr>
													<tr>
														<td colspan='2' align='center'>
															<font size='+1'><b>TAHUN PELAJARAN <?= $ajaran ?></b></font>
														</td>
													</tr>
												</table>
												<br>
												<table border='0' width='95%' align='center'>
													<tr height='30'>
														<td height='30' colspan='4' style='text-align: justify;'>Pada hari ini <b> <?= $hari ?> </b> tanggal <b><?= $tanggal ?></b> bulan <b><?= $bulan ?></b> tahun <b><?= $tahun ?></b>, di <?= $setting['sekolah'] ?> telah diselenggarakan "<?= ucwords(strtolower($kodeujian['nama'])) ?>" untuk Mata Pelajaran <b><?= $ujian['nama_mapel'] ?></b> dari pukul <b><?= $ujian['mulai'] ?></b> sampai dengan pukul <b><?= $ujian['selesai'] ?></b></td>
													</tr>
												</table>
												<table border='0' width='95%' align='center'>
													<tr height='30'>
														<td height='30' width='5%'>1.</td>
														<td height='30' width='30%'>Kode Sekolah</td>
														<td height='30' width='60%' style='border-bottom:thin solid #000000'><?= $setting['kode_sekolah'] ?></td>
													</tr>
													<tr height='30'>
														<td height='30' width='10px'></td>
														<td height='30'>Sekolah/Madrasah</td>
														<td height='30' width='60%' style='border-bottom:thin solid #000000'><?= $setting['sekolah'] ?></td>
													</tr>
													<tr height='30'>
														<td height='30' width='5%'></td>
														<td height='30' width='30%'>Sesi</td>
														<td height='30' width='60%' style='border-bottom:thin solid #000000'><?= $ujian['sesi'] ?></td>
													</tr>
													<tr height='30'>
														<td height='30' width='5%'></td>
														<td height='30' width='30%'>Ruang</td>
														<td height='30' width='60%' style='border-bottom:thin solid #000000'><?= $ujian['ruang'] ?></td>
													</tr>
													<tr height='30'>
														<td height='30' width='10px'></td>
														<td height='30'>Jumlah Peserta Seharusnya</td>
														<td height='30' width='60%' style='border-bottom:thin solid #000000'><?= $ujian['ikut'] + $ujian['susulan'] ?></td>
													</tr>
													<tr height='30'>
														<td height='30' width='5%'></td>
														<td height='30' width='30%'>Jumlah Hadir (Ikut Ujian)</td>
														<td height='30' width='60%' style='border-bottom:thin solid #000000'><?= $ujian['ikut'] ?></td>
													</tr>
													<tr height='30'>
														<td height='30' width='10px'></td>
														<td height='30'>Jumlah Tidak Hadir</td>
														<td height='30' width='60%' style='border-bottom:thin solid #000000'><?= $ujian['susulan'] ?></td>
													</tr>
													<tr height='30'>
														<td height='30' width='10px'></td>
														<td height='30'>Nomer Peserta</td>
														<td height='30' width='60%' style='border-bottom:thin solid #000000'>
															<?php
																	$dataArray = unserialize($ujian['no_susulan']);
																	if ($dataArray) {
																		foreach ($dataArray as $key => $value) {
																			echo "<small class='label label-success'>$value </small>&nbsp;";
																		}
																	}
																	?>
														</td>
													</tr>
													<tr height='30'>
														<td height='30' width='10px'></td>
													</tr>
													<tr height='30'>
														<td height='30' width='5%'>2.</td>
														<td colspan='2' height='30' width='30%'>
															Catatan selama pelaksanaan ujian "<?= ucwords(strtolower($kodeujian['nama'])) ?>"
														</td>
													</tr>
													<tr height='120px'>
														<td height='30' width='5%'></td>
														<td colspan='2' style='border:solid 1px black'><?= $ujian['catatan'] ?></td>
													</tr>
													<tr height='30'>
														<td height='30' colspan='2' width='5%'>Yang membuat berita acara: </td>
													</tr>
												</table>
												<table border='0' width='80%' style='margin-left:50px'>
													<tr>
														<td colspan='4'></td>
														<td height='30' width='30%'>TTD</td>
													<tr>
														<td width='10%'>1. </td>
														<td width='20%'>Proktor</td>
														<td width='30%' style='border-bottom:thin solid #000000'><?= $ujian['nama_proktor'] ?></td>
														<td height='30' width='5%'></td>
														<td height='30' width='35%'></td>
													</tr>
													<tr>
														<td width='10%'> </td>
														<td width='20%'>NIP. </td>
														<td width='30%' style='border-bottom:thin solid #000000'><?= $ujian['nip_proktor'] ?></td>
														<td height='30' width='5%'></td>
														<td height='30' width='35%' style='border-bottom:thin solid #000000'> 1. </td>
													</tr>
													<tr>
														<td colspan='4'></td>
													</tr>
													<tr>
														<td width='10%'>2. </td>
														<td width='20%'>Pengawas</td>
														<td width='30%' style='border-bottom:thin solid #000000'><?= $ujian['nama_pengawas'] ?></td>
														<td height='30' width='5%'></td>
														<td height='30' width='35%'></td>
													</tr>
													<tr>
														<td width='10%'> </td>
														<td width='20%'>NIP. </td>
														<td width='30%' style='border-bottom:thin solid #000000'><?= $ujian['nip_pengawas'] ?></td>
														<td height='30' width='5%'></td>
														<td height='30' width='35%' style='border-bottom:thin solid #000000'> 2. </td>
													</tr>
													<tr>
														<td colspan='4'></td>
													</tr>
													<tr>
														<td width='10%'>3. </td>
														<td width='20%'>Kepala Sekolah</td>
														<td width='30%' style='border-bottom:thin solid #000000'><?= $setting['kepsek'] ?></td>
														<td height='30' width='5%'></td>
														<td height='30' width='35%'></td>
													</tr>
													<tr>
														<td width='10%'> </td>
														<td width='20%'>NIP. </td>
														<td width='30%' style='border-bottom:thin solid #000000'><?= $setting['nip'] ?></td>
														<td height='30' width='5%'></td>
														<td height='30' width='35%' style='border-bottom:thin solid #000000'> 3. </td>
													</tr>
												</table>
												<br><br><br><br><br>
												<table width='100%' height='30'>
													<tbody>
														<tr>
															<td width='25px' style='border:1px solid black'></td>
															<td width='5px'>&nbsp;</td>
															<td style='border:1px solid black;font-weight:bold;font-size:14px;text-align:center;'>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</td>
															<td width='5px'>&nbsp;</td>
															<td width='25px' style='border:1px solid black'></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif ?>
				<?php elseif ($pg == 'jadwal') : ?>
					<?php if (isset($_POST['tambahjadwal'])) : ?>
						<?php
								$tgl_ujian = $_POST['tgl_ujian'];
								$tgl_selesai = $_POST['tgl_selesai'];
								$kode_ujian = $_POST['kode_ujian'];
								$idmapel = $_POST['idmapel'];
								$mapelx = mysql_fetch_array(mysql_query("select * from mapel where id_mapel='$idmapel'"));
								$namamapel = $mapelx['nama'];
								$mapely = mysql_fetch_array(mysql_query("select * from mata_pelajaran where kode_mapel='$namamapel'"));
								$nama_mapel = $mapely['nama_mapel'];
								$jmlsoal = $mapelx['jml_soal'];
								$jml_esai = $mapelx['jml_esai'];
								$bobot_pg = $mapelx['bobot_pg'];
								$bobot_esai = $mapelx['bobot_esai'];
								$tampil_pg = $mapelx['tampil_pg'];
								$tampil_esai = $mapelx['tampil_esai'];
								$opsi = $mapelx['opsi'];
								$level = $mapelx['level'];
								$id_pk = $mapelx['idpk'];
								$wkt = explode(" ", $tgl_ujian);
								$wkt_ujian = $wkt[1];
								$lama_ujian = $_POST['lama_ujian'];
								$sesi = $_POST['sesi'];
								$idguru = $mapelx['idguru'];
								$kelas = $mapelx['kelas'];
								$acak = (isset($_POST['acak'])) ? 1 : 0;
								$token = (isset($_POST['token'])) ? 1 : 0;
								$hasil = (isset($_POST['hasil'])) ? 1 : 0;
								$kkm = $_POST['kkm'];
								$ulang = $_POST['ulang'];
								$cek = mysql_num_rows(mysql_query("SELECT * FROM ujian WHERE nama='$nama_mapel' AND sesi='$sesi' AND kode_ujian='$kode_ujian' AND level='$level' AND kelas ='$kelas'"));
								?>
						<?php if ($cek > 0) : ?>
							<div class='alert alert-danger alert-dismissible'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
								<h4><i class='icon fa fa-info'></i> Info</h4>
								Data jadwal tidak tersimpan karena data jadwal sudah ada
							</div>
						<?php else : ?>
							<?php
										if ($pengawas['level'] == 'admin') {
											$exec = mysql_query("INSERT INTO ujian (id_pk, id_mapel, nama,jml_soal,jml_esai,lama_ujian, tgl_ujian,tgl_selesai, waktu_ujian, level, sesi, acak, token,status,bobot_pg,bobot_esai,id_guru,tampil_pg,tampil_esai,hasil,kelas,opsi,kode_ujian,kkm,ulang) VALUES ('$id_pk','$idmapel','$nama_mapel','$jmlsoal','$jml_esai','$lama_ujian','$tgl_ujian','$tgl_selesai','$wkt_ujian','$level','$sesi','$acak','$token','1','$bobot_pg','$bobot_esai','$idguru','$tampil_pg','$tampil_esai','$hasil','$kelas','$opsi','$kode_ujian','$kkm','$ulang')");
										} else {
											$exec = mysql_query("INSERT INTO ujian (id_pk, id_mapel, nama,jml_soal,jml_esai,lama_ujian, tgl_ujian, tgl_selesai, waktu_ujian, level, sesi, acak, token,status,bobot_pg,bobot_esai,id_guru,tampil_pg,tampil_esai,hasil,kelas,opsi,kode_ujian,kkm,ulang) VALUES ('$id_pk','$idmapel','$nama_mapel','$jmlsoal','$jml_esai','$lama_ujian','$tgl_ujian','$tgl_selesai','$wkt_ujian','$level','$sesi','$acak','$token','1','$bobot_pg','$bobot_esai','$id_pengawas','$tampil_pg','$tampil_esai','$hasil','$kelas','$opsi','$kode_ujian','$kkm','$ulang')");
										}
										?>
							<div class='alert alert-success alert-dismissible'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
								<h4><i class='icon fa fa-info'></i> Info</h4>
								Data jadwal ujian berhasil disimpan,,,
							</div>
						<?php endif ?>
					<?php endif ?>
					<div class='modal fade' id='tambahjadwal' style='display: none;'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header bg-maroon'>
									<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
									<h4 class='modal-title'><img src='../dist/img/svg/jadwal_ujian.svg' width='20'> Tambah Jadwal Ujian</h4>
								</div>
								<div class='modal-body'>
									<form action='' method='post'>
										<div class='form-group'>
											<label>Nama Bank Soal</label>
											<select name='idmapel' class='form-control' required='true'>
												<?php
													if ($pengawas['level'] == 'admin') {
														$namamapelx = mysql_query("SELECT * FROM mapel where status='1' order by nama ASC");
													} else {
														$namamapelx = mysql_query("SELECT * FROM mapel where status='1' and idguru='$id_pengawas' order by nama ASC");
													}
													while ($namamapel = mysql_fetch_array($namamapelx)) {
														$dataArray = unserialize($namamapel['kelas']);
														echo "<option value='$namamapel[id_mapel]'>$namamapel[nama] - $namamapel[level] - ";
														foreach ($dataArray as $key => $value) {
															echo "$value ";
														}
														echo "</option>";
													}
													?>
											</select>
										</div>
										<div class='form-group'>
											<label>Nama Jenis Ujian</label>
											<select name='kode_ujian' class='form-control' required='true'>
												<option value=''>Pilih Jenis Ujian </option>
												<?php
													$namaujianx = mysql_query("SELECT * FROM jenis where status='aktif' order by nama ASC");
													while ($ujian = mysql_fetch_array($namaujianx)) {
														echo "<option value='$ujian[id_jenis]'>$ujian[id_jenis] - $ujian[nama] </option>";
													}
													?>
											</select>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-6'>
													<label>Tanggal Mulai Ujian</label>
													<input type='text' name='tgl_ujian' class='tgl form-control' autocomplete='off' required='true' />
												</div>
												<div class='col-md-6'>
													<label>Tanggal Waktu Expired</label>
													<input type='text' name='tgl_selesai' class='tgl form-control' autocomplete='off' required='true' />
												</div>
											</div>
										</div>
										<div class='form-group'>
											<label>Sesi</label>
											<select name='sesi' class='form-control' required='true'>
												<?php
													$sesix = mysql_query("SELECT * from sesi");
													while ($sesi = mysql_fetch_array($sesix)) {
														echo "<option value='$sesi[kode_sesi]'>$sesi[kode_sesi]</option>";
													}
													?>
											</select>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-4'>
													<label>Lama ujian (menit)</label>
													<input type='number' name='lama_ujian' class='form-control' required='true' />
												</div>
												<div class='col-md-4'>
													<label>KKM</label>
													<input type='number' name='kkm' class='form-control' />
												</div>
												<div class='col-md-4'>
													<label>Jumlah Remidi</label>
													<input type='number' name='ulang' class='form-control' />
												</div>
											</div>
										</div>
										<div class='form-group'>
											<label></label><br>
											<label>
												<input type='checkbox' class='icheckbox_square-green' name='acak' value='1' $acak /> Acak Soal
											</label>
											<?php if ($pengawas['level'] == 'admin') : ?>
												<label>
													<input type='checkbox' class='icheckbox_square-green' name='token' value='1' $token /> Token Soal
												</label>
											<?php endif ?>
											<label>
												<input type='checkbox' class='icheckbox_square-green' name='hasil' value='1' $hasil /> Hasil Tampil
											</label>
										</div>
										<div class='modal-footer'>
											<button name='tambahjadwal' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan Semua</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border '>
									<h3 class='box-title'><img src='../dist/img/svg/jadwal_ujian.svg' width='20'> Jadwal Ujian</h3>
									<div class='box-tools pull-right btn-group'>
										<?php if ($pengawas['level'] == 'admin') : ?>
											<a id='btnhapusjadwal' class='btn btn-sm bg-maroon'><i class='glyphicon glyphicon-trash'></i> Kosongkan</a>
										<?php endif ?>
										<button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-backdrop='static' data-target='#tambahjadwal'><i class='glyphicon glyphicon-plus'></i> Tambah Jadwal</button>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<div class=''>
										<div id='tablereset' class='table-responsive'>
											<table class='table table-bordered table-striped '>
												<thead>
													<tr>
														<th width='5px'><input type='checkbox' id='ceksemua'></th>
														<th width='5px'>#</th>
														<th>Mata Pelajaran</th>
														<th>Level/Jur/Kelas</th>
														<th>Durasi</th>
														<th>Tgl Waktu Ujian</th>
														<th>Sesi</th>
														<th>Acak/Token/Hasil</th>
														<th>Status</th>
														<th width='90px'></th>
													</tr>
												</thead>
												<tbody>
													<?php
														if (isset($_POST['update'])) {
															$idujian = $_POST['idu'];
															$kode_ujian = $_POST['kode_ujian'];
															$sesi = $_POST['sesi'];
															$nama = $_POST['namamapel'];
															$nama = str_replace("'", "&#39;", $nama);
															$tglujian = $_POST['tgl_ujian'];
															$tglselesai = $_POST['tgl_selesai'];
															$lama = $_POST['lama_ujian'];
															$waktu = explode(" ", $tglujian);
															$waktu = $waktu[1];
															$status = $_POST['status'];
															$exec = mysql_query("UPDATE ujian SET sesi='$sesi',nama='$nama',tgl_ujian='$tglujian',tgl_selesai='$tglselesai',waktu_ujian='$waktu',lama_ujian='$lama',status='$status',kode_ujian='$kode_ujian' WHERE id_ujian='$idujian'");
															(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
														}
														if ($pengawas['level'] == 'admin') {
															$mapelQ = mysql_query("SELECT * FROM ujian ORDER BY tgl_ujian ASC, waktu_ujian ASC");
														} else {
															$mapelQ = mysql_query("SELECT * FROM ujian where id_guru='$id_pengawas' ORDER BY tgl_ujian ASC, waktu_ujian ASC");
														}
														?>
													<?php while ($mapel = mysql_fetch_array($mapelQ)) : ?>
														<?php
																$tgl = explode(" ", $mapel['tgl_ujian']);
																$tgl = $tgl[0];
																$no++;
																?>
														<tr>
															<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $mapel['id_ujian'] ?>"></td>
															<td><?= $no ?></td>
															<td>
																<?php
																		if ($mapel['id_pk'] == '0') {
																			$jur = 'Semua';
																		} else {
																			$jur = $mapel['id_pk'];
																		}
																		?>
																<b><small class='label bg-red'><?= $mapel['kode_ujian'] ?></small> <small class='label bg-purple'><?= $mapel['nama'] ?></small></b>
															</td>
															<td>
																<small class='label label-primary'><?= $mapel['level'] ?></small>
																<small class='label label-primary'><?= $jur ?></small>
																<?php
																		$dataArray = unserialize($mapel['kelas']);
																		foreach ($dataArray as $key => $value) {
																			echo "<small class='label label-success'>$value </small>&nbsp;";
																		}
																		?>
															</td>
															<td><small class='label label-warning'>
																	<?= $mapel['tampil_pg'] ?> Soal / <?= $mapel['lama_ujian'] ?> m / <?= $mapel['opsi'] ?> opsi</small>
															</td>
															<td>
																<small class='label bg-purple'><i class='fa fa-clock-o'></i> <?= $mapel['tgl_ujian'] ?></small><small class='label bg-purple'><?= $mapel['tgl_selesai'] ?></small>
															</td>
															<td style="text-align:center">
																<small class='label bg-green'><?= $mapel['sesi'] ?></small>
															</td>
															<td>
																<?php
																		if ($mapel['acak'] == 1) {
																			echo "<label class='label label-success'>Ya</label> ";
																		} elseif ($mapel['acak'] == 0) {
																			echo "<label class='label label-danger'>Tidak</label> ";
																		}
																		if ($mapel['token'] == 1) {
																			echo "<label class='label label-success'>Ya</label> ";
																		} elseif ($mapel['token'] == 0) {
																			echo "<label class='label label-danger'>Tidak</label> ";
																		}
																		if ($mapel['hasil'] == 1) {
																			echo "<label class='label label-success'>Ya</label> ";
																		} elseif ($mapel['hasil'] == 0) {
																			echo "<label class='label label-danger'>Tidak</label> ";
																		}
																		?>
															</td>
															<td style="text-align:center">
																<?php
																		if ($mapel['status'] == 1) {
																			echo "<label class='label label-success'>Aktif</label>";
																		} elseif ($mapel['status'] == 0) {
																			echo "<label class='label label-danger'>Tidak Aktif</label>";
																		}
																		?>
															</td>
															<td style="text-align:center">
																<div class='btn-grou'>
																	<a class='btn btn-warning btn-flat btn-xs' data-toggle='modal' data-backdrop="static" data-target="#edit<?= $mapel['id_ujian'] ?>"><i class='fa fa-pencil-square-o'></i></a>
																</div>
															</td>
														</tr>
														<div class='modal fade' id="edit<?= $mapel['id_ujian'] ?>" style='display: none;'>
															<div class='modal-dialog'>
																<div class='modal-content'>
																	<div class='modal-header bg-olive'>
																		<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																		<h4 class='modal-title'><img src='../dist/img/svg/jadwal_ujian.svg' width='20'> Edit Jadwal Ujian</h4>
																	</div>
																	<div class='modal-body'>
																		<form action='' method='post'>
																			<div class='form-group'>
																				<label>Nama Ujian</label>
																				<input type='text' name='namamapel' value="<?= $mapel['nama'] ?>" class='form-control' readonly />
																			</div>
																			<div class='form-group'>
																				<label>Nama Jenis Ujian</label>
																				<select name='kode_ujian' class='form-control' required='true'>
																					<option value=''>Pilih Jenis Ujian </option>
																					<?php
																							$namaujianx = mysql_query("SELECT * FROM jenis where status='aktif' order by nama ASC");
																							while ($ujian = mysql_fetch_array($namaujianx)) {
																								($ujian['id_jenis'] == $mapel['kode_ujian']) ? $s = 'selected' : $s = '';
																								echo "<option value='$ujian[id_jenis]' $s>$ujian[id_jenis] - $ujian[nama] </option>";
																							}
																							?>
																				</select>
																			</div>
																			<div class='form-group'>
																				<div class='row'>
																					<div class='col-md-6'>
																						<label>Tanggal Ujian</label>
																						<input name='tgl_ujian' value="<?= $mapel['tgl_ujian'] ?>" autocomplete='off' class='tgl form-control' required='true' />
																					</div>
																					<div class='col-md-6'>
																						<label>Tanggal Selesai</label>
																						<input name='tgl_selesai' value="<?= $mapel['tgl_selesai'] ?>" autocomplete='off' class='tgl form-control' required='true' />
																					</div>
																				</div>
																			</div>
																			<div class='form-group'>
																				<div class='row'>
																					<div class='col-md-6'>
																						<label>Lama Ujian</label>
																						<input type='number' name='lama_ujian' value="<?= $mapel['lama_ujian'] ?>" class='form-control' required='true' />
																					</div>
																					<div class='col-md-6'>
																						<label>Sesi</label>
																						<input type='number' name='sesi' value="<?= $mapel['sesi'] ?>" class='form-control' required='true' />
																					</div>
																				</div>
																			</div>
																			<div class='form-group'>
																				<label>Status</label>
																				<select name='status' class='form-control'>
																					<option value='1'>Aktif</option>
																					<option value='0'>Tidak Aktif</option>
																				</select>
																			</div>
																			<input type='hidden' id='idm' name='idu' value="<?= $mapel['id_ujian'] ?>" />
																			<div class='modal-footer'>
																				<div class='box-tools pull-right btn-group'>
																					<button type='submit' name='update' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Update</button>
																					<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
																				</div>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													<?php endwhile ?>
												</tbody>
											</table>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							<?php
								if ($ac == 'kosongkan') {
									mysql_query("TRUNCATE ujian");
									jump('?pg=jadwal');
								}
								?>
						</div>
					</div>
				<?php elseif ($pg == 'berita') : ?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border '>
									<h3 class='box-title'><img src='../dist/img/svg/berita_acara.svg' width='20'> Berita Acara</h3>
									<div class='box-tools pull-right btn-group'>
										<?php if ($pengawas['level'] == 'admin') : ?>
											<button id='buatberita' class='btn btn-sm btn-flat btn-success'><i class='fa fa-refresh'></i> Generate</button>
										<?php endif ?>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<div id='tableberita' class='table-responsive'>
										<table class='table table-bordered table-striped  table-hover'>
											<thead>
												<tr>
													<th width='5px'>#</th>
													<th>Mata Pelajaran</th>
													<th>Level/Jur/Kelas</th>
													<th>Sesi</th>
													<th>Ruang</th>
													<th>Hadir</th>
													<th>Tidak Hadir</th>
													<th>Mulai</th>
													<th>Selesai</th>
													<th>Pengawas</th>
													<th width='50px'></th>
												</tr>
											</thead>
											<tbody>
												<?php
													$beritaQ = mysql_query("SELECT * FROM berita");
													?>
												<?php while ($berita = mysql_fetch_array($beritaQ)) : ?>
													<?php
															$mapel = mysql_fetch_array(mysql_query("select * from mapel a left join mata_pelajaran b ON a.nama=b.kode_mapel where a.id_mapel='$berita[id_mapel]'"));
															$no++
															?>
													<tr>
														<td><?= $no ?></td>
														<td>
															<b><small class='label bg-purple'><?= $mapel['nama_mapel'] ?></small></b> <small class='label bg-red'><?= $berita['jenis'] ?></small>
														</td>
														<td>
															<small class='label label-primary'><?= $mapel['level'] ?></small>
															<small class='label label-primary'><?= $mapel['idpk'] ?></small>
															<?php
																	$dataArray = unserialize($mapel['kelas']);
																	foreach ($dataArray as $key => $value) {
																		echo "<small class='label label-success'>$value </small>&nbsp;";
																	}
																	?>
														</td>
														<td style="text-align:center">
															<b><small class='label bg-purple'><?= $berita['sesi'] ?></small></b>
														</td>
														<td style="text-align:center">
															<small class='label bg-green'><?= $berita['ruang'] ?></small>
														</td>
														<td style="text-align:center">
															<?= $berita['ikut'] ?>
														</td>
														<td style="text-align:center">
															<?= $berita['susulan'] ?>
														</td>
														<td style="text-align:center">
															<?= $berita['mulai'] ?>
														</td>
														<td style="text-align:center">
															<?= $berita['selesai'] ?>
														</td>
														<td>
															<?= $berita['nama_pengawas'] ?>
														</td>
														<td style="text-align:center">
															<div class='btn-group'>
																<a class='btn btn-flat btn-success btn-flat btn-xs' data-toggle='modal' data-backdrop='static' data-target="#print<?= $berita['id_berita'] ?>"><i class='glyphicon glyphicon-print'></i></a>
															</div>
														</td>
													</tr>
													<?php
															if (isset($_POST['print'])) {
																$idberita = $_POST['idu'];
																$tglujian = $_POST['tgl_ujian'];
																$hadir = $_POST['hadir'];
																$tidakhadir = $_POST['tidakhadir'];
																$mulai = $_POST['mulai'];
																$selesai = $_POST['selesai'];
																$pengawas = $_POST['nama_pengawas'];
																$nippengawas = $_POST['nip_pengawas'];
																$proktor = $_POST['nama_proktor'];
																$nipproktor = $_POST['nip_proktor'];
																$catatan = $_POST['catatan'];
																$nosusulan = serialize($_POST['nosusulan']);
																$exec = mysql_query("UPDATE berita SET ikut='$hadir',susulan='$tidakhadir',mulai='$mulai',selesai='$selesai',nama_pengawas='$pengawas',nip_pengawas='$nippengawas', nama_proktor='$proktor',nip_proktor='$nipproktor',catatan='$catatan',tgl_ujian='$tglujian',no_susulan='$nosusulan' WHERE id_berita='$idberita'");
																(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=beritaacara&id=$idberita");
															}
															?>
													<div class='modal fade' id="print<?= $berita['id_berita'] ?>" style='display: none;'>
														<div class='modal-dialog'>
															<div class='modal-content'>
																<div class='modal-header bg-olive'>
																	<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																	<h4 class='modal-title'><img src='../dist/img/svg/print.svg' width='20'> Print Berita Acara</h4>
																</div>
																<div class='modal-body'>
																	<form action='' method='post'>
																		<div class='col-md-4'>
																			<div class='form-group'>
																				<label>Nama Ujian</label>
																				<input type='text' name='namamapel' value="<?= $mapel['nama'] ?>" class='form-control' disabled />
																			</div>
																		</div>
																		<div class='col-md-4'>
																			<div class='form-group'>
																				<label>Sesi</label>
																				<input type='text' name='sesi' value="<?= $berita['sesi'] ?>" class='form-control' disabled />
																			</div>
																		</div>
																		<div class='col-md-4'>
																			<div class='form-group'>
																				<label>Ruang</label>
																				<input type='text' name='ruang' value="<?= $berita['ruang'] ?>" class='form-control' disabled />
																			</div>
																		</div>
																		<div class='col-md-4'>
																			<div class='form-group'>
																				<label>Tanggal Ujian</label>
																				<input name='tgl_ujian' value="<?= $berita['tgl_ujian'] ?>" class='datepicker form-control' autocomplete=off />
																			</div>
																		</div>
																		<div class='col-md-2'>
																			<div class='form-group'>
																				<label>Mulai</label>
																				<input id='waktumulai' type='text' name='mulai' value="<?= $berita['mulai'] ?>" class='timer form-control' autocomplete=off />
																			</div>
																		</div>
																		<div class='col-md-2'>
																			<div class='form-group'>
																				<label>Selesai</label>
																				<input id='waktumulai' type='text' name='selesai' value="<?= $berita['selesai'] ?>" class='timer form-control' autocomplete=off />
																			</div>
																		</div>
																		<div class='col-md-2'>
																			<div class='form-group'>
																				<label>Hadir</label>
																				<input type='number' name='hadir' value="<?= $berita['ikut'] ?>" class='form-control' required='true' />
																			</div>
																		</div>
																		<div class='col-md-2'>
																			<div class='form-group'>
																				<label>Absen</label>
																				<input type='number' name='tidakhadir' value="<?= $berita['susulan'] ?>" class='form-control' required='true' />
																			</div>
																		</div>
																		<div class='col-md-12'>
																			<div class='form-group'>
																				<label>Siswa Tidak Hadir</label><br>
																				<select name='nosusulan[]' class='form-control select2' multiple='multiple' style='width:100%'>
																					<?php
																							$bruang = $berita['ruang'];
																							$bsesi = $berita['sesi'];
																							$lev = mysql_query("SELECT * FROM siswa where ruang='$bruang' and sesi='$bsesi' ORDER BY nama ASC");
																							while ($siswa = mysql_fetch_array($lev)) {
																								echo "<option value='$siswa[no_peserta]'>$siswa[no_peserta] $siswa[nama]</option>";
																							}
																							?>
																				</select>
																			</div>
																		</div>
																		<div class='col-md-6'>
																			<div class='form-group'>
																				<label>Nama Proktor</label>
																				<input type='text' name='nama_proktor' value="<?= $berita['nama_proktor'] ?>" class='form-control' required='true' />
																			</div>
																		</div>
																		<div class='col-md-6'>
																			<div class='form-group'>
																				<label>NIP Proktor</label>
																				<input type='text' name='nip_proktor' value="<?= $berita['nip_proktor'] ?>" class='form-control' required='true' />
																			</div>
																		</div>
																		<div class='col-md-6'>
																			<div class='form-group'>
																				<label>Nama Pengawas</label>
																				<input type='text' name='nama_pengawas' value="<?= $berita['nama_pengawas'] ?>" class='form-control' required='true' />
																			</div>
																		</div>
																		<div class='col-md-6'>
																			<div class='form-group'>
																				<label>NIP Pengawas</label>
																				<input type='text' name='nip_pengawas' value="<?= $berita['nip_pengawas'] ?>" class='form-control' required='true' />
																			</div>
																		</div>
																		<div class='col-md-12'>
																			<div class='form-group'>
																				<label>Catatan</label>
																				<textarea type='text' name='catatan' class='form-control' required='true'><?= $berita['catatan'] ?></textarea>
																			</div>
																		</div>
																		<input type='hidden' id='idm' name='idu' value="<?= $berita['id_berita'] ?>" />
																		<div class='modal-footer'>
																			<div class='box-tools pull-right btn-group'>
																				<button type='submit' name='print' class='btn btn-sm btn-flat btn-success'><i class='fa fa-print'></i> Print</button>
																				<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
												<?php endwhile ?>
											</tbody>
										</table>
									</div>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
					</div>
				<?php elseif ($pg == 'nilai') : ?>
					<?php include 'nilai.php'; ?>
				<?php elseif ($pg == 'semuanilai') : ?>
					<?php include 'semuanilai.php'; ?>
				<?php elseif ($pg == 'susulan') : ?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border '>
									<h3 class='box-title'><i class='fa fa-file'></i> Daftar Siswa Susulan</h3>
									<div class='box-tools pull-right btn-group'>
									</div>
								</div>
								<div class='box-body'>
									<div id='tableberita' class='table-responsive'>
										<table class='table table-bordered table-striped  table-hover'>
											<thead>
												<tr>
													<th width='5px'>#</th>
													<th>No Peserta</th>
													<th>Nama Siswa</th>
													<th>Mata Ujian</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$beritaQ = mysql_query("SELECT * FROM berita WHERE no_susulan <> ''");
													?>
												<?php while ($berita = mysql_fetch_array($beritaQ)) : ?>
													<?php
															$mapel = mysql_fetch_array(mysql_query("SELECT * FROM mapel a LEFT JOIN mata_pelajaran b ON a.nama=b.kode_mapel WHERE a.id_mapel='$berita[id_mapel]'"));
															$dataArray = unserialize($berita['no_susulan']);
															?>
													<?php foreach ($dataArray as $key => $value) : ?>
														<?php
																	$siswaQ = mysql_query("select * from siswa where no_peserta='$value'");
																	?>
														<?php while ($siswa = mysql_fetch_array($siswaQ)) : ?>
															<?php
																			$cek = mysql_num_rows(mysql_query("select * from nilai where id_mapel='$berita[id_mapel]' and id_siswa='$siswa[id_siswa]'"));
																			?>
															<?php if ($cek == 0) : ?>
																<?php $no++; ?>
																<tr>
																	<td><?= $no ?></td>
																	<td><?= $siswa['no_peserta'] ?></td>
																	<td><?= $siswa['nama'] ?></td>
																	<td><?= $mapel['nama_mapel'] ?></td>
																</tr>
															<?php endif ?>
														<?php endwhile ?>
													<?php endforeach ?>
												<?php endwhile ?>
											</tbody>
										</table>
									</div>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
					</div>
				<?php elseif ($pg == 'status') : ?>
					<?php if ($ac == '') : ?>
						<div class='row'>
							<div class='col-md-12'>
								<div class='alert alert-warning alert-dismissible'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
									<i class='icon fa fa-info'></i>
									Status peserta akan muncul saat ujian berlangsung ..
								</div>
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Status Peserta </h3>
										<div class='box-tools pull-right btn-group'>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<div class='table-responsive'>
											<table id='tablestatus' class='table table-bordered table-striped'>
												<thead>
													<tr>
														<th width='5px'>#</th>
														<th>NIS</th>
														<th>Nama</th>
														<th>Kelas</th>
														<th>Mapel</th>
														<th>Lama Ujian</th>
														<th>Jawaban</th>
														<th>Nilai</th>
														<th>Ip Address</th>
														<th>Status</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody id='divstatus'>
												</tbody>
											</table>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
						</div>
					<?php endif ?>
				<?php elseif ($pg == 'kartu') : ?>
					<?php if ($ac == '') : ?>
						<div class='row'>
							<div class='col-md-3'></div>
							<div class='col-md-6'>
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Kartu Peserta Ujian</h3>
										<div class='box-tools pull-right btn-group'>
											<button class='btn btn-sm btn-flat btn-success' onclick="frames['frameresult'].print()"><i class='fa fa-print'></i> Print</button>
											<a href='?pg=siswa' class='btn btn-sm bg-maroon' title='Batal'><i class='fa fa-times'></i></a>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<?= $info ?>
										<div class='form-group'>
											<label>Header Kartu</label>
											<textarea id='headerkartu' class='form-control' onchange='kirim_form();' rows='3'><?= $setting['header_kartu'] ?></textarea>
										</div>
										<div class='form-group'>
											<label>Kelas</label>
											<div class='row'>
												<div class='col-xs-4'>
													<?php
															$total = mysql_num_rows(mysql_query("SELECT * FROM kelas"));
															$limit = number_format($total / 3, 0, '', '');
															$limit2 = number_format($limit * 2, 0, '', '');
															$sql_kelas = mysql_query("SELECT * FROM kelas ORDER BY nama ASC LIMIT 0,$limit");
															?>
													<?php while ($kelas = mysql_fetch_array($sql_kelas)) : ?>
														<div class='radio'>
															<label><input type='radio' name='idk' value="<?= $kelas['id_kelas'] ?>" onclick="printkartu('<?= $kelas[0] ?>')" /> <?= $kelas['nama'] ?></label>
														</div>
													<?php endwhile ?>
												</div>
												<div class='col-xs-4'>
													<?php
															$sql_kelas = mysql_query("SELECT * FROM kelas ORDER BY nama ASC LIMIT $limit,$limit");
															?>
													<?php while ($kelas = mysql_fetch_array($sql_kelas)) : ?>
														<div class='radio'>
															<label><input type='radio' name='idk' value="<?= $kelas['id_kelas'] ?>" onclick="printkartu('<?= $kelas[0] ?>')" /> <?= $kelas['nama'] ?></label>
														</div>
													<?php endwhile ?>
												</div>
												<div class='col-xs-4'>
													<?php
															$sql_kelas = mysql_query("SELECT * FROM kelas ORDER BY nama ASC LIMIT $limit2,$total");
															?>
													<?php while ($kelas = mysql_fetch_array($sql_kelas)) : ?>
														<div class='radio'>
															<label><input type='radio' name='idk' value="<?= $kelas['id_kelas'] ?>" onclick="printkartu('<?= $kelas[0] ?>')" /> <?= $kelas['nama'] ?></label>
														</div>
													<?php endwhile ?>
												</div>
											</div>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
						</div>
						<iframe id='loadframe' name='frameresult' src='kartu.php' style='border:none;width:1px;height:1px;'></iframe>
					<?php endif ?>
				<?php elseif ($pg == 'absen') : ?>
					<?php if ($ac == '') : ?>
						<div class='row'>
							<div class='col-md-3'></div>
							<div class='col-md-6'>
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Daftar Hadir Peserta</h3>
										<div class='box-tools pull-right btn-group'>
											<button id='btnabsen' class='btn btn-sm btn-flat btn-success' onclick="frames['frameresult'].print()"><i class='fa fa-print'></i> Print</button>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<?= $info ?>
										<div class='form-group'>
											<div class='form-group'>
												<label>Pilih Mapel</label>
												<select id='mapel' class='select2 form-control' onchange=printabsen();>
													<?php
															$sql_mapel = mysql_query("SELECT * FROM ujian group by nama");
															?>
													<option value=''>pilih mapel</option>
													<?php while ($mapel = mysql_fetch_array($sql_mapel)) : ?>
														<option value="<?= $mapel['id_mapel'] ?>"><?= $mapel['nama'] ?></option>
													<?php endwhile ?>
												</select>
											</div>
											<div class='form-group'>
												<label>Pilih Sesi</label>
												<select id='sesi' class='form-control select2' onchange=printabsen();>
													<?php
															$sql_sesi = mysql_query("SELECT * FROM siswa GROUP BY sesi")
															?>
													<option value=''>pilih sesi</option>
													<?php while ($sesi = mysql_fetch_array($sql_sesi)) : ?>
														echo "<option value="<?= $sesi['sesi'] ?>">sesi&nbsp;<?= $sesi['sesi'] ?></option>
													<?php endwhile ?>
												</select>
											</div>
											<div class='form-group'>
												<label>Pilih Ruang</label>
												<select id='ruang' class='form-control select2 ' onchange=printabsen();>";
													<?php
															$sql_sesi = mysql_query("SELECT * FROM ruang ");
															?>
													<option value=''>pilih Ruang</option>
													<?php while ($ruang = mysql_fetch_array($sql_sesi)) : ?>
														<option value="<?= $ruang['kode_ruang'] ?>"><?= $ruang['kode_ruang'] ?></option>
													<?php endwhile ?>
												</select>
											</div>
											<div class='form-group'>
												<label>Pilih Kelas</label>
												<select id='kelas' class='form-control select2' onchange=printabsen();>
													<?php
															$sql_sesi = mysql_query("SELECT * FROM kelas")
															?>
													<option value=''>pilih Kelas</option>
													<?php while ($kelas = mysql_fetch_array($sql_sesi)) : ?>
														<option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama'] ?></option>
													<?php endwhile ?>
												</select>
											</div>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
						</div>
						<iframe id='loadabsen' name='frameresult' src='absen.php' style='border:none;width:0px;height:0px;'></iframe>
					<?php endif ?>
				<?php elseif ($pg == 'siswa') : ?>
					<?php include 'master_siswa.php'; ?>
				<?php elseif ($pg == 'uplfotosiswa') : ?>
					<?php
						cek_session_admin();
						if (isset($_POST["uplod"])) {
							$output = '';
							if ($_FILES['zip_file']['name'] != '') {
								$file_name = $_FILES['zip_file']['name'];
								$array = explode(".", $file_name);
								$name = $array[0];
								$ext = $array[1];
								if ($ext == 'zip') {
									$path = '../foto/fotosiswa/';
									$location = $path . $file_name;
									if (move_uploaded_file($_FILES['zip_file']['tmp_name'], $location)) {
										$zip = new ZipArchive;
										if ($zip->open($location)) {
											$zip->extractTo($path);
											$zip->close();
										}
										$files = scandir($path);
										foreach ($files as $file) {
											$file_ext = pathinfo($file, PATHINFO_EXTENSION);
											$allowed_ext = array('jpg', 'JPG');
											if (in_array($file_ext, $allowed_ext)) {
												$output .= '<div class="col-md-3"><div style="padding:16px; border:1px solid #CCC;"><img class="img img-responsive" style="height:150px;" src="../foto/fotosiswa/' . $file . '" /></div></div>';
											}
										}
										unlink($location);
										$pesan = "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa fa-check'></i> Info</h4>Upload File zip berhasil</div>";
									}
								} else {
									$pesan = "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa fa-info'></i> Gagal Upload</h4>Mohon Upload file zip</div>";
								}
							}
						}
						?>
					<?php
						if (isset($_POST['hapussemuafoto'])) {
							$files = glob('../foto/fotosiswa/*'); // Ambil semua file yang ada dalam folder
							foreach ($files as $file) { // Lakukan perulangan dari file yang kita ambil
								if (is_file($file)) // Cek apakah file tersebut benar-benar ada
									unlink($file); // Jika ada, hapus file tersebut
							}
						}
						?>
					<div class='box box-danger'>
						<div class='box-header with-border'>
							<h3 class='box-title'>Upload Foto Peserta Ujian</h3>
							<div class='box-tools pull-right btn-group'>
								<a href='?pg=siswa' class='btn btn-sm bg-maroon' title='Batal'><i class='fa fa-times'></i></a>
							</div>
						</div><!-- /.box-header -->
						<div class='box-body'>
							<div class='alert alert-danger alert-dismissible'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
								<h4><i class='icon fa fa-info'></i> Info</h4>
								Upload gambar dalam berkas zip. Penamaan gambar sesuai dengan no peserta siswa ujian
							</div>
							<form action='' method='post' enctype='multipart/form-data'>
								<div class='col-md-6'>
									<input class='form-control' type='file' name='zip_file' accept='.zip' />
								</div>
								<div class='col-md-6'>
									<button class='btn bg-maroon' name='uplod' type='submit'>Upload Foto</button>
								</div>
							</form>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
					<div class='box box-solid'>
						<div class='box-header with-border'>
							<h3 class='box-title'>Daftar Foto Peserta</h3>
							<div class='box-tools pull-right btn-group'>
								<form action='' method='post'>
									<button class='btn btn-sm bg-maroon' name='hapussemuafoto'>hapus semua foto</button>
								</form>
							</div>
						</div><!-- /.box-header -->
						<div class='box-body'>
							<?php
								$folder = "../foto/fotosiswa/"; //Sesuaikan Folder nya
								if (!($buka_folder = opendir($folder))) die("eRorr... Tidak bisa membuka Folder");
								$file_array = array();
								while ($baca_folder = readdir($buka_folder)) :
									$file_array[] = $baca_folder;
								endwhile;
								$jumlah_array = count($file_array);
								for ($i = 2; $i < $jumlah_array; $i++) :
									$nama_file = $file_array;
									$nomor = $i - 1;
									echo "<div class='col-md-1'><img class='img-logo' src='$folder$nama_file[$i]' style='width:65px'/><br><br></div>";
								endfor;
								closedir($buka_folder);
								?>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				<?php elseif ($pg == 'importmaster') : ?>
					<?php
						cek_session_admin();
						if ($setting['jenjang'] == 'SMK') :
							$format = 'importdatamaster.xls';
						else :
							$format = 'importdatamaster2.xls';
						endif;
						?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border '>
									<h3 class='box-title'><img src='../dist/img/svg/data_master.svg' width='20'> Import Data Master</h3>
									<div class='box-tools pull-right btn-group'>
										<a href='<?= $format ?>' class='btn btn-sm btn-flat btn-success'><i class='fa fa-file-excel-o'></i> Download Format</a>
										<a href='?pg=siswa' class='btn btn-sm btn-flat btn-success' title='Batal'><i class='fa fa-times'></i></a>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<?= $info ?>
									<div class='box box-solid'>
										<div class='box-body'>
											<div class='form-group'>
												<div class='row'>
													<form id='formsiswa' enctype='multipart/form-data'>
														<div class='col-md-4'>
															<label>Pilih File</label>
															<input type='file' name='file' class='form-control' required='true' />
														</div>
														<div class='col-md-4'>
															<label>&nbsp;</label><br>
															<button type='submit' name='submit' class='btn btn-flat btn-success'><i class='fa fa-check'></i> Import Data</button>
														</div>
													</form>
												</div>
											</div>
											<p>Menu ini berfungsi untuk import data Master</p>
											<p><strong>*Import Data Siswa, Jurusan, Kelas, Ruangan, Sesi dan Level</strong></p>
											<p>Sebelum meng-import pastikan file yang akan anda import sudah dalam bentuk Ms. Excel 97-2003 Workbook (.xls) dan format penulisan harus sesuai dengan yang telah ditentukan.</p>
											<div id='progressbox'></div>
											<div id='hasilimport'></div>
										</div>
									</div>
								</div><!-- /.box-body -->
								<div class='box-footer'></div>
							</div><!-- /.box -->
						</div>
					</div>
				<?php elseif ($pg == 'importguru') : ?>
					<?php
						cek_session_admin();
						if (isset($_POST['submit'])) :
							$file = $_FILES['file']['name'];
							$temp = $_FILES['file']['tmp_name'];
							$ext = explode('.', $file);
							$ext = end($ext);
							if ($ext <> 'xls') {
								$info = info('Gunakan file Ms. Excel 93-2007 Workbook (.xls)', 'NO');
							} else {
								$data = new Spreadsheet_Excel_Reader($temp);
								$hasildata = $data->rowcount($sheet_index = 0);
								$sukses = $gagal = 0;
								$exec = mysql_query("delete from pengawas where level='guru'");
								for ($i = 2; $i <= $hasildata; $i++) :
									$nip = $data->val($i, 2);
									$nama = $data->val($i, 3);
									$nama = addslashes($nama);
									$username = $data->val($i, 4);
									$username = str_replace("'", "", $username);
									$password = $data->val($i, 5);
									$exec = mysql_query("INSERT INTO pengawas (nip,nama,username,password,level) VALUES ('$nip','$nama','$username','$password','guru')");
									($exec) ? $sukses++ : $gagal++;
								endfor;
								$total = $hasildata - 1;
								$info = info("Berhasil: $sukses | Gagal: $gagal | Dari: $total", 'OK');
							}
						endif;
						?>
					<div class='row'>
						<div class='col-md-3'></div>
						<div class='col-md-6'>
							<form action='' method='post' enctype='multipart/form-data'>
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Import Guru</h3>
										<div class='box-tools pull-right btn-group'>
											<button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Import</button>
											<a href='?pg=guru' class='btn btn-sm btn-default' title='Batal'><i class='fa fa-times'></i></a>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<?= $info ?>
										<div class='form-group'>
											<label>Pilih File</label>
											<input type='file' name='file' class='form-control' required='true' />
										</div>
										<p>Sebelum meng-import pastikan file yang akan anda import sudah dalam bentuk Ms. Excel 97-2003 Workbook (.xls) dan format penulisan harus sesuai dengan yang telah ditentukan.</p>
									</div><!-- /.box-body -->
									<div class='box-footer'>
										<a href='importdataguru.xls'><i class='fa fa-file-excel-o'></i> Download Format</a>
									</div>
								</div><!-- /.box -->
							</form>
						</div>
					</div>
				<?php elseif ($pg == 'pengawas') : ?>
					<?php cek_session_admin(); ?>
					<div class='row'>
						<div class='col-md-8'>
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'><img src='../dist/img/svg/manajemen_user.svg' width='20'> Manajemen User</h3>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<div class='table-responsive'>
										<table id='example1' class='table table-bordered table-striped'>
											<thead>
												<tr>
													<th width='5px'>#</th>
													<th>NIP</th>
													<th>Nama</th>
													<th>Username</th>
													<th>Level</th>
													<th width=60px></th>
												</tr>
											</thead>
											<tbody>
												<?php $pengawasQ = mysql_query("SELECT * FROM pengawas where level='admin' ORDER BY nama ASC"); ?>
												<?php while ($pengawas = mysql_fetch_array($pengawasQ)) : ?>
													<?php $no++; ?>
													<tr>
														<td><?= $no ?></td>
														<td><?= $pengawas['nip'] ?></td>
														<td><?= $pengawas['nama'] ?></td>
														<td><?= $pengawas['username'] ?></td>
														<td><?= $pengawas['level'] ?></td>
														<td style="text-align:center">
															<div class='btn-group'>
																<a href="?pg=<?= $pg ?>&ac=edit&id=<?= $pengawas['id_pengawas'] ?>"> <button class='btn btn-flat btn-xs btn-warning'><i class='fa fa-pencil-square-o'></i></button></a>
																<a href="?pg=<?= $pg ?>&ac=hapus&id=<?= $pengawas['id_pengawas'] ?>"> <button class='btn btn-flat btn-xs bg-maroon'><i class='fa fa-trash-o'></i></button></a>
															</div>
														</td>
													</tr>
												<?php endwhile; ?>
											</tbody>
										</table>
									</div>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
						<div class='col-md-4'>
							<?php if ($ac == '') : ?>
								<?php
										if (isset($_POST['submit'])) :
											$nip = $_POST['nip'];
											$nama = $_POST['nama'];
											$nama = str_replace("'", "&#39;", $nama);
											$username = $_POST['username'];
											$pass1 = $_POST['pass1'];
											$pass2 = $_POST['pass2'];

											$cekuser = mysql_num_rows(mysql_query("SELECT * FROM pengawas WHERE username='$username'"));
											if ($cekuser > 0) {
												$info = info("Username $username sudah ada!", "NO");
											} else {
												if ($pass1 <> $pass2) :
													$info = info("Password tidak cocok!", "NO");
												else :
													$password = password_hash($pass1, PASSWORD_BCRYPT);
													$exec = mysql_query("INSERT INTO pengawas (nip,nama,username,password,level) VALUES ('$nip','$nama','$username','$password','admin')");
													(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
												endif;
											}
										endif;
										?>
								<form action='' method='post'>
									<div class='box box-solid'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Tambah</h3>
											<div class='box-tools pull-right btn-group'>
												<button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
											</div>
										</div><!-- /.box-header -->
										<div class='box-body'>
											<?= $info ?>
											<div class='form-group'>
												<label>NIP</label>
												<input type='text' name='nip' class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Nama</label>
												<input type='text' name='nama' class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Username</label>
												<input type='text' name='username' class='form-control' required='true' />
											</div>

											<div class='form-group'>
												<div class='row'>
													<div class='col-md-6'>
														<label>Password</label>
														<input type='password' name='pass1' class='form-control' required='true' />
													</div>
													<div class='col-md-6'>
														<label>Ulang Password</label>
														<input type='password' name='pass2' class='form-control' required='true' />
													</div>
												</div>
											</div>
										</div><!-- /.box-body -->
									</div><!-- /.box -->
								</form>
							<?php elseif ($ac == 'edit') : ?>
								<?php
										$id = $_GET['id'];
										$value = mysql_fetch_array(mysql_query("SELECT * FROM pengawas WHERE id_pengawas='$id'"));
										if (isset($_POST['submit'])) :
											$nip = $_POST['nip'];
											$nama = $_POST['nama'];
											$nama = str_replace("'", "&#39;", $nama);
											$username = $_POST['username'];
											$pass1 = $_POST['pass1'];
											$pass2 = $_POST['pass2'];
											if ($pass1 <> '' and $pass2 <> '') {
												if ($pass1 <> $pass2) :
													$info = info("Password tidak cocok!", "NO");
												else :
													$password = password_hash($pass1, PASSWORD_BCRYPT);
													$exec = mysql_query("UPDATE pengawas SET nip='$nip',nama='$nama',username='$username',password='$password',level='admin' WHERE id_pengawas='$id'");
												endif;
											} else {
												$exec = mysql_query("UPDATE pengawas SET nip='$nip',nama='$nama',username='$username',level='admin' WHERE id_pengawas='$id'");
											}
											(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
										endif;
										?>
								<form action='' method='post'>
									<div class='box box-solid'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Edit</h3>
											<div class='box-tools pull-right btn-group'>
												<button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
												<a href='?pg=<?= $pg ?>' class='btn btn-sm bg-maroon' title='Batal'><i class='fa fa-times'></i></a>
											</div>
										</div><!-- /.box-header -->
										<div class='box-body'>
											<?= $info ?>
											<div class='form-group'>
												<label>NIP</label>
												<input type='text' name='nip' value="<?= $value['nip'] ?>" class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Nama</label>
												<input type='text' name='nama' value="<?= $value['nama'] ?>" class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Username</label>
												<input type='text' name='username' value="<?= $value['username'] ?>" class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<div class='row'>
													<div class='col-md-6'>
														<label>Password</label>
														<input type='password' name='pass1' class='form-control' />
													</div>
													<div class='col-md-6'>
														<label>Ulang Password</label>
														<input type='password' name='pass2' class='form-control' />
													</div>
												</div>
											</div>
										</div><!-- /.box-body -->
									</div><!-- /.box -->
								</form>
							<?php elseif ($ac == 'hapus') : ?>
								<?php
										$id = $_GET['id'];
										$info = info("Anda yakin akan menghapus pengawas ini?");
										if (isset($_POST['submit'])) {
											$exec = mysql_query("DELETE FROM pengawas WHERE id_pengawas='$id'");
											(!$exec) ? $info = info("Gagal menghapus!", "NO") : jump("?pg=$pg");
										}
										?>
								<form action='' method='post'>
									<div class='box box-danger'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Hapus</h3>
											<div class='box-tools pull-right btn-group'>
												<button type='submit' name='submit' class='btn btn-sm bg-maroon'><i class='fa fa-trash-o'></i> Hapus</button>
												<a href='?pg=<?= $pg ?>' class='btn btn-sm btn-default' title='Batal'><i class='fa fa-times'></i></a>
											</div>
										</div><!-- /.box-header -->
										<div class='box-body'>
											<?= $info ?>
										</div><!-- /.box-body -->
									</div><!-- /.box -->
								</form>
							<?php endif; ?>
						</div>
					</div>
				<?php elseif ($pg == 'pk') : ?>
					<?php if ($setting['jenjang'] == 'SMK') : ?>
						<?php
								cek_session_admin();
								if (isset($_POST['tambahmapel'])) :
									$idpk = str_replace(' ', '', $_POST['idpk']);
									$nama = $_POST['nama'];
									$cek = mysql_num_rows(mysql_query("SELECT * FROM pk WHERE id_pk='$idpk'"));
									if ($cek > 0) {
										$info = info("Jurusan dengan kode $idpk sudah ada!", "NO");
									} else {
										$exec = mysql_query("INSERT INTO pk (id_pk,program_keahlian) VALUES ('$idpk','$nama')");
										if (!$exec) :
											$info = info("Gagal menyimpan!", "NO");
										else :
											jump("?pg=$pg");
										endif;
									}
								endif;
								$info = '';
								?>
						<div class='row'>
							<div class='col-md-12'>
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Jurusan</h3>
										<div class='box-tools pull-right'>
											<button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahmapel'><i class='fa fa-check'></i> Tambah Jurusan</button>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<?= $info ?>
										<table id='tablejurusan' class='table table-bordered table-striped'>
											<thead>
												<tr>
													<th width='5px'>#</th>
													<th>Kode Jurusan</th>
													<th>Nama Jurusan</th>
												</tr>
											</thead>
											<tbody>
												<?php $adminQ = mysql_query("SELECT * FROM pk ORDER BY id_pk ASC"); ?>
												<?php while ($adm = mysql_fetch_array($adminQ)) : ?>
													<?php $no++; ?>
													<tr>
														<td><?= $no ?></td>
														<td><?= $adm['id_pk'] ?></td>
														<td><?= $adm['program_keahlian'] ?></td>
													</tr>
												<?php endwhile; ?>
											</tbody>
										</table>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
							<div class='modal fade' id='tambahmapel' style='display: none;'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header bg-blue'>
											<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
											<h3 class='modal-title'>Tambah Jurusan</h3>
										</div>
										<div class='modal-body'>
											<form action='' method='post'>
												<div class='form-group'>
													<label>Kode Jurusan</label>
													<input type='text' name='idpk' class='form-control' required='true' />
												</div>
												<div class='form-group'>
													<label>Nama Jurusan</label>
													<input type='text' name='nama' class='form-control' required='true' />
												</div>
												<div class='modal-footer'>
													<div class='box-tools pull-right btn-group'>
														<button type='submit' name='tambahmapel' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
														<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php else : ?>
						<div class="panel panel-body panel-info">
							<h4>
								Untuk Jenjang SD (sederajat) sampai SMP (sederajat), tidak memiliki jurusan
							</h4>
						</div>
					<?php endif; ?>
				<?php elseif ($pg == 'jenisujian') : ?>
					<?php
						cek_session_admin();
						if (isset($_POST['tambahujian'])) :
							$id = str_replace(' ', '', $_POST['idujian']);
							$nama = $_POST['nama'];
							$cek = mysql_num_rows(mysql_query("SELECT * FROM jenis WHERE id_jenis='$id'"));
							if ($cek > 0) {
								$info = info("Jurusan dengan kode $id sudah ada!", "NO");
							} else {
								$exec = mysql_query("INSERT INTO jenis (id_jenis,nama) VALUES ('$id','$nama')");
								if (!$exec) {
									$info = info("Gagal menyimpan!", "NO");
								} else {
									jump("?pg=$pg");
								}
							}
						endif;
						$info = '';
						?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'>JENIS UJIAN</h3>
									<div class='box-tools pull-right'>
										<button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahujian'><i class='fa fa-check'></i> Tambah Ujian</button>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<?= $info ?>
									<table id='tablejenis' class='table table-bordered table-striped'>
										<thead>
											<tr>
												<th width='5px'>#</th>
												<th>Kode Ujian</th>
												<th>Nama Ujian</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php $adminQ = mysql_query("SELECT * FROM jenis ORDER BY id_jenis ASC"); ?>
											<?php while ($adm = mysql_fetch_array($adminQ)) : ?>
												<?php $no++; ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $adm['id_jenis'] ?></td>
													<td><?= $adm['nama'] ?></td>
													<td><?= $adm['status'] ?></td>
												</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
						<div class='modal fade' id='tambahujian' style='display: none;'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header bg-blue'>
										<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
										<h3 class='modal-title'>Tambah Ujian</h3>
									</div>
									<div class='modal-body'>
										<form action='' method='post'>
											<div class='form-group'>
												<label>Kode Ujian</label>
												<input type='text' name='idujian' class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Nama Ujian</label>
												<input type='text' name='nama' class='form-control' required='true' />
											</div>
											<div class='modal-footer'>
												<div class='box-tools pull-right btn-group'>
													<button type='submit' name='tambahujian' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
													<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php elseif ($pg == 'ruang') : ?>
					<?php
						cek_session_admin();
						include 'master_ruang.php';
						?>
				<?php elseif ($pg == 'level') : ?>
					<?php
						cek_session_admin();
						if (isset($_POST['submit'])) :
							$level = str_replace(' ', '', $_POST['level']);
							$ket = $_POST['keterangan'];

							$cek = mysql_num_rows(mysql_query("SELECT * FROM level WHERE kode_level='$level'"));
							if ($cek > 0) {
								$info = info("Level atau tingkat $level sudah ada!", "NO");
							} else {
								$exec = mysql_query("INSERT INTO level (kode_level,keterangan) VALUES ('$level','$ket')");
								if (!$exec) {
									$info = info("Gagal menyimpan!", "NO");
								} else {
									jump("?pg=$pg");
								}
							}
						endif;
						?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'>Level atau Tingkat</h3>
									<div class='box-tools pull-right'>
										<button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahlevel'><i class='fa fa-check'></i> Tambah Level</button>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<table id='tablelevel' class='table table-bordered table-striped'>
										<thead>
											<tr>
												<th width='5px'>#</th>
												<th>Kode Level</th>
												<th>Nama Level</th>
											</tr>
										</thead>
										<tbody>
											<?php $adminQ = mysql_query("SELECT * FROM level"); ?>
											<?php while ($adm = mysql_fetch_array($adminQ)) : ?>
												<?php $no++; ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $adm['kode_level'] ?></td>
													<td><?= $adm['keterangan'] ?></td>
												</tr>
											<?php endwhile ?>
										</tbody>
									</table>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
						<div class='modal fade' id='tambahlevel' style='display: none;'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header bg-blue'>
										<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
										<h3 class='modal-title'>Tambah Level</h3>
									</div>
									<div class='modal-body'>
										<form action='' method='post'>
											<div class='form-group'>
												<label>Kode Level</label>
												<input type='text' name='level' class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Nama Level</label>
												<input type='text' name='keterangan' class='form-control' required='true' />
											</div>
											<div class='modal-footer'>
												<div class='box-tools pull-right btn-group'>
													<button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
													<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php elseif ($pg == 'sesi') : ?>
					<?php
						cek_session_admin();
						if (isset($_POST['submit'])) {
							$sesi = str_replace(' ', '', $_POST['sesi']);
							$nama = $_POST['nama'];

							$cek = mysql_num_rows(mysql_query("SELECT * FROM sesi WHERE kode_sesi='$sesi'"));
							if ($cek > 0) {
								$info = info("Kelompok Test atau Sesi $sesi sudah ada!", "NO");
							} else {
								$exec = mysql_query("INSERT INTO sesi (kode_sesi,nama_sesi) VALUES ('$sesi','$nama')");
								if (!$exec) {
									$info = info("Gagal menyimpan!", "NO");
								} else {
									jump("?pg=$pg");
								}
							}
						}
						?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'>Sesi atau Kelompok Test</h3>
									<div class='box-tools pull-right'>
										<button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahsesi'><i class='fa fa-check'></i> Tambah Kelompok</button>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<table id='tablesesi' class='table table-bordered table-striped'>
										<thead>
											<tr>
												<th width='5px'>#</th>
												<th>Kode Sesi</th>
												<th>Nama Sesi</th>
											</tr>
										</thead>
										<tbody>
											<?php $adminQ = mysql_query("SELECT * FROM sesi"); ?>
											<?php while ($adm = mysql_fetch_array($adminQ)) : ?>
												<?php $no++; ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $adm['kode_sesi'] ?></td>
													<td><?= $adm['nama_sesi'] ?></td>
												</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
						<div class='modal fade' id='tambahsesi' style='display: none;'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header bg-blue'>
										<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
										<h3 class='modal-title'>Tambah Sesi</h3>
									</div>
									<div class='modal-body'>
										<form action='' method='post'>
											<div class='form-group'>
												<label>Kode Sesi</label>
												<input type='text' name='sesi' class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Nama Sesi</label>
												<input type='text' name='nama' class='form-control' required='true' />
											</div>
											<div class='modal-footer'>
												<div class='box-tools pull-right btn-group'>
													<button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
													<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php elseif ($pg == 'kelas') : ?>
					<?php
						cek_session_admin();
						if (isset($_POST['submit'])) :
							$idkelas = str_replace(' ', '', $_POST['idkelas']);
							$nama = $_POST['nama'];
							$level = $_POST['level'];
							$cek = mysql_num_rows(mysql_query("SELECT * FROM kelas WHERE id_kelas='$idkelas'"));
							if ($cek > 0) {
								$info = info("Kelas dengan kode $idkelas sudah ada!", "NO");
							} else {
								$exec = mysql_query("INSERT INTO kelas (id_kelas,nama,level) VALUES ('$idkelas','$nama','$level')");
								if (!$exec) :
									$info = info("Gagal menyimpan!", "NO");
								else :
									jump("?pg=$pg");
								endif;
							}
						endif;
						?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='alert alert-warning '>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
								<i class='icon fa fa-info'></i>
								Level Kelas harus sama dengan Kode Level di data master
							</div>
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'>Kelas</h3>
									<div class='box-tools pull-right'>
										<button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahkelas'><i class='fa fa-check'></i> Tambah Kelas</button>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<table id='tablekelas' class='table table-bordered table-striped'>
										<thead>
											<tr>
												<th width='5px'>#</th>
												<th>Kode Kelas</th>
												<th>Level Kelas</th>
												<th>Nama Kelas</th>
											</tr>
										</thead>
										<tbody>
											<?php $adminQ = mysql_query("SELECT * FROM kelas ORDER BY nama ASC"); ?>
											<?php while ($adm = mysql_fetch_array($adminQ)) : ?>
												<?php $no++; ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $adm['id_kelas'] ?></td>
													<td><?= $adm['level'] ?></td>
													<td><?= $adm['nama'] ?></td>
												</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
						<div class='modal fade' id='tambahkelas' style='display: none;'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header bg-blue'>
										<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
										<h3 class='modal-title'>Tambah Kelas</h3>
									</div>
									<div class='modal-body'>
										<form action='' method='post'>
											<div class='form-group'>
												<label>Kode Kelas</label>
												<input type='text' name='idkelas' class='form-control' required='true' />
											</div>
											<div class='form-group'>
												<label>Level</label>
												<select name='level' class='form-control' required='true'>
													<option value=''></option>
													<?php
														$levelQ = mysql_query("SELECT * FROM level ");
														while ($level = mysql_fetch_array($levelQ)) {
															echo "<option value='$level[kode_level]'>$level[kode_level]</option>";
														}
														?>
												</select>
											</div>
											<div class='form-group'>
												<label>Nama Kelas</label>
												<input type='text' name='nama' class='form-control' required='true' />
											</div>
											<div class='modal-footer'>
												<div class='box-tools pull-right btn-group'>
													<button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
													<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php elseif ($pg == 'banksoal') : ?>
					<?php if ($ac == '') : ?>
						<?php
								$pesan = '';
								$value = mysql_fetch_array(mysql_query("SELECT * FROM mapel WHERE id_mapel='$id'"));
								$tgl_ujian = explode(' ', $value['tgl_ujian']);
								if (isset($_POST['editbanksoal'])) :
									$id = $_POST['idm'];
									$nama = $_POST['nama'];
									$nama = str_replace("'", "&#39;", $nama);
									$idpk = $_POST['id_pk'];
									$jml_soal = $_POST['jml_soal'];
									$jml_esai = $_POST['jml_esai'];
									$bobot_pg = $_POST['bobot_pg'];
									$bobot_esai = $_POST['bobot_esai'];
									$tampil_pg = $_POST['tampil_pg'];
									$tampil_esai = $_POST['tampil_esai'];
									$level = $_POST['level'];
									$status = $_POST['status'];
									$opsi = $_POST['opsi'];
									$guru = $_POST['guru'];
									$kelas = serialize($_POST['kelas']);
									if ($pengawas['level'] == 'admin') {
										$exec = mysql_query("UPDATE mapel SET idpk='$idpk',nama='$nama',level='$level',jml_soal='$jml_soal',jml_esai='$jml_esai',status='$status',idguru='$guru',bobot_pg='$bobot_pg',bobot_esai='$bobot_esai',tampil_pg='$tampil_pg',tampil_esai='$tampil_esai',kelas='$kelas',opsi='$opsi' WHERE id_mapel='$id'");
										(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
									} elseif ($pengawas['level'] == 'guru') {
										$exec = mysql_query("UPDATE mapel SET idpk='$idpk',nama='$nama',level='$level',jml_soal='$jml_soal',jml_esai='$jml_esai',status='$status',bobot_pg='$bobot_pg',bobot_esai='$bobot_esai',tampil_pg='$tampil_pg',tampil_esai='$tampil_esai',kelas='$kelas',opsi='$opsi' WHERE id_mapel='$id'");
										(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
									}
								endif;
								if (isset($_POST['tambahbanksoal'])) :
									$nama = $_POST['nama'];
									$nama = str_replace("'", "&#39;", $nama);
									$id_pk = $_POST['id_pk'];
									$jml_esai = $_POST['jml_esai'];
									$jml_soal = $_POST['jml_soal'];
									$bobot_pg = $_POST['bobot_pg'];
									$bobot_esai = $_POST['bobot_esai'];
									$tampil_pg = $_POST['tampil_pg'];
									$tampil_esai = $_POST['tampil_esai'];
									$level = $_POST['level'];
									$status = $_POST['status'];
									$opsi = $_POST['opsi'];
									$kelas = serialize($_POST['kelas']);
									$cek = mysql_num_rows(mysql_query("SELECT * FROM mapel WHERE nama='$nama' and level='$level' and kelas ='$kelas'"));
									if ($pengawas['level'] == 'admin') {
										$guru = $_POST['guru'];
										if ($cek > 0) :
											$pesan = "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><i class='icon fa fa-info'></i>Maaf Kode Mapel - Level - Kelas Soal Sudah ada !</div>";
										else :
											$exec = mysql_query("INSERT INTO mapel (idpk, nama, jml_soal,jml_esai,level,status,idguru,bobot_pg,bobot_esai,tampil_pg,tampil_esai,kelas,opsi) VALUES ('$id_pk','$nama','$jml_soal','$jml_esai','$level','$status','$guru','$bobot_pg','$bobot_esai','$tampil_pg','$tampil_esai','$kelas','$opsi')");
											$pesan = "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><i class='icon fa fa-info'></i>Data Berhasil ditambahkan ..</div>";
										endif;
									} elseif ($pengawas['level'] == 'guru') {
										if ($cek > 0) :
											$pesan = "<div class='alert alert-warning alert-dismissible'>
														<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
														<i class='icon fa fa-info'></i>
														Maaf Kode Mapel - Level - Kelas Sudah ada !
													</div>";
										else :
											$exec = mysql_query("INSERT INTO mapel (idpk, nama, jml_soal,jml_esai,level,status,idguru,bobot_pg,bobot_esai,tampil_pg,tampil_esai,kelas,opsi) VALUES ('$id_pk','$nama','$jml_soal','$jml_esai','$level','$status','$id_pengawas','$bobot_pg','$bobot_esai','$tampil_pg','$tampil_esai','$kelas','$opsi')");
											$pesan = "<div class='alert alert-success alert-dismissible'>
														<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
														<i class='icon fa fa-info'></i>
														Data Berhasil ditambahkan ..
													</div>";
										endif;
									}
								endif;
								?>
						<div class='row'>
							<div class='col-md-12'><?= $pesan ?>
								<div class='box box-solid '>
									<div class='box-header with-border '>
										<h3 class='box-title'><i class='fa fa-briefcase'></i> Data Bank Soal</h3>
										<div class='box-tools pull-right btn-group'>
											<button id='btnhapusbank' class='btn btn-sm bg-maroon'><i class='fa fa-trash'></i> Hapus</button>
											<button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahbanksoal'><i class='glyphicon glyphicon-plus'></i> Tambah Bank Soal</button>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<div id='tablereset' class='table-responsive'>
											<table id='example1' class='table table-bordered table-striped'>
												<thead>
													<tr>
														<th width='5px'><input type='checkbox' id='ceksemua'></th>
														<th width='5px'>#</th>
														<th>Mata Pelajaran</th>
														<th>Soal PG</th>
														<th>Soal Esai</th>
														<th>Kelas</th>
														<th>Guru</th>
														<th>Status</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php
															if ($pengawas['level'] == 'admin') :
																$mapelQ = mysql_query("SELECT * FROM mapel ORDER BY date ASC");
															elseif ($pengawas['level'] == 'guru') :
																$mapelQ = mysql_query("SELECT * FROM mapel WHERE idguru='$pengawas[id_pengawas]' ORDER BY date ASC");
															endif;
															?>
													<?php while ($mapel = mysql_fetch_array($mapelQ)) : ?>
														<?php
																	$cek = mysql_num_rows(mysql_query("SELECT * FROM soal WHERE id_mapel='$mapel[id_mapel]'"));
																	$no++;
																	?>
														<tr>
															<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-$no' value='$mapel[id_mapel]'></td>
															<td><?= $no ?></td>
															<td>
																<?php
																			if ($mapel['idpk'] == 'semua') :
																				$jur = 'Semua';
																			else :
																				$jur = $mapel['idpk'];
																			endif;
																			?>
																<b><small class='label bg-purple'><?= $mapel['nama'] ?></small></b>
																<small class='label label-primary'><?= $mapel['level'] ?></small>
																<small class='label label-primary'><?= $jur ?></small>
															</td>
															<td>
																<small class='label label-warning'><?= $mapel['tampil_pg'] ?>/<?= $mapel['jml_soal'] ?></small>
																<small class='label label-danger'><?= $mapel['bobot_pg'] ?> %</small>
																<small class='label label-danger'><?= $mapel['opsi'] ?> opsi</small>
															</td>
															<td>
																<small class='label label-warning'><?= $mapel['tampil_esai'] ?>/<?= $mapel['jml_esai'] ?></small>
																<small class='label label-danger'><?= $mapel['bobot_esai'] ?> %</small>
															</td>
															<td>
																<?php
																			$dataArray = unserialize($mapel['kelas']);
																			foreach ($dataArray as $key => $value) :
																				echo "<small class='label label-success'>$value </small>&nbsp;";
																			endforeach;
																			?>
															</td>
															<?php
																		if ($cek <> 0) {
																			if ($mapel['status'] == '0') :
																				$status = '<label class="label label-danger">non aktif</label>';
																			else :
																				$status = '<label class="label label-success"> aktif </label>';
																			endif;
																		} else {
																			$status = '<label class="label label-warning"> Soal Kosong </label>';
																		}
																		$guruku = mysql_fetch_array(mysql_query("SELECT * FROM pengawas WHERE id_pengawas = '$mapel[idguru]'"));
																		?>
															<td>
																<small class='label label-primary'><?= $guruku['nama'] ?></small>
															</td>
															<td style="text-align:center">
																<?= $status ?>
															</td>
															<td style="text-align:center">
																<div class='btn-group'>
																	<a href='?pg=<?= $pg ?>&ac=lihat&id=<?= $mapel['id_mapel'] ?>'><button class='btn btn-flat btn-success btn-flat btn-xs'><i class='fa fa-search'></i></button></a>
																	<a href='?pg=<?= $pg ?>&ac=importsoal&id=<?= $mapel['id_mapel'] ?>'><button class='btn btn-info btn-flat btn-xs'><i class='fa fa-upload'></i></button></a>
																	<a><button class='btn btn-warning btn-flat btn-xs' data-toggle='modal' data-target='#editbanksoal<?= $mapel['id_mapel'] ?>'><i class='fa fa-pencil-square-o'></i></button></a>
																</div>
															</td>
														</tr>
														<div class='modal fade' id='editbanksoal<?= $mapel['id_mapel'] ?>' style='display: none;'>
															<div class='modal-dialog'>
																<div class='modal-content'>
																	<div class='modal-header bg-blue'>
																		<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																		<h3 class='modal-title'>Edit Bank Soal</h3>
																	</div>
																	<form action='' method='post'>
																		<div class='modal-body'>
																			<input type='hidden' id='idm' name='idm' value='<?= $mapel['id_mapel'] ?>' />
																			<div class='form-group'>
																				<label>Mata Pelajaran</label>
																				<select name='nama' class='form-control' required='true'>
																					<option value=''></option>
																					<?php
																								$pkQ = mysql_query("SELECT * FROM mata_pelajaran ORDER BY nama_mapel ASC");
																								while ($pk = mysql_fetch_array($pkQ)) : ($pk['kode_mapel'] == $mapel['nama']) ? $s = 'selected' : $s = '';
																									echo "<option value='$pk[kode_mapel]' $s>$pk[nama_mapel]</option>";
																								endwhile;
																								?>
																				</select>
																			</div>
																			<?php if ($setting['jenjang'] == 'SMK') : ?>
																				<div class='form-group'>
																					<label>Program Keahlian</label>
																					<select name='id_pk' class='form-control' required='true'>
																						<option value='semua'>Semua</option>
																						<?php
																										$pkQ = mysql_query("SELECT * FROM pk ORDER BY program_keahlian ASC");
																										while ($pk = mysql_fetch_array($pkQ)) : ($pk['id_pk'] == $mapel['idpk']) ? $s = 'selected' : $s = '';
																											echo "<option value='$pk[id_pk]' $s>$pk[program_keahlian]</option>";
																										endwhile;
																										?>
																					</select>
																				</div>
																			<?php endif; ?>
																			<div class='form-group'>
																				<div class='row'>
																					<div class='col-md-6'>
																						<label>Pilih Level</label>
																						<select name='level' class='form-control' required='true'>
																							<option value='semua'>Semua Level</option>
																							<?php
																										$lev = mysql_query("SELECT * FROM level");
																										while ($level = mysql_fetch_array($lev)) :
																											echo "<option value='$level[kode_level]'>$level[kode_level]</option>";
																										endwhile;
																										?>
																						</select>
																					</div>
																					<div class='col-md-6'>
																						<label>Pilih Kelas</label><br>
																						<select name='kelas[]' class='form-control select2' multiple='multiple' style='width:100%' required='true'>
																							<option value='semua'>Semua Kelas</option>
																							<?php
																										$lev = mysql_query("SELECT * FROM kelas ");
																										while ($kelas = mysql_fetch_array($lev)) {
																											echo "<option value='$kelas[id_kelas]'>$kelas[id_kelas]</option>";
																										}
																										?>
																						</select>
																					</div>
																				</div>
																			</div>
																			<div class='form-group'>
																				<div class='row'>
																					<div class='col-md-3'>
																						<label>Jumlah Soal PG</label>
																						<input type='number' name='jml_soal' class='form-control' value="<?= $mapel['jml_soal'] ?>" required='true' />
																					</div>
																					<div class='col-md-3'>
																						<label>Bobot Soal PG %</label>
																						<input type='number' name='bobot_pg' class='form-control' value="<?= $mapel['bobot_pg'] ?>" required='true' />
																					</div>
																					<div class='col-md-3'>
																						<label>Soal Tampil</label>
																						<input type='number' name='tampil_pg' class='form-control' value="<?= $mapel['tampil_pg'] ?>" required='true' />
																					</div>
																					<div class='col-md-3'>
																						<label>Opsi</label>
																						<select name='opsi' class='form-control'>
																							<?php
																										$opsi = array("3", "4", "5");
																										for ($x = 0; $x < count($opsi); $x++) {
																											if ($mapel['opsi'] == $opsi[$x]) :
																												echo "<option value='$opsi[$x]' selected>$opsi[$x]</option>";
																											else :
																												echo "<option value='$opsi[$x]'>$opsi[$x]</option>";
																											endif;
																										}
																										?>
																						</select>
																					</div>
																				</div>
																			</div>
																			<div class='form-group'>
																				<div class='row'>
																					<div class='col-md-4'>
																						<label>Jumlah Soal Essai</label>
																						<input type='number' name='jml_esai' class='form-control' value="<?= $mapel['jml_esai'] ?>" required='true' />
																					</div>
																					<div class='col-md-4'>
																						<label>Bobot Soal Essai %</label>
																						<input type='number' name='bobot_esai' class='form-control' value="<?= $mapel['bobot_esai'] ?>" required='true' />
																					</div>
																					<div class='col-md-4'>
																						<label>Soal Tampil</label>
																						<input type='number' name='tampil_esai' class='form-control' value="<?= $mapel['tampil_esai'] ?>" required='true' />
																					</div>
																				</div>
																			</div>
																			<div class='form-group'>
																				<div class='row'>
																					<?php if ($pengawas['level'] == 'admin') : ?>
																						<div class='col-md-6'>
																							<label>Guru Pengampu</label>
																							<select name='guru' class='form-control' required='true'>
																								<?php
																												$guruku = mysql_query("SELECT * FROM pengawas where level='guru' order by nama asc");
																												while ($guru = mysql_fetch_array($guruku)) {
																													($guru['id_pengawas'] == $mapel['idguru']) ? $s = 'selected' : $s = '';
																													echo "<option value='$guru[id_pengawas]' $s>$guru[nama]</option>";
																												}
																												?>
																							</select>
																						</div>
																					<?php endif; ?>
																					<div class='col-md-6'>
																						<label>Status Soal</label>
																						<select name='status' class='form-control' required='true'>
																							<option value='1'>Aktif</option>
																							<option value='0'>Non Aktif</option>
																						</select>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class='modal-footer'>
																			<button type='submit' name='editbanksoal' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>

																		</div>
																	</form>
																</div>
															</div>
														</div>
													<?php endwhile; ?>
												</tbody>
											</table>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
						</div>
						<div class='modal fade' id='tambahbanksoal' style='display: none;'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header bg-blue'>
										<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
										<h3 class='modal-title'>Tambah Bank Soal</h3>
									</div>
									<form action='' method='post'>
										<div class='modal-body'>
											<div class='form-group'>
												<label>Mata Pelajaran</label>
												<select name='nama' class='form-control' required='true'>
													<option value=''></option>";
													<?php
															$pkQ = mysql_query("SELECT * FROM mata_pelajaran ORDER BY nama_mapel ASC");
															while ($pk = mysql_fetch_array($pkQ)) {
																echo "<option value='$pk[kode_mapel]'>$pk[nama_mapel]</option>";
															}
															?>
												</select>
											</div>
											<?php if ($setting['jenjang'] == 'SMK') : ?>
												<div class='form-group'>
													<label>Program Keahlian</label>
													<select name='id_pk' class='form-control' required='true'>
														<option value='semua'>Semua</option>
														<?php
																	$pkQ = mysql_query("SELECT * FROM pk ORDER BY program_keahlian ASC");
																	while ($pk = mysql_fetch_array($pkQ)) :
																		echo "<option value='$pk[id_pk]'>$pk[program_keahlian]</option>";
																	endwhile;
																	?>
													</select>
												</div>
											<?php endif; ?>
											<div class='form-group'>
												<div class='row'>
													<div class='col-md-6'>
														<label>Level Soal</label>
														<select name='level' id='soallevel' class='form-control' required='true'>
															<option value=''></option>
															<option value='semua'>Semua</option>
															<?php
																	$lev = mysql_query("SELECT * FROM level");
																	while ($level = mysql_fetch_array($lev)) {
																		echo "<option value='$level[kode_level]'>$level[kode_level]</option>";
																	}
																	?>
														</select>
													</div>
													<div class='col-md-6'>
														<label>Pilih Kelas</label><br>
														<select name='kelas[]' id='soalkelas' class='form-control select2' multiple='multiple' style='width:100%' required='true'>
														</select>
													</div>
												</div>
											</div>
											<div class='form-group'>
												<div class='row'>
													<div class='col-md-3'>
														<label>Jumlah Soal PG</label>
														<input type='number' id='soalpg' name='jml_soal' class='form-control' required='true' />
													</div>
													<div class='col-md-3'>
														<label>Bobot Soal PG %</label>
														<input type='number' name='bobot_pg' class='form-control' required='true' />
													</div>
													<div class='col-md-3'>
														<label>Soal Tampil</label>
														<input type='number' id='tampilpg' name='tampil_pg' class='form-control' required='true' />
													</div>
													<div class='col-md-3'>
														<label>Opsi</label>
														<select name='opsi' class='form-control'>
															<option value='3'>3</option>
															<option value='4'>4</option>
															<option value='5'>5</option>
														</select>
													</div>
												</div>
											</div>
											<div class='form-group'>
												<div class='row'>
													<div class='col-md-4'>
														<label>Jumlah Soal Essai</label>
														<input type='number' id='soalesai' name='jml_esai' class='form-control' required='true' />
													</div>
													<div class='col-md-4'>
														<label>Bobot Soal Essai %</label>
														<input type='number' name='bobot_esai' class='form-control' required='true' />
													</div>
													<div class='col-md-4'>
														<label>Soal Tampil</label>
														<input type='number' id='tampilesai' name='tampil_esai' class='form-control' required='true' />
													</div>
												</div>
											</div>
											<div class='form-group'>
												<div class='row'>
													<?php if ($pengawas['level'] == 'admin') : ?>
														<div class='col-md-6'>
															<label>Guru Pengampu</label>
															<select name='guru' class='form-control' required='true'>
																<?php
																			$guruku = mysql_query("SELECT * FROM pengawas where level='guru' order by nama asc");
																			while ($guru = mysql_fetch_array($guruku)) {
																				echo "<option value='$guru[id_pengawas]'>$guru[nama]</option>";
																			}
																			?>
															</select>
														</div>
													<?php endif; ?>
													<div class='col-md-6'>
														<label>Status Soal</label>
														<select name='status' class='form-control' required='true'>
															<option value='1'>Aktif</option>
															<option value='0'>Non Aktif</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class='modal-footer'>
											<button type='submit' name='tambahbanksoal' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php elseif ($ac == 'input') : ?>
						<?php include 'inputsmk.php'; ?>
					<?php elseif ($ac == 'hapusbank') : ?>
						<?php
								$exec = mysql_query("DELETE FROM soal WHERE id_mapel='$_GET[id]'");
								jump(" ?pg=$pg&ac=lihat&id=$_GET[id]");
								?>
					<?php elseif ($ac == 'lihat') : ?>
						<?php
								$id_mapel = $_GET['id'];
								if (isset($_REQUEST['tambah'])) {
									$sip = $_SERVER['SERVER_NAME'];
									$smax = mysql_query("SELECT max(qid) AS maxi FROM savsoft_qbank");
									while ($hmax = mysql_fetch_array($smax)) :
										$jumsoal = $hmax['maxi'];
									endwhile;
									$smaop = mysql_query("SELECT max(oid) AS maxop FROM savsoft_options");
									while ($hmaop = mysql_fetch_array($smaop)) {
										$jumop = $hmaop['maxop'];
									}
									$b_op = $jumop / $jumsoal;
									$no = 1;
									$sqlcek = mysql_query("SELECT * FROM savsoft_qbank");
									while ($r = mysql_fetch_array($sqlcek)) {
										$s_soal = mysql_fetch_array(mysql_query("select * from savsoft_qbank where qid='$no'"));
										$soal_tanya = $s_soal['question'];
										$l_soal = $s_soal['lid'];
										$c_id = $s_soal['cid'];
										$g_soal = $s_soal['description'];
										$g_soal = str_replace(" ", "", $g_soal);
										$smin = mysql_query(" select min(oid) as mini from savsoft_options where qid='$no'");
										while ($hmin = mysql_fetch_array($smin)) {
											$min_op = $hmin['mini'];
										}
										$sqlopc = mysql_query(" select * from savsoft_options where qid='$no' and oid='$min_op'");
										$ropc = mysql_fetch_array($sqlopc);
										$opj1 = $ropc['q_option'];
										$opj1 = str_replace(" &ndash;", "-", $opj1);
										$opjs1 = $ropc['score'];
										$fileA = $ropc['q_option_match'];
										$fileA = str_replace(" ", "", $fileA);

										$dele = mysql_query("DELETE FROM savsoft_options WHERE qid='$no' AND oid='$min_op'");

										$smin = mysql_query(" select min(oid) as mini from savsoft_options where qid='$no'");
										while ($hmin = mysql_fetch_array($smin)) {
											$min_op = $hmin['mini'];
										}

										$sqlopc = mysql_query(" select * from savsoft_options where qid='$no' and oid='$min_op'");
										$rubah = mysql_query(" select * from savsoft_options where qid='$no'");
										$ck_jum = mysql_num_rows($rubah);

										$ropc = mysql_fetch_array($sqlopc);
										$opj2 = $ropc['q_option'];
										$opj2 = str_replace(" &ndash;", "-", $opj2);
										$opjs2 = $ropc['score'];
										$fileB = $ropc['q_option_match'];
										$fileB = str_replace(" ", "", $fileB);


										$dele = mysql_query(" delete from savsoft_options where qid='$no' and oid='$min_op'");

										$smin = mysql_query(" select min(oid) as mini from savsoft_options where qid='$no'");
										while ($hmin = mysql_fetch_array($smin)) {
											$min_op = $hmin['mini'];
										}

										$sqlopc = mysql_query(" select * from savsoft_options where qid='$no' and oid='$min_op'");
										$ropc = mysql_fetch_array($sqlopc);
										$opj3 = $ropc['q_option'];
										$opj3 = str_replace(" &ndash;", "-", $opj3);
										$opjs3 = $ropc['score'];
										$fileC = $ropc['q_option_match'];
										$fileC = str_replace(" ", "", $fileC);


										$dele = mysql_query(" delete from savsoft_options where qid='$no' and oid='$min_op'");

										$smin = mysql_query(" select min(oid) as mini from savsoft_options where qid='$no'");
										while ($hmin = mysql_fetch_array($smin)) {
											$min_op = $hmin['mini'];
										}

										$sqlopc = mysql_query(" select * from savsoft_options where qid='$no' and oid='$min_op'");
										$ropc = mysql_fetch_array($sqlopc);
										$opj4 = $ropc['q_option'];
										$opj4 = str_replace(" &ndash;", "-", $opj4);
										$opjs4 = $ropc['score'];
										$fileD = $ropc['q_option_match'];
										$fileD = str_replace(" ", "", $fileD);

										$dele = mysql_query(" delete from savsoft_options where qid='$no' and oid='$min_op'");

										$smin = mysql_query(" select min(oid) as mini from savsoft_options where qid='$no'");
										while ($hmin = mysql_fetch_array($smin)) {
											$min_op = $hmin['mini'];
										}

										$sqlopc = mysql_query(" select * from savsoft_options where qid='$no' and oid='$min_op'");
										$ropc = mysql_fetch_array($sqlopc);
										$opj5 = $ropc['q_option'];
										$opj5 = str_replace(" &ndash;", "-", $opj5);
										$opjs5 = $ropc['score'];
										$fileE = $ropc['q_option_match'];
										$fileE = str_replace(" ", "", $fileE);


										$dele = mysql_query(" delete from savsoft_options where qid='$no' and oid='$min_op'");

										if ($opjs1 == 1) {
											$kunci = " A";
										}
										if ($opjs2 == 1) {
											$kunci = "B";
										}
										if ($opjs3 == 1) {
											$kunci = "C";
										}
										if ($opjs4 == 1) {
											$kunci = "D";
										}
										if ($opjs5 == 1) {
											$kunci = "E";
										}
										if ($ck_jum !== 0) {
											$jns = "1";
										}
										if ($ck_jum == 0) {
											$jns = "2";
										}
										$jwb522 = str_replace("&amp;lt;", "<", $jwb521);
										$jwb422 = str_replace("&amp;lt;", "<", $jwb421);
										$jwb322 = str_replace("&amp;lt;", "<", $jwb321);
										$jwb222 = str_replace("&amp;lt;", "<", $jwb221);
										$jwb122 = str_replace("&amp;lt;", "<", $jwb121);
										$soal_tanya2 = str_replace("&amp;lt;", "<", $soal_tanya);
										$jwb52 = str_replace("&amp;gt;", ">", $jwb522);
										$jwb42 = str_replace("&amp;gt;", ">", $jwb422);
										$jwb32 = str_replace("&amp;gt;", ">", $jwb322);
										$jwb22 = str_replace("&amp;gt;", ">", $jwb222);
										$jwb12 = str_replace("&amp;gt;", ">", $jwb122);
										$soal_tanya = str_replace("&amp;gt;", ">", $soal_tanya2);
										$exec = mysql_query("INSERT INTO soal (id_mapel,nomor,soal,pilA,pilB,pilC,pilD,pilE,jawaban,jenis,file,file1,fileA,fileB,fileC,fileD,fileE) VALUES ('$id_mapel','$no','$soal_tanya','$opj1','$opj2','$opj3','$opj4','$opj5','$kunci','$jns','$g_soal','$file2','$fileA','$fileB','$fileC','$fileD','$fileE')");
										$no++;
									}
									$hasil2 = mysql_query("TRUNCATE TABLE savsoft_qbank");
									$hasil2 = mysql_query("TRUNCATE TABLE savsoft_options");
								}
								$namamapel = mysql_fetch_array(mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'"));
								if ($namamapel['jml_esai'] == 0) {
									$hide = 'hidden';
								} else {
									$hide = '';
								}
								?>
						<div class='row'>
							<div class='col-md-12'>
								<div class='box box-solid'>
									<div class='box-header with-border '>
										<h3 class='box-title'>Daftar Soal <?= $namamapel['nama'] ?></h3>
										<div class='box-tools pull-right btn-group'>
											<a href='?pg=<?= $pg ?>&ac=input&id=<?= $id_mapel ?>&no=1&jenis=1' class='btn btn-sm btn-flat btn-success'><i class='fa fa-plus'></i><span class='hidden-xs'> Tambah</span> PG</a>
											<a href='?pg=<?= $pg ?>&ac=input&id=<?= $id_mapel ?>&no=1&jenis=2' class='btn btn-sm btn-flat btn-success $hide'><i class='fa fa-plus'></i><span class='hidden-xs'> Tambah</span> Essai</a>
											<a class='btn btn-sm btn-flat btn-success' href='soal_excel.php?m=<?= $id_mapel ?>'><i class='fa fa-file-excel-o'></i><span class='hidden-xs'> Excel</span></a>
											<button class='btn btn-sm btn-flat btn-success' onclick="frames['frameresult'].print()"><i class='fa fa-print'></i><span class='hidden-xs'> Print</span></button>
											<a href='?pg=<?= $pg ?>&ac=hapusbank&id=<?= $id_mapel ?>' class='btn btn-sm bg-maroon'><i class='fa fa-trash'></i><span class='hidden-xs'>kosongkan </span></a>
											<iframe name='frameresult' src='cetaksoal.php?id=<?= $id_mapel ?>' style='border:none;width:1px;height:1px;'></iframe>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<div class='table-responsive'>
											<b>A. Soal Pilihan Ganda</b>
											<table class='table table-bordered table-striped'>
												<tbody>
													<?php $soalq = mysql_query("SELECT * FROM soal where id_mapel='$id_mapel' and jenis='1' order by nomor "); ?>
													<?php while ($soal = mysql_fetch_array($soalq)) : ?>
														<tr>
															<td style='width:30px'>
																<?= $soal['nomor'] ?>
															</td>
															<td style="text-align:justify">
																<?php
																			if ($soal['file'] <> '') :
																				$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																				$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																				$ext = explode(".", $soal['file']);
																				$ext = end($ext);
																				if (in_array($ext, $image)) {
																					echo "<p style='margin-bottom: 5px'><img src='$homeurl/files/$soal[file]' style='max-width:200px;'/></p>";
																				} elseif (in_array($ext, $audio)) {
																					echo "<p style='margin-bottom: 5px'><audio controls><source src='$homeurl/files/$soal[file]' type='audio/$ext'>Your browser does not support the audio tag.</audio></p>";
																				} else {
																					echo "File tidak didukung!";
																				}
																			endif;
																			?>
																<?= $soal['soal']; ?>
																<?php
																			if ($soal['file1'] <> '') :
																				$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																				$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																				$ext = explode(".", $soal['file1']);
																				$ext = end($ext);
																				if (in_array($ext, $image)) {
																					echo "<p style='margin-top: 5px'><img src='$homeurl/files/$soal[file1]' style='max-width:200px;' /></p>";
																				} elseif (in_array($ext, $audio)) {
																					echo "<p style='margin-top: 5px'><audio controls><source src='$homeurl/files/$soal[file1]' type='audio/$ext'>Your browser does not support the audio tag.</audio></p>";
																				} else {
																					echo "File tidak didukung!";
																				}
																			endif;
																			?>
																<table width=100%>
																	<tr>
																		<td style="padding: 3px;width: 2%; vertical-align: text-top;">A.</td>
																		<td style="padding: 3px;width: 31%; vertical-align: text-top;">
																			<?php
																						if ($soal['pilA'] <> '') {
																							echo "$soal[pilA]<br>";
																						}
																						if ($soal['fileA'] <> '') {
																							$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																							$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																							$ext = explode(".", $soal['fileA']);
																							$ext = end($ext);
																							if (in_array($ext, $image)) {
																								echo "<img src='$homeurl/files/$soal[fileA]' style='max-width:100px;'/>";
																							} elseif (in_array($ext, $audio)) {
																								echo "<audio controls><source src='$homeurl/files/$soal[fileA]' type='audio/$ext'>Your browser does not support the audio tag.</audio>";
																							} else {
																								echo "File tidak didukung!";
																							}
																						}
																						?>
																		</td>
																		<td style="padding: 3px;width: 2%; vertical-align: text-top;">C.</td>
																		<td style="padding: 3px;width: 31%; vertical-align: text-top;">
																			<?php
																						if (!$soal['pilC'] == "") {
																							echo "$soal[pilC]<br>";
																						}
																						if ($soal['fileC'] <> '') {
																							$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																							$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																							$ext = explode(".", $soal['fileC']);
																							$ext = end($ext);
																							if (in_array($ext, $image)) {
																								echo "<img src='$homeurl/files/$soal[fileC]' style='max-width:100px;' />";
																							} elseif (in_array($ext, $audio)) {
																								echo "<audio controls><source src='$homeurl/files/$soal[fileC]' type='audio/$ext'>Your browser does not support the audio tag.</audio>";
																							} else {
																								echo "File tidak didukung!";
																							}
																						}
																						?>
																		</td>
																		<?php if ($namamapel['opsi'] == 5) : ?>
																			<td style="padding: 3px;width: 2%; vertical-align: text-top;">E.</td>
																			<td style="padding: 3px; vertical-align: text-top;">
																				<?php
																								if (!$soal['pilE'] == "") {
																									echo "$soal[pilE]<br>";
																								}
																								if ($soal['fileE'] <> '') {
																									$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																									$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																									$ext = explode(".", $soal['fileE']);
																									$ext = end($ext);
																									if (in_array($ext, $image)) {
																										echo "<img src='$homeurl/files/$soal[fileE]' style='max-width:100px;' />";
																									} elseif (in_array($ext, $audio)) {
																										echo "<audio controls><source src='$homeurl/files/$soal[fileE]' type='audio/$ext'>Your browser does not support the audio tag.</audio>";
																									} else {
																										echo "File tidak didukung!";
																									}
																								}
																								?>
																			</td>
																		<?php endif; ?>
																	</tr>
																	<tr>
																		<td style="padding: 3px;width: 2%; vertical-align: text-top;">B.</td>
																		<td style="padding: 3px;width: 31%; vertical-align: text-top;">
																			<?php
																						if (!$soal['pilB'] == "") {
																							echo "$soal[pilB]<br>";
																						}
																						if ($soal['fileB'] <> '') {
																							$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																							$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																							$ext = explode(".", $soal['fileB']);
																							$ext = end($ext);
																							if (in_array($ext, $image)) {
																								echo "<img src='$homeurl/files/$soal[fileB]' style='max-width:100px;' />";
																							} elseif (in_array($ext, $audio)) {
																								echo "<audio controls><source src='$homeurl/files/$soal[fileB]' type='audio/$ext'>Your browser does not support the audio tag.</audio>";
																							} else {
																								echo "File tidak didukung!";
																							}
																						}
																						?>
																		</td>
																		<?php if ($namamapel['opsi'] <> 3) : ?>
																			<td style="padding: 3px;width: 2%; vertical-align: text-top;">D.</td>
																			<td style="padding: 3px;width: 31%; vertical-align: text-top;">
																				<?php
																								if (!$soal['pilD'] == "") {
																									echo "$soal[pilD]<br>";
																								}
																								if ($soal['fileD'] <> '') {
																									$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																									$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																									$ext = explode(".", $soal['fileD']);
																									$ext = end($ext);
																									if (in_array($ext, $image)) {
																										echo "<img src='$homeurl/files/$soal[fileD]' style='max-width:100px;' />";
																									} elseif (in_array($ext, $audio)) {
																										echo "<audio controls><source src='$homeurl/files/$soal[fileD]' type='audio/$ext'>Your browser does not support the audio tag.</audio>";
																									} else {
																										echo "File tidak didukung!";
																									}
																								}
																								?>
																			</td>
																		<?php endif; ?>
																	</tr>
																	<tr>
																		<td colspan='2' style="padding: 3px;vertical-align: text-top;">
																			Kunci : <?= $soal['jawaban']; ?>
																		</td>
																	</tr>
																</table>
															</td>
															<td style='width:30px'>
																<a><button class='btn bg-maroon btn-sm' data-toggle='modal' data-target="#hapus<?= $soal['nomor'] ?>"><i class='fa fa-trash-o'></i></button></a>
															</td>
														</tr>
														<?php
																	$info = info("Anda yakin akan menghapus soal ini ?");
																	if (isset($_POST['hapus'])) {
																		$exec = mysql_query("DELETE FROM soal WHERE id_soal = '$_REQUEST[idu]'");
																		(!$exec) ? info("Gagal menyimpan", "NO") : jump("?pg=$pg&ac=$ac&id=$id_mapel");
																	}
																	?>
														<div class='modal fade' id="hapus<?= $soal['nomor'] ?>" style='display: none;'>
															<div class='modal-dialog'>
																<div class='modal-content'>
																	<div class='modal-header bg-maroon'>
																		<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																		<h3 class='modal-title'>Hapus Soal</h3>
																	</div>
																	<div class='modal-body'>
																		<form action='' method='post'>
																			<input type='hidden' id='idu' name='idu' value="<?= $soal['id_soal'] ?>" />
																			<div class='callout '>
																				<h4><?= $info ?></h4>
																			</div>
																			<div class='modal-footer'>
																				<div class='box-tools pull-right btn-group'>
																					<button type='submit' name='hapus' class='btn btn-sm bg-maroon'><i class='fa fa-trash-o'></i> Hapus</button>
																					<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
																				</div>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													<?php endwhile; ?>
												</tbody>
											</table>
											<b>B. Soal Essai</b>
											<table class='table table-bordered table-striped'>
												<tbody>
													<?php $soalq = mysql_query("SELECT * FROM soal where id_mapel='$id_mapel' and jenis='2' order by nomor "); ?>
													<?php while ($soal = mysql_fetch_array($soalq)) : ?>
														<tr>
															<td style='width:30px'>
																<?= $soal['nomor'] ?>
															</td>
															<td style="text-align:justify">
																<?php
																			if ($soal['file'] <> '') :
																				$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																				$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																				$ext = explode(".", $soal['file']);
																				$ext = end($ext);
																				if (in_array($ext, $image)) {
																					echo "<p style='margin-bottom: 5px'><img src='$homeurl/files/$soal[file]' style='max-width:200px;'/></p>";
																				} elseif (in_array($ext, $audio)) {
																					echo "<p style='margin-bottom: 5px'><audio controls><source src='$homeurl/files/$soal[file]' type='audio/$ext'>Your browser does not support the audio tag.</audio><br></p>";
																				} else {
																					echo "File tidak didukung!";
																				}
																			endif;
																			?>
																<?= $soal['soal']; ?>
																<?php
																			if ($soal['file1'] <> '') :
																				$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																				$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																				$ext = explode(".", $soal['file1']);
																				$ext = end($ext);
																				if (in_array($ext, $image)) {
																					echo "<p style='margin-top: 5px'><img src='$homeurl/files/$soal[file1]' style='max-width:200px;' /></p>";
																				} elseif (in_array($ext, $audio)) {
																					echo "<p style='margin-top: 5px'><audio controls><source src='$homeurl/files/$soal[file1]' type='audio/$ext'>Your browser does not support the audio tag.</audio></p>";
																				} else {
																					echo "File tidak didukung!";
																				}
																			endif;
																			?>
															</td>
															<td style='width:30px'>
																<a><button class='btn bg-maroon btn-sm' data-toggle='modal' data-target="#hapus<?= $soal['nomor'] ?>"><i class='fa fa-trash-o'></i></button></a>
															</td>
														</tr>
														<?php
																	$info = info("Anda yakin akan menghapus soal ini ?");
																	if (isset($_POST['hapus'])) {
																		$exec = mysql_query("DELETE FROM soal WHERE id_soal = '$_REQUEST[idu]'");
																		(!$exec) ? info("Gagal menyimpan", "NO") : jump("?pg=$pg&ac=$ac&id=$id_mapel");
																	}
																	?>
														<div class='modal fade' id="hapus<?= $soal['nomor'] ?>" style='display: none;'>
															<div class='modal-dialog'>
																<div class='modal-content'>
																	<div class='modal-header bg-maroon'>
																		<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
																		<h3 class='modal-title'>Hapus Soal</h3>
																	</div>
																	<div class='modal-body'>
																		<form action='' method='post'>
																			<input type='hidden' id='idu' name='idu' value="<?= $soal['id_soal'] ?>" />
																			<div class='callout callout-warning'>
																				<h4><?= $info ?></h4>
																			</div>
																			<div class='modal-footer'>
																				<div class='box-tools pull-right btn-group'>
																					<button type='submit' name='hapus' class='btn btn-sm bg-maroon'><i class='fa fa-trash-o'></i> Hapus</button>
																					<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
																				</div>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													<?php endwhile; ?>
												</tbody>
											</table>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
						</div>
					<?php elseif ($ac == 'hapusfile') : ?>
						<?php
								$jenis = $_GET['jenis'];
								$id = $_GET['id'];
								$file = $_GET['file'];
								$soal = mysql_fetch_array(mysql_query("SELECT * FROM soal WHERE id_soal='$id'"));
								(file_exists("../files/" . $soal[$file])) ? unlink("../files/" . $soal[$file]) : null;
								mysql_query("UPDATE soal SET $file='' WHERE id_soal='$id'");
								jump("?pg=$pg&ac=input&paket=$soal[paket]&id=$soal[id_mapel]&no=$soal[nomor]&jenis=$jenis");
								?>
					<?php elseif ($ac == 'importsoal') : ?>
						<?php
								$id_mapel = $_GET['id'];
								$mapelQ = mysql_query("SELECT * FROM mapel where id_mapel='$id_mapel'");
								$mapel = mysql_fetch_array($mapelQ);
								$cekmapel = mysql_num_rows($mapelQ);
								if (isset($_POST['submit'])) :
									$file = $_FILES['file']['name'];
									$temp = $_FILES['file']['tmp_name'];
									$ext = explode('.', $file);
									$ext = end($ext);
									if ($ext <> 'xls') {
										$info = info('Gunakan file Ms. Excel 93-2007 Workbook (.xls)', 'NO');
									} else {
										$data = new Spreadsheet_Excel_Reader($temp);
										$hasildata = $data->rowcount($sheet_index = 0);
										$sukses = $gagal = 0;
										$exec = mysql_query("DELETE FROM soal WHERE id_mapel='$id_mapel' ");
										for ($i = 2; $i <= $hasildata; $i++) :
											$no = $data->val($i, 1);
											$soal = addslashes($data->val($i, 2));
											$pilA = addslashes($data->val($i, 3));
											$pilB = addslashes($data->val($i, 4));
											$pilC = addslashes($data->val($i, 5));
											$pilD = addslashes($data->val($i, 6));
											$pilE = addslashes($data->val($i, 7));
											$jawaban = $data->val($i, 8);
											$jenis = $data->val($i, 9);
											$file1 = $data->val($i, 10);
											$file2 = $data->val($i, 11);
											$fileA = $data->val($i, 12);
											$fileB = $data->val($i, 13);
											$fileC = $data->val($i, 14);
											$fileD = $data->val($i, 15);
											$fileE = $data->val($i, 16);
											$id_mapel = $_POST['id_mapel'];

											if ($soal <> '' and $jenis <> '') {
												$exec = mysql_query("INSERT INTO soal (id_mapel,nomor,soal,pilA,pilB,pilC,pilD,pilE,jawaban,jenis,file,file1,fileA,fileB, fileC,fileD,fileE) VALUES ('$id_mapel','$no','$soal','$pilA','$pilB','$pilC','$pilD','$pilE','$jawaban','$jenis','$file1','$file2','$fileA','$fileB','$fileC','$fileD','$fileE')");
												($exec) ? $sukses++ : $gagal++;
											} else {
												$gagal++;
											}
										endfor;
										$total = $hasildata - 1;
										$info = info("Berhasil: $sukses | Gagal: $gagal | Dari: $total", 'OK');
									}
								endif;

								if (isset($_POST['importbee'])) :
									$file = $_FILES['file']['name'];
									$temp = $_FILES['file']['tmp_name'];
									$ext = explode('.', $file);
									$ext = end($ext);
									if ($ext <> 'xls') {
										$infobee = info('Gunakan file Ms. Excel 93-2007 Workbook (.xls)', 'NO');
									} else {

										$data = new Spreadsheet_Excel_Reader($temp);
										$hasildata = $data->rowcount($sheet_index = 0);
										$sukses = $gagal = 0;
										$exec = mysql_query("delete from soal where id_mapel='$id_mapel' ");
										for ($i = 3; $i <= $hasildata; $i++) :
											$no = $data->val($i, 1);
											$soal = addslashes($data->val($i, 5));
											$pilA = addslashes($data->val($i, 6));
											$pilB = addslashes($data->val($i, 8));
											$pilC = addslashes($data->val($i, 10));
											$pilD = addslashes($data->val($i, 12));
											$pilE = addslashes($data->val($i, 14));
											$jawab = $data->val($i, 19);
											if ($jawab == '1') {
												$jawaban = 'A';
											} elseif ($jawab == '2') {
												$jawaban = 'B';
											} elseif ($jawab == '3') {
												$jawaban = 'C';
											} elseif ($jawab == '4') {
												$jawaban = 'D';
											} elseif ($jawab == '5') {
												$jawaban = 'E';
											}
											$jenis = $data->val($i, 2);
											$file1 = $data->val($i, 18);
											$file2 = $data->val($i, 17);
											$fileA = $data->val($i, 7);
											$fileB = $data->val($i, 9);
											$fileC = $data->val($i, 11);
											$fileD = $data->val($i, 13);
											$fileE = $data->val($i, 15);
											$id_mapel = $_POST['id_mapel'];

											if ($jenis <> '') {
												$exec = mysql_query("INSERT INTO soal (id_mapel,nomor,soal,pilA,pilB,pilC,pilD,pilE,jawaban,jenis,file,file1,fileA,fileB, fileC,fileD,fileE) VALUES ('$id_mapel','$no','$soal','$pilA','$pilB','$pilC','$pilD','$pilE','$jawaban','$jenis','$file1','$file2','$fileA','$fileB','$fileC','$fileD','$fileE')");
												($exec) ? $sukses++ : $gagal++;
											} else {
												$gagal++;
											}
										endfor;
										$total = $hasildata - 1;
										$info = info("Berhasil: $sukses | Gagal: $gagal | Dari: $total", 'OK');
									}
								endif;
								?>
						<div class='row'>
							<div class='col-md-6'>
								<form action='' method='post' enctype='multipart/form-data'>
									<div class='box box-solid'>
										<div class='box-header  bg-green with-border'>
											<h3 class='box-title'>Import Soal Excel</h3>
											<div class='box-tools pull-right btn-group'>
												<button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Import</button>
												<a href='?pg=<?= $pg ?>' class='btn btn-sm bg-maroon' title='Batal'><i class='fa fa-times'></i></a>
											</div>
										</div><!-- /.box-header -->
										<div class='box-body'>
											<?= $info ?>
											<div class='form-group'>
												<label>Mata Pelajaran</label>
												<input type='hidden' name='id_mapel' class='form-control' value="<?= $mapel['id_mapel'] ?>" />
												<input type='text' name='mapel' class='form-control' value="<?= $mapel['nama'] ?>" disabled />
											</div>
											<div class='form-group'>
												<label>Pilih File</label>
												<input type='file' name='file' class='form-control' required='true' />
											</div>
											<p>
												Sebelum meng-import pastikan file yang akan anda import sudah dalam bentuk Ms. Excel 97-2003 Workbook (.xls) dan format penulisan harus sesuai dengan yang telah ditentukan. <br />
											</p>
										</div><!-- /.box-body -->
										<div class='box-footer'>
											<a href='importdatasoal.xls'><i class='fa fa-file-excel-o'></i> Download Format</a>
										</div>
									</div><!-- /.box -->
								</form>
							</div>
							<div class='col-md-6'>
								<form action='<?= $homeurl ?>/admin/pages/word_import/import/index.php/word_import' method='post' enctype='multipart/form-data'>
									<div class='box box-solid'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Import Soal Ms Word</h3>
											<div class='box-tools pull-right btn-group'>
												<button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Import</button>
												<a href='?pg=<?= $pg ?>' class='btn btn-sm bg-maroon' title='Batal'><i class='fa fa-times'></i></a>
											</div>
										</div><!-- /.box-header -->
										<div class='box-body'>
											<div class='form-group'>
												<label>Mata Pelajaran</label>
												<input type='hidden' name='id_mapel' class='form-control' value="<?= $mapel['id_mapel'] ?>" />
												<input type='text' name='mapel' class='form-control' value="<?= $mapel['nama'] ?>" disabled />
											</div>
											<tr>
												<td>
													<input type='hidden' name='id_bank_soal' value=<?= $_REQUEST['id'] ?>>
												</td>
											</tr>
											<tr>
												<td> <input type='hidden' name='id_lokal' value='<?= $homeurl ?>'></td>
											</tr>
											<tr>
												<td> <input type='hidden' name='cid' value='1'></td>
											</tr>
											<tr>
												<td> <input type='hidden' name='lid' value='2'></td>
											</tr>
											<tr>
												<td> <input type='hidden' name='question_split' value='/Q:[0-9]+\)/'></td>
											</tr>
											<tr>
												<td><input type='hidden' name='description_split' value='/FileQ:/'></td>
											</tr>
											<tr>
												<td><input type='hidden' name='question_gambar' value='/Gambar:/'></td>
											</tr>
											<tr>
												<td><input type='hidden' name='question_video' value='/Video:/'></td>
											</tr>
											<tr>
												<td><input type='hidden' name='question_audio' value='/Audio:/'></td>
											</tr>
											<tr>
												<td><input type='hidden' name='option_split' value='/[A-Z]:\)/'></td>
											</tr>
											<tr>
												<td><input type='hidden' name='option_file' value='/FileO:/'></td>
											</tr>
											<tr>
												<td><input type='hidden' name='correct_split' value='/Kunci:/'></td>
											</tr>
											<div class='form-group'>
												<label>Pilih File</label>
												<input type='file' name='word_file' class='form-control' required='true' />
											</div>
											<p>
												Sebelum meng-import pastikan file yang akan anda import sudah dalam bentuk Ms. Word (.docx) dan format penulisan harus sesuai dengan yang telah ditentukan. <br />
											</p>
										</div><!-- /.box-body -->
										<div class='box-footer'>
											<a href='$homeurl/admin/pages/word_import/import/sample/sample.docx'><i class='fa fa-file-word-o'></i> Download Format</a>
										</div>
									</div><!-- /.box -->
								</form>
							</div>
							<div class='col-md-6'>
								<form action='' method='post' enctype='multipart/form-data'>
									<div class='box box-solid'>
										<div class='box-header  bg-yellow with-border'>
											<h3 class='box-title'>Import Soal Excel (Bee)</h3>
											<div class='box-tools pull-right btn-group'>
												<button type='submit' name='importbee' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Import</button>
												<a href='?pg=<?= $pg ?>' class='btn btn-sm bg-maroon' title='Batal'><i class='fa fa-times'></i></a>
											</div>
										</div><!-- /.box-header -->
										<div class='box-body'>
											<div class='form-group'>
												<label>Mata Pelajaran</label>
												<input type='hidden' name='id_mapel' class='form-control' value="<?= $mapel['id_mapel'] ?>" />
												<input type='text' name='mapel' class='form-control' value="<?= $mapel['nama'] ?>" disabled />
											</div>
											<div class='form-group'>
												<label>Pilih File</label>
												<input type='file' name='file' class='form-control' required='true' />
											</div>
											<p>
												Sebelum meng-import pastikan file yang akan anda import sudah dalam bentuk Ms. Excel 97-2003 Workbook (.xls) dan format penulisan harus sesuai dengan yang telah ditentukan. <br />
											</p>
										</div><!-- /.box-body -->
									</div><!-- /.box -->
								</form>
							</div>
							<?php include 'filesoal.php'; ?>
						</div>
					<?php endif; ?>
				<?php elseif ($pg == 'editguru') : ?>
					<?php
						if (isset($_POST['submit'])) :
							$username = $_POST['username'];
							$nip = $_POST['nip'];
							$nama = $_POST['nama'];
							$nama = str_replace("'", "&#39;", $nama);
							$exec = mysql_query("UPDATE pengawas SET username='$username', nama='$nama',nip='$nip',password='$_POST[password]' WHERE id_pengawas='$id_pengawas'");
						endif;
						?>
					<?php if ($ac == '') : ?>
						<?php
								$guru = mysql_fetch_array(mysql_query("SELECT * FROM pengawas WHERE id_pengawas='$pengawas[id_pengawas]'"));
								?>
						<div class='row'>
							<div class='col-md-3'>
								<div class='box box-solid'>
									<div class='box-body box-profile'>
										<img class='profile-user-img img-responsive img-circle' alt='User profile picture' src='<?= $homeurl ?>/dist/img/avatar-6.png'>
										<h3 class='profile-username text-center'><?= $guru['nama'] ?></h3>
									</div>
								</div>
							</div>
							<div class='col-md-9'>
								<div class='nav-tabs-custom'>
									<ul class='nav nav-tabs'>
										<li class='active'><a aria-expanded='true' href='#detail' data-toggle='tab'><i class='fa fa-user'></i> Detail Profile</a></li>
									</ul>
									<div class='tab-content'>
										<div class='tab-pane active' id='detail'>
											<div class='row margin-bottom'>
												<form action='' method='post'>
													<div class='col-sm-12'>
														<table class='table table-striped table-bordered'>
															<tbody>
																<tr>
																	<th scope='row'>Nama Lengkap</th>
																	<td><input class='form-control' name='nama' value="<?= $guru['nama'] ?>" /></td>
																</tr>
																<tr>
																	<th scope='row'>Nip</th>
																	<td><input class='form-control' name='nip' value="<?= $guru['nip'] ?>" /></td>
																</tr>
																<tr>
																	<th scope='row'>Username</th>
																	<td><input class='form-control' name='username' value="<?= $guru['username'] ?>" /></td>
																</tr>
																<tr>
																	<th scope='row'>Password</th>
																	<td><input class='form-control' name='password' value="<?= $guru['password'] ?>" /></td>
																</tr>
															</tbody>
														</table>
														<button name='submit' class='btn btn-sm btn-flat btn-success pull-right'>Perbarui Data </button>
													</div>
												</form>
											</div>
										</div>
										<div class='tab-pane' id='alamat'>
											<div class='row margin-bottom'>
												<div class='col-sm-12'>
													<table class='table  table-striped no-margin'>
														<tbody>

														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class='tab-pane' id='kesehatan'>
											<div class='row margin-bottom'>
												<div class='col-sm-12'>
													<table class='table  table-striped no-margin'>
														<tbody>


														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- /.tab-content -->
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php elseif ($pg == 'reset') : ?>
					<?php $info = ''; ?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'>Reset Login Peserta</h3>
									<div class='box-tools pull-right btn-group'>
										<button id='btnresetlogin' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Reset Login</button>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<?= $info ?>
									<div id='tablereset' class='table-responsive'>
										<table id='example1' class='table table-bordered table-striped'>
											<thead>
												<tr>
													<th width='5px'><input type='checkbox' id='ceksemua'></th>
													<th width='5px'>#</th>
													<th>No Peserta</th>
													<th>Nama Peserta</th>
													<th>Tanggal Login</th>
												</tr>
											</thead>
											<tbody>
												<?php $loginQ = mysql_query("SELECT * FROM login ORDER BY date DESC"); ?>
												<?php while ($login = mysql_fetch_array($loginQ)) : ?>
													<?php
															$siswa = mysql_fetch_array(mysql_query("select * from siswa where id_siswa='$login[id_siswa]'"));
															$no++;
															?>
													<tr>
														<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $login['id_log'] ?>"></td>
														<td><?= $no ?></td>
														<td><?= $siswa['no_peserta'] ?></td>
														<td><?= $siswa['nama'] ?></td>
														<td><?= $login['date'] ?></td>
													</tr>
												<?php endwhile; ?>
											</tbody>
										</table>
									</div>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
					</div>
				<?php elseif ($pg == 'pengaturan') : ?>
					<?php
						cek_session_admin();
						$info1 = $info2 = $info3 = $info4 = '';
						if (isset($_POST['submit1'])) :
							$alamat = nl2br($_POST['alamat']);
							$header = nl2br($_POST['header']);
							$exec = mysql_query("UPDATE setting SET aplikasi='$_POST[aplikasi]',sekolah='$_POST[sekolah]',kode_sekolah='$_POST[kode]',jenjang='$_POST[jenjang]',kepsek='$_POST[kepsek]',nip='$_POST[nip]',alamat='$alamat',kecamatan='$_POST[kecamatan]',kota='$_POST[kota]',telp='$_POST[telp]',fax='$_POST[fax]',web='$_POST[web]',email='$_POST[email]',header='$header',ip_server='$_POST[ipserver]',waktu='$_POST[waktu]' WHERE id_setting='1'");
							if ($exec) {
								$info1 = info('Berhasil menyimpan pengaturan!', 'OK');
								if ($_FILES['logo']['name'] <> '') {
									$logo = $_FILES['logo']['name'];
									$temp = $_FILES['logo']['tmp_name'];
									$ext = explode('.', $logo);
									$ext = end($ext);
									$dest = 'dist/img/logo' . rand(1, 100) . '.' . $ext;
									$upload = move_uploaded_file($temp, '../' . $dest);
									if ($upload) {
										$exec = mysql_query("UPDATE setting SET logo='$dest' WHERE id_setting='1'");
										$info1 = info('Berhasil menyimpan pengaturan!', 'OK');
									} else {
										$info1 = info('Gagal menyimpan pengaturan!', 'NO');
									}
								}
							} else {
								$info1 = info('Gagal menyimpan pengaturan!', 'NO');
							}
						endif;

						if (isset($_POST['submit3'])) :
							$password = $_POST['password'];
							if (!password_verify($password, $pengawas['password'])) {
								$info4 = info('Password salah!', 'NO');
							} else {
								if (!empty($_POST['data'])) {
									$data = $_POST['data'];
									if ($data <> '') {
										foreach ($data as $table) {
											if ($table <> 'pengawas') {
												mysql_query("TRUNCATE $table");
											} else {
												mysql_query("DELETE FROM $table WHERE level!='admin'");
											}
										}
										$info4 = info('Data terpilih telah dikosongkan!', 'OK');
									}
								}
							}
						endif;
						$admin = mysql_fetch_array(mysql_query("SELECT * FROM pengawas WHERE level='admin' AND id_pengawas='1'"));
						$setting = mysql_fetch_array(mysql_query("SELECT * FROM setting WHERE id_setting='1'"));
						$setting['alamat'] = str_replace('<br />', '', $setting['alamat']);
						$setting['header'] = str_replace('<br />', '', $setting['header']);
						?>
					<div class='row'>
						<div class='col-md-12 notif'></div>
						<div class='col-md-6'>
							<form action='' method='post' enctype='multipart/form-data'>
								<div class='box box-solid'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Pengaturan Aplikasi</h3>
										<div class='box-tools pull-right btn-group'>
											<button type='submit' name='submit1' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<?= $info1 ?>
										<div class='form-group'>
											<label>Nama Aplikasi</label>
											<input type='text' name='aplikasi' value="<?= $setting['aplikasi'] ?>" class='form-control' required='true' />
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-6'>
													<label>Nama Sekolah</label>
													<input type='text' name='sekolah' value="<?= $setting['sekolah'] ?>" class='form-control' required='true' />
												</div>
												<div class='col-md-6'>
													<label>Kode Sekolah</label>
													<input type='text' name='kode' value="<?= $setting['kode_sekolah'] ?>" class='form-control' required='true' />
												</div>
											</div>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-6'>
													<label>Alamat Server / Ip Server</label>
													<input type='text' name='ipserver' value="<?= $setting['ip_server'] ?>" class='form-control' />
												</div>
												<div class='col-md-6'>
													<label>Waktu Server</label>
													<select name='waktu' class='form-control' required='true'>
														<option value="<?= $setting['waktu'] ?>"><?= $setting['waktu'] ?></option>
														<option value='Asia/Jakarta'>Asia/Jakarta</option>
														<option value='Asia/Makassar'>Asia/Makassar</option>
														<option value='Asia/Jayapura'>Asia/Jayapura</option>
													</select>
												</div>
											</div>
										</div>
										<div class='form-group'>
											<label>Jenjang</label>
											<select name='jenjang' class='form-control' required='true'>
												<option value="<?= $setting['jenjang'] ?>"><?= $setting['jenjang'] ?></option>
												<option value='SD'>SD/MI</option>
												<option value='SMP'>SMP/MTS</option>
												<option value='SMK'>SMK/SMA/MA</option>
											</select>
										</div>
										<div class='form-group'>
											<label>Kepala Sekolah</label>
											<input type='text' name='kepsek' value="<?= $setting['kepsek'] ?>" class='form-control' />
										</div>
										<div class='form-group'>
											<label>NIP Kepala Sekolah</label>
											<input type='text' name='nip' value="<?= $setting['nip'] ?>" class='form-control' />
										</div>
										<div class='form-group'>
											<label>Alamat</label>
											<textarea name='alamat' class='form-control' rows='3'><?= $setting['alamat'] ?></textarea>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-6'>
													<label>Kecamatan</label>
													<input type='text' name='kecamatan' value="<?= $setting['kecamatan'] ?> " class='form-control' />
												</div>
												<div class='col-md-6'>
													<label>Kota/Kabupaten</label>
													<input type='text' name='kota' value="<?= $setting['kota'] ?>" class='form-control' />
												</div>
											</div>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-6'>
													<label>Telepon</label>
													<input type='text' name='telp' value="<?= $setting['telp'] ?>" class='form-control' />
												</div>
												<div class='col-md-6'>
													<label>Fax</label>
													<input type='text' name='fax' value="<?= $setting['fax'] ?>" class='form-control' />
												</div>
											</div>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-6'>
													<label>Website</label>
													<input type='text' name='web' value="<?= $setting['web'] ?>" class='form-control' />
												</div>
												<div class='col-md-6'>
													<label>E-mail</label>
													<input type='text' name='email' value="<?= $setting['email'] ?>" class='form-control' />
												</div>
											</div>
										</div>
										<div class='form-group'>
											<div class='row'>
												<div class='col-md-6'>
													<label>Logo</label>
													<input type='file' name='logo' class='form-control' />
												</div>
												<div class='col-md-6'>
													&nbsp;<br />
													<img class='img img-responsive' src="<?= $homeurl ?>/<?= $setting['logo'] ?>" height='100' />
												</div>
											</div>
										</div>
										<div class='form-group'>
											<label>Header Laporan</label>
											<textarea name='header' class='form-control' rows='3'><?= $setting['header'] ?></textarea>
										</div>
									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</form>
						</div>
						<div class='col-md-6'>
							<form action='' method='post'>
								<div class='box box-danger'>
									<div class='box-header with-border'>
										<h3 class='box-title'>Kosongkan Data</h3>
										<div class='box-tools pull-right btn-group'>
											<button type='submit' name='submit3' class='btn btn-sm bg-maroon'><i class='fa fa-trash-o'></i> Kosongkan</button>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<?= $info4 ?>
										<div class='form-group'>
											<label>Pilih Data</label>
											<div class='row'>
												<div class='col-md-5'>
													<div class='checkbox'>
														<small class='label bg-purple'>Pilih Data Hasil Nilai</small><br />
														<label><input type='checkbox' name='data[]' value='nilai' /> Data Nilai</label><br />
														<label><input type='checkbox' name='data[]' value='hasil_jawaban' /> Data Jawaban</label><br />
														<label><input type='checkbox' name='data[]' value='jawaban' /> Temp_Jawaban</label><br />
														<small class='label bg-green'>Pilih Data Bank Soal</small><br />
														<label><input type='checkbox' name='data[]' value='soal' /> Data Soal</label><br />

														<label><input type='checkbox' name='data[]' value='mapel' /> Data Bank Soal</label><br />
														<label><input type='checkbox' name='data[]' value='ujian' /> Data Jadwal Ujian</label><br />
														<small class='label label-danger'>Pilih Data Master</small><br />
														<label><input type='checkbox' name='data[]' value='siswa' /> Data Siswa</label><br />
														<label><input type='checkbox' name='data[]' value='kelas' /> Data Kelas</label><br />
														<label><input type='checkbox' name='data[]' value='mata_pelajaran' /> Data Mata Pelajaran</label><br />
														<label><input type='checkbox' name='data[]' value='pk' /> Data Jurusan</label><br />
														<label><input type='checkbox' name='data[]' value='level' /> Data Level</label><br />
														<label><input type='checkbox' name='data[]' value='ruang' /> Data Ruangan</label><br />
														<label><input type='checkbox' name='data[]' value='sesi' /> Data Sesi</label><br />

													</div>
												</div>
												<div class='col-md-7'>
													<p class='text-danger'><i class='fa fa-warning'></i> <strong>Mohon di ingat!</strong> Data yang telah dikosongkan tidak dapat dikembalikan.</p>
												</div>
											</div>
										</div>
										<div class='form-group'>
											<label>Password Admin</label>
											<input type='password' name='password' class='form-control' required='true' />
										</div>

									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</form>
							<div class='box box-danger'>
								<div class='box-header with-border'>
									<h3 class='box-title'>Backup Data</h3>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<p>Klik Tombol dibawah ini untuk membackup database </p>
									<button id='btnbackup' class='btn btn-flat btn-success'><i class='fa fa-database'></i> Backup Data</button>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
							<div class='box box-solid'>
								<div class='box-header with-border'>
									<h3 class='box-title'>Restore Data</h3>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<form method='post' action='' name='postform' enctype='multipart/form-data'>
										<p>Klik Tombol dibawah ini untuk merestore database </p>
										<div class='col-md-8'>
											<input class='form-control' name='datafile' type='file' />
										</div>
										<button name='restore' class='btn btn-flat btn-success'><i class='fa fa-database'></i> Restore Data</button>
									</form>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div>
					</div>
					<?php
						if (isset($_POST['restore'])) {
							restore($_FILES['datafile']);
						} else {
							unset($_POST['restore']);
						}
						?>
				<?php else : ?>
					<div class='error-page'>
						<h2 class='headline text-yellow'> 404</h2>
						<div class='error-content'>
							<br />
							<h3><i class='fa fa-warning text-yellow'></i> Upss! Halaman tidak ditemukan.</h3>
							<p>
								Halaman yang anda inginkan saat ini tidak tersedia.<br />
								Silahkan kembali ke <a href='?'><strong>dashboard</strong></a> dan coba lagi.<br />
								Hubungi petugas <strong><i>Developer</i></strong> jika ini adalah sebuah masalah.
							</p>
						</div><!-- /.error-content -->
					</div><!-- /.error-page -->
				<?php endif ?>
			</section><!-- /.content -->
		</div><!-- /.content-wrapper -->
		<footer class='main-footer hidden-xs'>
			<div class='container'>
				<div class='pull-left hidden-xs'>
					<strong>
						<span id='end-sidebar'>
							&copy; 2019 <?= APLIKASI . " " . $setting['versi'] . " rev. " . REVISI ?>
						</span>
					</strong>
				</div>

		</footer>
	</div><!-- ./wrapper -->

	<!-- REQUIRED JS SCRIPTS -->
	<script src='<?= $homeurl ?>/dist/bootstrap/js/bootstrap.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/fastclick/fastclick.js'></script>
	<script src='<?= $homeurl ?>/dist/js/adminlte.min.js'></script>
	<script src='<?= $homeurl ?>/dist/js/app.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/datetimepicker/build/jquery.datetimepicker.full.min.js'></script>

	<script src='<?= $homeurl ?>/plugins/slimScroll/jquery.slimscroll.min.js'></script>

	<script src='<?= $homeurl ?>/plugins/datatables/jquery.dataTables.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/datatables/dataTables.bootstrap.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/datatables/extensions/Select/js/dataTables.select.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/datatables/extensions/Select/js/select.bootstrap.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/iCheck/icheck.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/select2/select2.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/tableedit/jquery.tabledit.js'></script>

	<script src='<?= $homeurl ?>/plugins/notify/js/notify.js'></script>
	<script src='<?= $homeurl ?>/plugins/sweetalert2/dist/sweetalert2.min.js'></script>

	<script>
		$('.loader').fadeOut('slow');
		$(function() {
			$('#textarea').wysihtml5()
		});
		var autoRefresh = setInterval(
			function() {
				$('#waktu').load('<?= $homeurl ?>/admin/_load.php?pg=waktu');
				$('#log-list').load('<?= $homeurl ?>/admin/_load.php?pg=log');
				$('#pengumuman').load('<?= $homeurl ?>/admin/_load.php?pg=pengumuman');
			}, 1000
		);
		var autoRefresh = setInterval(
			function() {
				$('#divstatus').load('<?= $homeurl ?>/admin/statuspeserta.php');
			}, 1000
		);
		var autoRefresh = setInterval(
			function() {
				$('#isi_token').load('<?= $homeurl ?>/admin/_load.php?pg=token');
			}, 100000
		);

		$('.datepicker').datetimepicker({
			timepicker: false,
			format: 'Y-m-d'
		});
		$('.tgl').datetimepicker();
		$('.timer').datetimepicker({
			datepicker: false,
			format: 'H:i'
		});

		$(function() {
			$('#jenis').change(function() {
				if ($('#jenis').val() == '2') {
					$('#jawabanpg').hide();
					$('input:radio[name=jawaban]').attr('disabled', true);
				} else {
					$('#jawabanpg').show();
					$('input:radio[name=jawaban]').attr('disabled', false);
				}
			});
		});

		function printkartu(idkelas, judul) {
			$('#loadframe').attr('src', 'kartu.php?id_kelas=' + idkelas);
		}

		function printabsen() {
			var idsesi = $('#sesi option:selected').val();
			var idmapel = $('#mapel option:selected').val();
			var idruang = $('#ruang option:selected').val();
			var idkelas = $('#kelas option:selected').val();
			$('#loadabsen').attr('src', 'absen.php?id_sesi=' + idsesi + '&id_ruang=' + idruang + '&id_mapel=' + idmapel + '&id_kelas=' + idkelas);
		}

		function iCheckform() {
			$('input[type=checkbox].flat-check, input[type=radio].flat-check').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
				increaseArea: '20%' // optional
			});
		}

		$(document).ready(function() {
			$('#example1').DataTable({
				select: true
			});
			$('#soalpg').keyup(function() {
				$('#tampilpg').val(this.value);
			});
			$('#soalesai').keyup(function() {
				$('#tampilesai').val(this.value);
			});
			$('#formsoal').submit(function(e) {
				e.preventDefault();
				var data = new FormData(this);
				$.ajax({
					type: 'POST',
					url: 'simpansoal.php',
					enctype: 'multipart/form-data',
					data: data,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function() {
						swal({
							text: 'Proses menyimpan data',
							timer: 2000,
							onOpen: () => {
								swal.showLoading()
							}
						});
					},
					success: function(data) {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Data Berhasil disimpan',
							showConfirmButton: true
						});
					}
				})
				return false;
			});
			$('#ceksemua').change(function() {
				$(this).parents('#tablereset:eq(0)').
				find(':checkbox').attr('checked', this.checked);
			});

			$('.idkel').change(function() {
				var thisval = $(this).val();
				var txt_id = $(this).attr('id').replace('me', 'txt');
				var idm = $('#' + txt_id).val();
				var idu = $('#iduj').val();
				console.log(thisval + idm);
				$('.linknilai').attr('href', '?pg=nilai&ac=lihat&idu=' + idu + '&idm=' + idm + '&idk=' + thisval);
			});
			$('.alert-dismissible').fadeTo(2000, 500).slideUp(500, function() {
				$('.alert-dismissible').alert('close');
			});
			$('.select2').select2();

			$('input:checkbox[name=masuksemua]').click(function() {
				if ($(this).is(':checked'))
					$('input:radio.absensi').attr('checked', 'checked');
				else
					$('input:radio.absensi').removeAttr('checked');
			});
			iCheckform()
			$('#btnbackup').click(function() {
				$('.notif').load('backup.php');
				console.log('sukses');
			});
		});
	</script>
	<script>
		function kirim_form() {
			var homeurl;
			homeurl = '<?= $homeurl ?>';
			var jawab = $('#headerkartu').val();
			$.ajax({
				type: 'POST',
				url: 'simpanheader.php',
				data: 'jawab=' + jawab,
				success: function(response) {
					location.reload();
				}
			});
		}
	</script>

	<script type="text/javascript">
		var url = window.location;
		// for sidebar menu entirely but not cover treeview
		$('ul.sidebar-menu a').filter(function() {
			return this.href == url;
		}).parent().addClass('active');

		// for treeview
		$('ul.treeview-menu a').filter(function() {
			return this.href == url;
		}).closest('.treeview').addClass('active');
	</script>

	<script>
		$(function() {
			$("#btnresetlogin").click(function() {
				id_array = new Array();
				i = 0;
				$("input.cekpilih:checked").each(function() {
					id_array[i] = $(this).val();
					i++;
				});
				$.ajax({
					url: "resetlogin.php",
					data: "kode=" + id_array,
					type: "POST",
					success: function(respon) {
						if (respon == 1) {
							$("input.cekpilih:checked").each(function() {
								$(this).parent().parent().remove('.cekpilih').animate({
									opacity: "hide"
								}, "slow");
							})
						}
					}
				});
				return false;
			})
		});
		$(function() {
			$("#btnhapusbank").click(function() {
				id_array = new Array();
				i = 0;
				$("input.cekpilih:checked").each(function() {
					id_array[i] = $(this).val();
					i++;
				});
				swal({
					title: 'Bank Soal Terpilih ' + i,
					text: 'Apakah kamu yakin akan menghapus data bank soal yang sudah dipilih  ini ??',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Hapus!'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: 'hapusbanksoal.php',
							data: "kode=" + id_array,
							type: "POST",
							success: function(respon) {
								if (respon == 1) {
									$("input.cekpilih:checked").each(function() {
										$(this).parent().parent().remove('.cekpilih').animate({
											opacity: "hide"
										}, "slow");
									})
								}
							}
						})
					}
				});
				return false;
			})
		});
		$(function() {
			$("#btnhapusjadwal").click(function() {
				id_array = new Array();
				i = 0;
				$("input.cekpilih:checked").each(function() {
					id_array[i] = $(this).val();
					i++;
				})
				swal({
					title: 'Jadwal Terpilih ' + i,
					text: 'Apakah kamu yakin akan menghapus data jadwal yang sudah dipilih ini ??',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Hapus!'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: 'hapusjadwal.php',
							data: "kode=" + id_array,
							type: "POST",
							success: function(respon) {
								if (respon == 1) {
									$("input.cekpilih:checked").each(function() {
										$(this).parent().parent().remove('.cekpilih').animate({
											opacity: "hide"
										}, "slow");
									})
								}
							}
						})
					}
				});
				return false;
			})
		});
	</script>

	<script>
		$(function() {
			$("#buatberita").click(function() {
				swal({
					title: 'Generate Berita Acara',
					text: 'Pastikan pembuatan jadwal sudah fix ??',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Buat!'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: 'buatberita.php',
							type: "POST",
							beforeSend: function() {
								$('.loader').css('display', 'block');
							},
							success: function(respon) {
								$('.loader').css('display', 'none');
								location.reload();
							}
						})
					}
				});
				return false;
			})
		});

		$(document).ready(function() {
			var messages = $('#pesan').notify({
				type: 'messages',
				removeIcon: '<i class="icon icon-remove"></i>'
			});
			$('#formreset').submit(function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data) {
						if (data == "ok") {
							messages.show("Reset Login Peserta Berhasil", {
								type: 'success',
								title: 'Berhasil',
								icon: '<i class="icon icon-check-sign"></i>'
							});
						}
						if (data == "pilihdulu") {
							swal({
								position: 'top-end',
								type: 'success',
								title: 'Data Berhasil disimpan',
								showConfirmButton: true
							});
						}
					}
				});
				return false;
			});
			var t = $('#tabelsiswa').DataTable({
				'ajax': 'datasiswa.php',
				'order': [
					[1, 'asc']
				],
				'columns': [{
						'data': null,
						'width': '10px',
						'sClass': 'text-center'
					},
					{
						'data': 'no_peserta'
					},
					{
						'data': 'nama'
					},
					{
						'data': 'level'
					},
					{
						'data': 'id_kelas'
					},
					<?php if ($setting['jenjang'] == 'SMK') : ?> {
							'data': 'idpk'
						},
					<?php endif; ?> {
						'data': 'sesi'
					},
					{
						'data': 'ruang'
					},
					{
						'data': 'username'
					},
					{
						'data': 'password'
					},
					<?php if ($pengawas['level'] == 'admin') { ?> {
							'data': 'id_siswa',
							'width': '100px',
							'sClass': 'text-center',
							'orderable': false,
							'mRender': function(data) {
								return '<a class="btn btn-flat btn-xs bg-yellow" href="?pg=siswa&ac=edit&id=' + data + '"><i class="fa fa-pencil-square-o"></i></a> | \n\
                                <a class="btn btn-flat btn-xs bg-maroon" href="?pg=siswa&ac=hapussiswa&id=' + data + '" onclick="javascript:return confirm(\'Anda yakin akan menghapus data ini?\');"><i class="fa fa-trash"></i></a>';
							}
						}
					<?php } ?>
				]
			});
			t.on('order.dt search.dt', function() {
				t.column(0, {
					search: 'applied',
					order: 'applied'
				}).nodes().each(function(cell, i) {
					cell.innerHTML = i + 1;
				});
			}).draw();
		});
	</script>
	<script>
		$('#formsiswa').on('submit', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'post',
				url: 'importsiswa.php',
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				beforeSend: function() {
					$('#progressbox').html('<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>');
					$('.progress-bar').animate({
						width: "30%"
					}, 100);
				},
				success: function(response) {
					setTimeout(function() {
						$('.progress-bar').css({
							width: "100%"
						});
						setTimeout(function() {
							$('#hasilimport').html(response);
						}, 100);
					}, 500);
				}
			});
		});
	</script>

	<script>
		<?php if ($pg == 'jenisujian') : ?>
			$(document).ready(function() {
				$('#tablejenis').Tabledit({
					url: 'example.php?pg=jenisujian',
					restoreButton: false,
					columns: {
						identifier: [1, 'id'],
						editable: [
							[2, 'namajenis'],
							[3, 'status', '{"aktif": "aktif", "tidak": "tidak aktif"}']
						]
					}
				});
			});
		<?php endif; ?>
		<?php if ($pg == 'pk') : ?>
			$(document).ready(function() {
				$('#tablejurusan').Tabledit({
					url: 'example.php?pg=jurusan',
					restoreButton: false,
					columns: {
						identifier: [1, 'id'],
						editable: [
							[2, 'namajurusan']
						]
					}
				});
			});
		<?php endif; ?>
		<?php if ($pg == 'level') : ?>
			$(document).ready(function() {
				$('#tablelevel').Tabledit({
					url: 'example.php?pg=level',
					restoreButton: false,
					columns: {
						identifier: [1, 'id'],
						editable: [
							[2, 'namalevel']
						]
					}
				});
			});
		<?php endif; ?>
		<?php if ($pg == 'kelas') : ?>
			$(document).ready(function() {
				$('#tablekelas').Tabledit({
					url: 'example.php?pg=kelas',
					restoreButton: false,
					columns: {
						identifier: [1, 'id'],
						editable: [
							[2, 'level'],
							[3, 'namakelas']
						]
					}
				});
			});
		<?php endif; ?>
		<?php if ($pg == 'matapelajaran') : ?>
			$(document).ready(function() {
				$('#tablemapel').Tabledit({
					url: 'example.php?pg=mapel',
					restoreButton: false,
					columns: {
						identifier: [1, 'id'],
						editable: [
							[2, 'namamapel']
						]
					}
				});
			});
		<?php endif; ?>
		<?php if ($pg == 'ruang') : ?>
			$(document).ready(function() {
				$('#tableruang').Tabledit({
					url: 'example.php?pg=ruang',
					restoreButton: false,
					columns: {
						identifier: [1, 'id'],
						editable: [
							[2, 'namaruang']
						]
					}
				});
			});
		<?php endif; ?>
		<?php if ($pg == 'sesi') : ?>
			$(document).ready(function() {
				$('#tablesesi').Tabledit({
					url: 'example.php?pg=sesi',
					restoreButton: false,
					columns: {
						identifier: [1, 'id'],
						editable: [
							[2, 'namasesi']
						]
					}
				});
			});
		<?php endif; ?>
	</script>
	<script>
		$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
			$("#soallevel").change(function() { // Ketika user mengganti atau memilih data provinsi
				var level = $(this).val();
				console.log(level);
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: "datakelas.php", // Isi dengan url/path file php yang dituju
					data: "level=" + level, // data yang akan dikirim ke file yang dituju
					success: function(response) { // Ketika proses pengiriman berhasil
						$("#soalkelas").html(response);
					}
				});
			});

			$(document).on('click', '.hapus', function() {
				var id = $(this).data('id');
				console.log(id);
				$('#htmlujianselesai').html('bbbbbbbbbbbbbbbbbbbbbbbbb');
				swal({
					title: 'Apa anda yakin?',
					text: "aksi ini akan menyelesaikan secara paksa ujian yang sedang berlangsung!",
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes!'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: 'selesaikan.php',
							method: "POST",
							data: 'id=' + id,
							success: function(data) {
								$('#htmlujianselesai').html('1');
								swal({
									position: 'top-end',
									type: 'success',
									title: 'Data berhasil disimpan',
									showConfirmButton: false,
									timer: 1500
								});
							}
						});
					}
				})
			});

			$(document).on('click', '.ulang', function() {
				var id = $(this).data('id');
				console.log(id);
				swal({
					title: 'Apa anda yakin?',
					text: "Akan Mengulang Ujian Ini ??",

					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes!'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: 'ulangujian.php',
							method: "POST",
							data: 'id=' + id,
							success: function(data) {
								swal({
									position: 'top-end',
									type: 'success',
									title: 'Data berhasil disimpan',
									showConfirmButton: false,
									timer: 1500
								});
							}
						});
					}
				})
			});

			$(document).on('click', '.ambiljawaban', function() {
				var idmapel = $(this).data('id');
				console.log(idmapel);
				swal({
					title: 'Are you sure?',
					text: 'Fungsi ini akan memindahkan data jawaban dari temp_jawaban ke hasil jawaban',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Ambil!'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							type: 'POST',
							url: 'ambiljawaban.php',
							data: 'id=' + idmapel,
							beforeSend: function() {
								swal({
									text: 'Proses memindahkan',
									timer: 1000,
									onOpen: () => {
										swal.showLoading()
									}
								});
							},
							success: function(response) {
								$(this).attr('disabled', 'disabled');
								swal({
									position: 'top-end',
									type: 'success',
									title: 'Data Berhasil diambil',
									showConfirmButton: false,
									timer: 1500
								});
							}
						});
					}
				})
			});
		});
	</script>
</body>

</html>