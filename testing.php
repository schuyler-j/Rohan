
<?php require_once "db/dbconn.inc.php";

echo $_SESSION['fn'] = $_POST['firstname'];
echo $_SESSION['ln'] = $_POST['lastname'];
echo $_SESSION['un'] = $_POST['username'];
echo $_SESSION['pw'] = $_POST['password'];
echo $_SESSION['ea'] = $_POST['emailaddress'];
echo $_SESSION['sa'] = $_POST['streetaddress'];
echo $_SESSION['pc'] = $_POST['postcode'];
echo $_SESSION['db'] = $_POST['dob'];


?>
