<?php
require("config/config.default.php");
require("config/dis.php");
(isset($_SESSION['id_siswa'])) ? $id_siswa = $_SESSION['id_siswa'] : $id_siswa = 0;
($id_siswa <> 0) ? mysqli_query($koneksi, "INSERT INTO log (id_siswa,type,text,date) VALUES ('$id_siswa','logout','keluar','$tanggal $waktu')") : null;
($id_siswa <> 0) ? mysqli_query($koneksi, "DELETE FROM login where id_siswa='$id_siswa'") : null;
session_destroy();
echo "<script>location.href = '.';</script>";
