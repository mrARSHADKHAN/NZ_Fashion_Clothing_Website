<?php
    require("validate_user.php");

    if($_SERVER['SCRIPT_NAME'] = "account.php");

    //conntect to database
    require("db_connection.php");

    $cus_id   = $_SESSION['cus_id'];
    $cus_name = $_SESSION['cus_name'];
    $contact  = $_SESSION['contact'];

    if(isset($_POST['submit'])){

        $cus_name = $_POST['cus_name'];
        $contact  = $_POST['contact'];

        $sql  = "update customer_logs set ";
        $sql .= "cus_name='$cus_name',";
        $sql .= "contact='$contact' where cus_id='$cus_id'";

        $x = $mysqli->query($sql);
        
        if($x>0){
            $message3[] = 'Profile details update is successfull.';
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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./home.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./account.php">Account</a>
                        <span>Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <?php
        if(isset($message3)){
            foreach($message3 as $message3){
                echo '<div class="noti_box">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        '. $message3 .'
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>';
            }
        }
    ?>

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Account</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample"> 
                                    <div class="card">
                                        <div class="card_tag">
                                            <a href="account.php" >Profile</a>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card_tag">
                                            <a href="message.php" >Messages</a>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card_tag">
                                            <a href="cart.php">Cart</a>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card_tag">
                                            <a href="wishlist.php">Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card_tag">
                                            <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- products -->
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="contact__form">
                                <h5>Profile</h5>
                                <img src="img/user/default.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="contact__form">
                                <h5 style="margin-bottom: 50px;"></h5>
                                <form method="POST">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="cus_name" value="<?php echo $cus_name ?>">
                                    <label class="form-label">Username</label>
                                    <input type="text" value="<?php echo $cus_id ?>" disabled>
                                    <label class="form-label">Contact</label>
                                    <input type="text" name="contact" value="<?php echo $contact ?>">
                                    <button type="submit" name="submit" class="site-btn">Save Changes</button>
                                </form>
                            </div>
                        </div>
                        

                    </div>
                </div>

               
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