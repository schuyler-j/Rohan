<?php
require_once "../home/shopping.php";
mysql_select_db("blog1")or die(mysql_error());
$search = mysql_real_escape_string($_GET['search']);
$result = mysql_query("SELECT * FROM member WHERE search = '" + $search + "'");
print_r($result);
?>