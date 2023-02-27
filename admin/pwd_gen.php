<?php

    $password = "staff";

    $enc_code = crypt($password,$password);

    echo $enc_code;
?>