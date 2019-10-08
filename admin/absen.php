<?php
	require("../config/config.default.php");
	require("../config/config.function.php");
	require("../config/functions.crud.php");

	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
	($id_pengawas==0) ? header('location:index.php'):null;
	$idserver = $setting['kode_sekolah'];
	echo "<link rel='stylesheet' href='$homeurl/dist/css/cetak.min.css'>";
	
	$sesi =@$_GET['id_sesi'];
	$mapel =@$_GET['id_mapel'];
	$ruang =@$_GET['id_ruang'];
	$kelas =@$_GET['id_kelas'];
	if($sesi=='' and $ruang=='' and $mapel==''){
		die('Tidak ada data yang dicetak. Anda harus memilih semua variabel: mapel, sesi dan ruang');
	}
	$lebarusername='10%';
	$lebarnopes='17%';
	$namaruang = mysql_fetch_array(mysql_query("SELECT * FROM ruang WHERE kode_ruang='$ruang'"));

	$querytanggal=mysql_query("SELECT * FROM ujian WHERE id_mapel='$mapel'");
	$cektanggal=mysql_fetch_array($querytanggal);
	$mapelx=mysql_fetch_array(mysql_query("SELECT * FROM mapel WHERE id_mapel='$mapel'"));					
	$namamapel=	mysql_fetch_array(mysql_query("SELECT * FROM mata_pelajaran WHERE kode_mapel='$mapelx[nama]'"));					
	if(date('m')>=7 AND date('m')<=12) {
		$ajaran = date('Y')."/".(date('Y')+1);
	}elseif(date('m')>=1 AND date('m')<=6) {
		$ajaran = (date('Y')-1)."/".date('Y');
	}
	
	$querysetting=mysql_query("SELECT * FROM setting WHERE id_setting='1'");
	$setting=mysql_fetch_array($querysetting);

	//======DAFTAR HADIR DICETAK BERDASARKAN PESERTA YANG MENGIKUTI MAPEL YANG ADA DI BANK SOAL========
	if(!$sesi=='' and !$ruang=='' and !$kelas==''){
		if($mapelx['id_kelas']==''){	//semua jurusan
			$ckck=mysql_query("SELECT * FROM siswa WHERE sesi='$sesi' and ruang='$ruang' and id_kelas='$kelas'");
		}else{		//jurusan tertentu ==> filter berdasarkan jurusan tersebut!!!
			$ckck=mysql_query("SELECT * FROM siswa WHERE sesi='$sesi' AND ruang='$ruang' AND id_kelas='$kelas' and idpk='$mapelx[idpk]'");
		}
	
	}elseif($sesi=='' and !$ruang=='' and !$kelas==''){
		if($mapelx['idpk']=='semua' or $mapelx['idpk']=='' ){
			$ckck=mysql_query("SELECT * FROM siswa WHERE  ruang='$ruang' and id_kelas='$kelas'");
		}else{
			$ckck=mysql_query("SELECT * FROM siswa WHERE  ruang='$ruang' and id_kelas='$kelas' and idpk='$mapelx[idpk]'");
		}
	}elseif($sesi=='' and $ruang=='' and !$kelas==''){
		if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
			$ckck=mysql_query("SELECT * FROM siswa WHERE  id_kelas='$kelas'");	
		}else{
			$ckck=mysql_query("SELECT * FROM siswa WHERE  id_kelas='$kelas' and idpk='$mapelx[idpk]'");	
		}
	}elseif(!$sesi=='' and $ruang=='' and $kelas==''){
		if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
			$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi'");	
		}else{
			$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' and idpk='$mapelx[idpk]'");	
		}
	}elseif(!$sesi=='' and !$ruang=='' and $kelas==''){
		if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
			$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' and ruang='$ruang'");
		}else{
			$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' and ruang='$ruang' and idpk='$mapelx[idpk]'");
		}
	}elseif($sesi=='' and !$ruang=='' and $kelas==''){
		if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
			$ckck=mysql_query("SELECT * FROM siswa WHERE   ruang='$ruang'");	
		}else{
			$ckck=mysql_query("SELECT * FROM siswa WHERE   ruang='$ruang' and idpk='$mapelx[idpk]'");
		}
	}else{
		if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
			$ckck=mysql_query("SELECT * FROM siswa");	
		}else{
			$ckck=mysql_query("SELECT * FROM siswa where idpk='$mapelx[idpk]'");	
		}
	}
	
	$jumlahData = mysql_num_rows($ckck);
	$jumlahn = '25';
	$n = ceil($jumlahData/$jumlahn);
	$nomer = 1;

	$date=date_create($cektanggal['tgl_ujian']);
	
	for($i=1;$i<=$n;$i++){
		$mulai = $i-1;
		$batas = ($mulai*$jumlahn);
		$startawal = $batas;
		$batasakhir = $batas+$jumlahn;
		if ($i==$n){
			echo "
			<div class='page'>
				<table width='100%'>
					<tr>
						<td width='100'><img src='$homeurl/$setting[logo_instansi]' height='75'></td>
						<td>
							<CENTER>
								<strong class='f12'>
									DAFTAR HADIR PESERTA <BR>
									$setting[nama_ujian]<BR>
									TAHUN PELAJARAN $ajaran
								</strong>
							</CENTER></td>
							<td width='100'><img src='$homeurl/$setting[logo]' height='75'></td>
					</tr>
				</table>
				<table class='detail'>
					<tr>
						<td>SEKOLAH/MADRASAH</td><td>:</td><td><span style='width:350px;'>&nbsp;$setting[sekolah]</span></td>
						<td>ID SERVER</td><td>:</td><td><span style='width:150px;'>&nbsp;$setting[kode_sekolah]</span></td>
					</tr>
					<tr>
						<td>RUANG</td><td>:</td><td><span style='width:350px;'>&nbsp;$namaruang[keterangan]</span></td>
						<td>SESI</td><td>:</td><td><span style='width:150px;'>&nbsp;$sesi</span></td>
					</tr>
					<tr>
						<td>HARI</td><td>:</td>
						<td><span style='width:90px;'>&nbsp;" . strtoupper(buat_tanggal('D',$cektanggal['tgl_ujian'])) . "</span>TANGGAL : <span style='width:190px;'>&nbsp;" . strtoupper(buat_tanggal('d M Y',$cektanggal['tgl_ujian'])) . "</span></td>
						<td>PUKUL</td><td>:</td><td><span style='width:150px;'>&nbsp;".buat_tanggal('H:i',$cektanggal['tgl_ujian'])." - " .buat_tanggal('H:i',$cektanggal['tgl_selesai']). "</span></td>
					</tr>
					<tr>
						<td>MATA PELAJARAN</td><td>:</td><td colspan='4'><span style='width:350px;'>&nbsp;$namamapel[nama_mapel]</span></td>
					</tr>
				</table>
				<table class='it-grid it-cetak' width='100%'>
					<tr height=40px>
						<th>No.</th>
						<th>Username</th>
						<th>No Peserta</th>
						<th>Nama Peserta<BR> </th>
						<th>Tanda Tangan</th>
						<th>Ket</th>
					</tr>";
					if(!$sesi=='' and !$ruang=='' and !$kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){	//semua jurusan
							$ckck=mysql_query("SELECT * FROM siswa WHERE sesi='$sesi' and ruang='$ruang' and id_kelas='$kelas' limit $batas,$jumlahn");
						}else{		//jurusan tertentu ==> filter berdasarkan jurusan tersebut!!!
							$ckck=mysql_query("SELECT * FROM siswa WHERE sesi='$sesi' AND ruang='$ruang' AND id_kelas='$kelas' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");
						}
					
					}elseif($sesi=='' and !$ruang=='' and !$kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa WHERE  ruang='$ruang' and id_kelas='$kelas' limit $batas,$jumlahn");
						}else{
							$ckck=mysql_query("SELECT * FROM siswa WHERE  ruang='$ruang' and id_kelas='$kelas' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");
						}
					}elseif($sesi=='' and $ruang=='' and !$kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa WHERE  id_kelas='$kelas' limit $batas,$jumlahn");	
						}else{
							$ckck=mysql_query("SELECT * FROM siswa WHERE  id_kelas='$kelas' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");	
						}
					}elseif(!$sesi=='' and $ruang=='' and $kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' limit $batas,$jumlahn");	
						}else{
							$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");	
						}
					}elseif(!$sesi=='' and !$ruang=='' and $kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' and ruang='$ruang' limit $batas,$jumlahn");
						}else{
							$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' and ruang='$ruang' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");
						}
					}elseif($sesi=='' and !$ruang=='' and $kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa WHERE   ruang='$ruang' limit $batas,$jumlahn");	
						}else{
							$ckck=mysql_query("SELECT * FROM siswa WHERE   ruang='$ruang' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");
						}
					}else{
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa limit $batas,$jumlahn");	
						}else{
							$ckck=mysql_query("SELECT * FROM siswa where idpk='$mapelx[idpk]' limit $batas,$jumlahn");	
						}
					}
					
					while($f= mysql_fetch_array($ckck)){
						if ($nomer % 2 == 0) {
							echo "
							<tr>
								<td width='15' align='center'>&nbsp;$nomer.</td>
								<td width='$lebarusername' align='center'>&nbsp;$f[username]</td>
								<td width='$lebarnopes' align='center'>&nbsp;$f[no_peserta]</td>
								<td width='*'>&nbsp;$f[nama]</td>
								<td width='150'><span style='float:right;width:80px;'>&nbsp;$nomer.</span></td>
								<td width='6%'>&nbsp</td>
							</tr>";
						} else {
							echo "
							<tr>
								<td width='15' align='center'>&nbsp;$nomer.</td>
								<td width='$lebarusername' align='center'>&nbsp;$f[username]</td>
								<td width='$lebarnopes' align='center'>&nbsp;$f[no_peserta]</td>
								<td width='*'>&nbsp;$f[nama]</td>
								<td width='150'><span style='float:left;width:80px;'>&nbsp;$nomer.</span></td>
								<td width='6%'>&nbsp</td>
							</tr>";
						}
						$nomer++;
						$jlhhdr=($nomer-1);
					}
					echo "
				</table>
				<table>
					<tr><td colspan='2'><strong><i>Keterangan : </i></strong></td></tr>
					<tr><td>1. Dibuat rangkap 3 (tiga), masing-masing untuk sekolah, Cabang Dinas dan Provinsi.</td></tr>
					<tr><td>2. Pengawas ruang menyilang Nama Peserta yang tidak hadir.</td></tr>
				</table>
				<table width='100%'>
					<tr>
						<td>
							<table style='border:1px solid black'>
								<tr>
									<td>Jumlah Peserta yang Seharusnya Hadir</td>
									<td>:</td>
									<td> $jlhhdr orang</td>
								</tr>
								<tr>
									<td>Jumlah Peserta yang Tidak Hadir</td>
									<td>:</td>
									<td>_____ orang</td>
								</tr>
								<tr style='border-top:1px solid black'>
									<td>Jumlah Peserta Hadir</td>
									<td>:</td>
									<td>_____ orang</td>
								</tr>
							</table>
						</td>
						<td align='center' width='200'>
							Proktor<BR><BR><BR><BR><BR>(<nip></nip>)<BR><BR>&nbsp;&nbsp;&nbsp;&nbsp;NIP. <nip></nip>
						</td>
						<td align='center' width='175'>
							Pengawas<BR><BR><BR><BR><BR>(<nip></nip>)<BR><BR>&nbsp;&nbsp;&nbsp;&nbsp;NIP. <nip></nip>
						</td>
					</tr>
				</table>
				<div class='footer'>
					<table width='100%' height='30'>
						<tr>
							<td width='25px' style='border:1px solid black'></td>
							<td width='5px'>&nbsp;</td>
							<td style='border:1px solid black;font-weight:bold;font-size:14px;text-align:center;'>$setting[nama_ujian] $setting[sekolah]</td>
							<td width='5px'>&nbsp;</td>
							<td width='25px' style='border:1px solid black'></td>
						</tr>
					</table>
				</div>
			</div>";
			break;
		}
		echo "
		<div class='page'>
			<table width='100%'>
				<tr>
					<td width='100'><img src='$homeurl/dist/img/logo12.png' height='75'></td>
					<td>
						<CENTER>
							<strong class='f12'>
								DAFTAR HADIR PESERTA <BR>
								$setting[nama_ujian]<BR>
								TAHUN PELAJARAN $ajaran
							</strong>
						</CENTER></td>
						<td width='100'><img src='$homeurl/$setting[logo]' height='75'></td>
				</tr>
			</table>
			<table class='detail'>
				<tr>
					<td>SEKOLAH/MADRASAH</td><td>:</td><td><span style='width:350px;'>&nbsp;$setting[sekolah]</span></td>
					<td>ID SERVER</td><td>:</td><td><span style='width:150px;'>&nbsp;$idserver</span></td>
				</tr>
				<tr>
					<td>RUANG</td><td>:</td><td><span style='width:350px;'>&nbsp;$namaruang[keterangan]</span></td>
					<td>SESI</td><td>:</td><td><span style='width:150px;'>&nbsp;$sesi</span></td>
				</tr>
				<tr>
					<td>HARI</td><td>:</td>
					<td><span style='width:90px;'>&nbsp;" . strtoupper(buat_tanggal('D',$cektanggal['tgl_ujian'])) . "</span>TANGGAL : <span style='width:190px;'>&nbsp;" . strtoupper(buat_tanggal('d M Y',$cektanggal['tgl_ujian'])) . "</span></td>
					<td>PUKUL</td><td>:</td><td><span style='width:150px;'>&nbsp;".buat_tanggal('H:i',$cektanggal['tgl_ujian'])." - " .buat_tanggal('H:i',$cektanggal['tgl_selesai']). "</span></td>
				</tr>
				<tr>
					<td>MATA PELAJARAN</td><td>:</td><td colspan='4'><span style='width:350px;'>&nbsp;$namamapel[nama_mapel]</span></td>
				</tr>
			</table>

			<table class='it-grid it-cetak' width='100%'>
				<tr height=40px>
					<th>No.</th>
					<th>Username</th>
					<th>No Peserta</th>
					<th>Nama Peserta<BR> </th>
					<th>Tanda Tangan</th>
					<th>Ket</th>
				</tr>";
				
				$s = $i-1;
				if(!$sesi=='' and !$ruang=='' and !$kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){	//semua jurusan
							$ckck=mysql_query("SELECT * FROM siswa WHERE sesi='$sesi' and ruang='$ruang' and id_kelas='$kelas' limit $batas,$jumlahn");
						}else{		//jurusan tertentu ==> filter berdasarkan jurusan tersebut!!!
							$ckck=mysql_query("SELECT * FROM siswa WHERE sesi='$sesi' AND ruang='$ruang' AND id_kelas='$kelas' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");
						}
					
					}elseif($sesi=='' and !$ruang=='' and !$kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa WHERE  ruang='$ruang' and id_kelas='$kelas' limit $batas,$jumlahn");
						}else{
							$ckck=mysql_query("SELECT * FROM siswa WHERE  ruang='$ruang' and id_kelas='$kelas' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");
						}
					}elseif($sesi=='' and $ruang=='' and !$kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa WHERE  id_kelas='$kelas' limit $batas,$jumlahn");	
						}else{
							$ckck=mysql_query("SELECT * FROM siswa WHERE  id_kelas='$kelas' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");	
						}
					}elseif(!$sesi=='' and $ruang=='' and $kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' limit $batas,$jumlahn");	
						}else{
							$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");	
						}
					}elseif(!$sesi=='' and !$ruang=='' and $kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' and ruang='$ruang' limit $batas,$jumlahn");
						}else{
							$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' and ruang='$ruang' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");
						}
					}elseif($sesi=='' and !$ruang=='' and $kelas==''){
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa WHERE   ruang='$ruang' limit $batas,$jumlahn");	
						}else{
							$ckck=mysql_query("SELECT * FROM siswa WHERE   ruang='$ruang' and idpk='$mapelx[idpk]' limit $batas,$jumlahn");
						}
					}else{
						if($mapelx['idpk']=='semua'  or $mapelx['idpk']==''){
							$ckck=mysql_query("SELECT * FROM siswa limit $batas,$jumlahn");	
						}else{
							$ckck=mysql_query("SELECT * FROM siswa where idpk='$mapelx[idpk]' limit $batas,$jumlahn");	
						}
					}
				while($f= mysql_fetch_array($ckck)){
					if ($nomer % 2 == 0) {
						echo "
						<tr>
							<td width='15' align='center'>&nbsp;$nomer.</td>
							<td width='$lebarusername' align='center'>&nbsp;$f[username]</td>
							<td width='$lebarnopes' align='center'>&nbsp;$f[no_peserta]</td>
							<td width='*'>&nbsp;$f[nama]</td>
							<td width='150'><span style='float:right;width:80px;'>&nbsp;$nomer.</span></td>
							<td width='6%'>&nbsp</td>
						</tr>";
					} else {
						echo "
						<tr>
							<td width='15' align='center'>&nbsp;$nomer.</td>
							<td width='$lebarusername' align='center'>&nbsp;$f[username]</td>
							<td width='$lebarnopes' align='center'>&nbsp;$f[no_peserta]</td>
							<td width='*'>&nbsp;$f[nama]</td>
							<td width='150'><span style='float:left;width:80px;'>&nbsp;$nomer.</span></td>
							<td width='6%'>&nbsp</td>
						</tr>";
					}
					$nomer++;
				}
				echo "
			</table>

			<div class='footer'>
				<table width='100%' height='30'>
					<tr>
						<td width='25px' style='border:1px solid black'></td>
						<td width='5px'>&nbsp;</td>
						<td style='border:1px solid black;font-weight:bold;font-size:14px;text-align:center;'>UJIAN BERBASIS KOMPUTER $setting[sekolah]</td>
						<td width='5px'>&nbsp;</td>
						<td width='25px' style='border:1px solid black'></td>
					</tr>
				</table>
			</div>
		</div>";
	}
