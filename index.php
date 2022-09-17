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


session_start();

?>

<body>
    <div class="top_third">
        <div class="menu_container">
            <div class="menu_title_s">
                <h1 class="menu_title_s">SENIOR</h1>
            </div>
            <!--test for logo-->
            <!--<div class="menu_title_s" id="logo">
                <img src="images/home_banner.png" width="40%">
            </div>

            <a class="menu_title_s" id="title_img">
                <img src="images/logo.png" width=20% height=20%>
            </a>
            -->
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="images/watchlist.png"/>
                <a class="nav_links" href="#">Watchlist</a>
                <img src="images/cart.png"/>
                <a class="nav_links" href="#">My Cart</a>
                <img src="images/checkout.png"/>
                <a class="nav_links" href="#">Checkout</a>
                <img src="images/login.png"/>
                <?php 
                if(isset($_SESSION["active"]) && $_SESSION["active"] === true){
                    echo "<a class = 'nav_links' href='logout.php'>Logout</a>";

                }else{
                    echo 
                    "<a class = 'nav_links' href='login.php'>Login</a>
                    ";

                }
                ?>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="#" id="selected"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="community.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>
    <div class="page_wrapper">
        <?php if(isset($_SESSION["active"]) && $_SESSION["active"]){

            echo "
            
            <div class='block1' id='home'>
                </div>
            ";

                //<div class='title' id='welcome'><h4>Welcome back," . $_SESSION["username"] . $_SESSION["id"] . "</h4></div>
        }else{
            echo "
            
            <div class='home_body' id='join'>
                <div class='title' id='shopping'>
                    <span>SHOPPING</span> <span id='alt'>AND</span> <span>EXCHANGE</span> <span id='alt'>FOR</span> 
                    <span>GREY</span> <span id='alt'>NOMADS</span> <span>INTERESTED</span> <span id='alt'>IN</span> <span>OUTDOOR</span> <span id='alt'>RECREATION</span>
                </div>
                <div class='home_body_text'>
                    <span>The journey of a lifetime awaits you! </span><br/>
                    <span>Our community of grey nomads welcomes you to the greatest ecommerce web application ever created.</span><br/>
                    <span>Don't miss this terrific opportunity to buy, trade and sell an amazing range of good quality products</span> 
                </div>
                <div class='grid'>
                    <div class='block_1'>
                        <img src='images/greeting_2.png'/>
                        <a class='button' type='submit'  href='registration.php' style='width: 220px'>JOIN NOW</a>
                    </div>
                        <img id='cursor' src='images/cursor.png'/>
                </div>
                <div class='about'>
                    <div class='sub_heading'>
                        <h2 id='about'>TERMS & CONDITIONS</h2>
                    </div>
                        <!-- this is now the T&C section -->
                    <ul id='about_us_home'>
                    <li><span>When you create an account with us, you guarantee that you are above the age of 18, and that the information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete, or obsolete information may result in the immediate termination of your account on Service.
                    </span></li><br/>
                    <li><span>You are responsible for maintaining the confidentiality of your account and password, including but not limited to the restriction of access to your computer and/or account. You agree to accept responsibility for any and all activities or actions that occur under your account and/or password, whether your password is with our Service or a third-party service. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.
                    </span></li><br/>
                    <li><span>You may not use as a username the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar or obscene.
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
            <div class="sub_heading">
                <h2>NEWS & EVENTS</h2>
            </div>
            <!-- code to handle the display/update of the news list -->
            <?php 
            echo "<div class='item_list'>";
            echo "<ul>";
            $news_sql = "SELECT * FROM `news` ORDER BY postdate DESC;";
            if($news_result = mysqli_query($conn, $news_sql)){
                if(mysqli_num_rows($news_result) > 0){

                    while($row = mysqli_fetch_assoc($news_result)){
                        $title = $row["title"];
                        $img = $row["img"];
                        $content = $row["content"];
                        $date = $row["postdate"];
                        echo "<li class='list'>";
                        echo "<h3 class='item_list_title'>$title</h3>";
                        echo "<div class='item_list_wrapper'>";
                        echo "<div class='content'>";
                        echo "<img src='images/$img'/>";
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
    <div class="footer">
        <h4>Thomas Hobbs | Udall Liao | Jay Schuyler</h4>
    </div>
</body>
</html>
