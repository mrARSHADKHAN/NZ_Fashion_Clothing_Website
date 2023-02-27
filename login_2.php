<?php
    //start a session
    session_start();

    //database connection
    require("db_connection.php");

    $cus_id       = $_REQUEST['cus_id'];
    $cus_acc_code = $_REQUEST['cus_acc_code'];

    $sql = "select * from customer_logs where cus_id='$cus_id'";
    $sr = $mysqli->query($sql);

    if(mysqli_num_rows($sr)>0){
        $row = mysqli_fetch_assoc($sr);

        if($row['cus_acc_code'] == crypt($cus_acc_code,$cus_acc_code)){

            $_SESSION['cus_id']    = $cus_id;
            $_SESSION['cus_name']  = $row['cus_name'];
            $_SESSION['contact']   = $row['contact'];
            $_SESSION['user_role'] = 'user';

            header("location:home.php");
          }
          else{
            // invalid logging
            header("location:login_3.php?status=invalid_log");
          }
    }
    else{
        // no user found
        header("location:login_3.php?status=invalid_log");
    }
?>