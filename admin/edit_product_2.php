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
            $pro_id = $_REQUEST['pro_id'];
        ?>

    <div class="pagetitle">
      <h1>Edit Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item active">Edit Products</li>
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
                <form class="row g-3" action="edit_product_2.php" method="post">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="number" class="form-control" name="pro_id"  value="<?php echo $pro_id; ?>" id="floatingName" placeholder="Your Name">
                                <label for="floatingName">Enter Product ID</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                </form><!-- End floating Labels Form -->
                </div>
            </div>
        </div>         
      </div>
    </section>

    <?php 
    
        require("../db_connection.php");

        $sql = "select * from products where pro_id=$pro_id";
        $sr = $mysqli->query($sql);

        if(mysqli_num_rows($sr) > 0){
            $row = mysqli_fetch_assoc($sr);
    ?>
            
    <section class="product_edit">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-4 text-center">
                            <img 
                                style="width:100%; height:auto;" 
                                src="../img/product/<?php echo $row['picture'] ?>" alt=""
                            >
                        </div>
                        <!-- <div class="mt-4 text-center">
                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Result Found <span>| Product ID : <?php echo $row['pro_id'] ?></span></h5>
                        
                        <!-- Multi Columns Form -->
                        <form class="row g-3  needs-validation" action="edit_product_3.php" enctype="multipart/form-data" method="post" novalidate>
                            
                            <input type="hidden" name="pro_id" value="<?php echo $row['pro_id'] ?>">

                            <div class="col-md-12">
                            <label for="inputName5" class="form-label">Product Name</label>
                            <input type="text" name="pro_name" value="<?php echo $row['pro_name'] ?>" class="form-control" id="inputName5" required>
                            </div>
                            <div class="col-md-6">
                            <label for="inputState" class="form-label">Category</label>
                            <select id="inputState" name="category" class="form-select">
                                <option <?php echo ($row['category'] == "Shirts")?"selected":""; ?>>Shirts</option>
                                <option <?php echo ($row['category'] == "T-Shirts")?"selected":""; ?>>T-Shirts</option>
                                <option <?php echo ($row['category'] == "Trousers")?"selected":""; ?>>Trousers</option>
                                <option <?php echo ($row['category'] == "Trousers")?"selected":""; ?>>Shorts</option>
                                <option <?php echo ($row['category'] == "Watches")?"selected":""; ?>>Watches</option>
                                <option <?php echo ($row['category'] == "Shoes")?"selected":""; ?>>Shoes</option>
                                <option <?php echo ($row['category'] == "Caps")?"selected":""; ?>>Caps</option>
                                <option <?php echo ($row['category'] == "Accessories")?"selected":""; ?>>Accessories</option>
                                <option <?php echo ($row['category'] == "Others")?"selected":""; ?>>Others</option>
                            </select>
                            </div>
                            <div class="col-md-6">
                            <label for="inputState" class="form-label">Size</label>
                            <select id="inputState" name="size" class="form-select">
                                <option <?php echo ($row['size'] == "XS")?"selected":""; ?>>XS</option>
                                <option <?php echo ($row['size'] == "S")?"selected":""; ?>>S</option>
                                <option <?php echo ($row['size'] == "M")?"selected":""; ?>>M</option>
                                <option <?php echo ($row['size'] == "L")?"selected":""; ?>>L</option>
                            </select>
                            </div>
                            <div class="col-md-6">
                            <label for="inputName5" class="form-label">Brand</label>
                            <input type="text" name="brand" value="<?php echo $row['brand'] ?>" class="form-control" id="inputName" required>
                            </div>
                            <div class="col-md-6 position: relative">
                            <label for="validationTooltip03" class="form-label">Price</label>
                            <input type="number" name="price" value="<?php echo $row['price'] ?>" class="form-control" id="validationTooltip03" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Describtion</label>
                                <textarea class="form-control" name="description" style="height: 100px"><?php echo $row['description'] ?></textarea>
                            </div>
                            <!-- <div class="col-md-12">
                                <label for="" class="col-sm-5 col-form-label">Product Picture</label>
                                <input class="form-control" name="picture" type="file" id="formFile" required>
                            </div> -->

                            <!-- <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                Publish
                                </label>
                            </div>
                            </div> -->

                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">Edit Product</button>
                            <button type="reset" class="btn btn-secondary">Default</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php         
        }
        else{
    ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    Product Not Found. Try Again!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php
        }

    ?>

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