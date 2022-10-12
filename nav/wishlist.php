<!DOCTYPE html>
<html lang="en">
<head>
<title>Wishlist</title>
<meta charset="UTF-8" />
<meta name="author" content="TUJ_Rohan" />
<link rel="stylesheet" href="../styles/style.css" />
<link rel="stylesheet" href="../styles/footer.css" />
<link rel="icon" href="../images/favicon.png">
<script src="../scripts/script.js" defer></script>
</head>

<body>
<?php
require_once "../db/dbconn.inc.php";
/*
session_start();
*/
?>
    <div class="top_third">
        <div id="mc" class="menu_container">
            <h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png" />
                <a class="nav_links" href="wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")"?></a>
                <img src="../images/cart.png" />
                <?php
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    echo "
                        <a class='nav_links' href='cart.php'>My Cart</a>
                    ";
                }else{
                    echo "
                        <a class='nav_links' href='error.php?msg=please%20login%20to%20view%20cart'>My Cart</a>
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
                    echo "<a class = 'nav_links' href='logout.php'>Logout</a>";

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
                <li class="list"><a href="../community/community-landing.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="../home/shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="../home/about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="../home/contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>

    <div class="page_wrapper">



<?php
$total = 0;
require_once "../db/dbconn.inc.php";
if(isset($_SESSION["active"]) && $_SESSION["active"] === true){
    $userid = $_SESSION["id"];
    $sql = "SELECT * FROM `wishlists` WHERE userID = $userid;";
    $sqli = $conn->query($sql);
    $row = $sqli->fetch_assoc();

echo "<div class=box>";
echo "<div class=item_list_wrapper>";
echo "<h2><b>Wishlist</b></h2><br/>";
$msg = "None";

    if ($wishlist = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($wishlist) > 0) {
            while ($row = mysqli_fetch_assoc($wishlist)) {
                $ss = "SELECT * FROM `products` WHERE ProductID = $row[ProductID];";
                $s = $conn->query($ss);
                $prod = $s->fetch_assoc();
                echo "<div class=title>";
                echo $prod["pName"];
                echo "</div>";
                echo " <i>$" . $prod["Price"] . "</i>";
                echo "<br/>";
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    $addcart = '../community/community.php?action=ac&id=' . $row["ProductID"];
                }
                echo "
                <form method='POST' action=$addcart>
                    <input class='button' value='Add To Cart' id='atc_input' type='submit'>
                    </input>
                </form>";
                if(isset($_GET['action']) && $_GET['action'] == 'del'){
                    $id_to_remove = $_GET['id'];
                    $removes = "DELETE FROM `wishlists` WHERE ProductID = $id_to_remove";
                    $updates = "UPDATE `products` SET `stockAmt` = (stockAmt + 1) WHERE `products`.`ProductID` = $id_to_remove;";
                    $prep = mysqli_stmt_init($conn);
                    $upda = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($prep, $removes);
                    mysqli_stmt_prepare($upda, $updates);
                    mysqli_stmt_execute($upda);
                    mysqli_stmt_execute($prep);
                    header("location: wishlist.php");

                }
                echo"
                <form method='POST' action='wishlist.php?action=del&id=$row[ProductID]'>
                                <input type=submit class='button' id='atc' value='Remove From Wishlist'>
                                </input>
                                <form>";
                echo "<br/>";
                $total = $total + floatval($prod["Price"]);
                $msg = "";
            }
        echo "<br/>";
        echo "<b>Total:</b> $" . $total;
    }
}
echo "<i>" .$msg. "</i>";
echo "<br/>";
echo "<br/>";
echo "<a href='../home/index.php'>Home</a>";
}else{
    echo "<div style='padding-bottom:80px;'>";
    echo "<h4 style=font-size:32px>empty</h4>";
    echo "<a style='color:#fff;' href='../home/index.php'>Home</a>";
    echo "</div>";
}

echo "</div>";
echo "</div>";

?>
</div>
</body>
</html>
