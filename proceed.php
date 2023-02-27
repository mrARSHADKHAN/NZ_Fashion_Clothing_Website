<?php
    require("validate_user.php");
    if($_SERVER['SCRIPT_NAME'] = "account.php");

    //conntect to database
    require("db_connection.php");

    if($_REQUEST['status'] == 'pass'){
        $message[] = 'Order is Successful. You will receive a confirmation soon.';
    }
    else{
        header("location:cart.php");
    }

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
                        <a href="cart.php"> Cart</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
        <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="alert_box" onclick="this.remove();">
                            <div class="row">
                                <div class="alert_sub col-md-12">
                                    <h5 class="">'. $message .'</h5>
                                </div>
                            </div>
                            </div>';
                }
            }
        ?>
                <div style="text-align: center; margin-top:20px;" >
                    <a href="gallery.php" class="btn btn-danger">Shop More</a>
                </div>
        </div>
    </section>
        <!-- Checkout Section End -->

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