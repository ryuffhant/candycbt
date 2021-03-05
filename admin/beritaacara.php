
<?php
	require("../config/config.default.php");
	require("../config/config.function.php");
	require("../config/functions.crud.php");
	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
	($id_pengawas==0) ? header('location:index.php'):null;
	echo "<link rel='stylesheet' href='../dist/css/bootstrap.min.css'/>";
	
						$idujian = @$_GET['id'];
						$sqlx=mysql_query("select * from ujian where id_ujian='$idujian'");
						$ujian=mysql_fetch_array($sqlx);
						$hari=buat_tanggal('D',$ujian['tgl_ujian']);
						$tanggal=buat_tanggal('d',$ujian['tgl_ujian']);	
						$bulan=buat_tanggal('m',$ujian['tgl_ujian']);
						$tahun=buat_tanggal('Y',$ujian['tgl_ujian']);
						if(date('m')>=7 AND date('m')<=12) {
							$ajaran = date('Y')."/".(date('Y')+1);
						}
						elseif(date('m')>=1 AND date('m')<=6) {
							$ajaran = (date('Y')-1)."/".date('Y');
						}
						echo "
					
						<div style='background:#fff; width:95%; margin:0 auto; height:90%;'>
						<table border='0' width='100%'>
						<tr>
						<td rowspan='4' width='150' align='center'><img src='$homeurl/foto/tut.jpg' width='80'></td>
						<td colspan='2'  align='center'><font size='+1'><b>BERITA ACARA PELAKSANAAN</b></font></td>
						<td rowspan='7' width='150' align='center'><img src='$homeurl/$setting[logo]' width='65'></td>
						</tr>
						 <tr>
						<td colspan='2' align='center'><font size='+1'><b>UJIAN BERBASIS KOMPUTER (UBK)</b></font></td>
						</tr>
						<tr>
						<td colspan='2' align='center'><font size='+1'><b>TAHUN PELAJARAN $ajaran</b></font></td>
						</tr>  
						</table>
						<br>
						<table border='0' width='95%' align='center' >
						<tr height='30'>
						<td height='30' colspan='4' style='text-align: justify;'>Pada hari ini <b> $hari </b>  tanggal <b>$tanggal</b> bulan <b>$bulan</b> tahun <b>$tahun</b>
						, di $setting[sekolah] telah diselenggarakan Ujian Sekolah Berbasis Komputer (USBK) untuk Mata Pelajaran <b>$ujian[nama]</b> dari pukul ".substr($ujian['waktu_ujian'],0,5)." sampai dengan pukul ".substr($ujian['selesai_ujian'],0,5)."</td>
						</tr>
						</table>
						<table border='0' width='95%' align='center'>
						<tr height='30'>
						<td height='30' width='5%'>1.</td>
						<td height='30' width='30%'>Kode Sekolah</td>
						<td height='30' width='60%' style='border-bottom:thin solid #000000'></td>
						</tr>
						<tr height='30'>
						<td height='30' width='10px'></td>
						<td height='30'>Sekolah/Madrasah</td>
						<td height='30' width='60%' style='border-bottom:thin solid #000000'>$setting[sekolah]</td>  
						</tr>
						<tr height='30'>
						<td height='30' width='5%'>.</td>
						<td height='30' width='30%'>Sesi</td>
						<td height='30' width='60%' style='border-bottom:thin solid #000000'>$ujian[sesi]</td>
						</tr>
						<tr height='30'>
						<td height='30' width='5%'>.</td>
						<td height='30' width='30%'>Ruang</td>
						<td height='30' width='60%' style='border-bottom:thin solid #000000'></td>
						</tr>
						<tr height='30'>
						<td height='30' width='10px'></td>
						<td height='30'>Jumlah Peserta Seharusnya</td>
						<td height='30' width='60%' style='border-bottom:thin solid #000000'></td>  
						</tr>
						<tr height='30'>
						<td height='30' width='5%'></td>
						<td height='30' width='30%'>Jumlah Hadir (Ikut Ujian)</td>
						<td height='30' width='60%' style='border-bottom:thin solid #000000'></td>
						</tr>
						<tr height='30'>
						<td height='30' width='10px'></td>
						<td height='30'>Jumlah Tidak Hadir</td>
						<td height='30' width='60%' style='border-bottom:thin solid #000000'></td>  
						</tr>
						<tr height='30'>
						<td height='30' width='10px'></td>
						<td height='30'>Nomer Peserta</td>
						<td height='30' width='60%' style='border-bottom:thin solid #000000'></td>  
						</tr>
						<tr height='30'>
						<td height='30' width='10px'></td></tr>    
						<tr height='30'>
						<td height='30' width='5%'>2.</td>
						<td colspan='2' height='30' width='30%'>Catatan selama Ujian Berbasis Komputer (UBK) </td>
						</tr>
						<tr height='120px'>
						<td height='30' width='5%'></td>
						<td colspan='2' style='border:solid 1px black'>$ujian[catatan]</td></tr>
   
						<tr height='30'>
						<td height='30' colspan='2' width='5%'>Yang membuat berita acara : </td></tr>
						</table>
						<table border='0' width='80%' style='margin-left:50px'>  
						<tr><td colspan='4' ></td>
						<td height='30' width='30%'>TTD</td>
						<tr><td width='10%'>1. </td><td width='20%'>Proktor</td><td width='30%' style='border-bottom:thin solid #000000'></td>
						<td height='30' width='5%'></td><td height='30' width='35%'></td>
						</tr>
						<tr><td width='10%'>   </td><td width='20%'>NIP. </td><td width='30%' style='border-bottom:thin solid #000000'></td>
						<td height='30' width='5%'></td><td height='30' width='35%' style='border-bottom:thin solid #000000'>  1. </td>
						</tr>
						<tr><td colspan='4' ></td>
						
						<tr><td width='10%'>2. </td><td width='20%'>Pengawas</td><td width='30%' style='border-bottom:thin solid #000000'>$ujian[pengawas]</td>
						<td height='30' width='5%'></td><td height='30' width='35%'></td>
						</tr>
						<tr><td width='10%'>   </td><td width='20%'>NIP. </td><td width='30%' style='border-bottom:thin solid #000000'>$ujian[nip_pengawas]</td>
						<td height='30' width='5%'></td><td height='30' width='35%' style='border-bottom:thin solid #000000'>  2. </td>
						</tr>
						<tr><td colspan='4' ></td>
						
						<tr><td width='10%'>3. </td><td width='20%'>Kepala Sekolah</td><td width='30%' style='border-bottom:thin solid #000000'>$setting[kepsek]</td>
						<td height='30' width='5%'></td><td height='30' width='35%'></td>
						</tr>
						<tr><td width='10%'>   </td><td width='20%'>NIP. </td><td width='30%' style='border-bottom:thin solid #000000'>$setting[nip]</td>
						<td height='30' width='5%'></td><td height='30' width='35%' style='border-bottom:thin solid #000000'>  3. </td>
						</tr>
						</table><br><br><br><br><br>
						
						<table width='100%' height='30'>
						<tbody><tr>
						<td width='25px' style='border:1px solid black'></td>
						<td width='5px'>&nbsp;</td>
						<td style='border:1px solid black;font-weight:bold;font-size:14px;text-align:center;'>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</td>
						<td width='5px'>&nbsp;</td>
						<td width='25px' style='border:1px solid black'></td>
						</tr>
						</tbody>
						</table>
						
						</div>
						
						
						";
?>