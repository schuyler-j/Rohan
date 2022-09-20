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

session_start();

if(isset($_SESSION["active"]) && $_SESSION["active"] === true){
    header("location: index.php");
    exit;
}else{
    $msg="";

}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        header("location: error.php");
    }else{
        $user = trim($_POST["username"]);
    }

    if(empty(trim($_POST["password"]))){
        header("location: error.php");
    }else{
        $pass = SHA1($_POST["password"]);
    }



    $sql = "SELECT FirstName FROM `users` WHERE Username = '$user';";

    $get_user = "SELECT Username FROM `users` WHERE Username = '$user';";
    $get_pass = "SELECT Password FROM `users` WHERE Password = '$pass';";
    $get_name = "SELECT * FROM `users` WHERE Username = '$user';";

    $ruser = $conn->query($get_user);
    $ruser_ = $ruser->fetch_assoc();
    $rname = $conn->query($get_name);
    $rname_ = $rname->fetch_assoc();

    $gpass = $conn->query($get_pass);
    $gpass_ = $gpass->fetch_assoc();

    if($res = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($res, "s", $uname);


        if(mysqli_stmt_execute($res)){
            mysqli_stmt_store_result($res);

            if(mysqli_stmt_num_rows($res) == 1){
                mysqli_stmt_bind_result($res, $UserID, $user, $password);
                if(mysqli_stmt_fetch($res)){
                    if($user == $ruser_["Username"] && $pass == $gpass_["Password"]){
                        session_start();

                        $_SESSION["active"] = true;
                        $_SESSION["id"] = $rname_["UserID"];
                        $_SESSION["username"] = $user;
                        $_SESSION["name"] = $rname_["FirstName"];

                        header("location: index.php");
                    }else{
                        header("location: error.php?msg=Bad%20Password.%20Try%20Again.");
                    }
                }
            }else{
                        header("location: error.php?msg=No%20account%20matches%20those%20credentials.");
            }
        }else{
            echo "error";
        }
        mysqli_stmt_close($res);
    }

    mysqli_close($conn);
}
?>

<body>
    <div class="top_third">
        <div class="menu_container">
            <h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
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
                <a class = 'nav_links' href="login.php">Login</a>
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <ul class="item_list" id="login_form">
                    <li><div class="sub_heading" style="font-size:38px">Login</div></li>
                    <li id="top_input_title"><b>Username</b></li>
                    <li><input type="text" placeholder="" id="uname" name="username" required></input></li>
                    <li id="pname_title"><b>Password</b></li>
                    <li><div class="password_block">
                            <input type="password" placeholder="" id="pword" name="password" required></input>
                            <button type="button" id="show_password" onclick="ShowPassword()"><img src="images/eye.png"></img></button>
                        </div></li>
                    <li><a href="registration.php"><h4>Don't have an account? Sign Up Here!</h4></a></li>
                    <br/>
                    <li><input type="submit" class="button" value="LOGIN" name="login" id="login_btn"></input></li>
                </ul>
            </form>
        </div>
    </div>




</body>
</html>
