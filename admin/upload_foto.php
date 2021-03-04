<?php
if (isset($_SESSION['id_pengawas'])) {
	$format_file = array("jpg", "png", "gif", "zip", "bmp");
	$max_file_size = 1024 * 300; //maksimal 100 kb
	$path = "../foto/fotosiswa/"; // Lokasi folder untuk menampung file
	$count = 0;

	if (isset($_POST['uplod'])) {
		// Loop $_FILES to exeicute all files
		foreach ($_FILES['files']['name'] as $f => $name) {
			if ($_FILES['files']['error'][$f] == 4) {
				continue; // Skip file if any error found
			}
			if ($_FILES['files']['error'][$f] == 0) {
				if ($_FILES['files']['size'][$f] > $max_file_size) {
					$message[] = "$name is too large!.";
					continue; // Skip large files
				} elseif (!in_array(pathinfo($name, PATHINFO_EXTENSION), $format_file)) {
					$message[] = "$name is not a valid format";
					continue; // Skip invalid file formats
				} else { // No error found! Move uploaded files 
					if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path . $name))
						$count++; // Number of successfully uploaded file
				}
			}
		}

		echo 'berhasil upload ' . $count . ' files';
	}
}
