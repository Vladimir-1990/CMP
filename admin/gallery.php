<?php

require("../include/config.php");

$USERID = $_SESSION['USERID'];

check_login($USERID);

include("header.php");

$submit = $_POST['submit'];
if($submit == 1)
{
    
}

?>

<div id="content">
    <h1 class="page_title">Gallery</h1>
    
    <table id="projects">
        <thead>
            <tr>
                <th>ID</th>
                <th>image title</th>
                <th>image</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
                $select_all = "SELECT * FROM gallery";
                $result = mysqli_query($link,$select_all);
                while($record = mysqli_fetch_array($result))
                {
                    $IID = $record['IID'];
                    $image = $record['image_thumb'];
                    $image_title = $record['image_title'];
    
                    echo "
                    <tr>
                        <td>$IID</td>
                        <td>$image_title</td>
                        <td><img style='width:100px' src='../images/gallery/$image'</td>
                        <td><a class='delete' id='$IID' data-type='IID' href='#'>delete</a>
                    </tr>
                    ";
                }
            
            ?>
        </tbody>
    </table>
    <a class="add_new_link" href="add_new_image.php">Add new image</a>    
    
</div>