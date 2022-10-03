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

<body>
<?php require_once "db/dbconn.inc.php" ?>
    <div class="top_third">
        <div id="mc" class="menu_container">
            <h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="images/watchlist.png" />
                <a class="nav_links" href="wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")" ?></a>
                <img src="images/cart.png" />
                <a class="nav_links" href="cart.php">My Cart</a>
                <img src="images/checkout.png" />
                <a class="nav_links" href="checkout.php">Checkout</a>
                <img src='images/login.png' />
                <a class='nav_links' href="login.php">Login</a>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="community.php"><span class="media_text">Community Marketplace</span></a></li>
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
            <!-- <div class="sub_heading">
                <h2>Checkout</h2>
            </div>
            
            <div>
                1. Delivery Option
                Delivery or Pick-up
            </div>
            <div>
                2. Billing Details
                First name
                Last name
                Country
                Street address
                town/city
                Postcode
            </div>
            <div>
                3. Payment
            </div> -->


            <ul class='item_list' id='cart_form'>
                <li>
                    <div class='sub_heading' style='font-size:38px'>Billing Details</div>
                </li>
                <li class='list'>
                <li class="pname_title"><b>Cardholder's Name</b></li>
                <input type="text" placeholder="" id="fname" required></input><br>
                <li class="pname_title"><b>Card Number</b></li>
                <li><input id="emailaddr" type="text" maxlength="16" placeholder="xxxx xxxx xxxx xxxx"></li>

                <li>
                    <div class="inner_form_section">
                        <div>
                            <b>Valid Through</b>
                            <input type="month" id="emailaddr" required></input>
                        </div>

                        <div class="inner_form_section_sub">
                            <b>CVV / CVC</b>
                            <input type="text" placeholder="" id="postcode" maxlength="3" required></input>
                        </div>
                    </div>
                </li>

                </li>
                <div class='button_wrapper'>
                    <form>
                        <input type='submit' class='button' id='atc' value='Continue' style="width:30%; float:left">
                        </input>
                    </form>
                </div>
        </div>
        <ul class='item_list' id='cart_total'>
            <li>
                <div class='sub_heading' style='font-size:38px'>Cart</div>
            </li>
            <li id='item_total'><b>Total Number of Items: 1</b></li>
            <li>
                <div class='list_of_items'>
                    Item 1: $$$</br>
                </div>
            </li>
            <li id='total'><b>Estimated Total: $$$</b></li>
            <br />
        </ul>

    </div>


    </div>
</body>

</html>
