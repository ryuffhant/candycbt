<?php

	require("config/config.default.php");
	require("config/config.function.php");
	require("config/functions.crud.php");
	(isset($_SESSION['id_siswa'])) ? $id_siswa = $_SESSION['id_siswa'] : $id_siswa = 0;
	($id_siswa==0) ?  header("Location:$homeurl/login.php"):null;
	($pg=='testongoing') ? $sidebar = 'sidebar-collapse' : $sidebar = '';
	($pg=='testongoing') ? $disa = '' : $disa = 'offcanvas';
	$siswa = mysql_fetch_array(mysql_query("SELECT * FROM siswa WHERE id_siswa='$id_siswa'"));
	$idsesi = $siswa['sesi'];
	$idpk = $siswa['idpk'];
	$level = $siswa['level'];
	$kelasx=$siswa['id_kelas'];
	$tglsekarang = time();
	$kelas=mysql_fetch_array(mysql_query("SELECT * FROM kelas WHERE id_kelas='$kelasx'"));
	$pk = fetch('pk',array('id_pk'=>$siswa['idpk']));
	echo "
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset='utf-8'/>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'/>
				<title>$setting[aplikasi]</title>
				<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'/>
				<link rel='shortcut icon' href='$homeurl/favicon.ico'/>
				<link rel='stylesheet' href='$homeurl/dist/bootstrap/css/bootstrap.min.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/font-awesome/css/font-awesome.min.css'/>
				<link rel='stylesheet' href='$homeurl/dist/css/AdminLTE.min.css'/>
				<link rel='stylesheet' href='$homeurl/dist/css/skins/skin-blue.min.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/iCheck/square/green.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/animate/animate.min.css'>
				<link rel='stylesheet' href='$homeurl/plugins/sweetalert2/dist/sweetalert2.min.css'>
				<link rel='stylesheet' href='$homeurl/plugins/slidemenu/jquery-slide-menu.css'>
				<link rel='stylesheet' href='$homeurl/plugins/scrollbar/jquery.scrollbar.css'>
				<link rel='stylesheet' href='$homeurl/plugins/uploadfile/css/uploadfile.css'>
				<link rel='stylesheet' href='$homeurl/plugins/radio/css/style.css'>
				<style>
				.soal img{max-width:100%;height:auto;}
				</style>
			</head>
			
			<body class='hold-transition skin-blue  fixed $sidebar' >
				<span id='livetime'></span>
				<div class='wrapper'>
					<header class='main-header'>
						<a href='?' class='logo' >
							<span class='animated flipInX logo-mini'><image src='$homeurl/$setting[logo]' height='30px'></span>
							<span class='animated flipInX logo-lg'><image src='$homeurl/$setting[logo]' height='40px'></span>
						</a>
						<nav class='navbar navbar-static-top' role='navigation'>
							<a href='#' class='sidebar-toggle' data-toggle='$disa' role='button' >
								<span class='sr-only'>Toggle navigation</span>
							</a>
							<div class='navbar-custom-menu'>
								<ul class='nav navbar-nav'>
									<li class='dropdown user user-menu'>
										<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
										";
										
									if(!file_exists("foto/fotosiswa/$siswa[no_peserta].jpg")){
									echo "<img src='$homeurl/dist/img/avatar_default.png' class='user-image'   alt='+'>";
									}else{
										echo "<img src='$homeurl/foto/fotosiswa/$siswa[no_peserta].jpg' class='user-image'   alt='+'>";
									}
									echo "
											
											<span class='hidden-xs'>$siswa[nama]  &nbsp; <i class='fa fa-caret-down'></i></span>
										</a>
										<ul class='dropdown-menu'>
											<li class='user-header'>
												";
									if(!file_exists("foto/fotosiswa/$siswa[no_peserta].jpg")){
									echo "<img src='$homeurl/dist/img/avatar_default.png' class='img-circle' alt='User Image'>";
									}else{
										echo "<img src='$homeurl/foto/fotosiswa/$siswa[no_peserta].jpg' class='img-circle' alt='User Image'>";
									}
									echo "
												
												<p>
													$siswa[nama]
													
												</p>
											</li>
											<li class='user-footer'>
												
												<div class='pull-right'>
													<a href='$homeurl/logout.php' class='btn btn-sm btn-default btn-flat'><i class='fa fa-sign-out'></i> Keluar</a>
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
								<div class='pull-left image' >
								
								";
									if(!file_exists("foto/fotosiswa/$siswa[no_peserta].jpg")){
									echo "<img src='$homeurl/dist/img/avatar_default.png' class='img'  style='max-width:60px' alt='+'>";
									}else{
										echo "<img src='$homeurl/foto/fotosiswa/$siswa[no_peserta].jpg' class='img'  style='max-width:60px' alt='+'>";
									}
									echo "	
								
								</div>
								<div class='pull-left info' style='left:65px'>
									<p>$siswa[nama]</p>
									<a href='#'><i class='fa fa-circle text-green'></i> online</a>
								</div>
							</div>
							<ul class='sidebar-menu tree data-widget='tree' >
										<li class='header'>Main Menu Siswa</li>
										<li><a href='$homeurl'><i class='fa fa-fw fa-dashboard'></i> <span>Dashboard</span></a></li>
                                        
										<li ><a href='$homeurl/pengumuman'><i class='fa fa-fw fa-bullhorn'></i> <span>Pengumuman</span></a></li>
										<!--<li ><a href='?pg=banksoal'><i class='fa fa-fw fa-briefcase'></i> <span>Materi Ujian</span></a></li>-->
										<li><a href='$homeurl/hasil'><i class='fa fa-fw fa-tags'></i> <span>Hasil Ujian</span></a></li>
										
									
								
								
							</ul><!-- /.sidebar-menu -->
						</section>
					</aside>
					<div class='content-wrapper' style='background-image: url(admin/backgroun.jpg);background-size: cover;'>
						
							<section class='content'>";
								if($pg=='') {
									
								
									
										echo "
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
												<button class='btn  btn-flat  btn-primary' ><span id='waktu'>$waktu </span></button>
												</div>
											</div><!-- /.box-header -->
											<div class='box-body' >
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Nama Tes</th>
															<th class='hidden-xs'>Status</th>
															
															<th class='hidden-xs'>Soal</th>
															<th class='hidden-xs'>Tanggal Waktu Tes</th>
															
															<th class='hidden-xs'>Durasi</th>
															
															<th></th>
														</tr>
													</thead>
													<tbody >";
										
								$mapelQ = mysql_query("SELECT * FROM ujian WHERE (id_pk='$idpk' or id_pk='semua') AND  (level='$level' or level='semua')   AND sesi='$idsesi'  AND status='1' ORDER BY tgl_ujian ");
										
								while($mapelx=mysql_fetch_array($mapelQ)){
									if(date('Y-m-d',strtotime($mapelx['tgl_ujian']))==date('Y-m-d'))	{	
										$datakelas=unserialize($mapelx['kelas']);
										if(in_array($siswa['id_kelas'],$datakelas) or in_array('semua',$datakelas)){ //cek kelas
											$no++;
											$tgltest = explode(' ',$mapelx['tgl_ujian']);
											$pelajaran = explode(' ',$mapelx['nama']);
																			
											$where = array('id_mapel'=>$mapelx['id_mapel'],'id_siswa'=>$id_siswa);
											$nilai = fetch('nilai',$where);
											$ceknilai = rowcount('nilai',$where);
										
											if($ceknilai==0) {
												
												if(strtotime($mapelx['tgl_ujian'])<=time() and time()<=strtotime($mapelx['tgl_selesai'])){
												
												$status = '<label class="label label-success">Tersedia </label>';
												$btntest = "
													
													
													<a href='$homeurl/konfirmasi/$mapelx[id_ujian]/$id_siswa' class='btn btn-block btn-sm btn-primary'><i class='fa fa-pencil'></i> MULAI</a>
												";
												}elseif(strtotime($mapelx['tgl_ujian'])>=time() and time()<=strtotime($mapelx['tgl_selesai'])){
												$status = '<label class="label label-danger">Belum Waktunya</label>';
												$btntest = "
													
													<button' class='btn btn-block btn-sm btn-danger disabled'> BELUM UJIAN</button>
												";
												}else{
												$status = '<label class="label label-danger">Telat Ujian</label>';
												$btntest = "
													
													<button' class='btn btn-block btn-sm btn-danger disabled'> Telat Ujian</button>
												";	
												}
											
											} else {
												if($nilai['ujian_mulai']<>'' AND $nilai['ujian_berlangsung']<>'' AND $nilai['ujian_selesai']=='') {
													$status = '<label class="label label-warning">Berlangsung</label>';
													$btntest = "
														
														<a href='$homeurl/konfirmasi/$mapelx[id_ujian]/$id_siswa' class='btn btn-block btn-sm btn-success'><i class='fa fa-pencil'></i> LANJUTKAN</a>
													";
												} else {
													if($nilai['ujian_mulai']<>'' AND $nilai['ujian_berlangsung']<>'' AND $nilai['ujian_selesai']<>'') {
														$status = '<label class="label label-primary">Selesai</label>';
														$btntest = "
														
														<button class='btn btn-block btn-success btn-sm disabled'> Sudah Ujian</button>
													";
													}
												}
											}										
																	echo "
																		<tr>
																			<td>$no</td>
																			<td><small class='label bg-purple'>$mapelx[nama]</small> <small class='label bg-blue'>$mapelx[level]</small></td>																		
																			<td class='hidden-xs'><span class='text-red'>$status</span></td>
																			<td class='hidden-xs'><small class='label bg-green'><i class='fa fa-pencil-square-o'></i> $mapelx[tampil_pg] PG / $mapelx[tampil_esai] Esai</small> </td>
																			<td class='hidden-xs'> <small class='label bg-red'><i class='fa fa-calendar'></i> ". buat_tanggal('D, d M Y',$tgltest[0]) ."</small>
																			<small class='label bg-red'><i class='fa fa-clock-o'></i> $mapelx[waktu_ujian]</small>
																			</td>
																			
																			<td class='hidden-xs'><small class='label bg-red'><i class='fa fa-clock-o'></i> $mapelx[lama_ujian] menit</small></td>
																			<td > $btntest</td>
																		</tr>";
										}
																		
									}
								}
										echo "
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												
											
										";
																																	
								}
								elseif($pg=='pengumuman'){
									echo "<div class='row'>
												<div class='col-md-12'>
													<div class='box box-solid'>
														<div class='box-header bg-blue'>
															<h3 class='box-title'>Pengumuman</h3>
														</div><!-- /.box-header -->
														<div class='box-body'>
															<div id='pengumuman'>
															<p class='text-center'>
																<br/><i class='fa fa-spin fa-circle-o-notch'></i> Loading....
															</p>
															</div>
														</div>
													</div>
												</div>
											</div>";
									
									
								}
								elseif($pg=='lihathasil'){
									
									$idmapel=$ac;
									$nilai = mysql_fetch_array(mysql_query("SELECT * FROM nilai WHERE id_siswa='$id_siswa' and id_mapel='$idmapel' "));
									if($nilai['hasil']==1){
									$mapel=mysql_fetch_array(mysql_query("select * from mapel where id_mapel='$nilai[id_mapel]'"));
									$namamapel=mysql_fetch_array(mysql_query("select * from mata_pelajaran where kode_mapel='$mapel[nama]'"));
									
									echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='box box-solid'>
											<div class='box-header with-border bg-blue'>
												<h3 class='box-title'>Data Hasil Ujian</h3>	
											</div><!-- /.box-header -->
											<div class='box-body'>
											<table class='table table-bordered table-striped'> 
											<tr><th width='150'>No Induk</th><td width='10'>:</td><td>$siswa[nis]</td><td width='150' align='center'>Nilai</td></tr>
											<tr><th >Nama</th><td width='10'>:</td><td>$siswa[nama]</td><td rowspan='3' width='150' align='center' style='font-size:30px'>$nilai[skor]</td></tr>
											<tr><th >Kelas</th><td width='10'>:</td><td>$siswa[id_kelas]</td></tr>
											<tr><th >Mata Pelajaran</th><td width='10'>:</td><td>$namamapel[nama_mapel]</td></tr>
											</table><br>
												<table id='example1' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='5px'>#</th>
															<th>Soal PG</th>
															<!--<th style='text-align:center'>Jawab</th>-->
															<th style='text-align:center'>Hasil</th>
															
														</tr>
													</thead>
													<tbody>";
										$nilaix = mysql_query("SELECT * FROM jawaban WHERE id_siswa='$id_siswa' and id_mapel='$idmapel' and jenis='1' ");
										while($jawaban=mysql_fetch_array($nilaix)){
											$no++;
											$soal=mysql_fetch_array(mysql_query("select * from soal where id_soal='$jawaban[id_soal]'  "));
											if($jawaban['jawaban']==$soal['jawaban']){
												$status="<span class='text-green'><i class='fa fa-check'></i></span>";
											}else{
												$status="<span class='text-red'><i class='fa fa-times'></i></span>";
											}
										echo "
																		<tr>
																			<td>$no</td>
																			<td>$soal[soal]</td>
																		<!--	<td style='text-align:center'>$jawaban[jawaban]</td>	-->
																			<td style='text-align:center'>$status</td>	
																			
																			
																		</tr>";
																		}
										echo "
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>	
										";
									}else{
										echo "
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
										maaf untuk hasil nilai belum dapat dilihat,, akan diproses terlebih dahulu,,
										</div>
										</div>
																 
															</div>
														</div>
													</div>
												</div>	
										";
									}
								}
								elseif($pg=='hasil'){
									echo "
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
															<th  class='hidden-xs'>Ujian Selesai</th>
															<th class='hidden-xs'Status</th>
															<th></th>
														</tr>
													</thead>
													<tbody>";
										
										$nilaix = mysql_query("SELECT * FROM nilai WHERE id_siswa='$id_siswa' AND ujian_selesai <>'' ORDER BY ujian_selesai ASC ");
										while($nilai=mysql_fetch_array($nilaix)){
											$no++;
										$mapel=mysql_fetch_array(mysql_query("select * from mapel where id_mapel='$nilai[id_mapel]'"));
										$namamapel=mysql_fetch_array(mysql_query("select * from mata_pelajaran where kode_mapel='$mapel[nama]'"));
										echo "
																		<tr>
																			<td>$no</td>
																			<td>$mapel[nama]-$namamapel[nama_mapel]</td>
																			<td  class='hidden-xs'>$nilai[ujian_selesai]</td>	
																			<td  class='hidden-xs'><label class='label label-primary'>Selesai</label></td>	
																			<td>
																			<a href='$homeurl/lihathasil/$nilai[id_mapel]'><button class='btn btn-sm btn-success'><i class='fa fa-search'></i> Lihat Hasil</button></a>
																			</td>
																			
																		</tr>";
																		}
										echo "
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												
											
										";
								}
								
								
								elseif($pg=='rules') {
									$query=mysql_fetch_array(mysql_query("select * from ujian where id_ujian='$ac'"));
									$idmapel=$query['id_mapel'];
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
										'jenis' =>'1',
										
									);
									$where2 = array(
										'id_mapel' => $idmapel,
										'jenis' =>'2',
										
									);
									$mapel = fetch('ujian',array('id_mapel'=>$idmapel));
									$r = ($mapel['acak']==1) ? mt_rand(0,17) : 0;
									$m = ($mapel['acak']==1) ? mt_rand(0,17) : 0;
									$soal = select('soal',$where,$order[$r]);
									$soalesai = select('soal',$where2,$ordera[$m]);
									$id_soal = '';
									$id_esai = '';
									foreach($soal as $s) { $id_soal .= $s['id_soal'].','; }
									foreach($soalesai as $m) { $id_esai .= $m['id_soal'].','; }
									$acakdata = array(
									
										'id_siswa' => $id_siswa,
										'id_mapel' => $idmapel,
										'id_soal' => $id_soal,
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
										'id_siswa' => $id_siswa,
										'ujian_mulai' => $datetime,
										'ipaddress' => $_SERVER['REMOTE_ADDR'],
										'hasil' => $query['hasil']
									);
									
									
									$ref = "";
									
									
									insert('log',$logdata);
									$query=mysql_query("select * from nilai where id_mapel='$idmapel' and id_siswa='$id_siswa'");
									$ceknilai=mysql_num_rows($query);
									if(!$ceknilai<>0){
									insert('nilai',$nilaidata);
									insert('pengacak',$acakdata);
									}
									jump("$homeurl/testongoing/$ac/$id_siswa/?$ref");
								}
								elseif($pg=='konfirmasi') {
									$query=mysql_fetch_array(mysql_query("select * from ujian where id_ujian='$ac'"));
									$idmapel=$query['id_mapel'];
									$namamapel=mysql_fetch_array(mysql_query("select * from ujian where id_ujian='$ac'"));
									$pesan='';
									if($namamapel['token']==1){
									$pesan= "<div class='alert alert-info alert-dismissible'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
										<i class='icon fa fa-info'></i>
										Masukan Kode Token 
										</div>
										</div>";
									}
									
									if(isset($_POST['mulai'])){
									$query=mysql_fetch_array(mysql_query("select * from ujian where id_ujian='$ac'"));
									$idmapel=$query['id_mapel'];
									if($namamapel['token']==1){ //jika token ya
									$token=$_POST['token'];
									$tokencek=mysql_fetch_array(mysql_query("select token from token"));
									if($token==$tokencek['token']){
									$pesan= "<div class='alert alert-success alert-dismissible'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
										<i class='icon fa fa-info'></i>
										Berhasil
										</div>
										</div>";
										$query=mysql_query("select * from nilai where id_mapel='$idmapel' and id_siswa='$id_siswa' and ujian_selesai");
										$nilaix=mysql_fetch_array($query);
										$ceknilai=mysql_num_rows($query);
										if($ceknilai<>0){
										if($nilaix['ujian_selesai']=='') {
										jump("$homeurl/testongoing/$ac/$id_siswa");
										}
										}else{
										jump("$homeurl/rules/$ac/$id_siswa");
										}
									}else{
									$pesan= "<div class='alert alert-danger alert-dismissible'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
										<i class='icon fa fa-info'></i>
										Kode Token Ujian Salah
										</div>
										</div>";
									
									}
									}else{
										$query=mysql_query("select * from nilai where id_mapel='$idmapel' and id_siswa='$id_siswa'");
										$nilaix=mysql_fetch_array($query);
										$ceknilai=mysql_num_rows($query);
										if($ceknilai<>0){
										if($nilaix['ujian_selesai']=='') {
										jump("$homeurl/testongoing/$ac/$id_siswa/?$ref");
										}
										}else{
										jump("$homeurl/rules/$ac/$id_siswa");
										}
									}
									}
								echo "
												<div class='row'>
												<div class='col-md-3'></div>
												<div class='col-md-6'>
													<div class='box box-solid'>
														<div class='box-header'>
															<h3 class='box-title'>Konfirmasi Tes</h3>
															<div class='box-title pull-right'>
															
																<a href='$homeurl'><span class='btn btn-sm btn-default'>Kembali</span></a>
																
															</div>
														
														</div><!-- /.box-header -->
														<div class='box-body'>$pesan
															<div class='table-responsive'>
															<form action='' method='post'>
																<table class='table no-margin'>
																	<tbody>
																		<tr>
																			<td>
																				<b>Nama Tes</b><br/>
																				<small class='label bg-purple'>$namamapel[nama]</small>
																				<small class='label bg-blue'>$namamapel[level]</small>
																			</td><td></td>
																		</tr>
																		<tr>
																			<td>
																				<b>Status Tes</b><br/>
																				<small class='label bg-red'>Tersedia</small>
																			</td><td></td>
																		</tr>
																		<tr>
																			<td>
																				<b>Jumlah Soal</b><br/>
																				<small class='label bg-purple'>$namamapel[tampil_pg] PG / $namamapel[tampil_esai] Esai</small>
																			</td><td></td>
																		</tr>
																		<tr>
																			<td>
																				<b>Tanggal Waktu Tes</b><br/>
																			<small class='label bg-green'>	". buat_tanggal('D, d M Y') ."</small>
																			<small class='label bg-red'>$namamapel[waktu_ujian]</small>
																			</td><td></td>
																		</tr>
																		<tr>
																			<td>
																				<b>Guru Pengampu</b><br/>";
																				$guru=mysql_fetch_array(mysql_query("select nama from pengawas where id_pengawas='$namamapel[id_guru]'"));
																				echo "
																				<small class='label bg-red'>$guru[nama]</small>
																			</td><td></td>
																		</tr>
																		<tr>
																			<td>
																				<b>Alokasi Waktu Tes</b><br/>
																				<small class='label bg-blue'>$namamapel[lama_ujian] menit</small>
																			</td><td></td>
																		</tr>
																		<tr>";
																		if($namamapel['token']==1){
																		echo "
																			<td>
																				<input type='text' class='form-control' name='token' placeholder='masukan token' autofocus/>
																				
																			</td>";
																		}
																			echo "
																			
																			<td>
																				
																				<button type='submit' name='mulai' class='btn btn-success btn-flat'>Mulai Test</button>
																				
																			</td>
																			
																		</tr>
																	</tbody>
																</table></form>
															</div>
														</div>
													</div>
												</div>";
									
								}
								elseif($pg=='testongoing') {
									$query=mysql_fetch_array(mysql_query("select * from ujian where id_ujian='$ac'"));
									$idmapel=$query['id_mapel'];
									
									$no_soal = 0;
									$no_prev = $no_soal-1;
									$no_next = $no_soal+1;
									$id_mapel = $idmapel;
									
									$id_siswa = $id;
									
									$where = array(
										'id_siswa' => $id_siswa,
										'id_mapel' => $id_mapel	
									);
									$audio = array('mp3','wav','ogg','MP3','WAV','OGG');
									$image = array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG','GIF','BMP');
									$pengacak = fetch('pengacak',$where);
									$pengacakesai = fetch('pengacak',$where);
									$pengacak = explode(',',$pengacak['id_soal']);
									$pengacakesai = explode(',',$pengacakesai['id_esai']);
									$mapel = fetch('ujian',array('id_mapel'=>$id_mapel));
									$soal = fetch('soal',array('id_mapel'=>$id_mapel,'id_soal'=>$pengacak[$no_soal]));
									$jawab = fetch('jawaban',array('id_siswa'=>$id_siswa,'id_mapel'=>$id_mapel,'id_soal'=>$soal['id_soal']));
									
									if(isset($_POST['done'])) {
										$_SESSION['id_siswa'] = $id_siswa;
										$benar = $salah = 0;
										$ceksoal = select('soal',array('id_mapel'=>$id_mapel,'jenis'=>'1'));
										foreach($ceksoal as $getsoal) {
											$jika = array(
												'id_siswa' => $id_siswa,
												'id_mapel' => $id_mapel,
												'id_soal' => $getsoal['id_soal'],
												'jenis' => '1'
											);
											$getjwb = fetch('jawaban',$jika);
											if($getjwb) {
												($getjwb['jawaban']==$getsoal['jawaban']) ? $benar++ : $salah++;
											} 
										}
										
										$jumsalah = $mapel['tampil_pg']-$benar;
										$bagi = $mapel['tampil_pg']/100;
										$bobot= $mapel['bobot_pg']/100;
										$skorx = ($benar/$bagi)*$bobot;
										$skor=number_format($skorx,2,'.','');
										$data = array(
											'ujian_selesai' => $datetime,
											'jml_benar' => $benar,
											'jml_salah' => $jumsalah,
											'skor' => $skor,
											'total' => $skor
										);
										
										delete('pengacak',$where);
										update('nilai',$data,$where);
										jump("$homeurl");
									}
									update('nilai',array('ujian_berlangsung'=>$datetime),$where);
									$nilai = fetch('nilai',$where);
									$habis = strtotime($nilai['ujian_berlangsung'])-strtotime($nilai['ujian_mulai']);
									$detik = ($mapel['lama_ujian']*60)-$habis;
									$dtk = $detik%60;
									$mnt = floor(($detik%3600)/60);
									$jam = floor(($detik%86400)/3600);
									
															
									echo "	
										<div class='row' style='margin-right:-25px;margin-left:-25px;'>
											<div class='col-md-12'>
												<div class='box box-solid'>
													<div class='box-header bg-teal'>
														<h3 class='box-title'><span class='btn  bg-green' id='displaynum'><b>$no_next</b></span></h3>
														<div class='box-title pull-right'>
															<div class='btn-group'>
																<span class='btn  bg-gray active'>WAKTU</span>
																<span class='btn  bg-red'><b id='countdown'><span id='htmljam' >$jam</span>:<span id='htmlmnt'>$mnt</span>:<span id='htmldtk'>$dtk</span></b></span>
															</div>
															<div class='btn-group'>
															<form action='' method='post'>
                                                                    <input type='submit' name='done' id='done-submit' style='display:none;'/>
																	<button type='button' id='done-btn' class='btn btn-primary' >Selesai</button>
																	</form>
																</div>
														</div>
													</div><!-- /.box-header -->
													<div id='loadsoal'>
														<div class='box-body'>
															<div class='callout soal'>$soal[soal]</div>
													
															<div class='row'>
															<div class='col-md-7'>";
																	if($soal['file']<>'') {
																		
																		$ext = explode(".",$soal['file']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<span id='zoom' style='display:inline-block'><img src='$homeurl/files/$soal[file]' class='img-responsive' /></span>";
																		}
																		elseif(in_array($ext,$audio)) {
																			echo "<audio controls='controls' ><source src='$homeurl/files/$soal[file]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																		} else {
																			echo "File tidak didukung!";
																		}
																	}
																	if($soal['file1']<>'') {
																		
																		$ext = explode(".",$soal['file1']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<span id='zoom1' style='display:inline-block'><img  src='$homeurl/files/$soal[file1]' class='img-responsive' /></span>";
																		}
																		elseif(in_array($ext,$audio)) {
																			echo "<audio controls='controls' ><source src='$homeurl/files/$soal[file1]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																		} else {
																			echo "File tidak didukung!";
																		}
																	}
																	echo "
																</div>
																<div class='col-md-7'>";
																
																	$a = ($jawab['jawaban']=='A') ? 'checked' : '';
																	$b = ($jawab['jawaban']=='B') ? 'checked' : '';
																	$c = ($jawab['jawaban']=='C') ? 'checked' : '';
																	$d = ($jawab['jawaban']=='D') ? 'checked' : '';
																	if($setting['jenjang']=='SMK'){
																	$e = ($jawab['jawaban']=='E') ? 'checked' : '';
																	}
																	$ragu = ($jawab['ragu']==1) ? 'checked' : '';
																	if($soal['pilA']=='' and $soal['fileA']=='' and $soal['pilB']=='' and $soal['fileB']=='' and $soal['pilC']=='' and $soal['fileC']=='' and $soal['pilD']=='' and $soal['fileD']=='' ){
																	echo "
																	<table class='table table-striped'>
																		<tr>
																			<td>
																				<input class='hidden radio-label' type='radio' name='jawab' id='A' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'A',1) $a />
																				<label class='button-label' for='A'>
																				  <h1>A</h1>
																				</label>
																			</td>
																			
																			<td>
																				<input class='hidden radio-label' type='radio' name='jawab' id='C' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'C',1) $c/>
																				<label class='button-label' for='C'>
																				  <h1>C</h1>
																				</label>
																			</td>
																			";
																			if($setting['jenjang']=='SMK'){
																			echo "
																			<td>
																				<input class='hidden radio-label' type='radio' name='jawab' id='E' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'E',1) $e/>
																				<label class='button-label' for='E'>
																				  <h1>E</h1>
																				</label>

																			</td>";
																			}
																			echo "
																		</tr>
																		<tr>
																			<td>
																				<input class='hidden radio-label' type='radio' name='jawab' id='B' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'B',1) $b />
																				<label class='button-label' for='B'>
																				  <h1>B</h1>
																				</label>
																				
																			</td>
																			";
																			if($setting['jenjang']<>'SD'){
																			echo "
																			<td>
																				<input class='hidden radio-label' type='radio' name='jawab' id='D' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'D',1) $d/>
																				<label class='button-label' for='D'>
																				  <h1>D</h1>
																				</label>
																				
																			</td>";
																			}
																			echo "
																		</tr>
																	</table>
																	";
																	
																	}	else {
																	echo "
																	<table  width='100%' class='table table-striped table-hover'>
																	<tr>
																		<td width='60'>
																		<input class='hidden radio-label' type='radio' name='jawab' id='A' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'A',1) $a />
																		<label class='button-label' for='A'>
																		  <h1>A</h1>
																		</label>
							
																		</td>
																		<td style='vertical-align:middle;'>
																			<span class='soal'>$soal[pilA]</span>";
																		if($soal['fileA']<>'') {
																		
																		$ext = explode(".",$soal['fileA']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<img src='$homeurl/files/$soal[fileA]' class='img-responsive' style='max-width:300px;'/>";
																		}
																		elseif(in_array($ext,$audio)) {
																			echo "<audio controls='controls'><source src='$homeurl/files/$soal[fileA]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																		} else {
																			echo "File tidak didukung!";
																		}
																	}
																	echo "		
																		</td>
																	</tr>
																	<tr>
																		<td>
																		<input class='hidden radio-label' type='radio' name='jawab' id='B' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'B',1) $b />
																		<label class='button-label' for='B'>
																		  <h1>B</h1>
																		</label>
																			
																		</td>
																		<td style='vertical-align:middle;'>
																			<span class='soal'>$soal[pilB]</span>";
																		if($soal['fileB']<>'') {
																		
																		$ext = explode(".",$soal['fileB']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<img src='$homeurl/files/$soal[fileB]' class='img-responsive' style='max-width:300px;'/>";
																		}
																		elseif(in_array($ext,$audio)) {
																			echo "<audio controls='controls' ><source src='$homeurl/files/$soal[fileB]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																		} else {
																			echo "File tidak didukung!";
																		}
																	}
																	echo "		
																		</td>
																	</tr>
																	<tr>
																		<td>
																		<input class='hidden radio-label' type='radio' name='jawab' id='C' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'C',1) $c/>
																		<label class='button-label' for='C'>
																		  <h1>C</h1>
																		</label>
																			
																		</td>
																		<td style='vertical-align:middle;'>
																			<span class='soal'>$soal[pilC]</span>";
																		if($soal['fileC']<>'') {
																		
																		$ext = explode(".",$soal['fileC']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<img src='$homeurl/files/$soal[fileC]' class='img-responsive' style='max-width:300px;'/>";
																		}
																		elseif(in_array($ext,$audio)) {
																			echo "<audio controls='controls' ><source src='$homeurl/files/$soal[fileC]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																		} else {
																			echo "File tidak didukung!";
																		}
																	}
																	echo "		
																		</td>
																	</tr>
																	";
																	if($setting['jenjang']<>'SD'){
																	echo "
																			
																	<tr>
																		<td>
																		<input class='hidden radio-label' type='radio' name='jawab' id='D' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'D',1) $d/>
																		<label class='button-label' for='D'>
																		  <h1>D</h1>
																		</label>
																			
																		</td>
																		<td style='vertical-align:middle;'>
																			<span class='soal'>$soal[pilD]</span>";
																		if($soal['fileD']<>'') {
																		
																		$ext = explode(".",$soal['fileD']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<img src='$homeurl/files/$soal[fileD]' class='img-responsive' style='max-width:300px;'/>";
																		}
																		elseif(in_array($ext,$audio)) {
																			echo "<audio controls='controls' ><source src='$homeurl/files/$soal[fileD]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																		} else {
																			echo "File tidak didukung!";
																		}
																	}
																	echo "		
																		</td>
																	</tr>";
																	}
																	if($setting['jenjang']=='SMK'){
																	echo "
																	<tr>
																		<td>
																		<input class='hidden radio-label' type='radio' name='jawab' id='E' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'E',1) $e/>
																		<label class='button-label' for='E'>
																		  <h1>E</h1>
																		</label>
																			
																		</td>
																		<td style='vertical-align:middle;'>
																			<span class='soal'>$soal[pilE]</span>";
																		if($soal['fileE']<>'') {
																		
																		$ext = explode(".",$soal['fileE']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<img src='$homeurl/files/$soal[fileE]' class='img-responsive' style='max-width:300px;'/>";
																		}
																		elseif(in_array($ext,$audio)) {
																			echo "<audio controls='controls' ><source src='$homeurl/files/$soal[fileE]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
																		} else {
																			echo "File tidak didukung!";
																		}
																	}
																	echo "
																	</td>
																	</tr>";
																	}
																	echo"
																	</table>";
																	}
																echo "	
																</div>
																
															</div>
														</div>
														<div class='box-footer navbar-fixed-bottom'>
															<table  width='100%'>
															<tr><td>
																<div class='col-md-4 '>
																	<button id='move-prev' class='btn  btn-default' onclick=loadsoal($id_mapel,$id_siswa,$no_prev,1)><i class='fa fa-chevron-left'></i> <span class='hidden-xs'>SEBELUMNYA</span></button>
																	<i class='fa fa-spin fa-spinner' id='spin-prev' style='display:none;'></i>
																</div></td><td>
																<div class='col-md-4 '>
																	<div id='load-ragu'>
																		<a href='#' class='btn  btn-warning'><input type='checkbox' onclick=radaragu($id_mapel,$id_siswa,$soal[id_soal]) $ragu/> RAGU</a>
																	</div>
																</div></td><td>
																<div class='col-md-4 '>
																	<i class='fa fa-spin fa-spinner' id='spin-next' style='display:none;'></i>
																	<button id='move-next' class='btn  btn-primary' onclick=loadsoal($id_mapel,$id_siswa,$no_next,1)><span class='hidden-xs'>SELANJUTNYA</span> <i class='fa fa-chevron-right'></i></button>
																</div></td>
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
												  <div class='body-slide' >
												  <div style='overflow-y:auto; max-height:250px'>
													  <div class='col-md-12' >
															<div class='row' id='nomorsoal' >";
															$cekpg=mysql_num_rows(mysql_query("select * from soal where id_mapel='$id_mapel' and jenis='1'"));
															$cekesai=mysql_num_rows(mysql_query("select * from soal where id_mapel='$id_mapel' and jenis='2'"));
															$quero=mysql_fetch_array(mysql_query("select * from mapel where id_mapel='$id_mapel'"));
															
															if($cekpg>=$quero['tampil_pg']){
															$soalpg=$quero['tampil_pg'];
															}else{
															$soalpg=$cekpg;	
															}
															if($cekesai>=$quero['tampil_esai']){
															$soalesai=$quero['tampil_esai'];
															}else{
															$soalpg=$cekesai;	
															}
															echo "<div id='ketjawab'>";
															$jumjawab=mysql_num_rows(mysql_query("select * from jawaban where id_mapel='$id_mapel' and id_siswa='$id_siswa'"));
															$jumsoal=$soalpg+$soalesai;
															echo "
															<input type='hidden' value='$jumsoal' id='jumsoal'/>
															<input type='hidden' value='$jumjawab' id='jumjawab'/>";
															echo "</div >";
																for($n=0;$n<$soalpg;$n++) {
																	$id_soal = $pengacak[$n];
																	$cekjwb = rowcount('jawaban',array('id_siswa'=>$id_siswa,'id_mapel'=>$id_mapel,'id_soal'=>$id_soal,'jenis'=>'1'));
																	$ragu = fetch('jawaban',array('id_siswa'=>$id_siswa,'id_mapel'=>$id_mapel,'id_soal'=>$id_soal,'jenis'=>'1'));
																	$color = ($cekjwb<>0) ? 'green':'gray';
																	$color = ($ragu['ragu']==1) ? 'yellow':$color;
																	$nomor = $n+1;
																	$nomor = ($nomor<10) ? "0$nomor":$nomor;
																	echo "
																		<a style='min-width:40px;height:40px;border-radius:20px;font-weight:bold;' class='btn btn-app bg-$color' id='badge$id_soal' onclick=loadsoal($id_mapel,$id_siswa,$n,1)> $nomor <span id='jawabtemp$id_soal' class='badge bg-red'>$ragu[jawaban]</span></a>
																	";
																}
																echo "
															</div>
														</div>
														<div class='col-md-12'>";
														if($quero['tampil_esai']<>0){
															echo "<span>-- SOAL ESSAI --</span>";
															echo "
															<div class='row' id='nomor'>";
															
															
																for($i=0;$i<$soalesai;$i++) {
																	$id_esai = $pengacakesai[$i];
																	$cekjwb = rowcount('jawaban',array('id_siswa'=>$id_siswa,'id_mapel'=>$id_mapel,'id_soal'=>$id_esai,'jenis'=>'2'));
																	$ragu = fetch('jawaban',array('id_siswa'=>$id_siswa,'id_mapel'=>$id_mapel,'id_soal'=>$id_esai,'jenis'=>'2'));
																	$color = ($cekjwb<>0) ? 'green':'gray';
																	
																	$nomor = $i+1;
																	$nomor = ($nomor<10) ? "0$nomor":$nomor;
																	echo "
																		<a style='min-width:40px;height:40px' class='btn btn-app  bg-$color' id='badgeesai$id_esai' onclick=loadsoalesai($id_mapel,$id_siswa,$i,2)>  $nomor </a> 
																	";
																}
																echo "
															</div>";
														}
														echo "
														</div>
														</div>
												  </div>
												   
											  </div> 
											</div>
														
															
															
														
										</div>
									";
								}
								else {
									jump($homeurl);
								}
								echo "
							</section><!-- /.content -->
						</div><!-- /.container -->
					</div><!-- /.content-wrapper -->
					<footer class='main-footer hidden-xs'>
						<div class='container'>
							<div class='pull-left hidden-xs'>
								<strong>
									<span id='end-sidebar'>
										$setting[sekolah]
									</span>
								</strong>
							</div>
						
					</footer>
				</div><!-- ./wrapper -->

				<script src='$homeurl/plugins/jQuery/jquery-3.1.1.min.js'></script>
				<script src='$homeurl/plugins/zoom-master/jquery.zoom.js'></script>
				<script src='$homeurl/dist/bootstrap/js/bootstrap.min.js'></script>
				<script src='$homeurl/plugins/slimScroll/jquery.slimscroll.min.js'></script>
				<script src='$homeurl/plugins/iCheck/icheck.min.js'></script>
				<script src='$homeurl/dist/js/app.min.js'></script>
				<script src='$homeurl/plugins/sweetalert2/dist/sweetalert2.min.js'></script>
				<script src='$homeurl/plugins/slidemenu/jquery-slide-menu.js'></script>
				<script src='$homeurl/plugins/uploadfile/js/jquery.uploadfile.min.js'></script>
				
				
				<script>
				
				var autoRefresh = setInterval(
						function () {
							$('#waktu').load('$homeurl/admin/_load.php?pg=waktu');
							$('#pengumuman').load('$homeurl/admin/_load.php?pg=pengumumansiswa');
							
							
						}, 1000
					);
				</script>
				<script>";
				if($pg=='testongoing') {
					
					echo "
						var homeurl;
						homeurl = '$homeurl';
						$(document).ready(function() {
							
							$('#done-btn').click(function(){
								var jawab = $('#jumjawab').val();
								var soal = $('#jumsoal').val();
								var belum=soal-jawab;
								if(jawab==soal){
								swal({
									title: 'Apa kamu yakin telah selesai?',
									
									html:
										' Pastikan kamu telah menyelesaikan semua soal dengan benar ! <br>' +
										'Sudah Dijawab : <b>'+jawab + '</b> Belum dijawab : <b>'+belum+'</b>',
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
								else{
								swal({
									  type: 'warning',
									  title: 'Oops...',
									  html: 'Masih ada soal yang masih belum dikerjakan !! <br>'+
									 'Sudah Dijawab : <b>'+jawab + '</b> Belum dijawab : <b>'+belum+'</b>',
									})	
									
								}
                                
                            });
							$('.navs-slide').SlideMenu({
							  expand: false,
							  collapse: true
							});
							var result='';
							$('.jawabesai').change(function(){
								result=$(this).val();
							$('#result').html(result);
							});
							$('#zoom').zoom();
							$('#zoom1').zoom();
							
							var jam = $('#htmljam').html();
							var menit = $('#htmlmnt').html();
							var detik = $('#htmldtk').html();
							function hitung() {
								setTimeout(hitung,1000);
								
								$('#countdown').html(jam + ':' + menit + ':' + detik);
								
								
								detik --;
								if(detik < 0) {
									detik = 59;
									menit --;
									if(menit < 0) {
										menit = 59;
										jam --;
										if(jam < 0) {
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
						
						function loadsoal(idmapel,idsiswa,nosoal,jenis) {
							if(nosoal>=0 && nosoal<$soalpg) {
								curnum = $('#displaynum').html();
								if(nosoal==curnum) {
									$('#spin-next').show();
								}
								if(nosoal>curnum) {
									$('#spin-next').show();
								}
								if(nosoal<curnum) {
									$('#spin-prev').show();
								}
								$.ajax({
									type:'POST',
									url:homeurl+'/soal.php',
									data:{pg:'soal',id_mapel:idmapel,id_siswa:idsiswa,no_soal:nosoal,jenis:jenis},
									success:function(response) {
										num = nosoal+1;
										$('#displaynum').html(num);
										$('#loadsoal').html(response);
										$('.fa-spin').hide();
										//iCheckform();
									}
								});
							}
						}
						function loadsoalesai(idmapel,idsiswa,nosoal,jenis) {
							if(nosoal>=0 && nosoal<$soalesai) {
								curnum = $('#displaynum').html();
								if(nosoal==curnum) {
									$('#spin-next').show();
								}
								if(nosoal>curnum) {
									$('#spin-next').show();
								}
								if(nosoal<curnum) {
									$('#spin-prev').show();
								}
								$.ajax({
									type:'POST',
									url:homeurl+'/soal.php',
									data:{pg:'soalesai',id_mapel:idmapel,id_siswa:idsiswa,no_soal:nosoal,jenis:jenis},
									success:function(response) {
										num = nosoal+1;
										$('#displaynum').html(num);
										$('#loadsoal').html(response);
										$('.fa-spin').hide();
										//iCheckform();
									}
								});
							}
						}
						
						function jawabsoal(idmapel,idsiswa,idsoal,jawab,jenis) {
							$.ajax({
								type:'POST',
								url:homeurl+'/soal.php',
								data:{pg:'jawab',id_mapel:idmapel,id_siswa:idsiswa,id_soal:idsoal,jawaban:jawab,jenis:jenis},
								success:function(response) {
									if(response=='OK') {
										$('#nomorsoal #badge'+idsoal).removeClass('bg-gray');
										$('#nomorsoal #badge'+idsoal).removeClass('bg-yellow');
										$('#nomorsoal #badge'+idsoal).addClass('bg-green');
										$('#nomorsoal #jawabtemp'+idsoal).html(jawab);
										$( '#ketjawab' ).load(window.location.href + ' #ketjawab' );
									}
								}
							});
						}
						function jawabesai(idmapel,idsiswa,idsoal,jenis) {
							
							var jawab =$('#jawabesai').val();
							
							$.ajax({
								type:'POST',
								url:homeurl+'/soal.php',
								data:{pg:'jawabesai',id_mapel:idmapel,id_siswa:idsiswa,id_soal:idsoal,jawaban:jawab,jenis:jenis},
								success:function(response) {
									if(response=='OK') {
										
										$('#badgeesai'+idsoal).removeClass('bg-gray');
										$('#badgeesai'+idsoal).removeClass('bg-yellow');
										$('#badgeesai'+idsoal).addClass('bg-green');
										$( '#ketjawab' ).load(window.location.href + ' #ketjawab' );
									}
								}
							});
						}
						
						function radaragu(idmapel,idsiswa,idsoal) {
							cekclass = $('#nomorsoal #badge'+idsoal).attr('class');
							if(cekclass!='btn btn-app bg-gray') {
								$.ajax({
									type:'POST',
									url:homeurl+'/soal.php',
									data:{pg:'ragu',id_mapel:idmapel,id_siswa:idsiswa,id_soal:idsoal},
									success:function(response) {
										if(response=='OK') {
											if(cekclass=='btn btn-app bg-green') {
												$('#nomorsoal #badge'+idsoal).removeClass('bg-gray');
												$('#nomorsoal #badge'+idsoal).removeClass('bg-green');
												$('#nomorsoal #badge'+idsoal).addClass('bg-yellow');
												console.log('kuning');
											}
											if(cekclass=='btn btn-app bg-yellow') {
												$('#nomorsoal #badge'+idsoal).removeClass('bg-gray');
												$('#nomorsoal #badge'+idsoal).removeClass('bg-yellow');
												$('#nomorsoal #badge'+idsoal).addClass('bg-green');
												console.log('hijau');
											}
										}
									}
								});
							} else {
								$('#load-ragu input').removeAttr('checked');
							}
						}
						
					";
				}
				echo "
				</script>
			</body>
		</html>
	";
	
?>