<!DOCTYPE html>
<html lang="en">
<head>
<title>Error</title>
<meta charset="UTF-8" />
<meta name="author" content="TUJ_Rohan" />
<link rel="stylesheet" href="../styles/style.css" />
<link rel="stylesheet" href="../styles/footer.css" />
<link rel="icon" href="../images/favicon.png">
<script src="../scripts/script.js" defer></script>
<style>
    .error_layout{
        padding-top: 250px;
    }
    #error{
        color: #f2d349;
    }
    #title{
        font-size: 32px;
    }


</style>
</head>



<body>
    <div class="error_layout">
    <div class="page_wrapper">
        <div>
            <h4 class="nav_title" id="title">
                <?php $msg = $_GET['msg']; echo $msg; ?>
            </h4>
            <div style="text-align: center; background: #71856d;">
                <img src="../images/login.png"/>
                <a href="../nav/login.php" id="error">Click Here to Login.</a>
            </div>
            <br/>
            <br/>
        </div>
</div>
    </div>
</body>
</html>
