<?php

require("config/config.default.php");
require("config/config.function.php");
require("config/functions.crud.php");
require("config/config.candy.php");

(isset($_SESSION['id_siswa'])) ? $id_siswa = $_SESSION['id_siswa'] : $id_siswa = 0;
($id_siswa == 0) ?  header("Location:$homeurl/login.php") : null;
($pg == 'testongoing') ? $sidebar = 'sidebar-collapse' : $sidebar = '';
($pg == 'testongoing') ? $disa = '' : $disa = 'offcanvas';
$siswa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'"));
$idsesi = $siswa['sesi'];
$idpk = $siswa['idpk'];
$level = $siswa['level'];
$pk = fetch($koneksi, 'pk', array('id_pk' => $idpk));
$tglsekarang = time();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8' />
	<meta http-equiv='X-UA-Compatible' content='IE=edge' />
	<title><?= $setting['aplikasi'] ?></title>
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
	<link rel='shortcut icon' href='<?= $homeurl ?>/favicon.ico' />
	<link rel='stylesheet' href='<?= $homeurl ?>/dist/bootstrap/css/bootstrap.min.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/font-awesome/css/font-awesome.min.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/dist/css/AdminLTE.min.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/dist/css/skins/skin-red-light.min.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/iCheck/square/green.css' />
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/animate/animate.min.css'>
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/sweetalert2/dist/sweetalert2.min.css'>
	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/slidemenu/jquery-slide-menu.css'>

	<link rel='stylesheet' href='<?= $homeurl ?>/plugins/radio/css/style.css'>

	<style>
		@font-face {
			font-family: 'OCR A Extended';
			font-style: normal;
			font-weight: normal;
			src: local('OCR A Extended'), url('OCRAEXT_2.woff') format('woff');
		}

		.soal img {
			max-width: 100%;
			height: auto;
		}

		.callout {
			border-left: 0px;
		}

		.btn {
			border-radius: 20em;
		}

		.btn.btn-flat {
			border-radius: 20em;
		}

		.skin-red-light .sidebar-menu>li:hover>a,
		.skin-red-light .sidebar-menu>li.active>a {
			color: #fff;
			background: #e111e8;
		}
	</style>
</head>

