<?php

$page = 'cmp';
require("include/config.php");
include("header.php");

?>

<div id="content">
    <div class="cmp_tv">
        <div class="frame">
            <div class="video_holder">
                <?php
                $sql_select_first = "SELECT * FROM cmp_tv ORDER BY TVID DESC LIMIT 1";
                $result_first = mysqli_query($link,$sql_select_first);
                while($record_first = mysqli_fetch_array($result_first))
                {
                    echo "<iframe class='iframe' width='1150' height='550' src='//www.youtube.com/embed/$record_first[youtube_id]?rel=0' frameborder='0' allowfullscreen></iframe>";
                }
                ?>  
            </div>
            <div class="video_list" >
            <?php
            $sql_select_all = "SELECT * FROM cmp_tv";
            $result = mysqli_query($link,$sql_select_all);
            while($record = mysqli_fetch_array($result))
            {
            ?>
                <div class="tv_box" data-youtube="<?php echo $record['youtube_id']; ?>">
                    <img src="http://img.youtube.com/vi/<?php echo $record['youtube_id']; ?>/hqdefault.jpg" />
                    <div class="tv_img_cover">
                        <p><?php echo $record['title']; ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>

<?php

include("footer.php");

?>