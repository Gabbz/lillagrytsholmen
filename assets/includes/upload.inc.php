<?php
    
    //Debug function
    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);
    
        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }




    debug_to_console("Körs");


    // upload.php de http://webtips.krajee.com/ajax-based-file-uploads-using-fileinput-plugin/
    if (empty($_FILES['files'])) {
        return; // or process or throw an exception
    }
    
    // get the files posted
    //$ticket = $_FILES['files'];
    $files = $_FILES['files'];

    // get server posted
    $server = empty($_POST['server']) ? '' : $_POST['server'];
    
    // get user name posted
    $user = empty($_POST['user']) ? '' : $_POST['user'];
    
    // a flag to see if everything is ok
    $success = null;
    
    // file paths to store
    $paths= [];
    
    // loop and process files
    //for($i=0; $i < count($ticket); $i++){
    for($i=0; $i < count($files['name']); $i++){    
        //$ext = explode('.', basename($ticket['name'][$i]));
        $ext = explode('.', basename($files['name'][$i]));
        $target = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . md5(uniqid()) . "." . array_pop($ext);
        //if(move_uploaded_file($ticket['tmp_name'][$i], $target)) {
        if(move_uploaded_file($files['tmp_name'][$i], $target)) {
            $success = true;
            $paths[] = $target;
            debug_to_console("fan det gick fan");
        } else{
            $success = false;
            break;
        }
    }
    
    // check and process based on successful status
    if ($success === true) {
        /* call the function to save all data to database
         code for the following function `save_data` is not
         mentioned in this example */
      //  save_data($userid, $username, $paths);
    
        // store a successful response (default at least an empty array). You
        // could return any additional response info you need to the plugin for
        // advanced implementations.
        $output = json_encode(array('item' => "inget"));
    } elseif ($success === false) {
        $output = ['error'=>'Error while uploading ticket. Contact the system administrator'];
        // delete any uploaded files
        foreach ($paths as $file) {
            unlink($file);
        }
    } else {
        $output = ['error'=>'No files were processed.'];
    }
    
    // return a json encoded response for plugin to process successfully
    debug_to_console($output);
    echo $output;
    ?>
    