<body class='hold-transition skin-red-light  fixed <?= $sidebar ?>'>
	<span id='livetime'></span>
	<div class='wrapper'>
		<header class='main-header'>
			<a href='?' class='logo bg-maroon'>
				<span class='animated flipInX logo-mini'>
					<img src="<?= $homeurl . "/" . $setting['logo'] ?>" height="30px">
				</span>
				<span class='animated flipInX logo-lg'>
					<img src="<?= $homeurl . "/" . $setting['logo'] ?>" height="40px">
				</span>
			</a>
			<nav class='navbar navbar-static-top bg-maroon' role='navigation'>
				<a href='#' class='sidebar-toggle' data-toggle='<?= $disa ?>' role='button'>
					<span class='sr-only'>Toggle navigation</span>
				</a>
				<div class='navbar-custom-menu'>
					<ul class='nav navbar-nav'>
						<li class='dropdown user user-menu'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
								<?php
								if ($siswa['foto'] <> '') :
									if (!file_exists("foto/fotosiswa/$siswa[foto]")) :
										echo "<img src='$homeurl/dist/img/avatar_default.png' class='user-image'   alt='+'>";
									else :
										echo "<img src='$homeurl/foto/fotosiswa/$siswa[foto]' class='user-image'   alt='+'>";
									endif;
								else :
									echo "<img src='$homeurl/dist/img/avatar_default.png' class='user-image'   alt='+'>";
								endif;
								?>
								<span class='hidden-xs'><?= $siswa['nama'] ?> &nbsp; <i class='fa fa-caret-down'></i></span>
							</a>
							<ul class='dropdown-menu'>
								<li class='user-header'>
									<?php
									if ($siswa['foto'] <> '') :
										if (!file_exists("foto/fotosiswa/$siswa[foto]")) :
											echo "<img src='$homeurl/dist/img/avatar_default.png' class='img-circle' alt='User Image'>";
										else :
											echo "<img src='$homeurl/foto/fotosiswa/$siswa[foto]' class='img-circle' alt='User Image'>";
										endif;
									else :
										echo "<img src='$homeurl/dist/img/avatar_default.png' class='img-circle' alt='User Image'>";
									endif;
									?>
									<p>
										<?= $siswa['nama'] ?>
									</p>
								</li>
								<li class='user-footer'>
									<div class='pull-right'>
										<a href='<?= $homeurl ?>/logout.php' class='btn btn-sm btn-default btn-flat'><i class='fa fa-sign-out'></i> Keluar</a>
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
						if ($siswa['foto'] <> '') :
							if (!file_exists("foto/fotosiswa/$siswa[foto]")) :
								echo "<img src='$homeurl/dist/img/avatar_default.png' class='img'  style='max-width:60px' alt='+'>";
							else :
								echo "<img src='$homeurl/foto/fotosiswa/$siswa[foto]' class='img'  style='max-width:60px' alt='+'>";
							endif;
						else :
							echo "<img src='$homeurl/dist/img/avatar_default.png' class='img'  style='max-width:60px' alt='+'>";
						endif;
						?>
					</div>
					<div class='pull-left info' style='left:65px'>
						<?php
						if (strlen($siswa['nama']) > 15) {
							$nama = substr($siswa['nama'], 0, 15) . "...";
						} else {
							$nama = $siswa['nama'];
						}
						?>
						<p title="<?= $siswa['nama'] ?>"><?= $nama ?></p>
						<a href='#'><i class='fa fa-circle text-green'></i> online</a>
					</div>
				</div>
				<ul class='sidebar-menu tree' data-widget='tree'>
					<li class='header'>Main Menu Peserta Ujian</li>
					<li><a href='<?= $homeurl ?>'><i class='fa fa-fw fa-dashboard'></i> <span>Dashboard</span></a></li>
					<li><a href='<?= $homeurl ?>/hasil'><i class='fa fa-fw fa-tags'></i> <span>Hasil Ujian</span></a></li>
					<li><a href='<?= $homeurl ?>/pengumuman'><i class='fa fa-fw fa-bullhorn'></i> <span>Pengumuman</span></a></li>
				</ul><!-- /.sidebar-menu -->
			</section>
		</aside>
		<div class='content-wrapper' style='background-image: url(admin/backgroun.jpg);background-size: cover;'>
			<section class='content'>
				<?php if ($pg == '') : ?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='alert alert-info alert-dismissible'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
								<i class='icon fa fa-info'></i>
								Tombol ujian akan aktif bila waktu sudah sama dengan jadwal ujian,
								Refresh browser atau tekan F5 jika waktu ujian belum aktif
							</div>
						</div>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border bg-blue'>
									<h3 class='box-title'>Jadwal Ujian Hari ini</h3>
									<div class='box-tools'>
										<button class='btn btn-flat btn-primary'><span id='waktu' style="font-family:'OCR A Extended'"><?= $waktu ?> </span></button>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<table id='example1' class='table table-bordered table-striped'>
										<thead>
											<tr>
												<th width='5px'>#</th>
												<th>Nama Tes</th>
												<th>Jenis Tes</th>
												<th class='hidden-xs'>Status</th>
												<th class='hidden-xs'>Soal</th>
												<th class='hidden-xs'>Tanggal Waktu Tes</th>
												<th class='hidden-xs'>Durasi</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
												if ($idpk <> '') :
													$mapelQ = mysqli_query($koneksi, "SELECT * FROM ujian WHERE (id_pk='$idpk' or id_pk='semua') AND (level='$level' or level='semua') AND sesi='$idsesi' AND status='1' ORDER BY tgl_ujian ");
												else :
													$mapelQ = mysqli_query($koneksi, "SELECT * FROM ujian WHERE (level='$level' or level='semua') AND sesi='$idsesi' AND status='1' ORDER BY tgl_ujian ");
												endif;
												?>
											<?php while ($mapelx = mysqli_fetch_array($mapelQ)) : ?>
												<?php if (date('Y-m-d', strtotime($mapelx['tgl_selesai'])) >= date('Y-m-d') and date('Y-m-d', strtotime($mapelx['tgl_ujian'])) <= date('Y-m-d')) : ?>
													<?php $datakelas = unserialize($mapelx['kelas']); ?>
													<?php if (in_array($siswa['id_kelas'], $datakelas) or in_array('semua', $datakelas)) : ?>
														<?php
																		$no++;
																		// $pelajaran = explode(' ', $mapelx['nama']);
																		$where = array(
																			'id_ujian' => $mapelx['id_ujian'],
																			'id_mapel' => $mapelx['id_mapel'],
																			'id_siswa' => $id_siswa,
																			'kode_ujian' => $mapelx['kode_ujian']
																		);
																		$nilai = fetch($koneksi, 'nilai', $where);
																		$ceknilai = rowcount($koneksi, 'nilai', $where);
																		if ($ceknilai == '0') :
																			if (strtotime($mapelx['tgl_ujian']) <= time() and time() <= strtotime($mapelx['tgl_selesai'])) :
																				$status = '<label class="label label-success">Tersedia </label>';
																				$btntest = "<a href='$homeurl/konfirmasi/$mapelx[id_ujian]/$id_siswa' class='btn btn-block btn-sm btn-primary'><i class='fa fa-pencil'></i> MULAI</a>";
																			elseif (strtotime($mapelx['tgl_ujian']) >= time() and time() <= strtotime($mapelx['tgl_selesai'])) :
																				$status = '<label class="label label-danger">Belum Waktunya</label>';
																				$btntest = "<button' class='btn btn-block btn-sm btn-danger disabled'> BELUM UJIAN</button>";
																			else :
																				$status = '<label class="label label-danger">Telat Ujian</label>';
																				$btntest = "<button' class='btn btn-block btn-sm btn-danger disabled'> Telat Ujian</button>";
																			endif;
																		else :
																			if ($nilai['ujian_mulai'] <> '' and $nilai['ujian_berlangsung'] <> '' and $nilai['ujian_selesai'] == '') :
																				$status = '<label class="label label-warning">Berlangsung</label>';
																				$btntest = "<a href='$homeurl/konfirmasi/$mapelx[id_ujian]/$id_siswa' class='btn btn-block btn-sm btn-success'><i class='fa fa-pencil'></i> LANJUTKAN</a>";
																			else :
																				if ($nilai['ujian_mulai'] <> '' and $nilai['ujian_berlangsung'] <> '' and $nilai['ujian_selesai'] <> '') {
																					$status = '<label class="label label-primary">Selesai</label>';
																					$btntest = "<button class='btn btn-block btn-success btn-sm disabled'> Sudah Ujian</button>";
																				}
																			endif;
																		endif;
																		?>
														<tr>
															<td>
																<?= $no ?>
															</td>
															<td>
																<small class='label bg-purple'><?= $mapelx['nama'] ?></small> <small class='label bg-blue'><?= $mapelx['level'] ?></small>
															</td>
															<td class='hidden-xs' style="text-align:center">
																<small class='label bg-red'><?= $mapelx['kode_ujian'] ?></small>
															</td>
															<td class='hidden-xs'>
																<span class='text-red'><?= $status ?></span>
															</td>
															<td class='hidden-xs'>
																<small class='label bg-green'><i class='fa fa-pencil-square-o'></i> <?= $mapelx['tampil_pg'] ?> PG / <?= $mapelx['tampil_esai'] ?> Esai</small>
															</td>
															<td class='hidden-xs'>
																<small class='label bg-yellow'><i class='fa fa-calendar'></i> <?= buat_tanggal('D, d M Y H:i', $mapelx['tgl_ujian']) ?></small> <small class='label bg-yellow'><i class='fa fa-calendar'></i> <?= buat_tanggal('D, d M Y H:i', $mapelx['tgl_selesai']) ?></small>
															</td>
															<td class='hidden-xs'>
																<small class='label bg-red'><i class='fa fa-clock-o'></i> <?= $mapelx['lama_ujian'] ?> menit</small></td>
															<td>
																<?= $btntest ?>
															</td>
														</tr>
													<?php endif; ?>
												<?php endif; ?>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				<?php elseif ($pg == 'pengumuman') : ?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header bg-blue'>
									<h3 class='box-title'>Pengumuman</h3>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<div id='pengumuman'>
										<p class='text-center'>
											<br /><i class='fa fa-spin fa-circle-o-notch'></i> Loading....
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php elseif ($pg == 'lihathasil') : ?>
					<?php
						$nilai = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_siswa='$id_siswa' and id_ujian='$ac'"));
						if ($nilai['hasil'] == 1) :
							$mapel = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel='$nilai[id_mapel]'"));
							$namamapel = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE kode_mapel='$mapel[nama]'"));
							?>
						<div class='row'>
							<div class='col-md-12'>
								<div class='box box-solid'>
									<div class='box-header with-border bg-blue'>
										<h3 class='box-title'>Data Hasil Ujian</h3>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<table class='table table-bordered table-striped'>
											<tr>
												<th width='150'>No Induk</th>
												<td width='10'>:</td>
												<td><?= $siswa['nis'] ?></td>
												<td style="text-align:center; width:150">Nilai</td>
											</tr>
											<tr>
												<th>Nama</th>
												<td width='10'>:</td>
												<td><?= $siswa['nama'] ?></td>
												<td rowspan='4' style='font-size:30px; text-align:center; width:150'><?= $nilai['total'] ?></td>
											</tr>
											<tr>
												<th>Kelas</th>
												<td width='10'>:</td>
												<td><?= $siswa['id_kelas'] ?></td>
											</tr>
											<tr>
												<th>Mata Pelajaran</th>
												<td width='10'>:</td>
												<td><?= $namamapel['nama_mapel'] ?></td>
											</tr>
											<tr>
												<th>Nama Ujian</th>
												<td width='10'>:</td>
												<td><?= $nilai['kode_ujian'] ?></td>
											</tr>
										</table>
										<br>
										<div class="nav-tabs-custom">
											<ul class="nav nav-tabs">
												<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Detail Jawaban</a></li>
												<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Peringkat</a></li>

											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1">
													<div class='table-responsive'>
														<table id='example1' class='table table-bordered table-striped'>
															<thead>
																<tr>
																	<th width='5px'>#</th>
																	<th>Soal PG</th>

																	<th style='text-align:center'>Hasil</th>
																</tr>
															</thead>
															<tbody>
																<?php $nilaix = mysqli_query($koneksi, "SELECT * FROM jawaban WHERE id_siswa='$id_siswa' and id_ujian='$ac' and jenis='1' "); ?>
																<?php while ($jawaban = mysqli_fetch_array($nilaix)) : ?>
																	<?php
																				$no++;
																				$soal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$jawaban[id_soal]'"));
																				$jawabQ = $jawaban['jawaban'];
																				$kunci = $soal['jawaban'];
																				if ($jawaban['jawaban'] == $soal['jawaban']) :
																					$status = "<span class='text-green'><i class='fa fa-check'></i></span>";
																				else :
																					$status = "<span class='text-red'><i class='fa fa-times'></i></span>";
																				endif;
																				?>
																	<tr>
																		<td><?= $no ?></td>
																		<td><?= $soal['soal'] ?></td>

																		<td style='text-align:center'><?= $status ?></td>
																	</tr>
																<?php endwhile; ?>
															</tbody>
														</table>
													</div>
												</div>
												<table class="tab-pane active" id="tab_2">
													<table class='table-responsive'>
														<table id='example1' class='table table-striped'>
															<thead>
																<tr>
																	<th style='text-align:center' width='5px'>Peringkat</th>
																	<th>Nama Siswa</th>
																	<th style='text-align:center'>Hasil</th>
																</tr>
															</thead>
															<tbody>
																<?php $nilaix = mysqli_query($koneksi, "SELECT * FROM nilai WHERE  id_ujian='$ac' order by skor DESC "); ?>
																<?php $no=0; ?>
																<?php while ($peringkat = mysqli_fetch_array($nilaix)) : ?>
																	<?php
																				$no++;
																				$siswa=mysqli_fetch_array(mysqli_query($koneksi,"select * from siswa where id_siswa='$peringkat[id_siswa]'"));
																				if($peringkat['id_siswa']==$_SESSION['id_siswa']){
																					$style="background:yellow;font-size:20px;";
																				}else{
																					$style="";
																				}
																				?>
																	<tr style="<?= $style ?>">
																		<td style='text-align:center'><?= $no ?></td>
																		<td><?= $siswa['nama'] ?></td>
																		
																		<td style='text-align:center'><?= $peringkat['skor'] ?></td>
																	</tr>
																<?php endwhile; ?>
															</tbody>
														</table>
													</table>

												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					<?php else : ?>
						<div class='row'>
							<div class='col-md-12'>
								<div class='box box-solid'>
									<div class='box-header with-border bg-blue'>
										<h3 class='box-title'>Data Hasil Ujian</h3>
									</div><!-- /.box-header -->
									<div class='box-body'>
										<div class='alert alert-success alert-dismissible'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
											<i class='icon fa fa-info'></i>
											maaf untuk hasil nilai belum dapat dilihat, akan diproses terlebih dahulu,,
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif ?>

				<?php elseif ($pg == 'hasil') : ?>
					<div class='row'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header with-border bg-blue'>
									<h3 class='box-title'>Data Hasil Ujian</h3>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<table id='example1' class='table table-bordered table-striped'>
										<thead>
											<tr>
												<th width='5px'>#</th>
												<th>Kode Tes</th>
												<th class='hidden-xs'>Ujian Selesai</th>
												<th class='hidden-xs'>Status</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php $nilaix = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_siswa='$id_siswa' AND ujian_selesai <>'' ORDER BY ujian_selesai ASC "); ?>
											<?php while ($nilai = mysqli_fetch_array($nilaix)) : ?>
												<?php
														$no++;
														$mapel = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel='$nilai[id_mapel]'"));
														$namamapel = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE kode_mapel='$mapel[nama]'"));
														?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $mapel['nama'] . '-' . $namamapel['nama_mapel'] ?></td>
													<td class='hidden-xs'><?= $nilai['ujian_selesai'] ?></td>
													<td class='hidden-xs'><label class='label label-primary'>Selesai</label></td>
													<td>
														<a href="<?= $homeurl . '/lihathasil/' . $nilai['id_ujian'] ?>"><button class='btn btn-sm btn-success'><i class='fa fa-search'></i> Lihat Hasil</button></a>
													</td>
												</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				<?php elseif ($pg == 'rules') : ?>
					<?php
						$query = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM ujian WHERE id_ujian='$ac'"));
						$idmapel = $query['id_mapel'];

						$order = array(
							"nomor ASC",
							"nomor DESC",
							"soal ASC",
							"soal DESC",
							"pilA ASC",
							"pilA DESC",
							"pilB ASC",
							"pilB DESC",
							"pilC ASC",
							"pilC DESC",
							"pilD ASC",
							"pilD DESC",
							"pilE ASC",
							"pilE DESC",
							"jawaban ASC",
							"jawaban DESC",
							"file ASC",
							"file DESC"
						);
						$ordera = array(
							"nomor ASC",
							"nomor DESC",
							"soal ASC",
							"soal DESC",
							"file ASC",
							"file DESC"
						);
						$where = array(
							'id_mapel' => $idmapel,
							'jenis' => '1',
						);
						$where2 = array(
							'id_mapel' => $idmapel,
							'jenis' => '2',
						);

						$mapel = fetch($koneksi, 'ujian', array('id_mapel' => $idmapel, 'id_ujian' => $ac));
						$r = ($mapel['acak'] == 1) ? mt_rand(0, 17) : 0;
						$m = ($mapel['acak'] == 1) ? mt_rand(0, 17) : 0;
						$soal = select($koneksi, 'soal', $where, $order[$r]);

						$id_soal = '';
						$id_esai = '';
						$id_opsi = "";
						foreach ($soal as $s) :
							if ($mapel['opsi'] == 5) :
								$acz = array("A", "B", "C", "D", "E");
							elseif ($mapel['opsi'] == 4) :
								$acz = array("A", "B", "C", "D");
							elseif ($mapel['opsi'] == 3) :
								$acz = array("A", "B", "C");
							endif;
							shuffle($acz);
							$ack1 = $acz[0];
							$ack2 = $acz[1];
							$ack3 = $acz[2];
							if ($mapel['opsi'] == 3) :
								$id_soal .= $s['id_soal'] . ',';
								$id_opsi .= $ack1 . ',' . $ack2 . ',' . $ack3 . ',';
							elseif ($mapel['opsi'] == 4) :
								$ack4 = $acz[3];
								$id_soal .= $s['id_soal'] . ',';
								$id_opsi .= $ack1 . ',' . $ack2 . ',' . $ack3 . ',' . $ack4 . ',';
							elseif ($mapel['opsi'] == 5) :
								$ack4 = $acz[3];
								$ack5 = $acz[4];
								$id_soal .= $s['id_soal'] . ',';
								$id_opsi .= $ack1 . ',' . $ack2 . ',' . $ack3 . ',' . $ack4 . ',' . $ack5 . ',';
							endif;
						endforeach;
						if ($mapel['jml_esai'] <> 0) {
							$soalesai = select($koneksi, 'soal', $where2, $ordera[$m]);
							foreach ($soalesai as $m) :
								$id_esai .= $m['id_soal'] . ',';
							endforeach;
						}

						$acakdata = array(
							'id_ujian' => $ac,
							'id_siswa' => $id_siswa,
							'id_mapel' => $idmapel,
							'id_soal' => $id_soal,
							'id_esai' => $id_esai
						);
						$acakdataopsi = array(
							'id_ujian' => $ac,
							'id_siswa' => $id_siswa,
							'id_mapel' => $idmapel,
							'id_soal' => $id_opsi,
							'id_esai' => $id_esai
						);
						$logdata = array(
							'id_siswa' => $id_siswa,
							'type' => 'testongoing',
							'text' => 'sedang ujian',
							'date' => $datetime
						);
						$nilaidata = array(
							'id_mapel' => $idmapel,
							'id_ujian' => $ac,
							'id_siswa' => $id_siswa,
							'kode_ujian' => $mapel['kode_ujian'],
							'ujian_mulai' => $datetime,
							'ipaddress' => $_SERVER['REMOTE_ADDR'],
							'hasil' => $query['hasil']
						);
						$ref = "";
						insert($koneksi, 'log', $logdata);
						$query = mysqli_query($koneksi, "select * from nilai where id_mapel='$idmapel' and id_siswa='$id_siswa' and id_ujian='$ac'");
						$ceknilai = mysqli_num_rows($query);
						if (!$ceknilai <> 0) {
							insert($koneksi, 'nilai', $nilaidata);
							insert($koneksi, 'pengacak', $acakdata);
							insert($koneksi, 'pengacakopsi', $acakdataopsi);
						}
						jump("$homeurl/testongoing/$ac/$id_siswa/?$ref");
						?>
				<?php elseif ($pg == 'konfirmasi') : ?>
					<?php
						$query = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM ujian WHERE id_ujian='$ac'"));
						$idmapel = $query['id_mapel'];
						$namamapel = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM ujian WHERE id_ujian='$ac'"));
						$pesan = '';
						if ($namamapel['token'] == 1) :
							$pesan = "<div class='alert alert-info alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><i class='icon fa fa-info'></i>Masukan Kode Token</div></div>";
						endif;

						if (isset($_POST['mulai'])) :
							$query = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM ujian WHERE id_ujian='$ac'"));
							$idmapel = $query['id_mapel'];
							if ($namamapel['token'] == 1) :
								$token = $_POST['token'];
								$tokencek = mysqli_fetch_array(mysqli_query($koneksi, "select token from token"));
								if ($token == $tokencek['token']) {
									$pesan = "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><i class='icon fa fa-info'></i>Berhasil</div></div>";
									$query = mysqli_query($koneksi, "select * from nilai where id_mapel='$idmapel' and id_siswa='$id_siswa' and ujian_selesai");
									$nilaix = mysqli_fetch_array($query);
									$ceknilai = mysqli_num_rows($query);
									if ($ceknilai <> 0) :
										if ($nilaix['ujian_selesai'] == '') :
											jump("$homeurl/testongoing/$ac/$id_siswa");
										endif;
									else :
										jump("$homeurl/rules/$ac/$id_siswa");
									endif;
								} else {
									$pesan = "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><i class='icon fa fa-info'></i>Kode Token Ujian Salah</div></div>";
								} else :
								$query = mysqli_query($koneksi, "select * from nilai where id_mapel='$idmapel' and id_siswa='$id_siswa' and id_ujian='$ac'");
								$nilaix = mysqli_fetch_array($query);
								$ceknilai = mysqli_num_rows($query);
								if ($ceknilai <> 0) {
									if ($nilaix['ujian_selesai'] == '') :
										jump("$homeurl/testongoing/$ac/$id_siswa/?$ref");
									endif;
								} else {
									jump("$homeurl/rules/$ac/$id_siswa");
								}
							endif;
						endif;
						?>
					<div class='row'>
						<div class='col-md-3'></div>
						<div class='col-md-6'>
							<div class='box box-solid'>
								<div class='box-header'>
									<h3 class='box-title'>Konfirmasi Tes</h3>
									<div class='box-title pull-right'>
										<a href='<?= $homeurl ?>'><span class='btn btn-sm btn-default'>Kembali</span></a>
									</div>
								</div><!-- /.box-header -->
								<div class='box-body'>
									<?= $pesan ?>
									<div class='table-responsive'>
										<form action='' method='post'>
											<table class='table no-margin'>
												<tbody>
													<tr>
														<td>
															<b>Nama Tes</b><br />
															<small class='label bg-red'><?= $namamapel['kode_ujian'] ?></small>
															<small class='label bg-purple'><?= $namamapel['nama'] ?></small>
															<small class='label bg-blue'><?= $namamapel['level'] ?></small>
														</td>
														<td></td>
													</tr>
													<tr>
														<td>
															<b>Status Tes</b><br />
															<small class='label bg-red'>Tersedia</small>
														</td>
														<td></td>
													</tr>
													<tr>
														<td>
															<b>Jumlah Soal</b><br />
															<small class='label bg-purple'><?= $namamapel['tampil_pg'] . 'PG /' . $namamapel['tampil_esai'] ?> Esai</small>
														</td>
														<td></td>
													</tr>
													<tr>
														<td>
															<b>Tanggal Waktu Tes</b><br />
															<small class='label bg-green'> <?= buat_tanggal('D, d M Y') ?></small>
															<small class='label bg-red'><?= $namamapel['waktu_ujian'] ?></small>
														</td>
														<td></td>
													</tr>
													<tr>
														<td>
															<b>Guru Pengampu</b>
															<br>
															<?php $guru = mysqli_fetch_array(mysqli_query($koneksi, "SELECT nama FROM pengawas WHERE id_pengawas='$namamapel[id_guru]'")); ?>
															<small class='label bg-red'><?= $guru['nama'] ?></small>
														</td>
														<td></td>
													</tr>
													<tr>
														<td>
															<b>Alokasi Waktu Tes</b><br />
															<small class='label bg-blue'><?= $namamapel['lama_ujian'] ?> menit</small>
														</td>
														<td></td>
													</tr>
													<tr>
														<?php if ($namamapel['token'] == 1) : ?>
															<td>
																<input type='text' class='form-control' name='token' placeholder='masukan token' autofocus />
															</td>
														<?php endif ?>
														<td>
															<button type='submit' name='mulai' class='btn btn-success btn-flat'>Mulai Test</button>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php elseif ($pg == 'testongoing') : ?>
					<?php
						$query = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM ujian WHERE id_ujian='$ac'"));
						$idmapel = $query['id_mapel'];
						$no_soal = 0;
						$no_prev = $no_soal - 1;
						$no_next = $no_soal + 1;
						$id_mapel = $idmapel;

						$id_siswa = $id;

						$where = array(
							'id_siswa' => $id_siswa,
							'id_mapel' => $id_mapel
						);
						$where2 = array(
							'id_siswa' => $id_siswa,
							'id_mapel' => $id_mapel,
							'id_ujian' => $ac
						);
						$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
						$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
						$pengacak = fetch($koneksi, 'pengacak', $where);
						$pengacakpil = fetch($koneksi, 'pengacakopsi', $where);
						$pengacakesai = fetch($koneksi, 'pengacak', $where);
						$pengacak = explode(',', $pengacak['id_soal']);
						$pengacakpil = explode(',', $pengacakpil['id_soal']);
						$pengacakesai = explode(',', $pengacakesai['id_esai']);
						$mapel = fetch($koneksi, 'ujian', array('id_mapel' => $id_mapel, 'id_ujian' => $ac));
						$soal = fetch($koneksi, 'soal', array('id_mapel' => $id_mapel, 'id_soal' => $pengacak[$no_soal]));
						$jawab = fetch($koneksi, 'jawaban', array('id_siswa' => $id_siswa, 'id_mapel' => $id_mapel, 'id_soal' => $soal['id_soal'], 'id_ujian' => $ac));

						if (isset($_POST['done'])) :
							$_SESSION['id_siswa'] = $id_siswa;
							$benar = $salah = 0;
							$ceksoal = select($koneksi, 'soal', array('id_mapel' => $id_mapel, 'jenis' => '1'));
							foreach ($ceksoal as $getsoal) {
								$jika = array(
									'id_ujian' => $ac,
									'id_siswa' => $id_siswa,
									'id_mapel' => $id_mapel,
									'id_soal' => $getsoal['id_soal'],
									'jenis' => '1'
								);
								$getjwb = fetch($koneksi, 'jawaban', $jika);
								if ($getjwb) {
									($getjwb['jawaban'] == $getsoal['jawaban']) ? $benar++ : $salah++;
								}
							}

							$jumsalah = $mapel['tampil_pg'] - $benar;
							$bagi = $mapel['tampil_pg'] / 100;
							$bobot = $mapel['bobot_pg'] / 100;
							$skorx = ($benar / $bagi) * $bobot;
							$skor = number_format($skorx, 2, '.', '');
							$data = array(
								'ujian_selesai' => $datetime,
								'jml_benar' => $benar,
								'jml_salah' => $jumsalah,
								'skor' => $skor,
								'total' => $skor
							);

							delete($koneksi, 'pengacak', $where);
							delete($koneksi, 'pengacakopsi', $where);
							update($koneksi, 'nilai', $data, $where2);
							jump("$homeurl");
						endif;

						update($koneksi, 'nilai', array('ujian_berlangsung' => $datetime), $where2);
						$nilai = fetch($koneksi, 'nilai', $where2);
						$habis = strtotime($nilai['ujian_berlangsung']) - strtotime($nilai['ujian_mulai']);
						$detik = ($mapel['lama_ujian'] * 60) - $habis;
						$dtk = $detik % 60;
						$mnt = floor(($detik % 3600) / 60);
						$jam = floor(($detik % 86400) / 3600);
						$ujianselesai = $nilai['ujian_selesai'];
						?>
					<div class='row' style='margin-right:-25px;margin-left:-25px;'>
						<div class='col-md-12'>
							<div class='box box-solid'>
								<div class='box-header bg-teal'>
									<div id='divujian'>
										<span style='display:none' id='htmlujianselesai'><?= $ujianselesai ?></span>
									</div>
									<h3 class='box-title'><span class='btn hidden-xs bg-gray active'>SOAL NO </span> <span class='btn bg-green' id='displaynum'><b><?= $no_next ?></b></span></h3>
									<div class='btn-group'>
										<button type='button' id='smaller_font' class='btn bg-purple'> - </button>
										<button type='button' id='reset_font' class='btn bg-purple'><i class='fa fa-refresh'></i></button>
										<button type='button' id='bigger_font' class='btn bg-purple'> + </button>
									</div>
									<div class='box-title pull-right'>
										<div class='btn-group'>
											<span style="font-family:'OCR A Extended';font-size:35px" id='countdown'><span id='htmljam'><?= $jam ?></span>:<span id='htmlmnt'><?= $mnt ?></span>:<span id='htmldtk'><?= $dtk ?></span></span>
										</div>
										<div class='btn-group'>
											<form action='' method='post'>
												<input type='submit' name='done' id='done-submit' style='display:none;' />
											</form>
										</div>
									</div>
								</div><!-- /.box-header -->
								<div id='loadsoal'>
									<div class='box-body'>
										<div class='row'>
											<div class='col-md-7'>
												<div class='callout soal'>
													<div class='soaltanya'><?= $soal['soal'] ?></div>
												</div>
												<div class='col-md-12'>
													<?php
														if ($soal['file'] <> '') {
															$ext = explode(".", $soal['file']);
															$ext = end($ext);
															if (in_array($ext, $image)) :
																echo "<span id='zoom' style='display:inline-block'><img src='$homeurl/files/$soal[file]' class='img-responsive' /></span>";
															elseif (in_array($ext, $audio)) :
																echo "<audio controls='controls' ><source src='$homeurl/files/$soal[file]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
															else :
																echo "File tidak didukung!";
															endif;
														}
														if ($soal['file1'] <> '') {
															$ext = explode(".", $soal['file1']);
															$ext = end($ext);
															if (in_array($ext, $image)) :
																echo "<span id='zoom1' style='display:inline-block'><img  src='$homeurl/files/$soal[file1]' class='img-responsive' /></span>";
															elseif (in_array($ext, $audio)) :
																echo "<audio controls='controls' ><source src='$homeurl/files/$soal[file1]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
															else :
																echo "File tidak didukung!";
															endif;
														}
														?>
												</div>
											</div>
											<div class='col-md-7'>
												<?php
													if ($mapel['opsi'] == 3) :
														$kali = 3;
													elseif ($mapel['opsi'] == 4) :
														$kali = 4;
														$nop4 = $no_soal * $kali + 3;
														$pil4 = $pengacakpil[$nop4];
														$pilDD = "pil" . $pil4;
														$fileDD = "file" . $pil4;
													elseif ($mapel['opsi'] == 5) :
														$kali = 5;

														$nop4 = $no_soal * $kali + 3;
														$pil4 = $pengacakpil[$nop4];
														$pilDD = "pil" . $pil4;
														$fileDD = "file" . $pil4;

														$nop5 = $no_soal * $kali + 4;
														$pil5 = $pengacakpil[$nop5];
														$pilEE = "pil" . $pil5;
														$fileEE = "file" . $pil5;
													endif;

													$nop1 = $no_soal * $kali;
													$nop2 = $no_soal * $kali + 1;
													$nop3 = $no_soal * $kali + 2;

													$pil1 = $pengacakpil[$nop1];
													$pilAA = "pil" . $pil1;
													$fileAA = "file" . $pil1;

													$pil2 = $pengacakpil[$nop2];
													$pilBB = "pil" . $pil2;
													$fileBB = "file" . $pil2;

													$pil3 = $pengacakpil[$nop3];
													$pilCC = "pil" . $pil3;
													$fileCC = "file" . $pil3;

													$ragu = ($jawab['ragu'] == 1) ? 'checked' : '';
													?>
												<?php if ($soal['pilA'] == '' and $soal['fileA'] == '' and $soal['pilB'] == '' and $soal['fileB'] == '' and $soal['pilC'] == '' and $soal['fileC'] == '' and $soal['pilD'] == '' and $soal['fileD'] == '') : ?>
													<?php
															$ax = ($jawab['jawaban'] == 'A') ? 'checked' : '';
															$bx = ($jawab['jawaban'] == 'B') ? 'checked' : '';
															$cx = ($jawab['jawaban'] == 'C') ? 'checked' : '';
															$dx = ($jawab['jawaban'] == 'D') ? 'checked' : '';
															if ($mapel['opsi'] == 5) :
																$ex = ($jawab['jawaban'] == 'E') ? 'checked' : '';
															endif;
															?>
													<table class='table'>
														<tr>
															<td>
																<input class='hidden radio-label' type='radio' name='jawab' id='A' onclick="jawabsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $soal['id_soal'] ?>,'A','A',1,<?= $ac ?>)" <?= $ax ?> />
																<label class='button-label' for='A'>
																	<h1>A</h1>
																</label>
															</td>
															<td>
																<input class='hidden radio-label' type='radio' name='jawab' id='C' onclick="jawabsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $soal['id_soal'] ?>,'C','C',1,<?= $ac ?>)" <?= $cx ?> />
																<label class='button-label' for='C'>
																	<h1>C</h1>
																</label>
															</td>
															<?php if ($mapel['opsi'] == 5) { ?>
																<td>
																	<input class='hidden radio-label' type='radio' name='jawab' id='E' onclick="jawabsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $soal['id_soal'] ?>,'E','E',1,<?= $ac ?>)" <?= $ex ?> />
																	<label class='button-label' for='E'>
																		<h1>E</h1>
																	</label>
																</td>
															<?php	} ?>

														</tr>
														<tr>
															<td>
																<input class='hidden radio-label' type='radio' name='jawab' id='B' onclick="jawabsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $soal['id_soal'] ?>,'B','B',1,<?= $ac ?>)" <?= $bx ?> />
																<label class='button-label' for='B'>
																	<h1>B</h1>
																</label>
															</td>
															<?php if ($mapel['opsi'] <> 3) { ?>
																<td>
																	<input class='hidden radio-label' type='radio' name='jawab' id='D' onclick="jawabsoal(<?= $id_mapel ?>, <?= $id_siswa ?>,<?= $soal['id_soal'] ?>,'D','D',1,<?= $ac ?>)" <?= $dx ?> />
																	<label class='button-label' for='D'>
																		<h1>D</h1>
																	</label>
																</td>
															<?php } ?>
														</tr>
													</table>
												<?php else : ?>
													<?php
															$a = ($jawab['jawaban'] == $pil1) ? 'checked' : '';
															$b = ($jawab['jawaban'] == $pil2) ? 'checked' : '';
															$c = ($jawab['jawaban'] == $pil3) ? 'checked' : '';
															if ($mapel['opsi'] == 4) {
																$d = ($jawab['jawaban'] == $pil4) ? 'checked' : '';
															}
															if ($mapel['opsi'] == 5) {
																$d = ($jawab['jawaban'] == $pil4) ? 'checked' : '';
																$e = ($jawab['jawaban'] == $pil5) ? 'checked' : '';
															}
															?>
													<table width='100%' class='table table-striped table-hover'>
														<tr>
															<td width='60'>
																<input class='hidden radio-label' type='radio' name='jawab' id='A' onclick="jawabsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $soal['id_soal'] ?>,'<?= $pil1 ?>','A',1,<?= $ac ?>)" <?= $a ?> />
																<label class='button-label' for='A'>
																	<h1>A</h1>
																</label>
															</td>
															<td style='vertical-align:middle;'>
																<span class='soal'><?= $soal[$pilAA] ?></span>
																<?php
																		if ($soal[$fileAA] <> '') {
																			$ext = explode(".", $soal[$fileAA]);
																			$ext = end($ext);
																			if (in_array($ext, $image)) {
																				echo "<img src='$homeurl/files/$soal[$fileAA]' class='img-responsive' style='max-width:300px;'/>";
																			} elseif (in_array($ext, $audio)) {
																				echo "<audio controls='controls'><source src='$homeurl/files/$soal[$fileAA]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																			} else {
																				echo "File tidak didukung!";
																			}
																		}
																		?>
															</td>
														</tr>
														<tr>
															<td>
																<input class='hidden radio-label' type='radio' name='jawab' id='B' onclick="jawabsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $soal['id_soal'] ?>,'<?= $pil2 ?>','B',1,<?= $ac ?>)" <?= $b ?> />
																<label class='button-label' for='B'>
																	<h1>B</h1>
																</label>
															</td>
															<td style='vertical-align:middle;'>
																<span class='soal'><?= $soal[$pilBB] ?></span>
																<?php
																		if ($soal[$fileBB] <> '') {
																			$ext = explode(".", $soal[$fileBB]);
																			$ext = end($ext);
																			if (in_array($ext, $image)) {
																				echo "<img src='$homeurl/files/$soal[$fileBB]' class='img-responsive' style='max-width:300px;'/>";
																			} elseif (in_array($ext, $audio)) {
																				echo "<audio controls='controls' ><source src='$homeurl/files/$soal[$fileBB]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																			} else {
																				echo "File tidak didukung!";
																			}
																		}
																		?>
															</td>
														</tr>
														<tr>
															<td>
																<input class='hidden radio-label' type='radio' name='jawab' id='C' onclick="jawabsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $soal['id_soal'] ?>,'<?= $pil3 ?>','C',1,<?= $ac ?>)" <?= $c ?> />
																<label class='button-label' for='C'>
																	<h1>C</h1>
																</label>

															</td>
															<td style='vertical-align:middle;'>
																<span class='soal'><?= $soal[$pilCC] ?></span>
																<?php
																		if ($soal[$fileCC] <> '') {
																			$ext = explode(".", $soal[$fileCC]);
																			$ext = end($ext);
																			if (in_array($ext, $image)) {
																				echo "<img src='$homeurl/files/$soal[$fileCC]' class='img-responsive' style='max-width:300px;'/>";
																			} elseif (in_array($ext, $audio)) {
																				echo "<audio controls='controls' ><source src='$homeurl/files/$soal[$fileCC]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																			} else {
																				echo "File tidak didukung!";
																			}
																		}
																		?>
															</td>
														</tr>
														<?php if ($mapel['opsi'] <> 3) { ?>
															<tr>
																<td>
																	<input class='hidden radio-label' type='radio' name='jawab' id='D' onclick="jawabsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $soal['id_soal'] ?>,'<?= $pil4 ?>','D',1,<?= $ac ?>)" <?= $d ?> />
																	<label class='button-label' for='D'>
																		<h1>D</h1>
																	</label>
																</td>
																<td style='vertical-align:middle;'>
																	<span class='soal'><?= $soal[$pilDD] ?></span>
																	<?php
																				if ($soal[$fileDD] <> '') {
																					$ext = explode(".", $soal[$fileDD]);
																					$ext = end($ext);
																					if (in_array($ext, $image)) {
																						echo "<img src='$homeurl/files/$soal[$fileDD]' class='img-responsive' style='max-width:300px;'/>";
																					} elseif (in_array($ext, $audio)) {
																						echo "<audio controls='controls' ><source src='$homeurl/files/$soal[$fileDD]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																					} else {
																						echo "File tidak didukung!";
																					}
																				}
																				?>
																</td>
															</tr>
														<?php } ?>
														<?php if ($mapel['opsi'] == 5) { ?>
															<tr>
																<td>
																	<input class='hidden radio-label' type='radio' name='jawab' id='E' onclick="jawabsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $soal['id_soal'] ?>,'<?= $pil5 ?>','E',1,<?= $ac ?>)" <?= $e ?> />
																	<label class='button-label' for='E'>
																		<h1>E</h1>
																	</label>
																</td>
																<td style='vertical-align:middle;'>
																	<span class='soal'><?= $soal[$pilEE] ?></span>
																	<?php
																				if ($soal[$fileEE] <> '') {

																					$ext = explode(".", $soal[$fileEE]);
																					$ext = end($ext);
																					if (in_array($ext, $image)) {
																						echo "<img src='$homeurl/files/$soal[$fileEE]' class='img-responsive' style='max-width:300px;'/>";
																					} elseif (in_array($ext, $audio)) {
																						echo "<audio controls='controls' ><source src='$homeurl/files/$soal[$fileEE]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																					} else {
																						echo "File tidak didukung!";
																					}
																				}
																				?>
																</td>
															</tr>
														<?php } ?>
													</table>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class='box-footer navbar-fixed-bottom'>
										<table width='100%'>
											<tr>
												<td>
													<?php if ($no_soal == 0) { ?>
														<div class='col-md-4 '>
															<button id='move-prev' class='btn  btn-default' onclick="loadsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $no_prev ?>,1)"><i class='fa fa-chevron-left'></i> <span class='hidden-xs'>SEBELUMNYA</span></button>
															<i class='fa fa-spin fa-spinner' id='spin-prev' style='display:none;'></i>
														</div>
													<?php } else { ?>
														<div class='col-md-4 '>
															<button id='move-prev' class='btn  btn-primary' onclick="loadsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $no_prev ?>,1)"><i class='fa fa-chevron-left'></i> <span class='hidden-xs'>SEBELUMNYA</span></button>
															<i class='fa fa-spin fa-spinner' id='spin-prev' style='display:none;'></i>
														</div>
													<?php } ?>
												</td>
												<td>
													<div class='col-md-4 '>
														<div id='load-ragu'>
															<a href='#' class='btn  btn-warning'><input type='checkbox' onclick="radaragu(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $soal['id_soal'] ?>, <?= $ac ?>)" <?= $ragu ?> /> RAGU</a>
														</div>
													</div>

												</td>
												<td>
													<div class='col-md-4 '>
														<i class='fa fa-spin fa-spinner' id='spin-next' style='display:none;'></i>
														<button id='move-next' class='btn  btn-primary' onclick="loadsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $no_next ?>,1)"><span class='hidden-xs'>SELANJUTNYA</span> <i class='fa fa-chevron-right'></i></button>
													</div>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class='navs-slide' style='z-index: 1000;'>
							<div class='btn-slide'><i class='fa fa-pencil-square-o fa-lg'></i></div>
							<div class='navs-body'>
								<div class='head-slide'>DAFTAR SOAL</div>
								<div class='body-slide'>
									<div style='overflow-y:auto; max-height:250px'>
										<div class='col-md-12'>
											<div class='row' id='nomorsoal'>
												<?php
													$cekpg = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM soal WHERE id_mapel='$id_mapel' AND jenis='1'"));
													$cekesai = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM soal WHERE id_mapel='$id_mapel' AND jenis='2'"));
													$quero = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'"));

													if ($cekpg >= $quero['tampil_pg']) {
														$soalpg = $quero['tampil_pg'];
													} else {
														$soalpg = $cekpg;
													}
													if ($cekesai >= $quero['tampil_esai']) {
														$soalesai = $quero['tampil_esai'];
													} else {
														$soalpg = $cekesai;
													}
													?>
												<div id='ketjawab'>
													<?php
														$jumjawab = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM jawaban WHERE id_mapel='$id_mapel' AND id_siswa='$id_siswa' AND id_ujian='$ac'"));
														$jumsoal = $soalpg + $soalesai;
														?>
													<input type='hidden' value='<?= $jumsoal ?>' id='jumsoal' />
													<input type='hidden' value='<?= $jumjawab ?>' id='jumjawab' />
												</div>
												<?php for ($n = 0; $n < $soalpg; $n++) : ?>
													<?php
															$id_soal = $pengacak[$n];
															$cekjwb = rowcount($koneksi, 'jawaban', array('id_siswa' => $id_siswa, 'id_mapel' => $id_mapel, 'id_soal' => $id_soal, 'jenis' => '1', 'id_ujian' => $ac));
															$ragu = fetch($koneksi, 'jawaban', array('id_siswa' => $id_siswa, 'id_mapel' => $id_mapel, 'id_soal' => $id_soal, 'jenis' => '1', 'id_ujian' => $ac));
															$cekj = $ragu['jawaban'];
															if ($mapel['opsi'] == 2) {
																$kali = 3;
															} elseif ($mapel['opsi'] == 4) {
																$kali = 4;
																$nop4 = $n * $kali + 3;
																$pil4 = $pengacakpil[$nop4];
															} elseif ($mapel['opsi'] == 5) {
																$kali = 5;
																$nop4 = $n * $kali + 3;
																$pil4 = $pengacakpil[$nop4];
																$nop5 = $n * $kali + 4;
																$pil5 = $pengacakpil[$nop5];
															}
															$nop1 = $n * $kali;
															$nop2 = $n * $kali + 1;
															$nop3 = $n * $kali + 2;
															$pil1 = $pengacakpil[$nop1];
															$pil2 = $pengacakpil[$nop2];
															$pil3 = $pengacakpil[$nop3];
															if ($cekj == $pil1) {
																$jawabl = "A";
															}
															if ($cekj == $pil2) {
																$jawabl = "B";
															}
															if ($cekj == $pil3) {
																$jawabl = "C";
															}
															if ($mapel['opsi'] == 4) {
																if ($cekj == $pil4) {
																	$jawabl = "D";
																}
															}
															if ($mapel['opsi'] == 5) {
																if ($cekj == $pil5) {
																	$jawabl = "E";
																}
															}
															$jawabisi = ($cekjwb <> 0) ? $jawabl : '';
															$color1 = ($cekjwb <> 0) ? 'green' : 'gray';
															$color = ($ragu['ragu'] == 1) ? 'yellow' : $color1;
															$nomor = $n + 1;
															$nomor = ($nomor < 10) ? "0" . $nomor : $nomor;
															if ($soal['pilA'] == '' and $soal['fileA'] == '' and $soal['pilB'] == '' and $soal['fileB'] == '' and $soal['pilC'] == '' and $soal['fileC'] == '' and $soal['pilD'] == '' and $soal['fileD'] == '') {
																$jawabannya = $ragu['jawaban'];
															} else {
																$jawabannya = $jawabisi;
															}
															?>
													<a style="min-width:40px;height:40px;border-radius:20px;font-family:'OCR A Extended';font-size:medium ;border:solid black" class='btn btn-app bg-<?= $color ?>' id='badge<?= $id_soal ?>' onclick="loadsoal(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $n ?>,1)"> <?= $nomor ?> <span id='jawabtemp<?= $id_soal ?>' class='badge bg-red'><?= $jawabannya ?></span></a>
												<?php endfor; ?>
											</div>
										</div>
										<div class='col-md-12'>
											<?php if ($quero['tampil_esai'] <> 0) : ?>
												<span>-- SOAL ESSAI --</span>
												<div class='row' id='nomor'>
													<?php for ($i = 0; $i < $soalesai; $i++) :
																$id_esai = $pengacakesai[$i];
																$cekjwb = rowcount($koneksi, 'jawaban', array('id_siswa' => $id_siswa, 'id_mapel' => $id_mapel, 'id_soal' => $id_esai, 'jenis' => '2', 'id_ujian' => $ac));
																$ragu = fetch($koneksi, 'jawaban', array('id_siswa' => $id_siswa, 'id_mapel' => $id_mapel, 'id_soal' => $id_esai, 'jenis' => '2', 'id_ujian' => $ac));
																$color = ($cekjwb <> 0) ? 'bg-green' : 'bg-gray';

																$nomor = $i + 1;
																$nomor = ($nomor < 10) ? "0" . $nomor : $nomor;
																?>
														<a style="min-width:40px;height:40px" class="btn btn-app <?= $color ?>" id="badgeesai<?= $id_esai ?>" onclick="loadsoalesai(<?= $id_mapel ?>,<?= $id_siswa ?>,<?= $i ?>,2)"> <?= $nomor ?> </a>
													<?php endfor; ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php else : ?>
					<?php jump($homeurl); ?>
				<?php endif; ?>
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

	<script src='<?= $homeurl ?>/plugins/jQuery/jquery-3.1.1.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/zoom-master/jquery.zoom.js'></script>
	<script src='<?= $homeurl ?>/dist/bootstrap/js/bootstrap.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/slimScroll/jquery.slimscroll.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/iCheck/icheck.min.js'></script>
	<script src='<?= $homeurl ?>/dist/js/app.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/sweetalert2/dist/sweetalert2.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/slidemenu/jquery-slide-menu.js'></script>
	<script src='<?= $homeurl ?>/plugins/mousetrap/mousetrap.min.js'></script>
	<script src='<?= $homeurl ?>/plugins/MathJax-2.7.3/MathJax.js?config=TeX-AMS_HTML-full'></script>

	<script>
		var url = window.location;
		$('ul.sidebar-menu a').filter(function() {
			return this.href == url;
		}).parent().addClass('active');
		// for treeview
		$('ul.treeview-menu a').filter(function() {
			return this.href == url;
		}).closest('.treeview').addClass('active');
		var autoRefresh = setInterval(
			function() {
				$('#waktu').load('<?= $homeurl ?>/admin/_load.php?pg=waktu');
				$('#pengumuman').load('<?= $homeurl ?>/admin/_load.php?pg=pengumumansiswa');
			}, 1000
		);
	</script>
	<?php if ($pg == 'testongoing') : ?>
		<script>
			var homeurl;
			homeurl = '<?= $homeurl ?>';
			/* Font Adjusments */
			let defaultFontSize = 14;
			let fontSize = 0;
			fontSize = localStorage.getItem('fontSize');
			if (!fontSize) {
				fontSize = defaultFontSize;
				localStorage.setItem('fontSize', fontSize);
			}
			soalFont(fontSize);

			function soalFont(fontSize) {
				$('div.soal > p > span').css({
					fontSize: fontSize + 'pt'
				});
				$('span.soal > p > span').css({
					fontSize: fontSize + 'pt'
				});
				$('.soal').css({
					fontSize: fontSize + 'pt'
				})
				$('.callout soal').css({
					fontSize: fontSize + 'pt'
				})
			}

			$(document).ready(function() {
				$('#smaller_font').on('click', function() {
					fontSize = localStorage.getItem('fontSize')
					fontSize--;
					localStorage.setItem('fontSize', fontSize)
					soalFont(fontSize)
				});

				$('#bigger_font').on('click', function() {
					fontSize = localStorage.getItem('fontSize')
					fontSize++;
					localStorage.setItem('fontSize', fontSize)
					soalFont(fontSize)
				});

				$('#reset_font').on('click', function() {
					fontSize = defaultFontSize
					localStorage.setItem('fontSize', fontSize)
					soalFont(fontSize)
				});
				Mousetrap.bind('enter', function() {
					loadsoal(<?= $id_mapel ?>, <?= $id_siswa ?>, <?= $no_next ?>, 1);
				});

				Mousetrap.bind('right', function() {
					loadsoal(<?= $id_mapel ?>, <?= $id_siswa ?>, <?= $no_next ?>, 1);
				});

				Mousetrap.bind('left', function() {
					loadsoal(<?= $id_mapel ?>, <?= $id_siswa ?>, <?= $no_prev ?>, 1);
				});

				Mousetrap.bind('a', function() {
					$('#A').click()
				});

				Mousetrap.bind('b', function() {
					$('#B').click()
				});

				Mousetrap.bind('c', function() {
					$('#C').click()
				});

				Mousetrap.bind('d', function() {
					$('#D').click()
				});

				Mousetrap.bind('e', function() {
					$('#E').click()
				});

				Mousetrap.bind('space', function() {
					$('input[type=checkbox]').click()
					radaragu(<?= $id_mapel ?>, <?= $id_siswa ?>, <?= $soal['id_soal'] ?>, <?= $ac ?>)
				});

				$(document).on('click', '.done-btn', function() {
					var jawab = $('#jumjawab').val();
					var soal = $('#jumsoal').val();
					var belum = soal - jawab;
					var ragu = $('[id^=badge]').hasClass('bg-yellow');
					if (jawab == soal) {
						if (ragu) {
							swal({
								type: 'warning',
								title: 'Oops...',
								html: 'Masih ada soal yang ragu !!',
							})
						} else {
							swal({
								title: 'Apa kamu yakin telah selesai?',
								html: 'Pastikan telah menyelesaikan semua dengan benar! <br>' +
									'Sudah Dijawab : <b>' + jawab + '</b> Belum dijawab : <b>' + belum + '</b>',
								type: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Iya'
							}).then((result) => {
								if (result.value) {
									window.onbeforeunload = null;
									$('#done-submit').click();
								}
							})
						}

					} else {
						swal({
							type: 'warning',
							title: 'Oops...',
							html: 'Masih ada soal yang masih belum dikerjakan !! <br>' +
								'Sudah Dijawab : <b>' + jawab + '</b> Belum dijawab : <b>' + belum + '</b>',
						})
					}
				});
				$('.navs-slide').SlideMenu({
					expand: false,
					collapse: true
				});
				var result = '';
				$('.jawabesai').change(function() {
					result = $(this).val();
					$('#result').html(result);
				});
				$('#zoom').zoom();
				$('#zoom1').zoom();

				var jam = $('#htmljam').html();
				var menit = $('#htmlmnt').html();
				var detik = $('#htmldtk').html();

				function hitung() {
					setTimeout(hitung, 1000);
					$('#countdown').html(jam + ':' + menit + ':' + detik);
					detik--;
					if (detik < 0) {
						detik = 59;
						menit--;
						if (menit < 0) {
							menit = 59;
							jam--;
							if (jam < 0) {
								jam = 0;
								menit = 0;
								detik = 0;
								waktuhabis()
							}
						}
					}
				}
				hitung();
			});

			function cekwaktu() {
				$('#divujian').load(window.location.href + ' #divujian');
				var status = $('#htmlujianselesai').html();
				if (status != '') {
					location = homeurl;
				}
			}

			function waktuhabis() {
				swal({
					title: 'Oooo Oooww!',
					text: 'Waktu Ujian Telah Habis',
					timer: 1000,
					onOpen: () => {
						swal.showLoading()
					}
				}).then((result) => {
					$('#done-submit').click();
				});
			}

			function loadsoal(idmapel, idsiswa, nosoal, jenis) {
				cekwaktu();
				if (nosoal >= 0 && nosoal < <?= $soalpg ?>) {
					curnum = $('#displaynum').html();
					if (nosoal == curnum) {
						$('#spin-next').show();
					}
					if (nosoal > curnum) {
						$('#spin-next').show();
					}
					if (nosoal < curnum) {
						$('#spin-prev').show();
					}
					$.ajax({
						type: 'POST',
						url: homeurl + '/soal.php',
						data: {
							pg: 'soal',
							id_mapel: idmapel,
							id_siswa: idsiswa,
							no_soal: nosoal,
							jenis: jenis,
							idu: <?= $ac ?>
						},
						success: function(response) {
							num = nosoal + 1;
							$('#displaynum').html(num);
							$('#loadsoal').html(response);
							$('.fa-spin').hide();
							soalFont(fontSize);
							//iCheckform();
						}
					});
				}
			}

			function loadsoalesai(idmapel, idsiswa, nosoal, jenis) {
				cekwaktu();
				if (nosoal >= 0 && nosoal < <?= $soalesai ?>) {
					curnum = $('#displaynum').html();
					if (nosoal == curnum) {
						$('#spin-next').show();
					}
					if (nosoal > curnum) {
						$('#spin-next').show();
					}
					if (nosoal < curnum) {
						$('#spin-prev').show();
					}
					$.ajax({
						type: 'POST',
						url: homeurl + '/soal.php',
						data: {
							pg: 'soalesai',
							id_mapel: idmapel,
							id_siswa: idsiswa,
							no_soal: nosoal,
							jenis: jenis,
							idu: <?= $ac ?>
						},
						success: function(response) {
							num = nosoal + 1;
							$('#displaynum').html(num);
							$('#loadsoal').html(response);
							$('.fa-spin').hide();
							soalFont(fontSize);
							//iCheckform();
						}
					});
				}
			}

			function jawabsoal(idmapel, idsiswa, idsoal, jawab, jawabQ, jenis, idu) {
				cekwaktu();
				console.log(idmapel + '-' + idsiswa + '-' + idsoal + '-' + jawab + '-' + jawabQ + '-' + jenis + '-' + idu)
				$.ajax({
					type: 'POST',
					url: homeurl + '/soal.php',
					data: {
						pg: 'jawab',
						id_mapel: idmapel,
						id_siswa: idsiswa,
						id_soal: idsoal,
						jawaban: jawab,
						jenis: jenis,
						id_ujian: idu
					},
					success: function(response) {
						console.log(response);
						if (response == 'OK') {
							$('#nomorsoal #badge' + idsoal).removeClass('bg-gray');
							$('#nomorsoal #badge' + idsoal).removeClass('bg-yellow');
							$('#nomorsoal #badge' + idsoal).addClass('bg-green');
							$('#nomorsoal #jawabtemp' + idsoal).html(jawabQ);
							$('#ketjawab').load(window.location.href + ' #ketjawab');
						}
					}
				});
			}

			function jawabesai(idmapel, idsiswa, idsoal, jenis) {
				var jawab = $('#jawabesai').val();
				$.ajax({
					type: 'POST',
					url: homeurl + '/soal.php',
					data: {
						pg: 'jawabesai',
						id_mapel: idmapel,
						id_siswa: idsiswa,
						id_soal: idsoal,
						jawaban: jawab,
						jenis: jenis,
						idu: <?= $ac ?>
					},
					success: function(response) {
						if (response == 'OK') {
							$('#badgeesai' + idsoal).removeClass('bg-gray');
							$('#badgeesai' + idsoal).removeClass('bg-yellow');
							$('#badgeesai' + idsoal).addClass('bg-green');
							$('#ketjawab').load(window.location.href + ' #ketjawab');
						}
					}
				});
			}

			function radaragu(idmapel, idsiswa, idsoal, idu) {
				cekclass = $('#nomorsoal #badge' + idsoal).attr('class');
				if (cekclass != 'btn btn-app bg-gray') {
					$.ajax({
						type: 'POST',
						url: homeurl + '/soal.php',
						data: {
							pg: 'ragu',
							id_mapel: idmapel,
							id_siswa: idsiswa,
							id_soal: idsoal,
							id_ujian: idu
						},
						success: function(response) {
							console.log(response);
							if (response == 'OK') {
								if (cekclass == 'btn btn-app bg-green') {
									$('#nomorsoal #badge' + idsoal).removeClass('bg-gray');
									$('#nomorsoal #badge' + idsoal).removeClass('bg-green');
									$('#nomorsoal #badge' + idsoal).addClass('bg-yellow');
									console.log('kuning');
								}
								if (cekclass == 'btn btn-app bg-yellow') {
									$('#nomorsoal #badge' + idsoal).removeClass('bg-gray');
									$('#nomorsoal #badge' + idsoal).removeClass('bg-yellow');
									$('#nomorsoal #badge' + idsoal).addClass('bg-green');
									console.log('hijau');
								}
							}
						}
					});
				} else {
					$('#load-ragu input').removeAttr('checked');
				}
			}
		</script>
	<?php endif; ?>
</body>

</html>