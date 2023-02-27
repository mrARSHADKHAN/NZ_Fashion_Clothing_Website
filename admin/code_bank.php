<?php

  function getProfilePicture($pro_id){
    global $mysqli;
    $sql = "select picture from products where pro_id=$pro_id";
    $rs  = $mysqli->query($sql);
    $row = mysqli_fetch_assoc($rs);
    return $row['picture'];
  }

  ?>