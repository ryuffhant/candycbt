<?php

require("../config/config.default.php");
require("../config/config.function.php");
$kode = $_POST['id'];

$exec = mysql_query("DELETE FROM nilai WHERE id_ujian='$kode' and ujian_selesai<>''");
