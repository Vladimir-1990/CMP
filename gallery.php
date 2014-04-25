<?php

$page = 'gallery';
require("include/config.php");
include("header.php");

?>

<div id="content">

    <div class="gallery_top">
        <h1>GALLERY</h1>
        <select name="select_gallery" class="select_gallery">
            <option value="0">Select Gallery</option>
            <option value="1">1</option>
            <option value="1">2</option>
        </select>        
    </div>
    <?php
    $sql_select_all = "SELECT * FROM gallery";
    $rows = count_rows($sql_select_all);
    
    $per_page = 12;
    $curr_page = ( isset($_GET['page']) ) ? intval( $_GET['page'] ) : 1;	
    $total_pages = ceil($rows/$per_page);
    $start = abs( ($curr_page-1)*$per_page );
    $sql_select = "SELECT * FROM gallery ORDER BY IID DESC LIMIT ".intval($start).", ".intval($per_page);
    ?>
    <div class="gallery_holder">
        <div class="pagination">
            <?php
            if($curr_page == 1)
            {
                echo '<a class="pagination_link prev" href="#">Previous</a>';
            }
            else
            {
                echo '<a class="pagination_link prev" href="gallery.php?page='.intval($curr_page-1).'">Previous</a>';
            }
      
            ?>
            <div class="pages">
                <?php
                for($i=1;$i<=$total_pages;$i++)
                {
                    if($i == $curr_page)
                    {
                        echo '<a class="active" href="gallery.php?page='.$i.'">0'.$i.' </a>';
                    }
                    else
                    {
                        echo '<a href="gallery.php?page='.$i.'">0'.$i.' </a>';
                    }
                }
                ?>
            </div>
            <?php
            if($curr_page == $total_pages)
            {
                echo '<a class="pagination_link next" href="#">Next</a>';   
            }
            else
            {
                echo '<a class="pagination_link next" href="gallery.php?page='.intval($curr_page+1).'">Next</a>';
            }
            ?>   
        </div>

        <div class="gallery_images">
        <?php
        $result = mysqli_query($link,$sql_select);
        while($record = mysqli_fetch_array($result))
        {
        ?>
            <div class="image_holder">
                <img src="images/gallery/<?php echo $record['image_thumb']; ?>" class="gallery_thumbs" alt="<?php echo $record['image_title']; ?>" />
                <div class="image_cover">
                    <div class="circle">
                        <div class="x-side"></div>
                        <div class="y-side"></div>
                    </div>
                </div>
                <div class="big_image_popup">
                    <img src="images/gallery/<?php echo $record['image_big']; ?>" alt="<?php echo $record['image_title']; ?>" class="gallery_big" />
                    <a href="#"><img src="images/close.png" class="popupBoxClose" /></a> 
                </div>
            </div>
        <?php
        }
        ?>    
        </div>
        <div class="pagination">
            <?php
            if($curr_page == 1)
            {
                echo '<a class="pagination_link prev" href="#">Previous</a>';
            }
            else
            {
                echo '<a class="pagination_link prev" href="gallery.php?page='.intval($curr_page-1).'">Previous</a>';
            }
      
            ?>
            <div class="pages">
                <?php
                for($i=1;$i<=$total_pages;$i++)
                {
                    if($i == $curr_page)
                    {
                        echo '<a class="active" href="gallery.php?page='.$i.'">0'.$i.' </a>';
                    }
                    else
                    {
                        echo '<a href="gallery.php?page='.$i.'">0'.$i.' </a>';
                    }
                }
                ?>
            </div>
            <?php
            if($curr_page == $total_pages)
            {
                echo '<a class="pagination_link next" href="#">Next</a>';   
            }
            else
            {
                echo '<a class="pagination_link next" href="gallery.php?page='.intval($curr_page+1).'">Next</a>';
            }
            ?>   
        </div>
    </div>

</div>

<?php

include("footer.php");

?>