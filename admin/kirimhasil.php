<?php
require "../config/config.koneksipusat.php";
if ($koneksipusat) {
    $serverpusat = mysqli_fetch_array(mysqli_query($koneksipusat, "select * from server where kode_server='$setting[id_server]'"));
    if ($serverpusat['status'] == 'aktif') {
        $idujian = $_POST['id'];
        //kirim nilai
        $sqlcek = mysqli_query($koneksi, "select * from nilai where status is null and id_ujian='$idujian'");
        while ($r = mysqli_fetch_array($sqlcek)) {

            $sql = mysqli_query($koneksipusat, "insert into nilai (id_mapel,id_ujian,id_siswa,kode_ujian,ujian_mulai,ujian_berlangsung,ujian_selesai,jml_benar,jml_salah,nilai_esai,skor,total,hasil,jawaban,jawaban_esai) values ('$r[id_mapel]','$r[id_ujian]','$r[id_siswa]','$r[kode_ujian]','$r[ujian_mulai]','$r[ujian_berlangsung]','$r[ujian_selesai]','$r[jml_benar]','$r[jml_salah]','$r[nilai_esai]','$r[skor]','$r[total]','$r[hasil]','$r[jawaban]','$r[jawaban_esai]')");
            if ($sql) {
                $sql = mysqli_query($koneksi, "update nilai set status = '1' where id_nilai='$r[id_nilai]'");
            }
        }
    } else {
        echo "server pusat tidak diaktifkan";
    }
} else {
    echo "server tidak terhubung";
}
