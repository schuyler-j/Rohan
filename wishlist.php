<!DOCTYPE html>
<html lang="en">
<head>
<title>Wishlist</title>
<meta charset="UTF-8" />
<meta name="author" content="TUJ_Rohan" />
<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="styles/footer.css" />
<link rel="icon" href="images/favicon.png">
<script src="scripts/script.js" defer></script>
</head>

<body>

<?php
session_start();

require_once "db/dbconn.inc.php";
require_once "addcart.php";

$sql = "SELECT * FROM `wish` WHERE userID = $userid;";
$sqli = $conn->query($sql);
$row = $sqli->fetch_assoc();

$ss = "SELECT * FROM `products`;";
$s = $conn->query($ss);
$prod = $s->fetch_assoc();

echo "wishlist<br/>";

if($wishlist = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($wishlist)>0){
        while($row = mysqli_fetch_assoc($wishlist)){
            echo $prod["pName"];
        }
    }
}


?>


</body>
  
</html>
