
<?php
	require("../config/config.default.php");
	require("../config/config.function.php");
	require("../config/functions.crud.php");
	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
	($id_pengawas==0) ? header('location:index.php'):null;
	echo "<link rel='stylesheet' href='../dist/bootstrap/css/bootstrap.min.css'/>";
	$BatasAwal = 50;
	$sesi = @$_GET['id_sesi'];
	$mapel =@$_GET['id_mapel'];
	$ruang =@$_GET['id_ruang'];
	$kelas =@$_GET['id_kelas'];
	$querytanggal=mysql_query("SELECT * FROM ujian WHERE id_mapel='$mapel'");
	$cektanggal=mysql_fetch_array($querytanggal);
	$mapelx=mysql_fetch_array(mysql_query("select * from mapel where id_mapel='$mapel'"));					
	$namamapel=	mysql_fetch_array(mysql_query("select * from mata_pelajaran where kode_mapel='$mapelx[nama]'"));					
	if(date('m')>=7 AND date('m')<=12) {
		$ajaran = date('Y')."/".(date('Y')+1);
	}
	elseif(date('m')>=1 AND date('m')<=6) {
		$ajaran = (date('Y')-1)."/".date('Y');
	}
	$query=mysql_query("SELECT * FROM siswa ");
	
	$querysetting=mysql_query("SELECT * FROM setting WHERE id_setting='1'");
	$setting=mysql_fetch_array($querysetting);
	$jumlahData = mysql_num_rows($query);
	$jumlahn = $jumlahData;
	$n = ceil($jumlahData/$jumlahn);
	$nomer = 1;
	$date=date_create($cektanggal['tgl_ujian']);
	
	echo'
	<table border="0" width="100%">
    <tr>
	<td  width="70" align="left"><img src="../'.$setting['logo'].'"  height=80></td>
    <td>
	<b><center><font size="+1">DAFTAR HADIR PESERTA </font>
    <br><font size="+1">UJIAN SEKOLAH BERBASIS KOMPUTER</font>
    <br><font size="+1"><b>TAHUN PELAJARAN : '. $ajaran.'</b></font>
	</b>
	</center>
	</td> 
	<td  width="70" align="left">&nbsp;</td>
    </table>
	<hr>
	
	<table border="0" width="100%" style="margin-left:0px">
	<tr height="30">
	<td height="30" width="20%">-Mata Pelajaran</td>
	<td height="30" width="2%">:</td>
	<td height="30" width="45%" >'.$namamapel['nama_mapel'].'</td>
	
  
	<td height="30" width="15%" style="margin-left:10px"> Sesi</td>
    <td height="30" width="2%"> : </td>
	<td height="30" width="15%">'.$sesi.'</td>
	</tr>
	<tr height="30">
	<td height="30" width="20%">-Hari/Tanggal</td>
	<td height="30" width="2%">:</td>
	<td height="30" width="45%" >'.buat_tanggal('D, d M Y',$cektanggal['tgl_ujian']).'</td>
	
	<td height="30" width="20%" style="margin-left:10px"> Waktu Ujian </td>
    <td height="30" width="1%">:</td>
	<td height="30" width="20%" >'.buat_tanggal('H:i',$cektanggal['tgl_ujian']).'</td>
	</tr>
	</table>
	
	
	
	';
	for($i=1;$i<=$n;$i++){
	echo '
	  <table class="table table-bordered" width="100%">
	<tr height="40">
	<th width="5%" style="text-align: center;">No.</th>
	<th width="13%" style="text-align: center;">No. Ujian</th>
	<th width="30%" style="text-align: center;">Nama Siswa</th>
	<th width="24%"style="text-align: center;">Tanda Tangan</th>
	<th colspan="2" width="7%" style="text-align: center;">Ket</th>
	</tr>';
	$mulai = $i-1;
	$batas = ($mulai*$jumlahn);
	$startawal = $batas;
	$batasakhir = $batas+$jumlahn;
	if(!$sesi=='' and !$ruang=='' and !$kelas==''){
	$ckck=mysql_query("SELECT * FROM siswa WHERE sesi='$sesi' and ruang='$ruang' and id_kelas='$kelas' limit $batas,$jumlahn");
	}elseif($sesi=='' and !$ruang=='' and !$kelas==''){
	$ckck=mysql_query("SELECT * FROM siswa WHERE  ruang='$ruang' and id_kelas='$kelas' limit $batas,$jumlahn");	
	}elseif($sesi=='' and $ruang=='' and !$kelas==''){
	$ckck=mysql_query("SELECT * FROM siswa WHERE  id_kelas='$kelas' limit $batas,$jumlahn");	
	}elseif(!$sesi=='' and $ruang=='' and $kelas==''){
	$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' limit $batas,$jumlahn");	
	}elseif(!$sesi=='' and !$ruang=='' and $kelas==''){
	$ckck=mysql_query("SELECT * FROM siswa WHERE  sesi='$sesi' and ruang='$ruang' limit $batas,$jumlahn");	
	}elseif($sesi=='' and !$ruang=='' and $kelas==''){
	$ckck=mysql_query("SELECT * FROM siswa WHERE   ruang='$ruang' limit $batas,$jumlahn");	
	}else{
	$ckck=mysql_query("SELECT * FROM siswa  limit $batas,$jumlahn");	
	}
	$s = $i-1;
	while($f= mysql_fetch_array($ckck)){
	if ($nomer % 2 == 0) {
	  echo "
	  <tr height=30px>
	  <td align='center'>&nbsp;$nomer.</td>
	  <td align='center'>$f[nis]</td>
	  <td>&nbsp;$f[nama]</td>
	  <td align='center'>&nbsp;$nomer.</td>
	  <td align='center'>&nbsp;</td>
	  </tr>";
	  } else {
	  echo "<tr height=30px>
	  <td align='center'>&nbsp;$nomer.</td>
	  <td align='center'>$f[nis]</td></center>
	  <td>&nbsp;$f[nama]</td>
	  <td align='left'>&nbsp;$nomer.</td>
	  <td align='center'>&nbsp;</td>
	  </tr>";
	  }
	  $nomer++;
	  
	}	
	echo '
	</table>
	';
	}
	echo '
	<br>
	1. Daftar hadir di buat rangkap 2 (dua).<br>
	2. Pengawas ruang menyilang Nama Peserta yang tidak hadir.
	<br>
	<br>
    
	
	<table  style="width:100%;" >
	<td width="30%" style="padding:8px; text-align: left;font-size: small; border-top:thin solid #000000;border-left: thin solid #000000;">&nbsp; Jumlah Peserta yang Seharusnya Hadir</td>
	<td width="2%" style="text-align: left;font-size: small; border-top:thin solid #000000"> : </td>
	<td width="10%" style="text-align: left;font-size: small; border-top:thin solid #000000; border-right: thin solid #000000;"> ______ orang</td>
	<td width="15%" style="font-size: small;text-align: center;"> Pengawas</td>
	<td width="15%" style="font-size: small;text-align: center;">Proktor</td>
	
	</tr>
	<td width="30%" style="padding:8px; text-align: left;font-size: small;border-bottom:thin solid #000000;border-left: thin solid #000000;">&nbsp; Jumlah Peserta yang Tidak Hadir</td>
	<td width="2%" style="text-align: left;font-size: small;border-bottom:thin solid #000000"> : </td>
	<td width="10%" style="text-align: left;font-size: small;border-bottom:thin solid #000000; border-right: thin solid #000000;"> ______ orang</td>
	</tr>
    <td width="30%" style="padding:8px; text-align: left;font-size: small;border-bottom:thin solid #000000;border-left: thin solid #000000;">&nbsp; Jumlah Peserta yang Hadir</td>
	<td width="2%" style="text-align: left;font-size: small;border-bottom:thin solid #000000"> : </td>
	<td width="10%" style="text-align: left;font-size: small;border-bottom:thin solid #000000; border-right: thin solid #000000;"> ______ orang</td>
	<td width="15%" style="font-size: small;text-align: center;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
	<td width="15%" style="font-size: small;text-align: center;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td></tr>
    
	</table>
	
	
	
	 
	
	';
?>