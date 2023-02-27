<?php
    require("validate_user.php");
    if($_SERVER['SCRIPT_NAME'] = "account.php");

    //conntect to database
    require("db_connection.php");

    $cus_id   = $_SESSION['cus_id'];
    $cus_name = $_SESSION['cus_name'];
    $contact  = $_SESSION['contact'];

    if(isset($_POST['submit'])){

        $message = addslashes($_POST['message']);
        $status  = '0';

        $sql = "insert into customer_msg (cus_id,cus_name,message,status) values(";
        $sql .= "'$cus_id',";
        $sql .= "'$cus_name',";
        $sql .= "'$message',";
        $sql .= "'$status')";

        //echo $sql;
        $x = $mysqli->query($sql);
        
        if($x>0){
            $message3[] = 'Successful : Message sent.';
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
                        <span>Messages</span>
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
                                            <a href="" >Messages</a>
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
                        <div class="col-md-12">
                            <div class="contact__form">
                                <h5>Messages</h5>
                            </div>
                            <div class="msg_box">
                                <div class="blog__details__comment">

                                    <?php 
                                        $msg_sql = "select * from customer_msg where cus_id='$cus_id'";
                                        $sr = $mysqli->query($msg_sql);

                                        if(mysqli_num_rows($sr)>0){
                                            while($msg_row = mysqli_fetch_assoc($sr)){
                                    ?>
                                                <div class="blog__comment__item">
                                                    <div class="blog__comment__item__text">
                                                        <h6><?php echo $msg_row['cus_name'] ?></h6>
                                                        <p><?php echo $msg_row['message'] ?></p>
                                                        <ul>
                                                            <?php 
                                                                $status = $msg_row['status'];
                                                                if($status == '1'){
                                                            ?>
                                                                    <li><i class="icon_check_alt2"></i>Read</li>
                                                            <?php
                                                                }
                                                                else{
                                                            ?>
                                                                    <li><i class="fa fa-clock-o"></i>Unread</li>
                                                            <?php
                                                                }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                    <?php
                                                $cm_id = $msg_row['cm_id'];
                                                $admin_msg_sql = "select * from admin_msg where cus_id='$cus_id' AND cm_id='$cm_id'";
                                                $sr_admin = $mysqli->query($admin_msg_sql);
                                                while($admin_msg_row = mysqli_fetch_assoc($sr_admin)){
                                    ?>
                                                <div class="blog__comment__item blog__comment__item--reply">
                                                    <div class="blog__comment__item__text">
                                                        <h6>Admin</h6>
                                                        <p><?php echo $admin_msg_row['message'] ?></p>
                                                        <ul>
                                                            <!-- <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                    <?php
                                                }
                                            }
                                        }
                                        else{
                                    ?>
                                            <div class="blog__comment__item">
                                                    <div class="blog__comment__item__text">
                                                        <h6>No Messages</h6>
                                                    </div>
                                                </div>
                                    <?php
                                        }
                                    
                                    ?>
                                    
                                </div>
                            </div>

                            <div class="contact__form">
                                <form method="POST">
                                    <textarea name="message" placeholder="Type your message here..."></textarea>
                                    <button type="submit" name="submit" class="site-btn">Send</button>
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