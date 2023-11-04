<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Setting Errors Array 
    $errors = array();

    // Set Allowed File Extentions
    $allwoed_file_extentions = array('jpg', 'gif', 'jpeg', 'png');

    $myFile = $_FILES['myFile'];

    // echo '<pre>';

    // print_r($myFile);

    // echo '</pre>';
    // Getting the info from the submitted file  
    $file_name = $_FILES['myFile']['name'];
    $file_type = $_FILES['myFile']['type'];
    $file_size = $_FILES['myFile']['size'];
    $file_tmp = $_FILES['myFile']['tmp_name'];
    $file_error = $_FILES['myFile']['error'];


    // echo 'File name : ' . $file_name . '<br>';
    // echo 'File type : ' . $file_type . '<br>';
    // echo 'File size : ' . $file_size . '<br>';
    // echo 'File temp name : ' . $file_tmp . '<br>';
    // echo 'File error type : ' . $file_error . '<br>';


    // Get file extention 'expload' function will convert any string to array 
    $file_extention = explode('.', $file_name);
    // print_r($file_extention);
    // echo '<br>';
    // this line to get the file extention and converted to lower case
    // end function will return the last element in the array as a string  
    $file_extention = strtolower(end($file_extention));
    // echo $file_extention . '<br>';

    // Check if the file uploaded or NOT
    if ($file_error == 4) {
        $errors[] = '<div>Please select file to upload</div>';
    } else {
        // Checking the File size
        if ($file_size > 80000000) {
            $errors[] = '<div>File size cannot be more than x </div>';
        }
        // Check if the uploaded file is valid
        if (!in_array($file_extention, $allwoed_file_extentions)) {
            $errors[] = '<div>File is NOT vaild </div>';
        }
    }




    // If there is no ERRORS uploade the file 
    if (empty($errors)) {
        move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/phpUploadFiles/singleFileUpload/upload/' . $file_name);
        echo 'File Uploaded Successfully';
    } else {
        foreach ($errors as $error) {
            echo $error;
        }
    }
}




?>



<form method="post" action="" class="" enctype="multipart/form-data">
    <input type="file" name="myFile" value="">
    <input type="submit" value="Upload">
</form>