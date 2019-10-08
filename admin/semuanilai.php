<?php
if ($ac == '') {
	echo "
									<div class='row'>
										<div class='col-md-12'>
										<div class='box box-solid'>
											<div class='box-header with-border'>
														<h3 class='box-title'><img src='../dist/img/svg/survey.svg' width='28'> DATA UJIAN AKTIF</h3>
														<div class='box-tools pull-right btn-group'>
															
														</div>
											</div><!-- /.box-header -->
											<div class='box-body'>$info";
	$jq = mysql_query("SELECT * FROM kelas");
	while ($jenis = mysql_fetch_array($jq)) {
		echo "
												<div class='col-md-3'>
												  <!-- Widget: user widget style 1 -->
												  <div class='box box-widget widget-user-2'>
													<!-- Add the bg color to the header using any of the bg-* classes -->
													<div class='widget-user-header bg-teal'>
													  <div class='widget-user-image'>
														<img class='img-circle' src='../dist/img/svg/survey.svg' alt='User Avatar'>
													  </div>
													  <!-- /.widget-user-image -->
													  <h3 class='widget-user-username'>$jenis[id_kelas]</h3>
													  <h5 class='widget-user-desc'>$jenis[nama]</h5>
													</div>
													<div class='box-footer'>
													<a href='?pg=$pg&ac=lihat&idk=$jenis[id_kelas]'> <button class='btn btn-flat btn-block bg-purple'>Lihat Nilai</button></a>
													</div>
												  </div>
												  <!-- /.widget-user -->
												</div>			
												";
	}
	echo "
											</div>
										</div>
										
									</div>
								";
} // lihat nilai
elseif ($ac == 'lihat') {

	$id_kelas = $_GET['idk'];
	$mapel = mysql_fetch_array(mysql_query("SELECT * FROM mapel WHERE id_mapel='$id_mapel'"));
	echo "
									<div class='row'>
										<div class='col-md-12'>
											<div class='box box-solid'>
												<div class='box-header with-border bg-blue'>
													<h3 class='box-title'><img src='../dist/img/svg/ratings.svg' width='25'> NILAI $mapel[nama] $id_kelas</h3>
													<div class='box-tools pull-right btn-group'>
														
														<a class='btn btn-sm btn-primary' href='report_excel_all.php?m=$id_mapel&k=$id_kelas&i=$kode_ujian'><i class='fa fa-file-excel-o'></i> Excel</a>
														<a class='btn btn-sm btn-primary' href='?pg=nilai'><i class='fa fa-times'></i> Keluar</a>
													</div>
												</div><!-- /.box-header -->
												<div class='box-body'>
												<div class='table-responsive'>
													<table id='example' class='table table-bordered table-striped'>
														<thead>
															<tr>
																<th rowspan='3' width='5px'>#</th>
																<th style='text-align:center' rowspan='3'>No Peserta</th>
																<th style='text-align:center' rowspan='3'>Nama Peserta</th>
																<th style='text-align:center' rowspan='3'>Kelas</th>";
	$mapelQ = mysql_query("SELECT * FROM mapel a inner join nilai b ON a.id_mapel=b.id_mapel group by b.id_ujian ");
	while ($mapel = mysql_fetch_array($mapelQ)) {
		echo "
																<th style='text-align:center' colspan='3'>$mapel[nama]</th>
																";
	}
	echo "
															</tr>
															";
	$kode = mysql_query("SELECT * FROM mapel a inner join nilai b ON a.id_mapel=b.id_mapel group by b.id_ujian");
	while ($mapel = mysql_fetch_array($kode)) {
		echo "
																<th style='text-align:center' colspan='3'>$mapel[kode_ujian]</th>";
	}
	echo "
															</tr>
															<tr>";
	$mapelQ = mysql_query("SELECT * FROM mapel a inner join nilai b ON a.id_mapel=b.id_mapel group by b.id_ujian ");
	while ($mapel = mysql_fetch_array($mapelQ)) {
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
	while ($siswa = mysql_fetch_array($siswaQ)) {
		$no++;
		$ket = '';
		$esai = $lama = $jawaban = $skor = $total = '--';



		echo "
																<tr>
																	<td>$no</td>
																	<td align='center'>$siswa[no_peserta]</td>
																	<td>$siswa[nama]</td>
																	<td align='center'>$siswa[id_kelas]</td>";
		$mapelQ = mysql_query("SELECT * FROM mapel a inner join nilai b ON a.id_mapel=b.id_mapel group by b.id_ujian ");
		while ($mapel = mysql_fetch_array($mapelQ)) {
			$nilaiQ = mysql_query("SELECT * FROM nilai WHERE id_ujian='$mapel[id_ujian]' AND id_siswa='$siswa[id_siswa]' and kode_ujian='$mapel[kode_ujian]'");
			$nilaiC = mysql_num_rows($nilaiQ);
			$nilai = mysql_fetch_array($nilaiQ);
			echo "
																	<td align='center'>$nilai[jml_benar]</td>
																	<td align='center'>$nilai[jml_salah]</td>
																	<td align='center'>$nilai[skor]</td>";
		}
		echo "
																</tr>
															";
	}
	echo "
														</tbody>
													</table>
													
													</div>
												</div><!-- /.box-body -->
											</div><!-- /.box -->
										</div>
									</div>
								";
} //input esai
