<?php

$page = 'now_showing';
require("include/config.php");
include("header.php");

?>

<div id="content">

    <div class="listing_top">
        <h1>ISQH BRANDY</h1> 
    </div>
    <div class="listing_content">
        <div class="top_images">
            <div class="image_holder">
                <img src="images/listings_images/01.jpg" />
            </div>
            <div class="image_holder">
                <img src="images/listings_images/02.jpg" />
            </div> 
            <div class="image_holder">
                <img src="images/listings_images/03.jpg" />
            </div> 
            <div class="image_holder">
                <img src="images/listings_images/04.jpg" />
            </div> 
            <div class="image_holder">
                <img src="images/listings_images/05.jpg" />
            </div> 
            <div class="image_holder">
                <img src="images/listings_images/06.jpg" />
            </div>     
        </div>
        <div class="tabs_listing">
            <div class="box" data-tab="tab_1">
                Australia
            </div>
            <div class="box" data-tab="tab_2">
                India
            </div>
            <div class="box" data-tab="tab_3">
                UK
            </div>
            <div class="box" data-tab="tab_4">
                Canada
            </div>
        </div>
  
    
        <div class="listing_holder">
            <div id="tab_1" class="map">
                <?php
                $MID = $_GET['MID'];
                $sql_select_distinct = "SELECT DISTINCT (city) FROM theatre WHERE country = 'aus' AND MID = '$MID'";
                $result_distinct = mysqli_query($link,$sql_select_distinct);
                while($record_distinct = mysqli_fetch_array($result_distinct))
                {
                ?>
            
                    <div class="listing">
                        <div class="left">
                           <h2 class='title'><?php echo $record_distinct['city']?></h2>
                        </div>
                        <div class="right">
                        <?php
                        $sql_select_aus = "SELECT * FROM theatre WHERE country = 'aus' AND MID = '$MID' AND city = '$record_distinct[city]'";
                        $result_aus = mysqli_query($link,$sql_select_aus);
                        while($record_aus = mysqli_fetch_array($result_aus))
                        {
                            ?>
                            <div class="ticket">
                                <h3><?php echo $record_aus['venue']; ?></h3>
                                <p>
                                    <?php echo $record_aus['address']; ?> 
                                    <br />
                                    Ph: <?php echo $record_aus['phone']; ?>
                                </p>
                                
                                <p>
                                    Daily exc. <?php echo $record_aus['daily_exc']; ?>
                                    <br />
                                    <?php echo $record_aus['date']; ?>
                                </p>
                                <a href="#">Book Now</a>
                            </div>
                        <?php 
                        }
                        ?>
                            
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            
            <div id="tab_2" class="map" style="display: none;">
                <?php
                $MID = $_GET['MID'];
                $sql_select_distinct = "SELECT DISTINCT (city) FROM theatre WHERE country = 'ind' AND MID = '$MID'";
                $result_distinct = mysqli_query($link,$sql_select_distinct);
                while($record_distinct = mysqli_fetch_array($result_distinct))
                {
                ?>
            
                    <div class="listing">
                        <div class="left">
                           <h2 class='title'><?php echo $record_distinct['city']?></h2>
                        </div>
                        <div class="right">
                        <?php
                        $sql_select_aus = "SELECT * FROM theatre WHERE country = 'ind' AND MID = '$MID' AND city = '$record_distinct[city]'";
                        $result_aus = mysqli_query($link,$sql_select_aus);
                        while($record_aus = mysqli_fetch_array($result_aus))
                        {
                            ?>
                            <div class="ticket">
                                <h3><?php echo $record_aus['venue']; ?></h3>
                                <p>
                                    <?php echo $record_aus['address']; ?> 
                                    <br />
                                    Ph: <?php echo $record_aus['phone']; ?>
                                </p>
                                
                                <p>
                                    Daily exc. <?php echo $record_aus['daily_exc']; ?>
                                    <br />
                                    <?php echo $record_aus['date']; ?>
                                </p>
                                <a href="#">Book Now</a>
                            </div>
                        <?php 
                        }
                        ?>
                            
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            
            <div id="tab_3" class="map" style="display: none;">
                <?php
                $MID = $_GET['MID'];
                $sql_select_distinct = "SELECT DISTINCT (city) FROM theatre WHERE country = 'uk' AND MID = '$MID'";
                $result_distinct = mysqli_query($link,$sql_select_distinct);
                while($record_distinct = mysqli_fetch_array($result_distinct))
                {
                ?>
            
                    <div class="listing">
                        <div class="left">
                           <h2 class='title'><?php echo $record_distinct['city']?></h2>
                        </div>
                        <div class="right">
                        <?php
                        $sql_select_aus = "SELECT * FROM theatre WHERE country = 'uk' AND MID = '$MID' AND city = '$record_distinct[city]'";
                        $result_aus = mysqli_query($link,$sql_select_aus);
                        while($record_aus = mysqli_fetch_array($result_aus))
                        {
                            ?>
                            <div class="ticket">
                                <h3><?php echo $record_aus['venue']; ?></h3>
                                <p>
                                    <?php echo $record_aus['address']; ?> 
                                    <br />
                                    Ph: <?php echo $record_aus['phone']; ?>
                                </p>
                                
                                <p>
                                    Daily exc. <?php echo $record_aus['daily_exc']; ?>
                                    <br />
                                    <?php echo $record_aus['date']; ?>
                                </p>
                                <a href="#">Book Now</a>
                            </div>
                        <?php 
                        }
                        ?>
                            
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            
            <div id="tab_4" class="map" style="display: none;">
                <?php
                $MID = $_GET['MID'];
                $sql_select_distinct = "SELECT DISTINCT (city) FROM theatre WHERE country = 'cnd' AND MID = '$MID'";
                $result_distinct = mysqli_query($link,$sql_select_distinct);
                while($record_distinct = mysqli_fetch_array($result_distinct))
                {
                ?>
            
                    <div class="listing">
                        <div class="left">
                           <h2 class='title'><?php echo $record_distinct['city']?></h2>
                        </div>
                        <div class="right">
                        <?php
                        $sql_select_aus = "SELECT * FROM theatre WHERE country = 'cnd' AND MID = '$MID' AND city = '$record_distinct[city]'";
                        $result_aus = mysqli_query($link,$sql_select_aus);
                        while($record_aus = mysqli_fetch_array($result_aus))
                        {
                            ?>
                            <div class="ticket">
                                <h3><?php echo $record_aus['venue']; ?></h3>
                                <p>
                                    <?php echo $record_aus['address']; ?> 
                                    <br />
                                    Ph: <?php echo $record_aus['phone']; ?>
                                </p>
                                
                                <p>
                                    Daily exc. <?php echo $record_aus['daily_exc']; ?>
                                    <br />
                                    <?php echo $record_aus['date']; ?>
                                </p>
                                <a href="#">Book Now</a>
                            </div>
                        <?php 
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