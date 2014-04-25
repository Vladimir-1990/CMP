<?php

require("../include/config.php");

$USERID = $_SESSION['USERID'];

check_login($USERID);

include("header.php");

$submit = $_POST['submit'];
if($submit == 1)
{
    $done = 0;
    $movie_name = $_POST["movie_name"];
    $image = $_FILES["image"];
    $slider_image = $_FILES["slider_image"];
    $trailer = $_POST["trailer"];
    $web_site = $_POST["web_site"]; 
    $release_date = $_POST["release_date"];
    $runtime = $_POST["runtime"];
    $director = $_POST["director"];
    $featured = $_POST["featured"];
    $now_showing = $_POST["now_showing"];
    $coming_soon = $_POST["coming_soon"];
    $star_cast = $_POST["star_cast"];
    $synopsis = $_POST["synopsis"];
    $slider = $_POST["slider"];
    
    $movie_name = prep_input($movie_name);
    $trailer = prep_input($trailer);
    $web_site = prep_input($web_site);
    $release_date = prep_input($release_date);
    $runtime = prep_input($runtime);
    $director = prep_input($director);
    $featured = prep_input($featured);
    $now_showing = prep_input($now_showing);
    $coming_soon = prep_input($coming_soon);
    $star_cast = prep_input($star_cast);
    $synopsis = prep_input($synopsis);
    
    $youtube_id_parts = explode('=',$trailer);
    $youtube_id = $youtube_id_parts[1];
    
    $sql_insert = "INSERT INTO movies SET movie_name = '$movie_name', trailer = '$trailer', youtube_id = '$youtube_id',
    web_site = '$web_site', release_date = '$release_date', director = '$director', runtime = '$runtime', featured = '$featured', now_showing = '$now_showing',
    coming_soon = '$coming_soon', star_cast = '$star_cast', synopsis = '$synopsis', slider = '$slider'";
    
    mysqli_query($link,$sql_insert);  
    $MID = mysqli_insert_id($link);
    $location = '../images/movie_images/';
    
    if(!empty($image))
    {
        $image_uploaded = $MID.'_image';
        $image_db = upload_image($image, $location, $image_uploaded);
    }
    
    if(!empty($slider_image))
    {
        $slider_image_uploaded = $MID.'_slider';
        $slider_image_db = upload_image($slider_image, $location, $slider_image_uploaded);
    }
    
    $sql_update = "UPDATE movies SET image = '$image_db', slider_image = '$slider_image_db' WHERE MID = '$MID'";
    mysqli_query($link,$sql_update);
    $done = 1;  
}
?>
<div id="content">
    <h1 class="page_title">Add movie</h1>
    <?php
    if($done == 1)
    {
        echo "<div class='message'>Movie added</div>";
    }
    ?>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <label>Movie Name:</label>
                <input type="text" name="movie_name" value="<?php echo $movie_name ?>" class="text-box" />
            </div>
            <div class="row">
                <label>Image:</label>
                <input type="file" name="image" class="text-box file" />
                <small></small>
            </div>
            <div class="row">
                <label>Slider_image</label>
                <input type="file" name="slider_image" class="text-box file" />
                <small></small>
            </div>
            <div class="row">
                <label>Trailer Link (youtube):</label>
                <input type="text" name="trailer" class="text-box" value="<?php echo $trailer ?>" />
            </div>
            <div class="row">
                <label>Web Site</label>
                <input type="text" name="web_site" value="<?php echo $web_site ?>"  class="text-box" />
            </div>
            <div class="row">
                <label>Release_date</label>
                <input type="text" name="release_date" value="<?php echo $release_date ?>"  class="text-box" />
            </div>
            <div class="row">
                <label>Runtime:</label>
                <input type="text" name="runtime" value="<?php echo $runtime ?>"  class="text-box" />
            </div>
            <div class="row">
                <label>Director:</label>
                <input type="text" name="director" value="<?php echo $director ?>"  class="text-box" />
            </div>
            <div class="row">
                <label>Star cast</label>
                <textarea name="star_cast" class="text_box_large"><?php echo $star_cast ?></textarea> 
            </div>
            <div class="row">
                <label>Synopsis</label>
                <textarea name="synopsis" class="text_box_large"><?php echo $synopsis ?></textarea> 
            </div>
            <div class="row">
                <label>Featured</label>
                <input type="checkbox" name="featured" value="1" class="text-box" />
            </div>
            <div class="row">
                <label>Now showing</label>
                <input type="checkbox" name="now_showing" value="1" class="text-box" />
            </div>
            <div class="row">
                <label>Coming soon</label>
                <input type="checkbox" name="coming_soon" value="1" class="text-box" />
            </div>
            <div class="row">
                <label>On slider:</label>
                <input type="checkbox" name="slider" value="1" class="text-box" />
            </div>
            <input type="hidden" value="1" name="submit" />
            <input type="submit" value="add" />
            
        </form>
    </div>
    
</div>

<?php

include("footer.php");

?>