<?php require_once "db/dbconn.inc.php";
$sql = "SELECT FirstName FROM `users` WHERE Username = \"scol5\";";
//scol5 is a temp username, this needs to be a variable in the future
$sID = "SELECT SessionID FROM `users` WHERE Username = \"scol5\";";

$pass = "SELECT Password FROM `users` WHERE Username = ?;";
$statement = mysqli_stmt_init($conn);

if(isset($_POST["users"])){
    mysqli_stmt_prepare($statement, $pass);
    mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_POST["username"]));

    if(mysqli_stmt_execute($statement)){
        header("location: index.php");
    }else{
        mysqli_error($conn);
    }

mysqli_close($conn);
}







?>