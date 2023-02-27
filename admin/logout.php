<?php
  session_start();
  session_destroy();

  header("location:login_3.php?status=log_out");
 ?>