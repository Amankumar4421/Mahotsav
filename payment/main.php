<?php

//Set the session timeout for 1800 seconds 30 minutes
$timeout = 1800;

//Set the maxlifetime of the session
ini_set( "session.gc_maxlifetime", $timeout );

//Set the cookie lifetime of the session
ini_set( "session.cookie_lifetime", $timeout );

//Start a new session
session_start();

//Set the default session name
$s_name = session_name();

//Check the session exists or not
if(isset( $_COOKIE[ $s_name ] )) {
    setcookie( $s_name, $_COOKIE[ $s_name ], time() + $timeout, '/' );
    include("test.php");
    header("refresh:1800");
    

    
} else {
   
    
session_unset();
session_destroy();
$url = "index.html";
header( "refresh:1;URL=".$url);

}
?>
