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
		Mata Pelajaran: $mapel[nama]<br/>
		Tanggal Ujian: ".buat_tanggal('D, d M Y - H:i',$mapel['tgl_ujian'])."<br/>
		Jumlah Soal: $mapel[jml_soal]<br/>
		
		Kelas: $kelas[nama]<br/>
		<table border='1'>
			<tr>
				<td rowspan='2'>No.</td>
				<td rowspan='2' width='500px'>NIS</td>
				<td rowspan='2'>No. Peserta</td>
				<td rowspan='2'>Nama</td>
				
				<td rowspan='2'>Lama Ujian</td>
				<td colspan='".($mapel['jml_soal']+4)."'>Jawaban</td>
				<td rowspan='2'>Nilai / Skor</td>
			</tr>
			<tr>";
				for($num=1;$num<=$mapel['jml_soal'];$num++) {
					$soal = fetch('soal',array('id_mapel'=>$id_mapel,'nomor'=>$num));
					echo "<td>$num. $soal[jawaban] </td>";
				}
				echo "
				<td>Benar</td>
				<td>Salah</td>
				<td>Nilai PG</td>
				<td>Nilai Essai</td>
			</tr>";
			$siswa = select('siswa',array('id_kelas'=>$id_kelas));
			foreach($siswa as $siswa) {
				$no++;
				$benar = $salah = 0;
				$skor = $lama = '-';
				$nilai = fetch('nilai',array('id_mapel'=>$id_mapel,'id_siswa'=>$siswa['id_siswa']));
				if($nilai['ujian_mulai']<>'' AND $nilai['ujian_selesai']<>'') {
					$selisih = strtotime($nilai['ujian_selesai'])-strtotime($nilai['ujian_mulai']);
					$jam = round((($selisih%604800)%86400)/3600);
					$mnt = round((($selisih%604800)%3600)/60);
					$dtk = round((($selisih%604800)%60));
					$lama = '';
					($jam<>0) ? $lama .= "$jam jam ":null;
					($mnt<>0) ? $lama .= "$mnt menit ":null;
					($dtk<>0) ? $lama .= "$dtk detik ":null;
				}
				echo "
					<tr>
						<td>$no</td>
						<td>$siswa[nis]</td>
						<td>$siswa[no_peserta]</td>
						<td>$siswa[nama]</td>
						
						<td>$lama</td>";
						for($num=1;$num<=$mapel['jml_soal'];$num++) {
							$soal = fetch('soal',array('id_mapel'=>$id_mapel,'nomor'=>$num));
							$jawaban = fetch('hasil_jawaban',array('id_siswa'=>$siswa['id_siswa'],'id_mapel'=>$id_mapel,'id_soal'=>$soal['id_soal']));
							if($jawaban) {
								if($jawaban['jawaban']==$soal['jawaban']) {
									echo "<td style='background:#00FF00;'>$jawaban[jawaban]</td>";
								} else {
									echo "<td style='background:#FF0000;'>$jawaban[jawaban]</td>";
								}
							} else {
								echo "<td>-</td>";
							}
						}
						echo "
						<td>$nilai[jml_benar]</td>
						<td>$nilai[jml_salah]</td>
						<td class='str'>$nilai[skor]</td>
						<td class='str'>$nilai[nilai_esai]</td>
						<td class='str'>$nilai[total]</td>
					</tr>
				";
			}
			echo "
		</table>
	";
?>