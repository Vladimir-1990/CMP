<?php

require("../include/config.php");

$USERID = $_SESSION['USERID'];

check_login($USERID);

include("header.php")
?>

<div id="content">
    <h1 class="page_title">All Movies</h1>

    <table id="projects">
        <thead>
            <tr>
                <th style="width: 20px;">ID</th>
                <th style="width: 350px;">name</th>
                <th style="width: 10px;">slider</th>
                <th style="width: 10px;">featured</th>
                <th style="width: 10px;">now showing</th>
                <th style="width: 10px;">coming soon</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
                $select_all = "SELECT * FROM movies";
                $result = mysqli_query($link,$select_all);
                while($record = mysqli_fetch_array($result))
                {
                    $MID = $record['MID'];
                    $name = $record['movie_name'];
                    $slider = $record['slider'];
                    $featured = $record['featured'];
                    $now_showing = $record['now_showing'];
                    $coming_soon = $record['coming_soon'];
                    
                    echo "
                    <tr>
                        <td>$MID</td>
                        <td>$name</td>
                        <td>$slider</td>
                        <td>$featured</td>
                        <td>$now_showing</td>
                        <td>$coming_soon</td>
                        
                        <td><a class='edit' href='edit_movie.php?MID=$MID'>edit</a>
                        <td><a class='delete' id='$MID' data-type='MID' href='#'>delete</a>
                    </tr>
                    ";
                }
            
            ?>
        </tbody>
    </table>
    
    <a class="add_new_link" href="new_movie.php">Add new</a>
</div>

<?php

include("footer.php");

?>