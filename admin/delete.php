<?php
require("../include/config.php");
$ID = $_POST['id'];
$type = $_POST['type'];

if($type == 'MID')
{
    $table = "movies";
    $type = "MID";
}
else if($type == "IID")
{
    $table = "gallery";
    $type = "IID";
}
else if($type == "TID")
{
    $table = "theatre";
    $type = "TID";
}
else if($type == "TVID")
{
    $table = "cmp_tv";
    $type = "TVID";
}
$sql_delete = "DELETE FROM $table WHERE $type = '$ID'";
mysqli_query($link,$sql_delete);
echo "deleted";
?>