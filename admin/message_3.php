<?php
    require("validate_user.php");

    //conntect to database
    require("../db_connection.php");

    $user_id         = $_SESSION['user_id'];
    $current_cus_id  = $_REQUEST['cus_id'];
    $message         = addslashes($_REQUEST['message']);
    $status          = '0';
    $check_last_cm_id = $_REQUEST['check_last_cm_id'];
    

    $sql = "insert into admin_msg (cus_id,user_id,message,cm_id,status) values(";
    $sql .= "'$current_cus_id',";
    $sql .= "'$user_id',";
    $sql .= "'$message',";
    $sql .= "'$check_last_cm_id',";
    $sql .= "'$status')";


    $x = $mysqli->query($sql);
    
    if($x>0){
        header("location:message_2.php?cus_id=$current_cus_id");
    }
?>