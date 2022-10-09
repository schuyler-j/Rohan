<!DOCTYPE html>
<html lang="en">
<head>
<title>Shopping</title>
<meta charset="UTF-8" />
<meta name="author" content="Team_Rohan" />
<link rel="stylesheet" href="../styles/style.css" />
<link rel="stylesheet" href="../styles/shopping.css" />
<link rel="icon" href="../images/favicon.png">
<script src="../scripts/script.js" defer></script>
<script src="../scripts/buttons.js" defer></script>
</head>
<?php 
require_once "../db/dbconn.inc.php"; 

/*
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
*/
?>

<body onload="ready()">
<div class="top_third">
    <div id="mc" class="menu_container">
        <h1 class="menu_title_s"><a href="../home/index.php">SENIOR</a></h1>
    </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png">
                <a class="nav_links" href="../nav/wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")"?></a>
                <img src="../images/cart.png">
                <?php
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    echo "
                        <a class='nav_links' href='../nav/cart.php'>My Cart</a>
                    ";
                }else{

                    echo "
                        <a class='nav_links' href='../home/error.php?msg=please%20login%20to%20view%20cart'>My Cart</a>
                    ";
                } ?>
                <img src="../images/checkout.png">
                <?php
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    echo "
                        <a class='nav_links' href='../nav/checkout.php'>Checkout</a>
                    ";
                }else{

                    echo "
                        <a class='nav_links' href='../home/error.php?msg=please%20login%20to%20checkout'>Checkout</a>
                    ";
                } ?>
                <img src="../images/login.png">
                <?php 
                if(isset($_SESSION["active"]) && $_SESSION["active"] === true){
                    echo "<a class = 'nav_links' href='../home/logout.php'>Logout</a>";
                    $product_sql = "SELECT * FROM `products`;";
                    $psql = mysqli_query($conn, $product_sql);
                    $row = mysqli_fetch_assoc($psql);


                    $msg = "";


                    $total = 0;
                    $creditcard = $_SESSION["creditcard"];
                    $addr = $_SESSION["addr"];
                    $userid = $_SESSION["id"];

                    $productid = 0;

                }else{
                    echo 
                    "<a class = 'nav_links' href='../nav/login.php'>Login</a>
                    ";
                    $addcart = '../home/error.php';
                    $addwish = '../home/error.php';
                    $msg = "?msg=Please%20login%20or%20create%20an%20account.";
                }
                ?>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="../home/index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="../community/community-landing.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="../home/shopping.php" id="selected"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="../home/about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="../home/contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
