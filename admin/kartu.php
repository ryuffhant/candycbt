<?php
require("../config/config.default.php");
require("../config/config.function.php");
require("../config/functions.crud.php");
require("../config/dis.php");
include "phpqrcode/qrlib.php";
(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
($id_pengawas == 0) ? header('location:index.php') : null;
$id_kelas = @$_GET['id_kelas'];


if (date('m') >= 7 and date('m') <= 12) {
	$ajaran = date('Y') . "/" . (date('Y') + 1);
} elseif (date('m') >= 1 and date('m') <= 6) {
	$ajaran = (date('Y') - 1) . "/" . date('Y');
}
$kelas = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'"));
?>
<style>
	* {
		font-size: x-small;
	}

	.box {
		border: 1px solid #000;
		width: 100%;
		height: 150px;
	}
</style>

<table width='100%' align='center' cellpadding='10'>
	<tr>
		<?php $siswaQ = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_kelas='$id_kelas' ORDER BY nama ASC"); ?>
		<?php while ($siswa = mysqli_fetch_array($siswaQ)) : ?>
			<?php
				$nopeserta = $siswa['no_peserta'];
				$no++;
				?>
			<td width='50%'>
				<div style='width:10.4cm;border:1px solid #666;'>
					<table style="text-align:center; width:100%">
						<tr>
							<td style="text-align:left; vertical-align:top">
								<?php
									$tempdir = '../foto/qrcode/';
									$tempatpng = $tempdir . $nopeserta . '.png';
									$tempatip = $tempdir . 'qrcodeip.png';

									if (!file_exists($tempatpng)) {
										QRcode::png($nopeserta, $tempatpng, 'L', 1);
									}
									if (!file_exists($tempatip)) {
										QRcode::png($setting['ip_server'], $tempatip, 'M', 1);
									}
									?>
								<img src='../foto/logo_tut.svg' height='40px'>
							</td>
							<td style="text-align:center">
								<b>
									KARTU PESERTA UJIAN<br>
									<?= strtoupper($setting['nama_ujian']) ?><BR>
									TAHUN PELAJARAN <?= $ajaran ?>
								</b>
							</td>
							<td style="text-align:right; vertical-align:top">
								<img src="../<?= $setting['logo'] ?>" height='40px' />
							</td>
						</tr>
					</table>
					<hr>
					<table style="text-align:left; width:100%">
						<tr>
							<td style="text-align:center; vertical-align:top; width:100px" rowspan="5">
								<?php
									if ($siswa['foto'] <> '') {
										if (!file_exists("../foto/fotosiswa/$siswa[foto]")) {
											echo "<img src='$homeurl/dist/img/avatar_default.png' class='img'  style='max-width:60px' alt='+'>";
										} else {
											echo "<img src='$homeurl/foto/fotosiswa/$siswa[foto]' class='img'  style='max-width:60px' >";
										}
									} else {
										echo "<img src='$homeurl/dist/img/foto.svg' class='img'  style='max-width:60px' alt='+'>";
									}

									?>
							</td>
						</tr>
						<tr>
							<td valign='top' width="20%">No Peserta</td>
							<td valign='top'>: <?= $siswa['no_peserta'] ?></td>
						</tr>
						<tr>
							<td valign='top'>Nama</td>
							<td valign='top'>: <?= $siswa['nama'] ?></td>
						</tr>
						<tr>
							<td valign='top'>Kelas / Sesi Ujian</td>
							<td valign='top'>: <?= $kelas['nama'] ?> / Sesi <?= $siswa['sesi'] ?></td>
						</tr>
						<tr>
							<td valign='top'>Ruang</td>
							<td valign='top'>: <?= $siswa['ruang'] ?></td>
						</tr>
						<tr>
							<td width='100px' valign='top' style="text-align:center" rowspan='3'><img src='<?= $tempatip ?>' height='50px' /></td>
							<td valign='top'>Username</td>
							<td valign='top'>: <?= $siswa['username'] ?></td>
						</tr>
						<tr>
							<td valign='top'>Password</td>
							<td valign='top'>: <?= $siswa['password'] ?></td>
						</tr>
						<tr>
							<td valign='top'></td>
							<td valign='top' align='center'>
								Kepala Sekolah<br><br><br>
								<b><?= $setting['kepsek'] ?></b><br>
								<b>NIP. <?= $setting['nip'] ?></b>

							</td>
						</tr>
					</table>
				</div>
				<?php if (($no % 10) == 0) : ?>
					<div style='page-break-before:always;'></div>
				<?php endif; ?>
			</td>
			<?php if (($no % 2) == 0) : ?>
	</tr>
	<tr>
			<?php endif; ?>
		<?php endwhile; ?>
	</tr>
</table>