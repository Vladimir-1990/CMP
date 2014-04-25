<?php

$page = 'now_showing';
require("include/config.php");
include("header.php");

?>

<div id="content">

    <div class="now_showing_top">
        <h1>NOW SHOWING</h1>
    </div>
    
    <?php
    $MID = $_GET['MID'];
    if(empty($MID))
    {
        
        $sql_select_last = "SELECT MID FROM movies WHERE now_showing = '1' ORDER BY MID DESC LIMIT 1";
        $result_last = mysqli_query($link,$sql_select_last);
        while($record_last = mysqli_fetch_array($result_last))
        {
            $MID = $record_last['MID'];
        }
    }
    else
    {
        $MID = $_GET['MID'];    
    }
    $sql_select_now_showing = "SELECT * FROM movies WHERE now_showing = '1' AND MID = '$MID'";
    $result_now_showing = mysqli_query($link,$sql_select_now_showing);
    while($record = mysqli_fetch_array($result_now_showing))
    {
    ?>
    <div class="now_showing_holder">
        <div class="image_holder">
            <img src="images/movie_images/<?php echo $record['image']; ?>" />
        </div>
        <div class="now_showing_content">
            <h2><?php echo $record['movie_name']; ?></h2>	
            <p>Relase Date: <span class="bold"><?php echo $record['release_date']; ?></span></p>
            <p>Runtime: <span class="bold"><?php echo $record['runtime']; ?></span></p>
            <p>Director: <span class="bold"><?php echo $record['director']; ?></span></p>
            <h3>Star Cast</h3>
            <p><?php echo $record['star_cast']; ?></p>
            <h3>Synopsis</h3>
            <p><?php echo $record['synopsis']; ?></p>
            <a href="<?php echo $record['trailer']; ?>" target="_blank" class="button" style="width: 135px;background-color: #D63328;">Watch Trailer</a>
            <a href="individual.php?MID=<?php echo $record['MID']; ?>" class="button" style="width: 200px;background-color: #565656;">Show Times and Book</a>
        </div>       
    </div>
    <?php
    }
    ?>
</div>

<?php

include("footer.php");

?>