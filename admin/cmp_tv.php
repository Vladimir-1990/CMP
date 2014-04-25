<?php

require("../include/config.php");

$USERID = $_SESSION['USERID'];

check_login($USERID);

include("header.php")
?>

<div id="content">
    <h1 class="page_title">CMP TV</h1>

    <table id="projects">
        <thead>
            <tr>
                <th style="width: 20px;">ID</th>
                <th style="width: 350px;">title</th>
                <th style="width: 100px;">thumb</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
                $select_all = "SELECT * FROM cmp_tv";
                $result = mysqli_query($link,$select_all);
                while($record = mysqli_fetch_array($result))
                {
                    $TVID = $record['TVID'];
                    $title = $record['title'];
                    $youtube_id = $record['youtube_id'];
                    
                    echo "
                    <tr>
                        <td>$TVID</td>
                        <td>$title</td>
                        <td><img class='youtube_image' src='http://img.youtube.com/vi/$youtube_id/hqdefault.jpg' />
                        <td><a class='delete' id='$TVID' data-type='TVID' href='#'>delete</a>
                    </tr>
                    ";
                }
            
            ?>
        </tbody>
    </table>
    
    <a class="add_new_link" href="add_new_video.php">Add new</a>
</div>

<?php

include("footer.php");

?>