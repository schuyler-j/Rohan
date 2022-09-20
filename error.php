<!DOCTYPE html>
<html lang="en">
<head>
<title>Error</title>
<meta charset="UTF-8" />
<meta name="author" content="TUJ_Rohan" />
<link rel="stylesheet" href="styles/style.css" />
<link rel="stylesheet" href="styles/footer.css" />
<link rel="icon" href="images/favicon.png">
<script src="scripts/script.js" defer></script>
</head>



<body>
    <div class="page_wrapper">
        <div>
            <h2 class="nav_title">
                <?php $msg = $_GET['msg']; echo $msg; ?>
            </h2>
            <div style="text-align: center; background: #71856d;">
                <img src="images/login.png"/>
                <a href="login.php" style="color:#111">Click Here to Login.</a>
            </div>
            <br/>
            <br/>
        </div>
    </div>
</body>
</html>