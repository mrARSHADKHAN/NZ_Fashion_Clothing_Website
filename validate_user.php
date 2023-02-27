<?php
  session_start();
  //check whether the user has logged in or not
  if(count($_SESSION)<=0){
    //not logged in;
    header("location:login_3.php?status=invalid_log");
  }
  else{
    if(($_SESSION['user_role'] != 'user')){
      header("location:login_3.php?status=invalid_log");
    }
  }
?>
