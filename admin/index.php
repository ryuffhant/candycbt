<?php
require("../config/config.default.php");
require("../config/config.candy.php");
require("../config/config.function.php");
require("../config/functions.crud.php");
require("../config/excel_reader2.php");
(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
($id_pengawas == 0) ? header('location:login.php') : null;
$pengawas = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pengawas  WHERE id_pengawas='$id_pengawas'"));

(isset($_GET['pg'])) ? $pg = $_GET['pg'] : $pg = '';
(isset($_GET['ac'])) ? $ac = $_GET['ac'] : $ac = '';

if ($pg == 'siswa') :
	$sidebar = 'sidebar-collapse';
elseif ($pg == 'banksoal' && $ac == 'input') :
	$sidebar = 'sidebar-collapse';
elseif ($pg == 'nilai' && $ac == 'lihat') :
	$sidebar = 'sidebar-collapse';
elseif ($pg == 'semuanilai' && $ac == 'lihat') :
	$sidebar = 'sidebar-collapse';
else :
	$sidebar = '';
endif;

$nilai = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM nilai"));
$soal = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM mapel"));
$siswa = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa"));
$ruang = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ruang"));
$kelas = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kelas"));
$mapel = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM mata_pelajaran"));
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
	<link rel='stylesheet' href='<?= $homeurl ?>/dist/css/AdminLTE.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/dist/css/skins/skin-green-light.min.css' />
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
	<link rel='stylesheet' href='<?= $homeurl ?>/dist/css/costum.css' />
	<script src='<?= $homeurl ?>/plugins/tinymce/tinymce.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/jQuery/jquery-3.1.1.min.js'></script>

	<!-- <style type='text/css' media='print'>
		.page {
			-webkit-transform: rotate(-90deg);
			-moz-transform: rotate(-90deg);
			filter: 'progid:DXImageTransform.Microsoft.BasicImage(rotation=3)';
		}
	</style> -->
</head>

<body class='hold-transition skin-green-light sidebar-mini fixed <?= $sidebar ?>'>
	<div id='pesan'></div>
	<div class='loader'></div>
	<div class='wrapper'>
		<header class='main-header'>
			<a href='?' class='logo' style='background-color:#f9fafc'>
				<span class='animated bounce logo-mini'>
					<img src="<?= $homeurl . '/' . $setting['logo'] ?>" height="30px">
				</span>
				<span class='animated bounce logo-lg'>
					<img src="<?= $homeurl . '/' . $setting['logo'] ?>" height="40px"> <?= $setting['sekolah'] ?>
				</span>
			</a>
			<nav class='navbar navbar-static-top' style='background-color:#00a896;box-shadow: 0px 10px 10px 0px rgba(0,0,0,0.1)' role='navigation'>
				<a href='#' class='sidebar-toggle' data-toggle='offcanvas' role='button'>
					<span class='sr-only'>Toggle navigation</span>
				</a>
				<div class='navbar-custom-menu'>
					<ul class='nav navbar-nav'>
						<li><a href='?pg=informasi'><i class='fa  fa-commenting-o'></i></a></li>
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
				<!-- <div class='user-panel'>
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

				</div> -->
				<hr style="margin:0px">
				<div class="user-panel" style="text-align:center">
					<span>APLIKASI UJIAN</span><br>
					<span>BERBASIS KOMPUTER</span>
				</div>
				<hr style="margin:0px">
				<ul class=' sidebar-menu tree data-widget=' tree>

					<li class="header">MENU UTAMA</li>
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
							<a href='#'><img src='../dist/img/svg/nilai.svg' width='30'><span> Nilai </span><span class='pull-right-container'> <i class='glyphicon glyphicon-plus pull-right'></i> </span></a>
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
					<hr style="margin:0px">
					<?php
					if ($setting['jenjang'] == 'SMK') {
						$jenjang = 'SMK/SMA/MA';
					} elseif ($setting['jenjang'] == 'SMP') {
						$jenjang = 'SMP/MTS';
					} else {
						$jenjang = 'SD/MI';
					}
					?>
				</ul><!-- /.sidebar-menu -->
			</section>
		</aside>

		<div class='content-wrapper' style='background-image: url(backgroun.jpg);background-size: cover;'>
			<section class='content-header' style="height:102px;z-index:0;background:#00a896">
				<h1 style='text-shadow: 2px 2px 4px #827e7e;color:#fff'>
					&nbsp;<span class='hidden-xs'><?= $setting['aplikasi'] . '-' . $jenjang ?></span>
				</h1>
				<div style='float:right; margin-top:-37px'>
					<button class='btn  btn-flat  bg-purple' style="font-family:'OCR A Extended';font-weight:normal;"><i class='fa fa-calendar'></i> <?= buat_tanggal('D, d M Y') ?></button>
					<button class='btn  btn-flat  bg-maroon'><span id='waktu' style="font-family:'OCR A Extended';font-weight:normal;"><?= $waktu ?></span></button>
				</div>
				<div class='breadcrumb'></div>
			</section>
			<section class='content' style="margin-top:-65px">
				<?php if ($pg == '') : ?>
					<?php
						$testongoing = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM nilai WHERE ujian_mulai!='' AND ujian_selesai=''"));
						$testdone = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM nilai WHERE ujian_mulai!='' AND ujian_selesai!=''"));

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
						<div class='row'>

							<div class="col-lg-3">
								<div class="small-box bg-blue">
									<div class="inner">
										<h3><?= $siswa ?></h3>
										<p>Jumlah Siswa</p>
									</div>
									<div class="icon">
										<i class="fa fa-users"></i>
									</div>
									<a href="?pg=siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 ">
								<div class="small-box bg-yellow">
									<div class="inner">
										<h3><?= $nilai ?></h3>
										<p>Jumlah Nilai</p>
									</div>
									<div class="icon">
										<i class="fa fa-pencil-square-o"></i>
									</div>
									<a href="?pg=nilai" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="small-box bg-red">
									<div class="inner">
										<h3><?= $soal ?></h3>
										<p>Jumlah Soal</p>
									</div>
									<div class="icon">
										<i class="fa fa-file-text-o"></i>
									</div>
									<a href="?pg=banksoal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="small-box bg-green">
									<div class="inner">
										<h3><?= $kelas ?></h3>
										<p>Jumlah Kelas</p>
									</div>
									<div class="icon">
										<i class="fa fa-university"></i>
									</div>
									<a href="?pg=kelas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class='animated flipInX col-md-8'>
								<div class='box box-solid direct-chat direct-chat-warning'>
									<div class='box-header with-border'>
										<h3 class='box-title'><img src='../dist/img/svg/advertising.svg' width='30'> </i>
											Pengumuman
										</h3>
										<div class='box-tools pull-right'>

											<a href='?pg=<?= $pg ?>&ac=clearpengumuman' class='btn btn-default' title='Bersihkan Pengumuman'><i class='fa fa-trash-o'></i></a>
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

							<div class='animated flipInX col-md-4'>
								<div class='box box-solid direct-chat direct-chat-warning'>
									<div class='box-header with-border'>
										<h3 class='box-title'><i class='fa fa-history'></i> Log Aktifitas</h3>
										<div class='box-tools pull-right'>
											<a href='?pg=<?= $pg ?>&ac=clearlog' class='btn btn-default' title='Bersihkan Log'><i class='fa fa-trash-o'></i></a>
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
							mysqli_query($koneksi, "TRUNCATE log");
							jump('?');
						}
						if ($ac == 'clearpengumuman') {
							mysqli_query($koneksi, "TRUNCATE pengumuman");
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
				<?php elseif ($pg == 'informasi') : ?>
					<?php include 'informasi.php'; ?>
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
							$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE kode_mapel='$kode'"));
							if ($cek == 0) {
								$exec = mysqli_query($koneksi, "INSERT INTO mata_pelajaran (kode_mapel,nama_mapel)value('$kode','$nama')");
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
									$cek = mysqli_num_rows(mysqli_query($koneksi, "select * from mata_pelajaran where kode_mapel='$kode'"));
									if ($kode <> '' and $nama <> '') {
										if ($cek == 0) {
											$exec = mysqli_query($koneksi, "INSERT INTO mata_pelajaran (kode_mapel,nama_mapel) VALUES ('$kode','$nama')");
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
									<div class='box-tools pull-right '>
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
												<?php $mapelQ = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran ORDER BY nama_mapel ASC"); ?>
												<?php while ($mapel = mysqli_fetch_array($mapelQ)) : ?>
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
												<div class='box-tools pull-right '>
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
												<div class='box-tools pull-right '>
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
							$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM token"));
							if ($cek <> 0) {
								$query = mysqli_fetch_array(mysqli_query($koneksi, "SELECT time FROM token"));
								$time = $query['time'];
								$tgl = buat_tanggal('H:i:s', $time);
								$exec = mysqli_query($koneksi, "UPDATE token SET token='$token', time='$now' where id_token='1'");
							} else {
								$exec = mysqli_query($koneksi, "INSERT INTO token (token,masa_berlaku) VALUES ('$token','00:15:00')");
							}
						}
						$token = mysqli_fetch_array(mysqli_query($koneksi, "select token from token"))
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
												<?php $tokenku = mysqli_query($koneksi, "SELECT * FROM token "); ?>
												<?php while ($token = mysqli_fetch_array($tokenku)) : ?>
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
							$exec = mysqli_query($koneksi, "INSERT INTO pengumuman (judul,text,user,type) VALUES ('$_POST[judul]','$_POST[pengumuman]','$pengawas[id_pengawas]','$_POST[tipe]')");
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
												<?php $pengumumanq = mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY date DESC"); ?>
												<?php while ($pengumuman = mysqli_fetch_array($pengumumanq)) : ?>
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
															<div class=''>
																<a><button class='btn bg-maroon btn-flat btn-xs' data-toggle='modal' data-target="#hapus<?= $pengumuman['id_pengumuman'] ?>"><i class='fa fa-trash-o'></i></button></a>
															</div>
														</td>
													</tr>
													<?php $info = info("Anda yakin akan menghapus pengumuman ini ?"); ?>
													<?php
															if (isset($_POST['hapus'])) {
																$exec = mysqli_query($koneksi, "DELETE FROM pengumuman WHERE id_pengumuman = '$_REQUEST[idu]'");
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
																			<div class='box-tools pull-right '>
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
									<div class='box-tools pull-right '>
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
												<?php $guruku = mysqli_query($koneksi, "SELECT * FROM pengawas where level='guru' ORDER BY nama ASC"); ?>
												<?php while ($pengawas = mysqli_fetch_array($guruku)) : ?>
													<?php $no++; ?>
													<tr>
														<td><?= $no ?></td>
														<td><?= $pengawas['nip'] ?></td>
														<td><?= $pengawas['nama'] ?></td>
														<td><small class='label bg-purple'><?= $pengawas['username'] ?></small></td>
														<td><small class='label bg-blue'><?= $pengawas['password'] ?></small></td>
														<td><?= $pengawas['level'] ?></td>
														<td style="text-align:center">
															<div class=''>
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

											$cekuser = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengawas WHERE username='$username'"));
											if ($cekuser > 0) {
												$info = info("Username $username sudah ada!", "NO");
											} else {
												if ($pass1 <> $pass2) {
													$info = info("Password tidak cocok!", "NO");
												} else {
													$password = $pass1;
													$exec = mysqli_query($koneksi, "INSERT INTO pengawas (nip,nama,username,password,level) VALUES ('$nip','$nama','$username','$password','guru')");
													(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
												}
											}
										}
										?>
								<form action='' method='post'>
									<div class='box box-solid'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Tambah</h3>
											<div class='box-tools pull-right '>
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
										$value = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pengawas WHERE id_pengawas='$id'"));
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
													$exec = mysqli_query($koneksi, "UPDATE pengawas SET nip='$nip',nama='$nama',username='$username',password='$password',level='guru' WHERE id_pengawas='$id'");
												}
											} else {
												$exec = mysqli_query($koneksi, "UPDATE pengawas SET nip='$nip',nama='$nama',username='$username',level='guru' WHERE id_pengawas='$id'");
											}
											(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
										}
										?>
								<form action='' method='post'>
									<div class='box box-solid'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Edit</h3>
											<div class='box-tools pull-right '>
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
											$exec = mysqli_query($koneksi, "DELETE FROM pengawas WHERE id_pengawas='$id'");
											(!$exec) ? $info = info("Gagal menghapus!", "NO") : jump("?pg=" . $pg);
										}
										?>
								<form action='' method='post'>
									<div class='box box-danger'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Hapus</h3>
											<div class='box-tools pull-right '>
												<button type='submit' name='submit' class='btn btn-sm bg-maroon'><i class='fa fa-trash-o'></i> Hapus</button>
												<a href='?pg=<?= $pg ?>' class='btn btn-sm btn-default' title='Batal'><i class='fa fa-times'></i></a>
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
								$sqlx = mysqli_query($koneksi, "SELECT * FROM berita a LEFT JOIN mapel b ON a.id_mapel=b.id_mapel LEFT JOIN mata_pelajaran c ON b.nama=c.kode_mapel WHERE a.id_berita='$idberita'");
								$ujian = mysqli_fetch_array($sqlx);
								$kodeujian = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM jenis WHERE id_jenis='$ujian[jenis]'"));
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
										<div class='box-tools pull-right '>
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
								$mapelx = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel='$idmapel'"));
								$namamapel = $mapelx['nama'];
								$mapely = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE kode_mapel='$namamapel'"));
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
								$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ujian WHERE nama='$nama_mapel' AND sesi='$sesi' AND kode_ujian='$kode_ujian' AND level='$level' AND kelas ='$kelas'"));
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
											$exec = mysqli_query($koneksi, "INSERT INTO ujian (id_pk, id_mapel, nama,jml_soal,jml_esai,lama_ujian, tgl_ujian, tgl_selesai, waktu_ujian, level, sesi, acak, token, status, bobot_pg, bobot_esai, id_guru, tampil_pg, tampil_esai, hasil, kelas, opsi, kode_ujian, kkm, ulang) VALUES ('$id_pk','$idmapel','$nama_mapel','$jmlsoal','$jml_esai','$lama_ujian','$tgl_ujian','$tgl_selesai','$wkt_ujian','$level','$sesi','$acak','$token','1','$bobot_pg','$bobot_esai','$idguru','$tampil_pg','$tampil_esai','$hasil','$kelas','$opsi','$kode_ujian', '$kkm', '$ulang')");
										} else {
											$exec = mysqli_query($koneksi, "INSERT INTO ujian (id_pk, id_mapel, nama,jml_soal,jml_esai,lama_ujian, tgl_ujian, tgl_selesai, waktu_ujian, level, sesi, acak, token, status ,bobot_pg, bobot_esai, id_guru, tampil_pg, tampil_esai, hasil, kelas, opsi, kode_ujian, kkm, ulang) VALUES ('$id_pk','$idmapel','$nama_mapel','$jmlsoal','$jml_esai','$lama_ujian','$tgl_ujian','$tgl_selesai','$wkt_ujian','$level','$sesi','$acak','$token','1','$bobot_pg','$bobot_esai','$id_pengawas','$tampil_pg','$tampil_esai','$hasil','$kelas','$opsi','$kode_ujian', '$kkm', '$ulang')");
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
														$namamapelx = mysqli_query($koneksi, "SELECT * FROM mapel where status='1' order by nama ASC");
													} else {
														$namamapelx = mysqli_query($koneksi, "SELECT * FROM mapel where status='1' and idguru='$id_pengawas' order by nama ASC");
													}
													while ($namamapel = mysqli_fetch_array($namamapelx)) {
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
													$namaujianx = mysqli_query($koneksi, "SELECT * FROM jenis where status='aktif' order by nama ASC");
													while ($ujian = mysqli_fetch_array($namaujianx)) {
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
													$sesix = mysqli_query($koneksi, "SELECT * from sesi");
													while ($sesi = mysqli_fetch_array($sesix)) {
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
									<div class='box-tools pull-right '>
										<?php if ($pengawas['level'] == 'admin') : ?>
											<a id='btnhapusjadwal' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-trash'></i> Kosongkan</a>
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
															$exec = mysqli_query($koneksi, "UPDATE ujian SET sesi='$sesi',nama='$nama',tgl_ujian='$tglujian',tgl_selesai='$tglselesai',waktu_ujian='$waktu',lama_ujian='$lama',status='$status',kode_ujian='$kode_ujian' WHERE id_ujian='$idujian'");
															(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
														}
														if ($pengawas['level'] == 'admin') {
															$mapelQ = mysqli_query($koneksi, "SELECT * FROM ujian ORDER BY tgl_ujian ASC, waktu_ujian ASC");
														} else {
															$mapelQ = mysqli_query($koneksi, "SELECT * FROM ujian where id_guru='$id_pengawas' ORDER BY tgl_ujian ASC, waktu_ujian ASC");
														}
														?>
													<?php while ($mapel = mysqli_fetch_array($mapelQ)) : ?>
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
																							$namaujianx = mysqli_query($koneksi, "SELECT * FROM jenis where status='aktif' order by nama ASC");
																							while ($ujian = mysqli_fetch_array($namaujianx)) {
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
																				<div class='box-tools pull-right '>
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
									mysqli_query($koneksi, "TRUNCATE ujian");
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
									<div class='box-tools pull-right '>
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
													$beritaQ = mysqli_query($koneksi, "SELECT * FROM berita");
													?>
												<?php while ($berita = mysqli_fetch_array($beritaQ)) : ?>
													<?php
															$mapel = mysqli_fetch_array(mysqli_query($koneksi, "select * from mapel a left join mata_pelajaran b ON a.nama=b.kode_mapel where a.id_mapel='$berita[id_mapel]'"));
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
															<div class=''>
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
																$exec = mysqli_query($koneksi, "UPDATE berita SET ikut='$hadir',susulan='$tidakhadir',mulai='$mulai',selesai='$selesai',nama_pengawas='$pengawas',nip_pengawas='$nippengawas', nama_proktor='$proktor',nip_proktor='$nipproktor',catatan='$catatan',tgl_ujian='$tglujian',no_susulan='$nosusulan' WHERE id_berita='$idberita'");
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
																							$lev = mysqli_query($koneksi, "SELECT * FROM siswa where ruang='$bruang' and sesi='$bsesi' ORDER BY nama ASC");
																							while ($siswa = mysqli_fetch_array($lev)) {
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
																			<div class='box-tools pull-right '>
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
									<div class='box-tools pull-right '>
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
													$beritaQ = mysqli_query($koneksi, "SELECT * FROM berita WHERE no_susulan <> ''");
													?>
												<?php while ($berita = mysqli_fetch_array($beritaQ)) : ?>
													<?php
															$mapel = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mapel a LEFT JOIN mata_pelajaran b ON a.nama=b.kode_mapel WHERE a.id_mapel='$berita[id_mapel]'"));

															?>

													<?php
															if ($berita['no_susulan'] <> "") :
																$dataArray = unserialize($berita['no_susulan']);
																foreach ($dataArray as $key => $value) : ?>
															<?php
																			$siswaQ = mysqli_query($koneksi, "select * from siswa where no_peserta='$value'");
																			?>
															<?php while ($siswa = mysqli_fetch_array($siswaQ)) : ?>
																<?php
																					$cek = mysqli_num_rows(mysqli_query($koneksi, "select * from nilai where id_mapel='$berita[id_mapel]' and id_siswa='$siswa[id_siswa]'"));
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
													<?php endif ?>
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
										<div class='box-tools pull-right '>
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
										<div class='box-tools pull-right '>
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
															$total = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kelas"));
															$limit = number_format($total / 3, 0, '', '');
															$limit2 = number_format($limit * 2, 0, '', '');
															$sql_kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama ASC LIMIT 0,$limit");
															?>
													<?php while ($kelas = mysqli_fetch_array($sql_kelas)) : ?>
														<div class='radio'>
															<label><input type='radio' name='idk' value="<?= $kelas['id_kelas'] ?>" onclick="printkartu('<?= $kelas[0] ?>')" /> <?= $kelas['nama'] ?></label>
														</div>
													<?php endwhile ?>
												</div>
												<div class='col-xs-4'>
													<?php
															$sql_kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama ASC LIMIT $limit,$limit");
															?>
													<?php while ($kelas = mysqli_fetch_array($sql_kelas)) : ?>
														<div class='radio'>
															<label><input type='radio' name='idk' value="<?= $kelas['id_kelas'] ?>" onclick="printkartu('<?= $kelas[0] ?>')" /> <?= $kelas['nama'] ?></label>
														</div>
													<?php endwhile ?>
												</div>
												<div class='col-xs-4'>
													<?php
															$sql_kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama ASC LIMIT $limit2,$total");
															?>
													<?php while ($kelas = mysqli_fetch_array($sql_kelas)) : ?>
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
										<div class='box-tools pull-right '>
											<button id='btnabsen' class='btn btn-sm btn-flat btn-success' onclick="frames['frameresult'].print()"><i class='fa fa-print'></i> Print</button>
										</div>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<?= $info ?>
										<div class='form-group'>
											<div class='form-group'>
												<label>Pilih Mapel</label>
												<select id='absenmapel' class='select2 form-control' required='true' onchange=printabsen();>
													<?php $sql_mapel = mysqli_query($koneksi, "SELECT * FROM ujian group by nama"); ?>
													<option value=''>pilih mapel</option>
													<?php while ($mapel = mysqli_fetch_array($sql_mapel)) : ?>
														<option value="<?= $mapel['id_mapel'] ?>"><?= $mapel['nama'] ?></option>
													<?php endwhile ?>
												</select>
											</div>
											<div class='form-group'>
												<label>Pilih Kelas</label>
												<select id='absenkelas' class='form-control select2' onchange=printabsen();>
												</select>
											</div>
											<div class='form-group'>
												<label>Pilih Ruang</label>
												<select id='absenruang' class='form-control select2' onchange=printabsen();>";

												</select>
											</div>
											<div class='form-group'>
												<label>Pilih Sesi</label>
												<select id='absensesi' class='form-control select2' onchange=printabsen();>
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
							<div class='box-tools pull-right '>
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
							<div class='box-tools pull-right '>
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

						$format = 'importdatamaster.xlsx';

						?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border '>
									<h3 class='box-title'><img src='../dist/img/svg/data_master.svg' width='20'> Import Data Master</h3>
									<div class='box-tools pull-right '>
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
								$exec = mysqli_query($koneksi, "delete from pengawas where level='guru'");
								for ($i = 2; $i <= $hasildata; $i++) :
									$nip = $data->val($i, 2);
									$nama = $data->val($i, 3);
									$nama = addslashes($nama);
									$username = $data->val($i, 4);
									$username = str_replace("'", "", $username);
									$password = $data->val($i, 5);
									$exec = mysqli_query($koneksi, "INSERT INTO pengawas (nip,nama,username,password,level) VALUES ('$nip','$nama','$username','$password','guru')");
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
										<div class='box-tools pull-right '>
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
												<?php $pengawasQ = mysqli_query($koneksi, "SELECT * FROM pengawas where level='admin' ORDER BY nama ASC"); ?>
												<?php while ($pengawas = mysqli_fetch_array($pengawasQ)) : ?>
													<?php $no++; ?>
													<tr>
														<td><?= $no ?></td>
														<td><?= $pengawas['nip'] ?></td>
														<td><?= $pengawas['nama'] ?></td>
														<td><?= $pengawas['username'] ?></td>
														<td><?= $pengawas['level'] ?></td>
														<td style="text-align:center">
															<div class=''>
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

											$cekuser = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengawas WHERE username='$username'"));
											if ($cekuser > 0) {
												$info = info("Username $username sudah ada!", "NO");
											} else {
												if ($pass1 <> $pass2) :
													$info = info("Password tidak cocok!", "NO");
												else :
													$password = password_hash($pass1, PASSWORD_BCRYPT);
													$exec = mysqli_query($koneksi, "INSERT INTO pengawas (nip,nama,username,password,level) VALUES ('$nip','$nama','$username','$password','admin')");
													(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
												endif;
											}
										endif;
										?>
								<form action='' method='post'>
									<div class='box box-solid'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Tambah</h3>
											<div class='box-tools pull-right '>
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
										$value = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pengawas WHERE id_pengawas='$id'"));
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
													$exec = mysqli_query($koneksi, "UPDATE pengawas SET nip='$nip',nama='$nama',username='$username',password='$password',level='admin' WHERE id_pengawas='$id'");
												endif;
											} else {
												$exec = mysqli_query($koneksi, "UPDATE pengawas SET nip='$nip',nama='$nama',username='$username',level='admin' WHERE id_pengawas='$id'");
											}
											(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=$pg");
										endif;
										?>
								<form action='' method='post'>
									<div class='box box-solid'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Edit</h3>
											<div class='box-tools pull-right '>
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
											$exec = mysqli_query($koneksi, "DELETE FROM pengawas WHERE id_pengawas='$id'");
											(!$exec) ? $info = info("Gagal menghapus!", "NO") : jump("?pg=$pg");
										}
										?>
								<form action='' method='post'>
									<div class='box box-danger'>
										<div class='box-header with-border'>
											<h3 class='box-title'>Hapus</h3>
											<div class='box-tools pull-right '>
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
								if (isset($_POST['tambahPK'])) :
									$idpk = str_replace(' ', '', $_POST['idpk']);
									$nama = $_POST['nama'];
									$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pk WHERE id_pk='$idpk'"));
									if ($cek > 0) {
										$info = info("Jurusan dengan kode $idpk sudah ada!", "NO");
									} else {
										$exec = mysqli_query($koneksi, "INSERT INTO pk (id_pk,program_keahlian) VALUES ('$idpk','$nama')");
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
											<button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahPK'><i class='fa fa-check'></i> Tambah Jurusan</button>
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
												<?php $adminQ = mysqli_query($koneksi, "SELECT * FROM pk ORDER BY id_pk ASC"); ?>
												<?php while ($adm = mysqli_fetch_array($adminQ)) : ?>
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
							<div class='modal fade' id='tambahPK' style='display: none;'>
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
													<div class='box-tools pull-right '>
														<button type='submit' name='tambahPK' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
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
							$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM jenis WHERE id_jenis='$id'"));
							if ($cek > 0) {
								$info = info("Jenis Ujian dengan kode $id sudah ada!", "NO");
							} else {
								$exec = mysqli_query($koneksi, "INSERT INTO jenis (id_jenis,nama,status) VALUES ('$id','$nama','tidak')");
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
											<?php $adminQ = mysqli_query($koneksi, "SELECT * FROM jenis ORDER BY id_jenis ASC"); ?>
											<?php while ($adm = mysqli_fetch_array($adminQ)) : ?>
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
												<div class='box-tools pull-right '>
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
					<?php include 'master_ruang.php'; ?>
				<?php elseif ($pg == 'level') : ?>
					<?php
						cek_session_admin();
						if (isset($_POST['submit'])) :
							$level = str_replace(' ', '', $_POST['level']);
							$ket = $_POST['keterangan'];

							$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM level WHERE kode_level='$level'"));
							if ($cek > 0) {
								$info = info("Level atau tingkat $level sudah ada!", "NO");
							} else {
								$exec = mysqli_query($koneksi, "INSERT INTO level (kode_level,keterangan) VALUES ('$level','$ket')");
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
											<?php $adminQ = mysqli_query($koneksi, "SELECT * FROM level"); ?>
											<?php while ($adm = mysqli_fetch_array($adminQ)) : ?>
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
												<div class='box-tools pull-right '>
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

							$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM sesi WHERE kode_sesi='$sesi'"));
							if ($cek > 0) {
								$info = info("Kelompok Test atau Sesi $sesi sudah ada!", "NO");
							} else {
								$exec = mysqli_query($koneksi, "INSERT INTO sesi (kode_sesi,nama_sesi) VALUES ('$sesi','$nama')");
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
											<?php $adminQ = mysqli_query($koneksi, "SELECT * FROM sesi"); ?>
											<?php while ($adm = mysqli_fetch_array($adminQ)) : ?>
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
												<div class='box-tools pull-right '>
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
							$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$idkelas'"));
							if ($cek > 0) {
								$info = info("Kelas dengan kode $idkelas sudah ada!", "NO");
							} else {
								$exec = mysqli_query($koneksi, "INSERT INTO kelas (id_kelas,nama,level) VALUES ('$idkelas','$nama','$level')");
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
											<?php $adminQ = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama ASC"); ?>
											<?php while ($adm = mysqli_fetch_array($adminQ)) : ?>
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
														$levelQ = mysqli_query($koneksi, "SELECT * FROM level ");
														while ($level = mysqli_fetch_array($levelQ)) {
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
												<div class='box-tools pull-right '>
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
					<?php include "banksoal.php"; ?>
				<?php elseif ($pg == 'editguru') : ?>
					<?php
						if (isset($_POST['submit'])) :
							$username = $_POST['username'];
							$nip = $_POST['nip'];
							$nama = $_POST['nama'];
							$nama = str_replace("'", "&#39;", $nama);
							$exec = mysqli_query($koneksi, "UPDATE pengawas SET username='$username', nama='$nama',nip='$nip',password='$_POST[password]' WHERE id_pengawas='$id_pengawas'");
						endif;
						?>
					<?php if ($ac == '') : ?>
						<?php
								$guru = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pengawas WHERE id_pengawas='$pengawas[id_pengawas]'"));
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
									<div class='box-tools pull-right '>
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
												<?php $loginQ = mysqli_query($koneksi, "SELECT * FROM login ORDER BY date DESC"); ?>
												<?php while ($login = mysqli_fetch_array($loginQ)) : ?>
													<?php
															$siswa = mysqli_fetch_array(mysqli_query($koneksi, "select * from siswa where id_siswa='$login[id_siswa]'"));
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
							$exec = mysqli_query($koneksi, "UPDATE setting SET aplikasi='$_POST[aplikasi]',sekolah='$_POST[sekolah]',kode_sekolah='$_POST[kode]',jenjang='$_POST[jenjang]',kepsek='$_POST[kepsek]',nip='$_POST[nip]',alamat='$alamat',kecamatan='$_POST[kecamatan]',kota='$_POST[kota]',telp='$_POST[telp]',fax='$_POST[fax]',web='$_POST[web]',email='$_POST[email]',header='$header',ip_server='$_POST[ipserver]',waktu='$_POST[waktu]' WHERE id_setting='1'");
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
										$exec = mysqli_query($koneksi, "UPDATE setting SET logo='$dest' WHERE id_setting='1'");
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
												mysqli_query($koneksi, "TRUNCATE $table");
											} else {
												mysqli_query($koneksi, "DELETE FROM $table WHERE level!='admin'");
											}
										}
										$info4 = info('Data terpilih telah dikosongkan!', 'OK');
									}
								}
							}
						endif;
						$admin = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pengawas WHERE level='admin' AND id_pengawas='1'"));
						$setting = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM setting WHERE id_setting='1'"));
						$setting['alamat'] = str_replace('<br />', '', $setting['alamat']);
						$setting['header'] = str_replace('<br />', '', $setting['header']);
						?>
					<div class='row'>
						<div class='col-md-12'>
							<div class="box box-widget widget-user-2">
								<!-- Add the bg color to the header using any of the bg-* classes -->
								<div class="widget-user-header bg-blue">
									<div class="widget-user-image">
										<img class="img-circle" src="../dist/img/svg/services.svg" alt="User Avatar">
									</div>
									<!-- /.widget-user-image -->
									<h3 class="widget-user-username">Pengaturan</h3>
									<h5 class="widget-user-desc">Pengaturan Aplikasi</h5>
								</div>
								<div class="box-footer no-padding ">
									<div class="nav-tabs-custom">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Pengaturan Umum</a></li>
											<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Hapus Data</a></li>
											<li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Backup & Restore</a></li>
											<li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Backup Master Soal</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1">
												<form action='' method='post' enctype='multipart/form-data'>

													<div class='box-body'>
														<button type='submit' name='submit1' class='btn btn-flat pull-right btn-success' style='margin-bottom:5px'><i class='fa fa-check'></i> Simpan</button>
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
																<div class='col-md-2'>
																	&nbsp;<br />
																	<img class='img img-responsive' src="<?= $homeurl ?>/<?= $setting['logo'] ?>" height='50' />
																</div>
															</div>
														</div>
														<div class='form-group'>
															<label>Header Laporan</label>
															<textarea name='header' class='form-control' rows='3'><?= $setting['header'] ?></textarea>
														</div>
													</div><!-- /.box-body -->

												</form>
											</div>
											<!-- /.tab-pane -->
											<div class="tab-pane" id="tab_2">
												<form action='' method='post'>
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
																		<small class='label bg-green'>Pilih Data Ujian</small><br />
																		<label><input type='checkbox' name='data[]' value='soal' /> Data Soal</label><br />
																		<label><input type='checkbox' name='data[]' value='mapel' /> Data Bank Soal</label><br />
																		<label><input type='checkbox' name='data[]' value='ujian' /> Data Jadwal Ujian</label><br />
																		<label><input type='checkbox' name='data[]' value='berita' /> Data Berita Acara</label><br />
																		<label><input type='checkbox' name='data[]' value='pengacak' /> Data Pengacak Soal</label><br />
																		<label><input type='checkbox' name='data[]' value='pengacakopsi' /> Data Pengacak Opsi</label><br />

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
																	<button type='submit' name='submit3' class='btn btn-sm bg-maroon'><i class='fa fa-trash-o'></i> Kosongkan</button>
																	<div class='form-group'>
																		<label>Password Admin</label>
																		<input type='password' name='password' class='form-control' required='true' />
																	</div>

																	<p class='text-danger'><i class='fa fa-warning'></i> <strong>Mohon di ingat!</strong> Data yang telah dikosongkan tidak dapat dikembalikan.</p>
																</div>
															</div>
														</div>
													</div><!-- /.box-body -->
												</form>
											</div>
											<!-- /.tab-pane -->
											<div class="tab-pane" id="tab_3">
												<div class='col-md-12 notif'></div>
												<div class='col-md-6'>
													<div class='box box-solid'>
														<div class='box-header '>
															<h3 class='box-title'>Backup Data</h3>
														</div><!-- /.box-header -->
														<div class='box-body'>
															<p>Klik Tombol dibawah ini untuk membackup database </p>
															<button id='btnbackup' class='btn btn-flat btn-success'><i class='fa fa-database'></i> Backup Data</button>
														</div><!-- /.box-body -->
													</div><!-- /.box -->
												</div>
												<div class='col-md-6'>
													<div class='box box-solid'>
														<div class='box-header '>
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
											<div class="tab-pane" id="tab_4">
												<div class="row">
													<div class='col-md-12 notif_mapel'></div>
													<div class='col-md-12'>
														<div class="panel panel-default">
															<div class="panel-body">
																<label for="mapel" class="col-sm-2">Mapel yang Tersedia</label>
																<div class="col-sm-10">
																	<select name="mapel_id" id="mapel_id" class="form-control select2" style="width: 100%;" required>
																		<?php $mapelbackup = mysqli_query($koneksi, "SELECT a.id_mapel, b.kode_mapel, b.nama_mapel FROM mapel a INNER JOIN mata_pelajaran b ON a.nama = b.kode_mapel INNER JOIN soal c ON a.id_mapel = c.id_mapel GROUP BY c.id_mapel ASC"); ?>
																		<?php while ($mapelb = mysqli_fetch_array($mapelbackup)) : ?>
																			<option value="<?= $mapelb['id_mapel'] . ";" . $mapelb['kode_mapel'] ?>"><?= $mapelb['id_mapel'] . " - " . $mapelb['nama_mapel'] ?></option>
																		<?php endwhile ?>
																	</select>
																</div>
															</div>
															<div class="panel-footer clearfix">
																<div class="pull-right">
																	<button id='mastersoal' class='btn btn-flat btn-success'><i class='fa fa-database'></i> Proses</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
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
							&copy; 2019 <?= APLIKASI . " v" . VERSI . " r" . REVISI ?>
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
	<script src='<?= $homeurl ?>/plugins/MathJax-2.7.3/MathJax.js?config=TeX-AMS_HTML-full'></script>

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
			}, 900000
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
			var idsesi = $('#absensesi option:selected').val();
			var idmapel = $('#absenmapel option:selected').val();
			var idruang = $('#absenruang option:selected').val();
			var idkelas = $('#absenkelas option:selected').val();
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
			$('#mastersoal').click(function() {
				var mapel_id = $('#mapel_id').val();
				$('.notif_mapel').load('backup_excel.php?mapel_id=' + mapel_id);
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
				i = 0;
				id_array = new Array();
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
				url: 'import_siswa.php',
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
							[3, 'status', '{"aktif": "aktif", "tidak": "tidak"}']
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
			$("#absenmapel").change(function() {
				var mapel_id = $(this).val();
				console.log(mapel_id);
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: "dataabsen_kelas.php", // Isi dengan url/path file php yang dituju
					data: "mapel_id=" + mapel_id, // data yang akan dikirim ke file yang dituju
					success: function(response) { // Ketika proses pengiriman berhasil
						$("#absenkelas").html(response);
						console.log(response);
					},
					error: function(xhr, status, error) {
						console.log(error);
					}
				});
			});

			$("#absenkelas").change(function() {
				var id_kelas = $(this).val();
				console.log(id_kelas);
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: "dataabsen_ruang.php", // Isi dengan url/path file php yang dituju
					data: "id_kelas=" + id_kelas, // data yang akan dikirim ke file yang dituju
					success: function(response) { // Ketika proses pengiriman berhasil
						$("#absenruang").html(response);
						console.log(response);
					},
					error: function(xhr, status, error) {
						console.log(error);
					}
				});
			});

			$("#absenruang").change(function() {
				var id_kelas = $("#absenkelas").val();
				var ruang = $(this).val();
				console.log(id_kelas + ruang);
				$.ajax({
					type: "POST", // Method pengiriman data bisa dengan GET atau POST
					url: "dataabsen_sesi.php", // Isi dengan url/path file php yang dituju
					data: "id_kelas=" + id_kelas + "&ruang=" + ruang, // data yang akan dikirim ke file yang dituju
					success: function(response) { // Ketika proses pengiriman berhasil
						$("#absensesi").html(response);
						console.log(response);
					},
					error: function(xhr, status, error) {
						console.log(error);
					}
				});
			});

			$("#soallevel").change(function() {
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