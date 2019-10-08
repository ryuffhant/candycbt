<?php
	require("../config/config.default.php");
	require("../config/config.function.php");
	require("../config/functions.crud.php");
	require("../config/dis.php");
	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
	($id_pengawas==0) ? header('location:login.php'):null;
	echo "<style> .str{ mso-number-format:\@; } </style>";
	$id_mapel = $_GET['m'];
	$id_kelas = $_GET['k'];
	$kode_ujian = $_GET['i'];
	$pengawas = fetch('pengawas',array('id_pengawas'=>$id_pengawas));
	$mapel = fetch('mapel',array('id_mapel'=>$id_mapel));
	$kelas = fetch('kelas',array('id_kelas'=>$id_kelas));
	if(date('m')>=7 AND date('m')<=12) {
		$ajaran = date('Y')."/".(date('Y')+1);
	}
	elseif(date('m')>=1 AND date('m')<=6) {
		$ajaran = (date('Y')-1)."/".date('Y');
	}
	$file = "NILAI_".$mapel['tgl_ujian']."_".$mapel['nama']."_".$kelas['nama'];
	$file = str_replace(" ","-",$file);
	$file = str_replace(":","",$file);
	header("Content-type: application/octet-stream");
	header("Pragma: no-cache");
	header("Expires: 0");
	header("Content-Disposition: attachment; filename=".$file.".xls");
	echo "
		REKAP DATA NILAI HASIL UJIAN
		<table border='1'>
														<thead>
															<tr>
																<th rowspan='3' width='5px'>#</th>
																<th style='text-align:center' rowspan='3'>No Peserta</th>
																<th style='text-align:center' rowspan='3'>Nama Peserta</th>
																<th style='text-align:center' rowspan='3'>Kelas</th>";
																$mapelQ = mysql_query("SELECT * FROM mapel a inner join nilai b ON a.id_mapel=b.id_mapel group by b.id_ujian ");
																while($mapel=mysql_fetch_array($mapelQ)){
																echo "
																<th style='text-align:center' colspan='3'>$mapel[nama]</th>
																";
																}
																echo "
															</tr>
															";
																$kode = mysql_query("SELECT * FROM mapel a inner join nilai b ON a.id_mapel=b.id_mapel group by b.id_ujian");
																while($mapel=mysql_fetch_array($kode)){
															echo "
																<th style='text-align:center' colspan='3'>$mapel[kode_ujian]</th>";
																}
															echo "
															</tr>
															<tr>";
																$mapelQ = mysql_query("SELECT * FROM mapel a inner join nilai b ON a.id_mapel=b.id_mapel group by b.id_ujian ");
																while($mapel=mysql_fetch_array($mapelQ)){
															echo "
																<th style='text-align:center'>B</th>
																<th style='text-align:center'>S</th>
																<th style='text-align:center'>SKOR</th>";
																}
															echo "
															</tr>
															</thead>
															<tbody>
														";
														$siswaQ = mysql_query("SELECT * FROM siswa where id_kelas='$id_kelas' ORDER BY nama ASC");
														while($siswa = mysql_fetch_array($siswaQ)) {
															$no++;
															$ket = '';
															$esai = $lama = $jawaban = $skor = $total='--';
															
															
															
															echo "
																<tr>
																	<td>$no</td>
																	<td align='center'>$siswa[no_peserta]</td>
																	<td>$siswa[nama]</td>
																	<td align='center'>$siswa[id_kelas]</td>";
																	$mapelQ = mysql_query("SELECT * FROM mapel a inner join nilai b ON a.id_mapel=b.id_mapel group by b.id_ujian ");
																	while($mapel=mysql_fetch_array($mapelQ)){
																		$nilaiQ = mysql_query("SELECT * FROM nilai WHERE id_ujian='$mapel[id_ujian]' AND id_siswa='$siswa[id_siswa]' and kode_ujian='$mapel[kode_ujian]'");
																		$nilaiC = mysql_num_rows($nilaiQ);
																		$nilai = mysql_fetch_array($nilaiQ);
																	echo "
																	<td align='center'>$nilai[jml_benar]</td>
																	<td align='center'>$nilai[jml_salah]</td>
																	<td class='str' align='center'>$nilai[skor]</td>";
																	}
																echo "
																</tr>
															";
														}
														echo "
														</tbody>
													</table>
	";
