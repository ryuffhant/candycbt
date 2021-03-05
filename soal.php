<?php
	require("config/config.default.php");
	require("config/config.function.php");
	require("config/functions.crud.php");
	
	$id_siswa = (isset($_SESSION['id_siswa'])) ? $_SESSION['id_siswa'] : 0;
	$siswa = fetch('siswa',array('id_siswa'=>$id_siswa));
	
	$pg = @$_POST['pg'];
	$ac = @$_POST['ac'];
	$id = @$_POST['id'];
	$audio = array('mp3','wav','ogg','MP3','WAV','OGG');
	$image = array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG','GIF','BMP');
	if($pg=='soal') {
		$no_soal = $_POST['no_soal'];
		$no_prev = $no_soal-1;
		$no_next = $no_soal+1;
		$id_mapel = $_POST['id_mapel'];
		$id_siswa = $_POST['id_siswa'];
		$jenis = $_POST['jenis'];
		
		$where = array(
			'id_siswa' => $id_siswa,
			'id_mapel' => $id_mapel
			
		);
	
			$pengacak = fetch('pengacak',$where);
			$pengacakesai = fetch('pengacak',$where);
			$pengacak = explode(',',$pengacak['id_soal']);
			$pengacakesai = explode(',',$pengacakesai['id_esai']);
			$mapel = fetch('ujian',array('id_mapel'=>$id_mapel));	
			update('nilai',array('ujian_berlangsung'=>$datetime),$where);
			$soal = fetch('soal',array('id_mapel'=>$id_mapel,'id_soal'=>$pengacak[$no_soal],'jenis'=>$jenis));
			$jawab = fetch('jawaban',array('id_siswa'=>$id_siswa,'id_mapel'=>$id_mapel,'id_soal'=>$soal['id_soal']));
						echo "
					<div class='box-body'>
						<div class='callout'>$soal[soal]</div>
						<div class='row'>
						<div class='col-md-7'>";
						if($soal['file']<>'') {
							
							$ext = explode(".",$soal['file']);
							$ext = end($ext);
							if(in_array($ext,$image)) {
								echo "<span  id='zoom' style='display:inline-block'> <img  src='$homeurl/files/$soal[file]' class='img-responsive'/></span>";
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
								echo "<span  id='zoom1' style='display:inline-block'> <img  src='$homeurl/files/$soal[file1]' class='img-responsive'/></span>";
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
																			<td>
																				<input class='hidden radio-label' type='radio' name='jawab' id='E' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'E',1) $e/>
																				<label class='button-label' for='E'>
																				  <h1>E</h1>
																				</label>

																			</td>
																		</tr>
																		<tr>
																			<td>
																				<input class='hidden radio-label' type='radio' name='jawab' id='B' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'B',1) $b />
																				<label class='button-label' for='B'>
																				  <h1>B</h1>
																				</label>
																				
																			</td>
																			<td>
																				<input class='hidden radio-label' type='radio' name='jawab' id='D' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'D',1) $d/>
																				<label class='button-label' for='D'>
																				  <h1>D</h1>
																				</label>
																				
																			</td>
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
																			$soal[pilA]";
																		if($soal['fileA']<>'') {
																		$ext = explode(".",$soal['fileA']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<span  class='lup' style='display:inline-block'><img src='$homeurl/files/$soal[fileA]' class='img-responsive' style='width:250px;'/></span>";
																		}
																		elseif(in_array($ext,$audio)) {
																			echo "<audio controls='controls' ><source src='$homeurl/files/$soal[fileA]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
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
																			$soal[pilB]";
																		if($soal['fileB']<>'') {
																		$ext = explode(".",$soal['fileB']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<span  class='lup' style='display:inline-block'><img src='$homeurl/files/$soal[fileB]' class='img-responsive' style='width:250px;'/></span>";
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
																			$soal[pilC]";
																		if($soal['fileC']<>'') {
																		$ext = explode(".",$soal['fileC']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<span  class='lup' style='display:inline-block'><img src='$homeurl/files/$soal[fileC]' class='img-responsive' style='width:250px;'/></span>";
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
																	<tr>
																		<td>
																		<input class='hidden radio-label' type='radio' name='jawab' id='D' onclick=jawabsoal($id_mapel,$id_siswa,$soal[id_soal],'D',1) $d/>
																		<label class='button-label' for='D'>
																		  <h1>D</h1>
																		</label>
																		</td>
																		<td style='vertical-align:middle;'>
																			$soal[pilD]";
																		if($soal['fileD']<>'') {
																		$ext = explode(".",$soal['fileD']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<span  class='lup' style='display:inline-block'><img src='$homeurl/files/$soal[fileD]' class='img-responsive' style='width:250px;'/></span>";
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
																			$soal[pilE]";
																		if($soal['fileE']<>'') {
																		$ext = explode(".",$soal['fileE']);
																		$ext = end($ext);
																		if(in_array($ext,$image)) {
																			echo "<span  class='lup' style='display:inline-block'><img src='$homeurl/files/$soal[fileE]' class='img-responsive' style='width:250px;'/></span>";
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
				<table width='100%'><tr><td>
					<div class='col-md-4 text-left'>
						<button id='move-prev' class='btn btn-flat btn-default' onclick=loadsoal($id_mapel,$id_siswa,$no_prev,1)><i class='fa fa-chevron-left'></i> <span class='hidden-xs'>SOAL SEBELUMNYA</span></button>
						<i class='fa fa-spin fa-spinner' id='spin-prev' style='display:none;'></i>
					</div></td><td>
					<div class='col-md-4 text-center'>
						<div id='load-ragu'>
							<a href='#' class='btn btn-flat btn-warning'><input type='checkbox' onclick=radaragu($id_mapel,$id_siswa,$soal[id_soal]) $ragu/> RAGU-RAGU</a>
						</div>
					</div></td><td>
					<div class='col-md-4 text-right'>
						<i class='fa fa-spin fa-spinner' id='spin-next' style='display:none;'></i>
						<button id='move-next' class='btn btn-flat btn-primary' onclick=loadsoal($id_mapel,$id_siswa,$no_next,1)><span class='hidden-xs'>SOAL SELANJUTNYA </span><i class='fa fa-chevron-right'></i></button>
					</div></td></tr>
				</table>
			</div>
			<script>
			$(document).ready(function() {
							$('#zoom').zoom();
							$('#zoom1').zoom();
							$('.lup').zoom();
			
			});
			
			</script>
			
		";
				
	}
	if($pg=='soalesai') {
		$no_soal = $_POST['no_soal'];
		$no_prev = $no_soal-1;
		$no_next = $no_soal+1;
		$id_mapel = $_POST['id_mapel'];
		$id_siswa = $_POST['id_siswa'];
		$jenis = $_POST['jenis'];
		
		$where = array(
			'id_siswa' => $id_siswa,
			'id_mapel' => $id_mapel
			
		);
	
			$pengacak = fetch('pengacak',$where);
			$pengacakesai = fetch('pengacak',$where);
			$pengacak = explode(',',$pengacak['id_soal']);
			$pengacakesai = explode(',',$pengacakesai['id_esai']);
		$mapel = fetch('ujian',array('id_mapel'=>$id_mapel));
		
		
		update('nilai',array('ujian_berlangsung'=>$datetime),$where);
		
					
						$soalesai = fetch('soal',array('id_mapel'=>$id_mapel,'id_soal'=>$pengacakesai[$no_soal],'jenis'=>$jenis));
						$jawabesai = fetch('jawaban',array('id_siswa'=>$id_siswa,'id_mapel'=>$id_mapel,'id_soal'=>$soalesai['id_soal']));
						echo "
			<div class='box-body'>
				<div class='col-md-12'>";
						if($soalesai['file']<>'') {
							$ext = explode(".",$soalesai['file']);
							$ext = end($ext);
							if(in_array($ext,$image)) {
								echo "<div class='col-md-5'><span  id='zoom' style='display:inline-block'> <img  src='$homeurl/files/$soalesai[file]' class='img-responsive'/></span></div>";
							}
							elseif(in_array($ext,$audio)) {
								echo "<audio controls='controls' ><source src='$homeurl/files/$soalesai[file]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
							} else {
								echo "File tidak didukung!";
							}
						}
						if($soalesai['file1']<>'') {
							$ext = explode(".",$soalesai['file1']);
							$ext = end($ext);
							if(in_array($ext,$image)) {
								echo "<div class='col-md-5'><span  id='zoom1' style='display:inline-block'> <img  src='$homeurl/files/$soalesai[file1]' class='img-responsive'/></span></div>";
							}
							elseif(in_array($ext,$audio)) {
								echo "<audio controls='controls' ><source src='$homeurl/files/$soalesai[file1]' type='audio/$ext' style='width:100%;'/>Your browser does not support the audio tag.</audio>";
							} else {
								echo "File tidak didukung!";
							}
						}
					
						echo "
					</div>
				<div class='callout'>$soalesai[soal]</div>
				<div id='result'></div>
				<div class='row'>
					<div class='col-md-7'>
					
					<textarea id='jawabesai' name='textjawab' class='form-control' onchange=jawabesai($id_mapel,$id_siswa,$soalesai[id_soal],2)>$jawabesai[esai]</textarea>
					
					</div>	
						
				</div>
			</div>
			<div class='box-footer navbar-fixed-bottom'>
				<table width='100%'><tr><td>
					<div class='col-md-4 text-left'>
						<button id='move-prev' class='btn btn-flat btn-default' onclick=loadsoalesai($id_mapel,$id_siswa,$no_prev,2)><i class='fa fa-chevron-left'></i><span class='hidden-xs'> SOAL SEBELUMNYA</span></button>
						<i class='fa fa-spin fa-spinner' id='spin-prev' style='display:none;'></i>
					</div></td><td>
					</td><td>
					<div class='col-md-4 text-right'>
						<i class='fa fa-spin fa-spinner' id='spin-next' style='display:none;'></i>
						<button id='move-next' class='btn btn-flat btn-primary' onclick=loadsoalesai($id_mapel,$id_siswa,$no_next,2)><span class='hidden-xs'>SOAL SELANJUTNYA</span> <i class='fa fa-chevron-right'></i></button>
					</div></td></tr>
				</table>
			</div>
			<script>
			$(document).ready(function() {
							$('#zoom').zoom();
							$('#zoom1').zoom();
						
				 	
			});
			</script>
			
		";
					
					
	}
	elseif($pg=='jawab') {
		$jenis=$_POST['jenis'];
		$data = array(
			'id_mapel' => $_POST['id_mapel'],
			'id_siswa' => $_POST['id_siswa'],
			'id_soal' => $_POST['id_soal'],
			'jenis' => $_POST['jenis'],
			'jawaban' => $_POST['jawaban']
		);
		$where = array(
			'id_mapel' => $_POST['id_mapel'],
			'id_siswa' => $_POST['id_siswa'],
			'jenis' => $_POST['jenis'],
			'id_soal' => $_POST['id_soal']
		);
		$cekjawaban = rowcount('jawaban',$where);
		if($cekjawaban==0) {
			$exec = insert('jawaban',$data);
		} else {
			$exec = update('jawaban',$data,$where);
		}
		echo $exec;
	}
	elseif($pg=='jawabesai') {
		$jenis=$_POST['jenis'];
		$data = array(
			'id_mapel' => $_POST['id_mapel'],
			'id_siswa' => $_POST['id_siswa'],
			'id_soal' => $_POST['id_soal'],
			'jenis' => $_POST['jenis'],
			'esai' => $_POST['jawaban']
		);
		$where = array(
			'id_mapel' => $_POST['id_mapel'],
			'id_siswa' => $_POST['id_siswa'],
			'jenis' => $_POST['jenis'],
			'id_soal' => $_POST['id_soal']
		);
		$cekjawaban = rowcount('jawaban',$where);
		if($cekjawaban==0) {
			$exec = insert('jawaban',$data);
		} else {
			$exec = update('jawaban',$data,$where);
		}
		echo $exec;
						
	}
	elseif($pg=='ragu') {
		$where = array(
			'id_mapel' => $_POST['id_mapel'],
			'id_siswa' => $_POST['id_siswa'],
			'jenis'=>1,
			'id_soal' => $_POST['id_soal']
		);
		$cekragu = fetch('jawaban',$where);
		if($cekragu['ragu']==0) {
			$exec = update('jawaban',array('ragu'=>1),$where);
		} else {
			$exec = update('jawaban',array('ragu'=>0),$where);
		}
		echo $exec;
	}
	
?>