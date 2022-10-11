<!DOCTYPE html>
<html lang="en">

<head>
    <title>Seller</title>
    <meta charset="UTF-8" />
    <meta name="author" content="TUJ_Rohan" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="icon" href="../images/favicon.png">
    <script src="../scripts/script.js" defer></script>

    <style>
		#contact_btn{
		}
		#mailtonav{
		    margin-top: 12px;
		}
		.row_contact{
			display: inline-flex;
		}
		.row_contact h2{
		    margin-bottom: 2px;
		}
        .column-left {
            height: 300px;
		    width: 50%;
		    text-align: center;
        }
        .column-right {
            float: right;
            width: 50%;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .seller_icon {
            padding-left: 25px;
        }
        .inner_form_section{
            padding-top: 50px;
            padding-left: 250px;
        }
    </style>
</head>

<body>
<?php require_once "../db/dbconn.inc.php" ?>
    <div class="top_third">
        <div id="mc" class="menu_container">
            <h1 class="menu_title_s"><a href="../home/index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png">
                <a class="nav_links" href="../nav/wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")" ?></a>
                <img src="../images/cart.png">
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
                <a class="nav_links" href="../nav/login.php">Login</a>
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

        <div class="home_body" id="news" style="width:1500px; height:650px;">
            <div class="row_contact">
            <a id='back_to' onclick="history.back()"><<<< Back</a>
                <div class="column-left">
                    <div class="title">
                        <h2>Seller Details</h2>
                    </div>
                    <div class="seller_icon">
                    <img src="../images/seller.png">
                    </div>
                </div>

                <div class='column-right'>
                    <form>
                    <div class='inner_form_section'>    
                        <ul class="item_list" id="contact_items">
                            <li class="pname_title"><b>Seller Name</b></li>
                            <li><span style="font-size: 30px; ">Nick</span></li>
                            <br />
                            <li class="pname_title"><b>Postcode</b></li>
                            <li><span style="font-size: 30px; ">5016</span></li>
                            <br />
                            <li class="pname_title"><b>Phone Number</b></li>
                            <li><span style="font-size: 30px; ">0412 356 789</span></li>
                            <br />
                            <li class="pname_title"><b>E-mail Address</b></li>
                            <li><span style="font-size: 30px; "><a class="nav_links" id="mailtonav" href="mailto:senior@senior.com.au">senior@senior.com.au</a></span></li>
                            <br />
                        </ul>
                    </div>
                    </form>
                </div>
            </div>



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
