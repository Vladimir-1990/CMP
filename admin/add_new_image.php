<?php

require("../include/config.php");

$USERID = $_SESSION['USERID'];

check_login($USERID);

include("header.php");

$submit = $_POST['submit'];
if($submit == 1)
{
    $image = $_FILES["image"];
    $image_name = $_POST["image_name"];
    $sql_insert = "INSERT INTO gallery SET image_title = '$image_name'";
    mysqli_query($link,$sql_insert);
    $IID = mysqli_insert_id($link);
    
    $location = '../images/gallery/';
    
    if(!empty($image))
    {
        $image_uploaded_thumb = $IID.'_image_thumb';
        $image_db_thumb = upload_image_thumb($image, $location, $image_uploaded_thumb);
        
        $image_upload_big = $IID.'_image_big';
        $image_db_big = upload_image($image, $location, $image_upload_big);
    }
    
    $sql_update = "UPDATE gallery SET image_thumb = '$image_db_thumb', image_big = '$image_db_big' WHERE IID = '$IID'";
    mysqli_query($link,$sql_update);
    $done = 1;  
}

?>

<div id="content">
    <h1 class="page_title">Add new image to gallery</h1>
    <?php
    if($done == 1)
    {
        echo "<div class='message'>Image added</div>";
    }
    ?>
    
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <label>Image:</label>
                <input type="file" name="image" class="text-box file" />
            </div>
            <div class="row">
                <label>Image title:</label>
                <input type="text" name="image_name" value="<?php echo $image_name ?>" class="text-box" />
            </div>
            <input type="hidden" value="1" name="submit" />
            <input type="submit" value="add" />
        </form>
    </div>
    
</div>