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
                    <div class='main_landing'>
                        <img src='images/chair1.png'/>
                        <div class="button_wrapper">
                    <a href="#">
                        <div class="button" id="atc">
                            Add To Wishlist
                        </div>
                    </a>
                </div>           
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
                        <ul class="landing_menu">
                        <li class="sub_heading"><a href="#description"><span class="media_text" id='landing_selected'>Description&nbsp;&nbsp;</span></a></li>
                        <li class="sub_heading"><a href="#specifications"><span class="media_text">&nbsp;&nbsp;Specifications</span></a></li>
                        </ul>   
                        </li>                        
                        <li class='landing_desc'><p>Ipsum elit ad sint anim. </span>
                <span>Velit sint qui ipsum amet ex cupidatat minim non sunt esse enim. </span>
                <span>Tempor fugiat voluptate eiusmod dolore eu irure elit.</span> 
                <span>Nostrud adipisicing nulla adipisicing sunt eiusmod occaecat. </span>
                <span>Consectetur excepteur velit culpa deserunt sit. </span>
            </p>
            <p>
                <span>Reprehenderit ea cillum sit aute fugiat sit minim labore tempor magna amet reprehenderit. </span>
                <span>Mollit nisi laborum velit pariatur quis aliquip nostrud consectetur pariatur anim amet ipsum sit sit. </span>
                <span>In eiusmod reprehenderit ipsum fugiat. </span>
                <span>Laboris elit ut et ullamco esse et voluptate esse eu. </span>
                <span>Adipisicing deserunt eu id voluptate sint aliqua reprehenderit aliquip aute culpa. </span>
                <span>Ea aliqua adipisicing aute esse nulla esse cupidatat nostrud pariatur qui ex. </span>
                <span>Proident sunt dolore non id voluptate. </span>
                <span>Cillum do in tempor veniam reprehenderit excepteur ipsum pariatur excepteur.   
                        </li>
            </div>        
                <ul class="item_list" id="cart_total">
                    <li><div class="sub_heading" style="font-size:25px">Details</div></li>
                    <li id="item_total"><img src='images/profile.jpg'/><b>John Citizen</b></li>
                    <li id="estimate">SENIOR member since 2022. 10 Ads.</li>
                    <li><div class="list_of_items"> 
                        Item 1 $$$</br>                     
            </div>
            </li>
                    <li id="total" style="font-size:35px"><b>$$$</b></li>
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