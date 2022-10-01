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

        .column {
            float: left;
            padding: 10px;
            height: 300px;
        }

        .left {
            float: left;
            width: 40%;
        }

        .right {
            float: right;
            width: 50%;
        }


        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>

</head>

<body>
    <?php session_start(); ?>
    <div class="top_third">
        <div class="menu_container">
            <h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
            <!--
        <div class="menu_title_s" id="logo">
            <img src="images/home_banner.png" width="40%">
        </div>
        -->
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
                <li class="list"><a href="about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="contact.php" id="selected"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>
    <div class="page_wrapper">

        <div class="home_body" id="news" style="width:1500px; height:650px;">
            <div class="row">
                <div class="column left" style="text-align:center; padding-top:100px; padding-left:100px">
                    <div class="title">
                        <h2>Contact Us</h2>
                    </div>
                    <span style="font-size: 30px; ">Have some queries? Use the form on the side with your inquiry or send a direct email to <a href="mailto:senior@senior.com.au">senior@senior.com.au</a></span>
                </div>

                <div class="column right">
                    <form action="confirm.php" method="GET">
                        <ul class="item_list">
                            <li>
                                <div class="inner_form_section">
                                    <div>
                                        <b>First Name</b>
                                        <input type="text" placeholder="" id="fname" required style="width:70%"></input>
                                    </div>

                                    <div>
                                        <b>Last Name</b>
                                        <input type="text" placeholder="" id="lname" required style="width:70%"></input>
                                    </div>

                                </div>
                            </li>

                            <li class="pname_title"><b>E-mail Address</b></li>
                            <li><input type="email" placeholder="" id="emailaddr" required style="width:95%"></input></li>

                            <br />

                            <li class="pname_title"><b>Message</b></li>
                            <li><textarea name="text1" id="lname" cols="40" rows="5" style="width:95%" ></textarea></li>
                            <!-- <li><input type="text" placeholder="" id="lname" style="width:95%; height:200px"></input></li> -->

                            <br />
                            <li><input type="submit" class="button" id="create_btn" value="Submit" style="float:left"></input></li>
                        </ul>
                    </form>
                </div>
            </div>



        </div>

</body>