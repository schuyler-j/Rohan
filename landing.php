<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="UTF-8" />
<meta name="author" content="TUJ_Rohan" />
<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="styles/footer.css" />
<link rel="icon" href="images/favicon.png">
<script src="scripts/script.js" defer></script>
</head>
<?php 
require_once "db/dbconn.inc.php"; 

/*
session_start();
*/
?>
<body>
    <div class="top_third">
        <div id="mc" class="menu_container">
            <h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="images/watchlist.png"/>
                <a class="nav_links" href="wishlist.php">Wishlist</a>
                <img src="images/cart.png"/>
                <img src="images/checkout.png"/>
                <a class="nav_links" href="checkout.php">Checkout</a>
                <img src='images/login.png'/>                
                <?php 
                if(isset($_SESSION["active"]) && $_SESSION["active"] === true){
                    echo "<a class = 'nav_links' href='logout.php'>Logout</a>";
                }else{
                    echo 
                    "<a class = 'nav_links' href='login.php'>Login</a>
                    ";
                }
                ?>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="community-landing.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
        </div>
        <div class="page_wrapper">
        <div class="form_wrapper">
        <div class="top_third">
        </div>
        </div>
        <div class="home_body" id="news">    
        <ul class="item_list" id="cart_form">
                    <li><div class="sub_heading" style="font-size:38px">Camp Chair</div></li>
                <li class='list'>
                    <div class='landing_main'>
                        <img src='images/chair1.png'/>
                        
            </div>
                    <div class='item_list_wrapper'>
                        <div class='content'>
                        <div class="more_photos"><img src='images/chair1.png'/></div>
                        <div class="more_photos"><img src='images/chair1.png'/></div>
                        <div class="more_photos"><img src='images/chair1.png'/></div>
                        <div class="more_photos"><img src='images/chair1.png'/></div>
                        <div class="additional_photos">+ 8</div>
                            </div>
                        </div>
                        </li>
            </div>        
                <ul class="item_list" id="cart_total">
                    <li><div class="sub_heading" style="font-size:38px">Cart Totals</div></li>
                    <li id="item_total"><b>Total Number of Items: 1</b></li>
                    <li><div class="list_of_items"> 
                        Item 1 $$$</br>                     
            </div>
            </li>
                    <li id="total"><b>Estimated Total: $$$</b></li>
                    <li id="estimate">NOTE: This is not the final total, this is an estimate.</li>
                    <br/>
                    <li><a href="checkout.php"><div class="button" id="checkout">CHECKOUT</div></li>
                </ul>
        </div>
    </div>
</body>
</html>

<body>
</body>
  
</html>