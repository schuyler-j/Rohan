<!DOCTYPE html>
<html lang="en">

<head>
    <title>Community</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Team_Rohan" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/community.css" />
    <link rel="icon" href="images/favicon.png">
    <script src="scripts/script.js" defer></script>
</head>
<?php
require_once "db/dbconn.inc.php";
/*
session_start();
*/
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

<body >
    <div class="top_third">
        <div class="menu_container">
            <h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="images/watchlist.png" />
                <a class="nav_links" href="wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")"?></a>
                <img src="images/cart.png" />
                <a class="nav_links" href="cart.php">My Cart</a>
                <img src="images/checkout.png" />
                <a class="nav_links" href="checkout.php">Checkout</a>
                <img src="images/login.png" />
                <?php
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    echo "<a class = 'nav_links' href='logout.php'>Logout</a>";

                    $product_sql = "SELECT * FROM `products`;";
                    $psql = mysqli_query($conn, $product_sql);
                    $row = mysqli_fetch_assoc($psql);


                    $msg = "";


                    $total = 0;
                    $creditcard = $_SESSION["creditcard"];
                    $addr = $_SESSION["addr"];
                    $userid = $_SESSION["id"];

                    $productid = 0;
                } else {
                    echo
                    "<a class = 'nav_links' href='login.php'>Login</a>
                    ";

                    $addcart = 'error.php';
                    $addwish = 'error.php';
                    $msg = "?msg=Please%20login%20or%20create%20an%20account.";
                }
                ?>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="community-landing.php" id="selected"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>
    <!--beginning of item grid list-->
    <div class="page_wrapper">
        <div class="title">Welcome to the Community Marketplace
        <div class="desc">You can browse the marketplace to find items that community members are selling or you can upload your own items for sale</div>
        </div>
        <div class="grid" id="comlandgrid">
            <a href="community.php">
            <div class="item_list_wrapper" id="cardA">
                <div class="grid_img"><img id="buypng" src="images/buy.png"/></div>
                <div class="card_title"><h2>BUY</h2></div>
            </div></a>
            <div class="h_spacer"></div>
            <a href="community-upload.php">
            <div class="item_list_wrapper" id="cardB">
                <div class="grid_img"><img id="sellpng" src="images/sell.png"/></div>
                <div class="card_title"><h2>SELL</h2></div>
            </div></a>

        </div>
    </div>
    <div class="pages" style="text-align: center;">
        <a href="community.php">^ Back to Top ^</a>
    </div>
    <div class="footer">
        <h4>Thomas Hobbs | Udall Liao | Jay Schuyler</h4>
    </div>
</body>

</html>