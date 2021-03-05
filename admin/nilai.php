<?php 
if($ac=='') {
								echo "
									<div class='row'>
													
										
										<div class='col-md-12'>
										<div class='alert alert-danger '>
													<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
													<i class='icon fa fa-info'></i>
													Hasil Nilai Ujian akan muncul saat ada ujian berlangsung atau telah selesai
													<p><b>Tombol Ambil Jawaban</b> akan aktif jika tidak ada ujian berlangsung</p>
													</div>
											
												<div class='box box-primary'>
													<div class='box-header with-border'>
														<h3 class='box-title'>ANALISIS NILAI & JAWABAN</h3>
														<div class='box-tools pull-right btn-group'>
															
														</div>
													</div><!-- /.box-header -->
													<div class='box-body'>$info
													<div class='table-responsive'>
													<table class='table table-striped table-bordered'>
													<th>#</th>
													<th>Nama Mapel</th>
													<th>Pilih Kelas</th>
													<th>Action</th>
													";
														
													if($pengawas['level']=='admin'){
														$mapelQ = mysql_query("SELECT mapel.*,nilai.* FROM mapel INNER JOIN nilai ON mapel.id_mapel=nilai.id_mapel GROUP BY mapel.id_mapel ASC");
													}elseif($pengawas['level']=='guru'){
														$mapelQ = mysql_query("SELECT mapel.*,nilai.* FROM mapel INNER JOIN nilai ON mapel.id_mapel=nilai.id_mapel where mapel.idguru='$pengawas[id_pengawas]' GROUP BY mapel.id_mapel ASC");
													}
													while($mapel = mysql_fetch_array($mapelQ)) {
														$cek=mysql_num_rows(mysql_query("select * from nilai where id_mapel='$mapel[id_mapel]' and ujian_selesai=''"));
														$cek2=mysql_num_rows(mysql_query("select * from jawaban where id_mapel='$mapel[id_mapel]'"));
														if($cek <> 0 or $cek2 == 0){
															$dis='disabled';
														}else{
															$dis='';
														}
														
														$no++;
														echo "
														<tr>
														<input type='hidden' id='txt$mapel[id_mapel]' value='$mapel[id_mapel]'/>
														<td>$no </td>
														<td> <small class='label bg-blue'>$mapel[nama]</small> <small class='label bg-purple'>$mapel[level]</small> ";
														$dataArray = unserialize($mapel['kelas']);
																foreach ($dataArray as $key => $value) {
																	echo "<small class='label label-success'>$value </small>&nbsp;";
																}
														echo "
														</td>
														<td>
														<div class='form-group'>
															
															<select id='me$mapel[id_mapel]' class='idkel form-control select2' style='width:100%'>
																<option value=''></option>
																<option value='semua'>Semua</option>
																";
																if($mapel['level']<>'semua'){
																$kelasQ = mysql_query("SELECT * FROM kelas where level='$mapel[level]'");
																}else{
																$kelasQ = mysql_query("SELECT * FROM kelas");
																}
																while($kelas = mysql_fetch_array($kelasQ)) {
																	echo "<option value='$kelas[id_kelas]'>$kelas[id_kelas]</option>";
																}
																echo"
															</select>
														</div>
														</td>
														<td>
														<a href='#'  id='btnnilai' class='linknilai btn btn-sm btn-primary'><i class='fa fa-eye'></i> Lihat Hasil </a>
														<button  class='ambiljawaban btn btn-sm btn-danger' data-id='$mapel[id_mapel]' $dis><i class='fa fa-download'></i> Ambil Jawaban </button>
														</td>
														</tr>";			
														
													}
													echo " 
													
													</table>
													</div>
													</div><!-- /.box-body -->
												</div><!-- /.box -->
											
										</div>
									</div>
								";
							} // lihat nilai
							elseif($ac=='lihat') {
								
								$id_mapel = $_GET['idm'];
								$id_kelas = $_GET['idk'];
                                $mapel = mysql_fetch_array(mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'"));
								echo "
									<div class='row'>
										<div class='col-md-12'>
											<div class='box box-solid'>
												<div class='box-header with-border bg-blue'>
													<h3 class='box-title'>Nilai $mapel[nama]</h3>
													<div class='box-tools pull-right btn-group'>
														<button class='btn btn-sm btn-primary' onclick=frames['frameresult'].print()><i class='fa fa-print'></i> Print</button>
														<a class='btn btn-sm btn-primary' href='report_excel.php?m=$id_mapel&k=$id_kelas'><i class='fa fa-file-excel-o'></i> Excel</a>
														<a class='btn btn-sm btn-primary' href='?pg=nilai'><i class='fa fa-times'></i> Keluar</a>
													</div>
												</div><!-- /.box-header -->
												<div class='box-body'>
												<div class='table-responsive'>
													<table  class='table table-bordered table-striped'>
														<thead>
															<tr>
																<th width='5px'>#</th>
																<th>No Peserta</th>
																<th>Nama</th>
																<th>Kelas</th>
																
																<th>Lama Ujian</th>
																<th>P. Ganda</th>
																<th>Essai</th>
																<th>Nilai</th>
																<th>Total</th>
																<th >Ket</th>
																<th >Aksi</th>
																<th >Jawaban</th>
															</tr>
														</thead>
														<tbody>";
														if($id_kelas=='semua'){
														$siswaQ = mysql_query("SELECT * FROM siswa ORDER BY id_kelas ASC");
														}else{
														$siswaQ = mysql_query("SELECT * FROM siswa WHERE id_kelas='$id_kelas' ORDER BY nama ASC");	
														}
														while($siswa = mysql_fetch_array($siswaQ)) {
															$no++;
															$ket = '';
															$esai = $lama = $jawaban = $skor = $total='--';
															$kelas = mysql_fetch_array(mysql_query("SELECT * FROM kelas WHERE id_kelas='$siswa[id_kelas]'"));
															$nilaiQ = mysql_query("SELECT * FROM nilai WHERE id_mapel='$id_mapel' AND id_siswa='$siswa[id_siswa]'");
															$nilaiC = mysql_num_rows($nilaiQ);
															$nilai = mysql_fetch_array($nilaiQ);
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
																	$esai = "<small class='label bg-green'>$nilai[nilai_esai] </small>";
																	$jawaban = "<small class='label bg-green'>$nilai[jml_benar] <i class='fa fa-check'></i></small>  <small class='label bg-red'>$nilai[jml_salah] <i class='fa fa-times'></i></small>";
																	$skor = "<small class='label bg-green'>".number_format($nilai['skor'],2,'.','')."</small>";
																	$total = "<small class='label bg-blue'>".number_format($nilai['total'],2,'.','')."</small>";
																	$ket = "";
																}
																elseif($nilai['ujian_mulai']<>'' AND $nilai['ujian_selesai']=='') {
																	$selisih = strtotime($nilai['ujian_berlangsung'])-strtotime($nilai['ujian_mulai']);
																	$jam = round((($selisih%604800)%86400)/3600);
																	$mnt = round((($selisih%604800)%3600)/60);
																	$dtk = round((($selisih%604800)%60));
																	($jam<>0) ? $lama .= "$jam jam ":null;
																	($mnt<>0) ? $lama .= "$mnt menit ":null;
																	($dtk<>0) ? $lama .= "$dtk detik ":null;
																	$ket = "<i class='fa fa-spin fa-spinner' title='Sedang ujian'></i>";
																	$skor=$total='--';
																}
															}
															echo "
																<tr>
																	<td>$no</td>
																	<td>$siswa[no_peserta]</td>
																	<td>$siswa[nama]</td>
																	<td>$kelas[nama]</td>
																	
																	<td>$lama</td>
																	<td>$jawaban</td>
																	<td>$esai</td>
																	<td>$skor </td>
																	<td>$total</td>
																	<td align='center'>$ket</td>
																	<td >
																		<div class='btn-group'>";
																		if($nilai['skor']<>"") {
																		
																			if($pengawas['level']=='admin'){
																				echo "<a href='?pg=$pg&ac=ulang&idm=$id_mapel&idk=$id_kelas&ids=$siswa[id_siswa]' class='btn btn-xs btn-danger'><i class='fa fa-refresh'></i>Ulang</a>";
																			}
																			
																				
																			}else{
																				if($ket<>""){
																				echo "
																					<a href='?pg=$pg&ac=selesai&idm=$id_mapel&idk=$id_kelas&ids=$siswa[id_siswa]' class='btn btn-xs btn-primary'>Selesai</a>
																				";
																				}
																			}
																			echo "
																		</div>
																	</td>
																	<td>";
																	if($nilai['skor']<>"") {
																		$cekjawab = mysql_num_rows(mysql_query("SELECT * FROM hasil_jawaban WHERE id_siswa='$siswa[id_siswa]' and id_mapel='$id_mapel'"));
																		if($cekjawab<>0){
																			$ket='';
																			$link="?pg=".$pg."&ac=esai&idm=".$id_mapel."&idk=".$id_kelas."&ids=".$siswa['id_siswa'];
																			$link2="?pg=".$pg."&ac=jawaban&idm=".$id_mapel."&idk=".$id_kelas."&ids=".$siswa['id_siswa'];
																		}else{
																			$ket='disabled';
																			$link='#';
																			$link2='#';
																		}
																		
																		echo"	
																		<a href='$link' class='btn btn-xs btn-success' $ket><i class='fa fa-pencil-square-o'></i>input esai</a>
																		<a href='$link2' class='btn btn-xs btn-success'><i class='fa fa-search'></i>lihat</a>";
																			
																				
																	}
																	echo "
																	</td>
																</tr>
															";
														}
														echo "
														</tbody>
													</table>
													<iframe name='frameresult' src='report.php?m=$id_mapel&k=$id_kelas' style='border:none;width:1px;height:1px;'></iframe>
													</div>
												</div><!-- /.box-body -->
											</div><!-- /.box -->
										</div>
									</div>
								";
							} //input esai
							elseif($ac=='esai') {
								$id_mapel = $_GET['idm'];
								$id_kelas = $_GET['idk'];
								$id_siswa = $_GET['ids'];
							if (isset($_POST['simpanesai'])){
								$jml_data = count($_POST['idsoal']);
								$id_soal= $_POST['idsoal'];
                                $nilaiesai=$_POST['nilaiesai'];
								
								for ($i=1; $i <= $jml_data; $i++){
									$exec = mysql_query("UPDATE hasil_jawaban SET nilai_esai='".$nilaiesai[$i]."' WHERE id_soal='".$id_soal[$i]."' and jenis='2' and id_mapel='$id_mapel' and id_siswa='$id_siswa'");
									(!$exec) ? $info = info("Gagal menyimpan!","NO") : jump("?pg=nilai&ac=esai&idm=$id_mapel&idk=$id_kelas&ids=$id_siswa");
								}
								$sqljumlah = mysql_query("select sum(nilai_esai) as hasil from hasil_jawaban WHERE id_mapel='$id_mapel' and id_siswa='$id_siswa' and jenis='2'");
								$nilai=mysql_fetch_array(mysql_query("select * from nilai where id_mapel='$id_mapel' and id_siswa='$id_siswa'"));
								$jumlah = mysql_fetch_array($sqljumlah);
								$bobot=mysql_fetch_array(mysql_query("select * from mapel where id_mapel='$id_mapel'"));
								$nilai_esai1 = $jumlah['hasil']*$bobot['bobot_esai']/100;
								$nilai_esai = number_format($nilai_esai1,2,'.','');
								$nilai_pg = number_format($nilai['skor'],2,'.','');
								$total=$nilai_esai+$nilai_pg;
								mysql_query("UPDATE nilai SET nilai_esai='$nilai_esai',total='$total' WHERE id_mapel='$id_mapel' and id_siswa='$id_siswa'");
							}	
								
                                $mapel = mysql_fetch_array(mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'"));
								echo "
									<div class='row'>
										<div class='col-md-12'>
										 <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
											<div class='box box-primary'>
												<div class='box-header with-border'>
													<h3 class='box-title'>Nilai Essai $mapel[nama]</h3>
													<div class='box-tools pull-right btn-group'>
														<!--<button class='btn btn-sm btn-default' onclick=frames['frameresult'].print()><i class='fa fa-print'></i> Print</button>-->
														<!--<a class='btn btn-sm btn-success' href='report_excel.php?m=$id_mapel&k=$id_kelas'><i class='fa fa-download'></i> Excel</a>-->
														<button class='btn btn-sm btn-primary' name='simpanesai'><i class='fa fa-check'></i> Simpan</button>
														<a class='btn btn-sm btn-danger' href='?pg=nilai&ac=lihat&idm=$id_mapel&idk=$id_kelas'><i class='fa fa-times'></i></a>
													</div>
												</div><!-- /.box-header -->
												<div class='box-body'>
												<div class='table-responsive'>
													<table  class='table table-bordered table-striped'>
														<thead>
															<tr>
																<th width='5px'>#</th>
																<th>Soal & Jawaban</th>
																<th width='100px'>Input Nilai</th>
																
															</tr>
														</thead>
														<tbody>";
														$jawabanQ = mysql_query("SELECT * FROM hasil_jawaban WHERE id_mapel='$id_mapel' and id_siswa='$id_siswa' and jenis='2' ");
														while($jawaban = mysql_fetch_array($jawabanQ)) {
															$no++;
															$soal= mysql_fetch_array(mysql_query("SELECT * FROM soal WHERE id_soal='$jawaban[id_soal]' and jenis='2' and id_mapel='$id_mapel' "));
															if($soal['file']==''){$gambar='';}else{$gambar="<img src='$homeurl/$soal[file]' class='img-responsive' style='max-width:300px;'/><p>";}
															if($soal['file1']==''){$gambar2='';}else{$gambar2="<img src='$homeurl/$soal[file1]' class='img-responsive' style='max-width:300px;'/><p>";}
															echo "
																<tr><input type='hidden' value='$jawaban[id_soal]' name='idsoal[$no]'>
																	<td>$no</td>
																	<td>$gambar $gambar2 $soal[soal]<p><b>Jawaban :</b> $jawaban[esai]</td>
																	<td><input type='text' class='form-control' value='$jawaban[nilai_esai]' name='nilaiesai[$no]'></td>
																	
																</tr>
															";
														}
														echo "
														</tbody>
													</table>
													<iframe name='frameresult' src='report.php?m=$id_mapel&k=$id_kelas' style='border:none;width:1px;height:1px;'></iframe>
													</div>
												</div><!-- /.box-body -->
											</div><!-- /.box -->
											</form>
										</div>
									</div>
								";
							}
							elseif($ac=='jawaban') {
									$idmapel = $_GET['idm'];
									$id_kelas = $_GET['idk'];
									$id_siswa = $_GET['ids'];
									$nilai = mysql_fetch_array(mysql_query("SELECT * FROM nilai WHERE id_siswa='$id_siswa' and id_mapel='$idmapel' "));
									$mapel=mysql_fetch_array(mysql_query("select * from mapel where id_mapel='$nilai[id_mapel]'"));
									$namamapel=mysql_fetch_array(mysql_query("select * from mata_pelajaran where kode_mapel='$mapel[nama]'"));
									$siswa = mysql_fetch_array(mysql_query("SELECT * FROM siswa WHERE id_siswa='$id_siswa'"));
									echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='box box-solid'>
											<div class='box-header with-border bg-blue'>
												<h3 class='box-title'>Data Hasil Ujian</h3>	
												<div class='box-tools pull-right btn-group'>
														<button class='btn btn-sm btn-primary' onclick=frames['framejawab'].print()><i class='fa fa-print'></i> Print</button>
														
														<a class='btn btn-sm btn-danger' href='?pg=nilai&ac=lihat&idm=$idmapel&idk=$id_kelas'><i class='fa fa-times'></i></a>
														<iframe name='framejawab' src='printjawab.php?m=$idmapel&k=$id_kelas&s=$id_siswa' style='display:none;'></iframe>
													</div>
											</div><!-- /.box-header -->
											<div class='box-body'>
											<table class='table table-bordered table-striped'> 
											<tr><th width='150'>No Induk</th><td width='10'>:</td><td>$siswa[nis]</td><td width='150' align='center'>Nilai</td></tr>
											<tr><th >Nama</th><td width='10'>:</td><td>$siswa[nama]</td><td rowspan='3' width='150' align='center' style='font-size:30px'>$nilai[skor]</td></tr>
											<tr><th >Kelas</th><td width='10'>:</td><td>$siswa[id_kelas]</td></tr>
											<tr><th >Mata Pelajaran</th><td width='10'>:</td><td>$namamapel[nama_mapel]</td></tr>
											</table><br>
												<table  class='table table-bordered table-striped'>
													<thead>
														<tr><th width='5px'>#</th>
															
															<th>Soal PG</th>
															<th style='text-align:center'>Jawab</th>
															<th style='text-align:center'>Hasil</th>
															
														</tr>
													</thead>
													<tbody>";
													$nilaix = mysql_query("SELECT * FROM hasil_jawaban WHERE id_siswa='$id_siswa' and id_mapel='$idmapel' and jenis='1' ");
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
																</table><br>
												<table  class='table table-bordered table-striped'>
													<thead>
														<tr><th width='5px'>#</th>
															
															<th>Soal Esai</th>
															
															<th style='text-align:center'>Hasil</th>
															
														</tr>
													</thead>
													<tbody>";
													$nilaiex = mysql_query("SELECT * FROM hasil_jawaban WHERE id_siswa='$id_siswa' and id_mapel='$idmapel' and jenis='2' ");
													while($jawabane=mysql_fetch_array($nilaiex)){
														$nox++;
														
														
													echo "
																		<tr><td>$nox</td>
																			
																			<td>$soal[soal]
																			<p><b>jawab : </b>$jawabane[esai]</p>
																			</td>
																		    
																			<td style='text-align:center'>$jawabane[nilai_esai]</td>	
																			
																			
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
							elseif($ac=='ulang') {
								$where = array(
									'id_mapel' => $_GET['idm'],
									'id_siswa' => $_GET['ids']
								);
								delete('nilai',$where);
								delete('hasil_jawaban',$where);
								delete('pengacak',$where);
								jump("?pg=$pg&ac=lihat&idm=$_GET[idm]&idk=$_GET[idk]");
							}
							elseif($ac=='selesai') {
								$idm = $_GET['idm'];
								$ids = $_GET['ids'];
								$idk = $_GET['idk'];
								$where = array(
									'id_mapel' => $idm,
									'id_siswa' => $ids
								);
								$benar = $salah = 0;
								$mapel = fetch('mapel',array('id_mapel'=>$idm));
								$siswa = fetch('siswa',array('id_siswa'=>$ids));
								$ceksoal = select('soal',array('id_mapel'=>$idm));
								foreach($ceksoal as $getsoal) {
									$w = array(
										'id_siswa' => $ids,
										'id_mapel' => $idm,
										'id_soal' => $getsoal['id_soal']
									);
									$cekjwb = rowcount('jawaban',$w);
									if($cekjwb<>0) {
										$getjwb = fetch('jawaban',$w);
										($getjwb['jawaban']==$getsoal['jawaban']) ? $benar++ : $salah++;
									} else {
										$salah++;
									}
								}
								$bagi = $mapel['jml_soal']/100;
								$skor = $benar/$bagi;
								$data = array(
									'ujian_selesai' => $datetime,
									'jml_benar' => $benar,
									'jml_salah' => $salah,
									'skor' => $skor
								);
								update('nilai',$data,$where);
								
										 $exec=mysql_query("delete from jawaban where id_mapel='$id_mapel' and id_siswa='$id_siswa' ");
								delete('pengacak',$where);
								jump("?pg=$pg&ac=lihat&idm=$idm&idk=$idk");
							}
							?>