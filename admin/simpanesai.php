<?php

require("../config/config.default.php");
require("../config/config.function.php");
$kode = $_POST['id'];
$nilai = mysqli_fetch_array(mysqli_query($koneksi, "select * from nilai where id_nilai='$kode'"));
$skoresai = $_POST['skoresai'];
$total = $nilai['total'] + $skoresai;
$query = mysqli_query($koneksi, "UPDATE nilai set nilai_esai='$skoresai',total='$total' where id_nilai = '$kode'");
if ($query) {
	echo 1;
} else {
	echo 0;
}
