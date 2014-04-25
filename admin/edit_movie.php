<?php

require("../include/config.php");

$USERID = $_SESSION['USERID'];

check_login($USERID);

include("header.php");

$MID = $_GET['MID'];
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
    
    $trailer_db = 'http://'.$trailer;
    $web_site_db = 'http://'.$web_site;
    
    $location = '../images/movie_images/';
    if (!empty($image['name']))
    {
        $img_name_image = $MID.'_image';
        $image_db = upload_image($image, $location, $img_name_image);
        $sql_image = ",image = '$image_db'"; 
    }
    else
    {
        $sql_image = NULL;
    }
    
    if (!empty($slider_image['name']))
    {
        $img_name_slider = $MID.'_slider';
        $slider_db = upload_image($slider_image, $location, $img_name_slider);
        $sql_slider_image = ",slider_image = '$slider_db'";
    }
    else
    {
        $sql_slider_image = NULL;
    }
    
    $sql_update = "UPDATE movies SET movie_name = '$movie_name', trailer = '$trailer_db', youtube_id = '$youtube_id',
    web_site = '$web_site_db', release_date = '$release_date', director = '$director', runtime = '$runtime', featured = '$featured', now_showing = '$now_showing',
    coming_soon = '$coming_soon', star_cast = '$star_cast', synopsis = '$synopsis', slider = '$slider' $sql_image $sql_slider_image WHERE MID = '$MID'";
    mysqli_query($link,$sql_update);
    $done = 1;  
}
?>
<div id="content">
    <?php

    $select = "SELECT * FROM movies WHERE MID = '$MID'";
    $result = mysqli_query($link,$select);
    while($record = mysqli_fetch_array($result))
    {
        $movie_name = $record['movie_name'];
        $image = $record['image'];
        $slider_image = $record['slider_image'];
        $trailer = $record['trailer'];
        $web_site = $record['web_site'];
        $release_date = $record['release_date'];
        $runtime = $record['runtime'];
        $director = $record['director'];
        $featured = $record['featured'];
        $now_showing = $record['now_showing'];
        $coming_soon = $record['coming_soon'];
        $star_cast = $record['star_cast'];
        $synopsis = $record['synopsis'];
        $slider = $record['slider'];        
    }
    
    $trailer_pieces = explode('://',$trailer);
    $trailer_show = $trailer_pieces[1];
    
    $web_site_pieces = explode('://',$web_site);
    $web_site_show = $web_site_pieces[1];

    ?>
    <h1 class="page_title">Edit movie</h1>
    <?php
    if($done == 1)
    {
        echo "<div class='message'>Movie edited</div>";
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
                <div class="edit_image_holder">
                    <img src="../images/movie_images/<?php echo $image; ?>" />
                </div>
            </div>
            <div class="row">
                <label>Slider_image</label>
                <input type="file" name="slider_image" class="text-box file" />
                <div class="edit_image_holder">
                    <img src="../images/movie_images/<?php echo $slider_image; ?>" />
                </div>
            </div>
            <div class="row">
                <label>Trailer Link (youtube):</label>
                <input type="text" name="trailer" class="text-box" value="<?php echo $trailer_show ?>" />
            </div>
            <div class="row">
                <label>Web Site</label>
                <input type="text" name="web_site"  class="text-box" value="<?php echo $web_site_show ?>" />
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
                <input type="checkbox" name="featured" value="1" class="text-box" <?php if ($featured == 1) echo "checked" ?> />
            </div>
            <div class="row">
                <label>Now showing</label>
                <input type="checkbox" name="now_showing" value="1" class="text-box" <?php if ($now_showing == 1) echo "checked" ?> />
            </div>
            <div class="row">
                <label>Coming soon</label>
                <input type="checkbox" name="coming_soon" value="1" class="text-box" <?php if ($coming_soon == 1) echo "checked" ?> />
            </div>
            <div class="row">
                <label>On slider:</label>
                <input type="checkbox" name="slider" value="1" class="text-box" <?php if ($slider == 1) echo "checked" ?> />
            </div>
            <input type="hidden" value="1" name="submit" />
            <input type="submit" value="save" />
            
        </form>
    </div>
    
</div>

<?php

include("footer.php");

?>