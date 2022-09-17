<?php require_once "db/dbconn.inc.php";
//\"scol5\"


if(isset($_POST["login"])){


    //scol5 is a temp username, this needs to be a variable in the future
    $sID = "SELECT sessionID FROM `users` WHERE Username = '$user';";

    
    $userID = "SELECT UserID FROM `users` WHERE Username = '$user'";
    $userid = $conn->query($userID);
    $uid = $userid->fetch_assoc();

    $ssid = $conn->query($sID);
    $sid = $ssid->fetch_assoc();

    $insert_pass = "INSERT INTO `session` (`sessionID`, `userID`, `expires`, `timestamp`) VALUES (CURRENT_TIME(), $uid[UserID], CURRENT_DATE()+1, CURRENT_DATE());";

    $statement = mysqli_stmt_init($conn);



    $update_id = "UPDATE `users` SET `sessionID` = '$sid[sessionID]' WHERE `users`.`UserID` = '$uid[UserID]';";


    $update = mysqli_stmt_init($conn);



    
    /*
    if(isset($_POST["login"]) && !empty($_POST["username"]) && !empty($_POST["password"])){
        mysqli_stmt_prepare($statement, $insert_pass);
        mysqli_stmt_prepare($update, $update_id);
        //mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_POST["username"]));

        if($user == $ruser_["Username"] && $pass == $gpass_["Password"]){
            //mysqli_stmt_execute($statement);
            //mysqli_stmt_execute($update);

        }else{
            header("Location: error.php");
        }

    }
    */

}








?>