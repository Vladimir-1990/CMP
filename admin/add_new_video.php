<?php

require("../include/config.php");

$USERID = $_SESSION['USERID'];

check_login($USERID);

include("header.php");

$submit = $_POST['submit'];
if($submit == 1)
{
    $youtube_url = $_POST["youtube_url"];
    $title = $_POST["title"];
    $youtube_id_parts = explode('=',$youtube_url);
    $youtube_id = $youtube_id_parts[1];
    $sql_insert = "INSERT INTO cmp_tv SET youtube_url = '$youtube_url', youtube_id = '$youtube_id', title= '$title'";
    mysqli_query($link,$sql_insert);
    $done = 1;  
}

?>

<div id="content">
    <h1 class="page_title">Add new video</h1>
    <?php
    if($done == 1)
    {
        echo "<div class='message'>Video added</div>";
    }
    ?>
    
    <div class="form">
        <form action="" method="POST">
            <div class="row">
                <label>Youtube url:</label>
                <input type="text" name="youtube_url" value="<?php echo $youtube_url ?>" class="text-box" />
            </div>
            <div class="row">
                <label>Video title:</label>
                <input type="text" name="title" value="<?php echo $title ?>" class="text-box" />
            </div>
            <input type="hidden" value="1" name="submit" />
            <input type="submit" value="add" />
        </form>
    </div>
    
</div>