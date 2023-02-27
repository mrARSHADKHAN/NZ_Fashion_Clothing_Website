<?php
    session_start();

    if($_SERVER['SCRIPT_NAME'] = "gallery.php");
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
                        <a href="./home.php"><i class="fa fa-home"></i>Home</a>
                        <span>Gallery</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        
                        <form method="GET">
                            <div class="sidebar__color">
                                <div class="section-title">
                                    <h4>Shop by Categories</h4>
                                </div>
                                <?php 
                                    if(isset($_GET['category'])){
                                ?>
                                        <div class="size__list color__list">
                                            <label for="shirts">
                                                Shirts
                                                <input type="radio" id="shirts" name="category" value="shirts" <?php echo ($_GET['category'] == "shirts")?"checked":""; ?>>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label for="t-shirts">
                                                T-Shirts
                                                <input type="radio" id="t-shirts" name="category" value="t-shirts" <?php echo ($_GET['category'] == "t-shirts")?"checked":""; ?>>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label for="trousers">
                                                Trousers
                                                <input type="radio" id="trousers" name="category" value="trousers" <?php echo ($_GET['category'] == "trousers")?"checked":""; ?>>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label for="shoes">
                                                Shoes
                                                <input type="radio" id="shoes" name="category" value="shoes" <?php echo ($_GET['category'] == "shoes")?"checked":""; ?>>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label for="accessories">
                                                Accessories
                                                <input type="radio" id="accessories" name="category" value="accessories" <?php echo ($_GET['category'] == "accessories")?"checked":""; ?>>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label for="all">
                                                <a href="gallery.php" style="color: #444444;">View All</a>
                                                <input type="" id="all">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                <?php 
                                    }
                                    else{
                                ?>
                                                <div class="size__list color__list">
                                            <label for="shirts">
                                                Shirts
                                                <input type="radio" id="shirts" name="category" value="shirts">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label for="t-shirts">
                                                T-Shirts
                                                <input type="radio" id="t-shirts" name="category" value="t-shirts">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label for="trousers">
                                                Trousers
                                                <input type="radio" id="trousers" name="category" value="trousers">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label for="shoes">
                                                Shoes
                                                <input type="radio" id="shoes" name="category" value="shoes">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label for="accessories">
                                                Accessories
                                                <input type="radio" id="accessories" name="category" value="accessories">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                <?php
                                    }
                                ?>
                            </div>
                           
                            <div class="filter_btn" style=" text-align: left;">
                                <button type="submit" ><a >Filter</a></button>    
                            </div>
                        </form>
                    </div>
                </div>

                <?php 
                
                    if(isset($_GET['category'])){
                        $category = $_GET['category'];
                ?>
                    <!-- products -->
                    <div class="col-lg-9 col-md-9">
                        <div class="row">

                        <?php
                            require("db_connection.php");
                            
                            // set the products per page
                            $pro_per_page = 9;

                            if(isset($_GET['page'])){
                                $page = $_GET["page"];
                            }
                            else{
                                $page = 1;
                            }

                            $start_from = ($page-1) * $pro_per_page;

                            //search for the record as page per products
                            $sql = "select * from products where category='$category' limit $start_from, $pro_per_page";
                            $sr = $mysqli->query($sql);

                            if(mysqli_num_rows($sr)>0){

                                while($row = mysqli_fetch_assoc($sr)){
                        ?>

                            <div class="col-lg-4 col-md-6">
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
                                }
                            
                            ?>
                            <div class="col-lg-12 text-center">
                                <div class="pagination__option">
                            <?php

                                $sql2 = "select * from products where category='$category'";
                                $sr2 = $mysqli->query($sql2);
                                $num_of_pages = ceil(mysqli_num_rows($sr2)/$pro_per_page);

                                for($i=1; $i<=$num_of_pages; $i++){
                                    if($i == $page){
                                        echo '<a href="gallery.php?page=' . $i . '&category='.$category.'" style="background:black; color:white;">' . $i . '</a>';
                                    }
                                    else{
                                    echo '<a href="gallery.php?page=' . $i . '&category='.$category. '">' . $i . '</a>';
                                    }
                                }
                                if($num_of_pages != $page ){
                                echo '<a href="gallery.php?page=' . $page + 1 . '&category='.$category.'"><i class="fa fa-angle-right"></i></a>';
                                }
                            }
                            else{
                                echo "No Products Found";
                            }
                            ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php
                    }
                    else{      
                ?>
 
                <!-- products -->
                <div class="col-lg-9 col-md-9">
                    <div class="row">

                    <?php
                        require("db_connection.php");
                        
                        // set the products per page
                        $pro_per_page = 9;

                        if(isset($_GET['page'])){
                            $page = $_GET["page"];
                        }
                        else{
                            $page = 1;
                        }

                        $start_from = ($page-1) * $pro_per_page;

                        //search for the record as page per products
                        $sql = "select * from products limit $start_from, $pro_per_page";
                        $sr = $mysqli->query($sql);

                        if(mysqli_num_rows($sr)>0){

                            while($row = mysqli_fetch_assoc($sr)){
                    ?>

                        <div class="col-lg-4 col-md-6">
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
                            }
                        ?>
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">

                        <?php

                            $sql2 = "select * from products";
                            $sr2 = $mysqli->query($sql2);
                            $num_of_pages = ceil(mysqli_num_rows($sr2)/$pro_per_page);

                            for($i=1; $i<=$num_of_pages; $i++){
                                if($i == $page){
                                    echo '<a href="gallery.php?page=' . $i . '" style="background:black; color:white;">' . $i . '</a>';
                                }
                                else{
                                echo '<a href="gallery.php?page=' . $i . '">' . $i . '</a>';
                                }
                            }
                            if($num_of_pages != $page ){
                            echo '<a href="gallery.php?page=' . $page + 1 . '"><i class="fa fa-angle-right"></i></a>';
                            }
                        }
                        else{
                            echo "No products found";
                        }
                        ?>
                            </div>
                        </div>

                    </div>
                </div>

                <?php       
                    }
                
                ?>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

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