<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="UTF-8" />
<meta name="author" content="TUJ_Rohan" />
<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="styles/footer.css" />
<link rel="icon" href="images/favicon.png">
<script src="scripts/script.js" defer></script>
</head>
<?php 
require_once "db/dbconn.inc.php"; 

/*
session_start();
*/
?>
<body>
    <div class="top_third">
        <div class="menu_container">
            <h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="images/watchlist.png"/>
                <a class="nav_links" href="wishlist.php">Wishlist</a>
                <img src="images/cart.png"/>
                <a class="nav_links" ><div style="text-decoration:underline; color:#222;">My Cart</div></a>
                <img src="images/checkout.png"/>
                <a class="nav_links" href="checkout.php">Checkout</a>
                <img src='images/login.png'/>                
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
                <li class="list"><a href="index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="community-landing.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>

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
                    <li><div class='sub_heading' style='font-size:38px'>My Cart</div></li>";
                    if(isset($_SESSION["active"]) && $_SESSION["active"]){
                    $sql = "SELECT * FROM `cart` WHERE `UserID` = $_SESSION[id];";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $new_sql = "SELECT * FROM `products` WHERE ProductID = $row[ProductID];";
                                $s = $conn->query($new_sql);
                                $cart = $s->fetch_assoc();
                                if($cart["onSale"] == 1){
                                    $iprice = $cart["salePrice"];

                                }else{
                                    $iprice = $cart["Price"];
                                }
                                echo "<li class=list><div class=item_list_wrapper id=cart_item_list>"; 
                                echo "<div class=top-right>
                                <form>
                                <input type=submit class=button id=atc value='Remove From Cart'>
                                </input>
                                <form>
                                </div>";
                                echo "<div class=><img id=img_cart src=images/$cart[imgSrc] />
                                
                                <div class=desc>$cart[Description]</div>
                                
                                </div>";
                                echo "<h3 class=item_list_title>$cart[pName]</h3>";
                                echo "<div>
                                <h3 id=cart_price>$iprice</h3>
                                </div>";
                                echo "</div>";
                                echo "</li>";


                                $count = $count + 1;
                                $total = $total + floatval($iprice);

                            }
                        }
                    }
                } 
                                    
                                    
                        echo "
            </div>        
                <ul class='item_list' id='cart_total'>
                    <li><div class='sub_heading' style='font-size:38px'>Cart Totals</div></li>
                    <li id='item_total'><b>Total Number of Items: $count</b></li>
                    "; 
                    $sqld = "SELECT * FROM `cart` WHERE UserID = $_SESSION[id];";
                    $resultd = mysqli_query($conn, $sqld);
                    if($resultd){while($rowi = mysqli_fetch_array($resultd)){
                        $sqli = "SELECT * FROM `products` WHERE ProductID = $rowi[ProductID];";
                        $ss = $conn->query($sqli);
                        $pro = $ss->fetch_assoc();
                        echo "
                            <li><div class='list_of_items'>$pro[pName]</br>                     
                        ";

                    }}
                    echo "
            </div>
            </li>
                    <li id='total'><b>Estimated Total: $total</b></li>
                    <li id='estimate'>NOTE: This is not the final total, this is an estimate.</li>
                    <br/>
                    <li><a href='checkout.php'><div class='button' id='checkout'>CHECKOUT</div></li>
                </ul>
                

                ";
                ?>
        </div>
    </div>
</body>
</html>

  
</html>
