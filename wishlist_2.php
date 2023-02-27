<?php
    require("validate_user.php");

    if(!(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != '')){
        header("location:login_3.php?status=invalid_log");
    }
    else{
        
        //database connection
        require("db_connection.php");

        $pro_id = $_REQUEST['pro_id'];
        $cus_id = $_SESSION['cus_id'];

        $sql = "insert into wishlist (cus_id,pro_id) values ('$cus_id','$pro_id')";
        $x = $mysqli->query($sql);

        header("location:gallery.php");

    }



?>