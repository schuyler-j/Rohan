<!DOCTYPE html>
<html lang="en">
<head>
<title>Shopping</title>
<meta charset="UTF-8" />
<meta name="author" content="Team_Rohan" />
<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="styles/shopping.css" />
<link rel="icon" href="images/favicon.png">
<script src="scripts/script.js" defer></script>
</head>

<body>
<div class="top_third">
    <div class="menu_container">
        <h1 class="menu_title_s">SENIOR</h1>
        <!--
        <div class="menu_title_s" id="logo">
            <img src="images/home_banner.png" width="40%">
        </div>
        -->
    </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="images/watchlist.png">
                <a class="nav_links" href="#">Watchlist</a>
                <img src="images/cart.png">
                <a class="nav_links" href="#">My Cart</a>
                <img src="images/checkout.png">
                <a class="nav_links" href="#">Checkout</a>
                <img src="images/login.png">
                <a class="nav_links" href="login.php">Login</a>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="#"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="shopping.php" id="selected"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="#"><span class="media_text">About</span></a></li>
                <li class="list"><a href="#"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
</div>
<div class="shopping_filters">
<form action="shopping.php" method="get">
        <h2><b>Ready to find your next item? Start searching here</b></h2>
        <div>
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
            <select name="Categories" id="categories">
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
                value="accommodation">Accomodation</option>
                <option
                value="hobby-sports">Hobby/Sporting Equipment</option>
                <option
                value="tours-attractions">Tours and Attractions</option>
            </select>
            <input type="submit" value="Search" /><br>
        </div>
      </form>

<div class="page_wrapper">
    <div class="side_navbar">
        <div class="nav_title"><h2>Most Searched Items</h2></div>
        <div class="link_box">
            <div>
                <div class="sub_heading">
                    2013 Jayco Sterling Caravan
                </div>
            </div>
            <div class="img_container"><a href="#"><img src="/images/JaycoSterling.jpg"></a></div>
            <div class="item_list_wrapper" id="subtext_total">
                <a href="#">
                    <div id="item_description">
                        <span class="desc">
                            Cupidatat ad ea consequat et ullamco laboris ipsum proident consequat nostrud proident in consectetur.
                        </span>
                        <h3 id="price">$50,000</h3>
                    </div>
                </a>
                <div class="button_wrapper">
                    <a href="#">
                        <div class="button" id="atc">
                            Add To Cart
                        </div><br>
                    </a>
                    <a href="#">
                        <div class="button" id="atc">
                            Add To Wishlist
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="link_box">
            <div>
                <div class="sub_heading">
                    Item 1
                </div>
            </div>
            <div class="img_container"><a href="#"><img src="/images/greeting_1.png"><div class="hidden"></div></a></div>
            <div class="item_list_wrapper" id="subtext_total">
                <a href="#">
                    <div id="item_description">
                        <span class="desc">
                            Cupidatat ad ea consequat et ullamco laboris ipsum proident consequat nostrud proident in consectetur.
                        </span>
                        <h3 id="price">$$$</h3>
                    </div>
                </a>
                <div class="button_wrapper">
                    <a href="#">
                        <div class="button" id="atc">
                            Add To Cart
                        </div><br>
                    </a>
                    <a href="#">
                        <div class="button" id="atc">
                            Add To Wishlist
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="h_spacer"></div>
    <div class="side_navbar">
        <div class="nav_title"><h2>Today's Trends</h2></div>
        <div class="link_box">
            <div>
                <div class="sub_heading">
                    Item 1
                </div>
            </div>
            <div class="img_container"><a href="#"><img src="/images/tent1.png"></a></div>
            <div class="item_list_wrapper" id="subtext_total">
                <a href="#">
                    <div id="item_description">
                        <span class="desc">
                            Cupidatat ad ea consequat et ullamco laboris ipsum proident consequat nostrud proident in consectetur.
                        </span>
                        <h3 id="price">$$$</h3>
                    </div>
                </a>
                <div class="button_wrapper">
                    <a href="#">
                        <div class="button" id="atc">
                            Add To Cart
                        </div><br>
                    </a>
                    <a href="#">
                        <div class="button" id="atc">
                            Add To Wishlist
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="link_box">
            <div>
                <div class="sub_heading">
                    Item 1
                </div>
            </div>
            <div class="img_container"><a href="#"><img src="/images/chair1.png"></a></div>
            <div class="item_list_wrapper" id="subtext_total">
                <a href="#">
                    <div id="item_description">
                        <span class="desc">
                            Cupidatat ad ea consequat et ullamco laboris ipsum proident consequat nostrud proident in consectetur.
                        </span>
                        <h3 id="price">$$$</h3>
                    </div>
                </a>
                <div class="button_wrapper">
                    <a href="#">
                        <div class="button" id="atc">
                            Add To Cart
                        </div><br>
                    </a>
                    <a href="#">
                        <div class="button" id="atc">
                            Add To Wishlist
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>