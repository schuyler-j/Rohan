<?php
session_start();
 
$_SESSION = array();
 
session_destroy();
 
header("location: login.php?msg=You%20Have%20Been%20Logged%20Out.");
exit;
?>