<?php
    require("validate_user.php");

    //conntect to database
    require("../db_connection.php");

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NZ Fashion - Admin Panel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon_nz.jpg" rel="icon">
  <link href="assets/img/favicon_nz.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
    <?php 
      require("includes/header.php")
    ?>
  <!-- End Header -->
 
    <!-- ======= Sidebar ======= -->
    <?php 
    require("includes/sidebar.php")
    ?>
    <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Messages</li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="message_profile">
      <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body user_msg">
                    <h5 class="card-title">Messages</h5>
                    <form action="message_2.php" method="POST">
                        <div class="list-group">
                        <?php
                            $cus_id_sql = "select distinct cus_id from customer_msg order by cm_id desc";
                            $sr = $mysqli->query($cus_id_sql);

                            if(mysqli_num_rows($sr)>0){
                                while($cus_id_row = mysqli_fetch_assoc($sr)){
                                    $cus_id = $cus_id_row['cus_id'];
                                    $msg_count = "select * from customer_msg where cus_id='$cus_id' AND status='0'";
                                    $sr1 = $mysqli->query($msg_count);
                                    $cus_msg_count = mysqli_num_rows($sr1);
                        ?>          
                                    <button type="submit" value="<?php echo $cus_id_row['cus_id'] ?>" name="cus_id" class="list-group-item list-group-item-action"><?php echo $cus_id_row['cus_id'] ?>
                                        <?php 
                                            if($cus_msg_count != 0){
                                        ?>
                                                <span class="badge bg-primary rounded-pill"><?php echo $cus_msg_count ?></span>
                                        <?php
                                            }
                                            
                                        ?>
                                    </button>
                        <?php
                                }
                            }
                            else{
                        ?>
                            <button type="button" class="list-group-item list-group-item-action">No Messages</button>
                        <?php
                            }
                        ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
          <div class="card">
                <div class="card-body pt-3">
                    <div class="admin_msg">
                        <table class="table">
                            <tbody>
                            <!-- <tr>
                                <td class="message" scope="row"><span> User A </span><br />
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit dolore, exercitationem illum voluptatem porro sint id, sit animi aspernatur obcaecati corrupti aliquid nihil quisquam minima voluptas? Praesentium libero at maxime?</p> 
                                </td>
                            </tr> 
                            <tr>
                                <td scope="row"><span> Admin </span><br />
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit dolore, exercitationem illum voluptatem porro sint id, sit animi aspernatur obcaecati corrupti aliquid nihil quisquam minima voluptas? Praesentium libero at maxime?</p> 
                                </td>
                            </tr>
                            <tr>
                                <td class="message" scope="row"><span> User A </span><br />
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit dolore, exercitationem illum voluptatem porro sint id, sit animi aspernatur obcaecati corrupti aliquid nihil quisquam minima voluptas? Praesentium libero at maxime?</p> 
                                </td>
                            </tr>  -->
                            
                            </tbody>
                        </table>
                    </div>

                    <div class="row mb-3">
                        <form method="" >
                            <div class="col-sm-12">
                                <textarea class="form-control" name="message" placeholder="Type your message here..." style="height: 100px;"></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10" style="margin-top: 10px;">
                                    <button type="submit"  class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ARSHAD KHAN</span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>