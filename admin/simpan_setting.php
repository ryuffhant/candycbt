<?php
require "../config/config.default.php";
$alamat = nl2br($_POST['alamat']);
$header = nl2br($_POST['header']);
$exec = mysqli_query($koneksi, "UPDATE setting SET aplikasi='$_POST[aplikasi]',sekolah='$_POST[sekolah]',kode_sekolah='$_POST[kode]',jenjang='$_POST[jenjang]',kepsek='$_POST[kepsek]',nip='$_POST[nip]',alamat='$alamat',kecamatan='$_POST[kecamatan]',kota='$_POST[kota]',telp='$_POST[telp]',fax='$_POST[fax]',web='$_POST[web]',email='$_POST[email]',header='$header',ip_server='$_POST[ipserver]',waktu='$_POST[waktu]' WHERE id_setting='1'");
if ($exec) {

    if ($_FILES['logo']['name'] <> '') {
        $logo = $_FILES['logo']['name'];
        $temp = $_FILES['logo']['tmp_name'];
        $ext = explode('.', $logo);
        $ext = end($ext);
        $dest = 'dist/img/logo' . rand(1, 100) . '.' . $ext;
        $upload = move_uploaded_file($temp, '../' . $dest);
        if ($upload) {
            $exec = mysqli_query($koneksi, "UPDATE setting SET logo='$dest' WHERE id_setting='1'");
        } else {
            echo "gagal";
        }
    }
} else {
    echo "Gagal menyimpan";
}
