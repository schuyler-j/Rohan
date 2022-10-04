<!DOCTYPE html>
<html lang="en">
<head>
<title>Help</title>
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
				<a class="nav_links" href="../nav/wishlist.php">Wishlist</a>
				<img src="../images/cart.png"/>
				<a class="nav_links" href="../nav/cart.php">Cart</a>
				<img src="../images/checkout.png"/>
				<a class="nav_links" href="../nav/checkout.php">Checkout</a>
				<img src='../images/login.png'/>                
<?php 
if(isset($_SESSION["active"]) && $_SESSION["active"] === true){
		echo "<a class = 'nav_links' href='../home/logout.php'>Logout</a>";
}else{
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
				<li class="list"><a href="../community/community-landing.php"><span class="media_text">Community Marketplace</span></a></li>
				<li class="list"><a href="../home/shopping.php"><span class="media_text">Shopping</span></a></li>
				<li class="list"><a href="../home/about.php"><span class="media_text">About</span></a></li>
				<li class="list"><a href="../home/contact.php"><span class="media_text">Contact</span></a></li>
			</ul>
		</div>
	</div>
	<div class="help">
			<div class="title"><h2>F.A.Q</h2></div>
			<ul id='faq_list'>
			<li><span><b>Are my contact details secure? </b>Yes
			</span></li><br/>
			<li><span><b>Can I request a refund? </b>No
			</span></li><br/>
			<li><span><b>If I delete my account is all my data terminated? </b>No
			</span></li><br/>
			<li><span><b>Do you offer membership deals </b>Yes
			</span></li><br/>
			<ul>
	</div>
</body>
</html>
