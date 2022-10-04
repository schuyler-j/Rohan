<!DOCTYPE html>
<html lang="en">
<head>
    <title>Community</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Team_Rohan" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/community.css" />
    <link rel="icon" href="../images/favicon.png">
    <script src="../scripts/script.js" defer></script>
</head>
<?php
require_once "../db/dbconn.inc.php";
/*
session_start();
*/
$_SESSION["wishcount"] = 0;
$added = 'Add To Wishlist';
if(isset($_SESSION["active"]) && $_SESSION["active"]){
    $userid = $_SESSION["id"];
}else{
    $userid = "";
}
$wishc = "SELECT * FROM `wishlists` WHERE userID = $userid;";
if($w = mysqli_query($conn, $wishc)){
    if(mysqli_num_rows($w) > 0){
        while($rw = mysqli_fetch_assoc($w)){
                $_SESSION["wishcount"] = $_SESSION["wishcount"] + 1;
        }
    }
}else{
    $_SESSION["wishcount"] = 0;
}

?>

<body >
    <div class="top_third">
        <div id="mc" class="menu_container">
            <h1 class="menu_title_s"><a href="../home/index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png" />
                <a class="nav_links" href="../nav/wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")"?></a>
                <img src="../images/cart.png" />
                <a class="nav_links" href="../nav/cart.php">My Cart</a>
                <img src="../images/checkout.png" />
                <a class="nav_links" href="../nav/checkout.php">Checkout</a>
                <img src="../images/login.png" />
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
                <li class="list"><a href="../community/community-landing.php" id="selected"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="../home/shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="../home/about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="../home/contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>
    <!--beginning of item grid list-->
    <div class="page_wrapper">
        <div class="form_wrapper">
        <div class="top_third">
        </div>
        </div>
        <div class="home_body" id="news">
                <?php 
                $count = 0;
                $total = 0;
                echo "
            <ul class='item_list' id='cart_form'>
                    <li><div class='sub_heading' style='font-size:38px'>Item Details</div></li>";
                    if(isset($_SESSION["active"]) && $_SESSION["active"]){
						echo "<li><form>
                    <li class='pname_title'><b>Item Name</b></li>
                    <li><input name='pname' type='text' placeholder='' id='uname' required></input></li>

                    <li class='pname_title'><b>Item Description</b></li>
                    <li><div class='password_block'>
                            <textarea name='desc' type='text' placeholder='' id='item_desc' required></textarea>
                        </div></li>
                    <li class='pname_title'><b>Price</b></li>
                    <li><div class='password_block'>
                            <input name='price' type='text' placeholder='' id='pmatch' value='' required></input>
                        </div></li>
                    <li class='pname_title'><b>Amount</b></li>
                    <li><input name='stockAmt' type='number' placeholder='' id='emailaddr' required></input></li>

                    <li class='pname_title'><b>Address</b></li>
                    <li><input name='address' type='text' placeholder='' id='emailaddr' required></input></li>
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

					<br/>
					<li><input class='button' type='submit' value='SUBMIT' id='upload_submit'/></li>

";

                            }else{
							echo "Please Login.";
						}
                                    
                                    
                        echo "
					</div>        
					<ul class='item_list' id='image_upload'>
                    <li><div class='sub_heading' style='font-size:38px'>Upload Image</div></li>
					<li><div class='img_container'></div></li>
					<li><input class='button' type='submit' value='UPLOAD' id='upload_upload'></input></li>
                    </ul>"; 

                ?>
        </div>
    </div>
</body>

    </div>
    <div class="footer">
        <h4>Thomas Hobbs | Udall Liao | Jay Schuyler</h4>
    </div>
</body>

</html>
