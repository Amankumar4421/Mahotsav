<?php

session_start();
session_unset();
session_destroy();

$url = "index.php";
        header( "refresh:2;URL=".$url);

?>