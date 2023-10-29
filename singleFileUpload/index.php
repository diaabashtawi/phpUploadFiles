<?php




if($_SERVER['REQUEST_METHOD'] == 'POST'){


    // Setting Errors Array 
    $errors = array();

    // Set Allowed File Extentions
    $allwoed_file_extentions = array('jpg', 'gif', 'jpeg', 'png');

    $myFile = $_FILES['myFile'];

    echo '<pre>';

    print_r($myFile);

    echo '</pre>';

    $file_name = $_FILES['myFile']['name'];
    $file_type = $_FILES['myFile']['type'];
    $file_size = $_FILES['myFile']['size'];
    $file_tmp = $_FILES['myFile']['tmp_name'];


    echo 'File name : ' . $file_name. '<br>';
    echo 'File type : ' . $file_type. '<br>';
    echo 'File size : ' . $file_size. '<br>';
    echo 'File temp name : ' . $file_tmp. '<br>';

    // Get file extention

    $file_extention = explode('.', $file_name);
    $file_extention = strtolower(end($file_extention));
    
    echo $file_extention.'<br>';

    // Checking the File size
    if($file_size > 8000000){
        $errors[] = '<div>File size cannot be more than x </div>';
    }


    // If there is no ERRORS uploade the file 
    if(empty($errors)){
        move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'].'/phpUploadFiles/singleFileUpload/upload/'.$file_name );
        echo 'File Uploaded Successfully';
    }else{
        foreach($errors as $error){
            echo $error;
        }
    }

    

}




?>



<form method="post" action="" class="" enctype="multipart/form-data">
    <input type="file" name="myFile" value="">
    <input type="submit" value="Upload">
</form>