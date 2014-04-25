<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

$DBTYPE = 'mysql';
$DBHOST = 'localhost';
$DBUSER = 'orangesc_cmp';
$DBPASSWORD = 'cmp!11';
$DBNAME = 'orangesc_cmp';
$link = mysqli_connect("$DBHOST", "$DBUSER", "$DBPASSWORD", "$DBNAME");

include("functions.php");

?>