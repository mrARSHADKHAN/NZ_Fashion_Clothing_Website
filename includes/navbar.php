    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->


    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <?php 
            if(!(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != '')){
            }
            else{
                //database connection
                require("db_connection.php");

                $cus_id = $_SESSION['cus_id'];

                $sql1 = "select * from cart where cus_id='$cus_id'";
                $y = $mysqli->query($sql1);
                $cart_tot = mysqli_num_rows($y);

                $sql2 = "select * from wishlist where cus_id='$cus_id'";
                $x = $mysqli->query($sql2);
                $wis_tot = mysqli_num_rows($x);
            ?>
               <li><a href="wishlist.php"><span class="icon_heart_alt"></span>
                    <div class="tip"><?php echo $wis_tot ?></div>
                </a></li>
                <li><a href="cart.php"><span class="icon_bag_alt"></span>
                    <div class="tip"><?php echo $cart_tot ?></div>
                </a></li>
            <?php
            }
            ?>
        </ul>
        <div class="offcanvas__logo">
            <a href="./home.php"><img src="img/logo_nz.jpg" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <?php 
            if(!(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != '')){
        ?>
        <div class="offcanvas__auth">
            <a href="login_1.php">Login</a>
            <a href="register_1.php">Register</a>
        </div>
        <?php 
            }
            else{
        ?>
                <div class="offcanvas__auth">
                <span class="icon_profile"></span></a>
                    <a href="#"><?php echo $_SESSION['cus_name']?></a>
                </div>
        <?php
            }
        ?>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./home.php"><img src="img/logo_nz.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li <?php if($_SERVER['SCRIPT_NAME'] == "home.php"){ echo 'class="active"'; } ?> ><a href="./home.php">Home</a></li>
                            <li <?php if($_SERVER['SCRIPT_NAME'] == "gallery.php"){ echo 'class="active"'; } ?> ><a href="./gallery.php">Gallery</a></li>
                            <li <?php if($_SERVER['SCRIPT_NAME'] == "about_us.php"){ echo 'class="active"'; } ?> ><a href="./about_us.php">About Us</a></li>
                            <li <?php if($_SERVER['SCRIPT_NAME'] == "contact_us.php"){ echo 'class="active"'; } ?>><a href="./contact_us.php">Contact Us</a></li>
                            <?php 
                                if(!(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != '')){
                                }
                                else{
                            ?>
                                    <li <?php if($_SERVER['SCRIPT_NAME'] == "account.php"){ echo 'class="active"'; } ?>><a href="#">Account</a>
                                        <ul class="dropdown">
                                            <li><a href="./account.php">Profile</a></li>
                                            <li><a href="./message.php">Messages</a></li>
                                            <li><a href="./cart.php">Cart</a></li>
                                            <li><a href="./wishlist.php">Wishlist</a></li>
                                            <li><a href="./logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a></li> 
                                        </ul>
                                    </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <?php 
                            if(!(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != '')){
                        ?>
                        <div class="header__right__auth">
                            <a href="login_1.php">Login</a>
                            <a href="register_1.php">Register</a>
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                        </ul>
                        <?php 
                            } 
                            else{
                        ?>
                        <!-- <div class="header__right__auth">
                            <a href="#"><?php echo $_SESSION['cus_name']?></a>
                        </div> -->
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <?php 
                                //database connection
                                require("db_connection.php");

                                $cus_id = $_SESSION['cus_id'];

                                $sql1 = "select * from cart where cus_id='$cus_id'";
                                $y = $mysqli->query($sql1);
                                $cart_tot = mysqli_num_rows($y);

                                $sql2 = "select * from wishlist where cus_id='$cus_id'";
                                $x = $mysqli->query($sql2);
                                $wis_tot = mysqli_num_rows($x);
                                
                            ?>
                            <li><a href="wishlist.php"><span class="icon_heart_alt"></span>
                                <div class="tip"><?php echo $wis_tot ?></div>
                            </a></li>
                            <li><a href="cart.php"><span class="icon_bag_alt"></span>
                                <div class="tip"><?php echo $cart_tot ?></div>
                            </a></li>
                            <!-- <li class="user_icon"><a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">
                                <span class="icon_profile"></span></a>
                            </li> -->
                            <li class="user_icon">
                                <a href="account.php"><img src="img/user/default.jpg" alt=""></a>
                                
                            </li>
                        </ul>
                        
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->