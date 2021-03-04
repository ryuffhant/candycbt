<?php
defined('APLIKASI') or exit('Anda tidak dizinkan mengakses langsung script ini!');
?>
<?php if ($ac == '') : ?>
	<?php
	$id_mapel = $_GET['id'];
	$mapel = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM ujian WHERE id_ujian='$id_mapel'"));
	$kelas = unserialize($mapel['kelas']);

	$kelas = implode("','", $kelas);
	$sqlkelas = "";
	if (!$kelas == 'semua') {
		$sqlkelas = " and a.id_kelas in ('" . $kelas . "')";
	}
	
	$level =$mapel['level'];
	$sqllevel = "";
	if (!$level == 'semua') {
		$sqlkelas = "where a.level='" . $level . "'";
	}
	?>
	<div class='row'>
		<div class='col-md-12'>
			<div class='box box-solid'>
				<div class='box-header with-border'>
					<h3 class='box-title'> NILAI <?= $mapel['nama'] ?></h3>
					<div class='box-tools pull-right btn-grou'>
						<!-- <button class='btn btn-sm btn-primary' onclick="frames['frameresult'].print()"><i class='fa fa-print'></i> Print</button> -->
						<a class='btn btn-sm btn-success' href='report_excel.php?m=<?= $id_mapel ?>'><i class='fa fa-download'></i> Download Excel</a>
						<a class='btn btn-sm btn-danger' href='?pg=jadwal'><i class='fa fa-times'></i></a>
					</div>
				</div><!-- /.box-header -->
				<div class='box-body'>
					<div class='table-responsive'>
						<table id="tablenilai" class='table table-bordered table-striped'>
							<thead>
								<tr>
									<th width='5px'>#</th>
									<th>No Peserta</th>
									<th>Nama</th>
									<th>Kelas</th>
									<th>Lama Ujian</th>
									<th>Analisis</th>
									<th>Nilai PG</th>
									<th>Essai</th>
									<th>Total</th>
									<th>Jawaban</th>
								</tr>
							</thead>
							<tbody>
								<?php $siswaQ = mysqli_query($koneksi, "SELECT * FROM siswa a join nilai b on a.id_siswa=b.id_siswa ".$sqllevel . $sqlkelas); ?>
								<?php while ($siswa = mysqli_fetch_array($siswaQ)) : ?>
									<?php
									$no++;
									$ket = '';
									$esai =  $jawaban = $skor = $total = '--';
									$selisih = 0;
									//$kelas = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'"));
									$nilaiQ = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_ujian='$id_mapel' AND id_siswa='$siswa[id_siswa]'");
									$nilaiC = mysqli_num_rows($nilaiQ);
									$nilai = mysqli_fetch_array($nilaiQ);
									if ($nilaiC <> 0) :
										$selisih = '';
										if ($nilai['ujian_mulai'] <> '' and $nilai['ujian_selesai'] <> '') :
											$selisih = strtotime($nilai['ujian_selesai']) - strtotime($nilai['ujian_mulai']);

											$esai = "$nilai[nilai_esai]";
											$jawaban = "<small class='label bg-green'>$nilai[jml_benar] <i class='fa fa-check'></i></small>  <small class='label bg-red'>$nilai[jml_salah] <i class='fa fa-times'></i></small>";
											$skor = number_format($nilai['skor'], 2, '.', '');
											$total = "<small class='label bg-blue'>" . number_format($nilai['total'], 2, '.', '') . "</small>";
											$ket = "";
										elseif ($nilai['ujian_mulai'] <> '' and $nilai['ujian_selesai'] == '') :
											$selisih = strtotime($nilai['ujian_berlangsung']) - strtotime($nilai['ujian_mulai']);

											$ket = "<i class='fa fa-spin fa-spinner' title='Sedang ujian'></i>";
											$skor = $total = '--';
										endif;
									endif;
									?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $siswa['no_peserta'] ?></td>
										<td><?= $siswa['nama'] ?></td>
										<td><?= $siswa['id_kelas'] ?></td>
										<td><?= $ket . " " . lamaujian($selisih) ?></td>
										<td><?= $jawaban ?></td>
										<td><?= $skor ?></td>
										<td><?= $esai ?></td>
										<td><?= $total ?></td>
										<td>
											<?php if ($nilai['skor'] <> "") : ?>
												<?php

												if ($nilai['jawaban'] <> "") :
													$ket = '';
													$link = "?pg=" . $pg . "&ac=esai&id=" . $_GET['id'] . "&ids=" . $siswa['id_siswa'];
													$link2 = "?pg=" . $pg . "&ac=jawaban&id=" . $_GET['id'] .  "&ids=" . $siswa['id_siswa'];
												else :
													$ket = 'style="display:none"';
													$link = '#';
													$link2 = '#';
												endif;
												?>
												<!-- <a href='<?= $link ?>' class='btn btn-xs btn-success' <?= $ket ?>><i class='fa fa-pencil-square-o'></i>input esai</a> -->
												<a href='<?= $link2 ?>' class='btn btn-sm btn-success' <?= $ket ?>><i class='fa fa-eye'></i> lihat</a>
												<button class='ulangnilai btn btn-sm btn-danger' data-id="<?= $nilai['id_nilai'] ?>" <?= $ket ?>><i class='fa fa-recycle'></i> Ulang</button>
												<!-- Button trigger modal -->
												<?php if ($nilai['jawaban_esai'] <> null) { ?>
													<button type="button" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modelId<?= $nilai['id_nilai'] ?>">
														<i class="fas fa-edit    "></i> Esai
													</button>

													<!-- Modal -->
													<div class="modal fade" id="modelId<?= $nilai['id_nilai'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title">JAWABAN ESAI</h5>

																</div>
																<div class="modal-body">

																	<table class='table table-bordered table-striped'>

																		<tbody>
																			<?php $noX = 0;
																			$jawabanesai = unserialize($nilai['jawaban_esai']); ?>

																			<?php foreach ($jawabanesai as $key2 => $value2) : ?>
																				<?php
																				$noX++;
																				$soal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$key2'"));

																				?>
																				<tr>
																					<td><?= $noX ?></td>
																					<td><?= $soal['soal'] ?>
																						<p><b>JAWAB :</b> <?= $value2 ?></p>
																					</td>
																				</tr>
																			<?php endforeach; ?>
																		</tbody>
																	</table>
																	<div class="form-group">
																		<label for="skoresai<?= $nilai['id_nilai'] ?>">Input Skor Esai</label>
																		<input type="text" class="form-control" name="skoresai<?= $nilai['id_nilai'] ?>" id="skoresai<?= $nilai['id_nilai'] ?>" value="<?= $nilai['nilai_esai'] ?>" placeholder="Input Skor Esai">

																	</div>

																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<button type="button" id="simpanesai<?= $nilai['id_nilai'] ?>" class="btn btn-primary">Save</button>
																</div>
															</div>
														</div>
													</div>
													<script>
														$("#simpanesai<?= $nilai['id_nilai'] ?>").click(function(e) {
															e.preventDefault();
															var id = '<?= $nilai['id_nilai'] ?>';
															$.ajax({
																type: "POST",
																url: "simpanesai.php",
																data: {
																	id: id,
																	skoresai: $("#skoresai<?= $nilai['id_nilai'] ?>").val()
																},
																success: function(result) {
																	toastr.success("Berhasil dinilai");
																}
															});
														});
													</script>
												<?php } ?>
											<?php endif; ?>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
						<iframe name='frameresult' src='report.php?m=<?= $id_mapel ?>&i=<?= $kode_ujian ?>&k=<?= $id_kelas ?>' style='border:none;width:1px;height:1px;'></iframe>
					</div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
