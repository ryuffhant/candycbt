<?php
require("../config/config.default.php");
$id_mapel = $_POST['mapel_id'];
$sql = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'"));
$dataArray = unserialize($sql['kelas']);

if (count($dataArray) == 1) {
    if ($dataArray[0] == "semua") {
        $status = 0;
        if ($sql['level'] == "semua") {
            $data = mysqli_query($koneksi, "SELECT * FROM kelas");
        } else {
            $tingkat = $sql['level'];
            $jurusan = $sql['idpk'];
            if ($sql['idpk'] == "semua") {
                $data = mysqli_query($koneksi, "SELECT * FROM kelas WHERE level='$tingkat'");
            }else{
                $data = mysqli_query($koneksi, "SELECT * FROM kelas WHERE level='$tingkat' AND id_kelas LIKE '%$jurusan%'");
            }
        }
        echo "<option value=''>Pilih Kelas</option>";
        while ($kelas = mysqli_fetch_array($data)) {
            echo "<option value='$kelas[id_kelas]'>$kelas[nama]</option>";
        }
    } else {
        echo "<option value=''>Pilih Kelas</option>";
        foreach ($dataArray as $key => $value) {
            echo "<option value='$value'>$value</option>";
        }
    }
} elseif (count($dataArray) > 1) {
    echo "<option value=''>Pilih Kelas</option>";
    foreach ($dataArray as $key => $value) {
        echo "<option value='$value'>$value</option>";
    }
};
