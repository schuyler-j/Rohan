<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="UTF-8" />
<meta name="author" content="TUJ_Rohan" />
<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="styles/footer.css" />
<link rel="icon" href="images/favicon.png">
<script src="scripts/script.js" defer></script>
</head>



<body>
    <div class="top_third">
        <div class="menu_container">
                <h1 class="menu_title_s">SENIOR</h1>
            <!--test for logo-->
            <!--<div class="menu_title_s" id="logo">
                <img src="images/home_banner.png" width="40%">
            </div>

            <a class="menu_title_s" id="title_img">
                <img src="images/logo.png" width=20% height=20%>
            </a>
            -->
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
                <a class="nav_links" href="login.php">Login</a>
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
            <form action="confirm.php" method="GET">
                <ul class="item_list" id="login_form">
                    <li><div class="sub_heading" style="font-size:38px">Create an Account!</div></li>
                    <li><div class="inner_form_section">
                        <div>
                            <b>First Name</b>
                            <input type="text" placeholder="" id="fname" required></input>
                        </div>

                        <div>
                            <b>Last Name</b>
                            <input type="text" placeholder="" id="lname" required></input>
                        </div>


                    </div></li>

                    <li class="pname_title"><b>Username</b></li>
                    <li><div class="desc">create a username people can recognise you</div></li>
                    <li><input type="text" placeholder="" id="uname" required></input></li>

                    <li class="pname_title"><b>Create a Password</b></li>
                    <li><div class="desc">create a strong password to secure your account</div></li>
                    <li><div class="password_block">
                            <input type="password" placeholder="" id="pword" required></input>
                            <button type="button" id="show_password" onclick="ShowPassword()"><img src="images/eye.png"></img></button>
                        </div></li>
                    <li class="pname_title"><b>Confirm Password</b></li>
                    <li><div class="password_block">
                            <input type="password" placeholder="" id="pword" required></input>
                        </div></li>

                    <li class="pname_title"><b>E-mail Address</b></li>
                    <li><div class="desc">this is the e-mail address we will contact you through</div></li>
                    <li><input type="email" placeholder="" id="emailaddr" required></input></li>

                    <li><div class="inner_form_section">

                    <div>
                        <b>Street Address</b>
                        <input type="text" placeholder="" id="streetaddr" required></input>
                    </div>

                    <div class="inner_form_section_sub">
                        <b>Postcode</b>
                        <input type="text" placeholder="" id="postcode" required></input>
                    </div>
                    </div></li>

                    <li class="pname_title"><b>Date of Birth</b></li>
                    <li><input type="date" id="dob"></input></li>

                    <br/>

                    <li class="tcc"><input type="checkbox" id="tccheckbox"><span id="checkbox_span">I accept the</span> <a href="index.php#about">Terms & Conditions</a></input></li>
                    <br/>

                    <li><input type="submit" class="button" value="CREATE"></input></li>
                </ul>
            </form>
        </div>
    </div>




</body>
</html>