<?php elseif ($ac == 'esai') :
	$id_mapel = $_GET['idm'];
	$id_kelas = $_GET['idk'];
	$id_siswa = $_GET['ids'];
	$kode_ujian = $_GET['idu'];
	$nilai = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_mapel='$id_mapel' AND id_siswa='$id_siswa' AND kode_ujian='$kode_ujian'"));
	if (isset($_POST['simpanesai'])) :
		$jml_data = count($_POST['idsoal']);
		$id_soal = $_POST['idsoal'];
		$nilaiesai = $_POST['nilaiesai'];
		$nilai = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_mapel='$id_mapel' AND id_siswa='$id_siswa' AND kode_ujian='$kode_ujian'"));
		for ($i = 1; $i <= $jml_data; $i++) :
			$exec = mysqli_query($koneksi, "UPDATE hasil_jawaban SET nilai_esai='" . $nilaiesai[$i] . "' WHERE id_soal='" . $id_soal[$i] . "' AND jenis='2' and id_mapel='$id_mapel' AND id_ujian='$nilai[id_ujian]' AND id_siswa='$id_siswa'");
			(!$exec) ? $info = info("Gagal menyimpan!", "NO") : jump("?pg=nilai&ac=esai&idu=$kode_ujian&idm=$id_mapel&idk=$id_kelas&ids=$id_siswa");
		endfor;
		$sqljumlah = mysqli_query($koneksi, "SELECT sum(nilai_esai) AS hasil FROM hasil_jawaban WHERE id_mapel='$id_mapel' AND id_siswa='$id_siswa' AND jenis='2'");
		$jumlah = mysqli_fetch_array($sqljumlah);
		$bobot = mysqli_fetch_array(mysqli_query($koneksi, "select * from mapel where id_mapel='$id_mapel'"));
		$nilai_esai1 = $jumlah['hasil'] * $bobot['bobot_esai'] / 100;
		$nilai_esai = number_format($nilai_esai1, 2, '.', '');
		$nilai_pg = number_format($nilai['skor'], 2, '.', '');
		$total = $nilai_esai + $nilai_pg;
		mysqli_query($koneksi, "UPDATE nilai SET nilai_esai='$nilai_esai',total='$total' WHERE id_mapel='$id_mapel' and id_siswa='$id_siswa' and id_ujian='$nilai[id_ujian]'");
	endif;
	$mapel = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'"));