</div>
<div class="shopping_filters">
<form action="shopping.php" method="get">
        <div class="nav_title" id="search_title"><h2 class="title">Ready to find your next item? <br> Start searching here</h2></div>  
            
        <div class="search_container" method="POST">
            <label>Search: </label>
            <input type="text" name="search" placeholder="What would you like to look for?"/>

            <label for="location">Location:</label>
            <select name="location" id="location">
            <option
                value="all">All of Australia</option>    
            <option
                value="act">Australian Capital Territory</option>
                <option
                value="nsw">New South Wales</option>
                <option
                value="nt">Northern Territoty</option>
                <option
                value="qld">Queensland</option>
                <option
                value="sa">South Australia</option>
                <option
                value="tas">Tasmania</option>
                <option
                value="vic">Victoria</option>
                <option
                value="wa">Western Australia</option>
            </select>

            <label for="categories">Categories:</label>
            <select name="categories" id="categories">
            <option
                value="all">All Categories</option>    
            <option
                value="caravans-campervans">Caravans and Campervans</option>
                <option
                value="motorhomes">Motorhomes</option>
                <option
                value="camping-gear">Camping Gear</option>
                <option
                value="vehicles">Vehicles</option>
                <option
                value="trailers">Trailers</option>
                <option
                value="hobby-sports">Hobby/Sporting Equipment</option>
            </select>
            <input type="submit" value="Search" /><br>
        <div class ="shopping_links">    
            <img src="../images/shopping-bag.png"><a class="nav_links" href="shopping.php" id="main">Main Shopping Page</a>
            <img src="../images/cart.png"><a class="nav_links" href="../nav/cart.php">My Cart</a>
            <img src="../images/watchlist.png"><a class="nav_links" href="../nav/wishlist.php">Wishlist</a>
            <img src="../images/help.png"><a class="nav_links" href="help.php">Help</a>
            <img src="../images/clear-search.png"><a class="nav_links" href="shopping.php" id="reset_search">Clear Search</a>
        </div>    
        </div>
        <div class="overlay"></div>
    <!--beginning of item grid list-->
    <div class="page_wrapper">
        <div class="side_navbar">
            <div class="nav_title">
                <h2>Most Searched Items</h2>
            </div>
            <div class="link_box">
                <?php
                //check if user added to cart or wishlist
                if (isset($_GET["action"]) && $_GET["action"] == "ac") {
                    $_SESSION["productid"] = $_GET["id"];
                    $productid = $_SESSION["productid"];
                    $cart_sql = "INSERT INTO `cart` (`CartID`, `TotalPrice`, `Shipping`, `Payment`, `DoP`, `UserID`, `ProductID`, `CreditCard`) VALUES (CONNECTION_ID(), $total, '$addr', 'credit', CURRENT_DATE(), $userid, $productid, $creditcard);";
                    $update_stock = "UPDATE `products` SET `stockAmt` = (stockAmt - 1) WHERE `products`.`ProductID` = $productid;";
                    $statement = mysqli_stmt_init($conn);
                    $update_st = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($statement, $cart_sql);
                    mysqli_stmt_prepare($update_st, $update_stock);
                    mysqli_stmt_execute($statement);
                    mysqli_stmt_execute($update_st);
                }
                if(isset($_POST["submit"])) {
                    $str = $_POST["search"];
                    $location = $_POST["search"];
                    $category = $_POST["search"];
                    $sth = $conn -> prepare("SELECT * FROM `products` WHERE `pName` = '$str', `State`= '$location', `Category` ='$category'");
                    $sth->setFetchMode(PDO :: FETCH_OBJ);
                    $sth -> execute();

                    if($row = $sth->fetch()){
                        ?>
                        <br><br><br>
                        <?php
                    }
                }
                
                if(isset($_GET["action"]) && $_GET["action"] == "aw"){
                    $_SESSION["productid"] = $_GET["id"];
                    $productid = $_SESSION["productid"];
                    $w = "INSERT INTO `wishlists` (`wishID`, `userID`, `ProductID`) VALUES (CONNECTION_ID(), $userid, $productid);";
                    $wst = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($wst, $w);
                    mysqli_stmt_execute($wst);
                }

                $product_sql = "SELECT * FROM `products` WHERE cItem = 0 AND stockAmt > 0 AND onSale = 0 AND featured = 0;";
                if ($prod_result = mysqli_query($conn, $product_sql)) {
                    if (mysqli_num_rows($prod_result) > 0) {
                        while ($row = mysqli_fetch_assoc($prod_result)) {
                            $title = $row["pName"];
                            $img = $row["imgSrc"];
                            $desc = $row["Description"];
                            $price = $row["Price"];


                            if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                                $addcart = 'shopping.php?action=ac&id=' . $row["ProductID"];
                                $addwish = 'shopping.php?action=aw&id=' . $row["ProductID"];
                                $added = 'Added To Wishlist';
                            }

                            echo "
                        <div>
                            <div class='sub_heading'>
                                <h4>" . $title . "</h4>
                            </div>
                        </div>
                        <div class='img_container'><a href='../home/landing.php'><img src='../images/$img'/></a></div>
                        <div class='item_list_wrapper' id='subtext_total'>
                            <a href='../home/landing.php'>
                                <div id='item_description'>
                                "/*
                                    <span class='desc'>
                                    $desc
                                    </span>
                                    */ . " 
                                    <h3 id='price'>$$price</h3>
                                </div>
                            </a>
                            <div class='button_wrapper'>
                                <form method='POST' action=$addcart$msg>
                                    <input class='button' value='Add To Cart' id='atc_input' type='submit'>
                                    </input>
                                </form>
                                <form method='POST' action=$addwish$msg>
                                    <input class='button' value='Add To Wishlist' id='atc' type='submit'>
                                    </input>
                                </form>
                            </div>
                        </div>


                        ";
                        }
                    }
                }

                ?>
            </div>
        </div>
        <div class="h_spacer"></div>
        <div class="side_navbar">
            <div class="nav_title">
                <h2>Today's Trend</h2>
            </div>
            <div class="link_box">
                <?php

                $product_sql = "SELECT * FROM `products` WHERE cItem = 0 AND onSale = 1 AND stockAmt > 0;";
                if ($prod_result = mysqli_query($conn, $product_sql)) {
                    if (mysqli_num_rows($prod_result) > 0) {
                        while ($row = mysqli_fetch_assoc($prod_result)) {
                            $title = $row["pName"];
                            $img = $row["imgSrc"];
                            $desc = $row["Description"];
                            $price = $row["Price"];
                            $salePrice = $row["salePrice"];

                            if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                                $addcart = 'shopping.php?action=ac&id=' . $row["ProductID"];
                                $addwish = 'shopping.php?action=aw&id=' . $row["ProductID"];
                            }

                            echo "
                        <div>
                            <div class='sub_heading'>
                                <h4>" . $title . "</h4>
                            </div>
                        </div>
                        <div class='img_container'><a href='../home/landing.php'><img src='../images/$img'/></a></div>
                        <div class='item_list_wrapper' id='subtext_total'>
                            <a href='../home/landing.php'>
                                <div id='item_description'>
                                "/*
                                    <span class='desc'>
                                    $desc
                                    </span>
                                    */ . " 
                                    <h3 id='oldprice'>$$price</h3>
                                    <h3 id='saleprice'>$$salePrice</h3>
                                </div>
                            </a>
                            <div class='button_wrapper'>
                                <form method='POST' action=$addcart$msg>
                                    <input class='button' value='Add To Cart' id='atc_input' type='submit'>
                                    </input>
                                </form>
                                <form method='POST' action=$addwish$msg>
                                    <input class='button' value='Add To Wishlist' id='atc' type='submit'>
                                    </input>
                                </form>
                            </div>
                        </div>

                        ";
                        }
                    }
                }

                ?>


            </div>
        </div>
        <div class="h_spacer"></div>
        <div class="side_navbar">
            <div class="nav_title">
                <h2>Almost Gone!</h2>
            </div>
            <div class="link_box">
                <?php

                $product_sql = "SELECT * FROM `products` WHERE cItem = 0 AND featured = 1 AND stockAmt > 0;";
                if ($prod_result = mysqli_query($conn, $product_sql)) {
                    if (mysqli_num_rows($prod_result) > 0) {
                        while ($row = mysqli_fetch_assoc($prod_result)) {
                            $title = $row["pName"];
                            $img = $row["imgSrc"];
                            $desc = $row["Description"];
                            $price = $row["Price"];

                            if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                                $addcart = 'shopping.php?action=ac&id=' . $row["ProductID"];
                                $addwish = 'shopping.php?action=aw&id=' . $row["ProductID"];
                            }

                            echo "
                        <div>
                            <div class='sub_heading'>
                                <h4>" . $title . "</h4>
                            </div>
                        </div>
                        <div class='img_container' id='featured'><a href='../home/landing.php'><img src='../images/$img'/></a></div>
                        <div class='item_list_wrapper' id='subtext_total'>
                            <a href='../home/landing.php'>
                                <div id='item_description'>
                                    <h3 class='featured_price' id='fprice'>$$price</h3>
                                </div>
                            </a>
                            <div class='button_wrapper'>
                                <form method='POST' action=$addcart$msg>
                                    <input class='button' value='Add To Cart' id='atc_input' type='submit'>
                                    </input>
                                </form>
                                <form method='POST' action=$addwish$msg>
                                    <input class='button' value='Add To Wishlist' id='atc' type='submit'>
                                    </input>
                                </form>
                            </div>
                        </div>

                        ";
                        }
                    }
                }

                ?>

            </div>
        </div>
    </div>
