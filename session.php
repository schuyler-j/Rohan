<?php require_once "db/dbconn.inc.php";

$sql = "SELECT FirstName FROM `users` WHERE Username = \"scol5\";";
//scol5 is a temp username, this needs to be a variable in the future
$sID = "SELECT SessionID FROM `users` WHERE Username = \"scol5\";";


?>