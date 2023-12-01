<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // initialize and declare $myFiles variable to grap the files from the input tag in the html form 
    $myFiles = $_FILES['myFiles'];
    // Setting Errors Array
    $errors = array();

    // Setting allowed file extentions
    $allowed_file_extentions = array(
        'jpg',
        'gif',
        'jpeg',
        'png'
    );

    // Get info from the html form
    $files_name = $myFiles['name'];
    $files_full_path = $myFiles['full_path'];
    $files_type = $myFiles['type'];
    $files_temp_name = $myFiles['tmp_name'];
    $files_size = $myFiles['size'];
    $files_error = $myFiles['error'];

    if ($files_error[0] == 4) {// if the error value is 4 then no file uploaded
        echo '<div>No File Uploaded</div>';
    } else {
        // This line to count how many files has been uploaded in the array
        $files_count = count($files_name);

        for ($i = 0; $i < $files_count; $i++) {
            // Setting Errors Array
            $errors = array();

            //Get Files Extention
            $files_extention = explode('.' , $files_name[$i]);
            $files_extention = strtolower(end($files_extention));
            

            if ($files_size[$i] > 100000) {
                $errors[] = '<div> Too Large File  </div>';
            }

            if(!in_array($files_extention, $allowed_file_extentions)){
                $errors[] = '<div> File extentions NOT VALID </div>';
            }
            if (empty($errors)) {
                // Move all the files if there is no errors 
                move_uploaded_file($files_temp_name[$i], $_SERVER['DOCUMENT_ROOT'] . '/phpUploadFiles/multipleFileUpload/upload/' . $files_name[$i]);
                echo '<div style="background-color: #eee; padding: 10px; margin-bottom: 20px;">';
                echo 'File number ' . ($i + 1) . ' Uploaded Successfully ' . ' file name : ' . $files_name[$i] . '<br>';
                echo '</div>';
            } else {
                echo '<div style="background-color: #eee; padding: 10px; margin-bottom: 20px;">';
                echo 'Errors for file number ' . ($i + 1) . ' file name : ' . $files_name[$i] . '<br>';
                foreach ($errors as $error) {
                    echo $error;
                }
                echo '</div>';
            }
        }
    }
}
?>

<form class="" action="" method="post" enctype="multipart/form-data">
    <input type="file" name="myFiles[]" value="" multiple="multiple" requiredn>
    <input type="submit" value="Upload">
</form>