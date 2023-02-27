<?php
    require("validate_user.php");
    if($_SERVER['SCRIPT_NAME'] = "account.php");

    if(isset($_GET['remove'])){
        $wis_id = $_GET['remove'];

        //database connection
        require("db_connection.php");
        
        $sql3 = "delete from wishlist where wis_id=$wis_id";
        $y = $mysqli->query($sql3);
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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./home.php"><i class="fa fa-home"></i> Home</a>
                        <span>Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Wishlist Products</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <!-- <th>Quantity</th> -->
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                //database connection
                                require("db_connection.php");

                                $cus_id = $_SESSION['cus_id'];
                                $total = 0;

                                $sql = "select * from wishlist where cus_id='$cus_id'";
                                $sr = $mysqli->query($sql);
                                
                                if(mysqli_num_rows($sr)>0){
                                    
                                    while( $row = mysqli_fetch_assoc($sr)){

                                        $pro_id = $row['pro_id'];

                                        $sql1 = "select * from products where pro_id='$pro_id'";
                                        $x = $mysqli->query($sql1);
                                        $pro_row = mysqli_fetch_assoc($x);

                                ?>
                                        <tr>
                                            <td class="cart__product__item">
                                                <img class="" src="img/product/<?php echo $pro_row['picture'] ?>" alt="">
                                                <div class="cart__product__item__title">
                                                    <h6><?php echo $pro_row['pro_name'] ?></h6>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__total"><?php echo $pro_row['brand'] ?></td>
                                            <td class="cart__price">Rs. <?php echo $pro_row['price'] ?></td>
                                            <td class="cart__price">
                                                <form action="add_to_cart.php" method="POST">
                                                    <input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
                                                    <input type="hidden" name="wis_id" value="<?php echo $row['wis_id'] ?>">
                                                    <button type="submit" class="btn btn-danger">Add to cart</button>
                                                </form>
                                            </td>
                                            <td class="cart__close">
                                                <a href="wishlist.php?remove=<?php echo $row['wis_id'] ?>"  onclick="return confirm('Are you sure you want to remove?')">
                                                    <span class="icon_close">
                                                </a>
                                                <!-- <button type="button" class="btn btn-warning">Update</button> --> 
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                else{
                                ?>
                                <tr>
                                    <div>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        No <a href="gallery.php" class="alert-link"> Products</a> in the wishlist.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </tr>
                                
                                <?php
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="gallery.php">Continue Shopping</a>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div> -->
            </div>
            
        </div>
    </section>
    <!-- Shop Cart Section End -->

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