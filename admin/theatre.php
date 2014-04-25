<?php

require("../include/config.php");

$USERID = $_SESSION['USERID'];

check_login($USERID);

include("header.php")
?>

<div id="content">
    <h1 class="page_title">Theatre Events</h1>

    <table id="projects">
        <thead>
            <tr>
                <th style="width: 20px;">ID</th>
                <th style="width: 100px;">country</th>
                <th style="width: 50px;">city</th>
                <th style="width: 300px;">movie name</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
                $select_all = "SELECT * FROM theatre";
                $result = mysqli_query($link,$select_all);
                while($record = mysqli_fetch_array($result))
                {
                    $TID = $record['TID'];
                    $country = $record['country'];
                    $city = $record['city'];
                    $MID = $record['MID'];
        
                    $sql_select_movie = "SELECT movie_name FROM movies WHERE MID = '$MID'";
                    $result_movie = mysqli_query($link,$sql_select_movie);
                    while($record_movie = mysqli_fetch_array($result_movie))
                    {
                        $movie_name = $record_movie['movie_name'];    
                    }
                    
                    switch ($country) {
                    case 'aus':
                        $country = "Australia";
                        break;
                    case 'ind':
                        $country = "India";
                        break;
                    case 'uk':
                        $country = "United Kingodm";
                        break;
                    case 'cnd':
                        $country = "Canada";
                        break;
                    }
                    echo "
                    <tr>
                        <td>$TID</td>
                        <td>$country</td>
                        <td>$city</td>
                        <td>$movie_name</td>
                        
                        <td><a class='edit' href='edit_theatre.php?TID=$TID'>edit</a>
                        <td><a class='delete' id='$TID' data-type='TID' href='#'>delete</a>
                    </tr>
                    ";
                }
            
            ?>
        </tbody>
    </table>
    
    <a class="add_new_link" href="add_new_theatre.php">Add new</a>
</div>

<?php

include("footer.php");

?>