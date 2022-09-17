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

<body>
    <?php //require_once "db/dbconn.inc.php"; ?>
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
                <?php /*
                $session_result = $conn->query($sID);
                $s = mysqli_fetch_assoc($session_result);
                if($s["SessionID"] == NULL){
                    echo "
                    <a class='nav_links' href='#'>Login</a>
                    ";
                }else{
                    $result = $conn->query($sql);
                    $r = $result->fetch_assoc();
                    echo "<a class='nav_links' id='firstname_log'>";
                    echo "hello, " . $r["FirstName"]
                    . "</a>";
                }

                */ ?>
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
        <div class="home_body" id="join">
            <div class="title" id="shopping">
                <span>SHOPPING</span> <span id="alt">AND</span> <span>EXCHANGE</span> <span id="alt">FOR</span> 
                <span>GREY</span> <span id="alt">NOMADS</span> <span>INTERESTED</span> <span id="alt">IN</span> <span>OUTDOOR</span> <span id="alt">RECREATION</span>
            </div>
            <div class="home_body_text">
                <span>The journey of a lifetime awaits you! </span>
                <span>Velit sint qui ipsum amet ex cupidatat minim non sunt esse enim. </span>
                <span>Tempor fugiat voluptate eiusmod dolore eu irure elit.</span> 
            </div>
            <div class="grid">
                <div class="block_1">
                    <img src="images/greeting_2.png"/>
                    <a class="button" type="submit"  href="registration.php" style="width: 220px">JOIN NOW</a>
                </div>
                    <img id="cursor" src="images/cursor.png"/>
            </div>
            <div class="about">
                <div class="sub_heading">
                    <h2 id="about">TERMS & CONDITIONS</h2>
                </div>
                <p id="about_us_home">
                    <!-- this is now the T&C section -->
                    <span>Ipsum elit ad sint anim. </span>
                    <span>Velit sint qui ipsum amet ex cupidatat minim non sunt esse enim. </span>
                    <span>Tempor fugiat voluptate eiusmod dolore eu irure elit.</span> 
                    <span>Nostrud adipisicing nulla adipisicing sunt eiusmod occaecat. </span>
                    <span>Consectetur excepteur velit culpa deserunt sit. </span>
                    <span>Reprehenderit ea cillum sit aute fugiat sit minim labore tempor magna amet reprehenderit. </span>
                    <span>Mollit nisi laborum velit pariatur quis aliquip nostrud consectetur pariatur anim amet ipsum sit sit. </span>
                    <span>In eiusmod reprehenderit ipsum fugiat. </span>
                    <span>Laboris elit ut et ullamco esse et voluptate esse eu. </span>
                    <span>Adipisicing deserunt eu id voluptate sint aliqua reprehenderit aliquip aute culpa. </span>
                    <span>Ea aliqua adipisicing aute esse nulla esse cupidatat nostrud pariatur qui ex. </span>
                    <span>Proident sunt dolore non id voluptate. </span>
                    <span>Cillum do in tempor veniam reprehenderit excepteur ipsum pariatur excepteur. </span>
                </p>
            </div>
        </div>
        <div class="home_body" id="news">
            <div class="sub_heading">
                <h2>NEWS & EVENTS</h2>
            </div>
            <!-- code to handle the display/update of the news list -->
            <?php 

            ?>
            <div class="item_list">
                <ul>
                    <li class="list">
                        <h3 class="item_list_title">lorem</h3>
                        <div class="item_list_wrapper">
                            <a href="#"><h5>Occaecat deserunt amet Lorem nulla ipsum ipsum est duis amet ea enim.</h5></a>
                            <div class="content">
                                <img src="images/d1.png"/>
                                <div class="block1">
                                    <p>Qui laboris nulla incididunt voluptate quis in do proident ullamco exercitation eiusmod velit. </p>
                                    <div class="date">date</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list">
                        <h3 class="item_list_title">lorem</h3>
                        <div class="item_list_wrapper">
                            <a href="#"><h5>Occaecat deserunt amet Lorem nulla ipsum ipsum est duis amet ea enim.</h5></a>
                            <div class="content">
                                <img src="images/d1.png"/>
                                <div class="block1">
                                    <p>Qui laboris nulla incididunt voluptate quis in do proident ullamco exercitation eiusmod velit. </p>
                                    <div class="date">date</div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- fix footer to be located at the bottom of the page -->
    <!-- then update on all pages -->
    <div class="footer">
        <h4>Thomas Hobbs | Udall Liao | Jay Schuyler</h4>
    </div>
</body>
</html>
