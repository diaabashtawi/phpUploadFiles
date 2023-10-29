<?php




if($_SERVER['REQUEST_METHOD'] == 'POST'){
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


    move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'].'/phpUploadFiles/singleFileUpload/upload/'.$file_name );

}




?>



<form method="post" action="" class="" enctype="multipart/form-data">
    <input type="file" name="myFile" value="">
    <input type="submit" value="Upload">
</form>