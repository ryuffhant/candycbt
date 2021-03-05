<?php
if (empty($_FILES['file'])) {
    echo json_encode(['error'=>'No files found for upload.']); 
    // or you can throw an exception 
    return; // terminate
}
// get the files posted
$file = $_FILES['file'];
// a flag to see if everything is ok
$success = null;
// file paths to store
$paths='';
// get file names
$filenames = $file['name'];
    $ext = explode('.', basename($filenames));
    $targetdir = "../files/";
	$target=$targetdir.$filenames;
    if(move_uploaded_file($file['tmp_name'], $target)) {
        $success = true;
        $paths = $target;
    } else {
        $success = false;
        
    }

if ($success === true) {
   
    $output = [];
    
} elseif ($success === false) {
    $output = ['error'=>'Error while uploading file. Contact the system administrator'];
    
    
} else {
    $output = ['error'=>'No files were processed.'];
}

// return a json encoded response for plugin to process successfully
echo json_encode($output);