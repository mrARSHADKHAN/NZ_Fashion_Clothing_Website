<?php 
require("validate_user.php");

//conntect to database
require("../db_connection.php");

$pro_id       = addslashes($_REQUEST['pro_id']);
$pro_name     = addslashes($_REQUEST['pro_name']);
$category     = addslashes($_REQUEST['category']);
$size         = addslashes($_REQUEST['size']);
$brand        = addslashes($_REQUEST['brand']);
$price        = addslashes($_REQUEST['price']);
$description  = addslashes($_REQUEST['description']);

$sql  = "update products set ";
$sql .= "pro_name='$pro_name',";
$sql .= "category='$category',";
$sql .= "size='$size',";
$sql .= "brand='$brand',";
$sql .= "price=$price,";
$sql .= "description='$description' where pro_id=$pro_id";

$x = $mysqli->query($sql);

if($x>0){
    header("location:edit_product_4.php?status=pass");
}
else{
    header("location:edit_product_4.php?status=fail");
}

?>