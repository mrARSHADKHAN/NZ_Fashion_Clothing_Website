<?php
    require("validate_user.php");
    
    //conntect to database
    require("../db_connection.php");


    $pro_name     = addslashes($_REQUEST['pro_name']);
    $category     = addslashes($_REQUEST['category']);
    $size         = addslashes($_REQUEST['size']);
    $brand        = addslashes($_REQUEST['brand']);
    $price        = addslashes($_REQUEST['price']);
    $description  = addslashes($_REQUEST['description']);

    $sql  = "insert into products (pro_name,category,size,price,brand,description) values(";
    $sql .= "'$pro_name',";
    $sql .= "'$category',";
    $sql .= "'$size',";
    $sql .= "$price,";
    $sql .= "'$brand',";
    $sql .= "'$description')";


    //echo $sql;

    //execute the command
    $x = $mysqli->query($sql);

    if($x>0){

        if( $_FILES['picture']['error'] == 0 && $_FILES['picture']['type']=="image/jpeg"){

            $last_id = $mysqli->insert_id;
            $filename    = $_FILES['picture']['tmp_name'];
            $destination = $last_id . "_" . rand().rand().rand() . ".jpg";

            $fx = move_uploaded_file($filename,"../img/product/".$destination);
            if($fx>0){

                $sql2 = "update products set picture='$destination' where pro_id=$last_id";
                $mysqli->query($sql2);

            }
        }
        else{
        //file not uploaded
        }
        header("location:add_product_3.php?status=pass");
    }
    else{
        header("location:add_product_3.php?status=fail");
    }
    
?>