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
                <a class="nav_links" href="../nav/wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")"?></a>
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
                <img src="../images/login.png">
                <?php 
                if(isset($_SESSION["active"]) && $_SESSION["active"] === true){
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

                }else{
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
        <?php
                //check if user added to cart or wishlist
                if (isset($_GET["action"]) && $_GET["action"] == "ac") {
                    $_SESSION["productid"] = $_GET["id"];
                    $productid = $_SESSION["productid"];
                    $cart_sql = "INSERT INTO `carts` (`CartID`, `TotalPrice`, `Shipping`, `Payment`, `DoP`, `UserID`, `ProductID`) VALUES (CONNECTION_ID(), $total, '$addr', 'credit', CURRENT_DATE(), $userid, $productid);";
                    $update_stock = "UPDATE `products` SET `stockAmt` = (stockAmt - 1) WHERE `products`.`ProductID` = $productid;";
                    $statement = mysqli_stmt_init($conn);
                    $update_st = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($statement, $cart_sql);
                    mysqli_stmt_prepare($update_st, $update_stock);
                    mysqli_stmt_execute($statement);
                    mysqli_stmt_execute($update_st);
                }
                
                if(isset($_GET["action"]) && $_GET["action"] == "aw"){
                    $_SESSION["productid"] = $_GET["id"];
                    $productid = $_SESSION["productid"];
                    $w = "INSERT INTO `wishlists` (`wishID`, `userID`, `ProductID`) VALUES (CONNECTION_ID(), $userid, $productid);";
                    $wst = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($wst, $w);
                    mysqli_stmt_execute($wst);
                }

			$pid = $_GET['id'];
			$product_sql = "SELECT * FROM `products` WHERE productID = $pid;";
			if ($prod_result = mysqli_query($conn, $product_sql)) {
				if (mysqli_num_rows($prod_result) > 0) {
					while ($row = mysqli_fetch_assoc($prod_result)) {
						$title = $row["pName"];
						$img = $row["imgSrc"];
						$desc = $row["Description"];
						$price = $row["Price"];

						if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
							$addcart = 'landing.php?action=ac&id=' . $row["ProductID"];
							$addwish = 'community.php?action=aw&id=' . $row["ProductID"];
							$added = 'Added To Wishlist';
						} 

						$sql = "SELECT * FROM `seller` WHERE sellerID = $row[sellerID];";
						$seller_query = mysqli_query($conn, $sql);
						$seller_row = mysqli_fetch_assoc($seller_query);

			$sellerName = $seller_row['sellerName'];
			$Location = $seller_row['shippingAddr'];

			$emsql = "SELECT * FROM `users` WHERE sellerID = $row[sellerID];";
			$es = mysqli_query($conn, $emsql);
			$erow = mysqli_fetch_assoc($es);
			$email = $erow['Email'];


			echo "
			<div class='home_body' id='news'>    
			<ul class='item_list' id='cart_form'>
			<a id='back_to' href='../community/community.php'><< Back to Search</a>
						<li><div class='sub_heading' style='font-size:38px'>$title</div></li>
						<li class='list'>
						<div class='main_landing'>
						<div class ='content'>    
						<a id='landing_photo' href='../images/$img'><img src='../images/$img'/></a>
					</div>       
					</div>
						<li><div class='sub_heading' style='font-size:25px'>Description</div></li>
						</li>                        
						<li class='landing_desc'>
						$desc
						</li>
					</div>        
					<ul class='item_list' id='cart_total'>
						<li><div class='sub_heading' style='font-size:25px'>Details</div></li>
						<li class='seller_profile'>
							<img src='../images/profile.png'/><b>$sellerName</b>
						</li>
						<li id='estimate'>SENIOR member since 2022. - Trusted Seller</li>
							<li><div class='list_of_items'> 
							$title</br>                                            
				</div>
				</li>
				<li style='font-size:18px'><b>Location: </b></li>
				<li id='estimate'><img src='../images/location.png'/>$Location</li>
						<li id='total' style='font-size:35px'><b>$ $price</b></li>
				</br>
				<li><img src='../images/phone.png'/>
					<a class='nav_links' href='mailto:$email'>Contact Seller via: $email</a></li>
				<li><img src='../images/help.png'/>
					<a class='nav_links' href='../home/help.php'>Help / Report an Issue</a></li>
				<li><form method='POST' action=$addcart$msg>
				<input class='button' value='Add To Cart' id='atc_input' type='submit'>
				</form>
				</br>
				</input></li>     
					</ul>
					";
				}
			}
		}

 ?>        
	</div>
    </div>
    <div class="pages">
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
  
</html>
