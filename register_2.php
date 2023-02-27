<?php 
    //start a session
    session_start();

    //databse connection
    require("db_connection.php");

    $cus_id       = $_REQUEST['cus_id'];
    $cus_name     = $_REQUEST['cus_name'];
    $contact      = $_REQUEST['contact'];
    $cus_acc_code = crypt($_REQUEST['cus_acc_code'],$_REQUEST['cus_acc_code']);
    $con_acc_code = crypt($_REQUEST['con_acc_code'],$_REQUEST['con_acc_code']);

    //checks for passoword match
    if($cus_acc_code == $con_acc_code){
    
    $sql2 = "select * from customer_logs where cus_id='$cus_id'"; 
    $sr = $mysqli->query($sql2);

    //check for username
    if(mysqli_num_rows($sr)>0){
        header("location:register_3.php?status=user_exit");
    }
    else{
        $sql  = "insert into customer_logs (cus_id,cus_name,contact,cus_acc_code) values(";
        $sql .= "'$cus_id',";
        $sql .= "'$cus_name',";
        $sql .= "'$contact',";
        $sql .= "'$cus_acc_code')";

        $rs = $mysqli->query($sql);

        if($rs>0){
            $_SESSION['cus_id']   = $cus_id;
            $_SESSION['cus_name'] = $cus_name;
            $_SESSION['contact']  = $contact;
            
            header("location:home.php");
        }
        else{
            header("location:register_3.php?status=fail");
            }
        }
        }
        else{
            //no matching password
            header("location:register_3.php?status=wrong_pass");
        }
?>