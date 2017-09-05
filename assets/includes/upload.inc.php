<?php
    include 'ChromePhp.php';
    
    // 'images' refers to your file input name attribute
    if (empty($_FILES['files'])) {
        echo json_encode(['error'=>'Hittade inga filer att ladda upp.']); 
        // or you can throw an exception 
        return; // terminate
    }

    // get the files posted
    $images = $_FILES['files'];

    /*  OM EXTRA INFO SKA FÄSTAS PÅ BILDEN
    // get user id posted
    $userid = empty($_POST['userid']) ? '' : $_POST['userid'];

    // get user name posted
    $username = empty($_POST['username']) ? '' : $_POST['username'];
    */

    // a flag to see if everything is ok
    $success = null;

    // file paths to store
    //$paths= [../../uploads];
    $paths= [];

    // get file names
    $filenames = $images['name'];
    
    // loop and process files
    for($i=0; $i < count($filenames); $i++){
        $ext = explode('.', basename($filenames[$i]));
        $target = "../../uploads" . DIRECTORY_SEPARATOR . md5(uniqid()) . "." . array_pop($ext);        
        if(move_uploaded_file($images['name'][$i], $target)) {
            $success = true;
            $paths[] = $target;
        } else {
            $success = false;
            break;
        }
    }

    // check and process based on successful status 
    if ($success === true) {
        // call the function to save all data to database
        // code for the following function `save_data` is not 
        // mentioned in this example
        save_data($paths);

        // store a successful response (default at least an empty array). You
        // could return any additional response info you need to the plugin for
        // advanced implementations.
        $output = [];
        // for example you can get the list of files uploaded this way
        // $output = ['uploaded' => $paths];
    } elseif ($success === false) {
        $output = ['error'=>'Error while uploading images. Contact the system administrator'];
        //$output = $target;
        // delete any uploaded files
        foreach ($paths as $file) {
            unlink($file);
        }
    } else {
        $output = ['error'=>'No files were processed.'];
    }

    // return a json encoded response for plugin to process successfully
    echo json_encode($output);
?>


<?php
/*$target_dir = "uploads/thumbs";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}*/
?>
