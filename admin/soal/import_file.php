<?php

$output = '';
if (isset($_FILES['zip_file']['name'])) {

    $file_name = $_FILES['zip_file']['name'];
    $array = explode(".", $file_name);
    $name = $array[0];
    $ext = $array[1];
    if ($ext == 'zip') {
        $path = '../../files/';
        $location = $path . $file_name;
        if (move_uploaded_file($_FILES['zip_file']['tmp_name'], $location)) {
            $zip = new ZipArchive;
            if ($zip->open($location)) {
                $zip->extractTo($path);
                $zip->close();
            }
            $files = scandir($path);
            //$name is extract folder from zip file  
            foreach ($files as $file) {
                $tmp = explode(".", $file);
                $file_ext = end($tmp);
                $allowed_ext = array('jpg', 'png', 'jpeg', 'gif', 'mp3', 'wav');
                if (in_array($file_ext, $allowed_ext)) {

                    $output .= '<div class="col-md-3"><div style="padding:16px; border:1px solid #CCC;"><img class="img img-responsive" style="height:150px;" src="../files/' . $file . '"   /></div></div>';
                }
            }
            unlink($location);
            echo "OK";
        }
    } else {
        echo "GAGAL";
    }
}
