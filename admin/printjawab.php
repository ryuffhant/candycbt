<?php
	require("../config/config.default.php");
	require("../config/config.function.php");
	require("../config/functions.crud.php");
	require("../config/dis.php");
	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
	($id_pengawas==0) ? header('location:login.php'):null;
	error_reporting(0);
	$id_mapel = $_GET['m'];
	$id_kelas = $_GET['k'];
	$id_siswa = $_GET['s'];
	$nilai = mysql_fetch_array(mysql_query("SELECT * FROM nilai WHERE id_siswa='$id_siswa' and id_mapel='$id_mapel' "));
	$mapel=mysql_fetch_array(mysql_query("select * from mapel where id_mapel='$nilai[id_mapel]'"));
	$namamapel=mysql_fetch_array(mysql_query("select * from mata_pelajaran where kode_mapel='$mapel[nama]'"));
	$siswa = mysql_fetch_array(mysql_query("SELECT * FROM siswa WHERE id_siswa='$id_siswa'"));
	echo "
		<!DOCTYPE html>
		<html>
			<head>
				<title>Jawaban Siswa</title>
				<style>
					* { margin:auto; padding:0; line-height:100%; }
					body { max-width:793.700787402px; }
					td { padding:1px 3px 1px 3px; }
					.garis { border:1px solid #000; border-left:0px; border-right:0px; padding:1px; margin-top:5px; margin-bottom:5px; }
				</style>
				<link rel='stylesheet' href='$homeurl/dist/bootstrap/css/bootstrap.min.css'/>
				<link rel='stylesheet' href='$homeurl/plugins/font-awesome/css/font-awesome.min.css'/>
			</head>
			<body>
											<table class='table table-bordered table-striped table-condensed'> 
											<tr><th width='150'>No Induk</th><td width='10'>:</td><td>$siswa[nis]</td><td width='150' align='center'>Nilai</td></tr>
											<tr><th >Nama</th><td width='10'>:</td><td>$siswa[nama]</td><td rowspan='3' width='150' align='center' style='font-size:30px'>$nilai[skor]</td></tr>
											<tr><th >Kelas</th><td width='10'>:</td><td>$siswa[id_kelas]</td></tr>
											<tr><th >Mata Pelajaran</th><td width='10'>:</td><td>$namamapel[nama_mapel]</td></tr>
											</table>
												<table  class='table table-bordered table-striped'>
													<thead>
														<tr><th width='5px'>#</th>
															
															<th>Soal PG</th>
															<th style='text-align:center'>Jawab</th>
															<th style='text-align:center'>Hasil</th>
															
														</tr>
													</thead>
													<tbody>";
										$nilaix = mysql_query("SELECT * FROM hasil_jawaban WHERE id_siswa='$id_siswa' and id_mapel='$id_mapel' and jenis='1' ");
										while($jawaban=mysql_fetch_array($nilaix)){
											$no++;
											$soal=mysql_fetch_array(mysql_query("select * from soal where id_soal='$jawaban[id_soal]'  "));
											if($jawaban['jawaban']==$soal['jawaban']){
												$status="<span class='text-green'><i class='fa fa-check'></i></span>";
											}else{
												$status="<span class='text-red'><i class='fa fa-times'></i></span>";
											}
										echo "
																		<tr><td>$no</td>
																			
																			<td>$soal[soal]</td>
																		    <td style='text-align:center'>$jawaban[jawaban]</td>
																			<td style='text-align:center'>$status</td>	
																			
																			
																		</tr>";
																		}
										echo "
																	</tbody>
																</table>
																</table>
												<table  class='table table-bordered table-striped'>
													<thead>
														<tr><th width='5px'>#</th>
															
															<th>Soal Esai</th>
															
															<th style='text-align:center'>Hasil</th>
															
														</tr>
													</thead>
													<tbody>";
													$nilaix = mysql_query("SELECT * FROM hasil_jawaban WHERE id_siswa='$id_siswa' and id_mapel='$id_mapel' and jenis='2' ");
													while($jawaban=mysql_fetch_array($nilaix)){
														$nox++;
														
														
													echo "
																		<tr><td>$nox</td>
																			
																			<td>$soal[soal]
																			<p><b>jawab : </b>$jawaban[esai]</p>
																			</td>
																		    
																			<td style='text-align:center'>$jawaban[nilai_esai]</td>	
																			
																			
																		</tr>";
																		}
										echo "
																	</tbody>
																</table>
			</body>
		</html>
	";
?>