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
        <div class="form_wrapper">
            <div class="top_third">
            </div>
        </div>

        <div class="home_body" id="news">

            <ul class='item_list' id='cart_form'>
                <li><div class='sub_heading' style='font-size:38px'>Billing Details</div></li>
                <li class="pname_title"><b>Cardholder's Name</b></li>
                <li><input type="text" placeholder="" id="fname" required></input><br></li>
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
			<div class='button_wrapper'>
				<form action="../checkout/shipping.php" method="POST">
					<input type='submit' class='button' id='atc' value='Continue' style="width:30%; float:left">
					</input>
				</form>
			</div>
        </div>
<?php 
				$hasItems = 1;
				$count = $_SESSION['item_in_cart_count'];
				$total = $_SESSION['cart_total'];

				echo "
        <ul class='item_list' id='cart_total'>
                <ul class='item_list' id='cart_total'>
                    <li><div class='sub_heading' style='font-size:38px'>Cart</div></li>
                    <li id='item_total'><b>Total Number of Items: $count</b></li>
                    "; 

                    $sqld = "SELECT * FROM `carts` WHERE UserID = $_SESSION[id];";
                    $resultd = mysqli_query($conn, $sqld);
                    if($resultd){while($rowi = mysqli_fetch_array($resultd)){
                        $sqli = "SELECT * FROM `products` WHERE ProductID = $rowi[ProductID];";
                        $ss = $conn->query($sqli);
                        $pro = $ss->fetch_assoc();

                        echo "
                            <li><div class='list_of_items'>$pro[pName]</br>                     
                        ";

					}}
						if($hasItems == 0){
							echo "
						</div>
						</li>
						<li id='total'><b></b></li>
						</ul>
						";
						}else{
							echo "
						</div>
						</li>
						<li id='total'><b>Estimated Total: $$total</b></li>
						<br/>
						</ul>
						
					</div>";

						}

?>

    </div>
</body>
</html>
