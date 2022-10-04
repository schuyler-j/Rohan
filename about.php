<!DOCTYPE html>
<html lang="en">

<head>
    <title>About</title>
    <meta charset="UTF-8" />
    <meta name="author" content="TUJ_Rohan" />
    <link rel="stylesheet" href="styles/style.css" />
    <!-- <link rel="stylesheet" href="styles/about.css" /> -->
    <link rel="icon" href="images/favicon.png">
    <script src="scripts/script.js" defer></script>

    <!-- testing column categories -->
    <style>
        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
            padding-top: 50px;
            padding-bottom: 50px;
        }


        .column {
            flex: 50%;
            padding: 10px;
            height: 300px;
        }

        .about_menu_container {
            margin: auto;
            padding-top: 80px;
            padding-bottom: 2px;
            background-color: #465343;
            box-shadow: 0px 1px 8px 0px #222;
            /* display: inline-flex; */
            flex-wrap: wrap;
            flex-direction: row;
            align-items: center;
            /* justify-content: space-around; */
            max-width: 100%;
            height: auto;
            width: 100%;
            background-image: url("../images/about-us-hiking.jpg");

        }
    </style>


</head>

<body>
<?php require_once "db/dbconn.inc.php" ?>

    <div class="top_third">
        <div class="menu_container">
            <h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="images/watchlist.png">
                <a class="nav_links" href="wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")" ?></a>
                <img src="images/cart.png">
                <a class="nav_links" href="cart.php">My Cart</a>
                <img src="images/checkout.png">
                <a class="nav_links" href="checkout.php">Checkout</a>
                <img src="images/login.png">
                <a class="nav_links" href="login.php">Login</a>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="community.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="about.php" id="selected"><span class="media_text">About</span></a></li>
                <li class="list"><a href="contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>

    <div class="page_wrapper">

        <div class="home_body" id="news" style="width:1500px; height:1200px;">
            <div class="about_menu_container">
                <h1 style="text-align:center; font-size:55px; color:white">About Us</h1>
            </div>
            <div class="row">
                <div class="column">
                    <div class="sub_heading">
                        <h2 style="font-size: 40px; text-align:center">WHO WE ARE</h2>
                    </div>
                    <p>
                        <span style="font-size: 20px;">SENIOR is an online marketplace launched in 20XX dedicated to offer recreational equipments to seniors.</span>
                    </p>
                </div>

                <div class="column">
                    <!-- <div class="sub_heading">
                        <h2 style="font-size: 40px; text-align:center">IMAGE HERE </h2>
                    </div> -->
                    <div class='block_1'>
                        <img src='images/greeting_2.png' style="display:block; margin-left:auto; margin-right:auto; width:70%; padding-top:60px" />
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="column">
                    <!-- <div class="sub_heading">
                        <h2 style="font-size: 40px; text-align:center">IMAGE HERE</h2>
                    </div> -->
                    <div class='block_1'>
                        <img src='images/greeting_2.png' style="display:block; margin-left:auto; margin-right:auto; width:70%; padding-top:100px" />
                    </div>
                </div>

                <div class="column">
                    <div class="sub_heading">
                        <h2 style="font-size: 40px; text-align:center; padding-top:30px">OUR GOALS</h2>
                    </div>
                    <p>
                        <span style="font-size: 20px;">Our goal is to provide a easy method of buying, selling and trading equipments with seniors, acting as the method of encouraging outdoor recreation for grey nomads.</span>
                    </p>
                </div>

            </div>

        </div>
    </div>
    <div class="footer">
        <div class="grid" id="footer_grid">
            <div class="col" id="ft_grid_first">
                <h4>CONTACT</h4>
                <div><h5>Contact us at the following email.</h5>
                    <a href="mailto:senior@senior.com.au">senior@senior.com.au</a>
                </div>
            </div>
            <div class="col">
                <h4>LINKS</h4>
                <div style="display: grid">
                    <a href="#">HOME</a>
                    <br/>
                    <a href="#">COMMUNITY</a>
                    <br/>
                    <a href="#">SHOPPING</a>
                    <br/>
                    <a href="#">ABOUT</a>
                    <br/>
                    <a href="#">LOGIN</a>
                </div>
            </div>
            <div class="col">
                <h4>SUPPORT</h4>
                <div><a href="#">F.A.Q</a></div>
            </div>
            <div class="col" id="ft_grid_last">
                <h4>DISCLAIMER</h4>
                <div class="link_box">
                    <p>This website has been created for UX eval purposes.</p>
                    <p>Products shown are examples. Credit information is stored temporarily.</p>
                    <p>Transactions are not final.</p>
                    <img style="height:80px" src="images/logologo.png"/>
                    <p><b>© 2022</b> SENIOR WEB SYS</p>
                </div>
            </div>
        </div>
        <div class="footer_bt">
            <h4>Thomas Hobbs | Udall Liao | Jay Schuyler</h4>
        </div>
    </div>
</body>
