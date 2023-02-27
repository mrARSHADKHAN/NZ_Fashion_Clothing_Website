<?php 
  //start a session
  session_start();

  //connect to databse
  require("../db_connection.php");

  $user_id     = $_REQUEST['user_id'];
  $access_code = $_REQUEST['access_code'];

  $sql = "select * from logs where user_id='$user_id'";
  $sr = $mysqli->query($sql);

  if(mysqli_num_rows($sr)>0){
    $row = mysqli_fetch_assoc($sr);

    if($row['access_code'] == crypt($access_code,$row['access_code'])){

      $_SESSION['user_id']   = $user_id;
      $_SESSION['user_role'] = $row['role'];
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_pic'] = $row['picture'];

      header("location:dashboard.php");
    }
    else{
      // invalid logging
      header("location:login_3.php?status=invalid_log");
    }
  }
  else{
    // no user found
    header("location:login_3.php?status=no_user");
  }
 
?>