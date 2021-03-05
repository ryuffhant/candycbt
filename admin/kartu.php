<?php
	require("../config/config.default.php");
	require("../config/config.function.php");
	require("../config/functions.crud.php");
	require("../config/dis.php");
	include "phpqrcode/qrlib.php";
	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
	($id_pengawas==0) ? header('location:index.php'):null;
	$id_kelas = @$_GET['id_kelas'];
	
	
	if(date('m')>=7 AND date('m')<=12) {
		$ajaran = date('Y')."/".(date('Y')+1);
	}
	elseif(date('m')>=1 AND date('m')<=6) {
		$ajaran = (date('Y')-1)."/".date('Y');
	}
	$kelas = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'"));
	echo "
		<style>
			* { font-size:x-small; }
			.box { border:1px solid #000; width:100%; height:150px; }
		</style>
		
		<table border='0' width='100%' align='center' cellpadding='2'>
			<tr>";
				$siswaQ = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_kelas='$id_kelas' ORDER BY nama ASC");
				while($siswa = mysqli_fetch_array($siswaQ)) {
					$nopeserta=$siswa['no_peserta'];
					$no++;
					
					echo "
						<td width='50%'>
							<div  style='width:10.4cm;border:1px solid #666;'>
								<table border='0' width='100%' align='center'>
									<tr>
										<td align='left' valign='top'>";
											$tempdir='../foto/qrcode/';
											$tempatpng=$tempdir.$nopeserta.'.png';
											$tempatip=$tempdir.'qrcodeip.png';
											
											if(!file_exists($tempatpng)){
											QRcode::png($nopeserta,$tempatpng,'L',1);
											}
											if(!file_exists($tempatip)){
											QRcode::png($setting['ip_server'],$tempatip,'M',1);
											}
										echo "
										<img src='../$setting[logo]' height='40px'/>
										
										</td>
										<td align='center'>
											<b>
												$setting[header_kartu]<br/>
												
												TAHUN PELAJARAN $ajaran
											</b>
										</td>
										<td align='right' valign='top'>
											<img src='$tempatpng' height='40px'/>
										</td>
									</tr>
								</table>
								<hr/>
								<table border='0' width='100%' align='center'>
									<tr>
										<td width='100px' valign='top' align='center' rowspan='5'>

											";
									if($siswa['foto']<>''){
										if(!file_exists("../foto/fotosiswa/$siswa[foto]")){
										echo "<img src='$homeurl/dist/img/avatar_default.png' class='img'  style='max-width:60px' alt='+'>";
										}else{
											echo "<img src='$homeurl/foto/fotosiswa/$siswa[foto]' class='img'  style='max-width:60px' >";
										}
									}else{
										echo "<img src='$homeurl/dist/img/avatar_default.png' class='img'  style='max-width:60px' alt='+'>";
									}
									
									
						echo"		
									<tr>
										<td valign='top'>No Peserta</td>
										<td valign='top'>: $siswa[no_peserta]</td>
									</tr>
									<tr>
										<td valign='top'>Nama</td>
										<td valign='top'>: $siswa[nama]</td>
									</tr>
									<tr>
										<td valign='top'>Kelas / Sesi Ujian</td>
										<td valign='top'>: $kelas[nama] / Sesi $siswa[sesi]</td>
									</tr>
									<tr>
										<td valign='top'>Ruang</td>
										<td valign='top'>: $siswa[ruang]</td>
									</tr>
									<tr><td width='100px' valign='top' align='center' rowspan='3'>
									<img src='$tempatip' height='50px'/></td>
										<td valign='top'>Username</td>
										<td valign='top'>: $siswa[username]</td>
									</tr>
									<tr>
										<td valign='top'>Password</td>
										<td valign='top'>: $siswa[password]</td>
									</tr>
									<tr>
										<td valign='top'></td>
										<td valign='top' align='center'>
										Kepala Sekolah<br><br><br>
										<b>$setting[kepsek]</b><br>
										<b>NIP. $setting[nip]</b>
										
										</td>
									</tr>
													
			<tr>
										<td colspan='3' valign='top'>
										<!-- buat tambah jadwal pelajaran
										<table border='1' width='100%'>
										<thead>
										<th>tanggal</th>
										<th>Mata Pelajaran</th>
										<th>Sesi</th>
										<th>Mulai Ujian</th>
										</thead>
										<tbody>";
										$sesi=$siswa['sesi'];
										$idpk=$siswa['idpk'];
										$level=$siswa['level'];
										$jadwalx=mysqli_query($koneksi, "select * from ujian where id_pk=$idpk and sesi='$sesi' and level='$level'");
										$cekjadwal=mysqli_num_rows($jadwalx);
										if($cekjadwal > 0){
										while($jadwal=mysqli_fetch_array($jadwalx)){
										echo "
										<tr>
										<td align='center'>$jadwal[tgl_ujian]</td>
										<td>$jadwal[nama]</td>
										<td align='center'>$jadwal[sesi]</td>
										<td align='center'>".substr($jadwal['waktu_ujian'],0,5)."</td>
										</tr>
											";
										}
										}else{
											echo "
										<tr>
										<td colspan='4'>Tidak ada jadwal ujian</td>
										
										</tr>
											";
										}
										
										echo "</tbody>
										</table>
										-->
										</td>
										
									</tr>										
								</table>
							</div>";
							if(($no%10)==0) { echo "<div style='page-break-before:always;'></div>"; }
							
							echo "
						</td>
					";
					if(($no%2)==0) { echo "</tr><tr>"; } 
					
				}
				echo "
			</tr>
		</table>
	";
?>