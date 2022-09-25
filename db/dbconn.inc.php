
<?php

require_once "db/secret.inc.php";

#define("DB_HOST", "localhost");
define("DB_HOST", "3.27.8.66");
define("DB_NAME", "ecom");
define("DB_USER", "ec2-user");
#define("DB_USER", "root");
define("DB_PASS", $secret);
#define("DB_PASS", "");

$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    // Something went wrong...
    echo "Error: Unable to connect to database.<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}

session_start();
$_SESSION["wishcount"] = 0;
$added = 'Add To Wishlist';
if(isset($_SESSION["active"]) && $_SESSION["active"]){
    $userid = $_SESSION["id"];
}else{
    $userid = "";
}
$wishc = "SELECT * FROM `wishlists` WHERE userID = $userid;";
if($w = mysqli_query($conn, $wishc)){
    if(mysqli_num_rows($w) > 0){
        while($rw = mysqli_fetch_assoc($w)){
                $_SESSION["wishcount"] = $_SESSION["wishcount"] + 1;
        }
    }
}else{
    $_SESSION["wishcount"] = 0;
}

?>
