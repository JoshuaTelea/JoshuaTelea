<?php
 session_start();

$_SESSION = array();
    session_destroy();
	
header("Location: http://jot0501website.zapto.org/index.html");
?>