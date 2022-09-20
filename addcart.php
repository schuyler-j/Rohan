<?php


if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
    $product_sql = "SELECT * FROM `products`;";
    $psql = mysqli_query($conn, $product_sql);
    $row = mysqli_fetch_assoc($psql);

    $msg = "";

    $total = 0;
    $creditcard = $_SESSION["creditcard"];
    $addr = $_SESSION["addr"];
    $userid = $_SESSION["id"];
    $productid = 0;

}else{
    $userid = 0;
    $productid = 0;
}

//$wish_sql = "SELECT * FROM `wishlist` WHERE UserID = $userid;";

?>