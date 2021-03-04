<?php

require "../config/config.database.php";
error_reporting(0);
$db_host = $setting['db_host'];
$db_user = $setting['db_user'];
$db_pass = $setting['db_pass'];
$db_name = $setting['db_name'];
$koneksipusat = mysqli_connect($db_host, $db_user, $db_pass);
if ($koneksipusat) {
    $pilihdbpusat = mysqli_select_db($koneksipusat, $db_name);
}
