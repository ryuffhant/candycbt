<?php
require("../config/config.default.php");
require("../config/config.function.php");
require("../config/functions.crud.php");
$idnilai = $_POST['id'];
$nilai = fetch('nilai', array('id_nilai' => $idnilai));
$idu = $nilai['id_ujian'];
$idm = $nilai['id_mapel'];
$ids = $nilai['id_siswa'];
$where2 = array(
    'id_mapel' => $idm,
    'id_siswa' => $ids,
    'id_ujian' => $idu
);
delete('nilai', ['id_nilai' => $idnilai]);
delete('pengacak', $where2);
delete('pengacakopsi', $where2);
delete('jawaban', $where2);
delete('hasil_jawaban', $where2);
