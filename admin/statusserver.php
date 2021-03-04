<?php
require '../config/config.koneksipusat.php';
if ($koneksipusat) {
    if (!$pilihdbpusat) {
        echo "<h3 class='text-red'>Tidak Terhubung</h3>";
    } else {
        $query = mysqli_query($koneksipusat, "select * from server where kode_server='$setting[id_server]'");
        $cek = mysqli_num_rows($query);
        $serverpusat = mysqli_fetch_array($query);
        if ($cek <> 0) {
            if ($serverpusat['status'] == 'aktif') {
                echo "<h3 class='text-blue'><b>AKTIF</b> - Kode Sekolah $setting[id_server]</h3>";
            } else {
                echo "<h3 class='text-purple'><b>STANDBY</b> - Koneksi Belum diaktifkan</h3>";
            }
        } else {
            echo "<h3 class='text-yellow'><b>TERHUBUNG</b> - Sekolah Tidak Terdaftar</h3>";
        }
    }
    mysqli_close($koneksipusat);
} else {
    echo "<h3 class='text-red'>Tidak Ada Koneksi</h3>";
}