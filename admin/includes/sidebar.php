<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Products</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="add_product_1.php">
          <i class="bi bi-plus-circle"></i>
          <span>Add Products</span>
        </a>
      </li><!-- End add Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="edit_product_1.php">
          <i class="bi bi-pencil-square"></i>
          <span>Edit Products</span>
        </a>
      </li><!-- End edit Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="search_product_1.php">
          <i class="bi bi-search"></i>
          <span>Search Products</span>
        </a>
      </li><!-- End search Page Nav -->

      <?php if($_SESSION['user_role'] == "admin"){ ?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="delete_product_1.php">
          <i class="bi bi-trash"></i>
          <span>Delete Products</span>
        </a>
      </li><!-- End delete Page Nav -->

      <?php } ?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="message.php">
          <i class="bi bi-chat-left-text"></i>
          <span>Messages</span>
        </a>
      </li><!-- End Message Page Nav -->

      <li class="nav-heading">Account</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>My Profile</span>
        </a>
      </li><!--End profile nav  -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php" onclick="return confirm('Are you sure you want to logout?')">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    

    </ul>

  </aside>