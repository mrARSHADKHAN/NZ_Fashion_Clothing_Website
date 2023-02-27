<?php
    session_start();

    if($_SERVER['SCRIPT_NAME'] = "home.php");
    require("db_connection.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
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

<body>
    
    <!-- Navbar section -->
    <?php
        require("includes/navbar.php");
    ?>
    <!-- End of Navbar section -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <?php
                $tshirts = "select * from products where category='t-shirts'";
                $tshirts_exc = $mysqli->query($tshirts);
                $c_tshirts = mysqli_num_rows($tshirts_exc);

                $shoes = "select * from products where category='shoes'";
                $shoes_exc = $mysqli->query($shoes);
                $c_shoes = mysqli_num_rows($shoes_exc);

                $perfumes = "select * from products where category='perfumes'";
                $perfumes_exc = $mysqli->query($perfumes);
                $c_perfumes = mysqli_num_rows($perfumes_exc);

                $accessories = "select * from products where category='accessories'";
                $accessories_exc = $mysqli->query($accessories);
                $c_accessories = mysqli_num_rows($accessories_exc);


            ?>
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="img/categories/category-1.jpg">
                    <div class="categories__text">
                        <h1>Men’s Fashion</h1>
                        <p>You can shop all kind of men's fashion item in this NZ-Fashion store.</p>
                        <a href="gallery.php">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-2.jpg">
                            <div class="categories__text">
                                <h4>Trendy T-Shirts</h4>
                                <p><?php echo $c_tshirts ?> items</p>
                                <a href="gallery.php?category=t-shirts">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-3.jpg">
                            <div class="categories__text">
                                <h4>Casual Shoes</h4>
                                <p><?php echo $c_shoes ?> items</p>
                                <a href="gallery.php?category=shoes">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-7.jpg">
                            <div class="categories__text">
                                <h4>Perfumes</h4>
                                <p><?php echo $c_perfumes ?> items</p>
                                <a href="gallery.php?category=perfumes">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-6.jpg">
                            <div class="categories__text">
                                <h4>Accessories</h4>
                                <p><?php echo $c_accessories ?> items</p>
                                <a href="gallery.php?category=accessories">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".t_shirts">T-Shirts</li>
                    <li data-filter=".shirts">Shirts</li>
                    <li data-filter=".trousers">Trousers</li>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            <?php
                
                $limit = 4;
                
                //search for the record 
                $sql = "select * from products where category='t-shirts' limit $limit";
                $sr = $mysqli->query($sql);
                $sql1 = "select * from products where category='shirts' limit $limit";
                $sr1 = $mysqli->query($sql1);
                $sql2 = "select * from products where category='trousers' limit $limit";
                $sr2 = $mysqli->query($sql2);

            ?>
            
            <?php
                while($row = mysqli_fetch_assoc($sr)){
            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix t_shirts">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row['picture'] ?>">
                                <ul class="product__hover">
                                    <li><a class="image-popup" href="img/product/<?php echo $row['picture'] ?>"><span class="arrow_expand"></span></a></li>
                                    
                                    <?php
                                        if(!(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != '')){
                                    ?>
                                            <li><a href="./wishlist_2.php?pro_id=<?php echo $row['pro_id'] ?>"><span class="icon_heart_alt"></span></a></li>
                                    <?php
                                        }
                                        else{
                                            $cus_id = $_SESSION['cus_id'];
                                            $pro_id = $row['pro_id'];
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
                                                <li><a href="./wishlist_2.php?pro_id=<?php echo $row['pro_id'] ?>"><span class="icon_heart_alt"></span></a></li>
                                    <?php
                                            }
                                        }    
                                    ?>

                                    <li><a href="./product_details.php?pro_id=<?php echo $row['pro_id'] ?>"><span class="arrow_right"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="./product_details.php?pro_id=<?php echo $row['pro_id'] ?>"><?php echo $row['pro_name'] ?></a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">Rs. <?php echo $row['price'] ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    while($row1 = mysqli_fetch_assoc($sr1)){
            ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix shirts">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row1['picture'] ?>">
                                    <ul class="product__hover">
                                        <li><a class="image-popup" href="img/product/<?php echo $row1['picture'] ?>"><span class="arrow_expand"></span></a></li>
                                        
                                        <?php
                                            if(!(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != '')){
                                        ?>
                                                <li><a href="./wishlist_2.php?pro_id=<?php echo $row1['pro_id'] ?>"><span class="icon_heart_alt"></span></a></li>
                                        <?php
                                            }
                                            else{
                                                $cus_id = $_SESSION['cus_id'];
                                                $pro_id = $row1['pro_id'];
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
                                                    <li><a href="./wishlist_2.php?pro_id=<?php echo $row1['pro_id'] ?>"><span class="icon_heart_alt"></span></a></li>
                                        <?php
                                                }
                                            }    
                                        ?>

                                        <li><a href="./product_details.php?pro_id=<?php echo $row1['pro_id'] ?>"><span class="arrow_right"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="./product_details.php?pro_id=<?php echo $row1['pro_id'] ?>"><?php echo $row1['pro_name'] ?></a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">Rs. <?php echo $row1['price'] ?></div>
                                </div>
                            </div>
                        </div>

                    <?php            

                        while($row2 = mysqli_fetch_assoc($sr2)){
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 mix trousers">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row2['picture'] ?>">
                                        <ul class="product__hover">
                                            <li><a class="image-popup" href="img/product/<?php echo $row2['picture'] ?>"><span class="arrow_expand"></span></a></li>
                                            
                                            <?php
                                                if(!(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != '')){
                                            ?>
                                                    <li><a href="./wishlist_2.php?pro_id=<?php echo $row2['pro_id'] ?>"><span class="icon_heart_alt"></span></a></li>
                                            <?php
                                                }
                                                else{
                                                    $cus_id = $_SESSION['cus_id'];
                                                    $pro_id = $row2['pro_id'];
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
                                                        <li><a href="./wishlist_2.php?pro_id=<?php echo $row2['pro_id'] ?>"><span class="icon_heart_alt"></span></a></li>
                                            <?php
                                                    }
                                                }    
                                            ?>

                                            <li><a href="./product_details.php?pro_id=<?php echo $row2['pro_id'] ?>"><span class="arrow_right"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="./product_details.php?pro_id=<?php echo $row2['pro_id'] ?>"><?php echo $row2['pro_name'] ?></a></h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product__price">Rs. <?php echo $row2['price'] ?></div>
                                    </div>
                                </div>
                            </div>
            <?php            
                        }
                    }          
                }
            ?>

        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="img/banner/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Best Collection of</span>
                            <h1>Jackets</h1>
                            <a href="gallery.php?category=jackets">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Top Collection of</span>
                            <h1>Shirts</h1>
                            <a href="gallery.php?category=shirts">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The New Collection of</span>
                            <h1>Accessories</h1>
                            <a href="gallery.php?category=accessories">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Hot Trend</h4>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/ht-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Chain bucket bag</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">Rs. 600</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/ht-2.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Brown Jacket</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">Rs. 3000</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/ht-3.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Cotton T-Shirt</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">Rs. 1500</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Best sales</h4>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/bs-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Black denim</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">Rs. 4000</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/bs-2.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Zip-pockets briefcase</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">Rs. 6000</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/bs-3.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Round Color T-Shirt</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">Rs. 2000</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Latest</h4>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/f-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Brown Lether Bag</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">Rs. 3300</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/f-2.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Casual Nike</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">Rs. 2300</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/f-3.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Brown Strip Shoes</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">Rs. 4000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="img/discounts.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2022</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="gallery.php">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over Rs. 10,000</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->
    
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