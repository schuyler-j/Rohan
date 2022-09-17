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

<?php 
require_once "db/dbconn.inc.php"; 
require_once "session.php";


?>

<body>
    <div class="top_third">
        <div class="menu_container">
            <div class="menu_title_s">
                <h1 class="menu_title_s">SENIOR</h1>
            </div>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="images/watchlist.png"/>
                <a class="nav_links" href="#">Watchlist</a>
                <img src="images/cart.png"/>
                <a class="nav_links" href="#">My Cart</a>
                <img src="images/checkout.png"/>
                <a class="nav_links" href="#">Checkout</a>
                <img src='images/login.png'/>
                <?php 
                $session_result = $conn->query($sID);
                $s = mysqli_fetch_assoc($session_result);
                if($s["SessionID"] == NULL){
                    echo "
                    <a class='nav_links' href='#'>Login</a>
                    ";
                }else{
                    $result = $conn->query($sql);
                    $r = $result->fetch_assoc();
                    echo "<a class='nav_links'>";
                    echo "hello, " . $r["FirstName"]
                    . "</a>";
                }

                ?>
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
            <form action="index.php" method="GET">
                <ul class="item_list" id="login_form">
                    <li><div class="sub_heading" style="font-size:38px">Login</div></li>
                    <li id="top_input_title"><b>Username</b></li>
                    <li><input type="text" placeholder="" id="uname" required></input></li>
                    <li id="pname_title"><b>Password</b></li>
                    <li><div class="password_block">
                            <input type="password" placeholder="" id="pword" required></input>
                            <button type="button" id="show_password" onclick="ShowPassword()"><img src="images/eye.png"></img></button>
                        </div></li>
                    <li><a href="registration.php"><h4>Don't have an account? Sign Up Here!</h4></a></li>
                    <br/>
                    <li><input type="submit" class="button" value="LOGIN"></input></li>
                </ul>
            </form>
        </div>
    </div>




</body>
</html>
