<?php
    session_start();

    if($_SERVER['SCRIPT_NAME'] = "about_us.php");
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
                        <span>About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Our Vision</h5>
                            <ul>
                                <li>
                                    <p>Our vision is to become the leading provider of men's clothing in Sri Lanka, by offering a unique and personalized shopping experience to our customers. We strive to continuously improve our product offerings and customer service, so that every man can find the perfect outfit that reflects their personal sense of style.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__address">
                            <h5>Our Mission</h5>
                            <ul>
                                <li>
                                    <p>At NZ Fashion, we are dedicated to providing men with high-quality, fashionable clothing that fits their individual style. Our mission is to empower men to look and feel their best, by offering a range of clothing options that are both stylish and practical.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__address">
                            <h5 style="text-align: center;">Terms and Conditions</h5>
                            <p><span style="font-weight: 600;">Introduction:</span> These terms and conditions (the "Terms") apply to the use of the NZ Fashion website and all related services provided by NZ Fashion (the "Services"). By accessing or using the Services, you agree to be bound by these Terms. If you do not agree to these Terms, you must not use the Services.</p>
                            <p><span style="font-weight: 600;">Use of the Services:</span> You may only use the Services for lawful purposes and in accordance with these Terms. You are responsible for ensuring that your use of the Services does not violate any applicable laws or regulations. You must not use the Services in any way that could damage, disable, overburden, or impair the Services or interfere with any other party's use of the Services.</p>
                            <p><span style="font-weight: 600;">User Account:</span> To use certain features of the Services, you may be required to create a user account. You must provide accurate and complete information when creating your account, and you must keep this information up to date. You are solely responsible for maintaining the confidentiality of your account information, including your password. You must immediately notify NZ Fashion if you suspect unauthorized use of your account.</p>
                            <p><span style="font-weight: 600;">Ordering and Payment:</span> You may place an order for products through the Services by adding items to your shopping cart and proceeding to checkout. All orders are subject to acceptance by NZ Fashion. You agree to pay all charges, including shipping and handling fees, applicable taxes, and any other charges related to your order.</p>
                </div>
                    </div>
                </div>
                
            </div>
        </div>
</section>
<!-- Contact Section End -->

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