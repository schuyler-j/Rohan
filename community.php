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
require_once "addcart.php";


session_start();

?>

<body>
<div class="top_third">
    <div class="menu_container">
        <h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
    </div>

    <div class="nav" id="nav_bottom">
        <div class="nav_list">
            <img src="images/watchlist.png"/>
            <a class="nav_links" href="#">Watchlist</a>
            <img src="images/cart.png"/>
            <a class="nav_links" href="#">My Cart</a>
            <img src="images/checkout.png"/>
            <a class="nav_links" href="#">Checkout</a>
            <img src="images/login.png"/>
                <?php 
                if(isset($_SESSION["active"]) && $_SESSION["active"] === true){
                    echo "<a class = 'nav_links' href='logout.php'>Logout</a>";

                    $product_sql = "SELECT * FROM `products` WHERE cItem = 0;";
                    $psql = mysqli_query($conn, $product_sql);
                    $row = mysqli_fetch_assoc($psql);

                    $addcart = 'community.php?action=ac&id=' . $row["ProductID"];
                    $addwish = 'community.php?action=aw&id=' . $row["ProductID"];

                    $msg = "";

                }else{
                    echo 
                    "<a class = 'nav_links' href='login.php'>Login</a>
                    ";

                    $addcart = 'error.php';
                    $addwish = 'login.php';
                    $msg = "?msg=Please%20login%20or%20create%20an%20account.";

                }
                ?>
        </div>
    </div>
    <div class="nav" id="nav_top">
        <ul class="main_menu">
            <li class="list"><a href="index.php"><span class="media_text">Home</span></a></li>
            <li class="list"><a href="#" id="selected"><span class="media_text">Community Marketplace</span></a></li>
            <li class="list"><a href="shopping.php"><span class="media_text">Shopping</span></a></li>
            <li class="list"><a href="about.php"><span class="media_text">About</span></a></li>
            <li class="list"><a href="contact.php"><span class="media_text">Contact</span></a></li>
        </ul>
    </div>
</div>
<div class="page_wrapper">
    <div class="side_navbar">
        <div class="nav_title"><h2>Community Items</h2></div>
        <div class="link_box">
            <?php 
            
            $product_sql = "SELECT * FROM `products` WHERE cItem = 0;";
            if($prod_result = mysqli_query($conn, $product_sql)){
                if(mysqli_num_rows($prod_result) > 0){
                    while($row = mysqli_fetch_assoc($prod_result)){
                        $title = $row["pName"];
                        $img = $row["imgSrc"];
                        $desc = $row["Description"];
                        $price = $row["Price"];



                        echo "
                        <div>
                            <div class='sub_heading'>
                                <h4>". $title . "</h4>
                            </div>
                        </div>
                        <div class='img_container'><a href='landing.php'><img src='images/$img'/></a></div>
                        <div class='item_list_wrapper' id='subtext_total'>
                            <a href='landing.php'>
                                <div id='item_description'>
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
        <div class="nav_title"><h2>On Sale!</h2></div>
        <div class="link_box">
            <?php 
            
            $product_sql = "SELECT * FROM `products` WHERE cItem = 1 AND onSale = 1;";
            if($prod_result = mysqli_query($conn, $product_sql)){
                if(mysqli_num_rows($prod_result) > 0){
                    while($row = mysqli_fetch_assoc($prod_result)){
                        $title = $row["pName"];
                        $img = $row["imgSrc"];
                        $desc = $row["Description"];
                        $price = $row["Price"];
                        $salePrice = $row["salePrice"];


                        echo "
                        <div>
                            <div class='sub_heading'>
                                <h4>". $title . "</h4>
                            </div>
                        </div>
                        <div class='img_container'><a href='landing.php'><img src='images/$img'/></a></div>
                        <div class='item_list_wrapper' id='subtext_total'>
                            <a href='landing.php'>
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
        <div class="nav_title"><h2>Featured Items</h2></div>
        <div class="link_box">
            <?php 
            
            $product_sql = "SELECT * FROM `products` WHERE cItem = 1 AND featured = 1;";
            if($prod_result = mysqli_query($conn, $product_sql)){
                if(mysqli_num_rows($prod_result) > 0){
                    while($row = mysqli_fetch_assoc($prod_result)){
                        $title = $row["pName"];
                        $img = $row["imgSrc"];
                        $desc = $row["Description"];
                        $price = $row["Price"];


                        echo "
                        <div>
                            <div class='sub_heading'>
                                <h4>". $title . "</h4>
                            </div>
                        </div>
                        <div class='img_container' id='featured'><a href='landing.php'><img src='images/$img'/></a></div>
                        <div class='item_list_wrapper' id='subtext_total'>
                            <a href='landing.php'>
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
<div class="pages" style="text-align: center;">
    <a href="community.php">^ Back to Top ^</a>
</div>
<div class="footer">
    <h4>Thomas Hobbs | Udall Liao | Jay Schuyler</h4>
</div>
</body>
</html>
