<?php
require "../../config/config.default.php";
$idujian = $_POST['idm'];
$sesi = $_POST['sesi'];
$tglujian = $_POST['mulaiujian'];
$tglselesai = $_POST['selesaiujian'];
$lama = $_POST['lama_ujian'];
$waktu = explode(" ", $tglujian);
$waktu = $waktu[1];
$exec = mysqli_query($koneksi, "UPDATE ujian SET sesi='$sesi',tgl_ujian='$tglujian',tgl_selesai='$tglselesai',waktu_ujian='$waktu',lama_ujian='$lama' WHERE id_ujian='$idujian'");
if ($exec) {
    echo "OK";
}
