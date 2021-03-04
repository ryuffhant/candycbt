<?php
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
require "../config/config.koneksipusat.php";
$datetime = date('Y-m-d H:i:s');
if ($koneksipusat) {
    $query = mysqli_fetch_array(mysqli_query($koneksipusat, "select * from server where kode_server='$setting[id_server]'"));
    if ($query['status'] == 'aktif') {
        $data = $_POST['data'];
        $gagal = $gagal2 = $gagal3 = $gagal4 = $gagal5 = 0;
        $masuk1 = $masuk2 = $masuk3 = $masuk4 = $masuk5 = 0;
        //Tarik Data Peserta Ujian
        if ($data == 'DATA1') {
            $sql = mysqli_query($koneksi, "truncate table siswa");
            $i = 1;
            $sqlcek = mysqli_query($koneksipusat, "select * from siswa where server='$setting[id_server]' ");
            $baris = mysqli_num_rows($sqlcek);
            while ($r = mysqli_fetch_array($sqlcek)) {
                $sql = mysqli_query($koneksi, "insert into siswa
						(id_siswa,id_kelas,idpk,nis,no_peserta,nama,level,ruang,sesi,username,password,foto,server) values 			
						('$r[id_siswa]','$r[id_kelas]','$r[idpk]','$r[nis]','$r[no_peserta]','" . addslashes($r['nama']) . "','$r[level]','$r[ruang]','$r[sesi]','$r[username]','$r[password]','$r[foto]','$r[server]')");

                $qkelas = mysqli_query($koneksi, "SELECT id_kelas FROM kelas WHERE id_kelas='$kelas'");
                $cekkelas = mysqli_num_rows($qkelas);
                if (!$cekkelas <> 0) {
                    $exec = mysqli_query($koneksi, "INSERT INTO kelas (id_kelas,level,nama)VALUES('$r[id_kelas]','$r[level]','$r[id_kelas]')");
                }
                if ($setting['jenjang'] == 'SMK') {
                    $qpk = mysqli_query($koneksi, "SELECT id_pk FROM pk WHERE id_pk='$r[idpk]'");
                    $cekpk = mysqli_num_rows($qpk);
                    if (!$cekpk <> 0) {
                        $exec = mysqli_query($koneksi, "INSERT INTO pk (id_pk,program_keahlian)VALUES('$r[idpk]','$r[idpk]')");
                    }
                }
                $qlevel = mysqli_query($koneksi, "SELECT kode_level FROM level WHERE kode_level='$r[level]'");
                $ceklevel = mysqli_num_rows($qlevel);
                if (!$ceklevel <> 0) {
                    $exec = mysqli_query($koneksi, "INSERT INTO level (kode_level,keterangan)VALUES('$r[level]','$r[level]')");
                }
                $qruang = mysqli_query($koneksi, "SELECT kode_ruang FROM ruang WHERE kode_ruang='$r[ruang]'");
                $cekruang = mysqli_num_rows($qruang);
                if (!$cekruang <> 0) {
                    $exec = mysqli_query($koneksi, "INSERT INTO ruang (kode_ruang,keterangan)VALUES('$r[ruang]','$r[ruang]')");
                }
                $qsesi = mysqli_query($koneksi, "SELECT kode_sesi FROM sesi WHERE kode_sesi='$r[sesi]'");
                $ceksesi = mysqli_num_rows($qsesi);
                if (!$ceksesi <> 0) {
                    $exec = mysqli_query($koneksi, "INSERT INTO sesi (kode_sesi,nama_sesi)VALUES('$r[sesi]','$r[sesi]')");
                }
                $qserver = mysqli_query($koneksi, "SELECT kode_server FROM server WHERE kode_server='$r[server]'");
                $cekserver = mysqli_num_rows($qserver);
                if (!$cekserver <> 0) {
                    $exec = mysqli_query($koneksi, "INSERT INTO server (kode_server,nama_server,status)VALUES('$r[server]','$r[server]','aktif')");
                }
                if (!$sql) {
                    $gagal++;
                } else {
                    $masuk1++;
                }
            }

            $exec = mysqli_query($koneksi, "update sinkron set jumlah='$masuk1', status_sinkron='1', tanggal='$datetime' where nama_data='$data'");

            echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='box box-solid'>
											<div class='box-header with-border bg-blue'>
											<h5 class='box-title'>DATA YANG MASUK KE LOKAL</h5>
											</div>
											<div class='box-body'>
											<table class='table table-striped'>
													<th>Nama Data</th><th>Data Berhasil Masuk</th><th>Data Gagal</th>
													<tr><td>Peserta Ujian</td><td><i class='fa fa-check text-green'></i> $masuk1</td><td><i class='fa fa-times text-red'></i> $gagal</td></tr>
													
												</table>
											
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
								</div>";
        }
        if ($data == 'DATA2') {
            $sql = mysqli_query($koneksi, "truncate table mapel");
            $i = 1;
            $gagal2 = 0;
            $sqlcek = mysqli_query($koneksipusat, "select * from mapel where status='1' ");
            $baris = mysqli_num_rows($sqlcek);
            while ($r = mysqli_fetch_array($sqlcek)) {

                $sql = mysqli_query($koneksi, "insert into mapel
						(id_mapel,idpk,idguru,nama,jml_soal,jml_esai,bobot_pg,bobot_esai,level,status,kelas,tampil_pg,tampil_esai,opsi,date) values 			
						('$r[id_mapel]','$r[idpk]','$r[idguru]','$r[nama]','$r[jml_soal]','$r[jml_esai]','$r[bobot_pg]','$r[bobot_esai]','$r[level]','$r[status]','$r[kelas]','$r[tampil_pg]','$r[tampil_esai]','$r[opsi]','$r[date]')");
                $qmapel = mysqli_query($koneksipusat, "select * from mata_pelajaran where kode_mapel='$r[nama]");
                $cek = mysqli_num_rows($qmapel);
                $namamapel = mysqli_fetch_array($qmapel);
                if ($cek == 0) {
                    $exec = mysqli_query($koneksi, "INSERT INTO mata_pelajaran (kode_mapel,nama_mapel) values ('$r[nama]','$r[nama]') ");
                }

                if (!$sql) {
                    $gagal2++;
                } else {
                    $masuk2++;
                }
            }
            $exec = mysqli_query($koneksi, "update sinkron set jumlah='$masuk2', status_sinkron='1',tanggal='$datetime'  where nama_data='$data'");
            echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='box box-solid'>
											<div class='box-header with-border bg-blue'>
											<h5 class='box-title'>DATA YANG MASUK KE LOKAL</h5>
											</div>
											<div class='box-body'>
											<table class='table table-striped'>
													<th>Nama Data</th><th>Data Berhasil Masuk</th><th>Data Gagal</th>
													<tr><td>Bank Soal</td><td><i class='fa fa-check text-green'></i> $masuk2</td><td><i class='fa fa-times text-red'></i> $gagal2</td></tr>
													
												</table>
											
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
								</div>";
        }
        if ($data == 'DATA3') {
            //Tarik Data Soal

            $sql = mysqli_query($koneksi, "truncate table soal");
            $i = 1;
            $sqlcek = mysqli_query($koneksipusat, "select * from soal a left join mapel b ON a.id_mapel=b.id_mapel where b.status='1' ");
            $baris = mysqli_num_rows($sqlcek);

            $gagal3 = 0;
            while ($r = mysqli_fetch_array($sqlcek)) {
                $soal = addslashes($r['soal']);
                $pila = addslashes($r['pilA']);
                $pilb = addslashes($r['pilB']);
                $pilc = addslashes($r['pilC']);
                $pild = addslashes($r['pilD']);
                $pile = addslashes($r['pilE']);
                $sql = mysqli_query($koneksi, "insert into soal
						(id_soal,id_mapel,nomor,soal,jenis,pilA,pilB,pilC,pilD,pilE,jawaban,file,file1,fileA,fileB,fileC,fileD,fileE) values 			
						('$r[id_soal]','$r[id_mapel]','$r[nomor]','$soal','$r[jenis]','$pila','$pilb','$pilc','$pild','$pile','$r[jawaban]','$r[file]','$r[file1]','$r[fileA]','$r[fileB]','$r[fileC]','$r[fileD]','$r[fileE]')");
                if (!$sql) {
                    $gagal3++;
                } else {
                    $masuk3++;
                }
            }
            $exec = mysqli_query($koneksi, "update sinkron set jumlah='$masuk3', status_sinkron='1',tanggal='$datetime' where nama_data='$data'");
            echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='box box-solid'>
											<div class='box-header with-border bg-blue'>
											<h5 class='box-title'>DATA YANG MASUK KE LOKAL</h5>
											</div>
											<div class='box-body'>
											<table class='table table-striped'>
													<th>Nama Data</th><th>Data Berhasil Masuk</th><th>Data Gagal</th>
													<tr><td>Data Soal</td><td><i class='fa fa-check text-green'></i> $masuk3</td><td><i class='fa fa-times text-red'></i> $gagal3</td></tr>
													
												</table>
											
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
								</div>";
        }
        if ($data == 'DATA4') {
            //Tarik Jadwal
            $sql = mysqli_query($koneksi, "truncate table ujian");
            $i = 1;
            $sqlcek = mysqli_query($koneksipusat, "select * from ujian where status='1' ");
            $baris = mysqli_num_rows($sqlcek);

            $gagal4 = 0;
            while ($r = mysqli_fetch_array($sqlcek)) {

                $sql = mysqli_query($koneksi, "insert into ujian
						(id_ujian,id_pk,id_guru,id_mapel,nama,jml_soal,jml_esai,bobot_pg,bobot_esai,lama_ujian,tgl_ujian,tgl_selesai,waktu_ujian,level,sesi,acak,token,hasil,kelas,tampil_pg,tampil_esai,opsi,kode_ujian) values 			
						('$r[id_ujian]','$r[id_pk]','$r[id_guru]','$r[id_mapel]','$r[nama]','$r[jml_soal]','$r[jml_esai]','$r[bobot_pg]','$r[bobot_esai]','$r[lama_ujian]','$r[tgl_ujian]','$r[tgl_selesai]',
						'$r[waktu_ujian]','$r[level]','$r[sesi]','$r[acak]','$r[token]','$r[hasil]','$r[kelas]','$r[tampil_pg]','$r[tampil_esai]','$r[opsi]','$r[kode_ujian]')");
                $qmapel = mysqli_query($koneksipusat, "select * from jenis where id_jenis='$r[kode_ujian]");
                $cek = mysqli_num_rows($qmapel);
                $ujian = mysqli_fetch_array($qmapel);
                if ($cek == 0) {
                    $exec = mysqli_query($koneksi, "INSERT INTO jenis (id_jenis,nama,status) values ('$r[kode_ujian]','$ujian[nama]','aktif') ");
                }
                if (!$sql) {
                    $gagal4++;
                } else {
                    $masuk4++;
                }
            }
            $exec = mysqli_query($koneksi, "update sinkron set jumlah='$masuk4', status_sinkron='1',tanggal='$datetime' where nama_data='$data'");
            echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='box box-solid'>
											<div class='box-header with-border bg-blue'>
											<h5 class='box-title'>DATA YANG MASUK KE LOKAL</h5>
											</div>
											<div class='box-body'>
											<table class='table table-striped'>
													<th>Nama Data</th><th>Data Berhasil Masuk</th><th>Data Gagal</th>
													<tr><td>Jadwal Ujian</td><td><i class='fa fa-check text-green'></i> $masuk4</td><td><i class='fa fa-times text-red'></i> $gagal4</td></tr>
													
												</table>
											
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
								</div>";
        }
        if ($data == 'DATA5') {
            //Tarik Jadwal

            $i = 1;
            $sqlcek = mysqli_query($koneksipusat, "select * from  setting ");
            $r = mysqli_fetch_array($sqlcek);
            $sekolah = addslashes($r['sekolah']);
            $sql = mysqli_query($koneksi, "UPDATE setting SET sekolah='$sekolah',
					jenjang='$r[jenjang]',kepsek='$r[kepsek]',
					nip='$r[nip]',alamat='$r[alamat]',kecamatan='$r[kecamatan]',kota='$r[kota]',
					telp='$r[telp]',web='$r[web]',email='$r[email]' WHERE id_setting='1'");
            if (!$sql) {
                $gagal5++;
            } else {
                $masuk5++;
            }
            echo "$masuk5 file berhasil masuk";
            $exec = mysqli_query($koneksi, "update sinkron set jumlah='$masuk5', status_sinkron='1',tanggal='$datetime' where nama_data='$data'");
        }

        if ($data == 'DATA6') {
            function multiple_download($urls, $save_path = '../files')
            {
                $multi_handle = curl_multi_init();
                $file_pointers = [];
                $curl_handles = [];
                // Add curl multi handles, one per file we don't already have
                foreach ($urls as $key => $url) {
                    $file = $save_path . '/' . basename($url);
                    if (!is_file($file)) {
                        $curl_handles[$key] = curl_init($url);
                        $file_pointers[$key] = fopen($file, "w");
                        curl_setopt($curl_handles[$key], CURLOPT_FILE, $file_pointers[$key]);
                        curl_setopt($curl_handles[$key], CURLOPT_HEADER, 0);
                        curl_setopt($curl_handles[$key], CURLOPT_CONNECTTIMEOUT, 60);
                        curl_multi_add_handle($multi_handle, $curl_handles[$key]);
                    }
                }
                // Download the files
                do {
                    curl_multi_exec($multi_handle, $running);
                } while ($running > 0);
                // Free up objects
                foreach ($urls as $key => $url) {
                    curl_multi_remove_handle($multi_handle, $curl_handles[$key]);
                    curl_close($curl_handles[$key]);
                    fclose($file_pointers[$key]);
                }
                curl_multi_close($multi_handle);
            }
            // Files to download
            $cekfile = mysqli_query($koneksipusat, "select * from file_pendukung");
            $urls = [];
            $i = 0;
            if ($setting['db_folder'] == '' or $setting['db_folder'] == null) {
                $folder = "";
            } else {
                $folder = "/" . $setting['db_folder'];
            }
            while ($cek = mysqli_fetch_array($cekfile)) {

                $urls[$i] = $db_host . $folder . "/files/" . $cek['nama_file'];
                $i++;
            }
            echo "$i file berhasil masuk";
            //var_dump($urls);
            multiple_download($urls);
            $exec = mysqli_query($koneksi, "update sinkron set jumlah='$i', status_sinkron='1',tanggal='$datetime' where nama_data='$data'");
        }
    } else {
        echo "Server Pusat Belum Diaktifin";
    }
} else {
    echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='box box-solid'>
											<div class='box-header with-border bg-red'>
											<h5 class='box-title'>SINKRONISASI GAGAL</h5>
											</div>
											<div class='box-body'>
											<ul>
											<li>Periksa Koneksi Internet</li>
											<li>Periksa Pengaturan Jaringan</li>
											<li>Pastikan Server dalam kondisi AKTIF</li>
											</ul>
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
								</div>";
}