?>
	<div class='row'>
		<div class='col-md-12'>
			<form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
				<div class='box box-primary'>
					<div class='box-header with-border'>
						<h3 class='box-title'>Nilai Essai <?= $mapel['nama'] ?></h3>
						<div class='box-tools pull-right btn-group'>
							<!--<button class='btn btn-sm btn-default' onclick=frames['frameresult'].print()><i class='fa fa-print'></i> Print</button>-->
							<!--<a class='btn btn-sm btn-success' href='report_excel.php?m=$id_mapel&k=$id_kelas'><i class='fa fa-download'></i> Excel</a>-->
							<button class='btn btn-sm btn-primary' name='simpanesai'><i class='fa fa-check'></i> Simpan</button>
							<a class='btn btn-sm btn-danger' href='?pg=nilai&ac=lihat&idu=<?= $kode_ujian ?>&idm=<?= $id_mapel ?>&idk=<?= $id_kelas ?>'><i class='fa fa-times'></i></a>
						</div>
					</div><!-- /.box-header -->
					<div class='box-body'>
						<div class='table-responsive'>
							<table class='table table-bordered table-striped'>
								<thead>
									<tr>
										<th width='5px'>#</th>
										<th>Soal & Jawaban</th>
										<th width='100px'>Input Nilai</th>
									</tr>
								</thead>
								<tbody>
									<?php $jawabanQ = mysqli_query($koneksi, "SELECT * FROM hasil_jawaban WHERE id_mapel='$id_mapel' and id_siswa='$id_siswa' and jenis='2' and id_ujian='$nilai[id_ujian]' "); ?>
									<?php while ($jawaban = mysqli_fetch_array($jawabanQ)) : ?>
										<?php
										$no++;
										$soal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$jawaban[id_soal]' and jenis='2' and id_mapel='$id_mapel' "));
										if ($soal['file'] == '') {
											$gambar = '';
										} else {
											$gambar = "<img src='$homeurl/$soal[file]' class='img-responsive' style='max-width:300px;'/><p>";
										}
										if ($soal['file1'] == '') {
											$gambar2 = '';
										} else {
											$gambar2 = "<img src='$homeurl/$soal[file1]' class='img-responsive' style='max-width:300px;'/><p>";
										}
										?>
										<tr><input type='hidden' value='<?= $jawaban['id_soal'] ?>' name='idsoal[<?= $no ?>]'>
											<td><?= $no ?></td>
											<td><?= $gambar ?> <?= $gambar2 ?> <?= $soal['soal'] ?><p><b>Jawaban :</b> <?= $jawaban['esai'] ?></td>
											<td><input type='text' class='form-control' value="<?= $jawaban['nilai_esai'] ?>" name='nilaiesai[<?= $no ?>]'></td>
										</tr>
									<?php endwhile; ?>
								</tbody>
							</table>
							<iframe name='frameresult' src='report.php?m=<?= $id_mapel ?>&k=<?= $id_kelas ?>' style='border:none;width:1px;height:1px;'></iframe>
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</form>
		</div>
	</div>
