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



}



?>



<form class="" action="" method="post" enctype="multipart/form-data">
<input type="file" name="myFiles[]" value="" multiple="multiple">
    <input type="submit" value="Upload">
</form>