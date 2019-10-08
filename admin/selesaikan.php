<?php
require("../config/config.default.php");
require("../config/config.function.php");
require("../config/functions.crud.php");
	$idnilai=$_POST['id'];
	$nilai = fetch('nilai',array('id_nilai'=>$idnilai));
								$idm = $nilai['id_mapel'];
								$ids = $nilai['id_siswa'];
								$idk = $nilai['id_kelas'];
								$idu = $nilai['kode_ujian'];
								$iduj = $nilai['id_ujian'];
								$where = array(
									'id_mapel' => $idm,
									'id_siswa' => $ids,
									'kode_ujian' => $idu
								);
								$where2 = array(
									'id_mapel' => $idm,
									'id_siswa' => $ids,
									'id_ujian' => $iduj
								);
								$benar = $salah = 0;
								$mapel = fetch('mapel',array('id_mapel'=>$idm));
								$siswa = fetch('siswa',array('id_siswa'=>$ids));
								$ceksoal = select('soal',array('id_mapel'=>$idm));
								foreach($ceksoal as $getsoal) {
									$w = array(
										'id_siswa' => $ids,
										'id_mapel' => $idm,
										'id_soal' => $getsoal['id_soal']
									);
									$cekjwb = rowcount('jawaban',$w);
									if($cekjwb<>0) {
										$getjwb = fetch('jawaban',$w);
										($getjwb['jawaban']==$getsoal['jawaban']) ? $benar++ : $salah++;
									} else {
										$salah++;
									}
								}
								$bagi = $mapel['jml_soal']/100;
								$skor = $benar/$bagi;
								$data = array(
									'ujian_selesai' => $datetime,
									'jml_benar' => $benar,
									'jml_salah' => $salah,
									'skor' => $skor
								);
								update('nilai',$data,$where);
								delete('pengacak',$where2);
								delete('pengacakopsi',$where2);