<div class="pages">
    <p id="number">1</p>
    <button id="back" onclick="back()"><< Back</button>
    <a href="#top">^ Back to Top ^</a>
    <button id="next" onclick="next()">Next >></button>    
</div>
<div class="footer">
        <div class="grid" id="footer_grid">
            <div class="col" id="ft_grid_first">
                <h4>CONTACT</h4>
                <div>
                    <h5>Contact us at the following email.</h5>
                    <a href="mailto:senior@senior.com.au">senior@senior.com.au</a>
                </div>
            </div>
            <div class="col">
                <h4>LINKS</h4>
                <div style="display: grid">
                    <a href="../home/index.php">HOME</a>
                    <br />
                    <a href="../community/community-landing.php">COMMUNITY</a>
                    <br />
                    <a href="../home/shopping.php">SHOPPING</a>
                    <br />
                    <a href="../home/about.php">ABOUT</a>
                    <br />
                    <a href="../nav/login.php">LOGIN</a>
                </div>
            </div>
            <div class="col">
                <h4>SUPPORT</h4>
                <div><a href="../home/help.php">F.A.Q</a></div>
            </div>
            <div class="col" id="ft_grid_last">
                <h4>DISCLAIMER</h4>
                <div class="link_box">
                    <p>This website has been created for UX eval purposes.</p>
                    <p>Products shown are examples. Credit information is stored temporarily.</p>
                    <p>Transactions are not final.</p>
                    <img style="height:80px" src="../images/logologo.png" />
                    <p><b>© 2022</b> SENIOR WEB SYS</p>
                </div>
            </div>
        </div>
        <div class="footer_bt">
            <h4>Thomas Hobbs | Udall Liao | Jay Schuyler</h4>
        </div>
    </div>
</body>
</html>
