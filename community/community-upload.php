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
                <img src="../images/checkout.png" />
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
                <img src="../images/login.png" />
                <?php
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    echo "<a class = 'nav_links' href='../home/logout.php'>Logout</a>";

                } else {
                    echo
                    "<a class = 'nav_links' href='../nav/login.php'>Login</a>
                    ";
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
        <div class="home_body" id="news">
                <?php 
                echo "
				<ul class='item_list' id='cart_form'>
                    <li><div class='sub_heading' style='font-size:38px'>Item Details</div></li>";
                    if(isset($_SESSION["active"]) && $_SESSION["active"]){
							/*Build SQL query for inserting a product*/
							if(isset($_POST['pname'])){
							$productdesc=$_POST['desc'];
							$productname=$_POST['pname'];
							$price=$_POST['price'];
							$state=$_POST['state'];
							$location=$_POST['address'];
							$category=$_POST['category'];
							$quantity=$_POST['stockAmt'];
							$imagesrc="../images/temp.png";
							$cid=rand(1020, 9999);
							$_SESSION['cid']=$cid;
							$postcode=$_POST['postcode'];

							$query = "SELECT * FROM `seller` WHERE userID = $_SESSION[id];";
							$isql = mysqli_query($conn, $query);
							$row = mysqli_fetch_assoc($isql);

							if($row){
									/*update seller item count*/
									$itemcount = $row['itemCount'];
									$sellerID = $row['sellerID'];
									$seller = "UPDATE `seller` SET `itemCount` = $itemcount+$quantity WHERE `seller`.`sellerID` = $sellerID;";
									$sql_init_seller = mysqli_stmt_init($conn);
									mysqli_stmt_prepare($sql_init_seller, $seller);
									mysqli_stmt_execute($sql_init_seller);


									$seller = "UPDATE `users` SET `sellerID` = $sellerID WHERE `users`.`userID` = $_SESSION[id];";
									$sql_init_seller = mysqli_stmt_init($conn);
									mysqli_stmt_prepare($sql_init_seller, $seller);
									mysqli_stmt_execute($sql_init_seller);
							}else{
									/*insert if null ie no seller found yet*/
									$seller = "INSERT INTO `seller` (`sellerID`, `userID`, `itemCount`, `itemsSold`, `shippingAddr`, `postCode`, `sellerName`) VALUES (CONNECTION_ID(), $_SESSION[id], $quantity, '0', '$location', '$postcode', '$_SESSION[name]');";
									$sql_init_seller = mysqli_stmt_init($conn);
									mysqli_stmt_prepare($sql_init_seller, $seller);
									mysqli_stmt_execute($sql_init_seller);

									$query = "SELECT * FROM `seller` WHERE userID = $_SESSION[id];";
									$isql = mysqli_query($conn, $query);
									$row = mysqli_fetch_assoc($isql);
									$sellerID = $row['sellerID'];

									$seller = "UPDATE `users` SET `sellerID` = $sellerID WHERE `users`.`userID` = $_SESSION[id];";
									$sql_init_seller = mysqli_stmt_init($conn);
									mysqli_stmt_prepare($sql_init_seller, $seller);
									mysqli_stmt_execute($sql_init_seller);
							}


							$sql = "INSERT INTO `products` (`ProductID`, `Description`, `pName`, `Price`, `cItem`, `State`, `Location`, 
									`Category`, `stockAmt`, `imgSrc`, `sellerID`, `onSale`, `salePrice`, `featured`) VALUES 
									($cid, '$productdesc', '$productname', '$price', '1', '$state', '$location', '$category', 
								    $quantity, '$imagesrc', $sellerID, '0', NULL, '0');";

						    $sql_init = mysqli_stmt_init($conn);
						    mysqli_stmt_prepare($sql_init, $sql);
						    mysqli_stmt_execute($sql_init);

							header("Location: image.php");

							}
				echo "<li><form action='community-upload.php' method='POST'>
				<!--ItemName-->
                    <li class='pname_title'><b>Item Name</b></li>
                    <li><input name='pname' type='text' placeholder='' id='uname' required></input></li>

				<!--ItemDesc-->
                    <li class='pname_title'><b>Item Description</b></li>
                    <li><div class='password_block'>
                            <textarea name='desc' type='text' placeholder='' id='item_desc' required></textarea>
                        </div></li>

				<!--ItemPrice-->
                    <li class='pname_title'><b>Price Per Item $(AUD)</b></li>
                    <li><div class='password_block'>
                            <input name='price' type='text' placeholder='' id='pmatch' value='' required></input>
                        </div></li>

				<!--ItemAmount-->
                    <li class='pname_title'><b>Quantity you wish to sell</b></li>
                    <li><input name='stockAmt' type='number' placeholder='' id='emailaddr' required></input></li>

				<!--ItemAddress-->
                    <li class='pname_title'><b>Address</b></li>
                    <li><input name='address' type='text' placeholder='' id='emailaddr' required></input></li>

				<!--ItemPostcode-->
                    <li class='pname_title'><b>Postcode</b></li>
                    <li><input name='postcode' type='text' placeholder='' id='emailaddr' required></input></li>


				<!--ItemState-->
                    <li class='pname_title'><b>State</b></li>
					<li><select name='state' id='state_upload'>
						<option
						name='state' value='Australian Capital Territory'>Australian Capital Territory</option>
						<option
						name='state' value='New South Wales'>New South Wales</option>
						<option
						name='state' value='Northern Territoty'>Northern Territoty</option>
						<option
						name='state' value='Queensland'>Queensland</option>
						<option
						name='state' value='South Australia'>South Australia</option>
						<option
						name='state' value='Tasmania'>Tasmania</option>
						<option
						name='state' value='Victoria'>Victoria</option>
						<option
						name='state' value='Western Australia'>Western Australia</option>
					</select></li>
					<li class='pname_title'><b>Category:</b></li>
					<li><select name='category' id='state_upload'>
						<option
						name='category' value='Caravans and Campervans'>Caravans and Campervans</option>
						<option
						name='category' value='Motorhomes'>Motorhomes</option>
						<option
						name='category' value='Camping Gear'>Camping Gear</option>
						<option
						name='category' value='Vehicles'>Vehicles</option>
						<option
						name='category' value='Trailers'>Trailers</option>
						<option
						name='category' value='Hobby/Sporting Equipment'>Hobby/Sporting Equipment</option>
					</select>
					</li>

                    <li class='pname_title'><b>City</b></li>
                    <li><input name='city' type='text' placeholder='' id='emailaddr' required></input></li>

					<br/>
					<li><input class='button' type='submit' value='SUBMIT' id='upload_submit'/>

					</form>
					</li>
						";

					}else{
					echo "Please Login.";
					}
                ?>
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
</html>
