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

    
    // echo '<pre>';
    // print_r($myFiles);
    // echo '<pre>';

    // Get info from the html form
    $files_name = $myFiles['name'];
    $files_full_path = $myFiles['full_path'];
    $files_type = $myFiles['type'];
    $files_temp_name = $myFiles['tmp_name'];
    $files_size = $myFiles['size'];
    $files_error = $myFiles['error'];


    // echo "Files Name : " . $files_name. "<br>";
    // echo "Files full path : " . $files_full_path. "<br>";
    // echo "Files type : " . $files_type. "<br>";
    // echo "Files temp name : " . $files_temp_name. "<br>";
    // echo "Files size : " . $files_size. "<br>";
    // echo "Files error : " . $files_error. "<br>";

    // This line to count how many files has been uploaded in the array
    $files_count = count($files_name);
    // echo $files_count;
    // echo '<br>';
    for ($i = 0; $i < $files_count; $i++) {
        // Setting Errors Array
        $errors = array();

        if($files_size[$i] > 100000){
            
            $errors[] = '<div> Too Large File  </div>';
        }

        if(empty($errors)){
            // Move all the files if there is no errors 
            move_uploaded_file($files_temp_name[$i], $_SERVER['DOCUMENT_ROOT'] . '/phpUploadFiles/multipleFileUpload/upload/' . $files_name[$i]);
            echo '<div style="background-color: #eee; padding: 10px; margin-bottom: 20px;">';
            echo 'File number ' . ($i+1) . ' Uploaded Successfully ' . ' file name : '. $files_name[$i] .'<br>';
            echo '</div>';
        }else{
            echo '<div style="background-color: #eee; padding: 10px; margin-bottom: 20px;">';
            echo 'Errors for file number ' . ($i+1) . ' file name : '. $files_name[$i] .'<br>';
            foreach ($errors as $error){
                echo $error;
            }
            echo '</div>';
        }
    }
}



?>



<form class="" action="" method="post" enctype="multipart/form-data">
    <input type="file" name="myFiles[]" value="" multiple="multiple">
    <input type="submit" value="Upload">
</form>