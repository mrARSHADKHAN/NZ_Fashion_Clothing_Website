<?php 

//database connection
require("../db_connection.php");

echo ("<pre>");
print_r($_REQUEST);
echo ("</pre>");

$name        = $_REQUEST['name'];
$user_id     = $_REQUEST['user_id'];
$access_code = $_REQUEST['access_code'];
$password    = $_REQUEST['password'];



?>