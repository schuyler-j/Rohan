<?php

require_once "db/secret.inc.php";

define("DB_HOST", "3.27.8.66");
define("DB_NAME", "ecom");
define("DB_USER", "ec2-user");
define("DB_PASS", $secret);

$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    // Something went wrong...
    echo "Error: Unable to connect to database.<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}

?>
