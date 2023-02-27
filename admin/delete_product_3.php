<?php
    require("validate_user.php");

    if($_SESSION['user_role'] != "admin"){
      header("location:login_3.php?status=invalid_log");
    }

    //connect to database
    require("../db_connection.php");
    require("code_bank.php");

    $pro_id = $_REQUEST['pro_id'];

    $sql = "select * from products where pro_id=$pro_id";

    $sr = $mysqli->query($sql);

    if(mysqli_num_rows($sr)>0){

        $sql_backup = "insert into products_archive select * from products where pro_id=$pro_id";

        $x = $mysqli->query($sql_backup);

        if($x>0){
            $old_file_name = getProfilePicture($pro_id);

            $sql_delete = "delete from products where pro_id=$pro_id";
            $y = $mysqli->query($sql_delete);

            if($y>0){
                unlink("../img/product/$old_file_name");
                header("location:delete_product_4.php?status=pass");
            }
            else{
                //delete failed
                header("location:delete_product_4.php?status=fail");
            }
        }
        else{
            //backup failled
        }
    }
    else{

    }

?>