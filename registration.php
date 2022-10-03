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
<script src="scripts/password.js" defer></script>
</head>



<body>
    <?php /*session_start();*/
    require_once "db/dbconn.inc.php";
    
	$firstname;
	$lastname;
	$username;
	$password;
	$emailaddress;
	$streetaddress;
	$postcode;
	$dob;
    
    ?>
    <div class="top_third">
        <div id="mc" class="menu_container">
			<h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="images/watchlist.png"/>
                <a class="nav_links" href="wishlist.php">Wishlist</a>
                <img src="images/cart.png"/>
                <a class="nav_links" href="cart.php">My Cart</a>
                <img src="images/checkout.png"/>
                <a class="nav_links" href="checkout.php">Checkout</a>
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

<?php 
	if(isset($_POST['username'])){

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$emailaddress = $_POST['emailaddress'];
		$streetaddress = $_POST['streetaddress'];
		$postcode = $_POST['postcode'];
		$dob = $_POST['dob'];
		$passconfirm = $_POST['pass-confirm'];

		$sql = "INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `DOB`, `Email`, `Address`, `CreditCard`, `Username`, `Password`, `sessionID`, `postcode`) VALUES (CONNECTION_ID()+CONNECTION_ID(), '$firstname', '$lastname', '$dob', '$emailaddress', '$streetaddress', NULL, '$username', SHA1($password), NULL, '$postcode');";
		$statement = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($statement, $sql);
		if($passconfirm == $password){
			mysqli_stmt_execute($statement);
		}else{
		}
	}

?>
    <div class="page_wrapper">
        <div class="form_wrapper">
            <form action="confirm.php" method="POST">
                <ul class="item_list" id="login_form">
                    <li><div class="sub_heading" style="font-size:38px">Create an Account!</div></li>
                    <li><div class="inner_form_section">
                        <div>
                            <b>First Name</b>
                            <input name='firstname' type="text" placeholder="" id="fname" required></input>
                        </div>

                        <div>
                            <b>Last Name</b>
                            <input name='lastname' type="text" placeholder="" id="lname" required></input>
                        </div>


                    </div></li>


                    <li class="pname_title"><b>Username</b></li>
                    <li><div class="desc"><i>Create a username people can recognise you</i></div></li>
                    <li><input name='username' type="text" placeholder="" id="uname" required></input></li>

                    <li class="pname_title"><b>Create a Password</b></li>
                    <li><div class="desc"><i>Create a strong password to secure your account</i></div></li>
                    <li><div class="password_block">
<<<<<<< HEAD
                            <input name='password' type="password" placeholder="" id="pword" value="" required></input>
=======
                            <input name='password' type="password" placeholder="" id="pword" required></input>
>>>>>>> fa3b41d2144549e05ec8a42ce6029da50cb3b70a
                            <button type="button" id="show_password" onclick="ShowPassword()"><img src="images/eye.png"></img></button>
                        </div></li>
                    <li class="pname_title"><b>Confirm Password</b></li>
                    <li><div class="desc" id="passblock"><b>Passwords Must Match!</b></div></li>
                    <li><div class="password_block">
                            <input name='pass-confirm' type="password" placeholder="" id="pmatch" value="" required></input>
                        </div></li>

                    <li class="pname_title"><b>E-mail Address</b></li>
                    <li><div class="desc"><i>This is the e-mail address we will contact you through</i></div></li>
                    <li><input name='emailaddress' type="email" placeholder="" id="emailaddr" required></input></li>

                    <li><div class="inner_form_section">

                    <div>
                        <b>Street Address</b>
                        <input name='streetaddress' type="text" placeholder="" id="streetaddr" required></input>
                    </div>

                    <div class="inner_form_section_sub">
                        <b>Postcode</b>
                        <input name='postcode' type="text" placeholder="" id="postcode" required></input>
                    </div>
                    </div></li>

                    <li class="pname_title"><b>Date of Birth</b></li>
                    <li><input name='dob' type="date" id="dob"></input></li>

                    <br/>

                    <li class="tcc"><input type="checkbox" id="tccheckbox" required><span id="checkbox_span">I accept the</span> <a href="index.php#about" id="tcclink">Terms & Conditions</a></input></li>
                    <br/>

                    <li><input type="submit" class="button" id="create_btn" value="CREATE"></input></li>
                </ul>
            </form>
        </div>
    </div>




</body>
</html>
