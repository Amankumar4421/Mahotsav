<?php
session_start();

session_unset();
session_destroy();

$url = "index.html";
header( "refresh:1;URL=".$url);


?>