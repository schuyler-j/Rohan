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
require_once "../upload.php";
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
						/*
						echo "<li><form>
				<!--ItemName-->
                    <li class='pname_title'><b>Item Name</b></li>
                    <li><input name='pname' type='text' placeholder='' id='uname' required></input></li>

				<!--ItemDesc-->
                    <li class='pname_title'><b>Item Description</b></li>
                    <li><div class='password_block'>
                            <textarea name='desc' type='text' placeholder='' id='item_desc' required></textarea>
                        </div></li>

				<!--ItemPrice-->
                    <li class='pname_title'><b>Price $(AUD)</b></li>
                    <li><div class='password_block'>
                            <input name='price' type='text' placeholder='' id='pmatch' value='' required></input>
                        </div></li>

				<!--ItemAmount-->
                    <li class='pname_title'><b>Amount</b></li>
                    <li><input name='stockAmt' type='number' placeholder='' id='emailaddr' required></input></li>

				<!--ItemAddress-->
                    <li class='pname_title'><b>Address</b></li>
                    <li><input name='address' type='text' placeholder='' id='emailaddr' required></input></li>

				<!--ItemState-->
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
					<br/>";
					/*<li><input class='button' type='submit' value='SUBMIT' id='upload_submit'/></li>*/
					}else{
					echo "Please Login.";
					}
                    echo "
					</div>

				<!--ItemUploadForm-->
"; 
					
					
					echo "
					<ul class='item_list' id='image_upload'>
					<li><form action='community-upload.php' method='POST' enctype='multipart/form-data'>
";
					$filename = "hello";
					if($_SERVER["REQUEST_METHOD"] == "POST") {

						if(isset($_FILES['fileupload'])) {
							$tar_file = $_FILES['fileupload']['name'];
							$tar_dir = '../images/';
							$filename = $tar_dir . $tar_file;

							if(move_uploaded_file($_FILES['fileupload']['tmp_name'], "../images/" . $tar_file)){

							}else{
								echo "ERROR";
							}

							echo "$filename";
						}




					}
					echo "
                    <li><div class='sub_heading' style='font-size:38px'>Upload Image</div></li>
					<li><div class='img_container'><img src=$filename /></div></li>
					<li><input id='file_upload_btn' type='file' name='fileupload'/></li>
					<li><input class='button' type='submit' value='UPLOAD' id='upload_upload'></input></li>
					</form></li>
                    </ul>";
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
