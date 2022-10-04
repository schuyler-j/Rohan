<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="UTF-8" />
<meta name="author" content="TUJ_Rohan" />
<link rel="stylesheet" href="../styles/style.css" />
<link rel="stylesheet" href="../styles/footer.css" />
<link rel="icon" href="../images/favicon.png">
<script src="../scripts/script.js" defer></script>
</head>
<?php 
require_once "../db/dbconn.inc.php"; 

/*
session_start();
*/
?>
<body>
    <div class="top_third">
        <div id="mc" class="menu_container">
            <h1 class="menu_title_s"><a href="../home/index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png"/>
                <a class="nav_links" href="../nav/wishlist.php">Wishlist</a>
                <img src="../images/cart.png"/>
                <?php
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    echo "
                        <a class='nav_links' href='../nav/cart.php'>My Cart</a>
                    ";
                } else {

                    echo "
                        <a class='nav_links' href='../home/error.php?msg=please%20login%20to%20view%20cart'>My Cart</a>
                    ";
                } ?>
                <img src="../images/checkout.png"/>
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
                <img src='../images/login.png'/>                
                <?php 
                if(isset($_SESSION["active"]) && $_SESSION["active"] === true){
                    echo "<a class = 'nav_links' href='../home/logout.php'>Logout</a>";
                }else{
                    echo 
                    "<a class = 'nav_links' href='../nav/login.php'>Login</a>
                    ";
                }
                ?>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="../home/index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="../community/community-landing.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="../home/shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="../home/about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="../home/contact.php"><span class="media_text">Contact</span></a></li>
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
        <a id='back_to' href="community.php"><< Back to Search</a>
                    <li><div class="sub_heading" style="font-size:38px">Camp Chair</div></li>
                <li class='list'>
                    <div class='main_landing'>
                    <div class ='content'>    
                    <a id='landing_photo' href='images/chair1.png'><img src='images/chair1.png'/></a>
                    <ul class='landing_detail'>
                    <li class="no_of_photos">
                        <img src='images/photos.png'/>14 photos </li>
                        <li>Date listed: 30/09/2022</li>
                        <li>Last Edited: 30/09/2002</li>
                        <li>Condition: New</li>
                        <input class='button' value='Add To Wishlist' id='atc' type='submit'>
                        </input>
                    <ul>    
            </div>       
            </div>
                    <div class='item_list_wrapper'>
                        <div class='content'>
                        <div class="more_photos"><a href='images/chair1.png'><img src='images/chair1.png'/></a></div>
                        <div class="more_photos"><a href='images/chair1.png'><img src='images/chair1.png'/></a></div>
                        <div class="more_photos"><a href='images/chair1.png'><img src='images/chair1.png'/></a></div>
                        <div class="more_photos"><a href='images/chair1.png'><img src='images/chair1.png'/></a></div>
                        <div class="additional_photos">+ 8</div>
                            </div>
                        </div>
                        <li><div class="sub_heading" style="font-size:25px">Description</div></li>
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
                    <li class="seller_profile">
                        <img src='../images/profile.png'/><b>Nick</b>
                    </li>
                    <li id="estimate">SENIOR member since 2022. 10 Ads.</li>
                        <li><div class="list_of_items"> 
                        Camp Chair</br>                                            
            </div>
            </li>
            <li style="font-size:18px"><b>Location: </b></li>
            <li id="estimate"><img src='../images/location.png'/>Adelaide, South Australia, 5000</li>
                    <li id="total" style="font-size:35px"><b>$$$ Negotiable</b></li>
            </br>
            <li><img src="../images/phone.png"/>
                <a class="nav_links" href="#">Contact Seller</a></li>
            <li><img src="../images/help.png"/>
                <a class="nav_links" href="../home/help.php">Help / Report an Issue</a></li>
            <li><input class='button' value='Add To Cart' id='atc_input' type='submit'>
            </br>
            </input></li>     
                </ul>
        </div>
    </div>
</body>
</html>

<body>
</body>
  
</html>
