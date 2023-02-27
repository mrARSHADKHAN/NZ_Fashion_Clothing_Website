<?php 
    require("validate_user.php");

    //database connection
    require("db_connection.php");

    $wis_id         = $_REQUEST['wis_id'];
    $pro_id         = $_REQUEST['pro_id'];
    $cus_id         = $_SESSION['cus_id'];
    $pro_quantity   = '1';
    $size           = 'M';
    
    //delete from wishlist
    $sql = "delete from wishlist where wis_id=$wis_id";
    $x = $mysqli->query($sql);

    //search alrdey product is in cart
    $sql = "select * from cart where cus_id='$cus_id' AND pro_id='$pro_id'";
    $sr = $mysqli->query($sql);

    if(mysqli_num_rows($sr)>0){
        //product alredy in cart
    }
    else{
        //add to cart
        $sql1 = "insert into cart (cus_id,pro_id,pro_quantity,size) values(";
        $sql1 .= "'$cus_id',";
        $sql1 .= "'$pro_id',";
        $sql1 .= "'$pro_quantity',";
        $sql1 .= "'$size')";

        $y = $mysqli->query($sql1);
    }

    header("location:wishlist.php");

?>