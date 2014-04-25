<?php

require("../include/config.php");

$submit = $_POST['submit'];
if($submit == "1")
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = prep_input($username);
    $password = prep_input($password);
    
    $password = md5($password);
    $sql_select_user = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result_select_user = mysqli_query($link,$sql_select_user);
    $row = mysqli_fetch_array($result_select_user,MYSQLI_ASSOC);

    $db_username = $row['username'];
    $db_password = $row['password'];
    $USERID = $row['USERID'];
        
    if($db_username == $username AND $db_password == $password)
    {   
        $_SESSION['USERID'] = $USERID;
        $_SESSION['username'] = $username;
        $time = date("d.m.Y,G:i:s");
        header("location:home.php");
    }
    else
    {
        echo "Access Denied"; 
    }
}


?>