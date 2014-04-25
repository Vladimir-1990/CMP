<?php

$page = 'index';
require("include/config.php");
include("header.php");

?>

<div id="content">
    <div id="banner-slide">
        <ul class="bjqs">
            <?php
            $sql_select_slider = "SELECT slider_image,movie_name,trailer,web_site,release_date,youtube_id FROM movies WHERE slider = '1' ORDER BY MID DESC";
            $result_slider = mysqli_query($link,$sql_select_slider);
            while($record = mysqli_fetch_array($result_slider))
            {
            ?>
                <li style="background-image: url('images/movie_images/<?php echo $record['slider_image']; ?>')">
                    <div class="slider_info">
                        <img class="slider_play_button" src="images/play_button.png" />
                        <p>COMING SOON</p>
                        <h1><?php echo $record['movie_name']; ?></h1>
                        <span>IN THEATERS <?php echo $record['release_date']; ?></span>
                        <br />
                        <a target="_blank" class="red_button website_link" href="<?php echo $record['web_site']; ?>">Visit Website</a>
                        <a class="red_button trailer_link" href="#">Watch Trailer</a>
                    </div>
                    <div class="big_image_popup">
                        <iframe class="video_player" width="960" height="550" src="//www.youtube.com/embed/<?php echo $record['youtube_id']; ?>?rel=0&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
                        <a href="#"><img src="images/close.png" class="popupBoxClose" /></a> 
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
    
    <div class="under_slider_box">
        <div id="now_showing">
            <?php
            $sql_select_now_showing = "SELECT image,movie_name,MID, youtube_id FROM movies WHERE now_showing = '1' ORDER BY MID DESC LIMIT 1";
            $result_now_showing = mysqli_query($link,$sql_select_now_showing);
            while($record = mysqli_fetch_array($result_now_showing))
            {
            
                ?>
                <div class="info">     
                    <img src="images/play_button.png" class="small_play_button" />
                    <span>Now Showing</span>
                    <h1><?php echo $record['movie_name']; ?></h1>
                    <a href="now_showing.php?MID=<?php echo $record["MID"] ?>">
                        <div class="line_menu">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </a>
                    
                </div>
                <img  class="now_showing_image" src="images/movie_images/<?php echo $record['image']; ?>" />
                <div class="big_image_popup">
                    <iframe class="video_player" width="960" height="550" src="//www.youtube.com/embed/<?php echo $record['youtube_id']; ?>?rel=0&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
                    <a href="#"><img src="images/close.png" class="popupBoxClose" /></a> 
                </div>
                
                <?php
            }
            ?>
        </div>
        
        <div id="coming_soon">
            <?php
            $sql_select_coming_soon = "SELECT image,movie_name,MID,youtube_id FROM movies WHERE coming_soon = '1' ORDER BY MID DESC LIMIT 1";
            $result_coming_soon = mysqli_query($link,$sql_select_coming_soon);
            while($record = mysqli_fetch_array($result_coming_soon))
            {
            
                ?>
                <div class="info">     
                    <img src="images/play_button.png" class="small_play_button" />
                    <span>Coming Soon</span>
                    <h1><?php echo $record['movie_name']; ?></h1>
                    <a href="coming_soon.php?MID=<?php echo $record["MID"] ?>">
                        <div class="line_menu">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </a>
                </div>
                <img class="now_showing_image" src="images/movie_images/<?php echo $record['image']; ?>" />
                <div class="big_image_popup">
                    <iframe class="video_player" width="960" height="550" src="//www.youtube.com/embed/<?php echo $record['youtube_id']; ?>?rel=0&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
                    <a href="#"><img src="images/close.png" class="popupBoxClose" /></a> 
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    
    <div class="featured">
        <h2>Featured this week</h2>
        <div class="featured_slider">
            <?php
            $sql_select_featured = "SELECT image,movie_name,trailer,release_date,coming_soon FROM movies WHERE featured = '1' ORDER BY MID DESC";
            $result_featured = mysqli_query($link,$sql_select_featured);
            while($record = mysqli_fetch_array($result_featured))
            {
                $trailer = $record['trailer'];
                $pieces = explode("=",$trailer);
                $youtube_id = $pieces[1];
            ?>
                <div class="video_holder">
                    <iframe class="featured_video" width="470" height="300" src="//www.youtube.com/embed/<?php echo $youtube_id ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                    <div class="video_info">
                        <h1 class="video_title"><?php echo $record['movie_name']; ?></h1>
                        <?php
                        if($record['coming_soon'] == "1")
                        {
                            echo "<p class='date'>Coming Soon</p>";
                        }
                        else
                        {
                            echo "<p class='date'>In Theaters $record[release_date]</p>";
                            
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    
</div>



<?php

include("footer.php");

?>