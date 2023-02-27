<?php
    session_start();

    //database connection
    require("db_connection.php");

    if(isset($_POST['submit'])){

        if(!(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != '')){
            $message3[] = 'Please';
        }
        else{
            $cus_id = $_SESSION['cus_id'];
            $pro_id = $_POST['pro_id'];
            $pro_quantity = $_POST['pro_quantity'];
            $size = $_POST['size'];
            
            $sql = "select * from cart where pro_id='$pro_id' AND cus_id='$cus_id'";
            $sr = $mysqli->query($sql);

            if(mysqli_num_rows($sr)>0){
                $message1[] = 'Product already added to cart';
            }

            else{
                $sql1 = "insert into cart (cus_id,pro_id,pro_quantity,size) values(";
                $sql1 .= "'$cus_id',";
                $sql1 .= "'$pro_id',";
                $sql1 .= "'$pro_quantity',";
                $sql1 .= "'$size')";

                $x = $mysqli->query($sql1);

                $message2[] = 'Product Successfully added to Cart';
            }
        }            
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NZ-Fashion</title>

    <!-- Favicons -->
    <link href="admin/assets/img/favicon_nz.jpg" rel="icon">
    <link href="admin/assets/img/favicon_nz.jpg" rel="apple-touch-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
     <!-- Navbar section -->
    <?php
        require("includes/navbar.php");
    ?>
    <!-- End of Navbar section -->

    <?php 
    
    $pro_id = $_REQUEST['pro_id'];

    $sql = "select * from products where pro_id=$pro_id";
    $sr = $mysqli->query($sql);

    if(mysqli_num_rows($sr)>0){
        $row = mysqli_fetch_assoc($sr);
    ?>


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./home.php"><i class="fa fa-home"></i> Home</a>
                        <a href="#"><?php echo $row['category'] ?></a>
                        <span><?php echo $row['pro_name'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <?php
        if(isset($message1)){
            foreach($message1 as $message1){
                echo '<div class="alert_box war" onclick="this.remove();">
                        <div class="row">
                            <div class="alert_sub col-md-12">
                                <h5 class="">'. $message1 .'</h5>
                            </div>
                        </div>
                     </div>';
            }
        }
        if(isset($message2)){
            foreach($message2 as $message2){
                echo '<div class="alert_box" onclick="this.remove();">
                        <div class="row">
                            <div class="alert_sub col-md-12">
                                <h5 class="">'. $message2 .'</h5>
                            </div>
                        </div>
                     </div>';
            }
        }
        if(isset($message3)){
            foreach($message3 as $message3){
                echo '<div class="noti_box">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        '. $message3 .'<a href="login_1.php" class="alert-link"> Login</a> to your account first.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>';
            }
        }
    
    ?>


    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
        <form  method="POST">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__slider__content" >
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="img/product/<?php echo $row['picture'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">

                        <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']; ?>">
                        <input type="hidden" name="picture" value="<?php echo $row['picture']; ?>">
                        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">

                        <h3><?php echo $row['pro_name'] ?> <span>Brand: <?php echo $row['brand'] ?></span></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( <?php echo rand(100,200); ?> reviews )</span>
                        </div>
                        <div class="product__details__price">Rs. <?php echo $row['price'] * 0.9 ?> <span>Rs. <?php echo $row['price'] ?></span></div>
                        <p><?php echo nl2br($row['description']) ?></p>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" name="pro_quantity" value="1">
                                </div>
                            </div>
                            <!-- <a href="" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a> -->
                            <button class="add_cart_btn" name="submit" type="submit"> Add to cart</button>
                            <!-- <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                            </ul> -->
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <!-- <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" id="stockin" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li> -->
                                <!-- <li>
                                    <span>Available color:</span>
                                    <div class="color__checkbox">
                                        <label for="red">
                                            <input type="radio" name="color__radio" id="red" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="black">
                                            <input type="radio" name="color__radio" id="black">
                                            <span class="checkmark black-bg"></span>
                                        </label>
                                        <label for="grey">
                                            <input type="radio" name="color__radio" id="grey">
                                            <span class="checkmark grey-bg"></span>
                                        </label>
                                    </div>
                                </li> -->
                                <li>
                                    <span>Available size:</span>
                                    <div class="size__btn">
                                        <label for="xs-btn">
                                            <input type="radio" name="size" value="XS" id="xs-btn">
                                            XS
                                        </label>
                                        <label for="s-btn">
                                            <input type="radio" name="size" value="S" id="s-btn">
                                            S
                                        </label>
                                        <label for="m-btn" class="active">
                                            <input type="radio" name="size" value="M" id="m-btn" checked>
                                            M
                                        </label>
                                        <label for="l-btn">
                                            <input type="radio" name="size" value="L" id="l-btn">
                                            L
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Promotions:</span>
                                    <p>Order over Rs. 10000 Free Delivery </p>
                                </li>
                                <li>
                                    <span>Delivery Type:</span>
                                    <p>All Over Country</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <?php echo $row['description'] ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php
    }
    else{
        echo ("nothing found");
    }
    ?>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>

            <?php
                
                $pro_category_rel = $row['category'];

                $limit = 4;
                
                //search for the record 
                $sql2 = "select * from products where category='$pro_category_rel' limit $limit";
                $sr2 = $mysqli->query($sql2);

            ?>
            
            <?php
                while($row_rel = mysqli_fetch_assoc($sr2)){
            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row_rel['picture'] ?>">
                                <ul class="product__hover">
                                    <li><a class="image-popup" href="img/product/<?php echo $row_rel['picture'] ?>"><span class="arrow_expand"></span></a></li>
                                    
                                    <?php
                                        if(!(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != '')){
                                    ?>
                                            <li><a href="./wishlist_2.php?pro_id=<?php echo $row_rel['pro_id'] ?>"><span class="icon_heart_alt"></span></a></li>
                                    <?php
                                        }
                                        else{
                                            $cus_id = $_SESSION['cus_id'];
                                            $pro_id = $row_rel['pro_id'];
                                            $wis_sql = "select * from wishlist where pro_id=$pro_id AND cus_id='$cus_id'";
                                            $wis_sr = $mysqli->query($wis_sql);
                                            //Checking the product is in wishlish list to higlight
                                            if(mysqli_num_rows($wis_sr)>0){
                                    ?>
                                                <li><a style="background: #ca1515;" href="#"><span class="icon_heart_alt"></span></a></li>
                                    <?php
                                            }
                                            else{
                                    ?>
                                                <li><a href="./wishlist_2.php?pro_id=<?php echo $row_rel['pro_id'] ?>"><span class="icon_heart_alt"></span></a></li>
                                    <?php
                                            }
                                        }    
                                    ?>

                                    <li><a href="./product_details.php?pro_id=<?php echo $row_rel['pro_id'] ?>"><span class="arrow_right"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="./product_details.php?pro_id=<?php echo $row_rel['pro_id'] ?>"><?php echo $row_rel['pro_name'] ?></a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">Rs. <?php echo $row_rel['price'] ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>
               
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Footer section -->
    <?php
        require("includes/footer.php");
    ?>
    <!-- End of footer section -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>