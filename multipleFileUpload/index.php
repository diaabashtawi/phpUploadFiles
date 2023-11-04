<?php 


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Setting Errors Array
    $errors = array();

    // Setting allowed file extentions
    $allowed_file_extentions = array(
        'jpg',
        'gif',
        'jpeg',
        'png'
    );

    $myFiles = $_FILES['myFiles'];
    echo '<pre>';
    print_r($myFiles);
    echo '<pre>';

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
    for ($i=0; $i < $files_count; $i++) {
        move_uploaded_file($files_temp_name[$i], $_SERVER['DOCUMENT_ROOT'].'/phpUploadFiles/multipleFileUpload/upload/'.$files_name[$i]);
        // echo $files_name[$i];
        // echo "<br>";
        // echo $files_full_path[$i];
        // echo "<br>";
        // echo $files_type[$i];
        // echo "<br>";
        // echo $files_temp_name[$i];
        // echo "<br>";
        // echo $files_size[$i];
        // echo "<br>";
        // echo $files_error[$i];
    }


    




}



?>



<form class="" action="" method="post" enctype="multipart/form-data">
<input type="file" name="myFiles[]" value="" multiple="multiple">
    <input type="submit" value="Upload">
</form>