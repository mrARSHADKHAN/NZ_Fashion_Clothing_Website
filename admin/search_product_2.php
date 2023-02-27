<?php
  require("validate_user.php");
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
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

        <?php  
            $search = $_REQUEST['search'];
            $keywords  = $_REQUEST['keywords'];
        ?>

    <div class="pagetitle">
      <h1>Search Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item active">Search Products</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"></h5>
                <!-- Floating Labels Form -->
                <form class="row g-3" action="search_product_2.php" method="post">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="search" id="floatingSelect" aria-label="State">
                                <option value="pro_name" <?php echo ($search == "pro_name")?"selected":""; ?>>Product Name</option>
                                <option value="pro_id" <?php echo ($search == "pro_id")?"selected":""; ?> >Product ID</option>
                                <option value="category" <?php echo ($search == "category")?"selected":""; ?> >Category</option>
                                <option value="size" <?php echo ($search == "size")?"selected":""; ?> >Size</option>
                                <option value="price" <?php echo ($search == "price")?"selected":""; ?> >Price</option>
                                <option value="brand" <?php echo ($search == "brand")?"selected":""; ?> >Brand</option>
                                </select>
                                <label for="floatingSelect">Search By</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="keywords"  value="<?php echo $keywords; ?>" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Keywords</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                </form><!-- End floating Labels Form -->
                </div>
            </div>
        </div>

        <!-- Search Record table -->
        <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Search Result <span>| Products</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Size</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>

                        <!-- search records -->
                    <?php 
                  
                        require("../db_connection.php");

                        $search = $_REQUEST['search'];
                        $keywords  = $_REQUEST['keywords'];

                        $sql = "";

                        switch($search){
                            case 'pro_id':
                            $sql = "select * from products where pro_id=$keywords";
                            break;
                            case 'pro_name':
                            $sql = "select * from products where pro_name='$keywords' OR pro_name like '%$keywords%'";
                            break;
                            case 'category':
                            $sql = "select * from products where category='$keywords' OR  category like '%$keywords%'";
                            break;
                            case 'size':
                            $sql = "select * from products where size=$keywords";
                            break;
                            case 'price':
                            $sql = "select * from products where price<=$keywords";
                            break;
                            case 'brand':
                                $sql = "select * from products where brand<='$keywords' OR brand like '%$keywords%'";
                                break;
                        }
                        //echo $sql;

                        $sr = $mysqli->query($sql);

                        if(mysqli_num_rows($sr) > 0){
                            while($row = mysqli_fetch_assoc($sr)){
                        ?>

                        <tr>
                            <th scope="row">                                     <?php echo $row['pro_id'] ?>               </th>
                            <th scope="row"><a href="#"><img src="../img/product/<?php echo $row['picture'] ?>" alt=""></a> </th>
                            <td><a href="#" class="text-primary fw-bold">        <?php echo $row['pro_name'] ?></a>         </td>
                            <td>                                                 <?php echo $row['category'] ?>             </td>
                            <td>                                                 <?php echo $row['brand'] ?>                </td>
                            <td>                                                 <?php echo $row['size'] ?>                 </td>
                            <td>                                                 <?php echo $row['price'] ?>                </td>
                        </tr>

                        <?php       
                            }
                        }
                        else{
                        ?>

                            <tr>
                            <td colspan='7'>
                                <h3 class="text-center">No Records Found</h3>
                            </td>
                            </tr>
                        <?php 
                            }
                        ?>
                        <!-- end of search records -->
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
                
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