<?php 
include "../config/config.default.php";
$pengawas = mysql_fetch_array(mysql_query("SELECT * FROM pengawas  WHERE id_pengawas='$_SESSION[id_pengawas]'"));
$tglsekarang = date('Y-m-d');							if($pengawas['level']=='admin') {
														$nilaiq = mysql_query("SELECT *  FROM nilai  s LEFT JOIN ujian c ON s.id_mapel=c.id_mapel  where c.status='1' GROUP by s.id_nilai DESC");
														}else{
														$nilaiq = mysql_query("SELECT *  FROM nilai  s LEFT JOIN ujian c ON s.id_mapel=c.id_mapel  where c.status='1' and c.id_guru='$_SESSION[id_pengawas]' GROUP by s.id_nilai DESC");
														}
														while($nilai = mysql_fetch_array($nilaiq)) {
															
															$tglx=strtotime($nilai['ujian_mulai']);
															$tgl=date('Y-m-d',$tglx);
															if($tgl==$tglsekarang){
															$no++;
															$ket = '';
															$lama = $jawaban = $skor = '--';
															$siswa= mysql_fetch_array(mysql_query("SELECT * FROM siswa WHERE id_siswa='$nilai[id_siswa]'"));
															$kelas = mysql_fetch_array(mysql_query("SELECT * FROM kelas WHERE id_kelas='$siswa[id_kelas]'"));
															$mapel = mysql_fetch_array(mysql_query("SELECT * FROM mapel WHERE id_mapel='$nilai[id_mapel]'"));
															$nilaiQ = mysql_query("SELECT * FROM nilai WHERE id_siswa='$siswa[id_siswa]'");
															$nilaiC = mysql_num_rows($nilaiQ);
															
															if($nilaiC<>0) {
																$lama = '';
																if($nilai['ujian_mulai']<>'' AND $nilai['ujian_selesai']<>'') {
																	$selisih = strtotime($nilai['ujian_selesai'])-strtotime($nilai['ujian_mulai']);
																	$jam = round((($selisih%604800)%86400)/3600);
																	$mnt = round((($selisih%604800)%3600)/60);
																	$dtk = round((($selisih%604800)%60));
																	($jam<>0) ? $lama .= "$jam jam ":null;
																	($mnt<>0) ? $lama .= "$mnt menit ":null;
																	($dtk<>0) ? $lama .= "$dtk detik ":null;
																	$jawaban = "<small class='label bg-green'>$nilai[jml_benar] <i class='fa fa-check'></i></small>  <small class='label bg-red'>$nilai[jml_salah] <i class='fa fa-times'></i></small>";
																	$skor = "<small class='label bg-green'>".number_format($nilai['skor'],2,'.','')."</small>";
																	$ket = "<label class='label label-success'>Tes Selesai</label>";
																}
																elseif($nilai['ujian_mulai']<>'' AND $nilai['ujian_selesai']=='') {
																	$selisih = strtotime($nilai['ujian_berlangsung'])-strtotime($nilai['ujian_mulai']);
																	$jam = round((($selisih%604800)%86400)/3600);
																	$mnt = round((($selisih%604800)%3600)/60);
																	$dtk = round((($selisih%604800)%60));
																	($jam<>0) ? $lama .= "$jam jam ":null;
																	($mnt<>0) ? $lama .= "$mnt menit ":null;
																	($dtk<>0) ? $lama .= "$dtk detik ":null;
																	$ket = "<label class='label label-danger'><i class='fa fa-spin fa-spinner' title='Sedang ujian'></i>&nbsp;Masih Dikerjakan</label>
																	
																	";
																}
															
															}
															echo "
																<tr>
																	<td>$no</td>
																	<td>$siswa[nis]</td>
																	<td>$siswa[nama]</td>
																	<td>$kelas[nama]</td>
																	<td><small class='label bg-purple'>$mapel[nama]</small> <small class='label bg-blue'>$mapel[level]</small></td>
																	<td>$lama</td>
																	<td>$jawaban</td>
																	<td>$skor</td>
																	<td>$nilai[ipaddress]</td>
																	<td>$ket</td>
																	
																</tr>
															";
															}
														}