<?php elseif ($ac == 'jawaban') : ?>
	<?php
	$idmapel = $_GET['id'];

	$id_siswa = $_GET['ids'];
	$nilai = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_siswa='$id_siswa' and id_ujian='$idmapel'"));
	$mapel = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mapel where id_mapel='$nilai[id_mapel]'"));
	$siswa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'"));
	?>
	<div class='row'>
		<div class='col-md-12'>
			<div class='box box-solid'>
				<div class='box-header with-border '>
					<h3 class='box-title'>Data Hasil Ujian</h3>
					<div class='box-tools pull-right btn-group'>
						<!-- <button class='btn btn-sm btn-primary' onclick="frames['framejawab'].print()"><i class='fa fa-print'></i> Print</button> -->
						<!-- <i class='btn btn-sm btn-danger' href='?pg=nilai&ac=lihat&id=<?= $idmapel ?>'><i class='fa fa-times'></i></a> -->
						<!-- <iframe name='framejawab' src='printjawab.php?m=<?= $idmapel ?>&s=<?= $id_siswa ?>' style='display:none;'></iframe> -->
					</div>
				</div><!-- /.box-header -->
				<div class='box-body'>
					<table class='table table-bordered table-striped'>
						<tr>
							<th width='150'>No Induk</th>
							<td width='10'>:</td>
							<td><?= $siswa['nis'] ?></td>
							<td style="text-align:center; width:150">Total Nilai</td>
						</tr>
						<tr>
							<th>Nama</th>
							<td width='10'>:</td>
							<td><?= $siswa['nama'] ?></td>
							<td rowspan='3' style='font-size:30px; text-align:center; width:150'><?= $nilai['total'] ?></td>
						</tr>
						<tr>
							<th>Kelas</th>
							<td width='10'>:</td>
							<td><?= $siswa['id_kelas'] ?></td>
						</tr>
						<tr>
							<th>Mata Pelajaran</th>
							<td width='10'>:</td>
							<td><?= $mapel['nama'] ?></td>
						</tr>
					</table>
					<br>
					<div class='table-responsive'>
						<table class='table table-bordered table-striped'>
							<thead>
								<tr>
									<th width='5px'>#</th>
									<th>Soal PG</th>
									<th style='text-align:center'>Jawab</th>
									<th style='text-align:center'>Hasil</th>
								</tr>
							</thead>
							<tbody>
								<?php $jawaban = unserialize($nilai['jawaban']); ?>
								<?php foreach ($jawaban as $key => $value) : ?>
									<?php
									$no++;
									$soal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$key'"));
									if ($value == $soal['jawaban']) :
										$status = "<span class='text-green'><i class='fa fa-check'></i></span>";
									else :
										$status = "<span class='text-red'><i class='fa fa-times'></i></span>";
									endif;
									?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $soal['soal'] ?></td>
										<td style='text-align:center'><?= $value ?></td>
										<td style='text-align:center'><?= $status ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php if ($nilai['jawaban_esai'] <> null) { ?>
							<table class='table table-bordered table-striped'>
								<thead>
									<tr>
										<th width='5px'>#</th>
										<th>Soal ESAI</th>
										<th style='text-align:center'>Jawab</th>

									</tr>
								</thead>
								<tbody>
									<?php $noX = 0;
									$jawabanesai = unserialize($nilai['jawaban_esai']); ?>

									<?php foreach ($jawabanesai as $key2 => $value2) : ?>
										<?php
										$noX++;
										$soal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$key2'"));

										?>
										<tr>
											<td><?= $noX ?></td>
											<td><?= $soal['soal'] ?></td>
											<td><?= $value2 ?></td>

										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						<?php } ?>
						<br>
						<!-- <table class='table table-bordered table-striped'>
							<thead>
								<tr>
									<th width='5px'>#</th>
									<th>Soal Esai</th>
									<th style='text-align:center'>Hasil</th>
								</tr>
							</thead>
							<tbody>
								<?php $nilaiex = mysqli_query($koneksi, "SELECT * FROM hasil_jawaban WHERE id_siswa='$id_siswa' and id_mapel='$idmapel' and jenis='2' and id_ujian='$nilai[id_ujian]' ");
								$nox = 0; ?>
								<?php while ($jawabane = mysqli_fetch_array($nilaiex)) : ?>
									<?php
									$soal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$jawabane[id_soal]'"));
									$nox++;
									?>
									<tr>
										<td><?= $nox ?></td>
										<td><?= $soal['soal'] ?>
											<p><b>jawab : </b><?= $jawabane['esai'] ?></p>
										</td>
										<td style='text-align:center'><?= $jawabane['nilai_esai'] ?></td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table> -->
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<script>
	$('#tablenilai').dataTable();
	$(document).on('click', '.ulangnilai', function() {
		var id = $(this).data('id');
		console.log(id);
		swal({
			title: 'Apa anda yakin?',
			text: " Akan Mengulang Ujian Ini ??",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: 'ulangujian.php',
					method: "POST",
					data: 'id=' + id,
					success: function(data) {
						toastr.success("berhasil diulang");
						$('#tablenilai').load(location.href + ' #tablenilai');
					}
				});
			}
		})
	});
</script>