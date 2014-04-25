<?php

require("../include/config.php");

unset($_SESSION["USERID"]);
unset($_SESSION['username']);
session_destroy();

header("location:index.php");

?>