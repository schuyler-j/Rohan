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

<body>
<?php require_once "../db/dbconn.inc.php" ?>
    <div class="top_third">
        <div id="mc" class="menu_container">
            <h1 class="menu_title_s"><a href="../home/index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png" />
                <a class="nav_links" href="../nav/wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")" ?></a>
                <img src="../images/cart.png" />
                <a class="nav_links" href="../nav/cart.php">My Cart</a>
                <img src="../images/checkout.png" />
                <a class="nav_links" href="../nav/checkout.php">Checkout</a>
                <img src='../images/login.png' />
                <?php
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    echo "<a class = 'nav_links' href='../home/logout.php'>Logout</a>";

                    $product_sql = "SELECT * FROM `products`;";
                    $psql = mysqli_query($conn, $product_sql);
                    $row = mysqli_fetch_assoc($psql);


                    $msg = "";


                    $total = 0;
                    $creditcard = $_SESSION["creditcard"];
                    $addr = $_SESSION["addr"];
                    $userid = $_SESSION["id"];

                    $productid = 0;
                } else {
                    echo
                    "<a class = 'nav_links' href='../nav/login.php'>Login</a>
                    ";

                    $addcart = '../home/error.php';
                    $addwish = '../home/error.php';
                    $msg = "?msg=Please%20login%20or%20create%20an%20account.";
                }
                ?>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="../home/index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="../community/community.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="../home/shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="../home/about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="../home/contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>

    <div class="page_wrapper">
		<div class="home_body">

            <ul class='item_list' id='cart_form'>
			<form action="confirm.php" method="POST">
                <li><div class='sub_heading' style='font-size:38px'>Shipping Details</div></li>
				<div class='button_wrapper'>
                    <li><div class="inner_form_section">
                    <div>
                        <b>First Name</b>
                        <input name='fname' type="text" placeholder="" id="streetaddr" required></input>
					</div>
                    <div>
                        <b>Last Name</b>
                        <input name='lname' type="text" placeholder="" id="streetaddr" required></input>
                    </div>
					</li>

                    <li><div class="inner_form_section">
                    <div>
                        <b>Street Address</b>
                        <input name='streetaddress' type="text" placeholder="" id="streetaddr" required></input>
                    </div>
                    <div class="inner_form_section_sub">
                        <b>Postcode</b>
                        <input name='postcode' type="text" placeholder="" id="postcode" required></input>
                    </div>
					</li>

                    <div class="inner_form_section_sub">
                    <li class='pname_title'><b>State</b></li>
					<li><select name='location' id='state_upload'>
						<option
						value='act'>Australian Capital Territory</option>
						<option
						value='nsw'>New South Wales</option>
						<option
						value='nt'>Northern Territoty</option>
						<option
						value='qld'>Queensland</option>
						<option
						value='sa'>South Australia</option>
						<option
						value='tas'>Tasmania</option>
						<option
						value='vic'>Victoria</option>
						<option
						value='wa'>Western Australia</option>
					</select></li>
                    </div>
					</li>
                    <li><div class="inner_form_section">
                    <div>
                        <b>City</b>
                        <input name='city' type="text" placeholder="" id="streetaddr" required></input>
                    </div>
					<li><div class='sub_heading' style='font-size:28px'>Order Details</div></li>
					<li><div class='desc'>
					<h3>Shipping Cost: 15%</h3>
				    <!--shipping flat rate 15%-->
					<?php $total_shipping = $_SESSION['cart_total']; $shipping = 0.15; ?>
					<h3>Total Amount Due:<?php echo " $";echo $total_shipping+$total_shipping*$shipping;?></h3>

					<h2>Billing Details</h2>
					<?php 
					echo "
					<b>Name on Card:</b> $_SESSION[cardname]
						<br/>
					<b>Card Number:</b> $_SESSION[cardnum]
						<br/>
					<b>Exp:</b> $_SESSION[validto]
						<br/>
					<b>CVC:</b> $_SESSION[cvc]
					";
					?>
					</div></li>

					<input type='submit' class='button' id='atc' value='Place Order' style="font-size: 32px; width:30%; float:left; margin-left:12px; color: #222;"></input>
					</li>
					</form>
				</ul>
					<form action="../nav/checkout.php"><input type='submit' class='button' id='atc' value='Back' style="font-size: 32px; width:inherit; float: left; margin-left: 72px; margin-top: 12px;"></input></form>
		</div>
	</div>
</body>

</html>
