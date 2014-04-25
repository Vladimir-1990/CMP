<?php

require("../include/config.php");

$USERID = $_SESSION['USERID'];

check_login($USERID);

include("header.php");

$submit = $_POST['submit'];
if($submit == 1)
{
    $MID = $_POST['MID'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $venue = $_POST['venue'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $daily_exc = $_POST['daily_exc'];
    $date = $_POST['date'];
    
    $sql_insert = "INSERT INTO theatre SET MID = '$MID', country = '$country', city = '$city', venue = '$venue', address = '$address', phone = '$phone', daily_exc = '$daily_exc', date = '$date'";
    mysqli_query($link,$sql_insert);
    $done = 1;
}

?>
<div id="content">
    <h1 class="page_title">Add theatre details</h1>
    <?php
    if($done == 1)
    {
        echo "<div class='message'>Theatre date added</div>";
    }
    ?>
    <div class="form">
        <form action="" method="POST">
            <div class="row">
                <label>Movie:</label>
                <select name="MID">
                    <option value="0">Choose</option>
                    <?php
                    $sql_select_all = "SELECT movie_name,MID FROm movies";
                    $result_all = mysqli_query($link,$sql_select_all);
                    while($record_all = mysqli_fetch_array($result_all))
                    {
                        echo "<option value='$record_all[MID]'>$record_all[movie_name]</option>"; 
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <label>Country:</label>
                <select name="country">
                    <option value="0">Choose</option>
                    <option value="aus">Australia</option>
                    <option value="ind">India</option>
                    <option value="uk">UK</option>
                    <option value="cnd">Canada</option>
                </select>
            </div>
            <div class="row">
                <label>City:</label>
                <input type="text" name="city" class="text-box" value="<?php echo $city ?>" />
            </div>
            <div class="row">
                <label>Venue:</label>
                <input type="text" name="venue" class="text-box" value="<?php echo $venue ?>" />
            </div>
            <div class="row">
                <label>Address:</label>
                <input type="text" name="address" class="text-box" value="<?php echo $address ?>" />
            </div>
            <div class="row">
                <label>Phone:</label>
                <input type="text" name="phone" class="text-box" value="<?php echo $address ?>" />
            </div>
            <div class="row">
                <label>Daily Exc.</label>
                <input type="text" name="daily_exc" class="text-box" value="<?php echo $daily_exc ?>" />
            </div>
            <div class="row">
                <label>Date</label>
                <input type="text" name="date" class="text-box" value="<?php echo $date ?>" />
            </div>
            
            <input type="hidden" value="1" name="submit" />
            <input type="submit" value="save" />
            
        </form>
    </div>
    
</div>

<?php

include("footer.php");

?>