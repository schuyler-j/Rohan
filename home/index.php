<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
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
            <h1 class="menu_title_s"><a href="../index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png" />
                <a class="nav_links" href="../nav/wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")" ?></a>
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
                        <a class='nav_links' href='error.php?msg=please%20login%20to%20checkout'>Checkout</a>
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
                <li class="list"><a href="#" id="selected"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="../community/community-landing.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="../home/shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="../home/about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="../home/contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>
    <div class="footer_wrapper">
        <div class="page_wrapper">
            <?php if (isset($_SESSION["active"]) && $_SESSION["active"]) {

                echo "
            
            <div class='block1' id='home'>
                </div>
            ";

                //<div class='title' id='welcome'><h4>Welcome back," . $_SESSION["username"] . $_SESSION["id"] . "</h4></div>
            } else {
                echo "
            
            <div class='home_body' id='join'>
                <div class='title' id='shopping'>
                    <span>SHOPPING</span> <span class='alt'>AND</span> <span>EXCHANGE</span> <span class='alt'>FOR</span> 
                    <span>GREY</span> <span class='alt'>NOMADS</span> <span>INTERESTED</span> <span class='alt'>IN</span> <span>OUTDOOR</span> <span class='alt'>RECREATION</span>
                </div>
                <div class='home_body_text'>
                    <span><b>The journey of a lifetime awaits you!</b></span>
                    <br/>
                    <br/>
                    <span>Our community of grey nomads welcomes you to the greatest ecommerce web application ever created.</span>
                    <br/>
                    <br/>
                    <span>Don't miss this terrific opportunity to buy, trade and sell an amazing range of good quality products.</span> 
                </div>
                <div class='grid'>
                    <div class='block_1'>
                        <img src='../images/greeting_2.png'/>
                        <a class='button' type='submit'  href='../home/registration.php' style='width: 370px'>JOIN NOW</a>
                    </div>
                        <img id='cursor' src='../images/cursor.png'/>
                </div>
                <div class='about'>
                    <div class='sub_heading'>
                        <h2 id='about'>TERMS & CONDITIONS</h2>
                    </div>
                        <!-- this is now the T&C section -->
                    <ul id='about_us_home'>
                    <li><span>When you create an account with us, you guarantee that you are <b>above</b> the age of 18, and that the information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete, or obsolete information may result in the immediate termination of your account on the site.
                    </span></li><br/>
                    <li><span>You are <b>responsible</b> for maintaining the confidentiality of your account and password, including but not limited to the restriction of access to your computer and/or account. You <b>agree</b> to accept responsibility for any and <b>all</b> activities or actions that occur under your account and/or password, whether your password is with our Service or a third-party service. You <b>must</b> notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.
                    </span></li><br/>
                    <li><span>You may not use as a <b>username</b> the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar or obscene.
                    </span></li><br/>
                    <li><span>We reserve the right to refuse service, terminate accounts, remove or edit content, or cancel orders in our sole discretion
                    </span></li><br/>
                    <ul>
                </div>
            </div>

            ";
            }

            ?>
            <div class="home_body" id="news">
                <?php if (isset($_SESSION["active"]) && $_SESSION["active"]) {
                    echo "<h1 id='welcome_title'>Welcome back, " . $_SESSION["name"] . "</h1>";

					$sell_sql = "SELECT * FROM `products` WHERE sellerID = $_SESSION[seller_id];";
					if ($result_selling = mysqli_query($conn, $sell_sql)){
						if (mysqli_num_rows($result_selling) > 0){
							echo "<div class=text><div class=sub_heading><h2>Selling</h2></div>";
							while ($selling_row = mysqli_fetch_assoc($result_selling)){
									echo "<h3>$selling_row[pName]</h3>";
							}
						}else{
								echo "<div class=text><div class=sub_heading><h2>Selling</h2></div>
									<h3>None</h3></div>";
						}
					}

					/*
					$sell_sql = "SELECT * FROM `products` WHERE sellerID = $_SESSION[seller_id];";
					if ($result_selling = mysqli_query($conn, $sell_sql)){
						if (mysqli_num_rows($result_selling) > 0){
							echo "<div class=text><div class=sub_heading><h2>Selling</h2></div>";
							while ($selling_row = mysqli_fetch_assoc($result_selling)){
									echo "<h3>$selling_row[pName]</h3>";
							}
						}else{
								echo "<div class=text><div class=sub_heading><h2>Selling</h2></div>
									<h3>None</h3></div>";
						}
					}

					 */
					$sell_sql = "SELECT * FROM `orders` WHERE userID = $_SESSION[id];";
					if ($result_selling = mysqli_query($conn, $sell_sql)){
						if (mysqli_num_rows($result_selling) > 0){
							echo "<div class=text><div class=sub_heading><h2>Purchase History</h2></div>";
							while ($selling_row = mysqli_fetch_assoc($result_selling)){
									echo "<h3>$selling_row[orderDate]</h3>";
							}
						}else{
								echo "<div class=text><div class=sub_heading><h2>Purchase History</h2></div>
									<h3>None</h3></div>";
						}
					}


                }
                ?>
                <div class="sub_heading">
                    <h2>NEWS & EVENTS</h2>
                </div>
                <!-- code to handle the display/update of the news list -->
                <?php
                echo "<div class='item_list'>";
                echo "<ul>";
                $news_sql = "SELECT * FROM `news` WHERE (CURRENT_DATE() - postdate) < 7 ORDER BY postdate DESC;";
                if ($news_result = mysqli_query($conn, $news_sql)) {
                    if (mysqli_num_rows($news_result) > 0) {

                        while ($row = mysqli_fetch_assoc($news_result)) {
                            $title = $row["title"];
                            $img = $row["img"];
                            $content = $row["content"];
                            $date = $row["postdate"];
                            echo "<li class='list'>";
                            echo "<h3 class='item_list_title'>$title</h3>";
                            echo "<div class='item_list_wrapper'>";
                            echo "<div class='content'>";
                            echo "<img src='../images/$img'/>";
                            echo "<div class='block1'>";
                            echo "<p>$content</p>";
                            echo "<div class='date'>$date</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</li>";
                        }
                    }
                }

                echo "</ul";
                echo "</div>";
                ?>
            </div>
        </div>
        <!-- fix footer to be located at the bottom of the page -->
        <!-- then update on all pages -->



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
