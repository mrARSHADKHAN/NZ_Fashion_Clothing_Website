<?php
  //database connection
  $server   = "localhost";
  $username = "root";
  $password = "";
  $db_name  = "nz_fashion";

  $mysqli = new mysqli($server,$username,$password,$db_name);

  if($mysqli->connect_error){
    echo "<pre>";
    echo $mysqli->connect_error;
    die("connection failed");
    echo "</pre>";
  }
   //echo "connection successfull";
?>
