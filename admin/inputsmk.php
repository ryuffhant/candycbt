<?php 							$nomor = $_GET['no'];
								$jenis=$_GET['jenis'];
								$id_mapel = $_GET['id'];
								$mapel = mysql_fetch_array(mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'"));
								if($jenis=='1'){
								$jumsoal = mysql_num_rows(mysql_query("SELECT * FROM soal WHERE id_mapel='$id_mapel' AND  nomor='$nomor' AND jenis='1'"));
								$soalQ = mysql_query("SELECT * FROM soal WHERE id_mapel='$id_mapel' AND  nomor='$nomor' AND jenis='1'");
								}
								if($jenis=='2'){
								$jumsoal = mysql_num_rows(mysql_query("SELECT * FROM soal WHERE id_mapel='$id_mapel' AND  nomor='$nomor' AND jenis='2'"));
								$soalQ = mysql_query("SELECT * FROM soal WHERE id_mapel='$id_mapel' AND  nomor='$nomor' AND jenis='2'");
								}
								$soal = mysql_fetch_array($soalQ);
								if(isset($_POST['simpansoal'])) {
									$isi_soal = addslashes($_POST['isi_soal']);
									if($jenis=='1'){
									$pilA = addslashes($_POST['pilA']);
									$pilB = addslashes($_POST['pilB']);
									$pilC = addslashes($_POST['pilC']);
									$pilD = addslashes($_POST['pilD']);
									if($setting['jenjang']=='SMK'){
									$pilE = addslashes($_POST['pilE']);
									}
									if(isset($_FILES['file']['name']) && $_FILES['file']['name']<>'') {
										$file = $_FILES['file']['name'];
										$temp = $_FILES['file']['tmp_name'];
										$size = $_FILES['file']['size'];
										$ext = explode('.',$file);
										$ext = end($ext);
										$url = 'files/'.$id_mapel.'_'.$nomor.'_1.'.$ext;
										$urlx = $id_mapel.'_'.$nomor.'_1.'.$ext;
										$upload = move_uploaded_file($temp,'../'.$url);
										(!$upload) ? $url = $soal['file']:null;
									} else {
										$urlx = $soal['file'];
									}
									if(isset($_FILES['file1']['name']) && $_FILES['file1']['name']<>'') {
										$file1 = $_FILES['file1']['name'];
										$temp = $_FILES['file1']['tmp_name'];
										$size = $_FILES['file1']['size'];
										$ext = explode('.',$file1);
										$ext = end($ext);
										$file1 = 'files/'.$id_mapel.'_'.$nomor.'_2.'.$ext;
										$filex1 = $id_mapel.'_'.$nomor.'_2.'.$ext;
										$upload = move_uploaded_file($temp,'../'.$file1);
										(!$upload) ? $file1 = $soal['file1']:null;
									} else {
										$filex1 = $soal['file1'];
									}
									if(isset($_FILES['fileA']['name']) && $_FILES['fileA']['name']<>'') {
										$fileA = $_FILES['fileA']['name'];
										$temp = $_FILES['fileA']['tmp_name'];
										$size = $_FILES['fileA']['size'];
										$ext = explode('.',$fileA);
										$ext = end($ext);
										$fileA = 'files/'.$id_mapel.'_'.$nomor.'_A.'.$ext;
										$filexA = $id_mapel.'_'.$nomor.'_A.'.$ext;
										$upload = move_uploaded_file($temp,'../'.$fileA);
										(!$upload) ? $fileA = $soal['fileA']:null;
									} else {
										$filexA = $soal['fileA'];
									}
									if(isset($_FILES['fileB']['name']) && $_FILES['fileB']['name']<>'') {
										$fileB = $_FILES['fileB']['name'];
										$temp = $_FILES['fileB']['tmp_name'];
										$size = $_FILES['fileB']['size'];
										$ext = explode('.',$fileB);
										$ext = end($ext);
										$fileB = 'files/'.$id_mapel.'_'.$nomor.'_B.'.$ext;
										$filexB = $id_mapel.'_'.$nomor.'_B.'.$ext;
										$upload = move_uploaded_file($temp,'../'.$fileB);
										(!$upload) ? $fileB = $soal['fileB']:null;
									} else {
										$filexB = $soal['fileB'];
									}
									if(isset($_FILES['fileC']['name']) && $_FILES['fileC']['name']<>'') {
										$fileC = $_FILES['fileC']['name'];
										$temp = $_FILES['fileC']['tmp_name'];
										$size = $_FILES['fileC']['size'];
										$ext = explode('.',$fileC);
										$ext = end($ext);
										$fileC = 'files/'.$id_mapel.'_'.$nomor.'_C.'.$ext;
										$filexC = $id_mapel.'_'.$nomor.'_C.'.$ext;
										$upload = move_uploaded_file($temp,'../'.$fileC);
										(!$upload) ? $fileC = $soal['fileC']:null;
									} else {
										$filexC = $soal['fileC'];
									}
									if(isset($_FILES['fileD']['name']) && $_FILES['fileD']['name']<>'') {
										$fileD = $_FILES['fileD']['name'];
										$temp = $_FILES['fileD']['tmp_name'];
										$size = $_FILES['fileD']['size'];
										$ext = explode('.',$fileD);
										$ext = end($ext);
										$fileD = 'files/'.$id_mapel.'_'.$nomor.'_D.'.$ext;
										$filexD = $id_mapel.'_'.$nomor.'_D.'.$ext;
										$upload = move_uploaded_file($temp,'../'.$fileD);
										(!$upload) ? $fileD = $soal['fileD']:null;
									} else {
										$filexD = $soal['fileD'];
									}
									if($setting['jenjang']=='SMK'){
									if(isset($_FILES['fileE']['name']) && $_FILES['fileE']['name']<>'') {
										$fileE = $_FILES['fileE']['name'];
										$temp = $_FILES['fileE']['tmp_name'];
										$size = $_FILES['fileE']['size'];
										$ext = explode('.',$fileE);
										$ext = end($ext);
										$fileE = 'files/'.$id_mapel.'_'.$nomor.'_E.'.$ext;
										$filexE = $id_mapel.'_'.$nomor.'_E.'.$ext;
										$upload = move_uploaded_file($temp,'../'.$fileE);
										(!$upload) ? $fileE = $soal['fileE']:null;
									} else {
										$filexE = $soal['fileE'];
									}
									}
									$jawaban = $_POST['jawaban'];
									if($jumsoal==0) {
										if($setting['jenjang']=='SMK'){
										$exec = mysql_query("INSERT INTO soal (id_mapel,nomor,soal,jenis,pilA,pilB,pilC,pilD,pilE,jawaban,file,file1,fileA,fileB,fileC,fileD,fileE) VALUES ('$id_mapel','$nomor','$isi_soal','1','$pilA','$pilB','$pilC','$pilD','$pilE','$jawaban','$urlx','$filex1','$filexA','$filexB','$filexC','$filexD','$filexE')");
										
										}else{
										$exec = mysql_query("INSERT INTO soal (id_mapel,nomor,soal,jenis,pilA,pilB,pilC,pilD,jawaban,file,file1,fileA,fileB,fileC,fileD) VALUES ('$id_mapel','$nomor','$isi_soal','1','$pilA','$pilB','$pilC','$pilD','$jawaban','$urlx','$filex1','$filexA','$filexB','$filexC','$filexD')");	
										}
									} else {
										if($setting['jenjang']=='SMK'){
										$exec = mysql_query("UPDATE soal SET soal='$isi_soal',pilA='$pilA',pilB='$pilB',pilC='$pilC',pilD='$pilD',pilE='$pilE',jawaban='$jawaban',file='$urlx',file1='$filex1',fileA='$filexA',fileB='$filexB',fileC='$filexC',fileD='$filexD',fileE='$filexE' WHERE id_mapel='$id_mapel' AND nomor='$nomor' AND jenis='1'");
										echo mysql_error();
										}else{
										$exec = mysql_query("UPDATE soal SET soal='$isi_soal',pilA='$pilA',pilB='$pilB',pilC='$pilC',pilD='$pilD',jawaban='$jawaban',file='$urlx',file1='$filex1',fileA='$filexA',fileB='$filexB',fileC='$filexC',fileD='$filexD' WHERE id_mapel='$id_mapel' AND nomor='$nomor' AND jenis='1'");
										}
									}
									
									}
									if($jenis=='2'){
									if(isset($_FILES['file']['name']) && $_FILES['file']['name']<>'') {
										$file = $_FILES['file']['name'];
										$temp = $_FILES['file']['tmp_name'];
										$size = $_FILES['file']['size'];
										$ext = explode('.',$file);
										$ext = end($ext);
										$url = 'files/'.$id_mapel.'_'.$nomor.'_E1.'.$ext;
										$urlx = $id_mapel.'_'.$nomor.'_E1.'.$ext;
										$upload = move_uploaded_file($temp,'../'.$url);
										(!$upload) ? $url = $soal['file']:null;
									} else {
										$urlx = $soal['file'];
									}
									if(isset($_FILES['file1']['name']) && $_FILES['file1']['name']<>'') {
										$file1 = $_FILES['file1']['name'];
										$temp = $_FILES['file1']['tmp_name'];
										$size = $_FILES['file1']['size'];
										$ext = explode('.',$file1);
										$ext = end($ext);
										$file1 = 'files/'.$id_mapel.'_'.$nomor.'_E2.'.$ext;
										$filex1 = $id_mapel.'_'.$nomor.'_E2.'.$ext;
										$upload = move_uploaded_file($temp,'../'.$file1);
										(!$upload) ? $file1 = $soal['file1']:null;
									} else {
										$filex1 = $soal['file1'];
									}
									if($jumsoal==0) {
										$exec = mysql_query("INSERT INTO soal (id_mapel,nomor,soal,jenis,file,file1) VALUES ('$id_mapel','$nomor','$isi_soal','2','$urlx','$filex1')");
									} else {
										$exec = mysql_query("UPDATE soal SET soal='$isi_soal',file='$urlx',file1='$filex1' WHERE id_mapel='$id_mapel' AND nomor='$nomor' AND jenis='2'");
									}
									}
									(!$exec) ? $info = info('Gagal menyimpan soal!','NO') : $info = info('Berhasil menyimpan soal!','OK');
									
								}
								
								($soal['jawaban']=='A') ? $jwbA='checked':$jwbA='';
								($soal['jawaban']=='B') ? $jwbB='checked':$jwbB='';
								($soal['jawaban']=='C') ? $jwbC='checked':$jwbC='';
								($soal['jawaban']=='D') ? $jwbD='checked':$jwbD='';
								if($setting['jenjang']=='SMK'){
								($soal['jawaban']=='E') ? $jwbE='checked':$jwbE='';
								}
								echo "
									<div class='row'>
										<div class='col-md-12'>
											<form id='formsoal' action='' method='post' enctype='multipart/form-data'>
												<div class='box box-primary'>
													<div class='box-header with-border bg-blue'>
													
														<div class='btn-group' style='margin-top:-5px'>	
														<a class='btn btn-sm btn-primary'>Nama Mapel </a>														
														<a class='btn btn-sm btn-primary'>$mapel[nama] </a>	
														</div>		
														<div class='box-tools pull-right btn-group'>
															
															<button type='submit' name='simpansoal' class='btn btn-sm btn-primary'><i class='fa fa-check'></i> Simpan</button>
															<a href='?pg=$pg&ac=lihat&id=$id_mapel' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></a>
															
														</div>
													</div><!-- /.box-header -->
													
													<div class='box-body'>
													<input type='hidden' name='mapel' value='$_GET[id]' >
													<input type='hidden' name='jenis' value='$_GET[jenis]' >
													<input type='hidden' name='nomor' value='$_GET[no]' >
														<div class='form-group'>
															
															<div class='btn-group'>";
															if($jenis=='1'){
																for($i=1;$i<=$mapel['jml_soal'];$i++) {
																	$ceksoal = mysql_num_rows(mysql_query("SELECT * FROM soal WHERE id_mapel='$id_mapel' AND nomor='$i' AND jenis='1'"));
																	($ceksoal<>0) ? $a='success':$a='default';
																	($i==$nomor) ? $a='danger':null;
																	echo "<a href='?pg=$pg&ac=$ac&id=$id_mapel&no=$i&jenis=1' class='btn btn-xs btn-$a'>$i</a>";
																}
															}else{
																for($i=1;$i<=$mapel['jml_esai'];$i++) {
																	$ceksoal = mysql_num_rows(mysql_query("SELECT * FROM soal WHERE id_mapel='$id_mapel' AND nomor='$i' AND jenis='2'"));
																	($ceksoal<>0) ? $a='success':$a='default';
																	($i==$nomor) ? $a='danger':null;
																	echo "<a href='?pg=$pg&ac=$ac&id=$id_mapel&no=$i&jenis=2' class='btn btn-xs btn-$a'>$i</a>";
																}
															}
																echo "
															</div>
														</div>
														
														<div class='row'>
															<div class='col-md-6'>
																<div class='box box-info'>
																	
            														<div class='box-body pad'>
              															<form>
                    														<textarea  name='isi_soal' class='editor1 form-control textarea' rows='10' cols='80' style='width:100%;'>$soal[soal]</textarea>
              															</form>
            														</div>
          														</div>
																<div class='col-md-12'>
																<div class='form-group'>";
																	if($soal['file']<>'') {
																		$audio = array('mp3','wav','ogg','MP3','WAV','OGG');
																		$image = array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG','GIF','BMP');
																		$ext = explode(".",$soal['file']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "
																				<label>Gambar</label><br/>
																				<img src='$homeurl/files/$soal[file]' style='max-width:100px;'/>
																			";
																		}
																		elseif(in_array($ext,$audio)) {
																			echo "
																				<label>Audio</label><br/>
																				<audio controls><source src='$homeurl/files/$soal[file]' type='audio/$ext'>Your browser does not support the audio tag.</audio>
																			";
																		} else {
																			echo "File tidak didukung!";
																		}
																		echo "<br/><a href='?pg=$pg&ac=hapusfile&id=$soal[id_soal]&file=file&jenis=$jenis' class='text-red'><i class='fa fa-times'></i> Hapus</a>";
																	} else {
																		echo "
																			<label>Gambar / Audio</label>
																			<input type='file' class='form-control' name='file' type='file'>
																		";
																	}
																	echo "
																</div>
																</div>
																<div class='col-md-12'>
																<div class='form-group'>";
																	if($soal['file1']<>'') {
																		$audio = array('mp3','wav','ogg','MP3','WAV','OGG');
																		$image = array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG','GIF','BMP');
																		$ext = explode(".",$soal['file1']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "
																				<label>Gambar</label><br/>
																				<img src='$homeurl/files/$soal[file1]' style='max-width:100px;'/>
																			";
																		}
																		elseif(in_array($ext,$audio)) {
																			echo "
																				<label>Audio</label><br/>
																				<audio controls><source src='$homeurl/files/$soal[file1]' type='audio/$ext'>Your browser does not support the audio tag.</audio>
																			";
																		} else {
																			echo "File tidak didukung!";
																		}
																		echo "<br/><a href='?pg=$pg&ac=hapusfile&id=$soal[id_soal]&file=file1&jenis=$jenis' class='text-red'><i class='fa fa-times'></i> Hapus</a>";
																	} else {
																		echo "
																			<label>Gambar / Audio</label>
																			<input type='file' class='form-control' name='file1' type='file'>
																		";
																	}
																	echo "
																</div>
																</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
															</div>";
															if($jenis<>'2'){
															echo "
															
															<div class='col-md-6'>
															<div class='box-group' id='accordion'>
																<div class='panel box box-primary'>
																  <div class='box-header with-border'>
																	<h4 class='box-title'>
																	  <a data-toggle='collapse' data-parent='#accordion' href='#collapseOne' aria-expanded='false' class='collapsed'>
																		PILIHAN JAWABAN A
																	  </a>
																	</h4>
																	 <div class='box-tools pull-right'>
																		<label><input type='radio' name='jawaban' value='A' required='true' $jwbA/> Pilihan A</label>
																	  </div>
																  </div>
																  <div id='collapseOne' class='panel-collapse collapse' aria-expanded='false' style='height: 0px;'>
																	<div class='box-body'>
																		<div class='form-group'>
																			
																			<textarea  name='pilA' class='editor1 pilihan form-control' >$soal[pilA]</textarea>
																		</div>
																		<div class='form-group'>";
																			if($soal['fileA']<>'') {
																				$audio = array('mp3','wav','ogg','MP3','WAV','OGG');
																				$image = array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG','GIF','BMP');
																				$ext = explode(".",$soal['fileA']);
																				$ext = end($ext);
																				if(in_array($ext,$image)) {
																					echo "
																						<label>Gambar A</label><br/>
																						<img src='$homeurl/files/$soal[fileA]' style='max-width:80px;'/>
																					";
																				}
																				elseif(in_array($ext,$audio)) {
																					echo "
																						<label>Audio</label><br/>
																						<audio controls><source src='$homeurl/files/$soal[fileA]' type='audio/$ext'>Your browser does not support the audio tag.</audio>
																					";
																				} else {
																					echo "File tidak didukung!";
																				}
																				echo "<br/><a href='?pg=$pg&ac=hapusfile&id=$soal[id_soal]&file=fileA&jenis=$jenis' class='text-red'><i class='fa fa-times'></i> Hapus</a>";
																			} else {
																				echo "
																					<label>Gambar / Audio Pil A</label>
																					<input type='file' name='fileA' class='form-control'/>
																				";
																			}
																			echo "
																		</div>
																	</div>
																  </div>
																</div>
																<div class='panel box box-primary'>
																  <div class='box-header with-border'>
																	<h4 class='box-title'>
																	  <a data-toggle='collapse' data-parent='#accordion' href='#collapseB' aria-expanded='false' class='collapsed'>
																		PILIHAN JAWABAN B
																	  </a>
																	</h4>
																	<div class='box-tools pull-right'>
																		<label><input type='radio' name='jawaban' value='B' required='true' $jwbB/> Pilihan B</label>
																	 </div>
																  </div>
																  <div id='collapseB' class='panel-collapse collapse' aria-expanded='false' style='height: 0px;'>
																	<div class='box-body'>
																		<div class='form-group'>
																			
																			<textarea  name='pilB' class='editor1 pilihan form-control' >$soal[pilB]</textarea>
																		</div>
																		<div class='form-group'>";
																			if($soal['fileB']<>'') {
																				$audio = array('mp3','wav','ogg','MP3','WAV','OGG');
																				$image = array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG','GIF','BMP');
																				$ext = explode(".",$soal['fileB']);
																				$ext = end($ext);
																				if(in_array($ext,$image)) {
																					echo "
																						<label>Gambar B</label><br/>
																						<img src='$homeurl/files/$soal[fileB]' style='max-width:80px;'/>
																					";
																				}
																				elseif(in_array($ext,$audio)) {
																					echo "
																						<label>Audio</label><br/>
																						<audio controls><source src='$homeurl/files/$soal[fileB]' type='audio/$ext'>Your browser does not support the audio tag.</audio>
																					";
																				} else {
																					echo "File tidak didukung!";
																				}
																				echo "<br/><a href='?pg=$pg&ac=hapusfile&id=$soal[id_soal]&file=fileB&jenis=$jenis' class='text-red'><i class='fa fa-times'></i> Hapus</a>";
																			} else {
																				echo "
																					<label>Gambar / Audio Pil B</label>
																					<input type='file' name='fileB' class='form-control'/>
																				";
																			}
																			echo "
																		</div>
																	</div>
																  </div>
																</div>
																<div class='panel box box-primary'>
																  <div class='box-header with-border'>
																	<h4 class='box-title'>
																	  <a data-toggle='collapse' data-parent='#accordion' href='#collapseC' aria-expanded='false' class='collapsed'>
																		PILIHAN JAWABAN C
																	  </a>
																	</h4>
																	<div class='box-tools pull-right'>
																		<label><input type='radio' name='jawaban' value='C' required='true' $jwbC/> Pilihan C</label>
																	 </div>
																  </div>
																  <div id='collapseC' class='panel-collapse collapse' aria-expanded='false' style='height: 0px;'>
																	<div class='box-body'>
																		<div class='form-group'>
																			
																			<textarea  name='pilC' class='editor1 pilihan form-control' >$soal[pilC]</textarea>
																		</div>
																		<div class='form-group'>";
																			if($soal['fileC']<>'') {
																				$audio = array('mp3','wav','ogg','MP3','WAV','OGG');
																				$image = array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG','GIF','BMP');
																				$ext = explode(".",$soal['fileC']);
																				$ext = end($ext);
																				if(in_array($ext,$image)) {
																					echo "
																						<label>Gambar C</label><br/>
																						<img src='$homeurl/files/$soal[fileC]' style='max-width:80px;'/>
																					";
																				}
																				elseif(in_array($ext,$audio)) {
																					echo "
																						<label>Audio</label><br/>
																						<audio controls><source src='$homeurl/files/$soal[fileC]' type='audio/$ext'>Your browser does not support the audio tag.</audio>
																					";
																				} else {
																					echo "File tidak didukung!";
																				}
																				echo "<br/><a href='?pg=$pg&ac=hapusfile&id=$soal[id_soal]&file=fileC&jenis=$jenis' class='text-red'><i class='fa fa-times'></i> Hapus</a>";
																			} else {
																				echo "
																					<label>Gambar / Audio Pil C</label>
																					<input type='file' name='fileC' class='form-control'/>
																				";
																			}
																			echo "
																		</div>
																	</div>
																  </div>
																</div>
																<div class='panel box box-primary'>
																  <div class='box-header with-border'>
																	<h4 class='box-title'>
																	  <a data-toggle='collapse' data-parent='#accordion' href='#collapseD' aria-expanded='false' class='collapsed'>
																		PILIHAN JAWABAN D
																	  </a>
																	</h4>
																	<div class='box-tools pull-right'>
																		<label><input type='radio' name='jawaban' value='D' required='true' $jwbD/> Pilihan D</label>
																	 </div>
																  </div>
																  <div id='collapseD' class='panel-collapse collapse' aria-expanded='false' style='height: 0px;'>
																	<div class='box-body'>
																		<div class='form-group'>
																			
																			<textarea  name='pilD' class='editor1 pilihan form-control' >$soal[pilD]</textarea>
																		</div>
																		<div class='form-group'>";
																			if($soal['fileD']<>'') {
																				$audio = array('mp3','wav','ogg','MP3','WAV','OGG');
																				$image = array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG','GIF','BMP');
																				$ext = explode(".",$soal['fileD']);
																				$ext = end($ext);
																				if(in_array($ext,$image)) {
																					echo "
																						<label>Gambar D</label><br/>
																						<img src='$homeurl/files/$soal[fileD]' style='max-width:80px;'/>
																					";
																				}
																				elseif(in_array($ext,$audio)) {
																					echo "
																						<label>Audio</label><br/>
																						<audio controls><source src='$homeurl/files/$soal[fileD]' type='audio/$ext'>Your browser does not support the audio tag.</audio>
																					";
																				} else {
																					echo "File tidak didukung!";
																				}
																				echo "<br/><a href='?pg=$pg&ac=hapusfile&id=$soal[id_soal]&file=fileD&jenis=$jenis' class='text-red'><i class='fa fa-times'></i> Hapus</a>";
																			} else {
																				echo "
																					<label>Gambar / Audio Pil D</label>
																					<input type='file' name='fileD' class='form-control'/>
																				";
																			}
																			echo "
																		</div>
																	</div>
																  </div>
																</div>
															
																";
																if($setting['jenjang']=='SMK'){
																echo "
																<div class='panel box box-primary'>
																  <div class='box-header with-border'>
																	<h4 class='box-title'>
																	  <a data-toggle='collapse' data-parent='#accordion' href='#collapseE' aria-expanded='false' class='collapsed'>
																		PILIHAN JAWABAN E
																	  </a>
																	</h4>
																	<div class='box-tools pull-right'>
																		<label><input type='radio' name='jawaban' value='E' required='true' $jwbE/> Pilihan E</label>
																	 </div>
																  </div>
																  <div id='collapseE' class='panel-collapse collapse' aria-expanded='false' style='height: 0px;'>
																	<div class='box-body'>
																		<div class='form-group'>
																			
																			<textarea  name='pilE' class='editor1 pilihan form-control' >$soal[pilE]</textarea>
																		</div>
																		<div class='form-group'>";
																			if($soal['fileE']<>'') {
																				$audio = array('mp3','wav','ogg','MP3','WAV','OGG');
																				$image = array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG','GIF','BMP');
																				$ext = explode(".",$soal['fileE']);
																				$ext = end($ext);
																				if(in_array($ext,$image)) {
																					echo "
																						<label>Gambar E</label><br/>
																						<img src='$homeurl/files/$soal[fileE]' style='max-width:80px;'/>
																					";
																				}
																				elseif(in_array($ext,$audio)) {
																					echo "
																						<label>Audio</label><br/>
																						<audio controls><source src='$homeurl/files/$soal[fileE]' type='audio/$ext'>Your browser does not support the audio tag.</audio>
																					";
																				} else {
																					echo "File tidak didukung!";
																				}
																				echo "<br/><a href='?pg=$pg&ac=hapusfile&id=$soal[id_soal]&file=fileE&jenis=$jenis' class='text-red'><i class='fa fa-times'></i> Hapus</a>";
																			} else {
																				echo "
																					<label>Gambar / Audio Pil E</label>
																					<input type='file' name='fileE' class='form-control'/>
																				";
																			}
																			echo "
																		</div>
																	</div>
																  </div>
																</div>
																";
																}
																echo "
																</div>
															</div>
															"; }echo"
														</div>
													</div><!-- /.box-body -->
												</div><!-- /.box -->
											</form>
										</div>
									</div>
									<script>
									tinymce.init({
										selector: '.editor1',
										statusbar: false,
										
										plugins: 'table formula textcolor emoticons code codesample imagetools link image uploadimage paste',
										toolbar: 'bold italic fontselect fontsizeselect | alignleft aligncenter alignright bullist numlist  formula backcolor forecolor | emoticons code | imagetools link image paste ',
										fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
										paste_data_images: true,
										paste_as_text: true,
										images_upload_handler: function (blobInfo, success, failure) {
											success('data:' + blobInfo.blob().type + ';base64,' + blobInfo.base64());
										},
										image_class_list: [
										{title: 'Responsive', value: 'img-responsive'}
										],									
										});
									</script>
								";
								?>